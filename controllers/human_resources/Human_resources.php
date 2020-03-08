<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Human_resources extends MY_Controller {
	public function __construct(){
        parent::__construct();
        $this->load->library('pagination');
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }
                $this->load->model('Difined_model');
        $this->load->model('Nationality');
        $this->load->model('Department');
              $this->load->model('human_resources_model/Employee_model');
        $this->load->helper(array('url', 'text', 'permission', 'form'));
        $this->load->model('familys_models/Model_access_rule');
        $this->load->model('system_management/Groups');

        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in  = $this->Counting->get_basic_in_num();
        $this->files_basic_in  = $this->Counting->get_files_basic_in(); 
        $this->load->model('human_resources_model/Finance_employee_model');  
    }
    private  function test($data=array()){
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }
    private  function test_r($data=array()){
        echo "<pre>";
        print_r($data);
        echo "</pre>";

    }
    /* private function thumb($data){
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
    */
    private  function upload_image($file_name){
    $config['upload_path'] = 'uploads/images';
    $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf';
    $config['max_size']    = '1024*8';
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
/*
 private  function upload_image_2($file_name ,$folder = "images"){
        $config['upload_path'] = 'uploads/'.$folder;
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf';
        $config['max_size']    = '1024*8';
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
    */
    
        private function upload_image_2($file_name, $folder = '')
    {
        if (!empty($folder)) {
            $config['upload_path'] = 'uploads/' . $folder;
        } else {
            $config['upload_path'] = 'uploads/files';
        }
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf';
        $config['max_size'] = '1024*8888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888';
        $config['encrypt_name'] = true;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($file_name)) {
            return false;
        } else {
            $datafile = $this->upload->data();
            $this->thumb($datafile, $folder);
            return $datafile['file_name'];
        }
    }
        private function thumb($data,$folder='')
    {
        $config['image_library'] = 'gd2';
        $config['source_image'] = $data['full_path'];
        if (!empty($folder)) {
            $config['new_image'] = 'uploads/' . $folder . '/thumbs/' . $data['file_name'];
        } else {
            $config['new_image'] = 'uploads/thumbs/' . $data['file_name'];
        }
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['thumb_marker'] = '';
        $config['width'] = 275;
        $config['height'] = 250;
        $this->load->library('image_lib', $config);
        $this->image_lib->initialize($config);

        $this->image_lib->resize();
    }
    private function upload_file($file_name, $folder = '')
    {
        if (!empty($folder)) {
            $config['upload_path'] = 'uploads/' . $folder;
        } else {
            $config['upload_path'] = 'uploads/files';
        }
        /*$config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
        $config['max_size'] = '1024*8';
        $config['overwrite'] = true;*/
        
  	    $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
        $config['max_size'] = '1000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000';
        $config['encrypt_name'] = true;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (!$this->upload->do_upload($file_name)) {
            return false;
        } else {
            $datafile = $this->upload->data();
            $this->thumb($datafile, $folder);
            return $datafile['file_name'];
        }
    }
    public function messages($type, $text, $method = false)
    {
        $CI =& get_instance();
        $CI->load->library("session");
        if ($type == 'success') {
            return $CI->session->set_flashdata('message', '<script> swal({
                    type:"success",
                    title:"' . $text . '" ,
                    confirmButtonText: "تم"
                })</script>');
        } elseif ($type == 'warning') {
            return $CI->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>   !</strong> ' . $text . '.</div>');
        } elseif ($type == 'error') {
            return $CI->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> !</strong> ' . $text . '.</div>');
        }

    }
   /* private  function upload_file($file_name){
        $config['upload_path'] = 'uploads/files';
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
        $config['max_size']    = '1024*8';
        $config['overwrite'] = true;
        $this->load->library('upload',$config);
        if(! $this->upload->do_upload($file_name)){
            return  false;
        }else {
            $datafile = $this->upload->data();
            return $datafile['file_name'];
        }
    }*/
    public function downloads($file) //  // human_resources/Human_resources/downloads
    {
        $this->load->helper('download');
        $name = $file;
        $data = file_get_contents('./uploads/files/'.$file); 
        force_download($name, $data); 
    }
  /*  private function message($type,$text){
        if($type =='success') {
            return $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> تم بنجاح!</strong> '.$text.'.</div>');
        }elseif($type=='wiring'){
            return $this->session->set_flashdata('message','<div class="alert alert-dwarning alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>   !</strong> '.$text.'.</div>');
        }elseif($type=='error'){
            return  $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>!</strong> '.$text.'.</div>');
        }
    }*/
    
        public function message($type,$text,$method=false)
{
    $CI =& get_instance();
    $CI->load->library("session");
    if($type =='success') {
        return $CI->session->set_flashdata('message','<script> swal({
               title:"'.$text.'" ,
               type:"success",
               confirmButtonText: "تم"
           })</script>');
    }

    elseif($type=='warning'){
        return $CI->session->set_flashdata('message','<div class="alert alert-warning alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>   !</strong> '.$text.'.</div>');
    }elseif($type=='error'){
        return $CI->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> !</strong> '.$text.'.</div>');
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
     
     
    private function upload_all_file($file_name)
    {
        $config['upload_path'] = 'uploads/human_resource/emp_mostnad_files';
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
        $config['max_size'] = '100000000';
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

    public function read_emp_file($file_name)
    {
        $this->load->helper('file');
        //$file_path = 'uploads/human_resource/emp_mostnad_files/'.$file_name;
         $file_path = 'uploads/human_resources/emp_mostnad_files/'.$file_name;
        header('Content-Type: application/pdf');
        header('Content-Discription:inline; filename="'.$file_name.'"');
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges:bytes');
        header('Content-Length: ' . filesize($file_path));
        readfile($file_path);
    }



 public function get_rkm_hesab(){
            $markz_id = $this->input->post('markz_id');
            $badl_id = $this->input->post('badl_id');

            $rkm_hesab=  $this->Finance_employee_model->get_rkm_hesab($markz_id,$badl_id);
       // echo  json_encode($rkm_hesab);
     //   echo $rkm_hesab;
      echo  json_encode($rkm_hesab);

    }
	  
    /************************************************************/
  /*  public function index()
    {
        $this->load->model('administrative_affairs_models/Prog_main_sitting_mo');
       $this->load->model('human_resources_model/employee_setting/Employee_setting');  //Osama
        $this->load->model('administrative_affairs_models/administrative_affairs_setting');
        $data['affairs_settings_options'] = $this->administrative_affairs_setting->select_all('administrative_affairs_settings', '', '', '', '');
        $data['all_emps'] = $this->Difined_model->select_all('employees', '', '', 'id', 'ASC');
       //add
       ///yara
       $data['all_emps'] = $this->Employee_model->select_allEmployee();
       $data['customer_js'] = $this->load->view('admin/Human_resources/add_employee/app_js', '', TRUE);
        $data["last_emp_code"] = $this->Employee_model->select_last_code_2();
        $data['cities']= $this->Employee_setting->select_areas();//Osama
        $data['ahais']= $this->Employee_setting->select_residentials();
        $data['nationality'] =$this->Difined_model->select_search_key('employees_settings', 'type', '2');
        $data['deyana'] =$this->Difined_model->select_search_key('employees_settings', 'type', '3');
        $data['type_card'] =$this->Difined_model->select_search_key('employees_settings', 'type', '5');
        $data['dest_card'] =$this->Difined_model->select_search_key('employees_settings', 'type', '6');
        $data['company'] =$this->Difined_model->select_search_key('employees_settings', 'type', '7');
        $data['cat_tamin'] =$this->Difined_model->select_search_key('employees_settings', 'type', '8');
        $data['social_status'] =$this->Difined_model->select_search_key('employees_settings', 'type', '4');
        $data['gender_data'] =$this->Difined_model->select_search_key('employees_settings', 'type', '1');
        $data['degree_qual'] =$this->Difined_model->select_search_key('employees_settings', 'type', '14');
        $data['qualification'] =$this->Difined_model->select_search_key('employees_settings', 'type', '15');
        $data['job_role'] = $this->Difined_model->select_search_key('all_defined_setting', 'defined_type', '4');
        $data['admin'] = $this->Employee_model->select_by();
        $data['departs'] = $this->Employee_model->select_depart();
        $data['department_branch'] = $this->Employee_model->select_branch_department();
        $data['records'] = $this->Employee_model->select_allEmployee();
        $data['banks'] = $this->Difined_model->select_all('banks_settings','','',"","");
        $data['contracts'] = $this->Prog_main_sitting_mo->select_sittings(5);
        $data["current_hijry_year"] = $this->current_hjri_year();
        
   
        
        
        $data['title'] = 'إضافة موظف';
        if ($this->input->post('admin_num')) {
            $data['id'] = $this->input->post('admin_num');
            $this->load->view('admin/Human_resources/add_employee/get_depart', $data);
        }elseif ($this->input->post('bank_num')) {
            $data['id'] = $this->input->post('admin_num');
            $this->load->view('admin/administrative_affairs/employee/new_employee/get_bank', $data);
        } else {
            $data['subview'] = 'admin/Human_resources/add_employee/add_employee';
            $this->load->view('admin_index', $data);
        }
    }
    */
      public function index()
    {

       $data["last_emp_code"] = $this->Employee_model->select_last_code_2();
        $data['deyana'] =$this->Difined_model->select_search_key('employees_settings', 'type', '3');
        $data['type_card'] =$this->Difined_model->select_search_key('employees_settings', 'type', '5');
     
        $data['gender_data'] =$this->Difined_model->select_search_key('employees_settings', 'type', '1');

        $data['title'] = 'إضافة موظف';
        if ($this->input->post('admin_num')) {
            $data['id'] = $this->input->post('admin_num');
            $this->load->view('admin/Human_resources/add_employee/get_depart', $data);
        }elseif ($this->input->post('bank_num')) {
            $data['id'] = $this->input->post('admin_num');
            $this->load->view('admin/administrative_affairs/employee/new_employee/get_bank', $data);
        } else {
            $data['subview'] = 'admin/Human_resources/add_employee/add_employee';
            $this->load->view('admin_index', $data);
        }
    }
    public function add_personal_data()
    {
        if ($this->input->post('add')) {
            $img ='img';
            $img_file = $this->upload_image($img);
            $this->Employee_model->insert_emp($img_file);
                $this->message('success','إضافة بيانات الموظف بنجاح');
           redirect('human_resources/Human_resources','refresh');
        }
 $data['title']="البيانات الأساسية ";
        $data['subview'] = 'admin/Human_resources/add_employee/add_employee';
        $this->load->view('admin_index', $data);
    }
     public function edit_emp($code)

    {

      
        $data["current_hijry_year"] = $this->current_hjri_year();
       $data['gender_data'] =$this->Difined_model->select_search_key('employees_settings', 'type', '1');
        $data['deyana'] =$this->Difined_model->select_search_key('employees_settings', 'type', '3');
        $data['type_card'] =$this->Difined_model->select_search_key('employees_settings', 'type', '5');
        $data['emp'] =$this->Difined_model->select_search_key('employees', 'emp_code', $code)[0];

           if(isset($data['emp']) and $data['emp'] != null){
           $data['city_name']= $this->Employee_model->get_city_name($data['emp']->city_id_fk);
           $data['hai_name']= $this->Employee_model->get_city_name($data['emp']->hai_id_fk);
           $data['nationality_name']= $this->Employee_model->get_nationality_name($data['emp']->nationality);

           $data['dest_card_name']= $this->Employee_model->get_dest_card_name($data['emp']->dest_card);
    
           $data['status_name']= $this->Employee_model->get_status_name($data['emp']->status);    
           $emp_id= $data['emp']->id;

           $data["personal_data"]=$this->Employee_model->get_one_employee($emp_id);

           }

        $data['title']="البيانات الأساسية ";

        if ($this->input->post('add')) {

            if($this->input->post('add')){}
            $img ='img';
            $img_file = $this->upload_image_2($img, 'human_resources/emp_photo');

            $this->Employee_model->edit_emp($code,$img_file);
           redirect('human_resources/Human_resources/edit_emp/'.$code,'refresh');
        }

        $data['subview'] = 'admin/Human_resources/add_employee/add_employee';

        $this->load->view('admin_index', $data);

    }

    public function add_job_data($code)

    {

        $this->load->model('administrative_affairs_models/Prog_main_sitting_mo');

        if ($this->input->post('manage')) {

            $this->Employee_model->insert_manage_emp($code);

            redirect('human_resources/human_resources/add_job_data/'.$code,'refresh');

        }

      
        $data["personal_data"]=$this->Employee_model->get_one_employee($code);

        $data['emp'] =$this->Difined_model->select_search_key('employees', 'id', $code)[0];

        $data['admin'] = $this->Employee_model->select_data();

        $data['departs'] = $this->Employee_model->select_depart();

        $data['department_branch'] = $this->Employee_model->select_branch_department();
        $data['all_emps'] = $this->Difined_model->select_all('employees', '', '', 'id', 'desc');

        $data["direct_all_emps"] = $this->Employee_model->get_direct_manger($data["emp"]->administration);

        $data['deyana'] =$this->Difined_model->select_search_key('employees_settings', 'type', '3');

     $data['type_card'] =$this->Difined_model->select_search_key('employees_settings', 'type', '5');

        $data['dest_card'] =$this->Difined_model->select_search_key('employees_settings', 'type', '6');
        $data['cat_tamin'] =$this->Difined_model->select_search_key('employees_settings', 'type', '8');
        $data['job_role'] = $this->Difined_model->select_search_key('all_defined_setting', 'defined_type', '4');
        $data['manager_category']= $this->Employee_model->get_manager_cat();
           if(isset($data['emp']->reason) and $data['emp']->reason != null){

            $data['reason_name']= $this->Employee_model->get_reason_name($data['emp']->reason);

           }
         if(isset($data['emp']->employee_qualification) and $data['emp']->employee_qualification != null){

          $data['qualification_name']= $this->Employee_model->get_qualification_name($data['emp']->employee_qualification);

           }else{

           $data['qualification_name']= ''; 

           }
         if(isset($data['emp']->employee_degree) and $data['emp']->employee_degree != null){

          $data['employee_degree_name']= $this->Employee_model->get_employee_degree_name($data['emp']->employee_degree);

           }else{

           $data['employee_degree_name']= ''; 

           }

      if(isset($data['emp']->work_maktb) and $data['emp']->work_maktb != null){

          $data['work_maktb_name']= $this->Employee_model->get_work_maktb_name($data['emp']->work_maktb);

           }else{

           $data['work_maktb_name']= ''; 

           }
        if(isset($data['emp']->tamin_company) and $data['emp']->tamin_company != null){

         $data['tamin_company_name']= $this->Employee_model->get_work_maktb_name($data['emp']->tamin_company);
           }else{

           $data['tamin_company_name']= ''; 
           }
        $data['title']=" البيانات الوظيفيه";
        $data['subview'] = 'admin/Human_resources/add_employee/job_data';
        $this->load->view('admin_index', $data);

    }

  /*  public function edit_emp($code)
    {
       $this->load->model('human_resources_model/employee_setting/Employee_setting');  //Osama
        $data['cities']= $this->Employee_setting->select_areas();//Osama
        $data['ahais']= $this->Employee_setting->select_residentials();
   
        $data["current_hijry_year"] = $this->current_hjri_year();
        $data['gender_data'] =$this->Difined_model->select_search_key('employees_settings', 'type', '1');
        $data['nationality'] =$this->Difined_model->select_search_key('employees_settings', 'type', '2');
        $data['deyana'] =$this->Difined_model->select_search_key('employees_settings', 'type', '3');
        $data['type_card'] =$this->Difined_model->select_search_key('employees_settings', 'type', '5');
        $data['dest_card'] =$this->Difined_model->select_search_key('employees_settings', 'type', '6');
        $data['company'] =$this->Difined_model->select_search_key('employees_settings', 'type', '7');
        $data['cat_tamin'] =$this->Difined_model->select_search_key('employees_settings', 'type', '8');
        $data['degree_qual'] =$this->Difined_model->select_search_key('employees_settings', 'type', '14');
        $data['qualification'] =$this->Difined_model->select_search_key('employees_settings', 'type', '15');
        $data['social_status'] =$this->Difined_model->select_search_key('employees_settings', 'type', '4');   

        $data['emp'] =$this->Difined_model->select_search_key('employees', 'emp_code', $code)[0];
         
           if(isset($data['emp']->city_id_fk) and $data['emp']->city_id_fk != null){
           $data['city_name']= $this->Employee_model->get_city_name($data['emp']->city_id_fk);
           }
         
         
         
       $data['hai_name']= $this->Employee_model->get_city_name($data['emp']->hai_id_fk);
         //yara
       $data['nationality_name']= $this->Employee_model->get_nationality_name($data['emp']->nationality);
       $data['dest_card_name']= $this->Employee_model->get_dest_card_name($data['emp']->dest_card);
       $data['status_name']= $this->Employee_model->get_status_name($data['emp']->status);    
       
       
          
        $data['banks'] = $this->Difined_model->select_all('banks_settings','','',"","");
           $emp_id= $data['emp']->id;
        $data["personal_data"]=$this->Employee_model->get_one_employee($emp_id);
        $data['title']="البيانات الأساسية ";
        if ($this->input->post('add')) {
            if($this->input->post('add')){}
            $img ='img';
          //  $img_file = $this->upload_image($img);
            $img_file = $this->upload_image_2($img, 'human_resources/emp_photo');
            $this->Employee_model->edit_emp($code,$img_file);
          // redirect('human_resources/Human_resources','refresh');
           redirect('human_resources/Human_resources/edit_emp/'.$code,'refresh');
        }
        $data['subview'] = 'admin/Human_resources/add_employee/add_employee';
        $this->load->view('admin_index', $data);
    }*/
    
   /* public function add_job_data($code)
    {
        $this->load->model('administrative_affairs_models/Prog_main_sitting_mo');
        if ($this->input->post('manage')) {
            $this->Employee_model->insert_manage_emp($code);
            redirect('human_resources/human_resources/add_job_data/'.$code,'refresh');
        }
        $data['reasons_employees_cases'] =$this->Difined_model->select_search_key('employees_settings', 'type', '18');
        //$this->test($this->Employee_model->get_one_employee($code));
        $data["personal_data"]=$this->Employee_model->get_one_employee($code);
        $data['emp'] =$this->Difined_model->select_search_key('employees', 'id', $code)[0];
        $data['admin'] = $this->Employee_model->select_data();
        $data['departs'] = $this->Employee_model->select_depart();
        $data['department_branch'] = $this->Employee_model->select_branch_department();
        $data['contracts'] = $this->Prog_main_sitting_mo->select_sittings(5);
        $data['all_emps'] = $this->Difined_model->select_all('employees', '', '', 'id', 'desc');
      //  $data['direct_all_emps'] = $this->Employee_model->select_all_except('employees', 'id',$code , 'id', 'desc');
       
        $data["direct_all_emps"] = $this->Employee_model->get_direct_manger($data["emp"]->administration);
        $data['nationality'] =$this->Difined_model->select_search_key('employees_settings', 'type', '2');
        $data['deyana'] =$this->Difined_model->select_search_key('employees_settings', 'type', '3');
        $data['type_card'] =$this->Difined_model->select_search_key('employees_settings', 'type', '5');
        $data['dest_card'] =$this->Difined_model->select_search_key('employees_settings', 'type', '6');
        $data['company'] =$this->Difined_model->select_search_key('employees_settings', 'type', '7');
        $data['cat_tamin'] =$this->Difined_model->select_search_key('employees_settings', 'type', '8');
        $data['degree_qual'] =$this->Difined_model->select_search_key('employees_settings', 'type', '14');
        $data['qualification'] =$this->Difined_model->select_search_key('employees_settings', 'type', '15');
       $data['all_maktb'] =$this->Difined_model->select_search_key('employees_settings', 'type', '12');
        $data['job_role'] = $this->Difined_model->select_search_key('all_defined_setting', 'defined_type', '4');
        
        $data['manager_category']= $this->Employee_model->get_manager_cat();
           //yara get_qualification_name
        
           if(isset($data['emp']->reason) and $data['emp']->reason != null){
            $data['reason_name']= $this->Employee_model->get_reason_name($data['emp']->reason);
           }
        
         if(isset($data['emp']->employee_qualification) and $data['emp']->employee_qualification != null){
          $data['qualification_name']= $this->Employee_model->get_qualification_name($data['emp']->employee_qualification);
           }else{
           $data['qualification_name']= ''; 
           }


         if(isset($data['emp']->employee_degree) and $data['emp']->employee_degree != null){
          $data['employee_degree_name']= $this->Employee_model->get_employee_degree_name($data['emp']->employee_degree);
        
           }else{
           $data['employee_degree_name']= ''; 
           }

      if(isset($data['emp']->work_maktb) and $data['emp']->work_maktb != null){
          $data['work_maktb_name']= $this->Employee_model->get_work_maktb_name($data['emp']->work_maktb);
        
           }else{
           $data['work_maktb_name']= ''; 
           }

       
        if(isset($data['emp']->tamin_company) and $data['emp']->tamin_company != null){
         $data['tamin_company_name']= $this->Employee_model->get_work_maktb_name($data['emp']->tamin_company);
           }else{
           $data['tamin_company_name']= ''; 
           }
        $data['title']=" البيانات الوظيفيه";
        $data['subview'] = 'admin/Human_resources/add_employee/job_data';
        $this->load->view('admin_index', $data);
    }
    */
    
    
  /*****************************************************************/  
  
//======================= ahmed zedan ==============================================================  
   /* public function financeEmployee($empCode) // human_resources/Human_resources/financeEmployee/1
    {
        if($this->input->post('add')) {
            $this->Finance_employee_model->financeEmployee($this->uri->segment(4));
            messages('success','تسجيل البيانات المالية للموظف');
        }
        $data["personal_data"]=$this->Employee_model->get_one_employee($empCode);
        $data['allData'] = $this->Finance_employee_model->getAllData($empCode)[0];
        $data['employee'] = $this->Finance_employee_model->getEmpData($empCode);
        $data['badalat'] = $this->Finance_employee_model->getBadalat(1);
        $data['discounts'] = $this->Finance_employee_model->getBadalat(2);
        $data['banks'] = $this->Finance_employee_model->getBanks();
        $data['markz'] =$this->Difined_model->select_search_key('employees_settings', 'type', '9'); 
    	$data['title'] = 'البيانات المالية للموظف';
    	$data['subview'] = 'admin/Human_resources/finance_employee';
        $this->load->view('admin_index', $data);
    } */
        public function financeEmployee($empCode){ // human_resources/Human_resources/financeEmployee/1
        if($this->input->post('add')) {
            $this->Finance_employee_model->financeEmployee($this->uri->segment(4));
              $this->messages('success','تسجيل البيانات المالية للموظف');
             
        redirect('human_resources/Human_resources/financeEmployee/'.$empCode,'refresh');
        }
        $data["personal_data"]=$this->Employee_model->get_one_employee($empCode);
        $data['allData'] = $this->Finance_employee_model->getAllData($empCode)[0];
        $data['employee'] = $this->Finance_employee_model->getEmpData($empCode);
        $data['badalat'] = $this->Finance_employee_model->getBadalat(1);
        $data['discounts'] = $this->Finance_employee_model->getBadalat(2);
        $data['banks'] = $this->Finance_employee_model->getBanks();
        $data['markz'] =$this->Difined_model->select_search_key('employees_settings', 'type', '17');
        $data['bdalat_id'] = $this->Finance_employee_model->getBadalat_id(1);
        $data['cuts_id'] = $this->Finance_employee_model->getBadalat_id(2);
    	$data['title'] = 'البيانات المالية للموظف';
    	$data['subview'] = 'admin/Human_resources/finance_employee';
        $this->load->view('admin_index', $data);
       }
       //-----------------------------------------
       public function delete_emp_finance_data($id,$empCode,$value,$type){
              $this->Finance_employee_model->delete_badl($id,$empCode,$value,$type);
              redirect('human_resources/Human_resources/financeEmployee/'.$empCode,'refresh');
        }
       //-----------------------------------------
        public function add_record() {
            $ids=$this->input->post('valu');
            $data['type']=$this->input->post('type');
            $data['len']=$this->input->post('len');
            $data['records']=$this->Finance_employee_model->get_all_badalat($data['type'],$ids);
            $this->load->view('admin/Human_resources/add_row',$data);
        }
       //-----------------------------------------
       /* public function getBanks()
        {
            $data['number'] = $this->input->post('numbers')+$this->input->post('count');
            $data['banks'] = $this->Finance_employee_model->getBanks();
            $this->load->view('admin/Human_resources/getBanks',$data);
        }*/
       //-----------------------------------------
        public function getBanks(){    
             $data['number'] = $this->input->post('count');
             $data['banks'] = $this->Finance_employee_model->getBanks();
           $this->load->view('admin/Human_resources/getBanks',$data);
        }
        //-----------------------------------------
        public function add_option_select(){
             $ids=$this->input->post('valu');
             $data['type']=$this->input->post('type');
             $data['records']=$this->Finance_employee_model->get_all_badalat($data['type'],$ids);
             $this->load->view('admin/Human_resources/get_option_select',$data);
         }
        //-----------------------------------------
        public function change_status(){
            $id=$this->input->post('row');
            $emp_code=$this->input->post('emp_code');
            $approved=$this->input->post('approved');
            $this->Finance_employee_model->change_bank_status($id,$emp_code,$approved);
            echo "تم تغير حاله البنك";
        }
//======================= ahmed zedan ==============================================================
        
    public function deleteFinanceEmp($id,$empCode)
    {
        $this->Finance_employee_model->deleteFinanceEmp($id);
        redirect('human_resources/Human_resources/financeEmployee/'.$empCode,'refresh');
    }
    public function deleteAllFinanceEmployee($empCode)
    {
        $this->Finance_employee_model->deleteAllFinanceEmployee($empCode);
         $this->messages('success','تعديل البيانات المالية للموظف');
        redirect('human_resources/Human_resources/financeEmployee/'.$empCode,'refresh');
    }
    /************************************************/
    private function cheek_link($last_id){
     $this->load->model('Difined_model');
     $key=$last_id;
     $arr_in=array("emp_code"=>$key);
     $cheek_value["contract_employe"]=$this->Difined_model->getByArray("contract_employe",$arr_in);
     $cheek_value["emp_files"]=$this->Difined_model->getByArray("emp_files",$arr_in);    
    return $cheek_value;
  }
    public function contractEmployee($empCode) // human_resources/Human_resources/contractEmployee/7
    {
        $this->load->model('Difined_model');
        $this->load->model('human_resources_model/Contract_employee_model');  
        if($this->input->post('add')){
       // $this->test($_POST);
        
        $this->Contract_employee_model->insert();
       //messages('success','إضافة بيانات التعاقد بنجاح');
        $this->message('success','إضافة بيانات التعاقد بنجاح');
        redirect("human_resources/Human_resources/contractEmployee/".$empCode."");
        }
        $data["personal_data"]=$this->Employee_model->get_one_employee($empCode);
        $data["emp_salary"]=$this->Contract_employee_model->get_emp_salary($empCode);
        $data['all_links']=$this->cheek_link($data["personal_data"][0]->emp_code);
        
        $data['all_field']=$this->Difined_model->get_field('contract_employe');
        $data['employee_data']=$this->Contract_employee_model->get_emp_data($empCode);
        $data['check_finance_data']=$this->Contract_employee_model->check_finance_data($empCode);
         // $this->test($data['check_finance_data']);
        $data['banks_data']=$this->Contract_employee_model->get_banks_data($empCode);
        $data["tickets"]=$this->Difined_model->select_search_key('employees_settings','type',13);
        $data["contract_nature"]=$this->Difined_model->select_search_key('employees_settings','type',10);
        $data["job_types"]=$this->Difined_model->select_search_key('hr_forms_settings','type',2);
          $data['emp'] =$this->Difined_model->select_search_key('contract_employe', 'id', $empCode)[0];
         
        
        
        if(isset($data['emp']->travel_type_fk) and $data['emp']->travel_type_fk != null){
         $data['travel_type_name']= $this->Employee_model->get_status_name($data['emp']->travel_type_fk);   
        }
        $data['title'] = 'بيانات التعاقد للموظف';
        $data['subview'] = 'admin/Human_resources/contractEmployee';
        $this->load->view('admin_index', $data);
    }
/**********************************************************/
    public function cheek_link_all($last_id){
     $this->load->model('human_resources_model/Printer_machin_employee_model');  
     $key=$last_id;
     $arr_in=array("emp_code"=>$key);
     $cheek_value["printer_machin"]=$this->Printer_machin_employee_model->getByArray("period_emp_details",$arr_in);    
     return $cheek_value;
      }
    public function printer_machin_Employee($empCode) // human_resources/Human_resources/printer_machin_Employee/7
    {
        $this->load->model('Difined_model');
        $this->load->model('human_resources_model/Printer_machin_employee_model');  
        if($this->input->post('add')){
        $this->Printer_machin_employee_model->insert();
         $this->messages('success','إضافة  مواعيد العمل');
        redirect("human_resources/Human_resources/printer_machin_Employee/".$empCode."");
        }
        
        $data["my_always"]=$this->Printer_machin_employee_model->get_my_always_times($empCode);
        $data["last_period_id_fk"]=$this->Printer_machin_employee_model->get_last_period_id_fk($empCode);
        $data["personal_data"]=$this->Employee_model->get_one_employee($empCode);
        $data['all_links']=$this->cheek_link_all($data["personal_data"][0]->emp_code);
        $data['all_field']=$this->Printer_machin_employee_model->get_field('period_emp_details');
        $data['employee_data']=$this->Printer_machin_employee_model->get_emp_data($empCode);
        $data['always_setting_data']=$this->Printer_machin_employee_model->get_always_setting(); 
        $data["printer_machine"]=$this->Printer_machin_employee_model->select_search_key('employees_settings','type',11);
        $data['title'] = 'إضافة  مواعيد العمل ';
        $data['subview'] = 'admin/Human_resources/machine_added';
        $this->load->view('admin_index', $data);
    }    
    public function get_machin_employee_row(){
        // human_resources/Human_resources/get_machin_employee_row
        $this->load->model('Difined_model');
        if($this->input->post("period_id_fk")){
             $id = $this->input->post("always_id_fk") ;
          $data_load["len_class"] = $this->input->post("len") ;
          $data_load["always_id_fk"] = $this->input->post("always_id_fk") ; 
          $data_load["period_id_fk"] = $this->input->post("period_id_fk") ;  
          $data_load["data_period"]=$this->Difined_model->getById("always_setting",$id);
           $this->load->view('admin/Human_resources/get_machine_added'  , $data_load);    
        }
    }
    public function AddEmpAlwaysTimes(){
       $this->load->model('human_resources_model/Printer_machin_employee_model'); 
         $this->Printer_machin_employee_model->insert_emp_always_times();
     } 
    public function UpdateEmpAlwaysTimes(){
        $this->load->model('human_resources_model/Printer_machin_employee_model'); 
            if($this->input->post("update_id")){
                $id=$this->input->post("update_id");
             $data_load["data_period"]=$this->Printer_machin_employee_model->get_enp_times($id);
             $this->load->view('admin/Human_resources/get_updte_machine_added'  , $data_load);        
            }elseif($this->input->post("id_update") && $this->input->post("days_update") ){
                $id= $this->input->post("id_update") ;
                $this->Printer_machin_employee_model->update_emp_always_times($id);
            }
    } 
    public function DeleteEmpAlwaysTimes($id,$emp_id){
         $this->load->model('human_resources_model/Printer_machin_employee_model'); 
         $this->Printer_machin_employee_model->delete_emp_times($id);
        
        $this->message('error','تم حذف فترة الدوام  ');
        redirect("human_resources/Human_resources/printer_machin_Employee/".$emp_id."");
    }
       
    /*
  public function employee_files($empCode){ // Human_resources/Human_resources/employee_files/7
           $this->load->model('Difined_model');
           $this->load->model('human_resources_model/Files_employee_model');  
           if($this->input->post('add')){
           $total =$this->input->post('number');
            for($x=0;$x<$total;$x++){
            $death_certificate='emp_file'.$x.'';
            $files[$x]=$this->upload_file($death_certificate);   
            }
            $this->Files_employee_model->insert($this->uri->segment(4),$files);
            messages('success','تسجيل بيانات المستندات والبطاقات والمهارات');
            redirect("human_resources/Human_resources/employee_files/".$empCode."");
        }
        $data['allData'] = $this->Files_employee_model->getAllData($empCode);
        $data['employee'] = $this->Files_employee_model->getEmpData($empCode);
        $data['title'] = 'بيانات المستندات والبطاقات والمهارات';
        $data['subview'] = 'admin/Human_resources/employee_files';
        $this->load->view('admin_index', $data);    
}
   public function getfiles()
    {
        $data['number'] = $this->input->post('numbers');
        $this->load->view('admin/Human_resources/getfiles',$data);
    }
    */
   /* public function employee_files($empCode){ // human_resources/Human_resources/employee_files/7
           $this->load->model('Difined_model');
           $this->load->model('human_resources_model/Files_employee_model');  
           if($this->input->post('add')){
           $total = count($this->input->post('title'));
            for($x=0;$x<$total;$x++){
            $death_certificate='emp_file'.$x.'';
            $files[$x]=$this->upload_image($death_certificate);   
            }
            $this->Files_employee_model->insert($this->uri->segment(4),$files);
             $this->messages('success','تسجيل بيانات المستندات والبطاقات والمهارات');
            redirect("human_resources/Human_resources/employee_files/".$empCode."");
        }
        $data["personal_data"]=$this->Employee_model->get_one_employee($empCode);
        $data['files_names'] = $this->Difined_model->select_search_key("employees_settings",'type',16);
        $data['allData'] = $this->Files_employee_model->getAllData($empCode);
        $data['employee'] = $this->Files_employee_model->getEmpData($empCode);
        $data['title'] = 'بيانات المستندات والبطاقات والمهارات';
        $data['subview'] = 'admin/Human_resources/emp_files/employee_files';
        $this->load->view('admin_index', $data);    
}*/

    public function employee_files($empCode)
    { // human_resources/Human_resources/employee_files/7
        $this->load->model('Difined_model');
        $this->load->model('human_resources_model/Files_employee_model');
        /*if ($this->input->post('add')) {
            $total = count($this->input->post('title'));
            for ($x = 0; $x < $total; $x++) {
                $death_certificate = 'emp_file' . $x . '';
                $files[$x] = $this->upload_file($death_certificate,'human_resources/employee_files');
            }
            $this->Files_employee_model->insert($this->uri->segment(4), $files);
            $this->messages('success', 'تسجيل بيانات المستندات والبطاقات والمهارات');
            redirect("human_resources/Human_resources/employee_files/" . $empCode . "");
        }*/
         if ($this->input->post('add')) {
          

            //    $files = $this->upload_all_file('emp_file');
           $files = $this->upload_file('emp_file', 'human_resources/emp_mostnad_files');
            $this->Files_employee_model->insert($this->uri->segment(4), $files);
            $this->messages('success', 'تسجيل بيانات المستندات والبطاقات والمهارات');
            redirect("human_resources/Human_resources/employee_files/" . $empCode . "");
        }
        $data["personal_data"] = $this->Employee_model->get_one_employee($empCode);
        $data['files_names'] = $this->Difined_model->select_search_key("employees_settings", 'type', 16);
        $data['allData'] = $this->Files_employee_model->getAllData($empCode);
        $data['employee'] = $this->Files_employee_model->getEmpData($empCode);
        $data['title'] = 'بيانات المستندات والبطاقات والمهارات';
        $data['subview'] = 'admin/Human_resources/emp_files/employee_files';
        $this->load->view('admin_index', $data);
    }
    public function getfiles()
    {
        $this->load->model('Difined_model');
        $data['files_names'] = $this->Difined_model->select_search_key("employees_settings",'type',16);
        $data['number'] = $this->input->post('numbers');
        $data['inc'] = $this->input->post('inc');
        $this->load->view('admin/Human_resources/emp_files/getfiles',$data);
    }
    public function read_file()
    {
        $this->load->helper('file');
        $file_name=$this->uri->segment(4);
        $file_path = 'uploads/files/'.$file_name;
        header('Content-Type: application/pdf');
        header('Content-Discription:inline; filename="'.$file_name.'"');
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges:bytes');
        header('Content-Length: ' . filesize($file_path));
        readfile($file_path);
    }
    public function deletefilesEmp($id,$empCode)
    {
       $this->load->model('human_resources_model/Files_employee_model');  
        $this->Files_employee_model->deletefileEmp($id);
        redirect('human_resources/Human_resources/employee_files/'.$empCode,'refresh');
    }
    public function delete_employee_files($empCode)
    {
        $this->load->model('human_resources_model/Files_employee_model');  
        $this->employee_files($empCode);
         $this->messages('success','تعديل بيانات المستندات والبطاقات والمهارات');
        redirect('human_resources/Human_resources/employee_files/'.$empCode,'refresh');
    }    
/*****************************************************/
/*
public function custody($empCode){ // human_resources/Human_resources/custody/7
        $this->load->model('human_resources_model/Custody_employee_model'); 
        if($this->input->post('add')){
            $this->Custody_employee_model->insert($this->uri->segment(4));
            messages('success','تسجيل بيانات العهد');
            redirect("human_resources/Human_resources/custody/".$empCode."");
        }
        $data['allData'] = $this->Custody_employee_model->getAllData($empCode);
        $data['employee'] = $this->Custody_employee_model->getEmpData($empCode);
        $data['all_employee'] = $this->Custody_employee_model->getEmpData_exp($empCode);
        $data['custody'] = $this->Custody_employee_model->get_custody();
        $data['title'] = 'بيانات العهد';
        $data['subview'] = 'admin/Human_resources/custody/custody_added';
        $this->load->view('admin_index', $data);    
}
 public function get_custody()
    {
        $this->load->model('human_resources_model/Custody_employee_model'); 
        $data['custody'] = $this->Custody_employee_model->get_custody();
        $data['number'] = $this->input->post('numbers');
        $data['inc'] = $this->input->post('inc');
        $this->load->view('admin/Human_resources/custody/get_custody',$data);
    }
    */
    public function custody($empCode){     // human_resources/Human_resources/custody/7
        $this->load->model('human_resources_model/Custody_employee_model');
        $this->load->model('human_resources_model/Custody_devices_model');
        if($this->input->post('add')){
            $this->Custody_employee_model->insert($this->uri->segment(4));
             $this->messages('success','تسجيل بيانات العهد');
            redirect("human_resources/Human_resources/custody/".$empCode."");
        }
        $data["personal_data"]=$this->Employee_model->get_one_employee($empCode);
        $data['allData'] = $this->Custody_employee_model->getAllData($empCode);
        /*******************new***************/
        $data['all_Data_tansfer'] = $this->Custody_employee_model->getAllData_t($empCode);
        $data['all_Data_tansfered'] = $this->Custody_employee_model->getAllData_transfer($empCode);
        /*******************new***************/
        $data['employee'] = $this->Custody_employee_model->getEmpData($empCode);
        $data['all_employee'] = $this->Custody_employee_model->getEmpData_exp($empCode);
        $data['names'] =$this->Custody_devices_model->select_Name();
        $data['max_value'] = $this->Custody_devices_model->select_Max_value() ;
        $data['custody'] =$this->Custody_devices_model->select_all_();
        $data['title'] = 'بيانات العهد';
        $data['subview'] = 'admin/Human_resources/custody/custody_added';
        $this->load->view('admin_index', $data);
    }
    public function get_custody()
    {
        $this->load->model('human_resources_model/Custody_devices_model');
        $this->load->model('human_resources_model/Custody_employee_model');
        $data['custody'] =$this->Custody_devices_model->select_all_();
        $data['disabls'] = $this->Custody_devices_model->select_disabled();
        $data['max_value'] = $this->Custody_devices_model->select_Max_value() ;
        $data['number'] = $this->input->post('numbers');
        $data['inc'] = $this->input->post('inc');
        $this->load->view('admin/Human_resources/custody/get_custody',$data);
    }
    public function update_custody($empCode)
    {
        $this->custody($empCode);
         $this->messages('success','تعديل بيانات العهد');
        redirect('human_resources/Human_resources/custody/'.$empCode,'refresh');
    }  
    public function delete_custody($id,$empCode)
    {
       $this->load->model('human_resources_model/Custody_employee_model');  
       $this->Custody_employee_model->deleteCustody($id);
       redirect('human_resources/Human_resources/custody/'.$empCode,'refresh');
    }
    public function transfer_operation($cust_id_fk,$empCode)
    {
       $this->load->model('human_resources_model/Custody_employee_model');  
       if($this->input->post('action')){
       $this->Custody_employee_model->transfer_operation($empCode);
        $this->messages('success','تم تحويل العهدة');    
        }
        redirect('human_resources/Human_resources/custody/'.$empCode,'refresh');
    }
    /********************************/
    public function DeleteEmpAll($id){
        $this->Finance_employee_model->DeleteEmpAll($id);
         $this->messages('success','الحذف بنجاح');
        redirect('human_resources/Human_resources','refresh');
    }
    /*****************************************/
    public function GetMainName(){
        if($_POST['id']){
            $this->load->model('Difined_model');
            $this->load->model('human_resources_model/Custody_devices_model');
            $data['records'] =$this->Custody_devices_model->select_By_from_id($_POST['id']);
            $this->load->view('admin/Human_resources/custody/GetSubData',$data);
        }
    }
      /*********************** print ******************************/
    public function print_employee($id){ //human_resources/Human_resources/print_employee/987654321000
        $this->load->model('human_resources_model/Employee_print');
        $this->load->model('human_resources_model/Finance_employee_model');
        $this->load->model('human_resources_model/Contract_employee_model');
        $this->load->model('human_resources_model/Printer_machin_employee_model');
        $this->load->model('human_resources_model/Custody_employee_model');
        $data['departs'] = $this->Employee_print->select_depart();
        $data['department_branch'] = $this->Employee_print->select_branch_department();
        $data['job_role'] = $this->Employee_print->select_search_key('all_defined_setting', 'defined_type', '4');
        $data['contracts'] = $this->Employee_print->select_sittings(5);
        $data['admin'] = $this->Employee_print->select_by();
        $data['banks'] = $this->Finance_employee_model->getBanks();
        $data['badalat'] = $this->Finance_employee_model->getBadalat(1);
        $data['discounts'] = $this->Finance_employee_model->getBadalat(2);
        $data['banks_data']=$this->Contract_employee_model->get_banks_data($id);
        $data["tickets"]=$this->Employee_print->select_search_key('employees_settings','type',13);
        $data['always_setting_data']=$this->Printer_machin_employee_model->get_always_setting();
        $data['custody'] = $this->Custody_employee_model->get_custody();
        $data['direct_all_emps'] = $this->Employee_model->select_all_except('employees', 'id',$id , 'id', 'desc');
        $data['all_maktb'] =$this->Employee_print->select_search_key('employees_settings', 'type', '12');
        $data['markz'] =$this->Employee_print->select_search_key('employees_settings', 'type', '9');
        $data['tables'] = $this->Employee_print->employees_all_data($id);
        $this->load->view('admin/Human_resources/print/print_emplodee', $data);
    }
    /****************************************************************************************/
    /********************************ahmed*****************************/
    public function add_custody_devices(){     //human_resources/Human_resources/add_custody_devices
        $this->load->model('human_resources_model/Custody_devices_model');
        $this->load->model('Difined_model');
        if($this->input->post('add_main_device')) {
            /*
            PRINT_R($_POST);
            $this->test($_POST);
            DIE;*/
            $this->Custody_devices_model->insert_main_device();
            $this->message('success',' اﻹﺿﺎﻓﺔ');
            redirect("human_resources/Human_resources/add_custody_devices/");
        }elseif($this->input->post('add_sub_device')) {
            $this->Custody_devices_model->insert_sub_device();
            $this->message('success',' اﻹﺿﺎﻓﺔ ');
            redirect("human_resources/Human_resources/add_custody_devices/");
        }elseif($this->input->post('from_id_value')){
            $from_id_value = $this->input->post('from_id_value');
            $data['levels']=$this->Difined_model->select_search_key("custody_devices",'id',$from_id_value);
            $this->load->view('admin/Human_resources/custody_devices/get_data', $data);
        }else{
            $data['table']=$this->Custody_devices_model->select_all();
   //         $data['main_devices']=$this->Difined_model->select_all("custody_devices","","","","");
       $data['main_products']=$this->Custody_devices_model->select_all();
            $data['main_result_products']=$this->Custody_devices_model->select_all();
        $data['sub_products']=$this->Custody_devices_model->select_all_with_from();
            $data['title'] = 'العهــد';
         //   $data['subview'] = 'admin/Human_resources/custody_devices/add_custody_devices';
              $data['subview'] = 'admin/Human_resources/custody_devices/add_cust_devices';
            $this->load->view('admin_index', $data);
        }
    }
    public function update_custody_devices($id){
        $this->load->model('human_resources_model/Custody_devices_model');
        if($this->input->post('add_main_device')) {
            $this->Custody_devices_model->update_main_device($id);
            $this->message('success','التعديل');
            redirect("human_resources/Human_resources/add_custody_devices/");
        }elseif($this->input->post('add_sub_device')) {
            $this->Custody_devices_model->update_sub_device($id);
            $this->message('success','التعديل');
            redirect("human_resources/Human_resources/add_custody_devices/");
        }else{
            $data['table']=$this->Custody_devices_model->select_all();
            $data['main_devices']=$this->Difined_model->select_all("custody_devices","","","","");
            $data['result']=$this->Difined_model->getById("custody_devices",$id);
            $data['title'] = 'العهــد ';
           // $data['subview'] = 'admin/Human_resources/custody_devices/add_custody_devices';
                  $data['main_products']=$this->Custody_devices_model->select_all();
            $data['main_result_products']=$this->Custody_devices_model->select_all();
        $data['sub_products']=$this->Custody_devices_model->select_all_with_from();
           $data['subview'] = 'admin/Human_resources/custody_devices/add_cust_devices';
            $this->load->view('admin_index', $data);
        }
    }
    public function delete_device($id){
        $this->load->model('human_resources_model/Custody_devices_model');
        $this->Custody_devices_model->delete($id);
        $this->message('success', 'ﺗﻢ اﻟﺤﺬﻑ');
        redirect('human_resources/Human_resources/add_custody_devices', 'refresh');
    } 
    public function getAhai()
    {
        $this->load->model('human_resources_model/employee_setting/Employee_setting');  //Osama 
        $city_id = $this->input->post('city_id');
        $data['ahai'] = $this->Employee_setting->getAhai($city_id);
        $this->load->view('admin/Human_resources/add_employee/getAhai',$data);
    }
    /**************************************************************/
   
   /* 
    public function add_human_always_times(){ //human_resources/Human_resources/add_human_always_times
    $this->load->model('human_resources_model/Human_always_times_model');
    $this->load->model('Difined_model');
    $data['settings'] = $this->Difined_model->select_all('always_setting','','',"","");
    $data['records'] = $this->Human_always_times_model->select_all();
    if( $this->input->post('num')){
        $data ='';
        $this->load->view('admin/Human_resources/human_always_times/get_times',$data);
    }elseif ($this->input->post('update_id')){
        $data['settings'] = $this->Difined_model->select_all('always_setting','','',"","");
        $data['result'] = $this->Human_always_times_model->getById($this->input->post('update_id'));
        $data['period_num'] = $this->Human_always_times_model->get_period_num($this->input->post('update_id'));
        $this->load->view('admin/Human_resources/human_always_times/get_update_form',$data);
    }else{
        $data['title'] = 'مواعيد الدوام';
        $data['subview'] = 'admin/Human_resources/human_always_times/add_human_always_times';
        $this->load->view('admin_index', $data);
    }
}
public function add()
{
    $this->load->model('human_resources_model/Human_always_times_model');
    $this->Human_always_times_model->insert();

}
public function update()
{
    $this->load->model('human_resources_model/Human_always_times_model');
    $this->Human_always_times_model->update();
}
public function DeleteTimes($id){
    $this->load->model('human_resources_model/Human_always_times_model');
    $this->Human_always_times_model->delete($id);
    $this->message('success', 'ﺗﻢ اﻟﺤﺬﻑ');
    redirect('human_resources/Human_resources/add_human_always_times', 'refresh');
}
public function update_human_always_times(){ //human_resources/Human_resources/add_human_always_times
    $this->load->model('human_resources_model/Human_always_times_model');
    $this->load->model('Difined_model');
    $data['settings'] = $this->Difined_model->select_all('always_setting','','',"","");
    $data['records'] = $this->Human_always_times_model->select_all();
    if( $this->input->post('num')){
        $data ='';
        $this->load->view('admin/Human_resources/human_always_times/get_times',$data);
    }else{
        $data['title'] = 'مواعيد الدوام';
        $data['subview'] = 'admin/Human_resources/human_always_times/add_human_always_times';
        $this->load->view('admin_index', $data);
    }
}
   */ 
    
    public function add_human_always_times(){ //human_resources/Human_resources/add_human_always_times
    $this->load->model('human_resources_model/Human_always_times_model');
    $this->load->model('Difined_model');
    $data['settings'] = $this->Difined_model->select_all('always_setting','','',"","");
    $data['records'] = $this->Human_always_times_model->select_all();
    if ($this->input->post('update_id')){
        $data['settings'] = $this->Difined_model->select_all('always_setting','','',"","");
        $data['result'] = $this->Human_always_times_model->getById($this->input->post('update_id'));
        $data['period_num'] = $this->Human_always_times_model->get_period_num($this->input->post('update_id'));
        $this->load->view('admin/Human_resources/human_always_times/get_update_form',$data);
    }else{
        $data['title'] = 'مواعيد الدوام';
        $data['subview'] = 'admin/Human_resources/human_always_times/add_human_always_times';
        $this->load->view('admin_index', $data);
    }
}
    public function check_times(){
    $this->load->model('human_resources_model/Human_always_times_model');
    $data['num'] = $this->Human_always_times_model->getLastNum($_POST['id']);
    echo json_encode( $data['num']);
}
    public function add()
{
    $this->load->model('human_resources_model/Human_always_times_model');
    $this->Human_always_times_model->insert();

}
    public function update()
{
    $this->load->model('human_resources_model/Human_always_times_model');
    $this->Human_always_times_model->update();
}
    public function DeleteTimes($id){
    $this->load->model('human_resources_model/Human_always_times_model');
    $this->Human_always_times_model->delete($id);
    $this->message('success', 'ﺗﻢ اﻟﺤﺬﻑ');
    redirect('human_resources/Human_resources/add_human_always_times', 'refresh');
}
    public function update_human_always_times(){ //human_resources/Human_resources/add_human_always_times
    $this->load->model('human_resources_model/Human_always_times_model');
    $this->load->model('Difined_model');
    $data['settings'] = $this->Difined_model->select_all('always_setting','','',"","");
    $data['records'] = $this->Human_always_times_model->select_all();
    if( $this->input->post('num')){
        $data ='';
        $this->load->view('admin/Human_resources/human_always_times/get_times',$data);
    }else{
        $data['title'] = 'مواعيد الدوام';
        $data['subview'] = 'admin/Human_resources/human_always_times/add_human_always_times';
        $this->load->view('admin_index', $data);
    }
}
 /********************************************************/
 
 	public function edit_account($emp_code)
    {

       //$img=$this->upload_image_2('bank_image');
         $img=$this->upload_image_2('bank_image','human_resources/emp_banks');
        $this->Finance_employee_model->edit_bank_account($img);

        redirect('human_resources/Human_resources/financeEmployee/'.$emp_code,'refresh');
    }
    
 /****************************************/
 
 public function edit_having_employee($emp_code,$type)
    {
        $this->Finance_employee_model->update_discut_having_employee($emp_code,$type);
        redirect('human_resources/Human_resources/financeEmployee/'.$emp_code,'refresh');


    }

    public function fill_select_modal()
    {
       $data['options_modal']=$this->Finance_employee_model->get_option_for_modal_select();

        $data['selected_val']=$this->input->post('id');

        $this->load->view('admin/Human_resources/fill_select_modal',$data);
    }
    
 /********************************************************************************************/
 public function print_employee_details(){
     $id=$this->input->post('row_id');
    $this->load->model('Difined_model');
    $this->load->model('human_resources_model/Finance_employee_model');
    $this->load->model('human_resources_model/Employee_print');
    $this->load->model('human_resources_model/employee_setting/Employee_setting');
    $this->load->model('administrative_affairs_models/Prog_main_sitting_mo');
    $this->load->model('human_resources_model/Employee_model');
    $this->load->model('human_resources_model/Printer_machin_employee_model');
    /*************/
    $data['hai'] = $this->Employee_print->Gethai();
    $data["current_hijry_year"] = $this->current_hjri_year();
    $data['cities']= $this->Employee_setting->select_areas();
    $data['ahais']= $this->Employee_setting->select_residentials();
    $data['nationality'] =$this->Employee_print->GetSettings(2);
    $data['deyana'] =$this->Employee_print->GetSettings(3);
    $data['type_card'] =$this->Employee_print->GetSettings(5);
    $data['dest_card'] =$this->Employee_print->GetSettings(6);
    $data['company'] =$this->Employee_print->GetSettings(7);
    $data['cat_tamin'] =$this->Employee_print->GetSettings(8);
    $data['social_status'] =$this->Employee_print->GetSettings(4);
    $data['gender_data'] =$this->Employee_print->GetSettings(1);
    $data['degree_qual'] =$this->Employee_print->GetSettings(14);
    $data['qualification'] =$this->Employee_print->GetSettings(15);
    $data['banks'] = $this->Difined_model->select_all('banks_settings','','',"","");
    $data['departs'] = $this->Employee_model->select_depart();
    $data['department_branch'] = $this->Employee_model->select_branch_department();
    $data['contracts'] = $this->Prog_main_sitting_mo->select_sittings(5);
    $data['tables'] = $this->Employee_print->select_all($id);
    $data['badalat'] = $this->Finance_employee_model->getBadalat(1);
    $data['discounts'] = $this->Finance_employee_model->getBadalat(2);
    $data['cuts_id'] = $this->Finance_employee_model->getBadalat_id(2);
    $data['bdalat_id'] = $this->Finance_employee_model->getBadalat_id(1);
    $data['allData'] = $this->Finance_employee_model->getAllData($data['tables']['employees']->emp_code)[0];
    $data['markz'] =$this->Difined_model->select_search_key('employees_settings', 'type', '17');
    $data["tickets"]=$this->Difined_model->select_search_key('employees_settings','type',13);
    $data['files_names'] = $this->Difined_model->select_search_key("employees_settings",'type',16);
    $data["printer_machine"]=$this->Printer_machin_employee_model->select_search_key('employees_settings','type',11);
    $this->load->view('admin/Human_resources/print/print_employee_details', $data);
}

/*
public function print_card($id)
{
    $this->load->model('human_resources_model/Employee_print');
    $data["personal_data"]=$this->Employee_model->get_one_employee($id);
    $this->load->view('admin/Human_resources/print/print_card',$data);
}
 */
 
public function print_card()
{
    $id=$this->input->post('row_id');
    $this->load->model('human_resources_model/Employee_print');
    $data["personal_data"]=$this->Employee_model->get_one_employee($id);
    $this->load->view('admin/Human_resources/print/print_card',$data);
}
 
 
  public function get_tamin_value()
 {
    $emp_id= $this->input->post('emp_id');
     $nationality= $this->Finance_employee_model->get_nationality($emp_id);
     if($nationality==55) {
         echo $this->Finance_employee_model->get_emp_setting(0);
     }else{
         echo $this->Finance_employee_model->get_emp_setting(1);
     }
 }
 /*********************************************/
 
  public function refresh_page()
    {
        
        $this->Finance_employee_model->edit_table_finance();
    }   
    
     
     
     
     
     
   /* public function getConnection()
    {
        $this->load->model('human_resources_model/employee_setting/Employee_setting');  //Osama
        $all_Donors = $this->Employee_setting->select_all_areas();
        //$this->test( $all_Donors);
        $arr_donors = array();
        $arr_donors['data'] = array();

        if (!empty($all_Donors)) {
            foreach ($all_Donors as $row_donors) {

                $arr_donors['data'][] = array(
                    '<input type="radio" name="choosed" value="' . $row_donors->id . '"
                         ondblclick="GetMemberName(this)"   id="member' . $row_donors->id . '" data-city_name="' .  $row_donors->city_name  . '" data-hai_name="' . $row_donors->name . '"
                         data-city_id="' .  $row_donors->city_id  . '" data-hai_id="' . $row_donors->id . '"
                      />',
                      
                       $row_donors->city_name ,
                       $row_donors->name ,
                 
                );
            }
        }
         json_encode($arr_donors);


    } */
        public function getConnection()
    {
        $this->load->model('human_resources_model/employee_setting/Employee_setting');  //Osama
        $all_Donors = $this->Employee_setting->select_all_areas();
        //$this->test( $all_Donors);
        $arr_donors = array();
        $arr_donors['data'] = array();

        if (!empty($all_Donors)) {
            foreach ($all_Donors as $row_donors) {

                $arr_donors['data'][] = array(
                    '<input type="radio" name="choosed" value="' . $row_donors->id . '"
                         ondblclick="GetMemberName(this)"   id="member' . $row_donors->id . '" data-city_name="' .  $row_donors->city_name  . '" data-hai_name="' . $row_donors->name . '"
                         data-city_id="' .  $row_donors->city_id  . '" data-hai_id="' . $row_donors->id . '"
                      />',
                      
                       $row_donors->city_name ,
                       $row_donors->name ,
                 
                );
            }
        }
        echo json_encode($arr_donors);


    } 
   /************************************************/
   
       public function get_direct_manger()
    {
        $id = $this->input->post('depart_id');
        $data["direct_mangers"] = $this->Employee_model->get_direct_manger($id);
        echo json_encode($data["direct_mangers"]);

    }
    
   /*********************************************************************************/
   
    //YARA
    public function load_nationality()
    {
     
        $data['nationality'] =$this->Difined_model->select_search_key('employees_settings', 'type', '2');
        $this->load->view('admin/Human_resources/add_employee/load', $data);
    }
    public function add_nationality()
    
    { 
        
        
       
            $this->Employee_model->add_setting(2);
            $this->messages('success','إضافة ');
          
        
    }
    public function update_nationality()
    
    { 
        
        
        $id=$this->input->post('id');
            $this->Employee_model->update_setting(2,$id);
            $this->messages('success','تعديل ');
          
        
    }
    public function delete_nationality()
    
    { 
        
        
        $id=$this->input->post('id');
            $this->Employee_model->delete_setting($id);
            $this->messages('success','حذف ');
           
        
    }
    public function getById()
{

   
    $id=$this->input->post('id');
    $reason=$this->Employee_model->GetFromGeneral_settings($id,2);
    echo json_encode($reason);
    
}
//yara_mo2hl

public function load_status()
    {
     
     $data['social_status'] =$this->Difined_model->select_search_key('employees_settings', 'type', '4');
        $this->load->view('admin/Human_resources/add_employee/load_status', $data);
    }
    
    public function add_status()
    
    { 
        
        
       
            $this->Employee_model->add_setting_status(4);
            $this->messages('success','إضافة ');
           // redirect('md/all_gam3ia_omomia_odwiat/Gam3ia_omomia_odwiat/add_odwiat_data/'.$id, 'refresh');
        
    }
   
    public function getById_status()
    {
    
        
        $id=$this->input->post('id');
        $reason=$this->Employee_model->GetFromGeneral_settings($id,4);
        echo json_encode($reason);
        
    }
    public function update_status()
    
    { 
        
        
        $id=$this->input->post('id');
            $this->Employee_model->update_setting_status(4,$id);
            $this->messages('success','تعديل ');
           // redirect('md/all_gam3ia_omomia_odwiat/Gam3ia_omomia_odwiat/add_odwiat_data/'.$id, 'refresh');
        
    }
    public function delete_status()
    
    { 
        
        
        $id=$this->input->post('id');
            $this->Employee_model->delete_setting($id);
            $this->messages('success','حذف ');
           // redirect('md/all_gam3ia_omomia_odwiat/Gam3ia_omomia_odwiat/add_odwiat_data/'.$id, 'refresh');
        
    }

    //reason
    public function load_reason()
    {
     
        $data['reasons_employees_cases'] =$this->Difined_model->select_search_key('employees_settings', 'type', '18');
        $this->load->view('admin/Human_resources/add_employee/load_reasons', $data);
    }
    
    public function add_reason()
    
    { 
    
            $this->Employee_model->add_setting_reason(18);
            $this->messages('success','إضافة ');
           // redirect('md/all_gam3ia_omomia_odwiat/Gam3ia_omomia_odwiat/add_odwiat_data/'.$id, 'refresh');
        
    }
   
    public function getById_reason()
    {
    
        
        $id=$this->input->post('id');
        $reason=$this->Employee_model->GetFromGeneral_settings($id,18);
        echo json_encode($reason);
        
    }
    public function update_reason()
    { 
        
        
        $id=$this->input->post('id');
            $this->Employee_model->update_setting_reason(18,$id);
            $this->messages('success','تعديل ');
           // redirect('md/all_gam3ia_omomia_odwiat/Gam3ia_omomia_odwiat/add_odwiat_data/'.$id, 'refresh');
        
    }
    public function delete_reason()
    { 

        $id=$this->input->post('id');
            $this->Employee_model->delete_setting($id);
            $this->messages('success','حذف ');
           // redirect('md/all_gam3ia_omomia_odwiat/Gam3ia_omomia_odwiat/add_odwiat_data/'.$id, 'refresh');
        
    }
    
   /////
   public function load_employee_degree()
   {
    
    
    $data['degree_qual'] =$this->Difined_model->select_search_key('employees_settings', 'type', '14');
       $this->load->view('admin/Human_resources/add_employee/load_employee_degree', $data);
   }
   
   public function add_employee_degree()
   
   { 
   
           $this->Employee_model->add_employee_degree(14);
           $this->messages('success','إضافة ');
          // redirect('md/all_gam3ia_omomia_odwiat/Gam3ia_omomia_odwiat/add_odwiat_data/'.$id, 'refresh');
       
   }
  
   public function getById_employee_degree()
   {
   
       
       $id=$this->input->post('id');
       $reason=$this->Employee_model->GetFromGeneral_settings($id,14);
       echo json_encode($reason);
       
   }
   public function update_employee_degree()
   { 
       
       
       $id=$this->input->post('id');
           $this->Employee_model->update_employee_degree(14,$id);
           $this->messages('success','تعديل ');
          // redirect('md/all_gam3ia_omomia_odwiat/Gam3ia_omomia_odwiat/add_odwiat_data/'.$id, 'refresh');
       
   }
   public function delete_employee_degree()
   { 

       $id=$this->input->post('id');
           $this->Employee_model->delete_setting($id);
           $this->messages('success','حذف ');
          // redirect('md/all_gam3ia_omomia_odwiat/Gam3ia_omomia_odwiat/add_odwiat_data/'.$id, 'refresh');
       
   }
     /////////////////////////
     public function load_work_maktb()
     {
      
      
      
      $data['all_maktb'] =$this->Difined_model->select_search_key('employees_settings', 'type', '12');
         $this->load->view('admin/Human_resources/add_employee/load_work_maktb', $data);
     }
     
     public function add_work_maktb()
     
     { 
     
             $this->Employee_model->add_work_maktb(12);
             $this->messages('success','إضافة ');
            // redirect('md/all_gam3ia_omomia_odwiat/Gam3ia_omomia_odwiat/add_odwiat_data/'.$id, 'refresh');
         
     }
    
     public function getById_work_maktb()
     {
     
         
         $id=$this->input->post('id');
         $reason=$this->Employee_model->GetFromGeneral_settings($id,12);
         echo json_encode($reason);
         
     }
     public function update_work_maktb()
     { 
         
         
         $id=$this->input->post('id');
             $this->Employee_model->update_work_maktb(12,$id);
             $this->messages('success','تعديل ');
            // redirect('md/all_gam3ia_omomia_odwiat/Gam3ia_omomia_odwiat/add_odwiat_data/'.$id, 'refresh');
         
     }
     public function delete_work_maktb()
     { 
  
         $id=$this->input->post('id');
             $this->Employee_model->delete_setting($id);
             $this->messages('success','حذف ');
            // redirect('md/all_gam3ia_omomia_odwiat/Gam3ia_omomia_odwiat/add_odwiat_data/'.$id, 'refresh');
         
     }  
     //////////////////////
       
     public function load_tamin_company()
     {
      
      
      
    
    
      $data['company'] =$this->Difined_model->select_search_key('employees_settings', 'type', '7');
         $this->load->view('admin/Human_resources/add_employee/load_tamin_company', $data);
     }
     
     public function add_tamin_company()
     
     { 
     
             $this->Employee_model->add_tamin_company(7);
             $this->messages('success','إضافة ');
            // redirect('md/all_gam3ia_omomia_odwiat/Gam3ia_omomia_odwiat/add_odwiat_data/'.$id, 'refresh');
         
     }
    
     public function getById_tamin_company()
     {
     
         
         $id=$this->input->post('id');
         $reason=$this->Employee_model->GetFromGeneral_settings($id,7);
         echo json_encode($reason);
         
     }
     public function update_tamin_company()
     { 
         
         
         $id=$this->input->post('id');
             $this->Employee_model->update_tamin_company(7,$id);
             $this->messages('success','تعديل ');
            // redirect('md/all_gam3ia_omomia_odwiat/Gam3ia_omomia_odwiat/add_odwiat_data/'.$id, 'refresh');
         
     }
     public function delete_tamin_company()
     { 
  
         $id=$this->input->post('id');
             $this->Employee_model->delete_setting($id);
             $this->messages('success','حذف ');
            // redirect('md/all_gam3ia_omomia_odwiat/Gam3ia_omomia_odwiat/add_odwiat_data/'.$id, 'refresh');
         
     }  
     ///////////////////
  
     public function load_travel_type()
     {
      
      
      
    
    
        $data["tickets"]=$this->Difined_model->select_search_key('employees_settings','type',13);
         $this->load->view('admin/Human_resources/add_employee/load_travel_type', $data);
     }
     
     public function add_travel_type()
     
     { 
     
             $this->Employee_model->add_travel_type(13);
             $this->messages('success','إضافة ');
            // redirect('md/all_gam3ia_omomia_odwiat/Gam3ia_omomia_odwiat/add_odwiat_data/'.$id, 'refresh');
         
     }
    
     public function getById_travel_type()
     {
     
         
         $id=$this->input->post('id');
         $reason=$this->Employee_model->GetFromGeneral_settings($id,13);
         echo json_encode($reason);
         
     }
     public function update_travel_type()
     { 
         
         
         $id=$this->input->post('id');
             $this->Employee_model->update_travel_type(13,$id);
             $this->messages('success','تعديل ');
            // redirect('md/all_gam3ia_omomia_odwiat/Gam3ia_omomia_odwiat/add_odwiat_data/'.$id, 'refresh');
         
     }
     public function delete_travel_type()
     { 
  
         $id=$this->input->post('id');
             $this->Employee_model->delete_setting($id);
             $this->messages('success','حذف ');
            // redirect('md/all_gam3ia_omomia_odwiat/Gam3ia_omomia_odwiat/add_odwiat_data/'.$id, 'refresh');
         
     }   
    
    
    public function add_morfq(){
        $this->load->model('Difined_model');
        $this->load->model('human_resources_model/Files_employee_model');
        $this->Files_employee_model->add_morfqat();
        $data['files_names'] = $this->Difined_model->select_search_key("employees_settings", 'type', 16);

        $this->load->view('admin/Human_resources/emp_files/load_morfq',$data);
    }
    public function delete_files($id,$empCode){
        $this->load->model('human_resources_model/Files_employee_model');
        $this->Files_employee_model->delete_files($id);
        $this->messages('success', 'تم الحذف بنجاح  ');
        redirect("human_resources/Human_resources/employee_files/" . $empCode . "");

    }
     //yara
     public function data()
     {
           
         $customer =  $this->Employee_model->select_allEmployee();
        
      
   
         $arr = array();
         $arr['data'] = array();
         if(!empty($customer)){
             $x = 0;
             foreach($customer as $row){ 
                 $x++;
                 $a=1;
              $emp_type = array('لم تحدد' ,'نشط','موقوف');
                 
                 
              if ($row->employee_type == 1) {
                 $class = "success";
             } elseif ($row->employee_type == 2) {
                 $class = "danger";
             } elseif ($row->employee_type == 0) {
                 $class = "warning";
             }
                 
                 
   
                 
                 
                 $arr['data'][] = array(
               /*  if($row['file_update_date'] == 0 ){
                     echo '0';
                 }*/
                 
                     $a ,
                     $row->emp_code,
                     $row->employee,   
                    $row->phone,
                     
                      $row->card_num,
                     $row->nationality,
                   
                      '
                  
                      <span class="label label-pill label-'. $class .' m-r-15"
                      style="font-size: 12px;">'. $emp_type[$row->employee_type].' </span> ','
 
 
 
                      <div class="btn-group">
                      <button type="button" class="btn btn-danger">اضافه</button>
                      <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown"
                              aria-haspopup="true" aria-expanded="false">
                          <span class="caret"></span>
                          <span class="sr-only">Toggle Dropdown</span>
                      </button>
                      <ul class="dropdown-menu">
 
 
 
 
                       <li><a target="_blank"
                                 href="'. base_url() .'human_resources/Human_resources/edit_emp/'.$row->emp_code.'">البيانات
                                  الأساسية </a></li>
                          <li><a target="_blank"
                                 href="'. base_url() .'human_resources/Human_resources/add_job_data/'.$row->id.'">البيانات
                                  الوظيفيه </a></li>
                                  <li><a href="'. base_url()  .'human_resources/Human_resources/financeEmployee/'.$row->id.'">البيانات
 المالية </a></li>
 <li><a href="'. base_url()  .'human_resources/human_resources/contractEmployee/'.$row->id.'">بيانات
 التعاقد </a></li>
 <li><a href="'. base_url()  .'human_resources/human_resources/printer_machin_Employee/'.$row->id.'">بيانات
 الدوام </a></li>
 <li><a href="'. base_url()  .'human_resources/human_resources/employee_files/'.$row->id.'">
 المستندات والبطاقات والمهارات </a></li>
 <li><a href="'. base_url()  .'human_resources/human_resources/custody/'.$row->id.' ?>">
 شاشة العهد </a></li>
                         
                      </ul>
                  </div>
 
 
 
                                                                
                  <a href="'.base_url() .'human_resources/tamouh_emp/Tamouh/edit_emp/'.$row->emp_code.'?>"><i
                  class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>  
                  
                  
                  <a href="'.base_url() .'human_resources/tamouh_emp/Tamouh/DeleteEmpAll/'.$row->id.'?>"><i
                  class="fa fa-trash" aria-hidden="true"></i> </a>  
                                                                
                          
                                                 <a onclick="print_employee_details('. $row->id .')" title="طباعه"><i
                                             class="fa fa-print"></i></a>
 
                                            
                                                 <a onclick="print_card('. $row->id .')" title="طباعه"><i style="background-color: #0a568c"
                                             class="fa fa-print"></i></a>         
              
              
              
   
    
   '
   
   
   
  
 
                      
                 );
             }
         }
         $json = json_encode($arr);
         echo $json;
     }      



    //yara
    public function employees()//human_resources/human_resources/employees
    {
        $data['customer_js'] = $this->load->view('admin/Human_resources/add_employee/app_js', '', TRUE);
        $data['subview'] = 'admin/Human_resources/add_employee/employees';
        $this->load->view('admin_index', $data);

    }
    //yara


    
}// end class
/* End of file Finance_employee.php */
/* Location: ./application/controllers/human_ resources/Finance_employee.php */