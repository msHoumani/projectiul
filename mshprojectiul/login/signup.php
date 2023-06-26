<?php
require_once '../connection/connection.php';

    $username1= $_POST['username'];
    $email= $_POST['email'];
    $psw= $_POST['password'];
    $hashedPassword = password_hash($psw, PASSWORD_DEFAULT);
    


$sql_u = "SELECT * FROM users WHERE username='$username1'";
  	$sql_e = "SELECT * FROM users WHERE email='$email'";
  	$res_u = mysqli_query($connec, $sql_u);
  	$res_e = mysqli_query($connec, $sql_e);
     

    if (mysqli_num_rows($res_u) > 0) {
  	  echo false; 	
  	}else if(mysqli_num_rows($res_e) > 0){
  	  echo false;
    }
      else{
    $sql1 = "INSERT INTO users ( username,email, password) VALUES ('$username1' ,'$email','$hashedPassword' )";
    $rs = mysqli_query($connec, $sql1);
    echo true;
   
      }
   

  
    
?>