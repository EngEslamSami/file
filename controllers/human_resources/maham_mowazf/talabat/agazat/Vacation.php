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
        $this->load->helper(array('url', 'text', 'permission', 'form'));
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in = $this->Counting->get_basic_in_num();
        $this->files_basic_in = $this->Counting->get_files_basic_in();

        $this->load->model('maham_mowazf_model/talabat_model/agazat_model/Agazat_model');
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
        $all_Emps = $this->Agazat_model->get_all_emp();
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


    public function add_vacation()
    {//maham_mowazf/talabat/agazat/Vacation/add_vacation

        if ($this->input->post('add')) {
            $this->Agazat_model->insert_vacation();

            redirect('maham_mowazf/person_profile/Personal_profile?my_tab=agaza_order', 'refresh');
        }
        $data['emp_data'] = $this->Agazat_model->select_depart();
//        $this->test($data['emp_data']);

        $data['items'] = $this->Agazat_model->get_all_from_vacation();
        $data['vacations'] = $this->Agazat_model->get_holiday();
        $data['title'] = "طلب اجازه";

        if ($this->input->post('from_profile')) {
            $this->load->view('admin/maham_mowazf_view/talabat_view/agazat_view/add_vacation', $data);
        } else {
            $data['side_data'] = "طلب اجازه";

            $data['subview'] = 'admin/maham_mowazf_view/talabat_view/agazat_view/add_vacation';
            $this->load->view('admin_index', $data);
        }
    }

    public function GetReplacementEmployee($emp_id)
    {
        $all_emp = $this->Agazat_model->GetReplacementEmployee($emp_id);
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

    public function edit_vacation($id = false)
    {
        if ($this->input->post('add')) {

            $this->Agazat_model->update_by_id($id);
            redirect('maham_mowazf/person_profile/Personal_profile?my_tab=agaza_order', 'refresh');
        }
        $data['vacations'] = $this->Agazat_model->get_holiday();
        if ($this->input->post('id')) {
            $id = $this->input->post('id');
            $data['title'] = "تعديل طلب اجازه";
            $data['emp_data'] = $this->Agazat_model->select_depart($id);
            $data['item'] = $this->Agazat_model->get_vacation_by_id($id);

            $this->load->view('admin/maham_mowazf_view/talabat_view/agazat_view/add_vacation', $data);
        } else {
            $data['item'] = $this->Agazat_model->get_vacation_by_id($id);
            $data['emp_data'] = $this->Agazat_model->select_depart($id);
            $data['title'] = "تعديل طلب اجازه";

            $data['subview'] = 'admin/maham_mowazf_view/talabat_view/agazat_view/add_vacation';
            $this->load->view('admin_index', $data);
        }

    }


    public function delete_vacation($id)
    {
        $this->Agazat_model->delete_from_table($id, 'hr_all_agzat_orders');
        redirect('maham_mowazf/person_profile/Personal_profile?my_tab=agaza_order', 'refresh');

    }


    public function get_avalibal_days()
    {
        $emp_code = $this->input->post('emp_id');
        $vac_id = $this->input->post('vac_id');
        if ($vac_id == 2) {
            $result = $this->Agazat_model->get_days_vacation_year($emp_code, $vac_id);
        } elseif ($vac_id == 1) {
            $result = $this->Agazat_model->get_days_vacation_cousal_by_vid($emp_code, $vac_id);

        } else {
            $result = $this->Agazat_model->get_days_vacation_by_vid($emp_code, $vac_id);
        }
        echo json_encode($result);
    }


    public function get_details_agaza()
    {
        $vac_id = $this->input->post('id');
        $data['item'] = $this->Agazat_model->get_all_from_vacation($vac_id)[0];

        $this->load->view('admin/maham_mowazf_view/talabat_view/agazat_view/load_details_agaza_view', $data);
    }
}

?>
	
	
	
	
