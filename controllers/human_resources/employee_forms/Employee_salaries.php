<?php
class Employee_salaries extends MY_Controller{

    public function __construct(){
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

        $this->load->model('human_resources_model/employee_forms/Employee_salaries_model');
        $this->load->library('google_maps');
    }
    private  function test($data=array()){
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }

    public function index(){ // human_resources/employee_forms/Employee_salaries
        $data['title']= 'مسير الرواتب' ;
        $data['all_emp']= $this->Employee_salaries_model->Employee_date();
        $data['all_bdlat']= $this->Employee_salaries_model->get_all_badlat();
      //  $this->test($data['all_emp']);

        $data['subview']= 'admin/Human_resources/employee_forms/Employee_salaries_view';
        $this->load->view('admin_index',$data);
    }

}