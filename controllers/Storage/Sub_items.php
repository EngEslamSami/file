<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sub_items extends MY_Controller {

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
        $this->load->model('Storage/Sub_items_model'); 
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
            $this->Sub_items_model->insert();
            $this->message('success','إضافة صف فرعي');
            redirect('Storage/Sub_items','refresh');
        }
        $data['sub_items'] = $this->Sub_items_model->select_main_items();
        $data['units'] = $this->Sub_items_model->select_units();
		$data['title'] = 'إضافة صف فرعي';
        $data['subview'] = 'admin/Storage/sub_items/sub_items';
        $this->load->view('admin_index', $data);
	}

	public function editSub_item($id)
	{
		if($this->input->post('add')){
            $this->Sub_items_model->update($id);
            $this->message('success','تعديل صف فرعي');
            redirect('Storage/Sub_items','refresh');
        }
        $data['sub_items'] = $this->Sub_items_model->select_main_items();
        $data['units'] = $this->Sub_items_model->select_units();
		$data['sub_item'] = $this->Sub_items_model->selectByID($id);
		$data['title'] = 'تعديل صف فرعي';
        $data['subview'] = 'admin/Storage/sub_items/sub_items';
        $this->load->view('admin_index', $data);
	}

	public function deleteSub_items($id)
	{
		$this->Sub_items_model->delete($id);
        $this->message('success','حذف صف فرعي');
        redirect('Storage/Sub_items','refresh');
	}

}

/* End of file Sub_items.php */
/* Location: ./application/controllers/Storage/Sub_items.php */