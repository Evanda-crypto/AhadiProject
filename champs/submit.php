
<?php
include("../config/config.php");
include_once "session.php";

if (isset($_POST["submit"])) {
    $DateSigned = trim($_POST["DateSigned"]);
    $ChampName = $_POST["ChampName"];
    $BuildingName = trim($_POST["Buildingname"]);
    $BuildingCode = trim($_POST["BuildingCode"]);
    $Region = trim($_POST["Region"]);
    $Apt = trim($_POST["Apt"]);
    $AptLayout = trim($_POST["aptlayout"]);
    $Floor = trim($_POST["floor"]);
    $ClientName = trim($_POST["ClientName"]);
    $ClientAvailability = trim($_POST["Day"]);
    $ClientContact = trim($_POST["ClientContact"]);
    $ClientWhatsApp = trim($_POST["WhatsApp"]);
    $ClientGender = trim($_POST["gender"]);
    $ClientAge = trim($_POST["age"]);
    $ClientOccupation = trim($_POST["occupation"]);
    $HouseholdSize = trim($_POST["Householdsize"]);
    $Children = trim($_POST["Children"]);
    $Teenagers = trim($_POST["Teenagers"]);
    $Adults = trim($_POST["Adults"]);
    $Birthday = trim($_POST["Birthday"]);
    $Note = trim($_POST["Note"]);
    $FamilyName = trim($_POST["FamilyName"]);
    $package = trim($_POST["package"]);
    $Email = trim($_POST["email"]);
    $phonealt = trim($_POST["altcontact"]);
    $comment = trim($_POST["comments"]);
    $Status = "Signed";

    if ($connection->connect_error) {
        die("connection failed : " . $connection->connect_error);
    } else {
        $stmt = $connection->prepare(
            "SELECT * from papdailysales  where ClientContact= ?"
        );
        $stmt->bind_param("s", $ClientContact);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        if ($stmt_result->num_rows > 0) {
            $_SESSION["status"] = "Client already exists";
                    header("Location: residential.php");
        } else {
            $stmt = $connection->prepare(
                "SELECT * from buildings  where bstatus='8. PAP>10' OR bstatus='4. Fully Installed' OR bstatus='7. PAP In Service' OR bstatus='6. IAP In Service' AND bcode= ?"
            );
            $stmt->bind_param("s", $BuildingCode);
            $stmt->execute();
            $stmt_result = $stmt->get_result();
            if ($stmt_result->num_rows < 1){
                $_SESSION["status"] = "The BuildingCode entered does not exist";
                header("Location: residential.php");
            } else { 
                $insert = $connection->prepare("insert into papdailysales (DateSigned,ChampName,BuildingName,BuildingCode,Region,Apt,AptLayout,Floor,ClientName,ClientAvailability,ClientContact,
      ClientWhatsApp,ClientGender,ClientAge,ClientOccupation,HouseholdSize,Children,Teenagers,Adults,Birthday,Note,FamilyName,CurrentPackage,Email,PhoneAlt,PapStatus,comments)
      values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
                //values from the fields
                $insert->bind_param(
                    "sssssssssssssssssssssssssss",
                    $DateSigned,
                    $ChampName,
                    $BuildingName,
                    $BuildingCode,
                    $Region,
                    $Apt,
                    $AptLayout,
                    $Floor,
                    $ClientName,
                    $ClientAvailability,
                    $ClientContact,
                    $ClientWhatsApp,
                    $ClientGender,
                    $ClientAge,
                    $ClientOccupation,
                    $HouseholdSize,
                    $Children,
                    $Teenagers,
                    $Adults,
                    $Birthday,
                    $Note,
                    $FamilyName,
                    $package,
                    $Email,
                    $phonealt,
                    $Status,
                    $comment
                );
                $insert->execute();
                $insert->close();
                $stmt->close();

                if ($insert) {
                    $_SESSION["success"] = "Submitted";
                        header("Location: residential.php");
                } else {
                    $_SESSION["status"] = "Error.Please try again";
                    header("Location: residential.php");
                }
            }
        }
    }
}
