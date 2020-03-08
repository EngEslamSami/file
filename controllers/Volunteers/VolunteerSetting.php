<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VolunteerSetting extends MY_Controller {

	public function __construct()
	{
        parent::__construct();
        if($this->session->userdata('is_logged_in')==0){
            redirect('login');
        }
         
        $this->load->model('Volunteers/Volunteer_setting_model');
               /**********************************************************/ 
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in  = $this->Counting->get_basic_in_num();
        $this->files_basic_in  = $this->Counting->get_files_basic_in();  
      /*************************************************************/
    }

	public function index()
	{
		$data['fields'] = $this->Volunteer_setting_model->select_settings(1);
        $data['reasons'] = $this->Volunteer_setting_model->select_settings(2);
        $data['title'] = 'إضافة الخصائص';
        $data['subview'] = 'admin/volunteer/main_setting/main_setting';
        $this->load->view('admin_index', $data);
	}

	public function new_setting($type)
    {
        $array = array(1=>'مجال التطوع', 2=>'سبب التطوع');
        if($this->input->post('add')){
            $this->Volunteer_setting_model->add($type);
            messages('success','إضافة '.$array[$type]);
            redirect('Volunteers/VolunteerSetting','refresh');
        }
        $data['title'] = 'إضافة '.$array[$type];
        $data['subview'] = 'admin/volunteer/main_setting/new_setting';
        $this->load->view('admin_index', $data);
    }

    public function edit_setting($type,$id)
    {
        $array = array(1=>'مجال التطوع', 2=>'سبب التطوع');
        if($this->input->post('add')){
            $this->Volunteer_setting_model->update($id);
            messages('success','تعديل '.$array[$type]);
            redirect('Volunteers/VolunteerSetting','refresh');
        }
        $data['title'] = 'تعديل '.$array[$type];
        $data['record'] = $this->Volunteer_setting_model->getById($id);
        $data['subview'] = 'admin/volunteer/main_setting/new_setting';
        $this->load->view('admin_index', $data);
    }

    public function delete_setting($type,$id)
    {
        $array = array(1=>'مجال التطوع', 2=>'سبب التطوع');
        $this->Volunteer_setting_model->delete($id);
        messages('success','حذف '.$array[$type]);
        redirect('Volunteers/VolunteerSetting','refresh');
    }

}

/* End of file VolunteerSetting.php */
/* Location: ./application/controllers/Volunteers/VolunteerSetting.php */