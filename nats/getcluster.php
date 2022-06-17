<?php

// Get the user id
$code = trim($_REQUEST['clustercode']);

// Database connection
include("../config/config.php");

if ($code !== "") {
	
	// Get corresponding first name and
	// last name for that user id	
	$query = mysqli_query($connection, "SELECT bname FROM buildings WHERE bcode='$code'");

	$row = mysqli_fetch_array($query);

	// Get code
	$bname = $row["bname"];

}

// Store it in a array
$result = array("$bname");

// Send in JSON encoded form
$myJSON = json_encode($result);
echo $myJSON;
?>