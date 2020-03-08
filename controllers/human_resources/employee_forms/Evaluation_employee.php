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
        $this->load->model('human_resources_model/employee_forms/Job_requests_model');
        $this->load->model('human_resources_model/employee_forms/Evaluation_employee_model');
    }
    private function message($type, $text)
    {
        if ($type == 'success') {
            return $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <strong> تم بنجاح!</strong> ' . $text . '.
                                                </div>');
        } elseif ($type == 'wiring') {
            return $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissable">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <strong> تحذير  !</strong> ' . $text . '.
                                                </div>');
        } elseif ($type == 'error') {
            return $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <strong>خطأ!</strong> ' . $text . '.
                                                </div>');
        }
    }




    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }


    public function index() //human_resources/employee_forms/Evaluation_employee
    {


        $data['title']="تقييم فتره التجربه";
        $data['records']=$this->Evaluation_employee_model->get_all_setting();
        $data['evaluations']=$this->Evaluation_employee_model->get_all_evaluations();
        
        $data['all_emps'] =$this->Evaluation_employee_model->get_all_emp();
      
        $data['admin'] = $this->Employee_model->select_by();
        $data['departs'] = $this->Mandate_order_model->select_depart();
        $data["personal_data"]=$this->Employee_model->get_one_employee($_SESSION['emp_code']);

   if($this->input->post('add'))
{
    $this->Evaluation_employee_model->insert_data();
      redirect('human_resources/employee_forms/Evaluation_employee','refresh');
}


        $data['job_role'] = $this->Difined_model->select_search_key('all_defined_setting', 'defined_type', '4');
        $data['dest'] = $this->Difined_model->select_search_key('hr_forms_settings', '	type', '9');
        $data['subview'] = 'admin/Human_resources/employee_forms/mandate_order/mandate_order';
        $data['subview'] = 'admin/Human_resources/employee_forms/evaluate_employee/evaluate_emp';
        $this->load->view('admin_index', $data);
    }


    public function updateEvaluation($id,$emp_id) // human_resources/employee_forms/Evaluation_employee/updateEvaluation/
    {



        $data['title']=" تعديل تقييم فتره التجربه";
        $data['records']=$this->Evaluation_employee_model->get_all_setting();
        $data['evaluation']=$this->Evaluation_employee_model->get_one_evaluations($id,$emp_id);


        $data['all_emps'] =$this->Evaluation_employee_model->get_all_emp();

        $data['admin'] = $this->Employee_model->select_by();
        $data['departs'] = $this->Mandate_order_model->select_depart();
       // $data["personal_data"]=$this->Employee_model->get_one_employee($_SESSION['emp_code']);

        if($this->input->post('add'))
        {
            $this->Evaluation_employee_model->update_data($id);
            redirect('human_resources/employee_forms/Evaluation_employee','refresh');
        }


        $data['job_role'] = $this->Difined_model->select_search_key('all_defined_setting', 'defined_type', '4');
        $data['dest'] = $this->Difined_model->select_search_key('hr_forms_settings', '	type', '9');
        $data['subview'] = 'admin/Human_resources/employee_forms/mandate_order/mandate_order';
        $data['subview'] = 'admin/Human_resources/employee_forms/evaluate_employee/evaluate_emp';
        $this->load->view('admin_index', $data);
    }

    public function get_emp_data()
    {
        $id=$this->input->post('valu');
        $data['records']=$this->Evaluation_employee_model->get_by_id($id);
        print_r(json_encode($data['records']));
    }

    public function deleteEvaluation($id,$emp_id)
    {

        $this->Difined_model->delete('hr_evaluation_employees_temporary',array('id'=>$id));
        $this->Difined_model->delete('hr_evaluation_employees_temporary_details',array('emp_id_fk'=>$emp_id));
        $this->message('success','حذف ');
        redirect('human_resources/employee_forms/Evaluation_employee','refresh');
    }


    
    
    
}