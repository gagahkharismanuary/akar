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
				$this->load->model("product_model");
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

		$id = '';
		$title = $this->input->post('title');
		$price_from = $this->input->post('price_from');
		$berkas = $this->_uploadImage();
		$category_id = $this->input->post('category_id');

		$data = array(
			'id' => $id,
			'title' => $title,
			'image' => $berkas,
			'price_from' => $price_from,
			'category_id' => $category_id,
		);

		// if (!empty($_FILES['image']['name'])) {
		// 	$upload = $this->_do_upload();
		// 	$data['image'] = $upload;
		// }
		var_dump($data);die;

		$this->m_data->input_data($data, 'projects');
		redirect('projects');
	}

	public function _uploadImage()
		{
			$config['upload_path']          = '../../assets/img/';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['overwrite']			= true;
			$config['max_size']             = 1024; // 1MB
			// $config['max_width']            = 1024;
			// $config['max_height']           = 768;

			$this->load->library('upload', $config);

			// if ($this->upload->do_upload('berkas')) {
			//     return $this->upload->data("file_name");
			// }
			if ($this->upload->do_upload('berkas'))
			{
							$error = array('error' => $this->upload->display_errors());
							$this->load->view('admin/projects_add', $error);
			} else {
							$data = array('upload_data' => $this->upload->data());
							$this->load->view('admin/projects', $data);
			}
			
			// return "default.jpg";
	}
}