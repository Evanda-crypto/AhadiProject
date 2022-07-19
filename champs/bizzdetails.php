<?php
include("../config/config.php");
include("session.php");


if(isset($_POST["submit"])){
    $DateSigned = trim($_POST["DateSigned"]);
    $ChampName = $_POST["ChampName"];
    $BuildingName = trim($_POST["Buildingname"]);
    $BuildingCode = trim($_POST["BuildingCode"]);
    $Region = trim($_POST["Region"]);
    $Venue = trim($_POST["venue"]);
    $Bizlayout = trim($_POST["bizlayout"]);
    $Floor = trim($_POST["floor"]);
    $ClientName = trim($_POST["ClientName"]);
    $FamilyName = trim($_POST["FamilyName"]);
    $ClientAvailability = trim($_POST["Day"]);
    $ClientContact = trim($_POST["ClientContact"]);
    $ClientWhatsApp = trim($_POST["WhatsApp"]);
    $ClientGender = trim($_POST["gender"]);
    $ClientAge = trim($_POST["age"]);
    $Birthday = trim($_POST["Birthday"]);
    $BizName = trim($_POST["bizname"]);
    $BizCat = trim($_POST["bizcat"]);
    $BizDec = trim($_POST["bizdec"]);
    $Note = trim($_POST["Note"]);
    $PhoneAlt = trim($_POST["phonealt"]);
    $Email = trim($_POST["email"]);
    $Role = trim($_POST["role"]);
    $package = trim($_POST["package"]);
    $comment = addslashes($_POST["comments"]);
    $Status = "Signed";

                    $stmt= $connection->prepare("SELECT * from papdailysales where ClientContact= ?");
                    $stmt->bind_param("s",$ClientContact);
                    $stmt->execute();
                    $stmt_result= $stmt->get_result();
                    if($stmt_result->num_rows>0){
                        $_SESSION["status"] = "Client already exists";
                        header("Location: business.php");
                    }
                    else{
                        $stmt = $connection->prepare(
                            "SELECT * from buildings  where bstatus='8. PAP>10' OR bstatus='4. Fully Installed' OR bstatus='7. PAP In Service' OR bstatus='6. IAP In Service' AND bcode= ?"
                        );
                        $stmt->bind_param("s", $BuildingCode);
                        $stmt->execute();
                        $stmt_result = $stmt->get_result();
                        if ($stmt_result->num_rows < 1){
                            $_SESSION["status"] = "The BuildingCode entered does not exist";
                            header("Location: business.php");
                        } else {
                        $insert = $connection->query("INSERT into papdailysales (DateSigned,ChampName,BuildingName,BuildingCode,Region,Venue,BizLayout,Floor,ClientName,ClientAvailability,ClientContact,
        ClientWhatsApp,ClientGender,ClientAge,Birthday,BizName,BizCat,BizDec,Note,FamilyName,PhoneAlt,Email,Role,CurrentPackage,PapStatus,comments) VALUES ('$DateSigned','$ChampName','$BuildingName','$BuildingCode','$Region','$Venue','$Bizlayout','$Floor','$ClientName','$ClientAvailability','$ClientContact',
      '$ClientWhatsApp','$ClientGender','$ClientAge','$Birthday','$BizName','$BizCat','$BizDec','$Note','$FamilyName','$PhoneAlt','$Email','$Role','$package','$Status','$comment')");
                    if($insert){
                        $_SESSION["success"] = "Submitted";
                        header("Location: business.php");
                    }else{
                        $_SESSION["status"] = "Error.Please try again";
                    header("Location: business.php");
                    }
                } 
            }


}
?>
