<?php

$servername = "sql12.freemysqlhosting.net:3306";
/*$username = "root";
$password = "";*/
$dbname = "sql12394197";


$username = "sql12394197";
$password = "SC7pcytcBy";



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





