<?php
include "session.php";
include "../../config/config.php";

if (isset($_POST["task"])) {
    if (isset($_POST["check"])) {
        $all_ids = $_POST["check"];
        $extract_id = implode(",", $all_ids);


        $team = $_POST['teamid'];
        $split = $_POST['members'];
        $Date = date('Y-m-d');

        $sql="SELECT ClientID,ClientName,ClientContact,ClientAvailability,Region,BuildingName,BuildingCode,'".$Date."' as Date,'".$team."' as TeamID,'".$split."' as split from papdailysales where ClientID IN ($extract_id)";
        $result = mysqli_query($connection, $sql);
        $rows=array();
        while($row=mysqli_fetch_assoc($result)){
            $rows[]=$row;
        }
        echo json_encode($rows, JSON_PRETTY_PRINT);
        
        $jsonurl = "http://localhost/ahadi/teamleaders/techies/assign_multiple.php";
        $json = file_get_contents($jsonurl);
        
        //convert json object to php associative array
        $data = json_decode($json, true);
        
        foreach ($rows as $dataarray) {
            //get the json data details
            $TeamID = $dataarray["TeamID"];
            $ClientID = $dataarray["ClientID"];
            $ClientName = $dataarray["ClientName"];
            $ClientContact = $dataarray["ClientContact"];
            $ClientAvailability = $dataarray["ClientAvailability"];
            $Region = $dataarray["Region"];
            $BuildingName = $dataarray["BuildingName"];
            $BuildingCode = $dataarray["BuildingCode"];
            $Date = $dataarray["Date"];
            $split = $dataarray["split"];

            $stmt= $connection->prepare("SELECT * from Token_teams where Team_ID= ?");
            $stmt->bind_param("s",$team);
            $stmt->execute();
            $stmt_result= $stmt->get_result();
            if($stmt_result->num_rows>0){
              $sql="UPDATE papdailysales set PapStatus='Assigned' where ClientID IN ($extract_id)";
              $result=mysqli_query($connection,$sql);
              $query="DELETE from reminders where ClientID IN ($extract_id)";
              $result=mysqli_query($connection,$query);
                $stmt= $connection->prepare("INSERT INTO techietask (TeamID,ClientID,ClientName,ClientContact,ClientAvailability,Region,BuildingName,BuildingCode,Date,split)
                values(?,?,?,?,?,?,?,?,?,?)");
                //values from the fields
                $stmt->bind_param("ssssssssss",$TeamID,$ClientID,$ClientName,$ClientContact,$ClientAvailability,$Region,$BuildingName,$BuildingCode,$Date,$split);
                $stmt->execute();
                $_SESSION["success"] = "Task successfully assigned";
                header("Location: assign-task.php");
                $stmt->close();
            }
            else{
                $_SESSION["status"] = "Team does not exist";
                header("Location: assign-task.php");
            }

        }
        
    }
    else{
        $_SESSION["status"] = "Please select records to change status!";
        header("Location: assign-task.php");
    }
}
?>

