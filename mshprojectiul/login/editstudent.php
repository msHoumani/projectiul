
<?php
require_once '../connection/connection.php';

session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: ../login/login1.php');
    exit;
}
$idc=$_GET['idc'];
$id = $_GET['id'];
$sql_u = "SELECT students.*, student_class.*
          FROM students
          JOIN student_class ON students.id = student_class.student_id
          WHERE student_class.classe_id = $idc
          AND students.id = $id";
$resu= mysqli_query($connec,$sql_u);
$row = $resu->fetch_assoc();
$quiz1Value = $row['quiz1'];
$quiz2Value = $row['quiz2'];
$finalValue = $row['final'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/student.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <link rel="stylesheet" href=".\DataTables\datatables.min.css">
    <script src=".\DataTables\datatables.min.js"></script>

   
    <title>Edit Student informations</title>
</head>
<body>
    <h1><?php echo$row['fname'].$row['lname']."Grades"?></h1>
<div class="container"><form class="login" method="POST" action="edit.php?id=<?php echo $id; ?>&idc=<?php echo $idc; ?>" id="myform" >
       <div class="input">
                    <input type="number" required placeholder="quiz1" name="quiz1"value="<?php echo $quiz1Value;?>" >
         </div> 
         <div class="input">
                    <input type="number" required placeholder="quiz2" name="quiz2"value="<?php echo $quiz2Value;?>" >
         </div> 
        
        <div class="input">
                    <input type="number" required placeholder="final" name="final"value="<?php echo $finalValue;?>" >
         </div> 
        <button class="submit" type="submit" name="submit" value="submit" id="submit">
            <span >edit student</span>
            
        </button>	
    </form>
    </div>
</body>
</html>
<script>
    $(document).ready(function() { 
$("#myform").submit(function(e){
    e.preventDefault();
      console.log($(this).serializeArray());
      $.ajax({
          url : '$(this).attr('action')' ,
          type: 'POST',
          data: $(this).serializeArray(),
          success: function (data) { 
            if((data)){ 	
              Swal.fire({
              icon: 'success',
              title: 'Success',
              text: 'Student successfully Inserted',
            })
            }else{ 
                Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Something went wrong!',
                footer: '<a href="">Why do I have this issue?</a>'
                })              
            }
          },
          
      });
  });
})
  </script>