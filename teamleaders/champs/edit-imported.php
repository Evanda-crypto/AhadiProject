<?php

include("../../config/config.php");
include("session.php");
$id = $_GET["id"];

$sql = "SELECT * FROM old WHERE id=$id";
$result = mysqli_query($connection, $sql);
$row = mysqli_fetch_assoc($result);
$cname = $row["ClientName"];
$champ = $row["ChampName"];
$bname = $row["BuildingName"];
$bcode = $row["BuildingCode"];
$Region=$row['Region'];
$contact=trim($row['ClientContact']);

if (isset($_POST["submit"])) {
    date_default_timezone_set('Africa/Nairobi');
    $client = $_POST["client"];
    $champ = $_POST["champ"];
    $bname = $_POST["bname"];
    $bcode = $_POST["bcode"];
    $Reg = $_POST["region"];
    $cont = $_POST["contact"];

    //checking connection
    if ($connection->connect_error) {
        die("connection failed : " . $connection->connect_error);
    } else {
        // Insert records into database
    
            $sql = "UPDATE old set ChampName='$champ',ClientName='$client',ClientContact='$cont',BuildingName='$bname',BuildingCode='$bcode',Region='$Reg' where id=$id";
            $result = mysqli_query($connection, $sql);

            if($result){
                $_SESSION["success"] = "Records Updated";
                header("Location: imported.php");
            }
            else{
                $_SESSION["status"] = "Error! Not Updated";
                header("Location: imported.php");
            }
        
    }
}
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Edit Imported</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="../../assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/lib/chosen/chosen.min.css">

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
                    <li class="menu-title">PANEL APS</li><!-- /.menu-title -->
                    <li>
                        <a href="all-paps.php" style="color:black; font-size: 15px;"> <i class="menu-icon ti-layout-grid3"></i>All Paps</a>
                    </li>
                    <li>
                        <a href="not-installed.php" style="color:black; font-size: 15px;"> <i class="menu-icon ti-layout-grid3"></i>Not Installed </a>
                    </li>
                    <li>
                        <a href="retrieved_paps.php" style="color:black; font-size: 15px;"> <i class="menu-icon ti-layout-grid3"></i>Retrieved</a>
                    </li>
                    <li>
                        <a href="restituted.php" style="color:black; font-size: 15px;"> <i class="menu-icon ti-layout-grid3"></i>Restituted </a>
                    </li>
                    <li>
                        <a href="turned-on.php" style="color:black; font-size: 15px;"> <i class="menu-icon ti-layout-grid3"></i>Turned On </a>
                    </li>
                    <li>
                        <a href="imported.php" style="color:black; font-size: 15px;"> <i class="menu-icon ti-layout-grid3"></i>Imported</a>
                    </li>
                    <li>
                    <li class="menu-title">BUILDINGS</li><!-- /.menu-title -->
                    <li>
                        <a href="buildings.php" style="color:black; font-size: 15px;"> <i class="menu-icon ti-home"></i>Buildings</a>
                    </li>     
                    <li class="menu-title" >TOOLS</li><!-- /.menu-title -->
                    <li>
                        <a href="view-champs.php" style="color:black; font-size: 15px;"> <i class="menu-icon ti-layout-grid3"></i>View Champs</a>
                    </li>
                    <li>
                        <a href="change-champ.php" style="color:black; font-size: 15px;"> <i class="menu-icon ti-layout-grid3"></i>Change Pap Ownership</a>
                    </li>
                    <li>
                        <a href="profile.php" style="color:black; font-size: 15px;"> <i class="menu-icon ti-user"></i>Profile </a>
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
                <img src="../../images/picture1.png" style="width: 120px; height: 60px;" class="logo-icon" alt="logo icon">
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
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bell"></i>
                                <span class="count bg-danger"><?php
                                $query =
                                    "SELECT COUNT(*) as restituted FROM papnotinstalled  WHERE papnotinstalled.Reason<>'Already installed' and papnotinstalled.Region='" .
                                    $_SESSION["Region"] .
                                    "'";
                                $data = mysqli_query($connection, $query);
                                while ($row = mysqli_fetch_assoc($data)) {
                                    echo $row["restituted"];
                                }
                                ?></span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="notification">
                                <p class="red">You have <?php
                                $query =
                                    "SELECT COUNT(*) as restituted FROM papnotinstalled  WHERE papnotinstalled.Reason<>'Already installed' and papnotinstalled.Region='" .
                                    $_SESSION["Region"] .
                                    "'";
                                $data = mysqli_query($connection, $query);
                                while ($row = mysqli_fetch_assoc($data)) {
                                    echo $row["restituted"];
                                }
                                ?> Restitute(s)</p>
                                <a class="dropdown-item media" href="restituted.php">
                                    <i class="fa fa-check"></i>
                                    <p>Check Out.</p>
                                </a>
                            </div>
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
                            <a class="nav-link" href="../../config/logout.php"><i class="fa fa-power -off"></i>Logout</a>
                        </div>
                    </div>

                </div>
            </div>
        </header>
        <!-- /#header -->

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
                                            <h3 class="text-center"></h3>
                                        </div>
                                        <hr>
                                        <form  method="post" action="" autocomplete="off">
                                        <div class="form-group">
                                        <strong><label for="x_card_code"  class="control-label mb-1">Building Code<span style="color: #FF0000" >*</span></label></strong>
                                        <div class="input-group">
                                        <input id="bcode" name="bcode" onkeyup="GetDetail(this.value)" type="text" class="form-control cc-cvc" value="<?php echo $bcode?>"   placeholder="Building Code" required>
                                        </div></div>
                                        <div class="form-group">
                                        <strong><label for="x_card_code" class="control-label mb-1">Building Name<span style="color: #FF0000" >*</span></label></strong>
                                        <div class="input-group">
                                        <input id="bname" name="bname" type="text" class="form-control cc-cvc" value="<?php echo $bname?>"   placeholder="Building Name" required>
                                        </div></div>
                                        <div class="form-group">
                                        <strong><label for="cc-number" class="control-label mb-1">Region<span style="color: #FF0000" >*</span></label></strong>
                                          <input id="region" name="region" type="text" class="form-control cc-number identified visa" maxlength="40" value="<?php echo $Region?>"  required placeholder="Region" >
                                           <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="form-group">
                                            <strong><label for="cc-number" class="control-label mb-1">Champ Code<span style="color: #FF0000" >*</span></label></strong>
                                                <input id="code" name="code"  onkeyup="GetDetails(this.value)" pattern="[0-9]{4}" type="text" class="form-control cc-number identified visa" maxlength="40"  required placeholder="Champ Code" required>
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="form-group">
                                            <strong><label for="cc-number" class="control-label mb-1">Champ<span style="color: #FF0000" >*</span></label></strong>
                                                <input id="champ" name="champ" type="text" class="form-control cc-number identified visa" maxlength="40" value="<?php echo $champ?>"  required placeholder="Champ" readonly>
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                        <div class="form-group">
                                        <strong><label for="x_card_code" class="control-label mb-1">Client Name<span style="color: #FF0000" >*</span></label></strong>
                                        <div class="input-group">
                                        <input id="bname" name="client" type="text" class="form-control cc-cvc" value="<?php echo $cname?>"  placeholder="Client Name" required>
                                        </div>
                                            <div class="form-group has-success">
                                            <strong><label for="cc-name" class="control-label mb-1">Contact<span style="color: #FF0000" >*</span></label></strong>
                                                <input id="avail" name="contact" type="text" pattern="[0-9]{10}" class="form-control cc-name valid" data-val="true" value="<?php echo $contact?>" placeholder="Contact" autocomplete="cc-name" aria-invalid="false" aria-describedby="cc-name" required >
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                            
                                                <button id="payment-button" type="submit" name="submit" class="btn btn-warning">
                                                <strong><span id="payment-button-amount">Submit</span></strong>
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
<script src="../../assets/js/main.js"></script>
<script src="../../assets/js/lib/chosen/chosen.jquery.min.js"></script>
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
    document.getElementById("code").value = "";
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
          ("champ").value = myObj[0];
      }
    };

    // xhttp.open("GET", "filename", true);
    xmlhttp.open("GET", "getchamp.php?code=" + str, true);
    
    // Sends the request to the server
    xmlhttp.send();
  }
}
</script>
</body>
</html>
