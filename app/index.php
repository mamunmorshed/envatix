<?php 

require '../vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7;

$client = new Client([
	'base_uri' => 'https://themeforest.net',
	// 'timeout' => 2.0,
]);

try {	
	$response = $client->request('GET', 'user/themebucket', ['verify' => false]);
} catch (RequestException $e) {
	echo psr7\str($e->getRequest());
	if ($e->hasResponse()) {
		echo Psr7\str($e->getResponse());
	}
}

if (isset($response)) {
	var_dump($response->getStatusCode());
	var_dump($response->getReasonPhrase());

	if ($response->getHeader('Contetn-Length')) {
		var_dump($response->getHeader('Contetn-Length'));
	}

	foreach ($response->getHeaders() as $name => $values) {
	    echo $name . ': ' . implode(', ', $values) . "\r\n";
	}

	$body = $response->getBody();
	// Implicitly cast the body to a string and echo it
	echo $body;
	echo (string) $body;
}else{
	echo "<h1>RETRY</h1>";
}