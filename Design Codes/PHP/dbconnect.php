<?php

$servername = "localhost";
/*$username = "root";
$password = "";*/
$dbname = "filisa";


$username = "root";
$password = "";



$conn = mysqli_connect($servername,$username,$password,$dbname);

if($conn)
{
	echo "";
}
else
{
	die("Connection faild because ".mysqli_connect_error());

	

}
session_start();

?>





