<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CategoriasCursos extends CI_Controller
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
        $this->load->model('cursos_model');
        $data = array();
        $data['pagina'] = "categorias";
        $data['list'] = $this->cursos_model->getAllCategories();
        $data['title'] = "Categorias de cursos";
        $data['controller'] = "CategoriasCursos";
        $data['backController'] = "Cursos";
        $this->load->view('home', $data);
    }

    public function edit($id)
    {
        $this->load->model('cursos_model');
        $data = array();
        $data['title'] = "Atualizar categoria de cursos";
        $data['backController'] = "Cursos";
        $data['action'] = base_url('index.php/CategoriasCursos/update/' . $id);
        $data['pagina'] = "addcategory";
        $data['controller'] = "CategoriasCursos";
        $data['categories'] = $this->cursos_model->getAllCategories();
        $data['partner'] = $this->cursos_model->selectCategory($id);
        $this->load->view('home', $data);
    }

    public function add()
    {
        $this->load->model('cursos_model');
        $data = array();
        $data['title'] = "Adicionar categoria de cursos";
        $data['backController'] = "Cursos";
        $data['action'] = base_url('index.php/CategoriasCursos/save');
        $data['pagina'] = "addcategory";
        $data['controller'] = "CategoriasCursos";
        $data['categories'] = $this->cursos_model->getAllCategories();
        $this->load->view('home', $data);
    }





    public function update($id)
    {
        $this->load->model('cursos_model');
        $dados = $this->input->post();
        $this->cursos_model->updateCategory($dados, $id);
        redirect("CategoriasCursos");
    }


    public function save()
    {
        $this->load->model('cursos_model');
        $this->load->model('user_model');
        $dados = $this->input->post();
        $this->cursos_model->insertCategoriy($dados);
        redirect("CategoriasCursos");
    }
}
