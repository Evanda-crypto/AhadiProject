<?php
include("session.php");
include("../config/config.php");

?>
    <title>Compiled Reports</title>

        <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                           <center> <strong class="card-title">NATS Reports</strong></center>
                        </div>
                        <div class="card-body"><?php
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
                            <table class="table table-bordered table-striped" id="example">
                                <thead>
                                    <tr>
                                    <th>Date</th>
                                    <th>Day</th>
                                    <th>Region</th>
                                    <th>Zones</th>
                                    <th>Clusters</th>
                                    <th>Buildings</th>
                                    <th>Issues</th>
                                    <th>Duration</th>
                                    <th>Comments</th>
                                    <th>Reported By</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
    
    $sql="SELECT Region,dayname(date_reported) as dayn,
    group_concat(buildings ,'".'<br>'."' SEPARATOR ' ' ) AS buildings,
    group_concat( DISTINCT cluster_name ,'".'<br>'."' SEPARATOR ' ' ) AS clusters,
    group_concat( zones ,'".'<br>'."' SEPARATOR ' ' ) AS affectedzones,
    group_concat(DISTINCT date_reported ,'".'<br>'."' SEPARATOR ' ' ) AS date_reported,
    group_concat(DISTINCT issue ,'".'<br>'."' SEPARATOR ' ' ) AS issues,
    group_concat(DISTINCT reporter ,'".'<br>'."' SEPARATOR ' ' ) AS reporter,
    group_concat(Duration ,'".'<br>'."' SEPARATOR ' ' ) AS duration,
    group_concat(DISTINCT comments ,'".'<br>'."' SEPARATOR ' ' ) AS comments from nats_reports GROUP BY dayn,Region,date_reported";
$result=$connection->query($sql);
while($row=$result->fetch_array()){
  ?>
  <tr>
    <td><?php echo $row['date_reported']?></td>
    <td><?php echo $row['dayn']?></td>
    <td><?php echo $row['Region']?></td>
    <td><?php echo $row['affectedzones']?></td>
    <td><?php echo $row['clusters']?></td>
    <td><?php echo $row['buildings']?></td>
    <td><?php echo $row['issues']?></td>
    <td><?php echo $row['duration']?></td>
     <td><?php echo $row['comments']?></td>
     <td><?php echo $row['reporter']?></td>
</tr>
<?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

</div><!-- .content -->

<div class="clearfix"></div>

</div><!-- /#right-panel -->