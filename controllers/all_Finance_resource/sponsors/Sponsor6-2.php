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


    public function addSponsor_maindata($id=false)	// all_Finance_resource/sponsors/Sponsor/addSponsor_maindata
    {
        $this->load->model("familys_models/Register");
      
      /*  if($this->input->post('add') ){
            $person_img = 'person_img';
            $file= $this->upload_image($person_img);
            $this->Sponsors_model->insert_maindata($id,$file);
            $this->message('success','إضافة  بيانات الكافل');
            if($this->input->post('add')  === 'xyz'){
                redirect('all_Finance_resource/sponsors/Sponsor/'.$this->input->post('add')  , 'refresh');
            }elseif ($this->input->post('add')  ==='addSponsor_maindata'){
                redirect('all_Finance_resource/sponsors/Sponsor/addSponsor_maindata/'.$id  , 'refresh');
        
            }

        }*/
        
             if($this->input->post('add') ){
            $person_img = 'person_img';
            $file= $this->upload_image($person_img);
            $last_id = $this->Sponsors_model->insert_maindata($id,$file);
            $this->message('success','إضافة  بيانات الكافل');
            if($this->input->post('add')  === 'xyz'){
                redirect('all_Finance_resource/sponsors/Sponsor/'.$this->input->post('add')  , 'refresh');
            }elseif ($this->input->post('add')  ==='addSponsor_maindata'){ 
                redirect('all_Finance_resource/sponsors/Sponsor/addKfala_data/'.$last_id  , 'refresh');
            }elseif ($this->input->post('add')  ==='save_data'){ 
                redirect('all_Finance_resource/sponsors/Sponsor/addSponsor_maindata/'.$last_id  , 'refresh');
            }




        }

        $data["relationships"]=$this->Register->select_relashion(array('type'=>34));
        //add
        $this->load->model('all_Finance_resource_models/settings/Finance_resource_setting');
        $data['halat_kafel'] = $this->Finance_resource_setting->all_frhk_settings('fr_kafalat_kafel_status',2);
        $data['social_status'] = $this->Difined_model->select_search_key('fr_settings','type',11);
        $data['reasons_stop'] = $this->Difined_model->select_search_key('fr_settings','type',12);
        

        $data['cities']= $this->Employee_setting->select_areas();//Osama
        $data['ahais']= $this->Employee_setting->select_residentials();




        $data['last_id'] = $this->Sponsors_model->select_last_k_num();
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
          
              $data['res_fe2a']="";
  
        if(!empty($id)){
            $data['result']= $this->Sponsors_model->getById($id)[0];
             $data['res_fe2a']= $this->Sponsors_model->get_fe2a_by_id($data['result']->fe2a_type);
            $data['k_status_data'] = $this->Difined_model->select_search_key('fr_kafalat_kafel_status','id',$data['result']->halat_kafel_id);

        }

        $data['descriptions']=$this->Sponsors_model->GetFromFr_settings(15);


        $data['page_title'] = 'إضافة  البيانات الأساسية لكافل';
        $data['subview'] = 'admin/all_Finance_resource_views/sponsors/kafel_data';
        $this->load->view('admin_index', $data);
    }



    /************************************************************/
/*    public function addSponsor_maindata()	// all_Finance_resource/sponsors/Sponsor/addSponsor_maindata
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
*/

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

        $data['titles'] = 'تعديل كافل';
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
        $result_id = $this->uri->segment(6);
        if(!empty( $result_id)){
            $data['kafala_status'] = $this->Difined_model->select_search_key("fr_kafalat_kafel_status",'type',1);
            $data['banks_accounts']= $this->Sponsors_model->select_banks_accounts();
            $data['mybanks']= $this->Sponsors_model->getBanks();
            $data['result_Kfala_data']= $this->Sponsors_model->getById_main_kafalat_detai($result_id);
            $data['gamia_banks']= $this->Sponsors_model->getBanks( $data['result_Kfala_data']['gamia_account']);
            $arr =array('account_id_fk'=>$data['result_Kfala_data']['gamia_account'],'bank_id_fk'=>$data['result_Kfala_data']['gamia_bank_id_fk']);
            $data['gamia_account_numbers'] = $this->Sponsors_model->GetBankAccount($arr);

            if( $data['result_Kfala_data']['kafala_type_fk'] ==4){

                $data['armal'] = $this->Sponsors_model->getMembersArmal(array('mother.id'=>$data['result_Kfala_data']['person_id_fk'],'mother.categoriey_m'=>1,'mother.halt_elmostafid_m'=>1,'mother.person_type'=>62));


            }else{
                $type =2;
                if($data['result_Kfala_data']['kafala_type_fk']==3){
                    $type =3;
                }

                $data['members'] = $this->Sponsors_model->getMembers(array(
                    'f_members.id'=>$data['result_Kfala_data']['person_id_fk'],
                    'f_members.categoriey_member'=>$type,
                    'f_members.persons_status'=>1,

                ));
            }
          }




          if($this->input->post('add')){
              $file = $this->upload_image('mostdem_img');
              
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
 
        $data["current_hijry_year"] = $this->current_hjri_year();

        $data['type_card'] =$this->Sponsors_model->GetFromFr_settings(3);
        $data['employer'] = $this->Sponsors_model->GetFromGeneral_assembly_settings(1);
        $data['activity']= $this->Sponsors_model->GetFromFr_settings(5);
        $data['specialize']= $this->Sponsors_model->GetFromFr_settings(7);
        $data['attach_arr']= json_encode($this->Sponsors_model->GetFromFr_settings2(10));
        $data['records']= $this->Sponsors_model->select_all();
        $data['result']= $this->Sponsors_model->getById($id)[0];

        $now_date_hijri =$this->current_hjri_date();
 



   $data['all_kafalat']= $this->Sponsors_model->select_sponsors_kafalat($id);






        $data['title'] = 'إضافة   بيانات كفالة';
        $data['subview'] = 'admin/all_Finance_resource_views/sponsors/addKfala_data';
        $this->load->view('admin_index', $data);
    }



   /* public function addKfala_data($id)	// all_Finance_resource/sponsors/Sponsor/addKfala_data
    {



          if($this->input->post('add')){
              $file = $this->upload_image('mostdem_img');
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

        $data["current_hijry_year"] = $this->current_hjri_year();

        $data['type_card'] =$this->Sponsors_model->GetFromFr_settings(3);
        $data['employer'] = $this->Sponsors_model->GetFromGeneral_assembly_settings(1);
        $data['activity']= $this->Sponsors_model->GetFromFr_settings(5);
        $data['specialize']= $this->Sponsors_model->GetFromFr_settings(7);
        $data['attach_arr']= json_encode($this->Sponsors_model->GetFromFr_settings2(10));
        $data['records']= $this->Sponsors_model->select_all();
        $data['result']= $this->Sponsors_model->getById($id)[0];

        $now_date_hijri =$this->current_hjri_date();

        $data['all_kafalat']= $this->Sponsors_model->select_sponsors_kafalat($id);
        $data['title'] = 'إضافة   بيانات كفالة';
        $data['subview'] = 'admin/all_Finance_resource_views/sponsors/addKfala_data';
        $this->load->view('admin_index', $data);
    }
*/


    public function updateKfala_data()
    {
        $id=$_POST['id'];
        $kafel_id_fk =$_POST['kafel_id_fk'];

          if($this->input->post('add') ==='add'){
              $file = $this->upload_image('mostdem_img');
              $this->Sponsors_model->update_Kfala_data($file,$id);
              $this->message('success','تعديل  بيانات الكفالة');
              redirect('all_Finance_resource/sponsors/Sponsor/addKfala_data/'.$kafel_id_fk,'refresh');
          }
        }
/*
    public function updateKfala_data($id)	
    {



          if($this->input->post('add')){
             
              $file = $this->upload_image('mostdem_img');
              $this->Sponsors_model->update_Kfala_data($file,$id);
              $this->message('success','تعديل  بيانات الكفالة');
              redirect('all_Finance_resource/sponsors/Sponsor/addKfala_data/'.$_POST['kafel_id_fk'],'refresh');
          }
        }*/

    public function deleteKfala_data($id,$kafel_id)
    {
        $this->Sponsors_model->deleteKfala_data($id);
        $this->message('success',' تم حذف  بيانات الكفالة بنجاح');
        redirect('all_Finance_resource/sponsors/Sponsor/addKfala_data/'.$kafel_id,'refresh');
    }
    
      public function getConnection($KafalaType)
    {
        $now_date_hijri =$this->current_hjri_date();
        if($KafalaType ==4){

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


            $armal = $this->Sponsors_model->getMembersArmal(array('mother.categoriey_m'=>1,'mother.halt_elmostafid_m'=>1,'mother.person_type'=>62));
           $arr2 = array();
            $arr2['data'] = array();
            $cuttent_higry_year = $this->current_hjri_year();
            if(!empty($armal)){
                foreach($armal as $row){

                    $radio ='<input type="radio" name="choosed"  value="'.$row['id'].'" onclick="getMemberData($(this).val(),'.$KafalaType.')" />';

                    

                    $gender = 'ذكر';
                    if ($row['m_gender'] == 2) {
                        $gender = 'أنثى';
                    }

                    $category = 'أرملة';
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
                    if($row['main_kafalat_details']['first_date_to'] > $now){
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
                        $radio,
                        $row['file_num'],
                        $row['father_name'],
                        $row['full_name'],
                        $category,
                        $gender,
                        $row['m_birth_date_hijri'],
                        $age,
                        $Fe2z_name,
                        '<span style="background-color: '.$row['halt_elmostafid_color'].'; padding:.2em .6em .3em;" >
                         '.$row['halt_elmostafid_title'].'</span>'
                    ,'                
 ',

                    );
                }
            }
            echo json_encode($arr2);
        }else{

           // $type =2;
            if($KafalaType ==2){
                $type=2;
                $members = $this->Sponsors_model->getMembers(array('f_members.id!='=>0,
                    'f_members.categoriey_member'=>$type,
                    'f_members.persons_status'=>1,

                ));
                $arr = array();
                $arr['data'] = array();
                $cuttent_higry_year = $this->current_hjri_year();
                if(!empty($members)){
                    foreach($members as $row){
                        $link ='onclick="get_another_khafel('.$row['id'].');"';

                        if($row['check_member']!=0){
                            $x='<button type="button" class="btn btn-success btn-sm" '.$link.' data-toggle="modal"
                                               
                                                data-target="#khafala_detail">
                                               

  نصف كفاله                                        </button>';
                        }else{
                            $x='';
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



                        $radio ='<input type="radio" name="choosed"   value="'.$row['id'].'" onclick="getMemberData($(this).val(),'.$KafalaType.')" />';




                        $type = 'ذكر';
                        if ($row['member_gender'] == 2) {
                            $type = 'أنثى';
                        }
                        $category = 'يتيم';
                        if ($row['categoriey_member'] == 3) {
                            $category = ' يتيم';
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


                        if($KafalaType ==2){

                            if($row['check_member'] >= 2){
                                continue;

                            }
                        }else{

                            if(!empty($row['main_kafalat_details'] )){
                                $now =strtotime(date('Y-m-d'));
                                if($row['main_kafalat_details']['first_date_to'] > $now){
                                    continue;
                                }
                            }


                        }

                        $arr['data'][] = array(
                            $radio,
                            $row['file_num'],
                            $row['father_name'],
                            $row['member_full_name'],
                            'يتيم',
                            $type,
                            $row['member_birth_date_hijri'],
                            $age,
                            $Fe2z_name
                        ,
                            '<span style="background-color: '.$row['halt_elmostafid_color'].'; padding:.2em .6em .3em;" >
                         '.$row['halt_elmostafid_title'].'</span>',$x

                        );
                    }
                }

            }else{
                $type=3;
                $members = $this->Sponsors_model->getMembers(array('f_members.id!='=>0,
                    'f_members.categoriey_member'=>$type,
                    'f_members.persons_status'=>1,

                ));
                $arr = array();
                $arr['data'] = array();
                $cuttent_higry_year = $this->current_hjri_year();
                if(!empty($members)){
                    foreach($members as $row){
                        $link ='onclick="get_another_khafel('.$row['id'].');"';

                        if($row['check_member']!=0){
                            $x='<button type="button" class="btn btn-success btn-sm" '.$link.' data-toggle="modal"
                                               
                                                data-target="#khafala_detail">
                                               

  نصف كفاله                                        </button>';
                        }else{
                            $x='';
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



                        $radio ='<input type="radio" name="choosed"   value="'.$row['id'].'" onclick="getMemberData($(this).val(),'.$KafalaType.')" />';




                        $type = 'ذكر';
                        if ($row['member_gender'] == 2) {
                            $type = 'أنثى';
                        }
                        $category = 'يتيم';
                        if ($row['categoriey_member'] == 3) {
                            $category = 'يتيم';
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


                        if($KafalaType ==2){

                            if($row['check_member'] >= 2){
                                continue;

                            }
                        }else{

                            if(!empty($row['main_kafalat_details'] )){
                                $now =strtotime(date('Y-m-d'));
                                if($row['main_kafalat_details']['first_date_to'] > $now){
                                    continue;
                                }
                            }


                        }

                        $arr['data'][] = array(
                            $radio,
                            $row['file_num'],
                            $row['father_name'],
                            $row['member_full_name'],
                            'مستفيد بالغ',
                            $type,
                            $row['member_birth_date_hijri'],
                            $age,
                            $Fe2z_name
                        ,
                            '<span style="background-color: '.$row['halt_elmostafid_color'].'; padding:.2em .6em .3em;" >
                         '.$row['halt_elmostafid_title'].'</span>'

                        );
                    }
                }
            }

            echo json_encode($arr);
        }

    }
	
	
	
	

    /*public function getConnection($KafalaType)
    {
        $now_date_hijri =$this->current_hjri_date();
        if($KafalaType ==4){

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


            $armal = $this->Sponsors_model->getMembersArmal(array('mother.categoriey_m'=>1,'mother.halt_elmostafid_m'=>1,'mother.person_type'=>62));
           $arr2 = array();
            $arr2['data'] = array();
            $cuttent_higry_year = $this->current_hjri_year();
            if(!empty($armal)){
                foreach($armal as $row){

                    $radio ='<input type="radio" name="choosed"  value="'.$row['id'].'" onclick="getMemberData($(this).val(),'.$KafalaType.')" />';

                    

                    $gender = 'ذكر';
                    if ($row['m_gender'] == 2) {
                        $gender = 'أنثى';
                    }

                    $category = 'أرملة';
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
                    if($row['main_kafalat_details']['first_date_to'] > $now){
                        continue;
                    }
                     }
                    $arr2['data'][] = array(
                        $radio,
                        $row['file_num'],
                        $row['father_name'],
                        $row['full_name'],
                        $category,
                        $gender,
                        $row['m_birth_date_hijri'],
                        $age,
                        //nasebElfard
                        $Fe2z_name
                    ,'                
 ',
                              '<span style="background-color: '.$row['halt_elmostafid_color'].'; padding:.2em .6em .3em;" >
                         '.$row['halt_elmostafid_title'].'</span>'
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
                    $link ='onclick="get_another_khafel('.$row['id'].');"';

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



                    $radio ='<input type="radio" name="choosed"   value="'.$row['id'].'" onclick="getMemberData($(this).val(),'.$KafalaType.')" />';

                    


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


                    if($KafalaType ==2){

                        if($row['check_member'] >= 2){
                            continue;

                        }
                    }else{

                        if(!empty($row['main_kafalat_details'] )){
                            $now =strtotime(date('Y-m-d'));
                            if($row['main_kafalat_details']['first_date_to'] > $now){
                                continue;
                            }
                        }


                    }

                    $arr['data'][] = array(
                        $radio,
                        $row['file_num'],
                        $row['father_name'],
                        $row['member_full_name'],
                        $category,
                        $type,
                        $row['member_birth_date_hijri'],
                        $age,
                        $Fe2z_name
                    ,'                
 <button type="button" class="btn btn-success btn-sm" '.$link.' data-toggle="modal"
                                               
                                                data-target="#khafala_detail">
                                               

تفاصيل الكفاله الاخري                                        </button>',
                           '<span style="background-color: '.$row['halt_elmostafid_color'].'; padding:.2em .6em .3em;" >
                         '.$row['halt_elmostafid_title'].'</span>'
                    );
                }
            }
            echo json_encode($arr);
        }

    }*/


/*
    public function getMemberData()
    {
         $data['banks_accounts']= $this->Sponsors_model->select_banks_accounts();
       $data['mybanks']= $this->Sponsors_model->getBanks();
    
      $data['kafala_status'] = $this->Difined_model->select_search_key("fr_kafalat_kafel_status",'type',1);

        $data['result'] = $this->Sponsors_model->getMembers(array('f_members.id'=>$this->input->post('id')))[0];
        $data['banks'] = $this->Difined_model->select_all('banks_settings','','',"id","asc");
        $data['cuttent_higry_year'] = $this->current_hjri_year();
        $this->load->view('admin/all_Finance_resource_views/sponsors/getMemberData', $data);
    }*/
    
       public function getMemberData()
    {


     $data['last_data_inserted'] = $this->Sponsors_model->GetLastDataInserted($_POST['kafel_id_fk']);    
  if(isset( $data['last_data_inserted']) and  $data['last_data_inserted'] != ''){
   
        $arr =array('account_id_fk'=>$data['last_data_inserted']->gamia_account,'bank_id_fk'=>$data['last_data_inserted']->gamia_bank_id_fk);
        $data['accounts']  = $this->Sponsors_model->GetBankAccount($arr);

  }


         $data['banks_accounts']= $this->Sponsors_model->select_banks_accounts();
       $data['mybanks']= $this->Sponsors_model->getBanks();
    
      $data['kafala_status_arr'] = $this->Difined_model->select_search_key("fr_kafalat_kafel_status",'type',1);

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

$data['kafala_status_arr'] = $this->Difined_model->select_search_key("fr_kafalat_kafel_status",'type',1);


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




/*
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


 $confim = 'onclick="return confirm("هل انت متأكد من عملية الحذف؟");"';
 
 
 if($row->fe2a_type == 1|| $row->fe2a_type == 3){
    $k_mob = $row->k_mob;
}elseif($row->fe2a_type == 4|| $row->fe2a_type == 5 || 
 $row->fe2a_type == 6 ||  $row->fe2a_type == 7
){
    
   $k_mob= $row->w_mob;
}else{
    $k_mob = 'غير محدد';
}

                $arr['data'][] = array(


                    $x,
                    $row->k_num,
                    $row->k_name,
                    
                    $k_mob,
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
    }*/
    
    
    
    public function data()
{


    $customer= $this->Sponsors_model->select_all();

/*

<a href="'.base_url().'all_Finance_resource/sponsors/Sponsor/addSponsor_maindata/'.$row->id.'"><i
        class="fa fa-pencil-square-o" title="تعديل بيانات الكافل" aria-hidden="true"></i> </a>
*/

    $arr = array();
    $arr['data'] = array();
    if(!empty($customer)){
        $x = 0;
        foreach($customer as $row){
            $x++;

            $link ='onclick="modal_link('.$row->id.');"';
            $link2 ='onclick="modal_link('.$row->id.');"';

            $link3 ='onclick="get_kafel_file('.$row->id.');"';



            /*$row->k_national_num*/
            $confim = 'onclick="return confirm("هل انت متأكد من عملية الحذف؟");"';


            if($row->fe2a_type == 1|| $row->fe2a_type == 3){
                $k_mob = $row->k_mob;
            }elseif($row->fe2a_type == 4|| $row->fe2a_type == 5 ||
                $row->fe2a_type == 6 ||  $row->fe2a_type == 7
            ){

                $k_mob= $row->w_mob;
            }else{
                $k_mob = 'غير محدد';
            }

            $arr['data'][] = array(


                $x,
                $row->k_num,
                //$row->k_num,

                $row->k_name,

                $k_mob,
                $row->fe2a_title['title']
            ,
                       '  <button style="color:black ; background-color:'. $row->kafel_status['color'].'  " 
         data-toggle="modal" data-target="#modal-info" class="btn btn-sm btn-">
    '. $row->kafel_status['title'].'</button>'


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
    href="'.base_url().'all_Finance_resource/sponsors/Sponsor/addSponsor_maindata/'.$row->id.'">
    بيانات الكافل
  </a></li>
    <li><a target="_blank"
    href="'.base_url().'all_Finance_resource/sponsors/Sponsor/addKfala_data/'.$row->id.'">
    بيانات
    الكفالة </a></li>



</ul>
</div>
    
    
   
  ', '<button type="button"  class="myModal  btn  btn-sm btn-add" '.$link2.' data-toggle="modal"
 
                                               
                                                data-target="#modal-kafal">
                                                <i class="fa fa-eye btn-sm"></i>
            
            </button>','
<a 
   data-toggle="modal" '.$link.'data-target="#modal-delete"
   title="حذف"> <i class="fa fa-trash"
                   aria-hidden="true"></i> </a>

        <a href="'.base_url().'all_Finance_resource/sponsors/Sponsor/print_kafel_details/'.$row->id.'"
   target="_blank" title="طباعه ملف الكافل" >
    <i class="fa fa-print" aria-hidden="true"></i> </a>
      <a href="'.base_url().'all_Finance_resource/sponsors/Sponsor/print_card/'.$row->id.'"
   target="_blank" title="طباعه كارت الكافل" >
    <i style="background-color: #0a568c" class="fa fa-print"
       aria-hidden="true"></i> </a>
       <button type="button" class="btn btn-success btn-sm" data-toggle="modal"  ' . $link3 . '
                                                data-target="#modal-attach">
                                                <i class="fa fa-upload " aria-hidden="true"></i>
                                        </button>
        
 

                                        
  
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




    public function add_days_num($id,$kafel_id)
    {
        

        if($this->input->post('save') ==='save'){

            $this->Sponsors_model->add_days_num($id);
            $this->message('success',' إضافة ايام السماحة');
            redirect('all_Finance_resource/sponsors/Sponsor/addKfala_data/'.$kafel_id,'refresh');
        }
    }
    
    
    
    /************************************************************/
       public  function GetEditData(){

        $result_id = $_POST['id'];

        if(!empty( $result_id)){
            $data['kafala_status'] = $this->Difined_model->select_search_key("fr_kafalat_kafel_status",'type',1);
            $data['banks_accounts']= $this->Sponsors_model->select_banks_accounts();
            $data['mybanks']= $this->Sponsors_model->getBanks();
            $data['result_Kfala_data']= $this->Sponsors_model->getById_main_kafalat_detai($result_id);
            $data['gamia_banks']= $this->Sponsors_model->getBanks( $data['result_Kfala_data']['gamia_account']);
            $arr =array('account_id_fk'=>$data['result_Kfala_data']['gamia_account'],'bank_id_fk'=>$data['result_Kfala_data']['gamia_bank_id_fk']);
            $data['gamia_account_numbers'] = $this->Sponsors_model->GetBankAccount($arr);
            $data['banks'] = $this->Difined_model->select_all('banks_settings','','',"id","asc");

            if( $data['result_Kfala_data']['kafala_type_fk'] ==4){

                $data['armal'] = $this->Sponsors_model->getMembersArmal(array('mother.id'=>$data['result_Kfala_data']['person_id_fk']
                ,'mother.categoriey_m'=>1,'mother.halt_elmostafid_m'=>1,'mother.person_type'=>62))[0];


            }else{
                $type =2;
                if($data['result_Kfala_data']['kafala_type_fk']==3){
                    $type =3;
                }

                $data['members'] = $this->Sponsors_model->getMembers(array(
                    'f_members.id'=>$data['result_Kfala_data']['person_id_fk'],
                    'f_members.categoriey_member'=>$type,
                    'f_members.persons_status'=>1,

                ))[0];
            }

            $data["current_hijry_year"] = $this->current_hjri_year();

                    $data['kfalat_types'] = $this->Difined_model->select_all('fr_kafalat_types_setting','','',"id","asc");
            $this->load->view('admin/all_Finance_resource_views/sponsors/EditDataPage', $data);

        }

    }
/*****************************************************************/


   public function print_card_kafala($kafel_id,$id){ // all_Finance_resource/sponsors/Sponsor/print_card_kafala

        $data["current_hijry_year"] = $this->current_hjri_year();
        $data["all_kafalat"]= $this->Sponsors_model->get_sponsors_kafalat($kafel_id,$id);
        $data["result"]=$this->Sponsors_model->getById($kafel_id)[0];
       $this->load->view('admin/all_Finance_resource_views/sponsors/print/print_card_kafala',$data);
    }




    public function addSponsor_maindata_orders($id=false)	// all_Finance_resource/sponsors/Sponsor/addSponsor_maindata_orders
    {
        $this->load->model("familys_models/Register");
        if($this->input->post('add') ){
            $person_img = 'person_img';
            $file= $this->upload_image($person_img);
            $this->Sponsors_model->insert_maindata_order($id,$file);
            $this->message('success','إضافة  بيانات الكافل');
            redirect('all_Finance_resource/sponsors/Sponsor/addSponsor_maindata_orders'  , 'refresh');
        }

        $data["relationships"]=$this->Register->select_relashion(array('type'=>34));
        //add
        $this->load->model('all_Finance_resource_models/settings/Finance_resource_setting');
        $data['halat_kafel'] = $this->Finance_resource_setting->all_frhk_settings('fr_kafalat_kafel_status',2);
        $data['social_status'] = $this->Difined_model->select_search_key('fr_settings','type',11);
        $data['reasons_stop'] = $this->Difined_model->select_search_key('fr_settings','type',12);


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
        $data['records']= $this->Sponsors_model->select_all_orders();
        $data['kfalat_types'] = $this->Difined_model->select_all('fr_kafalat_types_setting','','',"id","asc");
//        $this->test($data['records']);
       
        $data['f2a'] = $this->Difined_model->select_search_key('fr_sponser_donors_setting','type',1);
        if(!empty($id)){
            $data['records']= '';
            $data['result']= $this->Sponsors_model->getOrderById($id)[0];
//            $this->test($data['result']);
            $data['k_status_data'] = $this->Difined_model->select_search_key('fr_kafalat_kafel_status','id',$data['result']->halat_kafel_id);

        }

        $data['descriptions']=$this->Sponsors_model->GetFromFr_settings(15);


        $data['page_title'] = 'إضافة  طلب لكافل';
        $data['subview'] = 'admin/all_Finance_resource_views/sponsors/kafel_data_orders';
        $this->load->view('admin_index', $data);
    }

    public function updateSponsorOrdersDetails($id, $kafelId) // all_Finance_resource/sponsors/Sponsor/updateSponsorOrdersDetails
    {
        if($this->input->post('update_detail')){
            $this->Sponsors_model->updateOrderDetails($id);
            $this->message('success',' تم تعديل كافل بنجاح');
            redirect('all_Finance_resource/sponsors/Sponsor/addSponsor_maindata_orders/'.$kafelId,'refresh');
        }
    }
    public function delete_sponsor_orders($id) // all_Finance_resource/sponsors/Sponsor/delete_sponsor_orders
    {
        $this->Sponsors_model->delete_order($id);
        $this->message('success',' تم حذف  كافل بنجاح');
        redirect('all_Finance_resource/sponsors/Sponsor/addSponsor_maindata_orders','refresh');
    }
    public function deleteOrdersDetails($id, $kafelId)  // all_Finance_resource/sponsors/Sponsor/deleteOrdersDetails
    {
        $this->Sponsors_model->delete_order_details($id);
        $this->message('success',' تم حذف  كافل بنجاح');
        redirect('all_Finance_resource/sponsors/Sponsor/addSponsor_maindata_orders/'.$kafelId,'refresh');
    }
    
    public function getkafalaRow(){ // all_Finance_resource/sponsors/Sponsor/getkafalaRow
    $this->load->model("Difined_model");
    $data['kfalat_types'] = $this->Difined_model->select_all('fr_kafalat_types_setting','','',"id","asc");

 
    $this->load->view('admin/all_Finance_resource_views/sponsors/getKafalat',$data);

}
/**********************************************************************************************/
/************************************************************************************************/

public function getConnection2($Fe2aType)
{

    /********* خاص بالكفلاء *********************************************/
    $this->load->model('all_Finance_resource_models/all_pills/AllPills_model');
    if($Fe2aType == 1 ){
        $all_Sponsors = $this->AllPills_model->getMembersSponsors_2();
       $arr_sponsors = array();
        $arr_sponsors['data'] = array();
        if(!empty($all_Sponsors)){
            foreach($all_Sponsors as $row_sponsor){

                $arr_sponsors['data'][] = array(
                    '<input type="radio" name="choosed"   id="member'.$row_sponsor->id.'"
                             data-name="'.$row_sponsor->k_name.'" data-id="'.$row_sponsor->id.'"
               data-mob="'.$row_sponsor->k_mob.'"     value="'.$row_sponsor->id.'"   
                    onclick="info('.$row_sponsor->id.')" />',
                       $row_sponsor->k_num,
                    $row_sponsor->k_name,
                 
                    $row_sponsor->k_mob,
                    $row_sponsor->id
                );
            }
        }
        echo json_encode($arr_sponsors);

    }





}
//=========================================================================================================
   	public function check_kafal()  //all_Finance_resource/sponsors/Sponsor/check_kafal
    {
        $type_kafa=$this->input->post('type_kafa');
        $person_id_fk=$this->input->post('person_id_fk');

        $x= $this->Sponsors_model->check_kafal_type($type_kafa,$person_id_fk);
        $y= $this->Sponsors_model->check_half_kafal_type($type_kafa,$person_id_fk);
        echo $x+$y;


    }

    public function check_kafal_half()  //all_Finance_resource/sponsors/Sponsor/check_kafal
    {
        $type_kafa=$this->input->post('type_kafa');
        $person_id_fk=$this->input->post('person_id_fk');

        $x= $this->Sponsors_model->check_kafal_type($type_kafa,$person_id_fk);
       // $y= $this->Sponsors_model->check_half_kafal_type($type_kafa,$person_id_fk);
        echo $x;


    }


    public function get_kafel_khafalat()
    {
        //print_r($_POST);
        $kafel_id=$this->input->post('kafel_id');

        $data['records']=$this->Sponsors_model->Getkhafalat($kafel_id);
           $data['kafels'] = $this->Sponsors_model->getById($kafel_id)[0];//3-2-om
        $this->load->view('admin/all_Finance_resource_views/sponsors/getkhafel_Kafalat',$data);

       // print_r($data['records']);
      //  $this->

    }


    public function get_another_khafel()
    {
       // print_r($_POST);
        $kafel_id=$this->input->post('sponsor_id');
        $yatem_id=$this->input->post('yatem_id');

        $data['row_kafala']=$this->Sponsors_model->get_second_kafel($kafel_id, $yatem_id);
        //print_r($data['row_kafala']);
      $this->load->view('admin/all_Finance_resource_views/sponsors/get_second_khafala',$data);

    }


    public function get_kafel_files()
    {
      //  print_r($_POST);
        $kael_id=$this->input->post('kafel_id');

       $data['records']=$this->Sponsors_model->getImagesById($kael_id);
        $data['kael_id']=$kael_id;


       // print_r($data['records']);
        $this->load->view('admin/all_Finance_resource_views/sponsors/kafel_attachment',$data);

    }
    
/***********************************************************************************************/
/**********************************************************************************************/    
}//END CLASS
