<?php

include("../config/config.php");
include("session.php");
$id = $_GET["clientid"];

$sql =
    "SELECT techietask.ClientName,techietask.Region,papdailysales.DateSigned,papdailysales.Floor,papdailysales.ChampName,papdailysales.ClientID,papdailysales.ClientContact,papdailysales.ClientAvailability,papdailysales.BuildingName,techietask.Region,techietask.Date,Token_teams.Team_ID,Token_teams.Techie1,Token_teams.Techie2,
papdailysales.BuildingCode,papdailysales.Floor from papdailysales LEFT JOIN 
techietask on techietask.ClientID=papdailysales.ClientID LEFT JOIN Token_teams ON Token_teams.Team_ID=techietask.TeamID WHERE techietask.ClientID is not null AND techietask.ClientID=$id AND Token_teams.Team_ID='" .
    $_SESSION["TeamID"] .
    "'";
$result = mysqli_query($connection, $sql);
$row = mysqli_fetch_assoc($result);
$clientid = $row["ClientID"];
$teamid = $row["Team_ID"];
$date = $row["Date"];
$reg = $row["Region"];
$t1 = $row["Techie1"];
$t2 = $row["Techie2"];
$floor = $row["Floor"];
$cname = $row["ClientName"];
$champ = $row["ChampName"];
$bname = $row["BuildingName"];
$bcode = $row["BuildingCode"];
$datesigned = $row["DateSigned"];

if (isset($_POST["submit"])) {
    date_default_timezone_set('Africa/Nairobi');
    $Team_ID = $_POST["teamid"];
    $avail = $_POST["Date"];
    $Techie1 = $row["Techie1"];
    $Techie2 = $row["Techie2"];
    $note = $_POST["note"];
    $ClientID = $row["ClientID"];
    $Date = $row["Date"];
    $Region = $row["Region"];
    $Floor = $row["Floor"];
    $ClientName = $row["ClientName"];
    $ChampName = $row["ChampName"];
    $BuildingName = $row["BuildingName"];
    $BuildingCode = $row["BuildingCode"];
    $DateSigned = $row["DateSigned"];
    $contact = $row["ClientContact"];
    $daterestituted = date('Y-m-d h:ia');
    $msg =  $_POST["message"];

    //checking connection
    if ($connection->connect_error) {
        die("connection failed : " . $connection->connect_error);
    } else {
        // Insert records into database
       

        $insert = $connection->query(
            "INSERT into papnotinstalled (ClientID,ClientName,BuildingName,BuildingCode,Region,Floor,DateSigned,Reason,ChampName,TeamID,Techie1,Techie2,Availability,Contact,RestitutedDate,Note) VALUES ('$ClientID','$ClientName','$BuildingName','$BuildingCode','$Region','$Floor','$DateSigned','$note','$ChampName','$Team_ID','$Techie1','$Techie2','$avail','$contact','$daterestituted','$msg')"
        );

        if ($insert) {
            $sql = "update papdailysales set ClientID=$id,ClientAvailability='$avail',PapStatus='Restituted' where ClientID=$id";
            $upd = mysqli_query($connection, $sql);

            $query = "DELETE FROM  techietask  WHERE ClientID= '$id'";
            $result = mysqli_query($connection, $query);

            if($result && $upd){
                $_SESSION["success"] = "Moved to restituted";
                header("Location: mytask.php");
            }
            else{
                $_SESSION["status"] = "Error";
                header("Location: mytask.php");
            }
        } else {
            $_SESSION["status"] = "Error";
            header("Location: mytask.php");
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
    <title>Restituted Report</title>
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
                    <li class="active">
                        <a href="mytask.php"><i class="menu-icon fa fa-tasks"></i>My Task</a>
                    </li>
                    <li class="active">
                        <a href="new-meter-form.php"><i class="menu-icon fa fa-lightbulb-o"></i>New Meter</a>
                    </li>
                    <li class="active">
                        <a href="completed-tasks.php"><i class="menu-icon fa fa-tasks"></i>Completed Tasks</a>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>PANEL APs</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="installed.php">Installed Today</a></li>
                            <li><i class="fa fa-table"></i><a href="not-turnedon.php">Offlines</a></li>
                            <li><i class="fa fa-table"></i><a href="restituted.php">Restituted</a></li>
                        </ul>
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
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bell"></i>
                                <span class="count bg-danger"><?php
                                            $query="SELECT  COUNT(Token_teams.Team_ID)as MyTask from papdailysales LEFT JOIN techietask on techietask.ClientID=papdailysales.ClientID LEFT JOIN Token_teams ON Token_teams.Team_ID=techietask.TeamID  LEFT JOIN papinstalled ON papinstalled.ClientID=papdailysales.ClientID WHERE 
                                             techietask.ClientID is not null AND papinstalled.ClientID is null AND Token_teams.Team_ID='".$_SESSION['TeamID']."'";
                                             $data=mysqli_query($connection,$query);
                                             while($row=mysqli_fetch_assoc($data)){
                                             echo $row['MyTask']."<br><br>";
                                              }
                                              ?></span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="notification">
                               <hr> <p class="red">You have <?php
                                            $query="SELECT  COUNT(Token_teams.Team_ID)as MyTask from papdailysales LEFT JOIN techietask on techietask.ClientID=papdailysales.ClientID LEFT JOIN Token_teams ON Token_teams.Team_ID=techietask.TeamID  LEFT JOIN papinstalled ON papinstalled.ClientID=papdailysales.ClientID WHERE 
                                             techietask.ClientID is not null AND papinstalled.ClientID is null AND Token_teams.Team_ID='".$_SESSION['TeamID']."'";
                                             $data=mysqli_query($connection,$query);
                                             while($row=mysqli_fetch_assoc($data)){
                                             echo $row['MyTask'];
                                              }
                                              ?> Tasks</p></hr>
                                <a class="dropdown-item media" href="mytask.php">
                                    <i class="fa fa-check"></i>
                                    <p>Check Out</p>
                                </a>
                            </div>
                        </div>
                        <div class="dropdown for-message">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="message" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-user"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="message">
                                <center><p class="red">Account Information</p></center>
                                <a class="dropdown-item media" href="#">
                                    <div class="message media-body">
                                       <center> <span class="name"><?php echo $_SESSION['TeamID']?></span></center>
                                    </div>
                                </a>
                                <a class="dropdown-item media" href="#">
                                    <span class="photo media-left"><img alt="avatar" src="../images/avatar/images.jpg"></span>
                                    <div class="message media-body">
                                        <strong><span class="name float-left">Techie 1</span></strong>
                                        <center> <span class="name float-left"><?php echo $_SESSION['Techie1']?></span> </center>
                                        
                                    </div>
                                </a>
                                <a class="dropdown-item media" href="#">
                                    <span class="photo media-left"><img alt="avatar" src="../images/avatar/images.jpg"></span>
                                    <div class="message media-body">
                                        <strong><span class="name float-left">Techie 2</span></strong>
                                        <center><span class="name float-left"><?php echo $_SESSION['Techie2']?></span> </center>
                                        
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="name float-left"><?php echo $_SESSION[
                 "TeamID"
             ]; ?></span>
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
                                            <h3 class="text-center">Restituted Report</h3>
                                        </div>
                                        <hr>
                                        <form  method="post" enctype="multipart/form-data" autocomplete="off">
                                        <div class="form-group">
                                        <strong><label for="x_card_code" class="control-label mb-1">Client ID</label></strong>
                                        <div class="input-group">
                                        <input id="bname" name="ClientID" type="text" class="form-control cc-cvc" value="<?php echo $clientid?>"   placeholder="Client ID" readonly>
                                        </div>
                                        <div class="form-group">
                                        <strong><label for="x_card_code" class="control-label mb-1">Team ID</label></strong>
                                        <div class="input-group">
                                        <input id="bname" name="teamid" type="text" class="form-control cc-cvc" value="<?php echo $teamid?>"   placeholder="Team ID" readonly>
                                        </div>
                                        <div class="form-group">
                                        <strong><label for="cc-number" class="control-label mb-1">Building Name</label></strong>
                                          <input id="cc-number" name="bname" type="text" class="form-control cc-number identified visa" maxlength="40" value="<?php echo $bname?>"  required placeholder="BuildingName" readonly>
                                           <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="form-group">
                                            <strong><label for="cc-number" class="control-label mb-1">Building Code</label></strong>
                                                <input id="cc-number" name="bcode" type="text" class="form-control cc-number identified visa" maxlength="40" value="<?php echo $bcode?>"  required placeholder="Building code" readonly>
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                        <div class="form-group">
                                        <strong><label for="x_card_code" class="control-label mb-1">Region</label></strong>
                                        <div class="input-group">
                                        <input id="bname" name="region" type="text" class="form-control cc-cvc" value="<?php echo $reg?>"  placeholder="Region" readonly>
                                        </div>
                                            <div class="form-group has-success">
                                            <strong><label for="cc-name" class="control-label mb-1">Availability<span style="color: #FF0000" >*</span></label></strong>
                                                <input id="avail" name="Date" type="date" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card" autocomplete="cc-name" aria-invalid="false" aria-describedby="cc-name" required >
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="form-group">
                                            <strong><label for="cc-number" class="control-label mb-1">Reason<span style="color: #FF0000" >*</span></label></strong>
                                                <div class="form-group has-success">
                                            <select data-placeholder="Choose a Country..." class="standardSelect form-control" name="note" tabindex="1" required>
                                            <option value="" disabled selected>Select Reason</option>
                                            <option value="Already Installed">Already Installed</option>
                                           <option value="To communicate">To communicate</option>
                                           <option value="Unreachable">Unreachable</option>
                                           <option value="Unavailable">Unavailable</option>
                                           <option value="IAP in Service">IAP in Service</option>
                                           <option value="Building Not Fully Installed">Building Not Fully Installed</option>
                                           <option value="Not Responding">Not Responding</option>
                                           <option value="For future Installation">For future Installation</option>
                                           <option value="Not Interested">Not Interested</option>
                                              <option value="Wrong Information">Wrong Information</option>
                                              </select>
                                            </div>
                                            </div>
                                            <div class="form-group">
                                            <strong><label for="cc-number" class="control-label mb-1">Suggestions/Observations/Comments</label></strong>
                                                <input id="cc-number" name="message" type="text" class="form-control cc-number identified visa" maxlength="40"  required placeholder="Suggestions/Observations/Comments">
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
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
mindate= year +"-" + month + "-" + todate;
 document.getElementById("avail").setAttribute("min",mindate);
 </script>
</body>
</html>
