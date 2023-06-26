
<?php require_once '../connection/connection.php';

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
    

    <h1>Class teachers registry</h1>
    <div class="container"><form class="login" method="POST" action="" id="myform">
        <div class="input">
            <input type="text" required placeholder="FirstName" name="fname" label="First Name" pattern="[A-Za-z]+">
        </div>
        <div class="input" >
            <input type="text" required placeholder="LastName" name="lname" label="lname"pattern="[A-Za-z]+">
        </div>
        <div class="input">
                <input type="number" required placeholder="phone number" name="phonenb" minlength="8"
                maxlength="8">
        </div>
        <div class="input">
                    <input type="email" required placeholder="Email" name="email" >
         </div> 
        <button class="submit" type="submit" name="submit" value="submit" id="submit">
            <span >Add teacher</span>
            
        </button>	
    </form>
    </div>
 

    <section>
        <h1>teachers</h1>
        <table  id='mytable' class='table table-bordered table-striped table-hover' width='100%' >
        <thead style='background:#f1f1f1;color:black;'>
        <tr> 
        <th>id</th>
        <th>FirstName</th> 
        <th>LastName</th> 
        <th>email</th>
        <th>phonenb</th>
        <th>Action</th>
        </tr>
        </thead>
	  </table>
    </section>


</body>
</html>
<script>
    $(document).ready(function() { 
$("#myform").submit(function(e){
    e.preventDefault();
      console.log($(this).serializeArray());
      $.ajax({
          url : "register.php",
          type: 'POST',
          data: $(this).serializeArray(),
          success: function (data) { 
            if((data)){ 	
              Swal.fire({
              icon: 'success',
              title: 'Success',
              text: 'teacher successfully Inserted',
            })
              var table = $("#mytable").DataTable();
              table.ajax.reload();
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
        var table = $('#mytable').DataTable({
	dom: 'Bfrtip',
        buttons: [
             'excel', 'pdf', {
       text: 'Delete',
        action: function(e, dt, node, config) {
          var selectedRows = dt.rows({ selected: true }).indexes();
          var selectedData = dt.rows(selectedRows).data().toArray();
          
          $.ajax({
            url: 'deleteRow.php',
            type: 'POST',
            data: { rows: selectedData },
            success: function(response) {
              
              dt.rows(selectedRows).remove().draw(false);
            },
            error: function(xhr, status, error) {
              console.error('Error deleting rows:', error);
            }})
        }
    }
             
        
        ],
        
				 ajax:{
					 url: "jsonTableteachers.php", 
					 type: "POST",
          
					 data: function(d) {
					
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
