<?php

class Edafa_sarf_setting extends MY_Controller{
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
        $this->load->model('st/settings/Edafa_sarf_setting_model');
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

    public function add_sarf_setting(){ // st/settings/Edafa_sarf_setting/add_sarf_setting
        $records = $this->Edafa_sarf_setting_model->getAllAccounts();
        $data['tree'] = $this->buildTree($records);
        if ($this->input->post('save')){
            $this->Edafa_sarf_setting_model->insert_sarf();
            $this->messages('success','تمت الاضافة بنجاح');
            redirect('st/settings/Edafa_sarf_setting/add_sarf_setting','refresh');
        }

        $data['storage']= $this->Edafa_sarf_setting_model->get_storage(1);
        $data['adminstations'] = $this->Edafa_sarf_setting_model->select_search_key('department_jobs','from_id_fk',0);

        $data['title']= 'اعدادات الإضافة والصرف';
        $data['setting_js'] = $this->load->view('admin/st/settings/sarf_settings_js', '', TRUE);
        $this->load->view('admin/st/settings/edafa_sarf_setting_view', $data);
       // $data['subview'] = 'admin/st/settings/edafa_sarf_setting_view';
      //  $this->load->view('admin_index', $data);

    }

    public function GetDepart() // st/settings/Edafa_sarf_setting/GetDepart
    {
        if ($this->input->post("id_depart")) {
            $admin_id = $this->input->post("id_depart");
            $data_load["admin_id"] = $admin_id;
            $data_load["departments"] = $this->Edafa_sarf_setting_model->select_search_key("department_jobs", "from_id_fk", $admin_id);
            $this->load->view('admin/st/settings/get_department', $data_load);
        }elseif ($this->input->post("id_qsm")) {
            $this->load->model('Difined_model');
            $depart_id = $this->input->post("id_qsm");
            $Conditions_arr = array("employees.department" => $depart_id);
          //  $data_load["employees"] = $this->Edafa_sarf_setting_model->slect_where('employees',$Conditions_arr,'','','id','asc');
           $data_load["employees"] = $this->Edafa_sarf_setting_model->get_all_emp($Conditions_arr);

            $this->load->view('admin/st/settings/get_employees', $data_load);
        }

    }

    public function add_emp_row(){ //  st/settings/Edafa_sarf_setting/add_emp_row
        $data['lenght']= $_POST['length'];
        $data['storage']= $this->Edafa_sarf_setting_model->get_storage(1);

        $data['adminstations'] = $this->Edafa_sarf_setting_model->select_search_key('department_jobs','from_id_fk',0);
        $this->load->view('admin/st/settings/get_emp_row',$data);
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

    public function display_data(){
        $settings = $this->Edafa_sarf_setting_model->display_sarf();
        $arr = array();
        $arr['data'] = array();

        if(!empty($settings)){
            $x=0;
            foreach ($settings as $row) {
                $x++;
                if ($row->process==1){
                    $process_name= "إضافة";
                } elseif ($row->process==2){
                    $process_name= "صرف";
                }
                $arr['data'][] = array(
                    $x,
                   /* $row->edara_name,
                    $row->qsm_name,*/
                    $row->emp_name,
                    $row->storage_name,
                    $process_name,
                   /* $row->rkm_hesab,
                    $row->hesab_name,
                    $row->rkm_hesab_moshtriat,
                    $row->hesab_moshtriat_name,*/
                    $row->date_ar,
                    
                    '
                	   <a data-toggle="modal" data-target="#detailsModal" class="btn btn-xs btn-info" style="padding:1px 5px;" onclick="load_page('.$row->id.');">
                       <i class="fa fa-list "></i>
                     
                </a>
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

                                            window.location="'.base_url().'st/settings/Edafa_sarf_setting/update_setting/'.$row->id.'";
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
                                            window.location="'.base_url().'st/settings/Edafa_sarf_setting/delete_setting/'.$row->id.'";
                                            });\'>
                                            <i class="fa fa-trash"> </i></a>

                     '


                );
            }

        }
        $json = json_encode($arr);
        echo $json;
    }

    public function update_setting($id){
        $data['get_sarf']= $this->Edafa_sarf_setting_model->getById($id)[0];
      // $this->test( $data['get_sarf']);
        $data['storage']= $this->Edafa_sarf_setting_model->get_storage(1);
        $data['adminstations'] = $this->Edafa_sarf_setting_model->select_search_key('department_jobs','from_id_fk',0);

        $records = $this->Edafa_sarf_setting_model->getAllAccounts();
        $data['tree'] = $this->buildTree($records);
        if ($this->input->post('save')){
          //  $this->test($_POST);
          //  die;
            $this->Edafa_sarf_setting_model->update($id);
            $this->messages('success','تمت التعديل بنجاح');
            redirect('st/settings/Edafa_sarf_setting/add_sarf_setting','refresh');
        }
        $data['title']= 'اعدادات الإضافة والصرف';
        $data['setting_js'] = $this->load->view('admin/st/settings/sarf_settings_js', '', TRUE);
        $this->load->view('admin/st/settings/edafa_sarf_setting_view', $data);
    }


    public function delete_setting ($id){
        $this->Edafa_sarf_setting_model->delete($id);
        $this->messages('success','تم الحذف بنجاح ');
        redirect('st/settings/Edafa_sarf_setting/add_sarf_setting','refresh');
    }

 public function load_details(){

        $row_id = $this->input->post('row_id');
        $data['get_sarf']= $this->Edafa_sarf_setting_model->getById($row_id)[0];
     
        $this->load->view('admin/st/settings/load_details',$data);

    }

    public function Print_sarf(){

        $row_id = $this->input->post('row_id');
        $data['get_sarf']= $this->Edafa_sarf_setting_model->getById($row_id)[0];
        $this->load->view('admin/st/settings/print_sarf', $data);

    }


}