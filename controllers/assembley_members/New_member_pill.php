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
        $this->load->model('assembly_member_models/New_pill_model');
        
               /**********************************************************/ 
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in  = $this->Counting->get_basic_in_num();
        $this->files_basic_in  = $this->Counting->get_files_basic_in();  
      /*************************************************************/
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
    public function new_member_pills(){  //New_member_pill/new_member_pills
    	if($this->input->post("add")){
			$this->New_pill_model->insert();
          $this->message('success','إضافة رسوم العضوية');
    		redirect('assembley_members/New_member_pill/new_member_pills');
			
		}
    	$data['sutdent'] = $this->New_pill_model->getAll_members();
    	$data['title'] = 'رسوم العضوية';
        $data['subview'] = 'admin/assembly_members_views/new_member_pills/new_member_pills';
        $this->load->view('admin_index', $data);
    }

   public function get_student_other()
    {
        
    $id=$this->input->post('member_id');
    echo $this->New_pill_model->get_member_fees($id);
        
    
       
      
    }
    public function get_member_remain() {
    $id=$this->input->post('member_id');
    echo  $this->New_pill_model->get_member_remain($id);
    }
   
	     public function getTable()
    {
        $id=$this->input->post('member_id');
        
    	$data['all_student'] = $this->New_pill_model->all_members_pills($id);
        
   	$this->load->view('admin/assembly_members_views/new_member_pills/getTable', $data);
    }
 public function delete($id) // assembley_members/delete
    {
    	$this->New_pill_model->delete($id);
    	$this->message('success','حذف سند');
    redirect('assembley_members/New_member_pill/new_member_pills');
    }

   
    public function make_report() //assembley_members/New_member_pill/make_report
    {
        	$data['sutdent'] = $this->New_pill_model->getAll_members();
       $data['subview'] = 'admin/assembly_members_views/reports/main_report';
        $this->load->view('admin_index', $data);  
    }
    public function getbasic_report()
    {
        $id=$this->input->post('member_id');
        
    	$data['all_student'] = $this->New_pill_model->all_members_pills($id);
        
   	$this->load->view('admin/assembly_members_views/reports/basic_report', $data);
    }
    
    
    public function get_report()//assembley_members/New_member_pill/get_report
    {
        	$data['sutdent'] = $this->New_pill_model->getAll_members();
       $data['subview'] = 'admin/assembly_members_views/reports/debt_report';
        $this->load->view('admin_index', $data);  
    }
    
    
    
    public function get_debt_report()
    {
        
        
        $id=$this->input->post('member_id');
        
    	$data['all_student'] = $this->New_pill_model->all_members_pills($id);
        
   	$this->load->view('admin/assembly_members_views/reports/get_debt_table', $data);
    }
    
    public function get_detail_report()//assembley_members/New_member_pill/get_detail_report
    {
       $data['title']="تقرير بسداد رسوم العضوية";
       $data['paid']=$this->New_pill_model->get_member_status();
        $data['subview'] = 'admin/assembly_members_views/reports/report_count';
        $this->load->view('admin_index', $data);  
      
    }
    
     public function print_data($id) // 
    {
        $data['sand'] = $this->New_pill_model->print_data($id);
        
    $this->load->view('admin/assembly_members_views/new_member_pills/print', $data);
    }
     

}

/* End of file Suppliervouchers.php */
/* Location: ./application/controllers/Suppliervouchers.php */