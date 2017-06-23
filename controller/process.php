<?php
error_reporting(1);
require_once '../models/crud_db.php';
$obj = new crud() ;
if($_POST['btnManage']=="insert")
{
	$firstname     = $_POST['firstname'];
	$lastname      = $_POST['lastname'];
	$address     = $_POST['address'];
	$address2      = $_POST['address2'];
	$dateofbirth = $_POST['dateofbirth'];
	$phone       = $_POST['phone'];
	$email       = $_POST['mail'];
	$Alcohollevel  = $_POST['Alcohollevel'];
	$procedure   = $_POST['proceduredate'];
	$status      = $_POST['status'];
	$City        = $_POST['City'];
	$country     = $_POST['country'];
	if($country == "United States"){
        $State       = $_POST['State'][0];
	}else{
  $State       = $_POST['State'][1];
	}
	
  
    $Zip         = $_POST['Zip'];
    $Gender      = $_POST['gender'];
    $Userid      = $_POST['userid'];
	
	$cron_update = $_POST['cron_update'];
	
	 $obj->query("SELECT * from patients where LOWER(`userid`) = LOWER('".$Userid."') or (dateofbirth = '".$dateofbirth."' and email ='".$email."') or email ='".$email."' ");
 if($num_rows > 0)
  {
    $errors[] = "User Id exist"; 
  
  header("Location:../admin_index.php?a=error");
  
  }else{
	
	
  $qry="insert into patients (

			firstname,
			lastname,
			address,
			address2,
			dateofbirth,
			phone,
			email,
			Alcohollevel,
			proceduredate,
			status,
			City,
			State,
			Zip,
			gender,
			userid,
			admin_staus,
            country,
		    cron_update
			) 
			values 
			(

			'$firstname',
			'$lastname',
			'$address',
			'$address2',
			'$dateofbirth',
			'$phone',
			'$email',
			'$Alcohollevel',
			'$procedure',
			'$status',
			'$City',
			'$State',
			'$Zip',
			'$Gender',
			'$Userid',
			'0',
            '$country',
		    '$cron_update'
			)";
			
			 $obj->query($qry);
  header("Location:../admin_index.php?a=done");
}
}

?>