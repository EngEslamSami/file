<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sdad_fatora extends MY_Controller
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
        $this->load->model('finance_accounting_model/khdamat_mosanda/sdad_fatora/Sdad_fatora_model');
        $this->load->model('all_Finance_resource_models/all_pills/AllPills_model');
        $this->load->model("familys_models/namazeg_models/Namazeg_model");

        // $this->load->model('Difined_model');
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


    private function c($file_name)
    {
        $config['upload_path'] = 'uploads/images';
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

    private function upload_all_file($file_name)
    {
        $config['upload_path'] = 'uploads/images';
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

    private function upload_muli_file($input_name)
    {
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
    // private  function upload_image($file_name ,$folder){
    //     $config['upload_path'] = 'uploads/'.$folder;
    //     $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf';
    //     // $config['max_size']    = '1024*8';
    //     $config['max_size']    = '80000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000';

    //     $config['encrypt_name']=true;
    //     $this->load->library('upload',$config);
    //     if(! $this->upload->do_upload($file_name)){
    //         return  false;
    //     }else{
    //         $datafile = $this->upload->data();
    //         //$this->thumb($datafile);
    //         return  $datafile['file_name'];
    //     }
    // }
    private function upload_image($file_name, $folder = '')
    {
        if (!empty($folder)) {
            $config['upload_path'] = 'uploads/' . $folder;
        } else {
            $config['upload_path'] = 'uploads/images';
        }
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf';
        $config['max_size'] = '1024*888888888888888888888888888888888888888888888888888888888888888888888888';
        $config['encrypt_name'] = true;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($file_name)) {
            return false;
        } else {
            $datafile = $this->upload->data();
            $this->thumb($datafile, $folder);
            return $datafile['file_name'];
        }
    }
    
    
    public function messages($type, $text, $method = false)
    {
        $CI =& get_instance();
        $CI->load->library("session");
        if ($type == 'success') {
            return $CI->session->set_flashdata('message', '<script> swal({
                    type:"success",
                    title:"' . $text . '" ,
                    confirmButtonText: "تم"
                })</script>');
        } elseif ($type == 'warning') {
            return $CI->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>   !</strong> ' . $text . '.</div>');
        } elseif ($type == 'error') {
            return $CI->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> !</strong> ' . $text . '.</div>');
        }

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


    public function add_fatora()//finance_accounting/khdamat_mosanda/sdad_fatora/Sdad_fatora/add_fatora
    {

       $data['title']="تسديد الفواتير";

        $data['titles'] = $this->AllPills_model->GetFromFr_settings(8);
        $data['gehat'] =$this->Sdad_fatora_model->get_gehat();

        $data['records']=$this->Sdad_fatora_model->get_records();
//        echo "<pre>";
//        print_r(json_encode($data['records']));
//        return;
        $data['geha_table'] =$this->Sdad_fatora_model->get_finance_gehat();

        $data['last_rkm']=$this->Sdad_fatora_model->get_last_rkm();
        $data['markz']=$this->Sdad_fatora_model->get_markz(17);

        $data['greetings'] = $this->AllPills_model->GetFromFr_settings(9);
        $data['subview'] = 'admin/finance_accounting/khdamat_mosanda/sdad_fatora/sdad_fatora_view';
        $this->load->view('admin_index', $data);
    }


    function PrintMessage($type ,$valu){
        $CI =& get_instance();
        $CI->load->library("session");
        if ($type=='print') {
            return $CI->session->set_flashdata('message',
                '
<script src="https://cdn.jsdelivr.net/npm/sweetalert2"></script>
<script>
		   Swal.fire({
            title: " هل تريد طباعة  الفاتوره ؟",
            text: "",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            cancelButtonText: "لا, إلغاء الأمر!",
            confirmButtonText: "نعم, قم بالطباعة!"
        }).then((result) => {
            if (result.value) {
           
                window.location.href = "'.base_url().'finance_accounting/khdamat_mosanda/sdad_fatora/Sdad_fatora/print_fatora/'.$valu.'"   ;
            }
        })

            </script>');
        }
    }


    public function get_data($id=0){ //finance_accounting/khdamat_mosanda/sdad_fatora/Sdad_fatora/get_data
        $data['geha_table'] =$this->Namazeg_model->select_family_letter_setting();

        $data['markz']=$this->Sdad_fatora_model->get_markz(17);
        $data['titles'] = $this->AllPills_model->GetFromFr_settings(8);
        $data['greetings'] = $this->AllPills_model->GetFromFr_settings(9);
        $this->load->view('admin/finance_accounting/khdamat_mosanda/sdad_fatora/get_data',$data);
    }
public function add_fatora_db()
{

    $id=$this->Sdad_fatora_model->insert_fatora();
    
    $rkm=$this->input->post('t_rkm');
    $this->Sdad_fatora_model->insert_fatora_details($id,$rkm);

          $this->messages('success', 'تم الحفظ بنجاح');
      $rkm=$this->input->post('t_rkm');
    $this->PrintMessage('print',$rkm);

    redirect('finance_accounting/khdamat_mosanda/sdad_fatora/Sdad_fatora/add_fatora','refresh');

}

    public function update_fatora($rkm)
    {
        $rkm2=base64_decode($rkm);
        $data['title']="تعديل";
        $data['rows']=$this->Sdad_fatora_model->get_by_t_rkm($rkm2);


//        echo "<pre>";
//        print_r( $data['rows']);
//        return;


        $data['total_ar']=$this->GetTotalValueArabic2($data['rows'][0]->total_value);
        $data['geha_table'] =$this->Namazeg_model->select_family_letter_setting();

        $data['titles'] = $this->AllPills_model->GetFromFr_settings(8);

        $data['gehat'] =$this->Sdad_fatora_model->get_gehat();
        $data['greetings'] = $this->AllPills_model->GetFromFr_settings(9);
        $data['markz']=$this->Sdad_fatora_model->get_markz(17);
        $data['subview'] = 'admin/finance_accounting/khdamat_mosanda/sdad_fatora/sdad_fatora_view';
        $this->load->view('admin_index', $data);
    }
    public function update_db($rkm,$id)
    {

       $this->Sdad_fatora_model->update_fatora($rkm);
      

       $this->Sdad_fatora_model->insert_fatora_details($id,$rkm);

       $this->messages('success', 'تم التعديل بنجاح');

        redirect('finance_accounting/khdamat_mosanda/sdad_fatora/Sdad_fatora/add_fatora','refresh');
    }
    public function update_fatora_details()
    {
        $rkm= $this->input->post('rkm');
        $id= $this->input->post('id');
        
        $this->Sdad_fatora_model->update_fatora_details($rkm,$id);
      //  redirect('finance_accounting/khdamat_mosanda/sdad_fatora/Sdad_fatora/add_fatora','refresh');
        

    }

    public function delete_by_rkm($rkm)
    {
        $rkm2=base64_decode($rkm);
       
        $this->Sdad_fatora_model->delete_by_t_rkm($rkm2);
      //  $this->Sdad_fatora_model->delete_fatora_by_t_rkm($rkm2);
       // $this->messages('success', 'تم التعديل بنجاح');
        redirect('finance_accounting/khdamat_mosanda/sdad_fatora/Sdad_fatora/add_fatora','refresh');
    }
    public function delete_fatora_details()
    {
       
        $id= $this->input->post('id');
   $this->Sdad_fatora_model->delete_fatora($id);
    }
    public function GetTotalValueArabic2($num)
    {
        $number = number_format((float)$num, 2, '.', '');
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
        //echo json_encode($data[]);
        return $data['title'];

    }

    public function print_fatora($rkm)
    {


        
        $data['rows']=$this->Sdad_fatora_model->get_by_t_rkm($rkm);

        $data['total_ar']=$this->GetTotalValueArabic2($data['rows'][0]->total_value);
        $data['responsible_name']=$this->Sdad_fatora_model->get_name('hr_egraat_emp_setting','job_title_code_fk','person_name',504);
        $data['private_responsible_name']=$this->Sdad_fatora_model->get_name('hr_egraat_emp_setting','job_title_code_fk','person_private_name',504);
        $data['manager']=$this->Sdad_fatora_model->get_name('hr_egraat_emp_setting','job_title_code_fk','person_name',501);
        $this->load->view('admin/finance_accounting/khdamat_mosanda/sdad_fatora/print_page', $data);

    }

    public function get_fatora_print()
    {

          $rkm=$this->input->post('rkm');
         $data['rows']=$this->Sdad_fatora_model->get_by_t_rkm($rkm);
        $data['total_ar']=$this->GetTotalValueArabic2($data['rows'][0]->total_value);
        $data['responsible_name']=$this->Sdad_fatora_model->get_name('hr_egraat_emp_setting','job_title_code_fk','person_name',504);
        $data['private_responsible_name']=$this->Sdad_fatora_model->get_name('hr_egraat_emp_setting','job_title_code_fk','person_private_name',504);
        $data['manager']=$this->Sdad_fatora_model->get_name('hr_egraat_emp_setting','job_title_code_fk','person_name',501);
    //    echo "<pre>";
    //    print_r( $data);
    //    return;

         $this->load->view('admin/finance_accounting/khdamat_mosanda/sdad_fatora/print_page', $data);
    }
    public function get_fatora_details()
    {
        $rkm=$this->input->post('rkm');
        $data['rows']=$this->Sdad_fatora_model->get_by_t_rkm($rkm);

        $data['total_ar']=$this->GetTotalValueArabic2($data['rows'][0]->total_value);
        $this->load->view('admin/finance_accounting/khdamat_mosanda/sdad_fatora/detail_page', $data);
    }
    //yara_new
    public function get_fatora_details_page()
    {
        $rkm=$this->input->post('rkm');
        $data['rows']=$this->Sdad_fatora_model->get_by_t_rkm($rkm);

        $data['total_ar']=$this->GetTotalValueArabic2($data['rows'][0]->total_value);
        $this->load->view('admin/finance_accounting/khdamat_mosanda/sdad_fatora/detail_page_fatora', $data);
    }

    public function show_fatora()
    {

        $this->load->view('admin/finance_accounting/khdamat_mosanda/sdad_fatora/load_page',$_POST);
    }

    //====================================================
    public function insert_geha_ajax(){
        $this->Sdad_fatora_model->insert_geha();
        $data['table'] =$this->Sdad_fatora_model->get_finance_gehat();
        $this->load->view('admin/finance_accounting/khdamat_mosanda/sdad_fatora/geha_load_page',$data);
    }

    public function getById(){
        $id= $this->input->post('id');
        $geha =$this->Sdad_fatora_model->get_geha_by_id($id);
        echo json_encode($geha);
    }


    public function update_geha(){
        $id= $this->input->post('id');
        $this->Sdad_fatora_model->update_geah($id);
        $data['table'] =$this->Sdad_fatora_model->get_finance_gehat();

        $this->load->view('admin/finance_accounting/khdamat_mosanda/sdad_fatora/geha_load_page',$data);

    }
    public function delete_geha(){
        $id = $this->input->post('id');
        $this->Sdad_fatora_model->delete_geha($id);
        $data['table'] =$this->Sdad_fatora_model->get_finance_gehat();

        $this->load->view('admin/finance_accounting/khdamat_mosanda/sdad_fatora/geha_load_page',$data);

    }

    public function add_fatora_attach()
    {
       
        $images = $this->upload_muli_file("file");
        $this->Sdad_fatora_model->insert_attach($images);
        $this->messages('success', 'تم الحفظ بنجاح');

        redirect('finance_accounting/khdamat_mosanda/sdad_fatora/Sdad_fatora/add_fatora','refresh');
    }
    public function upload_img()
{
    $id = $this->input->post('row');
    
    //    echo "<pre>";
    //    print_r( $id);
    //    return;
    $images = $this->upload_muli_file("files");
    //      echo "<pre>";
    //    print_r( $file);
    //    return;
    $this->Sdad_fatora_model->insert_attach($id, $images);
}
    public function get_fatora_attach()
    {
        $id=$this->input->post('val_id');
      
       $data['imgs']=$this->Sdad_fatora_model->get_images($id);
        $this->load->view('admin/finance_accounting/khdamat_mosanda/sdad_fatora/load_attach',$data);


    }
  
    
    public function delete_attach()
    {
        $id=$this->input->post('val_id');
        $this->Sdad_fatora_model->delete_attach($id);
      

        
    }
//om
public function load_Transformation()
    {

        if ($this->input->post('operation')) {
            $this->Sdad_fatora_model->transformation();

            $this->messages('success', 'تم التحويل  بنجاح');
            redirect('finance_accounting/khdamat_mosanda/sdad_fatora/Sdad_fatora/add_fatora', 'refresh');

        } else {
            $rkm = $this->input->post('rkm');
            $data['rkm'] = $rkm;
            $data['gehat'] = $this->Sdad_fatora_model->get_gehat();
            $data['sadad_fatora'] = $this->Sdad_fatora_model->get_by('finance_sadad_fatora', array('t_rkm' => $rkm));
            $data['emp_gehat'] = $this->Sdad_fatora_model->get_all_by('hr_egraat_emp_setting', array('job_title_id_fk' => $data['sadad_fatora']->to_geha_id_fk));

            $this->load->view('admin/finance_accounting/khdamat_mosanda/sdad_fatora/Transform_view_pop', $data);

        }


    }

    public function get_emp()
    {
        $id_depart = $this->input->post('id_depart');
        $data['emp_gehat'] = $this->Sdad_fatora_model->get_all_by('hr_egraat_emp_setting', array('job_title_id_fk' => $id_depart));

        echo json_encode($data);

    }
}