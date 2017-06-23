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
$sql1 = $con->query($result);
$current_date = date("m/d/Y");
$subject = 'Esperal implant Alert ';
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= "From: attention@myesperal.com" . "\r\n";
if ($sql1->num_rows > 0) {
    while($row = $sql1->fetch_assoc()) {
    	 $proceduredate = $row['proceduredate'];
    	$diff = abs(strtotime($current_date) - strtotime($proceduredate));
		$years = floor($diff / (365*60*60*24));
		$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
		$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
		if($years == 4 && $months == '2'){
    		$to = $row['email'];
    		$message = 'Dear Esperal patient, your Esperal implant is reaching its maturity and will become inactive in 1 month. We recommend you to contact Philadelphia Addiction Center to repeat the procedure and implant a new device. Great job on your road to recovery.';
			//$message .= 'Your Procedural Date is '.$row['proceduredate'];
			$res = mail($to,$subject,$message,$headers); 
		}
    }
}
