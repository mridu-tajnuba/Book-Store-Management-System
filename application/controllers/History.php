<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class history extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('M_history');
	}

	public function index()
	{
		$data['get_history']=$this->M_history->get_history();
		$data['content']="v_history";
		$this->load->view('template', $data, FALSE);		
	}

}

/* End of file history.php */
/* Location: ./application/controllers/history.php */