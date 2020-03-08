<?php
 class Asnaf extends MY_Controller{
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
     $this->load->model('Difined_model');
     $this->load->model('st/asnaf/Asnaf_model');
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


public function add_asnaf(){ // st/asnaf/Asnaf/add_asnaf

    $data['fe2at']= $this->Asnaf_model->get_fe2a(0);
    $data['we7da']= $this->Asnaf_model->get_we7da(2);
    $data['code']= $this->Asnaf_model->get_code();
    if ($this->input->post('save')){
        $img = $this->upload_image('img');
        $this->Asnaf_model->insert_sanf($img);
        $this->messages('success','تم اضافة الصنف');
        redirect('st/asnaf/Asnaf/add_asnaf','refresh');
    }
    $data['title'] = 'تكويد الأصناف  ';
    $data['tasnef_js'] = $this->load->view('admin/st/asnaf/asnaf_js', '', TRUE);
    $this->load->view('admin/st/asnaf/asnaf_data', $data);


}
     public function GetTasnef() // st/asnaf/Asnaf/GetTasnef
     {
         if ($this->input->post("fe2a_id")) {
             $fe2a_id = $this->input->post("fe2a_id");
             $data_load["fe2a_id"] = $fe2a_id;
             $data_load["tasnefat"] = $this->Asnaf_model->get_fe2a($fe2a_id);
             $this->load->view('admin/st/asnaf/get_tasnef', $data_load);
         }

     }

     public function display_data(){
         $asnaf = $this->Asnaf_model->display_data();
         $arr = array();
         $arr['data'] = array();
         if(!empty($asnaf)){
             $x=0;
             foreach ($asnaf as $row){
                 $x++;
                 if ($row->tasnef_name != '0'){
                   $tasnef_name = $row->tasnef_name;
                 } else{
                     $tasnef_name = "لا يوجد"  ;
                 }

                 $arr['data'][] = array(
                     $x,
                     $row->code,
                     $row->code_br,
                     $row->name,
                     $row->fe2a_name,
                     $tasnef_name,
                     $row->we7da_name,
                '
  <button data-toggle="modal" data-target="#detailsModal" class="btn btn-sm btn-info"  onclick="load_page('.$row->id.');">
       <i class="fa fa-list "></i>
        
         
      تفاصيل  

</button>
  ',
                   '
                    <a href="#" onclick=\'swal({
                                            title: "هل انت متأكد من التعديل ؟",
                                            text: "",
                                            type: "warning",
                                            showCancelButton: true,
                                            confirmButtonClass: "btn-warning",
                                            confirmButtonText: "تعديل",
                                            cancelButtonText: "إلغاء",
                                            closeOnConfirm: false
                                            },
                                            function(){

                                            window.location="'.base_url().'st/asnaf/Asnaf/update_asnaf/'.$row->id.'";
                                            });\'>
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                   

                     
                      <a href="#" onclick=\'swal({
                                            title: "هل انت متأكد من الحذف ؟",
                                            text: "",
                                            type: "warning",
                                            showCancelButton: true,
                                            confirmButtonClass: "btn-danger",
                                            confirmButtonText: "حذف",
                                            cancelButtonText: "إلغاء",
                                            closeOnConfirm: false
                                            },
                                            function(){
                                            swal("تم الحذف!", "", "success");
                                            window.location="'.base_url().'st/asnaf/Asnaf/delete_asnaf/'.$row->id.'";
                                            });\'>
                                            <i class="fa fa-trash"> </i></a>

                     '

                 );
             }


         }
         $json = json_encode($arr);
         echo $json;

     }
     public function load_details(){

         $row_id = $this->input->post('row_id');
         $data['get_all']=$this->Asnaf_model->get_by_id($row_id)[0];

         $this->load->view('admin/st/asnaf/load_details',$data);

     }

     public function update_asnaf($id){
         $data['get_sanf']=$this->Asnaf_model->get_by_id($id)[0];
         $data['fe2at']= $this->Asnaf_model->get_fe2a(0);
         $data['we7da']= $this->Asnaf_model->get_we7da(2);
         $data['code']= $this->Asnaf_model->get_code();
         //$this->test($data['code']);
         if ($this->input->post('save')){
             $img = $this->upload_image('img');
             $this->Asnaf_model->update($id,$img);
             $this->messages('success','تم التعديل بنجاح ');
             redirect('st/asnaf/Asnaf/add_asnaf','refresh');
         }
         $data['title'] = 'تكويد الأصناف  ';
         $data['tasnef_js'] = $this->load->view('admin/st/asnaf/asnaf_js', '', TRUE);
         $this->load->view('admin/st/asnaf/asnaf_data', $data);

     }

     public function delete_asnaf ($id){
         $this->Asnaf_model->delete($id);
         $this->messages('success','تم الحذف بنجاح ');
         redirect('st/asnaf/Asnaf/add_asnaf','refresh');
     }
     public function Print_sanf(){ // st/asnaf/Asnaf/Print_sanf
         $data['title']="طباعة الأصناف" ;
         $row_id = $this->input->post('row_id');
         $data['get_all']=$this->Asnaf_model->get_by_id($row_id)[0];
         $this->load->view('admin/st/asnaf/print_asnaf', $data);

     }

 }