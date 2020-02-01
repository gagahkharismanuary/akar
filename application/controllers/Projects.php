<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Projects extends CI_Controller {
    
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
      public function __construct(){
        parent::__construct();
			
				$this->load->helper('form', 'url');	
				$this->load->model('m_projects');
				$this->load->model('GambarModel');
				$this->load->library('form_validation');
				// Cek apakah terdapat session dengan nama authenticated
        if(! $this->session->userdata('authenticated')) {
					// Jika tidak ada
						redirect('admin'); // Redirect ke halaman login
				}
    }
	public function index()
	{
		// $data['project'] = $this->m_data->get_projects()->result();
        $data['project'] = $this->m_projects->get_projects(); 

		$this->load->view('admin/projects', $data);
	}


	public function add() {
		$data['category'] = $this->m_projects->getAllCategory()->result();
		$data['clients'] = $this->m_projects->getAllClients()->result();
		$data['status'] = $this->m_projects->getAllStatus()->result();
		$data['products'] = $this->m_projects->getAllProducts()->result();
		$this->load->view("admin/projects_add", $data);
	}

	public function add_action() {		

		$project_name = $this->input->post('project_name');
		$project_description = $this->input->post('project_description');
		$client_id = $this->input->post('client_id');
		$category_id = $this->input->post('category_id');
		$status_id = $this->input->post('status_id');
		$products_id = $this->input->post('products_id');
		$start_time = $this->input->post('start_time');
		$end_time = $this->input->post('end_time');


    	$data = array(
				'project_name' => $project_name,
				'project_description' => $project_description,
				'client_id' => $client_id,
				'category_id' => $category_id,
				'status_id' => $status_id,
				'products_id' => $products_id,
				'start_time' => $start_time,
				'end_time' => $end_time,
			);

		$this->m_projects->input_project($data, 'projects');
		redirect('projects');
	}

	public function edit($id)  {
		$data['projects'] = $this->m_projects->getProjectDetail($id)->row();
		$data['category'] = $this->m_projects->getAllCategory()->result();
		$data['clients'] = $this->m_projects->getAllClients()->result();
		$data['status'] = $this->m_projects->getAllStatus()->result();
		$data['products'] = $this->m_projects->getAllProducts()->result();
		$this->load->view('admin/projects_edit', $data);
	}

	public function update(){
		
		$project_id = $this->input->post('project_id');
		$project_name = $this->input->post('project_name');
		$project_description = $this->input->post('project_description');
		$client_id = $this->input->post('client_id');
		$category_id = $this->input->post('category_id');
		$status_id = $this->input->post('status_id');
		$products_id = $this->input->post('products_id');
		$start_time = $this->input->post('start_time');
		$end_time = $this->input->post('end_time');


    	$data = array(
			'project_name' => $project_name,
			'project_description' => $project_description,
			'client_id' => $client_id,
			'category_id' => $category_id,
			'status_id' => $status_id,
			'products_id' => $products_id,
			'start_time' => $start_time,
			'end_time' => $end_time,
		);
	
		$where = array(
			'project_id' => $project_id
		);
	
		$this->m_projects->update_project($where,$data,'projects');
		redirect('projects');
	}
}