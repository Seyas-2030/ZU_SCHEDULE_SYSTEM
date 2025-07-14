<?php
session_start();


require_once('../includes/config.php');


mysqli_query($dbConn,"delete from instructors_mid_schedules");

mysqli_query($dbConn,"delete from mid_schedules");
	  
echo "<script language='JavaScript'>
			  alert ('All Mid Schedules Has Been Deleted Successfully !');
      </script>";
	  

	echo "<script language='JavaScript'>
document.location='View_Mid_Schedules_List.php';
        </script>";

?>