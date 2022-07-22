<?php
include("includes.php");
include("session.php");
include("../config/config.php");

?><title>Region Details</title>
        <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                           <center> <strong class="card-title">Regional Data</strong></center>
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
                                    <th>Region</th>
                                    <th>Provider</th>
                                    <th>Public IP</th>
                                    <th>Gateway IP</th>
                                    <th>Router IP</th>
                                    <th>Coreswitch IP</th>
                                    <th>Huawei Port No.</th>
                                    <th>Remote ndsk Id</th>
                                    <th>Mngmt ndsk Id</th>
                                    <th>More</th>
                                    <th>Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
      $sql="SELECT id,region_name,provider,public_ip,gateway_ip,regional_ip,coreswitch_ip,portnumber,mainanydeskId,remoteanydeskId,mngmtanydeskId FROM paneldb.region_description";
      $result=$connection->query($sql);
    
while($row=$result->fetch_array()){
  ?>
  <tr>
   <td><?php echo $row['region_name']?></td>
   <td><?php echo $row['provider']?></td>
   <td><?php echo $row['public_ip']?></td>
   <td><?php echo $row['gateway_ip']?></td>
   <td><?php echo $row['regional_ip']?></td>
   <td><?php echo $row['coreswitch_ip']?></td>
   <td><?php echo $row['portnumber']?></td>
   <td><?php echo $row['remoteanydeskId']?></td>
   <td><?php echo $row['mngmtanydeskId']?></td>
   <td>
         <a href="./region_details.php?id=<?php echo $row['id']?>"><i class="fa fa-eye fa-2x text-info"></i></a>
   </td>
    <td>
        <a href="./edit_regional_report.php?id=<?php echo $row['id']?>"><i class="fa fa-edit fa-2x text-info"></i></a>
             
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

<!-- Right Panel -->
<script type="text/javascript">
// $( document ).ready(function() {
// $('#example').DataTable({
//     order: [[1, 'desc']],
    
// 		 "processing": true,
// 		 "dom": 'lBfrtip',
// 		 "buttons": [
//             {
//                 extend: 'collection',
//                 text: 'Export',
//                 buttons: [
//                     'excel',
//                     'csv'
//                 ]
//             }
//         ],
//         "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
//         "scrollY":        "700px",
//         "scrollCollapse": true
        
//         });
// });
</script>
