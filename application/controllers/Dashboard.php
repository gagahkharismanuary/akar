<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    
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
		$this->load->model('m_dashboard');
        // Cek apakah terdapat session dengan nama authenticated
        if(! $this->session->userdata('authenticated')) // Jika tidak ada
            redirect('admin'); // Redirect ke halaman login
    }
	public function index()
	{
		// $data['sumProjects'] = $this->m_dashboard->tampil_kota();
		// $this->load->view('admin/dashboard', $data);
		// $data['projects'] = $this->m_dashboard->sumProjects();
		$data['inProgress'] = $this->m_dashboard->inProgress();
		$data['done'] = $this->m_dashboard->done();
		$data['pending'] = $this->m_dashboard->pending();
		$data['canceled'] = $this->m_dashboard->canceled();
		$data['totalProjects'] = $this->m_dashboard->totalProjects();
 		$this->load->view('admin/dashboard', $data);
	}

	public function blank() {
		$this->load->view('blank');	
	}

	public function table() {
		$this->load->view('table');	
	}

	public function project() {
		$this->load->view('projects');	
	}
}
