<?php
header('Content-Type: application');

$json = file_get_contents('http://localhost/tugas_api_json/json-api/api_xml.php');
$data = json_decode($json, true);

$respons = file_get_contents($url);

if ($respons === false) {
    die ('Error');
}

$data = json_decode($respons, true);

$xml = new SimpleXMLElement('<root/>');

array_walk_recursive($data, function($value, $key) use ($xml){
    $xml->addChild($key, htmlspecialchars($value));
});

echo $xml->asXML();

?>