<?php
include("session.php");
include("../../config/config.php");

?>
<?php 
 
 $sql =
     "SELECT EXTRACT(MONTH FROM DateInstalled),MONTHNAME(DateInstalled) as month,COUNT(ClientID) as installed
     FROM papinstalled WHERE Region='".$_SESSION['Region']."'
     GROUP BY month,EXTRACT(MONTH FROM DateInstalled) order by EXTRACT(MONTH FROM DateInstalled) asc";
 $result = mysqli_query($connection, $sql);
 $chart_data = "";
 while ($row = mysqli_fetch_array($result)) {
     $Month[] = $row["month"];
     $Installed[] = $row["installed"];
 }
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="refresh" content="300">
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
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
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
                    <li class="menu-title">ACTIVITIES</li><!-- /.menu-title -->
                    <li>
                        <a href="create-team.php" style="color:black; font-size: 15px;"> <i class="menu-icon ti-layout-grid3"></i>Create New Team </a>
                    </li>
                    <li>
                        <a href="assign-task.php" style="color:black; font-size: 15px;"> <i class="menu-icon ti-layout-grid3"></i>Assign Task [Signed] </a>
                    </li>
                    <li>
                        <a href="restored.php" style="color:black; font-size: 15px;"> <i class="menu-icon ti-layout-grid3"></i>Assign Task [Restored] </a>
                    </li>
                    <li>
                        <a href="reasign-task.php" style="color:black; font-size: 15px;"> <i class="menu-icon ti-layout-grid3"></i>Reasign Task</a>
                    </li>
                    <li>
                        <a href="reminders.php" style="color:black; font-size: 15px;"> <i class="menu-icon ti-layout-grid3"></i>Reminders</a>
                    </li>
                    <li>
                        <a href="rejected-meters.php" style="color:black; font-size: 15px;"> <i class="menu-icon ti-layout-grid3"></i>Rejected Meters</a>
                    </li>
                    <li class="menu-title">PANEL APS</li><!-- /.menu-title -->

                    <li>
                        <a href="installed.php" style="color:black; font-size: 15px;"> <i class="menu-icon ti-layout-grid3"></i>Installed</a>
                    </li>
                    <li>
                        <a href="restituted.php" style="color:black; font-size: 15px;"> <i class="menu-icon ti-layout-grid3"></i>Restituted </a>
                    </li>
                    <li>
                        <a href="turned-on.php" style="color:black; font-size: 15px;"> <i class="menu-icon ti-layout-grid3"></i>Turned On</a>
                    </li>  
                    <li>
                        <a href="retrieved_paps.php" style="color:black; font-size: 15px;"> <i class="menu-icon ti-layout-grid3"></i>Retrieved</a>
                    </li>
                    <li class="menu-title" >COMPLETED TASKS</li><!-- /.menu-title --> 
                    <li>
                        <a href="completed-tasks.php" style="color:black; font-size: 15px;"> <i class="menu-icon ti-layout-grid3"></i>Completed Tasks </a>
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
         $query="SELECT COUNT(*) as restituted FROM papnotinstalled WHERE   Region='".$_SESSION['Region']."'";
          $data=mysqli_query($connection,$query);
          while($row=mysqli_fetch_assoc($data)){
          echo $row['restituted'];
    }
    ?></span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="notification">
                                <p class="red">You have <?php
         $query="SELECT COUNT(*) as restituted FROM papnotinstalled WHERE   Region='".$_SESSION['Region']."'";
          $data=mysqli_query($connection,$query);
          while($row=mysqli_fetch_assoc($data)){
          echo $row['restituted'];
    }
    ?> Restitute(s)</p>
                                <a class="dropdown-item media" href="restituted.php">
                                    <i class="fa fa-check"></i>
                                    <p>Check Out.</p>
                                </a>
                            </div>
                        </div>
                        <div class="dropdown for-message">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="message" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-envelope"></i>
                                <span class="count bg-primary"><?php
                                             $query="SELECT COUNT(*) AS reminded from reminders Where Region='".$_SESSION['Region']."'";
                                             $data=mysqli_query($connection,$query);
                                             while($row=mysqli_fetch_assoc($data)){
                                             echo $row['reminded']."<br><br>";
                                              }
                                              ?></span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="message">
                                <p class="red">You have <?php
                                             $query="SELECT COUNT(*) AS reminded from reminders Where Region='".$_SESSION['Region']."'";
                                             $data=mysqli_query($connection,$query);
                                             while($row=mysqli_fetch_assoc($data)){
                                             echo $row['reminded'];
                                              }
                                              ?> Pap to urgently assign</p>
                                <a class="dropdown-item media" href="reminders.php">
                                    <div class="message media-body">
                                        <span class="name float-left">Check Out</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="dropdown for-message">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="message" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-question"></i>
                                <span class="count bg-primary"><?php
                                             $query="SELECT ((SELECT COUNT(*) from 
                                             papdailysales as p
                                             WHERE p.PapStatus='Signed' and p.Region='".$_SESSION['Region']."')+(SELECT COUNT(*) from 
         papdailysales as p
         WHERE p.PapStatus='Restored' and p.Region='".$_SESSION['Region']."')) as pending";
                                             $data=mysqli_query($connection,$query);
                                             while($row=mysqli_fetch_assoc($data)){
                                             echo $row['pending'];
                                              }
                                              ?></span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="message">
                                <p class="red">You have <?php
                                             $query="SELECT ((SELECT COUNT(*) from 
                                             papdailysales as p
                                             WHERE p.PapStatus='Signed' and p.Region='".$_SESSION['Region']."')+(SELECT COUNT(*) from 
         papdailysales as p
         WHERE p.PapStatus='Restored' and p.Region='".$_SESSION['Region']."')) as pending";
                                             $data=mysqli_query($connection,$query);
                                             while($row=mysqli_fetch_assoc($data)){
                                             echo $row['pending'];
                                              }
                                              ?> pending installations</p>
                                <a class="dropdown-item media" href="assign-task.php">
                                    <div class="message media-body">
                                        <span class="name float-left">Check Out</span>
                                    </div>
                                </a>
                            </div>
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
                                    <div class="stat-icon dib flat-color-2">
                                        <i class="pe-7s-help1"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><?php
                                             $query="SELECT ((SELECT COUNT(*) from 
                                             papdailysales as p
                                             WHERE p.PapStatus='Signed' and p.Region='".$_SESSION['Region']."')+(SELECT COUNT(*) from 
         papdailysales as p
         WHERE p.PapStatus='Restored' and p.Region='".$_SESSION['Region']."')) as pending";
                                             $data=mysqli_query($connection,$query);
                                             while($row=mysqli_fetch_assoc($data)){
                                             echo $row['pending'];
                                              }
                                              ?></span></div>
                                               <div class="dropdown show">
                                <a class="" href="#" role="button" id="dropdownMenuLink"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Pending Installation
                                </a>

                                <div class="dropdown-menu bg-flat-color-2" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item " href="assign-task.php">Newly Signed</a>
                                    <a class="dropdown-item" href="restored.php">Restored</a>
                                </div>

                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6"><a href="installed.php">
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
                      "SELECT COUNT(papinstalled.MacAddress) as pap FROM Token_teams LEFT JOIN papinstalled on Token_teams.Team_ID=papinstalled.Team_ID left join turnedonpap on papinstalled.ClientID=turnedonpap.ClientID JOIN papdailysales on papdailysales.ClientID=papinstalled.ClientID WHERE papinstalled.ClientID is NOT null and turnedonpap.ClientID is null and papdailysales.Region='".$_SESSION['Region']."'";
                  $data = mysqli_query($connection, $query);
                  while ($row = mysqli_fetch_assoc($data)) {
                      echo $row["pap"] . "<br><br>";
                  }
                  ?></span></div>
                                            <div class="stat-heading">Installed[<?php echo $_SESSION['Region']?>]</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div></a>
                    </div>
                    <div class="col-lg-3 col-md-6"><a href="turned-on.php">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon ">
                                        <i class="pe-7s-signal"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><?php
                                             $query="SELECT COUNT(*) as turnedon from turnedonpap where Region='".$_SESSION['Region']."'";
                                             $data=mysqli_query($connection,$query);
                                             while($row=mysqli_fetch_assoc($data)){
                                             echo $row['turnedon']."<br><br>";
                                              }
                                              ?></span></div>
                                            <div class="stat-heading">Turned On[<?php echo $_SESSION['Region']?>]</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div></a>
                    </div>
           

                    <div class="col-lg-3 col-md-6"><a href="restituted.php">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-4">
                                        <i class="pe-7s-refresh-2"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><?php
                                             $query="SELECT COUNT(*) AS restituted from papnotinstalled Where   Region='".$_SESSION['Region']."'";
                                             $data=mysqli_query($connection,$query);
                                             while($row=mysqli_fetch_assoc($data)){
                                             echo $row['restituted']."<br><br>";
                                              }
                                              ?> </span></div>
                                            <div class="stat-heading">Restituted[<?php echo $_SESSION['Region']?>]</div>
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
                           <center> <strong class="card-title">Daily Installation Per Team</strong></center>
                        </div>
                    <div class="card-body">
                    <table class="table table-striped" id="completed">
                                <thead>
                                    <tr>
                                    <th>No</th>
                    <th>Team ID</th>
                    <th>Techie 1</th>
                    <th>Techie 2</th>
                    <th>Techie 3</th>
                    <th>Installed Today</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                      $query  = "SELECT papinstalled.Team_ID,COUNT(papinstalled.Team_ID) as installed,Token_teams.Team_ID,Token_teams.Techie1,Token_teams.Techie2,Token_teams.Techie3 from 
                      papinstalled left join Token_teams on Token_teams.Team_ID=papinstalled.Team_ID WHERE papinstalled.DateInstalled=CURRENT_DATE() and papinstalled.Region='".$_SESSION['Region']."' GROUP BY papinstalled.Team_ID order by installed DESC";
                        $result  = mysqli_query($connection, $query);

                        $num_rows  = mysqli_num_rows($result);

                        $num = 0;
                        if ($num_rows > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $num++;
                        ?>
                                <tr>
                                    <td><?php echo $num; ?></td>
                                    <td><?php echo $row['Team_ID']; ?></td>
                                    <td><?php echo $row['Techie1']; ?></td>
                                    <td><?php echo $row['Techie2']; ?></td>
                                    <td><?php echo $row['Techie3']; ?></td>
                                    <td><?php echo $row['installed']; ?></td>
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
                           <center> <strong class="card-title">Pending Tasks Per Team</strong></center>
                        </div>
                    <div class="card-body">
                    <div class="table-responsive">
                                    <table class="table table-striped" id="pending">
                                        <thead>
                                            <tr>
                                            <th scope="col">Team ID</th>
                                            <th scope="col">Techie 1</th>
                                            <th scope="col">Techie 2</th>
                                            <th scope="col">Techie 3</th>
                                            <th scope="col">Pending Tasks</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
    
    $sql="SELECT techietask.TeamID, COUNT(techietask.TeamID) as tasks,Token_teams.Techie1,Token_teams.Techie2,Token_teams.Techie3 FROM techietask left join papinstalled on papinstalled.ClientID=techietask.ClientID
    left join Token_teams on techietask.TeamID=Token_teams.Team_ID WHERE papinstalled.ClientID is null and techietask.Region='".$_SESSION['Region']."' 
    GROUP BY techietask.TeamID HAVING COUNT(techietask.TeamID)>1 OR COUNT(techietask.TeamID)=1";
$result=$connection->query($sql);
while($row=$result->fetch_array()){
  ?>
  <tr>
    <td><?php echo $row['TeamID']?></td>
    <td><?php echo $row['Techie1']?></td>
    <td><?php echo $row['Techie2']?></td>
    <td><?php echo $row['Techie3']?></td>
   <td><?php echo $row['tasks']?></td>
</tr>
<?php } ?>
                                    </tbody>
                                    </table>
                                </div></div></div></div>
                            
            <!-- .animated -->
        </div>
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
$('#completed').DataTable({
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
<script type="text/javascript">
$( document ).ready(function() {
$('#pending').DataTable({
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
                    label: "All Regions",
                    data: [ <?php
                  $query =
                      "SELECT count(*) as installed from papinstalled Where DateInstalled=DATE_SUB(CURDATE(), INTERVAL 6 DAY)";
                  $data = mysqli_query($connection, $query);
                  while ($row = mysqli_fetch_assoc($data)) {
                      echo $row["installed"];
                  }
                  ?>, <?php
                  $query =
                      "SELECT count(*) as installed from papinstalled Where DateInstalled=DATE_SUB(CURDATE(), INTERVAL 5 DAY)";
                  $data = mysqli_query($connection, $query);
                  while ($row = mysqli_fetch_assoc($data)) {
                      echo $row["installed"];
                  }
                  ?>,  <?php
                  $query =
                      "SELECT count(*) as installed from papinstalled Where DateInstalled=DATE_SUB(CURDATE(), INTERVAL 4 DAY)";
                  $data = mysqli_query($connection, $query);
                  while ($row = mysqli_fetch_assoc($data)) {
                      echo $row["installed"];
                  }
                  ?>,  <?php
                  $query =
                      "SELECT count(*) as installed from papinstalled Where DateInstalled=DATE_SUB(CURDATE(), INTERVAL 3 DAY)";
                  $data = mysqli_query($connection, $query);
                  while ($row = mysqli_fetch_assoc($data)) {
                      echo $row["installed"];
                  }
                  ?>,  <?php
                  $query =
                      "SELECT count(*) as installed from papinstalled Where DateInstalled=DATE_SUB(CURDATE(), INTERVAL 2 DAY)";
                  $data = mysqli_query($connection, $query);
                  while ($row = mysqli_fetch_assoc($data)) {
                      echo $row["installed"];
                  }
                  ?>, <?php
                  $query =
                      "SELECT count(*) as installed from papinstalled Where DateInstalled=DATE_SUB(CURDATE(), INTERVAL 1 DAY)";
                  $data = mysqli_query($connection, $query);
                  while ($row = mysqli_fetch_assoc($data)) {
                      echo $row["installed"];
                  }
                  ?>,  <?php
                  $query =
                      "SELECT count(*) as installed from papinstalled Where DateInstalled=CURDATE()";
                  $data = mysqli_query($connection, $query);
                  while ($row = mysqli_fetch_assoc($data)) {
                      echo $row["installed"];
                  }
                  ?> ],
                    borderColor: "rgba(0, 194, 146, 0.9)",
                    borderWidth: "0",
                    backgroundColor: "#85ce36"
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
?>" ],
                    borderColor: "rgba(0,0,0,0.09)",
                    borderWidth: "0",
                    backgroundColor: "#FFB91F"
                            },
                {
                    label: "My Region",
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
    ctx.height = 255;
    var myChart = new Chart( ctx, {
        type: 'doughnut',
        data: {
            datasets: [ {
                data: [<?php if (!$connection) {
                    echo "Problem in database connection! Contact administrator!" .
                        mysqli_error();
                } else {
                    $sql =
                        "SELECT COUNT(techietask.ClientID) as assigned FROM  techietask LEFT JOIN papinstalled ON papinstalled.ClientID=techietask.ClientID left join papdailysales on papdailysales.ClientID=techietask.ClientID WHERE papinstalled.ClientID is null and papdailysales.Region='" .
                        $_SESSION["Region"] .
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
                        "SELECT COUNT(*) as restituted FROM papnotinstalled WHERE   Region='".$_SESSION['Region']."'";
                    $result = mysqli_query($connection, $sql);
                    $chart_data = "";
                    while ($torestore = mysqli_fetch_assoc($result)) {
                        echo $torestore["restituted"];
                    }
                } ?>, <?php if (!$connection) {
                    echo "Problem in database connection! Contact administrator!" .
                        mysqli_error();
                } else {
                    $sql =
                        " SELECT COUNT(papinstalled.ClientID) as installed FROM papinstalled LEFT JOIN turnedonpap ON turnedonpap.ClientID=papinstalled.ClientID LEFT JOIN papdailysales ON papdailysales.ClientID=papinstalled.ClientID WHERE turnedonpap.ClientID is null and papdailysales.Region='" .
                        $_SESSION["Region"] .
                        "'";
                    $result = mysqli_query($connection, $sql);
                    $chart_data = "";
                    while ($installed = mysqli_fetch_assoc($result)) {
                        echo $installed["installed"];
                    }
                } ?>],
                backgroundColor: [
                                    "#EE2C4E",
                                    "#FFB91F",
                                    "#0CBEAF"
                                   
                                ],
                hoverBackgroundColor: [
                                    "#EE2C4E",
                                    "#FFB91F",
                                    "#0CBEAF"
                                    
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
        //Installation chart
    var ctx = document.getElementById( "monthly-progress" );
    ctx.height = 90;
    var myChart = new Chart( ctx, {
        type: 'line',
        data: {
            labels:<?php echo json_encode($Month)?>,
            datasets: [
                {
                    label: "Installed : <?php echo $_SESSION['Region']?>",
                    data: <?php echo json_encode($Installed)?>,
                    borderColor: "#3072f5",
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
