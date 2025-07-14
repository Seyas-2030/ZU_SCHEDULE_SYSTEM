<?php
session_start();


require_once('../includes/config.php');


mysqli_query($dbConn,"delete from instructors_final_schedules");

mysqli_query($dbConn,"delete from final_schedules");
	  
echo "<script language='JavaScript'>
			  alert ('All Final Schedules Has Been Deleted Successfully !');
      </script>";
	  

	echo "<script language='JavaScript'>
document.location='View_Final_Schedules_List.php';
        </script>";

?>