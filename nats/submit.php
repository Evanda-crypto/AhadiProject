<?php
include "session.php";
include "../config/config.php";
date_default_timezone_set("Africa/Nairobi");

if (isset($_POST["submit"])) {
    $date = $_POST["date"];
    $Region = $_POST["Region"];
    $issue = $_POST["issue"];
    $startime = $_POST["start"];
    $endtime = $_POST["end"];
    $duration = $_POST["duration"];
    $reporter = $_POST["reporter"];
    $comments = $_POST["comments"];
   


    //checking if connection is not created successfully
    if ($connection->connect_error) {
        die("connection failed : " . $connection->connect_error);
    } else {
        $insert = $connection->query(
            "INSERT INTO nats_reports (issue,starttime,endtime,duration,reporter,Region,comments,date_reported) VALUES 
            ('$issue','$startime','$endtime','$duration','$reporter','$Region','$comments','$date')"
        );

        if ($insert) {
            $_SESSION["success"] = "Report Submitted!";
            header("Location: fill-report.php");
        } else {
            $_SESSION["status"] = "Please Fill the right details";
            header("Location: fill-report.php");
        }
    }


}
?>