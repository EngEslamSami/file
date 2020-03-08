<?php

class  Bnod extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }

        $this->load->helper(array('url', 'text', 'permission', 'form'));
        $this->load->model('familys_models/Model_access_rule');
        $this->load->model('system_management/Groups');
        $this->load->model('all_Finance_resource_models/bnod_models/Bnod_model');

        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in = $this->Counting->get_basic_in_num();
        $this->files_basic_in = $this->Counting->get_files_basic_in();
        $this->load->model('human_resources_model/employee_setting/Employee_setting');
        $this->load->model('human_resources_model/Finance_employee_model');
        $this->load->model('all_Finance_resource_models/donors/Donor_model');
        $this->load->model('Difined_model');
        $this->load->model("familys_models/Connection_model");

    }
    public function index() ///all_Finance_resource/bnod/Bnod
    {

       $data['title']="اضافه البنود";
        $data['records']=$this->Bnod_model->get_all_account_group();

         $data['bnods']=$this->Bnod_model->get_from_table();

        
         $data['rows']=$this->Bnod_model->select_bnod();

        $data['subview'] = 'admin/all_Finance_resource_views/bnod/add_band';
        $this->load->view('admin_index', $data);
    }
    public function add_data()
    {
        $this->load->model('all_Finance_resource_models/bnod_models/Bnod_model');
        $type=$this->input->post('type');
        $this->Bnod_model->insert_bnod($type);

    }

    public function delete_record($id)
    {
        $this->Bnod_model->delete_record($id);
        redirect('all_Finance_resource/bnod/Bnod','refresh');
    }

    public function get_sub_branch()
    {
        $valu=$this->input->post('valu');
       $data['records'] =$this->Bnod_model->get_records_by_id($valu);
        
        $this->load->view('admin/all_Finance_resource_views/bnod/load_page',$data);
    }



    public function update_bnod($id)
    {
        $this->Bnod_model->update_bnod($id);
        redirect('all_Finance_resource/bnod/Bnod','refresh');
    }
}