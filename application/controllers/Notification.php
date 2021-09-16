<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Notification extends CI_Controller
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
		$this->load->model('notifications_model');
		$this->load->model('companys_model');
		$data = array();
		$data['pagina'] = "notification";
		$data['companies'] = $this->companys_model->selectAll();
		$data['list'] = $this->notifications_model->selectAll();
		
		$this->load->view('home', $data);
	}

	

	public function add()
	{
		
		$this->load->model('notifications_model');
		$data = $this->input->post();
		$data['sendDateTime'] = date('Y-m-d H:i:s');
		$msg = array(
			'body' => $data['body'], 
		'title' => $data['title'], 
		'vibrate'   => 1,
		'sound'     => 1);
		$this->sendGCM($msg, $data['companys']);
		$this->notifications_model->insert($data);
		redirect('Notification');
	}

	private function sendGCM($message, $company) {
		$url = 'https://fcm.googleapis.com/fcm/send';
		$fields = array (
				'to' => '/topics/'.$company.'_company',
				'vibrate'   => 1,
				'sound'     => 1,
				'notification' => $message
		);
		$fields = json_encode ( $fields );
		$headers = array (
				'Authorization: key=' . "AAAASOglZ4k:APA91bHlzAZWJ2PlzdZS64yJWHGVi4TSl5EArqf22cxhsz_A1x8voqzHOyEpXGfQLhxG0K0ayaNJHxcBK2qypFC_DF7bF_uKqRiFlAhNB4bzteAm9f4OyfS550hIt6S6N8ow_tF6zOc_",
				'Content-Type: application/json'
		);
	
		$ch = curl_init ();
		curl_setopt ( $ch, CURLOPT_URL, $url );
		curl_setopt ( $ch, CURLOPT_POST, true );
		curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );
		curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
		curl_setopt ( $ch, CURLOPT_POSTFIELDS, $fields );
	
		$result = curl_exec ( $ch );
		
		
		curl_close ( $ch );
	}


}
