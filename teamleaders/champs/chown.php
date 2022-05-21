<?php
include("../../config/config.php");
session_start();
if(isset($_POST["submit"])){
    $contacts=$_POST['contacts'];
    $champ = $_POST['champ'];

    $sql="UPDATE papdailysales set ChampName='$champ' WHERE ClientContact IN ($contacts)";
    $result=mysqli_query($connection,$sql);

    $query="UPDATE turnedonpap set ChampName='$champ' WHERE ClientContact IN ($contacts)";
    $updated=mysqli_query($connection,$query);

    if($result && $updated){
    $_SESSION["success"] = "Successfully Changed";
    header("Location: change-champ.php");
    }else{
    $_SESSION["status"] = "Error occurred!";
    header("Location: change-champ.php");
    } 
}
?>