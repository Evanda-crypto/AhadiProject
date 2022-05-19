<?php

// Get the user id
$bcode = $_REQUEST['bcode'];

// Database connection
include("../config/config.php");

if ($bcode !== "") {
	
	// Get corresponding first name and
	// last name for that user id	
	$query = mysqli_query($connection, "SELECT region,bname FROM buildings WHERE bcode='$bcode'");

	$row = mysqli_fetch_array($query);

	// Get the first name
	$Bname = $row["bname"];

	// Get the first name
	$Reg = $row["region"];
}

// Store it in a array
$result = array("$Bname", "$Reg");

// Send in JSON encoded form
$myJSON = json_encode($result);
echo $myJSON;
?>
