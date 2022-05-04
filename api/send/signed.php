
<?php
include "../../config/config.php";
$output=array();
$output['signed']=array();

if ($connection) {
    $sql = "SELECT p.ClientID,p.BuildingName,p.BuildingCode,p.Region,p.ChampName,p.ClientName,p.ClientContact,p.ClientAvailability,
    p.AptLayout,p.DateSigned,p.Note from papdailysales as p 
    LEFT JOIN papnotinstalled as r ON r.ClientID=p.ClientID WHERE r.ClientID is null order by p.DateSigned Desc";

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
            'Champ' =>$row['ChampName'],
            'ClientName' =>$row['ClientName'],
            'Contact' =>$row['ClientContact'],
            'Availability' =>$row['ClientAvailability'],
            'Note' =>$row['Note'],
           );
           
           array_push($output['signed'], $item);
        }
      echo json_encode($output, JSON_PRETTY_PRINT);
    } else {
        die(mysqli_error($connection));
    }
}
?>