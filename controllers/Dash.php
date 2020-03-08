<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dash extends CI_Controller
{
    public $email_count;
    public $count_basic_in;
     public $files_basic_in;
   
    public function __construct()
    {
        
        
        parent::__construct();
        
         if($this->session->userdata('is_logged_in')==0){
           redirect('login');
      }
        $this->load->model('system_management/Groups');
        $this->main_groups=$this->Groups->main_fetch_group();
         $this->rapid_query=$this->Groups->rapid_query();
        
        
        $this->load->model('Notification');
        $this->notification_ozonat=$this->Notification->get_user_header_notification(1);
        $this->notification_agazat=$this->Notification->get_user_header_notification(2);
        
        
        
        /**************/
        $this->load->model('email/Email');
        $this->email_count = $this->Email->email_count();
        
        /******************/
         $this->load->model('familys_models/for_dash/Counting');
         
        $this->count_basic_in  = $this->Counting->get_basic_in_num();
        $this->files_basic_in  = $this->Counting->get_files_basic_in();  
        
           $this->load->model('system_management/Model_user_permission');
          $this->my_side_bar=$this->Model_user_permission->get_my_page_permession($_SESSION["user_id"]);
        //  $this->my_side_bar=$this->Groups->rapid_cats_query_sidebar();
    
  //     $this->load->model('human_resources_model/attendance/attendance_messages/Attend_messages_model');  
    }
    //--------------------- tools functions   ----------------------------------
    private  function test($data=array()){
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }
    private function message($type,$text){
        if($type =='success') {
            return $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissable">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <strong> تم بنجاح!</strong> '.$text.'.
                                                </div>');
        }elseif($type=='wiring'){
            return $this->session->set_flashdata('message','<div class="alert alert-warning alert-dismissable">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <strong> تحذير  !</strong> '.$text.'.
                                                </div>');
        }elseif($type=='error'){
            return  $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <strong>خطأ!</strong> '.$text.'.
                                                </div>');
        }
    }

    private function thumb($data){
        $config['image_library'] = 'gd2';
        $config['source_image'] =$data['full_path'];
        $config['new_image'] = 'uploads/pages_images/thumbs/'.$data['file_name'];
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['thumb_marker']='';
        $config['width'] = 275;
        $config['height'] = 250;
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
    }
    private  function upload_image($file_name){
        $config['upload_path'] = 'uploads/pages_images/images';
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
    //---------------------- end tools functions   ---------------------------------
    public  function  index(){
         if($this->session->userdata('is_logged_in')==0){
            redirect('login');
        }
        $this->load->model('system_management/Groups');
        /*$data["main_groups"]=$this->Groups->main_fetch_group();*/
        $data["main_groups"]=$this->Groups->main_fetch_group_main();
        $data['title']='الرئيسية';
        $data['metakeyword']='الرئيسية';
        $data['metadiscription']='الرئيسية';
        $data['subview'] = 'admin/main';
        $this->load->view('index_without_sidebar', $data);
    }
    public  function  home(){
        if($this->session->userdata('is_logged_in')==0){
            redirect('login');
        }
        $this->load->model('system_management/Groups');
        $data["main_groups"]=$this->Groups->main_fetch_group();
        $data['title']='الرئيسية';
        $data['metakeyword']='الرئيسية';
        $data['metadiscription']='الرئيسية';
        $data['subview'] = 'admin/main';
        $this->load->view('index_without_sidebar', $data);
    }
   //-------------------------------------------------------
    public function mian_group($id)
    {
        $this->load->model('system_management/Groups');
        $this->load->model('Difined_model');
       	
       /* $this->load->model('finance_accounting_model/box/Pill_model');
        $data['esalat_estalm']=$this->Pill_model->get_all_from_pills();
        $data['sand_qabd']=$this->Pill_model->get_from_sand_qabd();
        $data['sand_sarf']=$this->Pill_model->get_from_sand_sarf();
        $data['box_balance']=($data['esalat_estalm']+$data['sand_qabd'])-$data['sand_sarf'];
        */
   	    $this->load->model('finance_accounting_model/box/Pill_model');
        $data['esalat_estalm']=$this->Pill_model->get_all_from_pills();
        $data['sand_qabd_naqdy']=$this->Pill_model->get_from_sand_qabd(1);
        $data['sand_sarf_naqdy']=$this->Pill_model->get_from_sand_sarf(1);
        $data['box_balance_naqdy']=($data['sand_qabd_naqdy']-$data['sand_sarf_naqdy']);
        $data['sand_qabd_cheque']=$this->Pill_model->get_from_sand_qabd(2);
        $data['sand_sarf_cheque']=$this->Pill_model->get_from_sand_sarf(2);
        $data['box_balance_cheque']=($data['sand_qabd_cheque']-$data['sand_sarf_cheque']);
        
        
        
        
        
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }
        $_SESSION["group_number"] = $id;
        $data["groups"] = $this->Groups->get_group($id);
        $data["groups_id"] = $id;
        $date_table = $this->Groups->getgroupbyid($id);
        $data['title_name'] = $this->Groups->get_group_title($id);;
        $data['title'] = $date_table["page_title"];
        $data['metakeyword'] = $date_table["page_title"];
        $data['metadiscription'] = $date_table["page_title"];
        $data['subview'] = 'admin/sub_main';
       
        $this->load->view('admin_index', $data);
    }
    //-------------------------------------------------------
    /*public function sub_sub_main($id,$main_group_id)
    {
        $this->load->model('system_management/Groups');
        $_SESSION["group_number"] = $id;
        $data["sub_groups"] = $this->Groups->get_group($id);
        $date_table = $this->Groups->getgroupbyid($main_group_id);
        $data['title_name'] = $this->Groups->get_group_title($main_group_id);
        $data['title'] = $date_table["page_title"];
        $data['metakeyword'] = $date_table["page_title"];
        $data['metadiscription'] = $date_table["page_title"];
        $this->load->model('all_Finance_resource_models/sponsors/Sponsors_model');
        $data['all_data_count'] = $this->Sponsors_model->GetAll();
        $data['subview'] = 'admin/sub_sub_main';
        $this->load->view('admin_index', $data);
    }*/
    
  public function sub_sub_main($id,$main_group_id)
    {
        $this->load->model('system_management/Groups');
        $_SESSION["group_number"] = $id;
        $data["sub_groups"] = $this->Groups->get_group($id);
        $date_table = $this->Groups->getgroupbyid($main_group_id);
        $data['title_name'] = $this->Groups->get_group_title($main_group_id);
        $data['title'] = $date_table["page_title"];
        $data['metakeyword'] = $date_table["page_title"];
        $data['metadiscription'] = $date_table["page_title"];
        /*************************************************/
        $this->load->model('all_Finance_resource_models/sponsors/Sponsors_model_load');
        $data["all_aytam"]= $this->Sponsors_model_load->all_aytam('f_members.categoriey_member=2   AND f_members.persons_status =1');
        $data["all_mostafed"]= $this->Sponsors_model_load->all_aytam('f_members.categoriey_member=3   AND f_members.persons_status =1');
        $data["all_mostafed_mkfol"]= $this->Sponsors_model_load->all_aytam('f_members.categoriey_member=3   AND f_members.persons_status =1 And
        f_members.first_kafala_type =3 AND f_members.first_halet_kafala =1 ');
        $data["all_aytam_nos"]= $this->Sponsors_model_load->all_aytam_mkfol_nos();
        $data["all_aytam_shamla"]= $this->Sponsors_model_load->all_aytam_mkfol_shamla();
        $data["all_armal"]= $this->Sponsors_model_load->all_armal('mother.categoriey_m =1 And mother.halt_elmostafid_m =1 And mother.person_type =62');
        $data["all_armal_mkfol"]= $this->Sponsors_model_load->all_armal('mother.categoriey_m =1 And mother.halt_elmostafid_m =1 And mother.person_type =62 And 
        mother.first_kafala_type =4 AND mother.first_halet_kafala =1 ');
        /*************************************************/
        $data['subview'] = 'admin/sub_sub_main';
        $this->load->view('admin_index', $data);
    }
    /**
     * ==============================================================================================================
     *                                     GroupsPages
     *
     * ===============================================================================================================
     */
    public  function GroupsPages(){ //Dash/GroupsPages
        //-------------------------------------------
        if($this->session->userdata('is_logged_in')==0){
            redirect('login');
        }
        //-------------------------------------------
        $this->load->model('system_management/Groups');
        $this->load->model('Difined_model');
        if ($this->input->post('add_groupe')) {
            $file= $this->upload_image('page_image');
            $this->Groups->addGroup($file);
          //  $this->message('success','تمت إضافة المجموعة بنجاح');
            redirect('Dash/GroupsPages', 'refresh');
        }
           $data['title_name'] = $this->Groups->get_group_title($_SESSION["group_number"]);
           $this->main_groups=$this->Groups->main_fetch_group();
           $this->groups=$this->Groups->get_group($_SESSION["group_number"]);
        $data["font_icon"]=$this->Difined_model->select_all("font_icons","id","","id","ASC");
        $data["groups_table"] = $this->Groups->fetch_groups('', '');
        $data['title'] = 'إضافة مجموعة تحكم';
        $data['metakeyword'] = 'اعداددات الموقع ';
        $data['metadiscription'] = '';
        $data['subview'] = 'admin/groups_pages/group';
        $this->load->view('admin_index', $data);

    }
    public function UpdateGroupsPages($id){
        //-------------------------------------------
        if($this->session->userdata('is_logged_in')==0){
            redirect('login');
        }
        //-------------------------------------------
        $this->load->model('system_management/Groups');
        $this->load->model('Difined_model');
        $data['result_id'] = $this->Groups->getgroupbyid($id);
        if ($this->input->post('edit_groupe')) {
            $file= $this->upload_image('page_image');

            $this->Groups->updateGroup($id,$file);
            $this->message('success','تمت تعديل المجموعة بنجاح');
            redirect('Dash/GroupsPages', 'refresh');
        }
           $data['title_name'] = $this->Groups->get_group_title($_SESSION["group_number"]);
           $this->main_groups=$this->Groups->main_fetch_group();
           $this->groups=$this->Groups->get_group($_SESSION["group_number"]);
        $data["font_icon"]=$this->Difined_model->select_all("font_icons","id","","id","ASC");
        $data['title'] = 'تعديل بيانات مجموعة تحكم';
        $data['metakeyword'] = 'اعداددات الموقع ';
        $data['metadiscription'] = '';
        $data['subview'] = 'admin/groups_pages/group';
        $this->load->view('admin_index', $data);
    }

    /*  public function DeleteGroupsPages($id){
     $this->load->model('Difined_model');
     $this->Difined_model->delete("pages",array("page_id"=>$id));
    // $this->message('success','تم الحذف');
     redirect('Dash/GroupsPages', 'refresh');
 }
 */
    /**
     * ==============================================================================================================
     *                                     AddPages
     *
     * ===============================================================================================================
     */
    public  function AddPages(){  ///Dash/AddPages
        //-------------------------------------------
        if($this->session->userdata('is_logged_in')==0){
            redirect('login');
        }
        //-------------------------------------------
        $this->load->model('system_management/Pages');
        $this->load->model('system_management/Groups');
        $this->load->model('Difined_model');
        if ($this->input->post('add_page') ) {
            $file= $this->upload_image('page_image');
            $this->Pages->insert($file);
          //  $this->message('success','تم اضافة الصفحة بنجاح');
            redirect('Dash/AddPages', 'refresh');
        }
           $data['title_name'] = $this->Groups->get_group_title($_SESSION["group_number"]);
           $this->main_groups=$this->Groups->main_fetch_group();
           $this->groups=$this->Groups->get_group($_SESSION["group_number"]);      
        $data['pages']=$this->Pages->all_pages();
        $data['pages_name']=$this->Pages->main_groups_name();
        $data["font_icon"]=$this->Difined_model->select_all("font_icons","id","","id","ASC");
        $data["groups"]=$this->Groups->level_groups();
        
       // $this->test($data["groups"]);
        $data['title'] = 'إضافة صفحات مجموعات التحكم  ';
        $data['metakeyword'] = 'اعداددات الموقع ';
        $data['metadiscription'] = 'اعداددات الموقع ';
        $data['subview'] = 'admin/groups_pages/pages';
        $this->load->view('admin_index', $data);
    }
    public  function UpdatePages($id){
        //-------------------------------------------
        if($this->session->userdata('is_logged_in')==0){
            redirect('login');
        }
        //-------------------------------------------
        $this->load->model('system_management/Pages');
        $this->load->model('system_management/Groups');
        $this->load->model('Difined_model');
        $data['page_data'] = $this->Pages->get_by_id($id);
        if ($this->input->post('edit_page')) {
            $file= $this->upload_image('page_image');
            $this->Pages->update($id,$file);
        //    $this->message('success','تم العملية بنجاح');
            redirect('Dash/AddPages', 'refresh');
        }
           $data['title_name'] = $this->Groups->get_group_title($_SESSION["group_number"]);
           $this->main_groups=$this->Groups->main_fetch_group();
           $this->groups=$this->Groups->get_group($_SESSION["group_number"]);
        $data['pages']=$this->Pages->all_pages();
        $data['pages_name']=$this->Pages->main_groups_name();
        $data["font_icon"]=$this->Difined_model->select_all("font_icons","id","","id","ASC");
        $data["groups"]=$this->Groups->level_groups();
        $data['title'] = 'تعديل بيانات صفحات التحكم';
        $data['metakeyword'] = 'اعداددات الموقع ';
        $data['metadiscription'] = '';
        $data['subview'] = 'admin/groups_pages/pages';
        $this->load->view('admin_index', $data);//DeletePages
    }
    public function DeletePages($id){
        $this->load->model('Difined_model');
        $this->Difined_model->delete("pages",array("page_id"=>$id));
      //  $this->message('success','تم الحذف');
        redirect('Dash/AddPages', 'refresh');
    }
    /**
     * ===============================================================================================================
     *
     * ================================== CreateRole  ==========================================
     *
     * ===============================================================================================================
     */
    public function CreateRole(){
        $this->load->model('n/Users');
        //-------------------------------------------
        if($this->session->userdata('is_logged_in')==0){
            redirect('login');
        }
        //-------------------------------------------
        $this->load->model('system_management/Groups');
        $this->load->model('system_management/Permission');
        $this->load->model('Difined_model');
        $data["results_main"]=$this->Groups->get_categories();
        $data["user_in"]=$this->Permission->user_in();
        if ($this->input->post('add_role')) {
            $this->Permission->insert_user_role();
          //  $this->message('success','تم إضافة الدور بنجاح');
            redirect('Dash/CreateRole', 'refresh');
        }
           $data['title_name'] = $this->Groups->get_group_title($_SESSION["group_number"]);
           $this->main_groups=$this->Groups->main_fetch_group();
           $this->groups=$this->Groups->get_group($_SESSION["group_number"]);
       // $data['users']=$this->Difined_model->select_all("users","user_id","","user_id","ASC");
       // $data['per_table']=$this->Difined_model->select_all_users("permissions","user_id","","user_id","DESC");//
        $data['users']=$this->Users->fetch_users_groups();
        $data['per_table']=$this->Users->get_users_name();//
       
        $data["user_name"]=$this->Permission->get_users_name();
        $data['title'] = 'إضافة أدوار التحكم';
        $data['metakeyword'] = 'إعدادات الموقع ';
        $data['metadiscription'] = '';
        // $data['subview'] = 'admin/users/roles';
        $this->load->view('admin/users/roles', $data);
        
   /*     $data['subview'] = 'admin/users/roles';
    $this->load->view('admin_index', $data);*/
    
    
    }

    public function UpdateCreateRole($id){
        //-------------------------------------------
        if($this->session->userdata('is_logged_in')==0){
            redirect('login');
        }
        //-------------------------------------------
        $this->load->model('system_management/Groups');
        $this->load->model('system_management/Permission');
        $this->load->model('Difined_model');
           $data['title_name'] = $this->Groups->get_group_title($_SESSION["group_number"]);
           $this->main_groups=$this->Groups->main_fetch_group();
           $this->groups=$this->Groups->get_group($_SESSION["group_number"]);
        $data['users']=$this->Difined_model->select_all("users","user_id","","user_id","ASC");
        $data["results_main"]=$this->Groups->get_categories();
        $data['user_data'] = $this->Difined_model->getByArray("users",array("user_id"=>$id));
        $data["user_permations"]=$this->Permission->select_per($id);
        if ($this->input->post('edit_role')) {
            $this->Difined_model->delete('permissions',array("user_id"=>$id));
            $this->Permission->insert_user_role();
         //   $this->message('success','تم التعديل بنجاح');
            redirect('Dash/CreateRole', 'refresh');

        }
        $data['title'] = 'تعديل دور التحكم';
        $data['metakeyword'] = 'اعداددات الموقع ';
        $data['metadiscription'] = '';
        $this->load->view('admin/users/roles', $data);
    }
    public function DeleteCreateRole($user_id){
        $this->load->model('Difined_model');
        $this->Difined_model->delete("permissions",array("user_id"=>$user_id));
      //  $this->message('success','تم الحذف');
        redirect('Dash/CreateRole', 'refresh');
    }



public function ahmed(){
    $this->load->model('Difined_model');
      $this->load->model('system_management/Groups');
      $this->test($this->Difined_model->select_search_key("pages","page_id !=",0));
    
}



public function ali(){
      $data['metadiscription'] = '';
      
      
          $data['subview'] = 'admin/users/ali';
    $this->load->view('admin_index', $data);
    
}


 public function family_data(){
        $this->load->model('system_management/Family_info');
        $data['new_family']=$this->Family_info->get_all_family(0);
        $data['accept_family']=$this->Family_info->get_all_family(1);
        $data['refuse_family']=$this->Family_info->get_all_family(2);
        $data['turn_family']=$this->Family_info->get_all_family(5);
        $data['suspend_family']=$this->Family_info->get_all_family(4);
        $data['program_count']=$this->Family_info->get_counter('programs');
        $data['sponsors_count']=$this->Family_info->get_counter('sponsors');
        $data['donner_count']=$this->Family_info->get_counter('donors');
        $data['magls_count']=$this->Family_info->get_counter('magls_members_table');
        $data['assembly_count']=$this->Family_info->get_counter('general_assembly_members');
        $data['employees_count']=$this->Family_info->get_counter('employees');
//osama//
        $data['requests'] =  $this->Family_info->all_requests();
        $data['all_mgls_members'] =$this->Family_info->all_magls_members();
        $data['all_general_assembly_members'] =$this->Family_info->all_general_assembly_members();
        $data['employeees'] = $this->Family_info->all_employees();
        //osama//



        $data['subview'] = 'admin/users/details_project';
        $this->load->view('admin_index', $data);

    }
    
    /*******************************************/
    
       public function GetAllPage(){
    $this->load->model('all_Finance_resource_models/sponsors/Sponsors_model_load');
    $data_load['all_data'] = $this->Sponsors_model_load->GetData($this->input->post('type'));
    $this->load->view('admin/SponsorsStatisticsLoadPages/GetAllPage', $data_load);

    }


    public function GetSubPage(){

        $this->load->model('all_Finance_resource_models/sponsors/Sponsors_model_load');
        $data_load['all_data'] = $this->Sponsors_model_load->GetSubData($this->input->post('type'),$this->input->post('personType'));
        $this->load->view('admin/SponsorsStatisticsLoadPages/GetSubPage', $data_load);

    }
    
    
    

/*********************************/
/* zidan */
 public function get_sub_cats()
    {

        $this->load->model('system_management/Groups');
        $id=$this->input->post('val_id');
       
        $this->load->model('system_management/Model_user_permission');
         $data['rapid']=$this->Groups->rapid_cats_query($id);
        $this->load->view('admin/get_sub_cats', $data);

    }
    
    
    public function print_test(){
    
      
      $data['title'] = 'طباعة القيد المحاسبي';

        $this->load->view('admin/design/print_test', $data);
        
        //  $data['subview'] = 'admin/users/ali';
 
    
}






}//END CLASS
?>