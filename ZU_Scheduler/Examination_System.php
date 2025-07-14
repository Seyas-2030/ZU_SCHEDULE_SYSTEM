<?php
session_start();

include 'includes/config.php';

	$Error ='';


$Year=$_GET['Year'];
$Semester=$_GET['Semester'];
$Department=$_GET['Department'];






?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Examination and Meeting Rooms Schedule Prediction System</title>

    <link href="Administrator/css/bootstrap.min.css" rel="stylesheet">
	    <link href="Administrator/css/plugins/bootstrap/bootstrap.min.css" rel="stylesheet">

    <link href="Administrator/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="Administrator/css/animate.css" rel="stylesheet">
    <link href="Administrator/css/style.css" rel="stylesheet">
	        	<link rel="shortcut icon" href="Administrator/img/icon.png"/>
	
	<style>
@font-face {
   font-family: myFirstFont;
   src: url(Administrator/fonts/NotoKufiArabic-Regular.ttf);
   font-size:8px;
}
body {
   font-family: myFirstFont;
}






</style>





</head>

<body class="white-bg" class="" style="background-color:#fff">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>
            
       
                <img src="Administrator/img/logo.png" class="img-rounded" width="80%"/>

            </div>
                    <h2 class="font-bold">Examination and Meeting Rooms Schedule Prediction System</h2>
            
            </p>
          
		  <h2>Select User Type</h2/>
		  
		                  <a href="Admin_Login.php?Year=<?php echo $Year; ?>&Semester=<?php echo $Semester; ?>&Department=<?php echo $Department; ?>" class="btn btn-primary block full-width m-b btn-lg">Administrator</a>

               



  <p class="m-t"> <small><br>Examination and Meeting Rooms Schedule Prediction System © 2025. All Rights Reserved </small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="Administrator/js/jquery-2.1.1.js"></script>
    <script src="Administrator/js/bootstrap.min.js"></script>

</body>

</html>



