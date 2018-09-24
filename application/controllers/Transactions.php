<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transactions extends CI_Controller {

	public function index() 
	{
        $this->load->database();
		$this->db->select('*');
		$this->db->from('users');
		$this->db->join('balance', 'users.id = balance.user_id');

		$result = $this->db->get();
		$content = $result->result();

		// if (isset($_POST['submit'])) {
		// 	$ind = $_POST['ind'];
		// 	$for = $_POST['for'];
		// 	$sum = $_POST['sum'];

		// 	$arr = [
		// 		'balance' => $ind,
		// 		// 'for' => $for,
		// 		// 'sum' => $sum
		// 	];


		// 		// "START TRANSACTION;
		// 		// UPDATE `balance` SET `balance`= balance -'$sum' WHERE user_id = (SELECT users.id FROM users WHERE users.id = '$ind' );
	 //   //          UPDATE `balance` SET `balance`= balance +'$sum' WHERE user_id = (SELECT users.id FROM users WHERE users.id = '$for' );
	 //   //          INSERT INTO 'transactions' ('sender', 'payee', 'sum') VALUES ('$ind', '$for', '$sum');
		// 		// COMMIT;"

		// 	$this->db->trans_start();
		// 	$this->db->update('balance', $arr);
		// 	$this->db->where('SELECT users.id FROM users WHERE users.id = 1');
		// 	$this->db->trans_complete();
		// }
	    $history = $this->db->get('transactions');
        $data = array('content' => $content, 'history' => $history);
		$this->load->view('welcome_message');
	    $this->load->view('transaction', $data);
    }
}