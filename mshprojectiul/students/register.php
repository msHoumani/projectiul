<?php
require_once '../connection/connection.php';


    $fname= $_POST['fname'];
    $lname=$_POST['lname'];
    $email= $_POST['email'];
    $phonenb= $_POST['phonenb'];
    $username=substr($fname, 0, 1).substr($lname, 0, 1).$phonenb;
    $password="password";

    $sql1 = "INSERT INTO students ( fname,lname,email,phonenb,username,password) VALUES ('$fname','$lname','$email','$phonenb','$username','$password' )";
    $rs = mysqli_query($connec,$sql1);
  echo true  
?>