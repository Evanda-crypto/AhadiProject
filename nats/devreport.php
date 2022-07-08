<?php
include "session.php";
include "../config/config.php";
date_default_timezone_set("Africa/Nairobi");

if (isset($_POST["submit"])) {

    $project_name = $_POST["project_name"];
    $report_start_date = $_POST["report_start_date"];
    $report_end_date = $_POST["report_end_date"];
    $evaluation_period = $_POST["evaluation_period"];
    $key_milestone = $_POST["key_milestone"];
    $completed_tasks = addslashes($_POST["completed_tasks"]);
    $ongoing_tasks = addslashes($_POST["ongoing_tasks"]);
    $challenges = addslashes($_POST["challenges"]);
    $comments = addslashes($_POST["comments"]);
    $developers = addslashes($_POST["developers"]);
   


    //checking if connection is not created successfully
    if ($connection->connect_error) {
        die("connection failed : " . $connection->connect_error);
    } else {
        $insert = $connection->query(
            "INSERT INTO developers_reports (project_name,report_start_date,report_end_date,evaluation_period,key_milestone,completed_tasks,ongoing_tasks,challenges,comments,developers) VALUES 
            ('$project_name','$report_start_date','$report_end_date','$evaluation_period','$key_milestone','$completed_tasks','$ongoing_tasks','$challenges','$comments','$developers')"
        );

        if ($insert) {
            $_SESSION["success"] = "Report Submitted!";
            header("Location: fill_developers_report.php");
        } else {
            $_SESSION["status"] = "Please Fill the right details";
            header("Location: fill_developers_report.php");
        }
    }



}
?>