<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Diretoria extends CI_Controller
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
        $this->load->model('diretoria_model');
        $data = array();
        $data['pagina'] = "diretoria";
        $data['list'] = $this->diretoria_model->selectAll();

        $this->load->view('home', $data);
    }

    public function edit($id)
    {
        $this->load->model('diretoria_model');
        $data = array();
        $data['title'] = "Atualizar diretor";
        $data['action'] = base_url('index.php/Diretoria/update/' . $id);
        $data['pagina'] = "adddiretoria";

        $data['partner'] = $this->diretoria_model->select($id);
        $this->load->view('home', $data);
    }

    public function add()
    {
        $this->load->model('diretoria_model');
        $data = array();
        $data['title'] = "Adicionar diretor";
        $data['action'] = base_url('index.php/Diretoria/save');
        $data['pagina'] = "adddiretoria";


        $this->load->view('home', $data);
    }





    public function update($id)
    {
        $this->load->library('awslib');
        $this->load->model('diretoria_model');
        $this->load->model('user_model');
        $dados = $this->input->post();



        if (!empty($_FILES['image']['name'])) {
            $extensao = $this->extensao($_FILES['image']['name']);

            $nomedoarquivo = "img/" . $this->generateRandomString(20) . "." . $extensao;

            $return = $this->awslib->uploadFile($_FILES['image'], $nomedoarquivo);

            if ($nomedoarquivo != "") {
                $dados['img'] =  $nomedoarquivo;
            }
        }

        $dados['dueDate'] = date("Y-m-d", strtotime(str_replace("/", "-", $dados['dueDate'])));
        $this->diretoria_model->update($dados, $id);


        redirect("Diretoria");
    }

    private function extensao($nome)
    {

        $extensao = explode(".", $nome);
        $extensao = $extensao[count($extensao) - 1];
        return $extensao;
    }



    private function generateRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function save()
    {
        $this->load->model('diretoria_model');
        $this->load->library('awslib');
        $dados = $this->input->post();

        if (!empty($_FILES['image']['name'])) {
            $extensao = $this->extensao($_FILES['image']['name']);

            $nomedoarquivo = "img/" . $this->generateRandomString(20) . "." . $extensao;

            $return = $this->awslib->uploadFile($_FILES['image'], $nomedoarquivo);

            if ($nomedoarquivo != "") {
                $dados['img'] =  $nomedoarquivo;
            }
        }

        $dados['dueDate'] = date("Y-m-d", strtotime(str_replace("/", "-", $dados['dueDate'])));
        $this->diretoria_model->insert($dados);
        redirect("Diretoria");
    }
}
