<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clients extends CI_Controller {
    
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
				$this->load->model('m_clients');
				$this->load->library('form_validation');
				// Cek apakah terdapat session dengan nama authenticated
        if(! $this->session->userdata('authenticated')) {
            // Jika tidak ada
                redirect('admin'); // Redirect ke halaman login
        }
    }
	public function index() {
		// $data['project'] = $this->m_data->get_projects()->result();
        $data['clients'] = $this->m_clients->get_clients(); 
		$this->load->view('admin/clients', $data);
    }

    public function add() {
        $this->load->view("admin/clients_add");
    }

    public function add_action() {

        $client_name = $this->input->post('client_name');
		$client_email = $this->input->post('client_email');
        $client_phone_number = $this->input->post('client_phone_number');
        $client_description = $this->input->post('client_description');

    	$data = array(
				'client_name' => $client_name,
				'client_email' => $client_email,
                'client_phone_number' => $client_phone_number,
                'client_description' => $client_description,
			);

		$this->m_clients->input_clients($data, 'clients');
		redirect('clients');
    }

    public function edit($id)  {
		$data['clients'] = $this->m_clients->getClientDetail($id)->row();
		
		$this->load->view('admin/clients_edit', $data);
	}

	public function update(){

		$client_id = $this->input->post('client_id');
		$client_name = $this->input->post('client_name');
		$client_email = $this->input->post('client_email');
        $client_phone_number = $this->input->post('client_phone_number');
        $client_description = $this->input->post('client_description');

    	$data = array(
				'client_name' => $client_name,
				'client_email' => $client_email,
				'client_phone_number' => $client_phone_number,
				'client_description' => $client_description,
			);
	
		$where = array(
			'client_id' => $client_id
		);
	
		$this->m_clients->update_clients($where,$data,'clients');
		redirect('clients');
	}
    
}