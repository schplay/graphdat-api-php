<?php namespace Schplay\GraphdatApiPhp;

use Cache;
use Guzzle\Http\Client;
use Guzzle\Http\Exception\ClientErrorResponseException;

class Graphdat {

	protected $config;
	protected $client;

	public $apiEndpoint = 'https://api.graphdat.com/';

	/**
	 *
	 * @param object $config
	 */
	public function __construct($config) {
		if(is_object($config)) {
			$this->config = $config;
			try {
				$this->client = new Client([
					'base_url' => $apiEndpoint.$config->api_version,
					'allow_redirects' => false,
					'headers' => [
						'Content-Type' => 'application/json'
					],
					'auth' => [$config->client_email, $config->api_key]
				]);
			} catch(ClientErrorResponseException $e) {
				var_dump($e);
			}
			
		} else {
			$e = 'Constructor expects config options as object but got '.gettype($config);
			throw new Exception($e);
		}
	}

	public function actions() {
		try {
			$response = $this->client->get('/actions');
			return parseResponseBody($response);
		} catch (RequestException $e) {
			echo $e->getRequest() . "\n";
			if ($e->hasResponse()) {
				echo $e->getResponse() . "\n";
			}
		}
	}

	public function metric() {

	}

	/**
	 * @param string $response
	 */
	public function parseResponseBody($response) {
		return $response;
	}
}

?>