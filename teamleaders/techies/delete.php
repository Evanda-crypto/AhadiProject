<?php
include("session.php");
include("../../config/config.php");
$id = $_GET['clientid'];

$msg = "";
if (isset($id)) {

    $query = "DELETE FROM  papnotinstalled  WHERE ClientID=$id";
    $result = mysqli_query($connection, $query);

    if ($result) {
        $sql = "DELETE FROM  papdailysales  WHERE ClientID=$id";
        $del = mysqli_query($connection, $sql);

        if($del){
            $_SESSION["status"] = "Deleted successfully";
            header("Location: restituted.php");
        }else{
            $_SESSION["status"] = "Error occured plase try again";
        header("Location: restituted.php");
        }

    } else {
        $_SESSION["status"] = "Error occured plase try again";
        header("Location: restituted.php");
    }
}
?>