<?php 
include('../config/config.php');
if(!empty($_GET['id'])){  
     $id=$_GET['id'];
    if ($connection->connect_error) { 
        die("Unable to connect database: " . $db->connect_error); 
    } 
     
    // Get content from the database 
    $query = $connection->query("SELECT bname,bcode,bstatus,region,champs_signed FROM buildings WHERE id =$id"); 
     
    if($query->num_rows > 0){ 
        $cmsData = $query->fetch_assoc(); 
        echo "<table class='table table-striped'>";
        echo "<tr>";
        echo "<td>Building Name</td>";
        echo "<td>".$cmsData['bname']."</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>Building Code</td>";
        echo "<td>".$cmsData['bcode']."</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>Building Status</td>";
        echo "<td>".$cmsData['bstatus']."</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>Region</td>";
        echo "<td>".$cmsData['region']."</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>Signed By</td>";
        echo "<td>".$cmsData['champs_signed']."</td>";
        echo "</tr>";
        echo "</table>";
    }else{ 
        echo 'Content not found....1'; 
    } 
}else{ 
    echo 'Content not found....2'; 
} 
?>
