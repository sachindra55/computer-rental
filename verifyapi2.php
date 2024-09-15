<?php
require 'vendor/autoload.php';
header('Content-type: text/html');
// get the details of the api in xml format
$root = simplexml_load_file("myapi.php");
foreach($root as $function) {
    $HTMLComponents = "\n"; // initialize empty HTML
$query = '';
foreach($function->parameters->param as $parameter) {
    echo "Name : " . $function->function_name . "\n";

	$query .= $parameter->name."=".$parameter->default."&";
// create a new HTML form item
    $HTMLComponents .= "\n";
    $HTMLComponents .= "\t$parameter->name : <input type='text' value='' name='" . $parameter->name . "' size='30' /> <br>\n";
    }
// Create the form for each server/function in the xml with an iframe
$outFrame = "<br><iframe border='1' name='outFrame$function->function_name'width='300px' height='150px' > </iframe><br>";
$HTML = "\n<form action='$function->function_URL' method='get' target='outFrame$function->function_name'>$HTMLComponents\n\t<input type='submit'>\n</form>\n$outFrame\n";
try {
    $client = new GuzzleHttp\Client(['verify' => false]);
    $response = $client->request('GET', 'https://131.217.173.208/KITAssignment2/' . $function->function_URL . "?" . $query);
    //If all right then display the form
    if($response->getStatusCode() == 200) {
    echo "\t Service Status : Available [" . $response->getStatusCode(). ", " . $response->getHeaderLine('content-type') . "]";
    // put the HTML form in the output
    echo $HTML;
    }
    else {
    echo "Error : " . $response->getStatusCode();
    }
} catch (Exception $e) {
    echo "Error [RES]: \n";
    echo "<pre>";
    print_r($e);
    echo "</pre>";
    }
    echo "<br>----------------------------------------<br>";
    }
    ?>
