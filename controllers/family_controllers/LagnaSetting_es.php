<?php

class LagnaSetting extends MY_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->CI = &get_instance();
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }
        /**********************************************************/
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in = $this->Counting->get_basic_in_num();
        $this->files_basic_in = $this->Counting->get_files_basic_in();
        /*************************************************************/
        $this->load->helper(array('url', 'text', 'permission', 'form'));
        $this->load->model('system_management/Groups');
        $this->load->model('Difined_model');
        $this->load->model('familys_models/lagna_model/Committee_model');

        $this->main_groups = $this->Groups->main_fetch_group();
        $this->groups = $this->Groups->get_group($_SESSION["group_number"]);
        $this->groups_title = $this->Groups->get_group_title($_SESSION["group_number"]);


    }

    private function test($data = array()){
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }

    private function test_r($data = array()){
        echo "<pre>";
        print_r($data);
        echo "</pre>";

    }

    private function thumb($data)
    {
        $config['image_library'] = 'gd2';
        $config['source_image'] = $data['full_path'];
        $config['new_image'] = 'uploads/thumbs/' . $data['file_name'];
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['thumb_marker'] = '';
        $config['width'] = 275;
        $config['height'] = 250;
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
    }

    private function upload_image($file_name)
    {
        $config['upload_path'] = 'uploads/images';
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf';
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

    private function upload_file($file_name)
    {
        $config['upload_path'] = 'uploads/files';
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
        $config['overwrite'] = true;
        $config['encrypt_name'] = true;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($file_name)) {
            return false;
        } else {
            $datafile = $this->upload->data();
            return $datafile['file_name'];
        }
    }

    private function url()
    {
        unset($_SESSION['url']);
        $this->session->set_flashdata('url', 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
    }

    private function message($type, $text)
    {
        if ($type == 'success') {
            return $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> تم بنجاح!</strong> ' . $text . '.</div>');
        } elseif ($type == 'wiring') {
            return $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> تحذير  !</strong> ' . $text . '.</div>');
        } elseif ($type == 'error') {
            return $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>خطأ!</strong> ' . $text . '.</div>');
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
//--------------------------------------------------
    /****************************************************************/
      //   family_controllers/LagnaSetting/

    /*
               family_controllers/LagnaSetting/AddCommittee
               family_controllers/LagnaSetting/procedures_option_lagna
               family_controllers/LagnaSetting/add_lagna
               family_controllers/LagnaSetting/galsa_member
               family_controllers/LagnaSetting/transformation_lagna_permissions
               family_controllers/LagnaSetting/LagnaDesicion


    */
    public  function  AddCommittee(){   //   family_controllers/LagnaSetting/AddCommittee
        $this->load->model('familys_models/Model_lagna_setting');
        if ($this->input->post('INSERT') =="INSERT"){
            $this->Model_lagna_setting->insert();
            redirect('family_controllers/LagnaSetting/AddCommittee','refresh');//
        }
        $data["last_code"]=$this->Model_lagna_setting->select_last_value_fild();
        $data["data_tables"]=$this->Model_lagna_setting->select_all();
        $data['title'] = " إعدادات أسماء اللجان ";
        $data['subview'] = 'admin/familys_views/all_lagna_setting/add_committee';
        $this->load->view('admin_index', $data);

    }
    public  function  UpdateCommittee($id){
        $this->load->model('familys_models/Model_lagna_setting');
        if ($this->input->post('UPDTATE') =="UPDTATE"){
            $this->Model_lagna_setting->update($id);
            redirect('family_controllers/LagnaSetting/AddCommittee','refresh');//
        }
        $data["result_id"]=$this->Model_lagna_setting->getByArray($id);
        $data['title'] = " إعدادات أسماء اللجان ";
        $data['subview'] = 'admin/familys_views/all_lagna_setting/add_committee';
        $this->load->view('admin_index', $data);

    }
    public  function DeleteCommittee($id){
        $this->load->model('familys_models/Model_lagna_setting');
        $this->Model_lagna_setting->delete_lagna($id);
        redirect('family_controllers/LagnaSetting/AddCommittee','refresh');//
    }
    //=========================================================
    //=========================================================
    /// ادارة الإجراءات
    public function procedures_option_lagna(){ // family_controllers/LagnaSetting/procedures_option_lagna
        $this->load->model('familys_models/Model_lagna_setting');

        if ($this->input->post('add_option')){
            $this->Model_lagna_setting->add_procedures_option_lagna();
            redirect('family_controllers/LagnaSetting/procedures_option_lagna','refresh');
        }
        $data['all_legan']=$this->Model_lagna_setting->select_all();
        $data['options']=$this->Model_lagna_setting->lagna_option();

        $data['title'] = " إعدادات الإجراءات  بكل لجنة ";
        $data['subview'] = 'admin/familys_views/all_lagna_setting/procedures_option_lagna';
        $this->load->view('admin_index', $data);

    }
    public function edit_procedures_option_lagna($id){
        $this->load->model('familys_models/Model_lagna_setting');
        $data['all_legan']=$this->Model_lagna_setting->select_all();
        $data['result_id']=$this->Model_lagna_setting->procedure_option_byId($id);
        $data['title'] = " إعدادات الإجراءات  بكل لجنة ";
        $data['subview'] = 'admin/familys_views/all_lagna_setting/procedures_option_lagna';
        $this->load->view('admin_index', $data);
    }
    public function update_procedures_option_lagna($id)
    {
        $this->load->model('familys_models/Model_lagna_setting');
        $this->Model_lagna_setting->update_procedures_option_lagna($id);

        redirect('family_controllers/LagnaSetting/procedures_option_lagna','refresh');

    }
    public function delete_procedures_option_lagna($id)
    {
        $this->load->model('familys_models/Model_lagna_setting');
        $this->Model_lagna_setting->delete_procedures_option_lagna($id);

        redirect('family_controllers/LagnaSetting/procedures_option_lagna','refresh');

    }
    //=========================================================
    //=========================================================
    public function add_lagna(){   //  family_controllers/LagnaSetting/add_lagna
        $this->load->model('familys_models/Model_lagna_setting');
        $data['all_legan']=$this->Model_lagna_setting->select_all();
        $data['all_member']= $this->Model_lagna_setting->get_all_members();
        $data['records']=$this->Model_lagna_setting->get_all_lgna();
        $data['title']="أعضاء اللجان";
        $data['subview'] = 'admin/familys_views/all_lagna_setting/add_member';
        $this->load->view('admin_index', $data);
    }
    public function add_lagna_member(){
        $this->load->model('familys_models/Model_lagna_setting');
        $this->Model_lagna_setting->insert_lgna();

    }
    public function make_form(){
        $data['num']= $this->input->post('num');
        $this->load->view('admin/familys_views/all_lagna_setting/load_form',$data);
    }
    public function add_member_out(){
        $this->load->model('familys_models/Model_lagna_setting');
        $this->Model_lagna_setting->save_member_out();
    }
    public function delete_member($id){
        $this->load->model('familys_models/Model_lagna_setting');
        $this->Model_lagna_setting->delete_member($id,'id');
        redirect('family_controllers/LagnaSetting/add_lagna');
    }
    public function delete_lgna($lagna_num){
        $this->load->model('familys_models/Model_lagna_setting');
        $this->Model_lagna_setting->delete_member($lagna_num,'lagna_num');
        redirect('family_controllers/LagnaSetting/add_lagna');
    }
    public function change_aproved(){
        $this->load->model('familys_models/Model_lagna_setting');
        $this->Model_lagna_setting->update_approved_lagna();
    }
    //=========================================================
    //=========================================================
  /*  public function galsa_member()   {   //  family_controllers/LagnaSetting/galsa_member
        $this->load->model('familys_models/Model_lagna_setting');
        $data['title']="إضافة جلسة جديدة";
        $data['all_lagna']=$this->Model_lagna_setting->get_all_lagnas();
        $data['session_num']=$this->Model_lagna_setting->get_last_session();
        $data['session_members']=$this->Model_lagna_setting->get_all_session();
        $data['subview'] = 'admin/familys_views/all_lagna_setting/galsa_member';
        $this->load->view('admin_index', $data);
    }
    public function add_selected_member(){
        $this->load->model('familys_models/Model_lagna_setting');
        $this->Model_lagna_setting->ususpend_other($this->input->post('lagna_num'));
        $this->Model_lagna_setting->insert_selected_lagna();
    }
*/  

public function galsa_member() {   //  family_controllers/LagnaSetting/galsa_member
        $this->load->model('familys_models/Model_lagna_setting');
        $data['title']="إضافة جلسة جديدة";
       // $data['all_lagna']=$this->Model_lagna_setting->get_all_lagnas();
        $data['all_lagna']=$this->Model_lagna_setting->getByid_lagna();
        $data['session_num']=$this->Model_lagna_setting->get_last_session();
        $data['session_members']=$this->Model_lagna_setting->get_all_session();
        $data['lagna_member']=$this->Model_lagna_setting->get_member_lagna(1);
     //$this->test($data['session_members']);
        $data['subview'] = 'admin/familys_views/all_lagna_setting/galsa_member';
        $this->load->view('admin_index', $data);
    }
    public function add_selected_member(){
        $this->load->model('familys_models/Model_lagna_setting');
        $this->Model_lagna_setting->insert_selected_lagna();
        messages('success','إضافة جلسة');
        redirect('family_controllers/LagnaSetting/galsa_member','refresh');
    }  
    
    public function delete_session_member($id){
        $this->load->model('familys_models/Model_lagna_setting');
        $this->Model_lagna_setting->delete_member_galsa('id',$id);
        redirect('family_controllers/LagnaSetting/galsa_member');
    }
    public function get_lagna_member() {
        $this->load->model('familys_models/Model_lagna_setting');
        $id=$this->input->post('id');
        $data['lagna_member']=$this->Model_lagna_setting->get_member_lagna($id);
         $this->load->view('admin/familys_views/all_lagna_setting/table_member',$data);
    }
    public function AddLagnaAttach($id){   // family_controllers/LagnaSetting/AddLagnaAttach/
          $this->load->model('familys_models/Model_lagna_setting');
          if($this->input->post("ADD") == "ADD"){
              $file=$this->upload_file("session_attachment");
              $this->Model_lagna_setting->add_attachment( $id,$file );
             messages('success','إضافة مرفق الجلسة');
          }
            $previos_path = str_replace(base_url(), "", $_SERVER['HTTP_REFERER']);
          redirect($previos_path);
    }
     public function DeleteLagnaAttach($id){  //  family_controllers/LagnaSetting/DeleteLagnaAttach/
          $this->load->model('familys_models/Model_lagna_setting');
          $this->Model_lagna_setting->delete_attachment($id );
            messages('success','حذف مرفق الجلسة');
          redirect('family_controllers/LagnaSetting/galsa_member');
    }
    //==============================================================================
     public function my_download($file){ 
            $this->load->helper('download');
            $name = $file;
            $path_iamge = './uploads/images/';
            $path_files = './uploads/files/';
            if(file_exists($path_iamge.$file)){
                $main_path=$path_iamge ;
            }elseif( file_exists($path_files.$file)){
                $main_path=$path_files  ;
            }
             $data = file_get_contents($main_path.$file); 
             force_download($name, $data); 
              if(isset($_SERVER['HTTP_REFERER'])){
                  $previos_path = str_replace(base_url(), "", $_SERVER['HTTP_REFERER']);
                redirect($previos_path,'refresh');
             }else{
                 redirect("Web",'refresh');
             }
        }
	 public function my_read_file($file_name) {
        $this->load->helper('file');
        $path_iamge = './uploads/images/';
        $path_files = './uploads/files/';
        if(file_exists($path_iamge.$file_name)){
            $main_path=$path_iamge ;
        }elseif( file_exists($path_files.$file_name)){
            $main_path=$path_files  ;
        }
        $file_path = $main_path.$file_name;
        header('Content-Type: application/pdf');
        header('Content-Discription:inline; filename="'.$file_name.'"');
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges:bytes');
        header('Content-Length: ' . filesize($file_path));
        readfile($file_path);
    } 

    //===============================================================================
    
     public function suspendLangna()
    {
        $this->load->model('familys_models/Model_lagna_setting');
        echo $this->Model_lagna_setting->suspendLangna($this->input->post('session_number'),$this->input->post('suspend'));
    }
    public function deleteLagna($session_number)
    {
        $this->load->model('familys_models/Model_lagna_setting');
        $this->Model_lagna_setting->deleteLagna($session_number);
        messages('success','حذف جلسة');
        redirect('family_controllers/LagnaSetting/galsa_member','refresh');
    }
    public function editLagna($session_number)
    {
        $this->load->model('familys_models/Model_lagna_setting');
        if($this->input->post('add')) {
            $this->Model_lagna_setting->editLagna($session_number);
            messages('success','تعديل جلسة');
            redirect('family_controllers/LagnaSetting/galsa_member','refresh');
        }
        $data['all_lagna']=$this->Model_lagna_setting->getByid_lagna();
        $data['title']="تعديل جلسة جديدة";
        //$data['all_lagna']=$this->Model_lagna_setting->get_all_lagnas();
        $data['session_members']=$this->Model_lagna_setting->get_all_session(array('session_number'=>$session_number));
        $data['lagna_member']=$this->Model_lagna_setting->get_member_lagna($data['all_lagna']['id_lagna']);
        $data['subview'] = 'admin/familys_views/all_lagna_setting/galsa_member';
        $this->load->view('admin_index', $data);
    }

    
    
    
    //=========================================================
    //=========================================================
    //=========================================================
   
   /* public  function transformation_lagna_permissions(){   //family_controllers/LagnaSetting/transformation_lagna_permissions
      
        $this->load->model('familys_models/Transformation_lagna_model');
        $this->load->model('familys_models/Father');
        $this->load->model('Nationality');
        $this->load->model("familys_models/Register");
        $this->load->model('Difined_model');
        $this->load->model('familys_models/Devices');
        $this->load->model('familys_models/House');
        $this->load->model('familys_models/Mother');
        $this->load->model('familys_models/Money');
        $this->load->model("familys_models/Family_members");
        
   
        $data["relationships"]=$this->Difined_model->select_search_key('family_setting','type',34);
              $data['member_status']=$this->Register->get_all_files_status(); 
      $data['arr_ed_state']=  $this->Mother->get_from_family_setting(40);
      
   //    $data['member_data']=$this->Family_members->select_all($mother_national_num);
    
        $data["person_type"]=$this->Difined_model->select_search_key('family_setting','type',32);
        $data["id_source"]=$this->Difined_model->select_search_key('family_setting','type',38);
        $data["relationships"]=$this->Difined_model->select_search_key('family_setting','type',34);
        $data['nationality']=  $this->Mother->get_from_family_setting(2);
        $data['national_id_array']=  $this->Mother->get_from_family_setting(1);
        $data['job_titles']=  $this->Mother->get_from_family_setting(3);
        $data['nationality']=  $this->Mother->get_from_family_setting(2);
        $data['living_place_array']=  $this->Mother->get_from_family_setting(5);
        $data['national_id_array']=  $this->Mother->get_from_family_setting(1);
        $data['health_status_array']=  $this->Mother->get_from_family_setting(6);
        $data['education_level_array']=  $this->Mother->get_from_family_setting(8);
        $data["diseases_status"]=$this->Difined_model->select_search_key('family_setting','type',37);
        $data['women_houses']=$this->Difined_model->select_search_key('family_setting','type',44);
        $data['job_titles']=  $this->Mother->get_from_family_setting(3);
      //  $data['arr_ed_state']=  $this->Mother->get_from_family_setting(9);
        $data['arr_deth']=  $this->Mother->get_from_family_setting(25);
        $data['marital_status_array']=  $this->Mother->get_from_family_setting(4);
        $data['main_depart']=  $this->Mother->get_from_family_setting(12);
        $data['arr_type_house']=  $this->Mother->get_from_family_setting(14);
        $data["diseases"]=$this->Difined_model->select_search_key('family_setting','type',35);
        $data["responses"]=$this->Difined_model->select_search_key('family_setting','type',36);

        $data['arr_direct']=  $this->Mother->get_from_family_setting(23);
        $data['house_state']=  $this->Mother->get_from_family_setting(22);
        $data['house_own']=  $this->Mother->get_from_family_setting(13);
        $data["income_sources"]=$this->Difined_model->select_search_key('family_setting','type',42);
        $data["monthly_duties"]=$this->Difined_model->select_search_key('family_setting','type',43);
        $data['banks'] = $this->Difined_model->select_all('banks','','',"id","asc");
        $data['all_areas']=$this->Transformation_lagna_model->get_all_areas();
        $data['arr_op']=  $this->Mother->get_from_family_setting(28);
        $data['arr_in']=  $this->Mother->get_from_family_setting(27);
        $data['arr_type']=  $this->Mother->get_from_family_setting(29);
        $data['last_account'] = $this->Mother->getFamilyAccount($this->uri->segment(4));
        $data['person_account'] = $this->Mother->getBasicAccount($this->uri->segment(4));
        $data['agent_bank_account'] = $this->Mother->getBasicAccount_agent($this->uri->segment(4));
       
        $data['coming']=$this->Transformation_lagna_model->get_all_orders(0);


        $data['accepted']=$this->Transformation_lagna_model->get_all_orders(1);
        $data['refused']=$this->Transformation_lagna_model->get_all_orders(2);
        $data['title'] = 'المواضيع الواردة للجان ';
        $data['subview'] = 'admin/familys_views/all_lagna_setting/transformation_lagna_permissions';
        $this->load->view('admin_index', $data);
    }
    */
    
    public  function transformation_lagna_permissions(){   //family_controllers/LagnaSetting/transformation_lagna_permissions
    /********************************************************************/
    $this->load->model('familys_models/Transformation_lagna_model');
    $data['coming']=$this->Transformation_lagna_model->all_procedures(0);
    $data['accepted']=$this->Transformation_lagna_model->all_procedures(1);
    $data['refused']=$this->Transformation_lagna_model->all_procedures(2);
    /**********************************************************/
        $data['all_orders']=$this->Transformation_lagna_model->all_proceduresDesicion(0);
		$data['accepted_sarf']=$this->Transformation_lagna_model->all_proceduresDesicion(1);
		$data['orders_end']=$this->Transformation_lagna_model->all_proceduresDesicion(2);
      /**********************************************************/
    
    $data['title'] = 'المواضيع الواردة للجان ';
    $data['subview'] = 'admin/familys_views/all_lagna_setting/transformation_lagna_permissions';
    $this->load->view('admin_index', $data);
}
    
    public  function transformation_lagna_approved(){
        $this->load->model('familys_models/Transformation_lagna_model');
        $process =$_POST['process'];
        $id =$_POST['id'];
        $this->Transformation_lagna_model->transformation_lagna_approved($process,$id);
        echo json_encode($_POST);
    }
    ////=========================================================
    //===========================================================
    //===========================================================
    public function LagnaDesicion(){   // family_controllers/LagnaSetting/LagnaDesicion
        $this->load->model('familys_models/Model_lagna_desicion');
        $data["legan"]=$this->Model_lagna_desicion->get_legana();
        $data['title'] = ' جلسات اللجان المفتوحة  ';
        $data['subview'] = 'admin/familys_views/all_lagna_setting/lagna_desicion';
        $this->load->view('admin_index', $data);
    }
   
   /*public function GetLagnaDesicion($session_id){
    $this->load->model('familys_models/Transformation_lagna_model');
    $conditions =array('transformation_lagna.approved'=>1,'transformation_lagna.approved_lagna'=>0,'transformation_lagna.session_num_fk'=>$session_id);
    $data['accepted']=$this->Transformation_lagna_model->all_procedures2($conditions);
    $this->load->model('familys_models/lagna_model/Lagna_session_model');
    $this->load->model('familys_models/Model_lagna_setting');
    $this->load->model('Difined_model');
    $Conditions_arr=array("session_num_fk"=>$session_id,"approved_lagna !="=>0);
    $data['all_orders_end']=$this->Transformation_lagna_model->all_procedures2($Conditions_arr);
    $data['session_member']=$this->Model_lagna_setting->get_member_session_open($session_id);
    $data['session_data']=$this->Model_lagna_setting->getBySession($session_id);
    $data['title'] = 'جلسات اللجان المفتوحة  ';
    $data['subview'] = 'admin/familys_views/all_lagna_setting/get_lagna_desicion';
    $this->load->view('admin_index', $data);
}*/

	public function GetLagnaDesicion($session_id){
		$this->load->model('familys_models/Transformation_lagna_model');
		$this->load->model('familys_models/lagna_model/Lagna_session_model');
		$this->load->model('familys_models/Model_lagna_setting');
		$this->load->model('Difined_model');

		$conditions =array('transformation_lagna.approved'=>1,'transformation_lagna.approved_lagna'=>0,'transformation_lagna.session_num_fk'=>$session_id);
		$data['accepted']=$this->Transformation_lagna_model->all_procedures2($conditions);
		$Conditions_arr=array("session_num_fk"=>$session_id,"approved_lagna !="=>0);
		$data['all_orders_end']=$this->Transformation_lagna_model->all_procedures2($Conditions_arr);

		$data['accepted_sarf']=$this->Transformation_lagna_model->all_proceduresDesicion2(1,$session_id);
		//$data['orders_end']=$this->Transformation_lagna_model->all_proceduresDesicion2(2,$session_id);
        $data['orders_end']=$this->Transformation_lagna_model->all_proceduresDesicion3($session_id);
		//$this->test($data['orders_end']);
		   
		$data['session_member']=$this->Model_lagna_setting->get_member_session_open($session_id);
		$data['session_data']=$this->Model_lagna_setting->getBySession($session_id);
		$data['title'] = 'جلسات اللجان المفتوحة  ';
		$data['subview'] = 'admin/familys_views/all_lagna_setting/get_lagna_desicion';
		$this->load->view('admin_index', $data);
	}
    
    	public function change_aproved_sarf(){
        $this->load->model('familys_models/Model_lagna_setting');
        $this->Model_lagna_setting->update_approved_lagna_sarf();
    }	
    
    
   //==============================================================================================
   public function AllDetailsLoadpage_approved(){
    if ($this->input->post('mother_num')) {
        /************************************************************/
        $this->load->model('familys_models/Transformation_lagna_model');
        $this->load->model('familys_models/Father');
        $this->load->model('Nationality');
        $this->load->model('Difined_model');
        $this->load->model("familys_models/Register");
        $this->load->model('Difined_model');
        $this->load->model('familys_models/Devices');
        $this->load->model('familys_models/House');
        $this->load->model('familys_models/Mother');
        $this->load->model('familys_models/Money');
        $this->load->model("familys_models/Family_members");
        $data["relationships"]=$this->Difined_model->select_search_key('family_setting','type',34);
        $data['member_status']=$this->Register->get_all_files_status();
        $data['arr_ed_state']=  $this->Mother->get_from_family_setting(40);
        $data["person_type"]=$this->Difined_model->select_search_key('family_setting','type',32);
        $data["id_source"]=$this->Difined_model->select_search_key('family_setting','type',38);
        $data["relationships"]=$this->Difined_model->select_search_key('family_setting','type',34);
        $data['nationality']=  $this->Mother->get_from_family_setting(2);
        $data['national_id_array']=  $this->Mother->get_from_family_setting(1);
        $data['job_titles']=  $this->Mother->get_from_family_setting(3);
        $data['nationality']=  $this->Mother->get_from_family_setting(2);
        $data['living_place_array']=  $this->Mother->get_from_family_setting(5);
        $data['national_id_array']=  $this->Mother->get_from_family_setting(1);
        $data['health_status_array']=  $this->Mother->get_from_family_setting(6);
        $data['education_level_array']=  $this->Mother->get_from_family_setting(8);
        $data["diseases_status"]=$this->Difined_model->select_search_key('family_setting','type',37);
        $data['women_houses']=$this->Difined_model->select_search_key('family_setting','type',44);
        $data['job_titles']=  $this->Mother->get_from_family_setting(3);
        $data['arr_deth']=  $this->Mother->get_from_family_setting(25);
        $data['marital_status_array']=  $this->Mother->get_from_family_setting(4);
        $data['main_depart']=  $this->Mother->get_from_family_setting(12);
        $data['arr_type_house']=  $this->Mother->get_from_family_setting(14);
        $data["diseases"]=$this->Difined_model->select_search_key('family_setting','type',35);
        $data["responses"]=$this->Difined_model->select_search_key('family_setting','type',36);
        $data['arr_direct']=  $this->Mother->get_from_family_setting(23);
        $data['house_state']=  $this->Mother->get_from_family_setting(22);
        $data['house_own']=  $this->Mother->get_from_family_setting(13);
        $data["income_sources"]=$this->Difined_model->select_search_key('family_setting','type',42);
        $data["monthly_duties"]=$this->Difined_model->select_search_key('family_setting','type',43);
        $data['banks'] = $this->Difined_model->select_all('banks','','',"id","asc");
        $data['all_areas']=$this->Transformation_lagna_model->get_all_areas();
        $data['arr_op']=  $this->Mother->get_from_family_setting(28);
        $data['arr_in']=  $this->Mother->get_from_family_setting(27);
        $data['arr_type']=  $this->Mother->get_from_family_setting(29);
        $data['last_account'] = $this->Mother->getFamilyAccount($this->uri->segment(4));
        $data['person_account'] = $this->Mother->getBasicAccount($this->uri->segment(4));
        $data['agent_bank_account'] = $this->Mother->getBasicAccount_agent($this->uri->segment(4));

        /************************************************************/

        $data["mother"]=$this->Transformation_lagna_model->get_data_mother($this->input->post('mother_num'));
        $data["father"]=$this->Transformation_lagna_model->get_data_father($this->input->post('mother_num'));
        $data["member_data"]=$this->Transformation_lagna_model->get_data_abnaa($this->input->post('mother_num'));
        $data["sakn"]=$this->Transformation_lagna_model->get_data_housess($this->input->post('mother_num'));
        $data["devices"]=$this->Transformation_lagna_model->get_all_devices($this->input->post('mother_num'));
        $data["home_needs"]=$this->Transformation_lagna_model->get_home_need($this->input->post('mother_num'));
        $data["financial_data_income"]=$this->Transformation_lagna_model->get_financial_data($this->input->post('mother_num'),1);
        $data["financial_data_duties"]=$this->Transformation_lagna_model->get_financial_data($this->input->post('mother_num'),2);
        $data["searcher"]=$this->Transformation_lagna_model->get_searcher_opinion($this->input->post('mother_num'));
        $data['personal_characters']=  $this->Mother->get_from_family_setting(48); //osama
        $data['relations_with_family']=  $this->Mother->get_from_family_setting(49); //osama
        $data['works_type']=  $this->Mother->get_from_family_setting(50); //osama
        /************************************************************/
        $data["transformation_lagna"]=$this->Difined_model->select_search_key('transformation_lagna','id',$this->input->post('TransformationLagnaId'))[0];
        $data["currnt_higry_year"]=$this->current_hjri_year();
        
        $this->load->view('admin/familys_views/all_lagna_setting/AllDetailsPopup_approved',$data);
         }
       }
        public function FinishSession($session_num){
            if ($session_num) {
                $this->load->model('familys_models/Transformation_lagna_model');
                $this->Transformation_lagna_model->finish_session($session_num);
                messages('success','إنهاء جلسة');
                redirect('family_controllers/LagnaSetting/galsa_member','refresh');
        
            }
        }
   //==============================================================================================
/*
    public function GetLagnaDesicion($session_id){
        $this->load->model('familys_models/lagna_model/Lagna_session_model');
        $this->load->model('familys_models/Model_lagna_setting');
        $this->load->model('familys_models/Father');
        $this->load->model('Nationality');
        $this->load->model("familys_models/Register");
        $this->load->model('Difined_model');
        $this->load->model('familys_models/Devices');
        $this->load->model('familys_models/House');
        $this->load->model('familys_models/Mother');
        $this->load->model('familys_models/Money');
        $this->load->model("familys_models/Family_members");
        $data["diseases"]=$this->Difined_model->select_search_key('family_setting','type',35);
        $data["responses"]=$this->Difined_model->select_search_key('family_setting','type',36);
        $data["person_type"]=$this->Difined_model->select_search_key('family_setting','type',32);
        $data["id_source"]=$this->Difined_model->select_search_key('family_setting','type',38);
        $data["relationships"]=$this->Difined_model->select_search_key('family_setting','type',34);
        $data['nationality']=  $this->Mother->get_from_family_setting(2);
        $data['national_id_array']=  $this->Mother->get_from_family_setting(1);
        $data['job_titles']=  $this->Mother->get_from_family_setting(3);
        $data['nationality']=  $this->Mother->get_from_family_setting(2);
        $data['living_place_array']=  $this->Mother->get_from_family_setting(5);
        $data['national_id_array']=  $this->Mother->get_from_family_setting(1);
        $data['health_status_array']=  $this->Mother->get_from_family_setting(6);
        $data['education_level_array']=  $this->Mother->get_from_family_setting(8);
        $data["diseases_status"]=$this->Difined_model->select_search_key('family_setting','type',37);
        $data['women_houses']=$this->Difined_model->select_search_key('family_setting','type',44);
        $data['job_titles']=  $this->Mother->get_from_family_setting(3);
        $data['arr_ed_state']=  $this->Mother->get_from_family_setting(9);
        $data['arr_deth']=  $this->Mother->get_from_family_setting(25);
        $data['marital_status_array']=  $this->Mother->get_from_family_setting(4);
        $data['main_depart']=  $this->Mother->get_from_family_setting(12);
        $data['arr_type_house']=  $this->Mother->get_from_family_setting(14);
        $data['arr_direct']=  $this->Mother->get_from_family_setting(23);
        $data['house_state']=  $this->Mother->get_from_family_setting(22);
        $data['house_own']=  $this->Mother->get_from_family_setting(13);
        $data["income_sources"]=$this->Difined_model->select_search_key('family_setting','type',42);
        $data["monthly_duties"]=$this->Difined_model->select_search_key('family_setting','type',43);
        $data['banks'] = $this->Difined_model->select_all('banks','','',"id","asc");
        $data['arr_op']=  $this->Mother->get_from_family_setting(28);
        $data['arr_in']=  $this->Mother->get_from_family_setting(27);
        $data['arr_type']=  $this->Mother->get_from_family_setting(29);
        $data['last_account'] = $this->Mother->getFamilyAccount($this->uri->segment(4));
        $data['person_account'] = $this->Mother->getBasicAccount($this->uri->segment(4));
        $data['agent_bank_account'] = $this->Mother->getBasicAccount_agent($this->uri->segment(4));

        $data['all_areas']=$this->Lagna_session_model->get_all_areas();
   //     $Conditions_arr=array("session_num_fk"=>$session_id);
   //     $data['all_orders']=$this->Lagna_session_model->get_one_orders($Conditions_arr);
   
        $data['all_areas']=$this->Lagna_session_model->get_all_areas();
           $Conditions_arr=array("session_num_fk"=>$session_id,"approved_lagna"=>0);
        $data['all_orders']=$this->Lagna_session_model->get_one_orders($Conditions_arr);
           $Conditions_arr=array("session_num_fk"=>$session_id,"approved_lagna !="=>0);
        $data['all_orders_end']=$this->Lagna_session_model->get_one_orders($Conditions_arr);
        $data['session_member']=$this->Model_lagna_setting->get_member_session_open($session_id);
        $data['title'] = 'جلسات اللجان المفتوحة  ';
        $data['subview'] = 'admin/familys_views/all_lagna_setting/get_lagna_desicion';
        $this->load->view('admin_index', $data);
    }  */

/***************************************************/

public function AllDetailsLoadpage(){

    if ($this->input->post('mother_num')) {
        /************************************************************/
        $this->load->model('familys_models/Transformation_lagna_model');
        $this->load->model('familys_models/Father');
        $this->load->model('Nationality');
        $this->load->model('Difined_model');
        $this->load->model("familys_models/Register");
        $this->load->model('Difined_model');
        $this->load->model('familys_models/Devices');
        $this->load->model('familys_models/House');
        $this->load->model('familys_models/Mother');
        $this->load->model('familys_models/Money');
        $this->load->model("familys_models/Family_members");
        $data["relationships"]=$this->Difined_model->select_search_key('family_setting','type',34);
        $data['member_status']=$this->Register->get_all_files_status();
        $data['arr_ed_state']=  $this->Mother->get_from_family_setting(40);
        $data["person_type"]=$this->Difined_model->select_search_key('family_setting','type',32);
        $data["id_source"]=$this->Difined_model->select_search_key('family_setting','type',38);
        $data["relationships"]=$this->Difined_model->select_search_key('family_setting','type',34);
        $data['nationality']=  $this->Mother->get_from_family_setting(2);
        $data['national_id_array']=  $this->Mother->get_from_family_setting(1);
        $data['job_titles']=  $this->Mother->get_from_family_setting(3);
        $data['nationality']=  $this->Mother->get_from_family_setting(2);
        $data['living_place_array']=  $this->Mother->get_from_family_setting(5);
        $data['national_id_array']=  $this->Mother->get_from_family_setting(1);
        $data['health_status_array']=  $this->Mother->get_from_family_setting(6);
        $data['education_level_array']=  $this->Mother->get_from_family_setting(8);
        $data["diseases_status"]=$this->Difined_model->select_search_key('family_setting','type',37);
        $data['women_houses']=$this->Difined_model->select_search_key('family_setting','type',44);
        $data['job_titles']=  $this->Mother->get_from_family_setting(3);
        $data['arr_deth']=  $this->Mother->get_from_family_setting(25);
        $data['marital_status_array']=  $this->Mother->get_from_family_setting(4);
        $data['main_depart']=  $this->Mother->get_from_family_setting(12);
        $data['arr_type_house']=  $this->Mother->get_from_family_setting(14);
        $data["diseases"]=$this->Difined_model->select_search_key('family_setting','type',35);
        $data["responses"]=$this->Difined_model->select_search_key('family_setting','type',36);
        $data['arr_direct']=  $this->Mother->get_from_family_setting(23);
        $data['house_state']=  $this->Mother->get_from_family_setting(22);
        $data['house_own']=  $this->Mother->get_from_family_setting(13);
        $data["income_sources"]=$this->Difined_model->select_search_key('family_setting','type',42);
        $data["monthly_duties"]=$this->Difined_model->select_search_key('family_setting','type',43);
        $data['banks'] = $this->Difined_model->select_all('banks','','',"id","asc");
        $data['all_areas']=$this->Transformation_lagna_model->get_all_areas();
        $data['arr_op']=  $this->Mother->get_from_family_setting(28);
        $data['arr_in']=  $this->Mother->get_from_family_setting(27);
        $data['arr_type']=  $this->Mother->get_from_family_setting(29);
        $data['last_account'] = $this->Mother->getFamilyAccount($this->uri->segment(4));
        $data['person_account'] = $this->Mother->getBasicAccount($this->uri->segment(4));
        $data['agent_bank_account'] = $this->Mother->getBasicAccount_agent($this->uri->segment(4));

        /************************************************************/

        $data["mother"]=$this->Transformation_lagna_model->get_data_mother($this->input->post('mother_num'));
        $data["father"]=$this->Transformation_lagna_model->get_data_father($this->input->post('mother_num'));
        $data["member_data"]=$this->Transformation_lagna_model->get_data_abnaa($this->input->post('mother_num'));
        $data["sakn"]=$this->Transformation_lagna_model->get_data_housess($this->input->post('mother_num'));
        $data["devices"]=$this->Transformation_lagna_model->get_all_devices($this->input->post('mother_num'));
        $data["home_needs"]=$this->Transformation_lagna_model->get_home_need($this->input->post('mother_num'));
        $data["financial_data_income"]=$this->Transformation_lagna_model->get_financial_data($this->input->post('mother_num'),1);
        $data["financial_data_duties"]=$this->Transformation_lagna_model->get_financial_data($this->input->post('mother_num'),2);
        $data["searcher"]=$this->Transformation_lagna_model->get_searcher_opinion($this->input->post('mother_num'));
        $data['personal_characters']=  $this->Mother->get_from_family_setting(48); //osama
        $data['relations_with_family']=  $this->Mother->get_from_family_setting(49); //osama
        $data['works_type']=  $this->Mother->get_from_family_setting(50); //osama
        $data["currnt_higry_year"]=$this->current_hjri_year();
        /************************************************************/
        $this->load->view('admin/familys_views/all_lagna_setting/AllDetailsPopup',$data);
    }
}


public  function transformation_approved(){
    $this->load->model('familys_models/Transformation_lagna_model');
    
    $this->Transformation_lagna_model->transformation_approved();
    if($this->input->post('approved_lagna') ==1){
        $this->message('success',' الموافقة على بنود اللجنة ');
    }elseif ($this->input->post('approved_lagna') ==2){
        $this->message('success',' رفض بنود اللجنة');
    }
    redirect('family_controllers/LagnaSetting/transformation_lagna_permissions','refresh');

}


public function print_session_decision($session_num)
{
    $this->load->model('familys_models/lagna_model/Committee_model'); // Model_member_desition
    $data['records']=$this->Committee_model->get_session_procedure($session_num);
    
 // $this->test($data['records']);
    
    $data['row']=$this->Committee_model->get_session_data($session_num);
    $data['member_galsa']=$this->Committee_model->get_member_session($session_num);
     $data['table']=$this->Committee_model->get_session_procedure2();
    
    
   $this->load->view('admin/familys_views/all_lagna_setting/print_session_decision',$data);
} 
  //*******************************************************************************************//
  public function get_member_session() //family_controllers/LagnaSetting/get_member_session
    {
        $this->load->model('familys_models/Member_session');
          if($_SESSION["role_id_fk"] == 1 ){
            $Conditions_arr=array();
          }elseif($_SESSION["role_id_fk"] == 2 ){
            $Conditions_arr=array("member_type"=>1,"member_id"=>$_SESSION["emp_code"]);
          }elseif($_SESSION["role_id_fk"] == 3 ){
            $Conditions_arr=array("member_type"=>3,"member_id"=>$_SESSION["emp_code"]);
          }elseif($_SESSION["role_id_fk"] == 4 ){
            $Conditions_arr=array("member_type"=>2,"member_id"=>$_SESSION["emp_code"]);    
          }
          $data['records']=$this->Member_session->get_session($Conditions_arr);
            $data['all_sarf']=$this->Member_session->all_sarf();//jjjjj
         // $this->test($data['records']);
        $data['title']="محاضر الجلسات";
        $data['subview'] = 'admin/familys_views/all_lagna_setting/member_session';
        $this->load->view('admin_index', $data);
    }
    public function manager_check($sarf_num)
    {
        $this->load->model('familys_models/Model_family_cashing');
        $this->Model_family_cashing->direct_manger($sarf_num);
        redirect('family_controllers/LagnaSetting/get_member_session', 'refresh');
    }
    public function make_member_decision()
    {
        $this->load->model('familys_models/Member_session');
        $this->Member_session->change_member_status();
    }
    public function ShowMemberSession(){ // family_controllers/LagnaSetting/ShowMemberSession
        $this->load->model('familys_models/Member_session');
        $this->load->model('familys_models/lagna_model/Committee_model'); 
         $session_num = $this->input->post('session_num') ;
         $data_load['records']=$this->Member_session->get_session_procedure($session_num);
                if($_SESSION["role_id_fk"] == 1 ){
                $Conditions_arr=array();
              }elseif($_SESSION["role_id_fk"] == 2 ){
                $Conditions_arr=array("member_type"=>1,"member_id"=>$_SESSION["emp_code"]);
              }elseif($_SESSION["role_id_fk"] == 3 ){
                $Conditions_arr=array("member_type"=>3,"member_id"=>$_SESSION["emp_code"]);
              }elseif($_SESSION["role_id_fk"] == 4 ){
                $Conditions_arr=array("member_type"=>2,"member_id"=>$_SESSION["emp_code"]);    
              }
           $data_load['member_galsa']=$this->Member_session->get_member_session_data($session_num,$Conditions_arr);
           $data_load['row']=$this->Committee_model->get_session_data($session_num);
         $this->load->view('admin/familys_views/all_lagna_setting/get_member_session', $data_load);
    }
	
	//=========================22-10-2018   =====================================================================
    public function  GetHeaderData(){
        $this->load->model('Difined_model');
        if ($this->input->post('mother_num')) {
            $mother_national_num = $this->input->post('mother_num');
            $data_load["basics"]=$this->Difined_model->getByArray("basic",array("mother_national_num"=> $mother_national_num));
            $data_load["transformation_lagna"]=$this->Difined_model->select_search_key('transformation_lagna','id',$this->input->post('TransformationLagnaId'))[0];
            $this->load->view('admin/familys_views/all_lagna_setting/get_header_data',$data_load);
        }
    }
    public function  details_family_files(){
        $mother_national_num=$this->input->post('mother_num');
        $this->load->model('familys_models/Father');
        $this->load->model('Nationality');
        $this->load->model("familys_models/Register");
        $this->load->model('Difined_model');
        $this->load->model('familys_models/Devices');
        $this->load->model('familys_models/House');
        $this->load->model('familys_models/Mother');
        $this->load->model('familys_models/Money');
        $this->load->model("familys_models/Family_members");
        $this->load->model('familys_models/Home_needs_model');
        $this->load->model('familys_models/Family_category');
        $this->load->model('familys_models/Attach_files');
        //------------------oosama ----------
        $this->load->model('familys_models/Family_print');
        $this->load->model("familys_models/Responsible_account");
        $data['tables'] = $this->Family_print->select_all($mother_national_num);
        $data["id_source"]= $this->Family_print->get_from_family_setting(12); //hash
        $data['nationality']=  $this->Family_print->get_from_family_setting(2); //hash
        $data['member_status']=$this->Family_print->get_files_status_setting();//hash
      //  $data['responsible_account']=$this->Responsible_account->get_all();
        //------------------oosama ----------
        /****************************************************/
        //  $data["relationships"]=$this->Difined_model->select_search_key('family_setting','type',34);
        //$data['member_status']=$this->Register->get_all_files_status();
        $data['file_status'] = $this->Register->get_all_files_status();
        $data['arr_ed_state']=  $this->Mother->get_from_family_setting(40);
        /**************************************************/
        $data['all_lagna_to']=  $this->Difined_model->select_all("lagna","","","","");
        $data['home_needs'] = $this->Home_needs_model->select_where($mother_national_num);
        //$data['attach_files']=$this->Difined_model->select_search_key('family_attach_files','mother_national_num_fk',$mother_national_num);
        $data['adminastration'] = $this->Difined_model->select_search_key("department_jobs", "from_id_fk", "0");
        $data['attach_files']=$this->Attach_files->select_data_table($mother_national_num);
        $data['all_field']=$this->Difined_model->get_field('houses');
        $data["mother_data"]=$this->Difined_model->getByArray("mother",array("mother_national_num_fk"=>$mother_national_num));
        //$this->test($data["mother_data"]);
        $data['father']=$this->Father->get_by_mother($mother_national_num,'father');
        $data['result']=$this->Father->get_by_mother2($mother_national_num,'mother');
        $data['check_data']=$this->House->getById($mother_national_num);
        //// arrays with select//////
        // $data['nationality']=  $this->Mother->get_from_family_setting(2);
        $data['national_id_array']=  $this->Mother->get_from_family_setting(1);
        $data['job_titles']=  $this->Mother->get_from_family_setting(3);
        //$data['nationality']=  $this->Mother->get_from_family_setting(2);
        $data['living_place_array']=  $this->Mother->get_from_family_setting(5);
        $data['national_id_array']=  $this->Mother->get_from_family_setting(1);
        $data['health_status_array']=  $this->Mother->get_from_family_setting(6);
        $data['education_level_array']=  $this->Mother->get_from_family_setting(8);
        $data['job_titles']=  $this->Mother->get_from_family_setting(3);
        //$data['arr_ed_state']=  $this->Mother->get_from_family_setting(9);
        $data['arr_deth']=  $this->Mother->get_from_family_setting(25);
        $data['marital_status_array']=  $this->Mother->get_from_family_setting(4);
        $data_in=$data["check_data"];
        $data['area'] = $this->House->select_places(0);
        if(isset($data_in) && !empty($data_in) && $data_in !=null) {
            $data['city'] = $this->House->select_places($data_in["h_area_id_fk"]);
            $data['centers'] = $this->House->select_places($data_in["h_city_id_fk"]);
            $data['village'] = $this->House->select_places($data_in["h_center_id_fk"]);
        }
        $data['mothers_data']=$this->Difined_model->select_search_key('mother',"mother_national_num_fk ",$mother_national_num);
        $data["cuttent_higry_year"]=$this->current_hjri_year();
        // $data['member_data']=$this->Difined_model->select_search_key('f_members','mother_national_num_fk',$mother_national_num);
        $data['member_data']=$this->Family_members->select_all($mother_national_num);
        $data['devices']=$this->Devices->select_where($mother_national_num);
        $data['mother_national_num']=$mother_national_num;
        $data['main_depart']=  $this->Mother->get_from_family_setting(12);
        $data['arr_type_house']=  $this->Mother->get_from_family_setting(14);
        $data['arr_direct']=  $this->Mother->get_from_family_setting(23);
        $data['house_state']=  $this->Mother->get_from_family_setting(22);
        $data['house_own']=  $this->Mother->get_from_family_setting(13);
        $data['money']=$this->Money->getArray($this->uri->segment(4));
        $data["person_type"]=$this->Difined_model->select_search_key('family_setting','type',32);
        $data["relationships"]=$this->Difined_model->select_search_key('family_setting','type',34);
//$data["id_source"]=$this->Difined_model->select_search_key('family_setting','type',12);
        $data["diseases"]=$this->Difined_model->select_search_key('family_setting','type',35);
        $data["responses"]=$this->Difined_model->select_search_key('family_setting','type',36);
        $data["diseases_status"]=$this->Difined_model->select_search_key('family_setting','type',37);
        $data['women_houses']=$this->Difined_model->select_search_key('family_setting','type',44);
        $data["person_type"]=$this->Difined_model->select_search_key('family_setting','type',32);
        $data['banks'] = $this->Difined_model->select_all('banks','','',"id","asc");
        $data['mother_last_account'] = $this->Mother->getMotherAccount($this->uri->segment(4));
        $data['last_account'] = $this->Mother->getFamilyAccount($this->uri->segment(4));
        $data['person_account'] = $this->Mother->getBasicAccount($this->uri->segment(4));
        $data['agent_bank_account'] = $this->Mother->getBasicAccount_agent($this->uri->segment(4));
        $data["income_sources"]=$this->Difined_model->select_search_key('family_setting','type',42);
        $data["monthly_duties"]=$this->Difined_model->select_search_key('family_setting','type',43);
        $this->load->model('familys_models/Home_needs_model');
        $data['home_needs'] = $this->Home_needs_model->select_where($mother_national_num);
        $data['personal_characters']=  $this->Mother->get_from_family_setting(48);
        $data['relations_with_family']=  $this->Mother->get_from_family_setting(49);
        $data['works_type']=  $this->Mother->get_from_family_setting(50);
        //----------------------------------------------
        $this->load->model('familys_models/Model_access_rule');
        $data["buttun_roles"]=$this->Model_access_rule->get_sesstion_roles($_SESSION['role_id_fk'],$_SESSION["emp_code"]);
        $data["file_id"]=$mother_national_num;
        //  $data["convent"]=$this->Model_access_rule->all_convent(1);
        $data['jobs_name']=$this->Model_access_rule->jobs_id();
        $data['all_operation']=$this->Model_access_rule->select_operation($mother_national_num);
        //----------------------------------------------
        //-------------------  transformation_process  --------------
        $this->load->model('Model_transformation_process');
        $data["select_process_procedures"]=$this->Model_transformation_process->select_process_procedures();
        $data["select_user"]=$this->Model_transformation_process->select_user();
        //-------------------  transformation_process  --------------
        $data['all_banks']=$this->Money->select_bank();
        $data['mother_full_name']=$this->Money->select_mother_name($this->uri->segment(4));
        //   $data['money']=$this->Money->getById($this->uri->segment(4));
        $data['all_cat'] =  $this->Family_category->select_Family_categories();
        $data['wakeel']=   $this->Difined_model->select_search_key("wakels", "mother_national_num_fk",$mother_national_num);
        $data['current_year'] =$this->current_hjri_year();
        $data['button_roles'] = $this->Difined_model->select_all("file_procedure_setting","","","order_operation","asc");
        $data["basic"]=$this->Difined_model->select_search_key('basic','mother_national_num',$mother_national_num);
        $data['file_status'] = $this->Register->get_all_files_status();
        $data['myfile_num'] = $this->Register->select_last_file_num();
        //--------------------774--------------------------
        $this->load->model("familys_models/Model_researcher_opinion");
        $result=$this->Model_researcher_opinion->getById($mother_national_num);
        if(is_array($result)){
            $data['result_opinion']=$result;
        }
        $data['arr_op']=  $this->Mother->get_from_family_setting(28);
        $data['arr_in']=  $this->Mother->get_from_family_setting(27);
        $data['arr_type']=  $this->Mother->get_from_family_setting(29);
        //--------------------774--------------------------
        /***************ahmed******/
        $data['procedures_option_lagna']=  $this->Difined_model->select_all("procedures_option_lagna","","","","");
        /***************ahmed******/
        /***********************************************************/
        $data['procedures_visit']=$this->Difined_model->select_search_key('family_setting','type',52);
        $data['family_new_cat'] =  $this->Family_category->specific_familys_category($mother_national_num);
        /***************************mymap**********/
        $this->load->library('google_maps');
        $config = array();
        $config['zoom'] = "auto";
        $marker = array();
        $marker['draggable'] = true;
        $marker['ondragend'] = '$("#lat").val(event.latLng.lat());$("#lng").val(event.latLng.lng());';
        $config['onboundschanged'] = '  if (!centreGot) {
                                                var mapCentre = map.getCenter();
                                                marker_0.setOptions({
                                                    position: new google.maps.LatLng(mapCentre.lat(), mapCentre.lng()) 
                                                });
                                                $("#lat").val(mapCentre.lat());
                                                $("#lng").val(mapCentre.lng());
                                            }
                                            centreGot = true;';
        $config['geocodeCaching'] = TRUE;
        // $this->test($data["check_data"]);
        if(!empty( $data["check_data"]['house_google_lat']) && !empty ($data["check_data"]['house_google_lng'])){
            $center = implode(',', array(
                $data["check_data"]['house_google_lat'],
                $data["check_data"]['house_google_lng']
            ));
        }else{
            $center = '27.517571447136426,41.71273613027347';
        }
        $config['center'] = $center;
        $this->google_maps->initialize($config);
        $this->google_maps->add_marker($marker);
        $data['maps'] = $this->google_maps->create_map();
        /***************************mymap**********/
        $where_cond =array('mother_national_num'=>$mother_national_num);
      //  $data['main_family_data'] = $this->Register->select_data_basic_accepted_where_details($where_cond);
      
      $data['main_family_data'] = $this->Register->select_data_basic_accepted_where_details_member_details($where_cond);

      
        $data["currnt_higry_year"]=$this->current_hjri_year();
        /*************************************************************/
        $data['reason_files']= $this->Difined_model->select_search_key('family_reasons_settings','type',1);
        $this->load->model('familys_models/Family_visitors');
        $data['visitData'] = $this->Family_visitors->getVisits($this->uri->segment(4));
        
        
         $data['responsible_account']=$this->Responsible_account->getAllByNational($mother_national_num);

        
        $data['title'] ='';
        // $data['subview'] = 'admin/familys_views/detail_page/load_page';
        //$data['subview'] = 'admin/familys_views/family_details';
        $data["transformation_lagna"]=$this->Difined_model->select_search_key('transformation_lagna','id',$this->input->post('TransformationLagnaId'))[0];
      
      
        $data["last_lagna_desision"] =$this->Model_transformation_process->get_last_lagna_transformation(array('mother_national_num'=>$mother_national_num))[0];

        if(!empty($data["last_lagna_desision"])){
            $data["all_procedures"] =$this->Difined_model->select_search_key('procedures_option_lagna','type',$data["last_lagna_desision"]->transfer_type_id_fk);


        }
      
      
      
        if($this->input->post('TransformationLagnaId')) {
            $this->load->view('admin/familys_views/all_lagna_setting/AllDetailsPopup_approved', $data);
        }else{
            $this->load->view('admin/familys_views/detail_page/load_page', $data);
        }
    }
    //=========================22-10-2018   =====================================================================
    public function GetSubTypes(){
       $this->load->model('Difined_model');
        if($this->input->post("main_type_id")){
            $type = $this->input->post("main_type_id");
            $data["typies"]=$this->Difined_model->select_search_key("family_reasons_settings","type",$type);
             $this->load->view('admin/familys_views/get_load_typies', $data);
        }
    }
    
    
    
    
    
    
    	 public  function transformation_lagna_approvedNew(){
			$this->load->model('familys_models/Transformation_lagna_model');
			$process =$_POST['process'];
			$id =$_POST['id'];

			$this->Transformation_lagna_model->transformation_lagna_approved_new($process,$id);
			if($_POST['add_reason']){
				redirect('family_controllers/LagnaSetting/GetLagnaDesicion/'.$_POST['open_session_id'],'refresh');
			}
			echo json_encode($_POST);

    }
    



    public function ETest(){
        
         $this->load->model('familys_models/Model_lagna_setting');
     $this->Model_lagna_setting->get_from_trans();
        /*
	$this->load->model('familys_models/Transformation_lagna_model');
    
    
    
    
    $data["records"]=$this->Transformation_lagna_model->etest_fun(37);
    // $this->load->view('admin/familys_views/etest', $data);
    $data['subview'] = 'admin/familys_views/etest';
        $this->load->view('admin_index', $data);*/
             
             
             
        
    }
    
    
    
        //16-2-2019
    public function  GetModalEdit(){
        $mother_national_num=$this->input->post('mother_num');

        $this->load->model('Difined_model');
        $this->load->model('Model_transformation_process');
        $this->load->model("familys_models/Register");
        $this->load->model("familys_models/Family_members");

        $data['file_status'] = $this->Register->get_all_files_status();
        $data["transformation_lagna"]=$this->Difined_model->select_search_key('transformation_lagna','id',$this->input->post('TransformationLagnaId'))[0];
        $data["last_lagna_desision"] =$this->Model_transformation_process->get_last_lagna_transformation(array('mother_national_num'=>$mother_national_num))[0];
        if(!empty($data["last_lagna_desision"])){
            $data["all_procedures"] =$this->Difined_model->select_search_key('procedures_option_lagna','type',$data["last_lagna_desision"]->transfer_type_id_fk);
        }

 // $this->test( $_POST);
  //$this->test( $data["transformation_lagna"]);
        $data['all_lagna_to']=  $this->Difined_model->select_all("lagna","","","","");
        $data['procedures_option'] =$this->Difined_model->select_search_key('procedures_option_lagna','type',$data['transformation_lagna']->transfer_type_id_fk);
        $data['mothers_data']=$this->Family_members->select_mother_search_key('mother',"mother_national_num_fk ",$mother_national_num);
        $data['member_data']=$this->Family_members->select_all($mother_national_num);
        $data["transformation_lagna_members"] =$this->Model_transformation_process->get_transformation_lagna_members_(array('mother_national_num'=>$data['transformation_lagna']->mother_national_num,'session_num_fk'=>$data['transformation_lagna']->session_num_fk));


       // $this->test(  $data['transformation_lagna']);
        $this->load->view('admin/familys_views/all_lagna_setting/get_edit_page', $data);

    }
    
    
    
        
    
}// END CLASS
?>