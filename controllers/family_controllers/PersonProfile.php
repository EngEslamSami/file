<?php
class PersonProfile extends MY_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->library('pagination');
        if($this->session->userdata('is_logged_in')==0){
            redirect('login');
        }
        $this->load->helper(array('url','text','permission','form'));
        
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
    //-----------------------------------------
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
    /**
     *  ================================================================================================================
     *
     *  ----------------------------------------------------------------------------------------------------------------
     *   family_controllers/PersonProfile
     * -----------------------------------------------------------------------------------------------------------------
     */
    public function person_profile (){ // family_controllers/PersonProfile/person_profile
        $this->load->model('familys_models/person_profile/Users');
        $this->load->model('familys_models/person_profile/Model_user_mession');
        $data["users"] = $this->Users->fetch_users_profile("","",$_SESSION['user_id']);
        //$this->test( $data["users"]);
        $data["mession_table"] = $this->Model_user_mession->select_my_messions($_SESSION['user_id']);
        $data["finish_mession_table"] = $this->Model_user_mession->select_finish_action($_SESSION['user_id']);
        $data['subview'] = 'admin/familys_views/person_profile/profile';
        $this->load->view('admin_index',$data);
    }
    public function DoAction($value,$id){
        $this->load->model('familys_models/person_profile/Model_user_mession');
        $this->Model_user_mession->update_action($value ,$id);
        if($value == 1){
              $this->message('success', 'الإنتهاء من المهمة ');
        }elseif ($value == 2) {
              $this->message('error', 'لم يتم الانتهاء من المهمة ');
        }
          redirect('family_controllers/PersonProfile/person_profile', 'refresh');
    }
     
     public function  AllDetails($mother_national_num){    // family_controllers/PersonProfile/AllDetails/010007876166
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
        $data['home_needs'] = $this->Home_needs_model->select_where($mother_national_num);
        $data['attach_files']=$this->Difined_model->select_search_key('family_attach_files','mother_national_num_fk',$mother_national_num);
        $data['all_field']=$this->Difined_model->get_field('houses');
        $data["mother_data"]=$this->Difined_model->getByArray("mother",array("mother_national_num_fk"=>$mother_national_num));
        $data['father']=$this->Father->get_by_mother($mother_national_num,'father');
        $data['result']=$this->Father->get_by_mother2($mother_national_num,'mother');
        $data['check_data']=$this->House->getById($mother_national_num);
        $data["basic_data"]=$this->Register->get_by_mother_national_num($mother_national_num);
       
         //// arrays with select//////
        $data['nationality']=  $this->Mother->get_from_family_setting(2);
        $data['national_id_array']=  $this->Mother->get_from_family_setting(1);
        $data['job_titles']=  $this->Mother->get_from_family_setting(3);
        $data['nationality']=  $this->Mother->get_from_family_setting(2);
        $data['living_place_array']=  $this->Mother->get_from_family_setting(5);
        $data['national_id_array']=  $this->Mother->get_from_family_setting(1);
        $data['health_status_array']=  $this->Mother->get_from_family_setting(6);
        $data['education_level_array']=  $this->Mother->get_from_family_setting(8);
        $data['job_titles']=  $this->Mother->get_from_family_setting(3);
        $data['arr_ed_state']=  $this->Mother->get_from_family_setting(9);
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
        $data["id_source"]=$this->Difined_model->select_search_key('family_setting','type',38);
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
        //----------------------------------------------
        //----------------------------------------------
        $data['all_banks']=$this->Money->select_bank();
        $data['mother_full_name']=$this->Money->select_mother_name($this->uri->segment(4));
        //   $data['money']=$this->Money->getById($this->uri->segment(4));
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
            //----------------------------------------------
        $this->load->model('familys_models/Model_access_rule');
        $data["buttun_roles"]=$this->Model_access_rule->get_sesstion_roles($_SESSION['role_id_fk'],$_SESSION["emp_code"]);
        $data["file_id"]=$mother_national_num;
        
      //  $data["convent"]=$this->Model_access_rule->all_convent(1);
        $data['jobs_name']=$this->Model_access_rule->jobs_id();
        $data['all_operation']=$this->Model_access_rule->select_operation($mother_national_num);
        
         $data['all_operation_2']=$this->Model_access_rule->select_operation_2($mother_national_num);  
       //----------------------------------------------
        //-------------------  transformation_process  --------------
        $this->load->model('Model_transformation_process');
        $data["select_process_procedures"]=$this->Model_transformation_process->select_process_procedures();
        $data["select_user"]=$this->Model_transformation_process->select_user();
        //-------------------  transformation_process  --------------
        /***************ahmed******/
        $data['procedures_option_lagna']=  $this->Difined_model->select_all("procedures_option_lagna","","","","");
        /***************ahmed******/
        $data['title'] ='';
        $data['subview'] = 'admin/familys_views/person_profile/family_details';
        $this->load->view('admin_index', $data);
    }
    //======================================================
     public function  Details($mother_national_num){    // family_controllers/PersonProfile/AllDetails/010007876166
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
        $data['home_needs'] = $this->Home_needs_model->select_where($mother_national_num);
        $data['attach_files']=$this->Difined_model->select_search_key('family_attach_files','mother_national_num_fk',$mother_national_num);
        $data['all_field']=$this->Difined_model->get_field('houses');
        $data["mother_data"]=$this->Difined_model->getByArray("mother",array("mother_national_num_fk"=>$mother_national_num));
        $data['father']=$this->Father->get_by_mother($mother_national_num,'father');
        $data['result']=$this->Father->get_by_mother2($mother_national_num,'mother');
        $data['check_data']=$this->House->getById($mother_national_num);
        
        //// arrays with select//////
        $data['nationality']=  $this->Mother->get_from_family_setting(2);
        $data['national_id_array']=  $this->Mother->get_from_family_setting(1);
        $data['job_titles']=  $this->Mother->get_from_family_setting(3);
        $data['nationality']=  $this->Mother->get_from_family_setting(2);
        $data['living_place_array']=  $this->Mother->get_from_family_setting(5);
        $data['national_id_array']=  $this->Mother->get_from_family_setting(1);
        $data['health_status_array']=  $this->Mother->get_from_family_setting(6);
        $data['education_level_array']=  $this->Mother->get_from_family_setting(8);
        $data['job_titles']=  $this->Mother->get_from_family_setting(3);
        $data['arr_ed_state']=  $this->Mother->get_from_family_setting(9);
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
        $data["id_source"]=$this->Difined_model->select_search_key('family_setting','type',38);
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
        //----------------------------------------------
        //----------------------------------------------
        $data['all_banks']=$this->Money->select_bank();
        $data['mother_full_name']=$this->Money->select_mother_name($this->uri->segment(4));
        //   $data['money']=$this->Money->getById($this->uri->segment(4));
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
            //----------------------------------------------
       $this->load->model('familys_models/Model_access_rule');
       //  $data['all_operation']=$this->Model_access_rule->select_operation($mother_national_num);
        // $data["buttun_roles"]=$this->Model_access_rule->get_sesstion_roles($_SESSION['role_id_fk'],$_SESSION["emp_code"]);
         
                 $data['all_operation']=$this->Model_access_rule->select_operation($mother_national_num);
        
         $data['all_operation_2']=$this->Model_access_rule->select_operation_2($mother_national_num);  
         
          $data["file_id"]=$mother_national_num;
        
      //  $data["convent"]=$this->Model_access_rule->all_convent(1);
        $data['jobs_name']=$this->Model_access_rule->jobs_id();
        
       //----------------------------------------------
        //-------------------  transformation_process  --------------
        $this->load->model('Model_transformation_process');
      //  $data["select_process_procedures"]=$this->Model_transformation_process->select_process_procedures();
       // $data["select_user"]=$this->Model_transformation_process->select_user();
        //-------------------  transformation_process  --------------  */
        /***************ahmed******/
        $data['procedures_option_lagna']=  $this->Difined_model->select_all("procedures_option_lagna","","","","");
        /***************ahmed******/
        $data['title'] ='';
        $data['subview'] = 'admin/familys_views/person_profile/family_details';
        $this->load->view('admin_index', $data);
    }
    //======================================================
    public function FamilyTtransformation($id){   //   family_controllers/PersonProfile/FamilyTtransformation
        $this->load->model('Model_transformation_process');
        if($this->input->post('go') == $id){
            $this->Model_transformation_process->insert_for_family();
            messages('success','تم احالة الملف ');
            redirect('family_controllers/PersonProfile/person_profile');
        }
    }
     
   
   
   
       public function all_transformation_process (){ // family_controllers/PersonProfile/all_transformation_process
          $this->load->model('Model_transformation_process');
        $this->load->model('familys_models/person_profile/Users');
        $this->load->model('familys_models/person_profile/Model_user_mession');
      /*  $data["users"] = $this->Users->fetch_users_profile("","",$_SESSION['user_id']);
        $data["mession_table"] = $this->Model_user_mession->select_my_messions($_SESSION['user_id']);
        $data["finish_mession_table"] = $this->Model_user_mession->select_finish_action($_SESSION['user_id']);
      */
      
      // $data['all_operation_2']=$this->Model_access_rule->select_operation_2($mother_national_num);  
      $data["all_process"] = $this->Model_transformation_process->report_transformation_process();
        $data['subview'] = 'admin/familys_views/person_profile/all_transformation_process';
        $this->load->view('admin_index',$data);
    }
     /**
      * 
      * 
      * 
      *  */
      
      public function update_users($id){
    $this->load->model('n/Users');
    $this->load->model("Difined_model");
    if ($this->input->post('ADD') == 'ADD') {
        $file=$this->upload_image("user_photo");
        $this->Users->update($id,$file);
        $this->message('success','تم التعديل بنجاح');
        redirect('family_controllers/PersonProfile/person_profile', 'refresh');
    }
  
    }
     
     
 } // END CLASS 
 ?>