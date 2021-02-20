<?php 

error_reporting();
?>

    <!DOCTYPE html>
<html>
<head>
	<title>Filisa Mercy || Online Food Order</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link rel="stylesheet" type="text/css" href="Design Codes/CSS/buy-foods.css">
	<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
        <link rel="stylesheet" type="text/css" href="Design Codes/CSS/footer.css">
        <link rel="stylesheet" type="text/css" href="Design Codes/site.css">
        <link rel="stylesheet" type="text/css" href="Design Codes/CSS/searchbox.css">
    <link rel="stylesheet" type="text/css" href="Design Codes/CSS/create-acc.css">
	<script src="https://kit.fontawesome.com/5a42cecd69.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="Design Codes/JavaScripts/popup.js"></script>
  <script src="Design Codes/JavaScripts/toogle.js"></script>
	
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

 <!-- ----------------BODY------------------ -->
<br><br>
    


    <?php
                 foreach ($_SESSION["shopping_cart"] as $key => $values) {

                     $total += $values["item_price"];
                 
              ?>
    <div class="card" style="margin-left: 20%;margin-right: 20%;">
  <div class="card-body">
   <?php echo $values["item_name"]; ?><h5 style="float: right;margin-right: 5%;">₹ <?php echo $values["item_price"]; ?> /-</h5>
  </div>
</div>
<?php } ?>

<hr style="width:70%;background:#aaa;">
<h3 style="float: right;margin-right: 25%;">Sub total : ₹ <?php echo $total; ?> /-</h3>
<a href="buy-foods.php?restaurant=<?php echo $values["res_id"]; ?>" class="btn btn-warning btn-lg btn-block" style="width: 20%;margin-left: 25%;">Add item</a>
<button type="button" class="btn btn-warning btn-lg btn-block" style="width: 20%;margin-left: 25%;">Place order</button>



</body>

</html>