<?php
header('Content-type: text/plain');
print_r(simplexml_load_file("myapi.php"));


echo "==================================================" . "\n";
$root = simplexml_load_file("myapi.php");

foreach($root as $functions) {
print_r($functions);
echo "----------------------------------------" . "\n";
}
echo "==================================================" . "\n";

foreach($root as $function) {
echo $function->function_name . "\n";
echo $function->function_URL . "\n";
echo "----------------------------------------" . "\n";
}
echo "==================================================" . "\n";
?>

