<?php
include("session.php");
include("../../config/config.php");
$id = $_GET['clientid'];


if (isset($id)){

    $query = "DELETE FROM  papdailysales  WHERE ClientID=$id";
    $result = mysqli_query($connection, $query);

    if($result)
    {
            $_SESSION["success"] = "Deleted successfully";
            header("Location: not-installed.php");
    }
    else
    {
        $_SESSION["status"] = "Not deleted.You can only delete paps with status 'Signed'";
        header("Location: not-installed.php");
    }
}
?>