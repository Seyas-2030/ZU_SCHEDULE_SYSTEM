<?php
session_start();

include 'includes/config.php';

	$Error ='';


$Year=$_GET['Year'];
$Semester=$_GET['Semester'];
$Department=$_GET['Department'];


if(isset($_POST['Submit']))
{

$Year=$_POST['Year'];
$Semester=$_POST['Semester'];
$Department=$_POST['Department'];

	
$Username=$_POST['Username'];
$Password=$_POST['Password'];

if ($Username=='admin' && $Password=='admin'){

$A_ID=1;
$_SESSION['A_Log'] = $A_ID;
$_SESSION['Year'] = $Year;
$_SESSION['Semester'] = $Semester;
$_SESSION['Department'] = $Department;


echo '<script language="JavaScript">
            document.location="Administrator/";
        </script>';	
}
else
{

$Error = 'Error ... Please Check Administrator Username Or Password !';
}
}




?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Examination and Meeting Rooms Schedule Prediction System - Administrator Portal | Login</title>

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
                    <h2 class="font-bold">Admin Login</h2>
            
            </p>
            <form class="m-t" role="form" method="post" action="Admin_Login.php">
			
			<input type="hidden" name="Year" value="<?php echo $Year; ?>"/>
			<input type="hidden" name="Semester" value="<?php echo $Semester; ?>"/>
			<input type="hidden" name="Department" value="<?php echo $Department; ?>"/>
			
			
			
			
			
                <div class="form-group">
                   Username <input type="text" class="form-control" placeholder="Username" name="Username" required="">
                </div>
				



                <div class="form-group">
                  Password  <input type="password" id="password" class="form-control" placeholder="Password" name="Password" required="">

				</div>
					
                <button type="submit" name="Submit" class="btn btn-primary block full-width m-b btn-lg">Login</button>
                <button type="reset" name="Reset" class="btn btn-primary block full-width m-b btn-lg">Clear</button>
                <a href="Examination_System.php?Year=<?php echo $Year; ?>&Semester=<?php echo $Semester; ?>&Department=<?php echo $Department; ?>" class="btn btn-danger block full-width m-b btn-lg">Back</a>
			
				<font style="color:red"><?php echo $Error; ?></font>
				
				
			   </div>

			</form>




  <p class="m-t"> <small><br>Examination and Meeting Rooms Schedule Prediction System © 2025. All Rights Reserved </small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="Administrator/js/jquery-2.1.1.js"></script>
    <script src="Administrator/js/bootstrap.min.js"></script>

</body>

</html>



