<?php
include("../session.php");
include("../../config/config.php");
$id=$_GET['id'];

$sql="SELECT * from buildings where id=$id";
$result=mysqli_query($connection,$sql);
$row=mysqli_fetch_assoc($result);
$bname=$row['bname'];
$bcode=$row['bcode'];
$region=$row['region'];
$status=$row['bstatus'];
$mtrno=$row['mtrno'];
$signedby=$row['champs_signed'];
$salesby=$row['champs_sales'];
$techies=$row['techies'];
$datesigned=$row['date_signed'];
$datefullyinstalled=$row['date_fully_installed'];
$datecabled=$row['date_cabled'];
$dateaccepted=$row['date_accepted'];
$dateturnedon=$row['date_turned_on'];
$iap=$row['iap'];
$oap=$row['oap'];
$floors=$row['floors'];
$shops=$row['shops'];
$apt=$row['apt'];
$vacant=$row['vacantshops'];
$comments=$row['note'];
 
if(is_null($dateaccepted) || is_null($datecabled) || is_null($datefullyinstalled) || is_null($dateturnedon)){
    $sign = date("Y-m-d");
    $accept = date("Y-m-d");
    $cabled = date("Y-m-d");
    $full = date("Y-m-d");
    $turn = date("Y-m-d");
}else{
$sign = date("Y-m-d", strtotime($datesigned));
$accept = date("Y-m-d", strtotime($dateaccepted));
$cabled = date("Y-m-d", strtotime($datecabled));
$full = date("Y-m-d", strtotime($datefullyinstalled));
$turn = date("Y-m-d", strtotime($dateturnedon));
}

if(isset($_POST['submit'])){
$Bname = $_POST['bname'];
$Bcode = $_POST['bcode'];
$Status = $_POST['status'];
$Meter = $_POST['mtrno'];
$Region = $_POST['region'];
$Sales = $_POST['sales'];
$Signed = $_POST['signed'];
$Techies = $_POST['techies'];
$DateAccepted = $_POST['dateaccepted'];
$Datecabled = $_POST['datecabled'];
$Datesigned = $_POST['datesigned'];
$Datefullyinstalled = $_POST['datefullyinstalled'];
$Iap = $_POST['iap'];
$Dateturnedon = $_POST['dateturnedon'];
$Oap = $_POST['oap'];
$Floors = $_POST['floors'];
$Apt = $_POST['apt'];
$Vacant = $_POST['vacant'];
$Shops = $_POST['shops'];
$Comments = $_POST['comments'];


//checking if connection is not created successfully
if($connection->connect_error){
    die('connection failed : '.$connection->connect_error);
}
else
{
  $sql="UPDATE buildings set bname='$Bname',bcode='$Bcode',bstatus='$Status',mtrno='$Meter',region='$Region',champs_sales='$Sales',champs_signed='$Signed', 
  techies='$Techies',date_cabled='$Datecabled',date_signed='$Datesigned',date_fully_installed='$Datefullyinstalled',iap='$Iap',oap='$Oap',floors='$Floors',
  date_turned_on='$Dateturnedon',apt='$Apt',vacantshops='$Vacant',shops='$Shops',note='$Comments',date_accepted='$DateAccepted' where id=$id";
  
  $result=mysqli_query($connection,$sql);
  if ($result) {
    $_SESSION["success"] = "Records Updated";
    header("Location: ../g44.php");
  } else {
    $_SESSION["status"] = "Records Not Updated";
    header("Location: ../g44.php");
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
    <title>Change status</title>
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

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    
    <link href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css" rel="stylesheet">

<link href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css" rel="stylesheet">

<!-- Bootstrap core JavaScript-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
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
                        <a href="../dashboard.php"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                    </li>
                    <li class="menu-title" >DOCUMENTATION</li><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" style="color:black; font-size: 15px;"class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>KCIS</a>
                        <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon ti-list"></i><a href="../new_building.php" style="color:black; font-size: 15px;">New Building Report</a></li>
                            <li><i class="fa fa-table"></i><a href="../r&m.php" style="color:black; font-size: 15px;">R&M</a></li>
                            <li><i class="fa fa-table"></i><a href="../zmm.php" style="color:black; font-size: 15px;">ZMM</a></li>
                            <li><i class="fa fa-table"></i><a href="../g44.php" style="color:black; font-size: 15px;">G44</a></li>
                            <li><i class="fa fa-table"></i><a href="../g45s.php" style="color:black; font-size: 15px;">G45S</a></li>
                            <li><i class="fa fa-table"></i><a href="../g45n.php" style="color:black; font-size: 15px;">G45N</a></li>
                            <li><i class="fa fa-table"></i><a href="../kwt.php" style="color:black; font-size: 15px;">KWT</a></li>
                            <li><i class="fa fa-table"></i><a href="../lsm.php" style="color:black; font-size: 15px;">LSM</a></li>
                            <li><i class="fa fa-table"></i><a href="../htr.php" style="color:black; font-size: 15px;">HTR</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" style="color:black; font-size: 15px;"class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>IP DOCUMENT</a>
                        <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon ti-list"></i><a href="../new_ip_entry.php" style="color:black; font-size: 15px;">New Entry</a></li>
                        <li><i class="fa fa-table"></i><a href="../r&m_ip.php" style="color:black; font-size: 15px;">R&M</a></li>
                            <li><i class="fa fa-table"></i><a href="../zmm_ip.php" style="color:black; font-size: 15px;">ZMM</a></li>
                            <li><i class="fa fa-table"></i><a href="../g44_ip.php" style="color:black; font-size: 15px;">G44</a></li>
                            <li><i class="fa fa-table"></i><a href="../g45s_ip.php" style="color:black; font-size: 15px;">G45S</a></li>
                            <li><i class="fa fa-table"></i><a href="../g45n1_ip.php" style="color:black; font-size: 15px;">G45N 1</a></li>
                            <li><i class="fa fa-table"></i><a href="../g45n2_ip.php" style="color:black; font-size: 15px;">G45N 2</a></li>
                            <li><i class="fa fa-table"></i><a href="../kwt1_ip.php" style="color:black; font-size: 15px;">KWT 1</a></li>
                            <li><i class="fa fa-table"></i><a href="../kwt2_ip.php" style="color:black; font-size: 15px;">KWT 2</a></li>
                            <li><i class="fa fa-table"></i><a href="../jcr_ip.php" style="color:black; font-size: 15px;">JAR</a></li>
                            <li><i class="fa fa-table"></i><a href="../lsm_ip.php" style="color:black; font-size: 15px;">LSM</a></li>
                            <li><i class="fa fa-table"></i><a href="../htr_ip.php" style="color:black; font-size: 15px;">HTR</a></li></ul>
                    </li>
                    <li class="menu-title" >REPORTS</li><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" style="color:black; font-size: 15px;"class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Tech Support</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-list"></i><a href="fill-report.php" style="color:black; font-size: 15px;">Fill Report</a></li>
                            <li><i class="fa fa-inbox"></i><a href="nats-reports.php" style="color:black; font-size: 15px;">View Reports </a></li>
                            <li><i class="fa fa-inbox"></i><a href="compiled_nats-reports.php" style="color:black; font-size: 15px;">Compiled Reports </a></li>
                            <li><i class="fa fa-inbox"></i><a href="nats-graphs.php" style="color:black; font-size: 15px;">Graphical Report </a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" style="color:black; font-size: 15px;"class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Developers</a>
                        <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-list"></i><a href="../fill_developers_report.php" style="color:black; font-size: 15px;">Fill Report</a></li>
                            <li><i class="fa fa-inbox"></i><a href="../view_developers_report.php" style="color:black; font-size: 15px;">View Reports </a></li>
                            <li><i class="fa fa-inbox"></i><a href="../compiled_developers_report.php" style="color:black; font-size: 15px;">Compiled Reports </a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" style="color:black; font-size: 15px;"class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Documentation</a>
                        <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-list"></i><a href="../fill_documentation_report.php" style="color:black; font-size: 15px;">Fill Report</a></li>
                            <li><i class="fa fa-inbox"></i><a href="../view_documentaion_report.php" style="color:black; font-size: 15px;">View Reports </a></li>
                            <li><i class="fa fa-inbox"></i><a href="../compiled_documentaion_report.php" style="color:black; font-size: 15px;">Compiled Reports </a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" style="color:black; font-size: 15px;"class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Maton</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-inbox"></i><a href="../view-reports.php" style="color:black; font-size: 15px;">View Reports </a></li>
                            <li><i class="fa fa-inbox"></i><a href="../maton-graph.php" style="color:black; font-size: 15px;">Graphical Report </a></li>
                        </ul>
                    </li>
                    <li class="menu-title">PANEL APS</li><!-- /.menu-title -->
                    <li>
                        <a href=".../installed.php" style="color:black; font-size: 15px;"> <i class="menu-icon ti-layout-grid3"></i>Installed </a>
                    </li>
                    <li>
                        <a href="../imported_paps.php" style="color:black; font-size: 15px;"> <i class="menu-icon ti-layout-grid3"></i>Imported </a>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" style="color:black; font-size: 15px;"class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Turned On</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="../turnedontoday.php" style="color:black; font-size: 15px;">Today</a></li>
                            <li><i class="fa fa-table"></i><a href="../last-7-days.php"style="color:black; font-size: 15px;">Last 7 Days</a></li>
                            <li><i class="fa fa-table"></i><a href="../last-30-days.php" style="color:black; font-size: 15px;">Last 30 Days</a></li>
                            <li><i class="fa fa-table"></i><a href="../turnedon.php" style="color:black; font-size: 15px;">All Records</a></li>
                        </ul>
                    </li>
                   
                    <li class="menu-title" >TOOLS</li><!-- /.menu-title -->
                    <li>
                        <a href="../profile.php" style="color:black; font-size: 15px;"> <i class="menu-icon ti-user"></i>Profile </a>
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

               
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="name float-left"><?php echo $_SESSION[
                 "FName"
             ]; ?> <?php echo $_SESSION["LName"]; ?></span>
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="../../index.php"><i class="fa fa-power -off"></i>Logout</a>
                        </div>
                    </div>

                </div>
            </div>
        </header>
        <!-- /#header -->
        <!-- Header-->

        <div class="content">
            <div class="animated fadeIn">


                <div class="row">
                <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header"></div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Edit Building Info</h3>
                                        </div>
                                        <hr>
                                        <form method="POST" action="">
                                        <div class="row">
                                           <div class="col-6">
                                            <div class="form-group">   
                                            <strong><label for="cc-payment" class="control-label mb-1">Building Name</label></strong>
                                                <input id="cc-pament" name="bname"  type="text" value="<?php echo $bname?>" required  class="form-control" aria-required="true" aria-invalid="false" placeholder="Building Name">
                                            </div>
                                               </div>
                                               <div class="col-6">
                                            <div class="form-group has-success">
                                            <strong><label for="cc-name" class="control-label mb-1">Building Code</label></strong>
                                                <input id="cc-name" name="bcode" type="text" class="form-control cc-name valid" value="<?php echo $bcode?>" required  data-val="true" placeholder="Building Code"
                                                    autocomplete="cc-name"  aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div></div></div>
                                            <div class="form-group has-success">
                                            <strong><label for="cc-name" class="control-label mb-1">Region</label></strong>
                                                <input id="cc-name" name="region" type="text" class="form-control cc-name valid" value="<?php echo $region?>" required data-val="true" placeholder="Region"
                                                    autocomplete="cc-name"  aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="form-group">
                                            <strong> <label for="cc-number" class="control-label mb-1">Status</label></strong>
                                                <div class="form-group has-success">
                                            <select data-placeholder="Choose a Country..." class="standardSelect form-control" name="status" tabindex="1" required>
                                            <option value="<?php echo $status?>"><?php echo $status?></option>
                                                <option value="6. IAP In Service">6. IAP In Service</option>
                                                  <option value="7. PAP In Service">7. PAP In Service</option>
                                               <option value="4. Fully Installed">4. Fully Installed</option>
                                              </select>
                                            </div>
                                            </div>
                                            <div>
                                            <div class="form-group">
                                            <strong><label for="cc-payment" class="control-label mb-1">Meter Number</label></strong>
                                                <input id="cc-pament" name="mtrno"  type="text" value="<?php echo $mtrno?>"  class="form-control" aria-required="true" aria-invalid="false" placeholder="Meter Number">
                                            </div>
                                            <div class="row">
                                           <div class="col-6">
                                            <div class="form-group has-success">
                                            <strong><label for="cc-name" class="control-label mb-1">Signed By</label></strong>
                                                <input id="cc-name" name="signed" type="text" class="form-control cc-name valid" value="<?php echo $signedby?>"  data-val="true" placeholder="Signed By"
                                                    autocomplete="cc-name" radonly aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div></div>
                                            <div class="col-6">
                                            <div class="form-group has-success">
                                            <strong><label for="cc-name" class="control-label mb-1">Sales by</label></strong>
                                                <input id="cc-name" name="sales" type="text" class="form-control cc-name valid" value="<?php echo $salesby?>"  data-val="true" placeholder="Sales by"
                                                    autocomplete="cc-name" radonly aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div></div></div>
                                            <div class="form-group has-success">
                                            <strong> <label for="cc-name" class="control-label mb-1">Techies</label></strong>
                                                <input id="cc-name" name="techies" type="text" class="form-control cc-name valid" value="<?php echo $techies?>" required data-val="true" placeholder="Techies"
                                                    autocomplete="cc-name" radonly aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="row">
                                           <div class="col-6">
                                            <div class="form-group">
                                            <strong> <label for="cc-payment" class="control-label mb-1">Date Signed</label></strong>
                                                <input id="date" name="datesigned"  type="text" value="<?php echo $sign?>"  class="form-control"  aria-required="true" aria-invalid="false" placeholder="Date Signed">
                                            </div></div>
                                            <div class="col-6">
                                            <div class="form-group has-success">
                                            <strong><label for="cc-name" class="control-label mb-1">Date Cabled</label></strong>
                                                <input id="date" name="datecabled" type="date" class="form-control cc-name valid" value="<?php echo $cabled?>"   data-val="true" placeholder="Date Cabled"
                                                    autocomplete="cc-name" radonly aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div></div></div>
                                            <div class="row">
                                           <div class="col-6">
                                            <div class="form-group">
                                            <strong><label for="cc-payment" class="control-label mb-1">Date Fully Installed</label></strong>
                                                <input id="date" name="datefullyinstalled"  type="date" value="<?php echo $full?>"  class="form-control"  aria-required="true" aria-invalid="false" placeholder="Date Fully Installed">
                                            </div></div>
                                            <div class="col-6">
                                            <div class="form-group has-success">
                                            <strong><label for="cc-name" class="control-label mb-1">Date Accepted</label></strong>
                                                <input id="date" name="dateaccepted" type="date" class="form-control cc-name valid" value="<?php echo $accept?>"  data-val="true" placeholder="Date Accepted"
                                                    autocomplete="cc-name" radonly aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div></div></div>
                                            <div class="form-group has-success">
                                            <strong><label for="cc-name" class="control-label mb-1">Date turnedon</label></strong>
                                                <input id="date" name="dateturnedon" type="date" class="form-control cc-name valid" value="<?php echo $turn?>"  data-val="true" placeholder="Date turnedon"
                                                    autocomplete="cc-name" radonly aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="row">
                                           <div class="col-3">
                                            <div class="form-group has-success">
                                            <strong> <label for="cc-name" class="control-label mb-1">IAP</label></strong>
                                                <input id="cc-name" name="iap" type="text" class="form-control cc-name valid" value="<?php echo $iap?>"  data-val="true" placeholder="IAP"
                                                    autocomplete="cc-name"  aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div></div>
                                            <div class="col-3">
                                            <div class="form-group has-success">
                                            <strong><label for="cc-name" class="control-label mb-1">OAP</label></strong>
                                                <input id="cc-name" name="oap" type="text" class="form-control cc-name valid" value="<?php echo $oap?>"  data-val="true" placeholder="OAP"
                                                    autocomplete="cc-name"  aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div></div>
                                            <div class="col-3">
                                            <div class="form-group has-success">
                                            <strong><label for="cc-name" class="control-label mb-1">Floors</label></strong>
                                                <input id="cc-name" name="floors" type="text" class="form-control cc-name valid" value="<?php echo $floors?>"  data-val="true" placeholder="Floors"
                                                    autocomplete="cc-name" radonly aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div></div>
                                            <div class="col-3">
                                            <div class="form-group has-success">
                                            <strong><label for="cc-name" class="control-label mb-1">Shops</label></strong>
                                                <input id="cc-name" name="shops" type="text" class="form-control cc-name valid" value="<?php echo $shops?>"  data-val="true" placeholder="Shops"
                                                    autocomplete="cc-name" radonly aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div></div>
                                        </div>
                                        <div class="row">
                                           <div class="col-6">
                                            <div class="form-group has-success">
                                            <strong><label for="cc-name" class="control-label mb-1">Apt</label></strong>
                                                <input id="cc-name" name="apt" type="text" class="form-control cc-name valid" value="<?php echo $apt?>"  data-val="true" placeholder="Apt"
                                                    autocomplete="cc-name" radonly aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div></div>
                                            <div class="col-6">
                                            <div class="form-group has-success">
                                                <strong><label for="cc-name" class="control-label mb-1">Vacant Shops</label></strong>
                                                <input id="cc-name" name="vacant" type="text" class="form-control cc-name valid" value="<?php echo $vacant?>"  data-val="true" placeholder="Vacant shops"
                                                    autocomplete="cc-name" radonly aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div></div></div>
                                        <div class="form-group has-success">
                                        <strong><label for="cc-name" class="control-label mb-1">Comments</label></strong>
                                                <input id="cc-name" name="comments" type="text" class="form-control cc-name valid" value="<?php echo $comments?>"  data-val="true" placeholder="Comments"
                                                    autocomplete="cc-name"  aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                            <div>
                                                <button id="payment-button" type="submit" name="submit" class="btn btn-warning">
                                                    <span id="payment-button-amount">Change Status</span>
                                                    <span id="payment-button-sending" style="display:none;">Sending…</span>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
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
<script>
    jQuery(document).ready(function() {
        jQuery(".standardSelect").chosen({
            disable_search_threshold: 10,
            no_results_text: "Oops, nothing matches",
            width: "100%"
        });
    });
</script>
<script type="text/javascript">
$( document ).ready(function() {
$('#example').DataTable({
		 "processing": true,
		 "dom": 'lBfrtip',
		 "buttons": [
            {
                extend: 'collection',
                text: 'Export',
                buttons: [
                    'excel',
                    'csv'
                ]
            }
        ]
        });
});
</script>
</body>
</html>
