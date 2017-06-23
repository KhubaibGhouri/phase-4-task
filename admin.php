<?php
session_start();
if(isset($_POST['submit'])){

include 'models/crud_db.php';
     $username = $_POST['username'];
 
     $password = $_POST['password'];
    $obj =new crud();
    $errors = array();
    
  $obj->query("SELECT * from admin_user where email = '".$username."' AND password='$password' ");
 if($num_rows > 0)
  {
  	   foreach($result as $row);
  	   $pass=$row['password'];
if( $password == $pass) 
   {
    
      $_SESSION['admin_id'] = $row['admin_id'];
      $_SESSION['email'] = $row['email'];
      $_SESSION['password'] = $row['password'];
      $_SESSION['type'] = 'admin';
      header("Location: admin-home.php");
    } 
    else {
    	
    
            $errors[] = 'Wrong username or password.';  
               
          }   
}
                         
  else {
         $errors[] = 'Wrong username or password.';
    }

}
?>

  <!DOCTYPE html>
<html >
<head>
<link rel="icon" type="image/png" href="assets/img/favicon.ico">
  <meta charset="UTF-8">
  <title>Admin Login </title>
  
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
    <h2>Admin Login</h2>
    <form  name='login' action="admin.php" method="post">
      <input type="text" placeholder="Email" name ="username" autocomplete="off"/>
      <input type="password" placeholder="Password" name="password" autocomplete="off"/>
      <button type="submit" name="submit">Login</button>
    </form>
  </div>
  
  
</div>
 

  

</body>
</html>


