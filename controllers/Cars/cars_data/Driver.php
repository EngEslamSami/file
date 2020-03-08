<?php
class Driver extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }
        $this->load->model('human_resources_model/Employee_model');


        $this->load->model('familys_models/for_dash/Counting');
        $this->load->model('Cars/drivers/Driver_model');

        $this->count_basic_in = $this->Counting->get_basic_in_num();
        $this->files_basic_in = $this->Counting->get_files_basic_in();

        $this->load->helper(array('url', 'text', 'permission', 'form'));
        /**********************************************************/
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in = $this->Counting->get_basic_in_num();
        $this->files_basic_in = $this->Counting->get_files_basic_in();
        /*************************************************************/


    }

//--------------------------------------------------
    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
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
    private  function upload_image($file_name ,$folder = "images"){
        $config['upload_path'] = 'uploads/'.$folder;
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf';
        // $config['max_size']    = '1024*8';
        $config['max_size']    = '80000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000';

        $config['encrypt_name']=true;
        $this->load->library('upload',$config);
        if(! $this->upload->do_upload($file_name)){
            return  false;
        }else{
            $datafile = $this->upload->data();
            $this->thumb($datafile);
            return  $datafile['file_name'];
        }
    }
    private function thumb($data){
        $config['image_library'] = 'gd2';
        $config['source_image'] =$data['full_path'];
        $config['new_image'] = 'uploads/thumbs/'.$data['file_name'];
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['thumb_marker']='';
        $config['width'] = 275;
        $config['height'] = 250;
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
    }
//-----------------------------------------------
    private  function upload_file($file_name){
        $config['upload_path'] = 'uploads/files';
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
        // $config['max_size']    = '1024*8';
        $config['max_size']    = '80000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000';

        $config['encrypt_name']=true;
        $config['overwrite'] = true;
        $this->load->library('upload',$config);
        if(! $this->upload->do_upload($file_name)){
            return  false;
        }else {
            $datafile = $this->upload->data();
            return $datafile['file_name'];
        }
    }
//-------------------------------------------------
    private function url (){
        unset($_SESSION['url']);
        $this->session->set_flashdata('url','http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
    }


public function index() //Cars/drivers/Driver
{



    $data['types']=$this->Driver_model->get_from_cars_setting(10);
    $data['markz']=$this->Driver_model->get_from_emp_setting(17);
    $data['fasila']=$this->Driver_model->get_from_emp_setting(21);
    $data['adminstration']=$this->Driver_model->get_all_adminstration(0);
     if($this->input->post('add'))
{
    $this->Driver_model->insert_data();
   redirect('Cars/drivers/Driver','refresh');
}

    $data['drivers']=$this->Driver_model->get_all_drivers();

    $data['title']="اضافه سائق";

    $data['subview'] = 'admin/cars/drivers/add_driver';
    $this->load->view('admin_index', $data);
}


    public function get_emps()
    {
        $id= $this->input->post('valu');
        $data['emps']=$this->Driver_model->get_all_emps($id);


      $this->load->view('admin/cars/drivers/load_page',$data);
    }
    public function get_emp_siebar()
    {
        $id= $this->input->post('valu');
        $data["personal_data"]=$this->Employee_model->get_one_employee($id);
      $this->load->view('admin/Cars/drivers/sidebar_person_data',$data);
    }

    public function edit_driver($id)
    {

        $data['types']=$this->Driver_model->get_from_cars_setting(10);
        $data['markz']=$this->Driver_model->get_from_emp_setting(17);
        $data['fasila']=$this->Driver_model->get_from_emp_setting(21);
        $data['adminstration']=$this->Driver_model->get_all_adminstration(0);
        $data['driver']=$this->Driver_model->get_by_id($id);
        $data['emps']=$this->Driver_model->get_all_emps($data['driver']->edara_id_fk);
        $data["personal_data"]=$this->Employee_model->get_one_employee($data['driver']->emp_id_fk);
        if($this->input->post('add'))
        {
            $this->Driver_model->update_data($id);
            redirect('Cars/drivers/Driver','refresh');
        }

        $data['title']="تعديل بيانات السائق";
        $data['subview'] = 'admin/cars/drivers/add_driver';
        $this->load->view('admin_index', $data);

    }
    public function delete_record($id)
    {
        $this->Driver_model->delete_record($id);
        redirect('Cars/drivers/Driver','refresh');
    }


    //=========================================

    public function car_relation_driver()
    {


        $data['cars']=$this->Driver_model->get_all_cars();
        $data['employees']=$this->Driver_model->get_all_employees();
        if($this->input->post('add'))
        {
            $img=$this->upload_image('file');
           $this->Driver_model->insert_car_relation($img);
            redirect('Cars/drivers/Driver/car_relation_driver','refresh');


        }

        $data['title']="ربط السائق بالسياره";
        $data['subview'] = 'admin/cars/drivers/add_relation';
        $this->load->view('admin_index', $data);
    }
}