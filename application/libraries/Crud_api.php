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
	 * Crud_api constructor.
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
		
		//translate db driver
		$config['driver']=$this->_map_db_driver($config['driver']);
		// Merge user config options with the default config options
		$this->config = new Config($config);

		$this->api = new API($this->config);
		log_message('debug', "My CRUD API Class Initialized");
	}

	/**
	 * Handles an API request by delegating to the php-crud-api instance.
	 * @return Response variable
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
		$endpoints = ["/records", "/columns", "/openapi", "/login", "/logout", "/cache/clear","/geojson","/openapi","/status/ping"];
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

	
	/**
	 * Maps between PHP-CRUD-API and CodeIgniter database drivers.
	 *
	 * @param string $driver Database driver name (either PHP-CRUD-API or CodeIgniter driver).
	 * @param bool $reverse If true, maps from CodeIgniter to PHP-CRUD-API driver (default: false).
	 * @return string|null Mapped database driver name, or null if not found.
	 */
	private function _map_db_driver($driver) {
    $default_drivers = ['mysql', 'pgsql', 'sqlite', 'sqlsrv'];

    // Define mappings for CodeIgniter drivers to PHP-CRUD-API drivers
    $ci_driver_mapping = array(
        'mysqli' => 'mysql',
        'postgre' => 'pgsql',
        'sqlite3' => 'sqlite',
        // Add more mappings for other CodeIgniter drivers to PHP-CRUD-API drivers
        // 'codeigniter_driver' => 'php_crud_api_driver',
    );

    // Check if the driver is in the list of default drivers, and return the driver if found
    if (in_array($driver, $default_drivers)) {
        return $driver;
    } else {
        // Check if the CodeIgniter driver is in the mapping array, and return the corresponding PHP-CRUD-API driver
        return isset($ci_driver_mapping[$driver]) ? $ci_driver_mapping[$driver] : null;
    }
	}



}
