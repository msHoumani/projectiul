<?php
require_once '../connection/connection.php';
$id=$_GET['id'];
    $name=$_POST['Name'];
    $stdnb=$_POST['stdnb'];
    $sql="SELECT * from classes where id='$id'";
    $res=mysqli_query($connec, $sql);
    $row = mysqli_fetch_assoc($res); 
    $sql1 = "UPDATE classes set name='$name',stdnb='$stdnb' where id='$id'";
    mysqli_query($connec, $sql1);
    header('location:createclass.php');