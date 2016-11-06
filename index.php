<?php 

require 'vendor/autoload.php';

use GuzzleHttp\Client;

$client = new Client([
	'base-uri' => 'https://httpbin.org/',
	'timeout' => 2.0,
]);

$respose = $client->request('GET', 'ip');

var_dump($respose->getStatusCode());
var_dump($respose->getReasonPhrase());

if ($respose->getHeader('Contetn-Length')) {
	var_dump($respose->getHeader('Contetn-Length'));
}

foreach ($response->getHeaders() as $name => $values) {
    echo $name . ': ' . implode(', ', $values) . "\r\n";
}