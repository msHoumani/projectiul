<?php
error_reporting(0);
require_once '../connection/connection.php';
$id=$_POST['id'];
?>
<?php
		$sql = ("SELECT classes.*
		FROM classes
		JOIN teacher_class ON classes.id = teacher_class.classe_id
		WHERE teacher_class.teacher_id = $id");
		$result2=mysqli_query($connec,$sql);
 
		$jsonarray = array();   
		
		$result = array();
		$items=array(); 
        $i=0;
           while($res = mysqli_fetch_object($result2)){   
			$action1="<a href='tclassstd.php?id=$res->id'>Students</a>";
			
			 
			  $jsonarray[$i] = array( 
                  
				  $res->name,
				  $action1,
				  

				 );  
                 $i++;
				
         }  

	    $result['data'] = array_values($jsonarray);
		$items  =   ($result) ;	
		$jsonstring = json_encode($items,JSON_UNESCAPED_UNICODE   );  
		 
echo $jsonstring;?> 
  