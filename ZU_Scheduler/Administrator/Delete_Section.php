<?php
session_start();

$C_ID=$_GET['C_ID'];
$S_ID=$_GET['S_ID'];


require_once('../includes/config.php');


mysqli_query($dbConn,"delete from sections where ID='$S_ID'");

	  
echo "<script language='JavaScript'>
			  alert ('This Section Has Been Deleted Successfully !');
      </script>";
	  

	echo "<script language='JavaScript'>
document.location='Manage_Sections.php?C_ID=".$C_ID."';
        </script>";

?>