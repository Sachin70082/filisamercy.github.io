<?php
 session_start();

 $check = $_GET['restaurant'];
 $itemid= $_GET['id'];
    foreach ($_SESSION['shopping_cart'] as $key => $values) {
      if ($values["item_code"]==$itemid) 
      {
        unset($_SESSION['shopping_cart'][$key]);
       }
      
    }
    header("location: buy-foods.php?restaurant=$check");
 ?>