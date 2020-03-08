<?php
class Family extends MY_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->library('pagination');
   if($this->session->userdata('is_logged_in')==0){
           redirect('login');
      }
      
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
//--------------------------------------------------
    private  function test($data=array()){
              echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }



    private function message($type, $text)
    {
        if ($type == 'success') {
            return $this->session->set_flashdata('message', '<script> swal({
                    type:"success",
                    title:"' . $text . '" ,
                    confirmButtonText: "تم"
                })</script>');
        } elseif ($type == 'wiring') {
            return $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissable">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <strong> ' . $text . ' !</strong> .
                                                </div>');
        } elseif ($type == 'error') {
            return $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <strong>' . $text . '!</strong> .
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
    private  function upload_image($file_name ,$folder = "images"){
    $config['upload_path'] = 'uploads/'.$folder;
    $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf';
   // $config['max_size']    = '1024*8';
      $config['max_size']    = '80000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000';
    
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
    
    
 private  function upload_all_files($file_name ,$folder = "images"){
    $config['upload_path'] = 'uploads/'.$folder;
    $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
    $config['max_size']    = '80000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000';
    $config['encrypt_name']=true;
    $this->load->library('upload',$config);
    if(! $this->upload->do_upload($file_name)){
        return  false;
    }else{
        $datafile = $this->upload->data();
        return  $datafile['file_name'];
    }
}   
  
  public function read_attached_file($file_name)
{
    $this->load->helper('file');
    $file_path = 'uploads/family_attached/' . $file_name;
    header('Content-Type: application/pdf');
    header('Content-Discription:inline; filename="' . $file_name . '"');
    header('Content-Transfer-Encoding: binary');
    header('Accept-Ranges:bytes');
    header('Content-Length: ' . filesize($file_path));
    readfile($file_path);
}  
    
//-------------------------------------------------
    private function url (){
     unset($_SESSION['url']);
        $this->session->set_flashdata('url','http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
    }
//-----------------------------------------

 //-----------------------------------------
/**
 *  ================================================================================================================
 *
 *  ================================================================================================================
 *
 *  ================================================================================================================
 */



    public function  index(){    // family_controllers/Family

    }


    private function cheek_link($last_id){
     $this->load->model('Difined_model');
     $key=$last_id;
     $arr_in=array("mother_national_num_fk"=>$key);
     $cheek_value["father"]=$this->Difined_model->getByArray("father",$arr_in);
     $cheek_value["f_members"]=$this->Difined_model->getByArray("f_members",$arr_in);
     $cheek_value["houses"]=$this->Difined_model->getByArray("houses",$arr_in);
     $cheek_value["mother"]=$this->Difined_model->getByArray("mother",$arr_in);
     $cheek_value["financial"]=$this->Difined_model->getByArray("financial",$arr_in);
     $cheek_value["devices"]=$this->Difined_model->getByArray("devices",$arr_in);
     $cheek_value["family_attach_files"]=$this->Difined_model->getByArray("family_attach_files",$arr_in);
    return $cheek_value;

  }
  
  private function basic_family_data($mother_num_fk){
    $this->load->model("familys_models/Register");
    $basic_data=$this->Register->get_basic_mother_num($mother_num_fk);
    return $basic_data;
  }
  


     public function read_instructions(){ // family_controllers/Family/read_instructions
    $this->load->model("familys_models/Register");
    if($this->input->post('add_register')){
         messages('success','تم إضافة اسرة جدبدة');
           redirect('family_controllers/Family/Add_Register');
    }
      $last_m= $this->Register->select_last_mother();
      $last_id= $this->Register->select_last_id();
      $data['all_links']=$this->cheek_link($last_m);
      $data['dataa'] = $this->Register->get_by_id($last_id);

      $data['basic_active']=1;
      $data['title']='البيانات الاساسية';
      $data['subview'] = 'admin/familys_views/basic';
      $this->load->view('admin_index', $data);
   }

    /**
     * ===================================================
     * ===================================================
     * ================ البيانات الاساسية ================
     * ===================================================
     * ===================================================
     * ***/

    
public function  money(){ // family_controllers/Family/money
    $this->load->model('familys_models/Money');
    $this->load->model('Difined_model');
     $this->load->model("familys_models/Family_members");
     
     $this->load->model("familys_models/Register");
     $data['employees'] = $this->Register->select_all_employee();
    //----------------------
    if($this->input->post('add')){
        $this->Money->insert($this->uri->segment(4));
          $this->Money->update_basic_data($this->uri->segment(4));
          $this->Money->insert_family_cat($this->uri->segment(4));
        messages('success','إضافة مصادر الدخل والإلتزامات');
        redirect('family_controllers/Family/Add_Register_2');
    }
    //----------------------
    if($this->input->post('update')){
        $this->Money->update($this->uri->segment(4));
          $this->Money->update_basic_data($this->uri->segment(4));
          $this->Money->insert_family_cat($this->uri->segment(4));
        messages('success','تعديل مصادر الدخل والإلتزامات');
        redirect('family_controllers/Family/money/'.$this->uri->segment(4));
    }
    $data['mothers_data']=$this->Difined_model->select_search_key('mother',"mother_national_num_fk ",$this->uri->segment(4));
    $data["father_national_card"]=$this->Family_members->get_father_national_card($this->uri->segment(4));
    $data["father_name"]=$this->Family_members->get_father_name($this->uri->segment(4));
    $data["basic_data_family"]=$this->basic_family_data($this->uri->segment(4));

    $data["all_records"]=$this->Money->getArray($this->uri->segment(4));
    $data["income_sources"]=$this->Difined_model->select_search_key('family_setting','type',42);
    $data["monthly_duties"]=$this->Difined_model->select_search_key('family_setting','type',43);
    $data['header_title']='مصادر الدخل والإلتزامات';
    $data['subview'] = 'admin/familys_views/money';
    $this->load->view('admin_index', $data);
}    
     
 	 public function Add_Register_2(){ // family_controllers/Family/Add_Register
         //socity_branch
     $this->load->model("familys_models/Register");
     $this->load->model("Difined_model");
     $this->load->model('familys_models/Mother');
     $this->load->model('familys_models/Model_area_sitting');
     $data['house_own']=  $this->Mother->get_from_family_setting(13);
     $data['all_city'] = $this->Model_area_sitting->select_type(3);
     if($this->input->post('register') == 'register' ){
      //  $this->test($_POST);
       $this->Register->inserted_reg();
        redirect('family_controllers/Family/Add_Register_2');
        
     }elseif($this->input->post('register') == 'register_wakel' ){
       //  $this->test($_POST);
        $this->Register->inserted_reg_wakel();
          redirect('family_controllers/Family/Add_Register_2');
     }
     
   
     
     $data['adminastration'] = $this->Difined_model->select_search_key("department_jobs", "from_id_fk", "0");
     if($this->input->post('mother_national_num_chik')){
        $arr["in"]=$this->Difined_model->select_search_key('basic','mother_national_num',$this->input->post('mother_national_num_chik'));
        $this->load->view('admin/familys_views/load', $arr);
     }else{
      $data['socity_branch'] = $this->Difined_model->select_all('socity_branch','','',"id","asc");  
     
     // $data['records'] = $this->Register->select_data_basic();
     /* if($_SESSION['role_id_fk'] != 3){
            // $data['records'] = $this->Register->select_data_basic();
            $data['records'] = $this->Register->select_data_basic_order();
            
      }elseif($_SESSION['role_id_fk'] == 3){
           //  $data['records'] = $this->Register->select_data_basic_by_id($_SESSION['emp_code']);
           $data['records'] = $this->Register->select_data_basic_by_id_order($_SESSION['emp_code']);
           
           
      }*/
      
      
       $data['records'] = $this->Register->select_data_basic_order();
      
             /*ahmed*/
      //  $data['banks'] = $this->Difined_model->select_all('banks','','',"id","asc");
        $data["relationships"]=$this->Register->select_relashion(array('type'=>34,"id_setting !="=>41));//select_search_key('family_setting','type',34);
        $data["id_source"]=$this->Difined_model->select_search_key('family_setting','type',12);
        /*ahmed*/
         //-------------------  transformation_process  --------------
         $this->load->model('Model_transformation_process');
        $data["select_process_procedures"]=$this->Model_transformation_process->select_process_procedures();
        $data["select_user"]=$this->Model_transformation_process->select_user();
        $data['all_lagna_to']=  $this->Difined_model->select_all("lagna","","","","");
        //-------------------  transformation_process  --------------
      $data['employees_data'] = $this->Difined_model->select_all('employees','','',"id","asc");  
      $data['all_options']=$this->Register->get_from_files_option_updates();
      $data['file_status']=$this->Register->get_all_files_status();
      $data['banks'] = $this->Difined_model->select_all('banks_settings','','',"id","asc");
      $data['file_num']=$this->Register->get_file_num();
      
           $data["main_attach_files"]=$this->Difined_model->select_search_key('family_setting','type',47);
          
          
          
        $data['national_id_array']=  $this->Difined_model->select_search_key('family_setting','type',1);
         $data['marital_status_array']=  $this->Difined_model->select_search_key('family_setting','type',4);
          
          
          
            
      
      
      $data['title'] = 'إضافة طلب أسرة جديدة';
      $data['metakeyword'] = 'إعدادات البيانات الأساسية';
      $data['metadiscription'] = '';
   //   $data['subview'] = 'admin/familys_views/Add_Register';
    $data['subview'] = 'admin/familys_views/new_registaration';
   
      $this->load->view('admin_index', $data);
     }
     
     
     }
  /*******************************************************/
  public function GetArea(){
       if($this->input->post('get_sub_id') ){
          $this->load->model('familys_models/Model_area_sitting');
          $id =$this->input->post('get_sub_id');
          $data["records_row"]=$this->Model_area_sitting->select_places($id);
           $this->load->view('admin/familys_views/area_sitting/load_places',$data);
         //  json_encode($data["records_row"]);
       }
  }
 /*****************************************/
 
 
     private function upload_muli_image($input_name,$folder = "images"){
        $filesCount = count($_FILES[$input_name]['name']);
        for($i = 0; $i < $filesCount; $i++){
            $_FILES['userFile']['name'] = $_FILES[$input_name]['name'][$i];
            $_FILES['userFile']['type'] = $_FILES[$input_name]['type'][$i];
            $_FILES['userFile']['tmp_name'] = $_FILES[$input_name]['tmp_name'][$i];
            $_FILES['userFile']['error'] = $_FILES[$input_name]['error'][$i];
            $_FILES['userFile']['size'] = $_FILES[$input_name]['size'][$i];
           // $all_img[]=$this->upload_image("userFile",$folder);
           $all_img[]=$this->upload_all_files("userFile",$folder);
        }
        return $all_img;
    }


    public  function InsertRegister(){
        $this->load->model("familys_models/Register");
        if($this->input->post('ADD') == 'ADD' ){
            $this->Register->insert_new_register();
          //   $all_img= $this->upload_muli_image("attach_files","registers_files");
           $all_img= $this->upload_muli_image("attach_files","family_attached");
          
          $mother_national_num =$this->input->post('mother_national_num');
            $this->Register->insert_new_register_files($all_img,$mother_national_num);
            redirect('family_controllers/Family/Add_Register_2');
        }
    }

    public  function CheckNationalNum(){   //family_controllers/Family/CheckNationalNum
        $this->load->model("familys_models/Register");
        $mother_national_num =$this->input->post('chek_mother_national_num');
        echo $this->Register->check_national_num($mother_national_num);

    }
    public function UpdateRegister($id){
        $this->load->model("familys_models/Register");
        $this->load->model("Difined_model");
         $this->load->model('familys_models/Model_area_sitting');
                $this->load->model('familys_models/Mother');

        
        
        if($this->input->post('UPDTATE') == 'UPDTATE' ){
           // $this->Register->update_new_register($id);
           $mother_national_num =$this->input->post('mother_national_num');
            $this->Register->update_new_register($id,$mother_national_num);
            if($this->input->post('attach_files_ids')){
           // $all_img= $this->upload_muli_image("attach_files","registers_files");
             $all_img= $this->upload_muli_image("attach_files","family_attached");
            $mother_national_num =$this->input->post('mother_national_num');
            $this->Register->insert_new_register_files($all_img,$mother_national_num);
            }
            redirect('family_controllers/Family/Add_Register_2');
        }
        
        
        
        $data['house_own']=  $this->Mother->get_from_family_setting(13);
        $data["relationships"]=$this->Difined_model->select_search_key('family_setting','type',34);
        $data['socity_branch'] = $this->Difined_model->select_all('socity_branch','','',"id","asc");
        $data_result=$data['result'] = $this->Register->get_by_id_regester($id);
        $data["files_attached"]=$this->Register->get_files_mother($data_result["mother_national_num"]);
        
        $data['all_city'] = $this->Model_area_sitting->select_type(3);
        $data["all_district"]=$this->Model_area_sitting->select_places($data_result["center_id_fk"]);
      //  $this->test($data["files_attached"]);
        $data["main_attach_files"]=$this->Difined_model->select_search_key('family_setting','type',47);
        
            $data['national_id_array']=  $this->Difined_model->select_search_key('family_setting','type',1);
         $data['marital_status_array']=  $this->Difined_model->select_search_key('family_setting','type',4);
        
        
        
        
        $data['title']='تعديل بيانات طلب أسرة جديدة';
        $data['subview'] = 'admin/familys_views/new_registaration';
        $this->load->view('admin_index', $data);
    }
    public function DeleteFileRegister($id,$basic_id){
        $this->load->model("familys_models/Register");
        $this->Register->delete_file($id);
        redirect('family_controllers/Family/UpdateRegister/'.$basic_id);
    }
    
 /*	 public function Add_Register_2(){ // family_controllers/Family/Add_Register
         //socity_branch
     $this->load->model("familys_models/Register");
     $this->load->model("Difined_model");
     $this->load->model('familys_models/Mother');
     $this->load->model('familys_models/Model_area_sitting');
     $data['house_own']=  $this->Mother->get_from_family_setting(13);
     $data['all_city'] = $this->Model_area_sitting->select_type(3);
     if($this->input->post('register') == 'register' ){
      //  $this->test($_POST);
       $this->Register->inserted_reg();
        redirect('family_controllers/Family/Add_Register_2');
        
     }elseif($this->input->post('register') == 'register_wakel' ){
       //  $this->test($_POST);
        $this->Register->inserted_reg_wakel();
          redirect('family_controllers/Family/Add_Register_2');
     }
     
     
     
     $data['adminastration'] = $this->Difined_model->select_search_key("department_jobs", "from_id_fk", "0");
     if($this->input->post('mother_national_num_chik')){
        $arr["in"]=$this->Difined_model->select_search_key('basic','mother_national_num',$this->input->post('mother_national_num_chik'));
        $this->load->view('admin/familys_views/load', $arr);
     }else{
      $data['socity_branch'] = $this->Difined_model->select_all('socity_branch','','',"id","asc");  
     
     // $data['records'] = $this->Register->select_data_basic();
      if($_SESSION['role_id_fk'] != 3){
            // $data['records'] = $this->Register->select_data_basic();
            $data['records'] = $this->Register->select_data_basic_order();
            
      }elseif($_SESSION['role_id_fk'] == 3){
           //  $data['records'] = $this->Register->select_data_basic_by_id($_SESSION['emp_code']);
           $data['records'] = $this->Register->select_data_basic_by_id_order($_SESSION['emp_code']);
           
           
      }
           
      //  $data['banks'] = $this->Difined_model->select_all('banks','','',"id","asc");
        $data["relationships"]=$this->Difined_model->select_search_key('family_setting','type',34);
        $data["id_source"]=$this->Difined_model->select_search_key('family_setting','type',12);
       
         //-------------------  transformation_process  --------------
         $this->load->model('Model_transformation_process');
        $data["select_process_procedures"]=$this->Model_transformation_process->select_process_procedures();
        $data["select_user"]=$this->Model_transformation_process->select_user();
        $data['all_lagna_to']=  $this->Difined_model->select_all("lagna","","","","");
        //-------------------  transformation_process  --------------
      $data['employees_data'] = $this->Difined_model->select_all('employees','','',"id","asc");  
      $data['all_options']=$this->Register->get_from_files_option_updates();
      $data['file_status']=$this->Register->get_all_files_status();
      $data['banks'] = $this->Difined_model->select_all('banks_settings','','',"id","asc");
      $data['file_num']=$this->Register->get_file_num();
      
           $data["main_attach_files"]=$this->Difined_model->select_search_key('family_setting','type',47);
            
      
      
      $data['title'] = 'إضافة طلب أسرة جديدة';
      $data['metakeyword'] = 'إعدادات البيانات الأساسية';
      $data['metadiscription'] = '';
   //   $data['subview'] = 'admin/familys_views/Add_Register';
    $data['subview'] = 'admin/familys_views/new_registaration';
   
      $this->load->view('admin_index', $data);
     }
     
     
     }
  //--------------------------------------------
  public function GetArea(){
       if($this->input->post('get_sub_id') ){
          $this->load->model('familys_models/Model_area_sitting');
          $id =$this->input->post('get_sub_id');
          $data["records_row"]=$this->Model_area_sitting->select_places($id);
           $this->load->view('admin/familys_views/area_sitting/load_places',$data);
         //  json_encode($data["records_row"]);
       }
  }
//--------------------------------------------
 
 
     private function upload_muli_image($input_name,$folder = "images"){
        $filesCount = count($_FILES[$input_name]['name']);
        for($i = 0; $i < $filesCount; $i++){
            $_FILES['userFile']['name'] = $_FILES[$input_name]['name'][$i];
            $_FILES['userFile']['type'] = $_FILES[$input_name]['type'][$i];
            $_FILES['userFile']['tmp_name'] = $_FILES[$input_name]['tmp_name'][$i];
            $_FILES['userFile']['error'] = $_FILES[$input_name]['error'][$i];
            $_FILES['userFile']['size'] = $_FILES[$input_name]['size'][$i];
            $all_img[]=$this->upload_image("userFile",$folder);
        }
        return $all_img;
    }


    public  function InsertRegister(){
        $this->load->model("familys_models/Register");
        if($this->input->post('ADD') == 'ADD' ){
            $this->Register->insert_new_register();
             $all_img= $this->upload_muli_image("attach_files","registers_files");
          $mother_national_num =$this->input->post('mother_national_num');
            $this->Register->insert_new_register_files($all_img,$mother_national_num);
            redirect('family_controllers/Family/Add_Register_2');
        }
    }

    public  function CheckNationalNum(){   //family_controllers/Family/CheckNationalNum
        $this->load->model("familys_models/Register");
        $mother_national_num =$this->input->post('chek_mother_national_num');
        echo $this->Register->check_national_num($mother_national_num);

    }
    public function UpdateRegister($id){
        $this->load->model("familys_models/Register");
        $this->load->model("Difined_model");
         $this->load->model('familys_models/Model_area_sitting');
                $this->load->model('familys_models/Mother');

        
        
        if($this->input->post('UPDTATE') == 'UPDTATE' ){
           // $this->Register->update_new_register($id);
           $mother_national_num =$this->input->post('mother_national_num');
            $this->Register->update_new_register($id,$mother_national_num);
            if($this->input->post('attach_files_ids')){
            $all_img= $this->upload_muli_image("attach_files","registers_files");
            $mother_national_num =$this->input->post('mother_national_num');
            $this->Register->insert_new_register_files($all_img,$mother_national_num);
            }
            redirect('family_controllers/Family/Add_Register_2');
        }
        
        
        
        $data['house_own']=  $this->Mother->get_from_family_setting(13);
        $data["relationships"]=$this->Difined_model->select_search_key('family_setting','type',34);
        $data['socity_branch'] = $this->Difined_model->select_all('socity_branch','','',"id","asc");
        $data_result=$data['result'] = $this->Register->get_by_id_regester($id);
        $data["files_attached"]=$this->Register->get_files_mother($data_result["mother_national_num"]);
        
        $data['all_city'] = $this->Model_area_sitting->select_type(3);
        $data["all_district"]=$this->Model_area_sitting->select_places($data_result["center_id_fk"]);
      //  $this->test($data["files_attached"]);
        $data["main_attach_files"]=$this->Difined_model->select_search_key('family_setting','type',47);
        $data['title']='تعديل بيانات طلب أسرة جديدة';
        $data['subview'] = 'admin/familys_views/new_registaration';
        $this->load->view('admin_index', $data);
    }
    public function DeleteFileRegister($id,$basic_id){
        $this->load->model("familys_models/Register");
        $this->Register->delete_file($id);
        redirect('family_controllers/Family/UpdateRegister/'.$basic_id);
    }

 */
 
 
 
 
 
 
 
 
 
 /*****************************************/
 	 public function All_new_family(){ // family_controllers/Family/All_new_family
           $this->load->model("familys_models/Register");
     $this->load->model("Difined_model");
  
      
              //-------------------  transformation_process  --------------
         $this->load->model('Model_transformation_process');
        $data["select_process_procedures"]=$this->Model_transformation_process->select_process_procedures();
        $data["select_user"]=$this->Model_transformation_process->select_user();
        $data['all_lagna_to']=  $this->Difined_model->select_all("lagna","","","","");
        //-------------------  transformation_process  --------------
      $data['employees'] = $this->Difined_model->select_all('employees','','',"id","asc");  
      $data['all_options']=$this->Register->get_from_files_option_updates();
      $data['file_status']=$this->Register->get_all_files_status();
      $data['banks'] = $this->Difined_model->select_all('banks_settings','','',"id","asc");
      $data['file_num']=$this->Register->get_file_num();
      
      
      
         /*   if($_SESSION['role_id_fk'] != 3){
            // $data['records'] = $this->Register->select_data_basic();
            $data['records'] = $this->Register->select_data_new_family();
            
      }elseif($_SESSION['role_id_fk'] == 3){
           //  $data['records'] = $this->Register->select_data_basic_by_id($_SESSION['emp_code']);
           $data['records'] = $this->Register->select_data_basic_by_id_new_family($_SESSION['emp_code']);
           
           
      }*/
      
        $data['records'] = $this->Register->select_data_new_family();
      $data['title'] = 'الأسر الجديدة ';
      $data['metakeyword'] = 'الأسر الجديدة ';
      $data['metadiscription'] = '';
      $data['subview'] = 'admin/familys_views/all_new_family';
      $this->load->view('admin_index', $data);
      }  
  
  
   
  
  
    public function update_register_2($id){ // family_controllers/Family/basic
     $this->load->model("Difined_model");
    $this->load->model('familys_models/Register');
    if($this->input->post('register')){
        
        
      //  $this->test($_POST);
            $this->Register->updated($id);
             redirect('family_controllers/Family/Add_Register_2');
        }
        
       $data['file_num']=$this->Register->get_file_num();
    $data['all_options']=$this->Register->get_from_files_option_updates();
   
        /*ahmed*/
    $data['banks'] = $this->Difined_model->select_all('banks_settings','','',"id","asc");
    $data["relationships"]=$this->Difined_model->select_search_key('family_setting','type',34);
    $data["id_source"]=$this->Difined_model->select_search_key('family_setting','type',12);
$data['socity_branch'] = $this->Difined_model->select_all('socity_branch','','',"id","asc");  
    /*ahmed*/    
    $data['result'] = $this->Register->get_by_id($id);
    $data['all_links']=$this->cheek_link($data['result']->mother_national_num);
    $data['basic_active']=1;
    $data['title']='تعديل البيانات الاساسية';
    $data['subview'] = 'admin/familys_views/update_register';
    $this->load->view('admin_index', $data);
    }  
    
    
    
    
	 public function Add_Register(){ // family_controllers/Family/Add_Register
    
    //socity_branch
     $this->load->model("familys_models/Register");
     $this->load->model("Difined_model");
     if($this->input->post('register')){
         //  $this->test($_POST);
          $this->Register->inserted();
          redirect('family_controllers/Family/Add_Register');
     }
     if($this->input->post('mother_national_num_chik')){
        $arr["in"]=$this->Difined_model->select_search_key('basic','mother_national_num',$this->input->post('mother_national_num_chik'));
        $this->load->view('admin/familys_views/load', $arr);
     }else{
      $data['socity_branch'] = $this->Difined_model->select_all('socity_branch','','',"id","asc");  
      $data['records'] = $this->Register->select_data_basic();
      
             /*ahmed*/
      //  $data['banks'] = $this->Difined_model->select_all('banks','','',"id","asc");
        $data["relationships"]=$this->Difined_model->select_search_key('family_setting','type',34);
        $data["id_source"]=$this->Difined_model->select_search_key('family_setting','type',12);
        /*ahmed*/
      
          $data['all_options']=$this->Register->get_from_files_option_updates();
     
        $data['file_status']=$this->Register->get_all_files_status();
     
      $data['banks'] = $this->Difined_model->select_all('banks_settings','','',"id","asc");
      $data['file_num']=$this->Register->get_file_num();
      $data['title'] = 'إضافة البيانات الأساسية';
      $data['metakeyword'] = 'إعدادات البيانات الأساسية';
      $data['metadiscription'] = '';
      $data['subview'] = 'admin/familys_views/Add_Register';
      $this->load->view('admin_index', $data);
     }

  }
  
   public function basic(){ // family_controllers/Family/basic
    $this->load->model('familys_models/Register');
    $last_m= $this->Register->select_last_mother();
    $last_id= $this->Register->select_last_id();
    $data['all_links']=$this->cheek_link($last_m);
    $data['dataa'] = $this->Register->get_by_id($last_id);
    $data['users'] = $this->Register->family(1);


    $data['basic_active']=1;
    $data['title']='البيانات الاساسية';
    $data['subview'] = 'admin/familys_views/basic';
    $this->load->view('admin_index', $data);
    }

 public function update_file_status()
    {
        $this->load->model('familys_models/Register');
        $this->Register->update_status();
        redirect('family_controllers/Family/accepted_family_files');


    }
    public function update_file_status_data()
{


    $this->load->model('familys_models/Register');
    $this->Register->update_status();
    echo'
        <script>
         window.history.back();
        </script>';
    // redirect('family_controllers/Family/accepted_family_files');
}
    
    
    public function update_basic($id){ // family_controllers/Family/basic
     $this->load->model("Difined_model");
    $this->load->model('familys_models/Register');
    if($this->input->post('register')){
        
        
      //  $this->test($_POST);
            $this->Register->updated($id);
             redirect('family_controllers/Family/Add_Register_2');
        }
        
       $data['file_num']=$this->Register->get_file_num();
    $data['all_options']=$this->Register->get_from_files_option_updates();
   
        /*ahmed*/
    $data['banks'] = $this->Difined_model->select_all('banks_settings','','',"id","asc");
    $data["relationships"]=$this->Difined_model->select_search_key('family_setting','type',34);
    $data["id_source"]=$this->Difined_model->select_search_key('family_setting','type',12);
$data['socity_branch'] = $this->Difined_model->select_all('socity_branch','','',"id","asc");  
    /*ahmed*/    
    $data['result'] = $this->Register->get_by_id($id);
    $data['all_links']=$this->cheek_link($data['result']->mother_national_num);
    $data['basic_active']=1;
    $data['title']='تعديل البيانات الاساسية';
    $data['subview'] = 'admin/familys_views/Add_Register';
    $this->load->view('admin_index', $data);
    }

    public function delete_basic($id){
       $this->load->model('familys_models/Register');
        $this->Register->delete($id);
        redirect('family_controllers/Family/Add_Register_2');
    }
      public function update_delete_basic($id){
       $this->load->model('familys_models/Register');
        $this->Register->uppdate_delet_basic($id);
        redirect('family_controllers/Family/all_archive_family_files');
    }
    
    
    /////////////// end

        /**
     * ===================================================
     * ===================================================
     * ================ البيانات الأب ================
     * ===================================================
     * ===================================================
     * ***/

      public function  father(){ // family_controllers/Family/father
          $this->load->model('familys_models/Father');
          $this->load->model("familys_models/Register");
          $this->load->model('familys_models/Mother');
           $this->load->model('Difined_model');

  $this->load->model("familys_models/NewRegister");
  $id=$this->uri->segment(4);
  $data['records'] = $this->NewRegister->select_data_basic_order_mostand($id);
  $data["main_attach_files"]=$this->Difined_model->select_search_key('family_setting','type',47);


$this->load->model("familys_models/Register");


$data['employees'] = $this->Register->select_all_employee();

         $data["relationships"]=$this->Difined_model->select_search_key('family_setting','type',34); 
          $data["basic_data_family"]=$this->basic_family_data($this->uri->segment(4));
     
          $data['all_links']=$this->cheek_link($this->uri->segment(4));
         // $this->test($data['all_links']['father']);
         $data['current_year'] =$this->current_hjri_year();
          if($this->input->post('add')){
            
          //  $this->test($_POST);
            
            
              $this->Father->insert($this->uri->segment(4));

              redirect('family_controllers/Family/father/'.$this->uri->segment(4));
          }
          
          $data['nationality']=  $this->Mother->get_from_family_setting(2);
          $data['national_id_array']=  $this->Mother->get_from_family_setting(1);
          $data['job_titles']=  $this->Mother->get_from_family_setting(3);
          $data['arr_deth']=  $this->Mother->get_from_family_setting(25);
              /***************ahmed*/
   
    $data["id_source"]=$this->Difined_model->select_search_key('family_setting','type',12);
    /***************ahmed*/
          
          
          
          
          /*********************ahmed_start**************/
	
	      $data['father_employment_result']=$this->Father->select_data_by_data("father_employment",array('mother_national_num_fk'=>$this->uri->segment(4)));
          $data['father_employees_sons_result']=$this->Father->select_data_by_data("father_employees_sons",array('mother_national_num_fk'=>$this->uri->segment(4)));
          $data['father_special_needs_sons_result']=$this->Father->select_data_by_data("father_special_needs_sons",array('mother_national_num_fk'=>$this->uri->segment(4)));
          $data['father_other_associations_result']=$this->Father->select_data_by_data("father_other_associations",array('mother_national_num_fk'=>$this->uri->segment(4)));
          $data['employment_jobs']=  $this->Mother->get_from_family_setting(64);
          $data['jobs']=  $this->Mother->get_from_family_setting(3);
          $data["diseases"] =$this->Mother->get_from_family_setting(35);
          $data["associations"] =$this->Mother->get_from_family_setting(65);
	
	
	/*********************ahmed_start**************/
          
          $data['mowzfen']=  $this->Father->get_mems($this->uri->segment(4),'f_member_mowazfen');
          $data['eaqa_mems']=  $this->Father->get_mems($this->uri->segment(4),'f_member_special_needs');

          $mem = $this->Father->get_member_mowazf('f_member_mowazfen');
          $data['members_mowzfen']=$this->Father->get_members($this->uri->segment(4),$mem);
          $mem_eqa = $this->Father->get_member_mowazf('f_member_special_needs');
          $data['members_eaqa']=$this->Father->get_members($this->uri->segment(4),$mem_eqa);
          $data['emala']=  $this->Father->get_mems($this->uri->segment(4),'family_emala');
          $data['qm3iat']=  $this->Father->get_mems($this->uri->segment(4),'family_gameiat_help');
          
          
          
        $data['father_active']=1;
        $data['title']='بيانات الأب';
        $data['subview'] = 'admin/familys_views/father';
        $this->load->view('admin_index', $data);
    }
    
    
    
    
      public function  mother(){  // family_controllers/Family/mother

//arr_ed_state
//
        $this->load->model('familys_models/Mother');
        $this->load->model('Difined_model');
        $this->load->model("familys_models/Register");
        $this->load->model('Difined_model_new');



$this->load->model("familys_models/Register");
$data['employees'] = $this->Register->select_all_employee();


        $data['current_year'] =$this->current_hjri_year();

        $data['nationality']=  $this->Mother->get_from_family_setting(2);
        $data['living_place_array']=  $this->Mother->get_from_family_setting(5);
        $data['national_id_array']=  $this->Mother->get_from_family_setting(1);
        $data['health_status_array']=  $this->Mother->get_from_family_setting(6);
       
        $data['job_titles']=  $this->Mother->get_from_family_setting(3);
        $data['education_level_array']=  $this->Register->select_relashion(array("type"=>8,"id_setting !="=>9));
        $data['arr_ed_state']=  $this->Mother->get_from_family_setting(40);
        $data['marital_status_array']=  $this->Mother->get_from_family_setting(4);

        $last_id= $this->Register->select_last_id();
        $data['all_links']=$this->cheek_link($this->uri->segment(4));
        $data['dataa'] = $this->Register->get_by_id($last_id);
        $data['all_field']=$this->Difined_model->get_field('mother');
        $data["basic_data_family"]=$this->basic_family_data($this->uri->segment(4));
        
       
       // $data['nationality']=  $this->Nationality->select();
       
           /***********ahmed*/
$data["person_type"]=$this->Difined_model->select_search_key('family_setting','type',32);
$data["relationships"]=$this->Difined_model->select_search_key('family_setting','type',34);
$data["id_source"]=$this->Difined_model->select_search_key('family_setting','type',12);
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
$data['specialties']=  $this->Mother->get_from_family_setting(45); //osama


    /***********ahmed*/
//$data['basic_table']=$this->Difined_model->select_search_key('basic',"mother_national_num ",$this->uri->segment(4));

//$data['banks'] = $this->Difined_model->select_all('banks','','',"id","asc");

//$data['mother_last_account'] = $this->Difined_model_new->select_last_value_fild('mother','m_account');
//$data['last_account'] = $this->Difined_model_new->select_last_value_fild('f_members','member_account');
    $data['personal_characters']=  $this->Mother->get_from_family_setting(48); 
    $data['relations_with_family']=  $this->Mother->get_from_family_setting(49); 
    $data['member_status']=$this->Register->get_all_files_status(); 
    $data['works_type']=  $this->Mother->get_from_family_setting(50);



             /*********************ahmed_start**************/

          $data['project_names']=  $this->Mother->get_from_family_setting(59);
          $data['project_status']=  $this->Mother->get_from_family_setting(60);
          $data['skills']=  $this->Mother->get_from_family_setting(62);
          $data['dwrat']=  $this->Mother->get_from_family_setting(61);
          $data['haj_omra_geha']=  $this->Mother->get_from_family_setting(63);
          $data["courses_arr"]=$this->Mother->GetCourses_skills(array('mother_national_num_fk'=>$this->uri->segment(4),'type'=>1));
          $data["result_courses"]=$this->Mother->GetCourses_skills_data(array('mother_national_num_fk'=>$this->uri->segment(4),'type'=>1));
          $data["result_skills"]=$this->Mother->GetCourses_skills(array('mother_national_num_fk'=>$this->uri->segment(4),'type'=>2));

          /*********************ahmed_start**************/
       
       
       
        $data['title']='بيانات الأم  ';
        if($this->input->post('add')){
            $this->Mother->insert($this->uri->segment(4));
            redirect('family_controllers/Family/mother/'.$this->uri->segment(4));
        }

  $data['kafala_details']=  $this->Mother->Getkafalat($data['all_links']['mother']['id']);
        $data['subview'] = 'admin/familys_views/mother';
        $this->load->view('admin_index', $data);

    }
    
    
    public function change_course_approved(){
        $this->load->model('familys_models/Mother');
        $this->Mother->change_course_approved();
        echo json_encode($_POST);
    }

/**
 * ===============================================================================================================
 *
 * ===============================================================================================================
 *
 * ===============================================================================================================
 */
    public function family_members($mother_national_num){ 
        //family_controllers/Family/family_members/010007876166
        //health_status_array  member_study_case
        $this->load->model("familys_models/Family_members");
        $this->load->model('Difined_model');
        $this->load->model("familys_models/Register");
        $this->load->model('familys_models/Mother');
        $this->load->model('familys_models/Family_print');
        $this->load->model('Difined_model_new');
        $this->load->model("familys_models/Register");
$data['employees'] = $this->Register->select_all_employee();


            /*********************************ahmed_start*********************************/
        $data['skills']=  $this->Mother->get_from_family_setting(62);
        $data['dwrat']=  $this->Mother->get_from_family_setting(61);
        $data['haj_omra_geha']=  $this->Mother->get_from_family_setting(63);
        $data["courses_arr"]=$this->Mother->GetCourses_skills(array('mother_national_num_fk'=>$this->uri->segment(4),'type'=>1));
        $data["result_courses"]=$this->Mother->GetCourses_skills_data(array('mother_national_num_fk'=>$this->uri->segment(4),'type'=>1));
        $data["result_skills"]=$this->Mother->GetCourses_skills(array('mother_national_num_fk'=>$this->uri->segment(4),'type'=>2));
/***********************************ahmed_start*******************************/
        
        
        
            $data["basic_data_family"]=$this->basic_family_data($mother_national_num);
            $data['father_table']=$this->Difined_model->select_search_key('father',"mother_national_num_fk ",$mother_national_num);
            $data['mothers_data']=$this->Family_members->select_mother_search_key('mother',"mother_national_num_fk ",$mother_national_num);
            $data["cuttent_higry_year"]=$this->current_hjri_year();
            $data['job']=  $this->Mother->get_from_family_setting(3);
            $data['member_data']=$this->Family_members->select_all($mother_national_num);
	     	$data['current_year'] =$this->current_hjri_year();
            $data['data_door_mrakz']=  $this->Mother->get_from_family_setting(46);
        if($this->input->post('add')){
            $member_sechool_img='member_sechool_img';
            $member_birth_card_img='member_birth_card_img';
             $member_photo = 'member_photo';
            $file['member_sechool_img']= $this->upload_image($member_sechool_img);
            $file['member_birth_card_img']= $this->upload_image($member_birth_card_img);
            $file['member_photo'] = $this->upload_image($member_photo);
            $this->Family_members->insert($file,$mother_national_num);
            $this->message('success','تم إضافة البيانات بنجاح');
           $data['basic_data']=$this->Difined_model->select_search_key('basic',"mother_national_num ",$mother_national_num);
              redirect('family_controllers/Family/family_members/'.$mother_national_num.'/'.$data['basic_data'][0]->person_account.'/'.$data['basic_data'][0]->agent_bank_account);
        }
        if($this->input->post('main_stage')){
            $data_load['all_classroom']=$this->Family_members->get_classroom($this->input->post('main_stage'));
            $this->load->view('admin/familys_views/load_class', $data_load);
        }else{
            $data['father_table']=$this->Difined_model->select_search_key('father',"mother_national_num_fk ",$mother_national_num);
            $data['all_stages']=$this->Family_members->get_classroom(0);
            $data['nationalities']=  $this->Mother->get_from_family_setting(2);
            $data['national_num_type']=  $this->Mother->get_from_family_setting(1);
            $data['scocial']=  $this->Mother->get_from_family_setting(4);
            $data['education_type']=  $this->Mother->get_from_family_setting(10);
            $data['member_activity_type_arr']=  $this->Mother->get_from_family_setting(11);
            $data['health_status_array']=  $this->Mother->get_from_family_setting(6);
            $data['member_home_type_arr']=  $this->Mother->get_from_family_setting(5);
            $data['header_title']='بيانات أفراد الاسرة';
            $data['members_active']=1;
            $data['mother_national_num']=$mother_national_num;
            $data['banks'] = $this->Difined_model->select_all('banks_settings','','',"id","asc");  
                    /*************ahmed*/
        $data["person_type"]=$this->Difined_model->select_search_key('family_setting','type',32);
        $data["id_source"]=$this->Difined_model->select_search_key('family_setting','type',12);
        $data["education_level"]=$this->Difined_model->select_search_key('family_setting','type',8);
        $data["stude_case"]=$this->Difined_model->select_search_key('family_setting','type',40);
        $data["academic_achievement_level"]=$this->Difined_model->select_search_key('family_setting','type',39);
        $data["relationships"]=$this->Difined_model->select_search_key('family_setting','type',34);
        $data['women_houses']=$this->Difined_model->select_search_key('family_setting','type',44);
        $data['mother_last_account'] = $this->Mother->getMotherAccount($mother_national_num);
        $data['last_account'] = $this->Mother->getFamilyAccount($mother_national_num);
        $data['person_account_check'] = $this->Mother->getBasicAccount($mother_national_num);
        $data['agent_bank_account_check'] = $this->Mother->getBasicAccount_agent($mother_national_num);
        $data["diseases"]=$this->Difined_model->select_search_key('family_setting','type',35);
        $data["responses"]=$this->Difined_model->select_search_key('family_setting','type',36);
        $data["diseases_status"]=$this->Difined_model->select_search_key('family_setting','type',37);
        $data['personal_characters']=  $this->Mother->get_from_family_setting(48); 
        $data['relations_with_family']=  $this->Mother->get_from_family_setting(49); 
        $data['specialties']=  $this->Mother->get_from_family_setting(45); //osama
        $data['schools']=  $this->Mother->get_from_family_setting(26);
        /*************ahmed*/
        $data["father_national_card"]=$this->Family_members->get_father_national_card($mother_national_num);
        $data['persons_status']=$this->Register->get_all_persons_status();           
        $data['person_type_table']=$this->Family_members->GetAllperson_type($mother_national_num);            
        $data['member_family_status']=$this->Register->get_all_persons_status();  
        /****************/
        $where_cond =array('mother_national_num'=>$mother_national_num);     
        $data['main_family_data'] = $this->Register->select_data_basic_accepted_where_details_member_details($where_cond);
        /****************/
        
   $data['reasons_types']=$this->Difined_model->select_search_key('family_reasons_settings',"type",2);     
        
        
           $data['all_links']=$this->cheek_link($this->uri->segment(4));
            $data['kafala_details']=  $this->Mother->Getkafalat($data['all_links']['mother']['id']);
        
        
        
            $data['subview'] = 'admin/familys_views/family_members';
            $this->load->view('admin_index', $data);
        }// end  if
    } // end fuction
    //================================================================
      public  function  get_school(){
        $this->load->model('familys_models/Mother');
          $data=$_POST;
          $data['schools']=  $this->Mother->get_from_family_setting(26);
          $this->load->view('admin/familys_views/family_members_school', $data);
    }
    //================================================================
    public function update_family_members($mother_national_num,$id){ //family/Family/family_members/010007876166
        $this->load->model("familys_models/Family_members");
        $this->load->model('Difined_model');
        $this->load->model("familys_models/Register");
        $this->load->model('familys_models/Mother');
         $this->load->model('familys_models/Family_print');
            $data["basic_data_family"]=$this->basic_family_data($mother_national_num);
            
            
            /*********************************ahmed_start*********************************/
        $data['skills']=  $this->Mother->get_from_family_setting(62);
        $data['dwrat']=  $this->Mother->get_from_family_setting(61);
        $data['haj_omra_geha']=  $this->Mother->get_from_family_setting(63);
        $data["courses_arr"]=$this->Family_members->GetCourses_skills(array('family_member_id_fk'=>$id,'type'=>1));
        $data["result_courses"]=$this->Family_members->GetCourses_skills_data(array('family_member_id_fk'=>$id,'type'=>1));

        $data["result_skills"]=$this->Family_members->GetCourses_skills(array('family_member_id_fk'=>$id,'type'=>2));
        /*echo "<pre>";
        print_r( $data["result_skills"]);
        echo "</pre>";
        die;*/
        /***********************************ahmed_start*******************************/
            
            $data['personal_characters']=  $this->Mother->get_from_family_setting(48); 
            $data['relations_with_family']=  $this->Mother->get_from_family_setting(49); 
            
            $data["father_national_card"]=$this->Family_members->get_father_national_card($mother_national_num);
            $data['father_table']=$this->Difined_model->select_search_key('father',"mother_national_num_fk ",$mother_national_num);
            $data['mothers_data']=$this->Difined_model->select_search_key('mother',"mother_national_num_fk ",$mother_national_num);
            $data["cuttent_higry_year"]=$this->current_hjri_year();
            $data['job']=  $this->Mother->get_from_family_setting(3);
            $data['specialties']=  $this->Mother->get_from_family_setting(45); //osama
            //$data['result']=$this->Difined_model->select_search_key('f_members','id',$id);
              $data['result']=$this->Family_members->get_member_data($id);
            $data['all_classroom']=$this->Family_members->get_classroom($data['result'][0]->stage_id_fk);
            $data['schools']=  $this->Mother->get_from_family_setting(26);
                    if($this->input->post('update')){
                    $member_sechool_img='member_sechool_img';  //member_sechool_img
                    $member_birth_card_img='member_birth_card_img';  // member_birth_card_img
                    $member_photo = 'member_photo';
                    $file['member_sechool_img']= $this->upload_image($member_sechool_img);
                    $file['member_birth_card_img']= $this->upload_image($member_birth_card_img);
                    $file['member_photo'] = $this->upload_image($member_photo);
                    $this->Family_members->update_member($id,$file);
                    $this->message('success','تم تعديل البيانات بنجاح');
                    //  redirect('family_controllers/Family/Add_Register_2');
                    $data['basic_data']=$this->Difined_model->select_search_key('basic',"mother_national_num ",$mother_national_num);
                    redirect('family_controllers/Family/family_members/'.$mother_national_num.'/'.$data['basic_data'][0]->person_account.'/'.$data['basic_data'][0]->agent_bank_account);
                    
                    
                    }else{
                    $data['father_table']=$this->Difined_model->select_search_key('father',"mother_national_num_fk ",$mother_national_num);
                    $data['all_stages']=$this->Family_members->get_classroom(0);
                    $data['nationalities']=  $this->Mother->get_from_family_setting(2);
                    $data['national_num_type']=  $this->Mother->get_from_family_setting(1);
                    $data['scocial']=  $this->Mother->get_from_family_setting(4);
                    $data['education_type']=  $this->Mother->get_from_family_setting(10);
                    $data['member_activity_type_arr']=  $this->Mother->get_from_family_setting(11);
                    $data['health_status_array']=  $this->Mother->get_from_family_setting(6);
                    $data['member_home_type_arr']=  $this->Mother->get_from_family_setting(5);
                    
                    $data['header_title']='بيانات أفراد الاسرة';
                    $data['members_active']=1;
                    $data['mother_national_num']=$mother_national_num;
                            /*************ahmed*/
                    $data['data_door_mrakz']=  $this->Mother->get_from_family_setting(46);
                    $data["person_type"]=$this->Difined_model->select_search_key('family_setting','type',32);
                    $data["id_source"]=$this->Difined_model->select_search_key('family_setting','type',12);
                    $data["relationships"]=$this->Difined_model->select_search_key('family_setting','type',34);
                    $data["education_level"]=$this->Difined_model->select_search_key('family_setting','type',8);
                    $data["stude_case"]=$this->Difined_model->select_search_key('family_setting','type',40);
                    $data["academic_achievement_level"]=$this->Difined_model->select_search_key('family_setting','type',39);
                    $data["relationships_titles"]=$this->Family_print->get_from_family_setting(34);
                    //$data['banks'] = $this->Difined_model->select_all('banks','','',"id","asc");
                    
                    $data['mother_last_account'] = $this->Mother->getMotherAccount($mother_national_num);
                    $data['last_account'] = $this->Mother->getFamilyAccount($mother_national_num);
                    $data['person_account_check'] = $this->Mother->getBasicAccount($mother_national_num);
                    $data['agent_bank_account_check'] = $this->Mother->getBasicAccount_agent($mother_national_num);
                    
                    
                    $data['women_houses']=$this->Difined_model->select_search_key('family_setting','type',44);
                    $data["diseases"]=$this->Difined_model->select_search_key('family_setting','type',35);
                    $data["responses"]=$this->Difined_model->select_search_key('family_setting','type',36);
                    $data["diseases_status"]=$this->Difined_model->select_search_key('family_setting','type',37);
                    
                    
                    $data['banks'] = $this->Difined_model->select_all('banks_settings','','',"id","asc");
                    //    $data["relationships_titles"]=$this->Family_print->get_from_family_setting(34);
                    //   $data['basic_table']=$this->Difined_model->select_search_key('basic',"mother_national_num ",$mother_national_num);
                    
                    //    $data['banks'] = $this->Difined_model->select_all('banks','','',"id","asc");
                    $data['member_family_status']=$this->Register->get_all_files_status(); 
                    
                    
                    /*************ahmed*/
                    $data['employees'] = $this->Register->select_all_employee();      
                    $data['persons_status']=$this->Register->get_all_persons_status();           
                    $data["my_current_hjri_year"]=$this->current_hjri_year();  
                    
                    $data['subview'] = 'admin/familys_views/family_members';
                    $this->load->view('admin_index', $data);
                }// end  if
    }
    //-----------------------------
    public function delete_member($id,$mother_num,$frist_segmant,$second_segment){
        $this->load->model("Difined_model");
        $Conditions_arr=array("id"=>$id);
        $this->Difined_model->delete("f_members",$Conditions_arr);
        $this->message("error","تم حدف الفرد ");
       redirect('family_controllers/Family/family_members/'.$mother_num."/".$frist_segmant."/".$second_segment);
    }
    
    
    

  /*  public function  house($mother_national_num){  //family/Family/house
        $this->load->model('familys_models/House');
        $this->load->model('Department');
        $this->load->model('Difined_model');
        $this->load->model('familys_models/Mother');

        $data['all_field']=$this->Difined_model->get_field('houses');
        $data['employ_main_depart'] = $this->Department->select_employ_main_dep();
        $data['employ_sub_depart'] = $this->Department->select_employ_sub_dep();
        $data['main_depart'] = $this->Department->select_all();
        $data['header_title']='بيانات السكن';
        $data['house_active']=1;
        $data['mother_national_num']=$mother_national_num;
        
        $data['main_depart']=  $this->Mother->get_from_family_setting(12);
        $data['arr_type_house']=  $this->Mother->get_from_family_setting(14);
        $data['arr_direct']=  $this->Mother->get_from_family_setting(23);
        $data['house_state']=  $this->Mother->get_from_family_setting(22);
        $data['house_own']=  $this->Mother->get_from_family_setting(13);

        
        if ($this->input->post('valu')){
            $data['id']=$this->input->post('valu');
            $this->load->view('admin/familys_views/main_dep',$data);
        }elseif($this->input->post('add')){
            $this->House->insert($mother_national_num);
            redirect('family_controllers/Family/money','refresh');
        }elseif($this->input->post('update')){
            $this->House->update( $mother_national_num);
            redirect('family_controllers/Family/Add_Register');
        }else{
            $data['subview'] = 'admin/familys_views/building';
            $this->load->view('admin_index', $data);
        }
    }*/
    /*********************************************************************/
  
  	public function  devices($mother_national_num){
		$this->load->model('familys_models/Devices');
		$this->load->model('familys_models/Home_needs_model');

		$this->load->model('Difined_model');
		$this->load->model('familys_models/Mother');
		   $this->load->model("familys_models/Family_members");
           
           $this->load->model("familys_models/Register");
$data['employees'] = $this->Register->select_all_employee();
           
           
		$data['mothers_data']=$this->Difined_model->select_search_key('mother',"mother_national_num_fk",$mother_national_num);
		if($this->input->post('add')){
			$this->Devices->insert($mother_national_num);
		  //  redirect('family_controllers/Family/Add_Register_2','refresh');
		  redirect('family_controllers/Family/devices/'.$mother_national_num,'refresh');
		}else {
			$data["basic_data_family"]=$this->basic_family_data($mother_national_num);
			//   $data['devices'] = $this->Difined_model->select_all('electrical_equipment','','',"id","asc");
			 $data["father_national_card"]=$this->Family_members->get_father_national_card($mother_national_num);
		 $data["father_name"]=$this->Family_members->get_father_name($mother_national_num);
			$data['result']=$this->Devices->select_where($mother_national_num);
			$data['basic_active']=1;
			$data['header_title']='محتويات السكن';
			$data['mother_national_num']=$mother_national_num;
			$data['products']=$this->Home_needs_model->get_products();

			$data['max_value'] = $this->Home_needs_model->select_Max_value() ;

			$data['subview'] = 'admin/familys_views/devices';
			$this->load->view('admin_index', $data);
		}
	}
/*
public function  devices($mother_national_num){
    $this->load->model('familys_models/Devices');
    $this->load->model('familys_models/Home_needs_model');
    $this->load->model('Difined_model');
    $this->load->model('familys_models/Mother');
       $this->load->model("familys_models/Family_members");
    $data['mothers_data']=$this->Difined_model->select_search_key('mother',"mother_national_num_fk",$mother_national_num);
    if($this->input->post('add')){
        $this->Devices->insert($mother_national_num);
      //  redirect('family_controllers/Family/Add_Register_2','refresh');
      redirect('family_controllers/Family/devices/'.$mother_national_num,'refresh');
    }else {
        $data["basic_data_family"]=$this->basic_family_data($mother_national_num);
        //   $data['devices'] = $this->Difined_model->select_all('electrical_equipment','','',"id","asc");
         $data["father_national_card"]=$this->Family_members->get_father_national_card($mother_national_num);
 $data["father_name"]=$this->Family_members->get_father_name($mother_national_num);
        $data['result']=$this->Devices->select_where($mother_national_num);
        $data['basic_active']=1;
        $data['header_title']='محتويات السكن';
        $data['mother_national_num']=$mother_national_num;
        $data['subview'] = 'admin/familys_views/devices';
        $this->load->view('admin_index', $data);
    }
}
*/
    
//------------------------------------
    public function delete_device($id,$mother_national_num){
        $this->load->model("Difined_model");
        $Conditions_arr=array("id"=>$id);
        $this->Difined_model->delete("devices",$Conditions_arr);
        $this->message('success','تم حذف البيانات بنجاح');
        redirect('family_controllers/Family/devices/'.$mother_national_num);
    }
 
//------------------------------------
/*
    public function delete_device($id){
        $this->load->model("Difined_model");
        $Conditions_arr=array("id"=>$id);
        $this->Difined_model->delete("devices",$Conditions_arr);
        redirect('family/Family/devices');
    }
    */
    /**
     * ===============================================================================================================
     *
     * ===============================================================================================================
     *
     * ===============================================================================================================
     */
  /*  public function attach_files($mother_national_num){
        $this->load->model('familys_models/Attach_files');
        if($this->input->post("add")){
            $files['death_certificate']=$this->upload_file('death_certificate');
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
            $files['collected_files']=$this->upload_file('collected_files');
            $this->Attach_files->insert_files($files,$mother_national_num);
            redirect('family_controllers/Family/Add_Register');
        }
        $data['pdf_active']=1;
        $data['mother_national_num']=$mother_national_num;

        $data['header_title']='رفع الوثائق';
        $data['subview'] = 'admin/familys_views/attach_files';
        $this->load->view('admin_index', $data);
    }

 public function attach_files($mother_national_num){
        $this->load->model('Difined_model');
        $this->load->model('familys_models/Attach_files');
        $this->load->model("familys_models/Family_members");
      if($this->input->post("add")){
            $files['death_certificate']=$this->upload_file('death_certificate');
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
            $files['collected_files']=$this->upload_file('collected_files');
            $this->Attach_files->insert_files($files,$mother_national_num);
            $this->message('success','تمت إضافة البيانات بنجاح');
           redirect('family_controllers/Family/attach_files/'.$mother_national_num);
           // redirect('family_controllers/Family/Add_Register_2');
        }
            $data["father_national_card"]=$this->Family_members->get_father_national_card($mother_national_num);
            $data["father_name"]=$this->Family_members->get_father_name($mother_national_num);
            $data["basic_data_family"]=$this->basic_family_data($mother_national_num);
            $data['result']=$this->Difined_model->select_search_key('family_attach_files','mother_national_num_fk',$mother_national_num);
            $data['mothers_data']=$this->Difined_model->select_search_key('mother',"mother_national_num_fk ",$mother_national_num);
            
            $data['pdf_active']=1;
            $data['mother_national_num']=$mother_national_num;
            $data['header_title']='رفع الوثائق';
            $data['subview'] = 'admin/familys_views/attach_files';
            $this->load->view('admin_index', $data);
    }
    */
    //==========================================================
     public function attach_files($mother_national_num){
        $this->load->model('Difined_model');
        $this->load->model('familys_models/Attach_files');
        $this->load->model("familys_models/Family_members");
        
        $this->load->model("familys_models/Register");
$data['employees'] = $this->Register->select_all_employee();
        
        
        
        if($this->input->post("ADDOther")){
            $all_img= $this->upload_muli_image("file_attach_name_other","family_attached");
            $this->Attach_files->insert_all_files_other($mother_national_num,$all_img);
            $this->message('success','تمت إضافة البيانات بنجاح');
           redirect('family_controllers/Family/attach_files/'.$mother_national_num);
           // redirect('family_controllers/Family/Add_Register_2');
        }elseif($this->input->post("add_row_other") == "1"){
             $this->load->view('admin/familys_views/get_attach_files_other');
        }elseif($this->input->post("ADD")){
       
            $all_img= $this->upload_muli_image("file_attach_name","family_attached");
            $this->Attach_files->insert_all_files($mother_national_num,$all_img);
            $this->message('success','تمت إضافة البيانات بنجاح');
           redirect('family_controllers/Family/attach_files/'.$mother_national_num);
           // redirect('family_controllers/Family/Add_Register_2');
        }elseif($this->input->post("add_row") == "1"){
             $data_load['type_attach_file']=$this->Difined_model->select_search_key('family_setting','type',47);
             $this->load->view('admin/familys_views/get_attach_files', $data_load);
        }else{
            $data["father_national_card"]=$this->Family_members->get_father_national_card($mother_national_num);
            $data["father_name"]=$this->Family_members->get_father_name($mother_national_num);
            $data["basic_data_family"]=$this->basic_family_data($mother_national_num);
           // $data['result']=$this->Difined_model->select_search_key('family_attach_files','mother_national_num_fk',$mother_national_num);
            $data['mothers_data']=$this->Difined_model->select_search_key('mother',"mother_national_num_fk ",$mother_national_num);
            $data['data_table']=$this->Attach_files->select_data_table($mother_national_num);
            
            $data['pdf_active']=1;
            $data['data_table_other']=$this->Attach_files->get_files_other($mother_national_num);
            $data['mother_national_num']=$mother_national_num;
            $data['header_title']='رفع الوثائق';
            $data['subview'] = 'admin/familys_views/attach_files';
            $this->load->view('admin_index', $data);
         }   
    }
    
    	 public function DeleteFileAttachOther($id,$mother_national_num){
         $this->load->model('familys_models/Attach_files');
         $this->Attach_files->deleteOtherFiles(array("id"=>$id));
       redirect('family_controllers/Family/attach_files/'.$mother_national_num,'refresh');
    }
  /*  public function ahmed($mother_national_num){
       $this->load->model('familys_models/Attach_files');
        $data['data_table']=$this->Attach_files->select_data_table($mother_national_num);
          
            $this->test($data['data_table']);
    }*/
    //==========================================================
    public function DeleteFileAttach($id,$mother_national_num){
         $this->load->model('familys_models/Attach_files');
         $this->Attach_files->delete(array("id"=>$id));
       redirect('family_controllers/Family/attach_files/'.$mother_national_num,'refresh');
    }
    //==========================================================
    public function update_attach_files($mother_national_num){
        $this->load->model('familys_models/Attach_files');
       
        if($this->input->post("update")){
            
            $files['death_certificate']=$this->upload_file('death_certificate');
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
            $files['collected_files']=$this->upload_file('collected_files');
            
            $insert_file=array();
            foreach ($files as  $key=>$value){
                if(!empty($value)){
                    $insert_file[$key]=$value;
                }
            }
            if(!empty($insert_file)){
                $this->Attach_files->update_files($insert_file,$mother_national_num);
            }
            $this->message('success','تم تعديل البيانات بنجاح');
              redirect('family_controllers/Family/attach_files/'.$mother_national_num);
          //  redirect('family_controllers/Family/Add_Register_2');
        }
    }
    public function downloads($file)
    {
        $this->load->helper('download');
        $name = $file;
        $data = file_get_contents('./uploads/files/'.$file);
        force_download($name, $data);
    }
    public function read_file()
    {
        $this->load->helper('file');
        $file_name=$this->uri->segment(4);
        $file_path = 'uploads/files/'.$file_name;
        header('Content-Type: application/pdf');
        header('Content-Discription:inline; filename="'.$file_name.'"');
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges:bytes');
        header('Content-Length: ' . filesize($file_path));
        readfile($file_path);
    }
    //=============================================
   public function DeleteFile($fild,$mother_national_num){
       $this->load->model('familys_models/Attach_files');
       $data[$fild]="";
       $this->Attach_files->delete_file($mother_national_num,$data);
       redirect('family_controllers/Family/attach_files/'.$mother_national_num,'refresh');
   }
 //=============================================
    public function  house($mother_national_num){  ///Family/house
        $this->load->model('familys_models/House');
        $this->load->model('Department');
        $this->load->model('Difined_model');
        $this->load->model('familys_models/Mother');
          $this->load->model("familys_models/Family_members");
            $this->load->library('google_maps');
            
            $this->load->model("familys_models/Register");
$data['employees'] = $this->Register->select_all_employee();
            
            
        $data["basic_data_family"]=$this->basic_family_data($this->uri->segment(4));
        $data['all_field']=$this->Difined_model->get_field('houses');
        $data["check_data"]= $this->House->getById($mother_national_num);
      
         $data_in=$data["check_data"];
        $data['area'] = $this->House->select_places(0);
        if(isset($data_in) && !empty($data_in) && $data_in !=null) {
            $data['city'] = $this->House->select_places($data_in["h_area_id_fk"]);
            $data['centers'] = $this->House->select_places($data_in["h_city_id_fk"]);
            $data['village'] = $this->House->select_places($data_in["h_center_id_fk"]);
        }
 $data["father_national_card"]=$this->Family_members->get_father_national_card($mother_national_num);
 $data["father_name"]=$this->Family_members->get_father_name($mother_national_num);
 
 
        $data['header_title']='بيانات السكن';
        $data['mother_national_num']=$mother_national_num;
        $data["mother_data"]=$this->Difined_model->getByArray("mother",array("mother_national_num_fk"=>$mother_national_num));
        $data['main_depart']=  $this->Mother->get_from_family_setting(12);
        $data['arr_type_house']=  $this->Mother->get_from_family_setting(14);
        $data['arr_direct']=  $this->Mother->get_from_family_setting(23);
        $data['house_state']=  $this->Mother->get_from_family_setting(22);
        $data['house_own']=  $this->Mother->get_from_family_setting(13);


        if ($this->input->post('value_id')){
            $id=$this->input->post('value_id');
            $data["records_row"]=$this->House->select_places($id);
            $this->load->view('admin/familys_views/load_places',$data);
        }elseif($this->input->post('add')){
            
            $this->House->insert($mother_national_num);
              redirect('family_controllers/Family/house/'.$mother_national_num);
           // redirect('family_controllers/Family/Add_Register_2','refresh');
        }elseif($this->input->post('update')){
        
            $this->House->update( $mother_national_num);
              redirect('family_controllers/Family/house/'.$mother_national_num);
          //  redirect('family_controllers/Family/Add_Register_2');
        }else{
             /***************************mymap**********/

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
            $data['subview'] = 'admin/familys_views/building';
            $this->load->view('admin_index', $data);
        }
    }
    
    /************************************************************/
    
   /* 
    public function  home_needs($mother_national_num){ //family_controllers/Family/home_needs
    $this->load->model('familys_models/Home_needs_model');
    $this->load->model('Difined_model');
    $this->load->model('familys_models/Mother');
    $data['mothers_data']=$this->Difined_model->select_search_key('mother',"mother_national_num_fk ",$mother_national_num);
    if ($this->input->post('num')){
        $data['id']=$this->input->post('num');
        $data['all'] =$this->Home_needs_model->select_all();
        $data['disabls'] = $this->Home_needs_model->select_disabled();
        $this->load->view('admin/familys_views/get_home_needs',$data);
    }elseif($this->input->post('add')){
        $this->Home_needs_model->insert($mother_national_num);
        redirect('family_controllers/Family/Add_Register_2','refresh');
    }else {
        $data['devices'] = $this->Difined_model->select_all('home_needs','','',"id","asc");
        $data['result']=$this->Home_needs_model->select_where($mother_national_num);
        $data['basic_active']=1;
        $data['header_title']='ما يحتاجه المنزل';
        $data['mother_national_num']=$mother_national_num;
        $data['subview'] = 'admin/familys_views/home_needs';
        $this->load->view('admin_index', $data);
    }
}*/
public function  home_needs($mother_national_num){ //family_controllers/Family/home_needs
    $this->load->model('familys_models/Home_needs_model');
    $this->load->model('Difined_model');
    $this->load->model('familys_models/Mother');
       $this->load->model("familys_models/Family_members");
       $this->load->model("familys_models/Register");
$data['employees'] = $this->Register->select_all_employee();
       
       
       
    $data['mothers_data']=$this->Difined_model->select_search_key('mother',"mother_national_num_fk ",$mother_national_num);
    if($this->input->post('add')){
        $this->Home_needs_model->insert($mother_national_num);
       // redirect('family_controllers/Family/Add_Register_2','refresh');
       redirect('family_controllers/Family/home_needs/'.$mother_national_num,'refresh');

    }else {
         $data["father_national_card"]=$this->Family_members->get_father_national_card($mother_national_num);
         $data["father_name"]=$this->Family_members->get_father_name($mother_national_num);
        $data["basic_data_family"]=$this->basic_family_data($mother_national_num);
        $data['devices'] = $this->Difined_model->select_all('home_needs','','',"id","asc");
        $data['result']=$this->Home_needs_model->select_where($mother_national_num);
        $data['basic_active']=1;
        $data['header_title']='ما يحتاجه المنزل';
        $data['mother_national_num']=$mother_national_num;
        $data['subview'] = 'admin/familys_views/home_needs';
        $this->load->view('admin_index', $data);
    }
}
//------------------------------------
public function delete_home_needs($id,$mother_national_num){
    $this->load->model("Difined_model");
    $Conditions_arr=array("id"=>$id);
    $this->Difined_model->delete("home_needs",$Conditions_arr);
    $this->message('success','تم حذف البيانات بنجاح');
    redirect('family_controllers/Family/home_needs/'.$mother_national_num);
}

    
    
    
    
    
    
    /**
 * ===============================================================================================================
 *
 * ===============================================================================================================
 *
 * ===============================================================================================================
 */
/************** راي الباحث ***********************/
 public  function  SocialResearcher($mother_national_num){  // family_controllers/Family/SocialResearcher
        $this->load->model("Difined_model");
        $this->load->model('familys_models/Mother');
        $this->load->model("familys_models/Model_researcher_opinion");
        $this->load->model('familys_models/Family_category');
      
      $this->load->model("familys_models/Register");
$data['employees'] = $this->Register->select_all_employee();
      
      
        $data['mother_national_num']=$mother_national_num;
            $data["mother_data"]=$this->Difined_model->getByArray("mother",array("mother_national_num_fk"=>$mother_national_num));
        $result=$this->Model_researcher_opinion->getById($mother_national_num);
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
            $this->Model_researcher_opinion->inserted($mother_national_num,$researcher_name,$family_leader_name);
            redirect('family_controllers/Family/SocialResearcher/'.$mother_national_num);
        }
        if($this->input->post('update')){

            $researcher_name='';$family_leader_name='';
            if($_SESSION['status']==0 && $_SESSION['dep_job_id_fk']==3 ){
                $researcher_name=$_SESSION['user_username'];
            }elseif($_SESSION['status']==1 && $_SESSION['dep_job_id_fk']==3){
                $family_leader_name=$_SESSION['user_username'];
            }
            $this->Model_researcher_opinion->updated($mother_national_num,$researcher_name,$family_leader_name);
            redirect('family_controllers/Family/SocialResearcher/'.$mother_national_num);
        }
        $data['arr_op']=  $this->Mother->get_from_family_setting(28);
        $data['arr_in']=  $this->Mother->get_from_family_setting(27);
        $data['arr_type']=  $this->Mother->get_from_family_setting(29);
          $data["basic_data_family"]=$this->basic_family_data($mother_national_num);
        $data['all_cat'] =  $this->Family_category->select_Family_categories();
        $data['family_cat'] =  $this->Family_category->select_familys_category($mother_national_num);
       
       
       
         $data['family_new_cat'] =  $this->Family_category->specific_familys_category($mother_national_num);
       
       
       
        $data['title']='راى الباحث الاجتماعى ';
        $data['header_title']='رأي الباحث الاجتماعى ';   
        
        
        
        
        $data['subview'] = 'admin/familys_views/researcher_opinion';
        $this->load->view('admin_index', $data);
    }


/*******************************************/
        public function accepted_family_files(){ // family_controllers/Family/accepted_family_files
       $this->load->model("familys_models/Register");
  $this->load->model("Difined_model");


$data['reasons_types']=$this->Difined_model->select_search_key('family_reasons_settings',"type",1);
/*
    $this->load->model('Model_transformation_process');
        $data["select_process_procedures"]=$this->Model_transformation_process->select_process_procedures();
        $data["select_user"]=$this->Model_transformation_process->select_user();
        $data['all_lagna_to']=  $this->Difined_model->select_all("lagna","","","","");
        //-------------------  transformation_process  --------------
      $data['employees'] = $this->Difined_model->select_all('employees','','',"id","asc");  
      $data['all_options']=$this->Register->get_from_files_option_updates();
      $data['file_status']=$this->Register->get_all_files_status();
      $data['banks'] = $this->Difined_model->select_all('banks_settings','','',"id","asc");
      $data['file_num']=$this->Register->get_file_num();
*/
        //-------------------  transformation_process  --------------
         $this->load->model('Model_transformation_process');
        $data["select_process_procedures"]=$this->Model_transformation_process->select_process_procedures();
        $data["select_user"]=$this->Model_transformation_process->select_user();
        $data['all_lagna_to']=  $this->Difined_model->select_all("lagna","","","","");
        //-------------------  transformation_process  --------------
      $data['employees'] = $this->Difined_model->select_all('employees','','',"id","asc");  
      $data['all_options']=$this->Register->get_from_files_option_updates();
      $data['file_status']=$this->Register->get_all_files_status();
      $data['banks'] = $this->Difined_model->select_all('banks_settings','','',"id","asc");
      $data['file_num']=$this->Register->get_file_num();
      
      

/*
              if($_SESSION['role_id_fk'] != 3){
                     $data['records'] = $this->Register->select_data_basic_accepted();
              }elseif($_SESSION['role_id_fk'] == 3){   //'researcher_id',$id
                   $where =array('researcher_id'=>$id);
                     $data['records'] = $this->Register->select_data_basic_accepted_where($where);
              }*/
              
 /* if($_SESSION['head_dep_id_fk'] == 1){
                     $data['records'] = $this->Register->select_data_basic_accepted();
              }elseif($_SESSION['head_dep_id_fk'] == 0){   //'researcher_id',$id
                   $where =array('user_id'=>$_SESSION['user_id']);
                     $data['records'] = $this->Register->select_data_basic_accepted_where($where);
              }   */           
              
                 $data['records'] = $this->Register->select_data_basic_accepted();
              
              
           // $data['records'] = $this->Register->select_data_basic_accepted();
            $data['title'] = 'جميع الملفات التي اتم إعتمادها ';
            $data['metakeyword'] = 'جميع الملفات التي اتم إعتمادها';
            $data['metadiscription'] = '';
            $data['subview'] = 'admin/familys_views/accepted_family_files';
            $this->load->view('admin_index', $data);
     
    }
    
            public function notaccepted_family_files(){ // family_controllers/Family/notaccepted_family_files
        $this->load->model("familys_models/Register");

            $data['records'] = $this->Register->select_data_basic_notaccepted();
            $data['title'] = 'جميع الملفات التي لم يتم إعتمادها ';
            $data['metakeyword'] = 'جميع الملفات التي لم يتم إعتمادها';
            $data['metadiscription'] = '';
            $data['subview'] = 'admin/familys_views/notaccepted_family_files';
            $this->load->view('admin_index', $data);
     
    }

 public function all_archive_family_files(){ // family_controllers/Family/all_archive_family_files
        $this->load->model("familys_models/Register");

            $data['records'] = $this->Register->select_data_basic_deleted();
            $data['title'] = 'أرشيف ملفات الأسر  ';
            $data['metakeyword'] = 'أرشيف ملفات الأسر';
            $data['metadiscription'] = '';
            $data['subview'] = 'admin/familys_views/all_archive_family';
            $this->load->view('admin_index', $data);
     
    }
/******************************/

 /*public function get_date()
    {
        $value=$this->input->post('value');

       $today=date("Y-m-d");

        $format_date= date('Y-m-d', strtotime($today. "+$value days" ));

        echo $format_date;

    }
    */
    public function get_date() // old 
    {
        $value=$this->input->post('value');

       $today=$this->input->post('date_last');

        $format_date= date('Y-m-d', strtotime($today. "+$value days" ));

        echo $format_date;

    }
    
        public function get_date_update()  
    {
        $date_last_update=$this->input->post('from_date');

        $peroid =$this->input->post('peroid');
       
        $format_date= date('Y-m-d', strtotime($date_last_update. "+$peroid days" ));

   echo $format_date;
	}
    /**************************************/
    
    public function change_file_status()
{
    $this->load->model('familys_models/Register');
    $this->Register->change_file_setting();
}


/************************************/
    
 public function family_members_details($mother_national_num,$id){ 
        $this->load->model("familys_models/Family_members");
        $this->load->model('Difined_model');
        $this->load->model("familys_models/Register");
        $this->load->model('familys_models/Mother');
        $this->load->model('familys_models/Family_print');
        $data['father_table']=$this->Difined_model->select_search_key('father',"mother_national_num_fk ",$mother_national_num);
        $data['mothers_data']=$this->Difined_model->select_search_key('mother',"mother_national_num_fk ",$mother_national_num);
        $data["cuttent_higry_year"]=$this->current_hjri_year();
        $data['job']=  $this->Mother->get_from_family_setting(3);
        $data['result']=$this->Difined_model->select_search_key('f_members','id',$id);
        //$this->test($data['result']);
        $data['all_classroom']=$this->Family_members->get_classroom($data['result'][0]->stage_id_fk);
        $data['schools']=  $this->Mother->get_from_family_setting(26);

            $data['father_table']=$this->Difined_model->select_search_key('father',"mother_national_num_fk ",$mother_national_num);
            $data['all_stages']=$this->Family_members->get_classroom(0);
            $data['nationalities']=  $this->Mother->get_from_family_setting(2);
            $data['national_num_type']=  $this->Mother->get_from_family_setting(1);
            $data['scocial']=  $this->Mother->get_from_family_setting(4);
            $data['education_type']=  $this->Mother->get_from_family_setting(10);
            $data['member_activity_type_arr']=  $this->Mother->get_from_family_setting(11);
            $data['health_status_array']=  $this->Mother->get_from_family_setting(6);
            $data['member_home_type_arr']=  $this->Mother->get_from_family_setting(5);
            $data['header_title']='بيانات أفراد الاسرة';
            $data['members_active']=1;
            $data['mother_national_num']=$mother_national_num;
            /*************ahmed*/
            $data["person_type"]=$this->Difined_model->select_search_key('family_setting','type',32);
            $data["id_source"]=$this->Difined_model->select_search_key('family_setting','type',12);
            $data["relationships"]=$this->Difined_model->select_search_key('family_setting','type',34);
            $data["education_level"]=$this->Difined_model->select_search_key('family_setting','type',8);
            $data["stude_case"]=$this->Difined_model->select_search_key('family_setting','type',40);
            $data["academic_achievement_level"]=$this->Difined_model->select_search_key('family_setting','type',39);
            $data["relationships_titles"]=$this->Family_print->get_from_family_setting(34);


            $data['mother_last_account'] = $this->Mother->getMotherAccount($mother_national_num);
            $data['last_account'] = $this->Mother->getFamilyAccount($mother_national_num);
            $data['person_account_check'] = $this->Mother->getBasicAccount($mother_national_num);
            $data['agent_bank_account_check'] = $this->Mother->getBasicAccount_agent($mother_national_num);


            $data['women_houses']=$this->Difined_model->select_search_key('family_setting','type',44);
            $data["diseases"]=$this->Difined_model->select_search_key('family_setting','type',35);
            $data["responses"]=$this->Difined_model->select_search_key('family_setting','type',36);
            $data["diseases_status"]=$this->Difined_model->select_search_key('family_setting','type',37);


            $data['banks'] = $this->Difined_model->select_all('banks_settings','','',"id","asc");


            $data['subview'] = 'admin/familys_views/family_members_details';
            $this->load->view('admin_index', $data);

    }   
    //=========================================================
    public function AddRelations($mother_national_num){ // family_controllers/Family/AddRelations
        $this->load->model("familys_models/Register");
        if($this->input->post('go')){
            $this->Register->insertedAddRelations($mother_national_num);
          // redirect('family_controllers/Family/Add_Register_2');  
            redirect('family_controllers/Family/all_new_reg_orders');
          
        }
    }
    //=========================================================
    public function AddRelations_in($mother_national_num){ // family_controllers/Family/AddRelations
        $this->load->model("familys_models/Register");
        if($this->input->post('go')){
            $this->Register->insertedAddRelations($mother_national_num);
            redirect('family_controllers/Family/Add_Register_2');  
        }
    }
  
public function change_family_members_status()
{
    $this->load->model('familys_models/Register');
    $this->Register->change_family_members_setting();
}  

public function change_mother_status(){
      $this->load->model('familys_models/Register');
    $this->Register->change_mother_state();
}


 /*****************************************************/
/* public function devices_load_page(){
    $this->load->model('familys_models/Home_needs_model');
    if ($this->input->post('num') =='num'){
        $data['all'] =$this->Home_needs_model->select_all();
        $data['disabls'] = $this->Home_needs_model->select_disabled();
        $this->load->view('admin/familys_views/get_device',$data);
    }

} */

	public function devices_load_page(){
		$this->load->model('familys_models/Home_needs_model');
		if ($this->input->post('num') =='num'){
			$data['all'] =$this->Home_needs_model->select_all();
			$data['max_value'] = $this->Home_needs_model->select_Max_value() ;
			$this->load->view('admin/familys_views/get_device',$data);
		}

	}
	 public function fill_select(){
        $this->load->model('familys_models/Home_needs_model');
        $data['sub_branch']=  $this->Home_needs_model->get_sub($this->input->post('id'));
      $this->load->view('admin/familys_views/get_sub_product',$data);

       

    }
 
 public function home_needs_load_page(){
    $this->load->model('familys_models/Home_needs_model');
    if ($this->input->post('num') =='num'){
        $data['all'] =$this->Home_needs_model->select_all();
        $data['disabls'] = $this->Home_needs_model->select_disabled();
        $this->load->view('admin/familys_views/get_home_needs',$data);
    }

}
public function money_function(){
    $this->load->model('familys_models/Money');
    $this->load->model('Difined_model');
    $mothers_data =$this->Difined_model->select_search_key('mother',"mother_national_num_fk ",$_POST['family_num']);
    $count =0;
    if(!empty($mothers_data)){
         if($mothers_data[0]->categoriey_m == 1  || $mothers_data[0]->categoriey_m == 2 ){
         //   $count =1;
          $count =  $this->Money->sum_mosfed_in_mother($_POST['family_num']);
         }
    }
    //$data['member_num'] =$this->Money->get_member_num($_POST['family_num']) + $count;
      $data['member_num'] =$this->Money->sum_mosfed_in_f_members($_POST['family_num']) + $count;
    if($data['member_num'] == 0){
        $data['member_num'] = 1;
    }
    $data['naseb'] =($_POST['total']  / $data['member_num']  );
      if ($data['naseb'] < 0) {
        $data['naseb'] = 0;
    }
    $data['f2a'] =$this->Money->GetF2a($data['naseb'] );
  	$data['f2a_id'] =$this->Money->GetF2a_id($data['naseb'] );
    
    
    echo json_encode($data);

} 


/********************************************************/

 public function add_responsible_account($mother_num) // family_controllers/Family/add_responsible_account
    {
        $this->load->model("familys_models/Responsible_account");
        $this->load->model("Difined_model");
         $this->load->model("familys_models/Family_members");
         
         $this->load->model("familys_models/Register");
$data['employees'] = $this->Register->select_all_employee();
         
         
        if($this->input->post('add'))
        {
            $img=$this->upload_image('bank_image');
            $this->Responsible_account->insert($mother_num,$img);
            //$this->Responsible_account->insert($mother_num);
            $this->message('success','تم إضافة بيانات مسئول الحساب بنجاح');
           redirect('family_controllers/Family/add_responsible_account/'.$mother_num);
         //  redirect('family_controllers/Family/add_responsible_account/'.$mother_num);
        }

        $data["father_national_card"]=$this->Family_members->get_father_national_card($mother_num);
        $data["father_name"]=$this->Family_members->get_father_name($mother_num);
        $data["basic_data_family"]=$this->basic_family_data($mother_num);

        $data['name']= $this->Responsible_account->get_mother_data($mother_num);
        $data['f_members']= $this->Responsible_account->get_mother_f_members($mother_num);
        //$this->test($data['f_members']);
        $data["relationships"]=$this->Difined_model->select_search_key('family_setting','type',34);
        $data['banks'] = $this->Difined_model->select_all('banks_settings','','',"id","asc");
        $data['records']=$this->Responsible_account->get_all_id($mother_num);

        $data['header_title']="بيانات الحساب البنكي";
        $data['title']="بيانات الحساب البنكي";
        $data['subview'] = 'admin/familys_views/responsible_account';
        $this->load->view('admin_index', $data);
    }
   
     public function UpdateResponsibleAccount($mother_num){
        if ($this->input->post("ADD")) {
            $this->load->model("familys_models/Responsible_account");
              $file = $this->upload_image("attachment");
             $this->Responsible_account->add_attachment($mother_num ,$file);
            redirect('family_controllers/Family/add_responsible_account/' . $mother_num);
        }
    }
     //===============================================================
    public function UpdateResponsibleAccountOperations($id,$mother_num){
        if ($this->input->post("ADD")) {
            $this->load->model("familys_models/Responsible_account");
            $file = $this->upload_image("attachment_operation");
            $this->Responsible_account->add_attachment_operations($id ,$file);
            redirect('family_controllers/Family/add_responsible_account/' . $mother_num);
        }
    }
    //===============================================================
    
    public function edit_account($mother_num)
    {
      //  $this->test($_POST);  
       $this->load->model("familys_models/Responsible_account");

        $img=$this->upload_image('edit_bank_image');
        $this->Responsible_account->update_account($img);
        //$this->Responsible_account->update_account();
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
         echo "تم تنشيط الحساب";
     }else{
         echo "تم الغاء تنشيط الحساب";
     }
 }
 /*****************************************************/
 
 
 public function  GetMotherDataPopup(){
    if ($this->input->post('mother_num')) {
        $this->load->model('Difined_model');
        $this->load->model('familys_models/Mother');
        $this->load->model("familys_models/Register");
        $data["person_type"]=$this->Difined_model->select_search_key('family_setting','type',32);
        $data["relationships"]=$this->Difined_model->select_search_key('family_setting','type',34);
        $data['member_status']=$this->Register->get_all_files_status();
        $data['national_id_array']=  $this->Mother->get_from_family_setting(1);
        $data["id_source"]=$this->Difined_model->select_search_key('family_setting','type',12);
        $data['nationality']=  $this->Mother->get_from_family_setting(2);
        $data['marital_status_array']=  $this->Mother->get_from_family_setting(4);
        $data['living_place_array']=  $this->Mother->get_from_family_setting(5);
        $data['arr_ed_state']=  $this->Mother->get_from_family_setting(40);
        $data['education_level_array']=  $this->Mother->get_from_family_setting(8);
        $data['women_houses']=$this->Difined_model->select_search_key('family_setting','type',44);
        $data['health_status_array']=  $this->Mother->get_from_family_setting(6);
        $data["diseases"]=$this->Difined_model->select_search_key('family_setting','type',35);
        $data["responses"]=$this->Difined_model->select_search_key('family_setting','type',36);
        $data["diseases_status"]=$this->Difined_model->select_search_key('family_setting','type',37);
        $data['job_titles']=  $this->Mother->get_from_family_setting(3);
        $data['personal_characters']=  $this->Mother->get_from_family_setting(48); 
        $data['relations_with_family']=  $this->Mother->get_from_family_setting(49); 
        $data['works_type']=  $this->Mother->get_from_family_setting(50);
        
            $result_data =$this->Difined_model->select_search_key('mother',"mother_national_num_fk ",$this->input->post('mother_num'));
        $data['result'] =$result_data[0];
        $this->load->view('admin/familys_views/GetMotherDataPopup',$data);
    }

}
public function GetFamilyMemberDataPopup(){
    if ($this->input->post('member_id') && $this->input->post('mother_num')) {
        $this->load->model('Difined_model');
        $this->load->model("familys_models/Register");
        $this->load->model('familys_models/Mother');
        $this->load->model('familys_models/Family_members');
        $data['mothers_data']=$this->Difined_model->select_search_key('mother',"mother_national_num_fk ",$this->input->post('mother_num'));
        $data['father_table']=$this->Difined_model->select_search_key('father',"mother_national_num_fk ",$this->input->post('mother_num'));
        $data["person_type"]=$this->Difined_model->select_search_key('family_setting','type',32);
        $data["relationships"]=$this->Difined_model->select_search_key('family_setting','type',34);
        $data['member_family_status']=$this->Register->get_all_files_status();
        $data['national_num_type']=  $this->Mother->get_from_family_setting(1);
        $data["id_source"]=$this->Difined_model->select_search_key('family_setting','type',12);
        $data['data_door_mrakz']=  $this->Mother->get_from_family_setting(46);
        $data['women_houses']=$this->Difined_model->select_search_key('family_setting','type',44);
        $data["stude_case"]=$this->Difined_model->select_search_key('family_setting','type',40);
        $data["education_level"]=$this->Difined_model->select_search_key('family_setting','type',8);
        $data['education_type']=  $this->Mother->get_from_family_setting(10);
        $data['schools']=  $this->Mother->get_from_family_setting(26);
        $data['all_stages']=$this->Family_members->get_classroom(0);
        $data['result'] = $this->Difined_model->select_search_key('f_members', 'id', $this->input->post('member_id'));
        $data['all_classroom']=$this->Family_members->get_classroom($data['result'][0]->stage_id_fk);
        $data["academic_achievement_level"]=$this->Difined_model->select_search_key('family_setting','type',39);
        $data['scocial']=  $this->Mother->get_from_family_setting(4);
        $data['member_home_type_arr']=  $this->Mother->get_from_family_setting(5);
        $data['job']=  $this->Mother->get_from_family_setting(3);
        $data['member_activity_type_arr']=  $this->Mother->get_from_family_setting(11);
        $data['nationalities']=  $this->Mother->get_from_family_setting(2);
        $data['health_status_array']=  $this->Mother->get_from_family_setting(6);
        $data["diseases"]=$this->Difined_model->select_search_key('family_setting','type',35);
        $data["responses"]=$this->Difined_model->select_search_key('family_setting','type',36);
        $data["diseases_status"]=$this->Difined_model->select_search_key('family_setting','type',37);
        $data['personal_characters']=  $this->Mother->get_from_family_setting(48);
        $data['relations_with_family']=  $this->Mother->get_from_family_setting(49); 
        $data['works_type']=  $this->Mother->get_from_family_setting(50);
        
        $this->load->view('admin/familys_views/GetFamilyMemberDataPopup',$data);
    }
}
  /**
   *   ================================================================================================
   * 
   *  */


public  function  GetFileConidtion(){
    $this->load->model("familys_models/Register");
    $this->load->model("Difined_model");
    $data_load['reasons_types'] = $this->Difined_model->select_search_key('family_reasons_settings', "type", 1);
    $data_load['file_status'] = $this->Register->get_all_files_status();
    $data_load["basic_data_family"] = $this->basic_family_data($_POST['basic_id']);
    $this->load->view('admin/familys_views/Popup_pages/get_FileConidtionPopup', $data_load);
}
public  function  GetFileUpdate(){

    $this->load->model("familys_models/Register");
    $this->load->model("Difined_model");
    $data_load['all_options'] = $this->Register->get_from_files_option_updates();
    $data_load["basic_data_family"] = $this->basic_family_data($_POST['basic_id']);
    $data_load["all_file_updates_tracks"] = $this->Register->select_file_updates_tracks($data_load["basic_data_family"]["mother_national_num"]);
 
    $this->load->view('admin/familys_views/Popup_pages/get_FileUpdatePopup', $data_load);
}
public  function  GetFileTracking(){
    $this->load->model("familys_models/Register");
    $this->load->model("Difined_model");
    $data_load['all_options'] = $this->Register->get_from_files_option_updates();
    $data_load["basic_data_family"] = $this->basic_family_data($_POST['basic_id']);
    $data_load["transformation_lagna"] = $this->Register->select_transformation_lagna($data_load["basic_data_family"]["mother_national_num"]);
    $data_load["file_opration"] = $this->Register->select_operation($data_load["basic_data_family"]["mother_national_num"]);
    $this->load->view('admin/familys_views/Popup_pages/get_FileTrackingPopup', $data_load);
}

/******************************************************/

/*************************************************************/

 	 public function all_new_reg_orders(){ // family_controllers/Family/all_new_reg_orders
     /*
     echo '<pre>';
     print_r($_SESSION);
     echo '<pre>';
     */
         //socity_branch
     $this->load->model("familys_models/Register");
     $this->load->model("Difined_model");
     $this->load->model('familys_models/Mother');
     $this->load->model('familys_models/Model_area_sitting');
     $data['house_own']=  $this->Mother->get_from_family_setting(13);
     $data['all_city'] = $this->Model_area_sitting->select_type(3);
     if($this->input->post('register') == 'register' ){
      //  $this->test($_POST);
       $this->Register->inserted_reg();
        redirect('family_controllers/Family/Add_Register_2');
        
     }elseif($this->input->post('register') == 'register_wakel' ){
       //  $this->test($_POST);
        $this->Register->inserted_reg_wakel();
          redirect('family_controllers/Family/Add_Register_2');
     }
     
     
     
     $data['adminastration'] = $this->Difined_model->select_search_key("department_jobs", "from_id_fk", "0");
     if($this->input->post('mother_national_num_chik')){
        $arr["in"]=$this->Difined_model->select_search_key('basic','mother_national_num',$this->input->post('mother_national_num_chik'));
        $this->load->view('admin/familys_views/load', $arr);
     }else{
      $data['socity_branch'] = $this->Difined_model->select_all('socity_branch','','',"id","asc");  
     
     // $data['records'] = $this->Register->select_data_basic();
     /* if($_SESSION['role_id_fk'] != 3){
            // $data['records'] = $this->Register->select_data_basic();
            $data['records'] = $this->Register->select_data_new_reg_orders();
            
      }elseif($_SESSION['role_id_fk'] == 3){
           //  $data['records'] = $this->Register->select_data_basic_by_id($_SESSION['emp_code']);
           $data['records'] = $this->Register->select_all_new_reg_by_id_order($_SESSION['emp_code']);
           
           
      }*/
      
      
      
      
       $data['records'] = $this->Register->select_data_new_reg_orders();
             /*ahmed*/
      //  $data['banks'] = $this->Difined_model->select_all('banks','','',"id","asc");
        $data["relationships"]=$this->Register->select_relashion(array('type'=>34,"id_setting !="=>41));//select_search_key('family_setting','type',34);
        $data["id_source"]=$this->Difined_model->select_search_key('family_setting','type',12);
        /*ahmed*/
         //-------------------  transformation_process  --------------
         $this->load->model('Model_transformation_process');
        $data["select_process_procedures"]=$this->Model_transformation_process->select_process_procedures();
        $data["select_user"]=$this->Model_transformation_process->select_user();
        $data['all_lagna_to']=  $this->Difined_model->select_all("lagna","","","","");
        //-------------------  transformation_process  --------------
      $data['employees'] = $this->Register->select_all_employee();  
      $data['all_options']=$this->Register->get_from_files_option_updates();
      $data['file_status']=$this->Register->get_all_files_status();
      $data['banks'] = $this->Difined_model->select_all('banks_settings','','',"id","asc");
      $data['file_num']=$this->Register->get_file_num();
      
           $data["main_attach_files"]=$this->Difined_model->select_search_key('family_setting','type',47);
            
      
      
      $data['title'] = 'طلبات التسجيل المقدمة';
      $data['metakeyword'] = 'طلبات التسجيل المقدمة';
      $data['metadiscription'] = '';
   //   $data['subview'] = 'admin/familys_views/Add_Register';
    $data['subview'] = 'admin/familys_views/all_new_reg_orders';
   
      $this->load->view('admin_index', $data);
     }
     
     
     }







/*

        public function all_re_files_accep(){ // family_controllers/Family/accepted_family_files
       $this->load->model("familys_models/Register");
  $this->load->model("Difined_model");


$data['reasons_types']=$this->Difined_model->select_search_key('family_reasons_settings',"type",1);

        //-------------------  transformation_process  --------------
         $this->load->model('Model_transformation_process');
        $data["select_process_procedures"]=$this->Model_transformation_process->select_process_procedures();
        $data["select_user"]=$this->Model_transformation_process->select_user();
        $data['all_lagna_to']=  $this->Difined_model->select_all("lagna","","","","");
        //-------------------  transformation_process  --------------
      $data['employees'] = $this->Difined_model->select_all('employees','','',"id","asc");  
      $data['all_options']=$this->Register->get_from_files_option_updates();
      $data['file_status']=$this->Register->get_all_files_status();
      $data['banks'] = $this->Difined_model->select_all('banks_settings','','',"id","asc");
      $data['file_num']=$this->Register->get_file_num();
      
      

      
      $data['records'] = $this->Register->select_data_re_files();
              
      $data['title'] = 'ملفات أسر تحتاج لإعادة بحث';
      $data['metakeyword'] = 'ملفات أسر تحتاج لإعادة بحث';
            $data['metadiscription'] = '';
            $data['subview'] = 'admin/familys_views/all_files_re_searched';
            $this->load->view('admin_index', $data);
     
    }
*/

 public function all_re_files_accep(){ // family_controllers/Family/accepted_family_files
           $this->load->model("familys_models/Register");
           $this->load->model("Difined_model");
           $data['customer_js'] = $this->load->view('admin/family/app_js', '', TRUE);
           $this->load->view('admin/family/app_filter', $data);
     
    }
    public function filter_table(){
        $this->load->model("familys_models/ALLtest");
        $data['records'] = $this->ALLtest->get_gggg_filter();
        $this->load->view('admin/familys_views/load_filter_page', $data);



    }
/***************************************************************************************/

/*
public function add_wakel($mother_num){ //family_controllers/Family/add_wakel/1042645620

    $this->load->model("Difined_model");
    $this->load->model("familys_models/Wakel_model");
    if($this->input->post('add'))
    {
        $this->Wakel_model->insert($mother_num);
        $this->message('success','تم إضافة بيانات الوكيل بنجاح');
        redirect('family_controllers/Family/add_wakel/'.$this->uri->segment(4));
    }else{
        $data['current_year'] =$this->current_hjri_year();
        $data['mother_table']=$this->Difined_model->select_search_key('mother',"mother_national_num_fk ",$mother_num);
        $data["basic_data_family"]=$this->basic_family_data($mother_num);
        $data["relationships"]=$this->Difined_model->select_search_key('family_setting','type',34);
        $data["id_source"]=$this->Difined_model->select_search_key('family_setting','type',12);
        $data['national_id_array']=$this->Difined_model->select_search_key('family_setting','type',1);
         $data['father']=$this->Wakel_model->get_father_data($mother_num)[0];
        $data['result'] =$this->Wakel_model->get_data($mother_num);
        $data['title']="بيانات الوكيل";
        $data['subview'] = 'admin/familys_views/wakels/add_wakel';
        $this->load->view('admin_index', $data);
    }

}
*/
public function add_wakel($mother_num){ //family_controllers/Family/add_wakel/1042645620

    $this->load->model("Difined_model");
    $this->load->model("familys_models/Wakel_model");
    
    $this->load->model("familys_models/Register");
$data['employees'] = $this->Register->select_all_employee();
    
    
    if($this->input->post('add'))
    {

        $national_img = 'w_national_img';
        $file = $this->upload_image($national_img);
        $this->Wakel_model->insert($mother_num,$file);
        $this->message('success','تم إضافة بيانات الوكيل بنجاح');
        redirect('family_controllers/Family/add_wakel/'.$this->uri->segment(4));
    }else{
        $data['current_year'] =$this->current_hjri_year();
        $data['mother_table']=$this->Difined_model->select_search_key('mother',"mother_national_num_fk ",$mother_num);
        $data["basic_data_family"]=$this->basic_family_data($mother_num);
        $data["relationships"]=$this->Difined_model->select_search_key('family_setting','type',34);
        $data["id_source"]=$this->Difined_model->select_search_key('family_setting','type',12);
        $data['national_id_array']=$this->Difined_model->select_search_key('family_setting','type',1);
        $data['marital_status_array']=  $this->Difined_model->select_search_key('family_setting','type',4);
        $data['job_titles']=  $this->Difined_model->select_search_key('family_setting','type',3);
        $data['father']=$this->Wakel_model->get_father_data($mother_num)[0];
        $data['result'] =$this->Wakel_model->get_data($mother_num);
        $data['title']="بيانات الوكيل";
        $data['subview'] = 'admin/familys_views/wakels/add_wakel';
        $this->load->view('admin_index', $data);
    }

}


 
public   function DeleteImage($id,$num){
    $this->load->model("familys_models/Wakel_model");
    $this->Wakel_model->DeleteImage($id);
    $this->message('success','  حذف صورة الهوية');
    redirect('family_controllers/Family/add_wakel/'.$num);

} 
/*************************************************************/
public function change_responsible_account($mother_num){

    // change_responsible_account
    $this->load->model("familys_models/Responsible_account");
   // if($this->input->post('save') === 'save')
   if($this->input->post('save') != '')
    {
        $photo = 'current_bank_image';
        $file= $this->upload_image($photo);
        $this->Responsible_account->change_responsible_account($file);
        $this->message('success','تم تغيير بيانات الحساب البنكي بنجاح');
        redirect('family_controllers/Family/add_responsible_account/'.$mother_num);
    }
}
public function print_eqrar($id){

    $this->load->model("familys_models/Responsible_account");
    $data["records"]=$this->Responsible_account->get_operation_data($id)[0];

    $this->load->view('admin/familys_views/print_eqrar', $data);
}
   
   
   
   /*******************************************************/
  /*******************************************************/
  /*******************************************************/ 
   
   
   
/*   
public function AddNewRegister(){ // family_controllers/Family/AddNewRegister
    $this->load->model("familys_models/Register");
    $this->load->model("Difined_model");
    $this->load->model('familys_models/Mother');
    $this->load->model('familys_models/Model_area_sitting');
    $data['house_own']=  $this->Mother->get_from_family_setting(13);
    $data['all_city'] = $this->Model_area_sitting->select_type(3);

    $data['adminastration'] = $this->Difined_model->select_search_key("department_jobs", "from_id_fk", "0");
    if($this->input->post('mother_national_num_chik')){
        $arr["in"]=$this->Difined_model->select_search_key('basic','mother_national_num',$this->input->post('mother_national_num_chik'));
        $this->load->view('admin/familys_views/load', $arr);
    }else{
        $data['socity_branch'] = $this->Difined_model->select_all('socity_branch','','',"id","asc");
        $data['records'] = $this->Register->select_data_basic_order();
        $data["relationships"]=$this->Register->select_relashion(array('type'=>34,"id_setting !="=>41));//select_search_key('family_setting','type',34);
        $data["id_source"]=$this->Difined_model->select_search_key('family_setting','type',12);
        //-------------------  transformation_process  --------------
        $this->load->model('Model_transformation_process');
        $data["select_process_procedures"]=$this->Model_transformation_process->select_process_procedures();
        $data["select_user"]=$this->Model_transformation_process->select_user();
        $data['all_lagna_to']=  $this->Difined_model->select_all("lagna","","","","");
        //-------------------  transformation_process  --------------
        $data['employees_data'] = $this->Difined_model->select_all('employees','','',"id","asc");
        $data['all_options']=$this->Register->get_from_files_option_updates();
        $data['file_status']=$this->Register->get_all_files_status();
        $data['banks'] = $this->Difined_model->select_all('banks_settings','','',"id","asc");
        $data['file_num']=$this->Register->get_file_num();
        $data["main_attach_files"]=$this->Difined_model->select_search_key('family_setting','type',47);
        $data['national_id_array']=  $this->Difined_model->select_search_key('family_setting','type',1);
        $data['marital_status_array']=  $this->Difined_model->select_search_key('family_setting','type',4);
        $data["relationships"]=$this->Difined_model->select_search_key('family_setting','type',34);
        $data['title'] = 'إضافة طلب أسرة جديدة';
        $data['metakeyword'] = 'إعدادات البيانات الأساسية';
        $data['metadiscription'] = '';
        $data['subview'] = 'admin/familys_views/AddNewRegister';
        $this->load->view('admin_index', $data);
    }


}


public function getFamilyMembers(){
    $this->load->model("Difined_model");
    $data_load["relationships"]=$this->Difined_model->select_search_key('family_setting','type',34);
    $data_load['current_year'] =   $this->current_hjri_year();
    $this->load->view('admin/familys_views/getFamilyMembers',$data_load);

}
public function GetClassification(){
    $this->load->model('Difined_model');
    $condition =array('gender_fk'=>$_POST['gender'],'from_age <='=>$_POST['age'],'to_age >='=>$_POST['age']);
    $data  =$this->Difined_model->getByArray('family_ages_setting',$condition);
    $Classification =array(1=>'يتيم',2=>'مستفيد','أرمل');

    if(!empty($data)){
        $title =$Classification[$data['tasnef']];
    } else {
        $title ='غير محدد';
    }
    $arr['title']= $title;
    $arr['tasnef']= $data['tasnef'];
    echo json_encode($arr);
}*/
  public function AddNewRegister(){ // family_controllers/Family/AddNewRegister
        $this->load->model("familys_models/NewRegister");
        $this->load->model("Difined_model");
        $this->load->model('familys_models/Mother');
        $this->load->model('familys_models/Model_area_sitting');
     //   $data['house_own']=  $this->Mother->get_from_family_setting(13);
        $data['all_city'] = $this->Model_area_sitting->select_type(3);
        $data['adminastration'] = $this->Difined_model->select_search_key("department_jobs", "from_id_fk", "0");
        $data['all_attach_file']=$this->Difined_model->select_search_key('family_setting','type',47);
          $data["id_source"]=$this->Difined_model->select_search_key('family_setting','type',12);
        
        if($this->input->post("add_row") == "1"){
            $ids = $this->input->post("valu");
            $arr =  explode(",",$ids);
            $data_attach['type_attach_file']=$this->NewRegister->fetch_attach_files_in($arr);
            $this->load->view('admin/familys_views/get_main_attach_files', $data_attach);
        }elseif($this->input->post('mother_national_num_chik')){
            $arr["in"]=$this->Difined_model->select_search_key('basic','mother_national_num',$this->input->post('mother_national_num_chik'));
            $this->load->view('admin/familys_views/load', $arr);
        }else{
            $data['socity_branch'] = $this->Difined_model->select_all('socity_branch','','',"id","asc");
            $data['records'] = $this->NewRegister->select_data_basic_order();
        //    $data["relationships"]=$this->NewRegister->select_relashion(array('type'=>34,"id_setting !="=>41));//select_search_key('family_setting','type',34);
            $data["id_source"]=$this->Difined_model->select_search_key('family_setting','type',12);
            //-------------------  transformation_process  --------------
            $this->load->model('Model_transformation_process');
            $data["select_process_procedures"]=$this->Model_transformation_process->select_process_procedures();
            $data["select_user"]=$this->Model_transformation_process->select_user();
            $data['all_lagna_to']=  $this->Difined_model->select_all("lagna","","","","");
            //-------------------  transformation_process  --------------
            $data['employees_data'] = $this->Difined_model->select_all('employees','','',"id","asc");
            $data['all_options']=$this->NewRegister->get_from_files_option_updates();
            $data['file_status']=$this->NewRegister->get_all_files_status();
            $data['banks'] = $this->Difined_model->select_all('banks_settings','','',"id","asc");
            $data['file_num']=$this->NewRegister->get_file_num();
            $data["main_attach_files"]=$this->Difined_model->select_search_key('family_setting','type',47);
            $data['national_id_array']=  $this->Difined_model->select_search_key('family_setting','type',1);
            $data['marital_status_array']=  $this->Difined_model->select_search_key('family_setting','type',4);
        //    $data["relationships"]=$this->Difined_model->select_search_key('family_setting','type',34);
            
            $data_edara=$this->Difined_model->getById("department_job_relations",2);
            $data["edara_id"]=$data_edara["edara_id_fk"];
            $Conditions_arr_edara = array("employees.administration" => $data["edara_id"]);
          $data["select_user_edara"] = $this->Model_transformation_process->select_user_where($Conditions_arr_edara);

            $data['house_own']=  $this->NewRegister->selectByType('family_setting','type',13,104);
            $data["relationships"]=$this->NewRegister->selectByType('family_setting','type',34,41);
            
            $data['title'] = 'إضافة طلب أسرة جديدة';
            $data['metakeyword'] = 'إعدادات البيانات الأساسية';
            $data['metadiscription'] = '';
            $data['subview'] = 'admin/familys_views/AddNewRegister';
            $this->load->view('admin_index', $data);
        }


    }
    
        public function UpdateNewRegister($mother_num)
    {
        $this->load->model("familys_models/NewRegister");
        $this->load->model("Difined_model");
        $this->load->model('familys_models/Model_area_sitting');
        $this->load->model('familys_models/Mother');
        $this->load->model('familys_models/Attach_files');
        //$data['all']=$this->NewRegister->select_last_id_data();
        $data['type_attach_file'] = $this->Difined_model->select_search_key('family_setting', 'type', 47);
        $data["id_source"] = $this->Difined_model->select_search_key('family_setting', 'type', 12);
        $data["f_card_source"] = $this->NewRegister->get_f_card_source_name($mother_num);
        $data["mother_data"] = $this->NewRegister->GetMotherbyNum($mother_num);
        if ($this->input->post('UPDTATE') == 'UPDTATE') {
            $this->NewRegister->update_new_register($mother_num);
         //   $all_img = $this->upload_muli_image("attach_files", "family_attached");
        //    $this->NewRegister->insert_new_register_files($all_img, $mother_num);
            $this->message("success", "تم تعديل  طلب التسجيل بنجاح");
//            redirect('family_controllers/Family/AddNewRegister');
            redirect('family_controllers/Family/UpdateNewRegister/' . $mother_num . '/1', 'refresh');
        }
        $data['all'] = $this->NewRegister->select_last_id_data($mother_num);
        $data['mother_added'] = $this->NewRegister->select_last_id_data_mother($mother_num);
        //$this->test($data['all']);

        $data['current_year'] = $this->current_hjri_year();
        //  $data['house_own']=  $this->Mother->get_from_family_setting(13);
        // $data["relationships"]=$this->Difined_model->select_search_key('family_setting','type',34);
        $data['socity_branch'] = $this->Difined_model->select_all('socity_branch', '', '', "id", "asc");
        $data_result = $data['result'] = $this->NewRegister->get_by_mother_num_regester($mother_num);
        $data["files_attached"] = $this->NewRegister->get_files_mother($data_result["mother_national_num"]);

        $data['all_city'] = $this->Model_area_sitting->select_type(3);
        $data["all_district"] = $this->Model_area_sitting->select_places($data_result["center_id_fk"]);
        $data["main_attach_files"] = $this->Difined_model->select_search_key('family_setting', 'type', 47);

        $data['national_id_array'] = $this->Difined_model->select_search_key('family_setting', 'type', 1);
        $data['marital_status_array'] = $this->Difined_model->select_search_key('family_setting', 'type', 4);
        $data["family_members"] = $this->NewRegister->GetByMotherNum($mother_num);

        $data['house_own'] = $this->NewRegister->selectByType('family_setting', 'type', 13, 104);
        $data["relationships"] = $this->NewRegister->selectByType('family_setting', 'type', 34, 41);


        $data['all_attach_file'] = $this->Difined_model->select_search_key('family_setting', 'type', 47);
        $data['data_table_attached'] = $this->Attach_files->select_data_table($data_result["mother_national_num"]);

        $data['title'] = 'تعديل بيانات طلب أسرة جديدة';
        $data['subview'] = 'admin/familys_views/AddNewRegister';
        $this->load->view('admin_index', $data);
    }
    
    
   /* public function UpdateNewRegister($mother_num){
        $this->load->model("familys_models/NewRegister");
        $this->load->model("Difined_model");
        $this->load->model('familys_models/Model_area_sitting');
        $this->load->model('familys_models/Mother');
        $this->load->model('familys_models/Attach_files');
          $data["id_source"]=$this->Difined_model->select_search_key('family_setting','type',12);
          $data["f_card_source"]=$this->NewRegister->get_f_card_source_name($mother_num);
            $data["mother_data"]=$this->NewRegister->GetMotherbyNum($mother_num);
        if($this->input->post('UPDTATE') == 'UPDTATE' ){
            $this->NewRegister->update_new_register($mother_num);
            $all_img= $this->upload_muli_image("attach_files","family_attached");
            $this->NewRegister->insert_new_register_files($all_img,$mother_num);
            $this->message("success","تم تعديل  طلب التسجيل بنجاح");
            redirect('family_controllers/Family/AddNewRegister');
        }
        $data['current_year'] =   $this->current_hjri_year();
        $data['socity_branch'] = $this->Difined_model->select_all('socity_branch','','',"id","asc");
        $data_result =$data['result'] = $this->NewRegister->get_by_mother_num_regester($mother_num);
        $data["files_attached"]=$this->NewRegister->get_files_mother($data_result["mother_national_num"]);
        $data['all_city'] = $this->Model_area_sitting->select_type(3);
        $data["all_district"]=$this->Model_area_sitting->select_places($data_result["center_id_fk"]);$data["main_attach_files"]=$this->Difined_model->select_search_key('family_setting','type',47);
        $data['national_id_array']=  $this->Difined_model->select_search_key('family_setting','type',1);
        $data['marital_status_array']=  $this->Difined_model->select_search_key('family_setting','type',4);
        $data["family_members"]=$this->NewRegister->GetByMotherNum($mother_num);
         $data['house_own']=  $this->NewRegister->selectByType('family_setting','type',13,104);
        $data["relationships"]=$this->NewRegister->selectByType('family_setting','type',34,41);
        $data['all_attach_file']=$this->Difined_model->select_search_key('family_setting','type',47);
        $data['data_table_attached']=$this->Attach_files->select_data_table($data_result["mother_national_num"]);
        $data['title']='تعديل بيانات طلب أسرة جديدة';
        $data['subview'] = 'admin/familys_views/AddNewRegister';
        $this->load->view('admin_index', $data);
    }
*/

    public function downloads_new($file)
    {
        $this->load->helper('download');
        $name = $file;
        $data = file_get_contents('./uploads/family_attached/'.$file);
        force_download($name, $data);
    }


    /*public function InsertNewRegister()
    {
        $this->load->model("familys_models/NewRegister");
        if ($this->input->post('ADD') == 'ADD') {
            $last_id = $this->NewRegister->insert_new_register($this->input->post('mother_national_num'));
            $mother_national_num = $this->input->post('mother_national_num');
            $this->message("success", "تم إضافة  طلب التسجيل بنجاح");
            if ($_POST['continue_data'] == 0) {
                redirect('family_controllers/Family/AddNewRegister');
            } else {
                redirect('family_controllers/Family/UpdateNewRegister/' . $mother_national_num . '/2');
            }
        }
    }*/
    
      public function InsertNewRegister()
    {
        $this->load->model("familys_models/NewRegister");
        if ($this->input->post('ADD') == 'ADD') {
            $last_id = $this->NewRegister->insert_new_register($this->input->post('mother_national_num'));
            $mother_national_num = $this->input->post('mother_national_num');
            $this->message("success", "تم إضافة  طلب التسجيل بنجاح");
            redirect('family_controllers/Family/UpdateNewRegister/' . $mother_national_num . '/2');

        }
    }
      public function UpdateNewRegister_ajex($mother_num){

        $this->load->model("familys_models/NewRegister");
        $this->load->model("Difined_model");

        $this->NewRegister->insert_meme($mother_num);
        $data['current_year'] = $this->current_hjri_year();
        $data["id_source"] = $this->Difined_model->select_search_key('family_setting', 'type', 12);
         $data['mother_num'] = $mother_num;
        $data["family_members"] = $this->NewRegister->GetByMotherNum($mother_num);
        $data["mother_data"] = $this->NewRegister->GetMotherbyNum($mother_num);

        $this->load->view('admin/familys_views/newRegister_member_data', $data);

    }

    /*public function InsertNewRegister(){
        $this->load->model("familys_models/NewRegister");
        if($this->input->post('ADD') == 'ADD' ){
            $this->NewRegister->insert_new_register($this->input->post('mother_national_num'));
            $all_img= $this->upload_muli_image("attach_files","family_attached");
            $mother_national_num =$this->input->post('mother_national_num');
            $this->NewRegister->insert_new_register_files($all_img,$mother_national_num);
            $this->message("success","تم إضافة  طلب التسجيل بنجاح");
            redirect('family_controllers/Family/AddNewRegister');
        }

    }*/


    /*public function getFamilyMembers(){
        $this->load->model("Difined_model");
        $data_load["relationships"]=$this->Difined_model->select_search_key('family_setting','type',34);
        $data_load['current_year'] =   $this->current_hjri_year();
        $this->load->view('admin/familys_views/getFamilyMembers',$data_load);

    }*/
    
    	  public function getFamilyMembers(){
        $this->load->model("Difined_model");
        $data_load["relationships"]=$this->Difined_model->select_search_key('family_setting','type',34);
        $data_load["id_source"]=$this->Difined_model->select_search_key('family_setting','type',12);
        $data_load['current_year'] =   $this->current_hjri_year();
        $this->load->view('admin/familys_views/getFamilyMembers',$data_load);

    }
    
    /*
    public function GetClassification(){
        $this->load->model('Difined_model');
        $condition =array('gender_fk'=>$_POST['gender'],'from_age <='=>$_POST['age'],'to_age >='=>$_POST['age']);
        $data  =$this->Difined_model->getByArray('family_ages_setting',$condition);
        $Classification =array(1=>'يتيم',2=>'مستفيد','أرمل');

        if(!empty($data)){
            $title =$Classification[$data['tasnef']];
        } else {
            $title ='غير محدد';
        }
        $arr['title']= $title;
        $arr['tasnef']= $data['tasnef'];
        echo json_encode($arr);
    }*/
  
     public function GetClassification(){
        $this->load->model('Difined_model');
        $condition =array('gender_fk'=>$_POST['gender'],'from_age <='=>$_POST['age'],'to_age >='=>$_POST['age']);
        $data  =$this->Difined_model->getByArray('family_ages_setting',$condition);
        $Classification =array(1=>'أرمل', 2=>'يتيم',3=>' مستفيد بالغ');

        if(!empty($data)){
            $title =$Classification[$data['tasnef']];
        } else {
            $title ='غير محدد';
        }
        $arr['title']= $title;
        $arr['tasnef']= $data['tasnef'];
        echo json_encode($arr);
    }

    public function DeleteNewRegister($motherNum){
        $this->load->model("familys_models/NewRegister");
        $this->NewRegister->DeleteNewRegister($motherNum);
        $this->message("success","تم الحذف بنجاح");
        redirect('family_controllers/Family/AddNewRegister');
    }


   /*public function DeleteMainFileAttach($id,$mother_national_num,$familyFileNum){
        $this->load->model('familys_models/Attach_files');
        $this->Attach_files->delete(array("id"=>$id));
        redirect('family_controllers/Family/UpdateNewRegister/'.$familyFileNum,'refresh');
    }*/





    /*************************************************************/


    public function add_required_files($mother_num)
    {
        $this->load->model("familys_models/NewRegister");
        if($this->input->post('go_submit') == 'go_submit' ){
            $this->NewRegister->insert_required_files($mother_num);
            redirect('family_controllers/Family/AddNewRegister');
        }
    }


    public function printRequiredFiles($mother_num)
    {
        $this->load->model('Difined_model');
        $this->load->model("familys_models/NewRegister");
        $data["record"]=$this->NewRegister->get_RequiredFiles($mother_num);
        $data["main_attach_files"]=$this->Difined_model->select_search_key('family_setting','type',47);
        $this->load->view('admin/familys_views/print_required_files', $data);

    }

	/*
	 public function DeleteMember($id,$file){
        $this->load->model("familys_models/NewRegister");
        $this->NewRegister->DeleteMember($id);
        redirect('family_controllers/Family/UpdateNewRegister/'.$file,'refresh');
    }*/
	
/*	 public function DeleteMember($id,$file,$table){
        $this->load->model("familys_models/NewRegister");
        $this->NewRegister->DeleteMember($id,$table);
        redirect('family_controllers/Family/UpdateNewRegister/'.$file,'refresh');
    }*/
/*************************************************************/
    /*public function UpdateNewMember($mother_num,$id){ // family_controllers/Family/UpdateNewMember
        $this->load->model("familys_models/NewRegister");
       
        if($this->input->post('UPDTATE_member')){
            $this->NewRegister->update_member($id);
            $this->message("success","تم تعديل  طلب التسجيل بنجاح");
            redirect('family_controllers/Family/UpdateNewRegister/'.$mother_num);
        }

    }*/
    
    
     public function get_employment_page(){
        $this->load->model('familys_models/Mother');
    $data_load['employment_jobs']=  $this->Mother->get_from_family_setting(64);
      $this->load->view('admin/familys_views/load_pages/get_employment_page', $data_load);

    }

    public function get_employees_sons_page(){
        $this->load->model('familys_models/Mother');
     $data_load['jobs']=  $this->Mother->get_from_family_setting(3);
      $this->load->view('admin/familys_views/load_pages/get_employees_sons_page', $data_load);

    }
    public function get_special_needs_sons_page(){
        $this->load->model('familys_models/Mother');
        $data_load["diseases"] =$this->Mother->get_from_family_setting(35);
        $this->load->view('admin/familys_views/load_pages/get_special_needs_sons_page', $data_load);

    }
    public function get_other_associations_page(){
        $this->load->model('familys_models/Mother');
        $data_load["associations"] =$this->Mother->get_from_family_setting(65);
        $this->load->view('admin/familys_views/load_pages/get_other_associations_page', $data_load);

    }
    
    public function get_education_problems_page(){
        $this->load->model('familys_models/Mother');
        $data_load['education_problems']=  $this->Mother->get_from_family_setting(66);

        $this->load->view('admin/familys_views/load_pages/get_education_problems_page', $data_load);

    }
    
    
    /********************************************/
    
       /* public function get_kafala_details_modal(){

        $this->load->model("familys_models/Family_members");
        $data_load['all_data'] = $this->Family_members->Getkafalat($this->input->post('id'));
        $this->load->view('admin/familys_views/get_kafala_details_modal', $data_load);


    }*/
    
       /* public function get_kafala_details_modal()
    {

        $this->load->model("familys_models/Family_members");
        $data_load['all_data'] = $this->Family_members->Getkafalat($this->input->post('id'));
        if($data_load['all_data'][0]->kafala_type_fk==2) {
            $data_load['all_data_second'] = $this->Family_members->Getkafalat_second($this->input->post('id'));
        }
        $this->load->view('admin/familys_views/get_kafala_details_modal', $data_load);


    }*/
    
public function get_kafala_details_modal(){

        $this->load->model("familys_models/Family_members");
        $data_load['all_data'] = $this->Family_members->Getkafalat($this->input->post('id'));
        if($data_load['all_data'][0]->kafala_type_fk==2) {
            $data_load['all_data_second'] = $this->Family_members->Getkafalat_second($this->input->post('id'));
        }
        $this->load->view('admin/familys_views/get_kafala_details_modal', $data_load);

    }
    
    
    public function update_last_record()
{
    $this->load->model("familys_models/Register");
    $id=$this->input->post('row_id');
    $file_num=$this->input->post('file_num');
    $mother_num=$this->input->post('mother_national');
    //echo $mother_num.'-'.$file_num.'-'.$id;
     $this->Register->update_last_record($id);
     $this->Register->update_family_update_file($file_num,$mother_num);
    echo'
        <script>
         window.history.back();
        </script>';

}
    
    
     function get_order_details()
    {
        $this->load->model("familys_models/NewRegister");
        $id = $this->input->post('id');
        $order_details = $this->NewRegister->get_order_details($id);
        echo json_encode($order_details);
    }





    public function update_main_data($mother_num){
        $data["basic_data_family"]=$this->basic_family_data($this->uri->segment(4));
        $data['employees'] = $this->Register->select_all_employee();
           $this->load->model("familys_models/Register");
           $data['main_data']= $this->Register->get_main_data($mother_num);
          // $this->test( $data['main_data']);
        if($this->input->post('save')){
            $this->Register->update_main_data($mother_num);
            $this->message('success','تم التعديل بنجاح');
            redirect('family_controllers/Family/update_main_data/'.$this->uri->segment(4));

        }
        elseif ($this->input->post('edit_user')){
            $this->Register->update_user($mother_num);
            $this->message('success','تم التعديل بنجاح');
            redirect('family_controllers/Family/update_main_data/'.$this->uri->segment(4));
        }
           $data['title']= 'البيانات الأساسية' ;

           $data['subview'] = 'admin/familys_views/main_data_edit';
           $this->load->view('admin_index', $data);

    }
 public function get_schools()
    {
        $this->load->model("familys_models/Mother");
        $all_Asnafs = $this->Mother->get_from_family_setting(26);
//        $this->test($all_asnafs);
        $arr_asnaf = array();
        $arr_asnaf['data'] = array();

        if (!empty($all_Asnafs)) {
            foreach ($all_Asnafs as $row_asnafs) {

                $arr_asnaf['data'][] = array(
                    '<input type="radio" name="choosed" value="' . $row_asnafs->title_setting . '"
                       ondblclick="Get_school_Name(this,' . $row_asnafs->id_setting . ')" 
                        />',
                    $row_asnafs->title_setting,
                    $row_asnafs->type_name,
                    $row_asnafs->type_name,

                );
            }
        }
        echo json_encode($arr_asnaf);


    }
/*********************************************************/
    public function InsertNewRegister_morfq($mother_num)
    {
        $this->load->model("familys_models/NewRegister");
        if ($this->input->post('ADD1') == 'ADD1') {

            $all_img = $this->upload_muli_image("attach_files", "family_attached");
            $mother_national_num = $this->NewRegister->select_last_id_mother();
            $this->NewRegister->insert_new_register_files($all_img, $mother_national_num->mother_national_num);
          //  $this->message("success", "تم إضافة  طلب التسجيل بنجاح");
            $this->message("success", "تم إضافة  المرفق  بنجاح");
            redirect('family_controllers/Family/UpdateNewRegister/' . $mother_num . '/3', 'refresh');
        }

    }
    
    
    public function DeleteMainFileAttach($id, $mother_national_num, $familyFileNum)
    {
        $this->load->model('familys_models/Attach_files');
        $this->Attach_files->delete(array("id" => $id));
          $this->message("success", "تم حذف المرفق بنجاح");
        redirect('family_controllers/Family/UpdateNewRegister/' . $mother_national_num . '/3', 'refresh');
    }
    
    
        public function DeleteMember($id, $file, $table)
    {
        $this->load->model("familys_models/NewRegister");
        $this->NewRegister->DeleteMember($id, $table);
           $this->message("success", "تم حذف  بيانات الفرد بنجاح");
        redirect('family_controllers/Family/UpdateNewRegister/' . $file . '/2', 'refresh');
    }


  public function UpdateNewMember($mother_num, $id)
    { // family_controllers/Family/UpdateNewMember
        $this->load->model("familys_models/NewRegister");

        if ($this->input->post('UPDTATE_member')) {
            $this->NewRegister->update_member($id);
          //  $this->message("success", "تم تعديل  طلب التسجيل بنجاح");
            $this->message("success", "تم تعديل  بيانات الفرد بنجاح");
            redirect('family_controllers/Family/UpdateNewRegister/' . $mother_num . '/2');
        }

    }
    
    
    public function Update_mem($mother_num)
    {
        $this->load->model("familys_models/NewRegister");
        if ($this->input->post('UPDTATE') == 'UPDTATE') {
            $this->NewRegister->insert_meme($mother_num);
            $this->message("success", "تم تعديل  طلب التسجيل بنجاح");
            redirect('family_controllers/Family/UpdateNewRegister/' . $mother_num . '/2', 'refresh');
        }
    }    


     public function kroky()
    {
   

           $data['subview'] = 'admin/familys_views/kroky_view';
           $this->load->view('admin_index', $data);

    }
/***********************************/
public function print_prime_houe()
{
    $this->load->model("familys_models/NewRegister");
    $this->load->model('familys_models/House');

    $mother_national_num = $this->input->post('mother_num');
    $data['result'] = $this->NewRegister->get_by_mother_num_regester($mother_national_num);

    $data['house_data'] = $this->House->getById($mother_national_num);
    $data_in = $data["house_data"];
    if (isset($data_in) && !empty($data_in) && $data_in != null) {
        $data['area'] = $this->House->select_from_setting('area_settings',array('id'=>$data_in["h_area_id_fk"]));
        $data['city'] = $this->House->select_from_setting('area_settings',array('id'=>$data_in["h_city_id_fk"]));
        $data['centers'] = $this->House->select_from_setting('area_settings',array('id'=>$data_in["h_center_id_fk"]));
        $data['village'] = $this->House->select_from_setting('area_settings',array('id'=>$data_in["h_village_id_fk"]));
        $data['house_direction'] = $this->House->select_from_setting('family_setting',array('id_setting'=>$data_in["h_house_direction"]));
    }

    $this->load->view('admin/familys_views/print_houes_prim_data',$data);

}





/*********************/


   public function add_mowzfen(){
        $this->load->model('familys_models/Father');
        $this->load->model('familys_models/Mother');
        $mother_num = $this->input->post('mother_national_num');
        $data['mother_num'] = $this->input->post('mother_national_num');
        if ($this->input->post('row_id') && $this->input->post('row_id') !=0){
            $id = $this->input->post('row_id');
        } else{
            $id='';
        }
        $this->Father->insert_members_mowzfen($id);
        if ($this->input->post('row_id') && $this->input->post('deelete')){
            $this->Father->delete_members('f_member_mowazfen',$id);

        }

        $data['mowzfen']=  $this->Father->get_mems($mother_num,'f_member_mowazfen');

        $data['jobs']=  $this->Mother->get_from_family_setting(3);

        $mem = $this->Father->get_member_mowazf('f_member_mowazfen');
        $data['members_mowzfen']=$this->Father->get_members($mother_num,$mem);
     

        $this->load->view('admin/familys_views/load_pages/load_mowzfen', $data);

    }
    public function load_members(){
        $this->load->model('familys_models/Father');
        $mother_num = $this->input->post('mother_num');
        $table = $this->input->post('table');

        $mem = $this->Father->get_member_mowazf($table);

        $data['members']=$this->Father->get_members($mother_num,$mem);

        $this->load->view('admin/familys_views/load_pages/load_members_modal', $data);
    }
    public function add_member_eaqa(){
        $this->load->model('familys_models/Father');
        $this->load->model('familys_models/Mother');
        $mother_num = $this->input->post('mother_national_num');
        $data['mother_num'] = $this->input->post('mother_national_num');
        if ($this->input->post('row_id') && $this->input->post('row_id') !=0){
            $id = $this->input->post('row_id');
        }
        else{
            $id='';
        }

        if ($this->input->post('row_id') && $this->input->post('deelete')){
            $this->Father->delete_members('f_member_special_needs',$id);

        }
        $this->Father->insert_members_eaqa($id);
        $data['eaqa_mems']=  $this->Father->get_mems($mother_num,'f_member_special_needs');

        $data["diseases"] =$this->Mother->get_from_family_setting(35);
        $mem_eqa = $this->Father->get_member_mowazf('f_member_special_needs');
        $data['members_eaqa']=$this->Father->get_members($mother_num,$mem_eqa);


        $this->load->view('admin/familys_views/load_pages/load_eaqa_mem', $data);

    }

    public function add_emala(){
        $this->load->model('familys_models/Father');
        $this->load->model('familys_models/Mother');
        $mother_num = $this->input->post('mother_national_num');
        $data['mother_num'] = $this->input->post('mother_national_num');
        if ($this->input->post('row_id') && $this->input->post('row_id') !=0){
            $id = $this->input->post('row_id');
        } else{
            $id='';
        }

        if ($this->input->post('row_id') && $this->input->post('deelete')){
            $this->Father->delete_members('family_emala',$id);

        }
        $this->Father->insert_emala($id);

       $data['emala']=  $this->Father->get_mems($mother_num,'family_emala');

        $data['employment_jobs']=  $this->Mother->get_from_family_setting(64);


        $this->load->view('admin/familys_views/load_pages/load_emala', $data);

    }

    public function add_qm3ia(){
        $this->load->model('familys_models/Father');
        $this->load->model('familys_models/Mother');
        $mother_num = $this->input->post('mother_national_num');
        $data['mother_num'] = $this->input->post('mother_national_num');
        if ($this->input->post('row_id') && $this->input->post('row_id') !=0){
            $id = $this->input->post('row_id');
        } else{
            $id='';
        }
        if ($this->input->post('row_id') && $this->input->post('deelete')){
            $this->Father->delete_members('family_gameiat_help',$id);

        }
        $this->Father->insert_qm3iat($id);

        $data['qm3iat']=  $this->Father->get_mems($mother_num,'family_gameiat_help');

        $data["associations"] =$this->Mother->get_from_family_setting(65);


        $this->load->view('admin/familys_views/load_pages/load_qm3iat', $data);

    }




 } // END CLASS 