<?php
include("includes.php");
include "session.php";
include "../config/config.php";
?>
    <title>Completed | Work</title>

        <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                           <center> <strong class="card-title">Completed Tasks</strong></center></div>
                        <center>   <div class="table-responsive">
        <table border="0" cellspacing="5" cellpadding="5">
        <tbody><tr>
           
            <td><input type="text" id="min" placeholder="Start Date" style="color:black; margin-top:20px" class="form-control" name="min"></td>
            <td><input type="text" id="max" placeholder="End Date" style="color:black;margin-top:20px"  class="form-control" name="max"></td>
        </tr>
    </tbody></table>
                        </div></center>
                        <div class="card-body" id="demo">
                        <table class="table table-bordered table-striped" id="example">
                                <thead>
                                    <tr>
      <th class="th-sm">Building Name
      </th>
      <th class="th-sm">Building Code
      </th>
      <th class="th-sm">Region
      </th>
      <th class="th-sm">Mac Address
      </th>
      <th class="th-sm">Techie 1
      </th>
      <th class="th-sm">Techie 2
      </th>
      <th class="th-sm">Techie 3
      </th>
      <th class="th-sm">Date Installed
      </th>
      <th class="th-sm">Labour Cost
      </th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $query = "SELECT i.ClientID,p.Region,p.BuildingName,p.BuildingCode,upper(i.MacAddress) as mac,t.Techie1,t.Techie2,t.Techie3,FLOOR(300/i.split) as amount,
                                p.Region,i.DateInstalled FROM papdailysales as p left join papinstalled as i ON i.ClientID=p.ClientID left join Token_teams as t on t.Team_ID=i.Team_ID 
                                WHERE i.DateInstalled >= DATE_SUB(CURDATE(), INTERVAL 35 DAY)";
                                $result = mysqli_query($connection, $query);

                                while ($row = mysqli_fetch_assoc($result)) { ?>
                                <tr>
                                    <td><?php echo $row["BuildingName"]; ?></td>
                                    <td><?php echo $row["BuildingCode"]; ?></td>
                                    <td><?php echo $row["Region"]; ?></td>
                                    <td><?php echo $row["mac"]; ?></td>
                                    <td><?php echo $row["Techie1"]; ?></td>
                                    <td><?php echo $row["Techie2"]; ?></td>
                                    <td><?php echo $row["Techie3"]; ?></td>
                                    <td><?php echo $row["DateInstalled"]; ?></td>
                                    <td><?php echo $row["amount"]; ?></td>
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
         var date = new Date( data[7] );
  
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
            order: [[7, 'desc']],
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
</body>
</html> 
