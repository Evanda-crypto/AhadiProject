<?php
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
    <title>Daily Events Report</title>
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

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <link href="https://cdn.datatables.net/datetime/1.1.2/css/dataTables.dateTime.min.css" rel="stylesheet"/>
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
  <script src="https://cdn.datatables.net/datetime/1.1.2/js/dataTables.dateTime.min.js"></script>
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
                    <li class="menu-title">PANEL APS</li><!-- /.menu-title -->
                    <li>
                        <a href="installed.php" style="color:black; font-size: 15px;"> <i class="menu-icon ti-layout-grid3"></i>Installed </a>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>TURNED ON</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="turnedontoday.php">Today</a></li>
                            <li><i class="fa fa-table"></i><a href="last-7-days.php">Last 7 days</a></li>
                            <li><i class="fa fa-table"></i><a href="turnedon.php">All Records</a></li>
                        </ul>
                    </li>
                    <li class="menu-title" >REPORT</li><!-- /.menu-title -->
                    <li>
                        <a href="events.php" style="color:black; font-size: 15px;"> <i class="menu-icon ti-list"></i>Fill Report </a>
                    </li>
                    <li>
                        <a href="view-reports.php" style="color:black; font-size: 15px;"> <i class="menu-icon ti-email"></i>View Reports </a>
                    </li>
                    <li>
                        <a href="general-report.php" style="color:black; font-size: 15px;"> <i class="menu-icon ti-email"></i>Compiled Reports </a>
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
                                            <h3 class="text-center">Daily Issue Report</h3>
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
                                        <form  method="post" autocomplete="off" action="submit.php">
                                  
                                        <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Date <span style="color: #FF0000" >*</span></label>
                                                <input id="dateinstalled" name="date" type="date" class="form-control cc-name valid" data-val="true" value="<?php echo date(
                                                    "Y-m-d"
                                                ); ?>" autocomplete="cc-name" aria-invalid="false" aria-describedby="cc-name" required >
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Issue</label>
                                                <div class="form-group has-success">
                                            <select data-placeholder="Choose an issue..." class="standardSelect form-control" name="issue" tabindex="1" required>
                                            <option disabled selected >Choose an issue...</option>
                            <optgroup label="Power Issue">
                              <option  value="Power Issue (Power Outage)">Power Outage</option>  
                              <option value="Power Issue (KPLC Disconnection)">KPLC Disconnection</option>
                              <option value="Power Issue (Mgmt Disconnection)">Mgmt Disconnection</option>   
                              <option value="Power Issue (Power Surge)">Power Surge</option>
                             <option value="Power Issue (Low Voltage)">Low Voltage </option>
                             <option value="Power Issue (Faulty Meter)">Faulty Meter</option>  
                             <option value="Power Issue (Tokens)">Tokens</option>
                             <option value="Power Issue (Mgmt Maintenance)">Mgmt Maintenance</option>
                             <option value="Power Issue (Maton Maitenance) ">Maton Maintenance</option>
                            </optgroup>
                             <optgroup label="Fibre Issue">
                             <option  value="Fibre Issue (KPLC Damage)">KPLC Damage</option>  
                              <option value="Fibre Issue (Fallen Pole)">Fallen Pole</option>
                              <option value="Fibre Issue (Damaged By Trucks)">Damaged By Trucks</option>   
                              <option value="Fibre Issue (Unknown Assailants)">Unknown Assailants</option>
                             <option value="Fibre Issue (Loop)">Loop</option>
                             <option value="Fibre Issue (Kink)">Kink</option>  
                             <option value="Fibre Issue (Faulty Module)">Faulty Module</option>
                             <option value="Fibre Issue (Loose Joint)">Loose Joint</option>
                             <option value="Fibre Issue (Loosely Patched Pigtails)">Loosely Patched Pigtails</option>
                             <option value="Fibre Issue (Poor Enclosure Mgnt)">Poor Enclosure Mgnt</option>  
                             <option value="Fibre Issue (Poor SB Mgnt)">Poor SB Mgnt</option>
                            </optgroup>
                            <optgroup label="Replacement">
                             <option  value="Replacement (Panel AP">Panel AP</option>  
                              <option value="Replacement (Power Cable)">Power Cable</option>
                              <option value="Replacement (Interlinking)">Interlinking</option>   
                              <option value="Replacement (Switch)">Switch</option>
                             <option value="Replacement (Cabinet)">Cabinet</option>
                             <option value="Replacement (Extension)">Extension</option>  
                             <option value="Replacement (Adapter)">Adapter</option>
                            </optgroup>
                            <optgroup label="Other Issues">
                            <option  value="Other Issues (Switch Theft)">Switch Theft</option>
                            <option  value="Other Issues (Panel Retrieval)">Panel Retrieval</option>
                            <option  value="Other Issues (Offline AP)">Offline AP</option>
                            <option  value="Other Issues (Faulty AP)">Faulty AP</option>
                                            </optgroup>
                                              </select>
                                            </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Region & Zone<span style="color: #FF0000" >*</span></label>
                                                <div class="form-group has-success">
                                            
                                                <select placeholder="Choose a Zone..." multiple class="standardSelect form-control" tabindex="1" name="zone[]" required>
                            <optgroup label="R&M">
                                <option value=""></option>
                                <option  value="R&M All Zones">All Zones</option> 
                            <option  value="R&M Zone 1">Zone 1</option>  
                              <option value="R&M Zone 2">Zone 2</option>
                              <option value="R&M Zone 3">Zone 3</option>   
                              <option value="R&M Zone 4">Zone 4</option>
                             <option value="R&M Zone 5">Zone 5</option>
                             <option value="R&M Zone 6">Zone 6</option>  
                             <option value="R&M Zone 7">Zone 7</option>
                             <option  value="R&M Zone 8">Zone 8</option>  
                              <option value="R&M Zone 9">Zone 9</option>
                              <option value="R&M Zone 10">Zone 10</option>   
                              <option value="R&M Zone 11">Zone 11</option>
                             <option value="R&M Zone 12">Zone 12</option>
                             <option value="R&M Zone 13">Zone 13</option>  
                             <option value="R&M Zone 14">Zone 14</option>
                             <option  value="R&M Zone 15">Zone 15</option>  
                              <option value="R&M Zone 16">Zone 16</option>
                              <option value="R&M Zone 17">Zone 17</option>   
                              <option value="R&M Zone 18">Zone 18</option>
                             <option value="R&M Zone 19">Zone 19</option>
                             <option value="R&M Zone 20">Zone 20</option>  
                             <option  value="R&M Zone 21">Zone 21</option>  
                              <option value="R&M Zone 22">Zone 22</option>
                              <option value="R&M Zone 23">Zone 23</option>   
                              <option value="R&M Zone 24">Zone 24</option>
                             <option value="R&M Zone 25">Zone 25</option>
                             <option value="R&M Zone 26">Zone 26</option>  
                             <option value="R&M Zone 27">Zone 27</option>
                             <option  value="R&M Zone 28">Zone 28</option>  
                              <option value="R&M Zone 29">Zone 29</option>
                              <option value="R&M Zone 30">Zone 30</option>   
                              <option value="R&M Zone 31">Zone 31</option>
                             <option value="R&M Zone 32">Zone 32</option>
                             <option value="R&M Zone 33">Zone 33</option>  
                             <option value="R&M Zone 34">Zone 34</option>
                             <option  value="R&M Zone 35">Zone 35</option>  
                              <option value="R&M Zone 36">Zone 36</option>
                              <option value="R&M Zone 37">Zone 37</option>   
                              <option value="R&M Zone 38">Zone 38</option>
                             <option value="R&M Zone 39">Zone 39</option>
                             <option value="R&M Zone 40">Zone 40</option>
                            </optgroup>
                            <optgroup label="ZMM">
                            <option  value="ZMM All Zones">All Zones</option> 
                            <option  value="ZMM Zone 1">Zone 1</option>  
                              <option value="ZMM Zone 2">Zone 2</option>
                              <option value="ZMM Zone 3">Zone 3</option>   
                              <option value="ZMM Zone 4">Zone 4</option>
                             <option value="ZMM Zone 5">Zone 5</option>
                             <option value="ZMM Zone 6">Zone 6</option>  
                             <option value="ZMM Zone 7">Zone 7</option>
                             <option  value="ZMM Zone 8">Zone 8</option>  
                              <option value="ZMM Zone 9">Zone 9</option>
                              <option value="ZMM Zone 10">Zone 10</option>   
                              <option value="ZMM Zone 11">Zone 11</option>
                             <option value="ZMM Zone 12">Zone 12</option>
                             <option value="ZMM Zone 13">Zone 13</option>  
                             <option value="ZMM Zone 14">Zone 14</option>
                             <option  value="ZMM Zone 15">Zone 15</option>  
                              <option value="ZMM Zone 16">Zone 16</option>
                              <option value="ZMM Zone 17">Zone 17</option>   
                              <option value="ZMM Zone 18">Zone 18</option>
                             <option value="ZMM Zone 19">Zone 19</option>
                             <option value="ZMM Zone 20">Zone 20</option>
                             <option  value="ZMM Zone 21">Zone 21</option>  
                              <option value="ZMM Zone 22">Zone 22</option>
                              <option value="ZMM Zone 23">Zone 23</option>   
                              <option value="ZMM Zone 24">Zone 24</option>
                             <option value="ZMM Zone 25">Zone 25</option>
                             <option value="ZMM Zone 26">Zone 26</option>  
                             <option value="ZMM Zone 27">Zone 27</option>
                             <option  value="ZMM Zone 28">Zone 28</option>  
                              <option value="ZMM Zone 29">Zone 29</option>
                              <option value="ZMM Zone 30">Zone 30</option>   
                              <option value="ZMM Zone 31">Zone 31</option>
                             <option value="ZMM Zone 32">Zone 32</option>
                             <option value="ZMM Zone 33">Zone 33</option>  
                             <option value="ZMM Zone 34">Zone 34</option>
                             <option  value="ZMM Zone 35">Zone 35</option>  
                              <option value="ZMM Zone 36">Zone 36</option>
                              <option value="ZMM Zone 37">Zone 37</option>   
                              <option value="ZMM Zone 38">Zone 38</option>
                             <option value="ZMM Zone 39">Zone 39</option>
                             <option value="ZMM Zone 40">Zone 40</option>
                            </optgroup>
                            <optgroup label="G44">
                            <option  value="G44 All Zones">All Zones</option> 
                            <option  value="G44 Zone 1">Zone 1</option>  
                              <option value="G44 Zone 2">Zone 2</option>
                              <option value="G44 Zone 3">Zone 3</option>   
                              <option value="G44 Zone 4">Zone 4</option>
                             <option value="G44 Zone 5">Zone 5</option>
                             <option value="G44 Zone 6">Zone 6</option>  
                             <option value="G44 Zone 7">Zone 7</option>
                             <option  value="G44 Zone 8">Zone 8</option>  
                              <option value="G44 Zone 9">Zone 9</option>
                              <option value="G44 Zone 10">Zone 10</option>   
                              <option value="G44 Zone 11">Zone 11</option>
                             <option value="G44 Zone 12">Zone 12</option>
                             <option value="G44 Zone 13">Zone 13</option>  
                             <option value="G44 Zone 14">Zone 14</option>
                             <option  value="G44 Zone 15">Zone 15</option>  
                              <option value="G44 Zone 16">Zone 16</option>
                              <option value="G44 Zone 17">Zone 17</option>   
                              <option value="G44 Zone 18">Zone 18</option>
                             <option value="G44 Zone 19">Zone 19</option>
                             <option value="G44 Zone 20">Zone 20</option>
                             <option  value="G44 Zone 21">Zone 21</option>  
                              <option value="G44 Zone 22">Zone 22</option>
                              <option value="G44 Zone 23">Zone 23</option>   
                              <option value="G44 Zone 24">Zone 24</option>
                             <option value="G44 Zone 25">Zone 25</option>
                             <option value="G44 Zone 26">Zone 26</option>  
                             <option value="G44 Zone 27">Zone 27</option>
                             <option  value="G44 Zone 28">Zone 28</option>  
                              <option value="G44 Zone 29">Zone 29</option>
                              <option value="G44 Zone 30">Zone 30</option>   
                              <option value="G44 Zone 31">Zone 31</option>
                             <option value="G44 Zone 32">Zone 32</option>
                             <option value="G44 Zone 33">Zone 33</option>  
                             <option value="G44 Zone 34">Zone 34</option>
                             <option  value="G44 Zone 35">Zone 35</option>  
                              <option value="G44 Zone 36">Zone 36</option>
                              <option value="G44 Zone 37">Zone 37</option>   
                              <option value="G44 Zone 38">Zone 38</option>
                             <option value="G44 Zone 39">Zone 39</option>
                             <option value="G44 Zone 40">Zone 40</option>
                            </optgroup>
                            <optgroup label="G45S">
                            <option  value="G45S All Zones">All Zones</option> 
                            <option  value="G45S Zone 1">Zone 1</option>  
                              <option value="G45S Zone 2">Zone 2</option>
                              <option value="G45S Zone 3">Zone 3</option>   
                              <option value="G45S Zone 4">Zone 4</option>
                             <option value="G45S Zone 5">Zone 5</option>
                             <option value="G45S Zone 6">Zone 6</option>  
                             <option value="G45S Zone 7">Zone 7</option>
                             <option  value="G45S Zone 8">Zone 8</option>  
                              <option value="G45S Zone 9">Zone 9</option>
                              <option value="G45S Zone 10">Zone 10</option>   
                              <option value="G45S Zone 11">Zone 11</option>
                             <option value="G45S Zone 12">Zone 12</option>
                             <option value="G45S Zone 13">Zone 13</option>  
                             <option value="G45S Zone 14">Zone 14</option>
                             <option  value="G45S Zone 15">Zone 15</option>  
                              <option value="G45S Zone 16">Zone 16</option>
                              <option value="G45S Zone 17">Zone 17</option>   
                              <option value="G45S Zone 18">Zone 18</option>
                             <option value="G45S Zone 19">Zone 19</option>
                             <option value="G45S Zone 20">Zone 20</option>
                             <option  value="G45S Zone 21">Zone 21</option>  
                              <option value="G45S Zone 22">Zone 22</option>
                              <option value="G45S Zone 23">Zone 23</option>   
                              <option value="G45S Zone 24">Zone 24</option>
                             <option value="G45S Zone 25">Zone 25</option>
                             <option value="G45S Zone 26">Zone 26</option>  
                             <option value="G45S Zone 27">Zone 27</option>
                             <option  value="G45S Zone 28">Zone 28</option>  
                              <option value="G45S Zone 29">Zone 29</option>
                              <option value="G45S Zone 30">Zone 30</option>   
                              <option value="G45S Zone 31">Zone 31</option>
                             <option value="G45S Zone 32">Zone 32</option>
                             <option value="G45S Zone 33">Zone 33</option>  
                             <option value="G45S Zone 34">Zone 34</option>
                             <option  value="G45S Zone 35">Zone 35</option>  
                              <option value="G45S Zone 36">Zone 36</option>
                              <option value="G45S Zone 37">Zone 37</option>   
                              <option value="G45S Zone 38">Zone 38</option>
                             <option value="G45S Zone 39">Zone 39</option>
                             <option value="G45S Zone 40">Zone 40</option>
                            </optgroup>
                            <optgroup label="G45N">
                            <option  value="G45N All Zones">All Zones</option>   
                              <option value="G45N Zone 16">Zone 16</option>
                              <option value="G45N Zone 17">Zone 17</option>   
                              <option value="G45N Zone 18">Zone 18</option>
                             <option value="G45N Zone 19">Zone 19</option>
                             <option value="G45N Zone 20">Zone 20</option>
                             <option  value="G45N Zone 21">Zone 21</option>  
                              <option value="G45N Zone 22">Zone 22</option>
                              <option value="G45N Zone 23">Zone 23</option>   
                              <option value="G45N Zone 24">Zone 24</option>
                             <option value="G45N Zone 25">Zone 25</option>
                             <option value="G45N Zone 26">Zone 26</option>  
                             <option value="G45N Zone 27">Zone 27</option>
                             <option  value="G45N Zone 28">Zone 28</option>  
                              <option value="G45N Zone 29">Zone 29</option>
                              <option value="G45N Zone 30">Zone 30</option>   
                              <option value="G45N Zone 31">Zone 31</option>
                             <option value="G45N Zone 32">Zone 32</option>
                             <option value="G45N Zone 33">Zone 33</option>  
                             <option value="G45N Zone 34">Zone 34</option>
                             <option  value="G45N Zone 35">Zone 35</option>  
                              <option value="G45N Zone 36">Zone 36</option>
                              <option value="G45N Zone 37">Zone 37</option>   
                              <option value="G45N Zone 38">Zone 38</option>
                             <option value="G45N Zone 39">Zone 39</option>
                             <option value="G45N Zone 40">Zone 40</option>
                             <option  value="G45N Zone 41">Zone 41</option>  
                              <option value="G45N Zone 42">Zone 42</option>
                              <option value="G45N Zone 43">Zone 43</option>   
                              <option value="G45N Zone 44">Zone 44</option>
                             <option value="G45N Zone 45">Zone 45</option>
                             <option value="G45N Zone 46">Zone 46</option>  
                             <option value="G45N Zone 47">Zone 47</option>
                             <option  value="G45N Zone 48">Zone 48</option>  
                              <option value="G45N Zone 49">Zone 49</option>
                              <option value="G45N Zone 50">Zone 50</option>   
                              <option value="G45N Zone 51">Zone 51</option>
                             <option value="G45N Zone 52">Zone 52</option>
                             <option value="G45N Zone 53">Zone 53</option>  
                             <option value="G45N Zone 54">Zone 54</option>
                            </optgroup>
                            <optgroup label="KWT">
                            <option  value="KWT All Zones">All Zones</option> 
                            <option  value="KWT Zone 1">Zone 1</option>  
                              <option value="KWT Zone 2">Zone 2</option>
                              <option value="KWT Zone 3">Zone 3</option>   
                              <option value="KWT Zone 4">Zone 4</option>
                             <option value="KWT Zone 5">Zone 5</option>
                             <option value="KWT Zone 6">Zone 6</option>  
                             <option value="KWT Zone 7">Zone 7</option>
                             <option  value="KWT Zone 8">Zone 8</option>  
                              <option value="KWT Zone 9">Zone 9</option>
                              <option value="KWT Zone 10">Zone 10</option>   
                              <option value="KWT Zone 11">Zone 11</option>
                             <option value="KWT Zone 12">Zone 12</option>
                             <option value="KWT Zone 13">Zone 13</option>  
                             <option value="KWT Zone 14">Zone 14</option>
                             <option  value="KWT Zone 15">Zone 15</option>  
                              <option value="KWT Zone 16">Zone 16</option>
                              <option value="KWT Zone 17">Zone 17</option>   
                              <option value="KWT Zone 18">Zone 18</option>
                             <option value="KWT Zone 19">Zone 19</option>
                             <option value="KWT Zone 20">Zone 20</option>
                             <option  value="KWT Zone 21">Zone 21</option>  
                              <option value="KWT Zone 22">Zone 22</option>
                              <option value="KWT Zone 23">Zone 23</option>   
                              <option value="KWT Zone 24">Zone 24</option>
                             <option value="KWT Zone 25">Zone 25</option>
                             <option value="KWT Zone 26">Zone 26</option>  
                             <option value="KWT Zone 27">Zone 27</option>
                             <option  value="KWT Zone 28">Zone 28</option>  
                              <option value="KWT Zone 29">Zone 29</option>
                              <option value="KWT Zone 30">Zone 30</option>   
                              <option value="KWT Zone 31">Zone 31</option>
                             <option value="KWT Zone 32">Zone 32</option>
                             <option value="KWT Zone 33">Zone 33</option>  
                             <option value="KWT Zone 34">Zone 34</option>
                             <option  value="KWT Zone 35">Zone 35</option>  
                              <option value="KWT Zone 36">Zone 36</option>
                              <option value="KWT Zone 37">Zone 37</option>   
                              <option value="KWT Zone 38">Zone 38</option>
                             <option value="KWT Zone 39">Zone 39</option>
                             <option value="KWT Zone 40">Zone 40</option>
                            </optgroup>
                            <optgroup label="LSM">
                            <option  value="LSM All Zones">All Zones</option> 
                            <option  value="LSM Zone 1">Zone 1</option>  
                              <option value="LSM Zone 2">Zone 2</option>
                              <option value="LSM Zone 3">Zone 3</option>   
                              <option value="LSM Zone 4">Zone 4</option>
                             <option value="LSM Zone 5">Zone 5</option>
                             <option value="LSM Zone 6">Zone 6</option>  
                             <option value="LSM Zone 7">Zone 7</option>
                             <option  value="LSM Zone 8">Zone 8</option>  
                              <option value="LSM Zone 9">Zone 9</option>
                              <option value="LSM Zone 10">Zone 10</option>   
                              <option value="LSM Zone 11">Zone 11</option>
                             <option value="LSM Zone 12">Zone 12</option>
                             <option value="LSM Zone 13">Zone 13</option>  
                             <option value="LSM Zone 14">Zone 14</option>
                             <option  value="LSM Zone 15">Zone 15</option>  
                              <option value="LSM Zone 16">Zone 16</option>
                              <option value="LSM Zone 17">Zone 17</option>   
                              <option value="LSM Zone 18">Zone 18</option>
                             <option value="LSM Zone 19">Zone 19</option>
                             <option value="LSM Zone 20">Zone 20</option>
                             <option  value="LSM Zone 21">Zone 21</option>  
                              <option value="LSM Zone 22">Zone 22</option>
                              <option value="LSM Zone 23">Zone 23</option>   
                              <option value="LSM Zone 24">Zone 24</option>
                             <option value="LSM Zone 25">Zone 25</option>
                             <option value="LSM Zone 26">Zone 26</option>  
                             <option value="LSM Zone 27">Zone 27</option>
                             <option  value="LSM Zone 28">Zone 28</option>  
                              <option value="LSM Zone 29">Zone 29</option>
                              <option value="LSM Zone 30">Zone 30</option>   
                              <option value="LSM Zone 31">Zone 31</option>
                             <option value="LSM Zone 32">Zone 32</option>
                             <option value="LSM Zone 33">Zone 33</option>  
                             <option value="LSM Zone 34">Zone 34</option>
                             <option  value="LSM Zone 35">Zone 35</option>  
                              <option value="LSM Zone 36">Zone 36</option>
                              <option value="LSM Zone 37">Zone 37</option>   
                              <option value="LSM Zone 38">Zone 38</option>
                             <option value="LSM Zone 39">Zone 39</option>
                             <option value="LSM Zone 40">Zone 40</option>
                            </optgroup>
                            </select>
                             </div>
                              </div>
                              <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Region<span style="color: #FF0000" >*</span></label>
                                                <div class="form-group has-success">
                                            <select data-placeholder="Choose a region..." class="standardSelect form-control" name="Region" tabindex="1">
                                            <option value="<?php echo $_SESSION['Region']?>"><?php echo $_SESSION['Region']?></option>
                                            <option value="G44">G44</option>
                                            <option value="ZMM">ZMM</option>
                                            <option value="G45S">G45S</option>
                                            <option value="G45N">G45N</option>
                                            <option value="R&M">R&M</option>
                                            <option value="LSM">LSM</option>
                                            <option value="KWT">KWT</option> 
                                            </select>
                                            </div>
                                            </div>
                              <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Building</label>
                                                <input id="cc-number" name="bname" type="text" class="form-control cc-number identified visa" maxlength="40" placeholder="Building">
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="cc-exp" class="control-label mb-1">Start Time</label>
                                                        <input id="start"  placeholder="Start Time" value="00:00"  name="start" type="time" class="form-control cc-exp"  placeholder="Start Time">
                                                        <span class="help-block"  data-valmsg-replace="true"></span>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <label for="x_card_code" class="control-label mb-1">End Time</label>
                                                    <div class="input-group">
                                                        <input id="end" name="end" value="00:00" type="time" class="form-control cc-cvc"  placeholder="End Time">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Duration</label>
                                                <input id="diff" name="duration" type="text" class="form-control cc-number identified visa" maxlength="40" placeholder="Duration">
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Suggestions/Observations/Comments<span style="color: #FF0000" >*</span></label>
                                                <input id="cc-number" name="comments" type="text" class="form-control cc-number identified visa" maxlength="40"  required placeholder="Suggestions/Observations/Comments">
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                        
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Reported By<span style="color: #FF0000" >*</span></label>
                                                <input id="cc-number" name="reporter" type="text" required class="form-control cc-number identified visa" Value="<?php echo $_SESSION[
                                                    "FName"
                                                ]; ?> <?php echo $_SESSION[
     "LName"
 ]; ?>" maxlength="40"  required placeholder="Reports By">
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
 mindate= year +"-" + month + "-" + todate;
 document.getElementById("cc-name").setAttribute("min",mindate);
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
 document.getElementById("dateinstalled").setAttribute("max",maxdate);
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
maxdate= year +"-" + month + "-" + todate;
 document.getElementById("min").setAttribute("max",maxdate);
 </script>
</body>
<script>
var start = document.getElementById("start").value;
var end = document.getElementById("end").value;

document.getElementById("start").onchange = function() {diff(start,end)};
document.getElementById("end").onchange = function() {diff(start,end)};


function diff(start, end) {
    start = document.getElementById("start").value; //to update time value in each input bar
    end = document.getElementById("end").value; //to update time value in each input bar
    
    start = start.split(":");
    end = end.split(":");
    var startDate = new Date(0, 0, 0, start[0], start[1], 0);
    var endDate = new Date(0, 0, 0, end[0], end[1], 0);
    var diff = endDate.getTime() - startDate.getTime();
    var hours = Math.floor(diff / 1000 / 60 / 60);
    diff -= hours * 1000 * 60 * 60;
    var minutes = Math.floor(diff / 1000 / 60);

    return (hours < 9 ? "0" : "") + hours + "hrs " + (minutes < 9 ? "0" : "") + minutes + "mins";
}

setInterval(function(){document.getElementById("diff").value = diff(start, end);}, 1000); //to update time every second (1000 is 1 sec interval and function encasing original code you had down here is because setInterval only reads functions) You can change how fast the time updates by lowering the time interval
</script>
</html>
