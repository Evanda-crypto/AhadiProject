<?php
include("includes.php");
include("session.php");
include("../config/config.php");

?>
    <title>Restituted</title>
      <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                           <center> <strong class="card-title">Restituted</strong></center>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="example">
                                <thead>
                                    <tr>
                     <th>Client</th>
                     <th>Contact</th>
                     <th>Building Name</th>
                     <th>BuildingCode</th>
                     <th>Champ</th>
                     <th>Region</th>
                     <th>Techies</th>
                    <th>Reason</th>
                    <th>Comments</th>
                                    </tr>
                                </thead>
                                <tbody>
                               
 <?php
 $query =
     "SELECT papnotinstalled.ClientID,papnotinstalled.ClientName,papnotinstalled.BuildingName,papnotinstalled.BuildingCode,papnotinstalled.Region,papnotinstalled.Floor,papnotinstalled.DateSigned,papnotinstalled.Reason,papnotinstalled.Contact,papnotinstalled.ChampName,CONCAT(papnotinstalled.Techie1,'/',papnotinstalled.Techie2) as techies,papnotinstalled.Note from papnotinstalled";
 $result = mysqli_query($connection, $query);
 while ($row = mysqli_fetch_assoc($result)) { ?>
                                <tr>
                                    <td><?php echo $row["ClientName"]; ?></td>
                                    <td><?php echo $row["Contact"]; ?></td>
                                    <td><?php echo $row["BuildingName"]; ?></td>
                                    <td><?php echo $row["BuildingCode"]; ?></td>
                                    <td><?php echo $row["ChampName"]; ?></td>
                                    <td><?php echo $row["Region"]; ?></td>
                                    <td><?php echo $row["techies"]; ?></td>
                                    <td><?php echo $row["Reason"]; ?></td>
                                    <td><?php echo $row["Note"]; ?></td>
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
<script type="text/javascript">
$( document ).ready(function() {
$('#example').DataTable({
		 "processing": true,
		 "dom": 'lBfrtip',
		 "buttons": [
            {
                extend: 'collection',
                text: 'Export',
                buttons: [
                    'excel',
                    'csv'
                ]
            }
        ],
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        "scrollY":        "700px",
        "scrollCollapse": true,
        "pagingType": "full_numbers"
        });
});
</script>
