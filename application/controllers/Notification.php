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
		
		$data = array();
		$data['pagina'] = "notification";
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
			'title' => $data['title'],);
		print_r($this->sendGCM($msg));die;
		$this->notifications_model->insert($data);
		redirect('Notification');
	}

	private function sendGCM($message) {
		$content    = array(
			"en" => $message['body'],
			"pt" => $message['body'],
		);
		
		$hashes_array = array();

		array_push($hashes_array, array(
			"id" => "like-button",
			"text" => "Fechar",
			// "icon" => "http://i.imgur.com/N8SN8ZS.png",
			// "url" => "https://yoursite.com"
		));
		
		$fields = array(
			'app_id' => "c8f9458f-12c2-4020-8fad-3932c6e51714",
			'included_segments' => array(
				'Subscribed Users'
			),
			'data' => array(
				
			),
			'contents' => $content,
			'headings'=> array("en"=> $message['title'], "pt"=> $message['title']),
			'web_buttons' => $hashes_array
		);
		
		$fields = json_encode($fields);
		print("\nJSON sent:\n");
		print($fields);
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json; charset=utf-8',
			'Authorization: Basic MWIyYzI5ODctMTM0OS00MDdiLTk4MmQtODdmM2NiMWI5YzFk'
		));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
		curl_setopt($ch, CURLOPT_POST, TRUE);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		
		$response = curl_exec($ch);
		curl_close($ch);
		
		return $response;
	}


}
