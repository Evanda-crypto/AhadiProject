<?php
include("session.php");
include("../../../config/config.php");

?>

<?php 
if (!$connection) {
    # code...
    echo "Problem in database connection! Contact administrator!" .
        mysqli_error();
} else {
    $sql =
        "SELECT upper(Region) as reg, COUNT(clientID) as pap FROM papdailysales where DateSigned=CURDATE() GROUP BY Region ORDER BY pap DESC";
    $result = mysqli_query($connection, $sql);
    $chart_data = "";
    while ($row = mysqli_fetch_array($result)) {
        $Region[] = $row["reg"];
        $Clients[] = $row["pap"];
    }
}
?>
<?php 
if (!$connection) {
    # code...
    echo "Problem in database connection! Contact administrator!" .
        mysqli_error();
} else {
    $sql =
        "SELECT upper(Region) as reg, COUNT(clientID) as pap FROM papinstalled where DateInstalled=CURDATE() GROUP BY Region ORDER BY pap DESC";
    $result = mysqli_query($connection, $sql);
    $chart_data = "";
    while ($row = mysqli_fetch_array($result)) {
        $Regioninstalled[] = $row["reg"];
        $installed[] = $row["pap"];
    }
}
?>
<?php 
if (!$connection) {
    # code...
    echo "Problem in database connection! Contact administrator!" .
        mysqli_error();
} else {
    $sql =
        "SELECT upper(Region) as reg, COUNT(clientID) as pap FROM turnedonpap where DateTurnedOn=CURDATE() GROUP BY Region ORDER BY pap DESC";
    $result = mysqli_query($connection, $sql);
    $chart_data = "";
    while ($row = mysqli_fetch_array($result)) {
        $Regionturnon[] = $row["reg"];
        $turnon[] = $row["pap"];
    }
}
?>
?>
<?php 
if (!$connection) {
    # code...
    echo "Problem in database connection! Contact administrator!" .
        mysqli_error();
} else {
    $sql =
        "SELECT upper(Region) as reg, COUNT(clientID) as pap FROM papnotinstalled where Date(RestitutedDate)=CURDATE() GROUP BY Region ORDER BY pap DESC";
    $result = mysqli_query($connection, $sql);
    $chart_data = "";
    while ($row = mysqli_fetch_array($result)) {
        $Regionrestituted[] = $row["reg"];
        $restituted[] = $row["pap"];
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
    <title>Graphs and Charts</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="../../../assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="../../../assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">
</head>

<body>
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
                        <a href="pending-installation.php" style="color:black; font-size: 15px;"> <i class="menu-icon ti-layout-grid3"></i>Pending Installation </a>
                    </li>
                    <li>
                        <a href="restituted.php" style="color:black; font-size: 15px;"> <i class="menu-icon ti-layout-grid3"></i>Resitituted </a>
                    </li>

                    <li>
                        <a href="installed.php" style="color:black; font-size: 15px;"> <i class="menu-icon ti-layout-grid3"></i>Installed </a>
                    </li>
                    <li>
                        <a href="turnedon.php" style="color:black; font-size: 15px;"> <i class="menu-icon ti-layout-grid3"></i>Turned On </a>
                    </li>
                    <li class="menu-title">PAYMENTS</li><!-- /.menu-title -->

                    <li>
                        <a href="todays-work.php" style="color:black; font-size: 15px;"> <i class="menu-icon ti-money"></i>Today's Work </a>
                    </li>
                    <li>
                        <a href="completed-work.php" style="color:black; font-size: 15px;"> <i class="menu-icon ti-money"></i>Work To Pay </a>
                    </li>
                    <li class="menu-title" >TOOLS</li><!-- /.menu-title -->
                    <li>
                        <a href="charts.php" style="color:black; font-size: 15px;"> <i class="menu-icon fa fa-bar-chart"></i>Graphs & Charts </a>
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
        <header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">
                <img src="../../../images/picture1.png" style="width: 120px; height: 70px;" class="logo-icon" alt="logo icon">
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
                            <a class="nav-link" href="../../../config/logout.php"><i class="fa fa-power -off"></i>Logout</a>
                        </div>
                    </div>

                </div>
            </div>
        </header>
        <!-- /#header -->
        <!-- Content -->
        <div class="content">
            <div class="animated fadeIn">
                <div class="row">

                   <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mb-3">Overall Pap Progress</h4>
                                <canvas id="overall"></canvas>
                            </div>
                        </div>
                    </div><!-- /# column -->
                   
                    <!--<div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mb-3">Signing Progress</h4>
                                <canvas id="signing"></canvas>
                            </div>
                        </div>
                    </div><!-- /# column --

                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mb-3">Installation Progress</h4>
                                <canvas id="installation"></canvas>
                            </div>
                        </div>
                    </div><!-- /# column --

                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mb-3">Turn On Progress</h4>
                                <canvas id="turnon"></canvas>
                            </div>
                        </div>
                   </div>
                    <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="mb-3">Restituted </h4>
                                    <canvas id="restituted"></canvas>
                                </div>
                            </div>
                     </div><!-- /# column --
                     <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mb-3">Daily Signing Per Region</h4>
                                <canvas id="signing/region"></canvas>
                            </div>
                        </div>
                   </div>
                    <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="mb-3">Daily Installation Per Region </h4>
                                    <canvas id="installation/region"></canvas>
                                </div>
                            </div>
                     </div><!-- /# column --
                     <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mb-3">Daily Turnon Per Region</h4>
                                <canvas id="turnon/region"></canvas>
                            </div>
                        </div>
                   </div>
                    <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="mb-3">Daily Restitued Per Region </h4>
                                    <canvas id="restituted/region"></canvas>
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
    <script src="../../../assets/js/main.js"></script>
    <!--  Chart js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>
    <script>

        
    //installation chart
    var ctx = document.getElementById( "installation" );
    ctx.height = 160;
    var myChart = new Chart( ctx, {
        type: 'line',
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
                    label: "All Regions",
                    data: [ <?php
      $sql =
          "SELECT COUNT(DateInstalled) as installed FROM papinstalled where DateInstalled=DATE_SUB(CURDATE(), INTERVAL 6 DAY)";
      $result = mysqli_query($connection, $sql);
      $chart_data = "";
      while ($signed = mysqli_fetch_assoc($result)) {
          echo $signed["installed"];
      }
      ?>,<?php
$sql =
    "SELECT COUNT(DateInstalled) as installed FROM papinstalled where DateInstalled=DATE_SUB(CURDATE(), INTERVAL 5 DAY)";
$result = mysqli_query($connection, $sql);
$chart_data = "";
while ($signed = mysqli_fetch_assoc($result)) {
    echo $signed["installed"];
}
?>,<?php
$sql =
    "SELECT COUNT(DateInstalled) as installed FROM papinstalled where DateInstalled=DATE_SUB(CURDATE(), INTERVAL 4 DAY)";
$result = mysqli_query($connection, $sql);
$chart_data = "";
while ($signed = mysqli_fetch_assoc($result)) {
    echo $signed["installed"];
}
?>,<?php
$sql =
    "SELECT COUNT(DateInstalled) as installed FROM papinstalled where DateInstalled=DATE_SUB(CURDATE(), INTERVAL 3 DAY)";
$result = mysqli_query($connection, $sql);
$chart_data = "";
while ($signed = mysqli_fetch_assoc($result)) {
    echo $signed["installed"];
}
?>,<?php
$sql =
    "SELECT COUNT(DateInstalled) as installed FROM papinstalled where DateInstalled=DATE_SUB(CURDATE(), INTERVAL 2 DAY)";
$result = mysqli_query($connection, $sql);
$chart_data = "";
while ($signed = mysqli_fetch_assoc($result)) {
    echo $signed["installed"];
}
?>,<?php
$sql =
    "SELECT COUNT(DateInstalled) as installed FROM papinstalled where DateInstalled=DATE_SUB(CURDATE(), INTERVAL 1 DAY)";
$result = mysqli_query($connection, $sql);
$chart_data = "";
while ($signed = mysqli_fetch_assoc($result)) {
    echo $signed["installed"];
}
?>,<?php
$sql =
    "SELECT COUNT(DateInstalled) as installed FROM papinstalled where DateInstalled=CURDATE()";
$result = mysqli_query($connection, $sql);
$chart_data = "";
while ($signed = mysqli_fetch_assoc($result)) {
    echo $signed["installed"];
}
?> ],
                    borderColor: "#EE2C4E",
                    borderWidth: "2",
                    backgroundColor: "transparent"
                            },
                {
                    label: "Best Region",
                    data: [ "<?php
          $sql =
              "SELECT (SELECT MAX(mycount)
              FROM (SELECT Region,COUNT(DateInstalled) AS mycount,DateInstalled 
              FROM papinstalled where DateInstalled=DATE_SUB(CURDATE(), INTERVAL 6 DAY)
              GROUP BY Region,DateInstalled) as maxm) as bestreg";
          $result = mysqli_query($connection, $sql);
          $chart_data = "";
          while ($signed = mysqli_fetch_assoc($result)) {
              echo $signed["bestreg"];
          }
      ?>", "<?php
      $sql =
          "SELECT (SELECT MAX(mycount)
          FROM (SELECT Region,COUNT(DateInstalled) AS mycount,DateInstalled 
          FROM papinstalled where DateInstalled=DATE_SUB(CURDATE(), INTERVAL 5 DAY)
          GROUP BY Region,DateInstalled) as maxm) as bestreg";
      $result = mysqli_query($connection, $sql);
      $chart_data = "";
      while ($signed = mysqli_fetch_assoc($result)) {
          echo $signed["bestreg"];
      }
  ?>", "<?php
  $sql =
      "SELECT (SELECT MAX(mycount)
      FROM (SELECT Region,COUNT(DateInstalled) AS mycount,DateInstalled 
      FROM papinstalled where DateInstalled=DATE_SUB(CURDATE(), INTERVAL 4 DAY)
      GROUP BY Region,DateInstalled) as maxm) as bestreg";
  $result = mysqli_query($connection, $sql);
  $chart_data = "";
  while ($signed = mysqli_fetch_assoc($result)) {
      echo $signed["bestreg"];
  }
?>", "<?php
$sql =
    "SELECT (SELECT MAX(mycount)
    FROM (SELECT Region,COUNT(DateInstalled) AS mycount,DateInstalled 
    FROM papinstalled where DateInstalled=DATE_SUB(CURDATE(), INTERVAL 3 DAY)
    GROUP BY Region,DateInstalled) as maxm) as bestreg";
$result = mysqli_query($connection, $sql);
$chart_data = "";
while ($signed = mysqli_fetch_assoc($result)) {
    echo $signed["bestreg"];
}
?>", "<?php
$sql =
    "SELECT (SELECT MAX(mycount)
    FROM (SELECT Region,COUNT(DateInstalled) AS mycount,DateInstalled 
    FROM papinstalled where DateInstalled=DATE_SUB(CURDATE(), INTERVAL 2 DAY)
    GROUP BY Region,DateInstalled) as maxm) as bestreg";
$result = mysqli_query($connection, $sql);
$chart_data = "";
while ($signed = mysqli_fetch_assoc($result)) {
    echo $signed["bestreg"];
}
?>","<?php
$sql =
    "SELECT (SELECT MAX(mycount)
    FROM (SELECT Region,COUNT(DateInstalled) AS mycount,DateInstalled 
    FROM papinstalled where DateInstalled=DATE_SUB(CURDATE(), INTERVAL 1 DAY)
    GROUP BY Region,DateInstalled) as maxm) as bestreg";
$result = mysqli_query($connection, $sql);
$chart_data = "";
while ($signed = mysqli_fetch_assoc($result)) {
    echo $signed["bestreg"];
}
?>", "<?php
$sql =
    "SELECT (SELECT MAX(mycount)
    FROM (SELECT Region,COUNT(DateInstalled) AS mycount,DateInstalled 
    FROM papinstalled where DateInstalled=CURDATE()
    GROUP BY Region,DateInstalled) as maxm) as bestreg";
$result = mysqli_query($connection, $sql);
$chart_data = "";
while ($signed = mysqli_fetch_assoc($result)) {
    echo $signed["bestreg"];
}
?>"],
                    borderColor: "#FFB91F",
                    borderWidth: "2",
                    backgroundColor: "transparent"
                            },
                {
                    label: "Least Region",
                    data: [ "<?php
          $sql =
              "SELECT (SELECT MIN(mycount)
              FROM (SELECT Region,COUNT(DateInstalled) AS mycount,DateInstalled 
              FROM papinstalled where DateInstalled=DATE_SUB(CURDATE(), INTERVAL 6 DAY)
              GROUP BY Region,DateInstalled) as maxm) as bestreg";
          $result = mysqli_query($connection, $sql);
          $chart_data = "";
          while ($signed = mysqli_fetch_assoc($result)) {
              echo $signed["bestreg"];
          }
      ?>", "<?php
      $sql =
          "SELECT (SELECT MIN(mycount)
          FROM (SELECT Region,COUNT(DateInstalled) AS mycount,DateInstalled 
          FROM papinstalled where DateInstalled=DATE_SUB(CURDATE(), INTERVAL 5 DAY)
          GROUP BY Region,DateInstalled) as maxm) as bestreg";
      $result = mysqli_query($connection, $sql);
      $chart_data = "";
      while ($signed = mysqli_fetch_assoc($result)) {
          echo $signed["bestreg"];
      }
  ?>", "<?php
  $sql =
      "SELECT (SELECT MIN(mycount)
      FROM (SELECT Region,COUNT(DateInstalled) AS mycount,DateInstalled 
      FROM papinstalled where DateInstalled=DATE_SUB(CURDATE(), INTERVAL 4 DAY)
      GROUP BY Region,DateInstalled) as maxm) as bestreg";
  $result = mysqli_query($connection, $sql);
  $chart_data = "";
  while ($signed = mysqli_fetch_assoc($result)) {
      echo $signed["bestreg"];
  }
?>", "<?php
$sql =
    "SELECT (SELECT MIN(mycount)
    FROM (SELECT Region,COUNT(DateInstalled) AS mycount,DateInstalled 
    FROM papinstalled where DateInstalled=DATE_SUB(CURDATE(), INTERVAL 3 DAY)
    GROUP BY Region,DateInstalled) as maxm) as bestreg";
$result = mysqli_query($connection, $sql);
$chart_data = "";
while ($signed = mysqli_fetch_assoc($result)) {
    echo $signed["bestreg"];
}
?>", "<?php
$sql =
    "SELECT (SELECT MIN(mycount)
    FROM (SELECT Region,COUNT(DateInstalled) AS mycount,DateInstalled 
    FROM papinstalled where DateInstalled=DATE_SUB(CURDATE(), INTERVAL 2 DAY)
    GROUP BY Region,DateInstalled) as maxm) as bestreg";
$result = mysqli_query($connection, $sql);
$chart_data = "";
while ($signed = mysqli_fetch_assoc($result)) {
    echo $signed["bestreg"];
}
?>","<?php
$sql =
    "SELECT (SELECT MIN(mycount)
    FROM (SELECT Region,COUNT(DateInstalled) AS mycount,DateInstalled 
    FROM papinstalled where DateInstalled=DATE_SUB(CURDATE(), INTERVAL 1 DAY)
    GROUP BY Region,DateInstalled) as maxm) as bestreg";
$result = mysqli_query($connection, $sql);
$chart_data = "";
while ($signed = mysqli_fetch_assoc($result)) {
    echo $signed["bestreg"];
}
?>", "<?php
$sql =
    "SELECT (SELECT MIN(mycount)
    FROM (SELECT Region,COUNT(DateInstalled) AS mycount,DateInstalled 
    FROM papinstalled where DateInstalled=CURDATE()
    GROUP BY Region,DateInstalled) as maxm) as bestreg";
$result = mysqli_query($connection, $sql);
$chart_data = "";
while ($signed = mysqli_fetch_assoc($result)) {
    echo $signed["bestreg"];
}
?>" ],
                    borderColor: "#85CE36",
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
 
    </script><script>
    //Turnon chart
    var ctx = document.getElementById( "turnon" );
    ctx.height = 160;
    var myChart = new Chart( ctx, {
        type: 'line',
        data: {
            labels: [ "<?php echo date("Y-m-d", strtotime("-6 days")); ?>","<?php echo date(
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
                    label: "All Regions",
                    data: [ <?php
      $sql =
          "SELECT COUNT(DateTurnedOn) as turnedon FROM turnedonpap where DateTurnedOn=DATE_SUB(CURDATE(), INTERVAL 6 DAY)";
      $result = mysqli_query($connection, $sql);
      $chart_data = "";
      while ($signed = mysqli_fetch_assoc($result)) {
          echo $signed["turnedon"];
      }
      ?>,<?php
$sql =
    "SELECT COUNT(DateTurnedOn) as turnedon FROM turnedonpap where DateTurnedOn=DATE_SUB(CURDATE(), INTERVAL 5 DAY)";
$result = mysqli_query($connection, $sql);
$chart_data = "";
while ($signed = mysqli_fetch_assoc($result)) {
    echo $signed["turnedon"];
}
?>,<?php
$sql =
    "SELECT COUNT(DateTurnedOn) as turnedon FROM turnedonpap where DateTurnedOn=DATE_SUB(CURDATE(), INTERVAL 4 DAY)";
$result = mysqli_query($connection, $sql);
$chart_data = "";
while ($signed = mysqli_fetch_assoc($result)) {
    echo $signed["turnedon"];
}
?>,<?php
$sql =
    "SELECT COUNT(DateTurnedOn) as turnedon FROM turnedonpap where DateTurnedOn=DATE_SUB(CURDATE(), INTERVAL 3 DAY)";
$result = mysqli_query($connection, $sql);
$chart_data = "";
while ($signed = mysqli_fetch_assoc($result)) {
    echo $signed["turnedon"];
}
?>,<?php
$sql =
    "SELECT COUNT(DateTurnedOn) as turnedon FROM turnedonpap where DateTurnedOn=DATE_SUB(CURDATE(), INTERVAL 2 DAY)";
$result = mysqli_query($connection, $sql);
$chart_data = "";
while ($signed = mysqli_fetch_assoc($result)) {
    echo $signed["turnedon"];
}
?>,<?php
$sql =
    "SELECT COUNT(DateTurnedOn) as turnedon FROM turnedonpap where DateTurnedOn=DATE_SUB(CURDATE(), INTERVAL 1 DAY)";
$result = mysqli_query($connection, $sql);
$chart_data = "";
while ($signed = mysqli_fetch_assoc($result)) {
    echo $signed["turnedon"];
}
?>,<?php
$sql =
    "SELECT COUNT(DateTurnedOn) as turnedon FROM turnedonpap where DateTurnedOn=CURDATE()";
$result = mysqli_query($connection, $sql);
$chart_data = "";
while ($signed = mysqli_fetch_assoc($result)) {
    echo $signed["turnedon"];
}
?> ],
                    borderColor: "#FFB91F",
                    borderWidth: "2",
                    backgroundColor: "transparent"
                            },
                {
                    label: "Best Region",
                    data: [ "<?php
$sql =
    "SELECT (SELECT MAX(mycount)
    FROM (SELECT Region,COUNT(DateTurnedOn) AS mycount,DateTurnedOn 
    FROM turnedonpap where DateTurnedOn=DATE_SUB(CURDATE(), INTERVAL 6 DAY)
    GROUP BY Region,DateTurnedOn) as maxm) as bestreg";
$result = mysqli_query($connection, $sql);
$chart_data = "";
while ($signed = mysqli_fetch_assoc($result)) {
    echo $signed["bestreg"];
}
?>", "<?php
$sql =
    "SELECT (SELECT MAX(mycount)
    FROM (SELECT Region,COUNT(DateTurnedOn) AS mycount,DateTurnedOn 
    FROM turnedonpap where DateTurnedOn=DATE_SUB(CURDATE(), INTERVAL 5 DAY)
    GROUP BY Region,DateTurnedOn) as maxm) as bestreg";
$result = mysqli_query($connection, $sql);
$chart_data = "";
while ($signed = mysqli_fetch_assoc($result)) {
    echo $signed["bestreg"];
}
?>", "<?php
$sql =
    "SELECT (SELECT MAX(mycount)
    FROM (SELECT Region,COUNT(DateTurnedOn) AS mycount,DateTurnedOn 
    FROM turnedonpap where DateTurnedOn=DATE_SUB(CURDATE(), INTERVAL 4 DAY)
    GROUP BY Region,DateTurnedOn) as maxm) as bestreg";
$result = mysqli_query($connection, $sql);
$chart_data = "";
while ($signed = mysqli_fetch_assoc($result)) {
    echo $signed["bestreg"];
}
?>", "<?php
$sql =
    "SELECT (SELECT MAX(mycount)
    FROM (SELECT Region,COUNT(DateTurnedOn) AS mycount,DateTurnedOn 
    FROM turnedonpap where DateTurnedOn=DATE_SUB(CURDATE(), INTERVAL 3 DAY)
    GROUP BY Region,DateTurnedOn) as maxm) as bestreg";
$result = mysqli_query($connection, $sql);
$chart_data = "";
while ($signed = mysqli_fetch_assoc($result)) {
    echo $signed["bestreg"];
}
?>", "<?php
$sql =
    "SELECT (SELECT MAX(mycount)
    FROM (SELECT Region,COUNT(DateTurnedOn) AS mycount,DateTurnedOn 
    FROM turnedonpap where DateTurnedOn=DATE_SUB(CURDATE(), INTERVAL 2 DAY)
    GROUP BY Region,DateTurnedOn) as maxm) as bestreg";
$result = mysqli_query($connection, $sql);
$chart_data = "";
while ($signed = mysqli_fetch_assoc($result)) {
    echo $signed["bestreg"];
}
?>", "<?php
$sql =
    "SELECT (SELECT MAX(mycount)
    FROM (SELECT Region,COUNT(DateTurnedOn) AS mycount,DateTurnedOn 
    FROM turnedonpap where DateTurnedOn=DATE_SUB(CURDATE(), INTERVAL 1 DAY)
    GROUP BY Region,DateTurnedOn) as maxm) as bestreg";
$result = mysqli_query($connection, $sql);
$chart_data = "";
while ($signed = mysqli_fetch_assoc($result)) {
    echo $signed["bestreg"];
}
?>", "<?php
$sql =
    "SELECT (SELECT MAX(mycount)
    FROM (SELECT Region,COUNT(DateTurnedOn) AS mycount,DateTurnedOn 
    FROM turnedonpap where DateTurnedOn=CURDATE()
    GROUP BY Region,DateTurnedOn) as maxm) as bestreg";
$result = mysqli_query($connection, $sql);
$chart_data = "";
while ($signed = mysqli_fetch_assoc($result)) {
    echo $signed["bestreg"];
}
?>" ],
                    borderColor: "#0CBEAF",
                    borderWidth: "2",
                    backgroundColor: "transparent"
                            },
                {
                    label: "Least Region",
                    data: [ "<?php
$sql =
    "SELECT (SELECT MIN(mycount)
    FROM (SELECT Region,COUNT(DateTurnedOn) AS mycount,DateTurnedOn 
    FROM turnedonpap where DateTurnedOn=DATE_SUB(CURDATE(), INTERVAL 6 DAY)
    GROUP BY Region,DateTurnedOn) as maxm) as bestreg";
$result = mysqli_query($connection, $sql);
$chart_data = "";
while ($signed = mysqli_fetch_assoc($result)) {
    echo $signed["bestreg"];
}
?>", "<?php
$sql =
    "SELECT (SELECT MIN(mycount)
    FROM (SELECT Region,COUNT(DateTurnedOn) AS mycount,DateTurnedOn 
    FROM turnedonpap where DateTurnedOn=DATE_SUB(CURDATE(), INTERVAL 5 DAY)
    GROUP BY Region,DateTurnedOn) as maxm) as bestreg";
$result = mysqli_query($connection, $sql);
$chart_data = "";
while ($signed = mysqli_fetch_assoc($result)) {
    echo $signed["bestreg"];
}
?>", "<?php
$sql =
    "SELECT (SELECT MIN(mycount)
    FROM (SELECT Region,COUNT(DateTurnedOn) AS mycount,DateTurnedOn 
    FROM turnedonpap where DateTurnedOn=DATE_SUB(CURDATE(), INTERVAL 4 DAY)
    GROUP BY Region,DateTurnedOn) as maxm) as bestreg";
$result = mysqli_query($connection, $sql);
$chart_data = "";
while ($signed = mysqli_fetch_assoc($result)) {
    echo $signed["bestreg"];
}
?>", "<?php
$sql =
    "SELECT (SELECT MIN(mycount)
    FROM (SELECT Region,COUNT(DateTurnedOn) AS mycount,DateTurnedOn 
    FROM turnedonpap where DateTurnedOn=DATE_SUB(CURDATE(), INTERVAL 3 DAY)
    GROUP BY Region,DateTurnedOn) as maxm) as bestreg";
$result = mysqli_query($connection, $sql);
$chart_data = "";
while ($signed = mysqli_fetch_assoc($result)) {
    echo $signed["bestreg"];
}
?>", "<?php
$sql =
    "SELECT (SELECT MIN(mycount)
    FROM (SELECT Region,COUNT(DateTurnedOn) AS mycount,DateTurnedOn 
    FROM turnedonpap where DateTurnedOn=DATE_SUB(CURDATE(), INTERVAL 2 DAY)
    GROUP BY Region,DateTurnedOn) as maxm) as bestreg";
$result = mysqli_query($connection, $sql);
$chart_data = "";
while ($signed = mysqli_fetch_assoc($result)) {
    echo $signed["bestreg"];
}
?>", "<?php
$sql =
    "SELECT (SELECT MIN(mycount)
    FROM (SELECT Region,COUNT(DateTurnedOn) AS mycount,DateTurnedOn 
    FROM turnedonpap where DateTurnedOn=DATE_SUB(CURDATE(), INTERVAL 1 DAY)
    GROUP BY Region,DateTurnedOn) as maxm) as bestreg";
$result = mysqli_query($connection, $sql);
$chart_data = "";
while ($signed = mysqli_fetch_assoc($result)) {
    echo $signed["bestreg"];
}
?>", "<?php
$sql =
    "SELECT (SELECT MIN(mycount)
    FROM (SELECT Region,COUNT(DateTurnedOn) AS mycount,DateTurnedOn 
    FROM turnedonpap where DateTurnedOn=CURDATE()
    GROUP BY Region,DateTurnedOn) as maxm) as bestreg";
$result = mysqli_query($connection, $sql);
$chart_data = "";
while ($signed = mysqli_fetch_assoc($result)) {
    echo $signed["bestreg"];
}
?>"],
                    borderColor: "#FE2D38",
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

</script><script>
    //signing chart
    var ctx = document.getElementById( "signing" );
    ctx.height = 160;
    var myChart = new Chart( ctx, {
        type: 'line',
        data: {
            labels: [ "<?php echo date("Y-m-d", strtotime("-6 days")); ?>","<?php echo date(
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
                    label: "All Regions",
                    data: [ <?php
      $sql =
          "SELECT COUNT(DateSigned) as sales FROM papdailysales where DateSigned=DATE_SUB(CURDATE(), INTERVAL 6 DAY)";
      $result = mysqli_query($connection, $sql);
      $chart_data = "";
      while ($signed = mysqli_fetch_assoc($result)) {
          echo $signed["sales"];
      }
      ?>,<?php
$sql =
    "SELECT COUNT(DateSigned) as sales FROM papdailysales where DateSigned=DATE_SUB(CURDATE(), INTERVAL 5 DAY)";
$result = mysqli_query($connection, $sql);
$chart_data = "";
while ($signed = mysqli_fetch_assoc($result)) {
    echo $signed["sales"];
}
?>,<?php
$sql =
    "SELECT COUNT(DateSigned) as sales FROM papdailysales where DateSigned=DATE_SUB(CURDATE(), INTERVAL 4 DAY)";
$result = mysqli_query($connection, $sql);
$chart_data = "";
while ($signed = mysqli_fetch_assoc($result)) {
    echo $signed["sales"];
}
?>,<?php
$sql =
    "SELECT COUNT(DateSigned) as sales FROM papdailysales where DateSigned=DATE_SUB(CURDATE(), INTERVAL 3 DAY)";
$result = mysqli_query($connection, $sql);
$chart_data = "";
while ($signed = mysqli_fetch_assoc($result)) {
    echo $signed["sales"];
}
?>,<?php
$sql =
    "SELECT COUNT(DateSigned) as sales FROM papdailysales where DateSigned=DATE_SUB(CURDATE(), INTERVAL 2 DAY)";
$result = mysqli_query($connection, $sql);
$chart_data = "";
while ($signed = mysqli_fetch_assoc($result)) {
    echo $signed["sales"];
}
?>,<?php
$sql =
    "SELECT COUNT(DateSigned) as sales FROM papdailysales where DateSigned=DATE_SUB(CURDATE(), INTERVAL 1 DAY)";
$result = mysqli_query($connection, $sql);
$chart_data = "";
while ($signed = mysqli_fetch_assoc($result)) {
    echo $signed["sales"];
}
?>,<?php
$sql =
    "SELECT COUNT(DateSigned) as sales FROM papdailysales where DateSigned=CURDATE()";
$result = mysqli_query($connection, $sql);
$chart_data = "";
while ($signed = mysqli_fetch_assoc($result)) {
    echo $signed["sales"];
}
?> ],
                    borderColor: "#85CE36",
                    borderWidth: "2",
                    backgroundColor: "transparent"
                            },
                {
                    label: "Best Region",
                    data: [ "<?php
          $sql =
              "SELECT (SELECT MAX(mycount)
              FROM (SELECT Region,COUNT(DateSigned) AS mycount,DateSigned 
              FROM papdailysales where DateSigned=DATE_SUB(CURDATE(), INTERVAL 6 DAY)
              GROUP BY Region,DateSigned) as maxm) as bestreg";
          $result = mysqli_query($connection, $sql);
          $chart_data = "";
          while ($signed = mysqli_fetch_assoc($result)) {
              echo $signed["bestreg"];
          }
      ?>", "<?php
      $sql =
          "SELECT (SELECT MAX(mycount)
          FROM (SELECT Region,COUNT(DateSigned) AS mycount,DateSigned 
          FROM papdailysales where DateSigned=DATE_SUB(CURDATE(), INTERVAL 5 DAY)
          GROUP BY Region,DateSigned) as maxm) as bestreg";
      $result = mysqli_query($connection, $sql);
      $chart_data = "";
      while ($signed = mysqli_fetch_assoc($result)) {
          echo $signed["bestreg"];
      }
  ?>", "<?php
  $sql =
      "SELECT (SELECT MAX(mycount)
      FROM (SELECT Region,COUNT(DateSigned) AS mycount,DateSigned 
      FROM papdailysales where DateSigned=DATE_SUB(CURDATE(), INTERVAL 4 DAY)
      GROUP BY Region,DateSigned) as maxm) as bestreg";
  $result = mysqli_query($connection, $sql);
  $chart_data = "";
  while ($signed = mysqli_fetch_assoc($result)) {
      echo $signed["bestreg"];
  }
?>", "<?php
$sql =
    "SELECT (SELECT MAX(mycount)
    FROM (SELECT Region,COUNT(DateSigned) AS mycount,DateSigned 
    FROM papdailysales where DateSigned=DATE_SUB(CURDATE(), INTERVAL 3 DAY)
    GROUP BY Region,DateSigned) as maxm) as bestreg";
$result = mysqli_query($connection, $sql);
$chart_data = "";
while ($signed = mysqli_fetch_assoc($result)) {
    echo $signed["bestreg"];
}
?>", "<?php
$sql =
    "SELECT (SELECT MAX(mycount)
    FROM (SELECT Region,COUNT(DateSigned) AS mycount,DateSigned 
    FROM papdailysales where DateSigned=DATE_SUB(CURDATE(), INTERVAL 2 DAY)
    GROUP BY Region,DateSigned) as maxm) as bestreg";
$result = mysqli_query($connection, $sql);
$chart_data = "";
while ($signed = mysqli_fetch_assoc($result)) {
    echo $signed["bestreg"];
}
?>","<?php
$sql =
    "SELECT (SELECT MAX(mycount)
    FROM (SELECT Region,COUNT(DateSigned) AS mycount,DateSigned 
    FROM papdailysales where DateSigned=DATE_SUB(CURDATE(), INTERVAL 1 DAY)
    GROUP BY Region,DateSigned) as maxm) as bestreg";
$result = mysqli_query($connection, $sql);
$chart_data = "";
while ($signed = mysqli_fetch_assoc($result)) {
    echo $signed["bestreg"];
}
?>", "<?php
$sql =
    "SELECT (SELECT MAX(mycount)
    FROM (SELECT Region,COUNT(DateSigned) AS mycount,DateSigned 
    FROM papdailysales where DateSigned=CURDATE()
    GROUP BY Region,DateSigned) as maxm) as bestreg";
$result = mysqli_query($connection, $sql);
$chart_data = "";
while ($signed = mysqli_fetch_assoc($result)) {
    echo $signed["bestreg"];
}
?>" ],
                    borderColor: "#FFB91F",
                    borderWidth: "2",
                    backgroundColor: "transparent"
                            },
                {
                    label: "Least Region",
                    data: [ "<?php
          $sql =
              "SELECT (SELECT MIN(mycount)
              FROM (SELECT Region,COUNT(DateSigned) AS mycount,DateSigned 
              FROM papdailysales where DateSigned=DATE_SUB(CURDATE(), INTERVAL 6 DAY)
              GROUP BY Region,DateSigned) as maxm) as bestreg";
          $result = mysqli_query($connection, $sql);
          $chart_data = "";
          while ($signed = mysqli_fetch_assoc($result)) {
              echo $signed["bestreg"];
          }
      ?>", "<?php
      $sql =
          "SELECT (SELECT MIN(mycount)
          FROM (SELECT Region,COUNT(DateSigned) AS mycount,DateSigned 
          FROM papdailysales where DateSigned=DATE_SUB(CURDATE(), INTERVAL 5 DAY)
          GROUP BY Region,DateSigned) as maxm) as bestreg";
      $result = mysqli_query($connection, $sql);
      $chart_data = "";
      while ($signed = mysqli_fetch_assoc($result)) {
          echo $signed["bestreg"];
      }
  ?>", "<?php
  $sql =
      "SELECT (SELECT MIN(mycount)
      FROM (SELECT Region,COUNT(DateSigned) AS mycount,DateSigned 
      FROM papdailysales where DateSigned=DATE_SUB(CURDATE(), INTERVAL 4 DAY)
      GROUP BY Region,DateSigned) as maxm) as bestreg";
  $result = mysqli_query($connection, $sql);
  $chart_data = "";
  while ($signed = mysqli_fetch_assoc($result)) {
      echo $signed["bestreg"];
  }
?>", "<?php
$sql =
    "SELECT (SELECT MIN(mycount)
    FROM (SELECT Region,COUNT(DateSigned) AS mycount,DateSigned 
    FROM papdailysales where DateSigned=DATE_SUB(CURDATE(), INTERVAL 3 DAY)
    GROUP BY Region,DateSigned) as maxm) as bestreg";
$result = mysqli_query($connection, $sql);
$chart_data = "";
while ($signed = mysqli_fetch_assoc($result)) {
    echo $signed["bestreg"];
}
?>", "<?php
$sql =
    "SELECT (SELECT MIN(mycount)
    FROM (SELECT Region,COUNT(DateSigned) AS mycount,DateSigned 
    FROM papdailysales where DateSigned=DATE_SUB(CURDATE(), INTERVAL 2 DAY)
    GROUP BY Region,DateSigned) as maxm) as bestreg";
$result = mysqli_query($connection, $sql);
$chart_data = "";
while ($signed = mysqli_fetch_assoc($result)) {
    echo $signed["bestreg"];
}
?>","<?php
$sql =
    "SELECT (SELECT MIN(mycount)
    FROM (SELECT Region,COUNT(DateSigned) AS mycount,DateSigned 
    FROM papdailysales where DateSigned=DATE_SUB(CURDATE(), INTERVAL 1 DAY)
    GROUP BY Region,DateSigned) as maxm) as bestreg";
$result = mysqli_query($connection, $sql);
$chart_data = "";
while ($signed = mysqli_fetch_assoc($result)) {
    echo $signed["bestreg"];
}
?>", "<?php
$sql =
    "SELECT (SELECT MIN(mycount)
    FROM (SELECT Region,COUNT(DateSigned) AS mycount,DateSigned 
    FROM papdailysales where DateSigned=CURDATE()
    GROUP BY Region,DateSigned) as maxm) as bestreg";
$result = mysqli_query($connection, $sql);
$chart_data = "";
while ($signed = mysqli_fetch_assoc($result)) {
    echo $signed["bestreg"];
}
?>"],
                    borderColor: "#FE2D38",
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

</script><script>
     //restituted chart
     var ctx = document.getElementById( "restituted" );
    ctx.height = 160;
    var myChart = new Chart( ctx, {
        type: 'line',
        data: {
            labels: [ "<?php echo date("Y-m-d", strtotime("-6 days")); ?>","<?php echo date(
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
                    label: "All Regions",
                    data: [ <?php
      $sql =
          "SELECT COUNT(ClientID) as restituted FROM papnotinstalled where Date(RestitutedDate)=DATE_SUB(CURDATE(), INTERVAL 6 DAY)";
      $result = mysqli_query($connection, $sql);
      $chart_data = "";
      while ($signed = mysqli_fetch_assoc($result)) {
          echo $signed["restituted"];
      }
      ?>, <?php
      $sql =
          "SELECT COUNT(ClientID) as restituted FROM papnotinstalled where Date(RestitutedDate)=DATE_SUB(CURDATE(), INTERVAL 5 DAY)";
      $result = mysqli_query($connection, $sql);
      $chart_data = "";
      while ($signed = mysqli_fetch_assoc($result)) {
          echo $signed["restituted"];
      }
      ?>, <?php
      $sql =
          "SELECT COUNT(ClientID) as restituted FROM papnotinstalled where Date(RestitutedDate)=DATE_SUB(CURDATE(), INTERVAL 4 DAY)";
      $result = mysqli_query($connection, $sql);
      $chart_data = "";
      while ($signed = mysqli_fetch_assoc($result)) {
          echo $signed["restituted"];
      }
      ?>, <?php
      $sql =
          "SELECT COUNT(ClientID) as restituted FROM papnotinstalled where Date(RestitutedDate)=DATE_SUB(CURDATE(), INTERVAL 3 DAY)";
      $result = mysqli_query($connection, $sql);
      $chart_data = "";
      while ($signed = mysqli_fetch_assoc($result)) {
          echo $signed["restituted"];
      }
      ?>, <?php
      $sql =
          "SELECT COUNT(ClientID) as restituted FROM papnotinstalled where Date(RestitutedDate)=DATE_SUB(CURDATE(), INTERVAL 2 DAY)";
      $result = mysqli_query($connection, $sql);
      $chart_data = "";
      while ($signed = mysqli_fetch_assoc($result)) {
          echo $signed["restituted"];
      }
      ?>, <?php
      $sql =
          "SELECT COUNT(ClientID) as restituted FROM papnotinstalled where Date(RestitutedDate)=DATE_SUB(CURDATE(), INTERVAL 1 DAY)";
      $result = mysqli_query($connection, $sql);
      $chart_data = "";
      while ($signed = mysqli_fetch_assoc($result)) {
          echo $signed["restituted"];
      }
      ?>, <?php
      $sql =
          "SELECT COUNT(ClientID) as restituted FROM papnotinstalled where Date(RestitutedDate)=CURDATE()";
      $result = mysqli_query($connection, $sql);
      $chart_data = "";
      while ($signed = mysqli_fetch_assoc($result)) {
          echo $signed["restituted"];
      }
      ?> ],
                    borderColor: "#85CE36",
                    borderWidth: "2",
                    backgroundColor: "transparent"
                            },
                {
                    label: "Highest Region",
                    data: [ "<?php
$sql =
    "SELECT Region,Count(*) as highestreg from papnotinstalled where Date(RestitutedDate) =DATE_SUB(CURDATE(), INTERVAL 6 DAY) group by Region order by highestreg Desc limit 1";
$result = mysqli_query($connection, $sql);
$chart_data = "";
while ($signed = mysqli_fetch_assoc($result)) {
    echo $signed["highestreg"];
}
?>", "<?php
$sql =
    "SELECT Region,Count(*) as highestreg from papnotinstalled where Date(RestitutedDate) =DATE_SUB(CURDATE(), INTERVAL 5 DAY) group by Region order by highestreg Desc limit 1";
$result = mysqli_query($connection, $sql);
$chart_data = "";
while ($signed = mysqli_fetch_assoc($result)) {
    echo $signed["highestreg"];
}
?>", "<?php
$sql =
    "SELECT Region,Count(*) as highestreg from papnotinstalled where Date(RestitutedDate) =DATE_SUB(CURDATE(), INTERVAL 4 DAY) group by Region order by highestreg Desc limit 1";
$result = mysqli_query($connection, $sql);
$chart_data = "";
while ($signed = mysqli_fetch_assoc($result)) {
    echo $signed["highestreg"];
}
?>", "<?php
$sql =
    "SELECT Region,Count(*) as highestreg from papnotinstalled where Date(RestitutedDate) =DATE_SUB(CURDATE(), INTERVAL 3 DAY) group by Region order by highestreg Desc limit 1";
$result = mysqli_query($connection, $sql);
$chart_data = "";
while ($signed = mysqli_fetch_assoc($result)) {
    echo $signed["highestreg"];
}
?>", "<?php
$sql =
    "SELECT Region,Count(*) as highestreg from papnotinstalled where Date(RestitutedDate) =DATE_SUB(CURDATE(), INTERVAL 2 DAY) group by Region order by highestreg Desc limit 1";
$result = mysqli_query($connection, $sql);
$chart_data = "";
while ($signed = mysqli_fetch_assoc($result)) {
    echo $signed["highestreg"];
}
?>", "<?php
$sql =
    "SELECT Region,Count(*) as highestreg from papnotinstalled where Date(RestitutedDate) =DATE_SUB(CURDATE(), INTERVAL 1 DAY) group by Region order by highestreg Desc limit 1";
$result = mysqli_query($connection, $sql);
$chart_data = "";
while ($signed = mysqli_fetch_assoc($result)) {
    echo $signed["highestreg"];
}
?>", "<?php
$sql =
    "SELECT Region,Count(*) as highestreg from papnotinstalled where Date(RestitutedDate) =CURDATE() group by Region order by highestreg Desc limit 1";
$result = mysqli_query($connection, $sql);
$chart_data = "";
while ($signed = mysqli_fetch_assoc($result)) {
    echo $signed["highestreg"];
}
?>" ],
                    borderColor: "#FE2D38",
                    borderWidth: "2",
                    backgroundColor: "transparent"
                            },
                {
                    label: "Least Region",
                    data: [ "<?php
$sql =
    "SELECT Region,Count(*) as minreg from papnotinstalled where Date(RestitutedDate) =DATE_SUB(CURDATE(), INTERVAL 6 DAY) group by Region order by minreg asc limit 1";
$result = mysqli_query($connection, $sql);
$chart_data = "";
while ($signed = mysqli_fetch_assoc($result)) {
    echo $signed["minreg"];
}
?>", "<?php
$sql =
    "SELECT Region,Count(*) as minreg from papnotinstalled where Date(RestitutedDate) =DATE_SUB(CURDATE(), INTERVAL 5 DAY) group by Region order by minreg asc limit 1";
$result = mysqli_query($connection, $sql);
$chart_data = "";
while ($signed = mysqli_fetch_assoc($result)) {
    echo $signed["minreg"];
}
?>", "<?php
$sql =
    "SELECT Region,Count(*) as minreg from papnotinstalled where Date(RestitutedDate) =DATE_SUB(CURDATE(), INTERVAL 4 DAY) group by Region order by minreg asc limit 1";
$result = mysqli_query($connection, $sql);
$chart_data = "";
while ($signed = mysqli_fetch_assoc($result)) {
    echo $signed["minreg"];
}
?>", "<?php
$sql =
    "SELECT Region,Count(*) as minreg from papnotinstalled where Date(RestitutedDate) =DATE_SUB(CURDATE(), INTERVAL 3 DAY) group by Region order by minreg asc limit 1";
$result = mysqli_query($connection, $sql);
$chart_data = "";
while ($signed = mysqli_fetch_assoc($result)) {
    echo $signed["minreg"];
}
?>", "<?php
$sql =
    "SELECT Region,Count(*) as minreg from papnotinstalled where Date(RestitutedDate) =DATE_SUB(CURDATE(), INTERVAL 2 DAY) group by Region order by minreg asc limit 1";
$result = mysqli_query($connection, $sql);
$chart_data = "";
while ($signed = mysqli_fetch_assoc($result)) {
    echo $signed["minreg"];
}
?>", "<?php
$sql =
    "SELECT Region,Count(*) as minreg from papnotinstalled where Date(RestitutedDate) =DATE_SUB(CURDATE(), INTERVAL 1 DAY) group by Region order by minreg asc limit 1";
$result = mysqli_query($connection, $sql);
$chart_data = "";
while ($signed = mysqli_fetch_assoc($result)) {
    echo $signed["minreg"];
}
?>", "<?php
$sql =
    "SELECT Region,Count(*) as minreg from papnotinstalled where Date(RestitutedDate) =CURDATE() group by Region order by minreg asc limit 1";
$result = mysqli_query($connection, $sql);
$chart_data = "";
while ($signed = mysqli_fetch_assoc($result)) {
    echo $signed["minreg"];
}
?>" ],
                    borderColor: "#0cbeaf",
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
</script><script>
    //bar chart
    var ctx = document.getElementById( "overall" );
     ctx.height = 90;
    var myChart = new Chart( ctx, {
        type: 'line',
        data: {
            labels: [],
            datasets: [
                {
                    label: "Signed",
                    data: [ ],
                    borderColor: "#0CBEAF",
                    borderWidth: "2",
                    backgroundColor: "transparent"
                            },
                {
                    label: "Restituted",
                    data: [ ],
                    borderColor: "#EE2C4E",
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
    <script>

    var ctx = document.getElementById( "signing/region" );
    //ctx.height = 300;
    var myChart = new Chart( ctx, {
        type: 'pie',
        data: {
            datasets: [ {
                data: <?php echo json_encode($Clients)?>,
                backgroundColor: [
                    "#ee2c4e",
                                    "#ffb91f",
                                    "#0cbeaf",
                                    "#3072f5",
                                    "#000000",
                                    "#85ce36",
                                    "#800080"
                                ],
                hoverBackgroundColor: [
                    "#ee2c4e",
                                    "#ffb91f",
                                    "#0cbeaf",
                                    "#3072f5",
                                    "#000000",
                                    "#85ce36",
                                    "#800080"
                                ]

                            } ],
            labels: <?php echo json_encode($Region)?>
                        
        },
        options: {
            responsive: true
        }
    } );
    </script>
    <script>

var ctx = document.getElementById( "installation/region" );
//ctx.height = 300;
var myChart = new Chart( ctx, {
    type: 'doughnut',
    data: {
        datasets: [ {
            data: <?php echo json_encode($installed)?>,
            backgroundColor: [
                "#3072f5",
                "#85ce36",
                "#ee2c4e",
                                "#ffb91f",
                                "#0cbeaf",
                                "#000000",
                                "#800080"
                            ],
            hoverBackgroundColor: [
                "#3072f5",
                "#85ce36",
                "#ee2c4e",
                                "#ffb91f",
                                "#0cbeaf",
                                "#000000",
                                "#800080"
                            ]

                        } ],
        labels: <?php echo json_encode($Regioninstalled)?>
                    
    },
    options: {
        responsive: true
    }
} );
</script>
<script>

var ctx = document.getElementById( "turnon/region" );
//ctx.height = 300;
var myChart = new Chart( ctx, {
    type: 'pie',
    data: {
        datasets: [ {
            data: <?php echo json_encode($turnon)?>,
            backgroundColor: [
                "#800080",
                "#ee2c4e",
                                "#ffb91f",
                                "#3072f5",
                                "#0cbeaf",
                                "#000000",
                                "#85ce36"
                            ],
            hoverBackgroundColor: [
                "#800080",
                "#ee2c4e",
                                "#ffb91f",
                                "#3072f5",
                                "#0cbeaf",
                                "#000000",
                                "#85ce36"
                                
                            ]

                        } ],
        labels: <?php echo json_encode($Regionturnon)?>
                    
    },
    options: {
        responsive: true
    }
} );
</script>
<script>

var ctx = document.getElementById( "restituted/region" );
//ctx.height = 300;
var myChart = new Chart( ctx, {
    type: 'pie',
    data: {
        datasets: [ {
            data: <?php echo json_encode($restituted)?>,
            backgroundColor: [
                "#ffb91f",
                "#ee2c4e",       
                                "#3072f5",
                                "#000000",
                                "#85ce36",
                                "#0cbeaf",
                                "#800080"
                            ],
            hoverBackgroundColor: [
                "#ffb91f",
                "#ee2c4e", 
                                "#3072f5",
                                "#000000",
                                "#85ce36",
                                "#0cbeaf",
                                "#800080"
                            ]

                        } ],
        labels: <?php echo json_encode($Regionrestituted)?>
                    
    },
    options: {
        responsive: true
    }
} );
</script>
    <!--Flot Chart-->
    <script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-spline@0.0.1/js/jquery.flot.spline.min.js"></script>
    
</body>

</html>
