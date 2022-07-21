<?php
include("includes.php");
include("session.php");
include("../config/config.php");

?>

    <title>Reports</title>
  
        <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                           <center> <strong class="card-title">Developers Reports</strong></center>
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
                                    <th>Day</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Period(Days)</th>
                                    <th>Project Name</th>
                                    <th>Key Milestone</th>
                                    <th>Completed Tasks</th>
                                    <th>Ongoing Tasks</th>
                                    <th>Challenges</th>
                                    <th>Comments</th>
                                    <th>Developer(s)</th>
                                    <th>More</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
    
    $sql="SELECT id,DAYNAME(reported_at) as dayn,reported_at,project_name,report_start_date,report_end_date,evaluation_period,key_milestone,completed_tasks,ongoing_tasks,challenges,comments,developers from developers_reports";
$result=$connection->query($sql);
while($row=$result->fetch_array()){
  ?>
  <tr>
    <td><?php echo $row['dayn']?></td>
    <td><?php echo $row['report_start_date']?></td>
    <td><?php echo $row['report_end_date']?></td>
    <td><?php echo $row['evaluation_period']?></td>
    <td><?php echo $row['project_name']?></td>
    <td><?php echo $row['key_milestone']?></td>
    <td><?php echo $row['completed_tasks']?></td>
    <td><?php echo $row['ongoing_tasks']?></td>
    <td><?php echo $row['challenges']?></td>
     <td><?php echo $row['comments']?></td>
     <td><?php echo $row['developers']?></td>
     <td>
        <button class="btn btn-danger"><a href="delete_dev_report.php?id=<?php echo $row['id']; ?> " onClick="return confirm('Sure to delete <?php  echo $row['key_milestone']; ?> reported by <?php  echo $row['developers']; ?> from Reports?')">Delete</a></button>
        </td>
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

