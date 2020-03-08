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
        $this->load->model('human_resources_model/employee_forms/all_agazat/all_orders/Job_requests_model');
    }

    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }

//   8-6-om
    public function getConnection_emp()
    {
        $all_Emps = $this->Job_requests_model->get_all_emp();
//        $this->test($all_Emps);
        $arr_emp = array();
        $arr_emp['data'] = array();

        if (!empty($all_Emps)) {
            foreach ($all_Emps as $row_emp) {

                $arr_emp['data'][] = array(
                    '<input type="radio" name="choosed" value="' . $row_emp->id . '"
                       ondblclick="Get_emp_Name(this)" 
                        id="member' . $row_emp->id . '" 
                        data-emp_code="' . $row_emp->emp_code . '" 
                        data-edara_n="' . $row_emp->edara . '"
                        data-edara_id="' . $row_emp->administration . '"
                        data-name="' . $row_emp->employee . '"
                        data-job_title="' . $row_emp->job_title . '" 
                        data-qsm_n="' . $row_emp->qsm . '" 
                        data-qsm_id="' . $row_emp->department . '" 
                        data-adress="' . $row_emp->adress . '" 
                        data-phone="' . $row_emp->phone . '" />',
                    $row_emp->employee,
                    $row_emp->edara,
                    $row_emp->qsm,

                    ''
                );
            }
        }
        echo json_encode($arr_emp);


    }

//   8-6-om
    public function get_date()
    {
        $start_date = $this->input->post('start_date');
        $end_date = $this->input->post('end_date');
        $datetime2 = date_create($end_date);
        $datetime1 = date_create($start_date);
        $interval = date_diff($datetime1, $datetime2);
        $data['day'] = $interval->format('%R%a') + 1;
        $day1 = 1;
        $data['back_date'] = date('Y-m-d', strtotime($end_date . +$day1 . 'days'));

        print_r(json_encode($data));

    }


    public function add_vacation()
    {

        if ($this->input->post('add')) {
            $this->Job_requests_model->insert_vacation();
            redirect('human_resources/employee_forms/all_agazat/all_orders/Vacation/add_vacation', 'refresh');
        }
        $data['emp_data'] = $this->Job_requests_model->select_depart();
//        $this->test($data['emp_data']);

    ///    $data['jobtitles'] = $this->Job_requests_model->select_all_defined(4);
        $data['employies'] = $this->Job_requests_model->get_emp($_SESSION['emp_code']);
        $data['all_emps'] = $this->Job_requests_model->get_emp2();

      ///  $data["personal_data"] = $this->Employee_model->get_one_employee($_SESSION['emp_code']);
      ///  $data['admin'] = $this->Employee_model->select_by();
      ///  $data['departs'] = $this->Employee_model->select_depart();
        $data['items'] = $this->Job_requests_model->get_all_from_vacation();
        $data['vacations'] = $this->Job_requests_model->get_holiday();
           $data['marad_table'] =$this->Job_requests_model->select_marad();
        $data['title'] = "طلب اجازه";
        $data['subview'] = 'admin/Human_resources/employee_forms/all_agazat/all_orders/add_vacation';
        $this->load->view('admin_index', $data);
    }

    public function GetReplacementEmployee($emp_id)
    {
        $all_emp = $this->Job_requests_model->GetReplacementEmployee($emp_id);
        $arr_emp = array();
        $arr_emp['data'] = array();
        if (!empty($all_emp)) {
            foreach ($all_emp as $row_emps) {

                $arr_emp['data'][] = array(
                    '<input type="radio" name="choosed" value="' . $row_emps->id . '"
                         ondblclick="GetMemberName(this)"   id="member' . $row_emps->id . '"
                          data-name="' . $row_emps->employee . '" 
                          data-id="' . $row_emps->id . '"
                          data-code="' . $row_emps->emp_code . '"
                      data-mob="' . $row_emps->phone . '"/>',
                    $row_emps->emp_code,
                    $row_emps->employee,
                    $row_emps->phone,

                    ''
                );
            }
        }
        echo json_encode($arr_emp);


    }

    public function edit_vacation($id)
    {
        if ($this->input->post('add')) {

            $this->Job_requests_model->update_by_id($id);
            redirect('human_resources/employee_forms/all_agazat/all_orders/Vacation/add_vacation', 'refresh');
        }
        $data['title'] = "تعديل طلب اجازه";
        $data['emp_data'] = $this->Job_requests_model->select_depart();
    ///    $data['jobtitles'] = $this->Job_requests_model->select_all_defined(4);
        $data['employies'] = $this->Job_requests_model->get_emp($_SESSION['emp_code']);
        $data['all_emps'] = $this->Job_requests_model->get_emp2();
        $data['vacations'] = $this->Job_requests_model->get_holiday();

  ///      $data["personal_data"] = $this->Employee_model->get_one_employee($_SESSION['emp_code']);
   ///     $data['admin'] = $this->Employee_model->select_by();
   ///     $data['departs'] = $this->Employee_model->select_depart();
        $data['item'] = $this->Job_requests_model->get_vacation_by_id($id);
//        $this->test($data['item']);
        $data['subview'] = 'admin/Human_resources/employee_forms/all_agazat/all_orders/add_vacation';
        $this->load->view('admin_index', $data);
    }


    public function delete_vacation($id)
    {
        $this->Job_requests_model->delete_from_table($id, 'hr_all_agzat_orders');
        redirect('human_resources/employee_forms/all_agazat/all_orders/Vacation/add_vacation', 'refresh');

    }

   
    // yara
    public function insert_marad_ajax(){
        $this->Job_requests_model->insert_marad();
        $data['table'] =$this->Job_requests_model->select_marad();
        $this->load->view('admin/Human_resources/employee_forms/all_agazat/all_orders/marad_load_page',$data);
    }
    public function getById(){
        $id= $this->input->post('id');
        $geha =$this->Job_requests_model->get_marad_by_id($id);
        echo json_encode($geha);
    }
    public function update_marad(){
        $id= $this->input->post('id');
        $this->Job_requests_model->update_marad($id);
        $data['table'] =$this->Job_requests_model->select_marad();

        $this->load->view('admin/Human_resources/employee_forms/all_agazat/all_orders/marad_load_page',$data);

    }
    public function delete_marad(){
        $id = $this->input->post('id');
        $this->Job_requests_model->delete_marad($id);
        $data['table'] =$this->Job_requests_model->select_marad();
        $this->load->view('admin/Human_resources/employee_forms/all_agazat/all_orders/marad_load_page',$data);

    }


    public function get_avalibal_days()
    {
        $emp_code = $this->input->post('emp_id');
        $vac_id = $this->input->post('vac_id');
        if ($vac_id == 2) {
            $result = $this->Job_requests_model->get_days_vacation_year($emp_code, $vac_id);
        } elseif ($vac_id == 1) {
            $result = $this->Job_requests_model->get_days_vacation_cousal_by_vid($emp_code, $vac_id);

        } else {
            $result = $this->Job_requests_model->get_days_vacation_by_vid($emp_code, $vac_id);
        }
        echo json_encode($result);
    }


}

?>
	
	
	
	
