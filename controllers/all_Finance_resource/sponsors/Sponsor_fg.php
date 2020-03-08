<?php

class  Sponsor extends MY_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->library('pagination');
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }
        $this->load->model('Difined_model');
        $this->load->model('Nationality');
        $this->load->model('Department');
        $this->load->model('human_resources_model/Employee_model');
        $this->load->helper(array('url', 'text', 'permission', 'form'));
        $this->load->model('familys_models/Model_access_rule');
        $this->load->model('system_management/Groups');

        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in  = $this->Counting->get_basic_in_num();
        $this->files_basic_in  = $this->Counting->get_files_basic_in();
        $this->load->model('human_resources_model/employee_setting/Employee_setting');
        $this->load->model('human_resources_model/Finance_employee_model');
        $this->load->model('all_Finance_resource_models/sponsors/Sponsors_model');
        $this->load->model('Difined_model');
        $this->load->model("familys_models/Connection_model");

    }

    private function test($data = array())
    {

        echo "<pre>";

        print_r($data);

        echo "</pre>";

        die;

    }


    private function ara_date()
    {

        $nameday = date("l");

        $day = date("d");

        $namemonth = date("m");


        $year = date("Y");

        switch ($nameday) {

            case "Saturday":

                $nameday = "السبت";

                break;

            case "Sunday":

                $nameday = "الأحد";

                break;

            case "Monday":

                $nameday = "الاثنين";

                break;

            case "Tuesday":

                $nameday = "الثلاثاء";

                break;

            case "Wednesday":

                $nameday = "الأربعاء";

                break;

            case "Thursday":

                $nameday = "الخميس";

                break;

            case "Friday":

                $nameday = "الجمعة";

                break;

        }

        switch ($namemonth) {

            case 1:

                $namemonth = "يناير";

                break;

            case 2:

                $namemonth = "فبراير";

                break;

            case 3:

                $namemonth = "مارس";

                break;

            case 4:

                $namemonth = "إبريل";

                break;

            case 5:

                $namemonth = "مايو";

                break;

            case 6:

                $namemonth = "يونيو";

                break;

            case 7:

                $namemonth = "يوليو";

                break;

            case 8:

                $namemonth = "اغسطس";

                break;

            case 9:

                $namemonth = "سبتمبر";

                break;

            case 10:

                $namemonth = "اكتوبر";

                break;

            case 11:

                $namemonth = "نوفمبر";

                break;

            case 12:

                $namemonth = "ديسمبر";

                break;

        }

        return "$nameday $day $namemonth $year";


    }

    /**
     * @param $type     success
     * @param $type     wiring
     * @param $type     error
     */
    private function message($type, $text)
    {

        if ($type == 'success') {

            return $this->session->set_flashdata('message', '<div class="hidden-print alert alert-success alert-dismissible shadow" data-sr="wait 0s, then enter bottom and hustle 100%"><button type="button" class="close pull-left" data-dismiss="alert">×</button><h4 class="text-lg"><i class="fa fa-check icn-xs"></i> تم بنجاح ...</h4><p>' . $text . '!</p></div>');

        } elseif ($type == 'wiring') {

            return $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible" data-sr="wait 0.6s, then enter bottom and hustle 100%"><button type="button" class="close pull-left" data-dismiss="alert">×</button><h4 class="text-lg"><i class="fa fa-exclamation-triangle icn-xs"></i> تحذير هام ...</h4><p>' . $text . '</p></div>');

        } elseif ($type == 'error') {

            return $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" data-sr="wait 0.3s, then enter bottom and hustle 100%"><button type="button" class="close pull-left" data-dismiss="alert">×</button><h4 class="text-lg"><i class="fa fa-exclamation-circle icn-xs"></i> خطآ ...</h4><p>' . $text . '</p></div>');

        }

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

        $config['max_size'] = '1024*8';

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

    //////////////////////////////////
    private function upload_file($file_name)
    {

        $config['upload_path'] = 'uploads/files';

        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';

        $config['max_size'] = '1024*8';
        $config['overwrite'] = true;
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload($file_name)) {

            return false;

        } else {

            $datafile = $this->upload->data();

            return $datafile['file_name'];

        }

    }

    ////////////////////end of excel library option
    private function url()
    {
        unset($_SESSION['url']);
        $this->session->set_flashdata('url', 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
    }
    private function current_hjri_date()
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
        $NowDate = "".$HDays."/".$HMonths."/".$HYear." ";

        return $NowDate;
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
    ///////////////////////////////

    public function index(){}

    /************************************************************/
    public function addSponsor_maindata()	// all_Finance_resource/sponsors/Sponsor/addSponsor_maindata
    {
         $this->load->model("familys_models/Register");
        if($this->input->post('add')){
            $person_img = 'person_img';
            $file= $this->upload_image($person_img);
            $this->Sponsors_model->insert_maindata('',$file);
            $this->message('success','إضافة  بيانات الكافل');
            redirect('all_Finance_resource/sponsors/Sponsor/xyz','refresh');
        }
        
         $data["relationships"]=$this->Register->select_relashion(array('type'=>34));
   				//add
        $this->load->model('all_Finance_resource_models/settings/Finance_resource_setting');
        $data['halat_kafel'] = $this->Finance_resource_setting->all_frhk_settings('fr_kafalat_kafel_status',2);
        $data['social_status'] = $this->Difined_model->select_search_key('fr_settings','type',11);
        $data['reasons_stop'] = $this->Difined_model->select_search_key('fr_settings','type',12);
		
		//replace
		
		$data['cities']= $this->Employee_setting->select_areas();//Osama
        $data['ahais']= $this->Employee_setting->select_residentials();     
        
        
        
        
        $data['last_id'] = $this->Sponsors_model->select_last_id();
        $data['gender_data'] =$this->Sponsors_model->GetFromEmployees_settings(1);
        $data['nationality'] =$this->Sponsors_model->GetFromEmployees_settings(2);
        $data['dest_card'] =$this->Sponsors_model->GetFromFr_settings(4);
    //    $data['cities']= $this->Sponsors_model->GetFromFr_settings(6);
        $data['job_role'] = $this->Sponsors_model->GetFromFr_settings(2);
        $data['banks'] = $this->Difined_model->select_all('banks_settings','','',"id","asc");
        $data["current_hijry_year"] = $this->current_hjri_year();
        $data['type_card'] =$this->Sponsors_model->GetFromFr_settings(3);
        $data['employer'] = $this->Sponsors_model->GetFromGeneral_assembly_settings(1);
        $data['activity']= $this->Sponsors_model->GetFromFr_settings(5);
        $data['specialize']= $this->Sponsors_model->GetFromFr_settings(7);
        $data['attach_arr']= json_encode($this->Sponsors_model->GetFromFr_settings2(10));
        $data['records']= $this->Sponsors_model->select_all();
         $data['f2a'] = $this->Difined_model->select_search_key('fr_sponser_donors_setting','type',1);
         
         $data['descriptions']=$this->Sponsors_model->GetFromFr_settings(15);

         
        $data['title'] = 'إضافة  البيانات الأساسية لكافل';
        $data['subview'] = 'admin/all_Finance_resource_views/sponsors/addSponsor_maindata';
        $this->load->view('admin_index', $data);
    }


    public function updateSponsor_maindata($id)
    {
         $this->load->model("familys_models/Register");
        if($this->input->post('add')){
            $person_img = 'person_img';
            $file= $this->upload_image($person_img);
            $this->Sponsors_model->insert_maindata($id,$file);
            $this->message('success','تعديل بيانات الكافل');
            redirect('all_Finance_resource/sponsors/Sponsor/xyz','refresh');
        }


        $this->load->model('all_Finance_resource_models/settings/Finance_resource_setting');
        
         $data["relationships"]=$this->Register->select_relashion(array('type'=>34));
        
        
        $data['halat_kafel'] = $this->Finance_resource_setting->all_frhk_settings('fr_kafalat_kafel_status',2);
        $data['social_status'] = $this->Difined_model->select_search_key('fr_settings','type',11);
        $data['reasons_stop'] = $this->Difined_model->select_search_key('fr_settings','type',12);
    
	//replace
		$data['cities']= $this->Employee_setting->select_areas();//Osama
        $data['ahais']= $this->Employee_setting->select_residentials();



        $data['gender_data'] =$this->Sponsors_model->GetFromEmployees_settings(1);
        $data['nationality'] =$this->Sponsors_model->GetFromEmployees_settings(2);
        $data['dest_card'] =$this->Sponsors_model->GetFromFr_settings(4);
      //  $data['cities']= $this->Sponsors_model->GetFromFr_settings(6);
        $data['job_role'] = $this->Sponsors_model->GetFromFr_settings(2);
        $data['banks'] = $this->Difined_model->select_all('banks_settings','','',"id","asc");
        $data["current_hijry_year"] = $this->current_hjri_year();
        $data['type_card'] =$this->Sponsors_model->GetFromFr_settings(3);
        $data['employer'] = $this->Sponsors_model->GetFromGeneral_assembly_settings(1);

        $data['activity']= $this->Sponsors_model->GetFromFr_settings(5);
        $data['specialize']= $this->Sponsors_model->GetFromFr_settings(7);
        $data['result']= $this->Sponsors_model->getById($id)[0];

//echo $data['result']->halat_kafel_id;
  $data['descriptions']=$this->Sponsors_model->GetFromFr_settings(15);
 $data['k_status_data'] = $this->Difined_model->select_search_key('fr_kafalat_kafel_status','id',$data['result']->halat_kafel_id);
   $data['f2a'] = $this->Difined_model->select_search_key('fr_sponser_donors_setting','type',1);  

        $data['title'] = 'تعديل كافل';
        $data['subview'] = 'admin/all_Finance_resource_views/sponsors/addSponsor_maindata';
        $this->load->view('admin_index', $data);
    }

    
    public function delete_sponsor($id)
    {
        $this->Sponsors_model->delete($id);
        $this->message('success',' تم حذف  كافل بنجاح');
        redirect('all_Finance_resource/sponsors/Sponsor/xyz','refresh');
    }



    public function print_card($id){

        $data["result"]=$this->Sponsors_model->getById($id)[0];

        $this->load->view('admin/all_Finance_resource_views/sponsors/print/print_card',$data);
    }

    public function print_kafel_details($id){
        $data["current_hijry_year"] = $this->current_hjri_year();
        $data['gender_data'] =$this->Sponsors_model->GetFromEmployees_settings(1);
        $data['nationality'] =$this->Sponsors_model->GetFromEmployees_settings(2);
        $data['dest_card'] =$this->Sponsors_model->GetFromFr_settings(4);
        $data['cities']= $this->Sponsors_model->GetFromFr_settings(6);
        $data['job_role'] = $this->Sponsors_model->GetFromFr_settings(2);
        $data['banks'] = $this->Difined_model->select_all('banks_settings','','',"id","asc");
        $data["current_hijry_year"] = $this->current_hjri_year();
        $data['type_card'] =$this->Sponsors_model->GetFromFr_settings(3);
        $data['employer'] = $this->Sponsors_model->GetFromGeneral_assembly_settings(1);
        $data['activity']= $this->Sponsors_model->GetFromFr_settings(5);
        $data['specialize']= $this->Sponsors_model->GetFromFr_settings(7);
        $data['result']= $this->Sponsors_model->getById($id)[0];
        $data['table_images']= $this->Sponsors_model->getImagesById($id)[0];
        $this->load->view('admin/all_Finance_resource_views/sponsors/print/print_kafel_details', $data);
    }


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

    public function add_attach(){

               if($this->input->post('add')){
                   $all_img= $this->upload_muli_image("img","");
                   $this->Sponsors_model->add_attach($all_img);
                   $this->message('success','تمت إضافة المرفق بنجاح');
                   redirect('all_Finance_resource/sponsors/Sponsor/xyz','refresh');
               }
    }
    public function delete_attach()
    {
        $this->Sponsors_model->delete_attach($_POST['id']);
        echo json_encode($_POST);

    }







    public function addKfala_data($id)	// all_Finance_resource/sponsors/Sponsor/addKfala_data
    {
  /*     $armal =
            $this->Sponsors_model->getMembersArmal(array('mother.categoriey_m'=>1,'mother.halt_elmostafid_m'=>1
            ,'mother.person_type'=>62));

        echo "<pre>";
        print_r($armal[0]['main_kafalat_details']['first_date_to']);
        echo "</pre>";
        die;*/
          if($this->input->post('add')){
              $file = $this->upload_image('mostdem_img');
              
            //  $this->test($_POST);
              $this->Sponsors_model->insert_Kfala_data($file,$id);
              $this->message('success','إضافة  بيانات الكفالة');
              redirect('all_Finance_resource/sponsors/Sponsor/addKfala_data/'.$id,'refresh');
          }
          $data['last_id'] = $this->Sponsors_model->select_last_id();
          $data['gender_data'] =$this->Sponsors_model->GetFromEmployees_settings(1);
          $data['nationality'] =$this->Sponsors_model->GetFromEmployees_settings(2);
          $data['dest_card'] =$this->Sponsors_model->GetFromFr_settings(4);
          $data['cities']= $this->Sponsors_model->GetFromFr_settings(6);
          $data['job_role'] = $this->Sponsors_model->GetFromFr_settings(2);
          $data['banks'] = $this->Difined_model->select_all('banks_settings','','',"id","asc");
          $data['kfalat_types'] = $this->Difined_model->select_all('fr_kafalat_types_setting','','',"id","asc");
  /*        echo "<pre>";
          print_r(      $data['kfalat_types']);
          echo "</pre>";
          die;*/
        $data["current_hijry_year"] = $this->current_hjri_year();

        $data['type_card'] =$this->Sponsors_model->GetFromFr_settings(3);
        $data['employer'] = $this->Sponsors_model->GetFromGeneral_assembly_settings(1);
        $data['activity']= $this->Sponsors_model->GetFromFr_settings(5);
        $data['specialize']= $this->Sponsors_model->GetFromFr_settings(7);
        $data['attach_arr']= json_encode($this->Sponsors_model->GetFromFr_settings2(10));
        $data['records']= $this->Sponsors_model->select_all();
        $data['result']= $this->Sponsors_model->getById($id)[0];

        $now_date_hijri =$this->current_hjri_date();
        //$this->test($now_date_hijri);
        /*new*/
       // $data['member_js'] = $this->load->view('admin/all_Finance_resource_views/sponsors/connection_js', '', TRUE);
        //$data['member_js'] = $this->load->view('admin/family/connection_js', '', TRUE);
    //    $members = $this->Sponsors_model->HalfKafalaArray();
        /*new*/
/*        echo "<pre>";
        print_r($members);
        echo "</pre>";
        die;*/




   $data['all_kafalat']= $this->Sponsors_model->select_sponsors_kafalat($id);
        $data['title'] = 'إضافة   بيانات كفالة';
        $data['subview'] = 'admin/all_Finance_resource_views/sponsors/addKfala_data';
        $this->load->view('admin_index', $data);
    }



    public function getConnection($KafalaType)
    {
        $now_date_hijri =$this->current_hjri_date();
        if($KafalaType ==4){
            $armal = $this->Sponsors_model->getMembersArmal(array('mother.categoriey_m'=>1,'mother.halt_elmostafid_m'=>1,'mother.person_type'=>62));
           $arr2 = array();
            $arr2['data'] = array();
            $cuttent_higry_year = $this->current_hjri_year();
            if(!empty($armal)){
                foreach($armal as $row){
                    $gender = 'ذكر';
                    if ($row['m_gender'] == 2) {
                        $gender = 'أنثى';
                    }

                    $category = 'أرمل';
                    if( $row['m_birth_date_hijri'] !=''){

                        $row['m_birth_date_hijri'] =$row['m_birth_date_hijri'];

                    }else{

                        $row['m_birth_date_hijri'] ='غير محدد';
                    }

                    if( $row['m_birth_date_hijri_year'] !=''){

                        $age = $cuttent_higry_year - $row['m_birth_date_hijri_year'];

                    }else{

                        $age =0;
                    }

                     if(!empty($row['main_kafalat_details'] )){
                    $now =strtotime(date('Y-m-d'));
                    if($row['main_kafalat_details']['first_date_to']> $now){
                        continue;
                    }
                     }
                    /************************************************************/
                    /* if($row['kafala_type_fk'] ==1){
                        if($row['first_kafala_from'] !=0 && $row['first_kafala_to'] !=0){

                            continue;
                        }

                     }elseif ($row['kafala_type_fk'] ==2){
                         if($row['first_kafala_from'] !=0 && $row['first_kafala_to'] !=0 &&
                             $row['second_kafala_from'] !=0 && $row['second_kafala_to'] !=0){

                             continue;


                         }

                     }*/
                    /************************************************************/

                    /*  $k_type_arr =array('1'=>'كفالة شاملة','2'=>'نصف كفالة','3'=>'كفالة مستفيد','4'=>'كفالة أرملة');
                     $kafala_type='غير محدد';
                      if(!empty($k_type_arr[$row['kafala_type_fk']])){

                          $kafala_type =$k_type_arr[$row['kafala_type_fk']];
                      }*/
                    $arr2['data'][] = array(
                        '<input type="radio" name="choosed" value="'.$row['id'].'" onclick="getMemberData($(this).val(),'.$KafalaType.')" />',
                        $row['file_num'],
                        $row['father_name'],
                        $row['full_name'],
                        $category,
                        $gender,
                        $row['m_birth_date_hijri'],
                        $age,
                        '',
                        ''
                    );
                }
            }
            echo json_encode($arr2);
        }else{

            $type =2;
            if($KafalaType ==3){
                $type =3;
            }
            $members = $this->Sponsors_model->getMembers(array('f_members.id!='=>0,
                                                               'f_members.categoriey_member'=>$type,
                                                               'f_members.persons_status'=>1,
                                                            
                                                               ));
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

                    if( $row['member_birth_date_hijri'] !=''){

                        $row['member_birth_date_hijri'] =$row['member_birth_date_hijri'];

                    }else{

                        $row['member_birth_date_hijri'] ='غير محدد';
                    }

                    if( $row['member_birth_date_hijri_year'] !=''){

                        $age = $cuttent_higry_year - $row['member_birth_date_hijri_year'];

                    }else{

                        $age =0;
                    }
                    if(!empty($row['main_kafalat_details'] )){
                        $now =strtotime(date('Y-m-d'));
                        if($row['main_kafalat_details']['first_date_to']> $now){
                            continue;
                        }
                    }
                    /************************************************************/
                    /* if($row['kafala_type_fk'] ==1){
                        if($row['first_kafala_from'] !=0 && $row['first_kafala_to'] !=0){

                            continue;
                        }

                     }elseif ($row['kafala_type_fk'] ==2){
                         if($row['first_kafala_from'] !=0 && $row['first_kafala_to'] !=0 &&
                             $row['second_kafala_from'] !=0 && $row['second_kafala_to'] !=0){

                             continue;


                         }

                     }*/
                    /************************************************************/

                    /*  $k_type_arr =array('1'=>'كفالة شاملة','2'=>'نصف كفالة','3'=>'كفالة مستفيد','4'=>'كفالة أرملة');
                     $kafala_type='غير محدد';
                      if(!empty($k_type_arr[$row['kafala_type_fk']])){

                          $kafala_type =$k_type_arr[$row['kafala_type_fk']];
                      }*/
                    $arr['data'][] = array(
                        '<input type="radio" name="choosed" value="'.$row['id'].'" onclick="getMemberData($(this).val(),'.$KafalaType.')" />',
                        $row['file_num'],
                        $row['father_name'],
                        $row['member_full_name'],
                        $category,
                        $type,
                        $row['member_birth_date_hijri'],
                        $age,
                        '',
                        ''
                    );
                }
            }
            echo json_encode($arr);
        }

    }



    public function getMemberData()
    {
         $data['banks_accounts']= $this->Sponsors_model->select_banks_accounts();
       $data['mybanks']= $this->Sponsors_model->getBanks();
    
      $data['kafala_status'] = $this->Difined_model->select_search_key("fr_kafalat_kafel_status",'type',1);

        $data['result'] = $this->Sponsors_model->getMembers(array('f_members.id'=>$this->input->post('id')))[0];
        $data['banks'] = $this->Difined_model->select_all('banks_settings','','',"id","asc");
        $data['cuttent_higry_year'] = $this->current_hjri_year();
        $this->load->view('admin/all_Finance_resource_views/sponsors/getMemberData', $data);
    }
    
        public function getMotherData(){




            $data['banks_accounts']= $this->Sponsors_model->select_banks_accounts();

        $data['mybanks']= $this->Sponsors_model->getBanks();
       $data['kafala_status'] = $this->Difined_model->select_search_key("fr_kafalat_kafel_status",'type',1);


        $data['result'] = $this->Sponsors_model->getMother(array('mother.id'=>$this->input->post('id')))[0];



        $data['banks'] = $this->Difined_model->select_all('banks_settings','','',"id","asc");
        $data['cuttent_higry_year'] = $this->current_hjri_year();
        $this->load->view('admin/all_Finance_resource_views/sponsors/getMemberData', $data);
    }
    
    
    


public function GetAccounts(){
    $mybanks= $this->Sponsors_model->getBanks($_POST['account_id']);
    //$data['vacation_start'] = date('Y-m-d', strtotime($date));
    echo json_encode($mybanks);
}

    public function GetSidebarData(){
        if($this->input->post('kafalaType') ==4){
            $data['result'] = $this->Sponsors_model->getMembersArmal(array('mother.mother_national_num_fk'=>$this->input->post('id')))[0];

        }else{
            $data['result'] = $this->Sponsors_model->getMembers(array('f_members.id'=>$this->input->post('id')))[0];

        }
        $data['kafalaType']=$this->input->post('kafalaType');
        echo json_encode($data);
    }

/******************************/
public function GetBankAccount(){


    $arr =array('account_id_fk'=>$_POST['account_id_fk'],'bank_id_fk'=>$_POST['bank_id']);
    $accounts = $this->Sponsors_model->GetBankAccount($arr);

    echo json_encode($accounts);
}
/****************************************************************/

   public function xyz()
    {
        /*
        $this->load->model("familys_models/Register");
        $data["relationships"]=$this->Register->select_relashion(array('type'=>34));*/
        //add
        $this->load->model('all_Finance_resource_models/settings/Finance_resource_setting');
        $data['halat_kafel'] = $this->Finance_resource_setting->all_frhk_settings('fr_kafalat_kafel_status',2);
        $data['social_status'] = $this->Difined_model->select_search_key('fr_settings','type',11);
        $data['reasons_stop'] = $this->Difined_model->select_search_key('fr_settings','type',12);

        //replace

        $data['cities']= $this->Employee_setting->select_areas();//Osama
        $data['ahais']= $this->Employee_setting->select_residentials();


        $data['result']= $this->Sponsors_model->getById(0)[0];

        $data['last_id'] = $this->Sponsors_model->select_last_id();
        $data['gender_data'] =$this->Sponsors_model->GetFromEmployees_settings(1);
        $data['nationality'] =$this->Sponsors_model->GetFromEmployees_settings(2);
        $data['dest_card'] =$this->Sponsors_model->GetFromFr_settings(4);
        //    $data['cities']= $this->Sponsors_model->GetFromFr_settings(6);
        $data['job_role'] = $this->Sponsors_model->GetFromFr_settings(2);
        $data['banks'] = $this->Difined_model->select_all('banks_settings','','',"id","asc");
        $data["current_hijry_year"] = $this->current_hjri_year();
        $data['type_card'] =$this->Sponsors_model->GetFromFr_settings(3);
        $data['employer'] = $this->Sponsors_model->GetFromGeneral_assembly_settings(1);
        $data['activity']= $this->Sponsors_model->GetFromFr_settings(5);
        $data['specialize']= $this->Sponsors_model->GetFromFr_settings(7);
        $data['attach_arr']= json_encode($this->Sponsors_model->GetFromFr_settings2(10));
        $data['records']= $this->Sponsors_model->select_all();
        $data['f2a'] = $this->Difined_model->select_search_key('fr_sponser_donors_setting','type',1);
        $data['title']="الكفلاء";
        $data['records']= $this->Sponsors_model->select_all();
        $data['customer_js'] = $this->load->view('admin/all_Finance_resource_views/sponsors/app_js', '', TRUE);
        $this->load->view('admin/all_Finance_resource_views/sponsors/app', $data);
    }
	
	public function form()
{
    /*  $this->load->model("familys_models/Register");
        $data["relationships"]=$this->Register->select_relashion(array('type'=>34));
   
    $data["relationships"]=$this->Register->select_relashion(array('type'=>34));*/
    //add
    $this->load->model('all_Finance_resource_models/settings/Finance_resource_setting');
    $data['halat_kafel'] = $this->Finance_resource_setting->all_frhk_settings('fr_kafalat_kafel_status',2);
    $data['social_status'] = $this->Difined_model->select_search_key('fr_settings','type',11);
    $data['reasons_stop'] = $this->Difined_model->select_search_key('fr_settings','type',12);

    //replace

    $data['cities']= $this->Employee_setting->select_areas();//Osama
    $data['ahais']= $this->Employee_setting->select_residentials();


    $data['result']= $this->Sponsors_model->getById(0)[0];

    $data['last_id'] = $this->Sponsors_model->select_last_id();
    $data['gender_data'] =$this->Sponsors_model->GetFromEmployees_settings(1);
    $data['nationality'] =$this->Sponsors_model->GetFromEmployees_settings(2);
    $data['dest_card'] =$this->Sponsors_model->GetFromFr_settings(4);
    //    $data['cities']= $this->Sponsors_model->GetFromFr_settings(6);
    $data['job_role'] = $this->Sponsors_model->GetFromFr_settings(2);
    $data['banks'] = $this->Difined_model->select_all('banks_settings','','',"id","asc");
    $data["current_hijry_year"] = $this->current_hjri_year();
    $data['type_card'] =$this->Sponsors_model->GetFromFr_settings(3);
    $data['employer'] = $this->Sponsors_model->GetFromGeneral_assembly_settings(1);
    $data['activity']= $this->Sponsors_model->GetFromFr_settings(5);
    $data['specialize']= $this->Sponsors_model->GetFromFr_settings(7);
    $data['attach_arr']= json_encode($this->Sponsors_model->GetFromFr_settings2(10));
    $data['records']= $this->Sponsors_model->select_all();
    $data['f2a'] = $this->Difined_model->select_search_key('fr_sponser_donors_setting','type',1);

    $data['descriptions']=$this->Sponsors_model->GetFromFr_settings(15);
    $this->load->view('admin/all_Finance_resource_views/sponsors/form',$data);
}

    public function data()
    {
        

        $customer= $this->Sponsors_model->select_all();



        $arr = array();
        $arr['data'] = array();
        if(!empty($customer)){
            $x = 0;
            foreach($customer as $row){
                $x++;

                $link ='onclick="modal_link('.$row->id.');"';

/*$row->k_national_num*/
 $confim = 'onclick="return confirm("هل انت متأكد من عملية الحذف؟");"';

                $arr['data'][] = array(


                    $x,
                    $row->k_num,
                    $row->k_name,
                    
                    
                    $row->fe2a_title['title']
                   , 
            $row->kafel_status['title']
  

                    ,

                    '
                 
    
     <div class="btn-group">
                                            <button type="button" class="btn  btn-primary">اضافه</button>
                                            <button type="button" class="btn  btn-primary dropdown-toggle"
                                                    data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                <span class="caret"></span>
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a target="_blank"
                                                       href="'.base_url().'all_Finance_resource/sponsors/Sponsor/addKfala_data/'.$row->id.'">
                                                       بيانات
                                                        الكفالة </a></li>
                                            </ul>
                                        </div>
    
    
   
  ',
               '
  <button type="button"  class="myModal  btn  btn-sm btn-add" '.$link.' data-toggle="modal"
 
                                               
                                                data-target="#myModal'.$row->id.'">
                                                <i class="fa fa-list btn-sm"></i>
                                                تفاصيل الكافل
                                        </button>
  ',
                    '
 <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                               
                                                data-target="#myModal_attach'.$row->id.'">
                                                <i class="fa fa-upload " aria-hidden="true"></i>

                                                إضافة مرفق
                                        </button>
  ','
     <a 
                                           data-toggle="modal" '.$link.'data-target="#modal-delete"
                                           title="حذف"> <i class="fa fa-trash"
                                                           aria-hidden="true"></i> </a>
  
<a href="'.base_url().'all_Finance_resource/sponsors/Sponsor/updateSponsor_maindata/'.$row->id.'"><i
                                                class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                                                <a href="'.base_url().'all_Finance_resource/sponsors/Sponsor/print_kafel_details/'.$row->id.'"
                                           target="_blank">
                                            <i class="fa fa-print" aria-hidden="true"></i> </a>
                                              <a href="'.base_url().'all_Finance_resource/sponsors/Sponsor/print_card/'.$row->id.'"
                                           target="_blank">
                                            <i style="background-color: #0a568c" class="fa fa-print"
                                               aria-hidden="true"></i> </a>
                                                
 

                                        
  
  '

                );
            }
        }
        $json = json_encode($arr);
        echo $json;
    }
    
    
    public function fill_select()
{
    $this->load->model("familys_models/Register");
    if($this->input->post('f2a')==2){
        $data['relationships']=$this->Sponsors_model->GetFromFr_settings(15);
    }else{
        $data["relationships"]=$this->Register->select_relashion(array('type'=>34));

    }

    $this->load->view('admin/all_Finance_resource_views/sponsors/load_select_page', $data);
}
        


    /************************************************************/
}//END CLASS
