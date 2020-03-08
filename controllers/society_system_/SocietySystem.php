<?php

class SocietySystem extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->CI = &get_instance();
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }
        /**********************************************************/
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in = $this->Counting->get_basic_in_num();
        $this->files_basic_in = $this->Counting->get_files_basic_in();
        /*************************************************************/
        $this->load->helper(array('url', 'text', 'permission', 'form'));
        $this->load->model('system_management/Groups');
        $this->load->model('Difined_model');
        $this->load->model('familys_models/lagna_model/Committee_model');

        $this->main_groups = $this->Groups->main_fetch_group();
        $this->groups = $this->Groups->get_group($_SESSION["group_number"]);
        $this->groups_title = $this->Groups->get_group_title($_SESSION["group_number"]);
        $this->load->model('society_system/Society_system_model');
        


    }

    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }

    private function message($type, $text)
    {
        if ($type == 'success') {
            return $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> تم بنجاح!</strong> ' . $text . '.</div>');
        } elseif ($type == 'wiring') {
            return $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> تحذير  !</strong> ' . $text . '.</div>');
        } elseif ($type == 'error') {
            return $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>خطأ!</strong> ' . $text . '.</div>');
        }
    }


    public function addSocietySystem()// society_system/SocietySystem/addSocietySystem
    {
        if ($this->input->post('add')) {
            $this->Society_system_model->deleteSocietySystem();
            $this->Society_system_model->insertSocietySystemRecords();
           // $this->Society_system_model->insertSocietySystem();
            $this->message('success','تم إضافة حساب بنجاح');
            redirect('society_system/SocietySystem/addSocietySystem', 'refresh');
        }
        $data['banks'] = $this->Difined_model->select_all('banks_settings','','','id','ASC');
        $data['accounts'] = $this->Society_system_model->selectAllByType(1);
       // $this->test($data['accounts']);
        $data['allData'] = $this->Society_system_model->selectAllByType(2);
        $data['title'] = " ارقام حسابات الجمعية ";
        $data['subview'] = 'admin/society_system/add_society_system';
        $this->load->view('admin_index', $data);   
    }



    public function add_record() { //society_system/SocietySystem/add_record

        $data['len']=$this->input->post('len');
        $data['banks'] = $this->Difined_model->select_all('banks_settings','','','id','ASC');
        $data['accounts'] = $this->Society_system_model->selectAllByType(1);
        $this->load->view('admin/society_system/add_row',$data);
    }

    public function updateAccounts($id)
    {
        $this->Society_system_model->updateSocietySystem($id);
        redirect('society_system/SocietySystem/addSocietySystem','refresh');
    }
    
    
    
     public function addAccountsNames($id =0)// society_system/SocietySystem/addAccountsNames
    {
        if ($this->input->post('add')) {

            $this->Society_system_model->insertSocietySystem($id);
            $this->message('success','تم إضافة حساب بنجاح');
            redirect('society_system/SocietySystem/addAccountsNames', 'refresh');
        }
        $data['records'] = $this->Society_system_model->selectAllByType(1);
        $data['record'] = $this->Society_system_model->selectAllById($id);
        $data['title'] = "  أسماء حسابات الجمعية ";
        $data['subview'] = 'admin/society_system/add_accounts_names';
        $this->load->view('admin_index', $data);
    }



    public function delete($id,$type)
    {

        $Conditions_arr=array("id"=>$id);
        $this->Difined_model->delete("society_main_banks_account",$Conditions_arr);
        redirect("society_system/SocietySystem/$type", 'refresh');
    }


}
?>