<?php
session_start();

$R_ID=$_GET['R_ID'];

require_once('../includes/config.php');


mysqli_query($dbConn,"delete from rooms where ID='$R_ID'");

	  
echo "<script language='JavaScript'>
			  alert ('This Room Has Been Deleted Successfully !');
      </script>";
	  

	echo "<script language='JavaScript'>
document.location='View_Rooms_List.php';
        </script>";

?>