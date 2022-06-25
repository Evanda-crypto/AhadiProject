
<?php
if(isset($_POST['submit']) && isset($_FILES['Meter_Picture']['tmp_name'])){

$ch = curl_init();

//The CURLFile class 
$cfile = new CURLFile($_FILES['Meter_Picture']['tmp_name'], $_FILES['Meter_Picture']['type'], $_FILES['Meter_Picture']['name']);


  $fields = array( 
  'Cluster_name' => $_POST["Cluster_name"],
  
  'Meter_Number'  => $_POST["Meter_Number"],

  'Contact_number'    => $_POST["Contact_number"],

  'date_Installed' => $_POST["date_Installed"],

  'Region'  => $_POST["Region"],

  'Techie_team'    => $_POST["Techie_team"],

  'Contact_Person'    => $_POST["Contact_Person"],
  
  'Meter_Picture'    => $cfile,

  'Comments'    => $_POST["Comments"],);

  $url = "http://app.sasakonnect.net:19003/api/Meters/";
  curl_setopt($ch,CURLOPT_URL,$url);
  curl_setopt($ch,CURLOPT_POST, 1);                //0 for a get request
  curl_setopt($ch,CURLOPT_POSTFIELDS,$fields);
  curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch,CURLOPT_CONNECTTIMEOUT ,3);
  curl_setopt($ch,CURLOPT_TIMEOUT, 20);
  $response = curl_exec($ch);
  if($response){
    $_SESSION["success"] = "New Meter Submitted";
    header("Location: new-meter-form.php");
  }
  else{
    $_SESSION["status"] = "Error Please try again";
    header("Location: new-meter-form.php");
  }
  curl_close ($ch);
}
?>