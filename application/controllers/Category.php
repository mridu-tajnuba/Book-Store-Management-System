<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_category','kat');
	}
	public function index()
	{
		$data['get_category']=$this->kat->get_category();
		$data['content']="v_category";
		$this->load->view('template', $data);
	}

	public function add()
	{
		if ($this->input->post('save')) {
			if ($this->kat->save_kat()) {
				$this->session->set_flashdata('message', 'Category Details has been added successfully');
				redirect('category','refresh');
			} else {
				$this->session->set_flashdata('message', 'Category Details has faile to add!');
				redirect('category','refresh');
			}
		}
	}
	public function edit_category($id)
	{
		$data=$this->kat->detail($id);
		echo json_encode($data);
	}
	public function category_update()
	{
		if ($this->input->post('edit')) {
			if ($this->kat->edit_kat()) {
				$this->session->set_flashdata('message', 'Category Details has been updated successfully');
				redirect('category','refresh');
			}
			else {
				$this->session->set_flashdata('message', 'Category Details has faile to update!');
				redirect('category','refresh');
			}
		}
	}

	public function hapus($id='')
	{
		if ($this->kat->hapus_kat($id)) {
			$this->session->set_flashdata('message', 'Category Details has been deleted successfully');
			redirect('category','refresh');
		} else {
			$this->session->set_flashdata('message', 'Failed to delete');
			redirect('category','refresh');
		}
	}

}

/* End of file category.php */
/* Location: ./application/controllers/category.php */