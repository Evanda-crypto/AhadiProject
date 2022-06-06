<?php
include "../../config/config.php";
$output=array();
$output['turnedon']=array();

if ($connection) {
    $sql = "SELECT t.ClientID,p.BuildingName,upper(p.BuildingCode) as bcode,upper(p.Region) as reg,p.ClientContact,Upper(t.MacAddress) as Mac,
    CASE WHEN LENGTH(p.BuildingCode)>11 THEN CONCAT(p.BuildingCode,'-',(row_number() over(partition by p.BuildingCode)),'P')
WHEN (row_number() over(partition by p.BuildingCode,p.Floor)) <=9 THEN CONCAT(upper(p.BuildingCode),'-',p.Floor,'0',(row_number() over(partition by p.BuildingCode,p.Floor)),'P')
WHEN (row_number() over(partition by p.BuildingCode,p.Floor)) >9 THEN CONCAT(upper(p.BuildingCode),'-',p.Floor,(row_number() over(partition by p.BuildingCode,p.Floor)),'P')
end as papcode from papdailysales as p LEFT JOIN turnedonpap as t ON t.ClientID=p.ClientID UNION SELECT ClientID,BuildingName,(BuildingCode) as bcode,(Region) as reg,ClientContact,(MacAddress) as Mac,papcode from old order by ClientID asc";

    $result = mysqli_query($connection, $sql);
    if ($result) {
        header("Content-Type: JSON");
        $i = 0;
        while ($row = mysqli_fetch_assoc($result)) {
           extract($row);
           $item=array(
            'id' =>$row['ClientID'],
            'papcode' =>$row['papcode'],
            'Mac' =>$row['Mac'],
            'bname' =>$row['BuildingName'],
            'bcode' =>$row['bcode'],
            'Region' =>$row['reg'],
            'Contact' =>$row['ClientContact'],
           );
           
           array_push($output['turnedon'], $item);
        }
      echo json_encode($output, JSON_PRETTY_PRINT);
    } else {
        die(mysqli_error($connection));
    }
}
?>