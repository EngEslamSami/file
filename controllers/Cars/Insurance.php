<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Insurance extends MY_Controller {

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
        
        $this->groups=$this->Groups->get_group($_SESSION["group_number"]);
        $this->groups_title=$this->Groups->get_group_title($_SESSION["group_number"]);
        $this->load->model('Cars/Insurance_model'); 
        
               /**********************************************************/ 
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in  = $this->Counting->get_basic_in_num();
        $this->files_basic_in  = $this->Counting->get_files_basic_in();  
      /*************************************************************/
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
	{
		if($this->input->post('add')){
            $this->Insurance_model->insert();
            $this->message('success','إضافة شركة تأمين');
            redirect('Cars/Insurance','refresh');
        }
        $data['companies'] = $this->Insurance_model->select();
		$data['title'] = 'إضافة شركة تأمين';
        $data['subview'] = 'admin/Cars/insurance/insurance';
        $this->load->view('admin_index', $data);
	}

	public function edit($id)
	{
		if($this->input->post('add')){
            $this->Insurance_model->update($id);
            $this->message('success','تعديل شركة تأمين');
            redirect('Cars/Insurance','refresh');
        }
		$data['company'] = $this->Insurance_model->selectByID($id);
		$data['title'] = 'تعديل شركة تأمين';
        $data['subview'] = 'admin/Cars/insurance/insurance';
        $this->load->view('admin_index', $data);
	}

	public function delete($id)
	{
		$this->Insurance_model->delete($id);
        $this->message('success','حذف شركة تأمين');
        redirect('Cars/Insurance','refresh');
	}

}

/* End of file Insurance.php */
/* Location: ./application/controllers/Cars/Insurance.php */