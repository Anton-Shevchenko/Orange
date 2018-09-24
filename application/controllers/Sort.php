<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sort extends CI_Controller {

	public function index()
	{

    $content = array(
       array('x','67','16'),
        array('w','98','93'),
        array('g','1','71'),
        array('p','21','3'),
        array('q','88','35'),
        array('b','76','61'),
        array('w','83','25'),
        array('u','19','94'),
        array('t','98','90'),
        array('w','6','79'),
        array('e','45','66'),
        array('r','16','14'),
        array('s','55','94'),
        array('o','47','30'),
        array('p','6','52'),
        array('e','5','59'),
        array('k','36','22'),
        array('g','54','8'),
        array('h','38','98'),
        array('n','75','29'),
        array('x','12','3'),
        array('b','3','62'),
        array('r','61','2'),
        array('q','81','79'),
        array('g','39','6'),
        array('z','99','74'),
        array('b','32','88'),
        array('s','50','1'),
        array('q','26','71'),
        array('u','40','69'),
        array('a','70','93'),
        array('k','95','42'),
        array('b','88','31'),
        array('w','79','44')
    );

    function srt($a, $b) 
    {
    	$res = 0;
    	return strcmp(implode($a), implode($b));

    	if($a[0] = $b[0]){
    		return (($a[1] + $a[2]) < ($b[1] + $b[2])) ? -1 : 1;
    	}
        return $res;
    }

    usort($content, 'srt');
    
    $data = array('content' => $content);
	$this->load->view('welcome_message');
	$this->load->view('sort', $data);
	}
}