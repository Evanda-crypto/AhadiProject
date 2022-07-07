<?php
include("session.php");
include("../config/config.php");

?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>IP Reports G44</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="refresh" content="1200">

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="../assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="../assets/css/style.css">

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
                            <li><i class="fa fa-table"></i><a href="g45n1_ip.php" style="color:black; font-size: 15px;">G45N 1</a></li>
                            <li><i class="fa fa-table"></i><a href="g45n2_ip.php" style="color:black; font-size: 15px;">G45N 2</a></li>
                            <li><i class="fa fa-table"></i><a href="kwt1_ip.php" style="color:black; font-size: 15px;">KWT 1</a></li>
                            <li><i class="fa fa-table"></i><a href="kwt2_ip.php" style="color:black; font-size: 15px;">KWT 2</a></li>
                            <li><i class="fa fa-table"></i><a href="jcr_ip.php" style="color:black; font-size: 15px;">JAR</a></li>
                            <li><i class="fa fa-table"></i><a href="lsm_ip.php" style="color:black; font-size: 15px;">LSM</a></li>
                            <li><i class="fa fa-table"></i><a href="htr_ip.php" style="color:black; font-size: 15px;">HTR</a></li></ul>
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
        </header><!-- /header -->
        <!-- Header-->

        <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                           <center> <strong class="card-title">IP Reports G44</strong></center>
                        </div>
                        <div class="card-body"><?php
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
                            <table class="table table-bordered table-striped" id="example">
                                <thead>
                                    <tr>
                                    <th>Zone</th>
                                    <th>vlanid_device</th>
                                    <th>vlanid_user</th>
                                    <th>device_ip</th>
                                    <th>user_ip</th>
                                    <th>cluster</th>
                                    <th>Buildings</th>
                                    <th>Codes</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
    
    $sql="SELECT 
    group_concat(DISTINCT zones ,'".'<br>'."' SEPARATOR ' ' ) AS zones,
    group_concat(DISTINCT vlanid_device ,'".'<br>'."' SEPARATOR ' ' ) AS vlanid_device,
    group_concat(DISTINCT vlanid_user ,'".'<br>'."' SEPARATOR ' ' ) AS vlanid_user,
    group_concat(DISTINCT device_ip ,'".'<br>'."' SEPARATOR ' ' ) AS device_ip,
    group_concat(DISTINCT user_ip ,'".'<br>'."' SEPARATOR ' ' ) AS user_ip,
    group_concat(DISTINCT cluster ,'".'<br>'."' SEPARATOR ' ' ) AS cluster,
    group_concat(buildings ,'".'<br>'."' SEPARATOR ' ' ) AS buildings,
    group_concat(building_codes ,'".'<br>'."' SEPARATOR ' ' ) AS building_codes,
    group_concat(bstatus ,'".'<br>'."' SEPARATOR ' ' ) AS bstatus   
    from ip_document_reports where region='G44' group by zones,cluster";
$result=$connection->query($sql);
while($row=$result->fetch_array()){
  ?>
  <tr>
    <td><?php echo $row['zones']?></td>
    <td><?php echo $row['vlanid_device']?></td>
    <td><?php echo $row['vlanid_user']?></td>
    <td><?php echo $row['device_ip']?></td>
    <td><?php echo $row['user_ip']?></td>
    <td><?php echo $row['cluster']?></td>
    <td><?php echo $row['buildings']?></td>
    <td><?php echo $row['building_codes']?></td>
</tr>
<?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

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

<script type="text/javascript">
$( document ).ready(function() {
$('#example').DataTable({
    order: [[1, 'asc']],
    
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
        ],
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        "scrollY":        "700px",
        "scrollCollapse": true
        
        });
});
</script>
</body>
</html>
