<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Book extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_book','book');
	}
	public function index()
	{
		$this->load->library('pagination');
		$amount_data = $this->book->amount_data();
		$data['get_book']=$this->book->get_book();
		$data['category']=$this->book->data_category();
		$data['content']="v_book";

		$data['total_rows'] = $amount_data;
		$data['per_page'] = 1;
		$from = $this->uri->segment(3);
		$this->pagination->initialize($data);		
		$data['user'] = $this->book->get_book($data['per_page'],$from);

		$this->load->view('template', $data, FALSE);
	}
	public function add()
	{
		$this->form_validation->set_rules('book_title', 'book_title', 'trim|required');
		$this->form_validation->set_rules('year', 'year', 'trim|required');
		$this->form_validation->set_rules('price', 'price', 'trim|required');
		$this->form_validation->set_rules('category', 'category', 'trim|required');
		$this->form_validation->set_rules('publisher', 'publisher', 'trim|required');
		$this->form_validation->set_rules('stock', 'stock', 'trim|required');
		if ($this->form_validation->run() == TRUE) {
			$config['upload_path'] = './assets/gambar/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			if ($_FILES['gambar']['name']!="") {
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('gambar')){
				$this->session->set_flashdata('message', $this->upload->display_errors());
				redirect('book','refresh');
			}
			else{
				if ($this->book->save_book($this->upload->data('file_name'))) {
					$this->session->set_flashdata('message', 'Book has been added successfully');
				} else {
					$this->session->set_flashdata('message', 'Book has failed to Add');
				}
				redirect('book','refresh');
			}
		} else {
			if ($this->book->save_book('')) {
				$this->session->set_flashdata('message', 'Book has been added successfully');
			} else {
				$this->session->set_flashdata('message', 'Book has failed to Add');
			}
			redirect('book','refresh');
		}
	} else {
		$this->session->set_flashdata('message', validation_errors());
		redirect('book','refresh');
	}
}

	public function edit_book($id)
	{
		$data=$this->book->detail($id);
		echo json_encode($data);
	}

	public function book_update()
	{
		if ($this->input->post('save')) {
			if ($_FILES['gambar']['name']=="") {
				if ($this->book->book_update_no_foto()) {
					$this->session->set_flashdata('message', 'Book Details has been updated successfully.');
					redirect('book');
				} else {
					$this->session->set_flashdata('message', 'Failed to update');
					redirect('book');
				}
			} else {
				$config['upload_path'] = './assets/gambar/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size']  = '100000000';
				
				$this->load->library('upload', $config);
				
				if ( ! $this->upload->do_upload('gambar')){
					$this->session->set_flashdata('message', 'failed to upload');
					redirect('book');
				}
				else{
					if ($this->book->book_update_dengan_foto($this->upload->data("file_name"))) {
						$this->session->set_flashdata('message', 'Updated successfully!');
						redirect('book');
					} else {
						$this->session->set_flashdata('message', 'Failed to update');
						redirect('book');
					}
				}
			}
		}
	}

	public function hapus($book_code='')
	{
		if ($this->book->hapus_book($book_code)) {
			$this->session->set_flashdata('message', 'Book has been deleted successfully.');
			redirect('book','refresh');
		} else {
			$this->session->set_flashdata('message', 'Delete Failed');
			redirect('book','refresh');
		}
	}

}

/* End of file book.php */
/* Location: ./application/controllers/book.php */