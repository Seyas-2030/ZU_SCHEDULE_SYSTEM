<?php
session_start();

$MR_ID=$_GET['MR_ID'];

require_once('../includes/config.php');


mysqli_query($dbConn,"delete from meeting_rooms where ID='$MR_ID'");

	  
echo "<script language='JavaScript'>
			  alert ('This Meeting Room Has Been Deleted Successfully !');
      </script>";
	  

	echo "<script language='JavaScript'>
document.location='View_Meeting_Rooms_List.php';
        </script>";

?>