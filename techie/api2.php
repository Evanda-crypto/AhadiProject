<?php

require_once __DIR__ . '../../vendor/autoload.php';

use GuzzleHttp\Client;
if(isset($_POST['submit']) && isset($_FILES['Meter_Picture']['tmp_name'])){


$client = new GuzzleHttp\Client();

$client = new Client([
    // Base URI is used with relative requests
    'base_uri' => 'https://reqres.in',
]);

$pic = fopen($_FILES["Meter_Picture"]["tmp_name"], 'r');

$response = $client->request('POST', 'http://app.sasakonnect.net:19003/api/Meters/', [
    'json' => [
        'Cluster_name' => $_POST["Cluster_name"],

        'Meter_Number'  => $_POST["Meter_Number"],

        'Contact_number'    => $_POST["Contact_number"],

        'date_Installed' => $_POST["date_Installed"],

        'Region'  => $_POST["Region"],

        'Techie_team'    => $_POST["Techie_team"],

        'Contact_Person'    => $_POST["Contact_Person"],

        'Meter_Picture'    => $pic,

        'Comments'    => $_POST["Comments"]
    ]
]);

#$pic = fopen($_FILES["Meter_Picture"]["tmp_name"], 'r');

#echo $pic;
#echo $_FILES['Meter_Picture']['tmp_name']; echo "  ";
#echo $_FILES['Meter_Picture']['type']; echo "  ";
#echo $_FILES['Meter_Picture']['name'];

//get status code using $response->getStatusCode();
var_dump($_FILES);
$body = $response->getBody();
$arr_body = json_decode($body);
print_r($arr_body);
}

