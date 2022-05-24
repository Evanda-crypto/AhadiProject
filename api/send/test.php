<?php
header("Content-Type:application/json");
if (isset($_GET['id']) && $_GET['id']!="") 
{
    include ("../../config/config.php");
$id = $_GET['id'];
$result = mysqli_query($connection,
       "SELECT * FROM `users` WHERE id=$id");
if(mysqli_num_rows($result)>0)
       {
    $row = mysqli_fetch_array($result);
    $fname = $row['FirstName'];
    $lname = $row['LastName'];
    $Email = $row['Email'];
    $User = $row['User'];
    $Region = $row['Region'];
    $Password = $row['Password'];
    $hashpass= password_hash($Email, PASSWORD_DEFAULT);
    response($id, $fname, $lname, $hashpass,$User,$Region,$Password);
    mysqli_close($connection);
}
else
{
     response(NULL, NULL, 200,"No Record Found");
}
}
else
{
response(NULL, NULL, 400,"Request is invalid");
}
function response($id,$fname,$lname, $hashpass,$User,$Region,$Password)
{
$response['id'] = $id;
$response['FirstName'] = $fname;
$response['LastName'] = $lname;
$response['Email'] = $hashpass;
$response['User'] = $User;
$response['Region'] = $Region;
$response['Password'] = $Password;
$json_response = json_encode($response);
echo $json_response;
}
?>