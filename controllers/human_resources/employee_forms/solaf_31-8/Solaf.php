<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Solaf extends MY_Controller
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
       
    
        $this->load->model('human_resources_model/employee_forms/solaf/Solaf_requests_model');
      
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


    public function getConnection_emp()
    {
        $all_Emps = $this->Solaf_requests_model->get_all_emp();
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
                       />',
                    $row_emp->employee,
                    $row_emp->edara,
                    $row_emp->qsm,

                    ''
                );
            }
        }
        echo json_encode($arr_emp);


    }


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


    public function add_solaf()//human_resources/employee_forms/solaf/Solaf/add_solaf
    {

        if ($this->input->post('add')) {
            $this->Solaf_requests_model->insert_solfa();
          
            
            redirect('human_resources/employee_forms/solaf/Solaf/add_solaf', 'refresh');
            $this->messages('success', 'تم الحفظ بنجاح');
        }
        
        $data['emp_data'] = $this->Solaf_requests_model->select_depart();
    
$data['last_rkm']=$this->Solaf_requests_model->get_last_rkm();
        $data['jobtitles'] = $this->Solaf_requests_model->select_all_defined(4);
        $data['employies'] = $this->Solaf_requests_model->get_emp($_SESSION['emp_code']);
        $data['all_emps'] = $this->Solaf_requests_model->get_emp2();

        $data["personal_data"] = $this->Employee_model->get_one_employee($_SESSION['emp_code']);
        $data['admin'] = $this->Employee_model->select_by();
        $data['departs'] = $this->Employee_model->select_depart();
        $data['items'] = $this->Solaf_requests_model->get_all_solfa();
   //  $this->test($data['items']);
       
        $data['title'] = "طلب سلفه";
        $data['subview'] = 'admin/Human_resources/employee_forms/solaf/add_solaf';
        $this->load->view('admin_index', $data);
    }

    public function GetReplacementEmployee($emp_id)
    {
        $all_emp = $this->Solaf_requests_model->GetReplacementEmployee($emp_id);
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
       public function edit_solaf($id)
    {
        if ($this->input->post('add')) {

            $this->Solaf_requests_model->update_by_id($id);

            redirect('human_resources/employee_forms/solaf/Solaf/add_solaf', 'refresh');
            $this->messages('success', 'تم التعديل بنجاح');

        }
        $data['title'] = "تعديل طلب اجازه";
        $data['emp_data'] = $this->Solaf_requests_model->select_depart();
     //   $this->test($data['emp_data']);
        $data['jobtitles'] = $this->Solaf_requests_model->select_all_defined(4);
        $data['employies'] = $this->Solaf_requests_model->get_emp($_SESSION['emp_code']);
        $data['all_emps'] = $this->Solaf_requests_model->get_emp2();
       

        $data["personal_data"] = $this->Employee_model->get_one_employee($_SESSION['emp_code']);
        $data['admin'] = $this->Employee_model->select_by();
        $data['departs'] = $this->Employee_model->select_depart();
        $data['item'] = $this->Solaf_requests_model->get_solfa_by_id($id);
//        $this->test($data['item']);
$data['subview'] = 'admin/Human_resources/employee_forms/solaf/add_solaf';
        $this->load->view('admin_index', $data);
    } 
    

  public function delete_solfa($id)
    {
        $this->Solaf_requests_model->delete_from_table($id,'hr_solaf');
        redirect('human_resources/employee_forms/solaf/Solaf/add_solaf', 'refresh');
        $this->messages('success', 'تم الحذف بنجاح');

    }




public function get_solaf_details()
{
    $rkm=$this->input->post('rkm');
    $data['rows']=$this->Solaf_requests_model->get_by_t_rkm($rkm);

   // $this->test($data['rows']);
    $this->load->view('admin/Human_resources/employee_forms/solaf/detail_page', $data);
}

   
  public function get_solfa_print()
{

      $rkm=$this->input->post('rkm');
      $data['rows']=$this->Solaf_requests_model->get_by_t_rkm($rkm);
     $this->load->view('admin/Human_resources/employee_forms/solaf/print_page', $data);
}

   


}

?>
	
	
	
	
