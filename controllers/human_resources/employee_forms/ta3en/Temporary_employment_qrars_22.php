<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Temporary_employment_qrars extends MY_Controller {
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
        $this->load->model('human_resources_model/employee_forms/ta3en/Temporary_employment_qrars_model');
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
    public function downloads($file) //
    {
        $this->load->helper('download');
        $name = $file;
        $data = file_get_contents('./uploads/files/'.$file); 
        force_download($name, $data); 
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

    public function add_temporary_employment_qrars(){
        // human_resources/employee_forms/ta3en/Temporary_employment_qrars/add_temporary_employment_qrars

        if ($this->input->post('add')) {
            $this->Temporary_employment_qrars_model->insert();
            $this->messages('success','تم الاضافة بنجاح');
           redirect('human_resources/employee_forms/ta3en/Temporary_employment_qrars/add_temporary_employment_qrars','refresh');
        }
        $data['all_emps'] = $this->Temporary_employment_qrars_model->get_emp(0);
        $data['admin'] = $this->Employee_model->select_by();
        $data['departs'] = $this->Temporary_employment_qrars_model->get_department();
        $data['jobtitles'] = $this->Temporary_employment_qrars_model->select_all_defined(4);
        $data['records'] = $this->Temporary_employment_qrars_model->select_all('');

        $data['title']=" قرار تعيين مؤقت";
        $data['subview'] = 'admin/Human_resources/employee_forms/ta3en/add_temporary_employment_qrars';
        $this->load->view('admin_index', $data);
    }
    public function edit_temporary_employment_qrars($id)
    {
        if ($this->input->post('add')) {
            $this->Temporary_employment_qrars_model->update($id);
            $this->messages('success','تم التعديل بنجاح');
            redirect('human_resources/employee_forms/ta3en/Temporary_employment_qrars/add_temporary_employment_qrars','refresh');
        }
        $data['title']="تعديل قرار تعيين مؤقت";
        $data['result'] = $this->Temporary_employment_qrars_model->GetById($id);

        $data['all_emps'] = $this->Temporary_employment_qrars_model->get_emp(0);
        $data['admin'] = $this->Employee_model->select_by();

        $data['departs'] = $this->Temporary_employment_qrars_model->get_department_by( $data['result']['edara_id_fk']);

        $data['jobtitles'] = $this->Temporary_employment_qrars_model->select_all_defined(4);
        $data['subview'] = 'admin/Human_resources/employee_forms/ta3en/add_temporary_employment_qrars';
        $this->load->view('admin_index', $data);
    }

    public function delete_temporary_employment_qrars($id)
    {
        $this->Temporary_employment_qrars_model->delete($id);
        $this->messages('success','تم الحذف بنجاح');
        redirect('human_resources/employee_forms/ta3en/Temporary_employment_qrars/add_temporary_employment_qrars');

    }


    public function GetDepartment()
    {
        if(!empty($this->input->post('id'))){
        $data_load["departments"]=$this->Difined_model->slect_where("department_jobs",array('from_id_fk'=>$this->input->post('id')),"","","","");
        $this->load->view('admin/Human_resources/employee_forms/ta3en/GetDepartment',$data_load);
        }
    }


    public function load_details(){

        $row_id = $this->input->post('row_id');
        $data["get_all"]=$this->Temporary_employment_qrars_model->select_all($row_id)[0];
        $this->load->view('admin/Human_resources/employee_forms/ta3en/load_details',$data);

    }
    public function print_qrar(){

        $row_id = $this->input->post('row_id');
        $data["records"]=$this->Temporary_employment_qrars_model->select_all($row_id)[0];
        $this->load->view('admin/Human_resources/employee_forms/ta3en/print_Temporary_employment_qrars',$data);

    }


    
}