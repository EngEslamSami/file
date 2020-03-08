<?php
class Moshtriat_ayni extends MY_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->library('pagination');
        if($this->session->userdata('is_logged_in')==0){
            redirect('login');
        }
        /**********************************************************/
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in  = $this->Counting->get_basic_in_num();
        $this->files_basic_in  = $this->Counting->get_files_basic_in();
        /*************************************************************/
        $this->load->helper(array('url','text','permission','form'));

        $this->load->model('system_management/Groups');

        $this->groups=$this->Groups->get_group($_SESSION["group_number"]);
        $this->groups_title=$this->Groups->get_group_title($_SESSION["group_number"]);
        $this->load->model('st/moshtriat_ayni/Moshtriat_ayni_model');
        $this->load->library('google_maps');
    }
    private  function test($data=array()){
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }
    private function thumb($data){
        $config['image_library'] = 'gd2';
        $config['source_image'] =$data['full_path'];
        $config['new_image'] = 'uploads/thumbs/'.$data['file_name'];
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['thumb_marker']='';
        $config['width'] = 275;
        $config['height'] = 250;
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
    }
    private  function upload_image($file_name){
        $config['upload_path'] = 'uploads/st/asnaf';
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf';
        $config['max_size']    = '1024*8';
        $config['encrypt_name']=true;
        $this->load->library('upload',$config);
        if(! $this->upload->do_upload($file_name)){
            return  false;
        }else{
            $datafile = $this->upload->data();
            $this->thumb($datafile);
            return  $datafile['file_name'];
        }
    }
    private function url (){
        unset($_SESSION['url']);
        $this->session->set_flashdata('url','http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
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

    //-----------------------------------------
    public function messages($type,$text,$method=false)
    {
        $CI =& get_instance();
        $CI->load->library("session");
        if($type =='success') {
            return $CI->session->set_flashdata('message','<script> swal({
                    title:"'.$text.'" ,
                    confirmButtonText: "تم"
                })</script>');
        }

        elseif($type=='warning'){
            return $CI->session->set_flashdata('message','<div class="alert alert-warning alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>   !</strong> '.$text.'.</div>');
        }elseif($type=='error'){
            return $CI->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> !</strong> '.$text.'.</div>');
        }

    }



    public function add_moshtriat(){ // st/moshtriat_ayni/Moshtriat_ayni/add_moshtriat
        $data['storage']= $this->Moshtriat_ayni_model->get_storage(1);
        $data['suppliers']= $this->Moshtriat_ayni_model->get_suppliers();
        $data['asnaf']= $this->Moshtriat_ayni_model->get_asnaf();
        $data['ezen']= $this->Moshtriat_ayni_model->get_ezn();
        $data['all_moshtriat']= $this->Moshtriat_ayni_model->display_moshtriat();
//        if ($this->input->post('save')){
//
//        }
        if ($this->input->post('save')){
            $id = $this->Moshtriat_ayni_model->insert_moshtriat();
           // $this->Moshtriat_ayni_model->insert_moshtriat();

            if($this->input->post('sanf_code')){
                $this->Moshtriat_ayni_model->insert_asnaf_details($id);
            }
      //   $this->test($_POST);
       //    die;
            $this->messages('success','تمت الاضافة بنجاح');
            redirect('st/moshtriat_ayni/Moshtriat_ayni/add_moshtriat','refresh');
        }
        $data['title']='مشتريات عينية';
        $data['subview']= 'admin/st/moshtriat_ayni/moshtriat_ayni_view';
        $this->load->view('admin_index',$data);
    }
    public function get_code(){ // st/moshtriat_ayni/Moshtriat_ayni/get_code
        $id= $this->input->post('id');
        $code = $this->Moshtriat_ayni_model->get_code($id);
       $json = json_encode($code);
       echo $json;


    }

    public function get_asnaf(){ // st/moshtriat_ayni/Moshtriat_ayni/get_asnaf
        $data['lenght']= $_POST['length'];

        $this->load->view('admin/st/moshtriat_ayni/get_asnaf');
    }

    public function delete_moshtriat($id){
        $this->Moshtriat_ayni_model->delete_moshtriat($id);
        $this->Moshtriat_ayni_model->delete_details($id);
        $this->messages('success','تم الحذف بنجاح ');
        redirect('st/moshtriat_ayni/Moshtriat_ayni/add_moshtriat','refresh');
    }
}