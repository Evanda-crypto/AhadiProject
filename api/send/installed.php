
<?php
include "../../config/config.php";
$output=array();
$output['installed']=array();

if ($connection) {
    $sql = "SELECT p.Floor,p.ClientName,p.BuildingName,p.BuildingCode,p.Region,Upper(i.MacAddress) as Mac,i.DateInstalled,i.ClientID,p.ClientContact  
    FROM Token_teams as t LEFT JOIN papinstalled as i on t.Team_ID=i.Team_ID left join turnedonpap on i.ClientID=turnedonpap.ClientID JOIN papdailysales as p 
    on p.ClientID=i.ClientID WHERE i.ClientID is NOT null and turnedonpap.ClientID is null ORDER BY i.DateInstalled ASC";

    $result = mysqli_query($connection, $sql);
    if ($result) {
        header("Content-Type: JSON");
        $i = 0;
        while ($row = mysqli_fetch_assoc($result)) {
           extract($row);
           $item=array(
            'BuildingName' =>$row['BuildingName'],
            'BuildingCode' =>$row['BuildingCode'],
            'Region' =>$row['Region'],
            'Floor' =>$row['Floor'],
            'ClientName' =>$row['ClientName'],
            'Region' =>$row['Region'],
            'Mac' =>$row['Mac'],
           );
           
           array_push($output['installed'], $item);
        }
      echo json_encode($output, JSON_PRETTY_PRINT);
    } else {
        die(mysqli_error($connection));
    }
}
?>