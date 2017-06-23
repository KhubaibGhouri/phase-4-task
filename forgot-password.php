<?php

require_once("models/crud_db.php");

if(!empty($_POST))
{
$obj =new crud();
    
    $username = trim($_POST['username']);
   
  $obj->query("SELECT firstname,userid,email,user_status,password from patients where userid = '".$username."'");
 if($num_rows > 0)
  {
     
     foreach ($result as $row) ;
      $name = $row['firstname'];
     $userid= $row['userid'];
     $email=$row['email'];
       $password=$row['password'];
       $user_status = $row['user_status'];
     	if($user_status != 0 and $password != "" )
     	{
     	
     	
	 $to=$email;
	
	$subject = 'Password Reset';
	
	$headers = "From: Myesperal.life < info@myesperal.life>\r\n" . "Reply-To:  info@zartash.com\r\n" . "MIME-Version: 1.0\r\n" . "Content-Type: text/html; charset=ISO-8859-1\r\n";

 $message='
 <html>
 <body>
 Dear '.$name. ' !  Your password has been reset.Your Login Crendentials are given below:<br>
  
User ID : '. $userid.'<br>
Password : '. $password.'

 </body>
 </html>
  ';

	mail($to, $subject, $message, $headers, '-f info@myesperal.life');
     	
   	header("Location: forgot-password.php?a=done");
}else{

 $errors[] ='Account Does not exist , Please Register First. <a href="register.php"><button class="btn btn-info btn-sm" >Register Here</button></a>'; 
    } 	
     	

  }else
  {
  	$obj->query("SELECT firstname,userid,email,user_status,password from patients where email = '".$username."'");
     if($num_rows > 0)
     {
     	
     foreach ($result as $row1) ;
     $name = $row1['firstname'];
     $userid= $row1['userid'];
      $email=$row1['email'];
     $password=$row1['password'];
       $user_status = $row1['user_status'];
     	if($user_status != 0 and $password != "" )
     	{

     $to=$email;
  
  $subject = 'Password Reset';
  
  $headers = "From: Docter < info@myesperal.life>\r\n" . "Reply-To:  info@myesperal.life\r\n" . "MIME-Version: 1.0\r\n" . "Content-Type: text/html; charset=ISO-8859-1\r\n";

$message='
 <html>
 <body>
 Dear '.$name. ' !  Your password has been reset.Your Login Crendentials are given below:<br>
  
User ID : '. $userid.'<br>
Password : '. $password.'

 </body>
 </html>
  ';

  mail($to, $subject, $message, $headers, '-f info@myesperal.life');
  header("Location: forgot-password.php?a=done");
}else{

$errors[] ='Account Does not exist , Please Register First. <a href="register.php"><button class="btn btn-info btn-sm" >Register Here</button></a>'; 
}
     }

  else
  {
  $errors[] = "Email or UserID not found"; 

  }
}


 
}

        ?>

  <!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title> Forget Password </title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
<link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

      <link rel="stylesheet" href="assets/css/style1.css">

  <style>
.alert {
    padding: 20px;
    background-color: #f44336;
    color: white;
}

.closebtn {
    margin-left: 15px;
    color: white;
    font-weight: bold;
    float: right;
    font-size: 22px;
    line-height: 20px;
    cursor: pointer;
    transition: 0.3s;
}

.closebtn:hover {
    color: black;
}
</style>
</head>

<body>

<!-- Form Mixin-->
<!-- Input Mixin-->
<!-- Button Mixin-->
<!-- Pen Title-->
<div class="pen-title">

  <h1>Forget Password</h1><a href = "login.php"><h2>Login</h2></a></span>
   <div class="alert alert-success notify" style="<?php if (!isset($_GET['a'])){echo 'display: none';} ?>;background-color: green" >
                  <strong>Success!</strong> Email Has been sent 
                </div>
  
</div>
<!-- Form Module-->
<div class="module form-module">
  <div class="">
    <?php
  if(isset($errors)){
 foreach($errors as $error) ?>
 
  <div class="alert">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
  <strong>Oops!</strong><?php echo $error; ?>
</div>
<?php } ?>

  </div>
  <div class="form">
    <h2>Reset Password</h2>
    <form  name='login' action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
      <input type="text" placeholder=" Enter user ID or Email" name ="username"/>
      
      <button type="submit" name="submit">Email New Password</button>
    </form>
  </div>
  
  <div class="cta"><a href="register.php">New User?</a></div>
</div>
 

  

</body>
</html>

<?php
    error_reporting(1);
    if($_GET['a']=="done")
    {
        echo '<script>$(".notify").fadeIn().delay(1000).fadeOut();</script>';
    }
?>