<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UsesReport extends CI_Controller
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
        $this->load->model('user_model');
        $data = array();
        $data['pagina'] = "usosreport";
        $data['list'] = $this->user_model->selectAllUtilizatons();

        $this->load->view('home', $data);
    }

    
}
