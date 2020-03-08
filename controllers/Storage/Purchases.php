<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Purchases extends MY_Controller {

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
        $this->load->model('Storage/Purchases_model'); 
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
			$this->Purchases_model->insert();
			$this->message('success','إضافة فاتورة شراء');
    		redirect('Storage/Purchases');
		}
		$data['id'] = $this->Purchases_model->get_last_id();
		$data['suppliers'] = $this->Purchases_model->get_suppliers();
		$data['safes'] = $this->Purchases_model->get_safe();
		$data['items'] = $this->Purchases_model->Get_Items();
		$data['title'] = 'إضافة فاتورة شراء';
        $data['subview'] = 'admin/Storage/purchases/purchases';
        $this->load->view('admin_index', $data);
	}

	public function Get_item()
	{
		echo json_encode($this->Purchases_model->Get_Items($this->input->post('barcode')));
	}

	public function PurchasesSession()
	{
		$this->load->view('admin/Storage/purchases/purchasesSession');
	}

	public function allPurchases()
	{
		$data['all_fatora'] = $this->Purchases_model->allPurchases();
		$data['title'] = 'فواتير الشراء';
        $data['subview'] = 'admin/Storage/purchases/allPurchases';
        $this->load->view('admin_index', $data);
	}

	public function editPurchases($id)
	{
		if($this->input->post('add')) {
			$this->Purchases_model->update($id);
			$this->message('success','تعديل فاتورة شراء');
    		redirect('Storage/Purchases/allPurchases');
		}
		$data['suppliers'] = $this->Purchases_model->get_suppliers();
		$data['safes'] = $this->Purchases_model->get_safe();
		$data['items'] = $this->Purchases_model->Get_Items();
		$data['fatora'] = $this->Purchases_model->allPurchases(array('purchases_fatora.id'=>$id));
		$data['title'] = 'تعديل فاتورة شراء';
        $data['subview'] = 'admin/Storage/purchases/purchases';
        $this->load->view('admin_index', $data);
	}

	public function purchasesBySupplier()
	{
		$data['suppliers'] = $this->Purchases_model->get_suppliers();
		$data['title'] = 'بحث فواتير شراء';
        $data['subview'] = 'admin/Storage/purchases/purchasesBySupplier';
        $this->load->view('admin_index', $data);
	}

	public function Get_purchasesBySupplier()
	{
		$where = array('purchases_fatora.supplier_code'=>$this->input->post('supplier_code'));
        $data['all_fatora'] = $this->Purchases_model->allPurchases($where);
        $this->load->view('admin/Storage/purchases/Get_purchasesBySupplier', $data);
	}

	public function hadPurchases($id)
	{
		if($this->input->post('add')) {
			$this->Purchases_model->insertHadback($id);
			$this->message('success','إضافة مرتجع شراء');
    		redirect('Storage/Purchases/purchasesBySupplier');
		}
		$data['fatora'] = $this->Purchases_model->allPurchases(array('purchases_fatora.id'=>$id));
		$data['title'] = 'تفاصيل فاتورة الشراء';
        $data['subview'] = 'admin/Storage/purchases/hadPurchases';
        $this->load->view('admin_index', $data);
	}

}

/* End of file Purchases.php */
/* Location: ./application/controllers/Storage/Purchases.php */