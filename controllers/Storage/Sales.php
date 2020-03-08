<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sales extends MY_Controller {

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
        $this->load->model('Storage/Sales_model'); 
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
		if($this->input->post('add')) {
			$this->Sales_model->insert();
			$this->message('success','إضافة فاتورة بيع');
    		redirect('Storage/Sales');
		}
		$data['id'] = $this->Sales_model->get_last_id();
		$data['clients'] = $this->Sales_model->get_clients();
		$data['safes'] = $this->Sales_model->get_safe();
		$data['items'] = $this->Sales_model->Get_Items();
		$data['title'] = 'إضافة فاتورة بيع';
        $data['subview'] = 'admin/Storage/sales/sales';
        $this->load->view('admin_index', $data);
	}

	public function Get_item()
	{
		echo json_encode($this->Sales_model->Get_Items($this->input->post('barcode')));
	}

	public function SalesSession()
	{
		$this->load->view('admin/Storage/sales/salesSession');
	}

	public function allSales()
	{
		$data['all_fatora'] = $this->Sales_model->allSales();
		$data['title'] = 'فواتير البيع';
        $data['subview'] = 'admin/Storage/sales/allSales';
        $this->load->view('admin_index', $data);
	}

	public function editSales($id)
	{
		if($this->input->post('add')) {
			$this->Sales_model->update($id);
			$this->message('success','تعديل فاتورة بيع');
    		redirect('Storage/Sales/allsales');
		}
		$data['clients'] = $this->Sales_model->get_clients();
		$data['safes'] = $this->Sales_model->get_safe();
		$data['items'] = $this->Sales_model->Get_Items();
		$data['fatora'] = $this->Sales_model->allSales(array('sales_fatora.id'=>$id));
		$data['title'] = 'تعديل فاتورة بيع';
        $data['subview'] = 'admin/Storage/sales/sales';
        $this->load->view('admin_index', $data);
	}

	public function salesByClient()
	{
		$data['clients'] = $this->Sales_model->get_clients();
		$data['title'] = 'بحث فواتير بيع';
        $data['subview'] = 'admin/Storage/sales/salesByClient';
        $this->load->view('admin_index', $data);
	}

	public function Get_salesByClient()
	{
		$where = array('sales_fatora.client_code'=>$this->input->post('client_code'));
        $data['all_fatora'] = $this->Sales_model->allSales($where);
        $this->load->view('admin/Storage/sales/Get_salesByClient', $data);
	}

}

/* End of file Sales.php */
/* Location: ./application/controllers/Storage/Sales.php */