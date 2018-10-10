<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service extends MX_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	function __construct() {
		parent::__construct();
	}

	public function index()
	{
		$category = json_decode($this->curl->simple_get($this->config->item('rest_api_default') . '/categories/?slug=my-service'), true);
		$data['service'] = json_decode($this->curl->simple_get($this->config->item('rest_api_default') . '/posts?categories=' . $category[0]['id']),true);
		$data['header_title'] = 'Layanan';
		$data['header_description'] = 'Layanan pengetahuan tentang gaya hidup, keuangan, motivasi, bisnis properti, publik speaking dan sales & marketing';
		$data['view'] = 'service/main';
		$this->load->view('template/template', $data);
	}
}
