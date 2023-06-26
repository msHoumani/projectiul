<?php 
$host = "localhost";
$username = "root";
$password = "";
$dbname= "form";
$connec=mysqli_connect($host,$username,$password,$dbname);

if (!$connec)
{
die("connection failed".mysqli_connect_error());
}
?>