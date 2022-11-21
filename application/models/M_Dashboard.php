<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Dashboard extends CI_Model {

	public function get_jml_book(){
		return $this->db->select('count(*) as jml_book')
					    ->get('book')
					    ->row();
	}

	public function get_jml_transaction(){
		return $this->db->select('SUM(total) as jml_transaction')
					    ->get('transaction')
					    ->row();
	}

	public function get_jml_pengguna(){
		return $this->db->select('count(*) as jml_pengguna')
					    ->get('transaction')
					    ->row();
	}

	public function get_book_cat(){
		return $this->db->select('count(*) as book_cat')
					    ->get('book_category')
					    ->row();
	}

	public function get_sys_user(){
		return $this->db->select('count(*) as sys_user')
					    ->get('user')
					    ->row();
	}

	public function get_book_stock(){
		return $this->db->select('SUM(stock) as book_stock')
					    ->get('book')
					    ->row();
	}

	public function get_sales_p(){
		return $this->db->select('SUM(total) as sales_p')
						->where('tgl > NOW() - INTERVAL 24 HOUR')
					    ->get('transaction')
					    ->row();
	}

}
?>