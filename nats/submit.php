<?php
include "session.php";
include "../config/config.php";
date_default_timezone_set("Africa/Nairobi");

if (isset($_POST["submit"])) {
    $date = $_POST["date"];
    $Region = $_POST["Region"];
    $issue1 = $_POST["issue1"];
    $issue2 = $_POST["issue2"];
    $issue3 = $_POST["issue3"];
    $issue4 = $_POST["issue4"];
    $reporter = $_POST["reporter"];
    $comments = $_POST["comments"];
   


    //checking if connection is not created successfully
    if ($connection->connect_error) {
        die("connection failed : " . $connection->connect_error);
    } else {
        $insert = $connection->query(
            "INSERT INTO nats_reports (issue1,issue2,issue3,issue4,reporter,Region,comments,date_reported) VALUES 
            ('$issue1','$issue2','$issue3','$issue4','$reporter','$Region','$comments','$date')"
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