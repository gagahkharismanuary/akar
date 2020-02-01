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

	public function offer($id)  {
		$data['products'] = $this->m_web->getProductDetail($id)->row();
		$data['category'] = $this->m_web->getAllCategory()->result();
		
		$this->load->view('web/offer_project', $data);
	}

	public function add_action() {		

		$client_name = $this->input->post('client_name');
		$client_email = $this->input->post('client_email');
        $client_phone_number = $this->input->post('client_phone_number');
		$client_description = $this->input->post('client_description');

		$project_name = $this->input->post('project_name');
		$project_description = $this->input->post('project_description');
		$category_id = $this->input->post('category_id');
		$products_id = $this->input->post('products_id');
		$start_time = $this->input->post('start_time');
		$end_time = $this->input->post('end_time');
		
		
    	$dataClient = array(
				'client_name' => $client_name,
				'client_email' => $client_email,
                'client_phone_number' => $client_phone_number,
                'client_description' => $client_description,
			);

		$client_id = $this->m_web->input_project($dataClient, 'clients');
		$dataProject = array(
			'project_name' => $project_name,
			'project_description' => $project_description,
			'client_id' => $client_id,
			'category_id' => $category_id,
			'status_id' => 3,
			'products_id' => $products_id,
			'start_time' => $start_time,
			'end_time' => $end_time,
		);

		$this->m_web->input_project($dataClient, 'clients');
		$this->m_web->input_project($dataProject, 'projects');

		redirect('web');

	}
}
