<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class New_member_pill extends MY_Controller {

	public function __construct()
    {
       
        parent::__construct();
        if($this->session->userdata('is_logged_in')==0){
            redirect('login');
        }
        //---------------------------------------------
        if($_SESSION['group_number']==0){
            redirect('Dash');
        }
        $this->load->library('pagination');
        $this->load->library('form_validation');
        $this->load->helper(array('url','text','permission','form','download'));
        $this->load->model('system_management/Groups');
        
        $this->groups=$this->Groups->get_group($_SESSION["group_number"]);
        $this->load->model('disability_managers_models/New_pill_model');
    }

    private  function message($type,$text)
    {
        if($type =='success') {
            return $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>تم بنجاح!</strong> '.$text.'.</div>');
        }elseif($type=='wiring'){
            return $this->session->set_flashdata('message','<div class="alert alert-warning alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>تحزير!</strong> '.$text.'.</div>');
        }elseif($type=='error'){
            return  $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>خطأ!</strong> '.$text.'.</div>');
        }
    }
    
    
    
    
    
    
    public function new_member_pills(){  //  disability_managers/New_member_pill/new_member_pills
    	if($this->input->post("add")){
			$this->New_pill_model->insert();
          $this->message('success','إضافة الرسوم العضوية ');
    		redirect('disability_managers/New_member_pill/new_member_pills');
		}
    	$data['sutdent'] = $this->New_pill_model->getAll_student();
    	$data['title'] = 'الرسوم العضوية';
        $data['subview'] = 'admin/disability_managers_views/new_student_pills/new_student_pills';
        $this->load->view('admin_index', $data);
    }

   public function get_student_other() //  New_student_pills/get_student_other
    {
        
    $id=$this->input->post('student_code');
    echo $this->New_pill_model->get_member_fees($id);
        
    
       
      
    }
    public function get_member_remain() {
    $id=$this->input->post('student_code');
    echo  $this->New_pill_model->get_member_remain($id);
    }
   
	     public function getTable()
    {
        $id=$this->input->post('student_code');
        
    	$data['all_student'] = $this->New_pill_model->all_student_pills($id);
        
   	$this->load->view('admin/disability_managers_views/new_student_pills/getTable', $data);
    }
 public function delete($id) // New_student_pills/delete
    {
    	$this->New_pill_model->delete($id);
    	$this->message('success','حذف سند');
    redirect('disability_managers/New_member_pill/new_member_pills');
    }

   
    public function make_report()
    {
        	$data['sutdent'] = $this->New_pill_model->getAll_student();
       $data['subview'] = 'admin/disability_managers_views/reports/main_report';
        $this->load->view('admin_index', $data);  
    }
    public function getbasic_report()
    {
        $id=$this->input->post('student_code');
        
    	$data['all_student'] = $this->New_pill_model->all_student_pills($id);
        
   	$this->load->view('admin/disability_managers_views/reports/basic_report', $data);
    }
    
    
    public function get_report()  // disability_managers/New_member_pill/get_report
    {
        	$data['sutdent'] = $this->New_pill_model->getAll_student();
            
       $data['subview'] = 'admin/disability_managers_views/reports/debt_report';
        $this->load->view('admin_index', $data);  
    }
    
    
    
    public function get_debt_report()
    {
        
        
        $id=$this->input->post('student_code');
        
    	$data['all_student'] = $this->New_pill_model->all_student_pills($id);
        
   	$this->load->view('admin/disability_managers_views/reports/get_debt_table', $data);
    }
    
    public function get_detail_report()   // disability_managers/New_member_pill/get_detail_report
    {
       $data['title']="تقرير بسداد الرسوم";
       $data['paid']=$this->New_pill_model->get_member_status();
        $data['subview'] = 'admin/disability_managers_views/reports/report_count';
        $this->load->view('admin_index', $data);  
      
    }
    
     public function print_data($id) // New_student_pills/print
    {
        $data['sand'] = $this->New_pill_model->print_data($id);
        
    $this->load->view('admin/disability_managers_views/new_student_pills/print', $data);
    }
     

}

/* End of file Suppliervouchers.php */
/* Location: ./application/controllers/Suppliervouchers.php */