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
                    <div class="card" id="demo">
                        <div class="card-header">
                           <center> <strong class="card-title">NATS Reports</strong></center>
                        </div>
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
            ?><center>   <div class="table-responsive">
            <table border="0" cellspacing="5" cellpadding="5">
            <tbody><tr>
               
                <td><input type="text" id="min" placeholder="Start Date" style="color:black; margin-top:20px" class="form-control" name="min"></td>
                <td><input type="text" id="max" placeholder="End Date" style="color:black;margin-top:20px"  class="form-control" name="max"></td>
            </tr>
        </tbody></table>
                            </div></center>
                        <div class="card-body">
                        <table class="table table-bordered table-striped" id="example">
                                <thead>
                                    <tr>
                                    <th>Day</th>
                                    <th>date</th>
                                    <th>Region</th>
                                    <th>Zones Affected</th>
                                    <th>Clusters</th>
                                    <th>Buildings</th>
                                    <th>Issues Reported</th>
                                    <th>Duration</th>
                                    <th>Comments</th>
                                    <th>Reported By</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
    
    $sql="SELECT Region,dayname(date_reported) as dayn,
    group_concat(buildings ,'".'<br>'."' SEPARATOR ' ' ) AS buildings,
    group_concat( DISTINCT cluster_name ,'".'<br>'."' SEPARATOR ' ' ) AS clusters,
    group_concat( DISTINCT zones ,'".'<br>'."' SEPARATOR ' ' ) AS affectedzones,
    group_concat(DISTINCT date_reported ,'".'<br>'."' SEPARATOR ' ' ) AS date_reported,
    group_concat(DISTINCT issue ,'".'<br>'."' SEPARATOR ' ' ) AS issues,
    group_concat(DISTINCT reporter ,'".'<br>'."' SEPARATOR ' ' ) AS reporter,
    group_concat(Duration ,'".'<br>'."' SEPARATOR ' ' ) AS duration,
    group_concat(DISTINCT comments ,'".'<br>'."' SEPARATOR ' ' ) AS comments from nats_reports GROUP BY dayn,Region,date_reported";
$result=$connection->query($sql);
while($row=$result->fetch_array()){
  ?>
  <tr>
    <td><?php echo $row['dayn']?></td>
    <td><?php echo $row['date_reported']?></td>
    <td><?php echo $row['Region']?></td>
    <td><?php echo $row['affectedzones']?></td>
    <td><?php echo $row['clusters']?></td>
    <td><?php echo $row['buildings']?></td>
    <td><?php echo $row['issues']?></td>
    <td><?php echo $row['duration']?></td>
     <td><?php echo $row['comments']?></td>
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

<!-- Right Panel -->
<script>
      
      $.fn.dataTable.Api.register( 'column().data().sum()', function () {
    return this.reduce( function (a, b) {
        var x = parseFloat( a ) || 0;
        var y = parseFloat( b ) || 0;
        return x + y;
    } );
} );
 
var minDate, maxDate;
 
 // Custom filtering function which will search data in column four between two values
 $.fn.dataTable.ext.search.push(
     function( settings, data, dataIndex ) {
         var min = minDate.val();
         var max = maxDate.val();
         var date = new Date( data[1] );
  
         if (
             ( min === null && max === null ) ||
             ( min === null && date <= max ) ||
             ( min <= date   && max === null ) ||
             ( min <= date   && date <= max )
         ) {
             return true;
         }
         return false;
     }
 );
  
/* Init the table and fire off a call to get the hidden nodes. */
$(document).ready(function() {
    // Create date inputs
    minDate = new DateTime($('#min'), {
         format: 'MMMM Do YYYY'
     });
     maxDate = new DateTime($('#max'), {
         format: 'MMMM Do YYYY'
     });

     // Refilter the table
     $('#min, #max').on('change', function () {
         table.draw();
     });
    var table = $('#example').DataTable(
        {
            order: [[1, 'desc']],
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        "scrollY":        "700px",
        "scrollCollapse": true,
        "pagingType": "full_numbers",
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
        ]
        }
    );
} );
  </script>
