<?php
error_reporting(0);
require_once '../connection/connection.php';
$id=$_POST['id'];
?>
<?php
		$sql = ("SELECT students.*
		FROM students
		JOIN student_class ON students.id = student_class.student_id
		WHERE student_class.classe_id = $id");
		$result2=mysqli_query($connec,$sql);
		$jsonarray = array();   
		$result = array();
		$items=array(); 
        $i=0;
           while($res = mysqli_fetch_object($result2)){   
			  $jsonarray[$i] = array( 
                  $res->id,
				  $res->lname,
				  $res->fname,
				  $res->email,
				  $res->phonenb
				 );  
                 $i++;		
         }  

	    $result['data'] = array_values($jsonarray);
		$items  =   ($result) ;	
		$jsonstring = json_encode($items,JSON_UNESCAPED_UNICODE   );  
		 
echo $jsonstring;?> 

  