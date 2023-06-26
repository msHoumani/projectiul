<?php
require_once '../connection/connection.php';

$id= $_GET['id'];
$idc= $_GET['idc'];


$quiz1 = $_POST['quiz1'];
$quiz2 = $_POST['quiz2'];
$final = $_POST['final'];

$sql = "UPDATE student_class SET quiz1='$quiz1', quiz2='$quiz2', final='$final' WHERE student_id='$id' AND classe_id='$idc'";
$result = mysqli_query($connec, $sql);

if ($result) {
    header('Location: tclassstd.php?id=' . $idc);
    exit;
} else {
    
    echo "Error: " . mysqli_error($connec);
}
?>
