<?php
include("../../config/config.php");
session_start();
if(isset($_POST["submit"])){
    $contacts=$_POST['contacts'];
    $champ = $_POST['champ'];
    $code = $_POST['code'];

        $stmt = $connection->prepare("select id from Users where id= ?");
        $stmt->bind_param("s", $code);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        if ($stmt_result->num_rows > 0) {

    $sql="UPDATE papdailysales set ChampName='$champ' WHERE FIND_IN_SET(ClientContact, '$contacts')";
    $result=mysqli_query($connection,$sql);

    $query="UPDATE turnedonpap set ChampName='$champ' WHERE FIND_IN_SET(ClientContact, '$contacts')";
    $updated=mysqli_query($connection,$query);

    if($result && $updated){
    $_SESSION["success"] = "Successfully Changed";
    header("Location: change-champ.php");
    }else{
    $_SESSION["status"] = "Error occurred!";
    header("Location: change-champ.php");
    } 
}else{
    $_SESSION["status"] = "Invalid Code";
    header("Location: change-champ.php");
}
}
?>