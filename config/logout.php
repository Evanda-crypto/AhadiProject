<?php
    session_start();

    $endsession= array_keys($_SESSION);
    foreach($endsession as $end)
    {
        unset($_SESSION[$end]);
    }
    header("location: ../index.php");
    exit;
?>