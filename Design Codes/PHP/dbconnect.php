<?php

$servername = "sql12.freemysqlhosting.net:3306";

/*$username = "root";
$password = "";*/

$dbname = "sql12560441";


$username = "sql12560441";
$password = "m4LPAcQb4h";



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





