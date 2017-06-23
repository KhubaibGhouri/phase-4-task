<?php
$nameh     = 'localhost';
$username = 'victorts_docter';
$password = 'Kkl7+Xn$]f{k';
$database = 'victorts_docter';

$con = new mysqli($nameh, $username, $password, $database);
if (!$con) {
	die("Connection Failed to Database");
}
$result = "SELECT * FROM  patients where cron_update != 0 and password != ''";
$sql1 = $con->query($result);
if ($sql1->num_rows > 0) {

    while($row = $sql1->fetch_assoc()) {
   
    	 $min = 0.009;
    	$max = 0.035;
    	$rand = rand($min*1000, $max*1000) / 1000;
    	$result_up = "UPDATE patients SET Alcohollevel = ".$rand." WHERE id=".$row['id'];
    	$sql = $con->query($result_up);
    }
}