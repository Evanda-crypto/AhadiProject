<?php
session_start();
include "config/config.php";
if (isset($_POST["submit"])) {
    
    $EMAIL = trim($_POST["Username"]);
    $Password = $_POST["Password"];

    if (!$connection) {
        echo "<script>alert('There is no connection at this time.Please try again later.');</script>";
        echo '<script>window.location.href="index.php";</script>';
    } else {
        $stmt = $connection->prepare("select * from Users where Email= ?");
        $stmt->bind_param("s", $EMAIL);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        if ($stmt_result->num_rows > 0) {
            $data = $stmt_result->fetch_assoc();
            if ($data["User"] == 1 || $data["User"] == 2) {
                if (password_verify($Password, $data["Password"])) {
                    $_SESSION["start"] = time();
                    $_SESSION["Admin"] = $EMAIL;
                    $_SESSION["FName"] = $data["FirstName"];
                    $_SESSION["LName"] = $data["LastName"];
                    $_SESSION["ID"] = $data["ID"];
                    header("Location: admin/dashboard.php");
                } else {
                    $_SESSION["status"] = "Wrong Password";
                    header("Location: index.php");
                }
            }
            else if($data["User"] == 3) {
                if (password_verify($Password, $data["Password"])) {
                    $_SESSION["start"] = time();
                    $_SESSION["maton"] = $EMAIL;
                    $_SESSION["FName"] = $data["FirstName"];
                    $_SESSION["LName"] = $data["LastName"];
                    $_SESSION["ID"] = $data["ID"];
                    $_SESSION["Region"] = $data["Region"];
                    header("Location: maton/dashboard.php");
                } else {
                    $_SESSION["status"] = "Wrong Password";
                    header("Location: index.php");
                }
            }
            elseif ($data["User"] == 0) {
                if (password_verify($Password, $data["Password"])) {
                    $_SESSION["start"] = time();
                    $_SESSION['superadmin']=$EMAIL;
                    header("Location: super-admin/new-user.php ");
                } else {
                    $_SESSION["status"] = "Wrong Password";
                    header("Location: index.php");
                }
            } elseif ($data["User"] == 4) {
                if (password_verify($Password, $data["Password"])) {
                    $_SESSION["start"] = time();
                    $_SESSION["FName"] = $data["FirstName"];
                    $_SESSION["LName"] = $data["LastName"];
                    $_SESSION["Sales"] = $EMAIL;
                    $_SESSION["ID"] = $data["ID"];
                    $_SESSION["Region"] = $data["Region"];
                    header("Location: teamleaders/champs/dashboard.php ");
                } else {
                    $_SESSION["status"] = "Wrong Password";
                    header("Location: index.php");
                }
            }
            else if($data["User"] == 5){
                if (password_verify($Password, $data["Password"])) {
                    $_SESSION["start"] = time();
                    $_SESSION["teamleader"] = $EMAIL;
                    $_SESSION["FName"] = $data["FirstName"];
                    $_SESSION["LName"] = $data["LastName"];
                    $_SESSION["ID"] = $data["ID"];
                    $_SESSION["Region"] = $data["Region"];
                    header("Location: teamleaders/techies/dashboard.php");
                }
                else {
                    $_SESSION["status"] = "Wrong Password";
                    header("Location: index.php");
                }
            }
            else if($data["User"] == 6){
                if (password_verify($Password, $data["Password"])) {
                    $_SESSION["start"] = time();
                    $_SESSION["Sales"] = $EMAIL;
                    $_SESSION["FName"] = $data["FirstName"];
                    $_SESSION["LName"] = $data["LastName"];
                    $_SESSION["ID"] = $data["ID"];
                    $_SESSION["Region"] = $data["Region"];
                    $_SESSION["Region1"] = $data["Region1"];
                    header("Location: champs/dashboard.php");
                }
                else {
                    $_SESSION["status"] = "Wrong Password";
                    header("Location: index.php");
                }
            }
            else if ($data["User"] == 7) {
                if (password_verify($Password, $data["Password"])) {
                    $_SESSION["start"] = time();
                    $_SESSION["overall"] = $EMAIL;
                    $_SESSION["FName"] = $data["FirstName"];
                    $_SESSION["LName"] = $data["LastName"];
                    $_SESSION["ID"] = $data["ID"];
                    header("Location: teamleaders/admin/techie/dashboard.php");
                } else {
                    $_SESSION["status"] = "Wrong Password";
                    header("Location: index.php");
                }
            }
            else if($data["User"] == 8){
                if (password_verify($Password, $data["Password"])) {
                    $_SESSION["start"] = time();
                    $_SESSION["overall"] = $EMAIL;
                    $_SESSION["FName"] = $data["FirstName"];
                    $_SESSION["LName"] = $data["LastName"];
                    $_SESSION["ID"] = $data["ID"];
                    header("Location: teamleaders/admin/champs/dashboard.php");
                } else {
                    $_SESSION["status"] = "Wrong Password";
                    header("Location: index.php");
                }
            }
            
        }
        else {
            $query = $connection->prepare(
                "SELECT * from Token_teams Where Team_ID= ?"
            );
            $query->bind_param("s", $EMAIL);
            $query->execute();
            $query_result = $query->get_result();
            if ($query_result->num_rows > 0) {
                $row = $query_result->fetch_assoc();
                if (password_verify($Password, $row["Password"])) {
                    $_SESSION["start"] = time();
                    $_SESSION["Techie"] = $EMAIL;
                    $_SESSION["Techie1"] = $row["Techie1"];
                    $_SESSION["Techie2"] = $row["Techie2"];
                    $_SESSION["TeamID"] = $row["Team_ID"];
                    $_SESSION["ID"] = $row["ID"];
                    $_SESSION["Region"] = $row["Region"];
                    header("Location: techie/dashboard.php");
                } else {
                    $_SESSION["status"] = "Wrong Password";
                    header("Location: index.php");
                }
            } else {
                $_SESSION["status"] = "No Records";
                    header("Location: index.php");
            }
        }
    }
}
?>
