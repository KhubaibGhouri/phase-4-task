<?php



   $host="localhost";
     $db_name="victorts_docter";
     $user_name="victorts_docter";
     $password="Kkl7+Xn$]f{k";


try{
$db = new PDO("mysql:host=$host;dbname=$db_name" , "$user_name" , "$password");

//echo "connected";
}
catch(Exception $e){
  //  echo $e->getMessage();
}

class crud 
{
	    
		public function insert($tableName , $params=array())
			{
				global $db;  
       		$query='INSERT INTO `'.$tableName.'` (`'.implode('`, `',array_keys($params)).'`) VALUES ("' . implode('", "', $params) . '")';      
     		$stmt = $db->prepare($query);
       		$stmt->execute();
       		
       		}

    	public function query($query)
    		{
    			global $result;
    			global $db;  
          global $num_rows;
  			$stmt = $db->prepare($query);
       $stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   $num_rows=$stmt -> rowCount();
     
 			}

        public function update($table ,$params=array(),$where)
        	{
        		global $db;
			$args=array();
			foreach($params as $field=>$value){
				// Seperate each column out with it's corresponding value
				$args[]=$field.'="'.$value.'"';
			}
    		$query='UPDATE '.$table.' SET '.implode(',',$args).' WHERE '.$where;
    		$stmt = $db->prepare($query);
        	$stmt->execute();
       		}

       		public function delete($table,$where = null){
       			global $db;
    	    $query = 'DELETE FROM '.$table.' WHERE '.$where; 
            $stmt = $db->prepare($query);
       		$stmt->execute();
       		if ($stmt->execute() === TRUE) {
				 //  echo "Record deleted successfully";
				} else {
    					//echo "Error deleting record";
    					}
				}
				

}











?>