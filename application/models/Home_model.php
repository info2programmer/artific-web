<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home_model extends CI_Model {

    // This Function To Get All Blog Tag
    public function blog_tag()
    {
        $query=$this->db->query("SELECT DISTINCT(tag_name) FROM tbl_blog_tag");
        return $query->result();        
    }

    // This Function  For Get All Blog Category
    public function blog_category()
    {
        $query= $this->db->query("SELECT DISTINCT(blog_category) FROM tbl_blog_category");
        return $query->result();
    }

    // This Section For Blog Category
    public function get_blog_category($blog_id)
    {
        $this->db->where('blog_id', $blog_id);
        $this->db->select('blog_category');
        $this->db->from('tbl_blog_category_assign');
        $this->db->join('tbl_blog_category', 'tbl_blog_category.id = tbl_blog_category_assign.category_id', 'inner');
        $query=$this->db->get();        
        return $query->result();
        
    }

}


/* End of file Home_model.php */
/* Location: ./application/models/Home_model.php */

?>
