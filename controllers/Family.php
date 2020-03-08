<?php
class Family extends MY_Controller
{  //  https://auth-db131.hostinger.ae/db_structure.php?server=1&db=u390449202_italo&token=31fa9b2698030e5a824d4bf88ed61eae

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
//--------------------------------------------------  
    private  function test($data=array()){
              echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }
//--------------------------------------------------    
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
//-----------------------------------------------
     private  function upload_file($file_name){
        $config['upload_path'] = 'uploads/files';
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
        $config['max_size']    = '1024*8';
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
//-------------------------------------------------    
    private function url (){
     unset($_SESSION['url']);
        $this->session->set_flashdata('url','http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
    }
//-----------------------------------------   
 private function message($type,$text){
if($type =='success') {
return $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissable">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <strong> �� �����!</strong> '.$text.'.
                                                </div>');
}elseif($type=='wiring'){
return $this->session->set_flashdata('message','<div class="alert alert-warning alert-dismissable">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <strong> �����  !</strong> '.$text.'.
                                                </div>');
}elseif($type=='error'){
return  $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <strong>���!</strong> '.$text.'.
                                                </div>');
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
  return $HYear;
}
        
        
        
 //-----------------------------------------         
/**
 *  ================================================================================================================
 * 
 *  ================================================================================================================
 * 
 *  ================================================================================================================
 */

    public function  index(){
      $this->load->model("Difined_model");
      $this->load->model("family_models/Register");
      $this->load->model("family_models/Operations");
      $this->load->model("Users");
        $data['is_active']=1;
        
        $data['all_family']=$this->Register->family(0);
        $data['jobs_name']=$this->Users->jobs_id();
        $data['last_state']=$this->Operations->last_statues();
        $data['subview'] = 'admin/family/all_family';
        $this->load->view('admin_index', $data);
    }
 /**
 * ===============================================================================================================
 * 
 * ===============================================================================================================
 * 
 * ===============================================================================================================
 */    
   
   public function basic($id){
    $this->load->model("Difined_model");
    $this->load->model("Users");
    $this->load->model("family_models/Operations"); 
    $this->load->model("family_models/Register");
       $this->Register->update_publisher($id,$_SESSION['user_username']);
    $data['jobs_name']=$this->Users->jobs_id();
    $data['all_operation']=$this->Operations->select_all($id);
    $data['mother_national_num']=$id;
    $data['basic_data']=$this->Difined_model->select_search_key('basic','mother_national_num',$id);   
    $data['subview'] = 'admin/family/family_edit/basic';
        $this->load->view('admin_index', $data);  
   }
 //--------------------------------------  
   public function update_basic($id){
         $this->load->model("Difined_model");
         $this->load->model("family_models/Register");
    $data['mother_national_num']=$id;
    if($this->input->post('updated')){
      $this->Register->updated($id);
       redirect('Family/basic/'.$id);
    }
    $data['basic_data']=$this->Difined_model->select_search_key('basic','mother_national_num',$id);
    $data['subview'] = 'admin/family/family_edit/basic_edit';
        $this->load->view('admin_index', $data);  
   }
   //-----------------------------------
   public function update_pass($id){
      $this->load->model("family_models/Register");
     if($this->input->post('change')){
          $this->Register->update_pass($id);
           redirect('Family/basic/'.$id);
     }
    }
   
 /**
 * ===============================================================================================================
 * 
 * ===============================================================================================================
 * 
 * ===============================================================================================================
 */    
     public function update_father($id){
        $this->load->model('family_models/Father');
        $this->load->model('Nationality');
        if($this->input->post('update_father')){
            $this->Father->update($id);
           redirect('Family/update_mother/'.$id);
        }
        $data['nationality']=  $this->Nationality->select();
        $data['result'] = $this->Father->getById($id);
        $data['subview'] = 'admin/family/family_edit/father_edit';
        $this->load->view('admin_index', $data);
    }
      
 /**
 * ===============================================================================================================
 * 
 * ===============================================================================================================
 * 
 * ===============================================================================================================
 */    
 
public function update_mother($id){
    $this->load->model('family_models/Mother');
    $this->load->model('Difined_model');
    $this->load->model('Nationality');
    $this->load->model('Job_titles');
    $data['nationality']=  $this->Nationality->select();
    $data['job_titles']=  $this->Job_titles->select();
    if($this->input->post('update')){
        $this->Mother->update($id);
        redirect('Family/update_family_members/'.$id);
    }
    $data['result']=$this->Difined_model->select_search_key('mother','mother_national_num_fk',$id);
    $data['subview'] = 'admin/family/family_edit/mother_edit';
    $this->load->view('admin_index',$data);
}

      
  /**
 * ===============================================================================================================
 * 
 * ===============================================================================================================
 * 
 * ===============================================================================================================
 */    
   public function update_family_members($id){
        $this->load->model("Difined_model");
        $this->load->model("family_models/Register");
    $data['mothers_data']=$this->Register->select_data();
    $data['mother_national_num']=$id;
    $data['member_data']=$this->Difined_model->select_search_key('f_members','mother_national_num_fk',$id);
    $data['subview'] = 'admin/family/family_edit/family_members_edit';
        $this->load->view('admin_index', $data);  
    
   }
   //------------------------------------------------------
   public function add_member($mother_id){
     $this->load->model("Difined_model");
     $this->load->model("family_models/Family_members");
      if($this->input->post('add_member')){
          $member_sechool_img='member_sechool_img';
          $member_birth_card_img='member_birth_card_img';
         $file['member_sechool_img']= $this->upload_file($member_sechool_img);
         $file['member_birth_card_img']= $this->upload_file($member_birth_card_img);
         $this->Family_members->insert($file,$mother_id);
        redirect('Family/update_family_members/'.$mother_id);  
    }
      $data['nationalities']=$this->Difined_model->select_search_key('nationality',"id!=",0);
      $data['mother_national_num_fk']=$mother_id;
          $mother_ids=(string) $mother_id;
          $arr_condetion=array("mother_national_num_fk"=>$mother_ids);
      $data['all_stages']=$this->Family_members->get_classroom(0);    
      $data['fathers']=$this->Difined_model->slect_where('father',$arr_condetion,"","","id","DESC");
      $data['subview'] = 'admin/family/family_edit/one_member_add';
        $this->load->view('admin_index', $data); 
   }
   //------------------------------------------------------
   public function update_one_member($id,$mother_id){
     $this->load->model("Difined_model");
     $this->load->model("family_models/Family_members");
         $mother_ids=(string) $mother_id;
     if($this->input->post('edit_member')){
            $member_sechool_img='member_sechool_img';
            $member_birth_card_img='member_birth_card_img';
              $file['member_sechool_img']= $this->upload_file($member_sechool_img);
              $file['member_birth_card_img']= $this->upload_file($member_birth_card_img);
                
           $this->Family_members->update_member($id,$file);
          redirect('Family/update_family_members/'.$mother_id);
     } //
      $data['nationalities']=$this->Difined_model->select_search_key('nationality',"id!=",0);
      $data['result']=$this->Difined_model->getById('f_members',$id);
      $data['class_room']=$this->Family_members->get_classroom( $data['result']['stage_id_fk']);
      $data['all_stages']=$this->Family_members->get_classroom(0);     
      
               $arr_condetion=array("mother_national_num_fk"=>$mother_ids);
      $data['fathers']=$this->Difined_model->slect_where('father',$arr_condetion,"","","id","DESC");
      $data['subview'] = 'admin/family/family_edit/one_member_edit';
        $this->load->view('admin_index', $data);  
   }
   //------------------------------------------------------
   public function delete_member($id,$mother_id){
    $this->load->model("Difined_model");
    $Conditions_arr=array("id"=>$id);
    $this->Difined_model->delete("f_members",$Conditions_arr);
    redirect('Family/update_family_members/'.$mother_id);
   }

   /**
 * ===============================================================================================================
 * 
 * ===============================================================================================================
 * 
 * ===============================================================================================================
 */   
 public function update_house($id){
    $this->load->model('Department');
    $this->load->model('family_models/House');
    $this->load->model('Difined_model');
    $data['employ_main_depart'] = $this->Department->select_employ_main_dep();
    $data['employ_sub_depart'] = $this->Department->select_employ_sub_dep();
    $data['main_depart'] = $this->Department->select_all();
    $data['sub_depart'] = $this->Department->select_employ_sub_dep();
    if($this->input->post('update')){
        $this->House->update($id);
        redirect('family/update_money/'.$id);
    }
    $data['result'] = $this->House->getById($id);
    $data['subview'] = 'admin/family/family_edit/building_edit';
    $this->load->view('admin_index', $data);
}
   /**
 * ===============================================================================================================
 * 
 * ===============================================================================================================
 * 
 * ===============================================================================================================
 */       public function update_money($id){
        $this->load->model('family_models/Money');
        if($this->input->post('update_money')){
          $this->Money->update($id);
         redirect('Family/update_devices/'.$id);
        }
           $data['all_banks']=$this->Money->select_bank();
        $data['result'] = $this->Money->getById($id);
        $data['subview'] = 'admin/family/family_edit/money_edit';
        $this->load->view('admin_index', $data);
    }

   /**
 * ===============================================================================================================
 * 
 * ===============================================================================================================
 * 
 * ===============================================================================================================
 */    
   public function update_devices($id){

    $this->load->model('family_models/Devices');
    $this->load->model('Difined_model');
    $data['devices'] = $this->Difined_model->select_all('electrical_equipment','','',"id","asc");
    $mother_ids=(string) $id;
    $arr_condetion=array("mother_national_num_fk"=>$mother_ids);
    $data['result']=$this->Difined_model->slect_where('devices',$arr_condetion,"","","id","DESC");
    $data['mother_id']=$id;
    if ($this->input->post('num')){
        $data['id']=$this->input->post('num');
        $this->load->view('admin/family/family_edit/get_device_edit',$data);
    }elseif($this->input->post('update')){

        $this->Devices->update($id);
        redirect('Family/researcher_opinion/'.$id);
    }else{
        $data['subview'] = 'admin/family/family_edit/devices_edit';
        $this->load->view('admin_index',$data);
    }
   }

//--------------------------------------------
    public function delete_device($from, $index,$id,$mother_national_num_fk )
    {
    $this->load->model('family_models/Devices');
    $this->Devices->delete($from, $id);
    redirect('Family/'.$index.'/'.$mother_national_num_fk);
   }
     /**
 * ===============================================================================================================
 * 
 * ===============================================================================================================
 * 
 * ===============================================================================================================
 */ 
    public function update_attach_files($id){
        $this->load->model("family_models/Attach_files");  
        $data['mother_national_num_fk']=$id;
        if($this->input->post('UPDATE')){
              $death_certificate='death_certificate';
          $files=$this->upload_file($death_certificate);
            $files['family_card']=$this->upload_file('family_card');
            $files['plowing_inheritance']=$this->upload_file('plowing_inheritance');
            $files['instrument_agency_with_orphans']=$this->upload_file('instrument_agency_with_orphans');
            $files['birth_certificate']=$this->upload_file('birth_certificate');
            $files['ownership_housing']=$this->upload_file('ownership_housing');
            $files['definition_school']=$this->upload_file('definition_school');
            $files['social_security_card']=$this->upload_file('social_security_card');
            $files['retirement_department']=$this->upload_file('retirement_department');
            $files['social_insurance']=$this->upload_file('social_insurance');
            $files['bank_statement']=$this->upload_file('bank_statement');
         $this->Attach_files->update_files($files,$id);
           redirect('Family/update_attach_files/'.$id); 
        }
        $data['subview'] = 'admin/family/family_edit/attach_files_edit';
        $this->load->view('admin_index', $data);       
    }
   /**
 * ===============================================================================================================
 * 
 * ===============================================================================================================
 * 
 * ===============================================================================================================
 */ 
   
   public function researcher_opinion($id){
    $this->load->model("Difined_model");
  
      $this->load->model("family_models/Researcher_opinion");
    $data['mother_national_num']=$id;
         $result=$this->Researcher_opinion->getById($id);
         if(is_array($result)){
         $data['result']=$result;    
         }
    if($this->input->post('add')){
        
        $researcher_name='';$family_leader_name='';
          if($_SESSION['status']==0 && $_SESSION['dep_job_id_fk']==3 ){
            $researcher_name=$_SESSION['user_username'];
          }elseif($_SESSION['status']==1 && $_SESSION['dep_job_id_fk']==3){
            $family_leader_name=$_SESSION['user_username'];
          }
        $this->Researcher_opinion->inserted($id,$researcher_name,$family_leader_name);
        redirect('Family/basic/'.$id);
        }
    if($this->input->post('update')){
    
          $researcher_name='';$family_leader_name='';
          if($_SESSION['status']==0 && $_SESSION['dep_job_id_fk']==3 ){
            $researcher_name=$_SESSION['user_username'];
          }elseif($_SESSION['status']==1 && $_SESSION['dep_job_id_fk']==3){
            $family_leader_name=$_SESSION['user_username'];
          }
        $this->Researcher_opinion->updated($id,$researcher_name,$family_leader_name);
           redirect('Family/basic/'.$id);
       } 
   $data['subview'] = 'admin/family/family_edit/researcher_opinion';
   $this->load->view('admin_index', $data);  
   }
 
 /**
 * ===============================================================================================================
 * 
 * ===============================================================================================================
 *   
 * ===============================================================================================================
 */   
  public function delete_family($mother_national_num_fk){
        $this->load->model("Difined_model");

        $array_condition_1=array("mother_national_num"=>$mother_national_num_fk);
        $array_condition_2=array("mother_national_num_fk"=>$mother_national_num_fk);
        $this->Difined_model->delete('basic',$array_condition_1);
        $this->Difined_model->delete('father',$array_condition_2);
        $this->Difined_model->delete('mother',$array_condition_2);
        $this->Difined_model->delete('f_members',$array_condition_2);
        $this->Difined_model->delete('houses',$array_condition_2);
        $this->Difined_model->delete('financial',$array_condition_2);
        $this->Difined_model->delete('devices',$array_condition_2);
        $this->Difined_model->delete('researcher_opinion',$array_condition_2);
        $this->Difined_model->delete('family_attach_files',$array_condition_2);
        //-------------------------------------
        $this->Difined_model->delete('operation_table',$array_condition_2);
        $this->Difined_model->delete('operation_service',$array_condition_2);
        //-------------------------------------
        $this->Difined_model->delete('all_services_orders',array("mother_national_id_fk"=>$mother_national_num_fk));
        redirect('Family','refresh');
    }
 
 /**
 * ===============================================================================================================
 * 
 * ===============================================================================================================
 *   
 * ===============================================================================================================
 */   
  
 public function family_details($id){
       $this->load->model('family_models/Father');
       $this->load->model('family_models/Mother');
       $this->load->model('family_models/House');
       $this->load->model("family_models/Register");
       $this->load->model('family_models/Money');
       $this->load->model('family_models/Devices');
       $this->load->model("family_models/Operations");
       $this->load->model("family_models/Researcher_opinion");
       $this->load->model('Nationality');
       $this->load->model('Job_titles');   
       $this->load->model('Department');
       $this->load->model("Difined_model");
       $this->load->model("Users");
        $data['is_active']=1; 
      //================ 
     if($_SESSION['from_id_fk'] != 1){
                if($_SESSION['status'] == 0 ){
               $data['convent']=$this->Difined_model->select_search_key('department_jobs','from_id_fk',$_SESSION['from_id_fk']);   
             }elseif($_SESSION['status'] == 1){
                $condetion_arr=array('from_id_fk <='=> $_SESSION['from_id_fk'],'from_id_fk !='=> 0 );
                $data['convent']=$this->Difined_model->slect_where('department_jobs',$condetion_arr,'','','','');
             }     
     }if($_SESSION['from_id_fk'] == 1){
                $condetion_arr=array('from_id_fk >='=> 2,'from_id_fk ='=> 3 );
                $data['convent']=$this->Difined_model->slect_where('department_jobs',$condetion_arr,'','','','');
     }
     //================
      
       $mother_ids=(string) $id;
       $arr_condetion=array("mother_national_num_fk"=>$mother_ids);
    $data['all_operation']=$this->Operations->select_all($id); 
    $data['jobs_name']=$this->Users->jobs_id();
    $data['mother_id']=$id;  
    $data['employ_main_depart'] = $this->Department->select_employ_main_dep();
    $data['employ_sub_depart'] = $this->Department->select_employ_sub_dep();
    $data['main_depart'] = $this->Department->select_all();
    $data['sub_depart'] = $this->Department->select_employ_sub_dep();   
    $data['mothers_data']=$this->Register->select_data();
    $data['mother_national_num']=$id;
    $data['member_data']=$this->Difined_model->select_search_key('f_members','mother_national_num_fk',$id);
    $data['job_titles']=  $this->Job_titles->select();
    $data['basic_data']=$this->Difined_model->select_search_key('basic','mother_national_num',$id);
    $data['nationality']=  $this->Nationality->select();
    $data['result_father'] = $this->Father->getById($id);
    $data['result_mother']=$this->Difined_model->select_search_key('mother','mother_national_num_fk',$id);  
    $data['result_house'] = $this->House->getById($id); 
    $data['result_money'] = $this->Money->getById($id);
    $data['result_devices']=$this->Difined_model->slect_where('devices',$arr_condetion,"","","id","DESC");
    $data['result_opinion']=$this->Researcher_opinion->getById($id);  
    //$this->test($data['result_money']);  
    $data['subview'] = 'admin/family/family_details';
      $this->load->view('admin_index',$data);  
   }  
//---------------------------------
     public function one_member_details($mother_id,$member_id){
        $this->load->model("family_models/Family_members");
        $this->load->model("Difined_model");
            $mother_ids=(string) $mother_id;
            $arr_condetion=array("mother_national_num_fk"=>$mother_ids);
     $data['result']=$this->Difined_model->getById('f_members',$member_id);
     $data['class_room']=$this->Family_members->get_classroom( $data['result']['stage_id_fk']);
     $data['all_stages']=$this->Family_members->get_classroom(0); 
     $data['fathers']=$this->Difined_model->slect_where('father',$arr_condetion,"","","id","DESC");
     $data['subview'] = 'admin/family/family_details/one_member_details';
      $this->load->view('admin_index',$data);    
     } 

/**
 * ===============================================================================================================
 * 
 * ========================                 التحيل و القبول و الرفض                 ==============================
 * 
 * ===============================================================================================================
 */ 
 public function operation($process,$page,$mother_national_num){
    $this->load->model("family_models/Operations");
    if($this->input->post('operation')){
        $this->Operations->insert_op($process,$mother_national_num);
        if($process ==4){
             $this->Operations->approved_basic(1,$mother_national_num);
        }
        
        redirect('Family/'.$page.'/'.$mother_national_num, 'refresh');
    }
    
 }
 
/**
 * ===============================================================================================================
 * 
 * ========================                خدمات اللاسرة                 =========================================
 * 
 * ===============================================================================================================
 */ 
public function family_services(){
    $this->load->model('Difined_model');
    $this->load->model('family_models/Service');
    $this->load->model('family_models/Operation_service');
    $data['last_oper'] = $this->Operation_service->select_last_operation();
    $data['get_job_name'] = $this->Operation_service->get_job_name();
    $data['sub_service'] = $this->Service->select();
    $data['all_records'] = $this->Difined_model->select_all('all_services_orders','','','id','desc');
    $data['get_service_name'] = $this->Service->get_sub_name();
    $this->load->model('family_models/Mother');
    $data['get_mother'] = $this->Mother->get_mother_name();
    $data['main_service'] = $this->Difined_model->select_search_key('service_setting','main_service_id',0);
    if ($this->input->post('valu')){
        $data['id']=$this->input->post('valu');
        $this->load->view('admin/family/get_sub_service',$data);
    }elseif ($this->input->post('number')){
        $data['id']=$this->input->post('number');
        $this->load->view('admin/family/check_number',$data);
    }else{
        $data['subview'] = 'admin/family/family_services';
        $this->load->view('admin_index', $data);

    }
}
//-----------------------------------------------------

//-----------------------------------------------------
public function services_type(){
    $this->load->model('family_models/Service');
    $this->load->model('Difined_model');
    $this->load->model('Nationality');
    $this->load->model('Department');
    $this->load->model('family_models/Mother');
    $this->load->model('family_models/Family_members');
    $data['courses'] = $this->Difined_model->select_all('courses','','','id','asc');
    $data['school_requirement'] = $this->Difined_model->select_all('school_requirement','','','id','asc');
    $data['home_repair_type'] = $this->Difined_model->select_all('home_repair_type','','','id','asc');
    $data['count'] = $this->Service->count_services($this->input->post('mother_national_id_fk'));
    $data['main_service'] = $this->Service->select_main();
    $data['sub_service'] = $this->Service->select_sub();
    $data['devices'] = $this->Service->select_devices();
    $data['nationality']=  $this->Nationality->select();
    $data['main_depart'] = $this->Department->select_all();
    $data['get_mother'] = $this->Mother->get_mother_name();
    $data['get_family_members'] = $this->Family_members->get_family_members();
    $data['subview'] = 'admin/family/family_services';
    
    if($this->input->post('main_service')){
       if(isset($_POST['sub_service'])){
         $arr_out=$this->Service->getById($this->input->post('sub_service'));
         $types=$arr_out['title'];
          $data['get_main_service_name'] = $this->Service->getById($this->input->post('main_service'));
          $data['main_service_name'] = $data['get_main_service_name']['main_service_name'];
           $data['service_name']=$arr_out['sub_service_name'];
       }else{
         $arr_out=$this->Service->getById($this->input->post('main_service'));
          $types=$arr_out['title'];
           $data['get_main_service_name'] = $this->Service->getById($this->input->post('main_service'));
           $data['main_service_name'] = $data['get_main_service_name']['main_service_name'];
            $data['service_name']=$arr_out['main_service_name'];
       }
     $data['subview'] = 'admin/services/'.$types;
    }
    
    $this->load->view('admin_index', $data);

}
//-----------------------------------------------------
public  function insert_services($mother_national_id_fk,$main_service,$sub_service){
    $this->load->model('family_models/Service');
    if($this->input->post('add')){
        //==========files==============
        $device_img ='device_img';
        $device_file = $this->upload_file($device_img);
        $proofed_date_file='proofed_date_file';
        $proofed_file = $this->upload_file($proofed_date_file);
        $fatora_img='fatora_img';
        $fatora_file = $this->upload_file($fatora_img);
        $medicine_device_file_attachment='medicine_device_file_attachment';
        $medicine_device_file = $this->upload_file($medicine_device_file_attachment);
        $car_repair_fatora_img='car_repair_fatora_img';
        $car_repair_file = $this->upload_file($car_repair_fatora_img);
        $car_num_img='car_num_img';
        $car_num_file = $this->upload_file($car_num_img);
        $repair_device_img='repair_device_img';
        $repair_device_file = $this->upload_file($repair_device_img);
        $home_img ='home_img';
        $home_file =$this->upload_file($home_img);
        //====================help_marriage==============//
        $family_card ='family_card';
        $family_card_file =$this->upload_file($family_card);
        $marriage_contract ='marriage_contract';
        $marriage_contract_file =$this->upload_file($marriage_contract);
        $identity_img ='identity_img';
        $identity_img_file =$this->upload_file($identity_img);
        $personal_picture ='personal_picture';
        $personal_picture_file =$this->upload_file($personal_picture);
        $hall_contract ='hall_contract';
        $hall_contract_file =$this->upload_file($hall_contract);
        $definition_of_salary ='definition_of_salary';
        $definition_of_salary_file =$this->upload_file($definition_of_salary);
        $imam_recommendation ='imam_recommendation';
        $imam_recommendation_file =$this->upload_file($imam_recommendation);
        //==================================//
        $course_employment_cv_file ='course_employment_cv_file';
        $course_employment_cv_file =$this->upload_file($course_employment_cv_file);
        $course_employment_qualification_file ='course_employment_qualification_file';
        $course_employment_qualification_file =$this->upload_file($course_employment_qualification_file);
        //==================================//
        $this->Service->insert($mother_national_id_fk,$main_service,$sub_service,$device_file,$proofed_file,$fatora_file,$medicine_device_file,$car_repair_file,$car_num_file,$repair_device_file,$home_file,$family_card_file,$marriage_contract_file,$identity_img_file,$personal_picture_file,$hall_contract_file,$definition_of_salary_file,$imam_recommendation_file,$course_employment_cv_file,$course_employment_qualification_file);
        redirect('family/family_services/');
    }
}
//-----------------------------------------------------
public function service_details($id){
    $this->load->model('Difined_model');
    $this->load->model('family_models/Service');
    $this->load->model('family_models/Mother');
    $this->load->model('Users');
    $this->load->model('family_models/Operation_service');
    $data['check_app'] =$this->Operation_service->getById($id);
   /* if($data['check_app']['approved'] == 4){
      $data['all_operations'] = $this->Operation_service->select_all_operations_except();
    }else {
        $data['all_operations'] = $this->Operation_service->select_all_operations();
    }*/
      $data['all_operations'] = $this->Difined_model->select_search_key('operation_service','order_id_fk',$id);
    $data['get_job_name'] = $this->Operation_service->get_job_name();
    $data['sevice_details'] = $this->Difined_model->getById('all_services_orders',$id);
    $data['get_service_name'] = $this->Service->get_sub_name();
    $data['get_mother'] = $this->Mother->get_mother_name();
    $data['count'] = $this->Service->count_services( $data['sevice_details']['mother_national_id_fk']);
    //==========sections==
    $data['devices'] = $this->Service->select_devices();
    $data['school_requirement'] = $this->Difined_model->select_all('school_requirement','','','id','asc');
    $data['home_repair_type'] = $this->Difined_model->select_all('home_repair_type','','','id','asc');
    //===============
    $user=$this->Users->getBy($_SESSION['role_id_fk']);
    if($user['status'] == 0 ){
        $data['convent']=$this->Difined_model->select_search_key('department_jobs','from_id_fk',$user['from_id_fk']);
    }elseif($user['status'] == 1){
        $condetion_arr=array('from_id_fk >='=> $user['from_id_fk'],'from_id_fk !='=> 0 );
        $data['convent']=$this->Difined_model->slect_where('department_jobs',$condetion_arr,'','','','');
    }
    $data['subview'] = 'admin/services/service_details';
    $this->load->view('admin_index', $data);
}

//--------------------------------------------
public function operation_service($process,$mother_national_num,$id){
    $this->load->model("family_models/Operation_service");
    if($this->input->post('operation_service')){
        $this->Operation_service->insert($process,$mother_national_num,$id);
        redirect('Family/family_services', 'refresh');
    }
}
 /**
 * ===============================================================================================================
 *
 *
 *
 * ===============================================================================================================
 */
    public function certified_services(){
        $this->load->model('family_models/Operation_service');
        $this->load->model('family_models/Service');
        $data['select_all_operations'] = $this->Operation_service->select_all_operations_except();
        $data['all_certified_operations'] = $this->Operation_service->select_all_certified();
        $data['select_id']=$this->Service->select_id();
        $data['service_type']=$this->Service->select_type();
        $data['all'] = $this->Operation_service->select_all();
        if ($this->input->post('valu')){
            $data['id']=$this->input->post('valu');
            $this->load->view('admin/services/get_table',$data);
        }else{
            $data['subview'] = 'admin/services/certified_services';
            $this->load->view('admin_index', $data);
        }

    }
    //====================================certified_services_details
    public function certified_services_details($id){
        $this->load->model('Difined_model');
        $this->load->model('family_models/Service');
        $this->load->model('family_models/Mother');
        $this->load->model('Users');
        $this->load->model('family_models/Operation_service');
        $data['all_operations'] = $this->Operation_service->select_all_operations();
        $data['get_job_name'] = $this->Operation_service->get_job_name();
        $data['sevice_details'] = $this->Difined_model->getById('all_services_orders',$id);
        $data['get_service_name'] = $this->Service->get_sub_name();
        $data['get_mother'] = $this->Mother->get_mother_name();
        $data['count'] = $this->Service->count_services( $data['sevice_details']['mother_national_id_fk']);
        $data['devices'] = $this->Service->select_devices();
        $data['school_requirement'] = $this->Difined_model->select_all('school_requirement','','','id','asc');
        $data['home_repair_type'] = $this->Difined_model->select_all('home_repair_type','','','id','asc');
        $data['subview'] = 'admin/services/certified_services_details';
        $this->load->view('admin_index', $data);
    }
    //=====================================================================
    public function services_archive(){
        $this->load->model('family_models/Operation_service');
        $this->load->model('Difined_model');
        $this->load->model('family_models/Service');
        $data['select_all_operations'] = $this->Operation_service->select_all_operations();
        $data['all_operations'] = $this->Difined_model->select_all('operation_service','','','','');
        $data['select_id']=$this->Service->select_id();
        $data['service_type']=$this->Service->select_type();
        $data['all'] = $this->Operation_service->select_all();
        if ($this->input->post('valu')){
            $data['id']=$this->input->post('valu');
            $this->load->view('admin/services/get_services_archive',$data);
        }else{
            $data['subview'] = 'admin/services/services_archive';
            $this->load->view('admin_index', $data);
        }

    }
    //=====================================================================









 /**
 * ===============================================================================================================
 * 
 * =================================  الاسر المعتمدة =============================================================
 * 
 * ===============================================================================================================
 */ 
 public function approved_family(){
     $this->load->model("Difined_model");
      $this->load->model("family_models/Register");
      $this->load->model("family_models/Operations");
      $this->load->model("Users");
        $data['all_family']=$this->Register->family(1);
        $data['jobs_name']=$this->Users->jobs_id();
        $data['last_state']=$this->Operations->last_statues();
        $data['subview'] = 'admin/family/approved_family';
        $this->load->view('admin_index', $data);
 }

  /**
 * ===============================================================================================================
 * 
 * =================================  ارشيف الاسر ================================================================
 * 
 * ===============================================================================================================
 */ 
  public function archives_family(){
     $this->load->model("Difined_model");
      $this->load->model("family_models/Register");
      $this->load->model("family_models/Operations");
      $this->load->model("Users");
        $data['all_family']=$this->Register->all_archive();
        $data['jobs_name']=$this->Users->jobs_id();
        $data['last_state']=$this->Operations->last_statues();
        $data['subview'] = 'admin/family/archives_family';
        $this->load->view('admin_index', $data);
 }
 
 
 
 
 
 public function R_family_situations(){
    $this->load->model("family_models/Mother");
    $this->load->model('Difined_model');
    $this->load->model("Users");
    $this->load->model("family_models/Register");
    $this->load->model("family_models/Operations");
    $this->load->model("Users");
    $data['last_state']=$this->Operations->last_statues();
    $data['get_name'] =  $this->Mother->get_mother_name();
    $data['jobs_name']=$this->Users->jobs_id();
   // $Conditions_arr =array('family_file_to'=>$_SESSION['dep_job_id_fk'] ,'process !='=>4);
    //$data['all_records'] =  $this->Difined_model->slect_where('operation_table',$Conditions_arr,'mother_national_num_fk','mother_national_num_fk','id','desc');
    
    
    $data['all_records'] =  $this->Operations->select();
    $data['subview'] = 'admin/family/R_family';
    $this->load->view('admin_index', $data);

}
/*****************************************************************************************/
 public function add_responsible_account($mother_num) // family_controllers/Family/add_responsible_account
    {
        $this->load->model("familys_models/Responsible_account");
        $this->load->model("Difined_model");

        if($this->input->post('add'))
        {
            $this->Responsible_account->insert($mother_num);
            $this->message('success','�� ����� ������ ����� ������ �����');
           redirect('family_controllers/Family/add_responsible_account/'.$mother_num);
        }

        $data['name']= $this->Responsible_account->get_mother_data($mother_num);
        $data['f_members']= $this->Responsible_account->get_mother_f_members($mother_num);
        $data["relationships"]=$this->Difined_model->select_search_key('family_setting','type',34);
        $data['banks'] = $this->Difined_model->select_all('banks_settings','','',"id","asc");
        $data['records']=$this->Responsible_account->get_all();

        $data['header_title']="����� ����� ������";
        $data['title']="����� ����� ������";
        $data['subview'] = 'admin/familys_views/responsible_account';
        $this->load->view('admin_index', $data);
    }
    public function edit_account($mother_num)
    {
        $this->load->model("familys_models/Responsible_account");


        $this->Responsible_account->update_account();
        redirect('family_controllers/Family/add_responsible_account/'.$mother_num);

      // $this->Responsible_account->update_account($valu,$id);
    }
    public function delete_from_table($id,$mother_num)
    {
        $this->load->model("familys_models/Responsible_account");
        $this->Responsible_account-> delete_record_db($id);
        redirect('family_controllers/Family/add_responsible_account/'.$mother_num);
    }

    public function get_person_data()
    {
        $this->load->model("familys_models/Responsible_account");
        $data3=$this->Responsible_account->get_data_person();

        $data3=json_encode($data3);

        print_r($data3);
    }
 public function make_active()
 {
     $this->load->model("familys_models/Responsible_account");

  $this->Responsible_account->edit_active();
     if($this->input->post('valu')==1) {
         echo "�� ����� ������";
     }else{
         echo "�� ����� ����� ������";
     }
 }
 
 /***********************************************************************/
 
  public function all_test() // family_controllers/Family/all_test
    {
        $this->load->model("familys_models/ALLtest");
       $this->load->model("Difined_model");
       $this->load->model("familys_models/Register");
   
   
       $data['file_status']=$this->Register->get_all_files_status();
       $data['reasons_types']=$this->Difined_model->select_search_key('family_reasons_settings',"type",1);

       // $data['records'] = $this->ALLtest->select_data_basic_accepted();
          $data['records'] = $this->ALLtest->gggg();

        $data['subview'] = 'admin/familys_views/all_test';
        $this->load->view('admin_index', $data);
    }
 
  public function all_test_2() // family_controllers/Family/all_test
    {

  $this->load->model("familys_models/Register");
  $this->load->model("Difined_model");


$data['reasons_types']=$this->Difined_model->select_search_key('family_reasons_settings',"type",1);


         $this->load->model('Model_transformation_process');
        $data["select_process_procedures"]=$this->Model_transformation_process->select_process_procedures();
        $data["select_user"]=$this->Model_transformation_process->select_user();
        $data['all_lagna_to']=  $this->Difined_model->select_all("lagna","","","","");

      $data['employees'] = $this->Difined_model->select_all('employees','','',"id","asc");  
      $data['all_options']=$this->Register->get_from_files_option_updates();
      $data['file_status']=$this->Register->get_all_files_status();
      $data['banks'] = $this->Difined_model->select_all('banks_settings','','',"id","asc");
      $data['file_num']=$this->Register->get_file_num();
      
      


                     $data['records'] = $this->Register->select_data_basic_accepted();

                   

          $data['title'] = '���� ������� ���� ��� �������� ';
            $data['metakeyword'] = '���� ������� ���� ��� ��������';
            $data['metadiscription'] = '';

        $data['subview'] = 'admin/familys_views/all_test2';
        $this->load->view('admin_index', $data);
    }

/****************************************************/



 public function r_cc(){

   $this->load->model("familys_models/ALLtest");



    $data['subview'] = 'admin/family/ccount';
    $this->load->view('admin_index', $data);

}

 public function app(){

   $this->load->model("familys_models/ALLtest");

    $data['all_data'] =$this->ALLtest->gggg();
   
    $data['subview'] = 'admin/family/app';
    $this->load->view('admin_index', $data);

}


 
 public function xyzz()
 {
            $this->load->model("familys_models/ALLtest");
      //  $customer = $this->ALLtest->get_all();
        $data['customer'] = $this->ALLtest->get_gggg();


    $data['subview'] = 'admin/family/app_test';
    $this->load->view('admin_index', $data);


        
        
}
public function xyz()
    {
       $data['customer_js'] = $this->load->view('admin/family/app_js', '', TRUE);
        $this->load->view('admin/family/app', $data);
    }
    
     public function data()
    {
           $this->load->model("familys_models/ALLtest");
      //  $customer = $this->ALLtest->get_all();
        $customer = $this->ALLtest->get_gggg();
       
       /*
       echo '<pre>';
       print_r($customer);
        echo '<pre>';*/
      // die;
        $arr = array();
        $arr['data'] = array();
        if(!empty($customer)){
            $x = 0;
            foreach($customer as $row){ 
                $x++;
                if($row['file_update_date'] == 0 ){
                     if($row['file_status'] == 3 || $row['file_status'] == 4 ){ 
                     $file_update_date = 'الملف موقوف';
                     $file_update_date_class = 'danger'; 
                     }else{
                     $file_update_date = 'تحديث الملف';
                     $file_update_date_class = 'info'; 
                     }
                    
                
                     
                     
                     
                }else{
                    $file_update_date = $row['file_update_date']; 
                     $file_update_date_class = 'add'; 
                }
                
                
                  if($row['file_status'] == 1 ){
                   $file_status = 'نشط كليا';
                  // $file_colors = '#00ff00';
                    $file_colors = '#15bf00';
                }elseif($row['file_status'] == 2 ){
                    $file_status = 'نشط جزئيا';
                      $file_colors = '#00d9d9';
                }elseif($row['file_status'] == 3 ){
                    $file_status = 'موقوف مؤقتا';  
                      $file_colors = '#ffff00';
                }elseif($row['file_status'] == 4 ){
                    $file_status = 'موقوف نهائيا'; 
                      $file_colors = '#ff0000'; 
                }elseif($row['file_status'] == 0){
                      $file_status = 'جـــــــــاري'; 
                      $file_colors = '#62d0f1'; 
                }
                
                
                
                    if($row['mother_name'] != '' and $row['mother_name'] != null){
                    
                   $mother_name = $row['mother_name'];
                  }elseif($row['mother_name'] == ''){
                       $mother_name = $row['full_name_order'];
                    
                  }else{
                  $mother_name= '<span class="label label-pill label-danger m-r-15">إستكمل البيانات</span>';
                  }
                  
        
        
         if(!empty($row['nasebElfard'])){
                    $color ='';
                    if(!empty($row['nasebElfard']['f2a']->color)){
                        $color =$row['nasebElfard']['f2a']->color;
                    }

                    $title ='';
                    if(!empty($row['nasebElfard']['f2a']->title)){
                        $title =$row['nasebElfard']['f2a']->title;
                    }


                    $Fe2z_name =
                        '<span title="نصيب الفرد = '.round($row['nasebElfard']['naseb']).'ريال" class="label label-pill
                         "  style="color:black ;border-radius: 4px;vertical-align: middle;padding-top: 5px;
                           font-size: 14px; background-color:'.$color.'" >
                      '.$title.'</span>';
                    $naseb_elfard =  '<span class="label label-pill label-info " style="color: black"  >'.round($row['nasebElfard']['naseb']).'</span>';
                }else{
                    $Fe2z_name = '<span title=" ريال 0 " class="label label-pill " style="color:black ; 
                    border-radius: 4px;vertical-align: middle;padding-top: 5px; font-size: 14px;
                    background-color:#62bd0f">أ</span>';
                }

                  
                  
                  
                  
                  
               /*   if($row['mother_name'] != '' and $row['mother_name'] != null){
                    
                   $mother_name = $row['mother_name'];
                  }else{
                  $mother_name= '<span class="label label-pill label-danger m-r-15">إستكمل البيانات</span>';
                  }*/
                
                
                /*  if($row['mother_new_card'] != '' and $row['mother_new_card'] != null){
                    $mother_new_card = $row['mother_new_card'];
                  }else{
                  $mother_new_card= '<span class="label label-pill label-danger m-r-15">إستكمل البيانات</span>';
                  }*/
                      if($row['mother_new_card'] != '' and $row['mother_new_card'] != null){
                    $mother_new_card = $row['mother_new_card'];
                  }elseif($row['mother_new_card'] == '' and $row['id'] >= 852 ){
                    $mother_new_card = $row['mother_national_num']; 
                    
                  }else{
                  $mother_new_card= '<span class="label label-pill label-danger m-r-15">إستكمل البيانات</span>';
                  }
                  
                  
                
                
                   if($row['father_full_name'] != '' and $row['father_full_name'] != null){
                    $father_full_name = $row['father_full_name'];
                  }else{
                  $father_full_name= '<span class="label label-pill label-danger m-r-15">إستكمل البيانات</span>';
                  }  
                
                  if($row['father_national_num'] != '' and $row['father_national_num'] != null){
                    $father_national_num = $row['father_national_num'];
                  }else{
                  $father_national_num = '<span class="label label-pill label-danger m-r-15">إستكمل البيانات</span>';
                  }
                
                
                
                
                $arr['data'][] = array(
              /*  if($row['file_update_date'] == 0 ){
                    echo '0';
                }*/
                
                    $x,
                    $row['file_num'],
                    $father_full_name,   
                   $father_national_num,
                    
                     $mother_name,
                    $mother_new_card,
                     '
                 
    
     <a target="_blank" href="'.base_url().'family_controllers/Family/father/'.$row['mother_national_num'].'" 
        class="btn btn-sm btn-warning"> <i class="fa fa-pencil-square " aria-hidden="true"></i> تعديل</a>

    
     <a target="_blank" href="'.base_url().'family_controllers/Family_details/details/'.$row['mother_national_num'].'" class="btn btn-sm btn-success"> <i class="hvr-buzz-out fa fa-recycle" aria-hidden="true">
             </i> إجراءات</a>
             
             
  <a href="'.base_url().'family_controllers/Family_details/print_family/'.$row['mother_national_num'].'" target="_blank">
                                                <i class="fa fa-print" aria-hidden="true"></i> </a>
                                                
  <a href="'.base_url().'family_controllers/Family_details/print_card/'.$row['mother_national_num'].'" target="_blank">
<i style="background-color: #0a568c" class="fa fa-print" aria-hidden="true"></i> </a>             
             
             
<a data-toggle="modal" data-target="#sarfModal" class="btn btn-xs btn-info" style="padding:1px 5px;" onclick="load_sarf_details('.$row['mother_national_num'].');">
    <i class="fa fa-money" aria-hidden="true"></i>
   </a>                   
  
   
  ',
  '
  <button style="color:#fff ;width:80px; background-color:'.$file_colors.'  " 
         data-toggle="modal" data-target="#modal-info" class="btn btn-sm" >
       '.$file_status.'</button>
  ',
  
  
  $Fe2z_name 
  
  
  ,'
  <button data-toggle="modal" data-target="#modal-update690" class="btn btn-sm btn-'.$file_update_date_class.'">
       
        
         '.$file_update_date.'
        

</button>
  ','
  
waiting
  
  '

                     
                );
            }
        }
        $json = json_encode($arr);
        echo $json;
    }
    
/***********************************************************************/

/*
public function connection()
    {
      $data['member_js'] = $this->load->view('admin/family/connection_js', '', TRUE);
      $this->load->view('admin/family/connection', $data);
    }

    public function getConnection()
    {
      $this->load->model("familys_models/Connection_model");
      $members = $this->Connection_model->getMembers(array('f_members.id!='=>0));
      $arr = array();
      $arr['data'] = array();
      $cuttent_higry_year = $this->current_hjri_year();
      if(!empty($members)){
        foreach($members as $row){ 
          $type = 'ذكر';
          if ($row['member_gender'] == 2) {
            $type = 'أنثى';
          }
          $category = 'يتيم';
          if ($row['categoriey_member'] == 3) {
            $category = 'مستفيد بالغ';
          }
          $arr['data'][] = array(
              '<input type="radio" name="choosed" value="'.$row['id'].'" onclick="getMemberData($(this).val())" />',
              $row['file_num'],
              $row['father_name'],   
              $row['member_full_name'],
              $category,
              $type,
              $row['member_birth_date_hijri'],
              $cuttent_higry_year - $row['member_birth_date_hijri_year'],
              '',
              ''
            );
        }
      }
      echo json_encode($arr);
    }

    public function getMemberData()
    {
      $this->load->model("familys_models/Connection_model");
      $data['result'] = $this->Connection_model->getMembers(array('f_members.id'=>$this->input->post('id')))[0];
      $data['cuttent_higry_year'] = $this->current_hjri_year();
      $this->load->view('admin/family/getMemberData', $data);
    }
*/
public function connection()
    {
      $data['member_js'] = $this->load->view('admin/family/connection_js', '', TRUE);
      $this->load->view('admin/family/connection', $data);
    }

    public function getConnection()
    {
      $this->load->model("familys_models/Connection_model");
      $members = $this->Connection_model->getMembers(array('f_members.id!='=>0));
      $arr = array();
      $arr['data'] = array();
      $cuttent_higry_year = $this->current_hjri_year();
      if(!empty($members)){

        foreach($members as $row){ 
          $type = 'ذكر';
          if ($row['member_gender'] == 2) {
            $type = 'أنثى';
          }
          $category = 'يتيم';
          if ($row['categoriey_member'] == 3) {
            $category = 'مستفيد بالغ';
          }
         /* $arr['data'][] = array(
              '<input type="radio" name="choosed" value="'.$row['id'].'" onclick="getMemberData($(this).val())" />',
              $row['file_num'],
              $row['father_name'],   
              $row['member_full_name'],
              $category,
              $type,
              $row['member_birth_date_hijri'],
              $cuttent_higry_year - $row['member_birth_date_hijri_year'],
              '',
              ''
            );*/
            if($row['member_birth_date_hijri_year'] == '' ){
            $member_birth_date_hijri_year =   0 ; 
            }else{
                $member_birth_date_hijri_year = $cuttent_higry_year -  $row['member_birth_date_hijri_year'] ; 
            }
            
            
        $b_date =   $cuttent_higry_year;
            $arr['data'][] = array(
              '<input type="radio" name="choosed" value="'.$row['id'].'" onclick="getMemberData($(this).val())" />',
              $row['file_num'],
              $row['father_name'],   
             $row['member_full_name'],
              $category,
              $type,
             $row['member_birth_date_hijri'],
            $b_date,
             $member_birth_date_hijri_year,
              ''
            );
            
            
        }
      }
      echo json_encode($arr);
    }

    public function getMemberData()
    {
      $this->load->model("familys_models/Connection_model");
      $data['result'] = $this->Connection_model->getMembers(array('f_members.id'=>$this->input->post('id')))[0];
      $data['cuttent_higry_year'] = $this->current_hjri_year();
      $this->load->view('admin/family/getMemberData', $data);
    }








    //    22-4-om
    /*public function get_values()
    {
        $this->load->model('familys_models/Search_family');

        $key = $this->input->post('key');
        switch ($key) {
            case 'file_status':
                $arr = array(array('value' => 1, 'text' => 'نشط كليا '),
                    array('value' => 2, 'text' => 'نشط جزئيا '),
                    array('value' => 3, 'text' => 'موقوف مؤقتا '),
                    array('value' => 4, 'text' => 'موقوف نهائيا '));
                echo json_encode($arr);
                break;
            case 'family_cat':
                $catg = $this->Search_family->get_cat();
                echo json_encode($catg);
                break;
        }
    }*/
     public function get_values()
    {
        $this->load->model('familys_models/Search_family');

        $key = $this->input->post('key');
        switch ($key) {
            case 'file_status':
                $arr = array(array('value' => 1, 'text' => 'نشط كليا '),
                    array('value' => 2, 'text' => 'نشط جزئيا '),
                    array('value' => 3, 'text' => 'موقوف مؤقتا '),
                    array('value' => 4, 'text' => 'موقوف نهائيا '));
                echo json_encode($arr);
                break;
            case 'family_cat':
                $catg = $this->Search_family->get_cat();
                echo json_encode($catg);
                break;
               /* case 'family_sarf':
                 $arr = array(array('value' => 1, 'text' => 'نشط كليا '),
                    array('value' => 2, 'text' => 'نشط جزئيا '),
                    array('value' => 3, 'text' => 'موقوف مؤقتا '),
                    array('value' => 4, 'text' => 'موقوف نهائيا '));
                echo json_encode($arr);
                break;*/
                 case 'family_sarf':
                    $var = $this->Search_family->select_all_bnod();
                    $data['bnod_help']=$var;
                echo json_encode($data);
                break;

        }
    }

    public function search()
    {
        $this->load->model('familys_models/Search_family');

        $search_key = $this->input->post('search_key');
        $key_value = $this->input->post('key_value');
      $key_value2 = $this->input->post('key_value2');  
       $key_valuex = $this->input->post('key_valuex'); 
        

        switch ($search_key) {
            case 'name':
            case 'segel':
                $search_key2 = $this->input->post('search_key2');
                $table_name=explode('.',$search_key2)[0];
                if($table_name == 'wakels'){
                    $search_key2=explode('.',$search_key2)[1];
                    $data['result'] = $this->Search_family->serach_by_wakels($search_key2, $key_value, $table_name);

                }else {
                    $data['result'] = $this->Search_family->serach_by($search_key2, $key_value, $table_name);
                }
                break;
           
                case 'family_sarf':
           // $key_value = $this->input->post('key_value');
           
         //  $data['record']=$this->Search_family->select_last_value_fild($key_value);
             $data['record']=$this->Search_family->select_last_value_fild($key_valuex);
        // $this->test( $data['record']);
            break;
           case 'family_cat':
             //   $data['result'] = $this->Search_family->serach(array($search_key=>$key_value,'file_status'=>$key_value2));
             //   $data['result'] = $this->Search_family->serach('file_status',$key_value2,array($search_key=>$key_value));
$data['result'] = $this->Search_family->serach($search_key,$key_value2,array($search_key=>$key_value));

                break;
                
                 case 'file_status':
             //   $data['result'] = $this->Search_family->serach('file_status',$key_value2,'');
              $data['result'] = $this->Search_family->serach($search_key,$key_value2,'');
                break;
                
            default :
              //  $data['result'] = $this->Search_family->serach(array($search_key=>$key_value));
                $data['result'] = $this->Search_family->serach('','',array($search_key=>$key_value));
                break;
        }

//        $this->test($data['result']);
        $this->load->view('admin/family/saerch_result_view', $data);


    }
   public function load_sarf_details(){

         $this->load->model('Model_transformation_process');
         $mother_num = $this->input->post('mother_num');
         $data['last_sarf']=$this->Model_transformation_process->get_last_sarf($mother_num);
         $data['all_sarf']= $this->Model_transformation_process->get_sarf_details($mother_num);
         $this->load->view('admin/family/load_sarf_details',$data);

    }

}// END CLASS 