<?php
session_start();
if(!isset($_SESSION['type']))
{
 header("Location: admin.php");
}

include('models/crud_db.php');

$obj =new crud();
if ( isset($_GET['edit_id']) ) {

    $id = $_GET['edit_id'];
    $obj->query("SELECT  * from patients where id = '".$id."'");
foreach ($result as $row);
    }
if (isset($_POST['update'])) {
     $id = $_POST['id'];
    $firstname     = $_POST['firstname'];
    $lastname      = $_POST['lastname'];
    $address     = $_POST['address'];
    $address2      = $_POST['address2'];
    $dateofbirth = $_POST['dateofbirth'];
    $phone       = $_POST['phone'];
    $email       = $_POST['mail'];
    $Alcohollevel  = $_POST['Alcohollevel'];
    $procedure   = $_POST['proceduredate'];
    $paassword  = $_POST['password'];
 $status      = $_POST['status'];
    $City        = $_POST['City'];
  
    $Zip         = $_POST['Zip'];
     $gender      = $_POST['gender'];
   
    $country     = $_POST['country'];
    
    
    if($country == "United States"){
        $State       = $_POST['State'][0];
  }else{
  $State       = $_POST['State'][1];
  }
    
    $cron_update = $_POST['cron_update'];
        $obj->query("UPDATE patients SET 
            firstname ='".$firstname."',
            lastname  ='".$lastname."',
            address ='".$address."',
            address2  ='".$address2."',
            dateofbirth ='".$dateofbirth."',
            phone  ='".$phone."',
            email ='".$email."',
            Alcohollevel  ='".$Alcohollevel."',
            proceduredate ='".$procedure."',
            status  ='".$status."',
            City ='".$City."',
            State  ='".$State."',
            Zip ='".$Zip."',
            gender  ='".$gender."',
            country  ='".$country."',
             password  ='".$paassword."',
            cron_update ='".$cron_update."'  
            WHERE id='".$id."'");
        
//header("Location: admin-home.php?a=done");
$URL="admin-home.php?a=done";
echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
}   
   
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];

    $obj->delete('patients',"id=$delete_id");
    //header("Location: admin-home.php?a=done");

$URL="admin-home.php?a=done";
echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
}

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
     <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    var d = new Date();
var year = d.getFullYear() - 18 ;
    $( "#datepicker" ).datepicker({

      changeMonth: true,
      changeYear: true,
       yearRange: '1920:' + year, 
   defaultDate: new Date(year, d.getMonth(), d.getDate())
    });
    
    
     $( "#datepicker1" ).datepicker({

      changeMonth: true,
      changeYear: true,
     
    });
  } );
  </script>
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
                  <strong>Success!</strong> The patient info is updated Successfully 
                </div>
                    <div class="page-header text-center">
                        <h2>Edit Patient Info </h2>
                    </div>
                    <form class="form-horizontal" method="post" action="admin-edit-user.php" name="reg">
                     <input type="hidden" name="id" value="<?php echo $row['id']?>">
                        <div class="form-group">
                            <div class="col-sm-2">
                                <label>First Name:</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" id="firstname" placeholder="First Name" class="form-control" name="firstname" value="<?php echo $row['firstname']?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-2">
                                <label>Last Name:</label>
                            </div>
                            <div class="col-sm-8">
                                <input class="form-control" placeholder="Last Name" type="text" name="lastname" required="" id="lastname" value="<?php echo $row['lastname']?>">
                            </div>
                        </div>
                        <div class="form-group row">
                           <div class="col-sm-2">
                                <label>Dat Of Birth:</label>
                            </div>
                              <div class="col-md-8">
                                <input data-toggle="datepicker" class="form-control dob" type="text" id="datepicker" placeholder="Date of Birth" name="dateofbirth" required="" value="<?php echo $row['dateofbirth']?>">
                              </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-2">
                                <label>User ID</label>
                            </div>
                            <div class="col-sm-8">
                                <input id="userid" class="form-control" placeholder="User ID" type="text" name="userid" required="" value="<?php echo $row['userid']?>" disabled>
                            </div>
                        </div>

                        <div class="form-group">
                        <div class="col-sm-2">
                            <label>Address 1</label>
                        </div>
                        <div class="col-sm-8">
                            <input class="form-control" placeholder="Address 1" type="text" name="address" required  value="<?php echo $row['address']?>">
                        </div>
                        </div>

                        <div class="form-group">
                        <div class="col-sm-2">
                            <label>Address 2</label>
                        </div>
                        <div class="col-sm-8">
                            <input class="form-control" placeholder="Address 2" type="text" name="address2" value="<?php echo $row['address2']?>">
                        </div>
                        </div>

                         
                    

                    
              <div class="form-group">
                            <div class="col-sm-2">
                                <label>Country</label>
                            </div>
                            <div class="col-sm-8">
                                <select name="country" class="form-control col-md-6" required="" id="country" >
                <option value="<?php echo $row['country']?>" ><?php echo $row['country']?></option>
             
<option value="Afghanistan">Afghanistan</option>
    <option value="Albania">Albania</option>
    <option value="Algeria">Algeria</option>
    <option value="American Samoa">American Samoa</option>
    <option value="Andorra">Andorra</option>
    <option value="Angola">Angola</option>
    <option value="Anguilla">Anguilla</option>
    <option value="Antartica">Antarctica</option>
    <option value="Antigua and Barbuda">Antigua and Barbuda</option>
    <option value="Argentina">Argentina</option>
    <option value="Armenia">Armenia</option>
    <option value="Aruba">Aruba</option>
    <option value="Australia">Australia</option>
    <option value="Austria">Austria</option>
    <option value="Azerbaijan">Azerbaijan</option>
    <option value="Bahamas">Bahamas</option>
    <option value="Bahrain">Bahrain</option>
    <option value="Bangladesh">Bangladesh</option>
    <option value="Barbados">Barbados</option>
    <option value="Belarus">Belarus</option>
    <option value="Belgium">Belgium</option>
    <option value="Belize">Belize</option>
    <option value="Benin">Benin</option>
    <option value="Bermuda">Bermuda</option>
    <option value="Bhutan">Bhutan</option>
    <option value="Bolivia">Bolivia</option>
    <option value="Bosnia and Herzegowina">Bosnia and Herzegowina</option>
    <option value="Botswana">Botswana</option>
    <option value="Bouvet Island">Bouvet Island</option>
    <option value="Brazil">Brazil</option>
    <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
    <option value="Brunei Darussalam">Brunei Darussalam</option>
    <option value="Bulgaria">Bulgaria</option>
    <option value="Burkina Faso">Burkina Faso</option>
    <option value="Burundi">Burundi</option>
    <option value="Cambodia">Cambodia</option>
    <option value="Cameroon">Cameroon</option>
    <option value="Canada">Canada</option>
    <option value="Cape Verde">Cape Verde</option>
    <option value="Cayman Islands">Cayman Islands</option>
    <option value="Central African Republic">Central African Republic</option>
    <option value="Chad">Chad</option>
    <option value="Chile">Chile</option>
    <option value="China">China</option>
    <option value="Christmas Island">Christmas Island</option>
    <option value="Cocos Islands">Cocos (Keeling) Islands</option>
    <option value="Colombia">Colombia</option>
    <option value="Comoros">Comoros</option>
    <option value="Congo">Congo</option>
    <option value="Congo">Congo, the Democratic Republic of the</option>
    <option value="Cook Islands">Cook Islands</option>
    <option value="Costa Rica">Costa Rica</option>
    <option value="Cota D'Ivoire">Cote dIvoire</option>
    <option value="Croatia">Croatia (Hrvatska)</option>
    <option value="Cuba">Cuba</option>
    <option value="Cyprus">Cyprus</option>
    <option value="Czech Republic">Czech Republic</option>
    <option value="Denmark">Denmark</option>
    <option value="Djibouti">Djibouti</option>
    <option value="Dominica">Dominica</option>
    <option value="Dominican Republic">Dominican Republic</option>
    <option value="East Timor">East Timor</option>
    <option value="Ecuador">Ecuador</option>
    <option value="Egypt">Egypt</option>
    <option value="El Salvador">El Salvador</option>
    <option value="Equatorial Guinea">Equatorial Guinea</option>
    <option value="Eritrea">Eritrea</option>
    <option value="Estonia">Estonia</option>
    <option value="Ethiopia">Ethiopia</option>
    <option value="Falkland Islands">Falkland Islands (Malvinas)</option>
    <option value="Faroe Islands">Faroe Islands</option>
    <option value="Fiji">Fiji</option>
    <option value="Finland">Finland</option>
    <option value="France">France</option>
    <option value="France Metropolitan">France, Metropolitan</option>
    <option value="French Guiana">French Guiana</option>
    <option value="French Polynesia">French Polynesia</option>
    <option value="French Southern Territories">French Southern Territories</option>
    <option value="Gabon">Gabon</option>
    <option value="Gambia">Gambia</option>
    <option value="Georgia">Georgia</option>
    <option value="Germany">Germany</option>
    <option value="Ghana">Ghana</option>
    <option value="Gibraltar">Gibraltar</option>
    <option value="Greece">Greece</option>
    <option value="Greenland">Greenland</option>
    <option value="Grenada">Grenada</option>
    <option value="Guadeloupe">Guadeloupe</option>
    <option value="Guam">Guam</option>
    <option value="Guatemala">Guatemala</option>
    <option value="Guinea">Guinea</option>
    <option value="Guinea-Bissau">Guinea-Bissau</option>
    <option value="Guyana">Guyana</option>
    <option value="Haiti">Haiti</option>
    <option value="Heard and McDonald Islands">Heard and Mc Donald Islands</option>
    <option value="Holy See">Holy See (Vatican City State)</option>
    <option value="Honduras">Honduras</option>
    <option value="Hong Kong">Hong Kong</option>
    <option value="Hungary">Hungary</option>
    <option value="Iceland">Iceland</option>
    <option value="India">India</option>
    <option value="Indonesia">Indonesia</option>
    <option value="Iran">Iran (Islamic Republic of)</option>
    <option value="Iraq">Iraq</option>
    <option value="Ireland">Ireland</option>
    <option value="Israel">Israel</option>
    <option value="Italy">Italy</option>
    <option value="Jamaica">Jamaica</option>
    <option value="Japan">Japan</option>
    <option value="Jordan">Jordan</option>
    <option value="Kazakhstan">Kazakhstan</option>
    <option value="Kenya">Kenya</option>
    <option value="Kiribati">Kiribati</option>
    <option value="Korea">Korea</option>
  
    <option value="Kuwait">Kuwait</option>
    <option value="Kyrgyzstan">Kyrgyzstan</option>
    <option value="Lao">Lao </option>
    <option value="Latvia">Latvia</option>
    <option value="Lebanon">Lebanon</option>
    <option value="Lesotho">Lesotho</option>
    <option value="Liberia">Liberia</option>
    <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
    <option value="Liechtenstein">Liechtenstein</option>
    <option value="Lithuania">Lithuania</option>
    <option value="Luxembourg">Luxembourg</option>
    <option value="Macau">Macau</option>
    <option value="Macedonia">Macedonia, The Former Yugoslav Republic of</option>
    <option value="Madagascar">Madagascar</option>
    <option value="Malawi">Malawi</option>
    <option value="Malaysia">Malaysia</option>
    <option value="Maldives">Maldives</option>
    <option value="Mali">Mali</option>
    <option value="Malta">Malta</option>
    <option value="Marshall Islands">Marshall Islands</option>
    <option value="Martinique">Martinique</option>
    <option value="Mauritania">Mauritania</option>
    <option value="Mauritius">Mauritius</option>
    <option value="Mayotte">Mayotte</option>
    <option value="Mexico">Mexico</option>
    <option value="Micronesia">Micronesia</option>
    <option value="Moldova">Moldova</option>
    <option value="Monaco">Monaco</option>
    <option value="Mongolia">Mongolia</option>
    <option value="Montserrat">Montserrat</option>
    <option value="Morocco">Morocco</option>
    <option value="Mozambique">Mozambique</option>
    <option value="Myanmar">Myanmar</option>
    <option value="Namibia">Namibia</option>
    <option value="Nauru">Nauru</option>
    <option value="Nepal">Nepal</option>
    <option value="Netherlands">Netherlands</option>
    <option value="Netherlands Antilles">Netherlands Antilles</option>
    <option value="New Caledonia">New Caledonia</option>
    <option value="New Zealand">New Zealand</option>
    <option value="Nicaragua">Nicaragua</option>
    <option value="Niger">Niger</option>
    <option value="Nigeria">Nigeria</option>
    <option value="Niue">Niue</option>
    <option value="Norfolk Island">Norfolk Island</option>
    <option value="Northern Mariana Islands">Northern Mariana Islands</option>
    <option value="Norway">Norway</option>
    <option value="Oman">Oman</option>
    <option value="Pakistan">Pakistan</option>
    <option value="Palau">Palau</option>
    <option value="Panama">Panama</option>
    <option value="Papua New Guinea">Papua New Guinea</option>
    <option value="Paraguay">Paraguay</option>
    <option value="Peru">Peru</option>
    <option value="Philippines">Philippines</option>
    <option value="Pitcairn">Pitcairn</option>
    <option value="Poland">Poland</option>
    <option value="Portugal">Portugal</option>
    <option value="Puerto Rico">Puerto Rico</option>
    <option value="Qatar">Qatar</option>
    <option value="Reunion">Reunion</option>
    <option value="Romania">Romania</option>
    <option value="Russia">Russian Federation</option>
    <option value="Rwanda">Rwanda</option>
    <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option> 
    <option value="Saint LUCIA">Saint LUCIA</option>
    <option value="Saint Vincent">Saint Vincent and the Grenadines</option>
    <option value="Samoa">Samoa</option>
    <option value="San Marino">San Marino</option>
    <option value="Sao Tome and Principe">Sao Tome and Principe</option> 
    <option value="Saudi Arabia">Saudi Arabia</option>
    <option value="Senegal">Senegal</option>
    <option value="Seychelles">Seychelles</option>
    <option value="Sierra">Sierra Leone</option>
    <option value="Singapore">Singapore</option>
    <option value="Slovakia">Slovakia</option>
    <option value="Slovenia">Slovenia</option>
    <option value="Solomon Islands">Solomon Islands</option>
    <option value="Somalia">Somalia</option>
    <option value="South Africa">South Africa</option>
    <option value="South Georgia">South Georgia and the South Sandwich Islands</option>
    <option value="Span">Spain</option>
    <option value="SriLanka">Sri Lanka</option>
    <option value="St. Helena">St. Helena</option>
    <option value="St. Pierre and Miguelon">St. Pierre and Miquelon</option>
    <option value="Sudan">Sudan</option>
    <option value="Suriname">Suriname</option>
    <option value="Svalbard">Svalbard and Jan Mayen Islands</option>
    <option value="Swaziland">Swaziland</option>
    <option value="Sweden">Sweden</option>
    <option value="Switzerland">Switzerland</option>
    <option value="Syria">Syrian Arab Republic</option>
    <option value="Taiwan">Taiwan, Province of China</option>
    <option value="Tajikistan">Tajikistan</option>
    <option value="Tanzania">Tanzania, United Republic of</option>
    <option value="Thailand">Thailand</option>
    <option value="Togo">Togo</option>
    <option value="Tokelau">Tokelau</option>
    <option value="Tonga">Tonga</option>
    <option value="Trinidad and Tobago">Trinidad and Tobago</option>
    <option value="Tunisia">Tunisia</option>
    <option value="Turkey">Turkey</option>
    <option value="Turkmenistan">Turkmenistan</option>
    <option value="Turks and Caicos">Turks and Caicos Islands</option>
    <option value="Tuvalu">Tuvalu</option>
    <option value="Uganda">Uganda</option>
    <option value="Ukraine">Ukraine</option>
    <option value="United Arab Emirates">United Arab Emirates</option>
    <option value="United Kingdom">United Kingdom</option>
    <option value="United States">United States</option>
    <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
    <option value="Uruguay">Uruguay</option>
    <option value="Uzbekistan">Uzbekistan</option>
    <option value="Vanuatu">Vanuatu</option>
    <option value="Venezuela">Venezuela</option>
    <option value="Vietnam">Viet Nam</option>
    <option value="Virgin Islands (British)">Virgin Islands (British)</option>
    <option value="Virgin Islands (U.S)">Virgin Islands (U.S.)</option>
    <option value="Wallis and Futana Islands">Wallis and Futuna Islands</option>
    <option value="Western Sahara">Western Sahara</option>
    <option value="Yemen">Yemen</option>
    <option value="Yugoslavia">Yugoslavia</option>
    <option value="Zambia">Zambia</option>
    <option value="Zimbabwe">Zimbabwe</option>
             </select>
                            </div>
                        </div>

                      
                        <div class="form-group" >
                            <div class="col-sm-2">
                                <label>State</label>
                            </div>
                            <div class="col-sm-8">
                                <select name="State[]" class="form-control col-md-6"  id="state">
                                <?php if($row['country'] == "United States") { ?>
                                         <option value="<?php echo $row['State']?>" ><?php echo $row['State']?></option>
                                <?php   }else{
                                    echo '<option value="">Select State</option>';
                                    };?>
                
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
                          
                        <input class="form-control" placeholder="Enter Your State"  value="<?php if($row['country'] != "United States") {echo $row['State'] ;};?>"type="text" name="State[]" id="otherstate" >
                    </div>
                </div>  
                       
                        
                       
                        <div class="form-group">
                            <div class="col-sm-2">
                                <label>City</label>
                            </div>
                            <div class="col-sm-8">
                                <input class="form-control" placeholder="City" type="text" name="City" required="" value="<?php echo $row['City']?>">
                            </div>
                        </div>
                        
              <div class="form-group">
                    <div class="col-sm-2">
                        <label>ZIP Code</label>
                    </div>
                    <div class="col-sm-8">
                        <input class="form-control" placeholder="ZIP Code" type="number" name="Zip"  value="<?php echo $row['Zip']?>">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-2">
                        <label>Gender</label>
                    </div>
                    <div class="col-sm-8">
                        <span class="checkbox-inline">
                             <input type="Radio" name="gender" value="Male" <?php if($row['gender']=="Male"){ echo "checked";}?>> Male
                            &nbsp;&nbsp;&nbsp;
                            <input type="radio" name="gender" value="Female" <?php if($row['gender']=="Female"){ echo "checked";}?>> Female
                              &nbsp;&nbsp;&nbsp;
                            <input type="radio" name="gender" value="N/A" <?php if($row['gender']=="N/A"){ echo "checked";}?>> N/A
                        </span>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-2">
                        <label>Phone</label>
                    </div>
                    <div class="col-sm-8">
                        <input class="form-control" placeholder="Phone" type="text" name="phone" required=""  value="<?php echo $row['phone']?>">
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-sm-2">
                        <label>Email</label>
                    </div>
                    <div class="col-sm-8">
                        <input class="form-control" placeholder="Email" type="email" name="mail" required=""  value="<?php echo $row['email']?>">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-2">
                        <label>Alcohol Level</label>
                    </div>
                    <div class="col-sm-8">
                        <input class="form-control" placeholder="Alcohol Level" type="text" name="Alcohollevel" required=""  Value="<?php echo $row['Alcohollevel']?>">
                    </div>
                </div>

                  <div class="form-group">
                    <div class="col-sm-2">
                        <label>Implantation Date</label>
                    </div>
                    <div class="col-sm-8">
                        <input class="form-control" data-toggle="datepicker" type="text" id="datepicker1" name="proceduredate" required="" value="<?php echo $row['proceduredate']?>">
                    </div>
                </div>
  <div class="form-group">
                    <div class="col-sm-2">
                        <label>Password</label>
                    </div>
                    <div class="col-sm-8">
                        <input class="form-control" placeholder="User Password" type="text" name="password"   value="<?php echo $row['password']?>" >
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-2">
                        <label>Status</label>
                    </div>
                    <div class="col-sm-8">
                        <span class="checkbox-inline">
                            <input type="Radio"  name="status" value="Armed" <?php if($row['status']=="Armed"){ echo "checked";}?>> Armed
                            &nbsp;&nbsp;&nbsp;
                            <input type="radio" name="status" value="DisArmed" <?php if($row['status']=="DisArmed"){ echo "checked";}?>> DisArmed
                        </span>
                    </div>
                </div>
                 <div class="form-group">
                    <div class="col-sm-2">
                        <label>Cron  Update</label>
                    </div>
                    <div class="col-sm-8">
                        <span class="checkbox-inline">
                            <input type="Radio"  name="cron_update" value="1" <?php if($row['cron_update']=="1"){ echo "checked";}?>> Yes
                            &nbsp;&nbsp;&nbsp;
                            <input type="radio" name="cron_update" value="0" <?php if($row['cron_update']=="0"){ echo "checked";}?>> No
                        </span>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <div class="col-sm-2">
                        <label></label>
                    </div>
                    <div class="col-sm-8 text-center">
                        <button name="update" value="update" class="btn btn-info">Update</button>
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


  
  <script type="text/javascript">
  
 $('#country').on('change',function(){
        if( $(this).val()==="United States"){
        $("#state").show()
         $("#otherstate").hide()
        }
        else{
        $("#otherstate").show()
        $("#state").hide()
        }
    });
    
    
    
   function statefun(){
 var ctry = document.getElementById("country").value;

if( ctry ==="United States"){
        $("#state").show()
         $("#otherstate").hide()
        }
        if( ctry !="United States"){
         $("#otherstate").show()
        $("#state").hide()
        }
        
    
    
}
     window.onload = statefun;
     
          
  </script>
 <script type="text/javascript">
function validateForm() {
    var x = document.forms["reg"]["dateofbirth"].value;
       var today = new Date();
    var birthDate = new Date(x);
    
    var diff = Math.floor(today.getTime() - birthDate.getTime());
    var day = 1000 * 60 * 60 * 24;

    var days = Math.floor(diff/day);
    var months = Math.floor(days/31);
    var year = Math.floor(months/12);
 
   
    if (year < 18) {
        alert("You are Under age. Only 18+ can regitster here. You are " +  year + " Years old."  );
         
        return false;
    }
    
    
    
    var country = document.forms["reg"]["country"].value;
    var zip = document.forms["reg"]["Zip"].value;
      var state=  $('#state').val();
       var otherstate=   $('#otherstate').val();

     if(country == "United States"){
     if(zip == "")
     {
     alert('Please Enter zip code .');
      return false;
     }
     
     if(state == "")
     {
     alert('Please Enter State.');
      return false;
     }
      } 
      if(country != "United States"){
     if(zip == "")
     {
     alert('Please Enter zip code .');
      return false;
     }
     
     if(otherstate == "")
     {
     alert('Please Enter State.');
      return false;
     }
      } 
       var email =  document.forms["reg"]["mail"].value;
       var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;  
if(email.match(mailformat))  
{   
return true;  
}  
else  
{  
alert("You have entered an invalid email address!");  
 
return false;  
}  

     
      
      
    }

 
 
    <script type="text/javascript">
            function no_backspaces(event)
            {
                backspace = 8;
                if (event.keyCode == backspace) event.preventDefault();
            }
        </script>
    
    
    
</html>
<?php


 </script>
<script type="text/javascript">
        $(document).ready(function(){
            $("#datepicker").on('change',function(){
                var fname = $("#firstname").val();
                 var lname = $("#lastname").val();
              var firstname = fname.slice(0, 3),
                lastname = lname.slice(0, 1),
                    dobirth = $(".dob").val(),
                     dob = dobirth.replace(new RegExp('/', 'g'),'')
                    userID = firstname +  lastname + dob;
                    $("#userid").attr('value', userID);
            });
        });
    </script>

<?php
    error_reporting(1);
    if($_GET['a']=="done")
    {
        echo '<script>$(".notify").fadeIn().delay(1000).fadeOut();</script>';
    }
?>