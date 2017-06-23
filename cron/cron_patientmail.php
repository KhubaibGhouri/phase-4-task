<?php
$nameh     = 'localhost';
$username = 'victorts_docter';
$password = 'Kkl7+Xn$]f{k';
$database = 'victorts_docter';


$con = new mysqli($nameh, $username, $password, $database);
if (!$con) {
	die("Connection Failed to Database");
}
$result = "SELECT * FROM  patients where cron_update != 0 and password != '' ";
$sql = $con->query($result);
$subject = 'Esperal cloud Maintenance' ;
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= "From: attention@myesperal.com" . "\r\n";
if ($sql->num_rows > 0) {
    while($row = $sql->fetch_assoc()) {
    	 $to = $row['email'];
		$message = 'Dear Esperal patient, today we will be performing maintenance on our Esperal cloud server on. During this time, our Esperal software will be unavailable. We hope this won’t be too much of an inconvenience as we work to perform some necessary upgrades to ensure that reliability continues. You will receive another email when our system is back online.';
		//$message .= 'Your blood Level is '.$row['Alcohollevel'];
		
		$res = mail($to,$subject,$message,$headers); 
	}
}