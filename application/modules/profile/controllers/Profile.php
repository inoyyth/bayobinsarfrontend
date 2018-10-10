<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends MX_Controller {

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
		$data['profile_article'] = json_decode($this->curl->simple_get($this->config->item('rest_api_default') . '/pages?slug=bayos-profile'),true);
		$data['my_story'] = json_decode($this->curl->simple_get($this->config->item('rest_api_default') . '/posts?categories=6&orderby=date&order=asc'),true);
		$data['contact'] = json_decode($this->curl->simple_get($this->config->item('rest_api_default') . '/pages?slug=contact-us'),true);
		$data['header_title'] = 'Profile';
		$data['header_description'] = character_limiter(strip_tags($data['profile_article'][0]['content']['rendered']), 160, '');
		$data['header_image'] = $data['profile_article'][0]['featured_image']['url'];
		$data['view'] = 'profile/main';
		$this->load->view('template/template', $data);
	}
}
