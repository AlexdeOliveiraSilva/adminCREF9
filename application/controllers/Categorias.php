<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Categorias extends CI_Controller
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
        $data['pagina'] = "categorias";
        $data['list'] = $this->partners_model->getAllCategories();

        $this->load->view('home', $data);
    }

    public function edit($id)
    {
        $this->load->model('partners_model');
        $data = array();
        $data['title'] = "Atualizar categoria";
        $data['action'] = base_url('index.php/Categorias/update/' . $id);
        $data['pagina'] = "addcategory";
        $data['categories'] = $this->partners_model->getAllCategories();
        $data['partner'] = $this->partners_model->selectCategory($id);
        $this->load->view('home', $data);
    }

    public function add()
    {
        $this->load->model('partners_model');
        $data = array();
        $data['title'] = "Adicionar categoria";
        $data['action'] = base_url('index.php/Categorias/save');
        $data['pagina'] = "addcategory";
        $data['categories'] = $this->partners_model->getAllCategories();

        $this->load->view('home', $data);
    }





    public function update($id)
    {
        $this->load->library('awslib');
        $this->load->model('partners_model');
        $dados = $this->input->post();
        $this->partners_model->updateCategory($dados, $id);
        redirect("Categorias");
    }


    public function save()
    {
        $this->load->model('partners_model');
        $this->load->model('user_model');
        $dados = $this->input->post();
        $this->partners_model->insertCategoriy($dados);
        redirect("Categorias");
    }
}
