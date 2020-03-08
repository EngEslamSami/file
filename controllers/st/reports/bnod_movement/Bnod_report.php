<?php
class Bnod_report extends MY_Controller{
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
        $this->load->model('st/reports/bnod_movement/Bnod_report_model');
        $this->load->library('google_maps');
    }
    private  function test($data=array()){
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }
    public function index(){ // st/reports/bnod_movement/Bnod_report

        $data['storage'] = $this->Bnod_report_model->get_storage(1);
        $data['bnod'] = $this->Bnod_report_model->get_bnod();
        $data['title'] = 'حركة البنود';
        $data['subview'] = 'admin/st/reports/bnod_movement/bnod_report_view';
        $this->load->view('admin_index', $data);
    }

    public function search_result(){

        $data['result']= $this->Bnod_report_model->search_sanf();
       // $this->test($data['result']);
       // die;
        $this->load->view('admin/st/reports/bnod_movement/bnod_result',$data);

    }
}