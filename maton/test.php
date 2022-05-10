<?php


include('../config/config.php');

$sql="SELECT occurrence, occurancedate, group_concat( zone ) AS zones FROM reports GROUP BY occurrence";

$result=mysqli_query($connection,$sql);

while($row=mysqli_fetch_array($result)){
    echo json_encode($row, JSON_PRETTY_PRINT);
}


