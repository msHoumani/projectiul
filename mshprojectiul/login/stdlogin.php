<?php
session_start();
require_once '../connection/connection.php';

if (isset($_POST['submit'])) {
    $username1 = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $connec->prepare("SELECT * FROM students WHERE username = ?");
    $stmt->bind_param("s", $username1);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        if ($row['password']==$password) {
            $_SESSION['loggeds_in'] = true;
            $_SESSION['username'] = $username1;
            header("location:studentsclasses.php?id= ".$row['id']);
            exit;
        } else {
            echo "Invalid username or password.";
        }
    } else {
        echo "Invalid username or password.";
    }
}
?>