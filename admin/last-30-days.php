<?php
include("session.php");
include("../config/config.php");
include("includes.php");
?>
    <title>Turned | On Last | 30 | Days</title>
        <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                           <center> <strong class="card-title">Turned On[Last 30 Days]</strong></center>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped" id="example">
                                <thead>
                                    <tr>
                                    <th class="th-sm">PAP Code
                  </th>
                   <th class="th-sm">Building Name
                   </th>
                   <th class="th-sm">Building Code
                   </th>
                   <th class="th-sm">Region
                  </th>
                   <th class="th-sm">Champ
                   </th>
                   <th class="th-sm">Client
                   </th>
                   <th class="th-sm">Contact
                   </th>
                   <th class="th-sm">MAC Address
                   </th>
                   <th class="th-sm">Date Turned On
                   </th>
                   <th class="th-sm">More
                   </th>  
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
    
    $sql="SELECT t.ClientID,p.BuildingName,upper(p.BuildingCode) as bcode,upper(p.Region) as reg,p.ChampName,p.ClientName,p.ClientContact,Upper(t.MacAddress) as Mac,t.DateTurnedOn, CASE WHEN LENGTH(p.BuildingCode)>10 THEN CONCAT(p.BuildingCode,'-',(row_number() over(partition by p.BuildingCode)),'P')
    WHEN (row_number() over(partition by p.BuildingCode,p.Floor)) <=9 THEN CONCAT(upper(p.BuildingCode),'-',p.Floor,'0',(row_number() over(partition by p.BuildingCode,p.Floor)),'P')
    WHEN (row_number() over(partition by p.BuildingCode,p.Floor)) >9 THEN CONCAT(upper(p.BuildingCode),'-',p.Floor,(row_number() over(partition by p.BuildingCode,p.Floor)),'P')
    end as papcode from papdailysales as p LEFT JOIN turnedonpap as t ON t.ClientID=p.ClientID where t.ClientID is not null and t.DateTurnedOn>= DATE_SUB(CURDATE(), INTERVAL 30 DAY)";
$result=$connection->query($sql);
while($row=$result->fetch_array()){
  ?>
  <tr>
    <td><?php echo $row['papcode']?></td>
    <td><?php echo $row['BuildingName']?></td>
    <td><?php echo $row['bcode']?></td>
    <td><?php echo $row['reg']?></td>
    <td><?php echo $row['ChampName']?></td>
    <td><?php echo $row['ClientName']?></td>
    <td><?php echo $row['ClientContact']?></td>
    <td><?php echo $row['Mac']?></td>
    <td><?php echo $row['DateTurnedOn']?></td>
    <td>
    <button class="btn btn-warning" ><a href="edit-turnedon.php?clientid=<?php echo $row['ClientID']; ?>" class="text-bold">Edit</a></button>
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
$( document ).ready(function() {
$('#example').DataTable({
    order: [[8, 'desc']],
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
        "scrollCollapse": true
        });
});
</script>
