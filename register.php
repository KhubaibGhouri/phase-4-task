<?php

require_once("models/crud_db.php");

if(!empty($_POST))
{
$obj =new crud();
    $errors = array();
    $email = trim($_POST['email']);
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $confirm_pass = trim($_POST['passwordc']);
     $obj->query("SELECT * from patients where LOWER(`userid`) = LOWER('".$username."')");
     
 if($num_rows == 0)
  {
   $errors[] = "User Id Mismatch"; 
   
  }
    
if($password != $confirm_pass)
    {
        $errors[] = "Password Mismatch";
    }
  $obj->query("SELECT id from patients where email = '".$email."' and LOWER(`userid`) = LOWER('".$username."')");
  foreach ($result as $row);
if($num_rows == 0)
  {
    $errors[] = "Email or User ID  Mismatch"; 
   
  }

if(strlen($password) < 4){
    $errors[] = 'Password is too short';
}
 
if($row['user_status'] != 0)
  {
    $errors[] = "Already Signup with given userID"; 
   
  }
if(count($errors) == 0)
    {  
$status = '0';
   $hashedpassword =$password;

   $obj->query("UPDATE patients SET password ='".$hashedpassword."',user_status  ='1' WHERE userid='".$username."' and user_status='".$status."' ");


$success[] = "Successfully Sign Up";
    }


 
}

        ?>

<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title> Sign Up </title>
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

<div class="pen-title">
  <h1> Sign Up </h1><a href = "login.php"><h3> Login</h3></a>
</h3></a>
</div>

<!-- Form Module-->
<div class="module form-module">
  <div class="">
    <?php
  if(count($errors) > 0){
 foreach($errors as $error) ?>
 
  <div class="alert">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
  <strong></strong><?php echo $error; ?>
</div>
<?php } ?>
  <?php
  if(isset($success)){
 foreach($success as $suc) ?>
 
  <div class="alert" <?php echo 'style=" background-color: green;"'; ?>>
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
  <strong></strong><?php echo $suc; ?>
</div>
<?php } ?>
  </div>
  <div class="form">
    <h2>Create your account</h2>
                    <form name='newUser' class="form-horizontal form-label-left" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

           
              
              


                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">User ID
                        <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" placeholder="User ID" name="username" required  class="form-control col-md-7 col-xs-12" value="<?php if(isset($_POST['username'])){echo $_POST['username']; } ?>">
                        </div>
                      </div>
                    
                       
                       <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" type="email" placeholder="Email" name="email" required>
                          <input type="hidden" placeholder="Display Name" name="displayname"  class="form-control col-md-7 col-xs-12" value="user">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Password</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" type="password" placeholder="Password" 
                          name="password" required value="<?php if(isset($_POST['username'])){echo $_POST['password']; } ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Confirm Password</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" type="password" placeholder="Password" name="passwordc" required value="<?php if(isset($_POST['passwordc'])){echo $_POST['passwordc']; } ?>">
                        </div>
                      </div>
                     
                      

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        
                          <button type="submit" class="btn btn-success" value="Register">Register</button>
                        </div>
                      </div>

              
               

             
            </form>
            </div>
        
</div>

  
 
</body>
</html>