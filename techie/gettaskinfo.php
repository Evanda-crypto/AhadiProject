<?php 
include('../config/config.php');
include("session.php");
if(!empty($_GET['id'])){  
     
    if ($connection->connect_error) { 
        die("Unable to connect database: " . $db->connect_error); 
    } 
     
    // Get content from the database 
    $query = $connection->query("SELECT i.ClientID,p.ChampName,p.ClientContact,p.Apt,p.ClientName,p.BuildingName,p.BuildingCode,i.Floor,i.MacAddress,i.DateInstalled 
    from papinstalled as i left join papdailysales as p on p.ClientID=1.ClientID WHERE i.ClientID = {$_GET['id']}"); 
     
    if($query->num_rows > 0){ 
        $cmsData = $query->fetch_assoc(); 
        echo "<table class='table table-striped'>";
        echo "<td>Mac Address</td>";
        echo "<td>".$cmsData['MacAddress']."</td>";
        echo "</tr>";
        echo"</tr>";
        echo "<tr>";
        echo "<td>Building Name</td>";
        echo "<td>".$cmsData['BuildingName']."</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>Building Code</td>";
        echo "<td>".$cmsData['BuildingCode']."</td>";
        echo "</tr>";
        echo "<td>Champ</td>";
        echo "<td>".$cmsData['ChampName']."</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>Client Name</td>";
        echo "<td>".$cmsData['ClientName']."</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>Contact</td>";
        echo "<td>".$cmsData['ClientContact']."</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>Floor</td>";
        echo "<td>".$cmsData['Floor']."</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>Door No</td>";
        echo "<td>".$cmsData['Apt']."</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>Date Installed</td>";
        echo "<td>".$cmsData['DateInstalled']."</td>";
        echo "</tr>";
        echo "</table>";
    }else{ 
        echo 'Content not found....1'; 
    } 
}else{ 
    echo 'Content not found....2'; 
} 
?>