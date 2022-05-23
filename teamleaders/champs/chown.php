<?php
include("../../config/config.php");
session_start();
if(isset($_POST["submit"])){
    $contacts=$_POST['contacts'];
    $champ = $_POST['champ'];

    $sql="UPDATE papdailysales set ChampName='$champ' WHERE ClientContact IN ($contacts)";
    $result=mysqli_query($connection,$sql);

    if($result){
    $_SESSION["success"] = "Successfully Changed";
    header("Location: change-champ.php");
    }else{
    $_SESSION["status"] = "Error occurred!";
    header("Location: change-champ.php");
    } 
}
?>