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
    <title>Buildings | Ref</title>
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
                        <a href="#"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                    </li>
                    <li class="menu-title">ACTIVITIES</li><!-- /.menu-title -->
                    <li>
                        <a href="new-user.php" style="color:black; font-size: 15px;"> <i class="menu-icon ti-layout-grid3"></i>Create New User </a>
                    </li>
                    <li>
                        <a href="users.php" style="color:black; font-size: 15px;"> <i class="menu-icon ti-layout-grid3"></i>Users </a>
                    </li>
                    <li>
                        <a href="view-tl.php" style="color:black; font-size: 15px;"> <i class="menu-icon ti-layout-grid3"></i>View Tl </a>
                    </li>
                    <li>
                        <a href="buildings.php" style="color:black; font-size: 15px;"> <i class="menu-icon ti-layout-grid3"></i>Buildings </a>
                    </li>
                    <li>
                        <a href="completedtasks.php" style="color:black; font-size: 15px;"> <i class="menu-icon ti-layout-grid3"></i>Completed Tasks </a>
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
                 "superadmin"
             ]; ?> <?php echo $_SESSION["superadmin"]; ?></span>
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
                <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                            <center><strong class="card-title">Buildings[<?php
         $query="SELECT COUNT(*) as buildings FROM building";
          $data=mysqli_query($connection,$query);
          while($row=mysqli_fetch_assoc($data)){
          echo $row['buildings'];
    }
    ?> Records]</strong></center>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped" id="example">
                                    <thead>
                                        <tr>
                                          <th scope="col">B Name</th>
                                          <th scope="col">B Code</th>
                                          <th scope="col">Status</th>
                                          <th scope="col">Region</th>
                                          <th scope="col">Mtr No</th>
                                          <th scope="col">Champs(Sales)</th>
                                          <th scope="col">IAP</th>
                                          <th scope="col">OAP</th>
                                          <th scope="col">Shops</th>
                                          <th scope="col">Apt</th>
                                          <th scope="col">Change Status</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                  <?php
    
    $sql="SELECT * from buildings";
    $result=$connection->query($sql);
    while($row=$result->fetch_array()){
      ?>
      <tr>
        <td><a data-toggle="modal" data-target="#mediumModal" data-href="getbuild.php?id=<?php echo $row['id']; ?>" class="openPopup"><?php echo $row['bname']?></a></td>
        <td><a data-toggle="modal" data-target="#mediumModal" data-href="getbuild.php?id=<?php echo $row['id']; ?>" class="openPopup"><?php echo $row['bcode']?></a></td>
        <td><a data-toggle="modal" data-target="#mediumModal" data-href="getbuild.php?id=<?php echo $row['id']; ?>" class="openPopup"><?php echo $row['bstatus']?></a></td>
        <td><a data-toggle="modal" data-target="#mediumModal" data-href="getbuild.php?id=<?php echo $row['id']; ?>" class="openPopup"><?php echo $row['region']?></a></td>
        <td><a data-toggle="modal" data-target="#mediumModal" data-href="getbuild.php?id=<?php echo $row['id']; ?>" class="openPopup"><?php echo $row['mtrno']?></a></td>
        <td><a data-toggle="modal" data-target="#mediumModal" data-href="getbuild.php?id=<?php echo $row['id']; ?>" class="openPopup"><?php echo $row['champs_sales']?></a></td>
        <td><a data-toggle="modal" data-target="#mediumModal" data-href="getbuild.php?id=<?php echo $row['id']; ?>" class="openPopup"><?php echo $row['iap']?></a></td>
        <td><a data-toggle="modal" data-target="#mediumModal" data-href="getbuild.php?id=<?php echo $row['id']; ?>" class="openPopup"><?php echo $row['oap']?></a></td>
        <td><a data-toggle="modal" data-target="#mediumModal" data-href="getbuild.php?id=<?php echo $row['id']; ?>" class="openPopup"><?php echo $row['shops']?></a></td>
        <td><a data-toggle="modal" data-target="#mediumModal" data-href="getbuild.php?id=<?php echo $row['id']; ?>" class="openPopup"><?php echo $row['apt']?></a></td>
        <td>
       <button class="btn btn-warning"><a href="change-status.php?id=<?php echo $row['id']; ?>">Edit</i></a></button>
    </td>
    </tr>
    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

</div><!-- .content -->
    <!-- Modal -->

    <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="mediumModalLabel"></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div><!--end of modal--><!--End of modal-->
<div class="clearfix"></div>

</div><!-- /#right-panel -->

<!-- Right Panel -->
<script>
  $(document).ready(function(){
    $(document).on('click','.openPopup',function(){
        var dataURL = $(this).attr('data-href');
        $('.modal-body').load(dataURL,function(){
            $('#myModal').modal({show:true});
        });
    }); 
});
</script>
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

    <!--Local Stuff-->
<script>
 $(document).ready(function () {
$('#example').DataTable(
    {

        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        "scrollY":        "700px",
        "scrollCollapse": true,
        "pagingType": "full_numbers"
    }
);
$('.dataTables_length').addClass('bs-select');
});
</script>
<script>
$(document).ready(function(){
  $(document).on('click','.openPopup',function(){
        var dataURL = $(this).attr('data-href');
        $('.modal-body').load(dataURL,function(){
            $('#myModal').modal({show:true});
        });
    }); 
});
</script>
    
</body>
</html>
