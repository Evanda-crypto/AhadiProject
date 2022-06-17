<?php
include("session.php");
include("../config/config.php");

if(isset($_POST["submit"])){
    $contact = trim($_POST["contact"]);

        $stmt = $connection->prepare("SELECT * FROM papdailysales WHERE ClientContact= ?");
        $stmt->bind_param("s", $contact);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        if ($stmt_result->num_rows > 0) {
            $data = $stmt_result->fetch_assoc();

            $_SESSION["success"] = "Pap Details";
            $cname = $data["ClientName"];
            $cont = $data["ClientContact"];
            $reg = $data["Region"];
            $bname = $data["BuildingName"];
            $bcode = $data["BuildingCode"];
            $status = $data["PapStatus"];
            $door = $data["Apt"];
            $floor = $data["Floor"];
        
            header("Location: get_all_paps_info.php");
        }
        else{
            $_SESSION["status"] = "Sorry no data matched your Search";
            header("Location: get_all_paps_info.php");
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
    <title>All Paps Info</title>
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
        <!-- Header-->

        <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                            <center><strong class="card-title">All Paps [<?php
         $query="SELECT (SELECT count(*) from papdailysales as p left join papnotinstalled as r on p.ClientID=r.ClientID where r.ClientID is null)+(SELECT COUNT(*) as cccs from old) as clients";
          $data=mysqli_query($connection,$query);
          while($row=mysqli_fetch_assoc($data)){
          echo $row['clients'];
    }
    ?> Records]</strong></center>
                            </div>
                            <div class="card-body"><br>  
                                <form method="POST" action="getpapinfo.php">
                            <div class="input-group">
  <input type="tel" pattern="[0-9]{10}" class="form-control rounded" autofocus autocomplete="off" name="contact" placeholder="Enter Contact to Search" required>
  <button type="submit" name="submit" class="btn btn-outline-primary">Search</button>
</div></form>
<?php
            if(isset($_SESSION['status'])){
                ?> <br></br>
               <center><strong><span> <div class="alert alert-danger" role="alert">
                   <?php echo $_SESSION['status'];
                unset($_SESSION['status']);?>
            
                 </div></span></center>
                 
                <?php
                
            }
            elseif(isset($_SESSION['success'])){
                ?><br></br>
                <center><strong><span><div class="alert alert-success" role="alert">
                   <?php echo $_SESSION['success']; unset($_SESSION['success']);?>

                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span></strong>
  </button>
                 </div></span></center>
                 <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Data</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Name</td>
      <td><?php echo $_SESSION['ClientName']; unset($_SESSION['ClientName']);?></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><?php echo $_SESSION['ClientContact']; unset($_SESSION['ClientContact']);?></td>
    </tr>
    <tr>
      <td>Champ</td>
      <td><?php echo $_SESSION['ChampName']; unset($_SESSION['ChampName']);?></td>
    </tr>
    <tr>
      <td>DateSigned</td>
      <td><?php echo $_SESSION['DateSigned']; unset($_SESSION['DateSigned']);?></td>
    </tr>
    <tr>
      <td>Building</td>
      <td><?php echo $_SESSION['BuildingName']; unset($_SESSION['BuildingName']);?></td>
    </tr>
    <tr>
      <td>Code</td>
      <td><?php echo $_SESSION['BuildingCode']; unset($_SESSION['BuildingCode']);?></td>
    </tr>
    <tr>
      <td>Region</td>
      <td><?php echo $_SESSION['Region']; unset($_SESSION['Reg']);?></td>
    </tr>
    <tr>
      <td>Door No.</td>
      <td><?php echo $_SESSION['Apt']; unset($_SESSION['Apt']);?></td>
    </tr>
    <tr>
      <td>Floor</td>
      <td><?php echo $_SESSION['Floor']; unset($_SESSION['Floor']);?></td>
    </tr>
    <tr>
      <td>Status</td>
      <td><?php echo $_SESSION['PapStatus']; unset($_SESSION['PapStatus']);?></td>
    </tr>
  </tbody>
</table>
                <?php
                
            }
            ?>
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
</body>
</html>
