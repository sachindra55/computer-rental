
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
require 'vendor/autoload.php';
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\BadResponseException;
try {
$client = new GuzzleHttp\Client(['verify' => false]);


    $user_id = $_GET["user_id"];
    $item_id = $_GET["item_id"];
    $quantity = $_GET["quantity"];
    $seller_ip = $_GET["seller_ip"];


    $response = $client->request('GET','https://131.217.173.208/KITAssignment2/market/purchase.php?user_id=' . $user_id . '&item_id=' . $item_id . '&quantity=' . $quantity . '&seller_ip=' . $seller_ip);

if($response->getStatusCode() == 200 && $response->getHeaderLine('content-type') == "application/json") {
// if the request OK and the response is json
    echo "<h1>Purchased";
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

    