
<?php
$url = "http://app.sasakonnect.net:19003/api/Meters/";

if(isset($_POST['submit']) && isset($_FILES['Meter_Picture']['tmp_name'])){


$curl = curl_init($url);
$cfile = new CURLFile($_FILES['Meter_Picture']['tmp_name'], $_FILES['Meter_Picture']['type'], $_FILES['Meter_Picture']['name']);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

// // // $headers = array(
// //    "Content-Type: application/x-www-form-urlencoded",
// // );
// curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$data = array( 
    'Cluster_name' => $_POST["Cluster_name"],
    
    'Meter_Number'  => $_POST["Meter_Number"],
  
    'Contact_number'    => $_POST["Contact_number"],
  
    'date_Installed' => $_POST["date_Installed"],
  
    'Region'  => $_POST["Region"],
  
    'Techie_team'    => $_POST["Techie_team"],
  
    'Contact_Person'    => $_POST["Contact_Person"],
    
    'Meter_Picture'    => $cfile,
  
    'Comments'    => $_POST["Comments"]);

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

$resp = curl_exec($curl);
curl_close($curl);

echo $resp;

}
?>
