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
				$this->load->model('m_data');
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
		$data['project'] = $this->m_data->get_projects(); 
		$this->load->view('admin/projects', $data);
	}

	public function add()
	{
			// $product = $this->product_model;
			// $validation = $this->form_validation;
			// $validation->set_rules($product->rules());

			// if ($validation->run()) {
			// 		$product->save();
			// 		$this->session->set_flashdata('success', 'Berhasil disimpan');
			// }

			$data['category'] = $this->m_data->getAllCategory()->result();
			$this->load->view("admin/projects_add", $data);
	}

	public function add_action(){

		$upload = $this->GambarModel->upload();

		$title = $this->input->post('title');
		$price_from = $this->input->post('price_from');
		$category_id = $this->input->post('category_id');

			if($upload['result'] == "success"){ // Jika proses upload sukses		
				$this->GambarModel->save($upload);
			}else{ // Jika proses upload gagal
				$data['message'] = $upload['error'];
			}

    	$data = array(
				'title' => $title,
				'price_from' => $price_from,
				'category_id' => $category_id,
				'image' => $upload['file']['file_name'],
			);

		$this->m_data->input_data($data, 'projects');
		redirect('projects');
	}
}