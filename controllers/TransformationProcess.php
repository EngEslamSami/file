<?php

class TransformationProcess extends MY_Controller
{
    public function  __construct(){
      parent::__construct();
        $this->load->library('pagination');
        //----------------------------------- 
           if($this->session->userdata('is_logged_in')==0){
                   redirect('login');
              }
        //-----------------------------------      
        $this->load->model('familys_models/for_dash/Counting');  
        $this->count_basic_in  = $this->Counting->get_basic_in_num();
        $this->files_basic_in  = $this->Counting->get_files_basic_in();  
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
private function current_hjri_year(){
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
/**
 *  ================================================================================================================
 *
 *  ================================================================================================================
 *
 *  ================================================================================================================
 */
    public function index(){
        $data['subview'] = 'admin/bar';
        $this->load->view('admin_index', $data);

    }
    public function FamilyTtransformation($id){   //   TransformationProcess/FamilyTtransformation
        $this->load->model('Model_transformation_process');
        if($this->input->post('go') == $id){
           $this->Model_transformation_process->insert_for_family();
         messages('success','تم احالة الملف ');
         redirect('family_controllers/Family/Add_Register_2');
         } 
    }
    //=====================================================
   /* public function TransformationOfDetails($process,$file_id){  //   TransformationProcess/FamilyTtransformation
       $this->load->model('Model_transformation_process');
   //   $this->test($_POST);
        //-------------------- tranfor 
          $this->Model_transformation_process->insert_tran_family($process,$file_id);
        //-------------------- operation 
        if($process  ==5){
            
            
          $this->Model_transformation_process->insert_transformation_lagna($process,$file_id);
        }else{
          $this->Model_transformation_process->insert_operation($process,$file_id);
        }
          $this->Model_transformation_process->update_file_state($file_id,$process);
        
        
         redirect("family_controllers/Family_details/details/".$file_id, 'refresh');
    }*/
   
     public function TransformationOfDetails($process,$file_id){  //   TransformationProcess/FamilyTtransformation
       $this->load->model('Model_transformation_process');

    /*
    echo 'process ='.$process;
    echo '<br/>';
       echo 'file_id ='.$file_id;
    die;*/
    // if($process != 6) {
    if($process  ==5){
       // $this->test($_POST);
        $this->Model_transformation_process->insert_transformation_lagna2($process,$file_id);
    }elseif($process  == 6){
        //update suspend 4 filenum
          $this->Model_transformation_process->update_basic($process,$file_id);
          $this->Model_transformation_process->insert_actions_in_family_files($process,$file_id);
          $this->Model_transformation_process->change_file_setting2($file_id);
        //$this->Model_transformation_process->insert_operation($process,$file_id);
        //$this->Model_transformation_process->change_file_setting($file_id);
    }elseif( $process == 4){
          $this->Model_transformation_process->update_basic($process,$file_id);
          $this->Model_transformation_process->insert_actions_in_family_files($process,$file_id);
           $this->Model_transformation_process->update_basic_files_update_dates($process,$file_id);
          
          
        
    }elseif($process  ==1  || $process == 2){
        
        $this->Model_transformation_process->update_basic($process,$file_id);
        $this->Model_transformation_process->insert_actions_in_family_files($process,$file_id);
        
     //   $this->Model_transformation_process->insert_operation($process,$file_id);
    }else{
        $this->Model_transformation_process->insert_tran_family($process,$file_id);
        $this->Model_transformation_process->insert_operation($process,$file_id);
          $this->Model_transformation_process->insert_actions_in_family_files($process,$file_id);
      
    }
    //}
    /* if($process == 6) {
      $this->load->model('familys_models/Family_visitors');
      $this->Family_visitors->insert($file_id);
    }*/

    $this->Model_transformation_process->update_file_state($file_id,$process);
    redirect("family_controllers/Family_details/details/".$file_id, 'refresh');
    }
    
    
    
    
    //=====================================================
    public function TransformationOfRegester($process,$file_id){
         $this->load->model('Model_transformation_process');
        //-------------------- tranfor 
          $this->Model_transformation_process->insert_tran_family($process,$file_id);
        //-------------------- operation 
        if($process  ==5){
          $this->Model_transformation_process->insert_transformation_lagna($process,$file_id);
        }else{
          $this->Model_transformation_process->insert_operation($process,$file_id);
        }
          $this->Model_transformation_process->update_file_state($file_id,$process);
        
         redirect('family_controllers/Family/Add_Register_2');
         
    }
    //===========================================================
      public function TransformationOfProfile($process,$file_id,$transform_id){
         $this->load->model('Model_transformation_process');
         $this->load->model('familys_models/person_profile/Model_user_mession');
        //-------------------- tranfor 
          $this->Model_transformation_process->insert_tran_family($process,$file_id);
        //-------------------- operation 
        if($process  ==5){
          $this->Model_transformation_process->insert_transformation_lagna($process,$file_id);
        }else{
          $this->Model_transformation_process->insert_operation($process,$file_id);
        }
          $this->Model_transformation_process->update_file_state($file_id,$process);
          $this->Model_user_mession->update_action(1 ,$transform_id);
         redirect('family_controllers/PersonProfile/person_profile');
         
    }
  
    /**************************************************************************/
    
       public function TransformationOfRegesterNew($process,$file_id){
        $this->load->model('Model_transformation_process');
        //-------------------- tranfor 
        $this->Model_transformation_process->insert_tran_family($process,$file_id);
        //-------------------- operation 
        
        $this->Model_transformation_process->insert_operation($process,$file_id);
        
        $this->Model_transformation_process->update_file_state($file_id,$process);

        redirect('family_controllers/Family/AddNewRegister');

    }
    
    /**************************************/
    
   public function TransformationOfDetailsSarf($process,$band_id,$surf_num,$bnod_help_fk){  //   TransformationProcess/TransformationOfDetailsSarf
        $this->load->model('Model_transformation_process');

        if($process  ==5){
            $this->Model_transformation_process->insert_transformation_lagna2Sarf($process,$band_id,$surf_num,$bnod_help_fk);
        }

        redirect("family_controllers/FamilyCashing", 'refresh');
    }



    //16-2-2019
    public function Transformation_edit($file_id){


        $this->load->model('Model_transformation_process');
//
        $this->Model_transformation_process->update_transformation_lagna($file_id);
       $data['members']= $this->Model_transformation_process->get_session_member($file_id);



        redirect("family_controllers/LagnaSetting/GetLagnaDesicion/".$_POST['session_num'], 'refresh');
        //echo "<pre>";
       // print_r($_POST);
       // echo "</pre>";
        //echo $file_id;
    }




//16-2-2019
    public function Transformation_Delete($file_id){

        $this->load->model('Model_transformation_process');

        $this->Model_transformation_process->Transformation_Delete($file_id);
        redirect("family_controllers/LagnaSetting/GetLagnaDesicion/".$_POST['session_num'], 'refresh');


     }


 public function Transformation_edit_ID($file_id){
        $this->load->model('Model_transformation_process');
        $this->Model_transformation_process->update_transformation_lagna_band($file_id);
        redirect("family_controllers/LagnaSetting/GetLagnaDesicion/".$_POST['session_num'], 'refresh');

    }




    public function Transformation_Delete_ID($file_id){

        $this->load->model('Model_transformation_process');

        $this->Model_transformation_process->Transformation_Delete_band($file_id);
        redirect("family_controllers/LagnaSetting/GetLagnaDesicion/".$_POST['session_num'], 'refresh');


    }


}// END CLASS