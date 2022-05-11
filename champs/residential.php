<?php

include("../config/config.php");
include("session.php");

?>

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Residential Report</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="../assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/lib/chosen/chosen.min.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <link href="https://cdn.datatables.net/datetime/1.1.2/css/dataTables.dateTime.min.css" rel="stylesheet"/>
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
  <script src="https://cdn.datatables.net/datetime/1.1.2/js/dataTables.dateTime.min.js"></script>
</head>
<body style="background-color:#e1e1e1">
 <!-- Left Panel -->
 <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="dashboard.php"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>REPORTS</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="residential.php">Residential Report</a></li>
                            <li><i class="fa fa-table"></i><a href="business.php">Business Report</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>PANEL APs</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="not-installed.php">Not Installed</a></li>
                            <li><i class="fa fa-table"></i><a href="to-restore.php">To Restore</a></li>
                            <li><i class="fa fa-table"></i><a href="turned-on.php">Turned On</a></li>
                            <li><i class="fa fa-table"></i><a href="all-paps.php">All Paps</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="monthly-counts.php" style="color:black; font-size: 15px;"> <i class="menu-icon ti-calendar"></i>Monthly Counts</a>
                    </li> 
                    <li>
                        <a href="buildings.php" style="color:black; font-size: 15px;"> <i class="menu-icon ti-home"></i>Buildings</a>
                    </li>  
                    <li class="active">
                        <a href="profile.php"><i class="menu-icon fa fa-user"></i>Profile</a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>
    <!-- /#left-panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <header id="header" class="header" style="height: 65px;">
            <div class="top-left">
                <div class="navbar-header">
                <img src="../images/picture1.png" style="width: 120px; height: 60px;" class="logo-icon" alt="logo icon">
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>
            <div class="top-right">
                <div class="header-menu">
                    <div class="header-left">
                        
                        <div class="form-inline">
                            <form class="search-form">
                                
                            </form>
                        </div>

                        <div class="dropdown for-notification">

                        </div>

                        <div class="dropdown for-message">

                        </div>
                    </div>

                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="name float-left"><?php echo $_SESSION[
                 "FName"
             ]; ?> <?php echo $_SESSION["LName"]; ?></span>
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="../config/logout.php"><i class="fa fa-power -off"></i>Logout</a>
                        </div>
                    </div>

                </div>
            </div>
        </header>
        <!-- Header-->

        <div class="content">
            <div class="animated fadeIn">


                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                            </div>
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center">Residential Report</h3>
                                        </div>
                                        <hr>
                                        <form  method="post" action="submit.php">
                                        <?php
            if(isset($_SESSION['status'])){
                ?>
               <center><span> <div class="alert alert-danger" role="alert">
                   <?php echo $_SESSION['status'];
                unset($_SESSION['status']);?>
                 </div></span></center>
                <?php
                
            }
            elseif(isset($_SESSION['success'])){
                ?>
                <center><span><div class="alert alert-success" role="alert">
                   <?php echo $_SESSION['success'];
                unset($_SESSION['success']);?>
                 </div></span></center>
                <?php
                
            }
            ?>
                                        <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">DateSigned<span style="color: #FF0000" >*</span></label>
                                                <input id="datesigned" name="DateSigned" type="date" class="form-control cc-name valid" data-val="true" value="<?php echo date("Y-m-d"); ?>" data-val-required="Please enter the name on card" autocomplete="cc-name" aria-invalid="false" aria-describedby="cc-name" required >
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Champ</label>
                                                <input id="" name="ChampName" type="text" class="form-control cc-name valid" data-val="true" value="<?php echo $_SESSION["FName"]; ?> <?php echo $_SESSION["LName"]; ?>" name="ChampName" placeholder="Champ" readonly data-val-required="Please enter the name on card" autocomplete="cc-name" aria-invalid="false" aria-describedby="cc-name" required >
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                        <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="cc-exp" class="control-label mb-1">Building Code<span style="color: #FF0000" >*</span></label>
                                                        <input id="bcode" onkeyup="GetDetail(this.value)" placeholder="Search in 'BUILDING' to copy the EXACT building code here" required name="BuildingCode" pattern="[A-Z]{5}[0-9]{5}" type="text" class="form-control cc-exp"   placeholder="Building Name" required>
                                                        <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <label for="x_card_code" class="control-label mb-1">Building Name<span style="color: #FF0000" >*</span></label>
                                                    <div class="input-group">
                                                        <input id="bname" name="Buildingname" type="text" class="form-control cc-cvc"  placeholder="Building Name" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Region<span style="color: #FF0000" >*</span></label>
                                                <input id="region" name="Region" placeholder="Region"  type="text" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Floor<span style="color: #FF0000" >*</span></label>
                                                <div class="form-group has-success">
                                            <select data-placeholder="Choose a Country..." class="standardSelect form-control" name="floor" tabindex="1" required>
                                            <option value="" disabled selected>'0' is ground; '-' is Basement</option>
                                            <option value="-1">-1</option> 
                                            <option value="0">0</option>  
                                            <option value="1">1</option>  
                                            <option value="2">2</option>  
                                            <option value="3">3</option>  
                                            <option value="4">4</option>  
                                            <option value="5">5</option>
                                            <option value="6">6</option>  
                                            <option value="7">7</option>  
                                            <option value="8">8</option> 
                                              </select>
                                            </div>
                                            </div>
                                            <div class="form-group">
                                            <label for="cc-number" class="control-label mb-1">APT#<span style="color: #FF0000" >*</span></label>
                                            <input id="cc-number" name="Apt" type="text" class="form-control cc-number identified visa" maxlength="40" data-val="true" required placeholder="Enter N/A if not available"> 
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">APT Layout<span style="color: #FF0000" >*</span></label>
                                                <div class="form-group has-success">
                                            <select data-placeholder="Choose a Country..." class="standardSelect form-control" name="aptlayout" tabindex="1" required>
                                            <option disabled selected> Apartment Layout</option>
                                            <option value="Single">Single</option>
                                            <option value="Double">Double</option>
                                            <option value="Bedsitter">Bedsitter</option>
                                            <option value="1 BR">1 BR</option>
                                             <option value="2 BR">2 BR</option>
                                            <option value="3 BR">3 BR</option>
                                            <option value="4 BR and above">4 BR and above</option> 
                                              </select>
                                            </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="cc-exp" class="control-label mb-1">First Name<span style="color: #FF0000" >*</span></label>
                                                        <input id="cc-exp" name="ClientName" type="text" required class="form-control cc-exp"  data-val="true" placeholder="First Name"
                                                            autocomplete="cc-exp">
                                                        <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <label for="x_card_code" class="control-label mb-1">Family Name</label>
                                                    <div class="input-group">
                                                        <input id="x_card_code" name="FamilyName" type="text" class="form-control cc-cvc"  data-val="true" placeholder="Family Name"
                                                            data-val-cc-cvc="Please enter a valid security code" autocomplete="off">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Availability<span style="color: #FF0000" >*</span></label>
                                                <input id="cc-name" name="Day" type="date" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card" autocomplete="cc-name" aria-invalid="false" aria-describedby="cc-name" required >
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="cc-exp" class="control-label mb-1">Phone Main<span style="color: #FF0000" >*</span></label>
                                                        <input  name="ClientContact" type="tel" pattern="[0-9]{10}" id="phone" name="ClientContact" placeholder="Phone Main 07XXXXXXXX" required class="form-control cc-exp" 
                                                            data-val-cc-exp="Please enter a valid month and year" 
                                                            autocomplete="cc-exp">
                                                        <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <label for="x_card_code" class="control-label mb-1">Phone Alt<span style="color: #FF0000" >*</span></label>
                                                    <div class="input-group">
                                                        <input id="x_card_code" name="altcontact" type="tel" pattern="[0-9]{10}" class="form-control cc-cvc" placeholder="Phone Alt 07XXXXXXXX"  data-val="true" 
                                                            data-val-cc-cvc="Please enter a valid security code" autocomplete="off">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                            <label for="cc-number" class="control-label mb-1">WhatsApp</label>
                                            <input id="cc-number" name="WhatsApp" type="text" class="form-control cc-number identified visa" maxlength="40" data-val="true" required placeholder="Enter N/A if not available"> 
                                            </div>
                                            <div class="form-group">
                                            <label for="cc-number" class="control-label mb-1"> Client's Email</label>
                                            <input id="cc-number" name="email" type="text" class="form-control cc-number identified visa" maxlength="40" data-val="true" required placeholder="Enter N/A if not available"> 
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Gender<span style="color: #FF0000" >*</span></label>
                                                <div class="form-group has-success">
                                            <select data-placeholder="Choose a Country..." class="standardSelect form-control" name="gender" tabindex="1" required>
                                            <option disabled selected> Select Gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Other">Other</option> 
                                              </select>
                                            </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Age<span style="color: #FF0000" >*</span></label>
                                                <div class="form-group has-success">
                                            <select  class="standardSelect form-control" name="age" tabindex="1" required>
                                            <option disabled selected> Select Age</option>
                                            <option value="Below 17">Below 17</option>  
                                            <option value="18-24">18-24</option>  
                                            <option value="25-34">25-34</option>  
                                            <option value="35-44">35-44</option>  
                                            <option value="45-59">45-59</option>  
                                            <option value="Above 60">Above 60</option>
                                              </select>
                                            </div>
                                            </div>
                                            <div class="form-group">
                                            <label for="cc-number" class="control-label mb-1">Current ISP Package</label>
                                            <input id="cc-number" name="package" type="text" class="form-control cc-number identified visa" maxlength="40" data-val="true" required placeholder="Enter N/A if not available"> 
                                            </div>
                                            <div class="form-group">
                                            <label for="cc-number" class="control-label mb-1">Occupation</label>
                                            <input id="cc-number" name="occupation" type="text" class="form-control cc-number identified visa" maxlength="40" data-val="true" required placeholder="Enter N/A if not available"> 
                                            </div>
                                            <div class="form-group">
                                            <label for="cc-number" class="control-label mb-1">Birthday</label>
                                            <input id="min" name="Birthday" type="text" class="form-control cc-number identified visa" maxlength="40" data-val="true" required placeholder="Birthday"> 
                                            </div>
                                            <div class="form-group">
                                            <label for="cc-number" class="control-label mb-1">Household Size</label>
                                            <input class="form-control cc-number identified visa" data-val="true" type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==2) return false;" name="Householdsize" placeholder="Enter total number of peolpe living in the apartment"> 
                                            </div>
                                            <div class="form-group">
                                            <label for="cc-number" class="control-label mb-1">Children</label>
                                            <input class="form-control cc-number identified visa" data-val="true" type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==2) return false;" name="Children" placeholder="<=12"> 
                                            </div>
                                            <div class="form-group">
                                            <label for="cc-number" class="control-label mb-1">Teengers</label>
                                            <input class="form-control cc-number identified visa" data-val="true" type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==2) return false;" name="Teenagers" placeholder="13-18"> 
                                            </div>
                                            <div class="form-group">
                                            <label for="cc-number" class="control-label mb-1">Adults</label>
                                            <input class="form-control cc-number identified visa" data-val="true" type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==2) return false;" name="Adults" placeholder="<=13"> 
                                            </div>
                                            <div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Suggestions/Observations/Comments<span style="color: #FF0000" >*</span></label>
                                                <input id="cc-number" name="Note" type="text" class="form-control cc-number identified visa" maxlength="40"  required placeholder="Suggestions/Observations/Comments">
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                                <button id="payment-button" type="submit" name="submit" class="btn btn-warning">
                                                    <span id="payment-button-amount">Submit</span>
                                                    <span id="payment-button-sending" style="display:none;">Sending…</span>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div> <!-- .card -->

                    </div><!--/.col-->

            </div>


        </div><!-- .animated -->
    </div><!-- .content -->

    <div class="clearfix"></div>
</div><!-- /#right-panel -->

<!-- Right Panel -->

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
<script src="../assets/js/main.js"></script>
<script src="../assets/js/lib/chosen/chosen.jquery.min.js"></script>
<script>
    jQuery(document).ready(function() {
        jQuery(".standardSelect").chosen({
            disable_search_threshold: 10,
            no_results_text: "Oops, nothing found!",
            width: "100%"
        });
    });
</script>
<script>
 var todayDate= new Date();
 var month= todayDate.getMonth() + 1;
 var year= todayDate.getFullYear();
 var todate=todayDate.getDate();
if(todate<10){
  todate= "0"+ todate;
}
if(month<10){
  month= "0"+ month;
}
 mindate= year +"-" + month + "-" + todate;
 document.getElementById("cc-name").setAttribute("min",mindate);
 </script>
</body>
<script>
 var todayDate= new Date();
 var month= todayDate.getMonth() + 1;
 var year= todayDate.getFullYear();
 var todate=todayDate.getDate();
if(todate<10){
  todate= "0"+ todate;
}
if(month<10){
  month= "0"+ month;
}
maxdate= year +"-" + month + "-" + todate;
 document.getElementById("datesigned").setAttribute("max",maxdate);
 </script>

<script>
 var todayDate= new Date();
 var month= todayDate.getMonth() + 1;
 var year= todayDate.getFullYear();
 var todate=todayDate.getDate();
if(todate<10){
  todate= "0"+ todate;
}
if(month<10){
  month= "0"+ month;
}
maxdate= year +"-" + month + "-" + todate;
 document.getElementById("min").setAttribute("max",maxdate);
 </script>

<script>

// onkeyup event will occur when the user
// release the key and calls the function
// assigned to this event
function GetDetail(str) {
  if (str.length == 0) {
    document.getElementById("bname").value = "";
    document.getElementById("region").value = "";
    return;
  }
  else {

    // Creates a new XMLHttpRequest object
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {

      // Defines a function to be called when
      // the readyState property changes
      if (this.readyState == 4 &&
          this.status == 200) {
        
        // Typical action to be performed
        // when the document is ready
        var myObj = JSON.parse(this.responseText);

        // Returns the response data as a
        // string and store this array in
        // a variable assign the value
        // received to first name input field
        
        document.getElementById
          ("bname").value = myObj[0];
        
        // Assign the value received to
        // last name input field
        document.getElementById(
          "region").value = myObj[1];
      }
    };

    // xhttp.open("GET", "filename", true);
    xmlhttp.open("GET", "retrieve.php?bcode=" + str, true);
    
    // Sends the request to the server
    xmlhttp.send();
  }
}
</script>

<script>

// onkeyup event will occur when the user
// release the key and calls the function
// assigned to this event
function GetDetails(str) {
  if (str.length == 0) {
    document.getElementById("bnamebiz").value = "";
    document.getElementById("regionbiz").value = "";
    return;
  }
  else {

    // Creates a new XMLHttpRequest object
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {

      // Defines a function to be called when
      // the readyState property changes
      if (this.readyState == 4 &&
          this.status == 200) {
        
        // Typical action to be performed
        // when the document is ready
        var myObj = JSON.parse(this.responseText);

        // Returns the response data as a
        // string and store this array in
        // a variable assign the value
        // received to first name input field
        
        document.getElementById
          ("bnamebiz").value = myObj[0];
        
        // Assign the value received to
        // last name input field
        document.getElementById(
          "regionbiz").value = myObj[1];
      }
    };

    // xhttp.open("GET", "filename", true);
    xmlhttp.open("GET", "retrieve.php?bcode=" + str, true);
    
    // Sends the request to the server
    xmlhttp.send();
  }
}
</script>
<script>
 $(document).ready(function() {
     // Create date inputs
     minDate = new DateTime($('#min'), {
         format: 'MMMM Do YYYY'
     });
     maxDate = new DateTime($('#max'), {
         format: 'MMMM Do YYYY'
     });
 });
 
  </script>
</body>
</html>
