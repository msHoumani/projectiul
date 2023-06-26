
<?php
require_once '../connection/connection.php';
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
   
    header('Location: ../login/login1.php');
    exit;
}
 
$id = $_GET['id'];
$sql_u = "SELECT * FROM classes where id='$id'" ;
$resu= mysqli_query($connec,$sql_u);
$row = $resu->fetch_assoc();
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
    <h1>Students registry</h1>
    <div class="container"><form class="login" method="POST" action="edit.php?id=<?php echo $id; ?>" id="myform">
        <div class="input">
            <input type="text" required placeholder="Name" name="Name" label="Name" value="<?php echo$row['name']?>">
        </div>
        <div class="input">
                <input type="number" required placeholder="students number" name="stdnb" minlength="1" value="<?php echo$row['stdnb']?>"
                maxlength="2">
        </div> 
        <button class="submit" type="submit" name="submit" value="submit" id="submit">
            <span >Edit Class</span>
            
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