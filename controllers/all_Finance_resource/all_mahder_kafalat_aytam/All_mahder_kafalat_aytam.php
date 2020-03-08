<?php

class  All_mahder_kafalat_aytam extends MY_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->library('pagination');
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }
        $this->load->model('Difined_model');
        $this->load->model("all_Finance_resource_models/all_pills/AllPills_model");

        $this->load->helper(array('url', 'text', 'permission', 'form'));
        $this->load->model('familys_models/Model_access_rule');
        $this->load->model('system_management/Groups');

        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in  = $this->Counting->get_basic_in_num();
        $this->files_basic_in  = $this->Counting->get_files_basic_in();
        $this->load->model('human_resources_model/employee_setting/Employee_setting');
        $this->load->model('human_resources_model/Finance_employee_model');
        $this->load->model('all_Finance_resource_models/all_mahder_kafalat_aytam/All_mahder_kafalat_aytam_model');
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

    private function upload_muli_image($input_name,$folder){
        if(!empty($_FILES[$input_name]['name'])){
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

    private function url()
    {
        unset($_SESSION['url']);
        $this->session->set_flashdata('url', 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
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



public function all_mahder_kafalat_report()
{
   // all_Finance_resource/all_mahder_kafalat_aytam/All_mahder_kafalat_aytam/all_mahder_kafalat_report
  $data['table'] = $this->All_mahder_kafalat_aytam_model->select_all_mahder_data();
    /*echo "<pre>";
    print_r($data['table']);
    echo "</pre>";
    die;*/
  $data['title'] = 'محضر الأسر';
  $data['subview'] = 'admin/all_Finance_resource_views/all_mahder_kafalat_aytam/all_mahder_kafalat_aytam';
  $this->load->view('admin_index', $data);

}


public function GetMembers(){

    $data_load['mother_data']=$this->All_mahder_kafalat_aytam_model->getMother(array('mother_national_num_fk'=>$_POST['motherNum']));
    $data_load["table"]=$this->All_mahder_kafalat_aytam_model->getMembers(array('mother_national_num_fk'=>$_POST['motherNum']));

    $this->load->view('admin/all_Finance_resource_views/all_mahder_kafalat_aytam/get_members', $data_load);

}


public function get_kafel_rabt(){
    $this->All_mahder_kafalat_aytam_model->get_kafel_rabt();
    echo json_encode($_POST);
}




public function  GetEditData(){
    $this->load->model('all_Finance_resource_models/sponsors/Sponsors_model');

   // $result_id = $_POST['id'];
    //if(!empty( $result_id)){
    $data['kfalat_types'] = $this->Difined_model->select_all('fr_kafalat_types_setting','','',"id","asc");

    $data['kafala_status'] = $this->Difined_model->select_search_key("fr_kafalat_kafel_status",'type',1);
        $data['banks_accounts']= $this->Sponsors_model->select_banks_accounts();
        $data['mybanks']= $this->Sponsors_model->getBanks();
        //$data['result_Kfala_data']= $this->Sponsors_model->getById_main_kafalat_detai($result_id);
        //$data['gamia_banks']= $this->Sponsors_model->getBanks( $data['result_Kfala_data']['gamia_account']);
        //$arr =array('account_id_fk'=>$data['result_Kfala_data']['gamia_account'],'bank_id_fk'=>$data['result_Kfala_data']['gamia_bank_id_fk']);
        //$data['gamia_account_numbers'] = $this->Sponsors_model->GetBankAccount($arr);
        $data['banks'] = $this->Difined_model->select_all('banks_settings','','',"id","asc");

    /* if( $data['result_Kfala_data']['kafala_type_fk'] ==4){

        $data['armal'] = $this->Sponsors_model->getMembersArmal(array('mother.id'=>$data['result_Kfala_data']['person_id_fk'],'mother.categoriey_m'=>1,'mother.halt_elmostafid_m'=>1,'mother.person_type'=>62))[0];


    }else{
        $type =2;
        if($data['result_Kfala_data']['kafala_type_fk']==3){
            $type =3;
        }


        $data['members'] = $this->Sponsors_model->getMembers_for_edit(array(
            'f_members.id'=>$data['result_Kfala_data']['person_id_fk'],
            'f_members.categoriey_member'=>$type,


        ))[0];


    }
    $data["current_hijry_year"] = $this->current_hjri_year();


   if($data['result_Kfala_data']['person_type'] ==2){
        if( empty( $data['result_Kfala_data']['second_date_from_ar']) &&
            empty( $data['result_Kfala_data']['second_date_to_ar'])
        ){

            $suspension_type =$data['result_Kfala_data']['first_suspension_type'];
        }else{

            $suspension_type =$data['result_Kfala_data']['second_suspension_type'];
        }

    }else{

        $suspension_type =$data['result_Kfala_data']['first_suspension_type'];


    }*/

       // $data['halet_kafalaat_reasons']= $this->Sponsors_model->get_halet_kafalaat_reasons_settingsByArray(array('reason_type'=>$suspension_type));


        $this->load->view('admin/all_Finance_resource_views/all_mahder_kafalat_aytam/EditDataPage', $data);

   // }
}






    public function getConnection($Fe2aType)
    {

        if($Fe2aType == 1 ){
            $all_Sponsors = $this->All_mahder_kafalat_aytam_model->getMembersSponsors2( );
            $arr_sponsors = array();
            $arr_sponsors['data'] = array();
            if(!empty($all_Sponsors)){
                foreach($all_Sponsors as $row_sponsor){

                    if(!empty($row_sponsor['k_mob'])){
                        $mob =$row_sponsor['k_mob'];
                    }else{
                        $mob ='غير محدد';
                    }

                    if(!empty($row_sponsor['k_email'])){
                        $email =$row_sponsor['k_email'];
                    }else{
                        $email ='غير محدد';
                    }
                    $check='';


                    $arr_sponsors['data'][] = array(
                        '<input type="radio" name="members[]"   data-id="'.$row_sponsor['id'].'" data-name="'.$row_sponsor['k_name'].'" 
                           class="checkClass"  ondblclick="getKafelData($(this))"  '.$check.'
                     value=""/>',
                        $row_sponsor['k_num'],
                        $row_sponsor['k_name'],
                        $mob,
                        $email,
                        $row_sponsor['yatem'],
                        $row_sponsor['armal'],
                        $row_sponsor['mosatafed']


                    );
                }
            }
            echo json_encode($arr_sponsors);

        }


    }

    public  function getFormData(){

        $data['halet_kafalaat_reasons']= $this->All_mahder_kafalat_aytam_model->get_halet_kafalaat_reasons_settings();
        $data['last_data_inserted'] = $this->All_mahder_kafalat_aytam_model->GetLastDataInserted($_POST['kafel_id_fk']);
        if(isset( $data['last_data_inserted']) and  $data['last_data_inserted'] != ''){
            $arr =array('account_id_fk'=>$data['last_data_inserted']->gamia_account,'bank_id_fk'=>$data['last_data_inserted']->gamia_bank_id_fk);
            $data['accounts']  = $this->All_mahder_kafalat_aytam_model->GetBankAccount($arr);

        }
        $data['banks_accounts']= $this->All_mahder_kafalat_aytam_model->select_banks_accounts();
        $data['mybanks']= $this->All_mahder_kafalat_aytam_model->getBanks();

        $data['kafala_status_arr'] = $this->Difined_model->select_search_key("fr_kafalat_kafel_status",'type',1);

        $data['result'] = $this->All_mahder_kafalat_aytam_model->getMembers2(array('f_members.id'=>$this->input->post('id')))[0];
        $data['banks'] = $this->Difined_model->select_all('banks_settings','','',"id","asc");
        $data['cuttent_higry_year'] = $this->current_hjri_year();


        if( $_POST['kafala_type_fk'] ==4){

            $data['armal'] = $this->All_mahder_kafalat_aytam_model->getMembersArmal(array('mother.mother_national_num_fk'=>$_POST['person_id_fk']
            ,'mother.categoriey_m'=>1,'mother.halt_elmostafid_m'=>1,'mother.person_type'=>62));


        }else{
            $type =2;
            if($_POST['kafala_type_fk']==3){
                $type =3;
            }



            $data['members'] = $this->All_mahder_kafalat_aytam_model->getMembers_for_edit(array(
                'f_members.id'=>$_POST['person_id_fk'],
                'f_members.categoriey_member'=>$type,
            ));
        /*    echo "<pre>";
            print_r($data['members']);
            echo "</pre>";
            die;*/


        }


        $this->load->view('admin/all_Finance_resource_views/all_mahder_kafalat_aytam/getFormData', $data);



    }




    public function insertKfala(){
        $file = $this->upload_image('mostdem_img');
        $this->All_mahder_kafalat_aytam_model->insert($file);
        echo json_encode($_POST);


    }
    

}//END CLASS
