<?php

$id= $_GET['id'];

require_once __DIR__ . '../../../vendor/autoload.php';
$client = new GuzzleHttp\Client();

  
use GuzzleHttp\Client;
  
$client = new Client([
    // Base URI is used with relative requests
    'base_uri' => 'https://reqres.in',
]);
  
$response = $client->request('PATCH', "http://app.sasakonnect.net:19003/api/Rejected/".$id."/", [
    'json' => [
        'Status' => 'New',
    ]
]);
  
//get status code using $response->getStatusCode();
$body = $response->getBody();
$arr_body = json_decode($body);
print_r($arr_body);
