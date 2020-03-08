<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Permission_control extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }
        $this->load->model('Difined_model');
        $this->load->model('Nationality');
        $this->load->model('Department');
        $this->load->model('human_resources_model/Employee_model');
        $this->load->helper(array('url', 'text', 'permission', 'form'));
        $this->load->model('familys_models/Model_access_rule');
        $this->load->model('system_management/Groups');

        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in = $this->Counting->get_basic_in_num();
        $this->files_basic_in = $this->Counting->get_files_basic_in();
        $this->load->model('human_resources_model/Finance_employee_model');
        $this->load->model('human_resources_model/employee_forms/Job_requests_model');
        $this->load->model('human_resources_model/employee_forms/Permit_model');
    }

    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }

    private function test_r($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";

    }

    public function index()  //human_resources/employee_forms/Permission_control
    {

        if($this->input->post('add'))
        {
            $this->Permit_model->insert_permit();

            redirect('human_resources/employee_forms/Permission_control','refresh');
        }
        $data['emp_data'] = $this->Job_requests_model->select_depart();
        $data['jobtitles'] = $this->Job_requests_model->select_all_defined(4);
        $data['employies'] = $this->Job_requests_model->get_emp($_SESSION['emp_code']);
        $data['all_emps'] = $this->Job_requests_model->get_emp(0);

        $data["personal_data"]=$this->Employee_model->get_one_employee($_SESSION['emp_code']);
        $data['admin'] = $this->Employee_model->select_by();
        $data['departs'] = $this->Employee_model->select_depart();
        $data['items'] = $this->Permit_model->get_all_from_o3on();





        $data['title']="طلب اذن";
        $data['subview'] = 'admin/Human_resources/employee_forms/add_permit';
        $this->load->view('admin_index', $data);
    }
    public function edit_permission($id) //human_resources/employee_forms/Permission_control/edit_permission
    {
        if($this->input->post('add'))
        {
            $this->Permit_model->update_by_id($id);
            redirect('human_resources/employee_forms/Permission_control','refresh');
        }
        $data['title']="تعديل طلب اذن";
        $data['emp_data'] = $this->Job_requests_model->select_depart();
        $data['jobtitles'] = $this->Job_requests_model->select_all_defined(4);
        $data['employies'] = $this->Job_requests_model->get_emp($_SESSION['emp_code']);
        $data['all_emps'] = $this->Job_requests_model->get_emp(0);
        $data['vacations'] = $this->Job_requests_model->get_holiday();


        $data['admin'] = $this->Employee_model->select_by();
        $data['departs'] = $this->Employee_model->select_depart();
        $data['item'] = $this->Permit_model-> get_o3on_by_id($id);
        $data["personal_data"]=$this->Employee_model->get_one_employee($data['item']->emp_id_fk);
        $data['subview'] = 'admin/Human_resources/employee_forms/add_permit';
        $this->load->view('admin_index', $data);
    }
public function delete_permit($id)
{
    $this->Permit_model->delete_permit($id);
    redirect('human_resources/employee_forms/Permission_control','refresh');

}


    }