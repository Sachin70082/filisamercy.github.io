<?php
session_start();
//Including Database configuration file.

include("Design Codes/PHP/dbconnect.php");

error_reporting(0);

//Getting value of "search" variable from "script.js".


//Search box value assigning to $Name variable.
   
$check=$_SESSION['dist'];
   $Name = $_POST['search'];
   $price=$_POST['price'];
   $area = $_POST['location'];
  /*  */
//Search query.

   $Query = "SELECT * FROM restaurants WHERE res_name LIKE '%$Name%' or res_info LIKE '%$Name%' or res_info2 LIKE '%$Name%' or category LIKE '%$Name%' or veg LIKE '%$Name%' and dist='$check' and area='$area' ";

//Query execution

   $ExecQuery = MySQLi_query($conn, $Query);

//Creating unordered list to display result.


   //Fetching result from database.
   $file_path = 'Image Folder/';

   while ($row = MySQLi_fetch_array($ExecQuery,MYSQLI_ASSOC) ) {
              $rndm_num= $row['rndm_num'];
              $name = $row['res_name'] ;
              $info = $row['res_info'];
              $info2 = $row['res_info2'];
            $new_dist = $row['dist'];
            $u_price = $row['price'];
             $under_price = (double)$u_price;
               
               $img= $file_path.$row['res_img'];

             /* if ($under_price<=$undr_price) {
                            
             }*/
        if ($under_price>=$price && $new_dist==$check){

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




    }



?>

