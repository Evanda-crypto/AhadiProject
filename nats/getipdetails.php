<?php

// Get the user id
$zone = trim($_REQUEST['zone']);

// Database connection
include("../config/config.php");

if ($zone !== "") {
	
	// Get corresponding first name and
	// last name for that user id	
	$query = mysqli_query($connection, "SELECT vlanid_device,vlanid_user,device_ip,user_ip FROM ip_document_reports WHERE zones='$zone'");

	$row = mysqli_fetch_array($query);

	// Get vlanid_device
	$vlanid_device = $row["vlanid_device"];

	// Get vlanid_user
	$vlanid_user = $row["vlanid_user"];

    
	// Get device_ip
	$device_ip = $row["device_ip"];

	// Get user_ip
	$user_ip = $row["user_ip"];
}

// Store it in a array
$result = array("$vlanid_device", "$vlanid_user","$device_ip","$user_ip");

// Send in JSON encoded form
$myJSON = json_encode($result);
echo $myJSON;
?>