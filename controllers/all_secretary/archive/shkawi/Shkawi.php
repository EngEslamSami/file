<?php

class  Shkawi extends  MY_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        if($this->session->userdata('is_logged_in')==0){
            redirect('login');
        }
        /**********************************************************/
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in  = $this->Counting->get_basic_in_num();
        $this->files_basic_in  = $this->Counting->get_files_basic_in();
        /*************************************************************/
        $this->load->helper(array('url','text','permission','form'));

        $this->load->model('system_management/Groups');

        $this->groups=$this->Groups->get_group($_SESSION["group_number"]);
        $this->groups_title=$this->Groups->get_group_title($_SESSION["group_number"]);
        $this->load->library('google_maps');
        $this->load->model('all_secretary_models/archive_m/shkawi/Shkawi_model');

    }
    public function messages($type,$text,$method=false)
    {
        $CI =& get_instance();
        $CI->load->library("session");
        if($type =='success') {
            return $CI->session->set_flashdata('message','<script> swal({
                    title:"'.$text.'" ,
                    confirmButtonText: "تم"
                })</script>');

        }elseif($type=='warning'){
            return $CI->session->set_flashdata('message','<div class="alert alert-warning alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>   !</strong> '.$text.'.</div>');
        }elseif($type=='error'){
            return $CI->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> !</strong> '.$text.'.</div>');
        }

    }
    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }

    public function add_shkwa(){ // all_secretary/archive/shkawi/Shkawi/add_shkwa

       if ($_SESSION['role_id_fk']==3){
           $data['emp_data']= $this->Shkawi_model->get_employee_data('employees',$_SESSION['emp_code']);
       }
       if ($this->input->post('add')){
         // $this->test($_POST);
           $this->Shkawi_model->add_shkwa();
           $this->messages('success', ' تم الارسال  بنجاح');
           redirect('all_secretary/archive/shkawi/Shkawi/add_shkwa');
       }


        $data['title'] = " شكاوي الموظفين ";
        $data['subview'] = 'admin/all_secretary_view/archive_v/shkawi/shkawi_view';
        $this->load->view('admin_index', $data);
    }
    public function load_tahwel()
    {

        $type = $this->input->post('type');
        if ($type == 2) {
            $data['all'] = $this->Shkawi_model->get_table('department_jobs', array('from_id_fk !=' => 0));
            $data['type'] = $type;
        } elseif ($type == 1) {
            $data['all'] = $this->Shkawi_model->get_all_emp(0);
            $data['type'] = $type;
        } elseif ($type == 3) {
            $data['all'] = $this->Shkawi_model->get_table('department_jobs', array('from_id_fk' => 0));
            $data['type'] = $type;
        }
        $this->load->view('admin/all_secretary_view/archive_v/shkawi/load_tahwel', $data);

    }

 


}