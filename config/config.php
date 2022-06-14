<?php
date_default_timezone_set("Africa/Nairobi");

$server = "127.0.0.1";
$username = "pusa";
$password = "qw3r1234@1";
$db = "paneldb";

// Create connection
$connection = mysqli_connect($server, $username, $password, $db);

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
