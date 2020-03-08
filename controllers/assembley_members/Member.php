<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends MY_Controller {

    public $CI = NULL;
    public function __construct()
	{
        parent::__construct();
        $this->load->library('pagination');
        $this->CI = & get_instance();
        if($this->session->userdata('is_logged_in')==0){
            redirect('login');
        }
        $this->load->helper(array('url','text','permission','form'));
        $this->load->model('system_management/Groups');
        $this->load->model('Difined_model');
        $this->load->model('assembly_member_models/Member_model');
        
        $this->groups=$this->Groups->get_group($_SESSION["group_number"]);
        $this->groups_title=$this->Groups->get_group_title($_SESSION["group_number"]); 
        
               /**********************************************************/ 
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in  = $this->Counting->get_basic_in_num();
        $this->files_basic_in  = $this->Counting->get_files_basic_in();  
      /*************************************************************/
    }
    private function upload_image($file_name)
	{
        $config['upload_path'] = 'uploads/images';
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf';
        $config['encrypt_name']=true;
        $this->load->library('upload',$config);
        if(! $this->upload->do_upload($file_name)){
          return  false;
        }else{
            $datafile = $this->upload->data();
            $this->thumb($datafile);
           return  $datafile['file_name'];
        }
    }
    public function index()
    {       //  assembley_members/Member
        $data['id2']=$this->Member_model->get_last_id(); 
       
        $data['mains']= $this->Member_model->get_all(); 
        $data['degrees']= $this->Member_model->get_all_degree();
        $data['title']="اضافه عضو";
       $data['subview'] = 'admin/assembly_members_views/add_member';
       $this->load->view('admin_index', $data); 
    }
    public function add()
    {
        $this->Member_model->insert(); 
        redirect('assembley_members/member','refresh');
    }
    public function delete()
    {
        $id=$this->uri->segment(4);
         $this->Member_model->delete($id); 
         redirect('assembley_members/member','refresh');
    }
    public function update()
    {
        $data['degrees']= $this->Member_model->get_all_degree();
         $id=$this->uri->segment(4);
         $data['title']="تعديل عضو";
         if($this->input->post('add')){
             $id=$this->uri->segment(4);
        $this->Member_model->edit($id); 
       
         redirect('assembley_members/member','refresh');
   }
     $data['sponsor']=$this->Member_model->get_by_id($id); 
     $data['subview'] = 'admin/assembly_members_views/add_member';
    $this->load->view('admin_index', $data); 
     
        
    }
    public function print_member()
    {
       $id=$this->uri->segment(4); 
       $data['sponsor']=$this->Member_model->get_by_id($id); 
       //print_r($data['sponsor']);
    }
  public function print_data($id) // New_student_pills/print
    {
        $data['degrees']= $this->Member_model->get_all_degree();
       $data['sponsor']=$this->Member_model->get_by_id($id);
      
        $this->load->view('admin/assembly_members_views/print', $data);
    }
    
    }