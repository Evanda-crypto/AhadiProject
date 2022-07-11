<?php
include("session.php");
include("../config/config.php");


if(isset($_POST["submit"])){
    $contact = trim($_POST["contact"]);

        $stmt = $connection->prepare("SELECT ChampName,DateSigned,ClientName,ClientContact,Region,BuildingName,BuildingCode,PapStatus,Apt,Floor FROM papdailysales WHERE ClientContact= ? OR PhoneAlt = ?");
        $stmt->bind_param("ss", $contact,$contact);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        if ($stmt_result->num_rows > 0) {
            $data = $stmt_result->fetch_assoc();

            $_SESSION["success"] = "Success";
            $_SESSION["ClientName"] = ucfirst($data["ClientName"]);
            $_SESSION["ClientContact"] = $data["ClientContact"];
            $_SESSION["Reg"] = $data["Region"];
            $_SESSION["BuildingName"] = $data["BuildingName"];
            $_SESSION["BuildingCode"] = $data["BuildingCode"];
            $_SESSION["PapStatus"] = $data["PapStatus"];
            $_SESSION["Apt"] = $data["Apt"];
            $_SESSION["Floor"] = $data["Floor"];
            $_SESSION["ChampName"] = $data["ChampName"];
            $_SESSION["DateSigned"] = $data["DateSigned"];
        
            header("Location: get_all_paps_info.php");
        }
        else{
            $_SESSION["status"] = "Sorry no data matched ".$contact."";
            header("Location: get_all_paps_info.php");
        }
}
?>