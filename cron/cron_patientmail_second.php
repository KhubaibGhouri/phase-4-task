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
$subject = 'Esperal cloud Maintenance';
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= "From: attention@myesperal.com" . "\r\n";
if ($sql1->num_rows > 0) {
    while($row = $sql1->fetch_assoc()) {
    	 $to = $row['email'];
		$message = 'Dear Esperal patient, our scheduled maintenance has been completed successfully. This concludes our planned patch maintenance and database update. Your implant is back on-line. Thank you for your patience. ';
		//$message .= 'Your blood Level is '.$row['Alcohollevel'];
				
		$res = mail($to,$subject,$message,$headers); 
	}
}