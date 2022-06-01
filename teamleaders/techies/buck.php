<?php

include("../../config/config.php");
include("session.php");
$id=$_GET['clientid'];

$sql="SELECT 
t.ClientID, 
t.ClientName, 
t.ChampName, 
p.ClientContact, 
p.BuildingName, 
p.BuildingCode, 
upper(t.MacAddress) as mac, 
g.Team_ID,  
t.DateTurnedOn, 
p.Region, 
p.Apt,
i.DateInstalled 
FROM 
turnedonpap as t 
JOIN papdailysales as p ON p.ClientID = t.ClientID 
left join papinstalled as i ON i.ClientID = p.ClientID 
left join Token_teams as g on g.Team_ID = i.Team_ID 
WHERE 
t.ClientID IS NOT null and p.ClientID=$id
and p.Region = '".$_SESSION['Region']."'";
$result=mysqli_query($connection,$sql);
$row=mysqli_fetch_assoc($result);
$champ=$row['ChampName'];
$client=$row['ClientName'];
$contact=$row['ClientContact'];
$region=$row['Region'];
$bname=$row['BuildingName'];
$bcode=$row['BuildingCode'];
$mac=$row['mac'];
$techies=$row['Team_ID'];
$apt=$row['Apt'];


if(isset($_POST['submit'])){
$Client = $_POST['client'];
$Contact = $_POST['contact'];
$Bname = $_POST['bname'];
$Bcode = $_POST['bcode'];
$Region = $_POST['region'];
$Apt = $_POST['apt'];
$Reason = $_POST['reason'];
$Champ = $_POST['champ'];
$Teamid = $_POST['teamid'];
$Mac = $_POST['mac'];
$Reporter = $_POST['reporter'];
$Id = $_POST['id'];

 //checking connection
 if ($connection->connect_error) {
    die("connection failed : " . $connection->connect_error);
} else {
    
    
    $insert = $connection->query(
        "INSERT into retrieved_paps (clientid,client_name,building_name,building_code,region,apt,reason,champ,teamid,contact,mac_address,reporter) VALUES ('$Id','$client','$Bname','$Bcode','$Region','$Apt','$Reason','$Champ','$Teamid','$Contact','$Mac','$Reporter')"
    );

    if ($insert) {
        $query = "DELETE FROM  techietask  WHERE ClientID=$id";
        $result = mysqli_query($connection, $query);

        if($result){
            $sql1 = "DELETE FROM  papdailysales  WHERE ClientID=$id";
             $result1 = mysqli_query($connection, $sql1);

             if($result1){
                $sql2 = "DELETE FROM  papinstalled  WHERE ClientID=$id";
                $result2 = mysqli_query($connection, $sql2);

                if($result2){
                    $sql3 = "DELETE FROM  turnedonpap  WHERE ClientID=$id";
                    $result3 = mysqli_query($connection, $sql3);

                    if($result3){
                        $_SESSION["success"] = "Moved to Retrieved";
                        header("Location: turned-on.php");
                    }else{
                        $_SESSION["status"] = "Not moved!";
                        header("Location: turned-on.php");
                    }
                }else{
                    $_SESSION["status"] = "Not moved!";
                    header("Location: turned-on.php");
                }
             }
             else{
                $_SESSION["status"] = "Not moved!";
                header("Location: turned-on.php");
             }
        }else{
            $_SESSION["status"] = "Not moved!";
        header("Location: turned-on.php");
        }
        
    } else {
        $_SESSION["status"] = "Error please try again!";
        header("Location: turned-on.php");
    }
}
}
?>