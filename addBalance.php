
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
require 'vendor/autoload.php';
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\BadResponseException;
try {
$client = new GuzzleHttp\Client(['verify' => false]);

if(!isset($_GET["balance"]) || $_GET["user_id"]=="") 
{
    header("HTTP/1.1 400 Bad Request");
    echo "<h1>ERROR 400: BAD REQUEST</h1>";
    
}
else{
    $balance = $_GET["balance"];
    $user_id = $_GET["user_id"];
    $request = $client->createRequest('PATCH', 'https://131.217.173.208/KITAssignment2/market/addBalance.php?balance=' . $balance . '&user_id=' . $user_id);
    $response = $client->send($request);
    
    echo $response;
}

if($response->getStatusCode() == 200 && $response->getHeaderLine('content-type') == "application/json") {
// if the request OK and the response is json
$json = json_decode($response->getBody());

echo json_encode($json,128);
}

}
 catch (Exception $e) {
    //catches all Exceptions
    echo "Error [RES]: \r\n";
    print_r($e);
    header("Content-Type: text/xml");
    echo "<kitresponse><Error> Service not available</Error><timestamp>" . time() . "</timestamp> </kitresponse>";
    }
    ?>

    