<?php 

      error_reporting();
ob_start();
  $check = $_GET["restaurant"];
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

    <?php 

 if (isset($_POST['add_to_cart'])) {
 
       $item_array= array_column($_SESSION["shopping_cart"], "item_id");
                  if (!in_array($_GET["sl"], $item_array_id)) {
                    $count = count($_SESSION["shopping_cart"]);
                     $item_array = array(
                      'res_id' => $_GET["restaurant"],
                           'item_id' => $_GET['sl'],
                            'item_code' => $_POST['hidden_sl'],
                           'item_name' => $_POST['hidden_name'],
                           'item_price' => $_POST['hidden_price'],
                           'item_qty' => $_POST['qty']);
                     
                     $_SESSION["shopping_cart"][$count] = $item_array;
                 }

                  else{

                      echo "ITEM ALREADY ADDED";

                    }

          

         }
  ?>

    
<!-- ------------------------------Body Content------------------------ -->
	<div class="cart-box" id="cart-box">
		<div class="content-cart" id="content-cart">
            <div class="item-box">
                 
                 <?php
                 foreach($_SESSION['shopping_cart'] as $key => $values) {

                     $total += $values["item_price"];
                 
              ?>
                <div class="item" id="item">
                    <p><?php echo $values["item_name"].' - ₹ '.$values["item_price"] ?></p>
                    <p id="qtyText">Qty 
                    <input type="text" name="qty" value="1" min="1" max="100" readonly>
                    <a href="removeitem.php?restaurant=<?php echo $check; ?>&id=<?php echo $values["item_code"]; ?>">X</a>
                    
                  </p>
                         
                </div>
                
               <?php } ?>
                
            </div>  
            
            <div class="total-price">
                <h4>Total : <?php echo $total ?></h4>
                <form action="Order.php?restaurant=<?php echo $check; ?>&id=<?php echo $values["item_code"]; ?>">
                <input type="submit" name="checkout" id="checkout" value="Order now">
                </form>
            </div>    
        </div>
	</div>
	
	<div class="wrapper">
		<div class="resname-box">
			<div class="upper-box">
				<h1><?php
        $query = "SELECT * FROM restaurants WHERE rndm_num='$check' ";
            $sql = mysqli_query($conn,$query);
            $row = mysqli_fetch_array($sql);
          
              
            echo $row['res_name'];

         ?></h1>
			</div>
			<div class="lower-box"></div>
		</div><br>
		<div class="food-cat"></div><br>


		
        <?php

     
           
            $query = "SELECT * FROM foods WHERE res_id='$check' ";
            $sql = mysqli_query($conn,$query);
            while($row = mysqli_fetch_array($sql))
            {
              
              $foods= $row['foods'];
              $price= $row['price'];

              ?>
		
        <div class="food-box">
          
			             <p><i class="far fa-dot-circle"></i>&nbsp &nbsp &nbsp &nbsp <?php echo $foods; ?>&nbsp &nbsp &nbsp &nbsp <?php echo '₹ '.$price ?></p>
                
                <form action="buy-foods.php?restaurant=<?php echo $check; ?>" method="POST">
                    <input type="hidden" name="hidden_sl" value="<?php echo $row["sl"]; ?>">
                    <input type="hidden" name="hidden_name" value="<?php echo $row["foods"]; ?>">
                    <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
                    <input type="submit" name="add_to_cart" value="Add" id="add">
                    
            </form>
        

               
		</div>
		
      
  <?php } ?>  



	</div>
<!-- ------------------------------Footer----------------------------- -->

</body>
</html>