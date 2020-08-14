<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		// if(!$this->session->userdata('adminlogin')){
		// 	redirect('admin','refresh');
		// }
	}

	public function index()
	{
		if($this->session->userdata('adminlogin')){
			redirect('admin/welcome');		
		}
		$this->load->view('admin/login_view');
	}

	private function redirection($flash_msg,$msg_type,$redirect_url)
	{
		$this->session->set_flashdata($msg_type, $flash_msg);
		redirect($redirect_url);
	}

	//This Section For Check Credential
	public function login(){
		$this->form_validation->set_rules('username', 'User Name', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error_log', validation_errors());
			redirect('admin','refresh');
		} else {
			//Remove Cross Site Scripting
			$username=$this->security->xss_clean($this->input->post('username'));
			$password=$this->security->xss_clean($this->input->post('password'));
			
			//Check Credential Here
			$result=$this->admin_model->checkcredential($username,$password);
			//echo $result;
			if($result){
				
				$this->session->set_userdata($result);
				redirect('admin/welcome');
			}
			else{
				// echo "string";
				$flashData=array(
					'error_log' => 'Enter Valid UserName And Password',
					'error_email' => $username
				);
				$this->session->set_flashdata($flashData);
				redirect('admin');
			}
		}
	}

	//This Function For Logout
	public function logout(){
		$user_data = $this->session->all_userdata();
		foreach ($user_data as $key => $value) {
			if ($key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity') {
				$this->session->unset_userdata($key);
			}
		}
		$this->session->sess_destroy();
		redirect('admin','refresh');
	}

	//This function Load Dashboard View
	public function welcome(){
		if($this->session->userdata('adminlogin')){
			$data=array(
				'main_view' => 'admin/dashboard_view'
			);
			$this->load->view('layout/admin_layout',$data);
		}
		else{
			redirect('admin','refresh');
		}
	}


	// This Section For User Management
	public function user_management()
	{
		if(!$this->session->userdata('type') && $this->session->userdata('adminlogin')){
			$data=array(
				'user_data' => $this->admin_model->get_all_records('tbl_adminlogin','',''),
				'main_view' => 'admin/manage_user_view'
			);
			$this->load->view('layout/admin_layout',$data);
		}
		else{
			$this->logout();
		}
	}

	// This Section For Create User
	public function create_user()
	{
		if(!$this->session->userdata('type') && $this->session->userdata('adminlogin')){
			if($this->input->post('btnSubmit')=="submit")
			{
				$object=array(
					'username' => $this->input->post('txtEmail'),
					'password' => md5($this->input->post('txtPassword')),
					'name' => $this->input->post('txtName'),
					'about' => $this->input->post('txtAbout'),
					'facebook_link' => $this->input->post('txtFbLinlk'),
					'instragram_link' => $this->input->post('txtInstragramLinlk'),
					'twitter_link' => $this->input->post('txtTwitterLinlk'),
					'image' => $this->admin_model->upload_image('fileProfileImage','./assets/layouts/layout3/img/'),
					'email' => $this->input->post('txtEmail'),
					'type' => $this->input->post('ddlUserType'),
					'status' => 1
 				);

				// Insert Data Here
				$this->admin_model->insert_record('tbl_adminlogin',$object);
				$this->redirection('User Created Successfully','success_log','admin/user_management');
			}
			$data=array(
				'main_view' => 'admin/add_edit_user_view'
			);
			$this->load->view('layout/admin_layout',$data);
		}
		else{
			$this->logout();
		}
	}
	
	// This Function To Check Username ALready Exist Or Not
	public function user_email_check()
	{
		$email=$this->input->post('email');

		$this->db->where('username',$email);
		$this->db->or_where('email',$email);
		$result=$this->db->get('tbl_adminlogin');
		if($result->num_rows()>0){
			echo 0; //Email Or Username Already Exist
		}
		else{
			echo 1; //This is a new email
		}
	}

	// This Function For Delete User
	public function delete_user($delete_id,$img)
	{
		$this->admin_model->delete_record('admin_id',$delete_id,'tbl_adminlogin');
		unlink('./assets/layouts/layout3/img/'.$img);
		$this->redirection('Record Deleted','error_log','admin/user_management');
	}

	// Active Or Deactive User
	public function status_change_user($id,$status)
	{
		$object=array(
			'status' => $status
		);
		$this->admin_model->chage_status('admin_id',$id,'tbl_adminlogin',$object);
		$this->redirection('Status Change Successfully','warning_log','admin/user_management');
	}

	
}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */
?>
