<?php

// Get the user id
$bcode = trim($_REQUEST['bcode']);

// Database connection
include("../config/config.php");

if ($bcode !== "") {
	
	// Get corresponding first name and
	// last name for that user id	
	$query = mysqli_query($connection, "SELECT iap,oap,region,bname FROM buildings WHERE bcode='$bcode'");

	$row = mysqli_fetch_array($query);

    $sql = mysqli_query($connection, "SELECT COUNT(*) as pap FROM papdailysales WHERE BuildingCode='$bcode' and PapStatus='Turned On'");

	$result = mysqli_fetch_array($sql);

	// Get bname
	$Bname = $row["bname"];

	// Get region
	$Reg = $row["region"];

    	// Get oap
	$oap = $row["oap"];

    	// Get iap
	$iap = $row["iap"];

    // Get pap
	$pap = $result["pap"];
}

// Store it in a array
$result = array("$Bname", "$Reg","$pap","$oap","$iap");

// Send in JSON encoded form
$myJSON = json_encode($result);
echo $myJSON;
?>
