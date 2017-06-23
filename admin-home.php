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
    
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Bootstrap core CSS     -->
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">

 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.1.1/css/dataTables.responsive.css">
     <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/scroller/1.4.2/css/scroller.dataTables.min.css">
    <!-- Animation library for notifications   -->

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
      <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
</head>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Home</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="">
                    <a href="admin_index.php">
                        
                        <p> <b>Patient Entry</b></p>
                    </a>
                </li>
                <li class="">
                    <a href="admin-home.php">
                        
                        <p><b>Patient's List</b></p>
                    </a>
                </li>

 <li class="">
                    <a href="admin-email.php">
                        
                        <p><b> Send Email </b></p>
                    </a>
                </li>
                <li class="">
                    <a href="logout.php">
                        
                        <p><b>LogOut</b></p>
                    </a>
                </li>
    </ul>
  </div>
</nav>
  
<div class="container">
<table id="datatable-responsive" class="table table-responsive">
                    <thead>
                          <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                           
                            <th>User ID</th>
                             <th>Email</th>
                            <th>Alcohol Level</th>
                           <th>Implantation Date</th> 
                             <th>Last Login</th> 
                              <th>Password</th>
                                
                            <th>Action</th>
                          </tr>
                    </thead>
                        <tbody>
                        <?php
                         $obj->query("SELECT * from patients");
                            foreach ($result as $row ) :
                        
                        ?>
                             <tr>
                            <td ><?= $row['firstname']?></td>
                            <td><?= $row['lastname']?></td>
                           
                            <td><?= $row['userid']?></td>
                              <td><?= $row['email']?></td>
                            <td><span style = "color: <?=getColor($row['Alcohollevel'])?>;" ><?= $row['Alcohollevel']?></span></td>
                             <td><?= $row['proceduredate']?></td>
                              <td><?= $row['lastlogin']?></td>
                            
                            
                               
                                 <td><?= $row['password']?></td>
                          
                           
                           
                           <td>
                           
                            
                           <a href="admin-edit-user.php?edit_id=<?= $row['id']?>" class="btn btn-primary btn-xs">Edit</a><a href="admin-edit-user.php?delete_id=<?= $row['id']?>" class="btn btn-danger btn-xs">Delete</a>
                          
                           </td>
                          </tr>
                         <?php endforeach; ?>
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                        </tbody>
                      </table>
               



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
   


</html>

 <script src="//code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.js"></script>
    <script src="vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    
   
    <script>
    $('#datatable-responsive').DataTable( {
    responsive: true
} );
    </script>


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