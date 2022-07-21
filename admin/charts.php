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
    <title>Graphs and Charts</title>
        <!-- Content -->
        <div class="content">
            <div class="animated fadeIn">
                <div class="row">

                   <div class="col-lg-12">
                        <div class="card"> <div class="card-header">
                           <center> <strong class="card-title">Overall Pap Progress</strong></center>
                        </div>
                            <div class="card-body">
                                <h4 class="mb-3"></h4>
                                <canvas id="overall"></canvas>
                            </div>
                        </div>
                    </div><!-- /# column -->
                   
                    <div class="col-lg-6">
                        <div class="card"><div class="card-header">
                           <center> <strong class="card-title">SigningProgress</strong></center>
                        </div>
                            <div class="card-body">
                                <h4 class="mb-3"></h4>
                                <canvas id="signing"></canvas>
                            </div>
                        </div>
                    </div><!-- /# column -->

                    <div class="col-lg-6">
                        <div class="card"><div class="card-header">
                           <center> <strong class="card-title">Installation Progress</strong></center>
                        </div>
                            <div class="card-body">
                                <h4 class="mb-3"></h4>
                                <canvas id="installation"></canvas>
                            </div>
                        </div>
                    </div><!-- /# column -->

                    <div class="col-lg-6">
                        <div class="card"><div class="card-header">
                           <center> <strong class="card-title">Turned On Progress</strong></center>
                        </div>
                            <div class="card-body">
                                <h4 class="mb-3"></h4>
                                <canvas id="turnon"></canvas>
                            </div>
                        </div>
                   </div>
                    <div class="col-lg-6">
                            <div class="card"><div class="card-header">
                           <center> <strong class="card-title">Restituted</strong></center>
                        </div>
                                <div class="card-body">
                                    <h4 class="mb-3"> </h4>
                                    <canvas id="restituted"></canvas>
                                </div>
                            </div>
                     </div><!-- /# column -->
                     <div class="col-lg-6">
                        <div class="card"><div class="card-header">
                           <center> <strong class="card-title">Daily Signing Per Region</strong></center>
                        </div>
                            <div class="card-body">
                                <h4 class="mb-3"></h4>
                                <canvas id="signing/region"></canvas>
                            </div>
                        </div>
                   </div>
                    <div class="col-lg-6">
                            <div class="card"><div class="card-header">
                           <center> <strong class="card-title">Daily Installation Per Region</strong></center>
                        </div>
                                <div class="card-body">
                                    <h4 class="mb-3"> </h4>
                                    <canvas id="installation/region"></canvas>
                                </div>
                            </div>
                     </div><!-- /# column -->
                     <div class="col-lg-6">
                        <div class="card"><div class="card-header">
                           <center> <strong class="card-title">Daily Turnon Per Region</strong></center>
                        </div>
                            <div class="card-body">
                                <h4 class="mb-3"></h4>
                                <canvas id="turnon/region"></canvas>
                            </div>
                        </div>
                   </div>
                    <div class="col-lg-6">
                            <div class="card"><div class="card-header">
                           <center> <strong class="card-title">Daily Restitued Per Region</strong></center>
                        </div>
                                <div class="card-body">
                                    <h4 class="mb-3"> </h4>
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

    //bar chart
    var ctx = document.getElementById( "overall" );
     ctx.height = 90;
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
                    borderColor: "#0CBEAF",
                    borderWidth: "2",
                    backgroundColor: "transparent"
                            },
                {
                    label: "Restituted",
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
                    borderColor: "#EE2C4E",
                    borderWidth: "2",
                    backgroundColor: "transparent"
                            },
                {
                    label: "Installed",
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
                    borderColor: "#3972F5",
                    borderWidth: "2",
                    backgroundColor: "transparent"
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
