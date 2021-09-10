<?php

// require_once dirname(dirname(__FILE__)) . '../libraries/Requests.php';
include(dirname(dirname(__FILE__)) . '../libraries/Requests.php');

class ApiRequest extends CI_Model
{
	protected $urlApi = "http://127.0.0.1/sipitung/api/";
	// protected $urlApi = "https://api-sipitung.000webhostapp.com/api/";
	private $is_key = "f24a23c6f3428925762c17e3bb5aff2f8b0b45215c67d47ce60828104e716ff3";

	function __construct()
	{
		parent::__construct();
		Requests::register_autoloader();
	}

	public function get_data($url) {
		$opt		= array('timeout' => 600);

		$request	= Requests::get($this->urlApi.$url."is_key=$this->is_key", array('Accept' => 'application/json'), $opt);

		return $request->body;
	}

	public function post_data_body($url, $data) {

		$header			= array('Content-Type' => 'application/x-www-form-urlencoded');
		$opt			= array('timeout' => 600);
		$data['is_key']	= $this->is_key;

		$response = Requests::post($this->urlApi.$url, $header, $data, $opt);

		return $response->body;
	}

	public function update_data_body($url, $data) {

		$header			= array('Content-Type' => 'application/x-www-form-urlencoded');
		$opt			= array('timeout' => 600);
		$data['is_key']	= $this->is_key;

		$response = Requests::post($this->urlApi.$url, $header, $data, $opt);

		return $response->body;
	}

	public function upload_image_body($url, $data) {

		$header			= array('Content-Type' => 'application/x-www-form-urlencoded');
		$opt			= array('timeout'	=> 600);
		$data['is_key']	= $this->is_key;

		$response = Requests::post($this->urlApi.$url, $header, $data, $opt);

		return $response->body;
	}

	public function put_data_body($url, $data) {

		$header = array(
			'Content-Type' => 'application/x-www-form-urlencoded'
		);

		$data['is_key']	= $this->is_key;
		
		$response = Requests::put($this->urlApi.$url, $header, $data);

		return $response->body;
	}

	public function delete_data($url, $data) {

		$header			= array('Content-Type' => 'application/x-www-form-urlencoded');
		$opt			= array('timeout' => 600);
		$data['is_key'] = $this->is_key;

		// $response = Requests::patch($this->urlApi.$url, $header, $data);
		$response = Requests::post($this->urlApi.$url, $header, $data, $opt);

		return $response->body;
	}

}
