<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders_car extends MY_Controller {

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
        $this->load->model('Cars/Orders_car_model'); 
        
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
            $this->Orders_car_model->insert();
            $this->message('success','إضافة أمر تشغيل');
            redirect('Cars/Orders_car','refresh');
        }
        $data['orders'] = $this->Orders_car_model->select();
        $data['cars'] = $this->Orders_car_model->select_cars();
        $data['drivers'] = $this->Orders_car_model->select_drivers();
		$data['title'] = 'إضافة أمر تشغيل';
        $data['subview'] = 'admin/Cars/orders_car/orders_car';
        $this->load->view('admin_index', $data);
	}

	public function edit($id)
	{
		if($this->input->post('add')){
            $this->Orders_car_model->update($id);
            $this->message('success','تعديل أمر تشغيل');
            redirect('Cars/Orders_car','refresh');
        }
        $data['order'] = $this->Orders_car_model->selectByID($id);
        $data['cars'] = $this->Orders_car_model->select_cars($data['order']['car_id_fk']);
        $data['drivers'] = $this->Orders_car_model->select_drivers($data['order']['driver_id_fk']);
		$data['title'] = 'تعديل أمر تشغيل';
        $data['subview'] = 'admin/Cars/orders_car/orders_car';
        $this->load->view('admin_index', $data);
	}

	public function delete($id)
	{
		$this->Orders_car_model->delete($id);
        $this->message('success','حذف أمر تشغيل');
        redirect('Cars/Orders_car','refresh');
	}

	public function car_return($id)
	{
		$this->Orders_car_model->car_return($id);
		$this->message('success','تسجيل عودة سيارة');
		redirect('Cars/Orders_car','refresh');
	}

    public function R_status()
    {
        $data['records'] = $this->Orders_car_model->R_status();
        $data['title'] = 'تقرير بحالة السائقين والسيارات';
        $data['subview'] = 'admin/Cars/orders_car/R_status';
        $this->load->view('admin_index', $data);
    }

}

/* End of file Orders_car.php */
/* Location: ./application/controllers/Cars/Orders_car.php */