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

    //
    public function get_num_solf()
    {
        $emp_id = $this->input->post('emp_id');
        $solf = $this->Solaf_requests_model->get_num_solf($emp_id);
        $data['num_solf'] = sizeof($solf);
        if (!empty($solf)) {
            $data['last_date'] = $solf[0]->t_rkm_date_m;
        } else {
            $data['last_date'] = date('Y-m-d');
        }

        echo json_encode($data);
    }

    public function get_had_solfa()
    {
        $emp_id = $this->input->post('emp_id');
        $had_solfa = $this->Solaf_requests_model->get_had_solfa($emp_id);
        echo json_encode($had_solfa);
    }

    public function make_transformation_direct()
    {
        $solf_id = $this->input->post('solf_id');
        $transform_solf = $this->Solaf_requests_model->make_transformation_direct($solf_id);
        echo json_encode($transform_solf);
    }

    public function getConnection_emp()
    {
        $all_Emps = $this->Solaf_requests_model->get_all_emp();
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
            $this->messages('success', 'تم الحفظ بنجاح');

            if ($this->input->post('from_profile')) {
                redirect('maham_mowazf/person_profile/Personal_profile', 'refresh');
            } else {
                redirect('human_resources/employee_forms/solaf/Solaf/add_solaf', 'refresh');
            }
        }
//yara
        $data['had_quest'] = $this->Solaf_requests_model->get_had_aqsa_qst();
//$data['suspend']=$this->Solaf_requests_model->get_solf_suspend();
//
        $data['emp_data'] = $this->Solaf_requests_model->select_depart();

        $data['last_rkm'] = $this->Solaf_requests_model->get_last_rkm();
        $data['jobtitles'] = $this->Solaf_requests_model->select_all_defined(4);
        $data['employies'] = $this->Solaf_requests_model->get_emp($_SESSION['emp_code']);
        $data['all_emps'] = $this->Solaf_requests_model->get_emp2();

        $data["personal_data"] = $this->Employee_model->get_one_employee($_SESSION['emp_code']);
        $data['admin'] = $this->Employee_model->select_by();
        $data['departs'] = $this->Employee_model->select_depart();
        $data['items'] = $this->Solaf_requests_model->get_all_solfa();
        //  $this->test($data['items']);

        $data['title'] = "طلب سلفه";

        if ($this->input->post('from_profile')) {
            $this->load->view('admin/Human_resources/employee_forms/solaf/add_solaf', $data);
        } else {
            $data['subview'] = 'admin/Human_resources/employee_forms/solaf/add_solaf';
            $this->load->view('admin_index', $data);
        }
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

    public function edit_solaf($id = false)
    {
        if ($this->input->post('add')) {

            $this->Solaf_requests_model->update_by_id($id);
            $this->messages('success', 'تم التعديل بنجاح');
            if ($this->input->post('from_profile')) {
                redirect('maham_mowazf/person_profile/Personal_profile', 'refresh');
            } else {
                redirect('human_resources/employee_forms/solaf/Solaf/add_solaf', 'refresh');
            }

        }
        if ($this->input->post('id')) {
            $id = $this->input->post('id');
        }
        //yara
        $data['had_quest'] = $this->Solaf_requests_model->get_had_aqsa_qst();
//$data['suspend']=$this->Solaf_requests_model->get_solf_suspend();
//
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
        if ($this->input->post('from_profile')) {
            $this->load->view('admin/Human_resources/employee_forms/solaf/add_solaf', $data);
        } else {
            $data['subview'] = 'admin/Human_resources/employee_forms/solaf/add_solaf';
            $this->load->view('admin_index', $data);
        }
    }


    public function delete_solfa($id, $from = false)
    {
        $this->Solaf_requests_model->delete_from_table($id, 'hr_solaf');
        $this->Solaf_requests_model->delete_from_table_solaf($id, 'hr_solaf_quest');
        $this->messages('success', 'تم الحذف بنجاح');

        if (!empty($from) && ($from == 1)) {
            redirect('maham_mowazf/person_profile/Personal_profile', 'refresh');
        } else {
            redirect('human_resources/employee_forms/solaf/Solaf/add_solaf', 'refresh');
        }

    }

//new
    public function get_solaf_details()
    {
        $rkm = $this->input->post('rkm');
        $data['rows'] = $this->Solaf_requests_model->get_by_t_rkm($rkm);


        $emp_id = $data['rows'][0]->emp_id_fk;
        //$this->test( $emp_id);
        $data["personal_data"] = $this->Employee_model->get_one_employee($emp_id);
        //  $this->test($data['personal_data']);
        $this->load->view('admin/Human_resources/employee_forms/solaf/detail_page', $data);
    }


    public function get_solfa_print()
    {

        $rkm = $this->input->post('rkm');
        $data['rows'] = $this->Solaf_requests_model->get_by_t_rkm($rkm);
        $data['emp_data'] = $this->Solaf_requests_model->get_emp_data($data['rows'][0]->emp_id_fk);
        $data['UserName'] = $this->Solaf_requests_model->getUserName($_SESSION['user_id']);

        //    $this->test($data);

        $this->load->view('admin/Human_resources/employee_forms/solaf/print_page', $data);
    }


    //yara
    public function get_details()
    {
        $this->load->model('human_resources_model/employee_forms/solaf/Solaf_setting_model');
        $data['badlat'] = $this->Solaf_setting_model->get_by('emp_badlat_discount_settings', array('type' => 1), false, 'id');
        // $this->test($data['badlat']);
        $data['solaf_main_setting'] = $this->Solaf_setting_model->get_by('hr_solaf_main_setting', '', 1);
        $this->load->view('admin/Human_resources/employee_forms/solaf/dawabt_details', $data);

    }

    public function get_details_dbt()
    {
        $this->load->model('human_resources_model/employee_forms/solaf/Solaf_setting_model');
        $data['solaf_dawabt'] = $this->Solaf_setting_model->get_by('hr_solaf_dawabt', array('type' => 1));
        $this->load->view('admin/Human_resources/employee_forms/solaf/dbt_details', $data);

    }

    public function get_details_doc()
    {
        $this->load->model('human_resources_model/employee_forms/solaf/Solaf_setting_model');
        $data['solaf_dawabt'] = $this->Solaf_setting_model->get_by('hr_solaf_dawabt', array('type' => 3));
        //   $this->test($data['solaf_dawabt']);
        $this->load->view('admin/Human_resources/employee_forms/solaf/dbt_details', $data);

    }

    public function get_details_exp()
    {
        $this->load->model('human_resources_model/employee_forms/solaf/Solaf_setting_model');
        $data['solaf_dawabt'] = $this->Solaf_setting_model->get_by('hr_solaf_dawabt', array('type' => 2));
        //   $this->test($data['solaf_dawabt']);
        $this->load->view('admin/Human_resources/employee_forms/solaf/dbt_details', $data);

    }
//$data['suspend']=$this->Solaf_requests_model->get_solf_suspend();

//yara
    public function get_suspend_solf()
    {
        $emp_id = $this->input->post('emp_id');
        $suspend = $this->Solaf_requests_model->get_solf_suspend($emp_id);
        echo json_encode($suspend);
    }


    public function request_solaf()
    { //human_resources/employee_forms/solaf/Solaf/request_solaf
        if (($_SESSION['role_id_fk'] == 1) || (($_SESSION['role_id_fk'] == 3))) {
            // $data['items'] = $this->Ezn_order_model->display_data();
            $data['items'] = $this->Solaf_requests_model->get_all_solfa();
            // $this->test($data);
        }
        $data['title'] = "طلبات السلف المقدمة";
        $data['subview'] = 'admin/Human_resources/employee_forms/solaf/solaf_order_view';
        $this->load->view('admin_index', $data);
    }



    public function check_solaf_notifications()
    {
        $result = $this->Solaf_requests_model->check_solaf_notifications(array('current_to_user_id' => $_SESSION['user_id']));
        echo json_encode($result);
    }

    public function update_solaf_notification()
    {
//        $ezn_rkm = $this->input->post('ezn_rkm');
        $result = $this->Solaf_requests_model->update_solaf_notification();


    }



}

?>
