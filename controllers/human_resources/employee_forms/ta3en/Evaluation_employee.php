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

//$this->test($data['evaluation']);
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
    /////////////////////add_employee////////////////////
    private function current_hjri_year()
    {
         $time = mktime(0, 0, 0, Date('m'), Date('j'), Date('Y'));
 $TDays=round($time/(60*60*24));
 $HYear=round($TDays/354.37419);
 $Remain=$TDays-($HYear*354.37419);
 $HMonths=round($Remain/29.531182);
 $HDays=$Remain-($HMonths*29.531182);
 $HYear=$HYear+1389;
 $HMonths=$HMonths+10;$HDays=$HDays+23;
 if ($HDays>29.531188 and round($HDays)!=30){
   $HMonths=$HMonths+1;$HDays=Round($HDays-29.531182);
 }else{
   $HDays=Round($HDays);
 }
 if ($HMonths>12) {
   $HMonths=$HMonths-12;
   $HYear = $HYear+1;
 }
 $NowDay=$HDays;
 $NowMonth=$HMonths;
 $NowYear=$HYear;
 $MDay_Num = date("w");
 if ($MDay_Num=="0"){
   $MDay_Name = "الأحد";
 }elseif ($MDay_Num=="1"){
   $MDay_Name = "الإثنين";
 }elseif ($MDay_Num=="2"){
   $MDay_Name = "الثلاثاء";
 }elseif ($MDay_Num=="3"){
   $MDay_Name = "الأربعاء";
 }elseif ($MDay_Num=="4"){
   $MDay_Name = "الخميس";
 }elseif ($MDay_Num=="5"){
   $MDay_Name = "الجمعة";
 }elseif ($MDay_Num=="6"){
   $MDay_Name = "السبت";
 }
 $NowDayName = $MDay_Name;
 $NowDate = $MDay_Name."، ".$HDays."/".$HMonths."/".$HYear." هـ";
/*
$NowDate; لطباعة التاريخ الهجري كامل لهذا اليوم مثلاً (الخميس 1/3/1430 هـ).
$MDay_Name; طباعة اليوم فقط مثلاً (الخميس).
$HDays; تاريخ اليوم (1).
$HMonths; الشهر (3).
$HYear; السنة الهجرية (1430).
*/
return $HYear;
    }
    public function add_emp_from_t3een($id)
    {
        $this->load->model('administrative_affairs_models/Prog_main_sitting_mo');
       $this->load->model('human_resources_model/employee_setting/Employee_setting');  //Osama
        $this->load->model('administrative_affairs_models/administrative_affairs_setting');
        $data['affairs_settings_options'] = $this->administrative_affairs_setting->select_all('administrative_affairs_settings', '', '', '', '');
        //$data['all_emps'] = $this->Difined_model->select_all('employees', '', '', 'id', 'ASC');
       //add
       ///yara
       $this->load->model('human_resources_model/employee_forms/ta3en/Temporary_employment_qrars_model');
       $data['all'] = $this->Temporary_employment_qrars_model->all_after_interview($id);
      //$this->test(  $data['all']);
       $data['all_emps'] = $this->Employee_model->select_allEmployee();
       $data['customer_js'] = $this->load->view('admin/Human_resources/add_employee/app_js', '', TRUE);

       ////yara
        //$data["personal_data"]=$this->Employee_model->get_one_employee($code);
        $data["last_emp_code"] = $this->Employee_model->select_last_code_2();
        $data['cities']= $this->Employee_setting->select_areas();//Osama
        $data['ahais']= $this->Employee_setting->select_residentials();
        $data['nationality'] =$this->Difined_model->select_search_key('employees_settings', 'type', '2');
        $data['deyana'] =$this->Difined_model->select_search_key('employees_settings', 'type', '3');
        $data['type_card'] =$this->Difined_model->select_search_key('employees_settings', 'type', '5');
        $data['dest_card'] =$this->Difined_model->select_search_key('employees_settings', 'type', '6');
        $data['company'] =$this->Difined_model->select_search_key('employees_settings', 'type', '7');
        $data['cat_tamin'] =$this->Difined_model->select_search_key('employees_settings', 'type', '8');
        $data['social_status'] =$this->Difined_model->select_search_key('employees_settings', 'type', '4');
        $data['gender_data'] =$this->Difined_model->select_search_key('employees_settings', 'type', '1');
        $data['degree_qual'] =$this->Difined_model->select_search_key('employees_settings', 'type', '14');
        $data['qualification'] =$this->Difined_model->select_search_key('employees_settings', 'type', '15');
        $data['job_role'] = $this->Difined_model->select_search_key('all_defined_setting', 'defined_type', '4');
        $data['admin'] = $this->Employee_model->select_by();
        $data['departs'] = $this->Employee_model->select_depart();
        $data['department_branch'] = $this->Employee_model->select_branch_department();
        $data['records'] = $this->Employee_model->select_allEmployee();
        $data['banks'] = $this->Difined_model->select_all('banks_settings','','',"","");
        $data['contracts'] = $this->Prog_main_sitting_mo->select_sittings(5);
        $data["current_hijry_year"] = $this->current_hjri_year();
        
   
        
        
        $data['title'] = 'إضافة موظف';
        if ($this->input->post('admin_num')) {
            $data['id'] = $this->input->post('admin_num');
            $this->load->view('admin/Human_resources/add_employee/get_depart', $data);
        }elseif ($this->input->post('bank_num')) {
            $data['id'] = $this->input->post('admin_num');
            $this->load->view('admin/administrative_affairs/employee/new_employee/get_bank', $data);
        } else {
            $data['subview'] = 'admin/Human_resources/add_employee/add_employee';
            $this->load->view('admin_index', $data);
        }
    }

}