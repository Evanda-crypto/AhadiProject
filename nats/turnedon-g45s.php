<?php
include("includes.php");
include("session.php");
include("../config/config.php");

?>
    <title>Turnedon G45S</title>
<style>
    .green {
  color: green;
}

.violet {
  color: violet;
}
.blue{
    color:blue;
}.orange{
    color:orange;
}
.red{
    color:red;
}
</style>
        <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                           <center> <strong class="card-title">Turned On[G45S]</strong></center>
                        </div>
                        <center> <div class="table-responsive">
        <table border="0" cellspacing="5" cellpadding="5">
        <tbody><tr>
            <td><input type="text" id="min" placeholder="Start Date" style="color:black; margin-top:20px" class="form-control" name="min"></td>
            <td><input type="text" id="max" placeholder="End Date" style="color:black;margin-top:20px"  class="form-control" name="max"></td>
        </tr>
    </tbody></table>
                        </div></center>
                        <div class="card-body" id="demo">
                            <table class="table table-striped" id="example">
                                <thead>
                                    <tr>
                                    <th class="th-sm">PAP Code
                  </th>
                   <th class="th-sm">Building Name
                   </th>
                   <th class="th-sm">Building Code
                   </th>
                   <th class="th-sm">Champ
                   </th>
                   <th class="th-sm">Client
                   </th>
                   <th class="th-sm">Contact
                   </th>
                   <th class="th-sm">MAC
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
    end as papcode from papdailysales as p LEFT JOIN turnedonpap as t ON t.ClientID=p.ClientID where t.ClientID is not null and p.Region='G45S' UNION SELECT ClientID,BuildingName,BuildingCode,Region,ChampName,ClientName,ClientContact,MacAddress,DateTurnedOn,papcode from old where Region='G45S'";
$result=$connection->query($sql);
while($row=$result->fetch_array()){
  ?>
  <tr>
    <td><?php echo $row['papcode']?></td>
    <td><?php echo $row['BuildingName']?></td>
    <td><?php echo $row['bcode']?></td>
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

<!-- Scripts -->
<!-- <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
<script src="../assets/js/main.js"></script> -->


<script>
      
//       $.fn.dataTable.Api.register( 'column().data().sum()', function () {
//     return this.reduce( function (a, b) {
//         var x = parseFloat( a ) || 0;
//         var y = parseFloat( b ) || 0;
//         return x + y;
//     } );
// } );
 
// var minDate, maxDate;
 
//  // Custom filtering function which will search data in column four between two values
//  $.fn.dataTable.ext.search.push(
//      function( settings, data, dataIndex ) {
//          var min = minDate.val();
//          var max = maxDate.val();
//          var date = new Date( data[7] );
  
//          if (
//              ( min === null && max === null ) ||
//              ( min === null && date <= max ) ||
//              ( min <= date   && max === null ) ||
//              ( min <= date   && date <= max )
//          ) {
//              return true;
//          }
//          return false;
//      }
//  );
  
// /* Init the table and fire off a call to get the hidden nodes. */
// $(document).ready(function() {
//     // Create date inputs
//     minDate = new DateTime($('#min'), {
//          format: 'MMMM Do YYYY'
//      });
//      maxDate = new DateTime($('#max'), {
//          format: 'MMMM Do YYYY'
//      });

//      // Refilter the table
//      $('#min, #max').on('change', function () {
//          table.draw();
//      });
//     var table = $('#example').DataTable(
        
//         {
             
//         "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
//         "scrollY":        "700px",
//         "scrollCollapse": true,
//         "pagingType": "full_numbers",
//         "processing": true,
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
//         order: [[7, 'desc']],
//         }
//     );
// } );


</script>
<!--<script type='text/javascript'>
    $(document).ready(function(){
       //Iterate through each of the rows
        $('tr').each(function(){
          //Check the value of the last <td> element in the row (trimmed to ignore white-space)
          if($(this).find('td:eq(8)').text().trim() < "2022-01-01"){
              //Set the row to green
              $(this).css('background','green');
          }
        });
    });
</script>-->
