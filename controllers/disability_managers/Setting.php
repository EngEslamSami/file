<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends MY_Controller {

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
        $this->load->model('disability_managers_models/Setting_model');
        
        $this->groups=$this->Groups->get_group($_SESSION["group_number"]);
        $this->groups_title=$this->Groups->get_group_title($_SESSION["group_number"]); 
    }
     private function message($type,$text)
	{
        if($type =='success') {
            return $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> تم بنجاح!</strong> '.$text.'.</div>');
        }elseif($type=='wiring'){
            return $this->session->set_flashdata('message','<div class="alert alert-warning alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> تحذير  !</strong> '.$text.'.</div>');
        }elseif($type=='error'){
            return  $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>خطأ!</strong> '.$text.'.</div>');
        }
    }
    public function index()
    {    /// disability_managers/Setting
        
       $data['all']= $this->Setting_model->get_all_data();
       
        
      $data['subview'] = 'admin/disability_managers_views/prog_main_sitting/prog_main_sitting';
        
        
        $this->load->view('admin_index', $data);
    }
    
    
    
     public function new_sitting($type)
    {
      
        $array = array(1=>'مؤسسه طبيه', 2=>'جهاز طبي', 3=>'مؤهل علمي', 4=>'بيانات الاعاقه',5=>'صله قرابه',6=>'بدل سكن',7=>'جنسيه');
        if($this->input->post('add')){
            $this->Setting_model->add($type);
            $this->message('success','إضافة '.$array[$type]);
           
        redirect('disability_managers/Setting','refresh');
        }
        $data['title'] = 'إضافة '.$array[$type];
          
      $data['subview'] = 'admin/disability_managers_views/prog_main_sitting/new_sitting';
        $this->load->view('admin_index', $data);
    }
   public function edit_sitting($type,$id)
    {
        
      
      $data['record'] = $this->Setting_model->getById($id,$type);
     
             $array = array(1=>'مؤسسه طبيه', 2=>'جهاز طبي', 3=>'مؤهل علمي', 4=>'بيانات الاعاقه',5=>'صله قرابه',6=>'بدل سكن',7=>'جنسيه');
       if($this->input->post('add')){
            $this->Setting_model->update($type,$id);
            $this->message('success','إضافة '.$array[$type]);
           
        redirect('disability_managers/Setting','refresh');
        }
       
        $data['title'] = 'تعديل '.$array[$type];
       
         $data['subview'] = 'admin/disability_managers_views/prog_main_sitting/new_sitting';
        $this->load->view('admin_index', $data);
    }
     public function delete_sitting($type,$id)
    {
        
               $array = array(1=>'مؤسسه طبيه', 2=>'جهاز طبي', 3=>'مؤهل علمي', 4=>'بيانات الاعاقه',5=>'صله قرابه',6=>'بدل سكن',7=>'جنسيه');
        $this->Setting_model->delete($type,$id);
        $this->message('success','حذف '.$array[$type]);
       redirect('disability_managers/Setting','refresh');
    }

/*****************************************/



    }