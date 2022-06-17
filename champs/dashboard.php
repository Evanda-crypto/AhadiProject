<?php
include("session.php");
include("../config/config.php");

?>
<?php 
if (!$connection) {
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
}
?>
<?php 
 
 $sql =
     "SELECT EXTRACT(MONTH FROM papdailysales.DateSigned),MONTHNAME(papdailysales.DateSigned) as month,COUNT(papdailysales.ClientID) as pap
     FROM papdailysales LEFT JOIN papnotinstalled on papnotinstalled.ClientID=papdailysales.ClientID WHERE papnotinstalled.ClientID is null and papdailysales.ChampName='".$_SESSION['FName']." ".$_SESSION['LName']."'
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboard</title>
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
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />


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
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>REPORTS</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="residential.php">Residential Report</a></li>
                            <li><i class="fa fa-table"></i><a href="business.php">Business Report</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>PANEL APS</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="not-installed.php">Not Installed</a></li>
                            <li><i class="fa fa-table"></i><a href="to-restore.php">To Restore</a></li>
                            <li><i class="fa fa-table"></i><a href="restored.php">Restored</a></li>
                            <li><i class="fa fa-table"></i><a href="turned-on.php">Turned On</a></li>
                            <li><i class="fa fa-table"></i><a href="retrieved.php">Retrieved</a></li>
                            <li><i class="fa fa-table"></i><a href="all-paps.php">All Paps</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="imported.php" style="color:black; font-size: 15px;"> <i class="menu-icon fa fa-table"></i>Imported</a>
                    </li>
                    <li>
                        <a href="get_all_paps_info.php" style="color:black; font-size: 15px;"> <i class="menu-icon fa fa-table"></i>All Paps Info</a>
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
        <!-- /#header -->
        <!-- Content -->
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Widgets  -->
                <div class="row">
                    <div class="col-lg-3 col-md-6"><a href="not-installed.php">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon ">
                                        <i class="pe-7s-help1"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><?php
         $query="SELECT COUNT(*) as notinstalled FROM papdailysales where PapStatus='Signed' and ChampName='".$_SESSION['FName']." ".$_SESSION['LName']."'";
          $data=mysqli_query($connection,$query);
          while($row=mysqli_fetch_assoc($data)){
          echo $row['notinstalled'];
    }
    ?></span></div>
                                            <div class="stat-heading">Not Installed</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div></a>
                    </div>

                    <div class="col-lg-3 col-md-6"><a href="to-restore.php">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-2">
                                        <i class="pe-7s-refresh-2"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><?php
         $query="SELECT COUNT(*) as torestore FROM papnotinstalled WHERE ChampName='".$_SESSION['FName']." ".$_SESSION['LName']."'";
          $data=mysqli_query($connection,$query);
          while($row=mysqli_fetch_assoc($data)){
          echo $row['torestore'];
    }
    ?></span></div>
                                            <div class="stat-heading">To Restore</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div></a>
                    </div>

                    <div class="col-lg-3 col-md-6"><a href="turned-on.php" >
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-3">
                                        <i class="pe-7s-signal"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><?php
         $query="SELECT COUNT(*) as turnedon FROM papdailysales WHERE PapStatus='Turned On' and ChampName='".$_SESSION['FName']." ".$_SESSION['LName']."'";
          $data=mysqli_query($connection,$query);
          while($row=mysqli_fetch_assoc($data)){
          echo $row['turnedon'];
    }
    ?></span></div>
                                            <div class="stat-heading">Turned On</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div></a>
                    </div>
                    <div class="col-lg-3 col-md-6"><a href="imported.php">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-1">
                                        <i class="pe-7s-cloud-download"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><?php
         $query="SELECT COUNT(*) as older FROM old WHERE ChampName='".$_SESSION['FName']." ".$_SESSION['LName']."'";
          $data=mysqli_query($connection,$query);
          while($row=mysqli_fetch_assoc($data)){
          echo $row['older'];
    }
    ?></span></div>
                                            <div class="stat-heading">Imported Paps</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div></a>
                    </div>
                    <div class="col-lg-3 col-md-6"><a href="all-paps.php">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-4">
                                        <i class="pe-7s-check"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><?php
                  $query =
                      "SELECT ((SELECT count(*) from papdailysales left join papnotinstalled on papnotinstalled.ClientID=papdailysales.ClientID where papdailysales.PapStatus<>'Retrieved' and papnotinstalled.ClientID is null and papdailysales.ChampName='".$_SESSION["FName"]." ".$_SESSION["LName"]."') + (SELECT COUNT(*) as older FROM old where ChampName='".$_SESSION['FName']." ".$_SESSION['LName']."')) as allpap";
                  $data = mysqli_query($connection, $query);
                  while ($row = mysqli_fetch_assoc($data)) {
                      echo $row["allpap"];
                  }
                  ?></span></div>
                                            <div class="stat-heading">All Paps</div>
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
                                <h4 class="topcorner"> </h4>
                                <div class="box-title">More
             <div class="dropdown1">
             <a href="javascript:void();" class="dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown">
              <i class="icon-options"></i>
             </a>
              <div class="dropdown-menu" aria-labelledby="notification">
              <a class="dropdown-item" id="00">Last 7 days</a>
              <a class="dropdown-item" id="01">Last 14 days</a>
               </div>
              </div>
             </div>
                            </div>
                                    <canvas id="barChart"></canvas>   
                                    <div class="row m-0 row-group text-center border-top border-light-3">
		   <div class="col-12 col-lg-4">
		     <div class="p-3">
		       <h5 class="mb-0"><?php
          $sql =
              "SELECT ((SELECT COUNT(DateSigned) FROM papdailysales where DateSigned=CURDATE() AND papdailysales.Region='".$_SESSION['Region']."')+(SELECT COUNT(DateSigned) FROM papdailysales where DateSigned=CURDATE() AND papdailysales.Region='".$_SESSION['Region1']."')) AS sales";
          $result = mysqli_query($connection, $sql);
          $chart_data = "";
          while ($signed = mysqli_fetch_assoc($result)) {
              echo $signed["sales"];
          }
      ?> </h5>
			   <small class="mb-0">My Region Today<span> <i class="fa fa-arrow-"></i></span></small>
		     </div>
		   </div>
		   <div class="col-12 col-lg-4">
		     <div class="p-3">
		       <h5 class="mb-0"> <?php
         $query = "SELECT ChampName,Count(*) as bestchamp from papdailysales where DateSigned =CURDATE() group by ChampName order by bestchamp DESC limit 1";
         $result = mysqli_query($connection, $query);
         while ($row = mysqli_fetch_assoc($result)) {
             echo $row["ChampName"]; echo ":"; echo $row["bestchamp"]; 
         }
         ?>   </h5>
			   <small class="mb-0"><span>Best Champ Today<i class="fa fa-arrow-"></i></span></small>
		     </div>
		   </div>
		   <div class="col-12 col-lg-4">
		     <div class="p-3">
		     <b><h5 class="mb-0"> <?php
         $query =
             "SELECT COUNT(*) as myreg from papdailysales where DateSigned=CURDATE() and  ChampName='" .
             $_SESSION["FName"] .
             " " .
             $_SESSION["LName"] .
             "'";
         $result = mysqli_query($connection, $query);
         while ($row = mysqli_fetch_assoc($result)) {
             echo $row["myreg"] . "<br></br>";
         }
         ?>  </h5></b>
			   <small class="mb-0"> My signing Today<span> <i class="fa fa-arrow-"></i></span></small>
		     </div>
		   </div>
		 </div>
		 
		</div>
         </div><!-- /# column -->
                    
                    <div class="col-lg-4">
                            <div class="card"><div class="card"><div class="card-header"><center> <strong class="card-title">Panel Aps</strong></center></div>
                                <div class="card-body">
                                    <h4 class="mb-3"></h4>
                                    <canvas id="doughutChart"></canvas>
                                </div>
                            </div>
                        </div>
                </div>
   
                <div class="col-lg-8">
                        <div class="card"><div class="card-header">
                           <center> <strong class="card-title">Monthly Counts</strong></center>
                        </div>
                            <div class="card-body">
                            </div>
                                    <canvas id="monthly"></canvas>   
                                    <div class="row m-0 row-group text-center border-top border-light-3">
		   <div class="col-12 col-lg-4">
		     <div class="p-3">
		       <h5 class="mb-0"></h5>
			   <small class="mb-0"><span> <i class="fa fa-arrow-"></i></span></small>
		     </div>
		   </div>
		   
		   
		 </div>
		 
		</div>
         </div><!-- /# column -->
                <!--  /Traffic -->
                <div class="clearfix"></div>
            </div>
            <!-- .animated -->
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
    <script src="../assets/js/main.js"></script>

    <!--  Chart js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>

    <!--Chartist Chart-->
    <script src="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartist-plugin-legend@0.6.2/chartist-plugin-legend.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-pie@1.0.0/src/jquery.flot.pie.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-spline@0.0.1/js/jquery.flot.spline.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/simpleweather@3.1.0/jquery.simpleWeather.min.js"></script>
    <script src="../assets/js/init/weather-init.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/moment@2.22.2/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>
    <script src="../assets/js/init/fullcalendar-init.js"></script>
    <script>

  //bar chart
    var ctx = document.getElementById( "barChart" );
    ctx.height = 200;;
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
                    label: "My Region",
                    data: ["<?php
          $sql =
              "SELECT ((SELECT COUNT(DateSigned) FROM papdailysales where DateSigned=DATE_SUB(CURDATE(), INTERVAL 6 DAY) AND papdailysales.Region='".$_SESSION['Region']."')+(SELECT COUNT(DateSigned) FROM papdailysales where DateSigned=DATE_SUB(CURDATE(), INTERVAL 6 DAY) AND papdailysales.Region='".$_SESSION['Region1']."')) AS sales";
          $result = mysqli_query($connection, $sql);
          $chart_data = "";
          while ($signed = mysqli_fetch_assoc($result)) {
              echo $signed["sales"];
          }
      ?>","<?php
          $sql =
              "SELECT ((SELECT COUNT(DateSigned) FROM papdailysales where DateSigned=DATE_SUB(CURDATE(), INTERVAL 5 DAY) AND papdailysales.Region='".$_SESSION['Region']."')+(SELECT COUNT(DateSigned) FROM papdailysales where DateSigned=DATE_SUB(CURDATE(), INTERVAL 5 DAY) AND papdailysales.Region='".$_SESSION['Region1']."')) AS sales";
          $result = mysqli_query($connection, $sql);
          $chart_data = "";
          while ($signed = mysqli_fetch_assoc($result)) {
              echo $signed["sales"];
          }
      ?>","<?php
          $sql =
              "SELECT ((SELECT COUNT(DateSigned) FROM papdailysales where DateSigned=DATE_SUB(CURDATE(), INTERVAL 4 DAY) AND papdailysales.Region='".$_SESSION['Region']."')+(SELECT COUNT(DateSigned) FROM papdailysales where DateSigned=DATE_SUB(CURDATE(), INTERVAL 4 DAY) AND papdailysales.Region='".$_SESSION['Region1']."')) AS sales";
          $result = mysqli_query($connection, $sql);
          $chart_data = "";
          while ($signed = mysqli_fetch_assoc($result)) {
              echo $signed["sales"];
          }
      ?>","<?php
          $sql =
              "SELECT ((SELECT COUNT(DateSigned) FROM papdailysales where DateSigned=DATE_SUB(CURDATE(), INTERVAL 3 DAY) AND papdailysales.Region='".$_SESSION['Region']."')+(SELECT COUNT(DateSigned) FROM papdailysales where DateSigned=DATE_SUB(CURDATE(), INTERVAL 3 DAY) AND papdailysales.Region='".$_SESSION['Region1']."')) AS sales";
          $result = mysqli_query($connection, $sql);
          $chart_data = "";
          while ($signed = mysqli_fetch_assoc($result)) {
              echo $signed["sales"];
          }
      ?>","<?php
          $sql =
              "SELECT ((SELECT COUNT(DateSigned) FROM papdailysales where DateSigned=DATE_SUB(CURDATE(), INTERVAL 2 DAY) AND papdailysales.Region='".$_SESSION['Region']."')+(SELECT COUNT(DateSigned) FROM papdailysales where DateSigned=DATE_SUB(CURDATE(), INTERVAL 2 DAY) AND papdailysales.Region='".$_SESSION['Region1']."')) AS sales";
          $result = mysqli_query($connection, $sql);
          $chart_data = "";
          while ($signed = mysqli_fetch_assoc($result)) {
              echo $signed["sales"];
          }
      ?>","<?php
          $sql =
              "SELECT ((SELECT COUNT(DateSigned) FROM papdailysales where DateSigned=DATE_SUB(CURDATE(), INTERVAL 1 DAY) AND papdailysales.Region='".$_SESSION['Region']."')+(SELECT COUNT(DateSigned) FROM papdailysales where DateSigned=DATE_SUB(CURDATE(), INTERVAL 1 DAY) AND papdailysales.Region='".$_SESSION['Region1']."')) AS sales";
          $result = mysqli_query($connection, $sql);
          $chart_data = "";
          while ($signed = mysqli_fetch_assoc($result)) {
              echo $signed["sales"];
          }
      ?>","<?php
          $sql =
              "SELECT ((SELECT COUNT(DateSigned) FROM papdailysales where DateSigned=CURDATE() AND papdailysales.Region='".$_SESSION['Region']."')+(SELECT COUNT(DateSigned) FROM papdailysales where DateSigned=CURDATE() AND papdailysales.Region='".$_SESSION['Region1']."')) AS sales";
          $result = mysqli_query($connection, $sql);
          $chart_data = "";
          while ($signed = mysqli_fetch_assoc($result)) {
              echo $signed["sales"];
          }
      ?>" ],
                    borderColor: "rgba(0, 194, 146, 0.9)",
                    borderWidth: "0",
                    backgroundColor: "#0cbeaf"
                            },
                {
                    label: "Best Champ",
                    data: ["<?php
          $sql =
              "SELECT (SELECT MAX(mycount)
              FROM (SELECT ChampName,COUNT(DateSigned) AS mycount,DateSigned 
              FROM papdailysales where DateSigned=DATE_SUB(CURDATE(), INTERVAL 6 DAY)
              GROUP BY ChampName,DateSigned) as maxm) as sales";
          $result = mysqli_query($connection, $sql);
          $chart_data = "";
          while ($signed = mysqli_fetch_assoc($result)) {
              echo $signed["sales"];
          }
      ?>","<?php
          $sql =
              "SELECT (SELECT MAX(mycount)
              FROM (SELECT ChampName,COUNT(DateSigned) AS mycount,DateSigned 
              FROM papdailysales where DateSigned=DATE_SUB(CURDATE(), INTERVAL 5 DAY)
              GROUP BY ChampName,DateSigned) as maxm) as sales";
          $result = mysqli_query($connection, $sql);
          $chart_data = "";
          while ($signed = mysqli_fetch_assoc($result)) {
              echo $signed["sales"];
          }
      ?>","<?php
          $sql =
              "SELECT (SELECT MAX(mycount)
              FROM (SELECT ChampName,COUNT(DateSigned) AS mycount,DateSigned 
              FROM papdailysales where DateSigned=DATE_SUB(CURDATE(), INTERVAL 4 DAY)
              GROUP BY ChampName,DateSigned) as maxm) as sales";
          $result = mysqli_query($connection, $sql);
          $chart_data = "";
          while ($signed = mysqli_fetch_assoc($result)) {
              echo $signed["sales"];
          }
      ?>","<?php
          $sql =
              "SELECT (SELECT MAX(mycount)
              FROM (SELECT ChampName,COUNT(DateSigned) AS mycount,DateSigned 
              FROM papdailysales where DateSigned=DATE_SUB(CURDATE(), INTERVAL 3 DAY)
              GROUP BY ChampName,DateSigned) as maxm) as sales";
          $result = mysqli_query($connection, $sql);
          $chart_data = "";
          while ($signed = mysqli_fetch_assoc($result)) {
              echo $signed["sales"];
          }
      ?>","<?php
          $sql =
              "SELECT (SELECT MAX(mycount)
              FROM (SELECT ChampName,COUNT(DateSigned) AS mycount,DateSigned 
              FROM papdailysales where DateSigned=DATE_SUB(CURDATE(), INTERVAL 2 DAY)
              GROUP BY ChampName,DateSigned) as maxm) as sales";
          $result = mysqli_query($connection, $sql);
          $chart_data = "";
          while ($signed = mysqli_fetch_assoc($result)) {
              echo $signed["sales"];
          }
      ?>","<?php
          $sql =
              "SELECT (SELECT MAX(mycount)
              FROM (SELECT ChampName,COUNT(DateSigned) AS mycount,DateSigned 
              FROM papdailysales where DateSigned=DATE_SUB(CURDATE(), INTERVAL 1 DAY)
              GROUP BY ChampName,DateSigned) as maxm) as sales";
          $result = mysqli_query($connection, $sql);
          $chart_data = "";
          while ($signed = mysqli_fetch_assoc($result)) {
              echo $signed["sales"];
          }
      ?>",<?php
          $sql =
              "SELECT (SELECT MAX(mycount)
              FROM (SELECT ChampName,COUNT(DateSigned) AS mycount,DateSigned 
              FROM papdailysales where DateSigned=CURDATE()
              GROUP BY ChampName,DateSigned) as maxm) as sales";
          $result = mysqli_query($connection, $sql);
          $chart_data = "";
          while ($signed = mysqli_fetch_assoc($result)) {
              echo $signed["sales"];
          }
      ?> ],
                    borderColor: "rgba(0,0,0,0.09)",
                    borderWidth: "0",
                    backgroundColor: "#ffb91f"
                            },
                            {
                    label: "Signed",
                    data: [ "<?php
          $sql =
              "SELECT COUNT(DateSigned) as sales FROM papdailysales where papdailysales.DateSigned=DATE_SUB(CURDATE(), INTERVAL 6 DAY) and papdailysales.ChampName='" .
              $_SESSION["FName"] .
              " " .
              $_SESSION["LName"] .
              "'";
          $result = mysqli_query($connection, $sql);
          $chart_data = "";
          while ($signed = mysqli_fetch_assoc($result)) {
              echo $signed["sales"];
          }
      ?>","<?php
          $sql =
              "SELECT COUNT(DateSigned) as sales FROM papdailysales where papdailysales.DateSigned=DATE_SUB(CURDATE(), INTERVAL 5 DAY) and papdailysales.ChampName='" .
              $_SESSION["FName"] .
              " " .
              $_SESSION["LName"] .
              "'";
          $result = mysqli_query($connection, $sql);
          $chart_data = "";
          while ($signed = mysqli_fetch_assoc($result)) {
              echo $signed["sales"];
          }
      ?>","<?php
          $sql =
              "SELECT COUNT(DateSigned) as sales FROM papdailysales where papdailysales.DateSigned=DATE_SUB(CURDATE(), INTERVAL 4 DAY) and papdailysales.ChampName='" .
              $_SESSION["FName"] .
              " " .
              $_SESSION["LName"] .
              "'";
          $result = mysqli_query($connection, $sql);
          $chart_data = "";
          while ($signed = mysqli_fetch_assoc($result)) {
              echo $signed["sales"];
          }
      ?>","<?php
          $sql =
              "SELECT COUNT(DateSigned) as sales FROM papdailysales where papdailysales.DateSigned=DATE_SUB(CURDATE(), INTERVAL 3 DAY) and papdailysales.ChampName='" .
              $_SESSION["FName"] .
              " " .
              $_SESSION["LName"] .
              "'";
          $result = mysqli_query($connection, $sql);
          $chart_data = "";
          while ($signed = mysqli_fetch_assoc($result)) {
              echo $signed["sales"];
          }
      ?>","<?php
          $sql =
              "SELECT COUNT(DateSigned) as sales FROM papdailysales where papdailysales.DateSigned=DATE_SUB(CURDATE(), INTERVAL 2 DAY) and papdailysales.ChampName='" .
              $_SESSION["FName"] .
              " " .
              $_SESSION["LName"] .
              "'";
          $result = mysqli_query($connection, $sql);
          $chart_data = "";
          while ($signed = mysqli_fetch_assoc($result)) {
              echo $signed["sales"];
          }
      ?>","<?php
          $sql =
              "SELECT COUNT(DateSigned) as sales FROM papdailysales where papdailysales.DateSigned=DATE_SUB(CURDATE(), INTERVAL 1 DAY) and papdailysales.ChampName='" .
              $_SESSION["FName"] .
              " " .
              $_SESSION["LName"] .
              "'";
          $result = mysqli_query($connection, $sql);
          $chart_data = "";
          while ($signed = mysqli_fetch_assoc($result)) {
              echo $signed["sales"];
          }
      ?>",<?php
          $sql =
              "SELECT COUNT(DateSigned) as sales FROM papdailysales where papdailysales.DateSigned=CURDATE() and papdailysales.ChampName='" .
              $_SESSION["FName"] .
              " " .
              $_SESSION["LName"] .
              "'";
          $result = mysqli_query($connection, $sql);
          $chart_data = "";
          while ($signed = mysqli_fetch_assoc($result)) {
              echo $signed["sales"];
          }
      ?> ],
                    borderColor: "rgba(0,0,0,0.09)",
                    borderWidth: "0",
                    backgroundColor: "#fe2d38"
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
        //bar chart
    var ctx = document.getElementById( "barChart" );
    ctx.height = 500;;
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
                    label: "My Region",
                    data: ["<?php
          $sql =
              "SELECT ((SELECT COUNT(DateSigned) FROM papdailysales where DateSigned=DATE_SUB(CURDATE(), INTERVAL 6 DAY) AND papdailysales.Region='".$_SESSION['Region']."')+(SELECT COUNT(DateSigned) FROM papdailysales where DateSigned=DATE_SUB(CURDATE(), INTERVAL 6 DAY) AND papdailysales.Region='".$_SESSION['Region1']."')) AS sales";
          $result = mysqli_query($connection, $sql);
          $chart_data = "";
          while ($signed = mysqli_fetch_assoc($result)) {
              echo $signed["sales"];
          }
      ?>","<?php
          $sql =
              "SELECT ((SELECT COUNT(DateSigned) FROM papdailysales where DateSigned=DATE_SUB(CURDATE(), INTERVAL 5 DAY) AND papdailysales.Region='".$_SESSION['Region']."')+(SELECT COUNT(DateSigned) FROM papdailysales where DateSigned=DATE_SUB(CURDATE(), INTERVAL 5 DAY) AND papdailysales.Region='".$_SESSION['Region1']."')) AS sales";
          $result = mysqli_query($connection, $sql);
          $chart_data = "";
          while ($signed = mysqli_fetch_assoc($result)) {
              echo $signed["sales"];
          }
      ?>","<?php
          $sql =
              "SELECT ((SELECT COUNT(DateSigned) FROM papdailysales where DateSigned=DATE_SUB(CURDATE(), INTERVAL 4 DAY) AND papdailysales.Region='".$_SESSION['Region']."')+(SELECT COUNT(DateSigned) FROM papdailysales where DateSigned=DATE_SUB(CURDATE(), INTERVAL 4 DAY) AND papdailysales.Region='".$_SESSION['Region1']."')) AS sales";
          $result = mysqli_query($connection, $sql);
          $chart_data = "";
          while ($signed = mysqli_fetch_assoc($result)) {
              echo $signed["sales"];
          }
      ?>","<?php
          $sql =
              "SELECT ((SELECT COUNT(DateSigned) FROM papdailysales where DateSigned=DATE_SUB(CURDATE(), INTERVAL 3 DAY) AND papdailysales.Region='".$_SESSION['Region']."')+(SELECT COUNT(DateSigned) FROM papdailysales where DateSigned=DATE_SUB(CURDATE(), INTERVAL 3 DAY) AND papdailysales.Region='".$_SESSION['Region1']."')) AS sales";
          $result = mysqli_query($connection, $sql);
          $chart_data = "";
          while ($signed = mysqli_fetch_assoc($result)) {
              echo $signed["sales"];
          }
      ?>","<?php
          $sql =
              "SELECT ((SELECT COUNT(DateSigned) FROM papdailysales where DateSigned=DATE_SUB(CURDATE(), INTERVAL 2 DAY) AND papdailysales.Region='".$_SESSION['Region']."')+(SELECT COUNT(DateSigned) FROM papdailysales where DateSigned=DATE_SUB(CURDATE(), INTERVAL 2 DAY) AND papdailysales.Region='".$_SESSION['Region1']."')) AS sales";
          $result = mysqli_query($connection, $sql);
          $chart_data = "";
          while ($signed = mysqli_fetch_assoc($result)) {
              echo $signed["sales"];
          }
      ?>","<?php
          $sql =
              "SELECT ((SELECT COUNT(DateSigned) FROM papdailysales where DateSigned=DATE_SUB(CURDATE(), INTERVAL 1 DAY) AND papdailysales.Region='".$_SESSION['Region']."')+(SELECT COUNT(DateSigned) FROM papdailysales where DateSigned=DATE_SUB(CURDATE(), INTERVAL 1 DAY) AND papdailysales.Region='".$_SESSION['Region1']."')) AS sales";
          $result = mysqli_query($connection, $sql);
          $chart_data = "";
          while ($signed = mysqli_fetch_assoc($result)) {
              echo $signed["sales"];
          }
      ?>","<?php
          $sql =
              "SELECT ((SELECT COUNT(DateSigned) FROM papdailysales where DateSigned=CURDATE() AND papdailysales.Region='".$_SESSION['Region']."')+(SELECT COUNT(DateSigned) FROM papdailysales where DateSigned=CURDATE() AND papdailysales.Region='".$_SESSION['Region1']."')) AS sales";
          $result = mysqli_query($connection, $sql);
          $chart_data = "";
          while ($signed = mysqli_fetch_assoc($result)) {
              echo $signed["sales"];
          }
      ?>" ],
                    borderColor: "rgba(0, 194, 146, 0.9)",
                    borderWidth: "0",
                    backgroundColor: "#0cbeaf"
                            },
                {
                    label: "Best Champ",
                    data: ["<?php
          $sql =
              "SELECT (SELECT MAX(mycount)
              FROM (SELECT ChampName,COUNT(DateSigned) AS mycount,DateSigned 
              FROM papdailysales where DateSigned=DATE_SUB(CURDATE(), INTERVAL 6 DAY)
              GROUP BY ChampName,DateSigned) as maxm) as sales";
          $result = mysqli_query($connection, $sql);
          $chart_data = "";
          while ($signed = mysqli_fetch_assoc($result)) {
              echo $signed["sales"];
          }
      ?>","<?php
          $sql =
              "SELECT (SELECT MAX(mycount)
              FROM (SELECT ChampName,COUNT(DateSigned) AS mycount,DateSigned 
              FROM papdailysales where DateSigned=DATE_SUB(CURDATE(), INTERVAL 5 DAY)
              GROUP BY ChampName,DateSigned) as maxm) as sales";
          $result = mysqli_query($connection, $sql);
          $chart_data = "";
          while ($signed = mysqli_fetch_assoc($result)) {
              echo $signed["sales"];
          }
      ?>","<?php
          $sql =
              "SELECT (SELECT MAX(mycount)
              FROM (SELECT ChampName,COUNT(DateSigned) AS mycount,DateSigned 
              FROM papdailysales where DateSigned=DATE_SUB(CURDATE(), INTERVAL 4 DAY)
              GROUP BY ChampName,DateSigned) as maxm) as sales";
          $result = mysqli_query($connection, $sql);
          $chart_data = "";
          while ($signed = mysqli_fetch_assoc($result)) {
              echo $signed["sales"];
          }
      ?>","<?php
          $sql =
              "SELECT (SELECT MAX(mycount)
              FROM (SELECT ChampName,COUNT(DateSigned) AS mycount,DateSigned 
              FROM papdailysales where DateSigned=DATE_SUB(CURDATE(), INTERVAL 3 DAY)
              GROUP BY ChampName,DateSigned) as maxm) as sales";
          $result = mysqli_query($connection, $sql);
          $chart_data = "";
          while ($signed = mysqli_fetch_assoc($result)) {
              echo $signed["sales"];
          }
      ?>","<?php
          $sql =
              "SELECT (SELECT MAX(mycount)
              FROM (SELECT ChampName,COUNT(DateSigned) AS mycount,DateSigned 
              FROM papdailysales where DateSigned=DATE_SUB(CURDATE(), INTERVAL 2 DAY)
              GROUP BY ChampName,DateSigned) as maxm) as sales";
          $result = mysqli_query($connection, $sql);
          $chart_data = "";
          while ($signed = mysqli_fetch_assoc($result)) {
              echo $signed["sales"];
          }
      ?>","<?php
          $sql =
              "SELECT (SELECT MAX(mycount)
              FROM (SELECT ChampName,COUNT(DateSigned) AS mycount,DateSigned 
              FROM papdailysales where DateSigned=DATE_SUB(CURDATE(), INTERVAL 1 DAY)
              GROUP BY ChampName,DateSigned) as maxm) as sales";
          $result = mysqli_query($connection, $sql);
          $chart_data = "";
          while ($signed = mysqli_fetch_assoc($result)) {
              echo $signed["sales"];
          }
      ?>",<?php
          $sql =
              "SELECT (SELECT MAX(mycount)
              FROM (SELECT ChampName,COUNT(DateSigned) AS mycount,DateSigned 
              FROM papdailysales where DateSigned=CURDATE()
              GROUP BY ChampName,DateSigned) as maxm) as sales";
          $result = mysqli_query($connection, $sql);
          $chart_data = "";
          while ($signed = mysqli_fetch_assoc($result)) {
              echo $signed["sales"];
          }
      ?> ],
                    borderColor: "rgba(0,0,0,0.09)",
                    borderWidth: "0",
                    backgroundColor: "#ffb91f"
                            },
                            {
                    label: "Signed",
                    data: [ "<?php
          $sql =
              "SELECT COUNT(DateSigned) as sales FROM papdailysales where papdailysales.DateSigned=DATE_SUB(CURDATE(), INTERVAL 6 DAY) and papdailysales.ChampName='" .
              $_SESSION["FName"] .
              " " .
              $_SESSION["LName"] .
              "'";
          $result = mysqli_query($connection, $sql);
          $chart_data = "";
          while ($signed = mysqli_fetch_assoc($result)) {
              echo $signed["sales"];
          }
      ?>","<?php
          $sql =
              "SELECT COUNT(DateSigned) as sales FROM papdailysales where papdailysales.DateSigned=DATE_SUB(CURDATE(), INTERVAL 5 DAY) and papdailysales.ChampName='" .
              $_SESSION["FName"] .
              " " .
              $_SESSION["LName"] .
              "'";
          $result = mysqli_query($connection, $sql);
          $chart_data = "";
          while ($signed = mysqli_fetch_assoc($result)) {
              echo $signed["sales"];
          }
      ?>","<?php
          $sql =
              "SELECT COUNT(DateSigned) as sales FROM papdailysales where papdailysales.DateSigned=DATE_SUB(CURDATE(), INTERVAL 4 DAY) and papdailysales.ChampName='" .
              $_SESSION["FName"] .
              " " .
              $_SESSION["LName"] .
              "'";
          $result = mysqli_query($connection, $sql);
          $chart_data = "";
          while ($signed = mysqli_fetch_assoc($result)) {
              echo $signed["sales"];
          }
      ?>","<?php
          $sql =
              "SELECT COUNT(DateSigned) as sales FROM papdailysales where papdailysales.DateSigned=DATE_SUB(CURDATE(), INTERVAL 3 DAY) and papdailysales.ChampName='" .
              $_SESSION["FName"] .
              " " .
              $_SESSION["LName"] .
              "'";
          $result = mysqli_query($connection, $sql);
          $chart_data = "";
          while ($signed = mysqli_fetch_assoc($result)) {
              echo $signed["sales"];
          }
      ?>","<?php
          $sql =
              "SELECT COUNT(DateSigned) as sales FROM papdailysales where papdailysales.DateSigned=DATE_SUB(CURDATE(), INTERVAL 2 DAY) and papdailysales.ChampName='" .
              $_SESSION["FName"] .
              " " .
              $_SESSION["LName"] .
              "'";
          $result = mysqli_query($connection, $sql);
          $chart_data = "";
          while ($signed = mysqli_fetch_assoc($result)) {
              echo $signed["sales"];
          }
      ?>","<?php
          $sql =
              "SELECT COUNT(DateSigned) as sales FROM papdailysales where papdailysales.DateSigned=DATE_SUB(CURDATE(), INTERVAL 1 DAY) and papdailysales.ChampName='" .
              $_SESSION["FName"] .
              " " .
              $_SESSION["LName"] .
              "'";
          $result = mysqli_query($connection, $sql);
          $chart_data = "";
          while ($signed = mysqli_fetch_assoc($result)) {
              echo $signed["sales"];
          }
      ?>",<?php
          $sql =
              "SELECT COUNT(DateSigned) as sales FROM papdailysales where papdailysales.DateSigned=CURDATE() and papdailysales.ChampName='" .
              $_SESSION["FName"] .
              " " .
              $_SESSION["LName"] .
              "'";
          $result = mysqli_query($connection, $sql);
          $chart_data = "";
          while ($signed = mysqli_fetch_assoc($result)) {
              echo $signed["sales"];
          }
      ?> ],
                    borderColor: "rgba(0,0,0,0.09)",
                    borderWidth: "0",
                    backgroundColor: "#fe2d38"
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
</script>
<script>
    document.getElementById("01").addEventListener("click", last14days);
    function last14days() {
        //bar chart
    var ctx = document.getElementById( "barChart" );
    ctx.height = 500;;
    var myChart = new Chart( ctx, {
        type: 'bar',
        data: {
            labels: [ "<?php echo date('Y-m-d',strtotime("-13 days"));?>","<?php echo date('Y-m-d',strtotime("-12 days"));?>","<?php echo date('Y-m-d',strtotime("-11 days"));?>","<?php echo date('Y-m-d',strtotime("-10 days"));?>","<?php echo date('Y-m-d',strtotime("-9 days"));?>","<?php echo date('Y-m-d',strtotime("-8 days"));?>","<?php echo date('Y-m-d',strtotime("-7 days"));?>","<?php echo date('Y-m-d',strtotime("-6 days"));?>","<?php echo date('Y-m-d',strtotime("-5 days"));?>","<?php echo date('Y-m-d',strtotime("-4 days"));?>","<?php echo date('Y-m-d',strtotime("-3 days"));?>","<?php echo date('Y-m-d',strtotime("-2 days"));?>","<?php echo date('Y-m-d',strtotime("-1 days"));?>","<?php echo date('Y-m-d');?>" ],
            datasets: [
                {
                    label: "My Region",
                    data: [ "<?php
          $sql =
              "SELECT ((SELECT COUNT(DateSigned) FROM papdailysales where DateSigned=DATE_SUB(CURDATE(), INTERVAL 13 DAY) AND papdailysales.Region='".$_SESSION['Region']."')+(SELECT COUNT(DateSigned) FROM papdailysales where DateSigned=DATE_SUB(CURDATE(), INTERVAL 13 DAY) AND papdailysales.Region='".$_SESSION['Region1']."')) AS sales";
          $result = mysqli_query($connection, $sql);
          $chart_data = "";
          while ($signed = mysqli_fetch_assoc($result)) {
              echo $signed["sales"];
          }
      ?>","<?php
          $sql =
              "SELECT ((SELECT COUNT(DateSigned) FROM papdailysales where DateSigned=DATE_SUB(CURDATE(), INTERVAL 12 DAY) AND papdailysales.Region='".$_SESSION['Region']."')+(SELECT COUNT(DateSigned) FROM papdailysales where DateSigned=DATE_SUB(CURDATE(), INTERVAL 12 DAY) AND papdailysales.Region='".$_SESSION['Region1']."')) AS sales";
          $result = mysqli_query($connection, $sql);
          $chart_data = "";
          while ($signed = mysqli_fetch_assoc($result)) {
              echo $signed["sales"];
          }
      ?>","<?php
          $sql =
              "SELECT ((SELECT COUNT(DateSigned) FROM papdailysales where DateSigned=DATE_SUB(CURDATE(), INTERVAL 11 DAY) AND papdailysales.Region='".$_SESSION['Region']."')+(SELECT COUNT(DateSigned) FROM papdailysales where DateSigned=DATE_SUB(CURDATE(), INTERVAL 11 DAY) AND papdailysales.Region='".$_SESSION['Region1']."')) AS sales";
          $result = mysqli_query($connection, $sql);
          $chart_data = "";
          while ($signed = mysqli_fetch_assoc($result)) {
              echo $signed["sales"];
          }
      ?>","<?php
          $sql =
              "SELECT ((SELECT COUNT(DateSigned) FROM papdailysales where DateSigned=DATE_SUB(CURDATE(), INTERVAL 10 DAY) AND papdailysales.Region='".$_SESSION['Region']."')+(SELECT COUNT(DateSigned) FROM papdailysales where DateSigned=DATE_SUB(CURDATE(), INTERVAL 10 DAY) AND papdailysales.Region='".$_SESSION['Region1']."')) AS sales";
          $result = mysqli_query($connection, $sql);
          $chart_data = "";
          while ($signed = mysqli_fetch_assoc($result)) {
              echo $signed["sales"];
          }
      ?>","<?php
          $sql =
              "SELECT ((SELECT COUNT(DateSigned) FROM papdailysales where DateSigned=DATE_SUB(CURDATE(), INTERVAL 9 DAY) AND papdailysales.Region='".$_SESSION['Region']."')+(SELECT COUNT(DateSigned) FROM papdailysales where DateSigned=DATE_SUB(CURDATE(), INTERVAL 9 DAY) AND papdailysales.Region='".$_SESSION['Region1']."')) AS sales";
          $result = mysqli_query($connection, $sql);
          $chart_data = "";
          while ($signed = mysqli_fetch_assoc($result)) {
              echo $signed["sales"];
          }
      ?>","<?php
          $sql =
              "SELECT ((SELECT COUNT(DateSigned) FROM papdailysales where DateSigned=DATE_SUB(CURDATE(), INTERVAL 8 DAY) AND papdailysales.Region='".$_SESSION['Region']."')+(SELECT COUNT(DateSigned) FROM papdailysales where DateSigned=DATE_SUB(CURDATE(), INTERVAL 8 DAY) AND papdailysales.Region='".$_SESSION['Region1']."')) AS sales";
          $result = mysqli_query($connection, $sql);
          $chart_data = "";
          while ($signed = mysqli_fetch_assoc($result)) {
              echo $signed["sales"];
          }
      ?>","<?php
          $sql =
              "SELECT ((SELECT COUNT(DateSigned) FROM papdailysales where DateSigned=DATE_SUB(CURDATE(), INTERVAL 7 DAY) AND papdailysales.Region='".$_SESSION['Region']."')+(SELECT COUNT(DateSigned) FROM papdailysales where DateSigned=DATE_SUB(CURDATE(), INTERVAL 7 DAY) AND papdailysales.Region='".$_SESSION['Region1']."')) AS sales";
          $result = mysqli_query($connection, $sql);
          $chart_data = "";
          while ($signed = mysqli_fetch_assoc($result)) {
              echo $signed["sales"];
          }
      ?>","<?php
          $sql =
              "SELECT ((SELECT COUNT(DateSigned) FROM papdailysales where DateSigned=DATE_SUB(CURDATE(), INTERVAL 6 DAY) AND papdailysales.Region='".$_SESSION['Region']."')+(SELECT COUNT(DateSigned) FROM papdailysales where DateSigned=DATE_SUB(CURDATE(), INTERVAL 6 DAY) AND papdailysales.Region='".$_SESSION['Region1']."')) AS sales";
          $result = mysqli_query($connection, $sql);
          $chart_data = "";
          while ($signed = mysqli_fetch_assoc($result)) {
              echo $signed["sales"];
          }
      ?>","<?php
          $sql =
              "SELECT ((SELECT COUNT(DateSigned) FROM papdailysales where DateSigned=DATE_SUB(CURDATE(), INTERVAL 5 DAY) AND papdailysales.Region='".$_SESSION['Region']."')+(SELECT COUNT(DateSigned) FROM papdailysales where DateSigned=DATE_SUB(CURDATE(), INTERVAL 5 DAY) AND papdailysales.Region='".$_SESSION['Region1']."')) AS sales";
          $result = mysqli_query($connection, $sql);
          $chart_data = "";
          while ($signed = mysqli_fetch_assoc($result)) {
              echo $signed["sales"];
          }
      ?>","<?php
          $sql =
              "SELECT ((SELECT COUNT(DateSigned) FROM papdailysales where DateSigned=DATE_SUB(CURDATE(), INTERVAL 4 DAY) AND papdailysales.Region='".$_SESSION['Region']."')+(SELECT COUNT(DateSigned) FROM papdailysales where DateSigned=DATE_SUB(CURDATE(), INTERVAL 4 DAY) AND papdailysales.Region='".$_SESSION['Region1']."')) AS sales";
          $result = mysqli_query($connection, $sql);
          $chart_data = "";
          while ($signed = mysqli_fetch_assoc($result)) {
              echo $signed["sales"];
          }
      ?>","<?php
          $sql =
              "SELECT ((SELECT COUNT(DateSigned) FROM papdailysales where DateSigned=DATE_SUB(CURDATE(), INTERVAL 3 DAY) AND papdailysales.Region='".$_SESSION['Region']."')+(SELECT COUNT(DateSigned) FROM papdailysales where DateSigned=DATE_SUB(CURDATE(), INTERVAL 3 DAY) AND papdailysales.Region='".$_SESSION['Region1']."')) AS sales";
          $result = mysqli_query($connection, $sql);
          $chart_data = "";
          while ($signed = mysqli_fetch_assoc($result)) {
              echo $signed["sales"];
          }
      ?>","<?php
          $sql =
              "SELECT ((SELECT COUNT(DateSigned) FROM papdailysales where DateSigned=DATE_SUB(CURDATE(), INTERVAL 2 DAY) AND papdailysales.Region='".$_SESSION['Region']."')+(SELECT COUNT(DateSigned) FROM papdailysales where DateSigned=DATE_SUB(CURDATE(), INTERVAL 2 DAY) AND papdailysales.Region='".$_SESSION['Region1']."')) AS sales";
          $result = mysqli_query($connection, $sql);
          $chart_data = "";
          while ($signed = mysqli_fetch_assoc($result)) {
              echo $signed["sales"];
          }
      ?>","<?php
          $sql =
              "SELECT ((SELECT COUNT(DateSigned) FROM papdailysales where DateSigned=DATE_SUB(CURDATE(), INTERVAL 1 DAY) AND papdailysales.Region='".$_SESSION['Region']."')+(SELECT COUNT(DateSigned) FROM papdailysales where DateSigned=DATE_SUB(CURDATE(), INTERVAL 1 DAY) AND papdailysales.Region='".$_SESSION['Region1']."')) AS sales";
          $result = mysqli_query($connection, $sql);
          $chart_data = "";
          while ($signed = mysqli_fetch_assoc($result)) {
              echo $signed["sales"];
          }
      ?>","<?php
          $sql =
              "SELECT ((SELECT COUNT(DateSigned) FROM papdailysales where DateSigned=CURDATE() AND papdailysales.Region='".$_SESSION['Region']."')+(SELECT COUNT(DateSigned) FROM papdailysales where DateSigned=CURDATE() AND papdailysales.Region='".$_SESSION['Region1']."')) AS sales";
          $result = mysqli_query($connection, $sql);
          $chart_data = "";
          while ($signed = mysqli_fetch_assoc($result)) {
              echo $signed["sales"];
          }
      ?>"],
                    borderColor: "rgba(0, 194, 146, 0.9)",
                    borderWidth: "0",
                    backgroundColor: "#0cbeaf"
                            },
                {
                    label: "Best Champ",
                    data: [ "<?php
          $sql =
              "SELECT (SELECT MAX(mycount)
              FROM (SELECT ChampName,COUNT(DateSigned) AS mycount,DateSigned 
              FROM papdailysales where DateSigned=DATE_SUB(CURDATE(), INTERVAL 13 DAY)
              GROUP BY ChampName,DateSigned) as maxm) as sales";
          $result = mysqli_query($connection, $sql);
          $chart_data = "";
          while ($signed = mysqli_fetch_assoc($result)) {
              echo $signed["sales"];
          }
      ?>", "<?php
      $sql =
          "SELECT (SELECT MAX(mycount)
          FROM (SELECT ChampName,COUNT(DateSigned) AS mycount,DateSigned 
          FROM papdailysales where DateSigned=DATE_SUB(CURDATE(), INTERVAL 12 DAY)
          GROUP BY ChampName,DateSigned) as maxm) as sales";
      $result = mysqli_query($connection, $sql);
      $chart_data = "";
      while ($signed = mysqli_fetch_assoc($result)) {
          echo $signed["sales"];
      }
  ?>", "<?php
  $sql =
      "SELECT (SELECT MAX(mycount)
      FROM (SELECT ChampName,COUNT(DateSigned) AS mycount,DateSigned 
      FROM papdailysales where DateSigned=DATE_SUB(CURDATE(), INTERVAL 11 DAY)
      GROUP BY ChampName,DateSigned) as maxm) as sales";
  $result = mysqli_query($connection, $sql);
  $chart_data = "";
  while ($signed = mysqli_fetch_assoc($result)) {
      echo $signed["sales"];
  }
?>", "<?php
$sql =
    "SELECT (SELECT MAX(mycount)
    FROM (SELECT ChampName,COUNT(DateSigned) AS mycount,DateSigned 
    FROM papdailysales where DateSigned=DATE_SUB(CURDATE(), INTERVAL 10 DAY)
    GROUP BY ChampName,DateSigned) as maxm) as sales";
$result = mysqli_query($connection, $sql);
$chart_data = "";
while ($signed = mysqli_fetch_assoc($result)) {
    echo $signed["sales"];
}
?>", "<?php
$sql =
    "SELECT (SELECT MAX(mycount)
    FROM (SELECT ChampName,COUNT(DateSigned) AS mycount,DateSigned 
    FROM papdailysales where DateSigned=DATE_SUB(CURDATE(), INTERVAL 9 DAY)
    GROUP BY ChampName,DateSigned) as maxm) as sales";
$result = mysqli_query($connection, $sql);
$chart_data = "";
while ($signed = mysqli_fetch_assoc($result)) {
    echo $signed["sales"];
}
?>", "<?php
$sql =
    "SELECT (SELECT MAX(mycount)
    FROM (SELECT ChampName,COUNT(DateSigned) AS mycount,DateSigned 
    FROM papdailysales where DateSigned=DATE_SUB(CURDATE(), INTERVAL 8 DAY)
    GROUP BY ChampName,DateSigned) as maxm) as sales";
$result = mysqli_query($connection, $sql);
$chart_data = "";
while ($signed = mysqli_fetch_assoc($result)) {
    echo $signed["sales"];
}
?>", "<?php
$sql =
    "SELECT (SELECT MAX(mycount)
    FROM (SELECT ChampName,COUNT(DateSigned) AS mycount,DateSigned 
    FROM papdailysales where DateSigned=DATE_SUB(CURDATE(), INTERVAL 7 DAY)
    GROUP BY ChampName,DateSigned) as maxm) as sales";
$result = mysqli_query($connection, $sql);
$chart_data = "";
while ($signed = mysqli_fetch_assoc($result)) {
    echo $signed["sales"];
}
?>" ,"<?php
$sql =
    "SELECT (SELECT MAX(mycount)
    FROM (SELECT ChampName,COUNT(DateSigned) AS mycount,DateSigned 
    FROM papdailysales where DateSigned=DATE_SUB(CURDATE(), INTERVAL 6 DAY)
    GROUP BY ChampName,DateSigned) as maxm) as sales";
$result = mysqli_query($connection, $sql);
$chart_data = "";
while ($signed = mysqli_fetch_assoc($result)) {
    echo $signed["sales"];
}
?>", "<?php
$sql =
    "SELECT (SELECT MAX(mycount)
    FROM (SELECT ChampName,COUNT(DateSigned) AS mycount,DateSigned 
    FROM papdailysales where DateSigned=DATE_SUB(CURDATE(), INTERVAL 5 DAY)
    GROUP BY ChampName,DateSigned) as maxm) as sales";
$result = mysqli_query($connection, $sql);
$chart_data = "";
while ($signed = mysqli_fetch_assoc($result)) {
    echo $signed["sales"];
}
?>", "<?php
$sql =
    "SELECT (SELECT MAX(mycount)
    FROM (SELECT ChampName,COUNT(DateSigned) AS mycount,DateSigned 
    FROM papdailysales where DateSigned=DATE_SUB(CURDATE(), INTERVAL 4 DAY)
    GROUP BY ChampName,DateSigned) as maxm) as sales";
$result = mysqli_query($connection, $sql);
$chart_data = "";
while ($signed = mysqli_fetch_assoc($result)) {
    echo $signed["sales"];
}
?>", "<?php
$sql =
    "SELECT (SELECT MAX(mycount)
    FROM (SELECT ChampName,COUNT(DateSigned) AS mycount,DateSigned 
    FROM papdailysales where DateSigned=DATE_SUB(CURDATE(), INTERVAL 3 DAY)
    GROUP BY ChampName,DateSigned) as maxm) as sales";
$result = mysqli_query($connection, $sql);
$chart_data = "";
while ($signed = mysqli_fetch_assoc($result)) {
    echo $signed["sales"];
}
?>", "<?php
$sql =
    "SELECT (SELECT MAX(mycount)
    FROM (SELECT ChampName,COUNT(DateSigned) AS mycount,DateSigned 
    FROM papdailysales where DateSigned=DATE_SUB(CURDATE(), INTERVAL 2 DAY)
    GROUP BY ChampName,DateSigned) as maxm) as sales";
$result = mysqli_query($connection, $sql);
$chart_data = "";
while ($signed = mysqli_fetch_assoc($result)) {
    echo $signed["sales"];
}
?>", "<?php
$sql =
    "SELECT (SELECT MAX(mycount)
    FROM (SELECT ChampName,COUNT(DateSigned) AS mycount,DateSigned 
    FROM papdailysales where DateSigned=DATE_SUB(CURDATE(), INTERVAL 1 DAY)
    GROUP BY ChampName,DateSigned) as maxm) as sales";
$result = mysqli_query($connection, $sql);
$chart_data = "";
while ($signed = mysqli_fetch_assoc($result)) {
    echo $signed["sales"];
}
?>", "<?php
$sql =
    "SELECT (SELECT MAX(mycount)
    FROM (SELECT ChampName,COUNT(DateSigned) AS mycount,DateSigned 
    FROM papdailysales where DateSigned=CURDATE()
    GROUP BY ChampName,DateSigned) as maxm) as sales";
$result = mysqli_query($connection, $sql);
$chart_data = "";
while ($signed = mysqli_fetch_assoc($result)) {
    echo $signed["sales"];
}
?>"],
                    borderColor: "rgba(0,0,0,0.09)",
                    borderWidth: "0",
                    backgroundColor: "#ffb91f"
                            },
                {
                    label: "Signed",
                    data: [ "<?php
          $sql =
              "SELECT COUNT(DateSigned) as sales FROM papdailysales where papdailysales.DateSigned=DATE_SUB(CURDATE(), INTERVAL 13 DAY) and papdailysales.ChampName='" .
              $_SESSION["FName"] .
              " " .
              $_SESSION["LName"] .
              "'";
          $result = mysqli_query($connection, $sql);
          $chart_data = "";
          while ($signed = mysqli_fetch_assoc($result)) {
              echo $signed["sales"];
          }
      ?>","<?php
          $sql =
              "SELECT COUNT(DateSigned) as sales FROM papdailysales where papdailysales.DateSigned=DATE_SUB(CURDATE(), INTERVAL 12 DAY) and papdailysales.ChampName='" .
              $_SESSION["FName"] .
              " " .
              $_SESSION["LName"] .
              "'";
          $result = mysqli_query($connection, $sql);
          $chart_data = "";
          while ($signed = mysqli_fetch_assoc($result)) {
              echo $signed["sales"];
          }
      ?>","<?php
          $sql =
              "SELECT COUNT(DateSigned) as sales FROM papdailysales where papdailysales.DateSigned=DATE_SUB(CURDATE(), INTERVAL 11 DAY) and papdailysales.ChampName='" .
              $_SESSION["FName"] .
              " " .
              $_SESSION["LName"] .
              "'";
          $result = mysqli_query($connection, $sql);
          $chart_data = "";
          while ($signed = mysqli_fetch_assoc($result)) {
              echo $signed["sales"];
          }
      ?>","<?php
          $sql =
              "SELECT COUNT(DateSigned) as sales FROM papdailysales where papdailysales.DateSigned=DATE_SUB(CURDATE(), INTERVAL 10 DAY) and papdailysales.ChampName='" .
              $_SESSION["FName"] .
              " " .
              $_SESSION["LName"] .
              "'";
          $result = mysqli_query($connection, $sql);
          $chart_data = "";
          while ($signed = mysqli_fetch_assoc($result)) {
              echo $signed["sales"];
          }
      ?>","<?php
          $sql =
              "SELECT COUNT(DateSigned) as sales FROM papdailysales where papdailysales.DateSigned=DATE_SUB(CURDATE(), INTERVAL 9 DAY) and papdailysales.ChampName='" .
              $_SESSION["FName"] .
              " " .
              $_SESSION["LName"] .
              "'";
          $result = mysqli_query($connection, $sql);
          $chart_data = "";
          while ($signed = mysqli_fetch_assoc($result)) {
              echo $signed["sales"];
          }
      ?>","<?php
          $sql =
              "SELECT COUNT(DateSigned) as sales FROM papdailysales where papdailysales.DateSigned=DATE_SUB(CURDATE(), INTERVAL 8 DAY) and papdailysales.ChampName='" .
              $_SESSION["FName"] .
              " " .
              $_SESSION["LName"] .
              "'";
          $result = mysqli_query($connection, $sql);
          $chart_data = "";
          while ($signed = mysqli_fetch_assoc($result)) {
              echo $signed["sales"];
          }
      ?>",<?php
          $sql =
              "SELECT COUNT(DateSigned) as sales FROM papdailysales where papdailysales.DateSigned=DATE_SUB(CURDATE(), INTERVAL 7 DAY) and papdailysales.ChampName='" .
              $_SESSION["FName"] .
              " " .
              $_SESSION["LName"] .
              "'";
          $result = mysqli_query($connection, $sql);
          $chart_data = "";
          while ($signed = mysqli_fetch_assoc($result)) {
              echo $signed["sales"];
          }
      ?>,"<?php
          $sql =
              "SELECT COUNT(DateSigned) as sales FROM papdailysales where papdailysales.DateSigned=DATE_SUB(CURDATE(), INTERVAL 6 DAY) and papdailysales.ChampName='" .
              $_SESSION["FName"] .
              " " .
              $_SESSION["LName"] .
              "'";
          $result = mysqli_query($connection, $sql);
          $chart_data = "";
          while ($signed = mysqli_fetch_assoc($result)) {
              echo $signed["sales"];
          }
      ?>","<?php
          $sql =
              "SELECT COUNT(DateSigned) as sales FROM papdailysales where papdailysales.DateSigned=DATE_SUB(CURDATE(), INTERVAL 5 DAY) and papdailysales.ChampName='" .
              $_SESSION["FName"] .
              " " .
              $_SESSION["LName"] .
              "'";
          $result = mysqli_query($connection, $sql);
          $chart_data = "";
          while ($signed = mysqli_fetch_assoc($result)) {
              echo $signed["sales"];
          }
      ?>","<?php
          $sql =
              "SELECT COUNT(DateSigned) as sales FROM papdailysales where papdailysales.DateSigned=DATE_SUB(CURDATE(), INTERVAL 4 DAY) and papdailysales.ChampName='" .
              $_SESSION["FName"] .
              " " .
              $_SESSION["LName"] .
              "'";
          $result = mysqli_query($connection, $sql);
          $chart_data = "";
          while ($signed = mysqli_fetch_assoc($result)) {
              echo $signed["sales"];
          }
      ?>","<?php
          $sql =
              "SELECT COUNT(DateSigned) as sales FROM papdailysales where papdailysales.DateSigned=DATE_SUB(CURDATE(), INTERVAL 3 DAY) and papdailysales.ChampName='" .
              $_SESSION["FName"] .
              " " .
              $_SESSION["LName"] .
              "'";
          $result = mysqli_query($connection, $sql);
          $chart_data = "";
          while ($signed = mysqli_fetch_assoc($result)) {
              echo $signed["sales"];
          }
      ?>","<?php
          $sql =
              "SELECT COUNT(DateSigned) as sales FROM papdailysales where papdailysales.DateSigned=DATE_SUB(CURDATE(), INTERVAL 2 DAY) and papdailysales.ChampName='" .
              $_SESSION["FName"] .
              " " .
              $_SESSION["LName"] .
              "'";
          $result = mysqli_query($connection, $sql);
          $chart_data = "";
          while ($signed = mysqli_fetch_assoc($result)) {
              echo $signed["sales"];
          }
      ?>","<?php
          $sql =
              "SELECT COUNT(DateSigned) as sales FROM papdailysales where papdailysales.DateSigned=DATE_SUB(CURDATE(), INTERVAL 1 DAY) and papdailysales.ChampName='" .
              $_SESSION["FName"] .
              " " .
              $_SESSION["LName"] .
              "'";
          $result = mysqli_query($connection, $sql);
          $chart_data = "";
          while ($signed = mysqli_fetch_assoc($result)) {
              echo $signed["sales"];
          }
      ?>",<?php
          $sql =
              "SELECT COUNT(DateSigned) as sales FROM papdailysales where papdailysales.DateSigned=CURDATE() and papdailysales.ChampName='" .
              $_SESSION["FName"] .
              " " .
              $_SESSION["LName"] .
              "'";
          $result = mysqli_query($connection, $sql);
          $chart_data = "";
          while ($signed = mysqli_fetch_assoc($result)) {
              echo $signed["sales"];
          }
      ?>],
                    borderColor: "rgba(0,0,0,0.09)",
                    borderWidth: "0",
                    backgroundColor: "#fe2d38"
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
  
}

</script>

    <script>
    //doughut chart
    var ctx = document.getElementById( "doughutChart" );
    ctx.height = 200;
    var myChart = new Chart( ctx, {
        type: 'doughnut',
        data: {
            datasets: [ {
                data: [<?php if (!$connection) {
    echo "Problem in database connection! Contact administrator!" .
        mysqli_error();
} else {
    $sql =
        "SELECT COUNT(techietask.ClientID) as assigned FROM  techietask LEFT JOIN papinstalled ON papinstalled.ClientID=techietask.ClientID left join papdailysales on papdailysales.ClientID=techietask.ClientID WHERE papinstalled.ClientID is null and ChampName='" .
        $_SESSION["FName"] .
        " " .
        $_SESSION["LName"] .
        "'";
    $result = mysqli_query($connection, $sql);
    $chart_data = "";
    while ($notinstalled = mysqli_fetch_assoc($result)) {
        echo $notinstalled["assigned"];
    }
} ?>, <?php if (!$connection) {
    echo "Problem in database connection! Contact administrator!" .
        mysqli_error();
} else {
    $sql =
        " SELECT COUNT(ClientID) as installed FROM papdailysales where PapStatus='Installed' and ChampName='" .
        $_SESSION["FName"] .
        " " .
        $_SESSION["LName"] .
        "'";
    $result = mysqli_query($connection, $sql);
    $chart_data = "";
    while ($installed = mysqli_fetch_assoc($result)) {
        echo $installed["installed"];
    }
} ?>,<?php if (!$connection) {
    echo "Problem in database connection! Contact administrator!" .
        mysqli_error();
} else {
    $sql =
        " SELECT COUNT(reminders.ClientID) as reminded FROM reminders where ChampName='" .
        $_SESSION["FName"] .
        " " .
        $_SESSION["LName"] .
        "'";
    $result = mysqli_query($connection, $sql);
    $chart_data = "";
    while ($remind = mysqli_fetch_assoc($result)) {
        echo $remind["reminded"];
    }
} ?>,<?php if (!$connection) {
    echo "Problem in database connection! Contact administrator!" .
        mysqli_error();
} else {
    $sql =
        " SELECT COUNT(ClientID) as restored FROM papdailysales where PapStatus='Restored' and ChampName='" .
        $_SESSION["FName"] .
        " " .
        $_SESSION["LName"] .
        "'";
    $result = mysqli_query($connection, $sql);
    $chart_data = "";
    while ($remind = mysqli_fetch_assoc($result)) {
        echo $remind["restored"];
    }
} ?>],
                backgroundColor: [
                            
                                    "#ffb91f",
                                    "#0cbeaf",
                                    "#3072f5",
                                    "#fe2d38"
                                ],
                hoverBackgroundColor: [
                                 
                                    "#ffb91f",
                                    "#0cbeaf",
                                    "#3072f5",
                                    "#fe2d38"
                                ]

                            } ],
            labels: [
                            "Assigned",
                            "Installed",
                            "Reminded",
                            "Restored"
                        ]
        },
        options: {
            responsive: true
        }
    } );
    </script>



    <script>
   // single bar chart
    var ctx = document.getElementById( "monthly" );
    ctx.height = 150;
    var myChart = new Chart( ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($Month)?>,
            datasets: [
                {
                    label: "Signed",
                    data: <?php echo json_encode($Signed)?>,
                    borderColor: "rgba(0, 194, 146, 0.9)",
                    borderWidth: "0",
                    backgroundColor: "#85ce36"
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
    } );</script>
</body>
</html>
