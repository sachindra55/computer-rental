<?php
require 'vendor/autoload.php';
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\BadResponseException;
header('Content-type: text/plain');
echo "=======================================================\n";
$root = simplexml_load_file("myapi.php");
foreach($root as $function) {

echo "Name : " . $function->function_name . "\n";
echo "URL : " . $function->function_URL . "\n";
echo "Parameters :\n";
$query = '';
foreach($function->parameters->param as $parameter) {
echo "\t" . $parameter->name . "\n";
$query .= $parameter->name . "=" . $parameter->default. "&";
}
echo "Test URL [$function->function_name] : $function->function_URL?$query\n";
try {
$client = new GuzzleHttp\Client(['verify' => false]);
$response = $client->request('GET', 'https://131.217.173.208/KITAssignment2/' .$function->function_URL . "?" . $query);
if($response->getStatusCode() == 200) {
// if the request OK
echo "\tResult: [" . $response->getStatusCode() .", " . $response->getHeaderLine('content-type') .", " . $response->getBody() . "]";
}
else {
echo "Error : " . $response->getStatusCode();
}
} catch (Exception $e) {
// catches all Exceptions
echo "Error [RES]: \r\n";
print_r($e);
}
echo "\n----------------------------------------\n";
}
echo "========================================================\n";
?>