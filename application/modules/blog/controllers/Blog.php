<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends MX_Controller {

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
		$keyword = "";
		$blog = json_decode($this->curl->simple_get($this->config->item('rest_api_default') . '/categories/?slug=blog'), true);
		$data['list_category'] = json_decode($this->curl->simple_get($this->config->item('rest_api_default') . '/categories/?parent=' . $blog[0]['id']),true);
		if ($this->input->get('search', TRUE)) {
			$data['blog'] = json_decode($this->curl->simple_get($this->config->item('rest_api_default') . '/posts?categories=' . $blog[0]['id'] . '&search=' . $this->input->get('search', TRUE)),true);
			$keyword = $this->input->get('search', TRUE);
		} else {
			$data['blog'] = json_decode($this->curl->simple_get($this->config->item('rest_api_default') . '/posts?categories=' . $blog[0]['id']),true);
		}
		$data['keyword'] = $keyword;
		$data['current_category'] = 0;
		$data['view'] = 'blog/main';
		$this->load->view('template/template', $data);
	}

	public function category($slug) {
		$parent = json_decode($this->curl->simple_get($this->config->item('rest_api_default') . '/categories/?slug=blog'), true);
		$blog = json_decode($this->curl->simple_get($this->config->item('rest_api_default') . '/categories/?slug=' . $slug), true);
		$data['blog'] = json_decode($this->curl->simple_get($this->config->item('rest_api_default') . '/posts?categories=' . $blog[0]['id']),true);
		$data['list_category'] = json_decode($this->curl->simple_get($this->config->item('rest_api_default') . '/categories/?parent=' . $parent[0]['id']),true);
		$data['current_category'] = $blog[0]['id'];
		$data['view'] = 'blog/main';
		$this->load->view('template/template', $data);
	}

	public function detail($id) {
		//increment posts view
		$this->curl->simple_get($this->config->item('rest_api_inoy') . '/countview/' . $id);
		//get comment
		$data['comment'] = json_decode($this->curl->simple_get($this->config->item('rest_api_default') . '/comments/?post=' . $id . '&order=asc'), true);
		$blog = json_decode($this->curl->simple_get($this->config->item('rest_api_default') . '/categories/?slug=blog'), true);
		$data['list_category'] = json_decode($this->curl->simple_get($this->config->item('rest_api_default') . '/categories/?parent=' . $blog[0]['id']),true);
		$data['article'] = json_decode($this->curl->simple_get($this->config->item('rest_api_default') . '/posts/' . $id), true);
		$data['contact'] = json_decode($this->curl->simple_get($this->config->item('rest_api_default') . '/pages?slug=contact-us'), true);
		$data['csrf'] = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		$data['view'] = 'blog/detail';
		$this->load->view('template/template', $data);
	}

	public function post_comment() {
		if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
		}
		$data = array(
			'author_name' => $this->input->post('author_name'),
			'author_email' => $this->input->post('author_email'),
			'content' => $this->input->post('content'),
			'post' => $this->input->post('post')
		);
		$csrf = array(
			'csrfName' => $this->security->get_csrf_token_name(),
			'csrfHash' => $this->security->get_csrf_hash()
		);
		$post = $this->curl->simple_post($this->config->item('rest_api_default') . '/comments', $data);
		if ( $post ) {
			$response = array(
				'status'=>200, 
				'message' => 'Your Comment is success submited'
			);
		} else {
			$response = array(
				'status'=>400, 
				'message' => 'Oops sorry something wrong please try again later'
			);
		}
		echo json_encode(array_merge($response, $csrf));
	}
}
