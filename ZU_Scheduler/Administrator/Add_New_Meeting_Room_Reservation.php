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

$MR_ID = $_GET['MR_ID'];

if(isset($_POST['Submit']))
{
$MR_ID = mysqli_real_escape_string($dbConn,$_POST['MR_ID']);
$Date = mysqli_real_escape_string($dbConn,$_POST['Date']);
$Time_From = mysqli_real_escape_string($dbConn,$_POST['Time_From']);
$Time_To = mysqli_real_escape_string($dbConn,$_POST['Time_To']);
$Instructor_ID = mysqli_real_escape_string($dbConn,$_POST['Instructor_ID']);



if ($Time_From>=$Time_To){
	
	
	echo "<script language='JavaScript'>
			  alert ('Sorry ! Check Meeting Room Time, Time From Should Be Less Than Time To !');
      </script>";

	echo "<script language='JavaScript'>
document.location='Add_New_Meeting_Room_Reservation.php?MR_ID=".$MR_ID."';
        </script>";
	
	
}else{
	
	
$sql1 = mysqli_query($dbConn,"select * from meeting_rooms_reservations where Room_ID='$MR_ID' AND Date='$Date' AND (Time_From='$Time_From' OR Time_To='$Time_To')");
if (mysqli_num_rows($sql1)>0){
	
	   echo "<script language='JavaScript'>
			  alert ('Sorry ! Check Meeting Room Time, Time From Or Time To Already Reserved !');
      </script>";

	echo "<script language='JavaScript'>
document.location='Add_New_Meeting_Room_Reservation.php?MR_ID=".$MR_ID."';
        </script>";
	
	
}else{
	
	
  
$insert = mysqli_query($dbConn,"insert into meeting_rooms_reservations (Instructor_ID,Room_ID,Date,Time_From,Time_To) values 
('$Instructor_ID','$MR_ID','$Date','$Time_From','$Time_To')");







echo "<script language='JavaScript'>
			  alert ('New Meeting Room Reservation Has Been Added Successfully !');
      </script>";

	echo "<script language='JavaScript'>
document.location='Manage_Meeting_Room_Reservations.php?MR_ID=".$MR_ID."';
        </script>";
	
   
	
	
}
	
	
   
   
   
   
   
   
   
   
   
	
}
	
	
	
}
	
	
	
	
	
	
	
	
	
	
	

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
					
				
				
					
				
                      
					
					
					
                      

                       <li >
                        <a href="#"><i class="fa fa-users"></i> <span class="nav-label">Instructors</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">

                            <li><a href="Add_New_Instructor.php">Add New Instructor</a></li>
                      
					  <li><a href="View_Instructors_List.php">View Instructors List</a></li>

                        </ul>
                    </li>
					
					
			
					   <li class="active">
                        <a href="#"><i class="fa fa-list"></i> <span class="nav-label">Rooms</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="Add_New_Room.php">Add New Room</a></li>

                            <li><a href="View_Rooms_List.php">View Rooms List</a></li>

                        </ul>
                    </li>
					
					
			
					
					   <li >
                        <a href="#"><i class="fa fa-list"></i> <span class="nav-label">Courses</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="Add_New_Course.php">Add New Course</a></li>

                            <li><a href="View_Courses_List.php">View Courses List</a></li>

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
                    <h2>Meeting Rooms</h2>
                    
                </div>
                <div class="col-lg-2">

                </div>
            </div>
            
 <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Add New Meeting Room Reservation </h5>
                        <div class="ibox-tools">
                            
                          
                           
                        </div>
                    </div>
                   
                        
                        
                        
                        
                          <div class="ibox-content">

                  
                  
                  
                  
                     <form method="post" action="Add_New_Meeting_Room_Reservation.php?MR_ID=<?php echo $MR_ID; ?>" class="form-horizontal" enctype="multipart/form-data">
                                
								<input type="hidden" name="MR_ID" value="<?php echo $MR_ID; ?>"/>
								
								
								
								
 <div class="form-group"><label class="col-sm-2 control-label">Instructor Name *</label>

                                    <div class="col-sm-10">
									<?php	
$query11 = mysqli_query($dbConn,"select * from instructors where Department='$Department'");

echo '<select style="width:40%" name="Instructor_ID" class="form-control " title="Instructor Name" required>';
   echo '                                       <option disabled selected value>Select Instructor Name</option>
';

while ($row11 = mysqli_fetch_array($query11)) {
   echo '<option value="'.$row11['ID'].'">'.$row11['Instructor_Name'].'</option>';
}
echo '</select>';
?>  				

									</div>
                                </div>
                                <div class="hr-line-dashed"></div>





								
								
								<div class="form-group"><label class="col-sm-2 control-label">Date *</label>

                                    <div class="col-sm-10"><input value=""  style="width:40%" min="<?php echo date("Y-m-d"); ?>" type="date" name="Date" class="form-control" required></div>
                                </div>
								
                                <div class="hr-line-dashed"></div>

 





 <div class="form-group" id="box"><label class="col-sm-2 control-label">Time From *</label>

                                    <div class="col-sm-10">
									
									
									
<select name="Time_From" style="width:40%" class="form-control required" title="Time From" >';
   <option disabled selected value>Select Time From</option>


 <option value="08:00">08:00</option>
 <option value="08:30">08:30</option>
 <option value="09:00">09:00</option>
 <option value="09:30">09:30</option>
 <option value="10:00">10:00</option>
 <option value="10:30">10:30</option>
 <option value="11:00">11:00</option>
 <option value="11:30">11:30</option>
 <option value="12:00">12:00</option>
 <option value="12:30">12:30</option>
 <option value="13:00">13:00</option>
 <option value="13:30">13:30</option>
 <option value="14:00">14:00</option>
 <option value="14:30">14:30</option>
 <option value="15:00">15:00</option>
 <option value="15:30">15:30</option>
 <option value="16:00">16:00</option>
 <option value="16:30">16:30</option>
 <option value="17:00">17:00</option>
 <option value="17:30">17:30</option>

 
 </select>

									
									
									
									</div>
                                </div>
                                <div class="hr-line-dashed"></div>	
								

 
 <div class="form-group"><label class="col-sm-2 control-label">Time To *</label>

                                    <div class="col-sm-10">
									
									
									
<select name="Time_To" style="width:40%" class="form-control required" title="Time To" >';
   <option disabled selected value>Select Time To</option>
 
 
 <option value="09:00">09:00</option>
 <option value="09:30">09:30</option>
 <option value="10:00">10:00</option>
 <option value="10:30">10:30</option>
 <option value="11:00">11:00</option>
 <option value="11:30">11:30</option>
 <option value="12:00">12:00</option>
 <option value="12:30">12:30</option>
 <option value="13:00">13:00</option>
 <option value="13:30">13:30</option>
 <option value="14:00">14:00</option>
 <option value="14:30">14:30</option>
 <option value="15:00">15:00</option>
 <option value="15:30">15:30</option>
 <option value="16:00">16:00</option>
 <option value="16:30">16:30</option>
 <option value="17:00">17:00</option>
 <option value="17:30">17:30</option>
 <option value="18:00">18:00</option>
 <option value="18:30">18:30</option>

</select>

									
									
									
									</div>
                                </div>
                                <div class="hr-line-dashed"></div>	
								




								





							
                                
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
								<button class="btn btn-primary" type="submit" name="Submit">Add</button>

									<button class="btn btn-danger" type="reset" name="Reset">Clear</button>

                                    </div>
                                </div>
                            </form>
                  
     
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

   <!-- Mainly scripts -->
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
                   
 
 /*                   {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }    */
                   
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
