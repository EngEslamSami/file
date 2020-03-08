<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cars_types extends MY_Controller {

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
        $this->load->model('Cars/Cars_types_model'); 
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
            $this->Cars_types_model->insert();
            $this->message('success','إضافة نوع سيارة');
            redirect('Cars/Cars_types','refresh');
        }
        $data['cars_types'] = $this->Cars_types_model->select();
		$data['title'] = 'إضافة نوع سيارة';
        $data['subview'] = 'admin/Cars/cars_types/cars_types';
        $this->load->view('admin_index', $data);
	}

	public function editCars_types($id)
	{
		if($this->input->post('add')){
            $this->Cars_types_model->update($id);
            $this->message('success','تعديل نوع سيارة');
            redirect('Cars/Cars_types','refresh');
        }
		$data['car_type'] = $this->Cars_types_model->selectByID($id);
		$data['title'] = 'تعديل نوع سيارة';
        $data['subview'] = 'admin/Cars/cars_types/cars_types';
        $this->load->view('admin_index', $data);
	}

	public function deleteCars_types($id)
	{
		$this->Cars_types_model->delete($id);
        $this->message('success','حذف نوع سيارة');
        redirect('Cars/Cars_types','refresh');
	}

}

/* End of file Cars_types.php */
/* Location: ./application/controllers/Cars/Cars_types.php */