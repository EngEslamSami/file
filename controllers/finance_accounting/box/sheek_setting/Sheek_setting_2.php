<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sheek_setting extends MY_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        if($this->session->userdata('is_logged_in') == 0){
            redirect('login');
        }
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in  = $this->Counting->get_basic_in_num();
        $this->files_basic_in  = $this->Counting->get_files_basic_in();
        $this->load->model('finance_accounting_model/box/sheek_setting/Sheek_setting_model');
    }

	public function index()
	{
		$data['records'] = $this->Sheek_setting_model->getAllSettings();
		$data['banks'] = $this->Sheek_setting_model->getBanks();
        $data['subview'] = 'admin/finance_accounting/box/sheek_setting/sheekSetting';
        $this->load->view('admin_index', $data);
	}

	public function edit($id)
	{
		$data['recordSheek'] = $this->Sheek_setting_model->getSettingById($id);
		$data['banks'] = $this->Sheek_setting_model->getBanks();
        $data['subview'] = 'admin/finance_accounting/box/sheek_setting/sheekSetting';
        $this->load->view('admin_index', $data);
	}

	public function add()
	{
		$file = upload_image('fileupload');
		messages('success','إضافة البيانات');
	    $this->Sheek_setting_model->insert_update($file);
        redirect('finance_accounting/box/sheek_setting/Sheek_setting','refresh');
	}

	public function delete($id)
	{
		messages('success','حذف البيانات');
	    $this->Sheek_setting_model->delete($id);
        redirect('finance_accounting/box/sheek_setting/Sheek_setting','refresh');
	}

	public function update($id)
	{
		$file = upload_image('fileupload');
		messages('success','تعديل البيانات');
	    $this->Sheek_setting_model->insert_update($file,$id);
        redirect('finance_accounting/box/sheek_setting/Sheek_setting','refresh');
	}

}

/* End of file Sheek_setting.php */
/* Location: ./application/controllers/finance_accounting/box/sheek_setting/Sheek_setting.php */