<?php
include "includes.php";
include "session.php";
include "../config/config.php";
?>
    <title>Reports</title>

        <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                           <center> <strong class="card-title">DevOps Reports</strong></center>
                        </div>
                        <div class="card-body"><?php if (
                            isset($_SESSION["status"])
                        ) { ?>
               <center><span> <div class="alert alert-danger" role="alert">
                   <?php
                   echo $_SESSION["status"];
                   unset($_SESSION["status"]);
                   ?>
                 </div></span></center>
                <?php } elseif (isset($_SESSION["success"])) { ?>
                <center><span><div class="alert alert-success" role="alert">
                   <?php
                   echo $_SESSION["success"];
                   unset($_SESSION["success"]);
                   ?>
                 </div></span></center>
                <?php } ?>
                            <table class="table table-bordered table-striped" id="example">
                                <thead>
                                    <tr>
                                    <th>Day</th>
                                    <th>Date</th>
                                    <th>Project Name</th>
                                    <th>Period(Days)</th>
                                    <th>Key Milestone</th>
                                    <th>Completed Tasks</th>
                                    <th>Ongoing Tasks</th>
                                    <th>Challenges</th>
                                    <th>Comments</th>
                                    <th>Developer(s)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $sql =
                                    "SELECT dayname(reported_at) as dayn,Date(reported_at) as dates,
    group_concat(DISTINCT project_name) AS project,
    group_concat(evaluation_period ,'" .
                                    "<br>" .
                                    "' SEPARATOR ' ') AS periods,
    group_concat( key_milestone ,'" .
                                    "<br>" .
                                    "' SEPARATOR ' ') AS key_milestone,
    group_concat(completed_tasks  ,'" .
                                    "<br>" .
                                    "' SEPARATOR ' ') AS completed_tasks,
    group_concat(ongoing_tasks ,'" .
                                    "<br>" .
                                    "' SEPARATOR ' ') AS ongoing_tasks,
    group_concat( challenges  ,'" .
                                    "<br>" .
                                    "' SEPARATOR ' ') AS challenges,
    group_concat(comments ,'" .
                                    "<br>" .
                                    "' SEPARATOR ' ') AS comments,
    group_concat(developers  ,'" .
                                    "<br>" .
                                    "' SEPARATOR ' ') AS devs from developers_reports GROUP BY dayn,project_name,dates";
                                $result = $connection->query($sql);
                                while ($row = $result->fetch_array()) { ?>
  <tr>
    <td><?php echo $row["dayn"]; ?></td>
    <td><?php echo $row["dates"]; ?></td>
    <td><?php echo $row["project"]; ?></td>
    <td><?php echo $row["periods"]; ?></td>
    <td><?php echo $row["key_milestone"]; ?></td>
    <td><?php echo $row["completed_tasks"]; ?></td>
    <td><?php echo $row["ongoing_tasks"]; ?></td>
    <td><?php echo $row["challenges"]; ?></td>
     <td><?php echo $row["comments"]; ?></td>
     <td><?php echo $row["devs"]; ?></td>
</tr>
<?php }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

</div><!-- .content -->

<div class="clearfix"></div>

</div><!-- /#right-panel -->

<!-- Right Panel -->
