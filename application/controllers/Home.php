<?php
defined('BASEPATH') or exit('No direct script access allowed');

class home extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }


    // This Function For Index Page
    public function index()
    {
        $data = array(
            'portfolio_data' => $this->admin_model->get_all_records('tbl_portfolio', 'portfolio_status', '1')
        );
        $this->load->view('home/ape_index_view', $data);
    }


    // This Function for load portfolio
    public function portfolio()
    {
        $data = array(
            'portfolio_data' => $this->admin_model->get_all_records('tbl_portfolio', 'portfolio_status', '1')
        );
        $this->load->view('home/ape_portfolio_view', $data);
    }

    // This function for portfolio details view
    public function potfolioDetails($portfolioId, $portfolioTitle)
    {
        $data = array(
            'portfolio_data' => $this->admin_model->get_all_records('tbl_portfolio', 'id', $portfolioId),
            'portfolio_img' => $this->admin_model->get_all_records('tbl_portfolio_image', 'portfolio_id', $portfolioId)
        );
        $this->load->view('home/ape_portfolio_single_view', $data);
    }
    // This Section For Blog
    public function blog()
    {
        $data = array(
            'blog_list' => $this->admin_model->get_all_records('tbl_blog', 'status', 1, 'aprove_status', '1', 'blog_id DESC'),
            'blog_tag' => $this->home_model->blog_tag(),
            'blog_category' => $this->home_model->blog_category()
        );
        //    echo $this->db->last_query();
        //    die;
        $this->load->view('home/ape_blog_view', $data);
    }

    // This for blog deiails
    public function blogDetails($blogId,$blogTitle)
    {
        # code...
        // GET BLOG DATA
        $blogData = $this->common_model->find_data(['name' => 'tbl_blog'],'row','',['blog_id' => $blogId]);
        if($blogData){
            // Selected Images
            $imageList = $this->common_model->find_data(['name' => 'tbl_blog_image'],'array' , '' ,['blog_id' => $blogId]);
            $selectdTags = $this->common_model->find_data(['name' => 'tbl_blog_tag'],'array','',['blog_id' => $blogId]);

            $selectedCategory = $this->common_model->find_data(['name' => 'tbl_blog_category_assign'],'array','',['blog_id' => $blogId],['tbl_blog_category.blog_category','tbl_blog_category.id'],[['table' => 'tbl_blog_category', 'field' => 'id', 'table_master' => 'tbl_blog_category_assign', 'field_table_master' => 'category_id', 'type' => 'inner']]);

            // Get All Category 
            $categoryList = $this->common_model->find_data(['name' => 'tbl_blog_category'],'array');

            // Get All Tag List
            $tagList = $this->common_model->find_data(['name' => 'tbl_blog_tag'],'array');

            

            $object = array(
                'blogData' => $blogData,
                'imageList' => $imageList,
                'selectdTags' => $selectdTags,
                'selectedCategory' => $selectedCategory,
                'categoryList' => $categoryList,
                'tagList' => $tagList,
            );

            $this->load->view('home/ape_blog_details_view', $object);
        }
    }


    //    This section for contact us
    public function contact()
    {
        $this->load->view('home/ape_contact_view');
    }

    // This function for submit contact submit form
    public function contactSubmit()
    {
        $name = $this->input->post('txtName');
        $email = $this->input->post('txtEmail');
        $phone = $this->input->post('txtPhone');
        $subject = $this->input->post('txtSubject');
        $message = $this->input->post('txtMessage');

        $mailBody = '';
        $mailBody .= '<strong>Name : </strong>';
        $mailBody .= $name . "<br/>";
        $mailBody .= '<strong>Email : </strong>';
        $mailBody .= $email . "<br/>";
        $mailBody .= '<strong>Phone : </strong>';
        $mailBody .= $phone . "<br/>";
        $mailBody .= '<strong>Subject : </strong>';
        $mailBody .= $subject . "<br/>";
        $mailBody .= '<strong>Message : </strong>';
        $mailBody .= $message . "<br/>";

        $this->common_model->send_smtpmail('sreejit.personal@gmail.com', 'Contact enquery from artific website', $mailBody);
        $this->common_model->send_smtpmail('info2programmer@gmail.com', 'Contact enquery from artific website', $mailBody);

        $this->session->set_flashdata('succss_log', 'Message Send Successfully');

        redirect('contacts');
    }

    // This Function For Team
    public function team()
    {
        $this->load->view('home/ape_team_view');
    }
}
