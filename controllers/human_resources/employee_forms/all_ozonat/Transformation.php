<?php

class Transformation extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }
        $this->load->helper(array('url', 'text', 'permission', 'form'));
        $this->load->model('Difined_model');

        $this->load->model('human_resources_model/employee_forms/all_ozonat/Transformation_model');

        $this->load->model('system_management/Groups');
        $this->main_groups = $this->Groups->main_fetch_group();
        $this->groups = $this->Groups->get_group($_SESSION["group_number"]);
        $this->groups_title = $this->Groups->get_group_title($_SESSION["group_number"]);

        /**********************************************************/
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in = $this->Counting->get_basic_in_num();
        $this->files_basic_in = $this->Counting->get_files_basic_in();
        /*************************************************************/
        $this->load->model('human_resources_model/Always_model');
    }

    public function index()//human_resources/employee_forms/all_ozonat/Transformation
    {
        $data['title'] = "تحويلات الأذونات";
        $data['valu'] = 1;
        $arr = array('current_from_id' => $_SESSION['user_id']);
        $data['records'] = $this->Transformation_model->my_orders('hr_all_ozonat_orders', $arr);
        $data['subview'] = 'admin/Human_resources/employee_forms/all_ozonat/all_ozonat_transformation/transformation_view';
        $this->load->view('admin_index', $data);
    }

    public function get_orders()
    {

        $valu = $this->input->post('valu');
        //$this->test($valu);
        if ($valu == 1) {
            $arr = array('emp_user_id' => $_SESSION['user_id']);
        }
        if ($valu == 3) {
            $arr = array('current_to_id' => $_SESSION['user_id']);
        }
        if ($valu == 2) {
            $arr = array('emp_user_id' => $_SESSION['user_id']);
        }
        $data['valu'] = $valu;
        $data['records'] = $this->Transformation_model->my_orders('hr_all_ozonat_orders', $arr);
//         $this->test($data['records']);
        $this->load->view('admin/Human_resources/employee_forms/all_ozonat/all_ozonat_transformation/load_page', $data);

    }

    public function changer_level()
    {
        //$this->test($_POST);
        $valu = $this->input->post('valu');
        $this->Transformation_model->change_approved($valu);
        $this->Transformation_model->insert_transformation_level2($valu);
    }

    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }

    public function get_modal()
    {
        $level = $this->input->post('level');
        $data['level'] = $level;
        $data['mess'] = $this->Transformation_model->get_from_setting($level);
        $id = $this->input->post('val_id');
        // $data['employee']=$this->Transformation_model->get_all_employees('employees');
        // $data['admin']=$this->Transformation_model->select_by();
        $data['row'] = $this->Transformation_model->get_by_id('hr_all_ozonat_orders', $id);
//        $this->test( $data["row"]);
        if (!empty($data['row'])) {
            $emp_where = array(1 => 402, 2 => 401, 3 => 101);
            if (key_exists($data['row']->level, $emp_where)) {
                $data["employee"] = $this->Transformation_model->get_employees_by_level(array('job_title_code_fk' => $emp_where[$data['row']->level]));

            }


        }
        $this->load->view('admin/Human_resources/employee_forms/all_ozonat/all_ozonat_transformation/level_page', $data);


    }

//     public function Get_transformation_form(){
//         $this->load->model('human_resources_model/employee_forms/solaf/Solaf_requests_model');

//    $data_load["solaf_data"]=$this->Hr_solaf_transformation_setting_model->get_solaf_data(array('t_rkm'=>$this->input->post('t_rkm')));
//         if(!empty( $data_load["solaf_data"])){
//         $emp_where=array(1=>402,2=>401,3=>502,4=>501,5=>101);
//         if(key_exists($data_load["solaf_data"]->level, $emp_where)){
//         $data_load["employees_data"]=$this->Hr_solaf_transformation_setting_model->get_employees_by_level(array('job_title_code_fk'=>$emp_where[$data_load["solaf_data"]->level]));
// }
//     $data_load['emp_data']=$this->Solaf_requests_model->get_emp_data($data_load["solaf_data"]->emp_id_fk);

// }
// // $this->test($data_load);

//       $this->load->view('admin/Human_resources/employee_forms/solaf/all_transformations/transformation_form_load_page',$data_load);

// }

    public function make_suspend_accept()
    {
// echo "<pre>";
// print_r($_POST);die;
        $this->Transformation_model->change_suspend();
        $this->Transformation_model->insert_transformation();
    }

    public function make_suspend_refused()
    {
        // echo "<pre>";
        // print_r($_POST);die;
        $this->Transformation_model->change_suspend();
        $this->Transformation_model->insert_transformation();
    }

    public function get_employee()
    {
        $valu = $this->input->post('valu');
        $data['emps'] = $this->Transformation_model->get_emps_by_edara('employees', $valu);
        $this->load->view('admin/Human_resources/employee_forms/all_ozonat/all_ozonat_transformation/get_emps', $data);
    }

    public function get_modal_details()
    {
        $id = $this->input->post('valu');
        $data['row'] = $this->Transformation_model->get_by_id('hr_all_ozonat_orders', $id);
        $this->load->view('admin/Human_resources/employee_forms/all_ozonat/all_ozonat_transformation/get_ezn_details', $data);
    }

    public function get_ezn_follow()
    {
        $ezn_rkm = $this->input->post('valu');
        $id = $this->input->post('id');
        $arr = array('ezn_rkm_fk' => $ezn_rkm);
        $data['row'] = $this->Transformation_model->get_by_id('hr_all_ozonat_orders', $id);
        $data['records'] = $this->Transformation_model->my_orders_history('hr_all_ozonat_history', $arr);
        $this->load->view('admin/Human_resources/employee_forms/all_ozonat/all_ozonat_transformation/get_ezn_follows', $data);
    }

//yara
    public function get_emp_data()
    {
        $valu = $this->input->post('valu');
        $id = $this->input->post('emp_id');
        if ($this->input->post('valu')) {
            if ($valu == 2) {
                $data['row'] = $this->Transformation_model->get_direct_manager_data($id);
            } else {
                $data['row'] = $this->Transformation_model->get_emp_data($id);
            }
        }else{
            $data['row'] = $this->Transformation_model->get_direct_manager_data($id);
        }
        //  $this->test( $data['row']);
        $this->load->view('admin/Human_resources/employee_forms/all_ozonat/all_ozonat_transformation/person_profile', $data);

    }

    //yara
    public function get_modal_details_steps()  //human_resources/employee_forms/all_ozonat/Transformation
    {
        $id = $this->input->post('valu');
        $data['row'] = $this->Transformation_model->get_by_id('hr_all_ozonat_orders', $id);
        $data['records'] = $this->Transformation_model->get_array_by_id('hr_all_ozonat_history', $id);

        $this->load->view('admin/Human_resources/employee_forms/all_ozonat/all_ozonat_transformation/get_ezn_details_steps', $data);
    }
}
