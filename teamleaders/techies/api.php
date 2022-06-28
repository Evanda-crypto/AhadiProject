<?php

require_once __DIR__ . '../../../vendor/autoload.php';
$client = new GuzzleHttp\Client();

$response = $client->get("http://app.sasakonnect.net:19003/api/Rejected/");

echo $response->getBody();
