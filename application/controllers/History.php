<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class History extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{   
        $this->load->database();
		$content = $this->db->get('course');
		$data = array('content' => $content);
		$this->load->view('welcome_message');
		$this->load->view('history', $data);
	}
}