<?php
session_start();
if(!isset($_SESSION['type']))
{
 header("Location: admin-login.php");
}
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Docter</title>

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
                    <a class="navbar-brand" href="#">Patient Entry</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class=""></i>
                            </a>
                        </li>
                    </ul>

                   <!--  <ul class="nav navbar-nav navbar-right">
                        <li>
                           <a href="logout.php">
                               Logout

                            </a>
                        </li>
                    </ul> -->
                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                <div class="col-sm-10 col-sm-offset-1">
                <div class="alert alert-success notify" style="display: none;">
                  <strong>Success!</strong> The Patient is added Successfully 
                </div>
                    <div class="page-header text-center">
                        <h2>Patient Entry</h2>
                    </div>
                    <form class="form-horizontal" method="post" action="controller/process.php">
                        <div class="form-group">
                            <div class="col-sm-2">
                                <label>First Name:</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" id="firstname" placeholder="First Name" class="form-control" name="firstname">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-2">
                                <label>Last Name:</label>
                            </div>
                            <div class="col-sm-8">
                                <input class="form-control" placeholder="Last Name" type="text" name="lastname" required="" id="lastname">
                            </div>
                        </div>
                        <div class="form-group row">
                           <div class="col-sm-2">
                                <label>Dat Of Birth:</label>
                            </div>
                              <div class="col-md-8">
                                <input data-toggle="datepicker" class="form-control dob" type="text" id="datepicker1" placeholder="Date of Birth" name="dateofbirth" required="">
                              </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-2">
                                <label>User ID</label>
                            </div>
                            <div class="col-sm-8">
                                <input id="userid" class="form-control" placeholder="User ID" type="text" name="userid" required="">
                            </div>
                        </div>

                        <div class="form-group">
                        <div class="col-sm-2">
                            <label>Address 1</label>
                        </div>
                        <div class="col-sm-8">
                            <input class="form-control" placeholder="Address 1" type="text" name="address" required="">
                        </div>
                        </div>

                        <div class="form-group">
                        <div class="col-sm-2">
                            <label>Address 2</label>
                        </div>
                        <div class="col-sm-8">
                            <input class="form-control" placeholder="Address 2" type="text" name="address2" >
                        </div>
                        </div>

                         <div class="form-group">
                            <div class="col-sm-2">
                                <label>City</label>
                            </div>
                            <div class="col-sm-8">
                                <input class="form-control" placeholder="City" type="text" name="City" required="">
                            </div>
                        </div>
                        
                    

                    <div class="form-group">
                            <div class="col-sm-2">
                                <label>State</label>
                            </div>
                            <div class="col-sm-8">
                                <select name="State" class="form-control col-md-6" required="" id="">
                <option value="Select State">Select State</option>
                <option value="Alabama">Alabama</option>
                <option value="Alaska">Alaska</option>
                <option value="Arizona">Arizona</option>
                <option value="Arkansas">Arkansas</option>
                <option value="California">California</option>
                <option value="Colorado">Colorado</option>
                <option value="Connecticut">Connecticut</option>
                <option value="Delaware">Delaware</option>
                <option value="Georgia">Georgia</option>
                <option value="Hawaii">Hawaii</option>
                <option value="Idaho">Idaho</option>
                <option value="Illinois">Illinois</option>
                <option value="Iowa">Iowa</option>
                <option value="Kansas">Kansas</option>
                <option value="Kentucky">Kentucky</option>
                <option value="Louisiana">Louisiana</option>
                <option value="Maryland">Maryland</option>
                <option value="Massachusetts">Massachusetts</option>
                <option value="Michigan">Michigan</option>
                <option value="Minnesota">Minnesota</option>
                <option value="Mississippi">Mississippi</option>
                <option value="Missouri">Missouri</option>
                <option value="Montana">Montana </option>
                <option value="Nebraska">Nebraska </option>
                <option value="Nevada">Nevada </option>
                <option value="New Hampshire ">New Hampshire  </option>
                <option value="New Jersey">New Jersey </option>
                <option value="New Mexico ">New Mexico  </option>
                <option value="New York">New York</option>
                <option value="North Carolina">North Carolina </option>
                <option value="North Dakota ">North Dakota </option>
                <option value="Ohio">Ohio</option>
                <option value="Oklahoma">Oklahoma</option>
                <option value="Oregon">Oregon</option>
                <option value="Pennsylvania">Pennsylvania</option>
                <option value="Rhode Island">Rhode Island</option>
                <option value="South Carolina">South Carolina</option>
                <option value="South Dakota ">South Dakota </option>
                <option value="Tennessee">Tennessee</option>
                <option value="Texas">Texas</option>
                <option value="Utah">Utah</option>
                <option value="Vermont">Vermont</option>
                <option value="Virginia">Virginia</option>
                <option value="Washington">Washington</option>
                <option value="West Virginia ">West Virginia </option>
                <option value="Wisconsin">Wisconsin</option>
                <option value="Wyoming">Wyoming</option>
                
             </select>
                            </div>
                        </div>
              <div class="form-group">
                            <div class="col-sm-2">
                                <label>Country</label>
                            </div>
                            <div class="col-sm-8">
                                <select name="country" class="form-control col-md-6" required="" id="">
                <option value="" >Select Country</option>
                <option value="USA">USA</option>
                <option value="UK">UK</option>
              
                
             </select>
                            </div>
                        </div>

              <div class="form-group">
                    <div class="col-sm-2">
                        <label>ZIP Code</label>
                    </div>
                    <div class="col-sm-8">
                        <input class="form-control" placeholder="ZIP Code" type="text" name="Zip" required="">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-2">
                        <label>Gender</label>
                    </div>
                    <div class="col-sm-8">
                        <span class="checkbox-inline">
                            <input type="Radio" name="gender" value="Male"> Male
                            &nbsp;&nbsp;&nbsp;
                            <input type="radio" name="gender" value="Female"> Female
                              &nbsp;&nbsp;&nbsp;
                            <input type="radio" name="gender" value="N/A"> N/A
                        </span>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-2">
                        <label>Phone</label>
                    </div>
                    <div class="col-sm-8">
                        <input class="form-control" placeholder="Phone" type="number" name="phone" required="">
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-sm-2">
                        <label>Email</label>
                    </div>
                    <div class="col-sm-8">
                        <input class="form-control" placeholder="Email" type="email" name="mail" required="">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-2">
                        <label>Alcohol Level</label>
                    </div>
                    <div class="col-sm-8">
                        <input class="form-control" placeholder="Alcohol Level" type="text" name="Alcohollevel" required="">
                    </div>
                </div>

                  <div class="form-group">
                    <div class="col-sm-2">
                        <label>Implantation Date</label>
                    </div>
                    <div class="col-sm-8">
                        <input class="form-control" data-toggle="datepicker" type="text" id="datepicker" name="proceduredate" required="" >
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-2">
                        <label>Status</label>
                    </div>
                    <div class="col-sm-8">
                        <span class="checkbox-inline">
                            <input type="Radio"  name="status" value="Armed"> Armed
                            &nbsp;&nbsp;&nbsp;
                            <input type="radio" name="status" value="DisArmed"> DisArmed
                        </span>
                    </div>
                </div>
                 <div class="form-group">
                    <div class="col-sm-2">
                        <label>Cron  Update</label>
                    </div>
                    <div class="col-sm-8">
                        <span class="checkbox-inline">
                            <input type="Radio"  name="cron_update" value="1"> Yes
                            &nbsp;&nbsp;&nbsp;
                            <input type="radio" name="cron_update" value="0"> No
                        </span>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <div class="col-sm-2">
                        <label></label>
                    </div>
                    <div class="col-sm-8 text-center">
                        <button name="btnManage" value="insert" class="btn btn-info">Submit</button>
                    </div>
                </div>
                        
                    </form>
                </div>
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

</div>


    
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

  <script src="assets/js/datepicker.js"></script>

  <script>
          $('[data-toggle="datepicker"]').datepicker({
          format: 'mm-dd-yyyy'
        });
  </script>

<script type="text/javascript">
        $(document).ready(function(){
            $("#userid").on('focus',function(){
                var fname = $("#firstname").val();
                 var lname = $("#lastname").val();
              var firstname = fname.slice(0, 3),
                lastname = lname.slice(0, 1),
                    dobirth = $(".dob").val(),
                     dob = dobirth.replace(/-/g, "")
                    userID = firstname +  lastname + dob;
                    $(this).attr('value', userID);
            });
        });
    </script>
</html>
<?php
    error_reporting(1);
    if($_GET['a']=="done")
    {
        echo '<script>$(".notify").fadeIn().delay(1000).fadeOut();</script>';
    }
?>