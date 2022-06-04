<?php 
include('../config/config.php');
include("session.php");
if(!empty($_GET['id'])){  
     
    if ($connection->connect_error) { 
        die("Unable to connect database: " . $db->connect_error); 
    } 
     
    // Get content from the database 
    $query = $connection->query("SELECT p.Note,p.ChampName,t.ClientName,t.ClientID,t.ClientContact,t.updated_at,t.ClientAvailability,p.BuildingName,p.Region,t.Date,Token_teams.Team_ID,
    p.BuildingCode,p.Floor,p.Apt,p.PhoneAlt from papdailysales as p LEFT JOIN 
    techietask as t on t.ClientID=p.ClientID LEFT JOIN Token_teams ON Token_teams.Team_ID=t.TeamID  LEFT JOIN papinstalled ON papinstalled.ClientID=p.ClientID WHERE t.ClientID is not null AND papinstalled.ClientID is null and Token_teams.Team_ID='" .
                                          $_SESSION["TeamID"] .
                                          "' and t.ClientID = {$_GET['id']}"); 
     
    if($query->num_rows > 0){ 
        $cmsData = $query->fetch_assoc(); 
        echo "<table class='table table-striped'>";
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
        echo "<td>Availability</td>";
        echo "<td>".$cmsData['ClientAvailability']."</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>Phone 1</td>";
        echo "<td>".$cmsData['ClientContact']."</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>Phone 2</td>";
        echo "<td>".$cmsData['PhoneAlt']."</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>Floor</td>";
        echo "<td>".$cmsData['Floor']."</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>Door No</td>";
        echo "<td>".$cmsData['Apt']."</td>";
        echo "</tr>";
        echo"<tr>";
        echo "<td>Champs comment</td>";
        echo "<td>".$cmsData['Note']."</td>";
        echo "</tr>";
        echo"<tr>";
        echo "<td>Time Assigned</td>";
        echo "<td>".$cmsData['updated_at']."</td>";
        echo "</tr>";
        echo "</table>";
    }else{ 
        echo 'Content not found....1'; 
    } 
}else{ 
    echo 'Content not found....2'; 
} 
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
   
    <title></title>
</head>
<body>
      <div class="modal-footer">
    <button type="button" name="submit" class="col-lg-5 btn btn-warning"><a href='papdetails.php?clientid=<?php echo $cmsData['ClientID'];?>'>Installed</a></button>
    <button type="button" name="submit" class="col-lg-5 btn btn-danger"><a href='pap-not-installed.php?clientid=<?php echo $cmsData['ClientID'];?>'>To Restitutes</a></button>
</div>
</body>
</html>
