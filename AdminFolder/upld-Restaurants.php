<?php
include("../Design Codes/PHP/dbconnect.php");
error_reporting(0);
?>


<!DOCTYPE html>
<html>
<head>
	<title>upload restaurants</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<script src="https://kit.fontawesome.com/5a42cecd69.js" crossorigin="anonymous"></script>
	<style type="text/css">
		body{
			background: #FaFaFa;
		}
		.form-box{
			background: white;
			margin-top: 50px;
			width: 400px;
			height: auto;
			position: absolute;
			left: 50%;
			transform: translateX(-50%);
			border: 1px solid #ccc;
			padding: 10px;
			border-radius: 4px;
			margin-bottom: 50px;
		}
		
		.header-details{
			position: absolute;
			left: 50%;
			transform: translateX(-50%);
			padding-top: 20px;
			font-weight: bold;
		}
	</style>
</head>
<body>
	<nav class="navbar navbar-dark bg-dark">
  
  <a class="navbar-brand" href="#">
   Admin - FilisaMercy
  </a>

</nav>
	
	<label class="header-details">Upload Restaurant Details</label>
<div class="form-box">
	<form action="upld-Restaurants.php" method="post" enctype="multipart/form-data" id="js-upload-form">
		
	
		<label for="exampleInputEmail1">Enter Restaurants name</label>
    	<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="res-name">
		
		<label for="exampleInputEmail1">Restaurant info</label>
    	<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="res-info">

    	<label for="exampleInputEmail1">Restaurant 2nd info</label>
    	<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="res-info2">


		<label for="exampleInputEmail1">Pure Veg</label>

		<select name="pureVeg" class="form-control">
				<option>yes</option>
				<option>no</option>
		</select>
		
		<label for="exampleInputEmail1">Landmark Area</label>
    	<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="area">

		<label for="exampleInputEmail1">District</label>
    	<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="dist">
		
		<label for="exampleInputEmail1">Choose Image file</label>
		<input type="file" name="imagefile" class="form-control"><br>
		
		
		<input type="submit" name="Submit" value="Submit" class="btn btn-success">
		
		<button class="btn btn-danger">Cancel</button>
<?php

mysqli_select_db($conn,"filisa");

if(isset($_POST['Submit']))
	{
 	if ($_FILES['imagefile']['error'] == UPLOAD_ERR_NO_FILE)
		{
		
		echo "No fields or files choosen";

		}
	
	else
		{
		$image_name = $_FILES['imagefile']['name'];
		
		$dir ="../Image Folder/";
		
		$path = $dir.$image_name;

        $tmp = $_FILES['imagefile']['tmp_name'];
		
		$res_name = $_POST['res-name'];
		$res_info = $_POST['res-info'];
		$res_info2 = $_POST['res-info2'];
		$area = $_POST['area'];
		$dist = $_POST['dist'];
		$pureVeg = $_POST['pureVeg'];
		
		$digits = 7;
		$rand_num = rand(pow(10, $digits-1), pow(10, $digits)-1);
		

 		if(($_FILES["imagefile"]["size"] < 1048576))
       
        
    		{
	  		 move_uploaded_file($tmp, $path);
	   
	   		$sql = "INSERT INTO restaurants (rndm_num, res_name, res_info, res_info2, area, dist, veg, res_img) VALUES('$rand_num', '$res_name','$res_info', '$res_info2', '$area', '$dist', '$pureVeg', '$image_name')" ;

	   		if(mysqli_query($conn,$sql))
	   			{
	   			echo "Successfully Uploaded";
	   			}
	   		mysqli_close($conn);

	    	 }
	     
     	else
     		{
     		echo "Image Too Large";
     		}
 		
   
        }

}


?>


	</form>

</div>
	

</body>
</html>