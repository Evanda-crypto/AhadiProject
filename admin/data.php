<?php 
// include("session.php");
// include("../config/config.php");

// $result=mysqli_query($connection ,"SELECT papdailysales.ClientID,papdailysales.BuildingName,papdailysales.BuildingCode,papdailysales.Region,papdailysales.ChampName,papdailysales.ClientName,papdailysales.ClientContact,papdailysales.ClientAvailability,papdailysales.AptLayout,papdailysales.DateSigned,papdailysales.Note from papdailysales 
// LEFT JOIN papnotinstalled ON papnotinstalled.ClientID=papdailysales.ClientID WHERE papnotinstalled.ClientID is null and papdailysales.DateSigned >= DATE_SUB(CURDATE(), INTERVAL 30 DAY) order by papdailysales.ClientID Desc");

// $rows=array();
// while($row=mysqli_fetch_assoc($result)){
//     $rows[]=$row;
// }
// echo json_encode($rows, JSON_PRETTY_PRINT);

echo phpinfo();