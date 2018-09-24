<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));

		if ( !$content = $this->cache->get('content'))
		{
			$api = file_get_contents('https://api.privatbank.ua/p24api/pubinfo?exchange&json&coursid=11');
			$content = json_decode($api);
			$this->load->database();
			$course = [];
			for ($i=0; $i < 4 ; $i++) {
			$row = [
		            	'currency_id' => $content[$i]->ccy,
		            	'buy' => $content[$i]->buy,
		            	'sale' => $content[$i]->sale
            	    ];
				array_push($course, $row);
	        }
	
			$this->db->insert_batch('course', $course);
			 
			$this->cache->save('content', $content, 600);
		}
		$data = array('content' => $content);
		$this->load->view('welcome_message');
	    $this->load->view('course', $data);
	}
}
