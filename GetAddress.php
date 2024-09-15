
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require 'vendor/autoload.php';
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\BadResponseException;
try {
$client = new GuzzleHttp\Client(['verify' => false]);
$response = $client->request('GET','https://131.217.173.208/tutorial7/checkpassword.php?user=' . $_GET['user'] .'&password=' . $_GET['password']);
if($response->getStatusCode() == 200 && $response->getHeaderLine('content-type') == "application/json") {
// if the request OK and the response is json
$json = json_decode($response->getBody());
if($json->auth_level == 1) {
if(file_exists($_GET["user"] . ".txt")) {
header("Content-Type: text/xml");
echo "<kitresponse><user> " . $_GET["user"] . "</user> <address>" .file_get_contents($_GET["user"] . "Address.txt") ." </address><timestamp>" . time() ."</timestamp></kitresponse>";
}
else {
header("HTTP/1.1 404 Not Found");
}
}
else { header ("HTTP/1.1 403 Forbidden");}
} else {
// if the response code is incorrect
header("Content-Type: text/xml");
echo "<kitresponse><Error> Authenticating Service not available </Error><timestamp>" . time() . "</timestamp> </kitresponse>";

}
} catch (Exception $e) {
    //catches all Exceptions
    echo "Error [RES]: \r\n";
    print_r($e);
    header("Content-Type: text/xml");
    echo "<kitresponse><Error> Authenticating Service not available</Error><timestamp>" . time() . "</timestamp> </kitresponse>";
    }
    ?>

    