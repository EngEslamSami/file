<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JobsSetting extends MY_Controller {

	public function __construct()
	{
        parent::__construct();
        if($this->session->userdata('is_logged_in')==0){
            redirect('login');
        }
         
        $this->load->model('Jobs/Jobs_setting_model');
               /**********************************************************/ 
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in  = $this->Counting->get_basic_in_num();
        $this->files_basic_in  = $this->Counting->get_files_basic_in();  
      /*************************************************************/
    }

	public function index()
	{
		$data['jobs'] = $this->Jobs_setting_model->select_settings();
        $data['title'] = 'إضافة مسمى وظيفي';
        $data['subview'] = 'admin/jobs/main_setting/main_setting';
        $this->load->view('admin_index', $data);
	}

	public function new_setting()
    {   //   Jobs/JobsSetting/new_setting
        if($this->input->post('add')){
            $this->Jobs_setting_model->add();
            messages('success','إضافة مسمى وظيفي');
            redirect('Jobs/JobsSetting','refresh');
        }
        $data['title'] = 'إضافة مسمى وظيفي';
        $data['subview'] = 'admin/jobs/main_setting/new_setting';
        $this->load->view('admin_index', $data);
    }

    public function edit_setting($id)
    {
        if($this->input->post('add')){
            $this->Jobs_setting_model->update($id);
            messages('success','تعديل المسمى الوظيفي');
            redirect('Jobs/JobsSetting','refresh');
        }
        $data['title'] = 'تعديل المسمى الوظيفي';
        $data['record'] = $this->Jobs_setting_model->getById($id);
        $data['subview'] = 'admin/jobs/main_setting/new_setting';
        $this->load->view('admin_index', $data);
    }

    public function delete_setting($id)
    {
        $this->Jobs_setting_model->delete($id);
        messages('success','حذف المسمى الوظيفي');
        redirect('Jobs/JobsSetting','refresh');
    }

}

/* End of file JobsSetting.php */
/* Location: ./application/controllers/Jobs/JobsSetting.php */