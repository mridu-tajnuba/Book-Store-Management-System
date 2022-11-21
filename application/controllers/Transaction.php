<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->model('m_transaction','trans');
			$this->load->model('m_book','book');
		}
	public function index()
	{
		$data['transaction']=$this->trans->tm_transaction();
		$data['get_book']=$this->book->get_book();
		$data['content']="v_transaction";
		$this->load->view('template', $data, FALSE);
	}

	public function addcart($id)
	{
		$cek_stock=$this->trans->cek($id);
		if ( $cek_stock == 0){
			$this->session->set_flashdata('message', 'Out of stock');
			redirect('transaction','refresh');
		}
		$detail=$this->book->detail($id);
		$data=array(
				'id' => $detail->book_code,
				'qty' => 1,
				'price' => $detail->price,
				'name' => $detail->book_title,
				'options' => array('genre'=>$detail->category_name)
			);
		$this->cart->insert($data);
		redirect('transaction');
	}

	public function save()
	{
		if ($this->input->post('update')) {
			 for ($i=0; $i < count($this->input->post('rowid')); $i++) { 
			 	$data=array(
			 			'rowid' => $this->input->post('rowid')[$i],
			 			'qty' => $this->input->post('qty')[$i]
			 		);
			 	$this->cart->update($data);
			 }
			 redirect('transaction');
		} elseif ($this->input->post('pay')) {
			$this->form_validation->set_rules('user_code', 'user', 'trim|required');
			$this->form_validation->set_rules('buyer_name', 'buyer_name', 'trim|required');
			if ($this->form_validation->run() == TRUE) {
				$id=$this->trans->save_cart_db();
				if ($id) {
					$data['transaction']=$this->trans->detail_note($id);
					$this->load->view('print_note', $data, FALSE);
				}
			} else {
				$this->session->set_flashdata('message', 'Name of Cashier, Customer must be filled!!!');
				redirect('transaction');
			}
		}
	}
	public function delete_cart($id)
	{
		$data=array(
				'rowid'=>$id,
				'qty'=>0
			);
		$this->cart->update($data);
		redirect('transaction');
	}
	public function clearcart()
	{
		$this->cart->destroy();
		redirect('transaction');
	}

}

/* End of file transaction.php */
/* Location: ./application/controllers/transaction.php */