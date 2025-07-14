<?php
session_start();

require_once('../includes/config.php');

$Year = $_GET['Year'];
$Semester = $_GET['Semester'];
$Department = $_GET['Department'];
$Start_Date = $_GET['Start_Date'];
$End_Date = $_GET['End_Date'];

//Check if Start_Date or End_Date falls on Friday or Saturday
$startDay = (new DateTime($Start_Date))->format('l');
$endDay = (new DateTime($End_Date))->format('l');

if ($startDay === 'Friday' || $startDay === 'Saturday' || $endDay === 'Friday' || $endDay === 'Saturday') {
    echo "<script>alert('Start Date and End Date cannot be Friday or Saturday. Please select different dates.'); window.location.href='Generate_Final_Schedules.php';</script>";
    exit();
}

//Fetch sections based on user input
$query = "SELECT * FROM sections WHERE Year = ? AND Semester = ? AND Department = ?";
$stmt = $dbConn->prepare($query);
$stmt->bind_param("sss", $Year, $Semester, $Department);
$stmt->execute();
$result = $stmt->get_result();
$sections = $result->fetch_all(MYSQLI_ASSOC);
$result->free();
$stmt->close();

if (empty($sections)) {
    exit();
}

//Fetch available rooms
$queryRooms = "SELECT * FROM rooms WHERE Year = ? AND Semester = ? AND Department = ?";
$stmtRooms = $dbConn->prepare($queryRooms);
$stmtRooms->bind_param("sss", $Year, $Semester, $Department);
$stmtRooms->execute();
$resultRooms = $stmtRooms->get_result();
$rooms = $resultRooms->fetch_all(MYSQLI_ASSOC);
$resultRooms->free();
$stmtRooms->close();

if (empty($rooms)) {
    exit();
}

//Fetch all instructors
$queryInstructors = "SELECT * FROM instructors";
$resultInstructors = $dbConn->query($queryInstructors);
$instructors = $resultInstructors->fetch_all(MYSQLI_ASSOC);
$resultInstructors->free();

if (empty($instructors)) {
    echo "<script>alert('No instructors available.'); window.location.href='Generate_Final_Schedules.php';</script>";
    exit();
}

//Fetch instructor schedules to avoid conflicts
$queryInstructorSchedules = "SELECT * FROM instructors_final_schedules";
$resultInstructorSchedules = $dbConn->query($queryInstructorSchedules);
$instructorSchedules = $resultInstructorSchedules->fetch_all(MYSQLI_ASSOC);
$resultInstructorSchedules->free();

//Fetch course final hours in minutes
$queryCourses = "SELECT ID, Final_Hours FROM courses WHERE Year = ? AND Semester = ? AND Department = ?";
$stmtCourses = $dbConn->prepare($queryCourses);
$stmtCourses->bind_param("sss", $Year, $Semester, $Department);
$stmtCourses->execute();
$resultCourses = $stmtCourses->get_result();
$courses = [];
while ($course = $resultCourses->fetch_assoc()) {
    $courses[$course['ID']] = $course['Final_Hours'];
}
$resultCourses->free();
$stmtCourses->close();

if (empty($courses)) {
    exit();
}

function bestFirstSearch($sections, $rooms, $startDate, $endDate, $instructorSchedules, $courses, $dbConn) {
    $schedule = [];
    $roomUsage = []; //Track room usage to balance load
    $sectionsByCourse = []; //Group sections by course ID

    //Group sections by course
    foreach ($sections as $section) {
        $sectionsByCourse[$section['Course_ID']][] = $section;
    }

    //Initialize room usage
    foreach ($rooms as $room) {
        $roomUsage[$room['ID']] = [];
    }

    $dates = new DatePeriod(
        new DateTime($startDate),
        new DateInterval('P1D'),
        (new DateTime($endDate))->modify('+1 day')
    );

    foreach ($sectionsByCourse as $courseID => $courseSections) {
        $examDurationMinutes = $courses[$courseID] ?? 60; //Default to 60 minutes if not found
        $courseScheduled = false;

        foreach ($dates as $date) {
            $dateStr = $date->format('Y-m-d');
            $dayName = $date->format('l');

            //Skip weekends
            if ($dayName === 'Friday' || $dayName === 'Saturday') {
                continue;
            }

            $startTime = new DateTime('08:00:00');
            $endTime = new DateTime('16:00:00');

            while ($startTime < $endTime) {
                $timeFrom = $startTime->format('H:i:s');
                $endSlotTime = clone $startTime;
                $endSlotTime->modify("+{$examDurationMinutes} minutes");
                $timeTo = $endSlotTime->format('H:i:s');

                if ($endSlotTime > $endTime) {
                    break;
                }

                $assignedRooms = []; //Track assigned rooms for this course
                $allSectionsScheduled = true;

                //Assign all sections of this course to the same time slot
                foreach ($courseSections as $section) {
                    //Skip if this section is already scheduled
                    foreach ($schedule as $scheduled) {
                        if ($scheduled['Section_ID'] == $section['ID']) {
                            $allSectionsScheduled = false;
                            break 2;
                        }
                    }

                    $sectionAssigned = false;

                    foreach ($rooms as $room) {
                        //Check if the room is already assigned or available
                        if (in_array($room['ID'], $assignedRooms)) {
                            continue;
                        }

                        $roomAvailable = true;
                        foreach ($roomUsage[$room['ID']] as $usage) {
                            if (
                                $usage['Date'] === $dateStr &&
                                (($timeFrom >= $usage['Time_From'] && $timeFrom < $usage['Time_To']) ||
                                ($timeTo > $usage['Time_From'] && $timeTo <= $usage['Time_To']))
                            ) {
                                $roomAvailable = false;
                                break;
                            }
                        }

                        if ($roomAvailable && $room['Total_Students_Capacity'] >= $section['Total_Students_Capacity']) {
                            //Assign the room and schedule the section
                            $schedule[] = [
                                'Section_ID' => $section['ID'],
                                'Room_ID' => $room['ID'],
                                'Date' => $dateStr,
                                'Day' => $dayName,
                                'Time_From' => $timeFrom,
                                'Time_To' => $timeTo,
                            ];

                            //Mark the room as used for this time slot
                            $roomUsage[$room['ID']][] = [
                                'Date' => $dateStr,
                                'Time_From' => $timeFrom,
                                'Time_To' => $timeTo,
                            ];

                            $assignedRooms[] = $room['ID']; //Mark room as assigned
                            $sectionAssigned = true;
                            break; //Move to the next section
                        }
                    }

                    if (!$sectionAssigned) {
                        $allSectionsScheduled = false;
                        break; //Break if a section cannot be scheduled
                    }
                }

                if ($allSectionsScheduled) {
                    $courseScheduled = true;
                    break 2; //Exit both loops as the course is fully scheduled
                }

                //Move to the next time slot
                $startTime = $endSlotTime;
            }
        }

        if (!$courseScheduled) {
            //Handle unscheduled courses if needed
        }
    }

    return $schedule;
}

function assignInstructor($scheduleItem, &$instructors, &$instructorSchedules, $dbConn) {
    foreach ($instructors as $instructor) {
        $isAvailable = true;

        //Check instructor availability
        foreach ($instructorSchedules as $schedule) {
            if (
                $schedule['Instructor_ID'] == $instructor['ID'] &&
                $schedule['Date'] == $scheduleItem['Date'] &&
                (
                    ($scheduleItem['Time_From'] >= $schedule['Time_From'] && $scheduleItem['Time_From'] < $schedule['Time_To']) ||
                    ($scheduleItem['Time_To'] > $schedule['Time_From'] && $scheduleItem['Time_To'] <= $schedule['Time_To'])
                )
            ) {
                $isAvailable = false;
                break;
            }
        }

        if ($isAvailable) {
            //Assign instructor and update instructor schedules
            $query = "INSERT INTO instructors_final_schedules (Instructor_ID, Schedule_ID) VALUES (?, ?)";
            $stmt = $dbConn->prepare($query);
            $stmt->bind_param("ii", $instructor['ID'], $scheduleItem['ID']);
            $stmt->execute();
            $stmt->close();

            $instructorSchedules[] = [
                'Instructor_ID' => $instructor['ID'],
                'Date' => $scheduleItem['Date'],
                'Time_From' => $scheduleItem['Time_From'],
                'Time_To' => $scheduleItem['Time_To']
            ];

            return true;
        }
    }

    return false; //No instructor available
}

//Generate the schedule
$schedule = bestFirstSearch($sections, $rooms, $Start_Date, $End_Date, $instructorSchedules, $courses, $dbConn);
if (empty($schedule)) {
    exit();
}

//Save the schedule to the database
foreach ($schedule as $item) {
    $checkQuery = "SELECT COUNT(*) FROM final_schedules WHERE Section_ID = ? AND Date = ? AND Time_From = ? AND Time_To = ?";
    $stmtCheck = $dbConn->prepare($checkQuery);
    $stmtCheck->bind_param("isss", $item['Section_ID'], $item['Date'], $item['Time_From'], $item['Time_To']);
    $stmtCheck->execute();
    $stmtCheck->bind_result($count);
    $stmtCheck->fetch();

    if ($count > 0) {
        $stmtCheck->close();
        continue;
    }

    $stmtCheck->close();

    //Insert the new schedule record
    $queryInsert = "INSERT INTO final_schedules (Section_ID, Room_ID, Date, Day, Time_From, Time_To, Year, Semester, Department) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmtInsert = $dbConn->prepare($queryInsert);
    $stmtInsert->bind_param(
        "iisssssss",
        $item['Section_ID'],
        $item['Room_ID'],
        $item['Date'],
        $item['Day'],
        $item['Time_From'],
        $item['Time_To'],
        $Year,
        $Semester,
        $Department
    );
    $stmtInsert->execute();
    $scheduleID = $stmtInsert->insert_id;
    $stmtInsert->close();

    //Assign instructor to the schedule
    $item['ID'] = $scheduleID; //Add the schedule ID to the item
    if (!assignInstructor($item, $instructors, $instructorSchedules, $dbConn)) {
        echo "<script>alert('Not enough instructors to cover all sections. Schedule generation aborted.'); window.location.href='Generate_Final_Schedules.php';</script>";
        exit();
    }
}

echo "<script language='JavaScript'>
          alert('New Final Schedules Has Been Generated Successfully!');
          document.location='View_Final_schedules_List.php';
      </script>";
?>
