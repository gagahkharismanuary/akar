<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {
    
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
				$this->load->model('m_products');
				$this->load->model('GambarModel');
				$this->load->library('form_validation');
				// Cek apakah terdapat session dengan nama authenticated
        if(! $this->session->userdata('authenticated')) {
            // Jika tidak ada
                redirect('admin'); // Redirect ke halaman login
        }
    }
	public function index() {
		// $data['project'] = $this->m_data->get_projects()->result();
		$data['products'] = $this->m_products->get_products(); 
		$this->load->view('admin/products', $data);
    }
    
    public function add() {
			$data['category'] = $this->m_products->getAllCategory()->result();
			$this->load->view("admin/products_add", $data);
    }
    
    public function add_action() {

		$upload = $this->GambarModel->upload();

		$title = $this->input->post('title');
		$description = $this->input->post('description');
		$price_from = $this->input->post('price_from');
		$category_id = $this->input->post('category_id');

			if($upload['result'] == "success"){ // Jika proses upload sukses		
				$this->GambarModel->save($upload);
			}else{ // Jika proses upload gagal
				$data['message'] = $upload['error'];
			}

    	$data = array(
				'title' => $title,
				'description' => $description,
				'price_from' => $price_from,
				'category_id' => $category_id,
				'image' => $upload['file']['file_name'],
			);

		$this->m_products->input_product($data, 'products');
		redirect('products');
	}

	public function edit($id)  {
		$data['products'] = $this->m_products->getProductDetail($id)->row();
		$data['category'] = $this->m_products->getAllCategory()->result();
		
		$this->load->view('admin/products_edit', $data);
	}

	public function update(){
		
		$upload = $this->GambarModel->upload();

		$id = $this->input->post('product_id');
		$title = $this->input->post('title');
		$description = $this->input->post('description');
		$price_from = $this->input->post('price_from');
		$category_id = $this->input->post('category_id');

			if($upload['result'] == "success"){ // Jika proses upload sukses		
				$this->GambarModel->save($upload);
			}else{ // Jika proses upload gagal
				$data['message'] = $upload['error'];
			}

    	$data = array(
				'title' => $title,
				'description' => $description,
				'price_from' => $price_from,
				'category_id' => $category_id,
				'image' => $upload['file']['file_name'],
			);
	
		$where = array(
			'product_id' => $id
		);
	
		$this->m_products->update_product($where,$data,'products');
		redirect('products');
	}
}