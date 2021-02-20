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
	
	<label class="header-details">Upload Foods Details</label>
<div class="form-box">
	<form action="foods-entry.php" method="post" enctype="multipart/form-data" id="js-upload-form">
		
	<label >Choose District</label>
    	<select class="form-control" name="dist" id="distID">
    		 <?php
           
            $query = "SELECT DISTINCT dist FROM restaurants";
            $sql = mysqli_query($conn,$query);
            while($row = mysqli_fetch_array($sql))
            {
              $dist= $row['dist'];
              ?>
				<option value="<?php echo $dist; ?>"><?php echo $dist; ?></option>
			<?php 
				}	
			 ?>
		</select>
		
		<label >Choose Restaurant</label>
    	
    	<select class="form-control" name="res" id="rest">
    		 
		<option value="">Select</option>

		</select>
		
		<label >Food</label>
    	<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="food1">


		<label>Veg type</label>

		<select name="pureVeg" class="form-control">
				<option>yes</option>
				<option>no</option>
		</select>
		
		<label >Food Price</label>
    	<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="price"><br>
		
		<input type="submit" name="Submit" value="Submit" class="btn btn-success">
		
		<button class="btn btn-danger">Cancel</button>
		
		<script>
			$(document).ready(function(){
				$('#distID').on('change', function(){
					var val = $(this).val();
					if (val) {

						$.ajax({
           				 type:"POST",
           				 url:"ajax2.php",
            			data:{dist:val},
            			dataType:"text",
           				 success:function(data)
           				 	{
           				  		$('#rest').html(data);
                            }

        				});

					}else{

						$('#rest').html('<option value="">Val not found</option>');

					}
       				 
				});
			});
		</script>

<?php

mysqli_select_db($conn,"filisa");

if(isset($_POST['Submit']))
	{
		$res_check= $_POST['res'];
		$query = "SELECT rndm_num FROM restaurants where res_name='$res_check'";
            $sql = mysqli_query($conn,$query);
            $row = mysqli_fetch_array($sql);
            
        
        $num= $row['rndm_num'];
 		$res_id = $num;
		$food = $_POST['food1'];
		$veg = $_POST['pureVeg'];
		$price = $_POST['price'];
		
	   		$sql = "INSERT INTO foods (res_id, foods, price, veg) VALUES('$res_id', '$food','$price', '$veg')" ;

	   		if(mysqli_query($conn,$sql))
	   			{
	   			echo "Successfully Uploaded";
	   			}
	   		mysqli_close($conn);

	 }


?>


	</form>

</div>
	

</body>
</html>