<?php

class User_model extends CI_Model {

	public function __construct()
	{
                parent::__construct();
	}

	public function transaction($ind, $for, $sum)
	{
		$this->db->query(
			"START TRANSACTION;
			UPDATE `balance` SET `balance`= balance -'$sum' WHERE user_id = (SELECT users.id FROM users WHERE users.id = '$ind' );
            UPDATE `balance` SET `balance`= balance +'$sum' WHERE user_id = (SELECT users.id FROM users WHERE users.id = '$for' );
            INSERT INTO 'transactions' ('sender', 'payee', 'sum') VALUES ('$ind', '$for', '$sum');
			COMMIT;"
		);
	}



// START TRANSACTION;
// 			UPDATE `balance` SET `balance`= balance -'15' WHERE user_id = (SELECT users.id FROM users WHERE users.id = '1' );
//             UPDATE `balance` SET `balance`= balance +'15' WHERE user_id = (SELECT users.id FROM users WHERE users.id = '2' );
// INSERT INTO `transactions`(`sender_id`, `payee_id`, `sum`) VALUES ('1', '2', '15');
// COMMIT;