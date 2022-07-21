<?php
include("links.php");
include "session.php";
include "../config/config.php";
date_default_timezone_set("Africa/Nairobi");
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Developers Report</title>
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
    <script src="https://cdn.ckeditor.com/4.19.0/standard-all/ckeditor.js"></script>

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
                    <li class="menu-title" >DOCUMENTATION</li><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" style="color:black; font-size: 15px;"class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>KCIS</a>
                        <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon ti-list"></i><a href="new_building.php" style="color:black; font-size: 15px;">New Building Report</a></li>
                        <li><i class="fa fa-table"></i><a href="r&m.php" style="color:black; font-size: 15px;">R&M</a></li>
                            <li><i class="fa fa-table"></i><a href="zmm.php" style="color:black; font-size: 15px;">ZMM</a></li>
                            <li><i class="fa fa-table"></i><a href="g44.php" style="color:black; font-size: 15px;">G44</a></li>
                            <li><i class="fa fa-table"></i><a href="g45s.php" style="color:black; font-size: 15px;">G45S</a></li>
                            <li><i class="fa fa-table"></i><a href="g45n.php" style="color:black; font-size: 15px;">G45N</a></li>
                            <li><i class="fa fa-table"></i><a href="kwt.php" style="color:black; font-size: 15px;">KWT</a></li>
                            <li><i class="fa fa-table"></i><a href="lsm.php" style="color:black; font-size: 15px;">LSM</a></li>
                            <li><i class="fa fa-table"></i><a href="htr.php" style="color:black; font-size: 15px;">HTR</a></li></ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" style="color:black; font-size: 15px;"class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>IP DOCUMENT</a>
                        <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon ti-list"></i><a href="new_ip_entry.php" style="color:black; font-size: 15px;">New Entry</a></li>
                        <li><i class="fa fa-table"></i><a href="r&m_ip.php" style="color:black; font-size: 15px;">R&M</a></li>
                            <li><i class="fa fa-table"></i><a href="zmm_ip.php" style="color:black; font-size: 15px;">ZMM</a></li>
                            <li><i class="fa fa-table"></i><a href="g44_ip.php" style="color:black; font-size: 15px;">G44</a></li>
                            <li><i class="fa fa-table"></i><a href="g45s_ip.php" style="color:black; font-size: 15px;">G45S</a></li>
                            <li><i class="fa fa-table"></i><a href="g45n1_ip.php" style="color:black; font-size: 15px;">G45N 1</a></li>
                            <li><i class="fa fa-table"></i><a href="g45n2_ip.php" style="color:black; font-size: 15px;">G45N 2</a></li>
                            <li><i class="fa fa-table"></i><a href="kwt1_ip.php" style="color:black; font-size: 15px;">KWT 1</a></li>
                            <li><i class="fa fa-table"></i><a href="kwt2_ip.php" style="color:black; font-size: 15px;">KWT 2</a></li>
                            <li><i class="fa fa-table"></i><a href="jcr_ip.php" style="color:black; font-size: 15px;">JAR</a></li>
                            <li><i class="fa fa-table"></i><a href="lsm_ip.php" style="color:black; font-size: 15px;">LSM</a></li>
                            <li><i class="fa fa-table"></i><a href="htr_ip.php" style="color:black; font-size: 15px;">HTR</a></li></ul>
                    </li>
                    <li class="menu-title" >REPORTS</li><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" style="color:black; font-size: 15px;"class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Noc</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-list"></i><a href="fill-report.php" style="color:black; font-size: 15px;">Fill Report</a></li>
                            <li><i class="fa fa-inbox"></i><a href="nats-reports.php" style="color:black; font-size: 15px;">View Reports </a></li>
                            <li><i class="fa fa-inbox"></i><a href="compiled_nats-reports.php" style="color:black; font-size: 15px;">Compiled Reports </a></li>
                            <li><i class="fa fa-inbox"></i><a href="nats-graphs.php" style="color:black; font-size: 15px;">Graphical Report </a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" style="color:black; font-size: 15px;"class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>DevOps</a>
                        <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-list"></i><a href="fill_developers_report.php" style="color:black; font-size: 15px;">Fill Report</a></li>
                            <li><i class="fa fa-inbox"></i><a href="view_developers_report.php" style="color:black; font-size: 15px;">View Reports </a></li>
                            <li><i class="fa fa-inbox"></i><a href="compiled_developers_report.php" style="color:black; font-size: 15px;">Compiled Reports </a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" style="color:black; font-size: 15px;"class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Documentation</a>
                        <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-list"></i><a href="fill_documentation_report.php" style="color:black; font-size: 15px;">Fill Report</a></li>
                            <li><i class="fa fa-inbox"></i><a href="view_documentaion_report.php" style="color:black; font-size: 15px;">View Reports </a></li>
                            <li><i class="fa fa-inbox"></i><a href="compiled_documentaion_report.php" style="color:black; font-size: 15px;">Compiled Reports </a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" style="color:black; font-size: 15px;"class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Maton</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-inbox"></i><a href="view-reports.php" style="color:black; font-size: 15px;">View Reports </a></li>
                            <li><i class="fa fa-inbox"></i><a href="maton-graph.php" style="color:black; font-size: 15px;">Graphical Report </a></li>
                        </ul>
                    </li>
                    <li class="menu-title">PANEL APS</li><!-- /.menu-title -->
                    <li>
                        <a href="installed.php" style="color:black; font-size: 15px;"> <i class="menu-icon ti-layout-grid3"></i>Installed </a>
                    </li>
                    <li>
                        <a href="imported_paps.php" style="color:black; font-size: 15px;"> <i class="menu-icon ti-layout-grid3"></i>Imported </a>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" style="color:black; font-size: 15px;"class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Turned On</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="turnedontoday.php" style="color:black; font-size: 15px;">Today</a></li>
                            <li><i class="fa fa-table"></i><a href="last-7-days.php"style="color:black; font-size: 15px;">Last 7 Days</a></li>
                            <li><i class="fa fa-table"></i><a href="last-30-days.php" style="color:black; font-size: 15px;">Last 30 Days</a></li>
                            <li><i class="fa fa-table"></i><a href="turnedon.php" style="color:black; font-size: 15px;">All Records</a></li>
                        </ul>
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
                                            <h3 class="text-center">Developers Report</h3>
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
                       <form  method="post" autocomplete="off" action="devreport.php">
                                  
                              <div class="form-group">
                                                <strong><label for="cc-number" class="control-label mb-1">Project Name<span style="color: #FF0000" >*</span></label></strong>
                                                <div class="form-group has-success">
                                            <select placeholder="Choose a Project..." class="standardSelect form-control" required name="project_name" tabindex="1" required>
                                            <option disabled selected >Choose Project...</option>
                                            <option value="Konnect Mart">Konnect Mart</option>
                                            <option value="Konnect Wallet">Konnect Wallet</option>
                                            <option value="LandingPage">LandingPage</option>
                                            <option value="KOMP">KOMP</option>
                                            </select>
                                            </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                    <strong><label for="cc-exp" class="control-label mb-1">Start Date<span style="color: #FF0000" >*</span></label></strong>
                                                        <input id="start" onchange="dateDiff()" placeholder="Start Date" value="<?php echo date("Y-m-d", strtotime("-3 days")); ?>"  name="report_start_date" type="date" class="form-control cc-exp">
                                                        <span class="help-block"  data-valmsg-replace="true"></span>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                <strong><label for="x_card_code" class="control-label mb-1">End Date<span style="color: #FF0000" >*</span></label></strong>
                                                    <div class="input-group">
                                                        <input id="end" name="report_end_date" value="<?php echo date("Y-m-d"); ?>" onchange="dateDiff()" type="date" class="form-control cc-cvc"  placeholder="End Time">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                            <strong><label for="cc-number" class="control-label mb-1">Evaluation Period</label></strong>
                                                <input id="diff" name="evaluation_period" onkeyup="dateDiff()"  type="text" class="form-control cc-number identified visa" required placeholder="Duration">
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                        <div class="form-group has-success">
                                        <strong><label for="cc-name" class="control-label mb-1">Milestones<span style="color: #FF0000" >*</span></label></strong>
                                        <textarea id="milestones" name="key_milestone" type="text" class="form-control cc-name valid" data-val="true" placeholder="Key Milestone" required ></textarea>
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                            <strong><div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Completed Tasks<span style="color: #FF0000" >*</span></label></strong>
                                                <textarea  id="editor1" name="completed_tasks" type="text" class="form-control cc-number identified visa"required  placeholder="Completed Tasks"></textarea>
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="form-group">
                                            <strong><label for="cc-number" class="control-label mb-1">Ongoing Tasks<span style="color: #FF0000" >*</span></label></strong>
                                                <textarea id="editor2" required name="ongoing_tasks" required type="text" class="form-control"  placeholder="Ongoing Tasks"></textarea>
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>

                                            <div class="form-group">
                                            <strong> <label for="cc-number" class="control-label mb-1">Challenges</label></strong>
                                                <input id="challenges" name="challenges" type="text" class="form-control cc-number identified visa" placeholder="Challenges">
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="form-group">
                                            <strong> <label for="cc-number" class="control-label mb-1">Comments<span style="color: #FF0000" >*</span></label></strong>
                                                <input id="cc-number" name="comments" type="text" class="form-control cc-number identified visa" required placeholder="Comments" required>
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="form-group">
                                            <strong><label for="cc-number" class="control-label mb-1">Reported By<span style="color: #FF0000" >*</span></label></strong>
                                                <input id="cc-number" name="developers" type="text" required class="form-control cc-number identified visa" Value="<?php echo $_SESSION[
                                                    "FName"
                                                ]; ?> <?php echo $_SESSION["LName"]; ?>" maxlength="40"  required placeholder="Reports By">
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                          
                                                <button id="payment-button" type="submit" name="submit" class="btn btn-warning">
                                                    <span id="payment-button-amount">Submit</span>
                                                    <span id="payment-button-sending" style="display:none;">Sending…</span>
                                                </button>
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
<script>

    jQuery(document).ready(function() {
        jQuery(".standardSelect").chosen({
            disable_search_threshold: 10,
            no_results_text: "Oops, nothing found!",
            width: "100%"
        });
    });
</script>
<script>
CKEDITOR.replace("completed_tasks");
CKEDITOR.on("instanceReady", function (evt) {
  var editor = evt.editor;

  editor.on("change", function (e) {
    var contentSpace = editor.ui.space("contents");
    var ckeditorFrameCollection = contentSpace.$.getElementsByTagName("iframe");
    var ckeditorFrame = ckeditorFrameCollection[0];
    var innerDoc = ckeditorFrame.contentDocument;
    var innerDocTextAreaHeight = $(innerDoc.body).height();
    console.log(innerDocTextAreaHeight);
  });
});

</script>
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
maxdate1= year +"-" + month + "-" + todate;
 document.getElementById("start").setAttribute("max",maxdate1);
 </script>
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
 document.getElementById("end").setAttribute("max",maxdate);
 </script>
</body>
<script>
function dateDiff() {
  var d2 = document.getElementById("start").value;
  var d1 = document.getElementById("end").value;

  var t2 = new Date(d2);
  var t1 = new Date(d1);

  var diff = ((t1 - t2) / (24 * 3600 * 1000));

  setInterval(function(){document.getElementById("diff").value = diff});
}
</script>
<script>
    // Helper function to display messages below CKEditor 4.
    function ShowMessage(msg) {
      document.getElementById('eMessage').innerHTML = msg;
    }

    function InsertHTML() {
      // Get the editor instance that you want to interact with.
      var editor = CKEDITOR.instances.editor1;
      var value = document.getElementById('htmlArea').value;

      // Check the active editing mode.
      if (editor.mode == 'wysiwyg') {
        // Insert HTML code.
        // https://ckeditor.com/docs/ckeditor4/latest/api/CKEDITOR_editor.html#method-insertHtml
        editor.insertHtml(value);
      } else
        alert('You must be in WYSIWYG mode!');
    }

    function InsertText() {
      // Get the editor instance that you want to interact with.
      var editor = CKEDITOR.instances.editor1;
      var value = document.getElementById('txtArea').value;

      // Check the active editing mode.
      if (editor.mode == 'wysiwyg') {
        // Insert as plain text.
        // https://ckeditor.com/docs/ckeditor4/latest/api/CKEDITOR_editor.html#method-insertText
        editor.insertText(value);
      } else
        alert('You must be in WYSIWYG mode!');
    }

    function SetContents() {
      // Get the editor instance that you want to interact with.
      var editor = CKEDITOR.instances.editor1;
      var value = document.getElementById('htmlArea').value;

      // Set editor content (replace current content).
      // https://ckeditor.com/docs/ckeditor4/latest/api/CKEDITOR_editor.html#method-setData
      editor.setData(value);
    }

    function GetContents() {
      // Get the editor instance that you want to interact with.
      var editor = CKEDITOR.instances.editor1;

      // Get editor content.
      // https://ckeditor.com/docs/ckeditor4/latest/api/CKEDITOR_editor.html#method-getData
      alert(editor.getData());
    }

    function ExecuteCommand(commandName) {
      // Get the editor instance that you want to interact with.
      var editor = CKEDITOR.instances.editor1;

      // Check the active editing mode.
      if (editor.mode == 'wysiwyg') {
        // Execute the command.
        // https://ckeditor.com/docs/ckeditor4/latest/api/CKEDITOR_editor.html#method-execCommand
        editor.execCommand(commandName);
      } else
        alert('You must be in WYSIWYG mode!');
    }

    function CheckDirty() {
      // Get the editor instance that you want to interact with.
      var editor = CKEDITOR.instances.editor1;
      // Checks whether the current editor content contains changes when compared
      // to the content loaded into the editor at startup.
      // https://ckeditor.com/docs/ckeditor4/latest/api/CKEDITOR_editor.html#method-checkDirty
      alert(editor.checkDirty());
    }

    function ResetDirty() {
      // Get the editor instance that you want to interact with.
      var editor = CKEDITOR.instances.editor1;
      // Resets the "dirty state" of the editor.
      // https://ckeditor.com/docs/ckeditor4/latest/api/CKEDITOR_editor.html#method-resetDirty
      editor.resetDirty();
      alert('The "IsDirty" status was reset.');
    }

    function Focus() {
      // Get the editor instance that you want to interact with.
      var editor = CKEDITOR.instances.editor1;
      // Focuses the editor.
      // https://ckeditor.com/docs/ckeditor4/latest/api/CKEDITOR_editor.html#method-focus
      editor.focus();
    }
  </script>


  <script>
    // Attaching event listeners to the global CKEDITOR object.
    // The instanceReady event is fired when an instance of CKEditor 4 has finished its initialization.
    CKEDITOR.on('instanceReady', function(ev) {
      ShowMessage('Editor instance <em>' + ev.editor.name + '</em> was loaded.');

      // The editor is ready, so sample buttons can be displayed.
      document.getElementById('eButtons').style.display = 'block';
    });

    // Replace the <textarea id="editor1"> with a CKEditor 4 instance.
    // A reference to the editor object is returned by CKEDITOR.replace() allowing you to work with editor instances.
    var editor = CKEDITOR.replace('editor2', {
      height: 150,
      removeButtons: 'PasteFromWord'
    });

    // Attaching event listeners to CKEditor 4 instances.
    // Refer to https://ckeditor.com/docs/ckeditor4/latest/api/CKEDITOR_editor.html for a list of all available events.
    editor.on('focus', function(evt) {
      ShowMessage('Editor instance <em>' + this.name + '</em> <b>is focused</b>.');
    });
    editor.on('blur', function(evt) {
      ShowMessage('Editor instance <em>' + this.name + '</em> <b>lost focus</b>.');
    });
    // Helper variable to count the number of detected changes in CKEditor 4.
    var changesNum = 0;
    editor.on('change', function(evt) {
      ShowMessage('The number of changes in <em>' + this.name + '</em>: <b>' + ++changesNum + '</b>.');
    });
  </script>
  <script>
    // Helper function to display messages below CKEditor 4.
    function ShowMessage(msg) {
      document.getElementById('eMessage').innerHTML = msg;
    }

    function InsertHTML() {
      // Get the editor instance that you want to interact with.
      var editor = CKEDITOR.instances.editor2;
      var value = document.getElementById('htmlArea').value;

      // Check the active editing mode.
      if (editor.mode == 'wysiwyg') {
        // Insert HTML code.
        // https://ckeditor.com/docs/ckeditor4/latest/api/CKEDITOR_editor.html#method-insertHtml
        editor.insertHtml(value);
      } else
        alert('You must be in WYSIWYG mode!');
    }

    function InsertText() {
      // Get the editor instance that you want to interact with.
      var editor = CKEDITOR.instances.editor2;
      var value = document.getElementById('txtArea').value;

      // Check the active editing mode.
      if (editor.mode == 'wysiwyg') {
        // Insert as plain text.
        // https://ckeditor.com/docs/ckeditor4/latest/api/CKEDITOR_editor.html#method-insertText
        editor.insertText(value);
      } else
        alert('You must be in WYSIWYG mode!');
    }

    function SetContents() {
      // Get the editor instance that you want to interact with.
      var editor = CKEDITOR.instances.editor2;
      var value = document.getElementById('htmlArea').value;

      // Set editor content (replace current content).
      // https://ckeditor.com/docs/ckeditor4/latest/api/CKEDITOR_editor.html#method-setData
      editor.setData(value);
    }

    function GetContents() {
      // Get the editor instance that you want to interact with.
      var editor = CKEDITOR.instances.editor2;

      // Get editor content.
      // https://ckeditor.com/docs/ckeditor4/latest/api/CKEDITOR_editor.html#method-getData
      alert(editor.getData());
    }

    function ExecuteCommand(commandName) {
      // Get the editor instance that you want to interact with.
      var editor = CKEDITOR.instances.editor2;

      // Check the active editing mode.
      if (editor.mode == 'wysiwyg') {
        // Execute the command.
        // https://ckeditor.com/docs/ckeditor4/latest/api/CKEDITOR_editor.html#method-execCommand
        editor.execCommand(commandName);
      } else
        alert('You must be in WYSIWYG mode!');
    }

    function CheckDirty() {
      // Get the editor instance that you want to interact with.
      var editor = CKEDITOR.instances.editor2;
      // Checks whether the current editor content contains changes when compared
      // to the content loaded into the editor at startup.
      // https://ckeditor.com/docs/ckeditor4/latest/api/CKEDITOR_editor.html#method-checkDirty
      alert(editor.checkDirty());
    }

    function ResetDirty() {
      // Get the editor instance that you want to interact with.
      var editor = CKEDITOR.instances.editor2;
      // Resets the "dirty state" of the editor.
      // https://ckeditor.com/docs/ckeditor4/latest/api/CKEDITOR_editor.html#method-resetDirty
      editor.resetDirty();
      alert('The "IsDirty" status was reset.');
    }

    function Focus() {
      // Get the editor instance that you want to interact with.
      var editor = CKEDITOR.instances.editor2;
      // Focuses the editor.
      // https://ckeditor.com/docs/ckeditor4/latest/api/CKEDITOR_editor.html#method-focus
      editor.focus();
    }
  </script>
  <script>
    // Attaching event listeners to the global CKEDITOR object.
    // The instanceReady event is fired when an instance of CKEditor 4 has finished its initialization.
    CKEDITOR.on('instanceReady', function(ev) {
      ShowMessage('Editor instance <em>' + ev.editor.name + '</em> was loaded.');

      // The editor is ready, so sample buttons can be displayed.
      document.getElementById('eButtons').style.display = 'block';
    });

    // Replace the <textarea id="editor2"> with a CKEditor 4 instance.
    // A reference to the editor object is returned by CKEDITOR.replace() allowing you to work with editor instances.
    var editor = CKEDITOR.replace('editor2', {
      height: 150,
      removeButtons: 'PasteFromWord'
    });

    // Attaching event listeners to CKEditor 4 instances.
    // Refer to https://ckeditor.com/docs/ckeditor4/latest/api/CKEDITOR_editor.html for a list of all available events.
    editor.on('focus', function(evt) {
      ShowMessage('Editor instance <em>' + this.name + '</em> <b>is focused</b>.');
    });
    editor.on('blur', function(evt) {
      ShowMessage('Editor instance <em>' + this.name + '</em> <b>lost focus</b>.');
    });
    // Helper variable to count the number of detected changes in CKEditor 4.
    var changesNum = 0;
    editor.on('change', function(evt) {
      ShowMessage('The number of changes in <em>' + this.name + '</em>: <b>' + ++changesNum + '</b>.');
    });
  </script>
<script>
    // Helper function to display messages below CKEditor 4.
    function ShowMessage(msg) {
      document.getElementById('eMessage').innerHTML = msg;
    }

    function InsertHTML() {
      // Get the editor instance that you want to interact with.
      var editor = CKEDITOR.instances.editor2;
      var value = document.getElementById('htmlArea').value;

      // Check the active editing mode.
      if (editor.mode == 'wysiwyg') {
        // Insert HTML code.
        // https://ckeditor.com/docs/ckeditor4/latest/api/CKEDITOR_editor.html#method-insertHtml
        editor.insertHtml(value);
      } else
        alert('You must be in WYSIWYG mode!');
    }

    function InsertText() {
      // Get the editor instance that you want to interact with.
      var editor = CKEDITOR.instances.milestones;
      var value = document.getElementById('txtArea').value;

      // Check the active editing mode.
      if (editor.mode == 'wysiwyg') {
        // Insert as plain text.
        // https://ckeditor.com/docs/ckeditor4/latest/api/CKEDITOR_editor.html#method-insertText
        editor.insertText(value);
      } else
        alert('You must be in WYSIWYG mode!');
    }

    function SetContents() {
      // Get the editor instance that you want to interact with.
      var editor = CKEDITOR.instances.milestones;
      var value = document.getElementById('htmlArea').value;

      // Set editor content (replace current content).
      // https://ckeditor.com/docs/ckeditor4/latest/api/CKEDITOR_editor.html#method-setData
      editor.setData(value);
    }

    function GetContents() {
      // Get the editor instance that you want to interact with.
      var editor = CKEDITOR.instances.milestones;

      // Get editor content.
      // https://ckeditor.com/docs/ckeditor4/latest/api/CKEDITOR_editor.html#method-getData
      alert(editor.getData());
    }

    function ExecuteCommand(commandName) {
      // Get the editor instance that you want to interact with.
      var editor = CKEDITOR.instances.milestones;

      // Check the active editing mode.
      if (editor.mode == 'wysiwyg') {
        // Execute the command.
        // https://ckeditor.com/docs/ckeditor4/latest/api/CKEDITOR_editor.html#method-execCommand
        editor.execCommand(commandName);
      } else
        alert('You must be in WYSIWYG mode!');
    }

    function CheckDirty() {
      // Get the editor instance that you want to interact with.
      var editor = CKEDITOR.instances.milestones;
      // Checks whether the current editor content contains changes when compared
      // to the content loaded into the editor at startup.
      // https://ckeditor.com/docs/ckeditor4/latest/api/CKEDITOR_editor.html#method-checkDirty
      alert(editor.checkDirty());
    }

    function ResetDirty() {
      // Get the editor instance that you want to interact with.
      var editor = CKEDITOR.instances.milestones;
      // Resets the "dirty state" of the editor.
      // https://ckeditor.com/docs/ckeditor4/latest/api/CKEDITOR_editor.html#method-resetDirty
      editor.resetDirty();
      alert('The "IsDirty" status was reset.');
    }

    function Focus() {
      // Get the editor instance that you want to interact with.
      var editor = CKEDITOR.instances.milestones;
      // Focuses the editor.
      // https://ckeditor.com/docs/ckeditor4/latest/api/CKEDITOR_editor.html#method-focus
      editor.focus();
    }
  </script>
  <script>
    // Attaching event listeners to the global CKEDITOR object.
    // The instanceReady event is fired when an instance of CKEditor 4 has finished its initialization.
    CKEDITOR.on('instanceReady', function(ev) {
      ShowMessage('Editor instance <em>' + ev.editor.name + '</em> was loaded.');

      // The editor is ready, so sample buttons can be displayed.
      document.getElementById('eButtons').style.display = 'block';
    });

    // Replace the <textarea id="milestones"> with a CKEditor 4 instance.
    // A reference to the editor object is returned by CKEDITOR.replace() allowing you to work with editor instances.
    var editor = CKEDITOR.replace('milestones', {
      height: 150,
      removeButtons: 'PasteFromWord'
    });

    // Attaching event listeners to CKEditor 4 instances.
    // Refer to https://ckeditor.com/docs/ckeditor4/latest/api/CKEDITOR_editor.html for a list of all available events.
    editor.on('focus', function(evt) {
      ShowMessage('Editor instance <em>' + this.name + '</em> <b>is focused</b>.');
    });
    editor.on('blur', function(evt) {
      ShowMessage('Editor instance <em>' + this.name + '</em> <b>lost focus</b>.');
    });
    // Helper variable to count the number of detected changes in CKEditor 4.
    var changesNum = 0;
    editor.on('change', function(evt) {
      ShowMessage('The number of changes in <em>' + this.name + '</em>: <b>' + ++changesNum + '</b>.');
    });
  </script>
</html>
