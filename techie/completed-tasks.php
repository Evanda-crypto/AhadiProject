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
    <title>Completed | Tasks</title>
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

    <link href="https://cdn.datatables.net/datetime/1.1.2/css/dataTables.dateTime.min.css" rel="stylesheet"/>
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
  <script src="https://cdn.datatables.net/datetime/1.1.2/js/dataTables.dateTime.min.js"></script>

  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" integrity="sha512-PgQMlq+nqFLV4ylk1gwUOgm6CtIIXkKwaIHp/PAIWHzig/lKZSEGKEysh0TCVbHJXCLN7WetD8TFecIky75ZfQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<link href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css" rel="stylesheet">

<!-- Page level plugin JavaScript--<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>-->

<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>

</head>
<body style="background-color:#e1e1e1">
  <!-- Left Panel -->
  <!-- Left Panel -->
  <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="dashboard.php"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                    </li>
                    <li class="active">
                        <a href="mytask.php"><i class="menu-icon fa fa-tasks"></i>My Task</a>
                    </li>
                    <li class="active">
                        <a href="new-meter-form.php"><i class="menu-icon fa fa-lightbulb-o"></i>New Meter</a>
                    </li>
                    <li class="active">
                        <a href="completed-tasks.php"><i class="menu-icon fa fa-tasks"></i>Completed Tasks</a>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>PANEL APs</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="installed.php">Installed Today</a></li>
                            <li><i class="fa fa-table"></i><a href="not-turnedon.php">Offlines</a></li>
                            <li><i class="fa fa-table"></i><a href="restituted.php">Restituted</a></li>
                        </ul>
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
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bell"></i>
                                <span class="count bg-danger"><?php
                                $query =
                                    "SELECT  COUNT(Token_teams.Team_ID)as MyTask from papdailysales LEFT JOIN techietask on techietask.ClientID=papdailysales.ClientID LEFT JOIN Token_teams ON Token_teams.Team_ID=techietask.TeamID  LEFT JOIN papinstalled ON papinstalled.ClientID=papdailysales.ClientID WHERE 
                                             techietask.ClientID is not null AND papinstalled.ClientID is null AND Token_teams.Team_ID='" .
                                    $_SESSION["TeamID"] .
                                    "'";
                                $data = mysqli_query($connection, $query);
                                while ($row = mysqli_fetch_assoc($data)) {
                                    echo $row["MyTask"] . "<br><br>";
                                }
                                ?></span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="notification">
                               <hr> <p class="red">You have <?php
                               $query =
                                   "SELECT  COUNT(Token_teams.Team_ID)as MyTask from papdailysales LEFT JOIN techietask on techietask.ClientID=papdailysales.ClientID LEFT JOIN Token_teams ON Token_teams.Team_ID=techietask.TeamID  LEFT JOIN papinstalled ON papinstalled.ClientID=papdailysales.ClientID WHERE 
                                             techietask.ClientID is not null AND papinstalled.ClientID is null AND Token_teams.Team_ID='" .
                                   $_SESSION["TeamID"] .
                                   "'";
                               $data = mysqli_query($connection, $query);
                               while ($row = mysqli_fetch_assoc($data)) {
                                   echo $row["MyTask"];
                               }
                               ?> Tasks</p></hr>
                                <a class="dropdown-item media" href="mytask.php">
                                    <i class="fa fa-check"></i>
                                    <p>Check Out</p>
                                </a>
                            </div>
                        </div>
                        <div class="dropdown for-message">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="message" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-user"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="message">
                                <center><p class="red">Account Information</p></center>
                                <a class="dropdown-item media" href="#">
                                    <div class="message media-body">
                                       <center> <span class="name"><?php echo $_SESSION['TeamID']?></span></center>
                                    </div>
                                </a>
                                <a class="dropdown-item media" href="#">
                                    <span class="photo media-left"><img alt="avatar" src="../images/avatar/images.jpg"></span>
                                    <div class="message media-body">
                                        <strong><span class="name float-left">Techie 1</span></strong>
                                        <center> <span class="name float-left"><?php echo $_SESSION['Techie1']?></span> </center>
                                        
                                    </div>
                                </a>
                                <a class="dropdown-item media" href="#">
                                    <span class="photo media-left"><img alt="avatar" src="../images/avatar/images.jpg"></span>
                                    <div class="message media-body">
                                        <strong><span class="name float-left">Techie 2</span></strong>
                                        <center><span class="name float-left"><?php echo $_SESSION['Techie2']?></span> </center>
                                        
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="name float-left"><?php echo $_SESSION[
                            "TeamID"
                        ]; ?></span>
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="../config/logout.php"><i class="fa fa-power -off"></i>Logout</a>
                        </div>
                    </div>

                </div>
            </div>
        </header>
        <!-- /#header -->
        <!-- /#header -->
        <!-- Header-->

        <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                            <center><strong class="card-title">Completed Tasks</strong></center>
                            </div>
                            <div class="table-responsive">
        <table border="0" cellspacing="5" cellpadding="5">
        <tbody><tr>
            <td>Start date:</td>
            <td><input type="text" id="min" placeholder="Start Date" style="color:red;" class="form-control" name="min"></td>
        </tr>
        <tr>
            <td>End date:</td>
            <td><input type="text" id="max" placeholder="End Date"  class="form-control" name="max"></td>
        </tr>
    </tbody></table>
                        </div>
                            <div class="card-body" id="payment">
                            
                                <table class="table table-striped" id="example">
                                    <thead>
                                        <tr>
                                        <th scope="th-sm">Techie 1</th>
                                        <th scope="th-sm">Techie 2</th>
                                        <th scope="th-sm">Techie 3</th>
                                        <th scope="th-sm">Date</th>
                                        <th scope="th-sm">Amount[1 Techie]</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                  <?php
                                  $query = 
                                      "SELECT i.ClientID,i.Team_ID,i.DateInstalled,t.Techie1,t.Techie2,t.Techie3,FLOOR(300/i.split) as amount,
                                      p.Region,i.DateInstalled FROM papdailysales as p left join papinstalled as i ON i.ClientID=p.ClientID left join Token_teams as t on t.Team_ID=i.Team_ID WHERE i.DateInstalled >= DATE_SUB(CURDATE(), INTERVAL 35 DAY)";
                                 $result  = mysqli_query($connection, $query);
                                  while ($row = mysqli_fetch_assoc($result)) {
                            
                                    ?>
                                            <tr>
                                            <td><a data-toggle="modal" data-target="#mediumModal" data-href="gettaskinfo.php?id=<?php echo $row['ClientID']; ?>" class="openPopup"><?php echo $row['Techie1']; ?></a></td>
                                            <td><a data-toggle="modal" data-target="#mediumModal" data-href="gettaskinfo.php?id=<?php echo $row['ClientID']; ?>" class="openPopup"><?php echo $row['Techie2']; ?></a></td>
                                                <td><a data-toggle="modal" data-target="#mediumModal" data-href="gettaskinfo.php?id=<?php echo $row['ClientID']; ?>" class="openPopup"><?php echo $row['Techie3']; ?></a></td>
                                                <td><a data-toggle="modal" data-target="#mediumModal" data-href="gettaskinfo.php?id=<?php echo $row['ClientID']; ?>" class="openPopup"><?php echo $row['DateInstalled']; ?></a></td>
                                                <td><?php echo $row['amount']; ?></td>
                                               
                                            </tr>
                                    <?php
            
                                        }
                                
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- Modal -->
<!-- Button trigger modal -->

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
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div><!--end of modal-->
</div><!--End of modal-->
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

<script>
      
      $.fn.dataTable.Api.register( 'column().data().sum()', function () {
    return this.reduce( function (a, b) {
        var x = parseFloat( a ) || 0;
        var y = parseFloat( b ) || 0;
        return x + y;
    } );
} );
 
var minDate, maxDate;
 
 // Custom filtering function which will search data in column four between two values
 $.fn.dataTable.ext.search.push(
     function( settings, data, dataIndex ) {
         var min = minDate.val();
         var max = maxDate.val();
         var date = new Date( data[3] );
  
         if (
             ( min === null && max === null ) ||
             ( min === null && date <= max ) ||
             ( min <= date   && max === null ) ||
             ( min <= date   && date <= max )
         ) {
             return true;
         }
         return false;
     }
 );
  
/* Init the table and fire off a call to get the hidden nodes. */
$(document).ready(function() {
    // Create date inputs
    minDate = new DateTime($('#min'), {
         format: 'MMMM Do YYYY'
     });
     maxDate = new DateTime($('#max'), {
         format: 'MMMM Do YYYY'
     });

     // Refilter the table
     $('#min, #max').on('change', function () {
         table.draw();
     });
    var table = $('#example').DataTable(
        {
          "lengthMenu": [[5, 25, 50, -1], [5, 25, 50, "All"]],
          "scrollY":        "500px",
        "scrollCollapse": true
        }
    );
    
 
    $('<button class="btn btn-success" style="margin-bottom:10px; margin-left:70px;">Calculate</button>')
        .prependTo( '#payment' )
        .on( 'click', function () {
            alert( 'Total Amount: '+ 'Ksh ' + table.column( 4, {page:'current'} ).data().sum() );
        } );
} );
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
