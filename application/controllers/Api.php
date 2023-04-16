<?php

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . 'libraries/Crud_api.php';
class Api extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$config = [
			'database' => $this->db->database,
			'username' => $this->db->username,
			'password' => $this->db->password,
			'driver' => $this->db->dbdriver === 'mysqli' ? 'mysql' : $this->db->dbdriver,
			'address' => $this->db->hostname,
			'debug' => $this->db->db_debug,
			'basePath' => Crud_api::get_base_path(),
		];

		$this->load->library('crud_api', $config);
	}

	public function index() {
		echo "base path:" . Crud_api::get_base_path();
		$this->crud_api->handle_request();
	}

}