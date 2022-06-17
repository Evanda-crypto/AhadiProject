<?php

// Get the user id
$bname = trim($_REQUEST['cluster']);

// Database connection
include("../config/config.php");

if ($bname !== "") {
	
	// Get corresponding first name and
	// last name for that user id	
	$query = mysqli_query($connection, "SELECT bcode FROM buildings WHERE bname='$bname'");

	$row = mysqli_fetch_array($query);

	// Get code
	$code = $row["bcode"];

}

// Store it in a array
$result = array("$code");

// Send in JSON encoded form
$myJSON = json_encode($result);
echo $myJSON;
?>