<?php
	ini_set('session.cookie_lifetime', '365*24*3600');
ob_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Filisa Mercy || Online Food Order</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="Design Codes/site.css">
	<link rel="stylesheet" type="text/css" href="Design Codes/CSS/mfp-zoom-in.css">
	<link rel="stylesheet" type="text/css" href="Design Codes/CSS/searchbox.css">
	<link rel="stylesheet" type="text/css" href="Design Codes/CSS/create-acc.css">
	<link rel="stylesheet" type="text/css" href="Design Codes/CSS/blank-ad.css">
	<link rel="stylesheet" type="text/css" href="Design Codes/CSS/learnmore.css">
	<link rel="stylesheet" type="text/css" href="Design Codes/CSS/footer.css">
	<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
	<script src="https://kit.fontawesome.com/5a42cecd69.js" crossorigin="anonymous"></script>
	
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgh3FvZ4ScPIeQcgZFx8YDqhqdUaxsD0M&libraries=places"></script>
	<script src="Design Codes/JavaScripts/popup.js"></script>
	<script src="Design Codes/JavaScripts/toogle.js"></script>
	<script src="Design Codes/JavaScripts/cookies.js"></script>
	<script src="Design Codes/JavaScripts/autocomplete.js"></script>

	<style type="text/css">
		
	</style>
</head>
<body>
	<!-- ----------------Header------------------ -->

	<?php
	include("header.php"); 
	?>
	
<!-- ---------------Slider -Search -box--------------------- -->
	<div class="search-box">
		<div id="slider">
			<img src="LOGO\search-background.jpg">
		</div>
		
		<div id="search-bar">
			<h1>Get food you want.</h1>
			<p>Order for delivery.</p>
			
		</div>
		<div id="bar-box">
			<?php

				if (isset($_POST['submit-btn']))
				{
					$se = $_POST['search'];
					$search = strtok($se, ', ');
					if(!empty($search))
					{

						$sql = "SELECT DISTINCT dist FROM restaurants WHERE dist = '$search' ";
					$result=mysqli_query($conn,$sql);
      				 $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      				$numrows = mysqli_num_rows($result);
 					
 						if($numrows>0) {
 						
 							$s_dist=$row['dist'];
 							
 							if($user_prfl==true){
 								
 								
 								
 								header('location:resturants.php?location='.$s_dist); 
 								$_SESSION['dist']= $s_dist;

							}
							else
								{
								echo "<style> .login-card{
							display: block;
						</style>";}
						 		 	
							}
						else {
        					 echo "<script>
 							alert('Not found !');
 							</script>";
      						}
					}
						
      				else
 					{
 					echo "<script>
 					alert('empty');
 					</script>";
 					}
 					
 					
 				}

		
		?>

					
		
					<form action="" method="post" name="search-form" id="search-form">
					<input type="text" id="search-input" name="search" placeholder="Let's starts with your district">
					<input type="submit" name="submit-btn" value="Get restaurants">
		</form>
				
				<script>
					function init() 
{
  var input = document.getElementById('search-input');
  var autocomplete = new google.maps.places.Autocomplete(input);
  }

  google.maps.event.addDomListener(window, 'load', init);
				</script>
			</div>
	</div>	
<!-- --------------------------Content-------------------------- -->
	<div class="demo-store-bg">
		<p id="head">Featured Picks on Filisamercy</p>
		
		<div id="adzz-box">
			<div id="img-box"><img src="../LOGO/13.jpeg"></div>
			<h1>Bareburger Park Slope</h1>
			<p id="info">Organic & All-Natural Burgers, Snacks, & Shakes.</p>
			<p id="time">25-30min</p>
		</div>
		<div id="adzz-box">
			<div id="img-box"><img src="..\Image Folder\daqnolh4.jpg"></div>
			<h1>Bareburger Park Slope</h1>
			<p id="info">Organic & All-Natural Burgers, Snacks, & Shakes.</p>
			<p id="time">25-30min</p>
		</div>
		<div id="adzz-box">
			<div id="img-box"><img src="..\Image Folder\daqnolh4.jpg"></div>
			<h1>Bareburger Park Slope</h1>
			<p id="info">Organic & All-Natural Burgers, Snacks, & Shakes.</p>
			<p id="time">25-30min</p>
		</div>
		<div id="adzz-box">
			<div id="img-box"><img src="..\Image Folder\daqnolh4.jpg"></div>
			<h1>Bareburger Park Slope</h1>
			<p id="info">Organic & All-Natural Burgers, Snacks, & Shakes.</p>
			<p id="time">25-30min</p>
		</div>
		
	</div>
	
<div class="blank"></div>

<div class="learn-more">
	<div id="resto"><img src="..\LOGO\chef-hat.png"></div>
	<div id="deliv"><img src="..\LOGO\delivery.png"></div>
	<div id="info-card">
		<div id="restro-info"><p>Resturant? Connect with us.</p><div id="p2">
			Increase your sales, reach new customers, and grow your corporate catering. There are no up-front costs and we handle all the logistics.
			</div>
			<a href="#">Learn More ></a>
		</div>
		
		<div id="deliv-info"><p>Express deliver by Filisamercy.</p>
			<div id="p3">
			Deliver food in your city and earn some extra cash. Experience the freedom of working whenever you want. Lets connects with us and earn money.
			</div>
			<a href="#">Learn More ></a>
		</div>
	
	</div>
	
</div>
<!-- --------------------------Footer-------------------------- -->
<footer id="foot">
	<div class="foot-card">
		<div id="upper-foot">
			<div id="links">
			<p>About Filisamercy</p>
			<ul>
				<li><a href="#">About Us</a></li>
				<li><a href="#">Blog</a></li>
				<li><a href="#">Contact</a></li>
				<li><a href="#"> Careers</a></li>
			</ul>
			</div>
			
			<div id="b-links">
				
				<a href="#"><div id="btn1">For Companies<i class="fas fa-caret-right"></i></div></a>
				<a href="#"><div id="btn2">For Resturants<i class="fas fa-caret-right"></i></div></a>

			    
			</div>
		</div>
		<div id="lower-foot">
			<img src="../FinalyrProj/LOGO/Logo2.png">
		</div>
		
		<div id="for-rest"></div>
		<div id="clicks"></div>
	</div>

	<a href="#"><div id="back-top"><i class="fas fa-arrow-up"></i></div></a>
</footer>

		<script>
var modal = document.getElementById('id01');
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
	<script>
var modal = document.getElementById('id02');
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>


</body>
</html>