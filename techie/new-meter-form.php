<?php
include("../config/config.php");
include("session.php");

$url ="http://app.sasakonnect.net:19003/api/Meters/";

if(isset($_POST['submit'])){
    if(empty($url)){
        header("Location: new-meter-form.php");
    }
    else{
        header("Location: new-meter-form.php");
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
    <title>New Meter Report</title>
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
    <link rel="stylesheet" href="../assets/css/lib/chosen/chosen.min.css">
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <script>
      $(function () {

        $('form').on('submit', function (e) {

          e.preventDefault();

          $.ajax({
            type: 'POST',
            url: 'http://app.sasakonnect.net:19003/api/Meters/',
            data: $('form').serialize(),
            success: function () {
              alert('Form was submitted');
            }
          });

        });

      });
    </script>
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
                           
                        </div>
                        <div class="dropdown for-notification">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bell"></i>
                                <span class="count bg-danger"><?php
                                            $query="SELECT  COUNT(Token_teams.Team_ID)as MyTask from papdailysales LEFT JOIN techietask on techietask.ClientID=papdailysales.ClientID LEFT JOIN Token_teams ON Token_teams.Team_ID=techietask.TeamID  LEFT JOIN papinstalled ON papinstalled.ClientID=papdailysales.ClientID WHERE 
                                             techietask.ClientID is not null AND papinstalled.ClientID is null AND Token_teams.Team_ID='".$_SESSION['TeamID']."'";
                                             $data=mysqli_query($connection,$query);
                                             while($row=mysqli_fetch_assoc($data)){
                                             echo $row['MyTask']."<br><br>";
                                              }
                                              ?></span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="notification">
                               <hr> <p class="red">You have <?php
                                            $query="SELECT  COUNT(Token_teams.Team_ID)as MyTask from papdailysales LEFT JOIN techietask on techietask.ClientID=papdailysales.ClientID LEFT JOIN Token_teams ON Token_teams.Team_ID=techietask.TeamID  LEFT JOIN papinstalled ON papinstalled.ClientID=papdailysales.ClientID WHERE 
                                             techietask.ClientID is not null AND papinstalled.ClientID is null AND Token_teams.Team_ID='".$_SESSION['TeamID']."'";
                                             $data=mysqli_query($connection,$query);
                                             while($row=mysqli_fetch_assoc($data)){
                                             echo $row['MyTask'];
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
        <!-- Header-->

        <div class="content">
            <div class="animated fadeIn">


                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                            </div>
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center">New Meter Report</h3>
                                        </div>
                                        <hr>
                                        <?php
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
                                        <form> 
                                        <div class="form-group">
                                        <label for="x_card_code" class="control-label mb-1">Team ID</label>
                                        <div class="input-group">
                                        <input id="Techie_team" name="Techie_team" type="text" class="form-control cc-cvc" value="<?php echo $_SESSION['TeamID']?>"   placeholder="Team ID" readonly><br></br>
                                        </div>
                                        <div class="form-group">
                                        <label for="x_card_code" class="control-label mb-1">Contact Person<span style="color: #FF0000" >*</span></label>
                                        <div class="input-group">
                                        <input id="Contact_Person" name="Contact_Person" required type="text" class="form-control cc-cvc"   placeholder="Contact Person" ><br></br>
                                        </div>
                                        <div class="form-group">
                                        <label for="x_card_code" class="control-label mb-1">Phone Number<span style="color: #FF0000" >*</span></label>
                                        <div class="input-group">
                                        <input id="Contact_number" name="Contact_number" type="tel" pattern="[0-9]{10}" class="form-control cc-cvc" required   placeholder="Phone Number 07XXXXXXXX" ><br></br>
                                        </div>
                                        <div class="form-group">
                                            <label for="cc-number" class="control-label mb-1">Meter No<span style="color: #FF0000" >*</span></label>
                                            <input id="Meter_Number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==11) return false;"pattern="[0-9]{11}" name="Meter_Number" type="number" class="form-control cc-number identified visa"  data-val="true" required placeholder="Meter Number" > 
                                            </div>
                                                    <label for="x_card_code" class="control-label mb-1">Building Name<span style="color: #FF0000" >*</span></label>
                                                    <div class="input-group">
                                                        <input id="Cluster_name" name="Cluster_name" type="text" class="form-control cc-cvc"  placeholder="Building Name" required>
                                                    </div>
                                               
                                            <div class="form-group">
                                            <label for="cc-number" class="control-label mb-1">Region<span style="color: #FF0000" >*</span></label>
                                            <div class="form-group has-success">
                                            <select data-placeholder="Choose a Region..." class="standardSelect form-control" id="Region" name="Region" tabindex="1" required>
                                            <option ></option>
                                            <option disabled selected>Select Region</option>
                                             <option value="1">G44</option>
                                            <option value="2">RM</option>
                                           <option value="3">ZMM</option>
                                             <option value="4">G45S</option>
                                            <option value="5">G45N</option>
                                           <option value="6">KWT</option>
                                            <option value="7">LSM</option>  
                                           <option value="8">JACARANDA</option>
                                           <option value="11">HTR</option>  
                                              </select>
                                            </div>
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Termination Date<span style="color: #FF0000" >*</span></label>
                                                <input id="date_Installed" name="date_Installed" type="date" class="form-control cc-name valid" data-val="true" required autocomplete="cc-name" aria-invalid="false" aria-describedby="cc-name" required >
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="form-group">
                                            <label for="cc-number" class="control-label mb-1">Image<span style="color: #FF0000" >*</span></label>
                                            <input id="Meter_Picture" name="Meter_Picture" type="file" class="form-control cc-number identified visa"> 
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Suggestions/Observations/Comments</label>
                                                <input id="Comments" name="Comments" type="text" class="form-control cc-number identified visa" maxlength="40"  required placeholder="Suggestions/Observations/Comments">
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                            <a href="new-meter-form.php"> <button type="submit"  name="submit" class="btn btn-warning">
                                                    <span id="payment-button-amount">Submit</span>
                                                    <span id="payment-button-sending" style="display:none;">Sending…</span>
                                                </button></a>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div> <!-- .card -->

                    </div><!--/.col-->

            </div>


        </div><!-- .animated -->
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
<script src="../assets/js/lib/chosen/chosen.jquery.min.js"></script>

</body>
<script>
 var todayDate= new Date();
 var month= todayDate.getMonth() + 1;
 var year= todayDate.getFullYear();
 var todate=todayDate.getDate();
if(todate<10){
  todate= "0"+ todate;
}
if(month<10){
  month= "0"+ month;
}
maxdate= year +"-" + month + "-" + todate;
 document.getElementById("date_Installed").setAttribute("max",maxdate);
 </script>
 <script>
/*function myFunction() {
  alert("Data Submited");
  window.reload();
}


$(document).ready(function () {
  $("form").submit(function (event) {
    var formData = {
        Cluster_name: $("#Cluster_name").val(),
        Meter_Number: $("#Meter_Number").val(),
        Contact_number: $("#Contact_number").val(),
        date_Installed: $("#date_Installed").val(),
        Region: $("#Region").val(),
        Techie_team: $("#Techie_team").val(),
        Contact_Person: $("#Contact_Person").val(),
        Meter_Picture: $("#Meter_Picture").val(),
        Comments: $("#Comments").val(),
    };

    $.ajax({
      type: "POST",
      url: "test.php",
      data: formData,
      dataType: "json",
      encode: true,
    }).done(function (data) {
      console.log(data);
    });

    event.preventDefault();
  });
});*/
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<!--<script>
    function myFunction() {
    $('#mtr-form').submit(function (e) {
        e.preventDefault(); // avoid to execute the actual submit of the form.

        
        var form = $(this);
        var url = form.attr('action');
        
        $.ajax({
            type: "POST",
            url: url,
            data: form.serialize(), // serializes the form's elements.
            success: function(data)
            {
                alert("Submitted"); // show server response 
            }
        });
    });

    alert("The form was submitted");
}
</script>-->
</body>
</html>
