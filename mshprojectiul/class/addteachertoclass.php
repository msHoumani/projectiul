<?php
require_once '../connection/connection.php';
$rowsToAdd = $_POST['rows'];
$cid=$_POST['id'];

foreach ($rowsToAdd as $row) {
    $id = $row[0];
    $sql1="SELECT * FROM teacher_class where teacher_id='$id' AND classe_id='$cid'";
    $resultats=mysqli_query($connec,$sql1);
    if (mysqli_num_rows($resultats) == 0)
 { $sql = "INSERT INTO teacher_class ( teacher_id,classe_id) VALUES ($id ,$cid)";
  mysqli_query($connec, $sql);
  echo json_encode(['success' => true]);
      }
      else{
        echo json_encode(['error' => true ]);
      }
}
$connec->close();


?>
