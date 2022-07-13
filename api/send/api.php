
<?php
include "../../config/config.php";

$id = $_GET['id'];
$output=array();
$output['data']=array();

if ($connection) {
    $sql = "SELECT ClientName,BuildingName,BuildingCode,Region,ClientContact,PhoneAlt  from papdailysales where ClientID=$id";

    $result = mysqli_query($connection, $sql);
    if ($result) {
        header("Content-Type: JSON");
        $i = 0;
        while ($row = mysqli_fetch_assoc($result)) {
           extract($row);
           $item=array(
            'Name' =>ucwords($row['ClientName']),
            'Building' =>$row['BuildingName'],
            'Code' =>$row['BuildingCode'],
            'Region' =>$row['Region'],
            'Phone 1' =>$row['ClientContact'],
            'Phone 2' =>$row['PhoneAlt'],
            
           );
           
           array_push($output['data'], $item);
        }
      echo json_encode($output, JSON_PRETTY_PRINT);
    } else {
        die(mysqli_error($connection));
    }
}
?>