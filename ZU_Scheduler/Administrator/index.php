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




$sql1 = mysqli_query($dbConn,"select * from instructors where Department='$Department' AND Year='$Year' AND Semester='$Semester'");
	$row1 = mysqli_num_rows($sql1);	
		
		


$sql2 = mysqli_query($dbConn,"select * from courses where Department='$Department' AND Year='$Year' AND Semester='$Semester'");
	$row2 = mysqli_num_rows($sql2);	



$sql3 = mysqli_query($dbConn,"select * from rooms where Department='$Department' AND Year='$Year' AND Semester='$Semester'");
	$row3 = mysqli_num_rows($sql3);	
		
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
                    <li class="active">
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

        <div class="row">
            <div class="col-lg-12" style="background-color:#fff">
                <div class="wrapper wrapper-content">
                        <div class="row">

                            <div class="col-lg-12">
                                <div class="ibox float-e-margins">
                                    <div class="ibox-title">
                                        <h5>Examination and Meeting Rooms Schedule Prediction System - Administration Portal</h5>

                                    </div>
                                    <div class="ibox-content">

                                        <div>
                                            <div class="feed-activity-list">

                                                <div class="feed-element">

                                                    <div class="media-body ">
												
													
                                                        <strong><center>
														
													
														                                        <h1><strong>Administrator Portal</strong></h1>
  <br>
                
									<img src="img/logo.png" width="20%"/>					
														</center></strong>

                                                    </div>



                                                </div>






                                            </div>


                                        </div>

                                    </div>
                                </div>
								
								
					
					
								
								
			<div class="col-lg-4" >
                <div class="widget style1 lazur-bg" style="background-color:#8cc63e">
                    <div class="row">
                        <div class="col-xs-4">
                            <i class="fa fa-users fa-5x"></i>
                        </div>
                        <div class="col-xs-8 text-right">
										<a style="color:#000" href="View_Instructors_List.php">

										<h3> Total Instructors</h3>
										<h2 class="font-bold"> <?php echo $row1; ?></h2>
										</a>
                        </div>
                    </div>
                </div>
            </div>	
								
								
								
								
							
								
								
				<div class="col-lg-4" >
                <div class="widget style1 lazur-bg" style="background-color:#8cc63e">
                    <div class="row">
                        <div class="col-xs-4">
                            <i class="fa fa-list fa-5x"></i>
                        </div>
                        <div class="col-xs-8 text-right">
										<a style="color:#000" href="View_Courses_List.php">

										<h3> Total Courses</h3>
										<h2 class="font-bold"> <?php echo $row2; ?></h2>
										</a>
                        </div>
                    </div>
                </div>
            </div>					
								
								
								
								
									
								
				<div class="col-lg-4" >
                <div class="widget style1 lazur-bg" style="background-color:#8cc63e">
                    <div class="row">
                        <div class="col-xs-4">
                            <i class="fa fa-list fa-5x"></i>
                        </div>
                        <div class="col-xs-8 text-right">
										<a style="color:#000" href="View_Rooms_List.php">

										<h3> Total Rooms</h3>
										<h2 class="font-bold"> <?php echo $row3; ?></h2>
										</a>
                        </div>
                    </div>
                </div>
            </div>					
								
								
						
								
								
						


						
								
								
								
								

                            </div>


                        </div>
                </div>
              
				 
				 </div>

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
<!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>





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


   
</body>
</html>
