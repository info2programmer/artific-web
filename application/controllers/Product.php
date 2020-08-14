<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class product extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Calcutta');
		//'tbl_products'='tbl_products';
		// Do your magic here
		if(!$this->session->userdata('adminlogin')){
			redirect('admin','refresh');
		}
	}

    // Get All Product List Here
	public function index()
    {
        $data=array(
            'product_data' => $this->admin_model->get_all_records('tbl_products','',''),
            'main_view' => 'admin/manage_product_view'
        );
        $this->load->view('layout/admin_layout', $data);
        
	}

	private function redirection($flash_msg,$msg_type,$redirect_url)
	{
		$this->session->set_flashdata($msg_type, $flash_msg);
		redirect($redirect_url);
	}
	
	// This Function For Delete Product
	public function delete_product($product_id)
	{
		$this->admin_model->delete_record('id',$product_id,'tbl_products');
		$this->redirection('Record Deleted','error_log','product');
	}

	// This Function For Change Status
	public function status_change($product_id,$status)
	{
		$object=array(
			'product_status' => $status,
			'create_at' => date('Y-m-d h:i:sa')
		);
		$this->admin_model->chage_status('id',$product_id,'tbl_products',$object);
		$this->redirection('Status Change Successfully','warning_log','product');
	}

	// This Section For Add Edit Product
	public function product_manage()
	{
		if($this->input->post('btnSubmit')=="submit")
		{
			$object=array(
				'product_name' => $this->input->post('txtProductName'),
				'product_tag' => $this->input->post('txtProductTag'),
				'product_details' => $this->input->post('txtDescription'),
				'product_price' => $this->input->post('txtProductPrice'),
				'product_icon' => $this->input->post('txtProductIcon'),
				'product_status' => 1
			);

			$this->admin_model->insert_record('tbl_products',$object);

			$this->redirection('Product Insert Successfully','success_log','product');
		}
		$data=array(
			'main_view' => 'admin/add_edit_product_view'
		);
		$this->load->view('layout/admin_layout',$data);
		
	}




	
}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */
?>
