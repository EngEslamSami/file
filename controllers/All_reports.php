<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class All_reports extends MY_Controller {

    public $CI = NULL;
    public function __construct()
	{
        parent::__construct();
        $this->load->library('pagination');
        $this->CI = & get_instance();
        if($this->session->userdata('is_logged_in')==0){
            redirect('login');
        }
        $this->load->helper(array('url','text','permission','form'));
        $this->load->model('system_management/Groups');
        $this->load->model('Difined_model');
        
        $this->groups=$this->Groups->get_group($_SESSION["group_number"]);
        $this->groups_title=$this->Groups->get_group_title($_SESSION["group_number"]); 
               /**********************************************************/ 
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in  = $this->Counting->get_basic_in_num();
        $this->files_basic_in  = $this->Counting->get_files_basic_in();  
      /*************************************************************/
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
    private function thumb($data)
	{
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

    private function upload_image($file_name)
	{
        $config['upload_path'] = 'uploads/images';
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf';
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

    private function upload_file($file_name)
	{
        $config['upload_path'] = 'uploads/files';
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
        $config['overwrite'] = true;
        $this->load->library('upload',$config);
        if(! $this->upload->do_upload($file_name)){
            return  false;
        }else {
            $datafile = $this->upload->data();
            return $datafile['file_name'];
        }
    }

    private function url()
	{
        unset($_SESSION['url']);
        $this->session->set_flashdata('url','http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
    }
  
    private function message($type,$text)
	{
        if($type =='success') {
            return $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> تم بنجاح!</strong> '.$text.'.</div>');
        }elseif($type=='wiring'){
            return $this->session->set_flashdata('message','<div class="alert alert-warning alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> تحذير  !</strong> '.$text.'.</div>');
        }elseif($type=='error'){
            return  $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>خطأ!</strong> '.$text.'.</div>');
        }
    }
	
	public function index()
    {

    }
      public function add_discharge_and_clearance(){//All_reports/add_discharge_and_clearance

        $this->load->model('discharge_and_clearance_model/Discharge_and_clearance_model');
        if($this->input->post('add') ){

            $this->Discharge_and_clearance_model->insert();
            $this->message('success','إضافةالمخالصة وإبراء الذمة');
            redirect('All_reports/add_discharge_and_clearance', 'refresh');
        }else{
        $data['records']=$this->Discharge_and_clearance_model->select_all();
        $data['employees']=$this->Discharge_and_clearance_model->select_all_emp();
        $data['title'] = ' المخالصة وإبراء الذمة';
        $data['subview'] = 'admin/discharge_and_clearance_view/discharge_and_clearance';
        $this->load->view('admin_index', $data);
        }
    }

    public function update_discharge_and_clearance($id){
        $this->load->model('discharge_and_clearance_model/Discharge_and_clearance_model');

        if($this->input->post('add') ){

            $this->Discharge_and_clearance_model->update($id);
            $this->message('success','تعديل المخالصة وإبراء الذمة');
          redirect('All_reports/add_discharge_and_clearance', 'refresh');
        }else{
        $data['result']=$this->Discharge_and_clearance_model->getById($id);
        $data['employees']=$this->Discharge_and_clearance_model->select_all_emp();
        $data['records']=$this->Discharge_and_clearance_model->select_all();
        $data['title'] = ' المخالصة وإبراء الذمة';
        $data['subview'] = 'admin/discharge_and_clearance_view/discharge_and_clearance';
            $this->load->view('admin_index', $data);
        }
    }


    public function delete_discharge_and_clearance($id){
        $this->load->model('discharge_and_clearance_model/Discharge_and_clearance_model');
        $this->Discharge_and_clearance_model->delete($id);
        redirect('All_reports/add_discharge_and_clearance');
    }
    
    
    
    /********************************************************************************/
 /* 6-4-2018   
    public function  All_employee_report(){   //All_reports/All_employee_report
    $this->load->model('administrative_affairs_models/employee');
    $this->load->model('Difined_model');
    $data['all_employee'] = $this->employee->select_all();
    $data['all_emp_allowances'] = $this->Difined_model->slect_where("all_defined_setting",array('defined_type'=>1),"","","","");
    $data['all_emp_deduction'] = $this->Difined_model->slect_where("all_defined_setting",array('defined_type'=>2),"","","","");
    $data['title'] = ' تقرير مسير المرتبات';
    $data['subview'] = 'admin/report_emp/all_employee_report';
    $this->load->view('admin_index', $data);
}

public function print_All_employee_report(){
    $this->load->model('administrative_affairs_models/employee');
    $this->load->model('Difined_model');
    $data['all_employee'] = $this->employee->select_all();
    $data['all_emp_allowances'] = $this->Difined_model->slect_where("all_defined_setting",array('defined_type'=>1),"","","","");
    $data['all_emp_deduction'] = $this->Difined_model->slect_where("all_defined_setting",array('defined_type'=>2),"","","","");
    $this->load->view('admin/report_emp/print_All_employee_report',$data);
}
*/ 
/************************************************************/


public function  All_employee_report(){   //All_reports/All_employee_report
    $this->load->model('administrative_affairs_models/employee');
    $this->load->model('Difined_model');
    $this->load->model('Report');
    $data['all_employee'] = $this->employee->select_all();
    $data['all_emp_allowances'] = $this->Difined_model->slect_where("all_defined_setting",array('defined_type'=>1),"","","","");
    $data['penalty_names'] = $this->Difined_model->slect_where("prog_main_sitting",array('type'=>3,'cash'=>1),"","","","");
    $data['arr'] = $this->employee->select_all_prog_main_sitting();
    $data['all_emp_deduction'] = $this->Difined_model->slect_where("all_defined_setting",array('defined_type'=>2),"","","","");
    $data['title'] = ' تقرير مسير المرتبات';
    $data['subview'] = 'admin/report_emp/all_employee_report';
    $this->load->view('admin_index', $data);
}

public function print_All_employee_report(){
    $this->load->model('administrative_affairs_models/employee');
    $this->load->model('Difined_model');
    $data['all_employee'] = $this->employee->select_all();
    $data['all_emp_allowances'] = $this->Difined_model->slect_where("all_defined_setting",array('defined_type'=>1),"","","","");
    $data['penalty_names'] = $this->Difined_model->slect_where("prog_main_sitting",array('type'=>3,'cash'=>1),"","","","");
    $data['arr'] = $this->employee->select_all_prog_main_sitting();
    $data['all_emp_deduction'] = $this->Difined_model->slect_where("all_defined_setting",array('defined_type'=>2),"","","","");
    $this->load->view('admin/report_emp/print_All_employee_report',$data);
}

public function  All_employee_report_2(){   //All_reports/All_employee_report
    $this->load->model('administrative_affairs_models/employee');
    $this->load->model('Difined_model');
    $this->load->model('Report');
    $data['all_employee'] = $this->employee->select_all();
    $data['all_emp_allowances'] = $this->Difined_model->slect_where("all_defined_setting",array('defined_type'=>1),"","","","");
    $data['penalty_names'] = $this->Difined_model->slect_where("prog_main_sitting",array('type'=>3,'cash'=>1),"","","","");
    $data['arr'] = $this->employee->select_all_prog_main_sitting();
    $data['all_emp_deduction'] = $this->Difined_model->slect_where("all_defined_setting",array('defined_type'=>2),"","","","");
    $data['title'] = ' تقرير مسير المرتبات';
    $data['subview'] = 'admin/report_emp/test';
    $this->load->view('admin_index', $data);
}



public function  All_employee_report_3(){   //All_reports/All_employee_report_2

 $this->load->model('administrative_affairs_models/employee');

    
$data['all_emp_salaries'] = $this->employee->all_emp_salary();

    $data['title'] = ' تقرير مسير المرتبات';
    $data['subview'] = 'admin/report_emp/test2';
    $this->load->view('admin_index', $data);

}

public function print_All_employee_report_3(){
    $this->load->model('administrative_affairs_models/Employee');
    $this->load->model('Difined_model');
  
  $data['all_emp_salaries'] = $this->Employee->all_emp_salary();
    $this->load->view('admin/report_emp/print_All_employee_report_2',$data);
}



public function  All_employee_report_male(){   //All_reports/All_employee_report_male

 $this->load->model('administrative_affairs_models/employee');

    
$data['all_emp_salaries'] = $this->employee->all_emp_salary(array('gender_id'=>1));

    $data['title'] = ' تقرير مسير المرتبات';
    $data['subview'] = 'admin/report_emp/male_salary';
    $this->load->view('admin_index', $data);

}

public function  All_employee_report_female(){   //All_reports/All_employee_report_female

 $this->load->model('administrative_affairs_models/employee');

    
$data['all_emp_salaries'] = $this->employee->all_emp_salary(array('gender_id'=>2));

    $data['title'] = ' تقرير مسير المرتبات';
    $data['subview'] = 'admin/report_emp/female_salary';
    $this->load->view('admin_index', $data);

}

/****************************************************************************/


public function all_volunteers_period() //All_reports/all_volunteers_period
{   $this->load->model('Report');
    if ($this->input->post('date_from') && $this->input->post('date_to') ) {
        $data['views'] =  $this->Report->get_volunteers_beetween_dates(strtotime($this->input->post('date_from')),strtotime($this->input->post('date_to')));
        $this->load->view('admin/reports/volunteers/load_pages/get_volunteers_data',$data);
    }else {
        $data['subview'] = 'admin/reports/volunteers/all_volunteers_period';
        $this->load->view('admin_index', $data);
    }
}


public function all_volunteers_bytype() //All_reports/all_volunteers_bytype
{   $this->load->model('Report');
    if ($this->input->post('type')) {
        $data['views'] =  $this->Report->get_volunteers_bytype($this->input->post('type'));
        $this->load->view('admin/reports/volunteers/load_pages/get_volunteers_data_bytype',$data);
    }else {
        $data['subview'] = 'admin/reports/volunteers/all_volunteers_bytype';
        $this->load->view('admin_index', $data);
    }
}


/*********************************************/


public function All_employee_dep_money()
    {
        $this->load->model('administrative_affairs_models/Department_jobs');
        $data['departments'] = $this->Department_jobs->select_allSub(array('from_id_fk!='=>0));
        $data['title'] = ' تقرير مسير المرتبات للقسم';
        $data['subview'] = 'admin/report_emp/All_employee_dep_money';
        $this->load->view('admin_index', $data);
    }

    public function Get_All_employee_dep_money()
    {
        $this->load->model('administrative_affairs_models/employee');
        
         $data['dep_name'] = $this->employee->get_dep_name($this->input->post("dep"));
        $data['all_emp_salaries'] = $this->employee->all_emp_salary(array('department'=>$this->input->post("dep")));
        $data['title'] = ' تقرير مسير المرتبات للقسم';
        $this->load->view('admin/report_emp/Get_All_employee_dep_money', $data);
    }
    
    /***************************************/

/******************* fff **********************/
public function all_emp_money()
    {
        $this->load->model('administrative_affairs_models/All_emp_money');
        $data['records'] = $this->All_emp_money->select();
        $data['title'] = ' تقرير مسير المرتبات';
        $data['subview'] = 'admin/report_emp/all_emp_money';
        $this->load->view('admin_index', $data);
    }

/**********************************************************/

}

/* End of file Administrative_affairs.php */