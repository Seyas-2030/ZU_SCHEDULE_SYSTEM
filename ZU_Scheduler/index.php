<?php
session_start();

include 'includes/config.php';

	$Error ='';




if(isset($_POST['Submit']))
{
	
$Year=$_POST['Year'];
$Semester=$_POST['Semester'];
$Department=$_POST['Department'];


echo '<script language="JavaScript">
            document.location="index-2.php?Department='.$Department.'&Year='.$Year.'&Semester='.$Semester.'";
        </script>';	

}





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
            <form class="m-t" role="form" method="post" action="index.php">
                <div class="form-group">
                   <input type="text" class="form-control" placeholder="Year" name="Year" required="">
                </div>
				



                <div class="form-group">
                		<select name="Semester"  class="form-control required" title="Semester" required>
   <option disabled selected value>Select Semester</option>


 <option value="First">First</option>
 <option value="Second">Second</option>
 <option value="Summer">Summer</option>

</select>

				</div>
				
				
				
				
				
				  <div class="form-group">
                		<select name="Department"  class="form-control required" title="Department" required>
   <option disabled selected value>Select Department</option>


<option value="تكنولوجيا المعلومات">تكنولوجيا المعلومات </option>

</select>

				</div>
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
					
                <button type="submit" name="Submit" class="btn btn-primary block full-width m-b btn-lg">Select</button>
			
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



