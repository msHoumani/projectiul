<?php
require_once '../connection/connection.php';

$id=$_GET['id'];


    
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    
    $email=$_POST['email'];
    $phonenb=$_POST['phonenb'];
    $usernames=$fname[0].$lname[0].substr($phonenb,0,6);

    $sql1 = "UPDATE teachers set fname='$fname',lname='$lname',email='$email',phonenb='$phonenb',username='$usernames ' where id='$id'";
    $rs = mysqli_query($connec, $sql1);
    header('location:teachersregister.php');
    ?>