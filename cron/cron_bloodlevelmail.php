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
$subject = 'Alchohol Level Mail Report';
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= "From: attention@myesperal.com" . "\r\n";
if ($sql1->num_rows > 0) {


    while($row = $sql1->fetch_assoc()) {
    
    	if($row['Alcohollevel'] >= '0.051' && $row['Alcohollevel'] <= '0.09'){
    		$to = $row['email'];
			$message = 'Hello '.$row['firstname'].',<br>'.'This is an automated message from the Esperal Cloud Server. Our system detected some insignificant elevation of the alcohol level in your bloodstream. Doctor Tsan temporary shout down your implant to prevent unnecessary Disulfiram-Ethanol Reaction. Please call Philadelphia Addiction Center at your earliest convenience to discuss your alcohol and dieting limitations. (267) 980-5720';
			
			$res = mail($to,$subject,$message,$headers); 
		}
    }
}