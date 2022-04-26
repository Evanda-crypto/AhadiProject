<?php

// Get the user id
$teamid = $_REQUEST['teamid'];

// Database connection
include("../../config/config.php");

if ($teamid !== "") {
	
	// Get corresponding first name and
	// last name for that user id	
	$query = mysqli_query($connection, "SELECT * FROM Token_teams WHERE Team_ID='$teamid'");

	$row = mysqli_fetch_array($query);

	// Get the first name
	$members = $row["members"];
    $id = $row["ID"];

}

// Store it in a array
$result = array("$members","$id");

// Send in JSON encoded form
$myJSON = json_encode($result);
echo $myJSON;
?>

