<?php
include "../config/config.php";
if (!empty($_GET["id"])) {
    if ($connection->connect_error) {
        die("Unable to connect database: " . $db->connect_error);
    }
$id=$_GET["id"];
    // Get content from the database
    $query = $connection->query(
        "SELECT papnotinstalled.ClientID,papnotinstalled.ClientName,papnotinstalled.Contact,papnotinstalled.ChampName,papnotinstalled.Region,papnotinstalled.Availability,papdailysales.PhoneAlt,
        papnotinstalled.Reason,papdailysales.Apt,papdailysales.DateSigned,papdailysales.ClientAvailability,papdailysales.Floor,papnotinstalled.BuildingName,papnotinstalled.BuildingCode,papnotinstalled.Note
        from papnotinstalled LEFT JOIN papdailysales on papdailysales.ClientID=papnotinstalled.ClientID WHERE papnotinstalled.ClientID =$id"
    );

    if ($query->num_rows > 0) {
        $cmsData = $query->fetch_assoc();
        echo "<table class='table table-striped'>";
        echo "<tr>";
        echo "<td>Techie Feedback</td>";
        echo "<td>" . $cmsData["Reason"] . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>Techie Comment</td>";
        echo "<td>" . $cmsData["Note"] . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>DateSigned</td>";
        echo "<td>" . $cmsData["DateSigned"] . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>Client Name</td>";
        echo "<td>" . $cmsData["ClientName"] . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>Phone Main</td>";
        echo "<td>" . $cmsData["Contact"] . "</td>";
        echo "</tr>";
        echo "<td>Region</td>";
        echo "<td>" . $cmsData["Region"] . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>Building</td>";
        echo "<td>" . $cmsData["BuildingName"] . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>Building</td>";
        echo "<td>" . $cmsData["BuildingCode"] . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>Floor</td>";
        echo "<td>" . $cmsData["Floor"] . "</td>";
        echo "</tr>";
        echo "<td>Apt</td>";
        echo "<td>" . $cmsData["Apt"] . "</td>";
        echo "</tr>";
        echo "</table>";
    } else {
        echo "Content not found....";
    }
} else {
    echo "Content not found....";
}
?>
