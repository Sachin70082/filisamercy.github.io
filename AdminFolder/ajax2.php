<?php
include("Design Codes/PHP/dbconnect.php");

error_reporting(0);

   $Query = "SELECT res_name FROM restaurants WHERE dist=".$_POST["dist"]"";

   $ExecQuery = MySQLi_query($conn, $Query);

   while ($row = MySQLi_fetch_array($ExecQuery,MYSQLI_ASSOC) ) 
          {
              $res_name= $row['res_name'];
              
              $out = '<option value="'.$res_name.'">'.$res_name.'</option>';
              
          }
       echo $out;
      
?>       