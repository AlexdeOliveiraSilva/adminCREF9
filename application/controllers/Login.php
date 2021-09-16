<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	function __construct()
	{
		
		parent::__construct();
		$this->load->library('session');
	}

	public function index()
	{
		$this->load->view('login');
	}

	public function tryLogin()
	{
		$this->load->model('user_model');
		$data = $this->input->post();
		$u = $this->user_model->login($data['email'], $data['password']);
		if ($u == null) {
			$data = array();
			$data['error'] = "Usuário/senha inválidos";
			$this->load->view('login', $data);
		} else {
			$this->session->set_userdata('user', $u);
			redirect('Dashboard');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('user');
		redirect('Login');
	}
}
