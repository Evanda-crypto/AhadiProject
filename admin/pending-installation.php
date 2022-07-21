<?php
include("includes.php");
include("session.php");
include("../config/config.php");

?>
    <title>Pending Installation</title>
        <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                           <center> <strong class="card-title">Pending Installation</strong></center>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="example">
                                <thead>
                                    <tr>
                                    <th>Building Name</th>
                    <th>Building Code</th>
                    <th>Region</th>
                    <th>Client</th>
                    <th>Contact</th>
                    <th>Date Signed</th>
                    <th>Availability</th>
                    <th>Pap Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
    
    $sql="SELECT BuildingName,BuildingCode,Region,ClientName,ClientContact,DateSigned,ClientAvailability,PapStatus from papdailysales where PapStatus ='Assigned' OR PapStatus ='Signed' OR PapStatus ='Restored'";
$result=$connection->query($sql);
while($row=$result->fetch_array()){
  ?>
  <tr>
    <td><?php echo $row['BuildingName']?></td>
    <td><?php echo $row['BuildingCode']?></td>
    <td><?php echo $row['Region']?></td>
    <td><?php echo $row['ClientName']?></td>
    <td><?php echo $row['ClientContact']?></td>
    <td><?php echo $row['DateSigned']?></td>
     <td><?php echo $row['ClientAvailability']?></td>
     <td class="centered colorText"><?php echo $row['PapStatus']?></td>

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
    order: [[6, 'asc']],
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

window.addEventListener('DOMContentLoaded', (event) => {
  var els = document.querySelectorAll('.colorText');
  els.forEach(function(cell) {
    if (cell.textContent === "Assigned") {
      cell.classList.toggle('violet');
    }
    if (cell.textContent === "Turned On") {
      cell.classList.toggle('green');
    }
    if (cell.textContent === "Signed") {
      cell.classList.toggle('blue');
    }
    if (cell.textContent === "Installed") {
      cell.classList.toggle('orange');
    }
    if (cell.textContent === "Restored") {
      cell.classList.toggle('red');
    }
  })
})
</script>
