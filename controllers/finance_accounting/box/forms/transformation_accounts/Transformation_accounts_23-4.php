<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transformation_accounts extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        if($this->session->userdata('is_logged_in') == 0){
            redirect('login');
        }
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in  = $this->Counting->get_basic_in_num();
        $this->files_basic_in  = $this->Counting->get_files_basic_in();
        $this->load->model('finance_accounting_model/box/forms/transformation_accounts/Transformation_accounts_model');
        $this->load->model('Difined_model');
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
    
        public function GetTotalValueArabic()
    {
        $number = number_format((float)$_POST['number'], 2, '.', '');
        if (strpos($number,'.') !== false) {
            $val =explode('.',$number);
            $integer =$this->convert_number($val[0]);
            $float =$this->convert_number(round($val[1]));
            if(!empty(round($val[1]))){
                $data['title'] = $integer." "."ريال و". $float." "."هللة فقط لا غير"  ;
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
    
     private function upload_muli_file($input_name){
        $filesCount = count($_FILES[$input_name]['name']);
        for ($i = 0; $i < $filesCount; $i++) {
            $_FILES['userFile']['name'] = $_FILES[$input_name]['name'][$i];
            $_FILES['userFile']['type'] = $_FILES[$input_name]['type'][$i];
            $_FILES['userFile']['tmp_name'] = $_FILES[$input_name]['tmp_name'][$i];
            $_FILES['userFile']['error'] = $_FILES[$input_name]['error'][$i];
            $_FILES['userFile']['size'] = $_FILES[$input_name]['size'][$i];
            $all_img[] = $this->upload_all_file("userFile");
        }
        return $all_img;
    }
    private function upload_all_file($file_name)
    {
        $config['upload_path'] = 'uploads/family_attached/nmazg/nmazg_letter_attaches';
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
        $config['max_size'] = '100000000';
        $config['encrypt_name'] = true;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($file_name)) {
            return false;
        } else {
            $datafile = $this->upload->data();
            //  $this->thumb($datafile);
            return $datafile['file_name'];
        }
    }

    //"images/finance_accounting/box/quods"
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

    private function test($data = array()){
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }

	public function add_transformation_accounts(){
  // finance_accounting/box/forms/transformation_accounts/Transformation_accounts/add_transformation_accounts

         $data['last_id'] = $this->Transformation_accounts_model->select_last_id();
         $data['main_departments'] = $this->Transformation_accounts_model->select_department();
         $data['all_banks'] = $this->Transformation_accounts_model->select_all_by_condition(array("society_main_banks_account.type"=>2),"society_main_banks_account.bank_id_fk");
         $data['records'] = $this->Transformation_accounts_model->select_all();
         //$this->test($data['main_departments']);
         $data['title'] = 'النماذج والإجراءات';
         $data['subview'] = 'admin/finance_accounting/box/forms/transformation_accounts/add_transformation_accounts';
         $this->load->view('admin_index', $data);
	}


    public function update_transformation_accounts($id){
        // finance_accounting/box/forms/transformation_accounts/Transformation_accounts/update_transformation_accounts
            $data['result'] = $this->Transformation_accounts_model->get_result(array('process_rkm'=>$id));
            $data['result_details'] = $this->Transformation_accounts_model->get_result_details(array('process_rkm_fk'=>$id));
            $data['employes'] =$this->Difined_model->select_search_key('employees','administration',$data['result']->edara_id_fk);
            $data['last_id'] = $this->Transformation_accounts_model->select_last_id();
            $data['main_departments'] = $this->Transformation_accounts_model->select_department();
            $data['all_banks'] = $this->Transformation_accounts_model->select_all_by_condition(array("society_main_banks_account.type"=>2),"society_main_banks_account.bank_id_fk");
            $data['attaches'] = $this->Transformation_accounts_model->get_attach($id);
          
            $data['title'] = 'النماذج والإجراءات';
            $data['subview'] = 'admin/finance_accounting/box/forms/transformation_accounts/add_transformation_accounts';
            $this->load->view('admin_index', $data);


    }

    public function insert(){
        messages('success','تم إضافة النموذج والإجراء ');
        $this->Transformation_accounts_model->insert();
        redirect('finance_accounting/box/forms/transformation_accounts/Transformation_accounts/add_transformation_accounts','refresh');

    }


    public function update($process_rkm){

        messages('success','تم تعديل النموذج والإجراء ');
        $this->Transformation_accounts_model->update($process_rkm);
        redirect('finance_accounting/box/forms/transformation_accounts/Transformation_accounts/add_transformation_accounts','refresh');

    }

    public function Delete($process_rkm){


        $this->Transformation_accounts_model->Delete($process_rkm);
        redirect('finance_accounting/box/forms/transformation_accounts/Transformation_accounts/add_transformation_accounts','refresh');

    }



    public function getEmp(){


        $this->load->model('Difined_model');
        $data =$this->Difined_model->select_search_key('employees','administration',$_POST['edara_id_fk']);

        echo json_encode($data);



    }




    public function GetByArray(){

            $data =$this->Transformation_accounts_model->select_all_by_condition(array('society_main_banks_account.bank_id_fk'=>$_POST['id']),'');

        echo json_encode($data);

    }



    public function load_banks(){

        $data['all_banks'] = $this->Transformation_accounts_model->select_all_by_condition(array("society_main_banks_account.type"=>2),"society_main_banks_account.bank_id_fk");
    $this->load->view('admin/finance_accounting/box/forms/transformation_accounts/get_banks', $data);

    }


    public function getDetails(){
      $id= $_POST['id'];
        $data['result'] = $this->Transformation_accounts_model->get_result(array('process_rkm'=>$id));
          $data['result_details'] = $this->Transformation_accounts_model->get_result_details(array('process_rkm_fk'=>$id));
 //$this->test($data['result_details']);
        $this->load->view('admin/finance_accounting/box/forms/transformation_accounts/GetDetails',$data);
    }




    public function print_account_details($id){

        $data['result'] = $this->Transformation_accounts_model->get_result(array('process_rkm'=>$id));
        $data['result_details'] = $this->Transformation_accounts_model->get_result_details(array('process_rkm_fk'=>$id));

        $this->load->view('admin/finance_accounting/box/forms/transformation_accounts/print_account_details', $data);

    }

    /**************************************Stop*****************************/
	 public function add_morfaq($rkm)
    {

        $images=$this->upload_muli_file("file");
       $this->Transformation_accounts_model->insert_attach($rkm,$images);
       redirect('finance_accounting/box/forms/transformation_accounts/Transformation_accounts/add_transformation_accounts', 'refresh');

    }

    public function Delete_attach($id)
    {
        $this->Transformation_accounts_model->delete_attach($id);

        redirect('finance_accounting/box/forms/transformation_accounts/Transformation_accounts/add_transformation_accounts', 'refresh');
    }


}


