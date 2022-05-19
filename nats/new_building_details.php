<?php
include("../config/config.php");
include("session.php");


if(isset($_POST["submit"])){
    $Bname = trim($_POST['bname']);
    $Bcode = trim($_POST['bcode']);
    $Status = trim($_POST['status']);
    $Meter = trim($_POST['mtrno']);
    $Region = trim($_POST['Region']);
    $Sales = trim($_POST['sales']);
    $Signed = trim($_POST['signed']);
    $Techies = trim($_POST['techies']);
    $DateAccepted = trim($_POST['dateaccepted']);
    $Datecabled = trim($_POST['datecabled']);
    $Datesigned = trim($_POST['datesigned']);
    $Datefullyinstalled = trim($_POST['datefullyinstalled']);
    $Iap = trim($_POST['iap']);
    $Dateturnedon = trim($_POST['dateturnedon']);
    $Oap = trim($_POST['oap']);
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
                        $insert = $connection->query("INSERT INTO buildings (bname,bcode,region,bstatus,mtrno,champs_signed,techies,champs_sales,date_signed,date_cabled,
        date_fully_installed,date_accepted,date_turned_on,iap,oap,floors,shops,apt,vacantshops,note) VALUES ('$Bname','$Bcode','$Region','$Status','$Meter','$Signed','$Techies','$Sales','$Datesigned','$Datecabled','$Datefullyinstalled',
      '$DateAccepted','$Dateturnedon','$Iap','$Oap','$Floors','$Shops','$Apt','$Vacant','$Comments')");
                    if($insert){
                        $_SESSION["success"] = "Submitted";
                        header("Location: new_building.php");
                    }else{
                        $_SESSION["status"] = "Error.Please try again";
                    header("Location: new_building.php");
                    }
                } 
            


}
?>
