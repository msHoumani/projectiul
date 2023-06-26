<?php require_once '../connection/connection.php';
$id=$_GET['id'];
$cnquery="SELECT * FROM classes where id='$id'";
$res=mysqli_query($connec,$cnquery);
$row = $res->fetch_assoc();
$CN = $row['name'];

session_start();


if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {

    header('Location: ../login/login1.php');
    exit;
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css"/>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.flash.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
    <link rel="stylesheet" href="..\DataTables\datatables.min.css">
    <script src="..\DataTables\datatables.min.js"></script>
    <link rel="stylesheet" href="../styles/student.css">
    <link rel="stylesheet" href="../styles/styles.css">
    <title>teachers</title>
</head>
<body>
        <ul>
        <li><a href="../students/studentsregister.php">Students</a></li>
            <li><a href="../teachers/teachersregister.php">teachers</a></li>
            <li><a href="../class/createclass.php">Classes</a></li>
            <li><a href="../login/logout.php">log out</a></li>
        </ul>
    <section>
        <h1><?php echo $CN;?>'teachers</h1>
        <table  id='mytable' class='table table-bordered table-striped table-hover' width='100%' >
        <thead style='background:#f1f1f1;color:black;'>
        <tr> 
        <th>id</th>
        <th>FirstName</th> 
        <th>LastName</th> 
        <th>email</th>
        <th>phonenb</th>    
        </tr>
        </thead>
	  </table>
    </section>
</body>
</html>
<script>
    $(document).ready(function() { 
        var table = $('#mytable').DataTable({
	dom: 'Bfrtip',
        buttons: [
             'excel', 'pdf',
        ],
        ajax: {
   url: "jsonTableclassteachers.php",
   type: "POST",
   data: function(d) {
      d.id = <?php echo $id; ?>;
   }
},				 
 footerCallback: function ( row, data, start, end, display ) {  
	 },
				 select: true,
				 keys: true,
				 iDisplayLength : 6,
				 order: [0,'desc'],
                 columnDefs: [     
        ]
			 });
    });
</script>
