<?php
include("session.php");
include("../../config/config.php");
$id = $_GET['clientid'];

$msg = "";
if (isset($id)) {

    $query = "DELETE FROM  papdailysales  WHERE ClientID=$id";
    $result = mysqli_query($connection, $query);

    if ($result) {
            $_SESSION["status"] = "Deleted successfully";
            header("Location: retrieved_paps.php");
    } else {
        $_SESSION["status"] = "Error occured plase try again";
        header("Location: retrieved_paps.php");
    }
}
?>