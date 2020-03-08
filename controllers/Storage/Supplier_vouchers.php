<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier_vouchers extends MY_Controller {

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
        $this->load->model('Storage/Supplier_vouchers_model'); 
        
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
            $id = $this->Supplier_vouchers_model->insert();
            $this->message('success','إضافة سند موردين');
            $this->printSupplierVouchers($id);
        }
        $data['suppliers'] = $this->Supplier_vouchers_model->allSuppliers();
		$data['title'] = 'إضافة سند موردين';
        $data['subview'] = 'admin/Storage/supplier_vouchers/supplier_vouchers';
        $this->load->view('admin_index', $data);
	}

	public function deleteSuppliers($id)
	{
		$this->Supplier_vouchers_model->delete($id);
        $this->message('success','حذف سند موردين');
        redirect('Storage/Supplier_vouchers','refresh');
	}

	public function supplier_total()
    {
    	$data['supplier'] = $this->Supplier_vouchers_model->supplier_total($this->input->post('supplier_code'));
    	echo json_encode($data['supplier']);
    }

    public function Get_supplier_vouchers()
    {
    	$data['all_vouchers'] = $this->Supplier_vouchers_model->all_supplier_vouchers($this->input->post('supplier_code'));
    	$this->load->view('admin/Storage/supplier_vouchers/Get_supplier_vouchers', $data);
    }

    public function printSupplierVouchers($id)
    {
        $data['voucher'] = $this->Supplier_vouchers_model->selectById($id);
        $this->load->view('admin/Storage/supplier_vouchers/P_supplier_vouchers', $data);
    }

    public function R_SuppliersCounting()
    {
        $data['suppliers'] = $this->Supplier_vouchers_model->allSuppliers();
        $data['title'] = 'كشف حساب مورد';
        $data['subview'] = 'admin/Storage/supplier_vouchers/R_SuppliersCounting';
        $this->load->view('admin_index', $data);
    }

    public function Get_SuppliersCounting()
    {
        $data['counting'] = $this->Supplier_vouchers_model->Get_SuppliersCounting($this->input->post('supplier_code'));
        $this->load->view('admin/Storage/supplier_vouchers/Get_SuppliersCounting', $data);
    }

}

/* End of file Supplier_vouchers.php */
/* Location: ./application/controllers/Storage/Supplier_vouchers.php */