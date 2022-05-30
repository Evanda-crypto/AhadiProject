<?php
 date_default_timezone_set('Africa/Nairobi');
$connection=mysqli_connect('127.0.0.1','pusa','qw3r1234@1','paneldb');
if(!$connection){
    die(mysqli_error($connection));
}
?>