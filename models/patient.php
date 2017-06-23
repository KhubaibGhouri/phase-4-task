<?php
	require_once 'DbConnect.php';
	class patient extends DbConnect
	{
		public function insert(
			$firstname,   
			$lastname,    
			$address,     
			$address2,    
			$dateofbirth, 
			$phone,       
			$email,       
			$Alcohollevel,
			$procedure,   
			$status,      
			$City,        
			$State,       
			$Zip,         
			$Gender,      
			$Userid,
			 $country,
		    $cron_update 
			)
		{
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

			return $this->ExecuteQry($qry);
		}

		public function allpatients(){
			$qry="select * from patients";
			return $this->GetData($qry);
		}
	}
?>