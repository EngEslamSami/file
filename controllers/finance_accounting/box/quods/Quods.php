<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quods extends MY_Controller {

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
        $this->load->model('finance_accounting_model/box/quods/Quods_model');
        $this->load->model('Difined_model');
    }
    
    
  /*  public function messages($type, $text, $method = false)
{
    $CI =& get_instance();
    $CI->load->library("session");
    if ($type == 'success') {
        return $CI->session->set_flashdata('message', '<script> 
        swal({
                title:"' . $text . '" ,
                type:"'.$type.'",
                confirmButtonText: "تم"
            });</script>');
    } elseif ($type == 'warning') {
        return $CI->session->set_flashdata('message',
            '');
    } elseif ($type == 'error') {
        return $CI->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> !</strong> ' . $text . '.</div>');
    }

}*/
     public function messages($type, $text, $method = false)
    {
        $CI =& get_instance();
        $CI->load->library("session");
        if ($type == 'success') {
            return $CI->session->set_flashdata('message', '
<script src="https://cdn.jsdelivr.net/npm/sweetalert2"></script>
<script> 
            Swal.fire({
                    title:"' . $text . '" ,
                    icon:"'.$type.'",
                    confirmButtonText: "تم"
                });</script>');
        } elseif ($type == 'warning') {
            return $CI->session->set_flashdata('message',
                '');
        } elseif ($type == 'error') {
            return $CI->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> !</strong> ' . $text . '.</div>');
        }

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

	public function add_quods($id=false) // finance_accounting/box/quods/Quods/add_quods
	{

       
     if($this->input->post('action') ===  'action'){
         $all_img= $this->upload_muli_image("file","images/finance_accounting/box/quods");

         if(!empty($all_img)){
             $all_img =$all_img;
         }else{
             $all_img='';
         }
         $this->messages('success','تم إضافة قيد');
         $this->Quods_model->insert($id,$all_img);
         redirect('finance_accounting/box/quods/Quods/add_quods','refresh');

     }else{
         $records = $this->Quods_model->getAllAccounts(array('id!='=>0));
         
         $data['QuodsTransfered'] = $this->Quods_model->getAllquod_3(array('deport'=>1));
         $data['QuodsNotTransfered'] = $this->Quods_model->getAllquod_3(array('deport'=>0));

         if($id != 0){
             $data['result'] = $this->Quods_model->getAllquod(array('id'=>$id))[0];
             //$this->test($data['result'] );
         }
         $data['tree'] = $this->buildTree($records);
         $data['last_id'] = $this->Quods_model->select_last_rkm_2();
         $data['title'] = 'إضافة قيد';
         $data['subview'] = 'admin/finance_accounting/box/quods/add_quods';
         $this->load->view('admin_index', $data);
     }

	}


	public function update_quods($id=false) // finance_accounting/box/quods/Quods/add_quods
	{

       
     if($this->input->post('action') ===  'action'){
        
     
         $all_img= $this->upload_muli_image("file","images/finance_accounting/box/quods");

         if(!empty($all_img)){
             $all_img =$all_img;
         }else{
             $all_img='';
         }
         $this->messages('success','تم التعديل بنجاح ');
         $this->Quods_model->update_quods($id,$all_img);
       //  redirect('finance_accounting/box/quods/Quods/add_quods','refresh');
        
  /*     $deport_or_not = $this->Quods_model->get_rkm_qqued_deport_or_not($id);
       
     if($deport_or_not == 1){
         redirect('finance_accounting/box/quods/Quods/all_deported_quods','refresh');  
     }elseif($deport_or_not ==0){
        redirect('finance_accounting/box/quods/Quods/all_not_deported_quods','refresh'); 
     }else{
      //  redirect('finance_accounting/box/quods/Quods/add_quods','refresh');  
       redirect('finance_accounting/box/quods/Quods/update_quods/' . $id, 'refresh');
     } */
        
        
          redirect('finance_accounting/box/quods/Quods/update_quods/' . $id, 'refresh');

     }else{
         $records = $this->Quods_model->getAllAccounts(array('id!='=>0));
      //   $data['QuodsTransfered'] = $this->Quods_model->getAllquod_3(array('halet_qued'=>1));
       //  $data['QuodsNotTransfered'] = $this->Quods_model->getAllquod_3(array('halet_qued'=>2));

         if($id != 0){
             $data['result'] = $this->Quods_model->getAllquod(array('id'=>$id))[0];
             
             
             //$this->test($data['result'] );
         }
         $data['tree'] = $this->buildTree($records);
         $data['last_id'] = $this->Quods_model->select_last_rkm_2();
         $data['title'] = 'تعديل قيد';
         $data['subview'] = 'admin/finance_accounting/box/quods/add_quods';
         $this->load->view('admin_index', $data);
     }

	}




public function getDetails(){
    $id= $_POST['id'];
   // $data['result'] = $this->Quods_model->getAllquod(array('id'=>$id))[0];
    $data['result'] = $this->Quods_model->getAllquodDetails(array('id'=>$id))[0];
    
    $data['total_value_elqeed'] = $this->Quods_model->get_total_value_elqeed($id);
    $data['elqeed_rkm'] = $this->Quods_model->get_elqeed_rkm($id);
    $data['elqeed_zero_details'] =  $this->Quods_model->get_elqeed_zero_value($data['elqeed_rkm']);
    
    
    $this->load->view('admin/finance_accounting/box/quods/GetDetails',$data);
}



    public function deleteQuod($id)
    {
        $this->messages('success','تم حذف قيد');

       $this->Quods_model->delete($id);
        redirect('finance_accounting/box/quods/Quods/add_quods','refresh');
    }

	public function buildTree($elements, $parent = 0) 
	{
        $branch = array();
        foreach ($elements as $element) {
            if ($element->parent == $parent) {
                $children = $this->buildTree($elements, $element->id);
                if ($children) {
                    $element->subs = $children;
                }
                $branch[$element->id] = $element;
            }
        }
        return $branch;
    }

    public function getValueArabic()
    {
        echo convertNumber($this->input->post('number'));
    }

    public function getAccountName()
    {
        echo $this->Quods_model->getAccount(array('code'=>$this->input->post('code'), 'hesab_no3'=>2))['name'];
    }



    public function deleteQuodImg($id,$link)
    {
        $this->messages('success','تم حذف الصورة بنجاح');
        $this->Quods_model->delete_attaches($id);
        redirect('finance_accounting/box/quods/Quods/add_quods/'.$link,'refresh');
    }
    public function Bank_transactions_transfer(){

        $data['details'] = $this->Quods_model->select_all_by_fr_all_pills();
        $data['details_queds'] = $this->Quods_model->select_all_in_queds();
        $data['last_id'] = $this->Quods_model->select_last_rkm();
        $data['title'] = 'إضافة قيد';
        $data['subview'] = 'admin/finance_accounting/box/quods/bank_transactions_transfer';
        $this->load->view('admin_index', $data);
    }

/************************************************************/


public function addQuods($id)
    {
        $data['sarf'] = $this->Quods_model->getSarfInfo($id);
        
        $data['main'] = $this->Quods_model->main_data();
        
        
        $records = $this->Quods_model->getAllAccounts(array('id!='=>0));
        $data['QuodsTransfered'] = $this->Quods_model->getAllquod_3(array('halet_qued'=>1));
        $data['QuodsNotTransfered'] = $this->Quods_model->getAllquod_3(array('halet_qued'=>2));
        $data['tree'] = $this->buildTree($records);
        $data['last_id'] = $this->Quods_model->select_last_rkm_2();
        $data['title'] = 'إضافة قيد';
        $data['subview'] = 'admin/finance_accounting/box/quods/add_quods';
        $this->load->view('admin_index', $data);
    }
    
/****************************************************/

/*
public function print_qued($id)
    {
    
   $data['result'] = $this->Quods_model->getAllquodDetails(array('rkm'=>$id))[0];
   
   $data['qued_data'] = $this->Quods_model->data_qued($id);
        $data['title'] = 'طباعة القيد المحاسبي';

        $this->load->view('admin/finance_accounting/box/quods/print_qued', $data);
    }    
    */
    

public function print_qued()
    {
        $id=$this->input->post('row_id');
      //  $data['result'] = $this->Quods_model->getAllquod(array('rkm'=>$id))[0];
   $data['result'] = $this->Quods_model->getAllquodDetails(array('rkm'=>$id))[0];
   
   $data['qued_data'] = $this->Quods_model->data_qued($id);
   
   $data['mohaseb_name'] = $this->Quods_model->get_job_title_person(502);
   $data['modeer_mali'] = $this->Quods_model->get_job_title_person(501);
   
   
    $data['total_value_elqeed'] = $this->Quods_model->get_total_value_elqeed_by_rkm($id);
    $data['elqeed_zero_details'] =  $this->Quods_model->get_elqeed_zero_value($id); 
   
   
   
   
        $data['title'] = 'طباعة القيد المحاسبي';

        $this->load->view('admin/finance_accounting/box/quods/print_qued', $data);
    }     
    
    
/**************************************************************************************/

    public function add_quods_form()
    {



        $all_img = $this->upload_muli_image("file","images/finance_accounting/box/quods");

        if(!empty($all_img)){
            $all_img =$all_img;
        }else{
            $all_img='';
        }

        $this->Quods_model->insert('',$all_img);

        echo json_encode($_POST);



    }



    public function CheckRkm(){
        $data =$this->Quods_model->CheckRkm($_POST['rkm']);
        echo json_encode($data);


    }    
    public function trahel_qued($valu,$num)
    {
        //$valu= $this->input->post('valu');
        
         $get_rkm_elqeed_id =  $this->Quods_model->get_rkm_elqeed($valu);
        $this->Quods_model->change_deport($valu,$num);
      //$this->PrintMessage('printQuod',$valu);
      //  redirect('finance_accounting/box/quods/Quods/add_quods','refresh');
      
      //  redirect('finance_accounting/box/quods/Quods/update_quods/' . $get_rkm_elqeed_id, 'refresh');

if($num == 0){
redirect('finance_accounting/box/quods/Quods/update_quods/' . $get_rkm_elqeed_id, 'refresh');
}elseif($num == 1){
      redirect('finance_accounting/box/quods/Quods/all_not_deported_quods', 'refresh');  
}


    }
   
   /*
   public function trahel_qued($valu)
    {
        
        $this->Quods_model->change_deport($valu);
        redirect('finance_accounting/box/quods/Quods/add_quods','refresh');
    
    }*/
  
    function PrintMessage($type ,$valu)
    {
        $CI =& get_instance();
        $CI->load->library("session");
    if ($type=='printQuod') {
            return $CI->session->set_flashdata('message',
                '
<script src="https://cdn.jsdelivr.net/npm/sweetalert2"></script>
<script>
		   Swal.fire({
            title: " هل تريد طباعة القيد ؟",
            text: "",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            cancelButtonText: "لا, إلغاء الأمر!",
            confirmButtonText: "نعم, قم بالطباعة!"
        }).then((result) => {
            if (result.value) {
           
                window.location.href = "'.base_url().'finance_accounting/box/quods/Quods/print_qued/'.$valu.'"   ;
            }
        })

            </script>');
        }
    }
  
    
    
 public function Track_Quods()
    {
       $data['tracked_quods'] = $this->Quods_model->getAllquodTracked();
        $data['subview'] = 'admin/finance_accounting/box/quods/all_tracked_quods';
        $this->load->view('admin_index', $data);
    }   
   
  
  


/*public function tarhel_bnod(){
        $this->load->model('familys_models/exchange_models/Allsarf_model');
        $this->load->model('Difined_model');
        $this->load->model('Model_family_cashing');
        $data['all_data']=$this->Model_family_cashing->select_finance_sarf_order();
        $data['alert'] = $this->Model_family_cashing->getLastRecord();
        $data['last_id'] = $this->Quods_model->select_last_rkm_2();
        $records = $this->Quods_model->getAllAccounts(array('id!='=>0));
        $data['tree'] = $this->buildTree($records);
        $data['sarf'] = $this->Quods_model->getSarfInfo(10);
        $data['main'] = $this->Quods_model->main_data();
        $data['title'] = 'إضافة قيد';
        $data['subview'] = 'admin/finance_accounting/box/quods/tarhel_bnod';
        $this->load->view('admin_index', $data);
    }  */
  
public function tarhel_bnod(){
        $this->load->model('familys_models/exchange_models/Allsarf_model');
        $this->load->model('Difined_model');
        $this->load->model('Model_family_cashing');
        $data['all_data']=$this->Model_family_cashing->select_finance_sarf_order( array('finance_sarf_order.cashing_date ='=>strtotime(date("Y-m-d")),'finance_sarf_order.approved'=>1));


        $data['alert'] = $this->Model_family_cashing->getLastRecord();
        $data['last_id'] = $this->Quods_model->select_last_rkm_2();
        $records = $this->Quods_model->getAllAccounts(array('id!='=>0));
        $data['tree'] = $this->buildTree($records);
        $data['sarf'] = $this->Quods_model->getSarfInfo(17);
        $data['main'] = $this->Quods_model->main_data();
        $data['title'] = 'إضافة قيد';
        $data['subview'] = 'admin/finance_accounting/box/quods/tarhel_bnod';
        $this->load->view('admin_index', $data);
    }
    
    
    
    /*
       public function get_result_search(){

  $data_load['records'] = $this->Quods_model->get_result_search($this->input->post('array_search_id'),$this->input->post('input_search_id'));

$this->load->view('admin/finance_accounting/box/quods/search_load_page', $data_load);


    }*/
     public function get_result_search(){
      $array_search = array('no3_qued','halet_qued','rkm','qued_date');
      if (in_array($this->input->post('array_search_id'),$array_search)) {
      $data_load['records'] = $this->Quods_model->get_result_search_by_finance_quods($this->input->post('array_search_id'),$this->input->post('input_search_id'));
      }else {
      $data_load['records'] = $this->Quods_model->get_result_search($this->input->post('array_search_id'),$this->input->post('input_search_id'));
      }

     $this->load->view('admin/finance_accounting/box/quods/search_load_page', $data_load);


    }
/**********************************************************************************/

	public function all_deported_quods() // finance_accounting/box/quods/Quods/all_deported_quods
	{

       
         $records = $this->Quods_model->getAllAccounts(array('id!='=>0));
         
         $data['QuodsTransfered'] = $this->Quods_model->getAllquod_3(array('deport'=>1));
        // $data['QuodsNotTransfered'] = $this->Quods_model->getAllquod_3(array('deport'=>0));

         /*if($id != 0){
            // $data['result'] = $this->Quods_model->getAllquod(array('id'=>$id))[0];
             //$this->test($data['result'] );
         }*/
         $data['tree'] = $this->buildTree($records);
         $data['last_id'] = $this->Quods_model->select_last_rkm_2();
         $data['title'] = ' قيود تمت المراجعة';
         $data['subview'] = 'admin/finance_accounting/box/quods/all_deported_quods_view';
         $this->load->view('admin_index', $data);
   
	}
 
 
 
 
 	public function all_not_deported_quods() // finance_accounting/box/quods/Quods/all_not_deported_quods
	{

       
         $records = $this->Quods_model->getAllAccounts(array('id!='=>0));
         
       //  $data['QuodsTransfered'] = $this->Quods_model->getAllquod_3(array('deport'=>1));
         $data['QuodsNotTransfered'] = $this->Quods_model->getAllquod_3(array('deport'=>0));

         /*if($id != 0){
            // $data['result'] = $this->Quods_model->getAllquod(array('id'=>$id))[0];
             //$this->test($data['result'] );
         }*/
         $data['tree'] = $this->buildTree($records);
         $data['last_id'] = $this->Quods_model->select_last_rkm_2();
         $data['title'] = ' قيود قيد المراجعة';
         $data['subview'] = 'admin/finance_accounting/box/quods/all_not_deported_quods_view';
         $this->load->view('admin_index', $data);
   
	}
    
    
    
        public function change_status()
    {
        $valu = $this->input->post('valu');
        $id = $this->input->post('id');
        $data['status'] = $this->Quods_model->change_status($valu, $id);

        echo json_encode($data);

    }
   /*********************************************/
   
   
       public function all_not_deported_quodss(){

        $all_quods = $this->Quods_model->getAllquod_3(array('deport'=>0));
        /*
        echo '<pre>';
        print_r($customer);
         echo '<pre>';*/
        // die;
        $arr = array();
        $arr['data'] = array();
        if(!empty($all_quods)){
            $x = 0;
            foreach($all_quods as $value){
                $x++;


                $buttons='';
                if( $_SESSION['user_id'] == 14 || $_SESSION['user_id'] == 19){
                    $buttons ='<a onclick="$(\'#adele\').attr(\'href\', \''.base_url() . "finance_accounting/box/quods/Quods/deleteQuod/" . $value->rkm.'\');"
       data-toggle="modal" data-target="#modal-delete" title="حذف"><i
            class="fa fa-trash"></i></a>
   ';

                }


                if ($value->deport == 0) {
                    $active_buttons='
                    <button style="color: black !important;"
                            class="btn btn-sm btn-warning tarhel<?= $value->rkm ?>"
                            onclick="tarhel('.$value->rkm.',1);"> تنفيذ مراجعة القيد
                        <i class="glyphicon glyphicon-backward"></i>
                    </button>';
                } else {

                    $active_buttons=' <button class="btn btn-success"
                            onclick="tarhel('.$value->rkm.');">تم مراجعة القيد
                    </button>';

                }

                $arr['data'][] = array(


                    $x,
                    $value->no3_qued_name,
                    $value->halet_qued_name,
                    $value->rkm,
                    $value->qued_date_ar,
                    number_format($value->total_value, 2),
                    date('H:i:sa', $value->date_s),
                    $value->publisher_name,
                    '
                    <a type="button" onclick="getDetails('.$value->id.')"
               class="btn btn-sm btn-info" data-toggle="modal"
               data-target="#detailsModal"
               style="padding: 3px 5px;line-height: 1;">
                <i class="glyphicon glyphicon-list"></i> 
            </a>
                    <a title="عرض المرفق" href="#" data-toggle="modal" onclick="getAttach('.$value->rkm.',\'all_not_deported_quods\')"
                                                       data-target="#myModal_attach"> <i
                                                                class="fa fa-eye" aria-hidden="true"></i> </a>
                    <a target="_blank" href="'.base_url()."finance_accounting/box/quods/Quods/update_quods/" . $value->id.'"
                                                         title="تعديل"><i class="fa fa-pencil"></i></a>
                      '.$buttons.'
                                      <a onclick="print_qued('.$value->rkm.')" title="طباعه"><i
                                            class="fa fa-print"></i></a>
                        '.$active_buttons.'          
                    '

                );
            }
        }
        $json = json_encode($arr);
        echo $json;
    }

    public function all_deported_quodss(){

        $all_quods = $this->Quods_model->getAllquod_3(array('deport'=>1));

        $arr = array();
        $arr['data'] = array();
        if(!empty($all_quods)){
            $x = 0;
            foreach($all_quods as $value){
                $x++;

             //   $active_buttons = '';
             $update_show = $deport_show = 'none';
          if ($value->status == 0) {
                  $deport_show = 'inline-block';

                    if ($_SESSION['user_id'] == 14 || $_SESSION['user_id'] == 19) {
                        $update_show = 'inline-block';
                    } else {
                        $update_show = 'none';
                    }
                }
          $active_buttons = '<a target="_blank" class="div_show'.$value->rkm.'" href="'.base_url()."finance_accounting/box/quods/Quods/update_quods/".$value->id.'"
                title="تعديل" style="display:'.$update_show.'"><i class="fa fa-pencil"  ></i></a>';

                if ($value->deport == 0) {
                    $deport_buttons ='
                    <button class="btn btn-sm btn-danger tarhel<?= $value->rkm ?> div_show'.$value->rkm.'" 
                            onclick="tarhel('.$value->rkm.');" style="display:'.$deport_show.'"> مراجعة القيد
                
                    </button>';
               } else {
                    $deport_buttons ='
                    <button class="btn btn-sm btn-danger div_show'.$value->rkm.'"
                            onclick="tarhel('.$value->rkm.',0);" style="display:'.$deport_show.'">الغاء مراجعة
                        القيد
                        <i class="glyphicon glyphicon-forward" ></i>
                    </button>';

               }

                if ($value->status == 0) {
                    $checked ='checked';
                }else{
                    $checked ='';
                }
                
                if($_SESSION['user_id'] == 14 || $_SESSION['user_id']==19){
                    
                    $check_togle = '<div class="toggle-example">
             <input id="status_hidden'.$value->rkm.'" type="hidden" value="'.$value->status.'"/>
             <input id="checkbox_toggle" class="checkbox_toggle" type="checkbox" '.$checked.'  data-toggle="toggle"
              onchange="change_status($(\'#status_hidden'.$value->rkm.'\').val(),'.$value->rkm.')"
                     data-onstyle="success" data-offstyle="danger" data-size="mini">  
                     </div> ';
                }else{
                  $check_togle ='';  
                }
                
                


                $arr['data'][] = array(


                    $x,
                    $value->no3_qued_name,
                    $value->halet_qued_name,
                    $value->rkm,
                    $value->qued_date_ar,
                    number_format($value->total_value, 2),
                    date('H:i:sa', $value->date_s),
                    $value->publisher_name,
                    $value->deport_publisher_name,
                    $value->deport_date_ar,
                    '
                    <a title="عرض المرفق" href="#" data-toggle="modal"
                                                       data-target="#myModal_attach" onclick="getAttach('.$value->rkm.',\'all_deported_quods\')"> <i
                                                                class="fa fa-eye" aria-hidden="true"></i> </a>
                                                                
           <a type="button" onclick="getDetails('.$value->id.')"
               class="btn btn-sm btn-info" data-toggle="modal"
               data-target="#detailsModal"
               style="padding: 3px 5px;line-height: 1;">
                <i class="glyphicon glyphicon-list"></i> 
            </a>
                <a onclick="print_qued('.$value->rkm.')" title="طباعه"><i
                                            class="fa fa-print"></i></a>                                            
                                                                
                 
 
                      '.$active_buttons.'
                      '.$deport_buttons.'
             '.$check_togle.'   
                                              
                    '




                );
            }
        }
        $json = json_encode($arr);
        echo $json;
    }

    public function getAttach(){

        $data_load["attaches"]=$this->Quods_model->getAttachesByRkm($_POST['rkm']);;
        $this->load->view('admin/finance_accounting/box/quods/quods_attachs_load_page', $data_load);

    }

    public function deleteQuodImg2($id,$link)
    {
        //messages('success','تم حذف الصورة بنجاح');
        $this->Quods_model->delete_attaches($id);
        redirect('finance_accounting/box/quods/Quods/'.$link,'refresh');
    }  
    
    
   public function get_marakz_taklefa()
    {
        $account_code = $this->input->post('account_code');
        $data['counter'] = $this->input->post('counter');
        $data['marakz_taklefa'] = $this->Quods_model->get_marakz_taklefa($account_code);
        $this->load->view('admin/finance_accounting/box/quods/load_marakz_taklefa', $data);

//        $this->test($data);

    }   
    
     
}


