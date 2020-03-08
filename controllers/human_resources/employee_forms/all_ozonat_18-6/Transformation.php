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

        $data['title']="تحويلات النماذج";
        $data['valu']=1;
        $arr = array('current_from_id' => $_SESSION['user_id']);
        $data['records']=$this->Transformation_model->my_orders('hr_all_ozonat_orders',$arr);
        $data['subview'] = 'admin/Human_resources/employee_forms/all_ozonat/all_ozonat_transformation/transformation_view';
        $this->load->view('admin_index', $data);
    }
    public function get_orders()
    {
        $valu=$this->input->post('valu');
if($valu==1) {
    $arr = array('current_from_id' => $_SESSION['user_id']);
}if($valu==3) {
        $arr = array('current_to_id' => $_SESSION['user_id']);

    }
        if($valu==2)
        {
            $arr = array('emp_user_id' => $_SESSION['user_id']);
        }
        $data['valu']=$valu;
        $data['records']=$this->Transformation_model->my_orders('hr_all_ozonat_orders',$arr);
       // print_r($data['records']);
        $this->load->view('admin/Human_resources/employee_forms/all_ozonat/all_ozonat_transformation/load_page', $data);

    }

    public function changer_level()
    {
        $valu=$this->input->post('valu');



        $this->Transformation_model->change_approved($valu);
        $this->Transformation_model->insert_transformation_level2($valu);
    }

    public function get_modal()
    {
        $level=$this->input->post('level');
        $data['level']=$level;
        $data['mess']=$this->Transformation_model->get_from_setting($level);
        $id=$this->input->post('val_id');
        $data['employee']=$this->Transformation_model->get_all_employees('employees');
        $data['admin']=$this->Transformation_model->select_by();
        $data['row']=$this->Transformation_model->get_by_id('hr_all_ozonat_orders',$id);
        $this->load->view('admin/Human_resources/employee_forms/all_ozonat/all_ozonat_transformation/level_page',$data);
//      if($level==1) {
//       $this->load->view('admin/person_profile/all_ozonat/modal_level2',$data);
//       }
//        if($level==2) {
//            $this->load->view('admin/person_profile/all_ozonat/modal_level3',$data);
//        }
//        if($level==3) {
//            $this->load->view('admin/person_profile/all_ozonat/modal_level4',$data);
//        }
//        if($level==4) {
//            $this->load->view('admin/person_profile/all_ozonat/modal_level5',$data);
//        }

    }

    public function make_suspend_accept()
    {
       $this->Transformation_model->change_suspend();
       $this->Transformation_model->insert_transformation();

    }
    public function make_suspend_refused()
    {
        $this->Transformation_model->change_suspend();
        $this->Transformation_model->insert_transformation();
    }
    public function get_employee()
    {
        $valu=$this->input->post('valu');
        $data['emps']=$this->Transformation_model->get_emps_by_edara('employees',$valu);
        $this->load->view('admin/Human_resources/employee_forms/all_ozonat/all_ozonat_transformation/get_emps',$data);
    }
    public function get_modal_details()
    {
        $id=$this->input->post('valu');
        $data['row']=$this->Transformation_model->get_by_id('hr_all_ozonat_orders',$id);
        $this->load->view('admin/Human_resources/employee_forms/all_ozonat/all_ozonat_transformation/get_ezn_details',$data);
    }
    public function get_ezn_follow()
    {
        $ezn_rkm=$this->input->post('valu');
        $arr = array('ezn_rkm_fk' => $ezn_rkm);
        $data['records']=$this->Transformation_model->my_orders('hr_all_ozonat_history',$arr);
        //print_r($data['records']);
        $this->load->view('admin/Human_resources/employee_forms/all_ozonat/all_ozonat_transformation/get_ezn_follows',$data);
    }

    public function get_emp_data()
    {
        $id=$this->input->post('emp_id');
        $data['row']=$this->Transformation_model->get_direct_manager_data($id);
        $this->load->view('admin/Human_resources/employee_forms/all_ozonat/all_ozonat_transformation/person_profile',$data);
       
    }
}