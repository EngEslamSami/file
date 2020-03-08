<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Job_requests extends MY_Controller {
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
        $this->load->model('human_resources_model/employee_forms/Job_requests_model');
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
    function upload_muli_image($input_name)
    {
        $filesCount = count($_FILES[$input_name]['name']);

        for($i = 0; $i < $filesCount; $i++){
            $_FILES['userFile']['name'] = $_FILES[$input_name]['name'][$i];
            $_FILES['userFile']['type'] = $_FILES[$input_name]['type'][$i];
            $_FILES['userFile']['tmp_name'] = $_FILES[$input_name]['tmp_name'][$i];
            $_FILES['userFile']['error'] = $_FILES[$input_name]['error'][$i];
            $_FILES['userFile']['size'] = $_FILES[$input_name]['size'][$i];
            $all_img[]= $this->upload_image("userFile");
        }
        return $all_img;
    }
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
    private  function upload_file($file_name){
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
    }
    public function downloads($file) //  // human_resources/Human_resources/downloads
    {
        $this->load->helper('download');
        $name = $file;
        $data = file_get_contents('./uploads/files/'.$file); 
        force_download($name, $data); 
    }
    private function message($type,$text){
        if($type =='success') {
            return $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> تم بنجاح!</strong> '.$text.'.</div>');
        }elseif($type=='wiring'){
            return $this->session->set_flashdata('message','<div class="alert alert-dwarning alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>   !</strong> '.$text.'.</div>');
        }elseif($type=='error'){
            return  $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>!</strong> '.$text.'.</div>');
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
    /************************************************************/
    public function index(){//human_resources/employee_forms/Job_requests
        $data['emp_data'] = $this->Job_requests_model->select_depart();
        $data['jobtitles'] = $this->Job_requests_model->select_all_defined(4);
        $data['job_type'] = $this->Job_requests_model->select_forms_settings(1);
        $data['work_nature'] = $this->Job_requests_model->select_forms_settings(2);
        $data['records'] = $this->Job_requests_model->get_all('');
        $data['title'] = 'طلب إحتياج وظيفة';
        $data['subview'] = 'admin/Human_resources/employee_forms/add_job_request';
        $this->load->view('admin_index', $data);
    }
    public function add_job_request()
    {
        if ($this->input->post('add') =='add') {
        $this->Job_requests_model->insert();
        $this->message('success', 'تم إضافة إحتياج وظيفة بنجاح');
        redirect('human_resources/employee_forms/Job_requests','refresh');
        }
    }
    public function update_job_request($id)
    {
            $data['emp_data'] = $this->Job_requests_model->select_depart();
            $data['jobtitles'] = $this->Job_requests_model->select_all_defined(4);
            $data['job_type'] = $this->Job_requests_model->select_forms_settings(1);
            $data['work_nature'] = $this->Job_requests_model->select_forms_settings(2);
            $data['result'] = $this->Job_requests_model->get_all($id);
            $data['title'] = 'طلب إحتياج وظيفة';
            if($this->input->post('add') == 'add'){
            $this->Job_requests_model->update($id);
                $this->message('success', 'تم  التعديل بنجاح');
            redirect('human_resources/employee_forms/Job_requests','refresh');
            }else{
            $data['subview'] = 'admin/Human_resources/employee_forms/add_job_request';
             $this->load->view('admin_index', $data);
            }
    }
    public function Deletejob_request($id){
         $this->Job_requests_model->Deletejob_request($id);
        $this->message('error','تم حذف بنجاح ');
        redirect('human_resources/employee_forms/Job_requests','refresh');
    }

    /************************************************************/
    public function add_application(){//human_resources/employee_forms/Job_requests/add_application
        if($this->input->post('add')=== 'save_main_data'){
            $file=$this->upload_image("national_num_img");
              $personal_photo=$this->upload_image("personal_photo");
          //  $this->Job_requests_model->insert_main_data($file);
             $this->Job_requests_model->insert_main_data($file,$personal_photo);
            $this->message('success', 'تم إضافة  طلب التوظيف بنجاح');
            redirect('human_resources/employee_forms/Job_requests/add_application','refresh');
        }else{
            $data['gender'] = $this->Job_requests_model->select_employees_settings(1);
            $data['nationalities'] = $this->Job_requests_model->select_employees_settings(2);
            $data['social_status'] = $this->Job_requests_model->select_employees_settings(4);
            $data['jobs'] = $this->Job_requests_model->select_forms_settings(3);
            $data['reach_us'] = $this->Job_requests_model->select_forms_settings(4);
            $data['records'] = $this->Job_requests_model->select_all('job_request_orders');
            $data['title'] = 'طلبات التوظيف';
            $data['subview'] = 'admin/Human_resources/employee_forms/add_application';
            $this->load->view('admin_index', $data);
        }
    }

    public function update_application(){
        $id = $this->uri->segment(5);
        if($this->input->post('add')=== 'save_main_data'){
            $file=$this->upload_image("national_num_img");
            $personal_photo=$this->upload_image("personal_photo");
            $this->Job_requests_model->update_main_data($file,$id,$personal_photo);
          //  $this->Job_requests_model->update_main_data($file,$id);
            $this->message('success', 'تم إضافة  طلب التوظيف بنجاح');
            redirect('human_resources/employee_forms/Job_requests/add_application','refresh');
        }else{
            $data['gender'] = $this->Job_requests_model->select_employees_settings(1);
            $data['nationalities'] = $this->Job_requests_model->select_employees_settings(2);
            $data['social_status'] = $this->Job_requests_model->select_employees_settings(4);
            $data['jobs'] = $this->Job_requests_model->select_forms_settings(3);
            $data['reach_us'] = $this->Job_requests_model->select_forms_settings(4);
            $data['result'] = $this->Job_requests_model->getMaindataById($id);
            $data['title'] = 'طلبات التوظيف';
            $data['subview'] = 'admin/Human_resources/employee_forms/add_application';
            $this->load->view('admin_index', $data);
        }
    }




    public function Delete_application($id){
        $this->Job_requests_model->Delete_application($id);
        $this->message('error','تم حذف بنجاح ');
        redirect('human_resources/employee_forms/Job_requests/add_application','refresh');
    }

    /*************************************************************************************/
    public function add_record()
    {
        $data['jobtitles'] = $this->Job_requests_model->select_all_defined(4);
        $data['degree_qual'] =$this->Difined_model->select_search_key('employees_settings', 'type', '14');
        $data['qualification'] =$this->Difined_model->select_search_key('employees_settings', 'type', '15');

        $type= $this->input->post('type');
        if($type==1) {
            $this->load->view('admin/Human_resources/employee_forms/load_pages/work_load_page', $data);
        }
        if($type==2) {
            $this->load->view('admin/Human_resources/employee_forms/load_pages/science_load_page', $data);
        }
        if($type==3) {
            $this->load->view('admin/Human_resources/employee_forms/load_pages/training_load_page', $data);
        }
        if($type==4) {
            $data['efficiency'] = $this->Job_requests_model->select_forms_settings(5);
            $this->load->view('admin/Human_resources/employee_forms/load_pages/skills_load_page', $data);
        }
        if($type==5) {
            $data['len']= $this->input->post('len');
            $this->load->view('admin/Human_resources/employee_forms/load_pages/recognize_load_page', $data);
        }
    }
    
    public function add_previous_work()
    {
        if($this->input->post('add')){
            $id = $this->uri->segment(5);
            $this->Job_requests_model->insert_previous_work();
            $this->message('success','تمت الاضافه بنجاح ');
            redirect('human_resources/employee_forms/Job_requests/add_previous_work/'.$id,'refresh');
        }else{
            $data['personal_data'] = $this->Job_requests_model->getMaindataById($this->uri->segment(5));
            $data['record']=$this->Job_requests_model->get_by_id('hr_previous_work_job_orders');
            $data['jobtitles'] = $this->Job_requests_model->select_all_defined(4);
            $data['degree_qual'] =$this->Difined_model->select_search_key('employees_settings', 'type', '14');
            $data['qualification'] =$this->Difined_model->select_search_key('employees_settings', 'type', '15');
            $data['title'] = 'الأعمال التي سبق العمل بها';
            $data['subview'] = 'admin/Human_resources/employee_forms/previous_work';
            $this->load->view('admin_index', $data);
        }
    }


    public function add_science_qualification()
    {
        if($this->input->post('add')){
            $id = $this->uri->segment(5);
            $files = $this->upload_muli_image('userfile');
            $this->Job_requests_model->insert_science_data($files);
            $this->message('success','تمت الاضافه بنجاح ');
            redirect('human_resources/employee_forms/Job_requests/add_science_qualification/'.$id,'refresh');
        }else{
            $data['personal_data'] = $this->Job_requests_model->getMaindataById($this->uri->segment(5));
            $data['record']=$this->Job_requests_model->get_by_id('hr_qualification_job_orders');
            $data['jobtitles'] = $this->Job_requests_model->select_all_defined(4);
            $data['degree_qual'] =$this->Difined_model->select_search_key('employees_settings', 'type', '14');
            $data['qualification'] =$this->Difined_model->select_search_key('employees_settings', 'type', '15');
            $data['title'] = 'المؤهلات العلمية';
            $data['subview'] = 'admin/Human_resources/employee_forms/science_qualification';
            $this->load->view('admin_index', $data);
        }
    }


    public function add_dawrat()
    {
        if($this->input->post('add')){
            $id = $this->uri->segment(5);
            $files = $this->upload_muli_image('userfile');
            $this->Job_requests_model->insert_dawrat_data($files);
            $this->message('success','تمت الاضافه بنجاح ');
            redirect('human_resources/employee_forms/Job_requests/add_dawrat/'.$id,'refresh');
        }else{
            $data['personal_data'] = $this->Job_requests_model->getMaindataById($this->uri->segment(5));
            $data['record']=$this->Job_requests_model->get_by_id('hr_dwrat_job_orders');
            $data['jobtitles'] = $this->Job_requests_model->select_all_defined(4);
            $data['degree_qual'] =$this->Difined_model->select_search_key('employees_settings', 'type', '14');
            $data['qualification'] =$this->Difined_model->select_search_key('employees_settings', 'type', '15');
            $data['title'] = 'الدورات التدريبية';
            $data['subview'] = 'admin/Human_resources/employee_forms/dawrat';
            $this->load->view('admin_index', $data);
        }
    }

    public function add_skills()
    {
        if($this->input->post('add')){
            $id = $this->uri->segment(5);
            $this->Job_requests_model->insert_hopies_skills();
           
            $this->message('success','تمت الاضافه بنجاح ');
            redirect('human_resources/employee_forms/Job_requests/add_skills/'.$id,'refresh');
        }else{
            $data['personal_data'] = $this->Job_requests_model->getMaindataById($this->uri->segment(5));
            $data['record']=$this->Job_requests_model->get_by_id('hr_skills_job_orders');
            $data['jobtitles'] = $this->Job_requests_model->select_all_defined(4);
            $data['efficiency'] = $this->Job_requests_model->select_forms_settings(5);
            $data['degree_qual'] =$this->Difined_model->select_search_key('employees_settings', 'type', '14');
            $data['qualification'] =$this->Difined_model->select_search_key('employees_settings', 'type', '15');
            $data['title'] = 'الهوايات ومهارات';
            $data['subview'] = 'admin/Human_resources/employee_forms/skills';
            $this->load->view('admin_index', $data);
        }
    }


    public function add_persons()
    {
        if($this->input->post('add')){
            $id = $this->uri->segment(5);
            $this->Job_requests_model->insert_persons_job();
            $this->message('success','تمت الاضافه بنجاح ');
            redirect('human_resources/employee_forms/Job_requests/add_persons/'.$id,'refresh');
        }else{
            $data['personal_data'] = $this->Job_requests_model->getMaindataById($this->uri->segment(5));
            $data['record']=$this->Job_requests_model->get_by_id('hr_persons_job_orders');
            $data['jobtitles'] = $this->Job_requests_model->select_all_defined(4);
            $data['degree_qual'] =$this->Difined_model->select_search_key('employees_settings', 'type', '14');
            $data['qualification'] =$this->Difined_model->select_search_key('employees_settings', 'type', '15');
            $data['title'] = 'المعرفون';
            $data['subview'] = 'admin/Human_resources/employee_forms/persons';
            $this->load->view('admin_index', $data);
        }
    }


    /******************************************************************/
    public function delete_record()
    {
        $redir=$this->uri->segment(5);
        $id=$this->uri->segment(6);
        $table=$this->uri->segment(7);
        $method=$this->uri->segment(8);
        $this->Job_requests_model->delete_from_table($id,$table);
        $this->message('success','تم الحذف بنجاح ');
        redirect('human_resources/employee_forms/Job_requests/'.$method.'/'.$redir,'refresh');

    }
    /************************************************************/
     public function put_date()
    {
      $interview_date= $this->input->post('valu');
       $id= $this->input->post('id');
        $this->Job_requests_model->update_date($id,$interview_date);

    }

    //===============================================

    public function make_application($id)
    {

        $data['record']=$this->Job_requests_model->get_ById($id)[0];
        $data['items'] = $this->Job_requests_model->select_forms_settings(8);
        if($this->input->post('add'))
        {
           

           $this->Job_requests_model->insert_file($id);

            $this->message('success','تم الاضافه بنجاح ');
            redirect('human_resources/employee_forms/Job_requests/make_application/'.$id,'refresh');
        }
       $data['personal_data'] = $this->Job_requests_model->getMaindataById($this->uri->segment(5));
               //==============================
        $data['degrees'] = $this->Job_requests_model->get_degrees_from_tables($id);
        $data['positive'] = $this->Job_requests_model-> get_points($id,1);
        $data['negative'] = $this->Job_requests_model-> get_points($id,2);
        //==================================================
       
       
        $data['subview'] = 'admin/Human_resources/employee_forms/interview';
        $this->load->view('admin_index', $data);
    }
	 public function offer_work($id)
    {

        if($this->input->post('add'))
        {


            $this->Job_requests_model->insert_offer_work($id);

            $this->message('success','تم الاضافه بنجاح ');
            redirect('human_resources/employee_forms/Job_requests/offer_work/'.$id,'refresh');
        }
          $data['personal_data'] = $this->Job_requests_model->getMaindataById($this->uri->segment(5));
        $data['record']=$this->Job_requests_model->get_from_table($id);
        

        $data['title']="عرض عمل";
        $data['subview'] = 'admin/Human_resources/employee_forms/offerwork';
        $this->load->view('admin_index', $data);
    }
	
	

 public function delete_point($id,$url)
    {
        $this->Job_requests_model->delete_rec($id);
        redirect('human_resources/employee_forms/Job_requests/make_application/'.$url,'refresh');
    }
    
    	
    public function applicationsDetails(){//human_resources/employee_forms/Job_requests/applicationsDetails
             $data['jobs'] = $this->Job_requests_model->select_forms_settings_titles(3);
            $data['records'] = $this->Job_requests_model->all_before_interview('job_request_orders');
            $data['title'] = 'المقابلات الشخصية';
            $data['subview'] = 'admin/Human_resources/employee_forms/applicationsDetails';
            $this->load->view('admin_index', $data);
      
    }  
    
    
    
}