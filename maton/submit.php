<?php
include "session.php";
include "../config/config.php";
date_default_timezone_set("Africa/Nairobi");

if (isset($_POST["submit"])) {

    if(isset($_POST["zone"])){
    $zones = $_POST["zone"];
    $extractzones = implode(",", $zones);
    if($extractzones){
    $date = $_POST["date"];
    $start = $_POST["start"];
    $end = $_POST["end"];
    $duration = $_POST["duration"];
    $occurence = $_POST["issue"];
    $reporter = $_POST["reporter"];
    $comments = $_POST["comments"];
    $bname = $_POST["bname"];
    $time = date("Y-m-d");
    $department = "MATON";
    $Region = $_POST["Region"];

    //checking if connection is not created successfully
    if ($connection->connect_error) {
        die("connection failed : " . $connection->connect_error);
    } else {
        $insert = $connection->query(
            "INSERT INTO reports (issue,zones,reporter,starttime,endtime,duration,comments,timereported,occurancedate,Department,building,Region) VALUES 
            ('$occurence','$extractzones','$reporter','$start','$end','$duration','$comments','$time','$date','$department','$bname','$Region')"
        );

        if ($insert) {
            $_SESSION["success"] = "Report Submitted!";
            header("Location: events.php");
        } else {
            $_SESSION["status"] = "Please Fill the right details";
            header("Location: events.php");
        }
    }
}else {
    $_SESSION["status"] = "zones not extracted";
    header("Location: events.php");
}
}
else {
    $_SESSION["status"] = "Please select Zone(s) affected";
    header("Location: events.php");
}
}
?>
