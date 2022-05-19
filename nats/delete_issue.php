<?php
include('../config/config.php');
include_once("session.php");
$id = $_GET['id'];

$msg = "";
if (isset($id)) {

    $query = "DELETE FROM  nats_reports  WHERE id='$id'";
    $result = mysqli_query($connection, $query);
    if ($result) {
        $_SESSION["success"] = "Deleted Successfully";
        header("Location: nats-reports.php");
    } else {
        $_SESSION["status"] = "Not deleted";
                header("Location: nats-reports.php");
    }
}
?>