<?php
session_start();

$MRR_ID=$_GET['MRR_ID'];
$MR_ID=$_GET['MR_ID'];

require_once('../includes/config.php');


mysqli_query($dbConn,"delete from meeting_rooms_reservations where ID='$MRR_ID'");

	  
echo "<script language='JavaScript'>
			  alert ('This Meeting Room Reservation Has Been Deleted Successfully !');
      </script>";
	  

	echo "<script language='JavaScript'>
document.location='Manage_Meeting_Room_Reservations.php?MR_ID=".$MR_ID."';
        </script>";

?>