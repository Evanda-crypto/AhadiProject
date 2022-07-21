<?php
include("includes.php");
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
        FROM papdailysales LEFT JOIN papnotinstalled on papnotinstalled.ClientID=papdailysales.ClientID WHERE papnotinstalled.ClientID is null
        GROUP BY month,EXTRACT(MONTH FROM papdailysales.DateSigned) order by EXTRACT(MONTH FROM papdailysales.DateSigned) asc";
    $result = mysqli_query($connection, $sql);
    $chart_data = "";
    while ($row = mysqli_fetch_array($result)) {
        $Month[] = $row["month"];
        $Signed[] = $row["pap"];
    }
?>
<?php 
 
 $sql =
     "SELECT EXTRACT(MONTH FROM DateInstalled),MONTHNAME(DateInstalled) as month,COUNT(ClientID) as installed
     FROM papinstalled
     GROUP BY month,EXTRACT(MONTH FROM DateInstalled) order by EXTRACT(MONTH FROM DateInstalled) asc";
 $result = mysqli_query($connection, $sql);
 $chart_data = "";
 while ($row = mysqli_fetch_array($result)) {
     #$Month[] = $row["month"];
     $installed[] = $row["installed"];
 }
?>
<?php 
 
 $sql =
     "SELECT EXTRACT(MONTH FROM turnedonpap.DateTurnedOn),MONTHNAME(turnedonpap.DateTurnedOn) as month,COUNT(turnedonpap.ClientID) as pap
     FROM turnedonpap LEFT JOIN papdailysales on papdailysales.ClientID=turnedonpap.ClientID WHERE turnedonpap.ClientID is not null
     GROUP BY EXTRACT(MONTH FROM turnedonpap.DateTurnedOn),month order by EXTRACT(MONTH FROM turnedonpap.DateTurnedOn) asc";
 $result = mysqli_query($connection, $sql);
 $chart_data = "";
 while ($row = mysqli_fetch_array($result)) {
     #$Month[] = $row["month"];
     $turnedon[] = $row["pap"];
 }
?>
    <title>Dashboard</title>
</head>
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
                                    <div class="stat-icon ">
                                        <i class="pe-7s-check"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class=""><?php
                  $query =
                      "SELECT (SELECT count(*) from papdailysales as p left join papnotinstalled as r on p.ClientID=r.ClientID where r.ClientID is null)+(SELECT COUNT(*) as cccs from old) as clients";
                  $data = mysqli_query($connection, $query);
                  while ($row = mysqli_fetch_assoc($data)) {
                      echo $row["clients"] . "<br>";
                  }
                  ?></span></div>
                                            <div class="stat-heading">Signed</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-2">
                                        <i class="pe-7s-help1"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class=""><?php
                  $query =
                      "SELECT COUNT(*)as pending from papdailysales as p LEFT JOIN papinstalled as i on i.ClientID=p.ClientID left join papnotinstalled as r on r.ClientID=p.ClientID WHERE i.ClientID is null and r.ClientID is null";
                  $data = mysqli_query($connection, $query);
                  while ($row = mysqli_fetch_assoc($data)) {
                      echo $row["pending"] . "<br>";
                  }
                  ?></span></div>
                                            <div class="stat-heading">Pending Istallation</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                                            <div class="stat-text"><span class=""><?php
                  $query =
                      "SELECT COUNT(i.MacAddress) as pap FROM Token_teams as t LEFT JOIN papinstalled as i on t.Team_ID=i.Team_ID left join turnedonpap as o on i.ClientID=o.ClientID 
                      JOIN papdailysales as p on p.ClientID=i.ClientID WHERE i.ClientID is NOT null and o.ClientID is null";
                  $data = mysqli_query($connection, $query);
                  while ($row = mysqli_fetch_assoc($data)) {
                      echo $row["pap"] . "<br>";
                  }
                  ?></span></div>
                                            <div class="stat-heading">Installed</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-4">
                                        <i class="pe-7s-signal"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class=""><?php
                  $query = "SELECT ((SELECT count(*) from turnedonpap) + (SELECT COUNT(*) from old)) AS turnedon";
                  $data = mysqli_query($connection, $query);
                  while ($row = mysqli_fetch_assoc($data)) {
                      echo $row["turnedon"] . "<br>";
                  }
                  ?></span></div>
                                                  <div class="dropdown show">
                                <a class="" href="#" role="button" id="dropdownMenuLink"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Turned On
                                </a>

                                <div class="dropdown-menu bg-flat-color-4" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item " href="turnedon-g44.php">G44</a>
                                    <a class="dropdown-item" href="turnedon-zmm.php">ZMM</a>
                                    <a class="dropdown-item " href="turnedon-r&m.php">R&M</a>
                                    <a class="dropdown-item" href="turnedon-g45s.php">G45S</a>
                                    <a class="dropdown-item " href="turnedon-g45n.php">G45N</a>
                                    <a class="dropdown-item" href="turnedon-kwt.php">KWT</a>
                                    <a class="dropdown-item" href="turnedon-lsm.php">LSM</a>
                                    <a class="dropdown-item" href="turnedon-htr.php">HTR</a>
                                    <a class="dropdown-item" href="turnedon-stn.php">STN</a>
                                    <a class="dropdown-item" href="turnedon-mwk.php">MWK</a>
                                </div>

                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Widgets -->
                <!--  Traffic  -->
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card"> <div class="card-header">
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
                    <div class="col-lg-4"> <div class="card-header">
                           <center> <strong class="card-title">Turned on Per Region</strong></center>
                        </div>
                            <div class="card">
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
                           <center> <strong class="card-title">Monthly Pap Progress</strong></center>
                        </div>
                            <div class="card-body">
                                <h4 class="mb-3"></h4>
                                <canvas id="monthly-progress"></canvas>
                            </div>
                        </div>
                    </div><!-- /# column -->
        </div>
            </div>
            <!-- .animated -->
        </div>
        <!-- /.content -->
        <div class="clearfix"></div>

    </div>
    <!-- /#right-panel -->

    <!-- Scripts -->


    <script type="text/javascript">
$( document ).ready(function() {
$('#example').DataTable({
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        "scrollY":        "300px",
        "scrollCollapse": true
        });
});
</script>
    <!--Local Stuff-->
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
                    label: "Signed",
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
                    borderColor: "rgba(0, 194, 146, 0.9)",
                    borderWidth: "0",
                    backgroundColor: "#0cbeaf"
                            },
                {
                    label: "Installed",
                    data: [<?php
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
                    borderColor: "rgba(0,0,0,0.09)",
                    borderWidth: "0",
                    backgroundColor: "#ffb91f"
                            },
                            {
                    label: "Turned On",
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
           //doughut chart
    var ctx = document.getElementById( "doughutChart" );
    ctx.height = 250;
    var myChart = new Chart( ctx, {
        type: 'doughnut',
        data: {
            datasets: [ {
                data:<?php echo json_encode($Clients)?>,
                backgroundColor: [
                                   "#ee2c4e",
                                    "#ffb91f",
                                    "#0cbeaf",
                                    "#3072f5",
                                    "#C70039",
                                    "#85ce36",
                                    "#800080",
                                    "#09AB7A "
                                ],
                hoverBackgroundColor: [
                                    "#ee2c4e",
                                    "#ffb91f",
                                    "#0cbeaf",
                                    "#3072f5",
                                    "#C70039",
                                    "#85ce36",
                                    "#800080",
                                    "#09AB7A "
                                ]

                            } ],
            labels:<?php echo json_encode($Region)?>
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
                    borderColor: "#FFB91F",
                    borderWidth: "2",
                    backgroundColor: "transparent"
                            },
                {
                    label: "Installed",
                    data: <?php echo json_encode($installed)?>,
                    borderColor: "#0CBEAF",
                    borderWidth: "2",
                    backgroundColor: "transparent"
                            },
                {
                    label: "Turned On",
                    data: <?php echo json_encode($turnedon)?>,
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

    </script>

