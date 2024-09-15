
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
require 'vendor/autoload.php';
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\BadResponseException;
try {
$client = new GuzzleHttp\Client(['verify' => false]);


    $purchase_id = $_GET["purchase_id"];
    $response = $client->request('GET','https://131.217.173.208/KITAssignment2/market/cancelPurchase.php?purchase_id=' . $purchase_id );

if($response->getStatusCode() == 200 && $response->getHeaderLine('content-type') == "application/json") {
// if the request OK and the response is json
    echo "<h1>Purchase Cancelled";
}
else
{
    header("HTTP/1.1 404 Not Found");
    echo "<h1>ERROR 404: NOT FOUND</h1>";
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

    