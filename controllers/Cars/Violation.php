<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Violation extends MY_Controller {

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
        $this->load->model('Cars/Violation_model'); 
        
        
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
            $this->Violation_model->insert();
            $this->message('success','إضافة مخالفة سيارة');
            redirect('Cars/Violation','refresh');
        }
        $data['violations'] = $this->Violation_model->select();
        $data['cars'] = $this->Violation_model->select_cars();
        $data['drivers'] = $this->Violation_model->select_drivers();
		$data['title'] = 'إضافة مخالفة سيارة';
        $data['subview'] = 'admin/Cars/violations/violations';
        $this->load->view('admin_index', $data);
	}

	public function edit($id)
	{
		if($this->input->post('add')){
            $this->Violation_model->update($id);
            $this->message('success','تعديل مخالفة سيارة');
            redirect('Cars/Violation','refresh');
        }
		$data['violation'] = $this->Violation_model->selectByID($id);
		$data['cars'] = $this->Violation_model->select_cars();
        $data['drivers'] = $this->Violation_model->select_drivers();
		$data['title'] = 'تعديل مخالفة سيارة';
        $data['subview'] = 'admin/Cars/violations/violations';
        $this->load->view('admin_index', $data);
	}

	public function delete($id)
	{
		$this->Violation_model->delete($id);
        $this->message('success','حذف مخالفة سيارة');
        redirect('Cars/Violation','refresh');
	}

    public function R_violation()
    {
        $data['cars'] = $this->Violation_model->select_cars();
        $data['title'] = 'تقرير المخالفات خلال فترة';
        $data['subview'] = 'admin/Cars/violations/R_violation';
        $this->load->view('admin_index', $data);
    }

    public function Get_violation()
    {
        $where = array('car_violation.date>='=>strtotime($this->input->post('date_from')), 'car_violation.date<='=>strtotime($this->input->post('date_to')), 'car_violation.car_id_fk'=>$this->input->post('car_id_fk'));
        if($this->input->post('car_id_fk') == 'all') {
            $where = array('car_violation.date>='=>strtotime($this->input->post('date_from')), 'car_violation.date<='=>strtotime($this->input->post('date_to')));
        }
        $data['violations'] = $this->Violation_model->select($where);
        $this->load->view('admin/Cars/violations/Get_violation', $data);
    }

}

/* End of file Violation.php */
/* Location: ./application/controllers/Cars/Violation.php */