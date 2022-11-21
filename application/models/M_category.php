<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_category extends CI_Model {

	public function get_category()
	{
		$tm_category=$this->db->get('book_category')->result();
		return $tm_category;
	}

	public function save_kat()
	{
		$object=array(
				'category_code'=>$this->input->post('category_code'),
				'category_name'=>$this->input->post('category_name')
			);
		return $this->db->insert('book_category', $object);;
	}
	public function detail($a)
	{
		return $this->db->where('category_code', $a)
						->get('book_category')
						->row();
	}
	public function edit_kat()
	{
		$object=array(
				'category_code'=>$this->input->post('category_code'),
				'category_name'=>$this->input->post('category_name')
			);
		return $this->db->where('category_code', $this->input->post('category_code_lama'))->update('book_category',$object);
	}

	public function hapus_kat($id='')
	{
		return $this->db->where('category_code', $id)->delete('book_category');
	}
}

/* End of file M_category.php */
/* Location: ./application/models/M_category.php */