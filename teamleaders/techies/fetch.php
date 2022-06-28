<?php

require '../../vendor/autoload.php';
$client = new Client();
$request = new Request('POST', 'http://app.sasakonnect.net:19003/api/Meters/');
$res = $client->sendAsync($request)->wait();
echo $res->getBody();
