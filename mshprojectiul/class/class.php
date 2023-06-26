<?php
require_once '../connection/connection.php';
    $Name= $_POST['Name'];
    $stdnb= $_POST['stdnb'];
    $sql_u = "SELECT * FROM classes WHERE Name='$Name' " ;
    $res_u = mysqli_query($connec, $sql_u);
  if (mysqli_num_rows($res_u) > 0){
    echo false;
  }
    else{
        $sql1 = "INSERT INTO classes ( Name,stdnb) VALUES ('$Name','$stdnb')";
    $rs = mysqli_query($connec, $sql1);
        echo true;
            }