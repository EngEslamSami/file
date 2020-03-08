<?php
/**
 * Created by PhpStorm.
 * User: mini
 * Date: 31/01/2019
 * Time: 01:28 ص
 */

class Main_data_web extends MY_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->library('pagination');
        if($this->session->userdata('is_logged_in')==0){
            redirect('login');
        }
        $this->load->helper(array('url','text','permission','form'));

        /**********************************************************/
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in  = $this->Counting->get_basic_in_num();
        $this->files_basic_in  = $this->Counting->get_files_basic_in();
        /*************************************************************/
        $this->load->model('system_management/Groups');

        $this->load->model('Public_relations/Report_model');

        $this->groups=$this->Groups->get_group($_SESSION["group_number"]);
        $this->groups_title=$this->Groups->get_group_title($_SESSION["group_number"]);

        $this->load->model('main_data/Model_data_web');
    }
    private function test($data=array()){
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }
    public function index()
    {//main_data/Main_data_web
        $data['data'] = $this->Model_data_web->select();
        $data['title_h'] = "التحكم في اظهار واخفاء عناصر الهيدر ";
        $data['title_f'] = "التحكم في اظهار واخفاء عناصر الفوتر   ";
        $data['subview'] = 'admin/main_data/main_data_web_view';
        $this->load->view('admin_index', $data);
    }

    public function insert(){
        $this->Model_data_web->insert();
        redirect('main_data/Main_data_web', 'refresh');

    }

}