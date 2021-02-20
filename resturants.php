
<!DOCTYPE html>
<html>
<head>
	<title>Filisa Mercy || Online Food Order</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="Design Codes/site.css">
	<link rel="stylesheet" type="text/css" href="Design Codes/CSS/mfp-zoom-in.css">
	<link rel="stylesheet" type="text/css" href="Design Codes/CSS/searchbox.css">
	<link rel="stylesheet" type="text/css" href="Design Codes/CSS/create-acc.css">
	<link rel="stylesheet" type="text/css" href="Design Codes/CSS/ajax-filter.css">
	<link rel="stylesheet" type="text/css" href="Design Codes/CSS/filters.css">
	<link rel="stylesheet" type="text/css" href="Design Codes/CSS/learnmore.css">
	<link rel="stylesheet" type="text/css" href="Design Codes/CSS/resturant.css">
	<link rel="stylesheet" type="text/css" href="Design Codes/CSS/footer.css">
	<link rel="stylesheet" type="text/css" href="Design Codes/CSS/range-bar.css">
	<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
	

	<script src="https://kit.fontawesome.com/5a42cecd69.js" crossorigin="anonymous"></script>
	
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgh3FvZ4ScPIeQcgZFx8YDqhqdUaxsD0M&libraries=places"></script>
	<script src="Design Codes/JavaScripts/popup.js"></script>
	<script src="Design Codes/JavaScripts/toogle.js"></script>
	<script src="Design Codes/JavaScripts/cookies.js"></script>
	<script src="Design Codes/JavaScripts/autocomplete.js"></script>
	<script src="Design Codes/JavaScripts/jquery.js"></script>
	<script src="Design Codes/JavaScripts/ajax-food-search.js"></script>
	<script src="Design Codes/JavaScripts/filter_search.js"></script>



	<style type="text/css">
		
	</style>
</head>
<body>
	<!-- ----------------Header------------------ -->
<?php
	include("header.php");
echo "<style> 
						.login-card{display: none;}
						#cart{display: block;}
						#prfl{display:block;}
						#inline-popups{display: none;}
						</style>";
	if($user_prfl!=true){
 	header('location:index.php'); 
	}
?>

<!-- ---------------Slider -Search -box--------------------- -->
	<div class="search-food-bg">
		<select class="area-select" id="area-select" name="area">
			<?php
			include("Design Codes/PHP/dbconnect.php");
			
			$check=$_GET["location"];
			$query = "SELECT distinct area, dist FROM restaurants where dist= '$check' ";
			$sql = mysqli_query($conn,$query);
            while($row = mysqli_fetch_array($sql))
            {
              $area= $row['area'];
              $dist= $row['dist'];

              echo '<option value="$area">'.$area.'</option>';
            } ?>


		</select>
		
		<input type="text" name="search-food" id="src-food" placeholder="Search for resturants or foods here">
		<a href="#"><button id="button">Search</button></a>
	</div>

	
<!-- --------------------------Ajax Filter Left-------------------------- -->
	<div class="locate-area"><h1>Kandasar, <?php 
	echo $check; ?></h1></div>
	<div class="body-part">
		<div class="filter-body" id="f-1">
		<div class="type-header"><h1>Categories</h1></div>
			<div class="food-type-box">
				<div class="img-container">
					<img src="..\FinalyrProj\LOGO\assets\brkfst.png">
					<img src="..\FinalyrProj\LOGO\assets\lunch.png">
					<img src="..\FinalyrProj\LOGO\assets\dnr.png">
					<img src="..\FinalyrProj\LOGO\assets\cafe.png">
				</div>
				<ul>
					<a href="#" id="brk"><li>Breakfast</li></a>
					<a href="#" id="lnc"><li>Lunch</li></a>
					<a href="#" id="dnr"><li>Dinner</li></a>
					<a href="#" id="cfy"><li>Cofee time</li></a>
					
				</ul>
			</div>
			<div class="type-header"><h1>Food Type</h1></div>
			<div class="food-veg-nonveg-box">
				<div class="img-container">
					<img src="..\FinalyrProj\LOGO\assets\veg.png">
					<img src="..\FinalyrProj\LOGO\assets\non-veg.png">
					
				</div>
				<ul>
					<a href="#" id="veg"><li>Veg</li></a>
					<a href="#" id="non-veg"><li>Non Veg</li></a>
				</ul>
			</div>

			<div class="price-slider">
				<div class="type-header"><h1>Price Range</h1></div>
				
					
				<input type="range" value="500" min="59" max="1599" name="" id="range-bar" class="slide">
				<p id="out"></p>
				
			</div>


			<script>
				
					var slider = document.getElementById("range-bar");
var output = document.getElementById("out");
output.innerHTML = slider.value;

slider.oninput = function() {

output.innerHTML = "19 ₹ to " + this.value + " ₹";

var pr = this.value;
					$.ajax({
                            type:"post",
                            url:"ajax.php",
                            data: {price:pr},
                            success:function(data){
                                $(".restro-list").html(data);
                              
                             }
                          });


}
				

</script>
		</div>
			
<!-- ------------------Filter End----------------------- -->
<?php
	$pr_query ="select * from resturants";
	$pr_result =mysqli_query($conn, $pr_query);
	$total_record = mysqli_num_rows($pr_result);
	$total_page = ceil($total_record/$num_per_page);
	 for($i=1;$i<$total_page;$i++)
	 {
	 	$i=$i;
	 	echo $i;
	 }

?>
		<div class="restro-list" id="r-1">
			<div class="next-prev-box" id="pagination-box">
				<a href="" class="previous">&laquo; Prev</a>
				<a href="" class="next">Next &raquo;</a>
			</div>
			
		
			<?php
	
	include("Design Codes/PHP/dbconnect.php");

if (isset($_GET['pageno'])) {
    $page = $_GET['pageno'];
} else {
    $page = 1;
}
$num_per_page = 8;
$start_from =($page-1)*8;

	 $query = "SELECT * FROM restaurants where dist = '$dist' ORDER BY res_id limit $start_from, $num_per_page";
            
            $sql = mysqli_query($conn,$query);

            $file_path = 'Image Folder/';


         while($row = mysqli_fetch_array($sql))

             { 
             	$rndm_num = $row['rndm_num'];
              $name = $row['res_name'] ;
              $info = $row['res_info'];
              $info2 = $row['res_info2'];
              $img= $file_path.$row['res_img'];
              $area= $row['area'];
              $dist= $row['dist'];
			
			echo '<div id="r-list" >
				<div id="img-box-1">
					<div id="img-box-container">
						<img src="'.$img.'">
					</div>
					<h1>'.$name.'</h1>
					<p id="idp1">'.$info.'</p>
					<p id="idp2">'.$info2.'</p>
				</div>
				<div id="order-btn">
					<a href="buy-foods.php?restaurant='.$rndm_num.'"><button>Order Now ></button></a>
				</div>
			</div>';

				}
             ?>
             
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