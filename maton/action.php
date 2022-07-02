<?php
include "session.php";
include "../config/config.php";

    $id = $_GET["clientid"];
    
        $sql = "SELECT i.Team_ID,Upper(i.MacAddress) as Mac,CURDATE() as DateTurnedOn,'Turned On' as PapStatus,p.ChampName,p.ClientName,p.ClientID,p.ClientContact,
        p.BuildingName,p.BuildingCode,p.Region FROM papinstalled as i LEFT JOIN papdailysales as p USING(ClientID) where i.ClientID=$id";
        $result = mysqli_query($connection, $sql);
        $rows=array();
        while($row=mysqli_fetch_assoc($result)){
            $rows[]=$row;
        }
        echo json_encode($rows, JSON_PRETTY_PRINT);
        
        $jsonurl = "http://localhost/ahadi/maton/action.php";
        $json = file_get_contents($jsonurl);
        
        //convert json object to php associative array
        $data = json_decode($json, true);
        
       /* foreach ($rows as $dataarray) {
            //get the employee details
            $teamid = $dataarray["Team_ID"];
            $mac = $dataarray["Mac"];
            $bname = $dataarray["BuildingName"];
            $bcode = $dataarray["BuildingCode"];
            $cont = $dataarray["ClientContact"];
            $cname = $dataarray["ClientName"];
            $status = $dataarray["PapStatus"];
            $date = $dataarray["DateTurnedOn"];
            $reg = $dataarray["Region"];
            $id = $dataarray["ClientID"];
            $champ= $dataarray["ChampName"];

            $query = "UPDATE papdailysales set PapStatus='Turned On' where ClientID=$id";
            $result = mysqli_query($connection, $query);

            $sql = "INSERT INTO turnedonpap (Team_ID,MacAddress,ChampName,Region,ClientName,ClientContact,BuildingName,BuildingCode,PapStatus,DateTurnedOn,ClientID)
            VALUES('$teamid', '$mac', '$champ', '$reg','$cname','$cont', '$bname', '$bcode', '$status','$date','$id')";
                if (!mysqli_query($connection, $sql)) {
                    $_SESSION["status"] = "Error";
                    header("Location: installed.php");
                }
                else{
                    $_SESSION["success"] = "Successfull";
                    header("Location: installed.php");
                }

        }*/
        
?>

