<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crashes extends MY_Controller {

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
        $this->load->model('Cars/Crashes_model'); 
        
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
            $this->Crashes_model->insert();
            $this->message('success','إضافة عطل سيارة');
            redirect('Cars/Crashes','refresh');
        }
        $data['crashs'] = $this->Crashes_model->select();
        $data['cars'] = $this->Crashes_model->select_cars();
        $data['drivers'] = $this->Crashes_model->select_drivers();
		$data['title'] = 'إضافة عطل سيارة';
        $data['subview'] = 'admin/Cars/car_crashes/car_crashes';
        $this->load->view('admin_index', $data);
	}

	public function edit($id)
	{
		if($this->input->post('add')){
            $this->Crashes_model->update($id);
            $this->message('success','تعديل عطل سيارة');
            redirect('Cars/Crashes','refresh');
        }
		$data['crash'] = $this->Crashes_model->selectByID($id);
		$data['cars'] = $this->Crashes_model->select_cars();
        $data['drivers'] = $this->Crashes_model->select_drivers();
		$data['title'] = 'تعديل عطل سيارة';
        $data['subview'] = 'admin/Cars/car_crashes/car_crashes';
        $this->load->view('admin_index', $data);
	}

	public function delete($id)
	{
		$this->Crashes_model->delete($id);
        $this->message('success','حذف عطل سيارة');
        redirect('Cars/Crashes','refresh');
	}

	public function crash_status()
	{
		$data['done'] = $this->Crashes_model->select(array('car_crashes.crash_status'=>3));
		$data['still'] = $this->Crashes_model->select(array('car_crashes.crash_status'=>2));
		$data['not'] = $this->Crashes_model->select(array('car_crashes.crash_status'=>1));
		$data['all'] = $this->Crashes_model->select();
		$data['title'] = 'بيان بأعطال السيارات';
        $data['subview'] = 'admin/Cars/car_crashes/crash_status';
        $this->load->view('admin_index', $data);
	}

	public function statusUpdate($id,$status)
	{
		$this->Crashes_model->statusUpdate($id,$status);
        $this->message('success','تم التعديل حالة العطل');
        redirect('Cars/Crashes/crash_status','refresh');
	}

}

/* End of file Crashes.php */
/* Location: ./application/controllers/Cars/Crashes.php */