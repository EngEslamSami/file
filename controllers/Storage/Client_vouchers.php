<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client_vouchers extends MY_Controller {

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
        $this->load->model('Storage/Client_vouchers_model'); 
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
            $id = $this->Client_vouchers_model->insert();
            $this->message('success','إضافة سند عملاء');
            $this->printClientVouchers($id);
        }
        $data['clients'] = $this->Client_vouchers_model->allClients();
		$data['title'] = 'إضافة سند عملاء';
        $data['subview'] = 'admin/Storage/client_vouchers/client_vouchers';
        $this->load->view('admin_index', $data);
	}

	public function deleteClients($id)
	{
		$this->Client_vouchers_model->delete($id);
        $this->message('success','حذف سند العميل');
        redirect('Storage/Client_vouchers','refresh');
	}

	public function client_total()
    {
    	$data['client'] = $this->Client_vouchers_model->client_total($this->input->post('client_code'));
    	echo json_encode($data['client']);
    }

    public function Get_client_vouchers()
    {
    	$data['all_vouchers'] = $this->Client_vouchers_model->all_client_vouchers($this->input->post('client_code'));
    	$this->load->view('admin/Storage/client_vouchers/Get_client_vouchers', $data);
    }

    public function printClientVouchers($id)
    {
        $data['voucher'] = $this->Client_vouchers_model->selectById($id);
        $this->load->view('admin/Storage/client_vouchers/P_client_vouchers', $data);
    }

    public function R_ClientsCounting()
    {
        $data['clients'] = $this->Client_vouchers_model->allClients();
        $data['title'] = 'كشف حساب عميل';
        $data['subview'] = 'admin/Storage/client_vouchers/R_ClientsCounting';
        $this->load->view('admin_index', $data);
    }

    public function Get_ClientsCounting()
    {
        $data['counting'] = $this->Client_vouchers_model->Get_ClientsCounting($this->input->post('client_code'));
        $this->load->view('admin/Storage/client_vouchers/Get_ClientsCounting', $data);
    }

}

/* End of file Client_vouchers.php */
/* Location: ./application/controllers/Storage/Client_vouchers.php */