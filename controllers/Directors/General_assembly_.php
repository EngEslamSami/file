<?php
class General_assembly extends MY_Controller
{
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
        $this->load->model('directors/General_assembly_model');
        $this->load->model('Difined_model');
        $this->load->library('google_maps');
        $this->load->model('human_resources_model/employee_setting/Employee_setting');
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
    $config['upload_path'] = 'uploads/images';
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
    private  function upload_file($file_name){
        $config['upload_path'] = 'uploads/files';
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
        $config['max_size']    = '1024*8';
        $config['overwrite'] = true;
        $this->load->library('upload',$config);
        if(! $this->upload->do_upload($file_name)){
            return  false;
        }else {
            $datafile = $this->upload->data();
            return $datafile['file_name'];
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
 private function message($type,$text){
          if($type =='success') {
              return $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible shadow" ><button type="button" class="close pull-left" data-dismiss="alert">×</button><h4 class="text-lg"><i class="fa fa-check icn-xs"></i> تم بنجاح ...</h4><p>'.$text.'!</p></div>');
          }elseif($type=='wiring'){
              return $this->session->set_flashdata('message','<div class="alert alert-warning alert-dismissible" ><button type="button" class="close pull-left" data-dismiss="alert">×</button><h4 class="text-lg"><i class="fa fa-exclamation-triangle icn-xs"></i> تحذير هام ...</h4><p>'.$text.'</p></div>');
          }elseif($type=='error'){
              return  $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" ><button type="button" class="close pull-left" data-dismiss="alert">×</button><h4 class="text-lg"><i class="fa fa-exclamation-circle icn-xs"></i> خطآ ...</h4><p>'.$text.'</p></div>');
          }
        }
/**
 *  ================================================================================================================
 *
 *  ================================================================================================================
 *
 *  ================================================================================================================
 */



        public function  add_member_maindata(){//Directors/General_assembly/add_member_maindata

         if($this->input->post('save')){

             $img='img';
             $id_img='id_img';
             $file['img']= $this->upload_image($img);
             $file['id_img']= $this->upload_image($id_img);
            $this->General_assembly_model->insert($file);
            redirect('Directors/General_assembly/add_member_maindata', 'refresh');
          }else {

             /***************************mymap**********/
             $config = array();
             $config['zoom'] = "auto";
             $marker = array();
             $marker['draggable'] = true;
             $marker['ondragend'] = '$("#lat").val(event.latLng.lat());$("#lng").val(event.latLng.lng());';
             $config['onboundschanged'] = '  if (!centreGot) {
                                                var mapCentre = map.getCenter();
                                                marker_0.setOptions({
                                                    position: new google.maps.LatLng(mapCentre.lat(), mapCentre.lng()) 
                                                });
                                                $("#lat").val(mapCentre.lat());
                                                $("#lng").val(mapCentre.lng());
                                            }
                                            centreGot = true;';
             $config['geocodeCaching'] = TRUE;

             // $this->test($data["check_data"]);
             if(!empty( $data["check_data"]['house_google_lat']) && !empty ($data["check_data"]['house_google_lng'])){
                 $center = implode(',', array(
                     $data["check_data"]['house_google_lat'],
                     $data["check_data"]['house_google_lng']
                 ));
             }else{
                 $center = '27.517571447136426,41.71273613027347';
             }
             $config['center'] = $center;
             $this->google_maps->initialize($config);
             $this->google_maps->add_marker($marker);
             $data['maps'] = $this->google_maps->create_map();
             /***************************mymap**********/
             $data["current_hijry_year"] = $this->current_hjri_year();
             $data['gender_data'] =$this->General_assembly_model->GetFromEmployees_settings(1);
             $data['nationality'] =$this->General_assembly_model->GetFromEmployees_settings(2);
             $data['social_status'] =$this->General_assembly_model->GetFromEmployees_settings(4);
             $data['dest_card'] =$this->General_assembly_model->GetFromEmployees_settings(6);
             $data['cities']= $this->Employee_setting->select_areas();
             $data['ahais']= $this->Employee_setting->select_residentials();
             $data['Degree'] = $this->General_assembly_model->GetFromEmployees_settings(14);
             $data['science_qualification'] = $this->General_assembly_model->GetFromEmployees_settings(15);
             $data['employer'] = $this->General_assembly_model->GetFromGeneral_assembly_settings(1);
             $data['job_role'] = $this->Difined_model->select_search_key('all_defined_setting', 'defined_type', '4');
             $data['records'] = $this->Difined_model->select_all('general_assembley_members','','','','');
             $data['title'] = 'إضافة البيانات الأساسية';
             $data['subview'] = 'admin/directors/general_assembly/add_member_maindata';
             $this->load->view('admin_index', $data);
            }

         }
    public function  update_member_maindata($id){
        $data['result'] = $this->General_assembly_model->getById($id)[0];
        if($this->input->post('save')){
            $img='img';
            $id_img='id_img';
            $file['img']= $this->upload_image($img);
            $file['id_img']= $this->upload_image($id_img);
            $this->General_assembly_model->update($file,$id);
            redirect('Directors/General_assembly/add_member_maindata', 'refresh');
        }else {

            /***************************mymap**********/
            $config = array();
            $config['zoom'] = "auto";
            $marker = array();
            $marker['draggable'] = true;
            $marker['ondragend'] = '$("#lat").val(event.latLng.lat());$("#lng").val(event.latLng.lng());';
            $config['onboundschanged'] = '  if (!centreGot) {
                                                var mapCentre = map.getCenter();
                                                marker_0.setOptions({
                                                    position: new google.maps.LatLng(mapCentre.lat(), mapCentre.lng()) 
                                                });
                                                $("#lat").val(mapCentre.lat());
                                                $("#lng").val(mapCentre.lng());
                                            }
                                            centreGot = true;';
            $config['geocodeCaching'] = TRUE;

            // $this->test($data["check_data"]);
            if(!empty(  $data['result']->location_google_lat) && !empty ( $data['result']->location_google_lng)){
                $center = implode(',', array(
                    $data['result']->location_google_lat,
                    $data['result']->location_google_lng
                ));
            }else{
                $center = '27.517571447136426,41.71273613027347';
            }
            $config['center'] = $center;
            $this->google_maps->initialize($config);
            $this->google_maps->add_marker($marker);
            $data['maps'] = $this->google_maps->create_map();
            /***************************mymap**********/
            $data["current_hijry_year"] = $this->current_hjri_year();
            $data['gender_data'] =$this->General_assembly_model->GetFromEmployees_settings(1);
            $data['nationality'] =$this->General_assembly_model->GetFromEmployees_settings(2);
            $data['social_status'] =$this->General_assembly_model->GetFromEmployees_settings(4);
            $data['dest_card'] =$this->General_assembly_model->GetFromEmployees_settings(6);
            $data['cities']= $this->Employee_setting->select_areas();
            $data['ahais']= $this->Employee_setting->select_residentials();
            $data['Degree'] = $this->General_assembly_model->GetFromEmployees_settings(14);
            $data['science_qualification'] = $this->General_assembly_model->GetFromEmployees_settings(15);
            $data['employer'] = $this->General_assembly_model->GetFromGeneral_assembly_settings(1);
            $data['job_role'] = $this->Difined_model->select_search_key('all_defined_setting', 'defined_type', '4');
            $data['records'] = $this->Difined_model->select_all('general_assembley_members','','','','');

            $data['title'] = 'إضافة البيانات الأساسية';
            $data['subview'] = 'admin/directors/general_assembly/add_member_maindata';
            $this->load->view('admin_index', $data);
        }

    }

            public function ChangeType($id,$value){

                $this->General_assembly_model->ChangeType($id,$value);
                redirect('Directors/General_assembly/add_member_maindata', 'refresh');
            }

    public function delete_member_maindata($id){

            $this->General_assembly_model->delete($id);
        redirect('Directors/General_assembly/add_member_maindata', 'refresh');

    }

    public function add_membership_data($id){





        if($this->input->post('save')){

            $img='img';
            $id_img='id_img';
            $file['img']= $this->upload_image($img);
            $file['id_img']= $this->upload_image($id_img);
            $this->General_assembly_model->insert($file);
            redirect('Directors/General_assembly/add_member_maindata', 'refresh');
        }else {
            $data["current_hijry_year"] = $this->current_hjri_year();
            //$data['records'] = $this->Difined_model->select_all('general_assembley_members','','','','');
            $data['banks'] = $this->Difined_model->select_all('banks_settings','','',"id","asc");
            $data['membership_arr'] = $this->General_assembly_model->GetFromGeneral_assembly_settings(2);
            $data['title'] = 'إضافة بيانات العضوية';
            $data['subview'] = 'admin/directors/general_assembly/add_membership_data';
            $this->load->view('admin_index', $data);
        }



    }



/**************************************************************************************/
        public function  add_subscription(){
       $this->load->model('general_assembly_model/general_assembly_model');
        $this->load->model('general_assembly_model/Difined_model');
         $data['records'] = $this->Difined_model->select_all('general_assembly_subscription','','','','');
          $data['members'] = $this->Difined_model->select_all('general_assembly_members','','','','');
            $data['name'] = $this->general_assembly_model->get_data();
         if($this->input->post('save')){
            $this->general_assembly_model->insert_subscription();
           redirect('General_assembly/add_subscription', 'refresh');
        }else {
            $data['subview'] = 'admin/general_assembly/add_subscription';
            $this->load->view('admin_index', $data);
        }

    }

    public function delete_member($id){
    $this->load->model("general_assembly_model/Difined_model");
    $Conditions_arr=array("id"=>$id);
    $this->Difined_model->delete("general_assembly_members",$Conditions_arr);
    redirect('General_assembly/add_member');
}
    public function delete_subscription($id){
        $this->load->model("general_assembly_model/Difined_model");
        $Conditions_arr=array("id"=>$id);
        $this->Difined_model->delete("general_assembly_subscription",$Conditions_arr);
        redirect('General_assembly/add_subscription');
    }



    public function  R_current_subscription()
    {
        $this->load->model('general_assembly_model/general_assembly_model');
        $data['name'] = $this->general_assembly_model->get_data();
        $data['records'] = $this->general_assembly_model->select_by_month();
         $data['subview'] = 'admin/general_assembly/R_current_subscription';
         $this->load->view('admin_index', $data);

    }

    public function R_previous_subscription()
    {
        $this->load->model('general_assembly_model/general_assembly_model');
        $data['name'] = $this->general_assembly_model->get_data();
        $data['records'] = $this->general_assembly_model->select_previous_months();
        $data['count'] = $this->general_assembly_model->select_all(2);
        $data['subview'] = 'admin/general_assembly/R_previous_subscription';
        $this->load->view('admin_index', $data);

    }

    }// END CLASS