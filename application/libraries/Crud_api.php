<?php
/**
 * Class MY_Crud_api
 *
 * A wrapper class for the php-crud-api library that provides a simple interface for handling API requests.
 */
defined('BASEPATH') or exit('No direct script access allowed');
use Tqdev\PhpCrudApi\Api;
use Tqdev\PhpCrudApi\Config\Config;
use Tqdev\PhpCrudApi\RequestFactory;
use Tqdev\PhpCrudApi\ResponseUtils;

class Crud_api {
	/**
	 * The php-crud-api instance used to handle API requests.
	 *
	 * @var Api
	 */
	protected $api;
	protected $config;
	protected $default_config;
	protected $request;
	protected $response;
	protected $CI;

	/**
	 * MY_Crud_api constructor.
	 *
	 * Initializes the php-crud-api instance with the specified configuration.
	 *
	 * @param array $config The configuration options for the php-crud-api instance.
	 * @return void
	 */

	public function __construct($config = array()) {

		$this->CI = &get_instance();

		$this->CI->config->load('crud_api', TRUE);
		$default_config = $this->CI->config->item('crud_api');

		$config = array_merge($default_config, $config);
		// var_dump($config);
		// Merge user config options with the default config options
		$this->config = new Config($config);

		$this->api = new API($this->config);
		log_message('debug', "My CRUD API Class Initialized");
	}

	/**
	 * Handles an API request by delegating to the php-crud-api instance.
	 */
	public function handle_request() {
		$this->request = RequestFactory::fromGlobals();
		$this->api = new Api($this->config);
		$this->response = $this->api->handle($this->request);
		ResponseUtils::output($this->response);
	}

	public static function get_base_path() {
		// Remove the scheme and hostname from the URL
		$parsed_url = parse_url(site_url(uri_string()));
		$path = $parsed_url['path'];
		$endpoints = ["/records", "/columns", "/openapi", "/login", "/logout"];
		$endpoint = SELF::get_endpoint($path, $endpoints);
		// Extract the base URI from the path
		$records_pos = strpos($path, $endpoint);
		if ($records_pos !== false) {
			$base_uri = substr($path, 0, $records_pos);
		} else {
			$base_uri = '';
		}

		return $base_uri;
	}

	/**
	 * Extracts the endpoint from a URL given a list of possible endpoints
	 *
	 * @param string $url The URL to extract the endpoint from
	 * @param array $endpoints The list of possible endpoints
	 * @return string The extracted endpoint, or an empty string if no endpoint was found
	 */
	public static function get_endpoint($url, $endpoints) {
		foreach ($endpoints as $endpoint) {
			$pattern = '/^.*(' . preg_quote($endpoint, '/') . ')(\/.*)?$/';
			if (preg_match($pattern, $url)) {
				return $endpoint;
			}
		}
		return "";
	}

}
