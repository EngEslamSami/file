<?php

class Add_society_system extends MY_Controller
{
    
    
    public function __construct(){
        parent::__construct();
        $this->load->library('pagination');
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }
        $this->load->model('Difined_model');
        $this->load->model("all_Finance_resource_models/all_pills/AllPills_model");

        $this->load->helper(array('url', 'text', 'permission', 'form'));
        $this->load->model('familys_models/Model_access_rule');
        $this->load->model('system_management/Groups');

        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in  = $this->Counting->get_basic_in_num();
        $this->files_basic_in  = $this->Counting->get_files_basic_in();
        $this->load->model('human_resources_model/employee_setting/Employee_setting');
        $this->load->model('human_resources_model/Finance_employee_model');
        $this->load->model('all_Finance_resource_models/all_pills/AllPills_model');
        $this->load->model('Difined_model');

    }
    
    
  
    private function message($type,$text){
        if($type =='success') {
            return $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissable">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <strong> تم بنجاح!</strong> '.$text.'.
                                                </div>');
        }elseif($type=='wiring'){
            return $this->session->set_flashdata('message','<div class="alert alert-warning alert-dismissable">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <strong> '.$text.' !</strong> .
                                                </div>');
        }elseif($type=='error'){
            return  $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <strong>'.$text.'!</strong> .
                                                </div>');
        }
    }

    //-----------------------------------------
    private function test($data = array()){
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }
    public function society_system (){// society_system/Add_society_system/society_system
        error_reporting(E_ALL & ~E_NOTICE);
        $this->load->model('society_system/Add_society_system_model');
        $data['departments'] = $this->Add_society_system_model->display_departments();
        $data['system'] = $this->Add_society_system_model->display_system();
        $data['updated_system']= $this->Add_society_system_model->display_updated_system();
       //$this->test($data['updated_system']);
        $data['update'] = $this->Add_society_system_model->update_dep_sys();

        $data['subview'] = 'admin/society_system/add_society_system_view';
        $this->load->view('admin_index', $data);
    }

    public function update_society_system(){ // society_system/Add_society_system/update_society_system
        $this->load->model('society_system/Add_society_system_model');
        if( $this->input->post('UPDTATE')){

            $this->Add_society_system_model->update_sys();
            $this->message("success","تم التعديل بنجاح");

            redirect('society_system/Add_society_system/society_system');


        }

    }


    public function  system_set($id){ // society_system/Add_society_system/system_set
        $this->load->model('society_system/Add_society_system_model');

            $this->Add_society_system_model->set_sys($id);

           $this->message("success","تم االحذف بنجاح");

            redirect('society_system/Add_society_system/society_system');




    }
}