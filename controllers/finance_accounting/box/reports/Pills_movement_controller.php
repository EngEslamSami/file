<?php

class  Pills_movement_controller extends MY_Controller
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
        $this->load->model('finance_accounting_model/box/reports/Pills_movement_model');
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
                    if($number == 200) $return = 'مئتا';
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

    private  function upload_image($file_name ,$folder){
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
            //$this->thumb($datafile);
            return  $datafile['file_name'];
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


/*
public function Pills_movement_report(){    // finance_accounting/box/reports/Pills_movement_controller/Pills_movement_report

        $data['publishers'] = $this->Pills_movement_model-> get_all_publisher();
        $data['gathering_place'] =  $this->Pills_movement_model->GetFromFr_settings(14);
        $data['esal_type'] = $this->Pills_movement_model->select_fr_bnod_pills_setting_by_condition(array('esal'=>0));
        $data['fe2a_types'] = $this->Difined_model->select_all('fr_sponser_donors_setting','','',"","");

        $data['title'] = 'تقرير حركة الإيصالات';
        $data['subview'] = 'admin/finance_accounting/box/reports/pills_movement/pills_movement_report';
        $this->load->view('admin_index', $data);
    }*/

public function Pills_movement_report(){    // finance_accounting/box/reports/Pills_movement_controller/Pills_movement_report

        $data['publishers'] = $this->Pills_movement_model-> get_all_publisher();
        $data['gathering_place'] =  $this->Pills_movement_model->GetFromFr_settings(14);
        $data['esal_type'] = $this->Pills_movement_model->select_fr_bnod_pills_setting_by_condition(array('esal'=>0));
        $data['fe2a_types'] = $this->Difined_model->select_all('fr_sponser_donors_setting','','',"","");

        $data['title'] = 'تقرير حركة الإيصالات';
        $data['subview'] = 'admin/finance_accounting/box/reports/pills_movement/pills_movement_report';
        $this->load->view('admin_index', $data);
    }
/*
    public function GetSearchTable(){
        $data['records'] = $this->Pills_movement_model->GetSearchpills();
        //print_r( $data['records'] );
        $this->load->view('admin/finance_accounting/box/reports/pills_movement/GetSearchTable',$data);

    }*/

    public function GetSearchTable(){
        $data['records'] = $this->Pills_movement_model->GetSearchpills();
        $data['records_bandtype1'] = $this->Pills_movement_model->GetSearchpills_groupby('bnd_type1');
        //$data['records_bandtype2'] = $this->Pills_movement_model->GetSearchpills_groupby('bnd_type2');

        $data['publisher']=$this->input->post('publisher');
       
        $this->load->view('admin/finance_accounting/box/reports/pills_movement/GetSearchTable',$data);

    }

/*************************************************************************************/
public function all_esalat_tabr3at(){    // finance_accounting/box/reports/Pills_movement_controller/all_esalat_tabr3at

        $data['publishers'] = $this->Pills_movement_model-> get_all_publisher();
        $data['gathering_place'] =  $this->Pills_movement_model->GetFromFr_settings(14);
        $data['esal_type'] = $this->Pills_movement_model->select_fr_bnod_pills_setting_by_condition(array('esal'=>0));
        $data['fe2a_types'] = $this->Difined_model->select_all('fr_sponser_donors_setting','','',"","");


        $data['title'] = 'تقرير حركة التبرعات';
        $data['subview'] = 'admin/finance_accounting/box/reports/pills_movement/all_esalat_tabr3at';
        $this->load->view('admin_index', $data);
    }


/*
    public function Get_esalat_tabr3at(){
    
        $data['records'] = $this->Pills_movement_model->GetSearchpills_tabr3at();
        $data['records_bandtype1'] = $this->Pills_movement_model->GetSearchpills_groupby('bnd_type1');
        $data['publisher']=$this->input->post('publisher');
       
        $this->load->view('admin/finance_accounting/box/reports/pills_movement/get_esalat_tabr3at',$data);

    }*/
    
    
    /* public function Get_esalat_tabr3at(){
      $data['records'] = $this->Pills_movement_model->GetSearchpills_tabr3at();
    $data['total_bonod_array'] = $this->Pills_movement_model->getTotalBnod();
//print_r(  $data['total_bonod_array'] );
        $data['publisher']=$this->input->post('publisher');
        $this->load->view('admin/finance_accounting/box/reports/pills_movement/get_esalat_tabr3at',$data);

    }*/
      /* public function Get_esalat_tabr3at(){
        $data['records'] = $this->Pills_movement_model->GetSearchpills_tabr3at();
         $bnod_arr='';
         if(empty($_POST['bnd_type1'])){
             $bnod = $this->Pills_movement_model->select_fr_bnod_pills_setting_by_condition(
                 array('band'=>0,'fe2a'=>$_POST['fe2a_type1']));
             $bnod_arr=array();
             foreach ($bnod as $row){

                 $bnod_arr[]=$row->code;

             }

         }
   
         $data['bnod_arr']=$bnod_arr;
        $data['total_bonod_array'] = $this->Pills_movement_model->getTotalBnod();
        $data['publisher']=$this->input->post('publisher');
        $this->load->view('admin/finance_accounting/box/reports/pills_movement/get_esalat_tabr3at',$data);
    }*/  
          public function Get_esalat_tabr3at(){

      if ($this->input->post('publisher')){
			  
                  $data['publisher_name'] = $this->Pills_movement_model->get_user_name_submit($this->input->post('publisher'));
              }

        $data['records'] = $this->Pills_movement_model->GetSearchpills_tabr3at();
         $bnod_arr='';
         if(empty($_POST['bnd_type1'])){
             $bnod = $this->Pills_movement_model->select_fr_bnod_pills_setting_by_condition(
                 array('band'=>0,'fe2a'=>$_POST['fe2a_type1']));
             if(!empty($bnod)){
             $bnod_arr=array();
             foreach ($bnod as $row){

                 $bnod_arr[]=$row->code;

             }
             }

         }

        $data['bnod_arr']=$bnod_arr;
        $data['total_bonod_array'] = $this->Pills_movement_model->getTotalBnod();
        $data['publisher']=$this->input->post('publisher');
        $this->load->view('admin/finance_accounting/box/reports/pills_movement/get_esalat_tabr3at',$data);
    } 
    
    public function getConnection()
    {
        $all_Donors = $this->Pills_movement_model->getALL_fr_all_pills();
        $arr_donors = array();
        $arr_donors['data'] = array();

        if (!empty($all_Donors)) {
            foreach ($all_Donors as $row_donors) {

                $arr_donors['data'][] = array(
                    '<input type="radio" name="choosed" value="' . $row_donors['id'] . '"
                         ondblclick="GetMemberName(this)"   id="member' . $row_donors['id'] . '" data-name="' . $row_donors['person_name'] . '" data-id="' . $row_donors['id'] . '"
                      data-mob="' . $row_donors['person_mob'] . '"/>',
                    $row_donors['person_name'],
                    $row_donors['person_mob'],
                 
                    ''
                );
            }
        }
        echo json_encode($arr_donors);


    }


     public function update_all_times()
    {
        $this->db->select('id,date_s');
       $query=$this->db->get('fr_all_pills');
        if($query->num_rows()>0)
        {
            $data=array();
            $x=0;
            foreach($query->result() as $row)
            {
          $data[$x]=$row;
                $data[$x]->time_seconds=date("H:i",$row->date_s);
                $this->db->where('id',$row->id);
                $data_update['pill_time']=strtotime($data[$x]->time_seconds);
                $this->db->update('fr_all_pills',$data_update);
                $x++ ;
            }
            echo "<pre>";
            print_r($data);
        }else{
            return false;
        }

    }
/*************************************************************************************/
/*
    public function GetSearchTable(){




$data='';

      // $data =$this->Pills_movement_model->GetSearchData(array('fr_devices_points.device_id_fk'=>$data['result']->device_num),'bank_id_fk');



        $this->load->view('admin/finance_accounting/box/reports/pills_movement/GetSearchTable',$data);




    }*/
}//END CLASS
