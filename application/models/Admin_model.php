<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin_model extends CI_Model {

	//validate username and password to database
	public function checkcredential($username,$password){
		//encrypt password
		$password=md5($password);
		// echo $password."<br/>".$username;
		// die;
		$this->db->where('username',$username);
		$this->db->where('password',$password);
		$this->db->where('status',1);
		
		$result=$this->db->get('tbl_adminlogin');
		
		if($result->num_rows()==1){
			// return $result->row(0)->admin_id;
			$result =array(
				'admin_id' => $result->row(0)->admin_id,
				'name' => $result->row(0)->name,
				'type' => $result->row(0)->type,
				'image' => $result->row(0)->image,
				'adminlogin' => true
			);
			return $result;
		}
		else{
			return false;
		}
	}


	// Get All Records
	public function get_all_records($tbl_name,$search_by_feld,$search_by_value,$where_feld=null,$where_value=null,$order_by=null)
	{
		if($order_by!="")
			$this->db->order_by($order_by);
		if($search_by_feld=="" && $search_by_value=="")
		{
			// Get All Records
			$query=$this->db->get($tbl_name);
			return $query->result();
		}
		elseif($where_feld!=""){
			// this block for edit data get value
			$this->db->where($search_by_feld, $search_by_value);
			$this->db->where($where_feld,$where_value);
			$query=$this->db->get($tbl_name);
			return $query->result_array();
		}
		else
		{
			$this->db->where($search_by_feld, $search_by_value);
			$query=$this->db->get($tbl_name);
			return $query->result_array();
		}
	}

	// Delete Record
	public function delete_record($where_feald,$delete_id,$table_name)
	{
		$this->db->where($where_feald, $delete_id);
		$this->db->delete($table_name);
		
	}

	// Active Or Deactive Fealds
	public function chage_status($where_feald,$update_id,$table_name,$object)
	{
		$this->db->where($where_feald, $update_id);
		$this->db->update($table_name, $object);
		
	}

	// Insert Function
	public function insert_record($table_name,$object)
	{
		$this->db->insert($table_name, $object);
		$insert_id = $this->db->insert_id();
		return  $insert_id;
	}

	// This function for image upload
	public function upload_image($file,$path)
	{
		
		$config['upload_path'] = $path;
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload($file)){
			$error = array('error' => $this->upload->display_errors());
			var_dump($error);
			die;
		}
		else{
			$fileData=$this->upload->data();
		}

		return $fileData['file_name'];
	}

	// This Function For Get Blog Category By Id
	public function blog_category_by_blog_id($bog_id)
	{
		$this->db->where('tbl_blog_category_assign.blog_id', $bog_id);
		$this->db->select('tbl_blog_category.blog_category as category,tbl_blog_category.id as id');
		$this->db->from('tbl_blog_category');
		$this->db->join('tbl_blog_category_assign', 'tbl_blog_category_assign.category_id = tbl_blog_category.id', 'inner');
		$query = $this->db->get();
		return $query->result();
	}


	

}

/* End of file Admin_model.php */
/* Location: ./application/models/Admin_model.php */

?>
