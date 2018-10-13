<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_us extends MX_Controller {

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
		$data['contact'] = json_decode($this->curl->simple_get($this->config->item('rest_api_default') . '/pages?slug=contact-us'),true);
		$data['csrf'] = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		$data['header_title'] = 'Kontak Bayo Binsar';
		$data['header_description'] = 'Hubungi Bayo Binsar untuk konsultasi mengenai gaya hidup, keuangan, motivasi, bisnis properti, publik speaking dan sales & marketing';
		$data['view'] = 'contact_us/main';
		$data['js'] = array('assets/custom_js/contact_us_inquiry.js');
		$this->load->view('template/template', $data);
	}

	public function submit_inquiry() {
		if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
		}

		$csrf = array(
			'csrfName' => $this->security->get_csrf_token_name(),
			'csrfHash' => $this->security->get_csrf_hash()
		);

		$data = array(
			'email' => $this->input->post('email'),
			'name' => $this->input->post('name'),
			'message' => $this->input->post('message'),
			'phone' => $this->input->post('phone')
		);

		$post = $this->curl->simple_post($this->config->item('rest_api_inoy') . '/inquiry', $data);

		if ( $post ) {
			$response = array(
				'status'=>200, 
				'message' => 'Your inquiry is success submited'
			);
			$this->__sendMail($data);
		} else {
			$response = array(
				'status'=>400, 
				'message' => 'Oops sorry something wrong please try again later'
			);
		}
		echo json_encode(array_merge($response, $csrf));
	}

	private function __sendMail($data) {
        $msg = $this->load->view('contact_us/include/email_inquiry',$data,true);
        $this->email->from('info@bayobinsar.com', 'Bayo Binsar Official Website');
        $this->email->to($data['email']); 
        $this->email->subject('Terima Kasih Telah Kirim Pesan Ke Bayo Binsar');
        $this->email->message($msg);  
		if ($this->email->send()) {
			return true;
		} else {
			show_error($this->email->print_debugger());
			exit;
		}
    }
}
