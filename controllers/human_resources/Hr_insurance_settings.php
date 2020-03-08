<?php
class Hr_insurance_settings extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }
        $this->load->helper(array('url', 'text', 'permission', 'form'));
        $this->load->model('Difined_model');
        /*  $this->load->model('Nationality');
          $this->load->model('Department');
          $this->load->model('finance_resource_models/Guaranty');
          $this->load->model('finance_resource_models/Endowments');
          $this->load->model('finance_resource_models/Operation_guaranty');
          $this->load->model('finance_resource_models/Donors');
          $this->load->model('finance_resource_models/Donors_gurantee'); */

        $this->load->model('system_management/Groups');
        $this->main_groups = $this->Groups->main_fetch_group();
        $this->groups = $this->Groups->get_group($_SESSION["group_number"]);
        $this->groups_title = $this->Groups->get_group_title($_SESSION["group_number"]);

        /**********************************************************/
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in = $this->Counting->get_basic_in_num();
        $this->files_basic_in = $this->Counting->get_files_basic_in();

        $this->load->model('human_resources_model/Hr_insurance_settings_model');
        //  $this->myarray = $this->Employee_setting->all_settings();
    }


    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }

    private function message($type, $text)
    {
        if ($type == 'success') {
            return $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> تم بنجاح!</strong> ' . $text . '.</div>');
        } elseif ($type == 'wiring') {
            return $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> تحذير  !</strong> ' . $text . '.</div>');
        } elseif ($type == 'error') {
            return $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>خطأ!</strong> ' . $text . '.</div>');
        }
    }






    public function add_hr_insurance_settings(){  // human_resources/Hr_insurance_settings/add_hr_insurance_settings

        if($this->input->post('add')){
            $this->Hr_insurance_settings_model->insert();
            $this->message('success','إضافة الإعدادات');
            redirect('human_resources/Hr_insurance_settings/add_hr_insurance_settings' ,'refresh');
        }else{
            $data['settings'] =$this->Difined_model->select_search_key('employees_settings', 'type', '19');
            $data['records'] =$this->Hr_insurance_settings_model->select_all();

            $data['nationality_ksa'] =$this->Hr_insurance_settings_model->select(0);
            $data['nationality'] =$this->Hr_insurance_settings_model->select(1);
            $data['title'] = 'إعدادات التأمينات الإجتماعية ';
            $data['subview'] = 'admin/Human_resources/hr_insurance_settings/add_hr_insurance_settings';
            $this->load->view('admin_index', $data);
        }

    }
    public function Update_hr_insurance_settings($id){
        if($this->input->post('add')){
            $this->Hr_insurance_settings_model->update($id);
            $this->message('success','تعديل الإعدادات');
            redirect('human_resources/Hr_insurance_settings/add_hr_insurance_settings' ,'refresh');
        }
        $data['settings'] =$this->Difined_model->select_search_key('employees_settings', 'type', '19');
        $data['result'] =$this->Hr_insurance_settings_model->select_by($id);
        $data['title'] = 'إعدادات التأمينات الإجتماعية ';
        $data['subview'] = 'admin/Human_resources/hr_insurance_settings/add_hr_insurance_settings';
        $this->load->view('admin_index', $data);
    }


    public function Delete_hr_insurance_settings($id){
        $this->Hr_insurance_settings_model->delete($id);
        $this->message('success','حذف ');
        redirect('human_resources/Hr_insurance_settings/add_hr_insurance_settings','refresh');
    }



    public  function check_value(){
        $value = $this->Hr_insurance_settings_model->select($this->input->post('id'));
        echo json_encode($value);

    }




}
