<?php 
include "session.php";
include "../config/config.php";
include_once("../includes/regions.php");
include_once('../includes/links.php');

?>
<?php 
$id = $_GET['id'];
$sql = "SELECT * FROM paneldb.region_description where id= $id";
$result = $connection->query($sql);
$region_data = $result->fetch_array();
?>
<!doctype html>
<html>
<head>
    <meta http-equiv="refresh" content="300">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Edit Region</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="../assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

<!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

<link href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css" rel="stylesheet">

<link href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<body>
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
                            <li><i class="fa fa-table"></i><a href="g45n1_ip.php" style="color:black; font-size: 15px;">G45N 1</a></li>
                            <li><i class="fa fa-table"></i><a href="g45n2_ip.php" style="color:black; font-size: 15px;">G45N 2</a></li>
                            <li><i class="fa fa-table"></i><a href="kwt1_ip.php" style="color:black; font-size: 15px;">KWT 1</a></li>
                            <li><i class="fa fa-table"></i><a href="kwt2_ip.php" style="color:black; font-size: 15px;">KWT 2</a></li>
                            <li><i class="fa fa-table"></i><a href="jcr_ip.php" style="color:black; font-size: 15px;">JAR</a></li>
                            <li><i class="fa fa-table"></i><a href="lsm_ip.php" style="color:black; font-size: 15px;">LSM</a></li>
                            <li><i class="fa fa-table"></i><a href="htr_ip.php" style="color:black; font-size: 15px;">HTR</a></li></ul>
                    </li>
                    <li class="menu-title" >REGIONS</li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" style="color:black; font-size: 15px;"class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Region Description</a>
                        <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-list"></i><a data-toggle="modal" data-target="#new_regional_data_modal">Add New Region</a></li>
                            <li><i class="fa fa-eye text-success"></i><a href="view_regional_report.php" style="color:black; font-size: 15px;">View Region Data</a></li>
                        </ul>
                           
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
                        <li><i class="fa fa-list"></i><a href="fill_developers_report.php" style="color:black; font-size: 15px;">Fill Report</a></li>
                            <li><i class="fa fa-inbox"></i><a href="view_developers_report.php" style="color:black; font-size: 15px;">View Reports </a></li>
                            <li><i class="fa fa-inbox"></i><a href="compiled_developers_report.php" style="color:black; font-size: 15px;">Compiled Reports </a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" style="color:black; font-size: 15px;"class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Documentation</a>
                        <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-list"></i><a href="fill_documentation_report.php" style="color:black; font-size: 15px;">Fill Report</a></li>
                            <li><i class="fa fa-inbox"></i><a href="view_documentaion_report.php" style="color:black; font-size: 15px;">View Reports </a></li>
                            <li><i class="fa fa-inbox"></i><a href="compiled_documentaion_report.php" style="color:black; font-size: 15px;">Compiled Reports </a></li>
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
                    <li>
                        <a href="imported_paps.php" style="color:black; font-size: 15px;"> <i class="menu-icon ti-layout-grid3"></i>Imported </a>
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
    <!-- new entry region model -->
    <div class="modal fade align-items-center" id="new_regional_data_modal" tabindex="-1" role="dialog" aria-labelledby="New Entry" aria-hidden="true">
    <?php include_once('./fill_region_report.php')?>
    </div>
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <header id="header" class="header" style="height: 65px;">
            <div class="top-left">
                <div class="navbar-header">
                    <img src="../images/picture1.png" style="width: 120px; height: 60px;" alt="Logo">
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
        <!-- /#header -->
        <!-- Content -->
        <div class="content">
           <div class="card p-3">
                <div class="card-header bg-success text-center"> <h5 class=" ">Update Region Record</h5></div>
               
                <?php if(isset($_SESSION['success'])){?>
                    <div class="p-3 bg-info"><?php $_SESSION['success']?></div>
                <?php } ?>
            
                <form action="new_region_records.php?id=<?php echo $_GET['id']?>" method="POST">
                <div class="row p-3">
                    <div class="form-group">
                         <label for="region">Region</label>
                         <input type="text" class="form-control w-75" 
                         value="<?php echo $region_data['region_name']?>"
                         name="region">
                    </div>
                    <div class="form-group ">
                         <label for="region">Provider</label>
                         <select class=" w-100 form-control" name="provider">
                            <option value="SEACOM" class="form-control">SEACOM</option>
                            <option value="CTG" class="form-control">CTG</option>
                         </select>
                    </div>
                </div>
                <div class="row p-3">
                   <div class="form-group">
                         <label for="public ip">Public IP</label>
                         <input type="text" class="form-control w-75"
                         value= <?php echo $region_data['public_ip']?>
                         name="public_ip">
                    </div>
                    <div class="form-group">
                             <label for="gateway ip">Gateway IP</label>
                             <input type="gatewayip" name="gateway_ip"class="form-control w-75" value=<?php echo $region_data['gateway_ip']?>>
                    </div>
                    <div class="form-group">
                        <label for="regional_ip">Router IP address</label>
                        <input type="ip" class="form-control " name="regional_ip" placeholder="Regional IP address" value= <?php echo $region_data['regional_ip']?>>
                    </div>
                </div>
                <div class="row p-3">
                    <div class="form-group ml-2">
                        <label for="switch">Router Serial Number</label>
                        <input type="ip" class="form-control w-75" name="routersn" value=<?php echo $region_data['routersn']?>>
                     </div>
                    <div class="form-group ml-2">
                         <label for="port_number">Huawei Port Number</label>
                         <input type="port" class="form-control w-75" name="port_number"  value=<?php echo $region_data['portnumber']?>>
                    </div>
                </div>
                 
                
                 <div class="row p-3">
                    <div class="form-group">
                        <label for="switch">Core Switch IP</label>
                        <input type="ip" class="form-control w-75" name="switchip"placeholder="Switch IP address" value=<?php
                        echo $region_data['coreswitch_ip']
                    ?>>
                         </div>
                         <div class="form-group ml-2">
                             <label for="switch">Switch Serial Number</label>
                             <input type="ip" class="form-control w-75" name="switch_serial" value=<?php echo $region_data['coreswitch_sn']?>>
                         </div>
                        
                 </div>
                 
                 <div class="row p-3">
                    <div class="form-group">
                        <label for="switch">AC Serial Number</label>
                        <input type="ip" class="form-control " name="acserial" value=<?php echo $region_data['acsn']?>>
                         </div>
                    <div class="form-group ml-2">
                        <label for="switch">AC IP address</label>
                        <input type="ip" class="form-control w-75 " name="acip"placeholder="AC IP address" value=<?php echo $region_data['acipadress']?>>
                    </div>
                    
                 </div>

                 <div class="row p-3">
                     <div class="form-group">
                        <label for="remote_anydeskid">Remote Anydesk ID</label>
                        <input type="id" class="form-control w-75" name="remote_anydeskid"  value=<?php echo $region_data['remoteanydeskId']?>>
                     </div>
                     <div class="form-group">
                          <label for="remote_anydeskid">Management Anydesk ID</label>
                          <input type="id" class="form-control w-75" name="mngmt_anydeskid"  value=<?php echo $region_data['mngmtanydeskId']?>>
                    </div>
                   
                 </div>

                 <div class="row p-3">
                     <div class="form-group">
                         <label for="remote_anydeskid">Zones</label>
                         <input type="zones" class="form-control w-75" name="zones"  value=<?php echo $region_data['zonesnumber']?>>
                     </div>
                     <div class="form-group">
                          <label for="remote_anydeskid">POP Name</label>
                          <input type="pop" class="form-control w-75" name="pop"  value=<?php echo $region_data['pop']?>>
                     </div>
                     <div class="form-group">
                         <label for="Technical Support">Technical Support</label>
                         <input type="text" class="form-control w-75" name="tsname"  value=<?php echo $region_data['tsname']?>>
                     </div>
                 </div>

                 <div class="row p-3">
                     <div class="form-group">
                         <label for="tech suport">Tech Support Contact</label>
                         <input type="phone" class="form-control w-75" name="tscontact"  value=<?php echo $region_data['tscontact']?>>
                     </div>
                     <div class="form-group ml-3">
                         <label for="tech suport">BTO Personnel[MATTON]</label>
                         <input type="btopersonell" class="form-control w-75" name="btopersonell"  value=<?php echo $region_data['btopersonell']?>>
                     </div>
                     
                 </div>
                <div class="row p-3">
                        <div class="form-group">
                             <label for="tech suport">Sales Response Personnel</label>
                             <input type="srpersonell" class="form-control required w-75" name="srpersonell"  value=<?php echo $region_data['srpersonell']?>>
                        </div>
                     <div class="form-group ml-3">
                         <label for="tech suport">Maintenance Personnel[MATON]</label>
                         <input type="btopersonell" class="form-control w-75" name="mrpersonell"  value=<?php echo $region_data['mrpersonell']?>>
                     </div>
                     <div class="form-group ml-3">
                         <label for="tech suport">Installation Personnel[MATON]</label>
                         <input type="btopersonell" class="form-control w-75" name="irpersonell"
                         value=<?php echo $region_data['irpersonell']?>>
                     </div>
                 </div>
                 
            </div>
                 <button type="submit" class="btn btn-primary" name="edit_btn">Save</button>
            </div>
           </form> 
        </div>
    </div>
        </body>
</html>


    
        