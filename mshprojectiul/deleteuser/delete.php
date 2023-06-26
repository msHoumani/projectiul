<?php
require_once '../connection/connection.php';

    $username1= $_POST['username'];
    $email= $_POST['email'];
    $psw= $_POST['password'];



$sql_u = "DELETE  FROM users WHERE username='$username1'AND email='$email'AND password='$psw'";
  	
  	$res_u = mysqli_query($connec, $sql_u);
  	
   

  
    
?>