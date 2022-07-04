<?php

$api_url = 'http://app.sasakonnect.net:19003/api/Rejected/';

// Read JSON file
$json_data = file_get_contents($api_url);

// Decode JSON data into PHP array
$response_data = json_decode($json_data);

// All user data exists in 'data' object
$user_data = $response_data;;

// Cut long data into small & select only first 10 records
$user_data = array_slice($user_data, 0, 9);

// Print data if need to debug
//print_r($user_data);

// Traverse array and display user data
foreach ($user_data as $user) {
	echo "name: ".$user->Cluster_name;
	echo "<br />";
	echo "name: ".$user->Contact_Person;
	echo "<br /> <br />";
}

?>