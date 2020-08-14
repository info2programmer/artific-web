<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class portfolio extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Calcutta');
		//'tbl_portfolio'='tbl_portfolio';
		// Do your magic here
		if(!$this->session->userdata('adminlogin')){
			redirect('admin','refresh');
		}
	}

    // Get All portfolio List Here
	public function index()
    {
        $data=array(
            'portfolio_data' => $this->admin_model->get_all_records('tbl_portfolio','',''),
            'main_view' => 'admin/manage_portfolio_view'
        );
        $this->load->view('layout/admin_layout', $data);
        
	}

	private function redirection($flash_msg,$msg_type,$redirect_url)
	{
		$this->session->set_flashdata($msg_type, $flash_msg);
		redirect($redirect_url);
	}
	
	// This Function For Delete portfolio
	public function delete_portfolio($portfolio_id,$img)
	{
		$this->admin_model->delete_record('id',$portfolio_id,'tbl_portfolio');
		unlink('./assets/uploads/portfolio/'.$img);
		$this->redirection('Record Deleted','error_log','portfolio');
	}

	// This Function For Change Status
	public function status_change($portfolio_id,$status)
	{
		$object=array(
			'portfolio_status' => $status
		);
		$this->admin_model->chage_status('id',$portfolio_id,'tbl_portfolio',$object);
		$this->redirection('Status Change Successfully','warning_log','portfolio');
	}

	// This Section For Add Edit portfolio
	public function portfolio_manage()
	{
		if($this->input->post('btnSubmit')=="submit")
		{
			$object=array(
				'poject_name' => $this->input->post('txtProjectName'),
				'project_cover' => $this->admin_model->upload_image('fileCoverImage','./assets/uploads/portfolio/'),
				'project_tag' => $this->input->post('txtProjectTag'),
				'project_title' => $this->input->post('txtProjectTitle'),
				'technical_prospective' => $this->input->post('txtTechnicalProspective'),
				'marketing_prospective' => $this->input->post('txtMarketingProspective'),
				'review_client_name' => $this->input->post('txtReviewClientName'),
				'review_client_pic' => $this->admin_model->upload_image('fileReviewClientImage','./assets/uploads/portfolio/'),
				'review_client_comment' => $this->input->post('txtReviewClientComment'),
				'date' => $this->input->post('txtDate'),
				'client' => $this->input->post('txtClent'),
				'skills' => $this->input->post('txtSkills'),
				'location_name' => $this->input->post('txtLocationName'),
				'location_url' => $this->input->post('txtMapURL'),
				'portfolio_status' => 1
			);

			$this->admin_model->insert_record('tbl_portfolio',$object);

			$this->redirection('portfolio Insert Successfully','success_log','portfolio');
		}
		$data=array(
			'main_view' => 'admin/add_edit_portfolio_view'
		);
		$this->load->view('layout/admin_layout',$data);
		
	}

	// This Function For ALL Portfolio Image List
	public function image_list($portfolio_id)
	{
		if($this->input->post('btnSubmit')=="submit")
		{
			$object=array(
				'portfolio_id' => $portfolio_id,
				'image_url' => $this->admin_model->upload_image('fileSliderImage','./assets/uploads/portfolio/'),
				'image_des' => $this->input->post('txtImageName')
			 );
			 
			 $this->admin_model->insert_record('tbl_portfolio_image',$object);
			 $this->redirection('Image Added Successfully','success_log','portfolio/image_list/'.$portfolio_id);
		}
		$data=array(
			'image_list' => $this->admin_model->get_all_records('tbl_portfolio_image','portfolio_id',$portfolio_id),
			'main_view' => 'admin/manage_portfolio_image',
			'portfolio_id'=> $portfolio_id
		);
		$this->load->view('layout/admin_layout',$data);
	}

	// This Function For Delete Portfilio Slider
	public function portfolio_image_delete($image_name,$image_id,$portfolio_id)
	{
		$this->admin_model->delete_record('id',$image_id,'tbl_portfolio_image');
		unlink('./assets/uploads/portfolio/'.$image_name);
		$this->redirection('Image Deleted Successfully','error_log','portfolio/image_list/'.$portfolio_id);
	}

	




	
}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */
?>
