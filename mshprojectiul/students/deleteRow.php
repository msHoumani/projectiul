<?php

$rowsToDelete = $_POST['rows'];

require_once '../connection/connection.php';


foreach ($rowsToDelete as $row) {
  $id = $row[0]; 
  $sql = "DELETE FROM students WHERE id = '$id'";
  $connec->query($sql);
}
$connec->close();
echo 'Rows deleted successfully';
?>
