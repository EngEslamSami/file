<?php

class Fr_member extends MY_Controller
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
        $this->load->model('Nationality');
        $this->load->model('Department');
        $this->load->model('all_Finance_resource_models/fr_member/Fr_member_model');
        $this->load->model('directors/General_assembly_model');

        $this->load->model('system_management/Groups');

        $this->groups = $this->Groups->get_group($_SESSION["group_number"]);
        $this->groups_title = $this->Groups->get_group_title($_SESSION["group_number"]);
        $this->load->model('human_resources_model/employee_setting/Employee_setting');


        /**********************************************************/
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in = $this->Counting->get_basic_in_num();
        $this->files_basic_in = $this->Counting->get_files_basic_in();
        /*************************************************************/
    }

    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }
    
    public function index()//all_Finance_resource/fr_member/Fr_member
    {

        $data['gender_data'] =$this->General_assembly_model->GetFromEmployees_settings(1);
        $data['nationality'] =$this->General_assembly_model->GetFromEmployees_settings(2);
        $data['social_status'] =$this->General_assembly_model->GetFromEmployees_settings(4);
        $data['dest_card'] =$this->General_assembly_model->GetFromEmployees_settings(6);
        $data['cities']= $this->Employee_setting->select_areas();
        $data['ahais']= $this->Employee_setting->select_residentials();
        $data['Degree'] = $this->General_assembly_model->GetFromEmployees_settings(14);
        $data['science_qualification'] = $this->General_assembly_model->GetFromEmployees_settings(15);
        $data['employer'] = $this->General_assembly_model->GetFromGeneral_assembly_settings(1);
        $data['member_types'] = $this->General_assembly_model->GetFromGeneral_assembly_settings(2);
        $data['reasons'] =$this->Difined_model->select_search_key('employees_settings', 'type', '18');
        $data['banks'] =$this->Fr_member_model->select_all_banks();
        if($this->input->post('save'))
        {
            $this->Fr_member_model->insert_data();
           redirect('all_Finance_resource/fr_member/Fr_member','refresh');
        }

        $data['members']=$this->Fr_member_model->get_all();
        $data['job_role'] = $this->General_assembly_model->GetFromGeneral_assembly_settings(3);
        $data['records'] = $this->General_assembly_model->select_all();
        $data['membership_arr'] = $this->General_assembly_model->GetFromGeneral_assembly_settings(2);
        $data['surname_arr'] = $this->General_assembly_model->GetFromGeneral_assembly_settings(4);
        $data['assembley_members']=$this->Fr_member_model->general_assembley_members();

        $data['title']="اضافه مشتركين";
        $data['subview'] = 'admin/all_Finance_resource_views/fr_member/fr_member';
        $this->load->view('admin_index', $data);
    }

    public function get_emp_data()
    {
        $id=$this->input->post('valu');
        $data['row']=$this->Fr_member_model->get_by_id($id);
        print_r(json_encode($data['row']));
    }
    
    public function get_side_bar()
    {
        $id=$this->input->post('valu');

        $data['result']=$this->Fr_member_model->get_by_id($id);
        $this->load->view('admin/directors/general_assembly/general_assembly_person_data',$data);

    }

    public function edit_fr_member($id)
    {
        $data['gender_data'] =$this->General_assembly_model->GetFromEmployees_settings(1);
        $data['nationality'] =$this->General_assembly_model->GetFromEmployees_settings(2);
        $data['social_status'] =$this->General_assembly_model->GetFromEmployees_settings(4);
        $data['dest_card'] =$this->General_assembly_model->GetFromEmployees_settings(6);
        $data['cities']= $this->Employee_setting->select_areas();
        $data['ahais']= $this->Employee_setting->select_residentials();
        $data['Degree'] = $this->General_assembly_model->GetFromEmployees_settings(14);
        $data['science_qualification'] = $this->General_assembly_model->GetFromEmployees_settings(15);
        $data['employer'] = $this->General_assembly_model->GetFromGeneral_assembly_settings(1);
        $data['member_types'] = $this->General_assembly_model->GetFromGeneral_assembly_settings(2);
        $data['reasons'] =$this->Difined_model->select_search_key('employees_settings', 'type', '18');
        $data['banks'] =$this->Fr_member_model->select_all_banks();
         $data['row']=$this->Fr_member_model->get_data_by_id($id,'fr_members');
        $data['job_role'] = $this->General_assembly_model->GetFromGeneral_assembly_settings(3);
        $data['records'] = $this->General_assembly_model->select_all();
        $data['membership_arr'] = $this->General_assembly_model->GetFromGeneral_assembly_settings(2);
        $data['surname_arr'] = $this->General_assembly_model->GetFromGeneral_assembly_settings(4);
        $data['assembley_members']=$this->Fr_member_model->general_assembley_members();
        if(!empty($data['row']->member_id_fk)) {
            $data['result'] = $this->Fr_member_model->get_by_id($data['row']->member_id_fk);
        }


        if($this->input->post('save'))
        {
            $this->Fr_member_model->edit_data($id);

            redirect('all_Finance_resource/fr_member/Fr_member','refresh');
        }
        if(!empty($data['row']->member_id_fk)) {
            $data['member'] = $this->Fr_member_model->get_data_by_id($data['row']->member_id_fk, 'general_assembley_members');
        }

        $data['title']="تعديل المشترك";

        $data['subview'] = 'admin/all_Finance_resource_views/fr_member/fr_member';
        $this->load->view('admin_index', $data);

    }

    public function delete_record($id)
    {
     $this->Fr_member_model->delete_record($id);
        redirect('all_Finance_resource/fr_member/Fr_member','refresh');
    }
}