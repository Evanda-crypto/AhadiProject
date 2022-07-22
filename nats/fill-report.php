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
    <title>Daily Issue Report</title>
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
                    <li class="menu-title" >REGIONS</li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" style="color:black; font-size: 15px;"class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Region Description</a>
                        <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-list"></i><a href="fill_region_report.php">Add New Region</a></li>
                            <li><i class="fa fa-eye text-success"></i><a href="view_regional_report.php" style="color:black; font-size: 15px;">View Region Data</a></li>
                        </ul>
                           
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
                                        <strong><label for="cc-name" class="control-label mb-1">Date <span style="color: #FF0000" >*</span></label></strong>
                                                <input id="dateinstalled" name="date" type="date" class="form-control cc-name valid" data-val="true" value="<?php echo date(
                                                    "Y-m-d"
                                                ); ?>" autocomplete="cc-name" aria-invalid="false" aria-describedby="cc-name" required >
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="form-group">
                                            <strong><label for="cc-number" class="control-label mb-1">Region<span style="color: #FF0000" >*</span></label></strong>
                                                <div class="form-group has-success">
                                            <select data-placeholder="Choose a region..." class="standardSelect form-control" name="Region" tabindex="1" required>
                                            <option value="<?php echo $_SESSION['Region']?>"><?php echo $_SESSION['Region']?></option>
                                            <option value="G44">G44</option>
                                            <option value="ZMM">ZMM</option>
                                            <option value="G45S">G45S</option>
                                            <option value="G45N">G45N</option>
                                            <option value="R&M">R&M</option>
                                            <option value="LSM">LSM</option>
                                            <option value="KWT">KWT</option>
                                            <option value="HTR">HTR</option>
                                           <option value="MWK">MWK</option> 
                                            </select>
                                            </div>
                                            </div>
                                            <div class="form-group">
                                            <strong> <label for="cc-number" class="control-label mb-1">Zone<span style="color: #FF0000" >*</span></label></strong>
                                                <div class="form-group has-success">
                                            
                             <select placeholder="Choose a Zone..." multiple class="standardSelect form-control" tabindex="1" name="zone[]" required>
                            <optgroup label="">
                                <option value=""></option>
                                <option  value="All Zones">All Zones</option> 
                            <option  value="Zone 1">Zone 1</option>  
                              <option value="Zone 2">Zone 2</option>
                              <option value="Zone 3">Zone 3</option>   
                              <option value="Zone 4">Zone 4</option>
                             <option value="Zone 5">Zone 5</option>
                             <option value="Zone 6">Zone 6</option>  
                             <option value="Zone 7">Zone 7</option>
                             <option  value="Zone 8">Zone 8</option>  
                              <option value="Zone 9">Zone 9</option>
                              <option value="Zone 10">Zone 10</option>   
                              <option value="Zone 11">Zone 11</option>
                             <option value="Zone 12">Zone 12</option>
                             <option value="Zone 13">Zone 13</option>  
                             <option value="Zone 14">Zone 14</option>
                             <option  value="Zone 15">Zone 15</option>  
                              <option value="Zone 16">Zone 16</option>
                              <option value="Zone 17">Zone 17</option>   
                              <option value="Zone 18">Zone 18</option>
                             <option value="Zone 19">Zone 19</option>
                             <option value="Zone 20">Zone 20</option>  
                             <option  value="Zone 21">Zone 21</option>  
                              <option value="Zone 22">Zone 22</option>
                              <option value="Zone 23">Zone 23</option>   
                              <option value="Zone 24">Zone 24</option>
                             <option value="Zone 25">Zone 25</option>
                             <option value="Zone 26">Zone 26</option>  
                             <option value="Zone 27">Zone 27</option>
                             <option  value="Zone 28">Zone 28</option>  
                              <option value="Zone 29">Zone 29</option>
                              <option value="Zone 30">Zone 30</option>   
                              <option value="Zone 31">Zone 31</option>
                             <option value="Zone 32">Zone 32</option>
                             <option value="Zone 33">Zone 33</option>  
                             <option value="Zone 34">Zone 34</option>
                             <option  value="Zone 35">Zone 35</option>  
                              <option value="Zone 36">Zone 36</option>
                              <option value="Zone 37">Zone 37</option>   
                              <option value="Zone 38">Zone 38</option>
                             <option value="Zone 39">Zone 39</option>
                             <option value="Zone 40">Zone 40</option>
                             <option  value="Zone 41">Zone 41</option>  
                              <option value="Zone 42">Zone 42</option>
                              <option value="Zone 43">Zone 43</option>   
                              <option value="Zone 44">Zone 44</option>
                             <option value="Zone 45">Zone 45</option>
                             <option value="Zone 46">Zone 46</option>  
                             <option value="Zone 47">Zone 47</option>
                             <option  value="Zone 48">Zone 48</option>  
                              <option value="Zone 49">Zone 49</option>
                              <option value="Zone 50">Zone 50</option>   
                              <option value="Zone 51">Zone 51</option>
                             <option value="Zone 52">Zone 52</option>
                             <option value="Zone 53">Zone 53</option>  
                             <option value="Zone 54">Zone 54</option>
                             <option  value="Zone 55">Zone 55</option>  
                              <option value="Zone 56">Zone 56</option>
                              <option value="Zone 57">Zone 57</option>   
                              <option value="Zone 58">Zone 58</option>
                             <option value="Zone 59">Zone 59</option>
                             <option value="Zone 60">Zone 60</option>  
                             <option  value="Zone 61">Zone 61</option>  
                              <option value="Zone 62">Zone 62</option>
                              <option value="Zone 63">Zone 63</option>   
                              <option value="Zone 64">Zone 64</option>
                             <option value="Zone 65">Zone 65</option>
                             <option value="Zone 66">Zone 66</option>  
                             <option value="Zone 67">Zone 67</option>
                             <option  value="Zone 68">Zone 68</option>  
                              <option value="Zone 69">Zone 69</option>
                              <option value="Zone 70">Zone 60</option>   
                              <option value="Zone 71">Zone 71</option>
                             <option value="Zone 72">Zone 72</option>
                             <option value="Zone 73">Zone 73</option>  
                             <option value="Zone 74">Zone 74</option>
                             <option  value="Zone 75">Zone 75</option>  
                              <option value="Zone 76">Zone 76</option>
                              <option value="Zone 77">Zone 77</option>   
                              <option value="Zone 78">Zone 78</option>
                             <option value="Zone 79">Zone 79</option>
                             <option value="Zone 80">Zone 80</option>
                            </optgroup>
                            </select>
                             </div>
                              </div>
                              <div class="form-group">
                                                <strong><label for="cc-number" class="control-label mb-1">Issues<span style="color: #FF0000" >*</span></label></strong>
                                                <div class="form-group has-success">
                                            <select placeholder="Choose a region..." class="standardSelect form-control" name="issue" tabindex="1" required>
                                            <option disabled selected >Choose an issue...</option>
                                            <option value="Fibre Link">Fibre Link</option>
                                            <option value="Power Issue">Power Issue</option>
                                            <option value="Sms Code Issue">Sms Code Issue</option>
                                            <option value="Portal Unreachable">Portal Unreachable</option>
                                            <option value="Paps Blinking">Paps Blinking</option>
                                            <option value="Theft Cases">Theft Cases</option>
                                            <option value="Power Backup Failure">Power Backup Failure</option> 
                                            <option value="Delayed Feedback">Delayed Feedback</option>
                                            <option value="MPESA API Failure">MPESA API Failure</option> 
                                            <option value="Core Device Failure">Core Device Failure</option>
                                            <option value="Public IP Issue">Public IP Issue</option>
                                            <option value="Speed Issue">Speed Issue</option>
                                            <option value="Sites Unreachable">Sites Unreachable</option>
                                            <option value="No Issues">No Issues</option>
                                            
                                            </select>
                                            </div>
                                            </div>
                                            <strong><div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Cluster(s)</label></strong>
                                                <input id="buildings" name="cluster" type="text" class="form-control cc-number identified visa" maxlength="40" placeholder="Cluster Name">
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="form-group">
                                            <strong><label for="cc-number" class="control-label mb-1">No of Buildings Affected</label></strong>
                                                <input id="buildings" required name="buildings" type="number" class="form-control cc-number identified visa" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==3) return false;" maxlength="40" placeholder="No of Buildings Affected">
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                    <strong><label for="cc-exp" class="control-label mb-1">Start Time<span style="color: #FF0000" >*</span></label></strong>
                                                        <input id="start"  placeholder="Start Time" value="00:00"  name="start" type="time" class="form-control cc-exp"  placeholder="Start Time">
                                                        <span class="help-block"  data-valmsg-replace="true"></span>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                <strong><label for="x_card_code" class="control-label mb-1">End Time<span style="color: #FF0000" >*</span></label></strong>
                                                    <div class="input-group">
                                                        <input id="end" name="end" value="00:00" type="time" class="form-control cc-cvc"  placeholder="End Time">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                            <strong><label for="cc-number" class="control-label mb-1">Duration</label></strong>
                                                <input id="diff" name="duration" type="text" class="form-control cc-number identified visa" maxlength="40" placeholder="Duration">
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="form-group">
                                            <strong> <label for="cc-number" class="control-label mb-1">Comments<span style="color: #FF0000" >*</span></label></strong>
                                            <textarea id="comments" name="comments" type="text" class="form-control cc-number identified visa" required placeholder="Comments" required></textarea>
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="form-group">
                                            <strong><label for="cc-number" class="control-label mb-1">Reported By<span style="color: #FF0000" >*</span></label></strong>
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
<script src="https://cdn.ckeditor.com/4.19.0/standard-all/ckeditor.js"></script>
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
      var editor = CKEDITOR.instances.comments;
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
      var editor = CKEDITOR.instances.comments;
      var value = document.getElementById('htmlArea').value;

      // Set editor content (replace current content).
      // https://ckeditor.com/docs/ckeditor4/latest/api/CKEDITOR_editor.html#method-setData
      editor.setData(value);
    }

    function GetContents() {
      // Get the editor instance that you want to interact with.
      var editor = CKEDITOR.instances.comments;

      // Get editor content.
      // https://ckeditor.com/docs/ckeditor4/latest/api/CKEDITOR_editor.html#method-getData
      alert(editor.getData());
    }

    function ExecuteCommand(commandName) {
      // Get the editor instance that you want to interact with.
      var editor = CKEDITOR.instances.comments;

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
      var editor = CKEDITOR.instances.comments;
      // Checks whether the current editor content contains changes when compared
      // to the content loaded into the editor at startup.
      // https://ckeditor.com/docs/ckeditor4/latest/api/CKEDITOR_editor.html#method-checkDirty
      alert(editor.checkDirty());
    }

    function ResetDirty() {
      // Get the editor instance that you want to interact with.
      var editor = CKEDITOR.instances.comments;
      // Resets the "dirty state" of the editor.
      // https://ckeditor.com/docs/ckeditor4/latest/api/CKEDITOR_editor.html#method-resetDirty
      editor.resetDirty();
      alert('The "IsDirty" status was reset.');
    }

    function Focus() {
      // Get the editor instance that you want to interact with.
      var editor = CKEDITOR.instances.comments;
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

    // Replace the <textarea id="comments"> with a CKEditor 4 instance.
    // A reference to the editor object is returned by CKEDITOR.replace() allowing you to work with editor instances.
    var editor = CKEDITOR.replace('comments', {
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
