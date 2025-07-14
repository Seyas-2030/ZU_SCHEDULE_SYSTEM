<?php
session_start();

include "../includes/config.php";

$_SESSION['A_Log']=0;
$_SESSION['Year']=0;
$_SESSION['Semester']=0;
$_SESSION['Department']=0;


session_destroy();

echo "<script language='JavaScript'>
			  alert ('You Logout Successfuly !');
      </script>";	
	  
echo '  <script language="JavaScript">
            document.location="../index.php";
        </script>';




?>

