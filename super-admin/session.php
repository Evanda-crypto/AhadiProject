

<?php
session_start();
if (!isset($_SESSION["superadmin"]) && $_SESSION["superadmin"] == false) {
    header("location: ../index.php");
} else {
    if (time() - $_SESSION["start"] >604800 ) {
        header("location: ../index.php");
    } else {
        $_SESSION["start"] = time();
    }   
}
?>
