<?php

class  AllPills extends MY_Controller
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
        $this->load->model('all_Finance_resource_models/all_pills/AllPills_model');
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
                '11' => 'أحد عشر','12' => 'اثنا عشر','13' => 'ثلاثة عشر','14' => 'أربعة عشر','15' => 'خمسة عشر',
                '16' => 'ستة عشر','17' => 'سبعة عشر','18' => 'ثمانية عشر','19' => 'تسعة عشر','20' => 'عشرون',
                '30' => 'ثلاثون','40' => 'أربعون','50' => 'خمسون','60' => 'ستون','70' => 'سبعون',
                '80' => 'ثمانون','90' => 'تسعون', '100'=>'مئة', '200'=>'مئتان', '300'=>'ثلاثمئة', '400'=>'أربعمئة', '500'=>'خمسمئة',
                '600'=>'ستمئة', '700'=>'سبعمئة', '800'=>'ثمانمئة', '900'=>'تسعمئة'
            ),
            'female'=>array(
                '0'=> '' ,'1'=> 'واحدة' ,'2'=> 'اثنتان' ,'3' => 'ثلاث','4' => 'أربع','5' => 'خمس',
                '6' => 'ست','7' => 'سبع','8' => 'ثمان','9' => 'تسع','10' => 'عشر',
                '11' => 'إحدى عشرة','12' => 'ثنتا عشرة','13' => 'ثلاث عشرة','14' => 'أربع عشرة','15' => 'خمس عشرة',
                '16' => 'ست عشرة','17' => 'سبع عشرة','18' => 'ثمان عشرة','19' => 'تسع عشرة','20' => 'عشرون',
                '30' => 'ثلاثون','40' => 'أربعون','50' => 'خمسون','60' => 'ستون','70' => 'سبعون',
                '80' => 'ثمانون','90' => 'تسعون', '100'=>'مئة', '200'=>'مئتان', '300'=>'ثلاثمئة', '400'=>'أربعمئة', '500'=>'خمسمئة',
                '600'=>'ستمئة', '700'=>'سبعمئة', '800'=>'ثمانمئة', '900'=>'تسعمئة'
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


/*********************************************************************************************/
/*********************************************************************************************/
/*********************************************************************************************/



public function addPills(){	// all_Finance_resource/all_pills/AllPills/addPills

    if($this->input->post('save')==='save'){
        $id = $this->uri->segment(5);
        $file =$this->upload_image('file');
        $data['username'] = $this->AllPills_model->insert($id,$file);
        $this->message('success','إضافة  بيانات الإيصال');
        redirect('all_Finance_resource/all_pills/AllPills/addPills','refresh');
  
    }else{
        $id = $this->uri->segment(5);
            if(!empty($id)){
               
                $data['result'] = $this->AllPills_model->select_all_by_fr_all_pills(array('id'=>$id))[0];
               
                $number =$data['result']->value;
                if (strpos($number,'.') !== false) {
                    $val =explode('.',$number);
                    $integer =$this->convert_number($val[0]);
                    $float =$this->convert_number($val[1]);
                    $data['ArabicNum'] = $integer." "."ريال و". $float." "."هللة فقط لا غير"  ;
                  
                }else {
                    $title=$this->convert_number($number);
                    $data['ArabicNum'] = $title." "."ريال فقط لا غير"  ;
                  
                }
            
  
                    $data['erad_tbro3_arr'] = $this->AllPills_model->select_fr_bnod_pills_setting_by_condition(
                        array('fe2a'=>0,'band'=>0,'erad_tabro3'=>0,'esal'=>$data['result']->pill_type));
  
                    $data['fe2a_type_arr'] = $this->AllPills_model->select_fr_bnod_pills_setting_by_condition(
                        array('fe2a'=>0,'band'=>0,'erad_tabro3'=>$data['result']->erad_type));
  
                    $data['bnd_type_arr'] = $this->AllPills_model->select_fr_bnod_pills_setting_by_condition(
                        array('band'=>0,'fe2a'=>$data['result']->fe2a_type1));



                        $data['fe2a_type_arr2'] = $this->AllPills_model->select_fr_bnod_pills_setting_by_condition(
                            array('fe2a'=>0,'band'=>0,'erad_tabro3'=>$data['result']->erad_type));
      
                        $data['bnd_type_arr2'] = $this->AllPills_model->select_fr_bnod_pills_setting_by_condition(
                            array('band'=>0,'fe2a'=>$data['result']->fe2a_type2));


  
            $data['bank_accounts_arr'] =$this->AllPills_model->select_all_by_condition(
                array('society_main_banks_account.bank_id_fk'=>$data['result']->bank_id_fk),'');
  
             $data['bank_account_num_arr'] =$this->AllPills_model->select_all_by_condition(
                        array('type'=>2,'society_main_banks_account.bank_id_fk'=>$data['result']->bank_id_fk
                        ,'society_main_banks_account.account_id_fk'=>$data['result']->bank_account_id_fk),'');
  
  
  
  
                    $data['shabka_banks_arr'] =$this->AllPills_model->select_all_by_DeviceData(
                        array('fr_devices_points.device_id_fk'=>$data['result']->device_num),'bank_id_fk');
  
                  $data['bank_account_shabka_arr'] =$this->AllPills_model->select_all_by_DeviceData(
                        array('fr_devices_points.device_id_fk'=>$data['result']->device_num,
                            'fr_devices_points.bank_id_fk'=>$data['result']->bank_id_fk),'');
  
  
  
                 $data['bank_account_num_shabka_arr'] =$this->AllPills_model->select_all_by_DeviceData(
                   array('fr_devices_points.account_id_fk'=>$data['result']->bank_account_num
                   ,'fr_devices_points.bank_id_fk'=>$data['result']->bank_id_fk,
                       'fr_devices_points.device_id_fk'=>$data['result']->device_num),'');

            }
          $data['username'] = $this->AllPills_model->CheckUser();
          $data['all_banks'] = $this->AllPills_model->select_all_by_condition(array("society_main_banks_account.type"=>2),"society_main_banks_account.bank_id_fk");
          $data['markz'] = $this->Difined_model->select_search_key('employees_settings', 'type', 17);
          $data['banks'] = $this->Difined_model->select_all('banks_settings','','',"id","asc");
          $data['gathering_place'] =  $this->AllPills_model->GetFromFr_settings(14);
          $data['fe2a_types'] = $this->Difined_model->select_all('fr_sponser_donors_setting','','',"","");
          $data['society_main_banks_account_arr'] = $this->Difined_model->select_search_key('society_main_banks_account', 'type', 1);
          $data['all_society_main_banks_account'] = $this->Difined_model->select_search_key('society_main_banks_account', 'type', 2);
          $data['titles'] = $this->AllPills_model->GetFromFr_settings(8);
    
  
          $data['greetings'] = $this->AllPills_model->GetFromFr_settings(9);
          $data['devices_points'] = $this->Difined_model->select_all('fr_devices_points','','',"","");
          $data['esal_type'] = $this->AllPills_model->select_fr_bnod_pills_setting_by_condition(array('esal'=>0));
          $data['all_pills_today'] = $this->AllPills_model->select_all_by_fr_all_pills(array('date_s'=>strtotime(date("Y-m-d"))));
          $data['all_pills_inbox'] = $this->AllPills_model->select_all_by_fr_all_pills(array('date_s >'=>strtotime(date("Y-m-d")),'date_s <'=>strtotime(date("Y-m-d")),'date_s !='=>strtotime(date("Y-m-d"))));
          $data['title'] = 'إضافة إيصال إستلام ';
          $data['subview'] = 'admin/all_Finance_resource_views/all_pills/addPills_data';
          $this->load->view('admin_index', $data);
    }
      }
  


    public function getConnection($Fe2aType)
    {
      
        /********* خاص بالكفلاء *********************************************/
    if($Fe2aType == 1 ){
        $all_Sponsors = $this->AllPills_model->getMembersSponsors( );
        $arr_sponsors = array();
        $arr_sponsors['data'] = array();
        if(!empty($all_Sponsors)){
            foreach($all_Sponsors as $row_sponsor){

                $arr_sponsors['data'][] = array(
                    '<input type="radio" name="choosed"   id="member'.$row_sponsor['id'].'" data-name="'.$row_sponsor['k_name'].'" data-id="'.$row_sponsor['id'].'"
                   data-mob="'.$row_sponsor['k_mob'].'"     value="'.$row_sponsor['id'].'"  ondblclick="GetMemberName('.$row_sponsor['id'].')" 
                        onclick="getMotherData($(this).val(),'.$Fe2aType.')" />',
                    $row_sponsor['k_name'],
                    $row_sponsor['k_national_num'],
                    $row_sponsor['k_mob'],
                    $row_sponsor['id']
                );
            }
        }
        echo json_encode($arr_sponsors);

    }elseif($Fe2aType ==2 ){
        /********* خاص المتبرعين  *********************************************/

        $all_Donors = $this->AllPills_model->getMembersDonors(   );
        $arr_donors = array();
        $arr_donors['data'] = array();

        if(!empty($all_Donors)){
            foreach($all_Donors as $row_donors){


                $arr_donors['data'][] = array(
                    '<input type="radio" name="choosed" value="'.$row_donors['id'].'" 
                         ondblclick="GetMemberName('.$row_donors['id'].')"   id="member'.$row_donors['id'].'" data-name="'.$row_donors['d_name'].'" data-id="'.$row_donors['id'].'"
                      data-mob="'.$row_donors['d_mob'].'"
                        onclick="getMemberData($(this).val(),'.$Fe2aType.')" />',
                    $row_donors['d_name'],
                    $row_donors['d_national_num'],
                    $row_donors['mob'],

                    ''
                );
            }
        }
        echo json_encode($arr_donors);
    }elseif($Fe2aType == 3 ){
        /********* خاص المشتركين - الجمعية العمومية  *********************************************/

        $all_general_assembly = $this->AllPills_model->getMembersGeneral_assembly(   );
        $arr_general_assembly = array();
        $arr_general_assembly['data'] = array();

        if(!empty($all_general_assembly)){
            foreach($all_general_assembly as $row_general_assembly ){


                $arr_general_assembly['data'][] = array(
                    '<input type="radio" name="choosed" value="'.$row_general_assembly['id'].'" 
                          ondblclick="GetMemberName('.$row_general_assembly['id'].')"   id="member'.$row_general_assembly['id'].'" data-name="'.$row_general_assembly['name'].'" data-id="'.$row_general_assembly['id'].'"
                                data-mob="'.$row_general_assembly['mob'].'"    onclick="getMemberData($(this).val(),'.$Fe2aType.')" />',
                    $row_general_assembly['name'],
                    $row_general_assembly['card_num'],
                    $row_general_assembly['mob'],

                    ''
                );
            }
        }
        echo json_encode($arr_general_assembly);
    }
        




    }



  
    public function GetArabicNum(){

        $number =$_POST['number'];
          if (strpos($number,'.') !== false) {
              $val =explode('.',$number);
              $integer =$this->convert_number($val[0]);
              $float =$this->convert_number($val[1]);
              $data['title'] = $integer." "."ريال و". $float." "."هللة فقط لا غير"  ;
              $data['value'] = $number;
          }else {
              $title=$this->convert_number($number);
              $data['title'] = $title." "."ريال فقط لا غير"  ;
              $data['value'] = $number;
          }
          echo json_encode($data);
      }


 public function GetByArray(){

     if($_POST['type'] === 'getAccount'){
     $data =$this->AllPills_model->select_all_by_condition(array('society_main_banks_account.bank_id_fk'=>$_POST['id']),'');
     }elseif ($_POST['type'] === 'getAccountNum'){
         $data =$this->AllPills_model->select_all_by_condition(
             array('type'=>2,'society_main_banks_account.bank_id_fk'=>$_POST['bank_id'],'society_main_banks_account.account_id_fk'=>$_POST['id']),'');
     }
   echo json_encode($data);

 }

    public function GetData(){

        if($_POST['type'] === 'tabro3'){
            $data = $this->AllPills_model->select_fr_bnod_pills_setting_by_condition(
                array('fe2a'=>0,'band'=>0,'erad_tabro3'=>0,'esal'=>$_POST['id']));


        }elseif ($_POST['type'] === 'fe2a'){
            $data = $this->AllPills_model->select_fr_bnod_pills_setting_by_condition(
                array('fe2a'=>0,'band'=>0,'erad_tabro3'=>$_POST['id']));

        } elseif ($_POST['type'] === 'band'){
            $data = $this->AllPills_model->select_fr_bnod_pills_setting_by_condition(
                array('band'=>0,'fe2a'=>$_POST['id']));

        }
        echo json_encode($data);

    }



    /************************************************************/





    public function GetDeviceData(){

        if($_POST['type'] === 'bank'){
        $data =$this->AllPills_model->select_all_by_DeviceData(array('fr_devices_points.device_id_fk'=>$_POST['id']),'bank_id_fk');
        }elseif ($_POST['type'] === 'Account'){
             $data =$this->AllPills_model->select_all_by_DeviceData(
                array('fr_devices_points.device_id_fk'=>$_POST['device_id_fk'],
                'fr_devices_points.bank_id_fk'=>$_POST['id']),'');
        }elseif ($_POST['type'] === 'AccountNum'){
             $data =$this->AllPills_model->select_all_by_DeviceData(
                 array('fr_devices_points.account_id_fk'=>$_POST['id']
                 ,'fr_devices_points.bank_id_fk'=>$_POST['bank_id_fk'],
                 'fr_devices_points.device_id_fk'=>$_POST['device_id_fk']),'');
        }
      echo json_encode($data);
   
    }



    public function GetTable(){
    
     $id= $_POST['id'];

     $data['username'] = $this->AllPills_model->CheckUser();
     $data['result'] = $this->AllPills_model->select_all_by_fr_all_pills(array('id'=>$id))[0];
     $number =$data['result']->value;
     if (strpos($number,'.') !== false) {
         $val =explode('.',$number);
         $integer =$this->convert_number($val[0]);
         $float =$this->convert_number($val[1]);
         $data['ArabicNum'] = $integer." "."ريال و". $float." "."هللة فقط لا غير"  ;
       
     }else {
         $title=$this->convert_number($number);
         $data['ArabicNum'] = $title." "."ريال فقط لا غير"  ;
       
     }
     $data['gathering_place'] =  $this->AllPills_model->GetFromFr_settings(14);
     $data['titles'] = $this->AllPills_model->GetFromFr_settings(8);
     $data['greetings'] = $this->AllPills_model->GetFromFr_settings(9);
     $this->load->view('admin/all_Finance_resource_views/all_pills/GetTable',$data);

    }

    public function add_attach(){

        if($this->input->post('add')){
            $img= $this->upload_image("file");
            $this->AllPills_model->add_attach($img);
            $this->message('success','تمت إضافة المرفق بنجاح');
            redirect('all_Finance_resource/all_pills/AllPills/addPills/'.$_POST['id'],'refresh');
        }

    }




    public function GetData2(){

           $data['fe2a_type2_arr'] = $this->AllPills_model->select_fr_bnod_pills_setting_by_condition(
                array('fe2a'=>0,'band'=>0,'erad_tabro3'=>$_POST['erad_tbro3'],'id !='=>$_POST['fe2a']));
                echo json_encode($data);
      }



      public function GetBandType2(){
        $data = $this->AllPills_model->select_fr_bnod_pills_setting_by_condition(
            array('band'=>0,'fe2a'=>$_POST['id']));
             echo json_encode($data);
   }


   public  function DeletePill($id){
    $this->AllPills_model->DeletePill($id);
    $this->message('success',' تم حذف  الإيصال بنجاح');
    redirect('all_Finance_resource/all_pills/AllPills/addPills','refresh');
  }




  public function PrintPill($id){
    if(!empty($id)){
        $data['username'] = $this->AllPills_model->CheckUser();
        $data['result'] = $this->AllPills_model->select_all_by_fr_all_pills(array('id'=>$id))[0];
       
        $number =$data['result']->value;
        if (strpos($number,'.') !== false) {
            $val =explode('.',$number);
            $integer =$this->convert_number($val[0]);
            $float =$this->convert_number($val[1]);
            $data['ArabicNum'] = $integer." "."ريال و". $float." "."هللة فقط لا غير"  ;
          
        }else {
            $title=$this->convert_number($number);
            $data['ArabicNum'] = $title." "."ريال فقط لا غير"  ;
          
        }
    


               $data['result'] = $this->AllPills_model->select_all_by_fr_all_pills(array('id'=>$id))[0];
               $data['gathering_place'] =  $this->AllPills_model->GetFromFr_settings(14);
               $data['titles'] = $this->AllPills_model->GetFromFr_settings(8);
               $data['greetings'] = $this->AllPills_model->GetFromFr_settings(9);
   
               $this->load->view('admin/all_Finance_resource_views/all_pills/PrintPill', $data);
            }
  }
}//END CLASS
