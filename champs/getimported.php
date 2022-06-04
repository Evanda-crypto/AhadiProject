<?php
include "../config/config.php";
if (!empty($_GET["id"])) {
    if ($connection->connect_error) {
        die("Unable to connect database: " . $db->connect_error);
    }
$id=$_GET["id"];
    // Get content from the database
    $query = $connection->query(
        "SELECT * from old where id =$id"
    );

    if ($query->num_rows > 0) {
        $cmsData = $query->fetch_assoc();
        echo "<table class='table table-striped'>";
        echo "<tr>";
        echo "<td>Building Name</td>";
        echo "<td>" . $cmsData["BuildingName"] . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>Building Code</td>";
        echo "<td>" . $cmsData["BuildingCode"] . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>Region</td>";
        echo "<td>" . $cmsData["Region"] . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>Client</td>";
        echo "<td>" . $cmsData["ClientName"] . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>Contact</td>";
        echo "<td>" . $cmsData["ClientContact"] . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>Status</td>";
        echo "<td>" . $cmsData["PapStatus"] . "</td>";
        echo "</tr>";
        echo "</table>";
    } else {
        echo "Content not found....";
    }
} else {
    echo "Content not found....";
}
?>