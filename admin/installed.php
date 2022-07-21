<?php
include("includes.php");
include("session.php");
include("../config/config.php");

?>

    <title>Installed</title>

        <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                           <center> <strong class="card-title">Installed</strong></center>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="example">
                                <thead>
                                    <tr>
                                    <th>Building Name</th>
                    <th>Building Code</th>
                    <th>Region</th>
                    <th>Mac</th>
                    <th>Date Installed</th>
                    <th>Client</th>
                    <th>Contact</th>
                   <th>Floor</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
    
    $sql="SELECT papdailysales.Floor,papdailysales.ClientName,papdailysales.BuildingName,papdailysales.BuildingCode,papdailysales.Region,Upper(papinstalled.MacAddress) as Mac,papinstalled.DateInstalled,papinstalled.ClientID,papdailysales.ClientContact  
    FROM Token_teams LEFT JOIN papinstalled on Token_teams.Team_ID=papinstalled.Team_ID left join turnedonpap on papinstalled.ClientID=turnedonpap.ClientID JOIN papdailysales on papdailysales.ClientID=papinstalled.ClientID WHERE turnedonpap.ClientID is null ORDER BY papinstalled.DateInstalled ASC";
$result=$connection->query($sql);
while($row=$result->fetch_array()){
  ?>
  <tr>
    <td><?php echo $row['BuildingName']?></td>
    <td><?php echo $row['BuildingCode']?></td>
    <td><?php echo $row['Region']?></td>
    <td><?php echo $row['Mac']?></td>
    <td><?php echo $row['DateInstalled']?></td>
    <td><?php echo $row['ClientName']?></td>
     <td><?php echo $row['ClientContact']?></td>
    <td><?php echo $row['Floor']?></td>
   
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
