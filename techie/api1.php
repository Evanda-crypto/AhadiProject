<?php

if(isset($_POST['submit']) && isset($_FILES['Meter_Picture']['tmp_name'])){

include 'HTTP/Request2.php';
$request = new HTTP_Request2();
$request->setUrl('http://app.sasakonnect.net:19003/api/Meters/');
$request->setMethod(HTTP_Request2::METHOD_POST);
$request->setConfig(array(
  'follow_redirects' => TRUE
));
#$request->$fileContent = basename(file_get_contents($_FILES['Meter_Picture']['tmp_name']));

try {
    $request->addPostParameter(json_decode(array(
        'Cluster_name' => $_POST["Cluster_name"],
  
        'Meter_Number'  => $_POST["Meter_Number"],

        'Contact_number'    => $_POST["Contact_number"],

        'date_Installed' => $_POST["date_Installed"],

        'Region'  => $_POST["Region"],

        'Techie_team'    => $_POST["Techie_team"],

        'Contact_Person'    => $_POST["Contact_Person"],

        'Meter_Picture'    => basename(file_get_contents($_FILES['Meter_Picture']['tmp_name'])),


        'Comments'    => $_POST["Comments"]
    )));

    
  $response = $request->send();
  if ($response->getStatus() == 200) {
    echo $response->getBody();
  }
  else {
    echo 'Unexpected HTTP status: ' . $response->getStatus() . ' ' .
    $response->getReasonPhrase();
  }
}
catch(HTTP_Request2_Exception $e) {
  echo 'Error: ' . $e->getMessage();
}
}
?>