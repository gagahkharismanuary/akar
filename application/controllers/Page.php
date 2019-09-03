<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Page extends MY_Controller {
  public function welcome(){
    $this->load->view('admin');
  }
  public function thanks(){
    $this->load->view('thanks');
  }
}