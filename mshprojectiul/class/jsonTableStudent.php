<?php
error_reporting ( 0 );
require_once '../connection/connection.php';
$ID=$_GET['id'];
$csql='SELECT students.*
FROM students
JOIN student_class ON students.id = student_class.student_id
WHERE student_class.classe_id != $id") '
 ?>
<?php

        $sql="SELECT *FROM students";
		$result2 = mysqli_query($connec, $sql);
 
		$jsonarray = array();   
		
		$result = array();
		$items=array(); 
        $i=0;
           while($res = mysqli_fetch_object($result2)){   
			 $action="<a href='editstudent.php?id=$res->id'>Edit</a>";
			  $jsonarray[$i] = array( 
                  $res->id,
				  $res->fname,
				  $res->lname,
				  $res->email,
				  $res->phonenb,
				  $action);  
                 $i++;
				
         }  

	    $result['data'] = array_values($jsonarray);
		$items  =   ($result) ;	
		$jsonstring = json_encode($items,JSON_UNESCAPED_UNICODE);  
		 
echo $jsonstring;?> 
  