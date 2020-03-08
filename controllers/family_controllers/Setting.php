<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Setting extends MY_Controller {

    public function __construct(){
        parent::__construct();
        if($this->session->userdata('is_logged_in')==0){
            redirect('login');
        }
        
        $this->load->model('familys_models/for_dash/Counting');
         
        $this->count_basic_in  = $this->Counting->get_basic_in_num();
        $this->files_basic_in  = $this->Counting->get_files_basic_in();  

 /*       
        
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
                41=>"المستوى التعليمي",42=>"إعدادات مصادر الدخل",43=>"إعدادات الإلتزامات الشهرية",44=>"الدار النسائية",
                45=>'التخصص للأم '
                        
                        
);
*/
    /***************  
             $this->myarray = array (1=>'نوع الهوية ', 2=>'الجنسية', 3=>'المهنة ',
                        4=>'الحالة الاجتماعية ',5=>'السكن',6=>'الحاله الصحية ',
                        8=>'المستوى التعليمى ',9=>'الحالة الدراسية  ',
                        10=>'نوع التعليم  ',11=>'نشاط العمل  ',12=>'المنطقة  ',
                        13=>'نوع ملكية السكن ',14=>'نوع السكن ',15=>'ترميز المدارس ',
                        16=>'أنواع الاجهزة الطبية  ',17=>'الادويىة الطبية ',18=>'الاجهزة المنزلية ',
                        19=>'الاثاث المنزلى  ',20=>'المستلزمات المدرسية ',21=>'أنواع اصلاحات المنزل ' ,
                        22=>'حالة السكن  ',23=>"اتجاه المنزل",24=>"انواع الترميم بالمنزل  ",
                        25=>'اسباب الوفاة  ',26=>"ترميزات المدارس ",27=>"حالات تواجد الام ",
                        28=>"إنطباعات الام عن الزيارة  " 
                        
                        
                ,32=>"طبيعة الفرد",33=>"تصنيف كل فرد",34=>"صلة القرابة",35=>"نوع المرض",36=>"جهة متابعات المرضي والمعاقين",
                37=>"وضع حالات المرضي والمعاقين",38=>"مصدر الهوية",39=>"مستوى التحصيل الدراسي",40=>"الحالة الدراسية",
                41=>"المستوى التعليمي",42=>"إعدادات مصادر الدخل",43=>"إعدادات الإلتزامات الشهرية",44=>"الدار النسائية",
                45=>'التخصص للأم '
                        
                        
);

/*
9=>'الحالة الدراسية للأم ',
33=>"تصنيف كل فرد",
41=>"المستوى التعليمي",
38=>"مصدر الهوية ",
*/

/*
21=>'أنواع اصلاحات المنزل ' ,
,17=>'الأدوية الطبية ',18=>
'الاجهزة المنزلية ',
 16=>'أنواع الاجهزة الطبية  '
  19=>'الاثاث المنزلى  ',
  ,24=>"انواع الترميم بالمنزل  "
   20=>'المستلزمات المدرسية ',
    15=>'ترميز المدارس ',
*/


$this->myarray = array (
     1=>'نوع الهوية ',
     2=>'الجنسية',
     3=>'المهنة ',
     4=>'الحالة الاجتماعية ',
     5=>'السكن',
    8=>'المستوى التعليمى ',
    10=>'نوع التعليم  ',
    11=>'نشاط العمل  ',
    12=>'مصادر الهوية  ',
    13=>'نوع ملكية السكن ',14=>'نوع السكن ',
   
   
  
    22=>'حالة السكن  ',23=>"اتجاه المنزل",
    25=>'اسباب الوفاة  ',26=>"ترميزات المدارس - الجامعات ",27=>"حالات تواجد الام ",
    28=>"إنطباعات الام عن الزيارة  " 
    
                        
,32=>"طبيعة الفرد",34=>"صلة القرابة",35=>"نوع المرض",36=>"جهة متابعات المرضي والمعاقين",
37=>"وضع حالات المرضي والمعاقين",39=>"مستوى التحصيل الدراسي",40=>"الحالة الدراسية  ",
42=>"إعدادات مصادر الدخل",43=>"إعدادات الإلتزامات الشهرية",44=>"المراكز والدور التعليمية",
45=>'التخصص ',
46=>'المراكز والدور التابعه للجمعية',
47=>'مرفقات طلب تسجيل الأسرة',
48=>'طبيعة الشخصية',
49=>'العلاقة بالأسرة',
50=>'طبيعة العمل المناسب ',  
51=>'الوثائق والمستندات ',                     
52=>'توصيات مدير الرعاية ',
53=>'مرئيات الباحث ',
54=>'أنواع زيارات البحث ',
55=>'قرارات اللجنة',
56=>'أسباب قبول الطلب',
57=>'أسباب رفض الطلب',
58=>'أسباب تفعيل الطلب',


59=>'مشروعات تجارية',
60=>'حالة المشروع',
61=>'الدورات',
62=>'المهارات',
63=>'جهة فريضة الحج والعمرة',
64=>'مهنة العامل',
65=>'الجمعيات',                     
);     
        
        
        $this->load->helper(array('url','text','permission','form'));
        $this->load->model('system_management/Groups');
        $this->load->model('familys_models/Model_setting');
        
        $this->load->model('familys_models/web_model/Family_web_profile','family_web_profile');
        
        $this->main_groups = $this->Groups->main_fetch_group();
        $this->groups=$this->Groups->get_group($_SESSION["group_number"]);
        $this->groups_title=$this->Groups->get_group_title($_SESSION["group_number"]);
        
  





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
   
   /* public function index(){    //   family_controllers/Setting
        $data['all']= $this->Model_setting->get_all_data($this->myarray);
        $data['subview'] = 'admin/familys_views/all_sitting/all_sitting';
        $this->load->view('admin_index', $data);
    }*/
   /* public function AddSitting($type){
        
   
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
    }*/
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
            $data['title'] = "إعدادات المناطق والمحافظات ";
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
            $data['title'] = "إعدادات المناطق والمحافظات ";
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
   
   
        public function procedures_option_transform() // family_controllers/Setting/procedures_option_transform
    {
        if ($this->input->post('add_option')){
            $this->Model_setting->add_procedures_option_transform();

            redirect('family_controllers/Setting/procedures_option_transform','refresh');
        }else{

            $data['options']=$this->Model_setting->select_option_transform();
            $data['title'] = " إجراءات تحويلات الأسر  ";
            $data['subview'] = 'admin/familys_views/all_sitting/procedures_transform';
            $this->load->view('admin_index', $data);


        }
    }



    public function edit_procedures_option_transform($id){
        $data['option']=$this->Model_setting->procedure_option_transform_byId($id);
        $data['title'] = " إجراءات تحويلات الأسر ";
        $data['subview'] = 'admin/familys_views/all_sitting/procedures_transform';
        $this->load->view('admin_index', $data);
    }


    public function update_procedures_option_transform($id)
    {

        $this->Model_setting->update_procedures_option_transform($id);

        redirect('family_controllers/Setting/procedures_option_transform','refresh');

    }

	
	  public function delete_procedures_option_transform($id)
    {

        $this->Model_setting->delete_procedures_option_transform($id);

        redirect('family_controllers/Setting/procedures_option_transform','refresh');

    }    
/**************************************************/


/*************************************************حالات الافراد**********************************/
public function persons_status_setting(){ // family_controllers/Setting/persons_status_setting

    if ($this->input->post('add_status')){
        $this->Model_setting->add_persons_status_setting();
        redirect('family_controllers/Setting/persons_status_setting','refresh');
    }else {
        $data['all'] = $this->Model_setting->select_persons_status_setting();
        $data['title'] = "إعدادات حالات الأفراد";
        $data['subview'] = 'admin/familys_views/all_sitting/persons_status_setting';
        $this->load->view('admin_index', $data);
    }
}



public function update_persons_status_setting($id){ // family_controllers/Setting/update_persons_status_setting
    if ($this->input->post('add_status')){
        $this->Model_setting->update_persons_status_setting($id);
        redirect('family_controllers/Setting/persons_status_setting','refresh');
    }else {
        $data['record'] = $this->Model_setting->persons_status_settingById($id);
        $data['title'] = "إعدادات حالات الأفراد";
        $data['subview'] = 'admin/familys_views/all_sitting/persons_status_setting';
        $this->load->view('admin_index', $data);
    }
}

public function delete_persons_status_setting($id) // family_controllers/Setting/delete_persons_status_setting
{
    $this->Model_setting->delete_persons_status_setting($id);
    redirect('family_controllers/Setting/persons_status_setting','refresh');

}
/***********************************************************************************/
   
    public function settings($type=0){    // family_controllers/Setting/settings
        $data['typee']= $type;
        $data['all']= $this->Model_setting->get_all_data($this->myarray);
        $data['levels']= $this->Model_setting->select_levels();
        $data['classes']= $this->Model_setting->select_classes();
        $data['title'] = "التعريفات ";
        $data['subview'] = 'admin/familys_views/all_sitting/all_sitting';
        $this->load->view('admin_index', $data);
    }
    public function AddSitting($type){  // family_controllers/Setting/AddSitting
        if($this->input->post('add_level')){  
           $this->Model_setting->add_level($type);
             if($type == 'tab_levels'){
                $this->message('success','تم إضافة المرحلة الدراسية ');
            }else{
               $this->message('success','تم إضافة الصفوف الدراسية ');
            }
            redirect('family_controllers/setting/settings/'.$type,'refresh');
        }elseif($this->input->post('add')){
            $this->Model_setting->add($type);
            $this->message('success','إضافة '.$this->myarray[$type]);
            redirect('family_controllers/setting/settings/'.$type,'refresh');
            

        }

    }
    public function UpdateSitting($id,$type){


        $data['record'] = $this->Model_setting->getById($id);
        $data['typee'] = $type ;
        $data["id"]=$id;
        $data["type_name"]=$this->myarray[$type];
        if($this->input->post('add_level')){
            $this->Model_setting->update($id);
            $this->message('success',' تحديث البيانات');
            redirect('family_controllers/Setting/settings/'.$type,'refresh');
        }elseif($this->input->post('add')){
            $this->Model_setting->update($id);
            $this->message('success',' تحديث البيانات');
            redirect('family_controllers/Setting/settings/'.$type,'refresh');
        }

       // $data['title'] = 'تعديل ';
        $data['title'] = "التعريفات ";
        $data['subview'] = 'admin/familys_views/all_sitting/all_sitting';
        $this->load->view('admin_index', $data);
    }
    public function DeleteSitting($id,$type){
        $this->Model_setting->delete($id);
        $this->message('success','حذف ');
        redirect('family_controllers/Setting/settings/'.$type,'refresh');
    }
 
    
    /********************************/
       public function AddSittingLevels($type){  // family_controllers/Setting/AddSittingLevels


        if($this->input->post('add_level')){
            $this->Model_setting->add_level($type);
            $this->message('success','إضافة ');
            redirect('family_controllers/setting/settings/'.$type,'refresh');
        }

    }

    public function UpdateSittingD($id,$type){
        $data['levels']= $this->Model_setting->select_levels();
        //$data['classes']= $this->Model_setting->select_classes();
        $data['level'] = $this->Model_setting->getLevels($id);
        $data['typee'] = $type ;
        $data["id"]=$id;
        $data["type_name"]='';
        if($this->input->post('add_level')){
            $this->Model_setting->update_level($id,$type);
            $this->message('success',' تحديث البيانات');
            redirect('family_controllers/Setting/settings/'.$type,'refresh');
        }
        // $data['title'] = 'تعديل ';
        $data['title'] = "التعريفات ";
        $data['subview'] = 'admin/familys_views/all_sitting/all_sitting';
        $this->load->view('admin_index', $data);
    }



    public function DeleteSittingLevels($type,$id){
        $this->Model_setting->deleteLevels($id);
        $this->message('success','حذف ');
        redirect('family_controllers/Setting/settings/'.$type ,'refresh');
    }
    //===============================================================================
        public function files_member_status_setting(){ // family_controllers/Setting/files_status_setting
        if ($this->input->post('add_status')){
            $this->Model_setting->add_files_member_status_setting();
            redirect('family_controllers/Setting/files_member_status_setting','refresh');
        }else {
           $data['all'] = $this->Model_setting->select_files_member_status_setting();
            $data['title'] = "إعدادات حالات الافراد";
            $data['subview'] = 'admin/familys_views/all_sitting/files_member_status_setting';
            $this->load->view('admin_index', $data);
        }
    }
    public function update_files_member_status_setting($id){ // family_controllers/Setting/update_files_status_setting
        if ($this->input->post('add_status')){
            $this->Model_setting->update_files_member_status_setting($id);
            redirect('family_controllers/Setting/files_member_status_setting','refresh');
        }else {
            $data['record'] = $this->Model_setting->files_member_status_settingById($id);
            $data['title'] = "إعدادات حالات الافراد";
            $data['subview'] = 'admin/familys_views/all_sitting/files_member_status_setting';
            $this->load->view('admin_index', $data);
        }
    }
    public function delete_files_member_status_setting($id){// family_controllers/Setting/delete_files_status_setting
        $this->Model_setting->delete_files_member_status_setting($id);
        redirect('family_controllers/Setting/files_member_status_setting','refresh');
    }
/****************************************************************************************/
    public function add_product(){   //family_controllers/Setting/add_product/

        $this->load->model('familys_models/Product_model');
        $this->load->model('Difined_model');

        if($this->input->post('add_main_product')) {
            $this->Product_model->insert_main_product();

            $this->message('success',' اﻹﺿﺎﻓﺔ');
            redirect("family_controllers/Setting/add_product/");
        }elseif($this->input->post('add_sub_product')) {
            $this->Product_model->insert_sub_product();
            $this->message('success',' اﻹﺿﺎﻓﺔ ');
            redirect("family_controllers/Setting/add_product/");
        }elseif($this->input->post('from_id_value')){
            $from_id_value = $this->input->post('from_id_value');
            $data['levels']=$this->Difined_model->select_search_key("products",'id',$from_id_value);

            $this->load->view('admin/familys_views/products/get_data', $data);
        }else{
            $data['table']=$this->Product_model->select_all();
            $data['sub_products']=$this->Product_model->select_all_with_from();
            $data['main_products']=$this->Difined_model->Product_model->select_all();
            $data['main_result_products']=$this->Product_model->select_all();
  

            $data['title'] = 'اضافة بيانات السكن والإحتياجات';
            $data['subview'] = 'admin/familys_views/products/add_product';
            $this->load->view('admin_index', $data);
        }
    }


    public function update_product($id){

        $this->load->model('familys_models/Product_model');
        $this->load->model('Difined_model');
        if($this->input->post('add_main_product')) {
            $this->Product_model->update_main_product($id);

            $this->message('success','التعديل');
            redirect("family_controllers/Setting/add_product/");
        }elseif($this->input->post('add_sub_product')) {
            $this->Product_model->update_sub_product($id);
            $this->message('success','التعديل');
            redirect("family_controllers/Setting/add_product/");
        }else{
            $data['table']=$this->Product_model->select_all();
           // $data['sub_products']=$this->Product_model->select_all_with_from();
            $data['main_products']=$this->Difined_model->select_all("products","","","","");
           // $data['main_result_products']=$this->Product_model->select_all();

            $data['result']=$this->Difined_model->getById("products",$id);
            $data['title'] = 'تعديل';
            $data['subview'] = 'admin/familys_views/products/add_product';
            $this->load->view('admin_index', $data);
        }




    }

    public function delete_product($id){
        $this->load->model('familys_models/Product_model');
        $this->Product_model->delete($id);

        $this->message('success', 'ﺗﻢ اﻟﺤﺬﻑ');
        redirect('family_controllers/Setting/add_product', 'refresh');
    }
    
/***************************************************************************/    
public function members_file_status()
    {

        if($this->input->post('add')) {
            $this->Model_setting->insert_data_status();
            redirect('family_controllers/Setting/members_file_status/','refresh');
        }
        $data['title']="اسباب حالات الملفات والافراد";
        $data['records']=$this->Model_setting->get_persons_status_setting();


        $data['subview'] = 'admin/familys_views/all_sitting/members_files_status';
        $this->load->view('admin_index', $data);
    }
    
    public function delete_file_status($id)
    {

        $this->Model_setting->delete_from_persons_status_setting($id);
        redirect('family_controllers/Setting/members_file_status/','refresh');
    }
public function update_file_status($id)
{
    $data['row']=$this->Model_setting->get_by_id($id);
    if($this->input->post('add')) {
        $this->Model_setting->update_data_status($id);
        redirect('family_controllers/Setting/members_file_status/','refresh');
    }
    $data['title']="اسباب حالات الملفات والافراد";
    $data['subview'] = 'admin/familys_views/all_sitting/members_files_status';
    $this->load->view('admin_index', $data);
    }

/// omnia


// omnia


    public function service_setting()//family_controllers/Setting/service_setting
    {
        $data['categores'] = $this->family_web_profile->get_cat();

        if ($this->input->post('save')) {

//            echo '<pre>';print_r($this->input->post('docm_asked'));die;
            $this->family_web_profile->insert_service();
            redirect('family_controllers/Setting/service_setting', 'refresh');
        }
        $data['title'] = " اعدادات الخدمات ";
        $data['subview'] = 'admin/familys_views/all_sitting/service_seting_view';
        $this->load->view('admin_index', $data);
    }

    public function desc_service_setting()//family_controllers/Setting/desc_service_setting
    {
        $data['service'] = $this->family_web_profile->get_services();
        $data['desc_service'] = $this->family_web_profile->get_all_desc__services();
       // $this->test($data['desc_service']);

        if ($this->input->post('save')) {
//            echo '<pre>';print_r($this->input->post('docm_asked'));die;
            $this->family_web_profile->insert_service_desc();
            redirect('family_controllers/Setting/desc_service_setting', 'refresh');
        }
        $data['title'] = " اعدادات وصف الخدمات ";
        $data['subview'] = 'admin/familys_views/all_sitting/add_description_serviec_view';
        $this->load->view('admin_index', $data);
    }

    public function cat_service_setting()//family_controllers/Setting/cat_service_setting
    {
        $data['service'] = $this->family_web_profile->get_services();
        $data['cat_service'] = $this->family_web_profile->get_allf2at_services();
//        $this->test($data['cat_service']);
        if ($this->input->post('save')) {
//            echo '<pre>';print_r($this->input->post('docm_asked'));die;
            $this->family_web_profile->insert_cats();
            redirect('family_controllers/Setting/cat_service_setting', 'refresh');
        }
        $data['title'] = " اعدادات وصف الخدمات ";
        $data['title2'] = "  وصف الخدمات ";
        $data['subview'] = 'admin/familys_views/all_sitting/add_category_ser_view';
        $this->load->view('admin_index', $data);
    }

    public function getf2at_service()
    {
        $id = $this->input->post('service_id');
        $data['f2at'] = $this->family_web_profile->getf2at_service($id);
        echo json_encode($data['f2at']);

    }

    public function cat_service_setting_delete($id)
    {
        $this->family_web_profile->cat_service_setting_delete(base64_decode($id));
        redirect('family_controllers/Setting/cat_service_setting', 'refresh');
    }

    public function cat_service_setting_uptate($id)
    {
        $data['service'] = $this->family_web_profile->get_services();
        $data['f2at'] = $this->family_web_profile->getf2at_ser(base64_decode($id));
//        $this->test($data['f2at']);
        if ($this->input->post('save')) {
            $this->family_web_profile->cat_service_setting_uptate(base64_decode($id));
            redirect('family_controllers/Setting/cat_service_setting', 'refresh');
        }
        $data['title'] = " اعدادات وصف الخدمات ";
        $data['title2'] = "  وصف الخدمات ";
        $data['subview'] = 'admin/familys_views/all_sitting/add_category_ser_view';
        $this->load->view('admin_index', $data);

    }

    public function desc_cat_service_setting_delete($id)
    {
        $this->family_web_profile->desc_cat_service_setting_delete(base64_decode($id));
        redirect('family_controllers/Setting/cat_service_setting', 'refresh');
    }

    public function desc_cat_service_setting_uptate($id)
    {
        $data['service'] = $this->family_web_profile->get_services();
        $data['desc'] = $this->family_web_profile->get_all_desc__services(base64_decode($id));
        $this->test($data['desc']);
        if ($this->input->post('save')) {
            $this->family_web_profile->desc_cat_service_setting_uptate(base64_decode($id));
            redirect('family_controllers/Setting/cat_service_setting', 'refresh');
        }
        $data['title'] = " اعدادات وصف الخدمات ";
        $data['title2'] = "  وصف الخدمات ";
        $data['subview'] = 'admin/familys_views/all_sitting/add_category_ser_view';
        $this->load->view('admin_index', $data);

    }

     private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }

  //===============================================================================
    public function family_letter_setting(){ // family_controllers/Setting/family_letter_setting
    if ($this->input->post('add_setting')){
            $this->Model_setting->add_family_letter_setting();
            redirect('family_controllers/Setting/family_letter_setting','refresh');
        }else {
            $data['all'] = $this->Model_setting->select_family_letter_setting();
            $data['title'] = "إعدادات جهات الخطابات";
            $data['subview'] = 'admin/familys_views/all_sitting/family_letter_setting';
            $this->load->view('admin_index', $data);
        }
    }
    public function update_family_letter_setting($id){ // family_controllers/Setting/update_files_status_setting
        if ($this->input->post('add_setting')){
            $this->Model_setting->update_family_letter_setting($id);
            redirect('family_controllers/Setting/family_letter_setting','refresh');
        }else {
            $data['record'] = $this->Model_setting->family_letter_settingById($id);
            $data['title'] = "إعدادات حالات الافراد";
            $data['subview'] = 'admin/familys_views/all_sitting/family_letter_setting';
            $this->load->view('admin_index', $data);
        }
    }
    public function delete_family_letter_setting($id){// family_controllers/Setting/delete_files_status_setting
        $this->Model_setting->delete_family_letter_setting($id);
        redirect('family_controllers/Setting/family_letter_setting','refresh');
    }
    /****************************************************************************************/


    
    
}// end class 