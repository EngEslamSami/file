<?php

class LagnaMembers extends MY_Controller{

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


    }

    private function test($data = array()){
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }

    private function test_r($data = array()){
        echo "<pre>";
        print_r($data);
        echo "</pre>";

    }

    private function thumb($data)
    {
        $config['image_library'] = 'gd2';
        $config['source_image'] = $data['full_path'];
        $config['new_image'] = 'uploads/thumbs/' . $data['file_name'];
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['thumb_marker'] = '';
        $config['width'] = 275;
        $config['height'] = 250;
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
    }

    private function upload_image($file_name)
    {
        $config['upload_path'] = 'uploads/images';
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf';
        $config['encrypt_name'] = true;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($file_name)) {
            return false;
        } else {
            $datafile = $this->upload->data();
            $this->thumb($datafile);
            return $datafile['file_name'];
        }
    }

    private function upload_file($file_name)
    {
        $config['upload_path'] = 'uploads/files';
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
        $config['overwrite'] = true;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($file_name)) {
            return false;
        } else {
            $datafile = $this->upload->data();
            return $datafile['file_name'];
        }
    }

    private function url()
    {
        unset($_SESSION['url']);
        $this->session->set_flashdata('url', 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
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

  private function current_hjri_year()
    {
        $time = mktime(0, 0, 0, Date('m'), Date('j'), Date('Y'));
        $TDays=round($time/(60*60*24));
        $HYear=round($TDays/354.37419);
        $Remain=$TDays-($HYear*354.37419);
        $HMonths=round($Remain/29.531182);
        $HDays=$Remain-($HMonths*29.531182);
        $HYear=$HYear+1389;
        $HMonths=$HMonths+10;$HDays=$HDays+23;
        if ($HDays>29.531188 and round($HDays)!=30){
            $HMonths=$HMonths+1;$HDays=Round($HDays-29.531182);
        }else{
            $HDays=Round($HDays);
        }
        if ($HMonths>12) {
            $HMonths=$HMonths-12;
            $HYear = $HYear+1;
        }
        $NowDay=$HDays;
        $NowMonth=$HMonths;
        $NowYear=$HYear;
        $MDay_Num = date("w");
        if ($MDay_Num=="0"){
            $MDay_Name = "الأحد";
        }elseif ($MDay_Num=="1"){
            $MDay_Name = "الإثنين";
        }elseif ($MDay_Num=="2"){
            $MDay_Name = "الثلاثاء";
        }elseif ($MDay_Num=="3"){
            $MDay_Name = "الأربعاء";
        }elseif ($MDay_Num=="4"){
            $MDay_Name = "الخميس";
        }elseif ($MDay_Num=="5"){
            $MDay_Name = "الجمعة";
        }elseif ($MDay_Num=="6"){
            $MDay_Name = "السبت";
        }
        $NowDayName = $MDay_Name;
        $NowDate = $MDay_Name."، ".$HDays."/".$HMonths."/".$HYear." هـ";
        /*
        $NowDate; لطباعة التاريخ الهجري كامل لهذا اليوم مثلاً (الخميس 1/3/1430 هـ).
        $MDay_Name; طباعة اليوم فقط مثلاً (الخميس).
        $HDays; تاريخ اليوم (1).
        $HMonths; الشهر (3).
        $HYear; السنة الهجرية (1430).
        */
        return $HYear;
    }
//--------------------------------------------------

    public function add_lagna(){   //  family_controllers/LagnaMembers/add_lagna
        $this->load->model('familys_models/Model_lagna_members');
        $data['all_legan']=$this->Model_lagna_members->select_all();
        $data['all_member']= $this->Model_lagna_members->get_all_members();
        $data['records']=$this->Model_lagna_members->get_all_lgna();
        $data['title']="أعضاء اللجان";
        $data['subview'] = 'admin/familys_views/all_lagna_members/add_member';
        $this->load->view('admin_index', $data);
    }

    public function member_form(){ //  family_controllers/LagnaMembers/member_form


        $this->load->model('familys_models/Model_lagna_members');
         $data['all_legan']=$this->Model_lagna_members->select_all();
         $data['all_member']= $this->Model_lagna_members->get_all_members();
         $data['records']=$this->Model_lagna_members->get_all_lgna();
        $data['last_id']=$this->Model_lagna_members->select_last_id();
        $data['department_jobs']=$this->Model_lagna_members->select_department_jobs();
        $data['title']=" إضافة أعضاء اللجان";
        $data['subview'] = 'admin/familys_views/all_lagna_members/member_form';
        $this->load->view('admin_index', $data);


    }


    public function get_emp(){

        if($_POST['depart'] !='' && $_POST['lagna_id'] != ''){
            $this->load->model('familys_models/Model_lagna_members');
            $data_load['department_jobs']=$this->Model_lagna_members->select_department_jobs();
            $data_load['department_emp'] =$this->Model_lagna_members->get_department_emps($_POST['depart'],$_POST['lagna_id']);

            $data_load['department_id'] =$_POST['depart'];
            $this->load->view('admin/familys_views/all_lagna_members/get_emp', $data_load);
        }
    }



    public function GetMyMembers(){

        if($_POST['lgna_id'] !=''){
            $this->load->model('familys_models/Model_lagna_members');
            $data_load['members']=$this->Model_lagna_members->get_lagna_member($_POST['lgna_id'],1);
            $this->load->view('admin/familys_views/all_lagna_members/GetMyMembers', $data_load);
        }
    }
    public function GetFromTable(){

        if($_POST['type'] !='' && !empty($_POST['lgna_id'])){
            $this->load->model('familys_models/Model_lagna_members');
            $count  =$this->Model_lagna_members->GetFromTable($_POST['type'],$_POST['lgna_id']);
            echo json_encode($count);
        }

    }
    //=========================================================

    public function add_lagna_member(){

        $this->load->model('familys_models/Model_lagna_members');
        $this->Model_lagna_members->insert_lgna();
        $this->message('success','تم إضافة أعضاء اللجان');
       // redirect('family_controllers/LagnaMembers/member_form','refresh');
       redirect('family_controllers/LagnaMembers/member_form', 'refresh');
    }
    public function make_form(){
        $data['num']= $this->input->post('num');
        $this->load->view('admin/familys_views/all_lagna_members/load_form',$data);
    }

    public function delete_lgna($lagna_num){
        $this->load->model('familys_models/Model_lagna_members');
        $this->Model_lagna_members->delete_member($lagna_num,'lagna_num');
        redirect('family_controllers/LagnaMembers/add_lagna');
    }
  /*  public function delete_member($id){
        $this->load->model('familys_models/Model_lagna_members');
        $this->Model_lagna_members->delete_member($id,'id');
        redirect('family_controllers/LagnaMembers/add_lagna');
    }*/
    
        public function delete_member($id)
    {
        $this->load->model('familys_models/Model_lagna_members');
        $this->Model_lagna_members->delete_member($id, 'id');
        redirect('family_controllers/LagnaMembers/member_form');
    }

   /* public function change_suspend()
    {
        $this->load->model('familys_models/Model_lagna_members');

        $id = $this->input->post('id');
        $this->Model_lagna_members->change_suspend($id);


    }*/
    
    public function change_suspend()
{
    $this->load->model('familys_models/Model_lagna_members');

    $id = $this->input->post('id');
    $suspend = $this->input->post('suspend');
    $this->Model_lagna_members->change_suspend($id,$suspend);


}


}// END CLASS
?>