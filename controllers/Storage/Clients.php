<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clients extends MY_Controller {

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
        $this->load->model('Storage/Clients_model'); 
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
            $this->Clients_model->insert();
            $this->message('success','إضافة عميل');
            redirect('Storage/Clients','refresh');
        }
        $data['clients'] = $this->Clients_model->select();
		$data['title'] = 'إضافة عميل';
        $data['subview'] = 'admin/Storage/clients/clients';
        $this->load->view('admin_index', $data);
	}

	public function editClients($id)
	{
		if($this->input->post('add')){
            $this->Clients_model->update($id);
            $this->message('success','تعديل عميل');
            redirect('Storage/Clients','refresh');
        }
		$data['client'] = $this->Clients_model->selectByID($id);
		$data['title'] = 'تعديل عميل';
        $data['subview'] = 'admin/Storage/clients/clients';
        $this->load->view('admin_index', $data);
	}

	public function deleteClients($id)
	{
		$this->Clients_model->delete($id);
        $this->message('success','حذف عميل');
        redirect('Storage/Clients','refresh');
	}

}

/* End of file Clients.php */
/* Location: ./application/controllers/Storage/Clients.php */