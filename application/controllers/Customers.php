<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customers extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		if ($this->session->userdata('user') == null) {
			redirect('Login');
		}
	}

	public function searchCPF()
	{
		$this->load->model('customers_model');
		header('Access-Control-Allow-Origin: *');
		header('Content-type: application/json');
		$search = $this->customers_model->searchCPF($this->input->post("cpf"));
		$data = array();
		$data['status'] = "NAOOK";
		$data['nome'] = "";
		$data['id'] = "";
		if ($search !== -1) {
			$data['nome'] = $search->cliente;
			$data['id'] = $search->id;
			$data['status'] = "OK";
		}
		echo json_encode($data);
	}

	public function saveRegistre()
	{
		$this->load->model('customers_model');
		$customers = $this->input->post("customers");
		$data = array();
		$data['customers'] = $customers;
		$data['partners'] = $this->session->userdata('user')->partners;
		$this->customers_model->insertValidation($data);
	}

	public function index()
	{
		$this->load->model('customers_model');
		$data = array();
		$data['pagina'] = "customers";
		$data['list'] = $this->customers_model->selectAll();
		$this->load->view('home', $data);
	}

	public function edit($id)
	{
		$this->load->model('customers_model');
		$this->load->model('companys_model');
		$data = array();
		$data['title'] = "Atualizar dados de cliente";
		$data['action'] = base_url('index.php/Customers/update/' . $id);
		$data['pagina'] = "addcustomers";
		$data['companies'] = $this->companys_model->selectAll();
		$data['partner'] = $this->customers_model->select($id);
		$this->load->view('home', $data);
	}

	public function add()
	{

		$this->load->model('companys_model');
		$data = array();
		$data['title'] = "Adicionar Cliente";
		$data['action'] = base_url('index.php/Customers/save');
		$data['pagina'] = "addcustomers";
		$data['companies'] = $this->companys_model->selectAll();

		$this->load->view('home', $data);
	}






	public function delete($id)
	{
		$this->load->model('customers_model');
		$data = array();
		$data['situation'] = 2;
		$this->customers_model->update($data, $id);
		redirect("Customers");
	}

	public function update($id)
	{
		$this->load->model('customers_model');
		$this->load->model('user_model');
		$dados = $this->input->post();
		$dados['situation'] = 1;
		if($dados['password'] != ""){
			$dados['password'] = md5($dados['password']);
		}
		$this->customers_model->update($dados, $id);

		redirect("Customers");
	}

	public function save()
	{
		$this->load->model('customers_model');
		$dados = $this->input->post();
		$dados['password'] = md5($dados['password']);
		$this->customers_model->insert($dados);
		redirect("Customers");
	}


	public function report()
	{
		$this->load->model('customers_model');
		$data = array();
		$data['pagina'] = "reportvalidations";
		$data['list'] = $this->customers_model->selectAllValidations();

		$this->load->view('home', $data);
	}
}
