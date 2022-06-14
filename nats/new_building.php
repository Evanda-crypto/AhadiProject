<?php
include "session.php";
include "../config/config.php";
date_default_timezone_set("Africa/Nairobi");
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>New Buidling</title>
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
                        <a href="dashboard.php"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                    </li>
                    <li class="menu-title" >DOCUMENTATION</li><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" style="color:black; font-size: 15px;"class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>KCIS</a>
                        <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon ti-list"></i><a href="new_building.php" style="color:black; font-size: 15px;">New Building Report</a></li>
                        <li><i class="fa fa-table"></i><a href="r&m.php" style="color:black; font-size: 15px;">R&M</a></li>
                            <li><i class="fa fa-table"></i><a href="zmm.php" style="color:black; font-size: 15px;">ZMM</a></li>
                            <li><i class="fa fa-table"></i><a href="g44.php" style="color:black; font-size: 15px;">G44</a></li>
                            <li><i class="fa fa-table"></i><a href="g45s.php" style="color:black; font-size: 15px;">G45S</a></li>
                            <li><i class="fa fa-table"></i><a href="g45n.php" style="color:black; font-size: 15px;">G45N</a></li>
                            <li><i class="fa fa-table"></i><a href="kwt.php" style="color:black; font-size: 15px;">KWT</a></li>
                            <li><i class="fa fa-table"></i><a href="lsm.php" style="color:black; font-size: 15px;">LSM</a></li>
                            <li><i class="fa fa-table"></i><a href="htr.php" style="color:black; font-size: 15px;">HTR</a></li></ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" style="color:black; font-size: 15px;"class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>IP DOCUMENT</a>
                        <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon ti-list"></i><a href="new_ip_entry.php" style="color:black; font-size: 15px;">New Entry</a></li>
                        <li><i class="fa fa-table"></i><a href="r&m_ip.php" style="color:black; font-size: 15px;">R&M</a></li>
                            <li><i class="fa fa-table"></i><a href="zmm_ip.php" style="color:black; font-size: 15px;">ZMM</a></li>
                            <li><i class="fa fa-table"></i><a href="g44_ip.php" style="color:black; font-size: 15px;">G44</a></li>
                            <li><i class="fa fa-table"></i><a href="g45s_ip.php" style="color:black; font-size: 15px;">G45S</a></li>
                            <li><i class="fa fa-table"></i><a href="g45n_ip.php" style="color:black; font-size: 15px;">G45N</a></li>
                            <li><i class="fa fa-table"></i><a href="kwt_ip.php" style="color:black; font-size: 15px;">KWT</a></li>
                            <li><i class="fa fa-table"></i><a href="lsm_ip.php" style="color:black; font-size: 15px;">LSM</a></li>
                            <li><i class="fa fa-table"></i><a href="htr_ip.php" style="color:black; font-size: 15px;">HTR</a></li></ul>
                    </li>
                    <li class="menu-title" >REPORTS</li><!-- /.menu-title -->
                    <li>
                        <a href="fill-report.php" style="color:black; font-size: 15px;"> <i class="menu-icon ti-list"></i>Fill Report </a>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" style="color:black; font-size: 15px;"class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Nats</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-inbox"></i><a href="nats-reports.php" style="color:black; font-size: 15px;">View Reports </a></li>
                            <li><i class="fa fa-inbox"></i><a href="compiled_nats-reports.php" style="color:black; font-size: 15px;">Compiled Reports </a></li>
                            <li><i class="fa fa-inbox"></i><a href="nats-graphs.php" style="color:black; font-size: 15px;">Graphical Report </a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" style="color:black; font-size: 15px;"class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Maton</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-inbox"></i><a href="view-reports.php" style="color:black; font-size: 15px;">View Reports </a></li>
                            <li><i class="fa fa-inbox"></i><a href="maton-graph.php" style="color:black; font-size: 15px;">Graphical Report </a></li>
                        </ul>
                    </li>
                    <li class="menu-title">PANEL APS</li><!-- /.menu-title -->
                    <li>
                        <a href="installed.php" style="color:black; font-size: 15px;"> <i class="menu-icon ti-layout-grid3"></i>Installed </a>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" style="color:black; font-size: 15px;"class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Turned On</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="turnedontoday.php" style="color:black; font-size: 15px;">Today</a></li>
                            <li><i class="fa fa-table"></i><a href="last-7-days.php"style="color:black; font-size: 15px;">Last 7 Days</a></li>
                            <li><i class="fa fa-table"></i><a href="last-30-days.php" style="color:black; font-size: 15px;">Last 30 Days</a></li>
                            <li><i class="fa fa-table"></i><a href="turnedon.php" style="color:black; font-size: 15px;">All Records</a></li>
                        </ul>
                    </li>
                   
                    <li class="menu-title" >TOOLS</li><!-- /.menu-title -->
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

               
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="name float-left"><?php echo $_SESSION[
                            "FName"
                        ]; ?> <?php echo $_SESSION["LName"]; ?></span>
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="../index.php"><i class="fa fa-power -off"></i>Logout</a>
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
                <div class="col-lg-">
                                <div class="card">
                                    <div class="card-header"></div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">New Building Report</h3>
                                        </div>
                                        <hr>
                                        <?php if (
                                            isset($_SESSION["status"])
                                        ) { ?>
               <center><span> <div class="alert alert-danger" role="alert">
                   <?php
                   echo $_SESSION["status"];
                   unset($_SESSION["status"]);
                   ?>
                 </div></span></center>
                <?php } elseif (isset($_SESSION["success"])) { ?>
                <center><span><div class="alert alert-success" role="alert">
                   <?php
                   echo $_SESSION["success"];
                   unset($_SESSION["success"]);
                   ?>
                 </div></span></center>
                <?php } ?>
                                        <form method="POST" action="new_building_details.php">
                                        <div class="row">
                                           <div class="col-6">
                                            <div class="form-group">   
                                            <strong><label for="cc-payment" class="control-label mb-1">Building Name<span style="color: #FF0000" >*</span></label></strong>
                                                <input id="cc-pament" name="bname"  type="text" required  class="form-control" aria-required="true" aria-invalid="false" placeholder="Building Name">
                                            </div>
                                               </div>
                                               <div class="col-6">
                                            <div class="form-group has-success">
                                            <strong><label for="cc-name" class="control-label mb-1">Building Code<span style="color: #FF0000" >*</span></label></strong>
                                                <input id="cc-name" name="bcode" type="text" class="form-control cc-name valid"  required  data-val="true" placeholder="Building Code"
                                                    autocomplete="cc-name"  aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div></div></div>
                                            <div class="form-group">
                                            <strong> <label for="cc-number" class="control-label mb-1">Region<span style="color: #FF0000" >*</span></label> </strong>
                                                <div class="form-group has-success">
                                            <select data-placeholder="Choose a region..." class="standardSelect form-control" name="Region" tabindex="1" required>
                                            <option disabled selected >Choose Region...</option>
                                            <option value="G44">G44</option>
                                            <option value="ZMM">ZMM</option>
                                            <option value="G45S">G45S</option>
                                            <option value="G45N">G45N</option>
                                            <option value="R&M">R&M</option>
                                            <option value="LSM">LSM</option>
                                            <option value="KWT">KWT</option> 
                                            <option value="HTR">HTR</option>
                                           <option value="MWK">MWK</option>
                                            </select>
                                            </div>
                                            </div>
                                            <div class="form-group">
                                            <strong> <label for="cc-number" class="control-label mb-1">Status<span style="color: #FF0000" >*</span></label></strong>
                                                <div class="form-group has-success">
                                            <select data-placeholder="Choose a Status..." class="standardSelect form-control" name="status" tabindex="1" required>
                                            <option disabled selected >Choose  Status...</option>
                                            <option value="2. Signed">2. Signed</option>
                                                  <option value="3. Cabled">3. Cabled</option>
                                               <option value="4. Fully Installed">4. Fully Installed</option>
                                                <option value="6. IAP In Service">6. IAP In Service</option>
                                                  <option value="7. PAP In Service">7. PAP In Service</option>
                                              </select>
                                            </div>
                                            </div>
                                            <div>
                                            <div class="form-group">
                                            <strong><label for="cc-payment" class="control-label mb-1">Meter Number</label></strong>
                                                <input id="cc-pament" name="mtrno"  type="text"  class="form-control" aria-required="true" aria-invalid="false" placeholder="Meter Number">
                                            </div>
                                            <div class="row">
                                           <div class="col-6">
                                            <div class="form-group has-success">
                                            <strong><label for="cc-name" class="control-label mb-1">Signed By</label></strong>
                                                <input id="cc-name" name="signed" type="text" class="form-control cc-name valid"  data-val="true" placeholder="Signed By"
                                                    autocomplete="cc-name" radonly aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div></div>
                                            <div class="col-6">
                                            <div class="form-group has-success">
                                            <strong><label for="cc-name" class="control-label mb-1">Sales by</label></strong>
                                                <input id="cc-name" name="sales" type="text" class="form-control cc-name valid"   data-val="true" placeholder="Sales by"
                                                    autocomplete="cc-name" radonly aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div></div></div>
                                            <div class="form-group has-success">
                                            <strong> <label for="cc-name" class="control-label mb-1">Techies</label></strong>
                                                <input id="cc-name" name="techies" type="text" class="form-control cc-name valid" data-val="true" placeholder="Techies"
                                                    autocomplete="cc-name" radonly aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="row">
                                           <div class="col-6">
                                            <div class="form-group">
                                            <strong> <label for="cc-payment" class="control-label mb-1">Date Signed</label></strong>
                                                <input id="date1" name="datesigned"  type="date"   class="form-control"  aria-required="true" aria-invalid="false" placeholder="Date Signed">
                                            </div></div>
                                            <div class="col-6">
                                            <div class="form-group has-success">
                                            <strong><label for="cc-name" class="control-label mb-1">Date Cabled</label></strong>
                                                <input id="date2" name="datecabled" type="date" class="form-control cc-name valid"    data-val="true" placeholder="Date Cabled"
                                                    autocomplete="cc-name" radonly aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div></div></div>
                                            <div class="row">
                                           <div class="col-6">
                                            <div class="form-group">
                                            <strong><label for="cc-payment" class="control-label mb-1">Date Fully Installed</label></strong>
                                                <input id="date3" name="datefullyinstalled"  type="date"   class="form-control"  aria-required="true" aria-invalid="false" placeholder="Date Fully Installed">
                                            </div></div>
                                            <div class="col-6">
                                            <div class="form-group has-success">
                                            <strong><label for="cc-name" class="control-label mb-1">Date Accepted</label></strong>
                                                <input id="date4" name="dateaccepted" type="date" class="form-control cc-name valid"   data-val="true" placeholder="Date Accepted"
                                                    autocomplete="cc-name" radonly aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div></div></div>
                                            <div class="form-group has-success">
                                            <strong><label for="cc-name" class="control-label mb-1">Date turnedon</label></strong>
                                                <input id="date5" name="dateturnedon" type="date" class="form-control cc-name valid"   data-val="true" placeholder="Date turnedon"
                                                    autocomplete="cc-name" radonly aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="row">
                                           <div class="col-3">
                                            <div class="form-group has-success">
                                            <strong> <label for="cc-name" class="control-label mb-1">IAP</label></strong>
                                                <input id="cc-name" name="iap" type="text" class="form-control cc-name valid"   data-val="true" placeholder="IAP"
                                                    autocomplete="cc-name"  aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div></div>
                                            <div class="col-3">
                                            <div class="form-group has-success">
                                            <strong><label for="cc-name" class="control-label mb-1">OAP</label></strong>
                                                <input id="cc-name" name="oap" type="text" class="form-control cc-name valid"   data-val="true" placeholder="OAP"
                                                    autocomplete="cc-name"  aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div></div>
                                            <div class="col-3">
                                            <div class="form-group has-success">
                                            <strong><label for="cc-name" class="control-label mb-1">Floors</label></strong>
                                                <input id="cc-name" name="floors" type="text" class="form-control cc-name valid"   data-val="true" placeholder="Floors"
                                                    autocomplete="cc-name" radonly aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div></div>
                                            <div class="col-3">
                                            <div class="form-group has-success">
                                            <strong><label for="cc-name" class="control-label mb-1">Shops</label></strong>
                                                <input id="cc-name" name="shops" type="text" class="form-control cc-name valid"  data-val="true" placeholder="Shops"
                                                    autocomplete="cc-name" radonly aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div></div>
                                        </div>
                                        <div class="row">
                                           <div class="col-6">
                                            <div class="form-group has-success">
                                            <strong><label for="cc-name" class="control-label mb-1">Apt</label></strong>
                                                <input id="cc-name" name="apt" type="text" class="form-control cc-name valid"   data-val="true" placeholder="Apt"
                                                    autocomplete="cc-name" radonly aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div></div>
                                            <div class="col-6">
                                            <div class="form-group has-success">
                                                <strong><label for="cc-name" class="control-label mb-1">Vacant Shops</label></strong>
                                                <input id="cc-name" name="vacant" type="text" class="form-control cc-name valid"  data-val="true" placeholder="Vacant shops"
                                                    autocomplete="cc-name" radonly aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div></div></div>
                                        <div class="form-group has-success">
                                        <strong><label for="cc-name" class="control-label mb-1">Comments<span style="color: #FF0000" >*</span></label></strong>
                                                <input id="cc-name" name="comments" type="text" class="form-control cc-name valid"  data-val="true" placeholder="Comments"
                                                    autocomplete="cc-name" required aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                            <div>
                                                <button id="payment-button" type="submit" name="submit" class="btn btn-success">
                                                    <span id="payment-button-amount">submit</span>
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
<script src="../assets/js/main.js"></script>
<script src="../assets/js/lib/chosen/chosen.jquery.min.js"></script>
<script>
    jQuery(document).ready(function() {
        jQuery(".standardSelect").chosen({
            disable_search_threshold: 10,
            no_results_text: "Oops, nothing matches",
            width: "100%"
        });
    });
</script>
</body>
</html>
