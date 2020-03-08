<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Vacation extends MY_Controller
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


   /* 
     public function add_vacation()
    {

        if($this->input->post('add'))
            {
                $this->Job_requests_model->insert_vacation();
                redirect('human_resources/employee_forms/Vacation/add_vacation','refresh');
               }
        $data['emp_data'] = $this->Job_requests_model->select_depart();
        $data['jobtitles'] = $this->Job_requests_model->select_all_defined(4);
        $data['employies'] = $this->Job_requests_model->get_emp($_SESSION['emp_code']);
        $data['all_emps'] = $this->Job_requests_model->get_emp(0);

        $data["personal_data"]=$this->Employee_model->get_one_employee($_SESSION['emp_code']);
        $data['admin'] = $this->Employee_model->select_by();
        $data['departs'] = $this->Employee_model->select_depart();
        $data['items'] = $this->Job_requests_model->get_all_from_vacation();
        $data['vacations'] = $this->Job_requests_model->get_holiday();



        $data['title']="طلب اجازه";
        $data['subview'] = 'admin/Human_resources/employee_forms/add_vacation';
        $this->load->view('admin_index', $data);
    }*/
	

    public function get_date()
    {
        $start_date=$this->input->post('start_date');
        $end_date=$this->input->post('end_date');
        $datetime2 = date_create($end_date);
        $datetime1 = date_create($start_date);
        $interval = date_diff($datetime1, $datetime2);
        $data['day']= $interval->format('%R%a')+1;
        $day1=1;
       $data['back_date']=date('Y-m-d', strtotime($end_date.  + $day1. 'days'));

        print_r(json_encode($data)) ;

    }


    public function get_emp_data()
    {
        $data["personal_data"]=$this->Employee_model->get_one_employee($this->input->post('valu'));
        print_r( json_encode($data["personal_data"][0]));


    }
    public function get_load_page()
    {
        $data_load["personal_data"]=$this->Employee_model->get_one_employee($this->input->post('valu'));
      $this->load->view('admin/Human_resources/sidebar_person_data_vacation',$data_load);
    }
    /******************************************************************/
    /*
   public function edit_vacation($id)
    {

            if($this->input->post('add'))
            {
                $this->Job_requests_model->update_by_id($id);
                redirect('human_resources/employee_forms/Vacation/add_vacation','refresh');
            }
        $data['title']="تعديل طلب اجازه";
        $data['emp_data'] = $this->Job_requests_model->select_depart();
        $data['jobtitles'] = $this->Job_requests_model->select_all_defined(4);
        $data['employies'] = $this->Job_requests_model->get_emp($_SESSION['emp_code']);
        $data['all_emps'] = $this->Job_requests_model->get_emp(0);
        $data['vacations'] = $this->Job_requests_model->get_holiday();

        $data["personal_data"]=$this->Employee_model->get_one_employee($_SESSION['emp_code']);
        $data['admin'] = $this->Employee_model->select_by();
        $data['departs'] = $this->Employee_model->select_depart();
        $data['item'] = $this->Job_requests_model-> get_vacation_by_id($id);
        $data['subview'] = 'admin/Human_resources/employee_forms/add_vacation';
        $this->load->view('admin_index', $data);
    }
	
	*/
    
    
public function add_vacation()
    {

        if($this->input->post('add'))
            {
                $this->Job_requests_model->insert_vacation();
                redirect('human_resources/employee_forms/Vacation/add_vacation','refresh');
               }
        $data['emp_data'] = $this->Job_requests_model->select_depart();
        $data['jobtitles'] = $this->Job_requests_model->select_all_defined(4);
        $data['employies'] = $this->Job_requests_model->get_emp($_SESSION['emp_code']);
        $data['all_emps'] = $this->Job_requests_model->get_emp2();

        $data["personal_data"]=$this->Employee_model->get_one_employee($_SESSION['emp_code']);
        $data['admin'] = $this->Employee_model->select_by();
        $data['departs'] = $this->Employee_model->select_depart();
        $data['items'] = $this->Job_requests_model->get_all_from_vacation();
        $data['vacations'] = $this->Job_requests_model->get_holiday();
        $data['title']="طلب اجازه";
        $data['subview'] = 'admin/Human_resources/employee_forms/add_vacation';
        $this->load->view('admin_index', $data);
    }


public function edit_vacation($id)
    {
            if($this->input->post('add'))
            {

                $this->Job_requests_model->update_by_id($id);
                redirect('human_resources/employee_forms/Vacation/add_vacation','refresh');
            }
        $data['title']="تعديل طلب اجازه";
        $data['emp_data'] = $this->Job_requests_model->select_depart();
        $data['jobtitles'] = $this->Job_requests_model->select_all_defined(4);
        $data['employies'] = $this->Job_requests_model->get_emp($_SESSION['emp_code']);
        $data['all_emps'] = $this->Job_requests_model->get_emp2();
        $data['vacations'] = $this->Job_requests_model->get_holiday();

        $data["personal_data"]=$this->Employee_model->get_one_employee($_SESSION['emp_code']);
        $data['admin'] = $this->Employee_model->select_by();
        $data['departs'] = $this->Employee_model->select_depart();
        $data['item'] = $this->Job_requests_model->get_vacation_by_id($id);
        $data['subview'] = 'admin/Human_resources/employee_forms/add_vacation';
        $this->load->view('admin_index', $data);
    }

    
    public function delete_vacation($id)
    {
        $this->Job_requests_model->delete_from_table($id,'hr_vacation_orders');
        redirect('human_resources/employee_forms/Vacation/add_vacation','refresh');

    }

    public function get_employee_vacation()
    {
        $data_load["employee"]=$this->Employee_model->get_all_employee($this->input->post('valu'));
        $this->load->view('admin/Human_resources/employee_forms/load_page',$data_load);
    }  
    
    
    
    
    
    
/*********************************************************************/    

public function start_work()
{
    $data['items'] = $this->Job_requests_model->get_all_vacation();
    $data['title']='اشعار مباشره عمل';
    $data['subview'] = 'admin/Human_resources/employee_forms/start_work';
    $this->load->view('admin_index', $data);
}
    public function get_num_days()
    {
        $id=$this->input->post('id');
       $valu=$this->input->post('valu');
        $item= $this->Job_requests_model->get_for_print($id)[0];
    
        $datetime2 = date_create($item->vacation_to_date);
        $datetime1 = date_create($valu);
        $interval = date_diff($datetime2, $datetime1);
        $day= $interval->format('%R%a')+1-2;
        echo $day;
        




    }
  
    
    
public function edit_start_work()
{
    $id=$this->input->post('id');
    $reason=$this->input->post('reason');
    $num_day=$this->input->post('num_day');

   $this->Job_requests_model->update_start($id,$reason,$num_day);
}





}
    ?>
	
	
	
	
