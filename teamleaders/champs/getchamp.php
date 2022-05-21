<?php

// Get the user id
$code = $_REQUEST['code'];

// Database connection
include("../../config/config.php");

if ($code !== "") {
	
	// Get corresponding first name and
	// last name for that user id	
	$query = mysqli_query($connection, "SELECT CONCAT(FirstName,' ',LastName) as champ FROM Users WHERE User=6 and ID='$code'");

	$row = mysqli_fetch_array($query);

	// Get the first name
	$cname = $row["champ"];
}

// Store it in a array
$result = array("$cname");

// Send in JSON encoded form
$myJSON = json_encode($result);
echo $myJSON;
?>
