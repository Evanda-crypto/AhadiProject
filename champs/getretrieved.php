<?php
include "../config/config.php";
if (!empty($_GET["id"])) {
    if ($connection->connect_error) {
        die("Unable to connect database: " . $db->connect_error);
    }
$id=$_GET["id"];
    // Get content from the database
    $query = $connection->query(
        "SELECT * from papdailysales where ClientID =$id"
    );

    if ($query->num_rows > 0) {
        $cmsData = $query->fetch_assoc();
        echo "<table class='table table-striped'>";
        echo "<tr>";
        echo "<td>Reason</td>";
        echo "<td>" . $cmsData["Note"] . "</td>";
        echo "</tr>";
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
        echo "<td>Apt</td>";
        echo "<td>" . $cmsData["Apt"] . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>Date</td>";
        echo "<td>" . $cmsData["updated_at"] . "</td>";
        echo "</tr>";
        echo "</table>";
    } else {
        echo "Content not found....";
    }
} else {
    echo "Content not found....";
}
?>
