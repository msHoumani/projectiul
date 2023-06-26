<?php
$rowsToDelete = $_POST['rows'];
require_once '../connection/connection.php';
foreach ($rowsToDelete as $row) {
  $id = $row[0];
  $tableName=$row[1];
  $sql = "DELETE FROM classes WHERE id = '$id'";
  $SQL="DELETE FROM student_class WHERE classe_id='$id'";
  $connec->query($SQL);
  $connec->query($sql);
  
}
$connec->close();
echo 'Rows deleted successfully';
?>
