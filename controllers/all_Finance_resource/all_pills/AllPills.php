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
                '11' => 'أحد عشر','12' => 'إثني عشر','13' => 'ثلاثة عشر','14' => 'أربعة عشر','15' => 'خمسة عشر',
                '16' => 'ستة عشر','17' => 'سبعة عشر','18' => 'ثمانية عشر','19' => 'تسعة عشر','20' => 'عشرون',
                '30' => 'ثلاثون','40' => 'أربعون','50' => 'خمسون','60' => 'ستون','70' => 'سبعون',
                '80' => 'ثمانون','90' => 'تسعون', '100'=>'مائة', '200'=>'مائتان', '300'=>'ثلاثمائة', '400'=>'أربعمائة',
                 '500'=>'خمسمائة',
                '600'=>'ستمائة', '700'=>'سبعمائة', '800'=>'ثمانمائة', '900'=>'تسعمائة'
            ),
            'female'=>array(
                '0'=> '' ,'1'=> 'واحد' ,'2'=> 'اثنتان' ,'3' => 'ثلاثة','4' => 'أربعة','5' => 'خمسة',
                '6' => 'ستة','7' => 'سبعة','8' => 'ثمانية','9' => 'تسعة','10' => 'عشرة',
                '11' => 'إحدى عشرة','12' => 'إثني عشر','13' => 'ثلاث عشرة','14' => 'أربع عشرة','15' => 'خمسة عشر',
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
        /*
        else if($number[0]==0){
            if($number[1]==0) $number=(int)substr($number, -1);
            else $number=(int)substr($number, -2);
        }*/
           else if ($number[0] == 0) {
            if ($number[1] == 0) {
                $number = (int)substr($number, -1);
                $number = (string)$number;
                $number_length = strlen((string)$number);

            } else {
                $number = (int)substr($number, -2);
                $number = (string)$number;
                $number_length = strlen((string)$number);
            }
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


/*********************************************************************************************/
/*********************************************************************************************/
/*********************************************************************************************/

public function addPills(){	// all_Finance_resource/all_pills/AllPills/addPills

//$type_esal = $this->AllPills_model->get_type_print($_SESSION['emp_code']);
         
         
          
 $this->load->model('n/Users');
 $data['users']=$this->Users->fetch_users_groups_2();

/* 
$this->load->model('all_Finance_resource_models/sponsors/Sponsors_model_load');
$data["all_aytam"]= $this->Sponsors_model_load->all_aytam('f_members.categoriey_member=2   AND f_members.persons_status =1');
$data["all_mostafed"]= $this->Sponsors_model_load->all_aytam('f_members.categoriey_member=3   AND f_members.persons_status =1');
$data["all_mostafed_mkfol"]= $this->Sponsors_model_load->all_aytam('f_members.categoriey_member=3   AND f_members.persons_status =1 And
    f_members.first_kafala_type =3 AND f_members.first_halet_kafala =1 ');
$data["all_aytam_nos"]= $this->Sponsors_model_load->all_aytam_mkfol_nos();
$data["all_aytam_shamla"]= $this->Sponsors_model_load->all_aytam_mkfol_shamla();
$data["all_armal"]= $this->Sponsors_model_load->all_armal('mother.categoriey_m =1 And mother.halt_elmostafid_m =1 And mother.person_type =62');
$data["all_armal_mkfol"]= $this->Sponsors_model_load->all_armal('mother.categoriey_m =1 And mother.halt_elmostafid_m =1 And mother.person_type =62 And 
    mother.first_kafala_type =4 AND mother.first_halet_kafala =1 ');
////////////////////////////////////////////////////////////////
*/




 $data['projects'] = $this->AllPills_model->get_projects();
/*
ECHO '<PRE>';
print_r($_SESSION);*/
//devices_points
   if($this->input->post('save') !=''){
    
    
  /*  ECHO '<PRE>';
print_r($_POST);

die;*/

        $all_img= $this->upload_muli_image("file","images/fr/all_pills");

        if(!empty($all_img)){
            $all_img =$all_img;
        }else{
            $all_img='';
        }

      
      /*  $id = $this->uri->segment(5);
        $last_id_print = $this->AllPills_model->insert($id,$all_img);
        $this->message('success','إضافة  بيانات الإيصال');*/
                    if ($this->input->post('dawria_esal') >= 1) {

                $this->AllPills_model->insert_dawria_esal($all_img);
                $this->message('success', 'إضافة  بيانات الإيصال');

            } else {

                $id = $this->uri->segment(5);
                $last_id_print = $this->AllPills_model->insert($id, $all_img);
                $this->message('success', 'إضافة  بيانات الإيصال');
            }



$IIID =$this->input->post('pill_num');

//$this->test($IIID);
/*
  if($this->input->post('save') === 'save') {
             redirect('all_Finance_resource/all_pills/AllPills/addPills', 'refresh');
         }elseif ($this->input->post('save') === 'print_pill'){
             redirect('all_Finance_resource/all_pills/AllPills/Print_Pill/'.$IIID, 'refresh');
         }elseif ($this->input->post('save') ==='print_kafel'){
             redirect('all_Finance_resource/all_pills/AllPills/Print_Pill/'.$IIID.'?type=kafel', 'refresh');
         }*/
         
         //select_all_by_condition
         
       if($this->input->post('save') === 'save') {
             redirect('all_Finance_resource/all_pills/AllPills/addPills', 'refresh');
         }elseif ($this->input->post('save') === 'print_pill'){
             redirect('all_Finance_resource/all_pills/AllPills/Print_Pill2/'.$IIID, 'refresh');
         }elseif ($this->input->post('save') ==='print_kafel'){
             redirect('all_Finance_resource/all_pills/AllPills/Print_Pill2/'.$IIID.'?type=kafel', 'refresh');
         }    
         
    }else{
        $id = $this->uri->segment(5);
            if(!empty($id)){

                $data['result'] = $this->AllPills_model->select_all_by_fr_all_pills(array('id'=>$id))[0];
            
            
             if (!empty($data['result'])) {
                $number =   number_format((float)$data['result']->value, 2, '.', '');


                if (strpos($number,'.') !== false) {
                    $val =explode('.',$number);
                    $integer =$this->convert_number($val[0]);
                    $float =$this->convert_number(round($val[1]));
                    if(!empty(round($val[1]))){
                         if($integer == ''){ $reyal = ''; }else{ $reyal = 'ريال و';   } 
                        
                        $data['ArabicNum'] = $integer." "."".$reyal."". $float." "."هللة فقط لا غير"  ;
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

                $data['eda3_data'] =$this->AllPills_model->select_all_by_condition(
                    array('type'=>2,'society_main_banks_account.bank_id_fk'=>$data['result']->bank_id_fk,'society_main_banks_account.account_id_fk'=>$data['result']->bank_account_id_fk),'');

               // $this->test($data['eda3_data']);
                $data['all_data'] =$this->AllPills_model->select_all_by_DeviceData(array('fr_devices_points.device_id_fk'=>$data['result']->device_num),'bank_id_fk');
                $data['bank_account_code_shabka_arr'] =$this->AllPills_model->select_all_by_condition(
                    array('type'=>2,'society_main_banks_account.bank_id_fk'=>$data['result']->bank_id_fk,
                        'society_main_banks_account.account_id_fk'=>$data['result']->bank_account_id_fk),'');

       
            }
            
            
               if($_SESSION['role_id_fk']== 3){
               $data['gathering_emp_id'] = $this->AllPills_model->slect_where('fr_gathering_place',array('emp_id_fk'=>$_SESSION['emp_code']))['gathering_place_id_fk'];
               $data['raqm_deveice_emp'] = $this->AllPills_model->slect_where('fr_devices_points_emp',array('emp_id'=>$_SESSION['emp_code']));
              
               if(!empty($data['raqm_deveice_emp']['device_id_fk'])){

               $data['shabka_banks_data'] =$this->AllPills_model->select_all_by_DeviceData(
                array('fr_devices_points.device_id_fk'=>$data['raqm_deveice_emp']['device_id_fk']),'bank_id_fk')[0];

               }

         }
         
         }
            
            
         $data['bank_brach'] = $this->AllPills_model->GetFromFr_settings(16);    

          $data['username'] = $this->AllPills_model->getUserName($_SESSION['user_id']);
          $data['all_banks'] = $this->AllPills_model->select_all_by_condition(array("society_main_banks_account.type"=>2),"society_main_banks_account.bank_id_fk");
          $data['markz'] = $this->Difined_model->select_search_key('employees_settings', 'type', 17);
          $data['banks'] = $this->Difined_model->select_all('banks_settings','','',"id","asc");
          $data['gathering_place'] =  $this->AllPills_model->GetFromFr_settings(14);
         $data['maqr_tahsels'] =  $this->AllPills_model->GetFromFr_settings(17); 
          
          $data['fe2a_types'] = $this->Difined_model->select_all('fr_sponser_donors_setting','','',"","");
          $data['society_main_banks_account_arr'] = $this->Difined_model->select_search_key('society_main_banks_account', 'type', 1);
          $data['all_society_main_banks_account'] = $this->Difined_model->select_search_key('society_main_banks_account', 'type', 2);
          $data['titles'] = $this->AllPills_model->GetFromFr_settings(8);
          $data['people_arr'] = $this->AllPills_model->select_all_by_fr_all_pills(array('person_type'=>0));
          $data['last_id'] = $this->AllPills_model->select_last_id();
          $data['greetings'] = $this->AllPills_model->GetFromFr_settings(9);
       //   $data['devices_points'] = $this->Difined_model->select_all('fr_devices_points','','',"","");
         
          $data['devices_points'] =$this->AllPills_model->select_all_devices_points();
          $data['esal_type'] = $this->AllPills_model->select_fr_bnod_pills_setting_by_condition(array('esal'=>0));
        
        
        
     $data['all_pills_today'] = $this->AllPills_model->select_all_by_fr_all_pills_all();
      
      //$data['all_pills_today'] = '';
       //  $data['all_pills_inbox'] = $this->AllPills_model->select_all_by_fr_all_pills_all_deported();
          
//  $data['all_money_today'] = $this->AllPills_model->select_total_by_pay_method();
          

                   if($_SESSION['role_id_fk']== 3){
               $data['gathering_emp_id'] = $this->AllPills_model->slect_where('fr_gathering_place',array('emp_id_fk'=>$_SESSION['emp_code']))['gathering_place_id_fk'];
               $data['raqm_deveice_emp'] = $this->AllPills_model->slect_where('fr_devices_points_emp',array('emp_id'=>$_SESSION['emp_code']));
              
               if(!empty($data['raqm_deveice_emp']['device_id_fk'])){

               $data['shabka_banks_data'] =$this->AllPills_model->select_all_by_DeviceData(
                array('fr_devices_points.device_id_fk'=>$data['raqm_deveice_emp']['device_id_fk']),'bank_id_fk')[0];

               }

         }
            $data['bank_account_code_shabka_arr'] =$this->AllPills_model->select_all_by_condition(
                    array('type'=>2,'society_main_banks_account.bank_id_fk'=>19,
                        'society_main_banks_account.account_id_fk'=>2),'');
       //   bank_account_code_shabka_arr bank_account_code
       
       	if ($_SESSION['role_id_fk']==1 || $_SESSION['user_id']== 69  ){
        $data['all_emps']= $this->AllPills_model->get_emps();
      
    } elseif ($_SESSION['role_id_fk']==3){
        $data['emp']= $this->AllPills_model->get_emp($_SESSION['emp_code']);
    }
       
       
       
          $data['title'] = 'إضافة إيصال إستلام ';
          $data['subview'] = 'admin/all_Finance_resource_views/all_pills/addPills_data';
          $this->load->view('admin_index', $data);
    }
      }
      
/* 19-10
public function addPills(){	// all_Finance_resource/all_pills/AllPills/addPills
      
 $this->load->model('n/Users');
 $data['users']=$this->Users->fetch_users_groups_2();
 
$this->load->model('all_Finance_resource_models/sponsors/Sponsors_model_load');
$data["all_aytam"]= $this->Sponsors_model_load->all_aytam('f_members.categoriey_member=2   AND f_members.persons_status =1');
$data["all_mostafed"]= $this->Sponsors_model_load->all_aytam('f_members.categoriey_member=3   AND f_members.persons_status =1');
$data["all_mostafed_mkfol"]= $this->Sponsors_model_load->all_aytam('f_members.categoriey_member=3   AND f_members.persons_status =1 And
    f_members.first_kafala_type =3 AND f_members.first_halet_kafala =1 ');
$data["all_aytam_nos"]= $this->Sponsors_model_load->all_aytam_mkfol_nos();
$data["all_aytam_shamla"]= $this->Sponsors_model_load->all_aytam_mkfol_shamla();
$data["all_armal"]= $this->Sponsors_model_load->all_armal('mother.categoriey_m =1 And mother.halt_elmostafid_m =1 And mother.person_type =62');
$data["all_armal_mkfol"]= $this->Sponsors_model_load->all_armal('mother.categoriey_m =1 And mother.halt_elmostafid_m =1 And mother.person_type =62 And 
    mother.first_kafala_type =4 AND mother.first_halet_kafala =1 ');

 $data['projects'] = $this->AllPills_model->get_projects();

   if($this->input->post('save') !=''){
    

        $all_img= $this->upload_muli_image("file","images/fr/all_pills");

        if(!empty($all_img)){
            $all_img =$all_img;
        }else{
            $all_img='';
        }

                    if ($this->input->post('dawria_esal') >= 1) {

                $this->AllPills_model->insert_dawria_esal($all_img);
                $this->message('success', 'إضافة  بيانات الإيصال');

            } else {

                $id = $this->uri->segment(5);
                $last_id_print = $this->AllPills_model->insert($id, $all_img);
                $this->message('success', 'إضافة  بيانات الإيصال');
            }



$IIID =$this->input->post('pill_num');

       if($this->input->post('save') === 'save') {
             redirect('all_Finance_resource/all_pills/AllPills/addPills', 'refresh');
         }elseif ($this->input->post('save') === 'print_pill'){
             redirect('all_Finance_resource/all_pills/AllPills/Print_Pill2/'.$IIID, 'refresh');
         }elseif ($this->input->post('save') ==='print_kafel'){
             redirect('all_Finance_resource/all_pills/AllPills/Print_Pill2/'.$IIID.'?type=kafel', 'refresh');
         }    
         
    }else{
        $id = $this->uri->segment(5);
            if(!empty($id)){

                $data['result'] = $this->AllPills_model->select_all_by_fr_all_pills(array('id'=>$id))[0];
            
            
             if (!empty($data['result'])) {
                $number =   number_format((float)$data['result']->value, 2, '.', '');


                if (strpos($number,'.') !== false) {
                    $val =explode('.',$number);
                    $integer =$this->convert_number($val[0]);
                    $float =$this->convert_number(round($val[1]));
                    if(!empty(round($val[1]))){
                         if($integer == ''){ $reyal = ''; }else{ $reyal = 'ريال و';   } 
                        
                        $data['ArabicNum'] = $integer." "."".$reyal."". $float." "."هللة فقط لا غير"  ;
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

                $data['eda3_data'] =$this->AllPills_model->select_all_by_condition(
                    array('type'=>2,'society_main_banks_account.bank_id_fk'=>$data['result']->bank_id_fk,'society_main_banks_account.account_id_fk'=>$data['result']->bank_account_id_fk),'');

               // $this->test($data['eda3_data']);
                $data['all_data'] =$this->AllPills_model->select_all_by_DeviceData(array('fr_devices_points.device_id_fk'=>$data['result']->device_num),'bank_id_fk');
                $data['bank_account_code_shabka_arr'] =$this->AllPills_model->select_all_by_condition(
                    array('type'=>2,'society_main_banks_account.bank_id_fk'=>$data['result']->bank_id_fk,
                        'society_main_banks_account.account_id_fk'=>$data['result']->bank_account_id_fk),'');

       
            }
            
            
               if($_SESSION['role_id_fk']== 3){
               $data['gathering_emp_id'] = $this->AllPills_model->slect_where('fr_gathering_place',array('emp_id_fk'=>$_SESSION['emp_code']))['gathering_place_id_fk'];
               $data['raqm_deveice_emp'] = $this->AllPills_model->slect_where('fr_devices_points_emp',array('emp_id'=>$_SESSION['emp_code']));
              
               if(!empty($data['raqm_deveice_emp']['device_id_fk'])){

               $data['shabka_banks_data'] =$this->AllPills_model->select_all_by_DeviceData(
                array('fr_devices_points.device_id_fk'=>$data['raqm_deveice_emp']['device_id_fk']),'bank_id_fk')[0];

               }

         }
         
         }
            
            
         $data['bank_brach'] = $this->AllPills_model->GetFromFr_settings(16);    

          $data['username'] = $this->AllPills_model->getUserName($_SESSION['user_id']);
          $data['all_banks'] = $this->AllPills_model->select_all_by_condition(array("society_main_banks_account.type"=>2),"society_main_banks_account.bank_id_fk");
          $data['markz'] = $this->Difined_model->select_search_key('employees_settings', 'type', 17);
          $data['banks'] = $this->Difined_model->select_all('banks_settings','','',"id","asc");
          $data['gathering_place'] =  $this->AllPills_model->GetFromFr_settings(14);
          $data['fe2a_types'] = $this->Difined_model->select_all('fr_sponser_donors_setting','','',"","");
          $data['society_main_banks_account_arr'] = $this->Difined_model->select_search_key('society_main_banks_account', 'type', 1);
          $data['all_society_main_banks_account'] = $this->Difined_model->select_search_key('society_main_banks_account', 'type', 2);
          $data['titles'] = $this->AllPills_model->GetFromFr_settings(8);
          $data['people_arr'] = $this->AllPills_model->select_all_by_fr_all_pills(array('person_type'=>0));
          $data['last_id'] = $this->AllPills_model->select_last_id();
          $data['greetings'] = $this->AllPills_model->GetFromFr_settings(9);
       //   $data['devices_points'] = $this->Difined_model->select_all('fr_devices_points','','',"","");
         
          $data['devices_points'] =$this->AllPills_model->select_all_devices_points();
          $data['esal_type'] = $this->AllPills_model->select_fr_bnod_pills_setting_by_condition(array('esal'=>0));
        
        
        
$data['all_pills_today'] = $this->AllPills_model->select_all_by_fr_all_pills_all();
       //  $data['all_pills_inbox'] = $this->AllPills_model->select_all_by_fr_all_pills_all_deported();
          
  $data['all_money_today'] = $this->AllPills_model->select_total_by_pay_method();
          

                   if($_SESSION['role_id_fk']== 3){
               $data['gathering_emp_id'] = $this->AllPills_model->slect_where('fr_gathering_place',array('emp_id_fk'=>$_SESSION['emp_code']))['gathering_place_id_fk'];
               $data['raqm_deveice_emp'] = $this->AllPills_model->slect_where('fr_devices_points_emp',array('emp_id'=>$_SESSION['emp_code']));
              
               if(!empty($data['raqm_deveice_emp']['device_id_fk'])){

               $data['shabka_banks_data'] =$this->AllPills_model->select_all_by_DeviceData(
                array('fr_devices_points.device_id_fk'=>$data['raqm_deveice_emp']['device_id_fk']),'bank_id_fk')[0];

               }

         }
            $data['bank_account_code_shabka_arr'] =$this->AllPills_model->select_all_by_condition(
                    array('type'=>2,'society_main_banks_account.bank_id_fk'=>19,
                        'society_main_banks_account.account_id_fk'=>2),'');
       //   bank_account_code_shabka_arr bank_account_code
          $data['title'] = 'إضافة إيصال إستلام ';
          $data['subview'] = 'admin/all_Finance_resource_views/all_pills/addPills_data';
          $this->load->view('admin_index', $data);
    }
      }
   
   */   
      
   public function All_dep_pills(){
    

          $data['all_pills_inbox'] = $this->AllPills_model->select_all_by_fr_all_pills_all_deported();
          $data['title'] = 'جميع الإيصالات المرحلة  ';
          $data['subview'] = 'admin/all_Finance_resource_views/all_pills/all_dep_pills';
          $this->load->view('admin_index', $data);
    
   }    
      
      
      
      
      public function Print_Pill($pill_num){
        if(!empty($pill_num)){
            $data['username'] = $this->AllPills_model->getUserName($_SESSION['user_id']);
            $data['result'] = $this->AllPills_model->select_all_by_fr_all_pills(array('pill_num'=>$pill_num))[0];
            $number =  number_format((float)$data['result']->value, 2, '.', '');
            if (strpos($number,'.') !== false) {
                $val =explode('.',$number);
                $integer =$this->convert_number($val[0]);
                $float =$this->convert_number(round($val[1]));
                if(!empty(round($val[1]))){
                    if($integer == ''){ $reyal = ''; }else{ $reyal = 'ريال و';   } 
                    
                    $data['ArabicNum'] = $integer." "."".$reyal."". $float." "."هللة فقط لا غير"  ;
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




            $data['result'] = $this->AllPills_model->select_all_by_fr_all_pills(array('pill_num'=>$pill_num))[0];
            $data['gathering_place'] =  $this->AllPills_model->GetFromFr_settings(14);
            $data['titles'] = $this->AllPills_model->GetFromFr_settings(8);
            $data['greetings'] = $this->AllPills_model->GetFromFr_settings(9);

          //  $this->load->view('admin/all_Finance_resource_views/all_pills/PrintPill', $data);
          
          $type_esal = $this->AllPills_model->get_type_print($_SESSION['emp_code']);
          
        
if (!empty($type_esal)) {
    if ($type_esal == 1) {
//                $this->test($_SESSION);
        $this->load->view('admin/all_Finance_resource_views/all_pills/PrintPill', $data);
    } else if ($type_esal == 2) {
        $this->load->view('admin/all_Finance_resource_views/all_pills/PrintPill_n', $data);
    }
} else {
    $this->load->view('admin/all_Finance_resource_views/all_pills/PrintPill', $data);

}
          
          
        }
    }


/*public function addPills(){	// all_Finance_resource/all_pills/AllPills/addPills

//devices_points
   if($this->input->post('save') !=''){

        $all_img= $this->upload_muli_image("file","images/fr/all_pills");

        if(!empty($all_img)){
            $all_img =$all_img;
        }else{
            $all_img='';
        }

        $id = $this->uri->segment(5);
   
        $last_id_print = $this->AllPills_model->insert($id,$all_img);
        $this->message('success','إضافة  بيانات الإيصال');

$IIID =$this->input->post('pill_num');

  if($this->input->post('save') === 'save') {
             redirect('all_Finance_resource/all_pills/AllPills/addPills', 'refresh');
         }elseif ($this->input->post('save') === 'print_pill'){
             redirect('all_Finance_resource/all_pills/AllPills/PrintPill/'.$IIID, 'refresh');
         }elseif ($this->input->post('save') ==='print_kafel'){
             redirect('all_Finance_resource/all_pills/AllPills/PrintPill/'.$IIID.'?type=kafel', 'refresh');
         }
         
         
    }else{
        $id = $this->uri->segment(5);
            if(!empty($id)){

                $data['result'] = $this->AllPills_model->select_all_by_fr_all_pills(array('id'=>$id))[0];
            
                $number =   number_format((float)$data['result']->value, 2, '.', '');


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

                $data['eda3_data'] =$this->AllPills_model->select_all_by_condition(
                    array('type'=>2,'society_main_banks_account.bank_id_fk'=>$data['result']->bank_id_fk,'society_main_banks_account.account_id_fk'=>$data['result']->bank_account_id_fk),'');
         
                $data['all_data'] =$this->AllPills_model->select_all_by_DeviceData(array('fr_devices_points.device_id_fk'=>$data['result']->device_num),'bank_id_fk');
                $data['bank_account_code_shabka_arr'] =$this->AllPills_model->select_all_by_condition(
                    array('type'=>2,'society_main_banks_account.bank_id_fk'=>$data['result']->bank_id_fk,
                        'society_main_banks_account.account_id_fk'=>$data['result']->bank_account_id_fk),'');

       
            }
            
               if($_SESSION['role_id_fk']== 3){
               $data['gathering_emp_id'] = $this->AllPills_model->slect_where('fr_gathering_place',array('emp_id_fk'=>$_SESSION['emp_code']))['gathering_place_id_fk'];
               $data['raqm_deveice_emp'] = $this->AllPills_model->slect_where('fr_devices_points_emp',array('emp_id'=>$_SESSION['emp_code']));
               if(!empty($data['raqm_deveice_emp']['device_id_fk'])){

               $data['shabka_banks_data'] =$this->AllPills_model->select_all_by_DeviceData(
                array('fr_devices_points.device_id_fk'=>$data['raqm_deveice_emp']['device_id_fk']),'bank_id_fk')[0];

               }

         }
            
            
         $data['bank_brach'] = $this->AllPills_model->GetFromFr_settings(16);    

          $data['username'] = $this->AllPills_model->getUserName($_SESSION['user_id']);
          $data['all_banks'] = $this->AllPills_model->select_all_by_condition(array("society_main_banks_account.type"=>2),"society_main_banks_account.bank_id_fk");
          $data['markz'] = $this->Difined_model->select_search_key('employees_settings', 'type', 17);
          $data['banks'] = $this->Difined_model->select_all('banks_settings','','',"id","asc");
          $data['gathering_place'] =  $this->AllPills_model->GetFromFr_settings(14);
          $data['fe2a_types'] = $this->Difined_model->select_all('fr_sponser_donors_setting','','',"","");
          $data['society_main_banks_account_arr'] = $this->Difined_model->select_search_key('society_main_banks_account', 'type', 1);
          $data['all_society_main_banks_account'] = $this->Difined_model->select_search_key('society_main_banks_account', 'type', 2);
          $data['titles'] = $this->AllPills_model->GetFromFr_settings(8);
          $data['people_arr'] = $this->AllPills_model->select_all_by_fr_all_pills(array('person_type'=>0));
          $data['last_id'] = $this->AllPills_model->select_last_id();
          $data['greetings'] = $this->AllPills_model->GetFromFr_settings(9);
       //   $data['devices_points'] = $this->Difined_model->select_all('fr_devices_points','','',"","");
         
          $data['devices_points'] =$this->AllPills_model->select_all_devices_points();
          $data['esal_type'] = $this->AllPills_model->select_fr_bnod_pills_setting_by_condition(array('esal'=>0));
          $data['all_pills_today'] = $this->AllPills_model->select_all_by_fr_all_pills_all();
          $data['all_pills_inbox'] = $this->AllPills_model->select_all_by_fr_all_pills_all_deported();
          
          $data['all_money_today'] = $this->AllPills_model->select_total_by_pay_method();
          
          
          $data['title'] = 'إضافة إيصال إستلام ';
          $data['subview'] = 'admin/all_Finance_resource_views/all_pills/addPills_data';
          $this->load->view('admin_index', $data);
    }
      }*/




/*
public function addPills(){	// all_Finance_resource/all_pills/AllPills/addPills


   if($this->input->post('save') !=''){
        $all_img= $this->upload_muli_image("file","images/fr/all_pills");

        if(!empty($all_img)){
            $all_img =$all_img;
        }else{
            $all_img='';
        }

        $id = $this->uri->segment(5);

        $last_id_print = $this->AllPills_model->insert($id,$all_img);
        $this->message('success','إضافة  بيانات الإيصال');
$IIID =$this->input->post('pill_num');

  if($this->input->post('save') === 'save') {
             redirect('all_Finance_resource/all_pills/AllPills/addPills', 'refresh');
         }elseif ($this->input->post('save') === 'print_pill'){
             redirect('all_Finance_resource/all_pills/AllPills/PrintPill/'.$IIID, 'refresh');
         }elseif ($this->input->post('save') ==='print_kafel'){
             redirect('all_Finance_resource/all_pills/AllPills/PrintPill/'.$IIID.'?type=kafel', 'refresh');
         }
         
         
    }else{
        $id = $this->uri->segment(5);
            if(!empty($id)){

                $data['result'] = $this->AllPills_model->select_all_by_fr_all_pills(array('id'=>$id))[0];
            
                $number =   number_format((float)$data['result']->value, 2, '.', '');


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
            
               if($_SESSION['role_id_fk']== 3){
               $data['gathering_emp_id'] = $this->AllPills_model->slect_where('fr_gathering_place',array('emp_id_fk'=>$_SESSION['emp_code']))['gathering_place_id_fk'];
               $data['raqm_deveice_emp'] = $this->AllPills_model->slect_where('fr_devices_points_emp',array('emp_id'=>$_SESSION['emp_code']));
               if(!empty($data['raqm_deveice_emp']['device_id_fk'])){

               $data['shabka_banks_data'] =$this->AllPills_model->select_all_by_DeviceData(
                array('fr_devices_points.device_id_fk'=>$data['raqm_deveice_emp']['device_id_fk']),'bank_id_fk')[0];

               }

         }
            
            
         $data['bank_brach'] = $this->AllPills_model->GetFromFr_settings(16);    

          $data['username'] = $this->AllPills_model->getUserName($_SESSION['user_id']);
          $data['all_banks'] = $this->AllPills_model->select_all_by_condition(array("society_main_banks_account.type"=>2),"society_main_banks_account.bank_id_fk");
          $data['markz'] = $this->Difined_model->select_search_key('employees_settings', 'type', 17);
          $data['banks'] = $this->Difined_model->select_all('banks_settings','','',"id","asc");
          $data['gathering_place'] =  $this->AllPills_model->GetFromFr_settings(14);
          $data['fe2a_types'] = $this->Difined_model->select_all('fr_sponser_donors_setting','','',"","");
          $data['society_main_banks_account_arr'] = $this->Difined_model->select_search_key('society_main_banks_account', 'type', 1);
          $data['all_society_main_banks_account'] = $this->Difined_model->select_search_key('society_main_banks_account', 'type', 2);
          $data['titles'] = $this->AllPills_model->GetFromFr_settings(8);
          $data['people_arr'] = $this->AllPills_model->select_all_by_fr_all_pills(array('person_type'=>0));
          $data['last_id'] = $this->AllPills_model->select_last_id();
          $data['greetings'] = $this->AllPills_model->GetFromFr_settings(9);
          $data['devices_points'] = $this->Difined_model->select_all('fr_devices_points','','',"","");
          $data['esal_type'] = $this->AllPills_model->select_fr_bnod_pills_setting_by_condition(array('esal'=>0));
          $data['all_pills_today'] = $this->AllPills_model->select_all_by_fr_all_pills_all();
          $data['all_pills_inbox'] = $this->AllPills_model->select_all_by_fr_all_pills_all_deported();
          
          $data['all_money_today'] = $this->AllPills_model->select_total_by_pay_method();
          
          
          $data['title'] = 'إضافة إيصال إستلام ';
          $data['subview'] = 'admin/all_Finance_resource_views/all_pills/addPills_data';
          $this->load->view('admin_index', $data);
    }
      }
*/

/*
public function addPills(){	// all_Finance_resource/all_pills/AllPills/addPills

        
    if($this->input->post('save')==='save'){




$this->test($_POST);

        $all_img= $this->upload_muli_image("file","images/fr/all_pills");

        if(!empty($all_img)){
            $all_img =$all_img;
        }else{
            $all_img='';
        }

        $id = $this->uri->segment(5);
         $this->AllPills_model->insert($id,$all_img);
        $this->message('success','إضافة  بيانات الإيصال');
        redirect('all_Finance_resource/all_pills/AllPills/addPills','refresh');

    }else{
        $id = $this->uri->segment(5);
            if(!empty($id)){

                $data['result'] = $this->AllPills_model->select_all_by_fr_all_pills(array('id'=>$id))[0];
            
                $number =   number_format((float)$data['result']->value, 2, '.', '');


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
            
               if($_SESSION['role_id_fk']== 3){
               $data['gathering_emp_id'] = $this->AllPills_model->slect_where('fr_gathering_place',array('emp_id_fk'=>$_SESSION['emp_code']))['gathering_place_id_fk'];
               $data['raqm_deveice_emp'] = $this->AllPills_model->slect_where('fr_devices_points_emp',array('emp_id'=>$_SESSION['emp_code']));
               if(!empty($data['raqm_deveice_emp']['device_id_fk'])){

               $data['shabka_banks_data'] =$this->AllPills_model->select_all_by_DeviceData(
                array('fr_devices_points.device_id_fk'=>$data['raqm_deveice_emp']['device_id_fk']),'bank_id_fk')[0];

               }

         }
            
            
         $data['bank_brach'] = $this->AllPills_model->GetFromFr_settings(16);    

          $data['username'] = $this->AllPills_model->getUserName($_SESSION['user_id']);
          $data['all_banks'] = $this->AllPills_model->select_all_by_condition(array("society_main_banks_account.type"=>2),"society_main_banks_account.bank_id_fk");
          $data['markz'] = $this->Difined_model->select_search_key('employees_settings', 'type', 17);
          $data['banks'] = $this->Difined_model->select_all('banks_settings','','',"id","asc");
          $data['gathering_place'] =  $this->AllPills_model->GetFromFr_settings(14);
          $data['fe2a_types'] = $this->Difined_model->select_all('fr_sponser_donors_setting','','',"","");
          $data['society_main_banks_account_arr'] = $this->Difined_model->select_search_key('society_main_banks_account', 'type', 1);
          $data['all_society_main_banks_account'] = $this->Difined_model->select_search_key('society_main_banks_account', 'type', 2);
          $data['titles'] = $this->AllPills_model->GetFromFr_settings(8);
          $data['people_arr'] = $this->AllPills_model->select_all_by_fr_all_pills(array('person_type'=>0));
          $data['last_id'] = $this->AllPills_model->select_last_id();
          $data['greetings'] = $this->AllPills_model->GetFromFr_settings(9);
          $data['devices_points'] = $this->Difined_model->select_all('fr_devices_points','','',"","");
          $data['esal_type'] = $this->AllPills_model->select_fr_bnod_pills_setting_by_condition(array('esal'=>0));
          $data['all_pills_today'] = $this->AllPills_model->select_all_by_fr_all_pills_all();
          $data['all_pills_inbox'] = $this->AllPills_model->select_all_by_fr_all_pills(array('pill_date >'=>date("Y-m-d"),'pill_date <'=>date("Y-m-d"),'pill_date !='=>date("Y-m-d")));
          $data['title'] = 'إضافة إيصال إستلام ';
          $data['subview'] = 'admin/all_Finance_resource_views/all_pills/addPills_data';
          $this->load->view('admin_index', $data);
    }
      }
*/


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
                    $row_sponsor['k_num'],
                    $row_sponsor['k_name'],
         
                    $row_sponsor['k_mob'],
                    
                       '<a type="button" class="myModal" onclick="modal_link('.$row_sponsor['id'].');" data-toggle="modal" style="cursor:pointer" data-target="#modal-kafal">
                    <i class="fa fa-eye btn-sm"></i></a>',
                    $row_sponsor['yatem'],
                    $row_sponsor['armal'],
                    $row_sponsor['mosatafed'],
                    
                  
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
                    $row_donors['d_mob'],

                    ''
                );
            }
        }
        echo json_encode($arr_donors);
    }elseif($Fe2aType == 3 ){
            /********* خاص المشتركين - الجمعية العمومية  *********************************************/
    
            $all_general_assembly = $this->AllPills_model->get_all_details(   );
            $arr_general_assembly = array();
            $arr_general_assembly['data'] = array();
    
            if(!empty($all_general_assembly)){
                foreach($all_general_assembly as $row_general_assembly ){
    //$this->test($all_general_assembly);
    //$this->test($all_general_assembly[0]->odwiat_data);
    //$this->test($all_general_assembly[0]->odwiat_data->no3_odwia_title);
    //$this->test($all_general_assembly[0]->name);
                    $arr_general_assembly['data'][] = array(
                        '<input type="radio" name="choosed" value="'.$row_general_assembly->id.'"
                              ondblclick="GetMemberName('.$row_general_assembly->id.')"   id="member'.$row_general_assembly->id.'"  
                              data-odwiat="'.$row_general_assembly->odwiat_data->rkm_odwia_full.'" 
                              data-name="'.$row_general_assembly->name.'"
                              data-card_num="'.$row_general_assembly->card_num.'" 
                              data-mob="'.$row_general_assembly->jwal.'"    
                              data-subs_from_date_m="'.$row_general_assembly->odwiat_data->subs_from_date_m.'"
                              data-subs_to_date_m="'.$row_general_assembly->odwiat_data->subs_to_date_m.'"
                              data-odwia_status_title="'.$row_general_assembly->odwiat_data->odwia_status_title.'"
                                    data-no3_odwia_title="'.$row_general_assembly->odwiat_data->no3_odwia_title.'"
                                 
                                  
    
                                    onclick="getMemberData($(this).val(),'.$Fe2aType.')" />',
                       
                        $row_general_assembly->odwiat_data->rkm_odwia_full,
                        $row_general_assembly->name,
                        $row_general_assembly->card_num,
                        $row_general_assembly->jwal,
                        $row_general_assembly->odwiat_data->subs_from_date_m,
                        $row_general_assembly->odwiat_data->subs_to_date_m,
                        $row_general_assembly->odwiat_data->odwia_status_title,
                        $row_general_assembly->odwiat_data->no3_odwia_title,
                        ''
    
                       
                    );
                }
            }
            echo json_encode($arr_general_assembly);
        }elseif ($Fe2aType == 6) {
        /******** خاص طلب كفالة  *********************************************/

        $Sponsors_orders = $this->AllPills_model->get_Sponsors_orders();
        $arr_Sponsors_orders = array();
        $arr_Sponsors_orders['data'] = array();

        if(!empty($Sponsors_orders)){
        foreach($Sponsors_orders as $row_Sponsors_orders ){

        $arr_Sponsors_orders['data'][] = array(
        '<input type="radio" name="choosed" value="'.$row_Sponsors_orders->id.'"
        ondblclick="GetMemberName('.$row_Sponsors_orders->id.')"   id="member'.$row_Sponsors_orders->id.'"
        data-name="'.$row_Sponsors_orders->k_name.'"
        data-national_num="'.$row_Sponsors_orders->k_national_num.'"
        data-mob="'.$row_Sponsors_orders->k_mob.'"
        onclick="getMemberData($(this).val(),'.$Fe2aType.')" />',
        $row_Sponsors_orders->k_name,
        $row_Sponsors_orders->k_national_num,
        $row_Sponsors_orders->k_mob,
        ''
        );
        }
        }
        echo json_encode($arr_Sponsors_orders);
        }
        
        
        /*elseif($Fe2aType == 3 ){
       

        $all_general_assembly = $this->AllPills_model->getMembersGeneral_assembly(   );
        $arr_general_assembly = array();
        $arr_general_assembly['data'] = array();

        if(!empty($all_general_assembly)){
            foreach($all_general_assembly as $row_general_assembly ){


                $arr_general_assembly['data'][] = array(
                    '<input type="radio" name="choosed" value="'.$row_general_assembly['id'].'"
                          ondblclick="GetMemberName('.$row_general_assembly['id'].')"   id="member'.$row_general_assembly['id'].'" data-name="'.$row_general_assembly['name'].'" data-id="'.$row_general_assembly['id'].'"
                                data-mob="'.$row_general_assembly['mob'].'"    onclick="getMemberData($(this).val(),'.$Fe2aType.')" />',
                    $row_general_assembly['id'],
                    $row_general_assembly['name'],
                    
                    $row_general_assembly['mob'],

                    ''
                );
            }
        }
        echo json_encode($arr_general_assembly);
    }*/





    }


    public function GetArabicNum(){

        $number = number_format((float)$_POST['number'], 2, '.', '');
          if (strpos($number,'.') !== false) {
              $val =explode('.',$number);
              $integer =$this->convert_number($val[0]);
              $float =$this->convert_number(round($val[1]));
         if(!empty(round($val[1]))){
            if($integer == ''){ $reyal = ''; }else{ $reyal = 'ريال و';   } 
                  $data['title'] = $integer." "."".$reyal."". $float." "."هللة فقط لا غير"  ;
                  $data['value'] = $number;
             }else{
                 $data['title'] = $integer." "."ريال ". " فقط لا غير"  ;
                  $data['value'] = $val[0];

              }
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


/*
 public function GetByArray(){

     if($_POST['type'] === 'getAccount'){
     $data =$this->AllPills_model->select_all_by_condition(array('society_main_banks_account.bank_id_fk'=>$_POST['id']),'');
     }elseif ($_POST['type'] === 'getAccountNum'){
         $data =$this->AllPills_model->select_all_by_condition(
             array('type'=>2,'society_main_banks_account.bank_id_fk'=>$_POST['bank_id'],'society_main_banks_account.account_id_fk'=>$_POST['id']),'');
     }elseif ($_POST['type'] === 'GetAccountCode'){
         $data =$this->AllPills_model->select_all_by_condition(
             array('type'=>2,'society_main_banks_account.bank_id_fk'=>$_POST['bank_id'],
                 'society_main_banks_account.account_id_fk'=>$_POST['bank_account_id'],
                 'society_main_banks_account.account_num'=>$_POST['bank_account_num']),'');
     }
   echo json_encode($data);

 }
*/
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
 if($_POST['type'] === 'all'){

      $data['all_data'] =$this->AllPills_model->select_all_by_DeviceData(array('fr_devices_points.device_id_fk'=>$_POST['id']),'bank_id_fk');

     $data['account_code'] =$this->AllPills_model->select_all_by_condition(
         array('type'=>2,'society_main_banks_account.bank_id_fk'=>$data['all_data'][0]->bank_id_fk,
             'society_main_banks_account.account_id_fk'=>$data['all_data'][0]->account_id_fk),'');

 }
      echo json_encode($data);

    }
	

/*
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

    }*/



    public function GetTable(){

     $id= $_POST['id'];

        $data['username'] = $this->AllPills_model->getUserName($_SESSION['user_id']);
     $data['result'] = $this->AllPills_model->select_all_by_fr_all_pills(array('id'=>$id))[0];
     $number = number_format((float)$data['result']->value, 2, '.', '');
     if (strpos($number,'.') !== false) {
         $val =explode('.',$number);
         $integer =$this->convert_number($val[0]);
         $float =$this->convert_number($val[1]);
            if($integer == ''){ $reyal = ''; }else{ $reyal = 'ريال و';   } 
         
         $data['ArabicNum'] = $integer." "."".$reyal."". $float." "."هللة فقط لا غير"  ;

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
            array('fe2a'=>0,'band'=>0,'erad_tabro3'=>$_POST['erad_tbro3'],''));
        echo json_encode($data);
        //'id !='=>$_POST['fe2a']
    }



    public function GetBandType2(){
        $data = $this->AllPills_model->select_fr_bnod_pills_setting_by_condition(
            array('band'=>0,'fe2a'=>$_POST['id'],'code !='=>$_POST['FirstBandValue']));
        echo json_encode($data);
        //echo json_encode($_POST);
    }




   public  function DeletePill($id){
    $this->AllPills_model->DeletePill($id);
    $this->message('success',' تم حذف  الإيصال بنجاح');
    redirect('all_Finance_resource/all_pills/AllPills/addPills','refresh');
  }


  public function PrintPill($id){
    if(!empty($id)){
        $data['username'] = $this->AllPills_model->getUserName($_SESSION['user_id']);
        $data['result'] = $this->AllPills_model->select_all_by_fr_all_pills(array('id'=>$id))[0];
        $number =  number_format((float)$data['result']->value, 2, '.', '');
        if (strpos($number,'.') !== false) {
            $val =explode('.',$number);
            $integer =$this->convert_number($val[0]);
            $float =$this->convert_number(round($val[1]));
            if(!empty(round($val[1]))){
                  if($integer == ''){ $reyal = ''; }else{ $reyal = 'ريال و';   } 
                
                $data['ArabicNum'] = $integer." "."".$reyal."". $float." "."هللة فقط لا غير"  ;
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




        $data['result'] = $this->AllPills_model->select_all_by_fr_all_pills(array('id'=>$id))[0];
               $data['gathering_place'] =  $this->AllPills_model->GetFromFr_settings(14);
               $data['titles'] = $this->AllPills_model->GetFromFr_settings(8);
               $data['greetings'] = $this->AllPills_model->GetFromFr_settings(9);

             //  $this->load->view('admin/all_Finance_resource_views/all_pills/PrintPill', $data);
             $type_esal = $this->AllPills_model->get_type_print($_SESSION['emp_code']);
if (!empty($type_esal)) {
    if ($type_esal == 1) {
//                $this->test($_SESSION);
        $this->load->view('admin/all_Finance_resource_views/all_pills/PrintPill', $data);
    } else if ($type_esal == 2) {
        $this->load->view('admin/all_Finance_resource_views/all_pills/PrintPill_n', $data);
    }
} else {
    $this->load->view('admin/all_Finance_resource_views/all_pills/PrintPill_n', $data);

}
            }
  }
  
  
  
  
  
  /* print_ajax  public function PrintPill(){
    $id=$this->input->post('row_id');
    if(!empty($id)){
        $data['username'] = $this->AllPills_model->getUserName($_SESSION['user_id']);
        $data['result'] = $this->AllPills_model->select_all_by_fr_all_pills(array('id'=>$id))[0];
        $number =  number_format((float)$data['result']->value, 2, '.', '');
        if (strpos($number,'.') !== false) {
            $val =explode('.',$number);
            $integer =$this->convert_number($val[0]);
            $float =$this->convert_number(round($val[1]));
            if(!empty(round($val[1]))){
                  if($integer == ''){ $reyal = ''; }else{ $reyal = 'ريال و';   } 
                
                $data['ArabicNum'] = $integer." "."".$reyal."". $float." "."هللة فقط لا غير"  ;
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




        $data['result'] = $this->AllPills_model->select_all_by_fr_all_pills(array('id'=>$id))[0];
               $data['gathering_place'] =  $this->AllPills_model->GetFromFr_settings(14);
               $data['titles'] = $this->AllPills_model->GetFromFr_settings(8);
               $data['greetings'] = $this->AllPills_model->GetFromFr_settings(9);

             //  $this->load->view('admin/all_Finance_resource_views/all_pills/PrintPill', $data);
             $type_esal = $this->AllPills_model->get_type_print($_SESSION['emp_code']);
if (!empty($type_esal)) {
    if ($type_esal == 1) {
//                $this->test($_SESSION);
        $this->load->view('admin/all_Finance_resource_views/all_pills/PrintPill', $data);
    } else if ($type_esal == 2) {
        $this->load->view('admin/all_Finance_resource_views/all_pills/PrintPill_n', $data);
    }
} else {
    $this->load->view('admin/all_Finance_resource_views/all_pills/PrintPill_n', $data);

}
            }
  }
  */
  
  public function PrintPill_dep($id){
    if(!empty($id)){
        $data['username'] = $this->AllPills_model->getUserName($_SESSION['user_id']);
        $data['result'] = $this->AllPills_model->select_all_by_fr_all_pills(array('id'=>$id))[0];
        $number =  number_format((float)$data['result']->value, 2, '.', '');
        if (strpos($number,'.') !== false) {
            $val =explode('.',$number);
            $integer =$this->convert_number($val[0]);
            $float =$this->convert_number(round($val[1]));
            if(!empty(round($val[1]))){
                 if($integer == ''){ $reyal = ''; }else{ $reyal = 'ريال و';   } 
                
                $data['ArabicNum'] = $integer." "."".$reyal."". $float." "."هللة فقط لا غير"  ;
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




        $data['result'] = $this->AllPills_model->select_all_by_fr_all_pills(array('id'=>$id))[0];
               $data['gathering_place'] =  $this->AllPills_model->GetFromFr_settings(14);
               $data['titles'] = $this->AllPills_model->GetFromFr_settings(8);
               $data['greetings'] = $this->AllPills_model->GetFromFr_settings(9);

             //  $this->load->view('admin/all_Finance_resource_views/all_pills/PrintPill', $data);
             $type_esal = $this->AllPills_model->get_type_print($_SESSION['emp_code']);
if (!empty($type_esal)) {
    if ($type_esal == 1) {
//                $this->test($_SESSION);
        $this->load->view('admin/all_Finance_resource_views/all_pills/PrintPill', $data);
    } else if ($type_esal == 2) {
        $this->load->view('admin/all_Finance_resource_views/all_pills/PrintPill_n', $data);
    }
} else {
    $this->load->view('admin/all_Finance_resource_views/all_pills/PrintPill', $data);

}
            }
  }
    
  
  
  
  
  
  
  
  
  
  
  
/*
  public function PrintPill($id){
    if(!empty($id)){
        $data['username'] = $this->AllPills_model->getUserName($_SESSION['user_id']);
        $data['result'] = $this->AllPills_model->select_all_by_fr_all_pills(array('id'=>$id))[0];
        $number =  number_format((float)$data['result']->value, 2, '.', '');
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




        $data['result'] = $this->AllPills_model->select_all_by_fr_all_pills(array('id'=>$id))[0];
               $data['gathering_place'] =  $this->AllPills_model->GetFromFr_settings(14);
               $data['titles'] = $this->AllPills_model->GetFromFr_settings(8);
               $data['greetings'] = $this->AllPills_model->GetFromFr_settings(9);

               $this->load->view('admin/all_Finance_resource_views/all_pills/PrintPill', $data);
            }
  }*/
 /***********************************************************************************/
 
	    public function GetDetails(){

        $id= $_POST['id'];

        $data['username'] = $this->AllPills_model->getUserName($_SESSION['user_id']);
        $data['result'] = $this->AllPills_model->select_all_by_fr_all_pills(array('id'=>$id))[0];

        
        $number = number_format((float)$data['result']->value, 2, '.', '');
        if (strpos($number,'.') !== false) {
            $val =explode('.',$number);
            $integer =$this->convert_number($val[0]);
            $float =$this->convert_number(round($val[1]));
            if(!empty(round($val[1]))){
                if($integer == ''){ $reyal = ''; }else{ $reyal = 'ريال و';   } 
                
                $data['ArabicNum'] = $integer." "."".$reyal."". $float." "."هللة فقط لا غير"  ;
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


        $data['all_banks'] = $this->AllPills_model->select_all_by_condition(array("society_main_banks_account.type"=>2)
        ,"society_main_banks_account.bank_id_fk");

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

                $data['fe2a_types'] = $this->Difined_model->select_all('fr_sponser_donors_setting','','',"","");
                $data['bank_accounts_arr'] =$this->AllPills_model->select_all_by_condition(
                    array('society_main_banks_account.bank_id_fk'=>$data['result']->bank_id_fk),'');
    
                 /*$data['bank_account_num_arr'] =$this->AllPills_model->select_all_by_condition(
                            array('type'=>2,'society_main_banks_account.bank_id_fk'=>$data['result']->bank_id_fk
                            ,'society_main_banks_account.account_id_fk'=>$data['result']->bank_account_id_fk),'');*/


        $data['eda3_data'] =$this->AllPills_model->select_all_by_condition(
            array('type'=>2,'society_main_banks_account.bank_id_fk'=>$data['result']->bank_id_fk,'society_main_banks_account.account_id_fk'=>$data['result']->bank_account_id_fk),'');
    
                        /*$data['shabka_banks_arr'] =$this->AllPills_model->select_all_by_DeviceData(
                            array('fr_devices_points.device_id_fk'=>$data['result']->device_num),'bank_id_fk');
                        
                      $data['bank_account_shabka_arr'] =$this->AllPills_model->select_all_by_DeviceData(
                            array('fr_devices_points.device_id_fk'=>$data['result']->device_num,
                                'fr_devices_points.bank_id_fk'=>$data['result']->bank_id_fk),'');
    
    
    
                     $data['bank_account_num_shabka_arr'] =$this->AllPills_model->select_all_by_DeviceData(
                       array('fr_devices_points.account_id_fk'=>$data['result']->bank_account_num
                       ,'fr_devices_points.bank_id_fk'=>$data['result']->bank_id_fk,
                           'fr_devices_points.device_id_fk'=>$data['result']->device_num),'');*/

        $data['all_data'] =$this->AllPills_model->select_all_by_DeviceData(array('fr_devices_points.device_id_fk'=>$data['result']->device_num),'bank_id_fk');
        $data['bank_account_code_shabka_arr'] =$this->AllPills_model->select_all_by_condition(
            array('type'=>2,'society_main_banks_account.bank_id_fk'=>$data['result']->bank_id_fk,
                'society_main_banks_account.account_id_fk'=>$data['result']->bank_account_id_fk),'');

        $data['esal_type'] = $this->AllPills_model->select_fr_bnod_pills_setting_by_condition(array('esal'=>0));
        $data['gathering_place'] =  $this->AllPills_model->GetFromFr_settings(14);
        $data['titles'] = $this->AllPills_model->GetFromFr_settings(8);
        $data['greetings'] = $this->AllPills_model->GetFromFr_settings(9);
        $data['banks'] = $this->Difined_model->select_all('banks_settings','','',"id","asc");
 $data['bank_brach'] = $this->AllPills_model->GetFromFr_settings(16);    

 $data['devices_points'] =$this->AllPills_model->select_all_devices_points();


        $this->load->view('admin/all_Finance_resource_views/all_pills/GetDetails',$data);
   
       }

 
/*
    public function GetDetails(){

        $id= $_POST['id'];

        $data['username'] = $this->AllPills_model->getUserName($_SESSION['user_id']);
        $data['result'] = $this->AllPills_model->select_all_by_fr_all_pills(array('id'=>$id))[0];

        
        $number = number_format((float)$data['result']->value, 2, '.', '');
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


        $data['all_banks'] = $this->AllPills_model->select_all_by_condition(array("society_main_banks_account.type"=>2)
        ,"society_main_banks_account.bank_id_fk");

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

                $data['fe2a_types'] = $this->Difined_model->select_all('fr_sponser_donors_setting','','',"","");
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

        $data['esal_type'] = $this->AllPills_model->select_fr_bnod_pills_setting_by_condition(array('esal'=>0));
        $data['gathering_place'] =  $this->AllPills_model->GetFromFr_settings(14);
        $data['titles'] = $this->AllPills_model->GetFromFr_settings(8);
        $data['greetings'] = $this->AllPills_model->GetFromFr_settings(9);
        $data['banks'] = $this->Difined_model->select_all('banks_settings','','',"id","asc");
 $data['bank_brach'] = $this->AllPills_model->GetFromFr_settings(16);    



        $this->load->view('admin/all_Finance_resource_views/all_pills/GetDetails',$data);
   
       }
       */
        

    public function deletePillImg($id,$link)
    {
        messages('success','تم حذف الصورة بنجاح');
        $this->AllPills_model->delete_attaches($id);
        redirect('all_Finance_resource/all_pills/AllPills/addPills/'.$link,'refresh');
    }
/****************************************************************************************/

public function getSearchResults()
    {
        $array_search_colum = $this->input->post('array_search_id');
        $input_search_value = $this->input->post('input_search_id');
        $data['records'] =  $this->AllPills_model->getSearchResults($array_search_colum,$input_search_value);
//        $this->test( count($data['records']));
        $this->load->view('admin/all_Finance_resource_views/all_pills/getSearchResults',$data);

    }

/****************************************************************/

 public function get_kafel(){ //all_Finance_resource/all_pills/AllPills/get_kafel
        $data['sponsers']= $this->AllPills_model->get_all_sponsers();
    
   
        $data['subview'] = 'admin/all_Finance_resource_views/all_pills/reports/sponsers_pills';
        $this->load->view('admin_index', $data);
    }
    
    public function get_pill_details(){ // all_Finance_resource/all_pills/AllPills/get_pill_details
        $id =$this->input->post('id');
        $data['details']= $this->AllPills_model->get_all_pill($id);
      //  print_r( $data['details']);
       $this->load->view('admin/all_Finance_resource_views/all_pills/reports/load_details',$data );
    }
    
/*    public function get_search_pills()
{
    $field=$this->input->post('array_search_id');
    if($field=='pay_method')
    {
        $valu=$this->input->post('select_search_id');
    }else{
        $valu=$this->input->post('input_search_id');

    }
    $data['details']= $this->AllPills_model->get_all_pill_search($field,$valu);
      //print_r( $data['details']);
    $this->load->view('admin/all_Finance_resource_views/all_pills/reports/load_details',$data );
}*/


    public function get_search_pills()
    {
        $field = $this->input->post('array_search_id');
        if ($field == 'pay_method') {
            $valu = $this->input->post('select_search_id');

        } elseif($field == 'bnd_type1') {
            $valu = $this->input->post('select_search_id3');

        }else{
            $valu = $this->input->post('input_search_id');
        }


        $data['details'] = $this->AllPills_model->get_all_pill_search($field, $valu);
        //print_r( $data['details']);
        $this->load->view('admin/all_Finance_resource_views/all_pills/reports/load_details', $data);
    }
 public function get_bands()
    {
        $bands = $this->AllPills_model->select_fr_bnod_pills_setting_by_condition(array('band' => 0,'type' => 4));
        echo json_encode($bands);
    }



     public function Print_Pill2($id){
        if(!empty($id)){
            $data['username'] = $this->AllPills_model->getUserName($_SESSION['user_id']);
            $data['result'] = $this->AllPills_model->select_all_by_fr_all_pills(array('id'=>$id))[0];
            $number =  number_format((float)$data['result']->value, 2, '.', '');
            if (strpos($number,'.') !== false) {
                $val =explode('.',$number);
                $integer =$this->convert_number($val[0]);
                $float =$this->convert_number(round($val[1]));
                if(!empty(round($val[1]))){
                      if($integer == ''){ $reyal = ''; }else{ $reyal = 'ريال و';   } 
                    
                    $data['ArabicNum'] = $integer." "."".$reyal."". $float." "."هللة فقط لا غير"  ;
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




            $data['result'] = $this->AllPills_model->select_all_by_fr_all_pills(array('id'=>$id))[0];
            $data['gathering_place'] =  $this->AllPills_model->GetFromFr_settings(14);
            $data['titles'] = $this->AllPills_model->GetFromFr_settings(8);
            $data['greetings'] = $this->AllPills_model->GetFromFr_settings(9);

           // $this->load->view('admin/all_Finance_resource_views/all_pills/PrintPill', $data);
           
      $type_esal = $this->AllPills_model->get_type_print($_SESSION['emp_code']);
      
    //  echo $type_esal;
if (!empty($type_esal)) {
    if ($type_esal == 1) {
//                $this->test($_SESSION);
        $this->load->view('admin/all_Finance_resource_views/all_pills/PrintPill', $data);
    } else if ($type_esal == 2) {
        $this->load->view('admin/all_Finance_resource_views/all_pills/PrintPill_n', $data);
    }
} else {
    $this->load->view('admin/all_Finance_resource_views/all_pills/PrintPill', $data);

}     
           
           
        }
    }

/******************************************************************************************************************/
public function pills_trahel()
{
   
    $data['title']="الايصالات  المرحله";
    $data['customer_js'] = $this->load->view('admin/all_Finance_resource_views/all_pills/esalat_table_js', '', TRUE);
    $this->load->view('admin/all_Finance_resource_views/all_pills/esalat_table', $data);
}

    public function data()
    {
/*
$this->load->driver('cache', array('adapter' =>'apc' ,'backup'=>'file'));
if (!$this->cache->get('all_pills_all_deported')) {
 $data_customer =$this->AllPills_model->select_all_by_fr_all_pills_all_deported();
 $this->cache->save('all_pills_all_deported',$data_customer,1800);
}

$customer=null;
$customer=$this->cache->get('all_pills_all_deported');     
    */ 
       $customer= $this->AllPills_model->select_all_by_fr_all_pills_all_deported();



        $arr = array();
        $arr['data'] = array();
        if(!empty($customer)){

            $pay_method_arr =array(1=>'نقدي',2=>'شيك',3=>'شبكة',4=>'إيداع نقدي',5=>'إيداع شيك',6=>'تحويل',7=>'أمر مستديم');
            $x = 0;
            foreach($customer as $row){
                $x++;
        
//==================================================================fa fa-paperclip red

	$func_send_whats ='onclick="get_member_send_whats('.$row->id.');"';
                    $link ='onclick="GetTable('.$row->id.');"';
                $link_del ='onclick="delete_row('.$row->id.');"';
                $link_attach='onclick="img_attach('.$row->file.');"';
                  if ($row->status == 1) {
              $status_checked= "checked";
              $status_display= "initial";
            }else {
              $status_checked="";
              $status_display= "none";

            }

                $modal1='<i class="fa fa-paperclip red" aria-hidden="true"></i>';
                if(!empty($row->file)){
                    $modal1='  <a  '.$link_attach.'data-toggle="modal" type="button" style="cursor: pointer"
                                           data-target="#modal-img" ">
                                                <i class="fa fa-paperclip" aria-hidden="true"></i></a>';


                }

                if(!empty($row->file)){
                    $modal1='<a data-toggle="modal" type="button" style="cursor: pointer"
                   data-target="#modal-img" onclick="">
                        <i class="fa fa-paperclip" aria-hidden="true"></i>

                    </a>' ;}
                $modal2='  <a type="button" class="btn btn-info btn-xs" data-toggle="modal" style="padding: 1px 5px;" title="التفاصيل"
                                           '.$link.'  data-target="#myModal"><i class="fa fa-list"></i>
                                        </a>';
//==================================================================

               if($_SESSION['user_id'] == 14 || $_SESSION['user_id'] == 19) {


                   $modal3 = '<a target="_blank" style="display:'.$status_display.'" class="show_status'.$row->id.'" href="' . base_url() . 'all_Finance_resource/all_pills/AllPills/addPills/' . $row->id . '">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>';
                   // $modal4='<a onclick="deu();"</a>';
                   //   }
                   //$modal4='<a onclick="'+$('#adele').attr("href",base_url().all_Finance_resource/all_pills/AllPills/DeletePill)+'"></a>';
                   $modal4 = ' <a ' . $link_del . ' 
                               data-toggle="modal" data-target="#modal-delete"
                                               title="حذف"> <i class="fa fa-trash"
                                                               aria-hidden="true"></i> </a>';
                   $modal5 = '<a target="_blank" href="' . base_url() . 'all_Finance_resource/all_pills/AllPills/Print_Pill_traheel/' . $row->pill_num . '">
                                                <i class=\'fa fa-print\' aria - hidden =\'true\'></i> </a>';
               }elseif($_SESSION['user_id'] == 69 ) {

                   $modal3 = '<a target="_blank"   href="' . base_url() . 'all_Finance_resource/all_pills/AllPills/addPills/' . $row->id . '">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>';
                   // $modal4='<a onclick="deu();"</a>';
                   //   }
                   //$modal4='<a onclick="'+$('#adele').attr("href",base_url().all_Finance_resource/all_pills/AllPills/DeletePill)+'"></a>';
                   $modal4 = '';
                   $modal5 = '<a target="_blank" href="' . base_url() . 'all_Finance_resource/all_pills/AllPills/Print_Pill_traheel/' . $row->pill_num . '">
                                                <i class=\'fa fa-print\' aria - hidden =\'true\'></i> </a>';
               }else{
                   $modal5 = '<a target="_blank" href="' . base_url() . 'all_Finance_resource/all_pills/AllPills/Print_Pill_traheel/' . $row->pill_num . '">
                                                <i class=\'fa fa-print\' aria - hidden =\'true\'></i> </a>';
                   $modal4='';
                   $modal3 = '<a target="_blank" style="display:'.$status_display.'" class="show_status'.$row->id.'" href="' . base_url() . 'all_Finance_resource/all_pills/AllPills/addPills/' . $row->id . '">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>';
               }
               
               
             
                 
                 if($_SESSION['role_id_fk']==1 ){
                       $statuse=' <div class="toggle-example">
         <input id="status_hidden'.$row->id.'" type="hidden" value="'.$row->status.'"/>
         <input id="checkbox_toggle" class="checkbox_toggle" type="checkbox" '.$status_checked.' data-toggle="toggle"
          onchange="change_status($(\'#status_hidden'.$row->id.'\').val(),'.$row->id.')"
                 data-onstyle="success" data-offstyle="danger" data-size="mini">
                 </div> ';
                 }else{
                   $statuse= ''; 
                 }
          $modal_send_whats='  <a  class="btn btn-xs" target="_blank" data-toggle="modal" style="padding: 1px 5px;" title="ارسال"
                          '.$func_send_whats.'   data-target="#send_data_whats"><img  width="25" height="25" src="https://kawccq-sa.org/asisst/web_asset/img/dedication/wp.png">
                        </a>';
                        
          $func_send_sms ='onclick="get_member_send('.$row->id.');"'; 
                 $modal_send_sms='  <a type="button" class="btn btn-info btn-xs" data-toggle="modal" style="padding: 1px 5px;" title="إرسال رسالة نصية"
                                          '.$func_send_sms.'   data-target="#send_data"><i class="fa fa-commenting" aria-hidden="true"></i>

                                        </a>';               

    $person_name = '<span  style="font-size: 12px; color: #001dad  !important;"  data-toggle="tooltip" data-placement="bottom" title="'. $row->person_name .'"
               >'.    character_limiter($row->person_name,25) .'</span>';


                   $arr['data'][] = array(


                    $x,
                    $row->pill_num,
                    //$row->k_num,
//date('H:i:sa',$row->date_s)
// $row->pill_type_title
                    $row->pill_date,

                  
                    $pay_method_arr[$row->pay_method],
                    $row->value,
                   $person_name,
                      $row->person_mob,
                    $row->band_title,
                    $modal1.$modal2.$modal3.$modal4.$modal5.$modal_send_whats.$modal_send_sms,
                    $row->qued_type,
                    $row->qued_num,
                      $statuse,
                   
                                    '
                <span style="font-size: 12px; color: white !important;
                   background-color: #298fa9; "
                class="badge badge-add">'.    $row->publisher_name .'</span>
                '
                









                );
            }
        }
        $json = json_encode($arr);
        echo $json;
    }
	public function Print_Pill_traheel($pill_num){
        if(!empty($pill_num)){
            $data['username'] = $this->AllPills_model->getUserName($_SESSION['user_id']);
            $data['result'] = $this->AllPills_model->select_all_by_fr_all_pills(array('pill_num'=>$pill_num))[0];
            $number =  number_format((float)$data['result']->value, 2, '.', '');
            if (strpos($number,'.') !== false) {
                $val =explode('.',$number);
                $integer =$this->convert_number($val[0]);
                $float =$this->convert_number(round($val[1]));
                if(!empty(round($val[1]))){
                      if($integer == ''){ $reyal = ''; }else{ $reyal = 'ريال و';   } 
                    
                    $data['ArabicNum'] = $integer." "."".$reyal."". $float." "."هللة فقط لا غير"  ;
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




            $data['result'] = $this->AllPills_model->select_all_by_fr_all_pills(array('pill_num'=>$pill_num))[0];
            $data['gathering_place'] =  $this->AllPills_model->GetFromFr_settings(14);
            $data['titles'] = $this->AllPills_model->GetFromFr_settings(8);
            $data['greetings'] = $this->AllPills_model->GetFromFr_settings(9);

            //  $this->load->view('admin/all_Finance_resource_views/all_pills/PrintPill', $data);

            $type_esal = $this->AllPills_model->get_type_print($_SESSION['emp_code']);


            if (!empty($type_esal)) {
                if ($type_esal == 1) {
//                $this->test($_SESSION);
                    $this->load->view('admin/all_Finance_resource_views/all_pills/PrintPill_traheel', $data);
                } else if ($type_esal == 2) {
                    $this->load->view('admin/all_Finance_resource_views/all_pills/PrintPill_n_traheel', $data);
                }
            } else {
                $this->load->view('admin/all_Finance_resource_views/all_pills/PrintPill_n_traheel', $data);

            }


        }
    }

public function update_kafala_option(){
      
        $row_id = $this->input->post('row_id');
    
        $data_k= $this->AllPills_model->update_kafala_option($row_id);

        $this->AllPills_model->insert_pill_history();
        $data= $this->AllPills_model->get_kafala_option($row_id);
        echo json_encode($data);
    }
    
    	public function load_kafala_option(){

        $row_id = $this->input->post('row_id');

        if ($this->input->post('motb3a')){
            $data['motb3a']  = 'motb3a';
        }
        $data['kafala']=$this->AllPills_model->get_kafala_option($row_id);
        $this->load->view('admin/all_Finance_resource_views/all_pills/motab3a_view/load_kafala_option',$data);

    }
 /*public function update_kafala_option(){ 
      
        $row_id = $this->input->post('row_id');
       $data= $this->AllPills_model->update_kafala_option($row_id);
      
        echo json_encode($data);
    }*/
    /*public function load_kafala_option(){

        $row_id = $this->input->post('row_id');
        $data['kafala']=$this->AllPills_model->get_kafala_option($row_id);
        $this->load->view('admin/all_Finance_resource_views/all_pills/motab3a_view/load_kafala_option',$data);

    }*/


public function display_all_pills()
    { // all_Finance_resource/all_pills/AllPills/display_all_pills
        $data['all_pills_warda'] = $this->AllPills_model->get_all_pills(1);
        $data['all_pills_sadra'] = $this->AllPills_model->get_all_pills(4);

        $data['title'] = '  متابعة الكفالات ';
        $data['subview'] = 'admin/all_Finance_resource_views/all_pills/motab3a_view/all_motab3a_view';
        $this->load->view('admin_index', $data);

  
    }




 /*public function display_all_pills()
    { // all_Finance_resource/all_pills/AllPills/display_all_pills
        $data['all_pills'] = $this->AllPills_model->get_all_pills();
        $data['customer_js'] = $this->load->view('admin/all_Finance_resource_views/all_pills/motab3a_view/app_js', '', TRUE);
        $this->load->view('admin/all_Finance_resource_views/all_pills/motab3a_view/all_pills_view', $data);
    }*/

    public function data_pills()
    { 

        $customer = $this->AllPills_model->get_all_pills();


        $arr = array();
        $arr['data'] = array();
        if(!empty($customer)){
            $x = 0;
            foreach($customer as $row){
                $x++;
                   $pay_method_arr =array(1=>'نقدي',2=>'شيك',3=>'شبكة',4=>'إيداع نقدي',5=>'إيداع شيك',6=>'تحويل',7=>'أمر مستديم');
                if($row->person_type ==1){
                    $name = $row->MemberDetails['k_name'];
                }elseif ($row->person_type ==2){
                    $name = $row->MemberDetails['d_name'];
                }elseif ($row->person_type ==3){
                    $name =$row->MemberDetails['name'];
                }elseif($row->person_type == 0){
                    $name =$row->person_name;
                }
                if(!empty($pay_method_arr[$row->pay_method])){
                    $pay = $pay_method_arr[$row->pay_method];
                }
                if ($row->fe2a_type1==563) {
                    if (!empty($row->motb3a_option_n)) {
                        $title = $row->motb3a_option_n;
                    } else {
                        $title = 'متابعة الكفالة';
                    }
                    $kfala= '
                    <a type="button" id="kafala_title'.$row->id.'" class="btn btn-primary btn-xs" data-toggle="modal" style="padding: 1px 5px;"
                                           data-target="#kafalaModal" onclick="load_kafala('.$row->id.')"><i class="fa fa-list"></i>
                                            '.$title.'
                                        </a>
                    ';
                } else{
                    $kfala ='';
                }

                $arr['data'][] = array(

                    $x,
                    $row->pill_num,
                    $row->pill_date ,
                    $row->pill_type_title,

                    $pay,
                    $row->value,
                    $row->person_name,
                    $row->band_title,
                   '

                                    
                '.$kfala.'
                  
                  ',
                '
                <span style="font-size: 12px; color: white !important; font-weight: normal;background-color: #c57400;    width: 150px;"
                                 class="badge badge-add">'.$row->publisher_name.'</span>
                '



                );
            }
        }
        $json = json_encode($arr);
        echo $json;
    }
    
   public function change_status()
{
 $valu = $this->input->post('valu');
 $id = $this->input->post('id');
 $data['status'] = $this->AllPills_model->change_status($valu, $id);

 echo json_encode($data);

} 



 public function send_sms_whats()
    {
       /*
         
       $full_msg=$person_laqab." / ".$person_name.".
       نثمن لكم دعمكم.. ونقدر لكم اهتمامكم..
       شكرا لكم على دعمكم السخي بقيمة (".$value.") ريال سعودي 
       بوركت خطواتكم.. وتقبل الله منكم..
      نسعد بتكرار زيارتكم.. ونشرف بكم..
       $moshro3_name
       للتواصل  0553851919 
       لمتابعتنا علي تويتر   https://twitter.com/abna_bu?lang=ar ";
       */
     
      
        
        $pill_id=$this->input->post('pill_id_whats');
        $type_message=$this->input->post('type_message');
        $another_message=$this->input->post('another_message');
       $row=$this->AllPills_model->get_kafala_option($pill_id);
      $person_name=$row->person_name;
      $value=$row->value;
      $person_laqab=$row->person_laqab;
       $moshro3_name=$row->moshro3_name;
      
      
       /*$full_msg=$person_laqab." / ".$person_name.".
       شكر الله لكم بذلكم  بقيمة (".$value.")ريال سعودي  سعيا لمرافقة النبي صلي الله عليه وسلم وتقبل منكم.
       $moshro3_name
       نسعد بتجدد زيارتكم
       للتواصل  0553851919 
       لمتابعتنا علي تويتر   https://twitter.com/abna_bu?lang=ar ";
       $mobile='966'.$row->person_mob;
       $full_msg= urlencode($full_msg);*/
      
         $full_msg=$person_laqab." / ".$person_name.".
       نثمن لكم دعمكم.. ونقدر لكم اهتمامكم..
       شكرا لكم على دعمكم السخي بقيمة (".$value.") ريال سعودي 
       بوركت خطواتكم.. وتقبل الله منكم..
      نسعد بتكرار زيارتكم.. ونشرف بكم..
       $moshro3_name
       للتواصل  0553851511 
       لمتابعتنا علي تويتر   https://twitter.com/abna_bu?lang=ar 
        رأيك يهمنا    https://forms.gle/FLDvYuXWUjXPYULC7
       ";
        $mobile='966'.$row->person_mob;
        $full_msg= urlencode($full_msg);
       
       
        if($type_message==1)
        {
            $full_msg=$full_msg;
        }else{
           $full_msg=$another_message; 
        }
           
        $data['msg']=$full_msg;
        $data['person_mob']=$mobile;
        echo json_encode($data);
        
       // redirect("https://api.whatsapp.com/send?phone=$mobile&text=$full_msg&source=&data=","refresh");
        
        
        
        }
/*************************************************************************/


public function get_balance()
    {
        $arr=$this->cutl_test('966563388066','SAMEER1403');
        echo json_encode($arr);
    }




    public function send_sms()
    {
        
        
        $pill_id=$this->input->post('pill_id');
        $type_message=$this->input->post('type_message');
        $another_message=$this->input->post('another_message');

         $data=$this->AllPills_model->get_kafala_option($pill_id);
        $full_msg="abnaa ";

        if(isset($data)&& !empty($data))
       {
           $mobile="966563388066";
           $password='SAMEER1403';
           // $sender="Aytam Arar";
           $sender="abnaa";
           //$numbers=$row->mohda_eleh_jwal;
           //$numbers=$this->input->post('person_mob');
          $numbers =$data->person_mob;
        
      $person_name=$data->person_name;
      $value=$data->value;
      $person_laqab=$data->person_laqab;        
      $moshro3_name=$data->moshro3_name;  
        
       /*
       الأستاذ / مسعد السيد عبدالعزيز.
       نثمن لكم دعم الأيتام بقيمة (  ) ونقدر لكم اهتمامكم بهم
      
       بوركت خطواتكم.. وتقبل الله منكم.. 
      نسعد بتكرار زيارتكم..
       
       للتواصل  0553851919
       */   
           //$numbers="966597323333";
           // $numbers=‎‪+966 54 362 9615‬
         //  $msg=;
           
            $msg=$person_laqab." / ".$person_name.".
    نثمن لكم دعم الأيتام بقيمة (".$value.") ونقدر لكم إهتمامكم بهم 
       بوركت خطواتكم.. وتقبل الله منكم..
      نسعد بتكرار زيارتكم.
       $moshro3_name
       للتواصل  0553851511 
       لمتابعتنا علي تويتر   https://twitter.com/abna_bu?lang=ar 
      
       ";

           
           
           $MsgID = rand(1,99999);
           $timeSend=0;
           $dateSend=0;
           $deleteKey=0;
           $msgKey=0;
           $resultType=1;
           $this->sendSMS($mobile, $password, $numbers, $sender, $msg, $msgKey, $MsgID, $timeSend, $dateSend, $deleteKey, $resultType);


       }
        
    }
	
	
	function sendSMS($userAccount, $passAccount, $numbers, $sender, $msg, $MsgID, $timeSend=0, $dateSend=0, $deleteKey=0, $viewResult=1)
    {
        global $arraySendMsg;
        $url = "http://www.alfa-cell.com/api/msgSend.php";
        $applicationType = "68";
        $sender = urlencode($sender);
        $domainName = $_SERVER['SERVER_NAME'];

        if(!empty($userAccount) && empty($passAccount)) {
            $stringToPost = "apiKey=".$userAccount."&numbers=".$numbers."&sender=".$sender."&msg=".$msg."&timeSend=".$timeSend."&dateSend=".$dateSend."&applicationType=".$applicationType."&domainName=".$domainName."&msgId=".$MsgID."&deleteKey=".$deleteKey."&lang=3";
        } else {
            $stringToPost = "mobile=".$userAccount."&password=".$passAccount."&numbers=".$numbers."&sender=".$sender."&msg=".$msg."&timeSend=".$timeSend."&dateSend=".$dateSend."&applicationType=".$applicationType."&domainName=".$domainName."&msgId=".$MsgID."&deleteKey=".$deleteKey."&lang=3";
        }
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $stringToPost);
        $result = curl_exec($ch);
        echo $result;
        return;
        if($viewResult)
            $result = printStringResult(trim($result) , $arraySendMsg);
        return $result;
    }

    function printStringResult($apiResult, $printType = 'Alpha')
    {

        $arraySendMsg = array();
        $arraySendMsg[0] = "لم يتم الاتصال بالخادم";
        $arraySendMsg[1] = "تمت عملية الإرسال بنجاح";
        $arraySendMsg[2] = "رصيدك 0 , الرجاء إعادة التعبئة حتى تتمكن من إرسال الرسائل";
        $arraySendMsg[3] = "رصيدك غير كافي لإتمام عملية الإرسال";
        $arraySendMsg[4] = "رقم الجوال (إسم المستخدم) غير صحيح";
        $arraySendMsg[5] = "كلمة المرور الخاصة بالحساب غير صحيحة";
        $arraySendMsg[6] = "صفحة الانترنت غير فعالة , حاول الارسال من جديد";
        $arraySendMsg[7] = "نظام المدارس غير فعال";
        $arraySendMsg[8] = "تكرار رمز المدرسة لنفس المستخدم";
        $arraySendMsg[9] = "انتهاء الفترة التجريبية";
        $arraySendMsg[10] = "عدد الارقام لا يساوي عدد الرسائل";
        $arraySendMsg[11] = "اشتراكك لا يتيح لك ارسال رسائل لهذه المدرسة. يجب عليك تفعيل الاشتراك لهذه المدرسة";
        $arraySendMsg[12] = "إصدار البوابة غير صحيح";
        $arraySendMsg[13] = "الرقم المرسل به غير مفعل أو لا يوجد الرمز BS في نهاية الرسالة";
        $arraySendMsg[14] = "غير مصرح لك بالإرسال بإستخدام هذا المرسل";
        $arraySendMsg[15] = "الأرقام المرسل لها غير موجوده أو غير صحيحه";
        $arraySendMsg[16] = "إسم المرسل فارغ، أو غير صحيح";
        $arraySendMsg[17] = "نص الرسالة غير متوفر أو غير مشفر بشكل صحيح";
        $arraySendMsg[18] = "تم ايقاف الارسال من المزود";
        $arraySendMsg[19] = "لم يتم العثور على مفتاح نوع التطبيق";
        $arraySendMsg[101] = "الارسال باستخدام بوابات الارسال معطل";
        $arraySendMsg[102] = "الاي بي الخاص بك غير مصرح له بإستخدم بوابات الارسال.";
        $arraySendMsg[103] = "الدولة التي تقوم بالإرسال منها غير مصرح لها بإستخدم بوابات الارسال.";

//	$undefinedResult = "Ã¤ÃŠÃ­ÃŒÃ‰ Ã‡Ã¡ÃšÃ£Ã¡Ã­Ã‰ Ã›Ã­Ã‘ Ã£ÃšÃ‘ÃÃ¥Â¡ Ã‡Ã¡Ã‘ÃŒÃ‡Ã Ã‡Ã¡Ã£ÃÃ‡Ã¦Ã¡ Ã£ÃŒÃÃÃ‡";
        $undefinedResult = "نتيجة العملية غير معرفه، الرجاء المحاول مجددا";
        switch ($printType)
        {
            case 'Alpha':
            {
                if(array_key_exists($apiResult, $arrayMsgs))
                    return $arrayMsgs[$apiResult];
                else
                    return $arrayMsgs[0];
            }
                break;

            case 'Balance':
            {
                if(array_key_exists($apiResult, $arrayMsgs))
                    return $arrayMsgs[$apiResult];
                else
                {
                    list($originalAccount, $currentAccount) = explode("/", $apiResult);
                    if(!empty($originalAccount) && !empty($currentAccount))
                    {
                        return sprintf($arrayMsgs[3], $currentAccount, $originalAccount);
                    }
                    else
                        return $arrayMsgs[0];
                }
            }
                break;

            case 'Senders':
            {
                $apiResult = str_replace('[pending]', '[pending]<br>', $apiResult);
                $apiResult = str_replace('[active]', '<br>[active]<br>', $apiResult);
                $apiResult = str_replace('[notActive]', '<br>[notActive]<br>', $apiResult);
                return $apiResult;
            }
                break;

            case 'Normal':
                if($apiResult{0} != '#')
                    return $arrayMsgs[$apiResult];
                else
                    return $apiResult;
                break;
        }
    }
	
	 function cutl_test($userAccount, $passAccount,$sender='')
    {
        global $arraySendMsg;
        print_r($arraySendMsg);
//global $arraySendMsg;
        $url = "https://www.alfa-cell.com/api/balance.php";
        $applicationType = "68";
        $sender = urlencode($sender);
        $domainName = $_SERVER['SERVER_NAME'];
        if(!empty($userAccount) && empty($passAccount)) {
            $stringToPost = "mobile=".$userAccount."&password=".$passAccount."&returnJson=1";
        } else {
            //   $stringToPost = "mobile=".$userAccount."&password=".$passAccount."&returnJson=".$returnJson."&sender=".$sender."&msg=".$msg."&timeSend=".$timeSend."&dateSend=".$dateSend."&applicationType=".$applicationType."&domainName=".$domainName."&msgId=".$MsgID."&deleteKey=".$deleteKey."&lang=3";
            $stringToPost = "mobile=".$userAccount."&password=".$passAccount."&returnJson=1";
        }
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $stringToPost);
        $result = curl_exec($ch);
        $result=json_decode($result);


        $arr_before_explode=$result->Data->balance ;
        $arr_after_explode = explode(":", $arr_before_explode);
        return $arr_after_explode ;



        if($viewResult)
            $result = printStringResult(trim($result) , $arraySendMsg);
        return $result;
    }
    
     public  function update_whats_count(){

       $id = $this->input->post('pill_id');
       $value = $this->input->post('value');
       $this->AllPills_model->update_whats_count($id,$value);

    } 
    
}//END CLASS
