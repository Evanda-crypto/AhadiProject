<?php
if(isset($_POST['submit']) && isset($_FILES['Meter_Picture']['tmp_name'])){
require_once __DIR__ . '../../vendor/autoload.php';
$client = new GuzzleHttp\Client();
$response = $client->request('POST', 'http://app.sasakonnect.net:19003/api/Meters/', [
    'multipart' => [
        [
            'Meter_Picture'     => basename($_FILES['Meter_Picture']['tmp_name']),
            'Meter_Picture' => fopen(basename($_FILES['Meter_Picture']['name']), 'r')
        ],
        [
            'Cluster_name' => $_POST["Cluster_name"],
  
            'Meter_Number'  => $_POST["Meter_Number"],
    
            'Contact_number'    => $_POST["Contact_number"],
    
            'date_Installed' => $_POST["date_Installed"],
    
            'Region'  => $_POST["Region"],
    
            'Techie_team'    => $_POST["Techie_team"],
    
            'Contact_Person'    => $_POST["Contact_Person"],
    
            'Comments'    => $_POST["Comments"]
        ]
    ]
]);
}
