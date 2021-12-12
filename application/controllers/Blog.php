<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Calcutta');
		//'tbl_blog'='tbl_blog';
		// Do your magic here
		if(!$this->session->userdata('adminlogin')){
			redirect('admin','refresh');
		}
	}

    // Get All blog List Here
	public function index()
    {
        $data=array(
            'blog_data' => $this->admin_model->get_all_records('tbl_blog','blog_by',$this->session->userdata('admin_id')),
            'main_view' => 'admin/manage_blog_view'
        );
        $this->load->view('layout/admin_layout', $data);
        
	}

	private function redirection($flash_msg,$msg_type,$redirect_url)
	{
		$this->session->set_flashdata($msg_type, $flash_msg);
		redirect($redirect_url);
	}
	
	// This Function For Delete blog
	public function delete_blog($blog_id)
	{
		$blog_images=$this->admin_model->get_all_records('tbl_blog_image','blog_id',$blog_id);
		// var_dump($blog_images);
		foreach($blog_images as $key)
		{
			// echo $key['img_name'] ."<br>";
			unlink('./assets/layouts/layout3/blogimage/'.$key['img_name']);
		}
		$this->admin_model->delete_record('blog_id',$blog_id,'tbl_blog');
		$this->admin_model->delete_record('blog_id',$blog_id,'tbl_blog_category_assign');
		$this->redirection('Blog Delete Successfully','success_log','blog/index');
	}

	// This Function For Change Status
	public function status_change($blog_id,$status)
	{
		$object=array(
			'blog_status' => $status
		);
		$this->admin_model->chage_status('id',$blog_id,'tbl_blog',$object);
		$this->redirection('Status Change Successfully','warning_log','blog/index');
	}

	// This Section For Add Edit blog
	public function blog_manage()
	{
		if($this->input->post('btnSubmit')=="submit")
		{
			$object=array(
				'blog_title' => $this->input->post('txtBlogTitle'),
				'date' => date('Y-m-d'),
				'small_description' => $this->input->post('txtSmallDescription'),
				'description' => $this->input->post('txtDescription'),
				'blog_by' => $this->session->userdata('admin_id'),
				'status' => 1,
				'aprove_status' => 0
			);

			$this->admin_model->insert_record('tbl_blog',$object);
			$blog_id=$this->db->insert_id();

			// Insert Category Here
			$assignCategories=$this->input->post('ddlBlogCategory');
			foreach($assignCategories as $list){
				$object=array(
					'blog_id' => $blog_id,
					'category_id' => $list
				);
				$this->admin_model->insert_record('tbl_blog_category_assign',$object);
			}

			$tags = $this->input->post('txtTag');
			$tags=explode(",",$tags);

			foreach($tags as $list){
				$object=array(
					'tag_name' => $list,
					'blog_id' => $blog_id
				);
				$this->admin_model->insert_record('tbl_blog_tag',$object);
			}

			$filesCount = count($_FILES['fileImage']['name']);
			for($i = 0; $i < $filesCount; $i++){
				$_FILES['fileImages']['name'] = $_FILES['fileImage']['name'][$i];
					$_FILES['fileImages']['type'] = $_FILES['fileImage']['type'][$i];
					$_FILES['fileImages']['tmp_name'] = $_FILES['fileImage']['tmp_name'][$i];
					$_FILES['fileImages']['error'] = $_FILES['fileImage']['error'][$i];
					$_FILES['fileImages']['size'] = $_FILES['fileImage']['size'][$i];
					$uploadPath = './assets/uploads/blog/';
					$config['upload_path'] = $uploadPath;
					$config['allowed_types'] = 'gif|jpg|png|jpeg';
					$this->load->library('upload', $config);
					$this->upload->initialize($config);
					if($this->upload->do_upload('fileImages')){
						$fileData = $this->upload->data();
						// $this->admin_model->insertimagebyproductid($project_id,$fileData['file_name']);
						$object=array(
							'img_name' => $fileData['file_name'],
							'blog_id' => $blog_id
						);	
		
						$this->admin_model->insert_record('tbl_blog_image',$object);
					}
					else{
						
						$error = array('error' => $this->upload->display_errors());
						var_dump($error);
						die;
						
					}
				

			}

			// foreach($_FILES['fileImage']['name'] as $key){
			// 	$object=array(
			// 		'img_name' => $this->admin_model->upload_image($key,'./assets/layouts/layout3/blogimage/'),
			// 		'blog_id' => $blog_id 
			// 	);

			// 	$this->admin_model->insert_record('tbl_blog_image',$object);
			// }

			$this->redirection('blog Insert Successfully','success_log','blog/blog_manage');
		}
		$data=array(
			'bog_categories'=> $this->admin_model->get_all_records('tbl_blog_category','status',1),
			'main_view' => 'admin/add_edit_blog_view'
		);
		$this->load->view('layout/admin_layout',$data);
		
	}

	// This Function For ALL blog Image List
	public function image_list($blog_id)
	{
		if($this->input->post('btnSubmit')=="submit")
		{
			$object=array(
				'blog_id' => $blog_id,
				'image_url' => $this->admin_model->upload_image('fileSliderImage','./assets/uploads/blog/'),
				'image_des' => $this->input->post('txtImageName')
			 );
			 
			 $this->admin_model->insert_record('tbl_blog_image',$object);
			 $this->redirection('Image Added Successfully','success_log','blog/image_list/'.$blog_id);
		}
		$data=array(
			'image_list' => $this->admin_model->get_all_records('tbl_blog_image','blog_id',$blog_id),
			'main_view' => 'admin/manage_blog_image',
			'blog_id'=> $blog_id
		);
		$this->load->view('layout/admin_layout',$data);
	}

	// This Function For Delete Portfilio Slider
	public function blog_image_delete($image_name,$image_id,$blog_id)
	{
		$this->admin_model->delete_record('img_id',$image_id,'tbl_blog_image');
		unlink('./assets/uploads/blog/'.urldecode($image_name));
		$this->redirection('Image Deleted Successfully','success_log','blog/edit_blog/'.$blog_id);
	}


	// This Function For Blog Category Management
	public function blog_category()
	{
		if(!$this->session->userdata('type'))
		{
			$data=array(
				'category_date' => $this->admin_model->get_all_records('tbl_blog_category','',''),
				'main_view' => 'admin/manage_blog_category_view'
			);
	
			$this->load->view('layout/admin_layout', $data);
		}
		else{
			$this->redirection("You don't have access this section","error_log",'admin/logout');
		}
		
		
	}

	// Add Edit Blog Category
	public function manage_blog_category()
	{
		if($this->input->post('btnSubmit')=="submit"){
			$object=array(
				'blog_category' => $this->input->post('txtCategory'),
				'status' => 1
			);

			$this->admin_model->insert_record('tbl_blog_category',$object);
			$this->redirection("Category Created Successfully",'success_log','blog/blog_category');
		}
		$data=array(
			'main_view' => 'admin/add_edit_blog_category'
		);
		$this->load->view('layout/admin_layout',$data);
	}


	// This Function For delete blog category
	public function delete_blog_caegory($id)
	{
		$this->admin_model->delete_record('id',$id,'tbl_blog_category');
		$this->redirection('Record Deleted','error_log','blog/blog_category');
	}

	// This Function For Change Status Blog Category
	public function status_change_blogcategory($id,$status)
	{
		$object=array(
			'status' => $status
		);
		$this->admin_model->chage_status('id',$id,'tbl_blog_category',$object);
		$this->redirection('Status Change Successfully','warning_log','blog/blog_category');
	}

	// blog aprove by admin
	public function blog_aprove()
	{
		$data=array(
            'blog_data' => $this->admin_model->get_all_records('tbl_blog','blog_by',$this->session->userdata('admin_id')),
            'main_view' => 'admin/manage_blog_view'
        );
        $this->load->view('layout/admin_layout', $data);
	}

	public function aprove_blog($blog_id,$status){
		$object=array(
			'aprove_status' => $status,
			'aprove_by' => $this->session->userdata('admin_id')
		);
		$this->admin_model->chage_status('blog_id',$blog_id,'tbl_blog',$object);

		$this->redirection("Blog Status Change Successfully","success_log","blog/index");
	}	


	// This Function For Blog Status Chnage
	public function change_status($blog_id,$status)
	{
		$object=array(
			'status' => $status
		);
		$this->admin_model->chage_status('blog_id',$blog_id,'tbl_blog',$object);
		$this->redirection("Blog Status Change Successfully","success_log","blog/index");
	}


	// This Function For Edit Blog
	public function edit_blog($blog_id)
	{
		if($this->input->post('btnSubmit') == "submit"){
			$object=array(
				'blog_title' => $this->input->post('txtBlogTitle'),
				'small_description' => $this->input->post('txtSmallDescription'),
				'description' => $this->input->post('txtDescription'),
				'blog_by' => $this->session->userdata('admin_id'),
			);

			$this->db->where('blog_id', $blog_id);
			$this->db->update('tbl_blog', $object);
			
			// delete old category
			$this->db->where('blog_id', $blog_id);
			$this->db->delete('tbl_blog_category_assign');
			
			

			// Insert Category Here
			$assignCategories=$this->input->post('ddlBlogCategory');
			foreach($assignCategories as $list){
				$object=array(
					'blog_id' => $blog_id,
					'category_id' => $list
				);
				$this->admin_model->insert_record('tbl_blog_category_assign',$object);
			}

			// Delete Old Tags
			$this->db->where('blog_id',  $blog_id);
			$this->db->delete('tbl_blog_tag');
			

			$tags = $this->input->post('txtTag');
			$tags=explode(",",$tags);

			foreach($tags as $list){
				$object=array(
					'tag_name' => $list,
					'blog_id' => $blog_id
				);
				$this->admin_model->insert_record('tbl_blog_tag',$object);
			}

			$filesCount = count($_FILES['fileImage']['name']);
			for($i = 0; $i < $filesCount; $i++){
				$_FILES['fileImages']['name'] = $_FILES['fileImage']['name'][$i];
					$_FILES['fileImages']['type'] = $_FILES['fileImage']['type'][$i];
					$_FILES['fileImages']['tmp_name'] = $_FILES['fileImage']['tmp_name'][$i];
					$_FILES['fileImages']['error'] = $_FILES['fileImage']['error'][$i];
					$_FILES['fileImages']['size'] = $_FILES['fileImage']['size'][$i];
					$uploadPath = './assets/uploads/blog/';
					$config['upload_path'] = $uploadPath;
					$config['allowed_types'] = 'gif|jpg|png|jpeg';
					$this->load->library('upload', $config);
					$this->upload->initialize($config);
					if($this->upload->do_upload('fileImages')){
						$fileData = $this->upload->data();
						// $this->admin_model->insertimagebyproductid($project_id,$fileData['file_name']);
						$object=array(
							'img_name' => $fileData['file_name'],
							'blog_id' => $blog_id
						);	
		
						$this->admin_model->insert_record('tbl_blog_image',$object);
					}
				

			}

			$this->redirection('Blog updated successfully','success_log','blog/edit_blog/'.$blog_id);
		}


		$blogdata = $this->common_model->find_data(['name' => 'tbl_blog'],'row','',['blog_id' =>$blog_id]);

		if($blogdata){
			$selectedtags = $this->common_model->find_data(['name' => 'tbl_blog_tag'],'array','',['blog_id' =>$blog_id],['tag_name']);
			$tagArray = array();

			foreach($selectedtags as $list){
				array_push($tagArray,$list->tag_name);
			}

			$selectedCategory = $this->common_model->find_data(['name' => 'tbl_blog_category_assign'],'array','',['blog_id' =>$blog_id],['category_id']);
			$categoryArray = array();

			foreach($selectedCategory as $list){
				array_push($categoryArray,$list->category_id);
			}

			$oldImageList = $this->common_model->find_data(['name' => 'tbl_blog_image'],'array','',['blog_id' => $blog_id]);
			
			$data=array(
				'edit_data' => $blogdata,
				'main_view' => 'admin/add_edit_blog_view',
				'selected_category' => $categoryArray,
				'bog_categories'=> $this->admin_model->get_all_records('tbl_blog_category','status',1),
				'blog_tags' => $tagArray,
				'imageList' => $oldImageList
			);
			$this->load->view('layout/admin_layout', $data);
		}
		
	}

	
	



	
}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */
?>
