<?php


//read the json file contents
/*$jsonurl = "http://105.27.237.116:19003/api/Rejected/";
$json = file_get_contents($jsonurl);

//convert json object to php associative array
$data = json_decode($json, true);

foreach ($data as $dataarray) {
    //get the employee details
    echo $dataarray["Cluster_name"];
    echo $dataarray["Meter_Number"];
    echo $dataarray["Contact_number"];
    echo $dataarray["date_Installed"];
    echo $dataarray["Comments"];
}
*/

#phpinfo();
?>

<?php

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

require_once __DIR__ . '../../../vendor/autoload.php';

$client = new Client();
$request = new Request('GET', 'http://app.sasakonnect.net:19003/api/Rejected/');
$res = $client->sendAsync($request)->wait();
echo $res->getBody();

