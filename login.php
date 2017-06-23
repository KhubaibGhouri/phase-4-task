<?php
session_start();
if(isset($_SESSION['user']))
{
 header("Location: home.php");
}

if(isset($_POST['submit'])){

include 'models/crud_db.php';
    $username = $_POST['user_username'];
    $password = $_POST['user_password'];
    $obj =new crud();
    $errors = array();
    
     $obj->query("SELECT id,userid,password from patients where LOWER(`userid`) = LOWER('".$username."') or email = '".$username."' ");
 if($num_rows > 0)
  {
  	   foreach($result as $row);
  	   $pass=$row['password'];
if( $password == $pass) 
   {
     $obj->insert("SELECT id,userid,password from patients where LOWER(`userid`) = LOWER('".$username."')' or email = '".$username."'");
      $_SESSION['user'] = $row['id'];
      $_SESSION['firstname'] = $row['firstname'];
      $_SESSION['lastname'] = $row['lastname'];
      $_SESSION['address'] = $row['address'];
      $_SESSION['address2'] = $row['address2'];
      $_SESSION['dateofbirth'] = $row['dateofbirth'];
      $_SESSION['phone'] = $row['phone'];
      $_SESSION['email'] = $row['email'];
      $_SESSION['City'] = $row['City'];
      $_SESSION['State'] = $row['State'];
      $_SESSION['Zip'] = $row['Zip'];
       $uid=$_SESSION['user'];
      $lastlogin=date("m-d-Y");
        $obj->query("UPDATE patients SET lastlogin='".$lastlogin."' WHERE id='".$uid."'");
      header("Location: home.php");
    }else{
     if($pass == "")
    	{
    	 $errors[] = 'Please register and then login. <a href="register.php"><button class="btn btn-info btn-sm" >Register Here</button></a>';
    	} else{
    
            $errors[] = 'Wrong UserID or password.';  
           }
               
          } 
   
}
                         
  else {
         $errors[] = 'Your UserID or Email is not in our DataBase. If you had Esperal implanted, please contact Philadelphia Addiction Center and ask admin to add your credentials';
    }

}
?>





  <!DOCTYPE html>
<html >
<head>
<link rel="icon" type="image/png" href="assets/img/favicon.ico">
  <meta charset="UTF-8">
  <title> Login </title>
  
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
  <h1>User Login</h1>
 
</div>
<!-- Form Module-->
<div class="module form-module">

  <div class="">
<?php
  if(isset($errors)){
 foreach($errors as $error) ?>
 
  <div class="alert">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
  <strong> Oops! </strong><?php echo $error; ?>
</div>
<?php } ?>

  </div>
  <div class="form">
    <h2>Login to your account</h2>
    <form  name='login' action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
      <input type="text" placeholder="UserID or Email" name ="user_username" required value="<?php if(isset($_POST['user_username'])){echo $_POST['user_username']; } ?>"/>
      <input type="password" placeholder="password" name="user_password" required value="<?php if(isset($_POST['user_password'])){echo $_POST['user_password']; } ?>"/>
      <button type="submit" name="submit">Login</button>
    </form>
  </div>
   <div class="cta"><a href="forgot-password.php">Forgot your Password?</a></div>
  <div class="cta"><a href="register.php">Don’t have password – Sign Up</a></div>
  
</div>
 

  

</body>
</html>


