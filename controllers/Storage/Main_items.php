<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_items extends MY_Controller {

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
        $this->load->model('Storage/Main_items_model'); 
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
            $this->Main_items_model->insert();
            $this->message('success','إضافة صف رئيسي');
            redirect('Storage/Main_items','refresh');
        }
        $data['main_items'] = $this->Main_items_model->select();
		$data['title'] = 'إضافة صف رئيسي';
        $data['subview'] = 'admin/Storage/main_items/main_items';
        $this->load->view('admin_index', $data);
	}

	public function editMain_item($id)
	{
		if($this->input->post('add')){
            $this->Main_items_model->update($id);
            $this->message('success','تعديل صف رئيسي');
            redirect('Storage/Main_items','refresh');
        }
		$data['main_item'] = $this->Main_items_model->selectByID($id);
		$data['title'] = 'تعديل صف رئيسي';
        $data['subview'] = 'admin/Storage/main_items/main_items';
        $this->load->view('admin_index', $data);
	}

	public function deleteMain_item($id)
	{
		$this->Main_items_model->delete($id);
        $this->message('success','حذف صف رئيسي');
        redirect('Storage/Main_items','refresh');
	}

}

/* End of file Main_items.php */
/* Location: ./application/controllers/Storage/Main_items.php */