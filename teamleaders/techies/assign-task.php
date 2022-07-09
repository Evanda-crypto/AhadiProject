<?php
include("session.php");
include("../../config/config.php");

?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Pending | Installation</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="../../assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="../../assets/css/style.css">

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
    .future {
  color: green;
}

.violet {
  color: violet;
}
.tommorrow{
    color:blue;
}.orange{
    color:orange;
}
.today{
    color:red;
}
input.ch1{
   width: 17px;
   height: 17px;
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
        <!-- Header-->

        <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                            <center><strong class="card-title">Pending Installation[<?php
         $query="SELECT COUNT(*) as paps from 
         papdailysales as p
         WHERE p.PapStatus='Signed' and p.Region='".$_SESSION['Region']."'";
          $data=mysqli_query($connection,$query);
          while($row=mysqli_fetch_assoc($data)){
          echo $row['paps'];
    }
    ?> Records]</strong></center>
                            </div>
                            <div class="card-body">  <?php
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
            <form method="POST" action="assign_multiple.php">
            <div align="right"><div class="modal-footer"> <div class="form-group">
                                                        <input id="teamid" name="teamid" type="text" class="form-control cc-exp" autofocus onkeyup="GetDetail(this.value)" value="<?php echo $_SESSION['Region']?>-"data-val="true" data-val-required="Please enter the card expiration" data-val-cc-exp="Please enter a valid month and year" placeholder="Team ID">
                                                        <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
                                                    </div>

                                                    <div class="form-group">
                                                        <input id="members" name="members" type="number" class="form-control cc-exp" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==1) return false;" required placeholder="Enter number of team members 2-3">
                                                        <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
                                                    </div></p>
                            <p align="right"> <input class="btn btn-success" style="margin-left:20px;" type="submit" name="task" onClick="return confirm('Sure to assign selected tasks?')"  value="Assign Selected"></p></div></div>
                           
                                <table class="table table-striped" id="example">
                                    <thead>
                                        <tr>
                     <th>Building Name</th>
                     <th>Building Code</th>
                     <th>Door No</th>
                    <th>Champ</th>
                     <th>Client Name</th>
                     <th>Client Contact</th>
                     <th>Date Signed</th>
                     <th>Availability</th>
                     <th>Champs Comment</th>
                     <th>Check</th>
                     <th>More</th>
                                     
                                         </tr>
                                  </thead>
                                  <tbody>
<?php
                        $query  = "SELECT p.ClientID,p.ClientName,p.Apt,p.ClientContact,p.ClientAvailability,p.Note,p.BuildingName,p.BuildingCode,p.ChampName,p.updated_at,p.PapStatus from 
                        papdailysales as p
                        WHERE p.PapStatus='Signed' and p.Region='".$_SESSION['Region']."'";
                        $result  = mysqli_query($connection, $query);

                            while ($row = mysqli_fetch_array($result)) {
                            
                        ?>
                                <tr>
                                    <td><?php echo $row['BuildingName']; ?></td>
                                    <td><?php echo $row['BuildingCode']; ?></td>
                                    <td><?php echo $row['Apt']; ?></td>
                                    <td><?php echo $row['ChampName']; ?></td>
                                    <td><?php echo $row['ClientName']; ?></td>
                                    <td><?php echo $row['ClientContact']; ?></td>
                                    <td><?php echo $row['updated_at']; ?></td>
                                    <td class="centered colorText"><?php echo $row['ClientAvailability']; ?></td>
                                    <td><?php echo $row['Note']; ?></td>
                                    <td><input class="ch1" type="checkbox" name="check[]" value="<?php echo $row['ClientID']?>"></td>
                                    <td><button class="btn btn-warning" ><a href="techie-task.php?client-id=<?php echo $row['ClientID']; ?>" class="text-bold">Assign Task</a></button></td>
                                </tr>
                        <?php

                            }
                    
                        ?>
                                </tbody>
                            </table>
                        </form>
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
<script src="../../assets/js/main.js"></script>


<script>
 $(document).ready(function () {
$('#example').DataTable(
    {
        order: [[7, 'asc']],
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        "scrollY":        "700px",
        "scrollCollapse": true,
        "pagingType": "full_numbers"
    }
);
$('.dataTables_length').addClass('bs-select');
});


window.addEventListener('DOMContentLoaded', (event) => {
  var els = document.querySelectorAll('.colorText');
  els.forEach(function(cell) {
    if (cell.textContent > "<?php echo date("Y-m-d", strtotime("+1 days")); ?>") {
      cell.classList.toggle('future');
    }
    if (cell.textContent === "<?php echo date("Y-m-d", strtotime("+1 days")); ?>") {
      cell.classList.toggle('tommorrow');
    }
    if (cell.textContent === "<?php echo date("Y-m-d"); ?>" || cell.textContent < "<?php echo date("Y-m-d"); ?>") {
      cell.classList.toggle('today');
      cell.classList.toggle('glow');
    }
  })
})
</script>

<script>

// onkeyup event will occur when the user
// release the key and calls the function
// assigned to this event
function GetDetail(str) {
  if (str.length == 0) {
    document.getElementById("teamid").value = "";
    return;
  }
  else {

    // Creates a new XMLHttpRequest object
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {

      // Defines a function to be called when
      // the readyState property changes
      if (this.readyState == 4 &&
          this.status == 200) {
        
        // Typical action to be performed
        // when the document is ready
        var myObj = JSON.parse(this.responseText);

        // Returns the response data as a
        // string and store this array in
        // a variable assign the value
        // received to first name input field
        
        document.getElementById
          ("members").value = myObj[0];
      }
    };

    // xhttp.open("GET", "filename", true);
    xmlhttp.open("GET", "retrieve.php?teamid=" + str, true);
    
    // Sends the request to the server
    xmlhttp.send();
  }
}
</script>
</body>
</html>
