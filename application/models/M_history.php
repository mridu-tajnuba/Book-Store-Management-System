<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_history extends CI_Model {

	public function get_history()
	{
		return $this->db->join('user','user.user_code = transaction.user_code')
						->get('transaction')
						->result();		
	}

}

/* End of file M_history.php */
/* Location: ./application/models/M_history.php */