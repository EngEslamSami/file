<?php
class Salaries_setting extends MY_Controller
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
        /*************************************************************/
        $this->load->model('human_resources_model/Salary_model');



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


    public function salaries_setting() // human_resources/Salaries_setting/salaries_setting
    {
        if($this->input->post('add')){
            $this->Salary_model->insert_salary();
            redirect('human_resources/Salaries_setting/salaries_setting');
        }
        $data['title'] = "سلم الرواتب";
        $data['records'] =  $this->Salary_model->all_salaries();
        $data['subview'] = 'admin/Human_resources/salaries/salaries_settings';
        $this->load->view('admin_index', $data);
    }

    public function update_salaries($id) // human_resources/Salaries_setting/update_salaries
    {
        if($this->input->post('add')){
            $this->Salary_model->update_salary($id);
            redirect('human_resources/Salaries_setting/salaries_setting');
        }
        $data['title'] = "تعديل سلم الرواتب";
        $data['record'] =  $this->Salary_model->getById_salary($id);
        $data['subview'] = 'admin/Human_resources/salaries/salaries_settings';
        $this->load->view('admin_index', $data);
    }
    public function delete_salaries($id){  // human_resources/Salaries_setting/delete_salaries
        $this->Salary_model->delete_salary($id);
        $this->message('success','حذف ');
        redirect('human_resources/Salaries_setting/salaries_setting','refresh');
    }
}