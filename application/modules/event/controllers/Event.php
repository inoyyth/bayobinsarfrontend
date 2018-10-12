<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends MX_Controller {

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
		$get_category_id = json_decode($this->curl->simple_get($this->config->item('rest_api_default') . '/categories/?slug=event'), true);
		$data['event'] = json_decode($this->curl->simple_get($this->config->item('rest_api_default') . '/posts?categories=' . $get_category_id[0]['id'] . '&per_page=10&orderby=date&order=desc'),true);
		$data['header_title'] = 'Daftar Event Public Speaking dan Seminar Bayo Binsar';
		$data['header_description'] = 'Ikuti seminar bresama Bayo Binsar untuk  mendapatkan pengetahuan dan konsultasi mengenai gaya hidup, keuangan, motivasi, bisnis properti, publik speaking dan sales & marketing';
		$data['view'] = 'event/main';
		$this->load->view('template/template', $data);
	}
}
