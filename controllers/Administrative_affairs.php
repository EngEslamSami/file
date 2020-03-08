<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrative_affairs extends MY_Controller {

    public $CI = NULL;
    public function __construct()
	{
        parent::__construct();
        $this->load->library('pagination');
        $this->CI = & get_instance();
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
        $this->load->model('Difined_model');
        
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
	
	public function Sitting()	// Administrative_affairs/Sitting
    {
        $this->load->model('administrative_affairs_models/Prog_main_sitting_mo');
        $data['banks'] = $this->Prog_main_sitting_mo->select_sittings(1);
        $data['missions'] = $this->Prog_main_sitting_mo->select_sittings(2);
        $data['penalties'] = $this->Prog_main_sitting_mo->select_sittings(3);
        $data['holidays'] = $this->Prog_main_sitting_mo->select_sittings(4);
        $data['contracts'] = $this->Prog_main_sitting_mo->select_sittings(5);
        $data['rewards'] = $this->Prog_main_sitting_mo->select_sittings(6);
                $data['job_titles'] = $this->Prog_main_sitting_mo->select_sittings(7);
        $data['permit_reasons'] = $this->Prog_main_sitting_mo->select_sittings(8);
            /******************************/
    $data['type_of_claim'] = $this->Prog_main_sitting_mo->select_sittings(9);
    /******************************/
        $data['title'] = 'إضافة الخصائص';
        $data['subview'] = 'admin/administrative_affairs/prog_main_sitting/prog_main_sitting';
        $this->load->view('admin_index', $data);
    }

    public function new_sitting($type)
    {
        $this->load->model('administrative_affairs_models/Prog_main_sitting_mo');
      //  $array = array(1=>'بنك', 2=>'نوع مهمة', 3=>'نوع جزاء', 4=>'نوع أجازة', 5=>'نوع عقد', 6=>'نوع مكافأة');
   $array = array(1=>'بنك', 2=>'نوع مهمة', 3=>'نوع جزاء', 4=>'نوع أجازة', 5=>'نوع عقد', 6=>'نوع مكافأة',7=>'مسمي وظيفي' ,8=>'أسباب الأذونات',9=>'نوع المطالبة');       
        if($this->input->post('add')){
            $this->Prog_main_sitting_mo->add($type);
            $this->message('success','إضافة '.$array[$type]);
            redirect('Administrative_affairs/Sitting','refresh');
        }
        $data['title'] = 'إضافة '.$array[$type];
        $data['subview'] = 'admin/administrative_affairs/prog_main_sitting/new_sitting';
        $this->load->view('admin_index', $data);
    }

    public function edit_sitting($type,$id)
    {
        $this->load->model('administrative_affairs_models/Prog_main_sitting_mo');
       // $array = array(1=>'بنك', 2=>'نوع مهمة', 3=>'نوع جزاء', 4=>'نوع أجازة', 5=>'نوع عقد', 6=>'نوع مكافأة');
        
   $array = array(1=>'بنك', 2=>'نوع مهمة', 3=>'نوع جزاء', 4=>'نوع أجازة', 5=>'نوع عقد', 6=>'نوع مكافأة',7=>'مسمي وظيفي' ,8=>'أسباب الأذونات',9=>'نوع المطالبة');        
        if($this->input->post('add')){
            $this->Prog_main_sitting_mo->update($id);
            $this->message('success','تعديل '.$array[$type]);
            redirect('Administrative_affairs/Sitting','refresh');
        }
        $data['title'] = 'تعديل '.$array[$type];
        $data['record'] = $this->Prog_main_sitting_mo->getById($id);
        $data['subview'] = 'admin/administrative_affairs/prog_main_sitting/new_sitting';
        $this->load->view('admin_index', $data);
    }

    public function delete_sitting($type,$id)
    {
        $this->load->model('administrative_affairs_models/Prog_main_sitting_mo');
      //  $array = array(1=>'بنك', 2=>'نوع مهمة', 3=>'نوع جزاء', 4=>'نوع أجازة', 5=>'نوع عقد');
    $array = array(1=>'بنك', 2=>'نوع مهمة', 3=>'نوع جزاء', 4=>'نوع أجازة', 5=>'نوع عقد', 6=>'نوع مكافأة',7=>'مسمي وظيفي' ,8=>'أسباب الأذونات',9=>'نوع المطالبة');      
        $this->Prog_main_sitting_mo->delete($id);
        $this->message('success','حذف '.$array[$type]);
        redirect('Administrative_affairs/Sitting','refresh');
    }

	public function add_main_department()	// Administrative_affairs/add_main_department
	{
        $this->load->model('administrative_affairs_models/Department_jobs');
        if ($this->input->post('add')){
            $this->Department_jobs->insert();
            $this->message('success','إضافة إدارة');
            redirect('Administrative_affairs/add_main_department','refresh');
        }
        $data['records'] = $this->Department_jobs->select_all();
        $data['title'] = 'إضافة إدارة';
        $data['subview'] = 'admin/administrative_affairs/departments/main_department';
        $this->load->view('admin_index', $data);
    }
	
	public function update_main_department($id)
	{
        $this->load->model('administrative_affairs_models/Department_jobs');
        if($this->input->post('update')){
            $this->Department_jobs->update($id);
            $this->message('success','تعديل إدارة');
            redirect('Administrative_affairs/add_main_department','refresh');
        }
        $data['results']=$this->Department_jobs->getById($id);
        $data['title'] = 'تعديل إدارة';
        $data['subview'] = 'admin/administrative_affairs/departments/main_department';
        $this->load->view('admin_index', $data);
    }
	
	public function delete_main_department($id)
	{
        $this->load->model('administrative_affairs_models/Department_jobs');
        $Conditions_arr=array("id"=>$id);
        $this->Difined_model->delete("department_jobs",$Conditions_arr);
        redirect('Administrative_affairs/add_main_department');
    }
	
	public function add_sub_department()	// Administrative_affairs/add_sub_department
	{
        $this->load->model('administrative_affairs_models/Department_jobs');
        if ($this->input->post('add')){
            $this->Department_jobs->insert_sub();
            $this->message('success','إضافة قسم');
            redirect('Administrative_affairs/add_sub_department','refresh');
        }
        $data['records'] = $this->Department_jobs->select_main();
        $data['title'] = 'إضافة قسم';
        $data['subview'] = 'admin/administrative_affairs/departments/sub_department';
        $this->load->view('admin_index', $data);
    }

    public function update_sub_department($id)
	{
        $this->load->model('administrative_affairs_models/Department_jobs');
        if($this->input->post('update')){
            $this->Department_jobs->update_sub($id);
            $this->message('success','تعديل قسم');
            redirect('Administrative_affairs/add_sub_department','refresh');
        }
        $data['records'] = $this->Department_jobs->select_main();
        $data['results']=$this->Department_jobs->getById($id);
        $data['title'] = 'تعديل قسم';
        $data['metadiscription'] = '';
        $data['subview'] = 'admin/administrative_affairs/departments/sub_department';
        $this->load->view('admin_index', $data);
    }
	
    
    
    public function add_employee()	// Administrative_affairs/add_employee
    {

        $this->load->model('administrative_affairs_models/Employee');
        $this->load->model('administrative_affairs_models/Prog_main_sitting_mo');
        $this->load->model('administrative_affairs_models/administrative_affairs_setting');
        $data['affairs_settings_options'] = $this->administrative_affairs_setting->select_all('administrative_affairs_settings','','','','');
        $data['count'] = $this->Difined_model->select_all('employees','','1','id','desc');
        $data['allowances'] = $this->Employee->select_badlat();
        $data['job_role'] = $this->Difined_model->select_search_key('all_defined_setting','defined_type','4');


        $data['free_days'] = $this->administrative_affairs_setting->select_all('vacations_settings','','','',''); //osama
        $data['free_days_data'] = $this->Employee->select_search_key('past_vacation','emp_id');  //osama

        $data['job_titles'] = $this->Prog_main_sitting_mo->select_sittings(7);

        $data['admin'] = $this->Employee->select_by();
        $data['departs'] = $this->Employee->select_depart();
        $data['records'] = $this->Employee->select_allEmployee();
        $data['banks'] = $this->Prog_main_sitting_mo->select_sittings(1);
        $data['contracts'] = $this->Prog_main_sitting_mo->select_sittings(5);
        $data['title'] = 'إضافة موظف';
        if($this->input->post('add')){


//$this->test($_POST);
            $img ='img';
            $img_file = $this->upload_file($img);
            $training = 'training';
            $training_file =$this->upload_file($training);
            $this->Employee->insert($img_file, $training_file);
            redirect('Administrative_affairs/add_employee', 'refresh');
        }elseif ($this->input->post('admin_num')) {
            $data['id']=$this->input->post('admin_num');
            $this->load->view('admin/administrative_affairs/employee/get_depart',$data);
        }else {
            $data['subview'] = 'admin/administrative_affairs/employee/add_employee';
            $this->load->view('admin_index', $data);
        }
    }

    public function edit_employee($id)
    {
        $this->load->model('administrative_affairs_models/Employee');
        $this->load->model('administrative_affairs_models/Prog_main_sitting_mo');
        $this->load->model('administrative_affairs_models/administrative_affairs_setting');
        $data['banks'] = $this->Prog_main_sitting_mo->select_sittings(1);
        $data['contracts'] = $this->Prog_main_sitting_mo->select_sittings(5);
        $data['result'] = $this->Difined_model->select_search_key('employees','id',$id);
        $data['count'] = $this->Difined_model->select_all('employees','','1','id','desc');
        $data['affairs_settings_options_FK'] = $this->administrative_affairs_setting->select_all('administrative_affairs_settings','','','','');
        $data['admin'] = $this->Employee->select_by();
        $data['departs'] = $this->Employee->select_depart();
        $data['job_role'] = $this->Difined_model->select_search_key('all_defined_setting','defined_type','4');
        $data['job_titles'] = $this->Prog_main_sitting_mo->select_sittings(7);
        $data['allowances'] = $this->Employee->select_badlat();
        // $data['deduction'] = $this->employee->get_emp_allowances_deduction_setting($id,'emp_deduction');
        // $this->test($data['allowances']);
        $data['update_link']="add_employee";
        $data['title'] = 'تعديل موظف';
        if($this->input->post('edit')){
            $img ='img';
            $img_file =$this->upload_file($img);
            $training ='training';
            $training_file =$this->upload_file($training);
            $this->Employee->update($id,$img_file,$training_file);
            redirect('Administrative_affairs/add_employee', 'refresh');
        }else{
            $data['subview'] = 'admin/administrative_affairs/employee/add_employee';
            $this->load->view('admin_index', $data);
        }
    }
    
/*	public function add_employee()	
	{
        $this->load->model('administrative_affairs_models/Prog_main_sitting_mo');
        $this->load->model('administrative_affairs_models/employee');
        $this->load->model('administrative_affairs_models/administrative_affairs_setting');
        $data['affairs_settings_options'] = $this->administrative_affairs_setting->select_all('administrative_affairs_settings','','','','');
        $data['count'] = $this->Difined_model->select_all('employees','','1','id','desc');
       
      // $data['allowances'] = $this->Difined_model->select_search_key('all_defined_setting','defined_type','1');
      // $data['deduction'] = $this->Difined_model->select_search_key('all_defined_setting','defined_type','2');
       $data['job_role'] = $this->Difined_model->select_search_key('all_defined_setting','defined_type','4');
       
        $data['admin'] = $this->employee->select_by();
        $data['departs'] = $this->employee->select_depart();
        $data['records'] = $this->employee->select_allEmployee();
        $data['banks'] = $this->Prog_main_sitting_mo->select_sittings(1);
        $data['contracts'] = $this->Prog_main_sitting_mo->select_sittings(5);
        $data['title'] = 'إضافة موظف';
        if($this->input->post('add')){
         
          $img ='img';
            $img_file = $this->upload_file($img);
            $training = 'training';
            $training_file =$this->upload_file($training);
            $this->employee->insert($img_file, $training_file);
            redirect('Administrative_affairs/add_employee', 'refresh');
        }elseif ($this->input->post('admin_num')) {
            $data['id']=$this->input->post('admin_num');
            $this->load->view('admin/administrative_affairs/employee/get_depart',$data);
        }else {
            $data['subview'] = 'admin/administrative_affairs/employee/add_employee';
            $this->load->view('admin_index', $data);
        }
    }

    public function edit_employee($id)
	{
        $this->load->model('administrative_affairs_models/employee');
        $this->load->model('administrative_affairs_models/Prog_main_sitting_mo');
        $this->load->model('administrative_affairs_models/administrative_affairs_setting');
        $data['banks'] = $this->Prog_main_sitting_mo->select_sittings(1);
        $data['contracts'] = $this->Prog_main_sitting_mo->select_sittings(5);
        $data['result'] = $this->Difined_model->select_search_key('employees','id',$id);
        $data['count'] = $this->Difined_model->select_all('employees','','1','id','desc');
        $data['affairs_settings_options_FK'] = $this->administrative_affairs_setting->select_all('administrative_affairs_settings','','','','');
        $data['admin'] = $this->employee->select_by();
        $data['departs'] = $this->employee->select_depart();
        $data['job_role'] = $this->Difined_model->select_search_key('all_defined_setting','defined_type','4');
          
      // $data['allowances'] = $this->employee->get_emp_allowances_deduction_setting($id,'emp_allowances');
      // $data['deduction'] = $this->employee->get_emp_allowances_deduction_setting($id,'emp_deduction');
        
       // $this->test($data['allowances']);
       
        
          
        $data['update_link']="add_employee";
        $data['title'] = 'تعديل موظف';
        if($this->input->post('edit')){
            $img ='img';
            $img_file =$this->upload_file($img);
            $training ='training';
            $training_file =$this->upload_file($training);
            $this->employee->update($id,$img_file,$training_file);
            redirect('Administrative_affairs/add_employee', 'refresh');
        }else{
            $data['subview'] = 'admin/administrative_affairs/employee/add_employee';
            $this->load->view('admin_index', $data);
        }
    }*/

    public function delete_employee($id)
	{
        $Conditions_arr=array("id"=>$id);
        $this->Difined_model->delete("employees",$Conditions_arr);
        redirect('Administrative_affairs/add_employee');
    }

    public function downloads($file)
    {
        $this->load->helper('download');
        $name = $file;
        $data = file_get_contents('./uploads/files/'.$file); 
        force_download($name, $data); 
        //redirect('Administrative_affairs/add_employee','refresh');
    }
	
/*	public function addPermits()	// Administrative_affairs/addPermits
    {
        $this->load->model('administrative_affairs_models/Permitsmodel');
        $where = array('id!='=>0);
        if($_SESSION['role_id_fk'] == 3 && $_SESSION['head_dep_id_fk'] == 1){
            $where = array('administration_id_fk'=>$_SESSION['administration_id'],'dep_job_id_fk'=>$_SESSION['dep_job_id_fk']);
        }
        if($_SESSION['role_id_fk'] == 3 && $_SESSION['head_dep_id_fk'] == 2){
            $where = array('emp_code'=>$_SESSION['emp_code']);
            $data['employeeData'] = $this->Permitsmodel->select_employeeById($_SESSION['emp_code']);
            $data['count'] = $this->Permitsmodel->permitsCount();
        }
        if($this->input->post('add')){
            $this->Permitsmodel->insert();
            $this->message('success','إضافة إذن');
            redirect('Administrative_affairs/addPermits');
        }
        $data['employees'] = $this->Permitsmodel->select_employees($where);
        $data['permits'] = $this->Permitsmodel->select_permits();
        $data['title'] = 'إضافة إذن';
        $data['subview'] = 'admin/administrative_affairs/permitions/permitions';
        $this->load->view('admin_index', $data);
    }

    public function editPermits($id)
    {
        $this->load->model('administrative_affairs_models/Permitsmodel');
        $where = array('id!='=>0);
        if($_SESSION['role_id_fk'] == 2 && $_SESSION['head_dep_id_fk'] == 1){
            $where = array('administration_id_fk'=>$_SESSION['administration_id'],'dep_job_id_fk'=>$_SESSION['dep_job_id_fk']);
        }
        if($_SESSION['role_id_fk'] == 3 && $_SESSION['head_dep_id_fk'] == 2){
            $where = array('emp_code'=>$_SESSION['emp_code']);
        }
        if($this->input->post('add')){
            $this->Permitsmodel->update($id);
            $this->message('success','إضافة إذن');
            redirect('Administrative_affairs/addPermits');
        }
        $data['employees'] = $this->Permitsmodel->select_employees($where);
        $data['permit'] = $this->Permitsmodel->select_permitID($id);
        $data['employeeData'] = $this->Permitsmodel->select_employeeById($data['permit']['emp_code']);
        $data['title'] = 'تعديل إذن';
        $data['subview'] = 'admin/administrative_affairs/permitions/permitions';
        $this->load->view('admin_index', $data);
    }

    public function deletePermits($id)
    {
        $this->load->model('administrative_affairs_models/Permitsmodel');
        $this->Permitsmodel->delete($id);
        $this->message('success','حذف الإذن');
        redirect('Administrative_affairs/addPermits');
    }
*/


    /******************************** ahmed*************/
    public function vacations_settings()	// Administrative_affairs/vacations_settings
    {
        $this->load->model('Difined_model');
        $this->load->model('administrative_affairs_models/Vacations_settings_model');
        $data['records'] = $this->Difined_model->select_all('vacations_settings','','','','');
        if($this->input->post('add')){
            $this->Vacations_settings_model->insert();
            redirect('Administrative_affairs/vacations_settings', 'refresh');
        }else{
            $data['title'] = 'إعدادات الأجازات';
            $data['subview'] = 'admin/administrative_affairs/main_setting/vacation_setting';
            $this->load->view('admin_index', $data);
        }
    }
    public function vacations_settings_edit($id)	// Administrative_affairs/vacations_settings
    {
        $this->load->model('Difined_model');
        $this->load->model('administrative_affairs_models/Vacations_settings_model');
        $data['result'] =$this->Vacations_settings_model->getById($id);
        if($this->input->post('edit')){
            $this->Vacations_settings_model->update($id);
            redirect('Administrative_affairs/vacations_settings', 'refresh');
        }else{
            $data['title'] = 'إعدادات الأجازات';
            $data['subview'] = 'admin/administrative_affairs/main_setting/vacation_setting';
            $this->load->view('admin_index', $data);
        }



    }
    public function delete_vacations_settings($id)	// Administrative_affairs/vacations_settings
    {
        $this->load->model('administrative_affairs_models/Vacations_settings_model');
        $this->Vacations_settings_model->delete($id);
        redirect('Administrative_affairs/vacations_settings', 'refresh');

    }


/*
   public function getOutDate(){
       $this->load->model('Difined_model');
       $data['ozon'] = $this->Difined_model->select_all('ozonat_num_setting','','1','id','desc')[0];
       $num =$_POST['ozon_time'];
       $data['num']=$num;
       $date =$_POST['start_date'];
       $data['time_out'] = date('G:iA', strtotime($date . " +$num hours"));
       echo json_encode($data);
}*/
public function getOutDate(){
    $this->load->model('Difined_model');
    $data['ozon'] = $this->Difined_model->select_all('ozonat_num_setting','','1','id','desc')[0];
    $date =$_POST['start_date'];
    $data['num'] =$_POST['ozon_time'];
    $num =explode('.', $data['num']);
    $hours  =$num[0] * 60;
    if(!empty($num[1])){
        $minutes  =$num[1] +$hours;
    }else{
        $minutes  =$hours;
    }
    $data['minutes']=$minutes;
    $data['time_out'] = date('G:iA', strtotime($date . "  +$minutes minutes "));
    echo json_encode($data);
}
  
public function addPermits()	// Administrative_affairs/addPermits
{
    $this->load->model('administrative_affairs_models/Prog_main_sitting_mo');
    $this->load->model('administrative_affairs_models/Permitsmodel');
    $this->load->model('administrative_affairs_models/Employee');
    $this->load->model('Difined_model');
    $data['ozon'] = $this->Difined_model->select_all('ozonat_num_setting','','1','id','desc')[0];
    $data['employees'] =  $this->Employee->select_all_emp();
    if($this->input->post('add')){
        $this->Permitsmodel->insert();
        $this->message('success','إضافة إذن');
        redirect('Administrative_affairs/addPermits');
    }
    $data['ozon_reasons']  = $this->Prog_main_sitting_mo->select_sittings(8);
    $data['permits'] = $this->Permitsmodel->select_permits();

    $data['title'] = 'إضافة إذن';
    $data['subview'] = 'admin/administrative_affairs/permitions/permitions';
    $this->load->view('admin_index', $data);
}

public function editPermits($id)
{
    $this->load->model('administrative_affairs_models/Employee');
    $this->load->model('administrative_affairs_models/Prog_main_sitting_mo');
    $this->load->model('administrative_affairs_models/Permitsmodel');
    $this->load->model('Difined_model');
    $data['employees'] =  $this->Employee->select_all_emp();
    $data['ozon'] = $this->Difined_model->select_all('ozonat_num_setting','','1','id','desc')[0];
    $data['ozon_reasons']  = $this->Prog_main_sitting_mo->select_sittings(8);
    if($this->input->post('add')){
        $this->Permitsmodel->update($id);
        $this->message('success','إضافة إذن');
        redirect('Administrative_affairs/addPermits');
    }
    $data['permit'] = $this->Permitsmodel->select_permitID($id);
    $data['employeeData'] = $this->Permitsmodel->select_employeeById($data['permit']['emp_code']);

    $data['title'] = 'تعديل إذن';
    $data['subview'] = 'admin/administrative_affairs/permitions/permitions';
    $this->load->view('admin_index', $data);
}
  
/*    public function addPermits()	// Administrative_affairs/addPermits
    {
        $this->load->model('administrative_affairs_models/Employee');
        $data['employees'] =  $this->Employee->select_all_emp();

        $this->load->model('administrative_affairs_models/Permitsmodel');
        $this->load->model('administrative_affairs_models/Prog_main_sitting_mo');
        $where = array('id!='=>0);
        if($_SESSION['role_id_fk'] == 3 && $_SESSION['head_dep_id_fk'] == 1){
            $where = array('administration_id_fk'=>$_SESSION['administration_id'],'dep_job_id_fk'=>$_SESSION['dep_job_id_fk']);
        }
        if($_SESSION['role_id_fk'] == 3 && $_SESSION['head_dep_id_fk'] == 2){
            $where = array('emp_code'=>$_SESSION['emp_code']);
            $data['employeeData'] = $this->Permitsmodel->select_employeeById($_SESSION['emp_code']);
            $data['count'] = $this->Permitsmodel->permitsCount();
        }
        if($this->input->post('add')){
            $this->Permitsmodel->insert();
            $this->message('success','إضافة إذن');
            redirect('Administrative_affairs/addPermits');
        }

        $data['ozon'] = $this->Difined_model->select_all('ozonat_num_setting','','1','id','desc')[0];
        $data['ozon_reasons']  = $this->Prog_main_sitting_mo->select_sittings(8);

        $data['permits'] = $this->Permitsmodel->select_permits();
        $data['title'] = 'إضافة إذن';
        $data['subview'] = 'admin/administrative_affairs/permitions/permitions';
        $this->load->view('admin_index', $data);
    }
    public function editPermits($id)
    {
        $this->load->model('administrative_affairs_models/Employee');
        $data['employees'] =  $this->Employee->select_all_emp();
        $this->load->model('administrative_affairs_models/Prog_main_sitting_mo');
        $this->load->model('administrative_affairs_models/Permitsmodel');
        $this->load->model('Difined_model');
        $data['ozon'] = $this->Difined_model->select_all('ozonat_num_setting','','1','id','desc')[0];
        $data['ozon_reasons']  = $this->Prog_main_sitting_mo->select_sittings(8);

        $where = array('id!='=>0);
        if($_SESSION['role_id_fk'] == 2 && $_SESSION['head_dep_id_fk'] == 1){
            $where = array('administration_id_fk'=>$_SESSION['administration_id'],'dep_job_id_fk'=>$_SESSION['dep_job_id_fk']);
        }
        if($_SESSION['role_id_fk'] == 3 && $_SESSION['head_dep_id_fk'] == 2){
            $where = array('emp_code'=>$_SESSION['emp_code']);
        }
        if($this->input->post('add')){
            $this->Permitsmodel->update($id);
            $this->message('success','إضافة إذن');
            redirect('Administrative_affairs/addPermits');
        }
        //$data['employees'] = $this->Permitsmodel->select_employees($where);
        $data['permit'] = $this->Permitsmodel->select_permitID($id);
        $data['employeeData'] = $this->Permitsmodel->select_employeeById($data['permit']['emp_code']);
        $data['title'] = 'تعديل إذن';
        $data['subview'] = 'admin/administrative_affairs/permitions/permitions';
        $this->load->view('admin_index', $data);
    }
    */
    
    
    public function deletePermits($id)
    {
        $this->load->model('administrative_affairs_models/Permitsmodel');
        $this->Permitsmodel->delete($id);
        $this->message('success','حذف الإذن');
        redirect('Administrative_affairs/addPermits');
    }





    public function getPenaltyValue(){
        $this->load->model('Difined_model');
        $emp_data = $this->Difined_model->select_search_key('employees','id',$_POST['emp_code']);
        $salary =$emp_data[0]->salary;
        $days =$_POST['days'];
        $value =($salary /30) * $days;
        echo json_encode($value);
    }
    public function add_penalty()	// Administrative_affairs/add_penalty
    {

        $this->load->model('administrative_affairs_models/Employee');
        $this->load->model('administrative_affairs_models/Penalty_model');
        $this->load->model('administrative_affairs_models/Prog_main_sitting_mo');
        $data['penalties'] = $this->Prog_main_sitting_mo->select_sittings(3);
        $data['records'] = $this->Difined_model->select_all('penalty','','','','');
        $data['main_departs'] = $this->Difined_model->select_search_key('department_jobs','from_id_fk',0);
        $data['subb']=$this->Penalty_model->select_sub_depart();
        $data['employs'] = $this->Employee->select_all_emp();

        $data['get_data'] = $this->Penalty_model->getById($_SESSION['emp_code']);

        $data['get_data2'] = $this->Penalty_model->select_emp_name();
        $data['depart_name'] = $this->Penalty_model->get_department_name();
        if($this->input->post('add')){
            $this->Penalty_model->insert();
            redirect('Administrative_affairs/add_penalty', 'refresh');
        }elseif ($this->input->post('valu')) {
            $data['id']=$this->input->post('valu');
            $this->load->view('admin/administrative_affairs/penalty/get_departs',$data);
        }elseif ($this->input->post('valuu')) {
            $data['id']=$this->input->post('valuu');
            $this->load->view('admin/administrative_affairs/penalty/get_departs2',$data);
        }else{
            $data['subview'] = 'admin/administrative_affairs/penalty/add_penalty';
            $this->load->view('admin_index', $data);
        }
    }
    public function edit_penalty($id)
    {
        $this->load->model('administrative_affairs_models/Employee');
        $this->load->model('administrative_affairs_models/Penalty_model');
        $this->load->model('administrative_affairs_models/Prog_main_sitting_mo');
        $data['penalties'] = $this->Prog_main_sitting_mo->select_sittings(3);
        $data['result'] =$this->Difined_model->select_search_key('penalty','id',$id);
        $data['main_departs'] = $this->Difined_model->select_search_key('department_jobs','from_id_fk',0);
        $data['employs'] = $this->Employee->select_all_emp();
        $data['get_data'] = $this->Penalty_model->getById($_SESSION['emp_code']);
        $data['get_data2'] = $this->Penalty_model->select_emp_name();
        $data['depart_name'] = $this->Penalty_model->get_department_name();
        if($this->input->post()){
            $this->Penalty_model->update($id);
            redirect('Administrative_affairs/add_penalty', 'refresh');
        }else{
            $data['subview'] = 'admin/administrative_affairs/penalty/add_penalty';
            $this->load->view('admin_index', $data);
        }
    }
    public function delete_penalty($id)
    {
        $Conditions_arr=array("id"=>$id);
        $this->Difined_model->delete("penalty",$Conditions_arr);
        redirect('Administrative_affairs/add_penalty');
    }



    public function getVacationEnd(){
        $this->load->model('Difined_model');
        $vacations_settings =$this->Difined_model->select_search_key('vacations_settings','id',$_POST['vacation_id'])[0];
      //  $num =$vacations_settings->days_num;
       // $data['num']=$num;
        $num=$_POST['vacations_days'];
        $data['num']=$_POST['vacations_days'];
        $date =$_POST['start_date'];
        $data['vacation_end'] = date('Y-m-d', strtotime($date. " +$num days"));
        echo json_encode($data);
    }
    //--------------------------------------------------------------------
    public function add_vacation()	// Administrative_affairs/add_vacation
    {
        $this->load->model('administrative_affairs_models/Employee');
        $this->load->model('administrative_affairs_models/Difined_model');
        $this->load->model('administrative_affairs_models/Vacation');
        // $this->test( $data['records']);
        // $this->load->model('administrative_affairs_models/Prog_main_sitting_mo');
        $this->load->model('administrative_affairs_models/administrative_affairs_setting');
        $data['holidays'] = $this->Difined_model->select_all('vacations_settings','','','','');

        // $data['holidays'] = $this->Prog_main_sitting_mo->select_sittings(4);
        $data['emp_name'] = $this->Difined_model->select_search_key('employees','administration',$_SESSION['administration_id']);
        $data['select'] = $this->Employee->select_employ_();
        $data['year'] = date("Y");
        $past_days = 0;
        $holiday_num = 0;
        if($_SESSION['role_id_fk'] != 1) {
            $data['group_affairs_id_fk'] = $this->administrative_affairs_setting->select_search_key('employees','emp_code',$_SESSION['emp_code']);

            $total_holiday_remain = 0;
            if(!empty($data['group_affairs_id_fk'])) {
                foreach ($data['group_affairs_id_fk'] as $value) {
                    $x = $value->group_affairs_id_fk;
                    $past_days = $value->past_days;
                }

                $data['affairs_setting'] = $this->administrative_affairs_setting->select_search_key('administrative_affairs_settings', 'id', $x);
                if (!empty($data['affairs_setting'])) {
                    foreach ($data['affairs_setting'] as $seting) {
                        $holiday_num = $seting->holiday_num;
                    }
                }
                $data['all_employees'] = $this->administrative_affairs_setting->select_search_key_2('employees', 'emp_code !=', $_SESSION['emp_code'], 'administration', $_SESSION['administration_id']);
                $data['vacations'] = $this->administrative_affairs_setting->select_search_key_2('vacations', 'emp_id', $_SESSION['emp_code'], 'year', $data['year']);
                $diff = 0;
                if (!empty($data['vacations'])) {
                    foreach ($data['vacations'] as $vacation) {
                        $day_from = $vacation->from_date;
                        $day_to = $vacation->to_date;
                        $date1 = new DateTime($day_from);
                        $date2 = new DateTime($day_to);
                        $diff += $date2->diff($date1)->format("%a");
                    }
                }
                $total_holiday_remain = $holiday_num + $past_days - $diff;
                $data ['total_holiday_remain'] = $total_holiday_remain;
            }
            if($_SESSION['head_dep_id_fk'] ==2){
                $one_data=$this->Vacation->getByArray("employees",array("emp_code"=>$_SESSION['emp_code']));
              $data["data_vacation"]= $this->Vacation->get_vacation_data($one_data["id"]);   
            }
        }
        $data['admin'] = $this->Employee->select_by();
        $data['employ_name'] = $this->Employee->select_employ_name();
        if($this->input->post('values')){
            $data['id']=$this->input->post('values');
            $this->load->view('admin/administrative_affairs/vacations/get_emp_assigned',$data);
        }elseif($this->input->post('valuesx')){
            $data_load['id']=$this->input->post('valuesx');
            $this->load->view('admin/administrative_affairs/vacations/emp_vacations_data',$data_load);
        }elseif ($this->input->post('add')){
            $start_date =$_POST['from_date'];
            $end_date =$_POST['to_date'];
            $query_check =$this->db->query('SELECT * FROM `vacations` WHERE  `emp_id`='.$_POST['emp_id'].' And year = '.$data['year'].' AND  ( `from_date` >= '.$start_date.' or `to_date` <= '.$end_date.')');
            $arr=array();
            foreach ($query_check->result() as  $row2) {
                $arr[] =$row2;
            }
            if ( sizeof($arr)< 0) {
                $this->message('error','  لا يمكن الإضافة الموظف لدية أجازة من   '.$start_date  .'  الى  '.$end_date);
                redirect('Administrative_affairs/add_vacation','refresh');
            }
            else{
                $this->Vacation->insert();
                $this->message('success','إضافة أجازة');
                redirect('Administrative_affairs/add_vacation','refresh');
            }
        }
        else {
            $data['records_table'] = $this->Vacation->select_all();
            $data['subview'] = 'admin/administrative_affairs/vacations/add_vacation';
            $this->load->view('admin_index', $data);
        }
    }
    //--------------------------------------------------------------------
    public  function  EmployeeDataVacation(){   // Administrative_affairs/EmployeeDataVacation
        $this->load->model('administrative_affairs_models/Vacation');
        if($this->input->post('get_emp_id')){
            $emp_id = $this->input->post('get_emp_id');
            $data_load["data_vacation"]= $this->Vacation->get_vacation_data($emp_id);
            $this->load->view('admin/administrative_affairs/vacations/load_vacation_table', $data_load);
        }
        // $data_load["data_vacation"]= $this->Vacation->get_vacation_data(1);
        // $this->test($data_load["data_vacation"]);
    }
    //--------------------------------------------------------------------

   
   
   
   
    public function delete_vacation($id)
    {
        $this->load->model('administrative_affairs_models/Vacation');;
        $this->Vacation->delete($id);
        redirect('Administrative_affairs/add_vacation','refresh');
    }
    public function update_vacation($id)
    {
        $this->load->model('administrative_affairs_models/Difined_model');
        $this->load->model('administrative_affairs_models/Employee');
        $this->load->model('administrative_affairs_models/Vacation');
        $this->load->model('administrative_affairs_models/Prog_main_sitting_mo');
        $data['holidays'] = $this->Difined_model->select_all('vacations_settings','','','','');
        $data['emp_name'] = $this->Difined_model->select_search_key('employees','administration',$_SESSION['administration_id']);
        $data['select'] = $this->Employee->select_employ_();
        if($this->input->post('update')){
            $this->Vacation->update($id);
            $this->message('success','تم التعديل ');
            redirect('Administrative_affairs/add_vacation','refresh');
        }
        $data['update_link']="add_vacation";
        $data['result']=$this->Vacation->getById($id);
        $data['all_empolyees'] = $this->Employee->select_employ_by_dep();
        $data['admin'] = $this->Employee->select_by();
        $data['employ_name'] = $this->Employee->select_employ_name();
         $data["data_vacation"]= $this->Vacation->get_vacation_data($data['result']["emp_id"]);   
       // $this->test($data);
        $data['subview'] = 'admin/administrative_affairs/vacations/add_vacation';
        $this->load->view('admin_index', $data);
    }


    /**********************************ahmed***********/




    public function employeeData()
    {
        $this->load->model('administrative_affairs_models/Permitsmodel');
        $data['employeeData'] = $this->Permitsmodel->select_employeeById($this->input->post('emp_code'));
        echo json_encode($data['employeeData']);
    }

    public function permitionsConfirm()	// Administrative_affairs/permitionsConfirm
    {   
        $this->load->model('administrative_affairs_models/Permitsmodel');
        $data['newPermits'] = $this->Permitsmodel->select_permits(array('permits.status'=>0));
        $data['acceptPermits'] = $this->Permitsmodel->select_permits(array('permits.status'=>1));
        $data['refusePermits'] = $this->Permitsmodel->select_permits(array('permits.status'=>2));
        if($this->input->post('accept')){
            $this->confirm($this->input->post('id'), 1);
        }
        if($this->input->post('refuse')){
            $this->confirm($this->input->post('id'), 2);
        }
        $data['accepted'] = $this->Permitsmodel->acceptedPermits();
        $data['title'] = 'إعتماد الأذونات';
        $data['subview'] = 'admin/administrative_affairs/permitions/permitionsConfirm';
        $this->load->view('admin_index', $data);
    }

    public function confirm($id, $status)
    {
        $this->load->model('administrative_affairs_models/Permitsmodel');
        $this->Permitsmodel->permitConfirm($id, $status);
        $this->message('success','إعتماد طلب الإذن');
        redirect('Administrative_affairs/permitionsConfirm');
    }

    public function R_permitPeriod()	// Administrative_affairs/R_permitPeriod
    {
        $this->load->model('administrative_affairs_models/Permitsmodel');
        $where = array('id!='=>0);
        if($_SESSION['role_id_fk'] == 2 && $_SESSION['head_dep_id_fk'] == 1){
            $where = array('administration_id_fk'=>$_SESSION['administration_id'],'dep_job_id_fk'=>$_SESSION['dep_job_id_fk']);
        }
        $data['employees'] = $this->Permitsmodel->select_employees($where);
        $data['title'] = 'تقرير الأذونات خلال فترة';
        $data['subview'] = 'admin/administrative_affairs/permitions/R_permitPeriod';
        $this->load->view('admin_index', $data);
    }

    public function load_permitPeriod()
    {
        $this->load->model('administrative_affairs_models/Permitsmodel');
        $data['permits'] = $this->Permitsmodel->R_permitPeriod($this->input->post('date_from'), $this->input->post('date_to'), $this->input->post('emp_code'));
        $this->load->view('admin/administrative_affairs/permitions/load_permitPeriod', $data);
    }
	
	public function mession_add($id)	// Administrative_affairs/mession_add/0
    { 
        $this->load->model('administrative_affairs_models/Mession');
        $this->load->model('administrative_affairs_models/Prog_main_sitting_mo');
        $data['emp_id'] = $this->input->post('emp_id');
        $data['type_id_fk'] = $this->input->post('type_id_fk');
        $data['dep_id'] = $this->input->post('dep_id'.$data['emp_id']);
        $data['date_from'] = strtotime($this->input->post('date_from'));
        $data['date_to'] = strtotime($this->input->post('date_to'));
        $data['date'] = strtotime($this->input->post('date'));
        $data['path'] = $this->input->post('path');
        $data['purpos'] = $this->input->post('purpos');
        $data['date_s']=time();
        if($_SESSION['role_id_fk'] == 3 && $_SESSION['head_dep_id_fk'] == 1){
            $data['date_sus']=time();
            $data['suspend'] = 1;
        }

        if($this->input->post('add') && $id == 0){
            $this->Mession->insert($data);
            $this->message('success','إضافة مهمة');
            redirect('Administrative_affairs/mession_add/0', 'refresh');
        }
        if($this->input->post('add') && $id != 0){
            $this->Mession->update($data, $id);
            $this->message('success','تعديل مهمة ');
            redirect('Administrative_affairs/mession_add/0','refresh');
        }
        if($id != 0){
            $data['result']=$this->Mession->getById($id);
            $data['employs'] = $this->Mession->select_emp($id);    
        }
        if($id == 0) {
            $data['employs'] = $this->Mession->select_emp($id);
        }
            
        $data['missions'] = $this->Prog_main_sitting_mo->select_sittings(2);
        $data['table'] = $this->Mession->select();
        $data['subview'] = 'admin/administrative_affairs/messions/messions';
        $this->load->view('admin_index', $data);
    }
    
    public function mession_delete($id)
    {
        $this->load->model('administrative_affairs_models/Mession');
        $this->db->where('id',$id);
        $this->db->delete('mession');
        redirect('Administrative_affairs/mession_add/0','refresh');
    }  
    
    public function R_mession()	// Administrative_affairs/R_mession
    {
        $this->load->model('administrative_affairs_models/Mession');
        if($this->input->post('date_from') && $this->input->post('date_to') && $this->input->post('emp_id')){
            $data['table'] = $this->Mession->get_messions(strtotime($this->input->post('date_from')),strtotime($this->input->post('date_to')),$this->input->post('emp_id'));
            $this->load->view('admin/administrative_affairs/messions/get_mession',$data);
        }
        else{
            $data['employs'] = $this->Mession->select_emp(1);
            $data['subview'] = 'admin/administrative_affairs/messions/R_mession';
            $this->load->view('admin_index', $data);
        }
    }

    public function suspend()	// Administrative_affairs/suspend
    {
        $this->load->model('administrative_affairs_models/Mession');
        $data['table'] = $this->Mession->select();
        $data['subview'] = 'admin/administrative_affairs/messions/suspend';
        $this->load->view('admin_index', $data);
    }
    
    public function action($id='', $status='')
    {
        $this->load->model('administrative_affairs_models/Mession');
        if($id == ''){
            $id = $this->input->post('id');
            $status = $this->input->post('sus');
        }
        if($_SESSION['role_id_fk'] == 1 && $_SESSION['head_dep_id_fk'] == 1){
            $data['suspend_head'] = $status;
            $data['reason_head'] = $this->input->post('reason');
            $data['date_sus'] = time();
        }
        if($_SESSION['role_id_fk'] == 3 && $_SESSION['head_dep_id_fk'] == 1){
            $data['suspend'] = $status;
            $data['reason'] = $this->input->post('reason');
            $data['date_sus_head'] = time();
        }
        $this->Mession->update($data, $id);
        redirect('Administrative_affairs/suspend','refresh');
    }
	
/*	public function add_penalty()	// Administrative_affairs/add_penalty
    {
        $this->load->model('administrative_affairs_models/Penalty_model');
        $this->load->model('administrative_affairs_models/Prog_main_sitting_mo');
        $data['penalties'] = $this->Prog_main_sitting_mo->select_sittings(3);
        $data['records'] = $this->Difined_model->select_all('penalty','','','','');
        $data['main_departs'] = $this->Difined_model->select_search_key('department_jobs','from_id_fk',0);
        $data['subb']=$this->Penalty_model->select_sub_depart();
        $data['employs'] = $this->Difined_model->select_all('employees','','','','');
        $data['get_data'] = $this->Penalty_model->getById($_SESSION['emp_code']);
        $data['get_data2'] = $this->Penalty_model->select_emp_name();
        $data['depart_name'] = $this->Penalty_model->get_department_name();
        if($this->input->post('add')){
            $this->Penalty_model->insert();
            redirect('Administrative_affairs/add_penalty', 'refresh');
        }elseif ($this->input->post('valu')) {
            $data['id']=$this->input->post('valu');
            $this->load->view('admin/administrative_affairs/penalty/get_departs',$data);
        }elseif ($this->input->post('valuu')) {
            $data['id']=$this->input->post('valuu');
            $this->load->view('admin/administrative_affairs/penalty/get_departs2',$data);
        }else {
            $data['subview'] = 'admin/administrative_affairs/penalty/add_penalty';
            $this->load->view('admin_index', $data);
        }
    }

    public function edit_penalty($id)
    {
        $this->load->model('administrative_affairs_models/Penalty_model');
        $this->load->model('administrative_affairs_models/Prog_main_sitting_mo');
        $data['penalties'] = $this->Prog_main_sitting_mo->select_sittings(3);
        $data['result'] =$this->Difined_model->select_search_key('penalty','id',$id);
        $data['main_departs'] = $this->Difined_model->select_search_key('department_jobs','from_id_fk',0);
        $data['employs'] = $this->Difined_model->select_all('employees','','','','');
        $data['get_data'] = $this->Penalty_model->getById($_SESSION['emp_code']);
        $data['get_data2'] = $this->Penalty_model->select_emp_name();
        $data['depart_name'] = $this->Penalty_model->get_department_name();
        if($this->input->post()){
            $this->Penalty_model->update($id);
            redirect('Administrative_affairs/add_penalty', 'refresh');
        }else{
            $data['subview'] = 'admin/administrative_affairs/penalty/add_penalty';
            $this->load->view('admin_index', $data);
        }
    }
*/
/*    public function delete_penalty($id)
    {
        $Conditions_arr=array("id"=>$id);
        $this->Difined_model->delete("penalty",$Conditions_arr);
        redirect('Administrative_affairs/add_penalty');
    }*/
/*************************************************************************************/

    /**********************************************************************/
		public function add_penalty_2()	// Administrative_affairs/add_penalty
    {
        $this->load->model('administrative_affairs_models/Penalty_model_2');
        $this->load->model('administrative_affairs_models/Prog_main_sitting_mo');
        $data['penalties'] = $this->Difined_model->select_all('discount_salary','','','','');
        $data['records'] = $this->Difined_model->select_all('discount_salary_operations','','','','');
        $data['main_departs'] = $this->Difined_model->select_search_key('department_jobs','from_id_fk',0);
        $data['subb']=$this->Penalty_model_2->select_sub_depart();
        $data['employs'] = $this->Difined_model->select_all('employees','','','','');
        $data['get_data'] = $this->Penalty_model_2->getById($_SESSION['emp_code']);
        $data['get_data2'] = $this->Penalty_model_2->select_emp_name();
        $data['depart_name'] = $this->Penalty_model_2->get_department_name();
        if($this->input->post('add')){
            
           // $this->test($_POST);
            $this->Penalty_model_2->insert();
            redirect('Administrative_affairs/add_penalty_2', 'refresh');
        }elseif ($this->input->post('valu')) {
            $data['id']=$this->input->post('valu');
            $this->load->view('admin/administrative_affairs/penalty_2/get_departs',$data);
        }elseif ($this->input->post('valuu')) {
            $data['id']=$this->input->post('valuu');
            $this->load->view('admin/administrative_affairs/penalty_2/get_departs2',$data);
        }else {
            $data['subview'] = 'admin/administrative_affairs/penalty_2/add_penalty';
            $this->load->view('admin_index', $data);
        }
    }
    
    
    
       public function edit_penalty_2($id)
    {
        $this->load->model('administrative_affairs_models/Penalty_model_2');
        $this->load->model('administrative_affairs_models/Prog_main_sitting_mo');
        $data['penalties'] = $this->Difined_model->select_all('discount_salary','','','','');
      //  $data['penalties'] = $this->Prog_main_sitting_mo->select_sittings(3);
        $data['result'] =$this->Difined_model->select_search_key('discount_salary_operations','id',$id);
        $data['main_departs'] = $this->Difined_model->select_search_key('department_jobs','from_id_fk',0);
        $data['employs'] = $this->Difined_model->select_all('employees','','','','');
        $data['get_data'] = $this->Penalty_model_2->getById($_SESSION['emp_code']);
        $data['get_data2'] = $this->Penalty_model_2->select_emp_name();
        $data['depart_name'] = $this->Penalty_model_2->get_department_name();
        if($this->input->post()){
            $this->Penalty_model_2->update($id);
            redirect('Administrative_affairs/add_penalty_2', 'refresh');
        }else{
            $data['subview'] = 'admin/administrative_affairs/penalty_2/add_penalty';
            $this->load->view('admin_index', $data);
        }
    }
    
    
    
    
       public function delete_penalty_2($id)
    {
        $Conditions_arr=array("id"=>$id);
        $this->Difined_model->delete("discount_salary_operations",$Conditions_arr);
        redirect('Administrative_affairs/add_penalty_2');
    }
    /*****************************************************************************/
    




/**************************************************************************************/
    public function suspend_penalty($id)	// Administrative_affairs/suspend_penalty
    {
        $this->load->model('administrative_affairs_models/Penalty_model');
        if($this->input->post('accept')){
            $this->Penalty_model->approved($id,1);
        }elseif ($this->input->post('ref')){
            $this->Penalty_model->approved($id,2);
        }
        redirect('Administrative_affairs/add_penalty');
    }
	
	public function manualAttendance()	// Administrative_affairs/manualAttendance
    {
        $this->load->model('administrative_affairs_models/Attendancemodel');
        $where = array('employees.id!='=>0);
        if($_SESSION['role_id_fk'] == 3 && $_SESSION['head_dep_id_fk'] == 1){
            $where = array('employees.administration_id_fk'=>$_SESSION['administration_id'],'employees.dep_job_id_fk'=>$_SESSION['dep_job_id_fk']);
        }
        if($this->input->post('add')){
            $this->Attendancemodel->insertManual();
            $this->message('success','إثبات حضور موظف');
            redirect('Administrative_affairs/manualAttendance');
        }
        $data['attendance'] = $this->Attendancemodel->select_manualAttendance();
        $data['employees'] = $this->Attendancemodel->select_employees($where);
        $data['title'] = 'إثبات حضور موظف يدوي';
        $data['subview'] = 'admin/administrative_affairs/attendance/manualAttendance';
        $this->load->view('admin_index', $data);
    }

    public function dissuasion($id, $presence)
    {
        $this->load->model('administrative_affairs_models/Attendancemodel');
        $this->Attendancemodel->updateManual($id, $presence);
        $this->message('success','إثبات إنصراف موظف');
        redirect('Administrative_affairs/manualAttendance');
    }

    public function deleteManualAttendance($id)
    {
        $this->load->model('administrative_affairs_models/Attendancemodel');
        $this->Attendancemodel->deleteManual($id);
        $this->message('success','حذف حضور الموظف');
        redirect('Administrative_affairs/manualAttendance');
    }

    public function loadAttendance()	// Administrative_affairs/loadAttendance
    {
        $this->load->library('Excel');
        $this->load->model('administrative_affairs_models/Attendancemodel');
        $data['table'] = $this->Attendancemodel->select_loadAttendance();
        if($this->input->post('load')){
            $filename = $_FILES['upload']['tmp_name']; 
            $this->Attendancemodel->insertLoadAttendance($filename);
            $this->message('success','رفع الملف');
            redirect('Administrative_affairs/loadAttendance','refresh');
        }
        if($this->input->post('download')){
            $this->excel->setActiveSheetIndex(0);                          
            $this->excel->getActiveSheet()->setTitle('حضور وإنصراف الموظفين'); 
            $cell = array('A1'=>'كود الموظف','B1'=>'إسم الموظف','C1'=>'كود الفرع الرئيسي','D1'=>'الفرع الرئيسي','E1'=>'كود الفرع الفرعي','F1'=>'الفرع الفرعي','G1'=>'التاريخ','H1'=>'الحضور الفعلي','I1'=>'الإنصراف الفعلي','J1'=>'عدد ساعات الحضور');
            foreach ($cell as $key => $value) {
                $this->excel->getActiveSheet()->setCellValue($key, $value);
                $this->excel->getActiveSheet()->getStyle($key)->getFont()->setSize(10);
                $this->excel->getActiveSheet()->getStyle($key)->getFont()->setBold(true);
                $this->excel->getActiveSheet()->getStyle($key)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            }
            $x=2;
            foreach ($data['table'] as $record) {
                $this->excel->getActiveSheet()->setCellValue('A'.$x.'', $record->emp_id);
                $this->excel->getActiveSheet()->setCellValue('B'.$x.'', $record->employee);
                $this->excel->getActiveSheet()->setCellValue('C'.$x.'', date('Y/m/d',$record->date));
                $this->excel->getActiveSheet()->setCellValue('D'.$x.'', $record->presence);
                $this->excel->getActiveSheet()->setCellValue('E'.$x.'', $record->dissuasion);
                $this->excel->getActiveSheet()->setCellValue('F'.$x.'', $record->diff);
                $x++;
            }
            $filename='حضور وإنصراف.xls'; 
            header('Content-Type: application/vnd.ms-excel'); 
            header('Content-Disposition: attachment;filename="'.$filename.'"'); 
            header('Cache-Control: max-age=0'); 
            $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');  
            $objWriter->save('php://output');
        }
        $data['title'] = 'رفع وتحميل ملف الحضور والإنصراف';
        $data['subview'] = 'admin/administrative_affairs/attendance/loadAttendance';
        $this->load->view('admin_index', $data);
    }
	
/*	public function add_vacation()	// Administrative_affairs/add_vacation
	{
        $this->load->model('administrative_affairs_models/Employee');
        $this->load->model('administrative_affairs_models/Vacation');
        $this->load->model('administrative_affairs_models/Prog_main_sitting_mo');
        $this->load->model('administrative_affairs_models/administrative_affairs_setting');
        $data['holidays'] = $this->Prog_main_sitting_mo->select_sittings(4);
        $data['emp_name'] = $this->Difined_model->select_search_key('employees','administration',$_SESSION['administration_id']);
        $data['select'] = $this->Employee->select_employ_();  
        $data['year'] = date("Y");
        $past_days = 0;
        $holiday_num = 0;
        if($_SESSION['role_id_fk'] != 1) {
            $data['group_affairs_id_fk'] = $this->administrative_affairs_setting->select_search_key('employees','emp_code',$_SESSION['emp_code']);
            $total_holiday_remain = 0;
            foreach($data['group_affairs_id_fk'] as $value) {
                $x = $value->group_affairs_id_fk;
                $past_days = $value->past_days;
            }
            $data['affairs_setting'] = $this->administrative_affairs_setting->select_search_key('administrative_affairs_settings','id',$x);
            if(!empty($data['affairs_setting'])){    
                foreach($data['affairs_setting'] as $seting) {
                    $holiday_num  = $seting->holiday_num;
                }
            }  
            $data['all_employees'] = $this->administrative_affairs_setting->select_search_key_2('employees','emp_code !=',$_SESSION['emp_code'],'administration',$_SESSION['administration_id']);
            $data['vacations'] = $this->administrative_affairs_setting->select_search_key_2('vacations','emp_id',$_SESSION['emp_code'],'year',$data['year']);
            $diff = 0; 
            if(!empty($data['vacations'])){
                foreach($data['vacations'] as $vacation) {
                    $day_from=$vacation->from_date;
                    $day_to= $vacation->to_date;
                    $date1 = new DateTime($day_from);
                    $date2 = new DateTime($day_to);
                    $diff += $date2->diff($date1)->format("%a");
                }
            }
            $total_holiday_remain = $holiday_num + $past_days - $diff ;
            $data ['total_holiday_remain'] = $total_holiday_remain; 
        }
        $data['admin'] = $this->Employee->select_by();
        $data['employ_name'] = $this->Employee->select_employ_name();
        if($this->input->post('values')){
            $data['id']=$this->input->post('values');
            $this->load->view('admin/administrative_affairs/vacations/get_emp_assigned',$data);
        }elseif($this->input->post('valuesx')){
            $data_load['id']=$this->input->post('valuesx');
            $this->load->view('admin/administrative_affairs/vacations/emp_vacations_data',$data_load);
        }elseif ($this->input->post('add')){
            $start_date =$_POST['from_date'];
            $end_date =$_POST['to_date'];
            $query_check =$this->db->query('SELECT * FROM `vacations` WHERE  `emp_id`='.$_POST['emp_id'].' And year = '.$data['year'].' AND  ( `from_date` >= '.$start_date.' or `to_date` <= '.$end_date.')');
            $arr=array();
            foreach ($query_check->result() as  $row2) {
                $arr[] =$row2;
            }
            if ( sizeof($arr)< 0) {
                $this->message('error','  لا يمكن الإضافة الموظف لدية أجازة من   '.$start_date  .'  الى  '.$end_date);
                redirect('Administrative_affairs/add_vacation','refresh');
            }
            else{
                $this->Vacation->insert();
                $this->message('success','إضافة أجازة');
                redirect('Administrative_affairs/add_vacation','refresh');
            }
        }
        else {
            $data['records'] = $this->Vacation->select_all();
            $data['subview'] = 'admin/administrative_affairs/vacations/add_vacation';
            $this->load->view('admin_index', $data);
        }
    }

    public function delete_vacation($id)
	{
        $this->load->model('administrative_affairs_models/Vacation');;
        $this->Vacation->delete($id);
        redirect('Administrative_affairs/add_vacation','refresh');
    }

    public function update_vacation($id)
	{
        $this->load->model('administrative_affairs_models/Employee');
        $this->load->model('administrative_affairs_models/Vacation');
        $this->load->model('administrative_affairs_models/Prog_main_sitting_mo');
        $data['holidays'] = $this->Prog_main_sitting_mo->select_sittings(4);
        $data['emp_name'] = $this->Difined_model->select_search_key('employees','administration',$_SESSION['administration_id']);
        $data['select'] = $this->Employee->select_employ_();     
        if($this->input->post('update')){
            $this->Vacation->update($id);
            $this->message('success','تم التعديل ');
            redirect('Administrative_affairs/add_vacation','refresh');
        }
        $data['update_link']="add_vacation";
        $data['result']=$this->Vacation->getById($id);
        $data['all_empolyees'] = $this->Employee-> select_employ_by_dep();
        $data['admin'] = $this->Employee->select_by();
        $data['employ_name'] = $this->Employee->select_employ_name();
        $data['subview'] = 'admin/administrative_affairs/vacations/add_vacation';
        $this->load->view('admin_index', $data);
    }
*/
    public function suspend_vacation($id,$clas)
    {
        $this->load->model('administrative_affairs_models/Vacation');
        $this->Vacation->suspend($id,$clas);
        if($clas == 'danger')
            $this->message('success','الأجازة نشط');
        else
            $this->message('success','الأجازة غير نشط');
        redirect('Administrative_affairs/add_vacation');
    }
	
	public function VacationsApproved()	// Administrative_affairs/VacationsApproved
	{
        $this->load->model('administrative_affairs_models/Vacation');
        if($_SESSION['role_id_fk'] == 1 && $_SESSION['head_dep_id_fk'] == 1){
        $data["vacation_recived"]=$this->Vacation->type_vacation(0);
        $data["vacation_accept"]=$this->Vacation->type_vacation(1);
        $data["vacation_refuse"]=$this->Vacation->type_vacation(2);  
        }elseif($_SESSION['role_id_fk'] == 3 && $_SESSION['head_dep_id_fk'] == 1){
        $data["vacation_recived"]=$this->Vacation->type_vacation_head(0);
        $data["vacation_accept"]=$this->Vacation->type_vacation_head(1);
        $data["vacation_refuse"]=$this->Vacation->type_vacation_head(2);   
        }
        $data['title'] = 'إعتماد الاجازات';
        $data['subview'] = 'admin/administrative_affairs/vacations/vacations_approved';
        $this->load->view('admin_index', $data);
    }

    public function suspend_DoVacationsApproved($id)
	{
        $this->load->model('administrative_affairs_models/Vacation');
        $this->Vacation->suspend_DoVacationsApproved($id);
        redirect('Administrative_affairs/VacationsApproved');
    } 

    public function suspend_DoVacationsApproved2($id)
	{
        $this->load->model('administrative_affairs_models/Vacation');
        $this->Vacation->suspend_DoVacationsApproved2($id);
        redirect('Administrative_affairs/VacationsApproved');
    }  
    
    public function DoVacationsApproved($id,$value)
	{
        $this->load->model('administrative_affairs_models/Vacation');
        $this->Vacation->approved_vacation($id,$value);
        redirect('Administrative_affairs/VacationsApproved','refresh');
	}
   
    public function DoVacationsApproved2($id,$value)
	{
        $this->load->model('administrative_affairs_models/Vacation');
        $this->Vacation->approved_vacation2($id,$value);
        redirect('Administrative_affairs/VacationsApproved','refresh');
    }
	
	public function EvaluationSetting()	// Administrative_affairs/EvaluationSetting
    {
        $this->load->model('administrative_affairs_models/Evaluation');
        if($this->input->post('ADD')){
            $this->Evaluation->insert();
            redirect('Administrative_affairs/EvaluationSetting','refresh');
        }
        $data['records']=$this->Difined_model->select_all("evaluation_setting","","","id","DESC");
        $data['title'] = 'تقييم الموظفين';
        $data['subview'] = 'admin/administrative_affairs/evaluation/evaluation_setting';
        $this->load->view('admin_index', $data);
    }

    public function UpdateEvaluationSetting($id)
    {
        $this->load->model('administrative_affairs_models/Evaluation');
        if($this->input->post('UPDATE')){
            $this->Evaluation->update($id);
            redirect('Administrative_affairs/EvaluationSetting','refresh');
        }
        $data['result']=$this->Difined_model->getById("evaluation_setting",$id);
        $data['title'] = 'تقييم الموظفين';
        $data['subview'] = 'admin/administrative_affairs/evaluation/evaluation_setting';
        $this->load->view('admin_index', $data);
    }
	
	public function StaffEvaluation()	// Administrative_affairs/StaffEvaluation
    {
        $this->load->model('administrative_affairs_models/Evaluation');
        if($this->input->post('ADD')){
            $this->Evaluation->insert_emp_eval();
            redirect('Administrative_affairs/StaffEvaluation','refresh');
        }
        $data['table']=$this->Evaluation->select_all();
        $data['eval_setting']=$this->Difined_model->select_all("evaluation_setting","","","id","DESC");
     //   $this->test($data['eval_setting']);
        $data['employees']=$this->Difined_model->select_all("employees","","","id","DESC");
        $data['title'] = 'تقييم الموظفين';
        $data['subview'] = 'admin/administrative_affairs/evaluation/staff_evaluation';
        $this->load->view('admin_index', $data);
    }

    public function UpdateStaffEvaluation($emp_id,$evaluation_date,$date_s)
    {
        $this->load->model('administrative_affairs_models/Evaluation');
        if($this->input->post('UPDATE')){
            $this->Evaluation->update_emp_eval();
           redirect('Administrative_affairs/StaffEvaluation','refresh');
        }
        $data['result']=$this->Evaluation->get_emp_eval($emp_id,$evaluation_date,$date_s);
        $data['employees']=$this->Difined_model->select_all("employees","","","id","DESC");
        $data['title'] = 'تقييم الموظفين';
        $data['subview'] = 'admin/administrative_affairs/evaluation/staff_evaluation';
        $this->load->view('admin_index', $data);
    }

    public function DeleteStaffEvaluation($emp_id,$evaluation_date,$date_s)
    {
        $this->Difined_model->delete("emp_evaluation",array("emp_id"=>$emp_id,"date_s"=>$date_s,"evaluation_date"=>$evaluation_date));
        redirect('Administrative_affairs/StaffEvaluation','refresh');
    }
	
	public  function EmployeesDebts()	// Administrative_affairs/EmployeesDebts
    { 
        $this->load->model('administrative_affairs_models/Debts_emp');
        $this->load->model('administrative_affairs_models/employee');
        if($this->input->post('ADD')){
            $this->Debts_emp->insert();
            redirect('Administrative_affairs/EmployeesDebts','refresh');
        }
        $data["emp_data"]=$this->Difined_model->getByArray("employees",array("emp_code"=>$_SESSION['emp_code']));
        $data['admin'] = $this->employee->select_by();
        $data["departs"]=$this->Difined_model->select_search_key("department_jobs","from_id_fk !=",0);
        $data['employees']=$this->Difined_model->select_all("employees","","","id","DESC");
        if(isset($data["emp_data"]) && !empty($data["emp_data"]) && $data["emp_data"]!=null){
            $data["table"]=$this->Debts_emp->type_depts_date(array("emp_id"=>$data["emp_data"]["id"]));
        }else{
            $data["table"]=$this->Debts_emp->type_depts_date(array("emp_id !="=>0));
        }
        $data['title'] = 'إضافة السلف';
        $data['subview'] = 'admin/administrative_affairs/debts/employee_debts';
        $this->load->view('admin_index', $data);
    }

    public function UpdateEmployeesDebts($debt_id)
    {
        $this->load->model('administrative_affairs_models/Debts_emp');
        $this->load->model('administrative_affairs_models/employee');
        if($this->input->post('UPDATE')){
            $this->Debts_emp-> update($debt_id);
            redirect('Administrative_affairs/EmployeesDebts','refresh');
        }
        $data['result']=$this->Debts_emp->type_depts_date(array("debt_id"=>$debt_id));
        $data['admin'] = $this->employee->select_by();
        $data["departs"]=$this->Difined_model->select_search_key("department_jobs","from_id_fk !=",0);
        $data['employees']=$this->Difined_model->select_all("employees","","","id","DESC");
        $data['title'] = 'تعديل طلب السلفه';
        $data['subview'] = 'admin/administrative_affairs/debts/employee_debts';
        $this->load->view('admin_index', $data);
    }

    public  function LoadPAges()
    { 
        $this->load->model('administrative_affairs_models/Debts_emp');
        $this->load->model('administrative_affairs_models/employee');
        if ($this->input->post('admin_num')) {
            $data['dep']=$this->Difined_model->select_search_key("department_jobs","from_id_fk",$this->input->post('admin_num'));
            $this->load->view('admin/administrative_affairs/debts/load_dep',$data);
        }
        if ($this->input->post('dep_num')) {
            $data['emp']=$this->Difined_model->select_search_key("employees","department",$this->input->post('dep_num'));
            $this->load->view('admin/administrative_affairs/debts/load_emp',$data);
        }
    }
	
	public function EmployeesDebtsApproved()	// Administrative_affairs/EmployeesDebtsApproved
    {
        $this->load->model('administrative_affairs_models/Debts_emp');
        $this->load->model('administrative_affairs_models/employee');
        $data["depts_recived"]=$this->Debts_emp->type_depts(0);
        $data["depts_accept"]=$this->Debts_emp->type_depts(1);
        $data["depts_refuse"]=$this->Debts_emp->type_depts(2);
        $data["all_debts"]=$this->Difined_model->select_all("emp_debts","","","","");
        $data['title'] = 'إعتماد  طلبات السلف';
        $data['subview'] = 'admin/administrative_affairs/debts/debts_approved';
        $this->load->view('admin_index', $data);
    }

    public function DoDebtsApproved($id,$value)
    {
        $this->load->model('administrative_affairs_models/Debts_emp');
        if($value == 0){ 
        $this->Debts_emp->approved_depts($id,$value,"");
        redirect('Administrative_affairs/EmployeesDebtsApproved','refresh');
        }
        if($this->input->post('operation')){
           $this->Debts_emp->approved_depts($id,$value,$this->input->post('reason'));  
           redirect('Administrative_affairs/EmployeesDebtsApproved','refresh');
        }
    }
	
	public function EmployeesDebtsReport()	// Administrative_affairs/EmployeesDebtsReport
    {
        $this->load->model('administrative_affairs_models/Debts_emp');
        if ($this->input->post('debt_date_to') && $this->input->post('debt_date_from') && $this->input->post('type')) {
            $date_f =strtotime($this->input->post('debt_date_from'));
            $date_t =strtotime($this->input->post('debt_date_to'));        
            $arr_con=array("debt_date <="=>$date_t ,"debt_date >="=>$date_f );
            if($this->input->post('type') == 2){
                $arr_con["approved"]=2;
            }elseif($this->input->post('type') == 1){
                $arr_con["approved"]=1;    
            }elseif($this->input->post('type') == 0){
                $arr_con["approved"]=0;
            }
            $data["table"]=$this->Debts_emp->type_depts_date($arr_con);
            $this->load->view('admin/administrative_affairs/debts/load_report',$data);
         }else{
            $data['title'] = 'تقرير طلبات السلف';
            $data['subview'] = 'admin/administrative_affairs/debts/debts_report';
            $this->load->view('admin_index', $data);    
        }
    }
	
	public function add_awards()	// Administrative_affairs/add_awards
    {
        $this->load->model('administrative_affairs_models/Awards_model');
        $this->load->model('administrative_affairs_models/Prog_main_sitting_mo');
        $data['rewards'] = $this->Prog_main_sitting_mo->select_sittings(6);
        $data['records'] = $this->Difined_model->select_all('mon_rewards','','','','');
        $data['main_departs'] = $this->Difined_model->select_search_key('department_jobs','from_id_fk',0);
        $data['subb']=$this->Awards_model->select_sub_depart();
        $data['employs'] = $this->Difined_model->select_all('employees','','','','');
        $data['get_data'] = $this->Awards_model->getById($_SESSION['emp_code']);
        $data['get_data2'] = $this->Awards_model->select_emp_name2();
        $data['depart_name'] = $this->Awards_model->get_department_name();
        if($this->input->post('add')){
            $img ='img';
            $img_file =$this->upload_image($img);
            $this->Awards_model->insert($img_file);
            redirect('Administrative_affairs/add_awards', 'refresh');
        }else {
            $data['subview'] = 'admin/administrative_affairs/award/add_awards';
            $this->load->view('admin_index', $data);
        }
    }
    
    public function edit_awards($id)
    {
        $this->load->model('administrative_affairs_models/Awards_model');
        $this->load->model('administrative_affairs_models/Prog_main_sitting_mo');
        $data['rewards'] = $this->Prog_main_sitting_mo->select_sittings(6);
        $data['result'] =$this->Difined_model->select_search_key('mon_rewards','id',$id);
        $data['main_departs'] = $this->Difined_model->select_search_key('department_jobs','from_id_fk',0);
        $data['employs'] = $this->Difined_model->select_all('employees','','','','');
        $data['get_data'] = $this->Awards_model->getById($_SESSION['emp_code']);
        $data['get_data2'] = $this->Awards_model->select_emp_name();
        $data['depart_name'] = $this->Awards_model->get_department_name();
        if($this->input->post()){
            $img ='img';
            $img_file =$this->upload_image($img);
            $this->Awards_model->update($id,$img_file);
            redirect('Administrative_affairs/add_awards', 'refresh');
        }else{
            $data['subview'] = 'admin/administrative_affairs/award/add_awards';
            $this->load->view('admin_index', $data);
        }
    }

    public function delete_awards($id)
    {
        $Conditions_arr=array("id"=>$id);
        $this->Difined_model->delete("mon_rewards",$Conditions_arr);
        redirect('Administrative_affairs/add_awards');
    }
	
	public function salaries()	// Administrative_affairs/salaries
    {
        $this->load->model('administrative_affairs_models/Employee');
        $data['salaries'] = $this->Employee->all_emp_details();
        $data['subview'] = 'admin/administrative_affairs/employee/salary_test';
        $this->load->view('admin_index', $data);   
    }
    
    public function addTransform()    // Administrative_affairs/addTransform
    {
        $this->load->model('administrative_affairs_models/Transform_model');
        $where = array('id!='=>0);
        if($_SESSION['role_id_fk'] == 3 && $_SESSION['head_dep_id_fk'] == 1){
            $where = array('administration_id_fk'=>$_SESSION['administration_id'],'dep_job_id_fk'=>$_SESSION['dep_job_id_fk']);
        }
        if($_SESSION['role_id_fk'] == 3 && $_SESSION['head_dep_id_fk'] == 2){
            $where = array('emp_code'=>$_SESSION['emp_code']);
            $data['employeeData'] = $this->Transform_model->select_employeeById($_SESSION['emp_code']);
        }
        if($this->input->post('add')){
            $this->Transform_model->insert();
            $this->message('success','إضافة طلب نقل موظف');
            redirect('Administrative_affairs/addTransform');
        }
        $data['employees'] = $this->Transform_model->select_employees($where);
        $data['transforms'] = $this->Transform_model->select_transforms();
        $data['branches'] = $this->Transform_model->mainBranches();
        $data['title'] = 'إضافة طلب نقل موظف';
        $data['subview'] = 'admin/administrative_affairs/transformation/transformation';
        $this->load->view('admin_index', $data);
    }

    public function editTransform($id)
    {
        $this->load->model('administrative_affairs_models/Transform_model');
        $where = array('id!='=>0);
        if($_SESSION['role_id_fk'] == 2 && $_SESSION['head_dep_id_fk'] == 1){
            $where = array('administration_id_fk'=>$_SESSION['administration_id'],'dep_job_id_fk'=>$_SESSION['dep_job_id_fk']);
        }
        if($_SESSION['role_id_fk'] == 3 && $_SESSION['head_dep_id_fk'] == 2){
            $where = array('emp_code'=>$_SESSION['emp_code']);
        }
        if($this->input->post('add')){
            $this->Transform_model->update($id);
            $this->message('success','تعديل طلب نقل');
            redirect('Administrative_affairs/addTransform');
        }
        $data['employees'] = $this->Transform_model->select_employees($where);
        $data['transform'] = $this->Transform_model->select_transformID($id);
        $data['employeeData'] = $this->Transform_model->select_employeeById($data['transform']['emp_id_fk']);
        $data['branches'] = $this->Transform_model->mainBranches();
        $data['title'] = 'تعديل طلب نقل';
        $data['subview'] = 'admin/administrative_affairs/transformation/transformation';
        $this->load->view('admin_index', $data);
    }

    public function deleteTransform($id)
    {
        $this->load->model('administrative_affairs_models/Transform_model');
        $this->Transform_model->delete($id);
        $this->message('success','حذف طلب النقل');
        redirect('Administrative_affairs/addTransform');
    }

    public function transformConfirm() // Administrative_affairs/transformConfirm
    {   
        $this->load->model('administrative_affairs_models/Transform_model');
        $data['newTransforms'] = $this->Transform_model->select_transforms(' AND transformation_employee.approved=0');
        $data['acceptTransforms'] = $this->Transform_model->select_transforms(' AND transformation_employee.approved=1');
        $data['refuseTransforms'] = $this->Transform_model->select_transforms(' AND transformation_employee.approved=2');
        if($this->input->post('accept')){
            $this->confirmTransform($this->input->post('id'), 1);
        }
        if($this->input->post('refuse')){
            $this->confirmTransform($this->input->post('id'), 2);
        }
        $data['accepted'] = $this->Transform_model->acceptedTransforms();
        $data['title'] = 'إعتماد طلبات النقل';
        $data['subview'] = 'admin/administrative_affairs/transformation/transformationsConfirm';
        $this->load->view('admin_index', $data);
    }

    public function confirmTransform($id, $status)
    {
        $this->load->model('administrative_affairs_models/Transform_model');
        $this->Transform_model->transformConfirm($id, $status);
        $this->message('success','إعتماد طلب النقل');
        redirect('Administrative_affairs/transformConfirm');
    }
    
    public function R_transform()
    {
        $this->load->model('administrative_affairs_models/Transform_model');
        $where = array('id!='=>0);
        if($_SESSION['role_id_fk'] == 2 && $_SESSION['head_dep_id_fk'] == 1){
            $where = array('administration_id_fk'=>$_SESSION['administration_id'],'dep_job_id_fk'=>$_SESSION['dep_job_id_fk']);
        }
        if($_SESSION['role_id_fk'] == 3 && $_SESSION['head_dep_id_fk'] == 2){
            $where = array('emp_code'=>$_SESSION['emp_code']);
        }
        $data['employees'] = $this->Transform_model->select_employees($where);
        $data['title'] = 'تقرير الإنتقالات لموظف';
        $data['subview'] = 'admin/administrative_affairs/transformation/R_transform';
        $this->load->view('admin_index', $data);
    }

    public function Get_transform()
    {
        $this->load->model('administrative_affairs_models/Transform_model');
        $data['employee'] = $this->Transform_model->acceptedTransforms(array('emp_code'=>$this->input->post('emp_code')));
        $this->load->view('admin/administrative_affairs/transformation/Get_transform', $data);
    }
    
    public function addResignation()    // Administrative_affairs/addResignation
    {
        $this->load->model('administrative_affairs_models/Resignation_model');
        $where = array('id!='=>0);
        if($_SESSION['role_id_fk'] == 3 && $_SESSION['head_dep_id_fk'] == 1){
            $where = array('administration_id_fk'=>$_SESSION['administration_id'],'dep_job_id_fk'=>$_SESSION['dep_job_id_fk']);
        }
        if($_SESSION['role_id_fk'] == 3 && $_SESSION['head_dep_id_fk'] == 2){
            $where = array('emp_code'=>$_SESSION['emp_code']);
            $data['employeeData'] = $this->Resignation_model->select_employeeById($_SESSION['emp_code']);
        }
        if($this->input->post('add')){
            $this->Resignation_model->insert();
            $this->message('success','إضافة طلب استقالة');
            redirect('Administrative_affairs/addResignation');
        }
        $data['employees'] = $this->Resignation_model->select_employees($where);
        $data['resignations'] = $this->Resignation_model->select_resignations();
        $data['title'] = 'إضافة طلب استقالة ';
        $data['subview'] = 'admin/administrative_affairs/resignation/resignation';
        $this->load->view('admin_index', $data);
    }

    public function editResignation($id)
    {
        $this->load->model('administrative_affairs_models/Resignation_model');
        $where = array('id!='=>0);
        if($_SESSION['role_id_fk'] == 2 && $_SESSION['head_dep_id_fk'] == 1){
            $where = array('administration_id_fk'=>$_SESSION['administration_id'],'dep_job_id_fk'=>$_SESSION['dep_job_id_fk']);
        }
        if($_SESSION['role_id_fk'] == 3 && $_SESSION['head_dep_id_fk'] == 2){
            $where = array('emp_code'=>$_SESSION['emp_code']);
        }
        if($this->input->post('add')){
            $this->Resignation_model->update($id);
            $this->message('success','تعديل طلب الإشعار');
            redirect('Administrative_affairs/addResignation');
        }
        $data['employees'] = $this->Resignation_model->select_employees($where);
        $data['resignation'] = $this->Resignation_model->select_resignationID($id);
        $data['employeeData'] = $this->Resignation_model->select_employeeById($data['resignation']['emp_id_fk']);
        $data['title'] = 'تعديل طلب الاستقالة ';
        $data['subview'] = 'admin/administrative_affairs/resignation/resignation';
        $this->load->view('admin_index', $data);
    }

    public function deleteResignation($id)
    {
        $this->load->model('administrative_affairs_models/Resignation_model');
        $this->Resignation_model->delete($id);
        $this->message('success','حذف طلب الاستقالة');
        redirect('Administrative_affairs/addResignation');
    }

    public function resignationConfirm() // Administrative_affairs/resignationConfirm
    {   
        $this->load->model('administrative_affairs_models/Resignation_model');
        $data['newResignations'] = $this->Resignation_model->select_resignations(array('resignation.approved'=>0));
        $data['acceptResignations'] = $this->Resignation_model->select_resignations(array('resignation.approved'=>1));
        $data['refuseResignations'] = $this->Resignation_model->select_resignations(array('resignation.approved'=>2));
        $data['resignations'] = $this->Resignation_model->select_resignations();
        $data['title'] = 'إعتماد طلبات الاستقالة';
        $data['subview'] = 'admin/administrative_affairs/resignation/resignationConfirm';
        $this->load->view('admin_index', $data);
    }

    public function confirmResignation($status, $id,$emp_id_fk)
    {
        $this->load->model('administrative_affairs_models/Resignation_model');
        $this->Resignation_model->resignationConfirm($id, $status,$emp_id_fk);
        $this->message('success','إعتماد طلب الاستقالة');
        redirect('Administrative_affairs/resignationConfirm');
    }
    
    
    /*********************************/
    
      public function add_politicals_and_rules($id){//Administrative_affairs/add_politicals_and_rules/0

        $this->load->model('administrative_affairs_models/Politicals_and_rules_model');
        if($this->input->post('add') && $id == 0){

            $file_name='file';
            $file= $this->upload_file($file_name);

            $this->Politicals_and_rules_model->insert($file);
            $this->message('success','إضافةالسياسات والإجراءات');
            redirect('Administrative_affairs/add_politicals_and_rules/0', 'refresh');
        }
        if($this->input->post('add') && $id != 0){

            $file_name='file';
            $file= $this->upload_file($file_name);
            $this->Politicals_and_rules_model->update($id,$file);
            $this->message('success','تعديل السياسات والإجراءات');
            redirect('Administrative_affairs/add_politicals_and_rules/0', 'refresh');
        }
        if($id != 0)
            $data['result']=$this->Politicals_and_rules_model->getById($id);
        $data['records']=$this->Politicals_and_rules_model->select();
        $data['title'] = 'إدارة السياسات والإجراءات';
        $data['subview'] = 'admin/administrative_affairs/politicals_and_rules/add_politicals_and_rules';
        $this->load->view('admin_index', $data);
    }
    public function delete_politicals_and_rules($id){
        $this->load->model('administrative_affairs_models/Politicals_and_rules_model');
        $this->Politicals_and_rules_model->delete($id);
        redirect('Administrative_affairs/add_politicals_and_rules/0');
    }


    public function download($id)
    {
        $this->load->model('administrative_affairs_models/Politicals_and_rules_model');
        $users=$this->Politicals_and_rules_model->folder($id);
        $name = $users->file;
        force_download($name, $users->file);
    }

    public function read_file()
    {
        $this->load->helper('file');
        $file_name=$this->uri->segment(3);
        $file_path = 'uploads/files/'.$file_name;
        header('Content-Type: application/pdf');
        header('Content-Discription:inline; filename="'.$file_name.'"');
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges:bytes');
        header('Content-Length: ' . filesize($file_path));
        readfile($file_path);
    }
    
    
    /********************************************************************/
 
    public function Penality_reports() //  Administrative_affairs/Penality_reports
    {   
     
         $this->load->model('administrative_affairs_models/Penalty_model');
        
        $data['all_curenr_mon_penalites'] = $this->Penalty_model->select_all_emp_penalty();
        $data['title'] = 'الجزاءات خلال الشهر';
        $data['subview'] = 'admin/administrative_affairs/Reports/current_month_penality';
        $this->load->view('admin_index', $data);
    }   
      
  /***************************************************************/
  
  /** تعريف موطف ****/
  
  

public function  Definition_employee(){ ////   Administrative_affairs/Definition_employee

    $this->load->model('administrative_affairs_models/Definition');
    if($this->input->post('add')){

        $this->Definition->insert_member();

        redirect('Administrative_affairs/Definition_employee', 'refresh');
    }elseif($this->input->post('admin_num')){

        $data['employees'] = $this->Definition->getById_employees($this->input->post('admin_num'));
        $this->load->view('admin/administrative_affairs/definitions_view/get_emp_data',$data);

    }else{

        $data["all_employees"]=$this->Definition->select_employee();
        $data["records"]=$this->Definition->select_define();
        $data["all_emp"]=$this->Definition->all_emp();

        $data['title'] = 'تعريف  الموظف / الموظفة ';
        $data['metakeyword'] = 'تعريف  الموظف / الموظفة';
        $data['metadiscription'] = 'تعريف  الموظف / الموظفة';
        $data['subview'] = 'admin/administrative_affairs/definitions_view/definition_employee';
        $this->load->view('admin_index', $data);
    }

}
public function  edit_definition_employee($id){   ////    Definitions/edit_definition_employee

    $this->load->model('administrative_affairs_models/Definition');
    $this->load->model('Difined_model');
    if($this->input->post('edit')){
        $this->Definition->update($id);
        redirect('Administrative_affairs/Definition_employee', 'refresh');

    }elseif($this->input->post('admin_num')){

        $data['employees'] = $this->Definition->getById_employees($this->input->post('admin_num'));
        $this->load->view('admin/administrative_affairs/definitions_view/get_emp_data',$data);
    }else{

        $data["all_employees"]=$this->Definition->select_employee();
        $data["records"]=$this->Definition->select_define();
        $data["all_emp"]=$this->Definition->all_emp();
        $data['result'] = $this->Difined_model->select_search_key('employees_defined','id',$id);
        $data['title'] = 'تعريف  الموظف / الموظفة ';
        $data['metakeyword'] = 'تعريف  الموظف / الموظفة';
        $data['metadiscription'] = 'تعريف  الموظف / الموظفة';
        $data['subview'] = 'admin/administrative_affairs/definitions_view/definition_employee';
        $this->load->view('admin_index', $data);
    }

}

public function delete_definition_employee($id){   ////    Definitions/delete_definition_employee
    $this->load->model('administrative_affairs_models/Definition');
    $this->Definition->delete($id);
    redirect('Administrative_affairs/Definition_employee');
}


public function printer_employee($id) // Administrative_affairs/printer_employee
{
    $this->load->model('administrative_affairs_models/Definition');
    $data['records'] = $this->Definition->printemp($id);
    $data["all_emp"]=$this->Definition->all_emp();
    $data['employees'] = $this->Definition->getById_employees($data["records"]['employees_id_fk']);
    $data["department_jobs"]=$this->Definition->department_jobs();
    $this->load->view('admin/administrative_affairs/print_files/printeDefinition', $data);
}
public function printResignation($id){ //Administrative_affairs/printResignation
    $this->load->model('administrative_affairs_models/Resignation_model');
    $data["result"] = $this->Resignation_model->getById($id);
    $data['subview'] = 'admin/administrative_affairs/print_files/printResignation';
    $this->load->view('admin_index', $data);
}
/**************************************/  

public function addAbsence_report() // Administrative_affairs/addAbsence_report
    {
        $this->load->model('administrative_affairs_models/Absence_report');
        if($this->input->post('add')){
            $this->Absence_report->add();
            $this->message('success','إضافة مساءلة غياب');
            redirect('Administrative_affairs/addAbsence_report');
        }
        $data['records'] = $this->Absence_report->select();
        $data['title'] = 'مساءلة غياب';
        $data['subview'] = 'admin/administrative_affairs/absence_report/absence_report';
        $this->load->view('admin_index', $data);
    }

    public function GetEmpData()
    {
        $this->load->model('administrative_affairs_models/Absence_report');
        echo json_encode($this->Absence_report->GetEmpData($this->input->post('emp_name')));
    }

    public function printAbsence_report($id,$url)
    {
        $this->load->model('administrative_affairs_models/Absence_report');
        $data['record'] = $this->Absence_report->selectById($id);
        $data['url'] = $url;
        $this->load->view('admin/administrative_affairs/absence_report/printAbsence_report', $data);
    }

    public function editAbsence_report($id)
    {
        $this->load->model('administrative_affairs_models/Absence_report');
        if($this->input->post('add')){
            $data['emp_id']           = $this->input->post('emp_id');
            $data['absence_days_num'] = $this->input->post('absence_days_num');
            $data['date_from']        = strtotime($this->input->post('date_from'));
            $data['date_from_day']    = $this->input->post('date_from_day');
            $data['date_to']          = strtotime($this->input->post('date_to'));
            $data['date_to_day']      = $this->input->post('date_to_day');
            $data['direct_boss']      = $this->input->post('direct_boss');
            $data['statement1_date']  = strtotime($this->input->post('statement1_date'));
            $data['status']           = 0;
            $this->Absence_report->update($id,$data);
            $this->message('success','تعديل مساءلة غياب');
            redirect('Administrative_affairs/addAbsence_report');
        }
        $data['report'] = $this->Absence_report->selectById($id);
        $data['title'] = 'مساءلة غياب';
        $data['subview'] = 'admin/administrative_affairs/absence_report/absence_report';
        $this->load->view('admin_index', $data);
    }

    public function deleteAbsence_report($id)
    {
        $this->load->model('administrative_affairs_models/Absence_report');
        $this->Absence_report->delete($id);
        $this->message('success','حذف مساءلة غياب');
        redirect('Administrative_affairs/addAbsence_report');
    }

    public function tableAbsence_report()
    {
        $this->load->model('administrative_affairs_models/Absence_report');
        
        /*if($_SESSION['role_id_fk'] == 3 && $_SESSION['head_dep_id_fk'] == 2){
            $where = '(absence_report.status=0 OR absence_report.status=1) AND absence_report.emp_id='.$_SESSION['user_id'];
        }
        elseif($_SESSION['role_id_fk'] == 2 && $_SESSION['head_dep_id_fk'] == 1){
            $where = '(absence_report.status=1 OR absence_report.status=2)';
        }
        else {
            $where = '(absence_report.status=2 OR absence_report.status=3)';
        }*/
        $data['records'] = $this->Absence_report->select();
        $data['title'] = 'مساءلة غياب';
        $data['subview'] = 'admin/administrative_affairs/absence_report/absence_report_table';
        $this->load->view('admin_index', $data);
    }

    public function updateAbsence_reportemp($id)
    {
        $this->load->model('administrative_affairs_models/Absence_report');
        if($this->input->post('add')){
            $file_name = 'pdf';
            $file = upload_file($file_name);
            $data['statement2']      = $this->input->post('statement2');
            $data['statement2_date'] = strtotime(date("Y-m-d"));
            $data['status']          = 1;
            if($file) {
                $data['file']            = $file;
            }
            $this->Absence_report->update($id,$data);
            $this->message('success','إضافة سبب');
            redirect('Administrative_affairs/tableAbsence_report');
        }
    }

    public function updateAbsence_reportopenion($id)
    {
        $this->load->model('administrative_affairs_models/Absence_report');
        $data['openion']      = $this->input->post('openion');
        $data['openion_date'] = strtotime(date("Y-m-d"));
        $data['openion_name'] = $this->input->post('openion_name');
        $data['status']       = 2;
        $this->Absence_report->update($id,$data);
        $this->message('success','إضافة رأي شؤون الموظفين');
        redirect('Administrative_affairs/tableAbsence_report');
    }
    
    
    /***********************************************************/
   /*    public function addDay_delay()    // Administrative_affairs/addDay_delay
    {
        $this->load->model('administrative_affairs_models/Day_delay_model');
        $this->load->model('Difined_model');

        if($this->input->post('add')){
            $this->Day_delay_model->insert();
            $this->message('success','إضافة مساءلة  تأخير');
            redirect('Administrative_affairs/addDay_delay');
        }elseif($this->input->post('employee_id')){
            $data['delayies']=$this->Day_delay_model->get_all(2);
            $data['records']=$this->Day_delay_model->getEmp_name($this->input->post('employee_id'));
            $this->load->view('admin/administrative_affairs/day_delay_view/load_pages/get_emp_data',$data);
        }else{
            $data['employees'] = $this->Difined_model->select_all("employees","","","","");
            $data['records'] = $this->Day_delay_model->select();
            $data['title'] = 'مساءلة تأخير';
            $data['subview'] = 'admin/administrative_affairs/day_delay_view/addDay_delay';
            $this->load->view('admin_index', $data);
        }
    }

    public function get_day_delay()//Administrative_affairs/get_day_delay
    {
        $this->load->model('administrative_affairs_models/Day_delay_model');
        $data['delayies']=$this->Day_delay_model->get_all(2);

        $data['subview'] = 'admin/administrative_affairs/day_delay_view/reason_employee';
        $this->load->view('admin_index', $data);
    }
      public function update_day()
      {
          $this->load->model('administrative_affairs_models/Day_delay_model');
          $this->Day_delay_model->update_day();
          redirect('Administrative_affairs/get_day_delay','refresh');
      }
   public function update_delay()
    {

        $this->load->model('administrative_affairs_models/Day_delay_model');
        $this->Day_delay_model->update_day_delay();
       // redirect('Administrative_affairs/get_day_delay','refresh');
    }
    
    public function update_delay()
    {
    $num_day = $this->uri->segment(3);
    $num =$this->uri->segment(4);
    $emp_id=$this->uri->segment(5);


    $this->load->model('administrative_affairs_models/Day_delay_model');
    $this->Day_delay_model->update_day_delay ($num_day,$num,$emp_id);
    redirect('Administrative_affairs/get_day_delay','refresh');
    }

    
    
    
    public function printDay_delay($emp_id){
    $this->load->model('administrative_affairs_models/Day_delay_model');
    $data['result'] = $this->Day_delay_model->get_all_days($emp_id);
    $data['emp_data'] =$this->Day_delay_model->getEmp_name($emp_id);
    $data['subview'] = 'admin/administrative_affairs/day_delay_view/printDay_delay';
    $this->load->view('admin_index', $data);
    
    
    }

*/
         public function addDay_delay()    // Administrative_affairs/addDay_delay
         {
            $this->load->model('administrative_affairs_models/Day_delay_model');
            $this->load->model('Difined_model');
    
            if($this->input->post('add')){
                $this->Day_delay_model->insert();
                $this->message('success','إضافة مساءلة  تأخير');
                redirect('Administrative_affairs/addDay_delay');
            }elseif($this->input->post('employee_id')){
                $data['delayies']=$this->Day_delay_model->get_all($this->input->post('employee_id'));
                $data['records']=$this->Day_delay_model->getEmp_name($this->input->post('employee_id'));
                $this->load->view('admin/administrative_affairs/day_delay_view/load_pages/get_emp_data',$data);
            }else{
                $data['employees'] = $this->Difined_model->select_all("employees","","","","");
                $data['records'] = $this->Day_delay_model->select();
                $data['title'] = 'مساءلة تأخير';
                $data['subview'] = 'admin/administrative_affairs/day_delay_view/addDay_delay';
                $this->load->view('admin_index', $data);
            }
         }
    
        public function get_day_delay()
        {
    
            $id=$this->input->post('id');
    
            $this->load->model('administrative_affairs_models/Day_delay_model');
            $data['delayies']=$this->Day_delay_model->get_all($id);
    
    
            $this->load->view('admin/administrative_affairs/day_delay_view/reason_employee', $data);
        }
        public function update_day()
          {
              $this->load->model('administrative_affairs_models/Day_delay_model');
              $this->Day_delay_model->update_day();
              redirect('Administrative_affairs/get_day_reason','refresh');
          }
    
        
        
        
        
        
        
        
        
        public function update_delay()
    {
        $num_day = $this->uri->segment(3);
        $num =$this->uri->segment(4);
        $emp_id=$this->uri->segment(5);
    
    
        $this->load->model('administrative_affairs_models/Day_delay_model');
        $this->Day_delay_model->update_day_delay ($num_day,$num,$emp_id);
        redirect('Administrative_affairs/addDay_delay','refresh');
    }
    
        
        
        
        public function printDay_delay($emp_id,$num){
        $this->load->model('administrative_affairs_models/Day_delay_model');
        $data['result'] = $this->Day_delay_model->get_all_days2($emp_id,$num);
        $data['emp_data'] =$this->Day_delay_model->getEmp_name($emp_id);
        $data['subview'] = 'admin/administrative_affairs/day_delay_view/printDay_delay';
        $this->load->view('admin_index', $data);
    }
    
    public function get_day_reason()//Administrative_affairs/get_day_reason
    {
    $data['title']="مساءلات الموظفين";
        $data['employees'] = $this->Difined_model->select_all("employees","","","","");
        $data['subview'] = 'admin/administrative_affairs/day_delay_view/get_reason';
        $this->load->view('admin_index', $data);
    }
    
     
 public function checkEmp(){
    $this->load->model('administrative_affairs_models/Permitsmodel');
    $this->load->model('Difined_model');
    $ozon = $this->Difined_model->select_all('ozonat_num_setting','','1','id','desc')[0];
    $employee_permit_number = $this->Permitsmodel->get_permit_numbers($_POST['myCode']);
    $data['employee_permit_number'] =$employee_permit_number;
    $data['max'] =$ozon->ozon_num_month;
    echo json_encode($data);
} 


   public function emp_finance()//Administrative_affairs/emp_finance
    {
        $this->load->model('administrative_affairs_models/Employee');
    $data['title']="مكافئات المعارين متعاونين";
       // $data['employees'] = $this->Employee->select_emp_supporter();
       $data['employees'] = $this->Employee->all_emp_salary_supporter();
       
        $data['subview'] = 'admin/administrative_affairs/supporter/show_supporter';
        $this->load->view('admin_index', $data);
    }  

 public function add_past_vacation()	// Administrative_affairs/add_past_vacation
    {

        $this->load->model('administrative_affairs_models/Employee');
        
        if($this->input->post('free_days')){
            //$this->test($this->input->post('data'));
            $this->Employee->delete_past_vacation($this->input->post('data')[0]['emp_id']);
            $this->Employee->add_past_vacation();
            redirect('Administrative_affairs/add_employee', 'refresh');
        }
        
    }
   
    //-------------------------------Osama-------------------------------------
    public  function  EmployeeVacationsReport(){   // Administrative_affairs/EmployeeVacationsReport
        $this->load->model('administrative_affairs_models/Employee');
        
        $data['title']="تقرير بأجازات واذونات موظف خلال الشهر الحالي";
        $data['employees']= $this->Employee->all_emps();
        $data['subview'] = 'admin/administrative_affairs/employee/reports/Employee_vacatoin_report';
        $this->load->view('admin_index', $data);
    }


    public function getEmployeeVacations()   // Administrative_affairs/getEmployeeVacations
    {
        $this->load->model('administrative_affairs_models/Employee');
        $emp_id=$this->input->post('employee_id');
        $data['employee']=$this->Employee->emp_reportBy_id($emp_id);



        $this->load->view('admin/administrative_affairs/employee/reports/get_vactaion_details', $data);
    }



    public function printEmployeeVacationsReport($emp_id){ //Administrative_affairs/printEmployeeVacationsReport
        $this->load->model('administrative_affairs_models/Employee');
        $data['employee']=$this->Employee->emp_reportBy_id($emp_id);

        $this->load->view('admin/administrative_affairs/employee/reports/print_vactaion_details', $data);
    }
    //------------------------------Osama--------------------------------------

public  function  getAvailableDays(){
    $this->load->model('administrative_affairs_models/Vacation');
    $data_vacation= $this->Vacation->getVacationDays($this->input->post('emp_id'),$this->input->post('type'))[0];
    $data['allowed_days']= $data_vacation->allowed_days ;
    $data['days'] = $_POST['days'];
    $data['raseed'] =(( $data_vacation->current_num  + $data_vacation->past_num) -  $data_vacation->vacations_taken);
    echo json_encode($data);
}


 } // END CLASS 

/* End of file Administrative_affairs.php */