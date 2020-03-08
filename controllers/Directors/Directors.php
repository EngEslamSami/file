<?php
class Directors extends MY_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->library('pagination');
        $this->load->helper(array('url','text','permission','form'));
         if($this->session->userdata('is_logged_in')==0){
             redirect('login');
      }
      
          $this->load->model('directors/Council');
          $this->load->model('directors/Magls');
          $this->load->model('directors/Time_tables');
          $this->load->model('Difined_model');
                        /**********************************************************/ 
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in  = $this->Counting->get_basic_in_num();
        $this->files_basic_in  = $this->Counting->get_files_basic_in();  
      /*************************************************************/
         
    $this->load->model('system_management/Groups');
    
    $this->groups=$this->Groups->get_group($_SESSION["group_number"]);
    $this->groups_title=$this->Groups->get_group_title($_SESSION["group_number"]);
    }
    private  function test($data=array()){
              echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }
    

    
    
        private  function upload_all_files($file_name){
        $config['upload_path'] = 'uploads/directors/mgls_edara';
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
    private function url (){
     unset($_SESSION['url']);
        $this->session->set_flashdata('url','http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
    }
 //-----------------------------------------   
 private function message($type,$text){
          if($type =='success') {
              return $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible shadow" ><button type="button" class="close pull-left" data-dismiss="alert">×</button><h4 class="text-lg"><i class="fa fa-check icn-xs"></i> تم بنجاح ...</h4><p>'.$text.'!</p></div>');
          }elseif($type=='wiring'){
              return $this->session->set_flashdata('message','<div class="alert alert-warning alert-dismissible" ><button type="button" class="close pull-left" data-dismiss="alert">×</button><h4 class="text-lg"><i class="fa fa-exclamation-triangle icn-xs"></i> تحذير هام ...</h4><p>'.$text.'</p></div>');
          }elseif($type=='error'){
              return  $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" ><button type="button" class="close pull-left" data-dismiss="alert">×</button><h4 class="text-lg"><i class="fa fa-exclamation-circle icn-xs"></i> خطآ ...</h4><p>'.$text.'</p></div>');
          }
        }
        
        
        
        
 public function current_hjri_year()
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
        
/**
 *  ================================================================================================================
 * 
 *  ----------------------------------------------------------------------------------------------------------------
 *                                       
 * -----------------------------------------------------------------------------------------------------------------
 */

    public function  index(){
    /* if ($this->input->post('add')){
            $file_name='decison_img';
            $file= $this->upload_image($file_name);
            $this->Council->insert($file);
            $last=$this->Difined_model->select_last_id('council_admin');
            $this->Council->un_suspend($last);
            redirect('admin/Directors/add_council','refresh');
        }
       $data['jobs']=$this->Council->select_department_jobs();
       $data['records']=$this->Council->select();
       $data['get_members']=$this->Council->get_members();
       $data['last']=$this->Difined_model->select_last_id('council_admin');
        $data['title'] = 'إضافة مجلس';
        $data['metakeyword'] = 'إعدادات المجلس';
        $data['metadiscription'] = '';
        $data['subview'] = 'admin/council/management-add-manage';
        $this->load->view('admin_index', $data); 
        */
       
    }
 /**
 * ===============================================================================================================
 * 
 * ===============================================================================================================
 *                                           مجلس الإدارة 
 * ===============================================================================================================
 */ 
    public function add_council(){ // Directors/Directors/add_council
      //  Directors   
        if ($this->input->post('add')){
            $file_name='decison_img';
          //  $file= $this->upload_image($file_name);
          $file= $this->upload_all_files($file_name);
            $this->Council->insert($file);
            $last=$this->Difined_model->select_last_id('council_admin_table');
            $this->Council->un_suspend($last);
            redirect('Directors/Directors/add_council','refresh');
        }
       $data['jobs']=$this->Council->select_department_jobs();
       $data['records']=$this->Council->select();
       $data['get_members']=$this->Council->get_members();
       $data['last_id']=$this->Difined_model->select_last_id('council_admin_table');
       
       
       
       
        $data['title'] = 'إضافة مجلس';
        $data['metakeyword'] = 'إعدادات المجلس';
        $data['metadiscription'] = '';
        $data['subview'] = 'admin/directors/management-add-manage';
        $this->load->view('admin_index', $data);
    }



    public function delete_council($id){
       
        $this->Council->delete($id);
        redirect('Directors/Directors/add_council');
    }

    public function update_council($id){
      

        if($this->input->post('update')){

            $file_name='decison_img';
         //   $file= $this->upload_file($file_name);
          $file= $this->upload_all_files($file_name);
            $this->Council->update($id,$file);
            redirect('Directors/Directors/add_council','refresh');
        }
        $data['results']=$this->Council->getById($id);
        $data['update_link']='add_council';
        $data['subview'] = 'admin/directors/management-add-manage';
        $data['title'] = 'تعديل المجلس';
        $data['metakeyword'] = 'إعدادات المجلس';
        $this->load->view('admin_index', $data);
    }

    public function suspend_council($id,$set){
      
        $this->Council->suspend($id,$set);
        $this->Council->un_suspend($id);
       redirect('Directors/Directors/add_council','refresh');
    }

 
 
 /**
 * ===============================================================================================================
 * 
 * =============================================    إضافة عضو بالمجلس
==================================================================
 * 
 * ===============================================================================================================
 */    
      
 public function add_magls(){ //  Directors/Directors/add_magls
      
        if ($this->input->post('add')){
         
            $this->Magls->insert();
            redirect('Directors/Directors/add_magls','refresh');
        }
        $data['last_member']=$this->Difined_model->select_last_id('magls_members_table');
              //=========================================================
      $data['emps']=$this->Magls->get_assembley_members();
     $data['current_year']=$this->current_hjri_year();
     $data['personal_data']= $this->Magls->getBy(0)[0];
	      $data['member_type']=$this->Difined_model->select_search_key('general_assembly_settings','type',2);

     //==============================================================
       
        $data['on_magls']=$this->Magls->all_councils(1);
        $data['off_magls']=$this->Magls->all_councils(0);
        $data['magls']=$this->Magls->select_council();
        $data['all_magls']=$this->Magls->all_details_council();
        $data['job_title']=$this->Magls->select_job_title();
        $data['records']=$this->Magls->select();
        $data['title'] = 'إضافة عضو بالمجلس';
        $data['metakeyword'] = 'إعدادات اعضاء المجلس';
        $data['metadiscription'] = '';
     //   $data['subview'] = 'admin/directors/management-add-member';
        $data['subview'] = 'admin/directors/general_assembly/management-add-member';
        $this->load->view('admin_index', $data);
    }

    public function delete_magls($id){
      
        $this->Magls->delete($id);
        redirect('Directors/Directors/add_magls');
    }

    public function update_magls($id){
       
        if($this->input->post('update')){
            
          //  $this->test($_POST);
            $this->Magls->update($id);
            redirect('Directors/Directors/add_magls','refresh');
        }
        $data['update_link']='add_magls';
        $data['results']=$this->Magls->getById($id);
        $data['magls']=$this->Magls->select_council();
        $data['job_title']=$this->Magls->select_job_title();
        $data['current_h_year'] =$this->current_hjri_year();
        
           $data['emps']=$this->Magls->get_assembley_members();
        $data['current_year']=$this->current_hjri_year();
              
                $data['results']=$this->Magls->getById($id);
        $data['personal_data']= $this->Magls->getBy($data['results']['member_name'])[0];
		     $data['member_type']=$this->Difined_model->select_search_key('general_assembly_settings','type',2);

        
        $data['title'] = 'تعديل عضو بالمجلس';
        $data['metakeyword'] = 'إعدادات اعضاء المجلس';
        $data['metadiscription'] = '';
        
     //   $data['subview'] = 'admin/directors/management-add-member';
        $data['subview'] = 'admin/directors/general_assembly/management-add-member';
        $this->load->view('admin_index', $data);
    }




      
  /**
 * ===============================================================================================================
 *
 * ====================================================== time_tables ============================================
 *                                                     
 * ===============================================================================================================
 */
    public function add_time_table(){ // Directors/Directors/add_time_table
       $last=$this->Time_tables->select_last_id("council_time_tables");
        if ($this->input->post('add')){
            
           // $this->test($_POST);
            
            $this->Time_tables->insert($last);
            redirect('Directors/Directors/add_time_table','refresh');

        }elseif ($this->input->post('band_num')) {
            if ($this->input->post('band_num') != 0) {
           $data_load['num_item']=$this->Time_tables->select_last_id('council_items_decisions');     
                $this->load->view('admin/directors/get_band',$data_load);
            }
        }else{
        
       
        $last_magls=$this->Time_tables->select_last_id_magls("council_admin_table");
      //  echo $last_magls;
        $data['magls']=$this->Magls->select_council();
       // $data['members']=$this->Difined_model->select_search_key('magls_members_table','member_type_id_fk',3);
       $data['members']=$this->Time_tables->select_search_key('magls_members_table','council_id_fk',$last_magls);
       
        $data['records'] = $this->Time_tables->select_all('council_time_tables','','','id','desc');   
        $data['all_members'] = $this->Time_tables->select_members();
        $data['get_job_title'] = $this->Time_tables->select_job_title_2();
        $data['job_title'] = $this->Time_tables->get_job_title();
        $data['title'] = 'إضافة جدول الاعمال';
        $data['metakeyword'] = 'مجلس الادراة ';
        $data['metadiscription'] = '';
        $data['subview'] = 'admin/directors/add_time_table';
        $this->load->view('admin_index', $data);
        }
    }

    public function items_decisions($id){
        
        $data['galsa']=$id;
        $data['count'] = $this->Time_tables->select_items();
        $data['all_items']=$this->Difined_model->select_search_key('council_items_decisions','session_id_fk',$id);
        $data['data']=$this->Time_tables->getById($id);
        $data['title'] = 'البنود';
        $data['metakeyword'] = 'إعدادات البنود ';
        $data['subview'] = 'admin/directors/get_items_decisions';
        $this->load->view('admin_index', $data);
    }

    public function delete_item($id,$link,$session_id){
       
        $Conditions_arr=array("id"=>$id);
        $this->Difined_model->delete("council_items_decisions",$Conditions_arr);
        redirect('Directors/Directors/items_decisions/'.$session_id);
    }
    
        public function delete_item_bnood($id,$link,$session_id_fk){
       
        $Conditions_arr=array("id"=>$id);
        $this->Difined_model->delete("council_items_decisions",$Conditions_arr);
        redirect('Directors/Directors/edit_time_table/'.$session_id_fk.'/'.$link);
    }

    public function  edit_item($id,$link,$session_id_fk)
    {
         $data['edit']=$this->Difined_model->getById('council_items_decisions',$id);
         $data['edit_galsa']=$this->Difined_model->getById('council_time_tables',$session_id_fk);
        if($this->input->post('edit')){
            $this->Time_tables->update_item($id);
            redirect('Directors/Directors/items_decisions/'.$link);
        }else{
            $data['title'] = ' تعديل البنود ';
            $data['metakeyword'] = 'إعدادات البنود ';
            $data['subview'] = 'admin/directors/get_items_decisions';
            $this->load->view('admin_index', $data);
        }
    }

    public function delete_time_table($id){
      
        $this->Time_tables->delete($id);
        redirect('Directors/Directors/add_time_table/');
    }


    public function  edit_time_table($id,$council_id_fk)
    {
        
      
        $data['update_link']='add_time_table';
        $data['select_all']=$this->Difined_model->select_search_key('council_time_tables','id',$id);
        $data['select_members']=$this->Difined_model->select_search_key('council_members_table','council_id_fk',$id);
        $data['members']=$this->Difined_model->select_search_key('magls_members_table','council_id_fk',$council_id_fk);
        $data['magls']=$this->Magls->select_council();
   $data['all_items']=$this->Difined_model->select_search_key('council_items_decisions','session_id_fk',$id);
        if($this->input->post('edit')){
           
            $this->Difined_model->delete("council_members_table",array("council_id_fk "=> $id));
            $this->Time_tables->update_time_table($id);
            $this->Time_tables->update_member($id);
            if($this->input->post('band_num') > 0){
                //echo $id;
                //die;
             $session_num =  $this->uri->segment(4); 
            $this->Time_tables->insert_bonod($session_num);    
            }
            
           redirect('Directors/Directors/add_time_table');
        }else{
            $data['title'] = ' تعديل  ';
            $data['metakeyword'] = 'إعدادات  ';
            $data['subview'] = 'admin/directors/add_time_table';
            $this->load->view('admin_index', $data);
        }
    }
    
    public function band_num(){
        if ($this->input->post('band_num')) {
            if ($this->input->post('band_num') != 0) {
           $data_load['num_item']=$this->Difined_model->select_last_id('council_items_decisions');     
                $this->load->view('admin/directors/get_band',$data_load);
            }
        }
        
    }
    
    
    /**
 * ===============================================================================================================
 *
 * =========================== minutes_and_decisions =============================================================
 *
 * ===============================================================================================================
 */
    public function minutes_and_decisions()
    {
        $data['all_members'] = $this->Time_tables->select_members();
        $data['get_job_title'] = $this->Time_tables->select_job_title_2();
        $data['job_title'] = $this->Time_tables->get_job_title();
        $data['records'] = $this->Difined_model->select_all('council_time_tables', '', '', 'id', 'desc');
        $data['title'] = 'المحاضرات والقرارات';
        $data['metakeyword'] = 'المحاضرات والقرارات  ';
        $data['subview'] = 'admin/directors/minutes_and_decisions';
        $this->load->view('admin_index', $data);

    }


    public function add_decisions($id)
    {
        $session_id = $this->uri->segment(4);
       
       
        if ($this->input->post('add')) {
            $this->Time_tables->update_decision();
           redirect('Directors/Directors/minutes_and_decisions', 'refresh');
        }elseif ($this->input->post('edit')) {
         $this->Time_tables->update_decision();
        redirect('Directors/Directors/minutes_and_decisions', 'refresh');
         }else{
            $data['all_members'] = $this->Time_tables->select_members();
            $data['get_job_title'] = $this->Time_tables->select_job_title_2();
            $data['job_title'] = $this->Time_tables->get_job_title();
            $data['details']=$this->Difined_model->select_search_key('council_items_decisions',"session_id_fk",$id); 
            $data['count_members'] = $this->Time_tables->count_members_session($session_id);
            $data['count_items'] = $this->Time_tables->count_item_session($session_id);
            $data['data']=$this->Time_tables->getById($id);
            $data['title'] = 'إضافة قرار';
            $data['metakeyword'] = 'إعدادات القرارات';
            $data['subview'] = 'admin/directors/add_decisions';
            $this->load->view('admin_index', $data);
        }
    }


    public function delete_decision($id){
       
        $this->Time_tables->delete_decision($id);
        redirect('Directors/Directors/minutes_and_decisions');
    }

/**
 * ===============================================================================================================
 *
 * =============================================== follow up =====================================================
 *
 * ===============================================================================================================
 */
    public function follow_up(){
      
        $data['all_council_dates'] = $this->Difined_model->select_all('council_time_tables','session_date','','','');
        $data['decisions'] = $this->Time_tables->select_decisions();
        $data['all_members'] = $this->Time_tables->select_members();
        $data['get_job_title'] = $this->Time_tables->select_job_title_2();
        $data['job_title'] = $this->Time_tables->get_job_title();
        $data['select_all_bydate'] = $this->Time_tables->select_all_by_date();
        $data['records'] = $this->Difined_model->select_all('council_time_tables', '', '', 'id', 'desc');
        if ($this->input->post('valu')){
            $data['id']=$this->input->post('valu');
            $this->load->view('admin/directors/get_council_data',$data);
        }elseif ($this->input->post('update_current')) {
            $this->Time_tables->update_motab3a(0);
            redirect('Directors/Directors/follow_up', 'refresh');
        }elseif ($this->input->post('update_done')) {
            $this->Time_tables->update_motab3a(1);
            redirect('Directors/Directors/follow_up', 'refresh');
        }elseif ($this->input->post('update_notdone')) {
            $this->Time_tables->update_motab3a(2);
           redirect('Directors/Directors/follow_up', 'refresh');
        }else{
        $data['title'] = 'إضافة المتابعة';
        $data['metakeyword'] = 'إعدادات المتابعات';
        $data['subview'] = 'admin/directors/follow_up';
        $this->load->view('admin_index', $data);
        }
    }    
    
    public function update_motab3a_state($id,$type){
         $this->Time_tables->update_motab3a($id,$type);
            redirect('Directors/Directors/follow_up',  'refresh');
    }
    
/**
 * ===============================================================================================================
 * 
 * ===============================================================================================================
 *  
 * ===============================================================================================================
 */    
 
      public function  add_member() //  // Directors/Directors/add_member
    {
      // $this->load->model('general_assembly_model/general_assembly_model');
        $this->load->model('directors/general_assembly_model');
         $data['records'] = $this->Difined_model->select_all('general_assembly_members','','','','');
         if($this->input->post('save')){
            $this->general_assembly_model->insert();
            redirect('Directors/Directors/add_member', 'refresh');
        }else {
            $data['title'] = 'إضافة عضو جمعية عمومية';
            $data['metakeyword'] = 'إعدادات اعضاء الجمعية العمومية';
            $data['subview'] = 'admin/directors/add_member';
            $this->load->view('admin_index', $data);
        }

    }
    
    
    public function delete_member($id){ // Directors/Directors/delete_member
    $Conditions_arr=array("id"=>$id);
    $this->Difined_model->delete("general_assembly_members",$Conditions_arr);
    redirect('Directors/Directors/add_member');
}

 /**
 * ===============================================================================================================
 *
 * =============================================== add_subscription =====================================================
 *
 * ===============================================================================================================
 */

public function  add_subscription(){  // Directors/Directors/add_subscription
       $this->load->model('directors/general_assembly_model');
       // $this->load->model('general_assembly_model/Difined_model');
          $data['records'] = $this->Difined_model->select_all('general_assembly_subscription','','','','');
          $data['members'] = $this->Difined_model->select_all('general_assembly_members','','','','');
          $data['name'] = $this->general_assembly_model->get_data();
         if($this->input->post('save')){
            $this->general_assembly_model->insert_subscription();
           redirect('Directors/Directors/add_subscription', 'refresh');
        }else {
            
            $data['title'] = 'إضافة إشتراك أعضاء الجمعية العمومية';
            $data['metakeyword'] = 'إعدادات إشتراكات الجمعية العمومية';
            $data['subview'] = 'admin/directors/add_subscription';
            $this->load->view('admin_index', $data);
        }

    }
    
    
public function delete_subscription($id){ // Directors/Directors/delete_subscription
        $Conditions_arr=array("id"=>$id);
        $this->Difined_model->delete("general_assembly_subscription",$Conditions_arr);
        redirect('Directors/Directors/add_subscription');
    }
 
 
 
 
/********************************************************************/

  public function reports(){ // Directors/Directors/reports
         $data['all_council_dates'] = $this->Difined_model->select_all('council_time_tables','session_date','','id','desc');
              // $data['all_council_dates'] = $this->Difined_model->select_all('council_time_tables','session_date','','','');
        $data['decisions'] = $this->Time_tables->select_decisions();
        $data['all_members'] = $this->Time_tables->select_members();
        $data['get_job_title'] = $this->Time_tables->select_job_title_2();
        $data['job_title'] = $this->Time_tables->get_job_title();
        $data['select_all_bydate'] = $this->Time_tables->select_all_by_date();
        $data['records'] = $this->Difined_model->select_all('council_time_tables', '', '', '', '');
       
        if ($this->input->post('valu')){
            $session_id = $this->input->post('valu');
            $data['id']=$this->input->post('valu');
            $data['all_items_desions'] = $this->Time_tables->select_items_desions($session_id);
            
            $this->load->view('admin/directors/reports/get_data',$data);
        }else{
            $data['title'] = 'تقرير';
            $data['metakeyword'] = 'تقرير';
            $data['subview'] = 'admin/directors/reports/report';
            $this->load->view('admin_index', $data);   
        }

  }
 
  public function print_data($valu){// Directors/Directors/print
        $data['all_council_dates'] = $this->Difined_model->select_all('council_time_tables','session_date','','','');
        $data['decisions'] = $this->Time_tables->select_decisions();
        $data['all_members'] = $this->Time_tables->select_members();
        $data['get_job_title'] = $this->Time_tables->select_job_title_2();
        $data['job_title'] = $this->Time_tables->get_job_title();
        $data['select_all_bydate'] = $this->Time_tables->select_all_by_date();
        $data['records'] = $this->Difined_model->select_all('council_time_tables', '', '', '', '');
        $data['all_items_desions'] = $this->Time_tables->select_items_desions($valu);
        $data['id']=$valu;
        $this->load->view('admin/directors/reports/get_print',$data);  
 }
   //======================================================================
    public function get_council() {   // Directors/Directors/get_council
    
       $data['record'] = $this->Magls->get_all();
       $data['subview'] = 'admin/directors/reports/detail_member';
       $this->load->view('admin_index', $data);
   }
   
   
   /************************************************/
   
       public function get_data()
    {
        $id=$this->input->post('valu');
        $data2=$this->Council->getById($id);

        $data['appointment_date']=$data2['appointment_date'];
        $data['expiration_date']=$data2['expiration_date'];
        print_r(json_encode($data));

    }

   	/*
	public function get_data()
    {
        $id=$this->input->post('valu');
        $data2=$this->Council->getById($id);

      $data['appointment_date']=date("Y-m-d",$data2['appointment_date']);
        $data['expiration_date']=date("Y-m-d",$data2['expiration_date']);
        print_r(json_encode($data));

    }*/
    
    
    public function get_data_emp()
    {
        $id=$this->input->post('valu');
        $data=$this->Magls->get_by_Id($id);
        print_r(json_encode($data));
    }
    public function get_side_bar()
    {
        $id=$this->input->post('valu');
        $data['result']= $this->Magls->getBy($id)[0];
        $this->load->view('admin/directors/general_assembly/load_page_sidebar/general_assembly_person_data',$data);
    }
    
}// END CLASS 