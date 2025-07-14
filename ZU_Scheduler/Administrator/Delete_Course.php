<?php
session_start();

$C_ID=$_GET['C_ID'];

require_once('../includes/config.php');


mysqli_query($dbConn,"delete from sections where Course_ID='$C_ID'");
mysqli_query($dbConn,"delete from courses where ID='$C_ID'");

	  
echo "<script language='JavaScript'>
			  alert ('This Course Has Been Deleted Successfully !');
      </script>";
	  

	echo "<script language='JavaScript'>
document.location='View_Courses_List.php';
        </script>";

?>