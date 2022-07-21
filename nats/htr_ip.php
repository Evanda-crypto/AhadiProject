<?php
include("includes.php");
include("session.php");
include("../config/config.php");

?>
    <title>IP Reports HTR</title>

        <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                           <center> <strong class="card-title">IP Reports HTR</strong></center>
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
                                    <th>Zone</th>
                                    <th>vlanid_device</th>
                                    <th>vlanid_user</th>
                                    <th>device_ip</th>
                                    <th>user_ip</th>
                                    <th>cluster</th>
                                    <th>Buildings</th>
                                    <th>Codes</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
    
    $sql="SELECT 
    group_concat(DISTINCT zones ,'".'<br>'."' SEPARATOR ' ' ) AS zones,
    group_concat(DISTINCT vlanid_device ,'".'<br>'."' SEPARATOR ' ' ) AS vlanid_device,
    group_concat(DISTINCT vlanid_user ,'".'<br>'."' SEPARATOR ' ' ) AS vlanid_user,
    group_concat(DISTINCT device_ip ,'".'<br>'."' SEPARATOR ' ' ) AS device_ip,
    group_concat(DISTINCT user_ip ,'".'<br>'."' SEPARATOR ' ' ) AS user_ip,
    group_concat(DISTINCT cluster ,'".'<br>'."' SEPARATOR ' ' ) AS cluster,
    group_concat(buildings ,'".'<br>'."' SEPARATOR ' ' ) AS buildings,
    group_concat(building_codes ,'".'<br>'."' SEPARATOR ' ' ) AS building_codes,
    group_concat(bstatus ,'".'<br>'."' SEPARATOR ' ' ) AS bstatus   
    from ip_document_reports where region='HTR' group by zones,cluster";
$result=$connection->query($sql);
while($row=$result->fetch_array()){
  ?>
  <tr>
    <td><?php echo $row['zones']?></td>
    <td><?php echo $row['vlanid_device']?></td>
    <td><?php echo $row['vlanid_user']?></td>
    <td><?php echo $row['device_ip']?></td>
    <td><?php echo $row['user_ip']?></td>
    <td><?php echo $row['cluster']?></td>
    <td><?php echo $row['buildings']?></td>
    <td><?php echo $row['building_codes']?></td>
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

<!-- Right Panel -->