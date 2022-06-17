<?php

// Get the user id
$bcode = trim($_REQUEST['bcode']);
$get_cluster = substr($bcode,0,-1);
// Database connection
include("../config/config.php");

if ($bcode !== "") {
	
	// Get corresponding first name and
	// last name for that user id	
	$query = mysqli_query($connection, "SELECT iap,oap,region,bname FROM buildings WHERE bcode='$bcode'");

	$row = mysqli_fetch_array($query);

    $sql = mysqli_query($connection, "SELECT COUNT(*) as pap FROM papdailysales WHERE BuildingCode='$bcode' and PapStatus='Turned On'");

	$result = mysqli_fetch_array($sql);


	$sql1 = mysqli_query($connection, "SELECT cluster FROM ip_document_reports WHERE building_codes LIKE '$get_cluster%'");

	$result1 = mysqli_fetch_array($sql1);

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

	// Get cluster
	$cluster = $result1["cluster"];

	// Get cluster code
	#$clustercode = $result1["building_codes"];
}

// Store it in a array
$result = array("$Bname", "$Reg","$pap","$oap","$iap","$cluster");

// Send in JSON encoded form
$myJSON = json_encode($result);
echo $myJSON;
?>
