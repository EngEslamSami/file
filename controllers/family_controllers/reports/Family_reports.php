<?php
class Family_reports extends MY_Controller
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
 *  ===================================================تقرير=============================================================
 *
 *  ================================================================================================================
 */
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


    public function  index(){    // family_controllers/Family_reports

    }
    /**
 *  ================================================================================================================
 *
 *  ===================================================تقرير بأبناء الاسر=============================================================
 *
 *  ================================================================================================================
 */

     public function  f_member_report(){    // family_controllers/reports/Family_reports/f_member_report
     $this->load->model("familys_models/reports/Reports_model");
     
     if($this->input->post('gender') && $this->input->post('operation_id_fk') && $this->input->post('age_data')){
        $currnt_year =$this->current_hjri_year();
        $age =$currnt_year- $this->input->post('age_data');  
        $data['result'] = $this->Reports_model->get_f_members($age,$currnt_year);
         $this->load->view('admin/familys_views/family_report/f_member_report/get_data',$data);
     }else{
      $data['title'] = 'تقرير بأبناء الاسر';
      $data['metakeyword'] = 'تقرير بأبناء الاسر';
      $data['metadiscription'] = '';
      $data['subview'] = 'admin/familys_views/family_report/f_member_report/f_member_report';
      $this->load->view('admin_index', $data);  
     }
    
    }
       /**
 *  ================================================================================================================
 *
 *  ===================================================تقرير طلبات الأسر'=============================================================
 *
 *  ================================================================================================================
 */ 
    
        public function  familys_request(){    // family_controllers/reports/Family_reports/familys_request
     $this->load->model("familys_models/reports/Reports_model");
     
     if($this->input->post('status_id_fk')){
         $data['result'] = $this->Reports_model->get_familys_request();
         $this->load->view('admin/familys_views/family_report/familys_request/get_data',$data);
     }else{
      $data['title'] = 'تقرير طلبات الأسر';
      $data['metakeyword'] = 'تقرير طلبات الأسر';
      $data['metadiscription'] = '';
      $data['subview'] = 'admin/familys_views/family_report/familys_request/familys_request';
      $this->load->view('admin_index', $data);  
     }
    
    }
    
           /**
 *  ================================================================================================================
 *
 *  ===================================================تقرير طلبات الأسر من فترة الي فترة'=============================================================
 *
 *  ================================================================================================================
 */
             public function  familys_request_period(){ // family_controllers/Family_reports/familys_request_period
     $this->load->model("familys_models/reports/Reports_model");
     
     if($this->input->post('status_id_fk') && $this->input->post('to_date') && $this->input->post('from_date') ){
         
          $from= strtotime($this->input->post('from_date'));
           $to= strtotime($this->input->post('to_date'));
          
       
           
         $data['result'] = $this->Reports_model->get_familys_request_period($from,$to);
         
         $this->load->view('admin/familys_views/family_report/familys_request_period/get_data',$data);
     }else{
      $data['title'] = 'تقرير طلبات الأسر من فترة الي فترة';
      $data['metakeyword'] = 'تقرير طلبات الأسر من فترة الي فترة';
      $data['metadiscription'] = '';
      $data['subview'] = 'admin/familys_views/family_report/familys_request_period/familys_request_period';
      $this->load->view('admin_index', $data);  
     }
    
    }
    
    
      public function  f_memberYearAgesReport(){    // family_controllers/reports/Family_reports/f_memberYearAgesReport
        $this->load->model("familys_models/reports/Reports_model");
        $this->load->model("familys_models/Register");
        $data['member_family_status']=$this->Register->get_all_files_status();
        if($this->input->post('gender') && $this->input->post('year_hegri')){
            $gender = $this->input->post('gender');
            $year_hegri = $this->input->post('year_hegri');
            $year_current = $this->current_hjri_year();
            $data['result'] = $this->Reports_model->getMemberYearAges($year_hegri,$gender,$year_current);
            $this->load->view('admin/familys_views/family_report/f_member_report/get_year_data',$data);
        }else{
            $data['title'] = 'تقرير باعمار أبناء الاسر';
            $data['subview'] = 'admin/familys_views/family_report/f_member_report/f_member_year_age_report';
            $this->load->view('admin_index', $data);
        }

    }
    
 /*******************************************************************/   
public function contacts()
    {
       $data['customer_js'] = $this->load->view('admin/familys_views/family_report/n_report/app_js', '', TRUE);
        $this->load->view('admin/familys_views/family_report/n_report/app', $data);
    }    
         public function data()
    {
           $this->load->model("familys_models/reports/Reports_model");
      //  $customer = $this->ALLtest->get_all();
        $customer = $this->Reports_model->get_gggg();
       
       /*
       echo '<pre>';
       print_r($customer);
        echo '<pre>';*/
       
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
                   $file_colors = '#00ff00';
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
                
                if($row['mother_mob'] != '' and $row['mother_mob'] != null){
                    $mother_mob = $row['mother_mob'];
                  }else{
                  $mother_mob = '<span class="label label-pill label-danger m-r-15">إستكمل البيانات</span>';
                  }
                  
                   if($row['mother_another_mob'] != '' and $row['mother_another_mob'] != null){
                    $mother_another_mob = $row['mother_another_mob'];
                  }else{
                  $mother_another_mob = '<span class="label label-pill label-danger m-r-15">إستكمل البيانات</span>';
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
                   $mother_mob,
                   $mother_another_mob,
                     '
  <button style="color:black ; background-color:'.$file_colors.'  " 
         data-toggle="modal" data-target="#modal-info" class="btn btn-sm btn-">
      <i class="fa fa-list btn-"></i> '.$file_status.'</button>
  '

                     
                );
            }


        }
        $json = json_encode($arr);
        echo $json;
    }
    
    
    public function connection()
    {
      $data['member_js'] = $this->load->view('admin/family/connection_js', '', TRUE);
      $this->load->view('admin/familys_views/family_report/n_report/connection', $data);
    }
    
    
   public function getMemberData()
    {
      $this->load->model("familys_models/Connection_model");
      $data['result'] = $this->Connection_model->getMembers(array('f_members.id'=>$this->input->post('id')))[0];
      $data['cuttent_higry_year'] = $this->current_hjri_year();
      $this->load->view('admin/family/getMemberData', $data);
    }  
    
    /*********************************************************************/
    
    
                 public function  R_all_members(){    // family_controllers/reports/Family_reports/R_all_members
     $this->load->model("familys_models/reports/Reports_model");
  $data['title'] = 'تقرير أبناء الأسرة';
       $data['result'] = $this->Reports_model->select_all_f_members();
      $data['subview'] = 'admin/familys_views/family_report/familys_request/r_all_members';
      $this->load->view('admin_index', $data);  
    
     
    }
    
    
    
    //******************* 31-12-om ***************************
public function all_files()
{ //family_controllers/reports/Family_reports/all_files
    $this->load->model('familys_models/reports/Reports_model');
    $data['category'] = $this->Reports_model->get_category();
    $data['file_status'] = $this->Reports_model->get_file_satus();
    $data['title'] = "تقرير المستفيدين";
    $data['subview'] = 'admin/familys_views/family_report/n_report/beneficiaries_report';
    $this->load->view('admin_index', $data);

}

//    ******************* 31-12-om ***************************
public function search()
{
    $this->load->model('familys_models/reports/Reports_model');
    $data_sear['file_status'] = $this->input->post('file_status');
    $data_sear['category'] = $this->input->post('category');
//        $this->test($data_sear);
    $data['records'] = $this->Reports_model->select_all($data_sear);
//       $this->test($data['records'] );
    $data['title'] = "تقرير المستفيدين";
    $this->load->view('admin/familys_views/family_report/n_report/table_report', $data);
}

//    ******************* 31-12-om ***************************

  public function all_ttest()
{$this->load->model('familys_models/reports/Reports_model');
   $data['all_bale3'] = $this->Reports_model->select_bale3_full_active_test();



        $data['all_data_count'] = $this->Reports_model->GetAll();  
    $data['title'] = "تقرير المستفيدين";


        $data['subview'] = 'admin/familys_views/family_report/n_report/all_ttest'; 
    $this->load->view('admin_index', $data);
}
  
  
  
 public function category_report(){ // family_controllers/reports/Family_reports/category_report

        $this->load->model('familys_models/reports/Reports_model');
        $data['all_families'] = $this->Reports_model->get_basic_data();
        $data['title'] = "تقرير  فئات الأسر";
        $data['subview'] = 'admin/familys_views/family_report/category_report/report_view';
        $this->load->view('admin_index', $data);

    }
  
    public function association_report(){ // family_controllers/reports/Family_reports/association_report

      $this->load->model('familys_models/reports/Reports_model');

      $data['title'] = "تقرير الجمعيات المستفاد منها";
      $data['subview'] = 'admin/familys_views/family_report/association_report/report_view';
      $this->load->view('admin_index', $data);

 }
 public function search_result(){
     $this->load->model('familys_models/reports/Reports_model');

         $value = $this->input->post('value');
         $data['value']=$value;
         $data['all_families']= $this->Reports_model->get_all_families($value);
         $this->load->view('admin/familys_views/family_report/association_report/search_result',$data);


 }
 
 
  /*public function report_health()//family_controllers/reports/Family_reports/report_health
    {
        $this->load->model('Difined_model');

        $data["diseases"] = $this->Difined_model->select_search_key('family_setting', 'type', 35);
        $data["responses"] = $this->Difined_model->select_search_key('family_setting', 'type', 36);
        $data["diseases_status"] = $this->Difined_model->select_search_key('family_setting', 'type', 37);
        $data["health_status_array"] = $this->Difined_model->select_search_key('family_setting', 'type', 6);

        $data['title'] = 'تقرير حالة الصحية';
        $data['subview'] = 'admin/familys_views/reports/report_health';
        $this->load->view('admin_index', $data);
    }   
    public function report_health_search()
    {
        $this->load->model('familys_models/reports/Reports_model');


        $type_member = $this->input->post('type_member');
            if (!empty($type_member) &&($type_member !=0)) {
              $data['result'] = $this->Reports_model->report_health_search($type_member);
            }else{
              $data['result'] = array();
              $data_1=$this->Reports_model->report_health_search(1);
              $data_2=$this->Reports_model->report_health_search(2);
              $data['result']=array_merge($data_1,$data_2);
            }


        $this->load->view('admin/familys_views/reports/report_health_search_result', $data);
    }
    */
    
     public function report_health()//family_controllers/reports/Family_reports/report_health
    {
        $this->load->model('Difined_model');
        $this->load->model('Difined_model_new');

        $data['category']=$this->Difined_model_new-> select_where("family_category",  array( ),'');

        $data["diseases"] = $this->Difined_model->select_search_key('family_setting', 'type', 35);
        $data["responses"] = $this->Difined_model->select_search_key('family_setting', 'type', 36);
        $data["diseases_status"] = $this->Difined_model->select_search_key('family_setting', 'type', 37);
        $data["health_status_array"] = $this->Difined_model->select_search_key('family_setting', 'type', 6);

        $data['title'] = 'تقرير حالة الصحية';
        $data['subview'] = 'admin/familys_views/reports/report_health';
        $this->load->view('admin_index', $data);
    }   
    
    
    public function report_health_search()
    {
        $this->load->model('familys_models/reports/Reports_model');

        
        $year_current = $this->current_hjri_year();

        $type_member = $this->input->post('type_member');
            if (!empty($type_member) &&($type_member !=0)) {
              $data_qurey = $this->Reports_model->report_health_search($type_member,$year_current)['result'];
              $data['result'] = $data_qurey['result'];
              $data['count_'.$type_member] = $data_qurey['count'];
            }else{
              $data['result'] = array();
              $data_qurey=$this->Reports_model->report_health_search(1,$year_current);
              $data_1 = $data_qurey['result'];
              $data['count_1'] = $data_qurey['count'];
              if (!empty($data_1)) {
                $data['result']=$data_1;
              }

              $data_qurey=$this->Reports_model->report_health_search(2,$year_current);
              $data_2 = $data_qurey['result'];
              $data['count_2'] = $data_qurey['count'];
              if (!empty($data_2)) {
                $data['result']=$data_2;
              }
              if ((!empty($data_1)) && (!empty($data_2 ))) {
                $data['result']=array_merge($data_1,$data_2);
              }
            }


        $this->load->view('admin/familys_views/reports/report_health_search_result', $data);
     }

    public function getConnection_file_num()
    {
      $this->load->model('familys_models/reports/Reports_model');

      $all_files = $this->Reports_model->get_files_num();
        $arr_eiles = array();
        $arr_eiles['data'] = array();

        if (!empty($all_files)) {
            foreach ($all_files as $row_file) {
                $arr_eiles['data'][] = array(
                    '<input type="radio" name="choosed" value="' . $row_file->file_num . '"
                       ondblclick="Get_file_num(this)"
                        id="member' . $row_file->file_num . '"
                        data-file_num="' . $row_file->file_num . '"
                         />',
                    $row_file->file_num,
                    $row_file->father_name,
                    $row_file->mother_name,

                    ''
                );
            }
        }
        echo json_encode($arr_eiles);
    }
    
  /*  public function report_health_search()
    {
        $this->load->model('familys_models/reports/Reports_model');

        
        $year_current = $this->current_hjri_year();

        $type_member = $this->input->post('type_member');
            if (!empty($type_member) &&($type_member !=0)) {
              $data['result'] = $this->Reports_model->report_health_search($type_member,$year_current);
            }else{
              $data['result'] = array();
              $data_1=$this->Reports_model->report_health_search(1,$year_current);
              if (!empty($data_1)) {
                $data['result']=$data_1;
              }

              $data_2=$this->Reports_model->report_health_search(2,$year_current);
              if (!empty($data_2)) {
                $data['result']=$data_2;
              }
              if ((!empty($data_1)) && (!empty($data_2 ))) {
                $data['result']=array_merge($data_1,$data_2);
              }
            }


        $this->load->view('admin/familys_views/reports/report_health_search_result', $data);
     }*/
    
public function report_mostafed()//family_controllers/reports/Family_reports/report_mostafed
{
    $this->load->model('Difined_model');
    $this->load->model('Difined_model_new');
    $this->load->model('familys_models/reports/Reports_model');

    $data['category'] = $this->Difined_model_new->select_where("family_category", array(), '');
    $data["education_status"] = $this->Difined_model->select_search_key('family_setting', 'type', 40);
    $data["all_h_village"] = $this->Reports_model->get_all_h_village();

    $data['title'] = 'تقرير المستفيدين ';
    $data['subview'] = 'admin/familys_views/reports/report_mostafed';
    $this->load->view('admin_index', $data);
}
public function report_mostafed_search()
{
    $this->load->model('familys_models/reports/Reports_model');

    $year_current = $this->current_hjri_year();

    $type_member = $this->input->post('type_member');

    if (!empty($type_member) && ($type_member != 0)) {
        $data_qurey = $this->Reports_model->report_mostafed_search($type_member, $year_current);
        $data['result'] = $data_qurey;
    } else {
        $data['result'] = array();
        $data_qurey = $this->Reports_model->report_mostafed_search(1, $year_current);
        $data_1 = $data_qurey;
        if (!empty($data_1)) {
            $data['result'] = $data_1;
        }

        $data_qurey = $this->Reports_model->report_mostafed_search(2, $year_current);
        $data_2 = $data_qurey;
        if (!empty($data_2)) {
            $data['result'] = $data_2;
        }
        if ((!empty($data_1)) && (!empty($data_2))) {
            $data['result'] = array_merge($data_1, $data_2);
        }
    }

    $this->load->view('admin/familys_views/reports/report_mostafed_search_result', $data);
}
    
    
    }
    ?>
