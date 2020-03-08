<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Order_activites extends MY_Controller {

    public function __construct(){
        parent::__construct();
        if($this->session->userdata('is_logged_in')==0){
            redirect('login');
        }
        
        
                       $this->load->model('familys_models/for_dash/Counting');
         
        $this->count_basic_in  = $this->Counting->get_basic_in_num();
        $this->files_basic_in  = $this->Counting->get_files_basic_in();  

        
        
        $this->myarray = array (1=>'نوع الهوية ', 2=>'الجنسية', 3=>'المهنة ',
                        4=>'الحالة الاجتماعية ',5=>'السكن',6=>'الحاله الصحية ',
                        8=>'المستوى التعليمى ',9=>'الحالة الدراسية  ',
                        10=>'نوع التعليم  ',11=>'نشاط العمل  ',12=>'المنطقة  ',
                        13=>'نوع ملكية السكن ',14=>'نوع السكن ',15=>'ترميز المدارس ',
                        16=>'أنواع الاجهزة الطبية  ',17=>'الادويىة الطبية ',18=>'الاجهزة المنزلية ',
                        19=>'الاثاث المنزلى  ',20=>'المستلزمات المدرسية ',21=>'أنواع اصلاحات المنزل ' ,
                        22=>'حالة السكن  ',23=>"اتجاه المنزل",24=>"انواع الترميم بالمنزل  ",
                        25=>'اسباب الوفاة  ',26=>"ترميزات المدارس ",27=>"حالات تواجد الام ",
                        28=>"إنطباعات الام عن الزيارة  " ,29 =>"فئات الاسر"
                        
                        
                ,32=>"طبيعة الفرد",33=>"تصنيف كل فرد",34=>"صلة القرابة",35=>"نوع المرض",36=>"جهة متابعات المرضي والمعاقين",
                37=>"وضع حالات المرضي والمعاقين",38=>"مصدر الهوية",39=>"مستوى التحصيل الدراسي",40=>"الحالة الدراسية",
                41=>"المستوى التعليمي",42=>"إعدادات مصادر الدخل",43=>"إعدادات الإلتزامات الشهرية",44=>"الدار النسائية"
                        
                        
);

        
        
        $this->load->helper(array('url','text','permission','form'));
        $this->load->model('system_management/Groups');
        $this->load->model('familys_models/Model_setting');
        
        $this->groups=$this->Groups->get_group($_SESSION["group_number"]);
        $this->groups_title=$this->Groups->get_group_title($_SESSION["group_number"]);
    }
    
        private  function test($data=array()){
              echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }
    private function message($type,$text){
        if($type =='success') {
            return $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> تم بنجاح!</strong> '.$text.'.</div>');
        }elseif($type=='wiring'){
            return $this->session->set_flashdata('message','<div class="alert alert-dwarning alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> تحذير  !</strong> '.$text.'.</div>');
        }elseif($type=='error'){
            return  $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>خطأ!</strong> '.$text.'.</div>');
        }
    }
    public function index(){    //   family_controllers/Setting
        $data['all']= $this->Model_setting->get_all_data($this->myarray);
        $data['subview'] = 'admin/familys_views/all_sitting/all_sitting';
        $this->load->view('admin_index', $data);
    }
    public function AddSitting($type){
        
       /* if($this->input->post('add')){
            $this->Model_setting->add($type);
            $this->message('success','إضافة '.$this->myarray[$type]);
            redirect('family_controllers/Setting','refresh');
        }*/
          if($this->input->post('add')){
            $this->Model_setting->add($type);
            $this->message('success','إضافة '.$this->myarray[$type]);
            redirect('family_controllers/setting','refresh');
        }
        
        if($this->input->post('add_save')){
             $this->Model_setting->add($type);
             $this->message('success','إضافة '.$this->myarray[$type]);
             redirect('family_controllers/Setting/AddSitting/'.$type,'refresh');             
                    
        }
        $data["type"]=$type;
        $data["type_name"]=$this->myarray[$type];
        $data['title'] = 'إضافة '.$this->myarray[$type];
        $data['subview'] = 'admin/familys_views/all_sitting/add_sitting';
        $this->load->view('admin_index', $data);
    }
    public function UpdateSitting($id,$type){
        $data['record'] = $this->Model_setting->getById($id);
        $data["type"]=$type;
        $data["id"]=$id;
        $data["type_name"]=$this->myarray[$type];
        if($this->input->post('add')){
            $this->Model_setting->update($id);
            $this->message('success','إضافة ');
            redirect('family_controllers/Setting','refresh');
        }
        $data['title'] = 'تعديل ';
        $data['subview'] = 'admin/familys_views/all_sitting/add_sitting';
        $this->load->view('admin_index', $data);
    }
    public function DeleteSitting($id){
        $this->Model_setting->delete($id);
        $this->message('success','حذف ');
        redirect('family_controllers/Setting','refresh');
    }
    /*****************************************/
    
     public function add_socity_branch() // family_controllers/Setting/add_socity_branch
  {
      $data['titles']="اضافه فروع الجمعيه";
      if($this->input->post('add')){
          $this->Model_setting->add_data('socity_branch');
         // $this->message('succes',"تمت الاضافه بنجاح");
          redirect('family_controllers/Setting/add_socity_branch','refresh');
      }
      $data['records']=$this->Model_setting->get_data_branch('socity_branch');

      $data['subview'] = 'admin/familys_views/all_sitting/add_branch';
      $this->load->view('admin_index', $data);
  }
    public function delete_from_table($id,$table)
    {
        $this->Model_setting->delete_where_id($id,$table);
        redirect('family_controllers/Setting/add_socity_branch','refresh');

    }
    public function update_table($id,$table)
    {
        $data['title']="تعديل الفرع";
        $data['row']= $this->Model_setting->get_where_id($id,$table);
        if($this->input->post('add')){
            $this->Model_setting->update_by_id($id,$table);
            redirect('family_controllers/Setting/add_socity_branch','refresh');

        }

        $data['subview'] = 'admin/familys_views/all_sitting/add_branch';
        $this->load->view('admin_index', $data);
    }
    
    
        public function add_setting_banks() // family_controllers/Setting/add_setting_banks
    {
        $data['title']="اضافه اعدادات البنوك";
        if($this->input->post('add')){
            $this->Model_setting->add_data('banks_settings');

           redirect('family_controllers/Setting/add_setting_banks','refresh');


        }
        $data['records']=$this->Model_setting->get_data_branch('banks_settings');

        $data['subview'] = 'admin/familys_views/all_sitting/add_bank_setting';
        $this->load->view('admin_index', $data);
    }
    
    
    public function update_table_bank($id,$table)
    {
        $data['title']="تعديل رقم حساب البنك";
        $data['row']= $this->Model_setting->get_where_id($id,$table);
        
        if($this->input->post('add')){


            $this->Model_setting->update_by_id($id,$table);
            redirect('family_controllers/Setting/add_setting_banks','refresh');

        }

        $data['subview'] = 'admin/familys_views/all_sitting/add_bank_setting';
        $this->load->view('admin_index', $data);
    }


    public function delete_from_table_bank($id,$table)
    {
        $this->Model_setting->delete_where_id($id,$table);
        redirect('family_controllers/Setting/add_setting_banks','refresh');

    }
    
    /********************************************************/
    
    /******** المناطق ****************/
        /*****************************************/
    public function AreaSetting()
    {  // family_controllers/Setting/AreaSetting
        $this->load->model('familys_models/Model_area_sitting');
        if ($this->input->post('ADD') == "ADD") {
       // $this->test($_POST);
          $this->Model_area_sitting->insert();
            $this->message('success','الإضافة  ');
            redirect('family_controllers/Setting/AreaSetting','refresh');
        }elseif ($this->input->post('form_tupe')) {
            $data_load['area'] = $this->Model_area_sitting->select_type(1);
            $data_load['city'] = $this->Model_area_sitting->select_type(2);
            $data_load['centers'] = $this->Model_area_sitting->select_type(3);
            $data_load["form_type"] = $this->input->post('form_tupe');
            $this->load->view('admin/familys_views/area_sitting/load', $data_load);
        }elseif ($this->input->post('value_id')) {
            $id=$this->input->post('value_id');
            $data["records_row"]=$this->Model_area_sitting->select_places($id);
            $this->load->view('admin/familys_views/area_sitting/load_places',$data);
        }else {
           /* $data['area'] = $this->Model_area_sitting->select_type(1);
            $data['city'] = $this->Model_area_sitting->select_type(2);
            $data['centers'] = $this->Model_area_sitting->select_type(3);*/
            $data['data_table']=$this->Model_area_sitting->select_all();
            $data['title'] = "إعدادات الاماكن ";
            $data['subview'] = 'admin/familys_views/area_sitting/add_area_sitting';
            $this->load->view('admin_index', $data);
        }
    }
    //============================================================
    public  function UpdateAreaSetting($id){  // family_controllers/Setting/UpdateAreaSetting
        $this->load->model('familys_models/Model_area_sitting');
        if ($this->input->post('UPDATE') == "UPDATE") {
            // $this->test($_POST);
            $this->Model_area_sitting->update($id);
            $this->message('success','التعديل   ');
            redirect('family_controllers/Setting/AreaSetting','refresh');
        }elseif ($this->input->post('form_tupe')) {
            $data_load['area'] = $this->Model_area_sitting->select_type(1);
            $data_load['city'] = $this->Model_area_sitting->select_type(2);
            $data_load['centers'] = $this->Model_area_sitting->select_type(3);
            $data_load["form_type"] = $this->input->post('form_tupe');
            $this->load->view('admin/familys_views/area_sitting/load', $data_load);
        }elseif ($this->input->post('value_id')) {
            $id=$this->input->post('value_id');
            $data["records_row"]=$this->Model_area_sitting->select_places($id);
            $this->load->view('admin/familys_views/area_sitting/load_places',$data);
        }else {
            $data["result"]=$this->Model_area_sitting->getByArray(array("id"=>$id));

            $data['area'] = $this->Model_area_sitting->select_type(1);
            $data['city'] = $this->Model_area_sitting->select_type(2);
            $data['centers'] = $this->Model_area_sitting->select_type(3);
            $data['title'] = "إعدادات الاماكن ";
            $data['subview'] = 'admin/familys_views/area_sitting/update_area_setting';
            $this->load->view('admin_index', $data);
        }
    }
    //=========================================================
    public  function DeleteAreaSetting($id){
        $this->load->model('familys_models/Model_area_sitting');
        $this->Model_area_sitting->delete(array("id"=>$id));
        $this->message('success','الحذف   ');
        redirect('family_controllers/Setting/AreaSetting','refresh');
    }
    
 /****************************************************************************/
 
   

    /// ادارة اختيارات التحديثات

    public function files_option_updates() // family_controllers/Setting/files_option_updates
    {
        if ($this->input->post('add_file_option')){
            $this->Model_setting->add_files_option_updates();

            redirect('family_controllers/Setting/files_option_updates','refresh');
        }else{

            $data['updates']=$this->Model_setting->select_all_updates();
            $data['title'] = "اختيارات تحديثات ملف الأسر ";
            $data['subview'] = 'admin/familys_views/all_sitting/files_option_updates';
            $this->load->view('admin_index', $data);


        }
    }

    public function edit_files_option_updates($id){
        $data['update']=$this->Model_setting->file_update_byId($id);
        $data['title'] = "اختيارات تحديثات ملف الأسر ";
        $data['subview'] = 'admin/familys_views/all_sitting/files_option_updates';
        $this->load->view('admin_index', $data);
    }



    public function update_files_option_updates($id)
    {

            $this->Model_setting->update_files_option_updates($id);

            redirect('family_controllers/Setting/files_option_updates','refresh');

    }



    public function delete_files_option_updates($id)
    {

        $this->Model_setting->delete_files_option_updates($id);

        redirect('family_controllers/Setting/files_option_updates','refresh');

    }

    /// ادارة الإجراءات

    public function procedures_option_lagna() // family_controllers/Setting/procedures_option_lagna
    {
        if ($this->input->post('add_option')){
            $this->Model_setting->add_procedures_option_lagna();

            redirect('family_controllers/Setting/procedures_option_lagna','refresh');
        }else{

            $data['options']=$this->Model_setting->select_all_lagnas();
            $data['title'] = " إجراءات لجنة ملف الأسر ";
            $data['subview'] = 'admin/familys_views/all_sitting/procedures_option_lagna';
            $this->load->view('admin_index', $data);


        }
    }


    public function edit_procedures_option_lagna($id){
        $data['option']=$this->Model_setting->procedure_option_byId($id);
        $data['title'] = " إجراءات لجنة ملف الأسر ";
        $data['subview'] = 'admin/familys_views/all_sitting/procedures_option_lagna';
        $this->load->view('admin_index', $data);
    }


    public function update_procedures_option_lagna($id)
    {

        $this->Model_setting->update_procedures_option_lagna($id);

        redirect('family_controllers/Setting/procedures_option_lagna','refresh');

    }




    public function delete_procedures_option_lagna($id)
    {

        $this->Model_setting->delete_procedures_option_lagna($id);

        redirect('family_controllers/Setting/procedures_option_lagna','refresh');

    }



    //مواعيد الدوام + تنبيه تحديثات الاسر



    public function setting_gameya_and_updates() // family_controllers/Setting/setting_gameya_and_updates
    {
        $data['timeWork'] = $this->Model_setting->select_time_work();
        $data['numDays'] = $this->Model_setting->select_file_day_num();
        $data['title'] = "موعيد الدوام للجمعية وتحديث ملف الاسر ";
        $data['subview'] = 'admin/familys_views/all_sitting/setting_gameya_and_updates';
        $this->load->view('admin_index', $data);
    }



    public function add_time_work_gameya() // family_controllers/Setting/add_time_work_gameya
    {
        $this->Model_setting->delete_timeWork();
        $this->Model_setting->add_time_work();
        redirect('family_controllers/Setting/setting_gameya_and_updates','refresh');
    }

   
    public function add_file_day_num() // family_controllers/Setting/add_file_day_num
    {
        $this->Model_setting->delete_file_day_num();
        $this->Model_setting->add_file_day_num();
        redirect('family_controllers/Setting/setting_gameya_and_updates','refresh');
    }

  //_________________________________________osama**********************


/**
 * 
 *@author Osamam 
 */ 
   
//_________________________________________osama**********************

    public function person_ages_setting(){ // family_controllers/Setting/person_ages_setting

    if ($this->input->post('add')){
        $this->Model_setting->add_person_ages_setting();

        redirect('family_controllers/Setting/person_ages_setting','refresh');
    }else {

        $data['record'] = $this->Model_setting->select_person_ages();

        $data['title'] = "اعدادات";
        $data['subview'] = 'admin/familys_views/all_sitting/person_ages_settings';
        $this->load->view('admin_index', $data);
    }
  }


    public function update_person_ages_setting($id){ // family_controllers/Setting/person_ages_setting

        if ($this->input->post('update')){
            $this->Model_setting->update_person_ages_setting($id);

            redirect('family_controllers/Setting/person_ages_setting','refresh');
        }else {

            $data['record'] = $this->Model_setting->select_person_ages();

            $data['title'] = "اعمار المستفيدين";
            $data['subview'] = 'admin/familys_views/all_sitting/person_ages_settings';
            $this->load->view('admin_index', $data);
        }
    }




    public function files_status_setting(){ // family_controllers/Setting/files_status_setting

        if ($this->input->post('add_status')){
            $this->Model_setting->add_files_status_setting();

            redirect('family_controllers/Setting/files_status_setting','refresh');
        }else {

           $data['all'] = $this->Model_setting->select_files_status_setting();

            $data['title'] = "إعدادات حالات الملفات";
            $data['subview'] = 'admin/familys_views/all_sitting/files_status_setting';
            $this->load->view('admin_index', $data);
        }
    }



    public function update_files_status_setting($id){ // family_controllers/Setting/update_files_status_setting

        if ($this->input->post('add_status')){
            $this->Model_setting->update_files_status_setting($id);

            redirect('family_controllers/Setting/files_status_setting','refresh');
        }else {

            $data['record'] = $this->Model_setting->files_status_settingById($id);

            $data['title'] = "إعدادات حالات الملفات";
            $data['subview'] = 'admin/familys_views/all_sitting/files_status_setting';
            $this->load->view('admin_index', $data);
        }
    }

    public function delete_files_status_setting($id) // family_controllers/Setting/delete_files_status_setting
    {

        $this->Model_setting->delete_files_status_setting($id);

        redirect('family_controllers/Setting/files_status_setting','refresh');

    }
    
    /***************************************************/ 
    
    // Order_activites 
    public function add_activites_orders() // P_activites/Order_activites/add_activites_orders
    {  // family_controllers/Setting/AreaSetting
       $this->load->model('familys_models/Activites_orders_m');
       
        if ($this->input->post('ADD') == "ADD") {
     //  $this->test($_POST);
          $this->Activites_orders_m->insert_activites_orders();
            $this->message('success','الإضافة  ');
            redirect('P_activites/Order_activites/add_activites_orders','refresh');
        }elseif ($this->input->post('form_tupe')) {
            
            echo ($this->input->post('form_tupe'));
            if($this->input->post('form_tupe') == 1){
              $this->load->model('all_Finance_resource_models/orphan_program/Programs_dep'); 
                   $data_load["form_type"] = $this->input->post('form_tupe');
                        
                  $data_load['member_data']=$this->Programs_dep->member_mothers();     
            }elseif($this->input->post('form_tupe') == 2)
            {
                
                
               $data['member_data']=$this->Activites_orders_m->select_all();
   
                
             $data_load['member_data'] = $this->Activites_orders_m->select_all_members(); 
             
               $data_load["form_type"] = $this->input->post('form_tupe');
            }elseif($this->input->post('form_tupe') == 3){
              $data_load['sdasd'] = 'members';  
                $data_load["form_type"] = $this->input->post('form_tupe');
            }elseif($this->input->post('form_tupe') == 4){
                 $data_load['sdasd'] = 'members';  
                   $data_load["form_type"] = $this->input->post('form_tupe');
            }else{
                 $data_load['sdasd'] = 'members';  
            }
 
            
            $this->load->view('admin/familys_views/orders_activites/load', $data_load);
        }elseif ($this->input->post('value_id')) {
            $id=$this->input->post('value_id');
            $data["records_row"]=$this->Activites_orders_m->select_places($id);
            $this->load->view('admin/familys_views/area_sitting/load_places',$data);
        }elseif ($this->input->post('admin_num')) {
            $data_load_2['admin'] = $this->Activites_orders_m->select_by();
            $data_load_2['departs'] = $this->Activites_orders_m->select_depart();
            
            
            $data_load_2['id']=$this->input->post('admin_num');
            $this->load->view('admin/familys_views/orders_activites/get_activity',$data_load_2);
        }else{
      
            $data['admin'] = $this->Activites_orders_m->select_by();
         //   $data['departs'] = $this->Activites_orders_m->select_depart();
           $data['member_data'] = $this->Activites_orders_m->select_all_members(); 
            $data['title'] = "إعدادات الاماكن ";
            $data['subview'] = 'admin/familys_views/orders_activites/add_orders_activites';
            $this->load->view('admin_index', $data);
        }
    }       
    
    
}