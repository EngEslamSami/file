<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Evaluation_employee extends MY_Controller
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
        $this->load->model('human_resources_model/employee_forms/Mandate_order_model');
        $this->load->model('human_resources_model/employee_forms/ta3en/Evaluation_employee_model');
    }

    public function messages($type, $text, $method = false)
    {
        $CI =& get_instance();
        $CI->load->library("session");
        if ($type == 'success') {
            return $CI->session->set_flashdata('message', '<script> swal({
                    type:"success",
                    title:"' . $text . '" ,
                    confirmButtonText: "تم"
                })</script>');
        } elseif ($type == 'warning') {
            return $CI->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>   !</strong> ' . $text . '.</div>');
        } elseif ($type == 'error') {
            return $CI->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> !</strong> ' . $text . '.</div>');
        }

    }


    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }


    public function index() // human_resources/employee_forms/ta3en/Evaluation_employee
    {


        $data['title'] = "تقييم فتره التجربه";
        $data['records'] = $this->Evaluation_employee_model->get_all_setting();
        $data['evaluations'] = $this->Evaluation_employee_model->get_all_evaluations();

        $data['all_emps'] = $this->Evaluation_employee_model->get_all_emp();


        if ($this->input->post('add')) {

            $this->Evaluation_employee_model->insert_data();

            $this->messages('success', 'تم الاضافة بنجاح');
            redirect('human_resources/employee_forms/ta3en/Evaluation_employee', 'refresh');
        }


        $data['subview'] = 'admin/Human_resources/employee_forms/mandate_order/mandate_order';
        $data['subview'] = 'admin/Human_resources/employee_forms/ta3en/evaluate_emp';
        $this->load->view('admin_index', $data);
    }


    public function updateEvaluation($id, $emp_id)
    {


        $data['title'] = " تعديل تقييم فتره التجربه";
        $data['records'] = $this->Evaluation_employee_model->get_all_setting();
        $data['evaluation'] = $this->Evaluation_employee_model->get_one_evaluations($id, $emp_id);


        $data['all_emps'] = $this->Evaluation_employee_model->get_all_emp();

        if ($this->input->post('add')) {
            $this->Evaluation_employee_model->update_data($id);
            $this->messages('success', 'تم التعديل بنجاح');
            redirect('human_resources/employee_forms/ta3en/Evaluation_employee', 'refresh');
        }


        $data['subview'] = 'admin/Human_resources/employee_forms/mandate_order/mandate_order';
        $data['subview'] = 'admin/Human_resources/employee_forms/ta3en/evaluate_emp';
        $this->load->view('admin_index', $data);
    }


    public function deleteEvaluation($id, $emp_id)
    {

        $this->Evaluation_employee_model->delete_evaluation($id);
        $this->Evaluation_employee_model->delete_all_points($emp_id);
        $this->Evaluation_employee_model->delete_all_details($emp_id, $id);
        $this->messages('success', 'تم الحذف بنجاح');
        redirect('human_resources/employee_forms/ta3en/Evaluation_employee', 'refresh');
    }


    public function load_details()
    {

        $row_id = $this->input->post('row_id');
        $emp_id = $this->input->post('emp_id');
        $data['get_all'] = $this->Evaluation_employee_model->get_one_evaluations($row_id, $emp_id);

        $this->load->view('admin/Human_resources/employee_forms/ta3en/load_evaluation_details', $data);

    }

    public function print_details()
    {

        $row_id = $this->input->post('row_id');
        $emp_id = $this->input->post('emp_id');
        $data['records'] = $this->Evaluation_employee_model->get_one_evaluations($row_id, $emp_id);
        $this->load->view('admin/Human_resources/employee_forms/ta3en/print_evaluation', $data);

    }

}