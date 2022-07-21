<?php
include("includes.php");
include("session.php");
include("../config/config.php");

?>
    <title>Compiled Report</title>
        <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                           <center> <strong class="card-title">Maton Reports</strong></center>
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
                                    <th>Issue(s)</th>
                                    <th>Region</th>
                                    <th>Zone(s)</th>
                                    <th>Duration</th>
                                    <th>Buildings</th>
                                    <th>Reported By</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
    
    $sql="SELECT issue, occurancedate,region, 
    group_concat( DISTINCT zones ,'".'<br>'."' SEPARATOR ' ' ) AS affectedzones,
    group_concat( DISTINCT building ,'".'<br>'."' SEPARATOR ' ' ) AS buildings,
    group_concat( duration ,'".'<br>'."' SEPARATOR ' ' ) AS duration,
    group_concat( DISTINCT reporter ,'".'<br>'."' SEPARATOR ' ' ) AS reporter,COUNT(issue) as occ
FROM reports
GROUP BY issue,occurancedate,region ORDER BY occurancedate ASC";
$result=$connection->query($sql);
while($row=$result->fetch_array()){
  ?>
  <tr>
    <td><?php echo $row['occurancedate']?></td>
    <td><?php echo $row['issue']?></td>
    <td><?php echo $row['region']?></td>
    <td><?php echo $row['affectedzones']?></td>
    <td><?php echo $row['duration']?></td>
    <td><?php echo $row['buildings']?></td>
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