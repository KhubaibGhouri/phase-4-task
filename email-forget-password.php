<?php 

	 $to='zartash.tahir042@gmail.com';
	
	$subject = 'Password Reset';
	
	$headers = "From: Docter < info@zartash.com>\r\n" . "Reply-To:  info@zartash.com\r\n" . "MIME-Version: 1.0\r\n" . "Content-Type: text/html; charset=ISO-8859-1\r\n";

 $message='<html><body>
  <table style="border-collapse: collapse; width:100%; border: 50px solid #eee;">
    <tr>

   	<th style="text-align: center; background-color: #333; color:#ffffff; padding:10px 0px; margin-left:15%;">
    <img height="50" width="70" alt="99 caterers" src="" class="CToWUd"> 
	</th>
   	<th style="text-align: left; background-color: #333; color:#ffffff; padding:10px 0px;">
	<h1></h1>  
	</th>

    </tr>
    <tr><td colspan="2" style="border: 50px solid #eee; border-bottom-style: none; border-top-style: none; text-align:center; padding: 20px 20px;">

<h1> Dear User</h1>
<img height="50" width="50" alt="registration successful" src="http://2015.igem.org/wiki/images/3/3e/Technion_HS_Israel_green_check.png" class="CToWUd"> 
<h4>You have successfully reset password. Your crenditials are given below.</h4>

<table style="border-collapse: collapse; width:100%; border: 50px solid #eee;">
		  <tr>
			<th colspan="2" style="text-align: center; background-color: #1b242b; color:#ffffff; padding:10px 10px;">
				  <img height="50" width="150" alt="99 caterers" src="http://ammarengineering.pk/images/logo.png" class="CToWUd"> <h1> Contact Us Query</h1>
			</th>
		  </tr>
		  <tr><td style="border: 50px solid #eee; border-bottom-style: none; border-top-style: none;">
		<table style="border-collapse: collapse; width:90%; margin-left:40px;">
		 
		  <tr>
			<th style="padding: 15px; text-align: left; border-bottom: 1px solid #ddd;">Email</th>
			<td style="padding: 15px; text-align: center; border-bottom: 1px solid #ddd;">' . strip_tags($email) . '</td>
		  </tr>
		  <tr>
			<th style="padding: 15px; text-align: left; border-bottom: 1px solid #ddd;">User ID</th>
			<td style="padding: 15px; text-align: center; border-bottom: 1px solid #ddd;">' . strip_tags($userid) . '</td>
		  </tr>
		    <tr>
			<th style="padding: 15px; text-align: left; border-bottom: 1px solid #ddd;">Password </th>
			<td style="padding: 15px; text-align: center; border-bottom: 1px solid #ddd;">' . strip_tags($password) . '</td>
		  </tr>
		  
		  

  </td></tr>
    <tr>
   <td colspan="2" style="padding: 10px; text-align:center; background-color:#333; color: #ffffff">
   <p>For More Details:<a href="http://www.silverstone.com">www.silverstone.com/a></p></td>
    </tr>
  </table>
  
  </body>
  </html>';

	mail($to, $subject, $message, $headers, '-f info@zartash.com');