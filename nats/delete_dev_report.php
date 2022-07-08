<?php
include('../config/config.php');
include_once("session.php");
$id = $_GET['id'];

if (isset($id)) {

    $query = "DELETE FROM  developers_reports  WHERE id='$id'";
    $result = mysqli_query($connection, $query);
    if ($result) {
        $_SESSION["success"] = "Deleted Successfully";
        header("Location: view_developers_report.php");
    } else {
        $_SESSION["status"] = "Not deleted";
                header("Location: view_developers_report.php");
    }
}
?>