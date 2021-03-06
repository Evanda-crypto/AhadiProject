<?php
include "session.php";
include "../../config/config.php";
?>
<?php if (!$connection) {
    # code...
    echo "Problem in database connection! Contact administrator!" .
        mysqli_error();
} else {
    $sql =
        "SELECT upper(Region) as reg, COUNT(clientID) as pap FROM turnedonpap GROUP BY Region ORDER BY pap DESC";
    $result = mysqli_query($connection, $sql);
    $chart_data = "";
    while ($row = mysqli_fetch_array($result)) {
        $Region[] = $row["reg"];
        $Clients[] = $row["pap"];
    }
} ?>
<?php
$sql =
    "SELECT EXTRACT(MONTH FROM papdailysales.DateSigned),MONTHNAME(papdailysales.DateSigned) as month,COUNT(papdailysales.ClientID) as pap
     FROM papdailysales LEFT JOIN papnotinstalled on papnotinstalled.ClientID=papdailysales.ClientID WHERE papnotinstalled.ClientID is null and papdailysales.Region='" .
    $_SESSION["Region"] .
    "'
     GROUP BY month,EXTRACT(MONTH FROM papdailysales.DateSigned) order by EXTRACT(MONTH FROM papdailysales.DateSigned) asc";
$result = mysqli_query($connection, $sql);
$chart_data = "";
while ($row = mysqli_fetch_array($result)) {
    $Month[] = $row["month"];
    $Signed[] = $row["pap"];
}
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="refresh" content="60">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboard</title>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="../../assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script>-->
    <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />

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

   <style>
    #weatherWidget .currentDesc {
        color: #ffffff!important;
    }
        .traffic-chart {
            min-height: 335px;
        }
        #flotPie1  {
            height: 150px;
        }
        #flotPie1 td {
            padding:3px;
        }
        #flotPie1 table {
            top: 20px!important;
            right: -10px!important;
        }
        .chart-container {
            display: table;
            min-width: 270px ;
            text-align: left;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        #flotLine5  {
             height: 105px;
        }

        #flotBarChart {
            height: 150px;
        }
        #cellPaiChart{
            height: 160px;
        }
        #a{
            color:black; 
            font-size: 20px;
        }
        .topcorner{
   position:absolute;
   top:25px;
   right: 25px;;
  }

    </style>
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
                        <a href="new_building_form.php" style="color:black; font-size: 15px;"> <i class="menu-icon ti-layout-grid3"></i>New Building </a>
                    </li>
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
        <!-- Content -->
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                 <!-- Widgets  -->
                 <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon flat-color-3">
                                        <i class="pe-7s-check"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><?php
                                            $query =
                                                "SELECT count(*) as clients from papdailysales left join papnotinstalled on papdailysales.ClientID=papnotinstalled.ClientID where papdailysales.PapStatus<>'Retrieved' and papnotinstalled.ClientID is null and papdailysales.Region='".$_SESSION["Region"]."'";
                                            $data = mysqli_query($connection,$query);
                                            while ($row = mysqli_fetch_assoc($data)) {
                                                echo $row["clients"]."<br><br>";
                                            }
                                            ?></span></div>
                                            <div class="dropdown show">
                                <a class="" href="#" role="button" id="dropdownMenuLink"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Signed [<?php echo $_SESSION["Region"]; ?>]
                                </a>

                                <div class="dropdown-menu bg-flat-color-3" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item " href="all-paps-g44.php">G44</a>
                                    <a class="dropdown-item" href="all-paps-zmm.php">ZMM</a>
                                    <a class="dropdown-item " href="all-paps-r&m.php">R&M</a>
                                    <a class="dropdown-item" href="all-paps-g45s.php">G45S</a>
                                    <a class="dropdown-item " href="all-paps-g45n.php">G45N</a>
                                    <a class="dropdown-item" href="all-paps-kwt.php">KWT</a>
                                    <a class="dropdown-item" href="all-paps-lsm.php">LSM</a>
                                    <a class="dropdown-item" href="all-paps-htr.php">HTR</a>
                                    <a class="dropdown-item" href="all-paps-stn.php">STN</a>
                                    <a class="dropdown-item" href="all-paps-mwk.php">MWK</a>
                                </div>

                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6"><a href="not-installed.php">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-2">
                                        <i class="pe-7s-help1"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><?php
                                            $query =
                                                "SELECT COUNT(*) as pending from papdailysales as p LEFT JOIN papinstalled as i on i.ClientID=p.ClientID left join papnotinstalled as r on r.ClientID=p.ClientID where p.PapStatus<>'Retrieved' and r.ClientID is null and i.ClientID is null and p.Region='".$_SESSION['Region']."'";
                                            $data = mysqli_query($connection, $query);
                                            while ($row = mysqli_fetch_assoc($data)) {
                                                echo $row["pending"];
                                            }
                                            ?></span></div>
                                            <div class="stat-heading">Not Installed[<?php echo $_SESSION["Region"]; ?>]</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div></a>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-3">
                                        <i class="pe-7s-settings"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><?php
                                            $query =
                                                "SELECT COUNT(*) as pap FROM papdailysales where PapStatus='Installed' and Region='".$_SESSION["Region"]."'";
                                            $data = mysqli_query(
                                                $connection,$query);
                                            while ($row = mysqli_fetch_assoc($data)) {
                                                echo $row["pap"];
                                            }
                                            ?></span></div>
                                            <div class="stat-heading">Installed[<?php echo $_SESSION["Region"]; ?>]</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6"><a href="turned-on.php">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-4">
                                        <i class="pe-7s-signal"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><?php
                                            $query =
                                                "SELECT count(*) as turnedon from papdailysales Where PapStatus='Turned On' and Region='".$_SESSION["Region"]."'";
                                            $data = mysqli_query($connection,$query);
                                            while ($row = mysqli_fetch_assoc($data)) {
                                                echo $row["turnedon"];
                                            }
                                            ?></span></div>
                                            <div class="stat-heading">Turned On[<?php echo $_SESSION["Region"]; ?>]</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div></a>
                    </div>
                </div>
                <!-- /Widgets -->
                <!--  Traffic  -->
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card"><div class="card-header">
                           <center> <strong class="card-title">Pap Progress</strong></center>
                        </div>
                            <div class="card-body">
                                <h4 class="box-title"></h4>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card-body">
                                    <canvas id="barChart"></canvas>   
                                    </div>
                                </div>
                            </div> <!-- /.row -->
                            <div class="card-body"></div>
                        </div>
                    </div><!-- /# column -->
                    <div class="col-lg-4">
                            <div class="card"><div class="card-header">
                           <center> <strong class="card-title">Panel Aps</strong></center>
                        </div>
                                <div class="card-body">
                                    <h4 class="mb-3"></h4>
                                    <canvas id="doughutChart"></canvas>
                                </div>
                            </div>
                        </div>
                </div>
                <!--  /Traffic -->
                <div class="clearfix"></div>

                    <div class="row">
                    <div class="col-lg-12">
                    <div class="card"><div class="card-header">
                            <center><strong class="card-title">Best Champ: <?php
                            $query =
                                "SELECT Region,ChampName,Count(*) as bestchamp from papdailysales where DateSigned =CURDATE() group by ChampName,Region order by bestchamp DESC limit 1";
                            $result = mysqli_query($connection, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo $row["ChampName"];
                                echo ": ";
                                echo $row["bestchamp"];
                                echo "["; echo " ";
                                echo $row["Region"];
                                echo "]";
                            }
                            ?></strong></center>
                            </div>
                    <div class="card-body">
                    <table class="table table-striped" id="example">
                                <thead>
                                    <tr>
                                    <th>No</th>
                    <th>Champ</th>
                    <th>Pap Signed Today</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $query =
                                    "SELECT ChampName,COUNT(ChampName) as signed from papdailysales WHERE DateSigned=CURRENT_DATE() and Region='".$_SESSION["Region"]."' GROUP BY ChampName order by signed DESC";
                                $result = mysqli_query($connection, $query);
                                $num_rows = mysqli_num_rows($result);
                                $num = 0;
                                if ($num_rows > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $num++; ?>
                                <tr>
                                    <td><?php echo $num; ?></td>
                                    <td><?php echo $row["ChampName"]; ?></td>
                                    <td><?php echo $row["signed"]; ?></td>
                                </tr>
                        <?php
                                    }
                                }
                                ?>
                                </tbody>
                            </table>
                    </div></div></div></div>
                    <div class="row">

<div class="col-lg-12">
     <div class="card"><div class="card-header">
        <center> <strong class="card-title">Monthly Pap Progress[<?php echo $_SESSION[
            "Region"
        ]; ?>]</strong></center>
     </div>
         <div class="card-body">
             <h4 class="mb-3"></h4>
             <canvas id="monthly-progress"></canvas>
         </div>
     </div>
 </div><!-- /# column -->
</div>
                </div><!-- .animated -->
        </div>
        <!-- /.content -->
        <div class="clearfix"></div>

    </div>
    <!-- /#right-panel -->

   <!-- Scripts -->
   <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="../../assets/js/main.js"></script>

    <!--  Chart js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>

    <!--Chartist Chart-->
    <script src="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartist-plugin-legend@0.6.2/chartist-plugin-legend.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-pie@1.0.0/src/jquery.flot.pie.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-spline@0.0.1/js/jquery.flot.spline.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/simpleweather@3.1.0/jquery.simpleWeather.min.js"></script>
    <script src="../../assets/js/init/weather-init.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/moment@2.22.2/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>
    <script src="../../assets/js/init/fullcalendar-init.js"></script>

    <!--Local Stuff-->
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
        ],
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        "scrollY":        "300px",
        "scrollCollapse": true
        });
});
</script>
<script>
  //bar chart
  var ctx = document.getElementById( "barChart" );
     ctx.height = 100;
    var myChart = new Chart( ctx, {
        type: 'bar',
        data: {
            labels: ["<?php echo date("Y-m-d", strtotime("-6 days")); ?>","<?php echo date(
    "Y-m-d",
    strtotime("-5 days")
); ?>","<?php echo date("Y-m-d", strtotime("-4 days")); ?>","<?php echo date(
    "Y-m-d",
    strtotime("-3 days")
); ?>","<?php echo date("Y-m-d", strtotime("-2 days")); ?>","<?php echo date(
    "Y-m-d",
    strtotime("-1 days")
); ?>","<?php echo date("Y-m-d"); ?>" ],
            datasets: [
                {
                    label: "Signed [<?php echo $_SESSION['Region']?>]",
                    data: [<?php
                  $query =
                      "SELECT count(*) as clients from papdailysales left join papnotinstalled on papdailysales.ClientID=papnotinstalled.ClientID where papnotinstalled.ClientID is null and papdailysales.DateSigned=DATE_SUB(CURDATE(), INTERVAL 6 DAY) 
                      and papdailysales.Region='".$_SESSION['Region']."'";
                  $data = mysqli_query($connection, $query);
                  while ($row = mysqli_fetch_assoc($data)) {
                      echo $row["clients"];
                  }
                  ?>, <?php
                  $query =
                      "SELECT count(*) as clients from papdailysales left join papnotinstalled on papdailysales.ClientID=papnotinstalled.ClientID where papnotinstalled.ClientID is null and papdailysales.DateSigned=DATE_SUB(CURDATE(), INTERVAL 5 DAY) 
                      and papdailysales.Region='".$_SESSION['Region']."'";
                  $data = mysqli_query($connection, $query);
                  while ($row = mysqli_fetch_assoc($data)) {
                      echo $row["clients"];
                  }
                  ?>, <?php
                  $query =
                      "SELECT count(*) as clients from papdailysales left join papnotinstalled on papdailysales.ClientID=papnotinstalled.ClientID where papnotinstalled.ClientID is null and papdailysales.DateSigned=DATE_SUB(CURDATE(), INTERVAL 4 DAY) 
                      and papdailysales.Region='".$_SESSION['Region']."'";
                  $data = mysqli_query($connection, $query);
                  while ($row = mysqli_fetch_assoc($data)) {
                      echo $row["clients"];
                  }
                  ?>, <?php
                  $query =
                      "SELECT count(*) as clients from papdailysales left join papnotinstalled on papdailysales.ClientID=papnotinstalled.ClientID where papnotinstalled.ClientID is null and papdailysales.DateSigned=DATE_SUB(CURDATE(), INTERVAL 3 DAY) 
                      and papdailysales.Region='".$_SESSION['Region']."'";
                  $data = mysqli_query($connection, $query);
                  while ($row = mysqli_fetch_assoc($data)) {
                      echo $row["clients"];
                  }
                  ?>, <?php
                  $query =
                      "SELECT count(*) as clients from papdailysales left join papnotinstalled on papdailysales.ClientID=papnotinstalled.ClientID where papnotinstalled.ClientID is null and papdailysales.DateSigned=DATE_SUB(CURDATE(), INTERVAL 2 DAY) 
                      and papdailysales.Region='".$_SESSION['Region']."'";
                  $data = mysqli_query($connection, $query);
                  while ($row = mysqli_fetch_assoc($data)) {
                      echo $row["clients"];
                  }
                  ?>, <?php
                  $query =
                      "SELECT count(*) as clients from papdailysales left join papnotinstalled on papdailysales.ClientID=papnotinstalled.ClientID where papnotinstalled.ClientID is null and papdailysales.DateSigned=DATE_SUB(CURDATE(), INTERVAL 1 DAY) 
                      and papdailysales.Region='".$_SESSION['Region']."'";
                  $data = mysqli_query($connection, $query);
                  while ($row = mysqli_fetch_assoc($data)) {
                      echo $row["clients"];
                  }
                  ?>, <?php
                  $query =
                      "SELECT count(*) as clients from papdailysales left join papnotinstalled on papdailysales.ClientID=papnotinstalled.ClientID where papnotinstalled.ClientID is null and papdailysales.DateSigned=CURDATE() 
                      and papdailysales.Region='".$_SESSION['Region']."'";
                  $data = mysqli_query($connection, $query);
                  while ($row = mysqli_fetch_assoc($data)) {
                      echo $row["clients"];
                  }
                  ?>  ],
                    borderColor: "rgba(0, 194, 146, 0.9)",
                    borderWidth: "0",
                    backgroundColor: "#85ce36"
                            },
                {
                    label: "Installed [<?php echo $_SESSION['Region']?>]",
                    data: [<?php
                  $query =
                      "SELECT count(*) as installed from papinstalled where  DateInstalled=DATE_SUB(CURDATE(), INTERVAL 6 DAY) 
                      and Region='".$_SESSION['Region']."'";
                  $data = mysqli_query($connection, $query);
                  while ($row = mysqli_fetch_assoc($data)) {
                      echo $row["installed"];
                  }
                  ?>, <?php
                  $query =
                      "SELECT count(*) as installed from papinstalled where  DateInstalled=DATE_SUB(CURDATE(), INTERVAL 5 DAY) 
                      and Region='".$_SESSION['Region']."'";
                  $data = mysqli_query($connection, $query);
                  while ($row = mysqli_fetch_assoc($data)) {
                      echo $row["installed"];
                  }
                  ?>, <?php
                  $query =
                      "SELECT count(*) as installed from papinstalled where  DateInstalled=DATE_SUB(CURDATE(), INTERVAL 4 DAY) 
                      and Region='".$_SESSION['Region']."'";
                  $data = mysqli_query($connection, $query);
                  while ($row = mysqli_fetch_assoc($data)) {
                      echo $row["installed"];
                  }
                  ?>,<?php
                  $query =
                      "SELECT count(*) as installed from papinstalled where  DateInstalled=DATE_SUB(CURDATE(), INTERVAL 3 DAY) 
                      and Region='".$_SESSION['Region']."'";
                  $data = mysqli_query($connection, $query);
                  while ($row = mysqli_fetch_assoc($data)) {
                      echo $row["installed"];
                  }
                  ?>, <?php
                  $query =
                      "SELECT count(*) as installed from papinstalled where  DateInstalled=DATE_SUB(CURDATE(), INTERVAL 2 DAY) 
                      and Region='".$_SESSION['Region']."'";
                  $data = mysqli_query($connection, $query);
                  while ($row = mysqli_fetch_assoc($data)) {
                      echo $row["installed"];
                  }
                  ?>, <?php
                  $query =
                      "SELECT count(*) as installed from papinstalled where  DateInstalled=DATE_SUB(CURDATE(), INTERVAL 1 DAY) 
                      and Region='".$_SESSION['Region']."'";
                  $data = mysqli_query($connection, $query);
                  while ($row = mysqli_fetch_assoc($data)) {
                      echo $row["installed"];
                  }
                  ?>,<?php
                  $query =
                      "SELECT count(*) as installed from papinstalled where  DateInstalled=CURDATE() 
                      and Region='".$_SESSION['Region']."'";
                  $data = mysqli_query($connection, $query);
                  while ($row = mysqli_fetch_assoc($data)) {
                      echo $row["installed"];
                  }
                  ?> ],
                    borderColor: "rgba(0,0,0,0.09)",
                    borderWidth: "0",
                    backgroundColor: "#FFB91F"
                            },
                {
                    label: "Turned On [<?php echo $_SESSION['Region']?>]",
                    data: [ <?php
      $sql =
          "SELECT COUNT(DateTurnedOn) as turnedon FROM turnedonpap where DateTurnedOn=DATE_SUB(CURDATE(), INTERVAL 6 DAY) and Region='".$_SESSION['Region']."'";
      $result = mysqli_query($connection, $sql);
      $chart_data = "";
      while ($signed = mysqli_fetch_assoc($result)) {
          echo $signed["turnedon"];
      }
      ?>,<?php
$sql =
    "SELECT COUNT(DateTurnedOn) as turnedon FROM turnedonpap where DateTurnedOn=DATE_SUB(CURDATE(), INTERVAL 5 DAY) and Region='".$_SESSION['Region']."'";
$result = mysqli_query($connection, $sql);
$chart_data = "";
while ($signed = mysqli_fetch_assoc($result)) {
    echo $signed["turnedon"];
}
?>,<?php
$sql =
    "SELECT COUNT(DateTurnedOn) as turnedon FROM turnedonpap where DateTurnedOn=DATE_SUB(CURDATE(), INTERVAL 4 DAY) and Region='".$_SESSION['Region']."'";
$result = mysqli_query($connection, $sql);
$chart_data = "";
while ($signed = mysqli_fetch_assoc($result)) {
    echo $signed["turnedon"];
}
?>,<?php
$sql =
    "SELECT COUNT(DateTurnedOn) as turnedon FROM turnedonpap where DateTurnedOn=DATE_SUB(CURDATE(), INTERVAL 3 DAY) and Region='".$_SESSION['Region']."'";
$result = mysqli_query($connection, $sql);
$chart_data = "";
while ($signed = mysqli_fetch_assoc($result)) {
    echo $signed["turnedon"];
}
?>,<?php
$sql =
    "SELECT COUNT(DateTurnedOn) as turnedon FROM turnedonpap where DateTurnedOn=DATE_SUB(CURDATE(), INTERVAL 2 DAY) and Region='".$_SESSION['Region']."'";
$result = mysqli_query($connection, $sql);
$chart_data = "";
while ($signed = mysqli_fetch_assoc($result)) {
    echo $signed["turnedon"];
}
?>,<?php
$sql =
    "SELECT COUNT(DateTurnedOn) as turnedon FROM turnedonpap where DateTurnedOn=DATE_SUB(CURDATE(), INTERVAL 1 DAY) and Region='".$_SESSION['Region']."'";
$result = mysqli_query($connection, $sql);
$chart_data = "";
while ($signed = mysqli_fetch_assoc($result)) {
    echo $signed["turnedon"];
}
?>,<?php
$sql =
    "SELECT COUNT(DateTurnedOn) as turnedon FROM turnedonpap where DateTurnedOn=CURDATE() and Region='".$_SESSION['Region']."'";
$result = mysqli_query($connection, $sql);
$chart_data = "";
while ($signed = mysqli_fetch_assoc($result)) {
    echo $signed["turnedon"];
}
?>],
                    borderColor: "rgba(0,0,0,0.09)",
                    borderWidth: "0",
                    backgroundColor: "#EE2C4E"
                            }
                        ]
        },
        options: {
            scales: {
                yAxes: [ {
                    ticks: {
                        beginAtZero: true
                    }
                                } ]
            }
        }
    } );      
    
</script>
<script>
    
    //doughut chart
    var ctx = document.getElementById( "doughutChart" );
    ctx.height = 250;
    var myChart = new Chart( ctx, {
        type: 'doughnut',
        data: {
            datasets: [ {
                data: [<?php 
                    $sql =
                        "SELECT COUNT(techietask.ClientID) as assigned FROM  techietask LEFT JOIN papinstalled ON papinstalled.ClientID=techietask.ClientID left join papdailysales on papdailysales.ClientID=techietask.ClientID WHERE papinstalled.ClientID is null and papdailysales.Region='".$_SESSION["Region"]."'";
                    $result = mysqli_query($connection, $sql);
                    $chart_data = "";
                    while ($notinstalled = mysqli_fetch_assoc($result)) {
                        echo $notinstalled["assigned"];
                    }
                 ?>, <?php 
                    $sql =
                        "SELECT COUNT(ClientID) restituted FROM papnotinstalled  WHERE Reason<>'Already Installed' and Region='".$_SESSION["Region"]."'";
                    $result = mysqli_query($connection, $sql);
                    $chart_data = "";
                    while ($torestore = mysqli_fetch_assoc($result)) {
                        echo $torestore["restituted"];
                    }
                 ?>, <?php
                    $sql =
                        " SELECT COUNT(papinstalled.ClientID) as installed FROM papinstalled LEFT JOIN turnedonpap ON turnedonpap.ClientID=papinstalled.ClientID LEFT JOIN papdailysales ON papdailysales.ClientID=papinstalled.ClientID WHERE turnedonpap.ClientID is null and papdailysales.Region='".$_SESSION["Region"]."'";
                    $result = mysqli_query($connection, $sql);
                    $chart_data = "";
                    while ($installed = mysqli_fetch_assoc($result)) {
                        echo $installed["installed"];
                    }
                 ?>],
                backgroundColor: [
                                    "#FFB91F",
                                    "#0CBEAF",
                                    "#3072F5"
                                ],
                hoverBackgroundColor: [
                                    "#FFB91F",
                                    "#0CBEAF",
                                    "#3072F5"
                                ]

                            } ],
            labels: [
                            "Assigned",
                            "Restituted",
                            "Installed"
                        ]
        },
        options: {
            responsive: true
        }
    } );

</script>
<script>
        //Turnon chart
    var ctx = document.getElementById( "monthly-progress" );
    ctx.height = 90;
    var myChart = new Chart( ctx, {
        type: 'line',
        data: {
            labels:<?php echo json_encode($Month)?>,
            datasets: [
                {
                    label: "Signed",
                    data: <?php echo json_encode($Signed)?>,
                    borderColor: "#85ce36",
                    borderWidth: "2",
                    backgroundColor: "transparent"
                            }
                        ]
        },
        options: {
            responsive: true,
            tooltips: {
                mode: 'index',
                intersect: false
            },
            hover: {
                mode: 'nearest',
                intersect: true
            }

        }
    } );

    </script>
</body>
</html>
