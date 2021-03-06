<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MX_Controller {

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
		$data['top_article'] = json_decode($this->curl->simple_get($this->config->item('rest_api_default') . '/pages?slug=home-page'),true);
		$data['service_article'] = json_decode($this->curl->simple_get($this->config->item('rest_api_default') . '/pages?slug=bayos-profile'),true);
		$data['people_says'] = json_decode($this->curl->simple_get($this->config->item('rest_api_default') . '/posts?categories=5'),true);
		$data['contact'] = json_decode($this->curl->simple_get($this->config->item('rest_api_default') . '/pages?slug=contact-us'),true);
		$data['csrf'] = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		$data['header_title'] = 'Head Of Business Development-Property Practitioners-Motivator Public Speaking';
		$data['header_description'] = 'Bayo Binsar Head Of Business Development-Property Practitioners-Motivator Public Speaking Muda Indonesia';
		$data['header_image'] = $data['top_article'][0]['featured_image']['url'];
		$data['view'] = 'welcome/main';
		$data['js'] = array('assets/custom_js/contact_us_inquiry.js');
		$this->load->view('template/template', $data);
	}
}
