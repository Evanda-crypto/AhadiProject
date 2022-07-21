<?php
include("includes.php");
include("session.php");
include("../config/config.php");

if (isset($_POST["submit"])) {
    $start = $_POST["start"];
    $end = $_POST["end"];
    $Region = $_POST["Region"];
    $sql =
        "SELECT Region,issue,COUNT(issue) as occ
        FROM reports where occurancedate BETWEEN '" .
        $start .
        "' AND '" .
        $end .
        "' AND Region='".$Region."'
        GROUP BY issue";
    $result = mysqli_query($connection, $sql);
    $chart_data = "";
    while ($row = mysqli_fetch_array($result)) {
        $all = $row["Region"];
        $issue[] = $row["issue"];
        $occ[] = $row["occ"];
    }
} else {
    $sql = "SELECT issue,COUNT(issue) as occ
        FROM reports where occurancedate>= DATE_SUB(CURDATE(), INTERVAL 7 DAY)
        GROUP BY issue";
    $result = mysqli_query($connection, $sql);
    $chart_data = "";
    while ($row = mysqli_fetch_array($result)) {
        $all = "All Regions";
        $issue[] = $row["issue"];
        $occ[] = $row["occ"];
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
    <title>Graphs and Charts</title>
        <!-- Content -->
        <div class="content">
            <div class="animated fadeIn">
                <div class="row">

                   <div class="col-lg-12">
                        <div class="card"><div class="card-header">
                           <center> <strong class="card-title">Daily Reports[Number of Times Issue was Reported]</strong></center>
                        </div><form method="POST">
                       <center> <div class="table-responsive">
        <table border="0" cellspacing="5" cellpadding="5">
        <tbody><tr>
        <td><div class="form-group"><div class="form-group has-success">
                                            <select data-placeholder="Choose a region..." class="standardSelect form-control" name="Region" tabindex="1" style="color:black; margin-top:35px;">
                                            <option ><?php echo $all;?></option>
                                            <option value="G44">G44</option>
                                            <option value="ZMM">ZMM</option>
                                            <option value="G45S">G45S</option>
                                            <option value="G45N">G45N</option>
                                            <option value="R&M">R&M</option>
                                            <option value="LSM">LSM</option>
                                            <option value="KWT">KWT</option> 
                                            <option value="HTR">HTR</option>
                                            <option value="STN">STN</option>
                                            <option value="MWK">MWK</option>
                                            </select>
                                            </div>
                                            </div></td>
        <td><input type="date" value="<?php echo date("Y-m-d", strtotime("-6 days")); ?>" style="color:black; margin-top:20px;" class="form-control" name="start"></td>
            <td><input type="date" value="<?php echo date("Y-m-d"); ?>" style="color:black; margin-top:20px;" class="form-control" name="end"></td>
            <td><button type="submit" name="submit" class="btn btn-primary btn-block" style="background-color:#85ce36;margin-top:20px;">Show Graph</button></td>
        </tr>
    </tbody></table></div></center></form>
                            <div class="card-body">
                                <h4 class="mb-3"></h4>
                                <canvas id="reports"></canvas>
                            </div>
                        </div>
                    </div><!-- /# column -->
                              </div><!--/row-->



        <!-- /.content -->
        <div class="clearfix"></div>
    </div>
    <!-- /#right-panel -->
    <script>

        // single bar chart
        var ctx = document.getElementById( "reports" );
    ctx.height = 90;
    var myChart = new Chart( ctx, {
        type: 'bar',
        data: {
            labels:  <?php echo json_encode($issue)?>,
            datasets: [
                {
                    label: <?php echo json_encode($all)?>,
                    data: <?php echo json_encode($occ)?>,
                    borderColor: "rgba(0, 194, 146, 0.9)",
                    borderWidth: "0",
                    backgroundColor: ['#FF6633', '#FFB399', '#FF33FF', '#FFFF99', '#00B3E6', 
		  '#E6B333', '#3366E6', '#999966', '#99FF99', '#B34D4D',
		  '#80B300', '#809900', '#E6B3B3', '#6680B3', '#66991A', 
		  '#FF99E6', '#CCFF1A', '#FF1A66', '#E6331A', '#33FFCC',
		  '#66994D', '#B366CC', '#4D8000', '#B33300', '#CC80CC', 
		  '#66664D', '#991AFF', '#E666FF', '#4DB3FF', '#1AB399',
		  '#E666B3', '#33991A', '#CC9999', '#B3B31A', '#00E680', 
		  '#4D8066', '#809980', '#E6FF80', '#1AFF33', '#999933',
		  '#FF3380', '#CCCC00', '#66E64D', '#4D80CC', '#9900B3', 
		  '#E64D66', '#4DB380', '#FF4D4D', '#99E6E6', '#6666FF']
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