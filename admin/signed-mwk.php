<?php
include("session.php");
include("../config/config.php");

?>
    <title>Signed MWK</title>
    
        <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                           <center> <strong class="card-title">Signed [MWK]</strong></center>
                        </div>
                        <div class="card-body">
                        <?php
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
                            <table class="table table-striped" id="example">
                                <thead>
                                    <tr>
                     <th>Building Name</th>
                     <th>Building Code</th>
                     <th>Champ</th>
                     <th>Client</th>
                     <th>Contact</th>
                     <th>Date Signed</th>
                     <th>Availability</th>
                     <th>Champs Comment</th>
                     <th>Pap Status</th>
                     <th>More</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                        $query  = "SELECT 
                        p.PapStatus, 
                        p.ClientID, 
                        p.BuildingName, 
                        p.BuildingCode, 
                        p.Region, 
                        p.ChampName, 
                        p.ClientName, 
                        p.ClientContact, 
                        p.ClientAvailability, 
                        p.AptLayout, 
                        p.DateSigned, 
                        p.Note 
                      from 
                        papdailysales as p 
                        left join papnotinstalled as r on r.ClientID = p.ClientID 
                      where 
                        r.ClientID is null 
                        and p.PapStatus <> 'Retrieved' 
                        and p.Region = 'MWK'";
                        $result  = mysqli_query($connection, $query);

                            while ($row = mysqli_fetch_array($result)) {
                            
                        ?>
                                <tr>
                                    <td><?php echo $row['BuildingName']; ?></td>
                                    <td><?php echo $row['BuildingCode']; ?></td>
                                    <td><?php echo $row['ChampName']; ?></td>
                                    <td><?php echo $row['ClientName']; ?></td>
                                    <td><?php echo $row['ClientContact']; ?></td>
                                    <td><?php echo $row['DateSigned']; ?></td>
                                    <td><?php echo $row['ClientAvailability']; ?></td>
                                    <td><?php echo $row['Note']; ?></td>
                                    <td class="centered colorText"><?php echo $row['PapStatus']; ?></td>
                                    <td>
                                    <button class="btn btn-warning" ><a href="edit-records.php?clientid=<?php echo $row['ClientID']; ?>" class="text-bold">Edit</a></button>
                                    </td>
                                </tr>
                        <?php

                            }
                    
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
    order: [[5, 'desc']],
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
