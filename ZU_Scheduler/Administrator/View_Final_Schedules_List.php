<?php
session_start();

include("../includes/config.php");


$A_ID = $_SESSION['A_Log'];
$Year = $_SESSION['Year'];
$Semester = $_SESSION['Semester'];
$Department = $_SESSION['Department'];


if (!$_SESSION['A_Log'])
echo '<script language="JavaScript">
 document.location="../Admin_Login.php";
</script>';



?>
<!DOCTYPE html>
<html>

<head>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Examination and Meeting Rooms Schedule Prediction System | Administration Area</title>

   <link href="css/bootstrap.min.css" rel="stylesheet">
	    <link href="css/plugins/bootstrap/bootstrap.min.css" rel="stylesheet">

    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
	    <link href="css/plugins/dataTables/datatables.min.css" rel="stylesheet">


    <!-- Toastr style -->
    <link href="css/plugins/toastr/toastr.min.css" rel="stylesheet">

    <!-- Gritter -->
    <link href="js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="shortcut icon" href="img/icon.png"/>
	
	<style>
@font-face {
   font-family: myFirstFont;
   src: url(fonts/NotoKufiArabic-Regular.ttf);
   font-size:8px;
}
body {
   font-family: myFirstFont;
}

</style>

</head>

<body style="back">
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="img/logo2.jpg" width="100%"/>
                             </span>
							 

                          
                        </div>
                        <div class="logo-element">
                         Examination and Meeting Rooms Schedule Prediction System
                        </div>
						
							
                    </li>
                    <li class="">
                        <a href="index.php"><i class="fa fa-th-large"></i> <span class="nav-label">Home</span></a>

                    </li>
					
				
				
					
				
                      
					
					

                       <li>
                        <a href="#"><i class="fa fa-users"></i> <span class="nav-label">Instructors</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">

                            <li><a href="Add_New_Instructor.php">Add New Instructor</a></li>
                      
					  <li><a href="View_Instructors_List.php">View Instructors List</a></li>

                        </ul>
                    </li>
					
					
			
					   <li>
                        <a href="#"><i class="fa fa-list"></i> <span class="nav-label">Rooms</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="Add_New_Room.php">Add New Room</a></li>

                            <li><a href="View_Rooms_List.php">View Rooms List</a></li>

                        </ul>
                    </li>
					
					
					
					 <li>
                        <a href="#"><i class="fa fa-list"></i> <span class="nav-label">Meeting Rooms</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="Add_New_Meeting_Room.php">Add New Meeting Room</a></li>

                            <li><a href="View_Meeting_Rooms_List.php">View Meeting Rooms List</a></li>

                        </ul>
                    </li>
					
					
					
			
					
					   <li>
                        <a href="#"><i class="fa fa-list"></i> <span class="nav-label">Courses</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="Add_New_Course.php">Add New Course</a></li>

                            <li><a href="View_Courses_List.php">View Courses List</a></li>

                        </ul>
                    </li>
                  
					
					
					

					
					
					
					
						 <li class="active">
                        <a href="#"><i class="fa fa-list"></i> <span class="nav-label">Schedules</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">

   <li><a href="View_Mid_Schedules_List.php">View Mid Schedules List</a></li>
                            <li><a href="View_Final_Schedules_List.php">View Final Schedules List</a></li>
                        </ul>
                    </li>
                  
                  
					


  


					

                </ul>

            </div>
        </nav>

        <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>

        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <span class="m-r-sm text-muted welcome-message">Welcome To Examination and Meeting Rooms Schedule Prediction System - Administration Portal - <?php echo $Department; ?> | <?php echo $Year; ?> | <?php echo $Semester; ?></span>
                </li>
                <li class="dropdown">

                    <ul class="dropdown-menu dropdown-messages">


                        <li class="divider"></li>


                    </ul>
                </li>



                <li>
                    <a href="Logout.php">
                        <i class="fa fa-sign-out"></i> Logout
                    </a>
                </li>

            </ul>

        </nav>
        </div>
            
        <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Final Schedules</h2>
                   
                </div>
                <div class="col-lg-2">

                </div>
            </div>
            
 <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>View Final Schedules List Information | <a href="Generate_Final_Schedules.php" class="btn btn-primary">Generate Final Schedules</a> | <a href="Clear_Final_Schedules.php" class="btn btn-primary">Clear Final Schedules</a> | <a href="View_Final_No_Sections_Rooms.php" class="btn btn-primary">View Final No Sections Rooms</a>
						
						
		

						
						
						</h5>
                        <div class="ibox-tools">
                            
                          
                           
                        </div>
                    </div>
                   
                        
                        
                        
                        
                          <div class="ibox-content">

                  
                     <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>

                          
                            <th>Course Number</th>
                            <th>Course Name</th>
                            <th>Instructor Name</th>
							<th>Section Number</th>
                            <th>Section Total Students Capacity</th>
                            <th>Day / Date / Time From : Time To</th>
                            <th>Room Name</th>
                            <th>Room Type</th>
                            <th>Room Total Students Capacity</th>
                     
                       
                      
                    </tr>
                    </thead>
                    <tbody>
                    <?php
					$sql1 = mysqli_query($dbConn,"select * from final_schedules where Department='$Department' AND Year='$Year' AND Semester='$Semester' order by ID DESC");
					while ($row1 = mysqli_fetch_array($sql1)){
						
						$Sch_ID = $row1['ID'];
						$Year = $row1['Year'];
						$Semester = $row1['Semester'];
						$Section_ID = $row1['Section_ID'];
						$Room_ID = $row1['Room_ID'];
						$Day = $row1['Day'];
						$Date = $row1['Date'];
						$Time_From = $row1['Time_From'];
						$Time_To = $row1['Time_To'];
						
					$sql2 = mysqli_query($dbConn,"select * from sections where ID='$Section_ID'");
					$row2 = mysqli_fetch_array($sql2);
					$Course_ID = $row2['Course_ID'];
					$Instructor_ID = $row2['Instructor_ID'];
					
					$Section_Number = $row2['Section_Number'];
					$Section_Total_Students_Capacity = $row2['Total_Students_Capacity'];
					
				
					$sql3 = mysqli_query($dbConn,"select * from courses where ID='$Course_ID'");
					$row3 = mysqli_fetch_array($sql3);
					$Course_Number = $row3['Course_Number'];
					$Course_Name = $row3['Course_Name'];


				
					
					$sql5 = mysqli_query($dbConn,"select * from rooms where ID='$Room_ID'");
					$row5 = mysqli_fetch_array($sql5);
					$Room_Name = $row5['Room_Name'];
					$Room_Type = $row5['Room_Type'];
					$Room_Total_Students_Capacity = $row5['Total_Students_Capacity'];					
					
					$sql6 = mysqli_query($dbConn,"select * from instructors where ID='$Instructor_ID'");
					$row6 = mysqli_fetch_array($sql6);
					$Instructor_Name = $row6['Instructor_Name'];
					

					?>
                    <tr class="grade">

                          
                          <td><?php echo $Course_Number; ?></td>
                          <td><?php echo $Course_Name; ?></td>
                          <td><?php echo $Instructor_Name; ?></td>
						  <td><?php echo $Section_Number; ?></td>
                          <td><?php echo $Section_Total_Students_Capacity; ?></td>
                          <td><?php echo $Day; ?> / <?php echo $Date; ?> / <?php echo $Time_From; ?> : <?php echo $Time_To; ?></td>



                          <td><?php echo $Room_Name; ?></td>
                          <td><?php echo $Room_Type; ?></td>
                          <td><?php echo $Room_Total_Students_Capacity; ?></td>
                          
               
                   
                                       
 </tr>
                    
                    <?php
					}
					?>
                    
                    </tbody>
                    
                    </table>
                        </div>   
                  
                  
                   
                  
                  
              
                        </div>
                        
                        
                        
                        
                        
                        
                        
                        
                        
                    </div>
                </div>
               </div></div>
                <div class="footer">
                   
                    <div>
                         <center>Examination and Meeting Rooms Schedule Prediction System © 2025. All Rights Reserved.</center>

                    </div>
                </div>
            </div>
        </div>

        </div>
       



        </div>
    </div>

     <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Flot -->
    <script src="js/plugins/flot/jquery.flot.js"></script>
    <script src="js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="js/plugins/flot/jquery.flot.spline.js"></script>
    <script src="js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="js/plugins/flot/jquery.flot.pie.js"></script>

    <!-- Peity -->
    <script src="js/plugins/peity/jquery.peity.min.js"></script>
    <script src="js/demo/peity-demo.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

    <!-- jQuery UI -->
    <script src="js/plugins/jquery-ui/jquery-ui.min.js"></script>

    <!-- GITTER -->
    <script src="js/plugins/gritter/jquery.gritter.min.js"></script>

    <!-- Sparkline -->
    <script src="js/plugins/sparkline/jquery.sparkline.min.js"></script>

    <!-- Sparkline demo data  -->
    <script src="js/demo/sparkline-demo.js"></script>

    <!-- ChartJS-->
    <script src="js/plugins/chartJs/Chart.min.js"></script>

    <!-- Toastr -->
    <script src="js/plugins/toastr/toastr.min.js"></script>


      
    <script src="js/plugins/jeditable/jquery.jeditable.js"></script>

    <script src="js/plugins/dataTables/datatables.min.js"></script>
    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                   
 
                   {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }    
                   
                ]

            });

            /* Init DataTables */
            var oTable = $('#editable').DataTable();

            /* Apply the jEditable handlers to the table */
            oTable.$('td').editable( 'example_ajax.php', {
                "callback": function( sValue, y ) {
                    var aPos = oTable.fnGetPosition( this );
                    oTable.fnUpdate( sValue, aPos[0], aPos[1] );
                },
                "submitdata": function ( value, settings ) {
                    return {
                        "row_id": this.parentNode.getAttribute('id'),
                        "column": oTable.fnGetPosition( this )[2]
                    };
                },

                "width": "90%",
                "height": "100%"
            } );


        });

        function fnClickAddRow() {
            $('#editable').dataTable().fnAddData( [
                "Custom row",
                "New row",
                "New row",
                "New row",
                "New row" ] );

        }
    </script>
</body>
</html>
