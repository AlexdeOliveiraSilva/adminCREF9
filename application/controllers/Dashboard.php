<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
  function __construct()
  {
    
    parent::__construct();
    $this->load->library('session');

    if ($this->session->userdata('user') == null) {
      redirect('Login');
    }
  }

  public function index()
  {
    $this->load->model('partners_model');
    
   
    $data = array();
    $data['pagina'] = "dash";
    $this->load->view('home', $data);
  }
}
