<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_book extends CI_Model {

	public function get_book()
	{
		$tm_book=$this->db->join('book_category','book_category.category_code=book.category_code')
		->get('book')->result();
		return $tm_book;
	}
	public function amount_data(){
		return $this->db->get('book')->num_rows();
	}
	public function data_category()
	{
		return $this->db->get('book_category')->result();
	}
	public function save_book($nama_file)
	{
		if ($nama_file=="") {
				$object=array(
						'book_title'=>$this->input->post('book_title'),
						'year'=>$this->input->post('year'),
						'price'=>$this->input->post('price'),
						'category_code'=>$this->input->post('category'),
						'publisher'=>$this->input->post('publisher'),
						'writer'=>$this->input->post('writer'),
						'stock'=>$this->input->post('stock')

					);
			}	else {
				$object=array(
						'book_title'=>$this->input->post('book_title'),
						'year'=>$this->input->post('year'),
						'price'=>$this->input->post('price'),
						'category_code'=>$this->input->post('category'),
						'book_img'=>$nama_file,
						'publisher'=>$this->input->post('publisher'),
						'writer'=>$this->input->post('writer'),
						'stock'=>$this->input->post('stock'),

					);
			}
			return $this->db->insert('book', $object);
		}

		public function detail($a)
		{
			$tm_book=$this->db->join('book_category', 'book_category.category_code=book.category_code')
			->where('book_code',$a)
			->get('book')
			->row();
			return $tm_book;
		}

		public function book_update_no_foto()
		{
			$object=array(
					'book_title'=>$this->input->post('book_title'),
						'year'=>$this->input->post('year'),
						'price'=>$this->input->post('price'),
						'category_code'=>$this->input->post('category'),
						'publisher'=>$this->input->post('publisher'),
						'writer'=>$this->input->post('writer'),
						'stock'=>$this->input->post('stock')
				);
			return $this->db->where('book_code', $this->input->post('book_code'))
							->update('book',$object);

		}
		public function book_update_dengan_foto($nama_foto='')
		{
			$object=array(
						'book_title'=>$this->input->post('book_title'),
						'year'=>$this->input->post('year'),
						'price'=>$this->input->post('price'),
						'category_code'=>$this->input->post('category'),
						'book_img'=>$nama_foto,
						'publisher'=>$this->input->post('publisher'),
						'writer'=>$this->input->post('writer'),
						'stock'=>$this->input->post('stock'),

					);
			return $this->db->where('book_code', $this->input->post('book_code'))
							->update('book',$object);

		}
		public function hapus_book($book_code='')
		{
			return $this->db->where('book_code', $book_code)->delete('book');
		}

}

/* End of file M_book.php */
/* Location: ./application/models/M_book.php */