<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends CI_Controller {

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
	function __construct(){
		parent::__construct();	
		$this->load->helper('url');	
		$this->load->model('m_web');
		$this->load->model('GambarModel');
		// $this->load->model('m_data');
	}
 
	public function index()
	{
		$data['products'] = $this->m_web->get_products(); 
		$this->load->view('web/index.php', $data);
	}

	public function detail($id)  {
		$data['products'] = $this->m_web->getProductDetail($id)->row();
		$data['category'] = $this->m_web->getAllCategory()->result();
		
		$this->load->view('web/product_detail', $data);
	}
}
