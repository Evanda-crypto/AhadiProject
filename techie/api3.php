<?php

require_once __DIR__ . '../../vendor/autoload.php';

use GuzzleHttp\Client;

$data = array(
    'first_name' =>'qwerty',
    'last_name' => 'qwerty',
    'email' => 'qwerty',
    'partner_key' => 'qwerty',
    'secret_key' => 'qwerty',
    'file' => new \GuzzleHttp\Post\PostFile('filename', $fileblob)
);

$curl = new \GuzzleHttp\Client();
return $curl->post('https://www.api.com',['verify'=>false,'body'=>$data]);