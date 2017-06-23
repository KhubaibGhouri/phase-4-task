<?php

session_start();

$id = $_SESSION['user'];
if(!isset($_SESSION['user']))
{
 header("Location: login.php");
}
    require_once 'models/patient.php';
    $objpatient =new patient();
    $result = $objpatient->allpatients();
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Admin@MyEsperal</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>
    <link href="assets/css/datepicker.min.css" rel="stylesheet"/>
    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
      <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
   
</head>
<body>

<div class="wrapper">
   <?php include 'sidebar.php' ;?>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Patients List</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class=""></i>
                            </a>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                           <a href="">
                               Account
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                  <table class="table table-hover">
                    <thead>
                          <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Date of birth</th>
                            <th>User ID</th>
                            <th>Address</th>
                            <!-- <th>Address 2</th> -->
                            <th>City</th>
                            <!-- <th>State</th> -->
                            <!-- <th>Zip</th> -->
                            <th>Gender</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Alcohol Level</th>
                            <!-- <th>Implantation Date</th> -->
                            <!-- <th>Status</th> -->
                            <th>Action</th>
                          </tr>
                    </thead>
                        <tbody>

                        <?php
                            while ($row=$result->fetch_array()) {
                        ?>
                             <tr>
                            <th><?= $row['firstname']?></th>
                            <th><?= $row['lastname']?></th>
                            <th><?= $row['dateofbirth']?></th>
                            <th><?= $row['userid']?></th>
                            <th><?= $row['address']?></th>
                            <!-- <th>Address 2</th> -->
                            <th><?= $row['City']?></th>
                            <!-- <th>Zip</th> -->
                            <th><?= $row['gender']?></th>
                            <th><?= $row['phone']?></th>
                            <th><?= $row['email']?></th>
                            <th><span style = "color: <?=getColor($row['Alcohollevel'])?>;" ><?= $row['Alcohollevel']?></span></th>
                            <!-- <th>Implantation Date</th> -->
                            <th><a href="#" class="btn btn-primary btn-xs">Edit</a><a href="#" class="btn btn-danger btn-xs">Delete</a></th>
                          </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                </div>
            </div>
        </div>


      <!--   <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="#">
                                Home
                            </a>
                        </li>

                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy; 2016 <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
                </p>
            </div>
        </footer> -->

    </div>
</div>
<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $("#userid").on('focus',function(){
                var firstname = $("#firstname").val(),
                    dob = $(".dob").val()
                    userID = firstname + dob;
                    $(this).attr('value', userID);
            });
        });
    </script>
  <script src="assets/js/datepicker.js"></script>

  <script>
          $('[data-toggle="datepicker"]').datepicker({
          format: 'yyyy-mm-dd'
        });
  </script>

</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="assets/js/bootstrap-checkbox-radio-switch.js"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <!-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script> -->

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>


</html>
<?php
function getColor($number)
{
    if ($number > 0.00  && $number <= 0.049 )
        return '#00FF00';
    else if ($number >= 0.05  && $number <= 0.099 )
        return '#FF8000';
    else if ($number >= 0.099 )
        return '#FF0000';
}

    error_reporting(1);
    if($_GET['a']=="done")
    {
        echo '<script>$(".notify").fadeIn().delay(1000).fadeOut();</script>';
    }
?>