<?php

class  Print_esal_setting extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }
        $this->load->model('Difined_model');
        $this->load->model('human_resources_model/Employee_model');
        $this->load->model('human_resources_model/employee_forms/Mandate_order_model');
        $this->load->model("all_Finance_resource_models/print_esal_setting/Print_esal_setting_model");
        $this->load->model('human_resources_model/employee_forms/Job_requests_model');

        $this->load->helper(array('url', 'text', 'permission', 'form'));


        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in = $this->Counting->get_basic_in_num();
        $this->files_basic_in = $this->Counting->get_files_basic_in();

        $this->load->model('Difined_model');


    }

    public function index() //all_Finance_resource/print_esal_setting/Print_esal_setting
    {
        $data['title']="اعدادات طباعه الايصال";
        $data['all_emps'] = $this->Job_requests_model->get_emp(0);
        if($this->input->post('add'))
        {

           $this->Print_esal_setting_model->insert_esal_setting();

           redirect('all_Finance_resource/print_esal_setting/Print_esal_setting','refresh');
        }

        $data['admin'] = $this->Employee_model->select_by();
        $data['emp_data']=$this->Print_esal_setting_model->get_esal_by_id($_SESSION['emp_code']);


        $data['departs'] = $this->Mandate_order_model->select_depart();
        $data["personal_data"]=$this->Employee_model->get_one_employee($_SESSION['emp_code']);
        $data['last_id'] = $this->Mandate_order_model->get_last();
        $data['last'] = $this->Mandate_order_model->get_last_id();
        $data['records']=$this->Print_esal_setting_model->get_all();
        $data['job_role'] = $this->Difined_model->select_search_key('all_defined_setting', 'defined_type', '4');
        $data['dest'] = $this->Difined_model->select_search_key('hr_forms_settings', '	type', '9');
        
        
        
        
        
        
        $data['subview'] = 'admin/all_Finance_resource_views/print_esal_setting/print_esal_setting';
        $this->load->view('admin_index', $data);
    }

    public function edit_esal_setting($id)
    {
        $data['all_emps'] = $this->Job_requests_model->get_emp(0);
        if($this->input->post('add'))
        {
            $this->Print_esal_setting_model->update_esal_setting($id);
            redirect('all_Finance_resource/print_esal_setting/Print_esal_setting','refresh');
        }
        $data['title']="تعديل اعدادات طباعه الايصال";
        $data['admin'] = $this->Employee_model->select_by();
        $data['job_role'] = $this->Difined_model->select_search_key('all_defined_setting', 'defined_type', '4');
        $data['departs'] = $this->Mandate_order_model->select_depart();
        $data['emp_data']=$this->Print_esal_setting_model->get_esal_by_id($id);
        $data['subview'] = 'admin/all_Finance_resource_views/print_esal_setting/print_esal_setting';
        $this->load->view('admin_index', $data);

    }
    
    public function delete_record($id)
    {
        $this->Print_esal_setting_model->delete_esal($id);
        redirect('all_Finance_resource/print_esal_setting/Print_esal_setting','refresh');
    }

    public function check_data_emp()
    {
        $id=$this->input->post('valu');
       $data=  $this->Print_esal_setting_model->check_emp_esal($id);
       print_r(json_encode($data));
    }
}