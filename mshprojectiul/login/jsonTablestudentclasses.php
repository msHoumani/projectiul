<?php
error_reporting(0);
require_once '../connection/connection.php';
$id=$_POST['id'];
?>
<?php
		$sql = ("SELECT classes.*,student_class.*
		FROM classes
		JOIN student_class ON classes.id = student_class.classe_id
		WHERE student_class.student_id = $id");
		$result2=mysqli_query($connec,$sql);
 
		$jsonarray = array();   
		
		$result = array();
		$items=array(); 
        $i=0;
           while($res = mysqli_fetch_object($result2)){  
			$action= 
			 
			  $jsonarray[$i] = array( 
                  
				  $res->name,
				  $res->quiz1,
				  $res->quiz2,
				  $res->final,


				 );  
                 $i++;
				
         }  

	    $result['data'] = array_values($jsonarray);
		$items  =   ($result) ;	
		$jsonstring = json_encode($items,JSON_UNESCAPED_UNICODE   );  
		 
echo $jsonstring;?> 
  