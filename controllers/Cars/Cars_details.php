<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cars_details extends MY_Controller {

 //	public $CI = NULL;
    public function __construct()
	{
        parent::__construct();
        $this->load->library('pagination');
        //$this->CI = & get_instance();
        if($this->session->userdata('is_logged_in')==0){
            redirect('login');
        }
        $this->load->helper(array('url','text','permission','form'));
        $this->load->model('system_management/Groups');
        $this->load->model('Difined_model');
        
        $this->groups=$this->Groups->get_group($_SESSION["group_number"]);
        $this->groups_title=$this->Groups->get_group_title($_SESSION["group_number"]);
        $this->load->model('Cars/Cars_details_model'); 
        
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
            $this->Cars_details_model->insert();
            $this->message('success','إضافة بيانات سيارة');
            redirect('Cars/Cars_details','refresh');
        }
        $data['details'] = $this->Cars_details_model->select();
        $data['companies'] = $this->Cars_details_model->companies_and_cars_types(0);
        $data['cars_types'] = $this->Cars_details_model->companies_and_cars_types(1);
		$data['title'] = 'إضافة بيانات سيارة';
        $data['subview'] = 'admin/Cars/cars_details/cars_details';
        $this->load->view('admin_index', $data);
	}

	public function edit($id)
	{
		if($this->input->post('add')){
            $this->Cars_details_model->update($id);
            $this->message('success','تعديل بيانات سيارة');
            redirect('Cars/Cars_details','refresh');
        }
		$data['detail'] = $this->Cars_details_model->selectByID($id);
		$data['companies'] = $this->Cars_details_model->companies_and_cars_types(0);
        $data['cars_types'] = $this->Cars_details_model->companies_and_cars_types(1);
		$data['title'] = 'تعديل بيانات سيارة';
        $data['subview'] = 'admin/Cars/cars_details/cars_details';
        $this->load->view('admin_index', $data);
	}

	public function delete($id)
	{
		$this->Cars_details_model->delete($id);
        $this->message('success','حذف بيانات سيارة');
        redirect('Cars/Cars_details','refresh');
	}

    public function R_cars($value='')
    {
        $data['table'] = $this->Cars_details_model->R_cars();
        $data['title'] = 'بيان عام لكل السيارات';
        $data['subview'] = 'admin/Cars/cars_details/R_cars';
        $this->load->view('admin_index', $data);
    }

}

/* End of file Cars_details.php */
/* Location: ./application/controllers/Cars/Cars_details.php */