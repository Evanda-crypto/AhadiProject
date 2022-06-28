<?php

$id= $_GET['id'];

/*function callAPI($method, $url, $data){
    $curl = curl_init();
    switch ($method){
       case "POST":
          curl_setopt($curl, CURLOPT_POST, 1);
          if ($data)
             curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
          break;
       case "PUT":
          curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
          if ($data)
             curl_setopt($curl, CURLOPT_POSTFIELDS, $data);			 					
          break;
       default:
          if ($data)
             $url = sprintf("%s?%s", $url, http_build_query($data));
    }
    // OPTIONS:
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
       'APIKEY: ',
       'Content-Type: application/json',
    ));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    // EXECUTE:
    $result = curl_exec($curl);
    if(!$result){die("Connection Failure");}
    curl_close($curl);
    return $result;
 }

$data_array =  array(
    "Status" => 'New',
 );
 $update_plan = callAPI('PUT', "http://app.sasakonnect.net:19003/api/Rejected/".$id."/", json_encode($data_array));
 $response = json_decode($update_plan, true);

 if(!$update_plan){
 $_SESSION["status"] = "Status Not Changed";
 header("Location: rejected-meters.php");
 #var_dump($response);
 }else{
    $_SESSION["success"] = "Status changed";
    header("Location: rejected-meters.php");
 }*/
 

 require_once __DIR__ . '../../../vendor/autoload.php';
 $client = new GuzzleHttp\Client();

$response = $client->put("http://app.sasakonnect.net:19003/api/Rejected/".$id."/", [
    'parameters' => [
        'Status' => 'New',
    ]
]);

echo ($response->getBody()->getContents());

?>

