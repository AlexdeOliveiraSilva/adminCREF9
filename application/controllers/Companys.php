<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Companys extends CI_Controller
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
		$this->load->model('companys_model');
		$data = array();
		$data['pagina'] = "companys";
		$data['list'] = $this->companys_model->selectAll();

		$this->load->view('home', $data);
	}

	public function edit($id)
	{
		$this->load->model('companys_model');
		$data = array();
		$data['title'] = "Atualizar curso";
		$data['action'] = base_url('index.php/Companys/update/' . $id);
		$data['pagina'] = "addcompany";
		$data['partner'] = $this->companys_model->select($id);
		$this->load->view('home', $data);
	}

	public function add()
	{
		$this->load->model('companys_model');
		$data = array();
		$data['title'] = "Adicionar curso";
		$data['action'] = base_url('index.php/Companys/save');
		$data['pagina'] = "addcompany";

		$this->load->view('home', $data);
	}





	public function update($id)
	{
		$this->load->library('awslib');
		$this->load->model('companys_model');
		$dados = $this->input->post();



		if (!empty($_FILES['logo']['name'])) {
			$extensao = $this->extensao($_FILES['logo']['name']);

			$nomedoarquivo = "logos/" . $this->generateRandomString(20) . "." . $extensao;

			$return = $this->awslib->uploadFile($_FILES['logo'], $nomedoarquivo);


			if ($nomedoarquivo != "") {
				$dados['logo'] =  $nomedoarquivo;
			}
		}

		$this->companys_model->update($dados, $id);

		redirect("Companys");
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
		$this->load->model('cursos_model');
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



		$this->cursos_model->insert($dados);
		redirect("Cursos");
	}
}
