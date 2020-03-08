<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sheek_tracks extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in = $this->Counting->get_basic_in_num();
        $this->files_basic_in = $this->Counting->get_files_basic_in();
        $this->load->model('finance_accounting_model/box/vouch_sarf/Vouch_sarf_model');
        $this->load->model('finance_accounting_model/box/sheek_tracks/Sheek_tracks_model');

        $this->load->model('Difined_model');
    }

    private function upload_muli_image($input_name, $folder)
    {
        if (!empty($_FILES[$input_name])) {
            $filesCount = count($_FILES[$input_name]['name']);
            for ($i = 0; $i < $filesCount; $i++) {
                $_FILES['userFile']['name'] = $_FILES[$input_name]['name'][$i];
                $_FILES['userFile']['type'] = $_FILES[$input_name]['type'][$i];
                $_FILES['userFile']['tmp_name'] = $_FILES[$input_name]['tmp_name'][$i];
                $_FILES['userFile']['error'] = $_FILES[$input_name]['error'][$i];
                $_FILES['userFile']['size'] = $_FILES[$input_name]['size'][$i];
                $all_img[] = $this->upload_image("userFile", $folder);
            }
            return $all_img;
        }
    }

    private function upload_image($file_name, $folder)
    {
        $config['upload_path'] = 'uploads/' . $folder;
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf';
        $config['encrypt_name'] = true;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($file_name)) {
            return false;
        } else {
            $datafile = $this->upload->data();
            return $datafile['file_name'];
        }
    }

    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }

    public function index()
    {//finance_accounting/box/sheek_tracks/Sheek_tracks
        /**********test*************/
       // $data['records'] = $this->Sheek_tracks_model->getSand_Qabd(24,265);
        // $this->test( $data['records']);
        /***********test************/
$data['sheeks_sarf'] = $this->Sheek_tracks_model->select_sheeks_sarf(array('sheek_status'=>0,'canceled'=>0));
$data['sheeks_sarf_approved'] = $this->Sheek_tracks_model->select_sheeks_sarf(array('taslem_sheek >'=>0,'sheek_status >'=>0,'canceled'=>0));
       
$data['canceled_sheeks_sarf'] = $this->Sheek_tracks_model->select_sheeks_sarf(array('sheek_status'=>0,'canceled'=>1));       
       
        //$this->test($data['sheeks_sarf']);
         $data['all_banks_accounts'] = $this->Sheek_tracks_model->get_society_main_banks_account();



        $data['sheeks_qabd'] = $this->Sheek_tracks_model->select_sheeks_qabd(array('sheek_type'=>0,'sheek_status'=>0,'twaged_sheek'=>0 ,'from_esalat'=>1));
        $data['sheeks_qabd_approved'] = $this->Sheek_tracks_model->select_sheeks_qabd(array('sheek_status'=>1));
       //$this->test($data['sheeks_qabd_approved']);
        $data['sheeks_ones'] = $this->Sheek_tracks_model->get_by_type(1);
        $data['sheeks_two'] = $this->Sheek_tracks_model->get_by_type(2);
        $data['sheeks_three'] = $this->Sheek_tracks_model->get_by_type(3);
        $data['subview'] = 'admin/finance_accounting/box/sheek_tracks/sheek_tracks';
        $data['title'] = 'الشيكات الصادرة والواردة';
        $this->load->view('admin_index', $data);
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

    public function change_taslem_sheek()
    {



        $this->Sheek_tracks_model->change_taslem_sheek();
        echo json_encode($_POST);
       // $this->message('success', 'تم تنفيذ الإجراء بنجاح');
       // redirect('finance_accounting/box/sheek_tracks/Sheek_tracks?type=out_cheque', 'refresh');


    }


    public function change_halet_sheek()
    {



        $this->Sheek_tracks_model->change_halet_sheek();
        echo json_encode($_POST);
        // $this->message('success', 'تم تنفيذ الإجراء بنجاح');
        // redirect('finance_accounting/box/sheek_tracks/Sheek_tracks?type=out_cheque', 'refresh');


    }

/*
    public function change_taslem_sheek(){
        $this->load->model('familys_models/Mother');
        $this->Mother->change_course_approved();
        echo json_encode($_POST);
    }*/


    public function change_sheek_status()
    {

        $this->Sheek_tracks_model->change_sheek_status();
        $this->message('success', 'تم تنفيذ الإجراء بنجاح');
        redirect('finance_accounting/box/sheek_tracks/Sheek_tracks?type=out_cheque', 'refresh');


    }


/*
    public function loadhalet_taslem()
    {
    $data['taslem_settings'] = $this->Sheek_tracks_model->select_from_finance_sheeks_tracks_actions(array('type' => 4));
    $data['records'] = $this->Sheek_tracks_model->get_by_id($_POST['id']);
    $data['tracks'] = $this->Sheek_tracks_model->get_sheeks_tracks(array('sheek_num'=>$data['records']->sheek_num,'all_sheek_sarf_type_id'=>2));
    $this->load->view('admin/finance_accounting/box/sheek_tracks/halet_taslem_load', $data);
    }



    public function loadhalet_sheek()
    {
        $data['sarf_settings'] = $this->Sheek_tracks_model->select_from_finance_sheeks_tracks_actions(array('type' => 5));

        $data['records'] = $this->Sheek_tracks_model->get_by_id($_POST['id']);
        $data['tracks'] = $this->Sheek_tracks_model->get_sheeks_tracks(array('sheek_num'=>$data['records']->sheek_num,'all_sheek_sarf_type_id'=>1));

        $this->load->view('admin/finance_accounting/box/sheek_tracks/halet_sheek_load', $data);


    }

*/

  /*  public function load_details()
    {


        if($_POST['type'] ==='qabd' ){
            //$this->test(  $_POST);
            $data['records'] = $this->Sheek_tracks_model->getSand_Qabd($_POST['id'],$_POST['sheek_num']);
           // $this->test(   $data['records']);

        }elseif ($_POST['type'] === 'sarf'){
            $data['records'] = $this->Sheek_tracks_model->getSand_Sarf($_POST['id'],$_POST['sheek_num']);
            //$this->test(   $data['records']);
        }


        $this->load->view('admin/finance_accounting/box/sheek_tracks/load_details', $data);


    }

*/


    public function load_details()
    {


        if($_POST['type'] ==='qabd' ){
          // $this->test(  $_POST);
            $data['records'] = $this->Sheek_tracks_model->getSand_Qabd($_POST['id'],$_POST['sheek_num']);




            $this->load->model("all_Finance_resource_models/all_pills/AllPills_model");

            $pills_data =$data['records'][0]->all_pills_data;

            $data['bank_brach'] = $this->AllPills_model->GetFromFr_settings(16);
            $data['all_banks'] = $this->AllPills_model->select_all_by_condition(array("society_main_banks_account.type"=>2),"society_main_banks_account.bank_id_fk");
            $data['bank_accounts_arr'] =$this->AllPills_model->select_all_by_condition(
                array('society_main_banks_account.bank_id_fk'=>$pills_data->bank_id_fk),'');
            $data['eda3_data'] =$this->AllPills_model->select_all_by_condition(
                array('type'=>2,'society_main_banks_account.bank_id_fk'=>$pills_data->bank_id_fk,'society_main_banks_account.account_id_fk'=>$pills_data->bank_account_id_fk),'');
            $data['all_data'] =$this->AllPills_model->select_all_by_DeviceData(array('fr_devices_points.device_id_fk'=>$pills_data->device_num),'bank_id_fk');
            $data['bank_account_code_shabka_arr'] =$this->AllPills_model->select_all_by_condition(
                array('type'=>2,'society_main_banks_account.bank_id_fk'=>$pills_data->bank_id_fk,
                    'society_main_banks_account.account_id_fk'=>$pills_data->bank_account_id_fk),'');

            $data['esal_type'] = $this->AllPills_model->select_fr_bnod_pills_setting_by_condition(array('esal'=>0));
            $data['gathering_place'] =  $this->AllPills_model->GetFromFr_settings(14);
            $data['titles'] = $this->AllPills_model->GetFromFr_settings(8);
            $data['greetings'] = $this->AllPills_model->GetFromFr_settings(9);
            $data['banks'] = $this->Difined_model->select_all('banks_settings','','',"id","asc");
            $data['devices_points'] =$this->AllPills_model->select_all_devices_points();
            $number = number_format((float)$pills_data->value, 2, '.', '');
            if (strpos($number,'.') !== false) {
                $val =explode('.',$number);
                $integer =$this->convert_number($val[0]);
                $float =$this->convert_number(round($val[1]));
                if(!empty(round($val[1]))){
                    $data['ArabicNum'] = $integer." "."ريال و". $float." "."هللة فقط لا غير"  ;
                    $data['value'] = $number;
                }else{
                    $data['ArabicNum'] = $integer." "."ريال ". " فقط لا غير"  ;
                    $data['value'] = $val[0];

                }
            }else {

                $title=$this->convert_number($number);
                $data['title'] = $title." "."ريال فقط لا غير"  ;
                $data['value'] = $number;
            }
            // $this->test($data['bank_brach']);


           // $this->test(   $data['records']);

        }elseif ($_POST['type'] === 'sarf'){
            $data['records'] = $this->Sheek_tracks_model->getSand_Sarf($_POST['id'],$_POST['sheek_num']);
            //$this->test(   $data['records']);
        }


        $this->load->view('admin/finance_accounting/box/sheek_tracks/load_details', $data);


    }

    public function convert_number($number)
    {

        if (($number < 0) || ($number > 999999999999))
        {
            throw new Exception("العدد خارج النطاق");
        }
        $return="";
        //convert number into array of (string) number each case
        // -------number: 121210002876-----------//
        // 	0		1		2		3  //
        //'121'	  '210'	  '002'	  '876'
        $english_format_number = number_format($number);
        $array_number=explode(',', $english_format_number);
        //convert each number(hundred) to arabic
        for($i=0; $i<count($array_number); $i++){
            $place=count($array_number) - $i;
            $return .= $this->convert($array_number[$i], $place);
            if(isset($array_number[($i + 1)]) && $array_number[($i + 1)]>0)  $return .= ' و';
        }
        return $return;
    }
    private function convert($number, $place){
        // take in charge the sex of NUMBERED
        $sex='female';
        //the number word in arabic for masculine and feminine
        $words = array(
            'male'=>array(
                '0'=> '' ,'1'=> 'واحد' ,'2'=> 'اثنان' ,'3' => 'ثلاثة','4' => 'أربعة','5' => 'خمسة',
                '6' => 'ستة','7' => 'سبعة','8' => 'ثمانية','9' => 'تسعة','10' => 'عشرة',
                '11' => 'أحد عشر','12' => 'إثني عشر','13' => 'ثلاثة عشر','14' => 'أربعة عشر','15' => 'خمس عشر',
                '16' => 'ستة عشر','17' => 'سبعة عشر','18' => 'ثمانية عشر','19' => 'تسعة عشر','20' => 'عشرون',
                '30' => 'ثلاثون','40' => 'أربعون','50' => 'خمسون','60' => 'ستون','70' => 'سبعون',
                '80' => 'ثمانون','90' => 'تسعون', '100'=>'مائة', '200'=>'مائتان', '300'=>'ثلاثمائة', '400'=>'أربعمائة',
                '500'=>'خمسمائة',
                '600'=>'ستمائة', '700'=>'سبعمائة', '800'=>'ثمانمائة', '900'=>'تسعمائة'
            ),
            'female'=>array(
                '0'=> '' ,'1'=> 'واحد' ,'2'=> 'اثنتان' ,'3' => 'ثلاثة','4' => 'أربعة','5' => 'خمسة',
                '6' => 'ستة','7' => 'سبعة','8' => 'ثمانية','9' => 'تسعة','10' => 'عشرة',
                '11' => 'إحدى عشرة','12' => 'إثني عشر','13' => 'ثلاث عشرة','14' => 'أربع عشرة','15' => 'خمسة عشرة',
                '16' => 'ستة عشرة','17' => 'سبعة عشرة','18' => 'ثمانية عشرة','19' => 'تسعة عشرة','20' => 'عشرون',
                '30' => 'ثلاثون','40' => 'أربعون','50' => 'خمسون','60' => 'ستون','70' => 'سبعون',
                '80' => 'ثمانون','90' => 'تسعون', '100'=>'مائة', '200'=>'مائتان', '300'=>'ثلاثمائة', '400'=>'أربعمائة',
                '500'=>'خمسمائة',
                '600'=>'ستمائة', '700'=>'سبعمائة', '800'=>'ثمانمائة', '900'=>'تسعمائة'
            )
        );
        //take in charge the different way of writing the thousands and millions ...
        $mil = array(
            '2'=>array('1'=>'ألف', '2'=>'ألفان', '3'=>'آلاف'),
            '3'=>array('1'=>'مليون', '2'=>'مليونان', '3'=>'ملايين'),
            '4'=>array('1'=>'مليار', '2'=>'ملياران', '3'=>'مليارات')
        );

        $mf = array('1'=>$sex, '2'=>'male', '3'=>'male', '4'=>'male');
        $number_length = strlen((string)$number);
        if($number == 0) return '';
        else if($number[0]==0){
            if($number[1]==0) $number=(int)substr($number, -1);
            else $number=(int)substr($number, -2);
        }
        switch($number_length){
            case '1': {
                switch($place){
                    case '1':{
                        $return = $words[$mf[$place]][$number];
                    }
                        break;
                    case '2':{

                        if($number==1) $return = 'ألف';
                        else if($number==2) $return = 'ألفان';
                        else{
                            $return = $words[$mf[$place]][$number]. ' آلاف';
                        }
                    }
                        break;
                    case '3':{
                        if($number==1) $return = 'مليون';
                        else if($number==2) $return = 'مليونان';
                        else $return = $words[$mf[$place]][$number]. ' ملايين';
                    }
                        break;
                    case '4':{
                        if($number==1) $return = 'مليار';
                        else if($number==2) $return = 'ملياران';
                        else $return = $words[$mf[$place]][$number]. ' مليارات';
                    }
                        break;
                }
            }
                break;
            case '2': {
                if(isset($words[$mf[$place]][$number])) $return = $words[$mf[$place]][$number];
                else{
                    $twoy=$number[0] * 10;
                    $ony=$number[1];
                    $return = $words[$mf[$place]][$ony].' و'.$words[$mf[$place]][$twoy];
                }
                switch($place){
                    case '2':{
                        $return .= ' ألف';
                    }
                        break;
                    case '3':{
                        $return .= ' مليون';
                    }
                        break;
                    case '4':{
                        $return .= ' مليار';
                    }
                        break;
                }
            }
                break;
            case '3':{
                if(isset($words[$mf[$place]][$number])){
                    $return = $words[$mf[$place]][$number];
                    if($number == 200) $return = 'مائتان';
                    switch($place){
                        case '2':{
                            $return .= ' ألف';
                        }
                            break;
                        case '3':{
                            $return .= ' مليون';
                        }
                            break;
                        case '4':{
                            $return .= ' مليار';
                        }
                            break;
                    }
                    return $return;
                }
                else{
                    $threey=$number[0] * 100;
                    if(isset($words[$mf[$place]][$threey])){
                        $return = $words[$mf[$place]][$threey];
                    }
                    $twoyony=$number[1] * 10 + $number[2];
                    if($twoyony==2){
                        switch($place){
                            case '1': $twoyony=$words[$mf[$place]]['2']; break;
                            case '2': $twoyony='ألفان'; break;
                            case '3': $twoyony='مليونان'; break;
                            case '4': $twoyony='ملياران'; break;
                        }
                        if($threey!=0){
                            $twoyony='و'.$twoyony;
                        }
                        $return = $return.' '.$twoyony;
                    }
                    else if($twoyony==1){
                        switch($place){
                            case '1': $twoyony=$words[$mf[$place]]['1']; break;
                            case '2': $twoyony='ألف'; break;
                            case '3': $twoyony='مليون'; break;
                            case '4': $twoyony='مليار'; break;
                        }
                        if($threey!=0){
                            $twoyony='و'.$twoyony;
                        }
                        $return = $return.' '.$twoyony;
                    }

                    else{
                        if(isset($words[$mf[$place]][$twoyony])) $twoyony = $words[$mf[$place]][$twoyony];
                        else{
                            $twoy=$number[1] * 10;
                            $ony=$number[2];
                            $twoyony = $words[$mf[$place]][$ony].' و'.$words[$mf[$place]][$twoy];
                        }
                        if($twoyony!='' && $threey!=0) $return= $return.' و'.$twoyony;
                        switch($place){
                            case '2':{
                                $return .= ' ألف';
                            }
                                break;
                            case '3':{
                                $return .= ' مليون';
                            }
                                break;
                            case '4':{
                                $return .= ' مليار';
                            }
                                break;
                        }
                    }
                }
            }
                break;
        }
        return $return;
    }



    /************************************ahmed zidan****************************/


    public function update_exit_cheque()
    {
        $row_id=$this->input->post('row_id');
        $rqm_sand=$this->input->post('rqm_sand');
        $option=$this->input->post('option');
        $data['records']=$this->Sheek_tracks_model->update_insert_sheek_track();
        // echo($option);


    }





    public  function getTaslemDate(){
        $data  = $this->Sheek_tracks_model->get_by_id($_POST['id']);
        echo json_encode(date('Y-m-d',$data->taslem_date));

    }

    public  function getSarfmDate(){
        $data  = $this->Sheek_tracks_model->get_by_id($_POST['id']);
        echo json_encode(date('Y-m-d',$data->sarf_date));
    }
}





