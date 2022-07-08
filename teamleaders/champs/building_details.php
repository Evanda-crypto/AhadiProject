<?php
include("../../config/config.php");
include("session.php");


if(isset($_POST["submit"])){
    $Bname = addslashes($_POST['bname']);
    $Bcode = trim($_POST['bcode']);
    $Status = "2. Signed";
    $Region = trim($_POST['Region']);
    $Signed = trim($_POST['signed']);
    $Datesigned = trim($_POST['datesigned']);
    $Floors = trim($_POST['floors']);
    $Apt = trim($_POST['apt']);
    $Vacant = trim($_POST['vacant']);
    $Shops = trim($_POST['shops']);
    $Comments = trim($_POST['comments']);

                        $stmt = $connection->prepare(
                            "SELECT bcode from buildings  where bcode= ?"
                        );
                        $stmt->bind_param("s", $Bcode);
                        $stmt->execute();
                        $stmt_result = $stmt->get_result();
                        if ($stmt_result->num_rows > 0){
                            $_SESSION["status"] = "There is another building with the same code";
                            header("Location: new_building.php");
                        } else {
                        $insert = $connection->query("INSERT INTO buildings (bname,bcode,region,bstatus,champs_signed,date_signed,floors,shops,apt,vacantshops,note) VALUES ('$Bname','$Bcode','$Region','$Status','$Signed','$Datesigned','$Floors','$Shops','$Apt','$Vacant','$Comments')");
                    if($insert){
                        $_SESSION["success"] = "Submitted";
                        header("Location: new_building_form.php");
                    }else{
                        $_SESSION["status"] = "Error.Please try again";
                    header("Location: new_building_form.php");
                    }
                } 
            


}
?>
