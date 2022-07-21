<?php
include("includes.php");
include("session.php");
include("../config/config.php");

?>
    <title>Turned | On</title>

        <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                           <center> <strong class="card-title">Turned On[All Records]</strong></center>
                        </div>
                       <center> <div class="table-responsive">
        <table border="0" cellspacing="5" cellpadding="5">
        <tbody><tr>
            <td><input type="text" id="min" placeholder="Start Date" style="color:black; margin-top:20px" class="form-control" name="min"></td>
            <td><input type="text" id="max" placeholder="End Date" style="color:black; margin-top:20px"  class="form-control" name="max"></td>
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
                   <th class="th-sm">Region
                  </th>
                   <th class="th-sm">Champ Name
                   </th>
                   <th class="th-sm">Client Name
                   </th>
                   <th class="th-sm">Client Contact
                   </th>
                   <th class="th-sm">MAC Address
                   </th>
                   <th class="th-sm">Date Turned On
                   </th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
    
    $sql="SELECT turnedonpap.ClientID,papdailysales.BuildingName,upper(papdailysales.BuildingCode) as bcode,upper(papdailysales.Region) as reg,papdailysales.ChampName,papdailysales.ClientName,papdailysales.ClientContact,Upper(turnedonpap.MacAddress) as Mac,turnedonpap.PapStatus,turnedonpap.DateTurnedOn, CASE WHEN LENGTH(papdailysales.BuildingCode)>11 THEN CONCAT(papdailysales.BuildingCode,'-',(row_number() over(partition by papdailysales.BuildingCode)),'P')
    WHEN (row_number() over(partition by papdailysales.BuildingCode,papdailysales.Floor)) <=9 THEN CONCAT(upper(papdailysales.BuildingCode),'-',papdailysales.Floor,'0',(row_number() over(partition by papdailysales.BuildingCode,papdailysales.Floor)),'P')
    WHEN (row_number() over(partition by papdailysales.BuildingCode,papdailysales.Floor)) >9 THEN CONCAT(upper(papdailysales.BuildingCode),'-',papdailysales.Floor,(row_number() over(partition by papdailysales.BuildingCode,papdailysales.Floor)),'P')
    end as papcode from papdailysales LEFT JOIN turnedonpap ON turnedonpap.ClientID=papdailysales.ClientID where turnedonpap.ClientID is not null";
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
