<?php

class Contributions_report extends MY_Controller{

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
        $this->load->model('st/reports/Contributions_report_model');
        $this->load->library('google_maps');
    }
    private  function test($data=array()){
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }

    private function url (){
        unset($_SESSION['url']);
        $this->session->set_flashdata('url','http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
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
        }

        elseif($type=='warning'){
            return $CI->session->set_flashdata('message','<div class="alert alert-warning alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>   !</strong> '.$text.'.</div>');
        }elseif($type=='error'){
            return $CI->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> !</strong> '.$text.'.</div>');
        }

    }

    public function index(){ // st/reports/Contributions_report

        $data['title']=' تقرير حركة التبرعات';
        $data['subview']= 'admin/st/reports/contributions_view';
        $this->load->view('admin_index',$data);
    }

    public function getConnection()
    {
        $result = $this->Contributions_report_model->getALL();
        $arr = array();
        $arr['data'] = array();

        if (!empty($result)) {
            foreach ($result as $row) {

                $arr['data'][] = array(
                    '<input type="radio" name="choosed" value="' . $row['id'] . '"
                         ondblclick="GetMemberName(this)"   id="member' . $row['id'] . '" data-name="' . $row['person_name'] . '" data-id="' . $row['id'] . '"
                      data-mob="' . $row['person_jwal'] . '"/>',
                    $row['person_name'],
                    $row['person_jwal'],

                    ''
                );
            }
        }
        echo json_encode($arr);


    }

    public function search_result(){

        $date_from = $this->input->post('date_from');
        $date_to = $this->input->post('date_to');
        $person_name = $this->input->post('motbr3_name');
        $data['result']= $this->Contributions_report_model->search_result($date_from,$date_to,$person_name);
        //$this->test($data['result']);
        $data['motbr3']= $this->input->post('motbr3_name');
        $this->load->view('admin/st/reports/contributions_result',$data);


    }
}