

<?php
include "../../config/config.php";
$output=array();
$output['pending']=array();

if ($connection) {
    $sql = "SELECT p.ClientID,p.ClientAvailability,p.ClientName,p.ClientContact,p.BuildingName,p.BuildingCode,p.DateSigned,p.Region FROM papdailysales as p 
    left join papinstalled as i on p.ClientID=i.ClientID left join papnotinstalled as r on 
    r.ClientID=p.ClientID where i.ClientID is null and r.ClientID is null";

    $result = mysqli_query($connection, $sql);
    if ($result) {
        header("Content-Type: JSON");
        $i = 0;
        while ($row = mysqli_fetch_assoc($result)) {
           extract($row);
           $item=array(
            'DateSigned' =>$row['DateSigned'],
            'ClientID' =>$row['ClientID'],
            'BuildingName' =>$row['BuildingName'],
            'BuildingCode' =>$row['BuildingCode'],
            'Region' =>$row['Region'],
            'ClientName' =>$row['ClientName'],
            'Contact' =>$row['ClientContact'],
            'Availability' =>$row['ClientAvailability'],
           );
           
           array_push($output['pending'], $item);
        }
      echo json_encode($output, JSON_PRETTY_PRINT);
    } else {
        die(mysqli_error($connection));
    }
}
?>