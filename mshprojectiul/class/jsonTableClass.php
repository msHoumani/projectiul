<?php
error_reporting ( 0 );
require_once '../connection/connection.php';
?>
<?php
		$sql = " SELECT *FROM  classes";
		$result2 = mysqli_query($connec, $sql);
		$jsonarray = array();   
		$result = array();
		$items=array(); 
        $i=0;
           while($res = mysqli_fetch_object($result2)){   
			 $action="<a href='editclass.php?id=$res->id'>Edit</a>";
			 $action1="<a href='classstudents.php?id=$res->id'>Students</a>";
			 $action2="<a href='studenttoclass.php?id=$res->id'>ADD TO CLASS</a>";
			 $action3="<a href='classteachers.php?id=$res->id'>teachers</a>";
			 $action4="<a href='teachertoclass.php?id=$res->id'>ADD TO CLASS</a>";
			  $jsonarray[$i] = array( 
                  $res->id,
				  $res->name,
				  $res->stdnb,
				  $action,
				  $action1,
				$action3,
				$action2,
				$action4);  
                 $i++;	
         }  

	    $result['data'] = array_values($jsonarray);
		$items  =   ($result) ;	
		$jsonstring = json_encode($items,JSON_UNESCAPED_UNICODE   );   
echo $jsonstring;?> 
  