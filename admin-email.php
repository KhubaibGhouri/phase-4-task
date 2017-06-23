<?php
session_start();
if(!isset($_SESSION['type']))
{
 header("Location: admin-login.php");
}

?>

<?php
    require_once 'models/crud_db.php';
    $obj =new crud();
  
if(isset($_POST['submit'])){//to run PHP script on submit
if(!empty($_POST['email'])){
// Loop to store and display values of individual checked checkbox.

foreach($_POST['email'] as $email){

 //echo $email . '<br>';


$to=$email;
	
	$subject = 'Email From Doctor';
	
	$headers = "From: Docter < info@myesperal.life>\r\n" . "Reply-To:  info@myesperal.life\r\n" . "MIME-Version: 1.0\r\n" . "Content-Type: text/html; charset=ISO-8859-1\r\n";

 $message=$_POST['message'];

	mail($to, $subject, $message, $headers, '-f info@myesperal.life');
     	
   	



}

$URL="admin-email.php?a=done";
echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
}}

	
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
                    <a class="navbar-brand" href="#">Send Email</a>
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
                           <a href="l">
                               Logout
                            </a>
                        </li>
                    </ul> -->
                </div>
            </div>
        </nav>


        <div class="content">
         <div class="alert alert-success notify" style="display: none;">
                  <strong>Success!</strong> Email is sent  Successfully 
                </div>
            <div class="container-fluid">
                <div class="row">
                <form class="form-horizontal" method="post" action="admin-email.php">
                        
                  
                  
                  <div class="pre-scrollable">
                  <table id="datatable-responsive" class="table table-bordered">
                    <thead>
                          <tr>
                          <th></th>
                            <th>First Name</th>
                            <th>Last Name</th>
                             <th>Email</th>
                           
                                                      
                            <th>Alcohol Level</th>
                           
                          </tr>
                    </thead>
                        <tbody>
                        <?php
                         $obj->query("SELECT * from patients");
                            foreach ($result as $row ) :
                        
                        ?>
                             <tr>
                              <th><input type="checkbox" name="email[]" value="<?= $row['email']?>"></th>
                              
                              
                              
                              
                              
                            <th><?= $row['firstname']?></th>
                            <th><?= $row['lastname']?></th>
                            
                          <th><?= $row['email']?></th>

                            <th><span style = "color: <?=getColor($row['Alcohollevel'])?>;" ><?= $row['Alcohollevel']?></span></th>
                            <!-- <th>Implantation Date</th> -->
                           
                          </tr>
                         <?php endforeach; ?>
                         
                          <?php
                         $obj->query("SELECT * from patients");
                            foreach ($result as $row ) :
                        
                        ?>
                             <tr>
                              <th><input type="checkbox" name="email[]" value="<?= $row['email']?>"></th>
                              
                              
                              
                              
                              
                            <th><?= $row['firstname']?></th>
                            <th><?= $row['lastname']?></th>
                            
                          <th><?= $row['email']?></th>

                            <th><span style = "color: <?=getColor($row['Alcohollevel'])?>;" ><?= $row['Alcohollevel']?></span></th>
                            <!-- <th>Implantation Date</th> -->
                           
                          </tr>
                         <?php endforeach; ?>
                         
                        </tbody>
                      </table>
                </div>
            </div>
        </div>


                <div class="col-sm-10 col-sm-offset-1">
                
                    
                   
                            <div class="col-sm-2">
                                <label>Email Message:</label>
                            </div>
                            <div class="col-sm-8">
                            <textarea rows="4" cols="50"  id="" placeholder="Email body" class="form-control" name="message" required>

</textarea>
                               
                            </div>
                        </div>
                     
 <div class="form-group">
                    <div class="col-sm-2">
                       
                    </div>
                    <div class="col-sm-8 text-center">
                        <button name="submit" value="submit" class="btn btn-info">Send Email</button>
                    </div>
                </div>
                        
                    </form>
                       
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
                    &copy; 2016 <a href="">Creative Tim</a>, made with love for a better web
                </p>
            </div>
        </footer> -->

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


</html>

 </html>

 <script src="//code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/scroller/1.4.2/js/dataTables.scroller.min.js"></script>
    <script src="vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    
   
    <script>
      $(document).ready(function() {
        

        TableManageButtons = function() {
          "use strict";
          return {
            init: function() {
              handleDataTableButtons();
            }
          };
        }();

        $('#datatable').dataTable();

        $('#datatable-keytable').DataTable({
          keys: true
        });

        $('#datatable-responsive').DataTable();

        $('#datatable-scroller').DataTable({
          ajax: "js/datatables/json/scroller-demo.json",
          deferRender: true,
          scrollY: 380,
          scrollCollapse: true,
          scroller: true
        });

        $('#datatable-fixed-header').DataTable({
          fixedHeader: true
        });

        var $datatable = $('#datatable-checkbox');

        $datatable.dataTable({
          'order': [[ 1, 'asc' ]],
          'columnDefs': [
            { orderable: false, targets: [0] }
          ]
        });
        $datatable.on('draw.dt', function() {
          $('input').iCheck({
            checkboxClass: 'icheckbox_flat-green'
          });
        });

        TableManageButtons.init();
      });
    </script><?php
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
        echo '<script>$(".notify").fadeIn().delay(5000).fadeOut();</script>';
    }
?>