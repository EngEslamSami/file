<?php

class Namazeg_gamiaa extends MY_Controller
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

        $this->load->helper(array('url', 'text', 'permission', 'form'));
        /**********************************************************/

        /*************************************************************/
        $this->load->model("familys_models/namazeg_gamiaa_models/Namazeg_gamiaa_model");
        $this->load->model('all_Finance_resource_models/all_pills/AllPills_model');
        $this->load->model("Difined_model");

    }

//--------------------------------------------------
    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }


    private function current_hjri_year()
    {
        $time = mktime(0, 0, 0, Date('m'), Date('j'), Date('Y'));
        $TDays = round($time / (60 * 60 * 24));
        $HYear = round($TDays / 354.37419);
        $Remain = $TDays - ($HYear * 354.37419);
        $HMonths = round($Remain / 29.531182);
        $HDays = $Remain - ($HMonths * 29.531182);
        $HYear = $HYear + 1389;
        $HMonths = $HMonths + 10;
        $HDays = $HDays + 23;
        if ($HDays > 29.531188 and round($HDays) != 30) {
            $HMonths = $HMonths + 1;
            $HDays = Round($HDays - 29.531182);
        } else {
            $HDays = Round($HDays);
        }
        if ($HMonths > 12) {
            $HMonths = $HMonths - 12;
            $HYear = $HYear + 1;
        }
        $NowDay = $HDays;
        $NowMonth = $HMonths;
        $NowYear = $HYear;
        $MDay_Num = date("w");
        if ($MDay_Num == "0") {
            $MDay_Name = "الأحد";
        } elseif ($MDay_Num == "1") {
            $MDay_Name = "الإثنين";
        } elseif ($MDay_Num == "2") {
            $MDay_Name = "الثلاثاء";
        } elseif ($MDay_Num == "3") {
            $MDay_Name = "الأربعاء";
        } elseif ($MDay_Num == "4") {
            $MDay_Name = "الخميس";
        } elseif ($MDay_Num == "5") {
            $MDay_Name = "الجمعة";
        } elseif ($MDay_Num == "6") {
            $MDay_Name = "السبت";
        }
        $NowDayName = $MDay_Name;
        $NowDate = $MDay_Name . "، " . $HDays . "/" . $HMonths . "/" . $HYear . " هـ";


        /*
        $NowDate; لطباعة التاريخ الهجري كامل لهذا اليوم مثلاً (الخميس 1/3/1430 هـ).

        $MDay_Name; طباعة اليوم فقط مثلاً (الخميس).

        $HDays; تاريخ اليوم (1).

        $HMonths; الشهر (3).

        $HYear; السنة الهجرية (1430).



        */
        return $HYear;


    }

//--------------------------------------------------
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
	

    public function read_file($file_name)
    {
        $this->load->helper('file');
        // $file_name=$this->uri->segment(3);
        $file_path = 'uploads/family_attached/nmazg/nmazg_letter_attaches'.$file_name;
        header('Content-Type: application/pdf');
        header('Content-Discription:inline; filename="'.$file_name.'"');
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges:bytes');
        header('Content-Length: ' . filesize($file_path));
        readfile($file_path);
    }


    private function upload_image($file_name, $folder = "images")
    {
        $config['upload_path'] = 'uploads/' . $folder;
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf';
        // $config['max_size']    = '1024*8';
        $config['max_size'] = '80000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000';

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

//-----------------------------------------------
    private function upload_file($file_name)
    {
        $config['upload_path'] = 'uploads/files';
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
        // $config['max_size']    = '1024*8';
        $config['max_size'] = '80000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000';

        $config['encrypt_name'] = true;
        $config['overwrite'] = true;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($file_name)) {
            return false;
        } else {
            $datafile = $this->upload->data();
            return $datafile['file_name'];
        }
    }


    private function upload_all_files($file_name, $folder = "images")
    {
        $config['upload_path'] = 'uploads/' . $folder;
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
        $config['max_size'] = '80000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000';
        $config['encrypt_name'] = true;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($file_name)) {
            return false;
        } else {
            $datafile = $this->upload->data();
            return $datafile['file_name'];
        }
    }

    public function read_attached_file($file_name)
    {
        $this->load->helper('file');
        $file_path = 'uploads/family_attached/' . $file_name;
        header('Content-Type: application/pdf');
        header('Content-Discription:inline; filename="' . $file_name . '"');
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges:bytes');
        header('Content-Length: ' . filesize($file_path));
        readfile($file_path);
    }

//-------------------------------------------------
    private function url()
    {
        unset($_SESSION['url']);
        $this->session->set_flashdata('url', 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
    }

//-----------------------------------------
    private function message($type, $text)
    {
        if ($type == 'success') {
            return $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <strong> تم بنجاح!</strong> ' . $text . '.
                                                </div>');
        } elseif ($type == 'wiring') {
            return $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissable">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <strong> ' . $text . ' !</strong> .
                                                </div>');
        } elseif ($type == 'error') {
            return $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <strong>' . $text . '!</strong> .
                                                </div>');
        }
    }

    //-----------------------------------------


    public function index(){     //family_controllers/namazegs_gamiaa/Namazeg_gamiaa
        $data['geha_table'] =$this->Namazeg_gamiaa_model->select_family_letter_setting();
        $data['letter_number'] =$this->Namazeg_gamiaa_model->select_last_id();
        $data['records'] =$this->Namazeg_gamiaa_model->select_all();
        $data['titles'] = $this->AllPills_model->GetFromFr_settings(8);
        $data['greetings'] = $this->AllPills_model->GetFromFr_settings(9);
        $data['letters_type_arr']=$this->Difined_model->select_all("family_nmazg_letter_setting","","","","");
        $data['title']=' خطابات الجمعيات';
        $data['subview'] = 'admin/familys_views/namazeg_gamaiaa/namazeg';
        $this->load->view('admin_index', $data);
    }

    public function insert(){
        if( $this->input->post('save') ==='save'){
            $this->Namazeg_gamiaa_model->insert();
        }elseif ($this->input->post('save') ==='save_setting'){
            $this->Namazeg_gamiaa_model->insert_setting();
        }
        $this->PrintMessage('printNamozeg',$this->input->post('letter_rkm'));
        redirect('family_controllers/namazegs_gamiaa/Namazeg_gamiaa','refresh');

    }

    public function Delete_namozeg($rkm){

        $this->Namazeg_gamiaa_model->Delete($rkm);
        redirect('family_controllers/namazegs_gamiaa/Namazeg_gamiaa','refresh');
    }


    public function getNamozegDetails(){
        $data['result'] = $this->Namazeg_gamiaa_model->getAllDetails(array('family_gamiaa_namazeg_letters.letter_rkm'=>$_POST['letter_rkm']));
        $data['details']=$this->Difined_model->getById("family_nmazg_letter_setting",$_POST['id']);
        $data['file_num_data'] = $this->Namazeg_gamiaa_model->getFileNUmData($_POST['file_num']);
        
        
           $data['afrad_num'] =   $this->Namazeg_gamiaa_model->getFamilyNum($data['file_num_data']['mother_national_num']);
           $data['mother_num'] =   $this->Namazeg_gamiaa_model->get_mother_status($data['file_num_data']['mother_national_num']);
        
        
        $data['family_members_num'] = $data['afrad_num'] +  $data['mother_num'];
          $data['family_members'] = $this->Namazeg_gamiaa_model->family_member($_POST['file_num']);
     if($_POST['id']==4)
     {
        $this->load->view('admin/familys_views/namazeg_gamaiaa/namozeg_malak_details_load_page',$data);
     }else{
        $this->load->view('admin/familys_views/namazeg_gamaiaa/namozeg_details_load_page',$data);}
    }
    public function getFamilyTable()
    {
        $customer = $this->Namazeg_gamiaa_model->select_family_table(' ');
        $arr = array();
        $arr['data'] = array();
        if (!empty($customer)) {
            $x = 0;
            foreach ($customer as $row) {
                $x++;

                if ($row['mother_name'] != '' and $row['mother_name'] != null) {

                    $mother_name = $row['mother_name'];
                } elseif ($row['mother_name'] == '') {
                    $mother_name = $row['full_name_order'];

                } else {
                    $mother_name = '<span class="label label-pill label-danger m-r-15">إستكمل البيانات</span>';
                }


                if ($row['mother_new_card'] != '' and $row['mother_new_card'] != null) {
                    $mother_new_card = $row['mother_new_card'];
                } elseif ($row['mother_new_card'] == '' and $row['id'] >= 852) {
                    $mother_new_card = $row['mother_national_num'];

                } else {
                    $mother_new_card = '<span class="label label-pill label-danger m-r-15">إستكمل البيانات</span>';
                }


                $button = '<input type="radio" name="radio" data-father="' . $row['father_full_name'] . '"
                    data-father-card="' . $row['father_national_num'] . '"  data-mother="' . $row['mother_national_num'] . '" id="radio' . $row['file_num'] . '"
                      ondblclick="getFile_num(' . $row['file_num'] . ')">';

                if ($row['father_full_name'] != '' and $row['father_full_name'] != null) {
                    $father_full_name = $row['father_full_name'];
                } else {
                    $father_full_name = '<span class="label label-pill label-danger m-r-15">إستكمل البيانات</span>';
                }

                if ($row['father_national_num'] != '' and $row['father_national_num'] != null) {
                    $father_national_num = $row['father_national_num'];
                } else {
                    $father_national_num = '<span class="label label-pill label-danger m-r-15">إستكمل البيانات</span>';
                }


                $on_click_data = array('father' => $row['father_full_name'],
                    'father_card' => $row['father_national_num'],
                    'mother' => $row['mother_national_num'], 'file_num' => $row['file_num']);

                $arr['data'][] = array(
                    $this->add_link($x, $on_click_data),
                    $this->add_link($row['file_num'], $on_click_data),
                    $this->add_link($father_full_name, $on_click_data),
                    $this->add_link($father_national_num, $on_click_data),
                    $this->add_link($mother_name, $on_click_data),
                    $this->add_link($mother_new_card, $on_click_data),

                );
            }
        }
        $json = json_encode($arr);
        echo $json;

    }
    public function family_member()
    {
        $file_num = $this->input->post('file_num');
        $family_mumber_data = $this->Namazeg_gamiaa_model->family_member($file_num);
        echo json_encode($family_mumber_data);


    }
/*
    public function getFamilyTable(){
        $customer = $this->Namazeg_gamiaa_model->select_family_table(' ');
        $arr = array();
        $arr['data'] = array();
        if(!empty($customer)){
            $x = 0;
            foreach($customer as $row){
                $x++;

                if($row['mother_name'] != '' and $row['mother_name'] != null){

                    $mother_name = $row['mother_name'];
                }elseif($row['mother_name'] == ''){
                    $mother_name = $row['full_name_order'];

                }else{
                    $mother_name= '<span class="label label-pill label-danger m-r-15">إستكمل البيانات</span>';
                }



                if($row['mother_new_card'] != '' and $row['mother_new_card'] != null){
                    $mother_new_card = $row['mother_new_card'];
                }elseif($row['mother_new_card'] == '' and $row['id'] >= 852 ){
                    $mother_new_card = $row['mother_national_num'];

                }else{
                    $mother_new_card= '<span class="label label-pill label-danger m-r-15">إستكمل البيانات</span>';
                }


 $button ='<input type="radio" name="radio" data-father="'.$row['father_full_name'].'"
                    data-father-card="'.$row['father_national_num'].'"  data-mother="'.$row['mother_national_num'].'" id="radio'.$row['file_num'].'"
                      ondblclick="getFile_num('.$row['file_num'].')">';

                if($row['father_full_name'] != '' and $row['father_full_name'] != null){
                    $father_full_name = $row['father_full_name'];
                }else{
                    $father_full_name= '<span class="label label-pill label-danger m-r-15">إستكمل البيانات</span>';
                }

                if($row['father_national_num'] != '' and $row['father_national_num'] != null){
                    $father_national_num = $row['father_national_num'];
                }else{
                    $father_national_num = '<span class="label label-pill label-danger m-r-15">إستكمل البيانات</span>';
                }




                $arr['data'][] = array(
                    $x,
                    $row['file_num'],
                    $father_full_name,
                    $father_national_num,
                    $mother_name,
                    $mother_new_card,

                );
            }
        }
        $json = json_encode($arr);
        echo $json;

    }

*/


    public function getFamilyNum(){

       $data = $this->Namazeg_gamiaa_model->getFileNUmData($_POST['file_num']);

        echo json_encode($data);

    }



    public function insert_geha_ajax(){
        $this->Namazeg_gamiaa_model->insert_geha();
        $data['table'] =$this->Namazeg_gamiaa_model->select_family_letter_setting();
        $this->load->view('admin/familys_views/namazeg_gamaiaa/geha_load_page',$data);
    }


    function PrintMessage($type ,$valu)
    {
        $CI =& get_instance();
        $CI->load->library("session");
        if ($type=='printNamozeg') {
            return $CI->session->set_flashdata('message',
                '
<script src="https://cdn.jsdelivr.net/npm/sweetalert2"></script>
<script>
		   Swal.fire({
            title: " هل تريد طباعة النموذج ؟",
            text: "",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            cancelButtonText: "لا, إلغاء الأمر!",
            confirmButtonText: "نعم, قم بالطباعة!"
        }).then((result) => {
            if (result.value) {
           
                window.location.href = "'.base_url().'family_controllers/namazegs_gamiaa/Namazeg_gamiaa/printNamazeg/'.$valu.'"   ;
            }
        })

            </script>');
        }
    }


    public  function  printNamazeg($rkm){

         $data['result'] = $this->Namazeg_gamiaa_model->getAllDetails(array('family_gamiaa_namazeg_letters.letter_rkm'=>$rkm));
        $data['titles'] = $this->Namazeg_gamiaa_model->GetFromFr_settings(8);
        $data['greetings'] = $this->Namazeg_gamiaa_model->GetFromFr_settings(9);
         $data['family_members_num'] =$this->Namazeg_gamiaa_model->getFamilyNum($data['result']['mother_national_num']);

        //$this->test($data['titles'][$data['result']['start_laqb']]);
          // $data['qued_data'] = $this->Quods_model->data_qued($id);
          //$this->test($data['result']['namozeg_type_fk']);
          if($data['result']['namozeg_type_fk']==4)
          {
            $data['title'] = 'طباعة نموذج خطاب';
            $this->load->view('admin/familys_views/namazeg_gamaiaa/printNamazeg_malk', $data);
          }
          else
          {
            $data['title'] = 'طباعة نموذج خطاب';
            $this->load->view('admin/familys_views/namazeg_gamaiaa/printNamazeg', $data);
          }
        //  $data['title'] = 'طباعة نموذج خطاب';
        //  $this->load->view('admin/familys_views/namazeg_gamaiaa/printNamazeg', $data);

         }



         public function edit($rkm){
             $data['geha_table'] =$this->Namazeg_gamiaa_model->select_family_letter_setting();
             $data['result'] = $this->Namazeg_gamiaa_model->getAllDetails(array('family_gamiaa_namazeg_letters.letter_rkm'=>$rkm));
             $data['titles'] = $this->AllPills_model->GetFromFr_settings(8);
             $data['greetings'] = $this->AllPills_model->GetFromFr_settings(9);
             $data['family_members_num'] =$this->Namazeg_gamiaa_model->getFamilyNum($data['result']['mother_national_num']);
             $data['letters_type_arr']=$this->Difined_model->select_all("family_nmazg_letter_setting","","","","");
             $data['titles_edit'] = $this->Namazeg_gamiaa_model->GetFromFr_settings(8);
             $data['greetings_edit'] = $this->Namazeg_gamiaa_model->GetFromFr_settings(9);
             $data['family_members'] = $this->Namazeg_gamiaa_model->family_member($data['result']['file_num']);
             $data['title']='النماذج';
             $data['subview'] = 'admin/familys_views/namazeg_gamaiaa/namazeg';
             $this->load->view('admin_index', $data);
         }



    public function update(){


        if( $this->input->post('save') ==='save'){
            $this->Namazeg_gamiaa_model->update();
        redirect('family_controllers/namazegs_gamiaa/Namazeg_gamiaa','refresh');
        }
    }


    public function getDetailsDiv(){


        $data['result'] = $this->Namazeg_gamiaa_model->getAllDetails(array('family_gamiaa_namazeg_letters.letter_rkm'=>$_POST['rkm']));
        $data['titles'] = $this->Namazeg_gamiaa_model->GetFromFr_settings(8);
        $data['greetings'] = $this->Namazeg_gamiaa_model->GetFromFr_settings(9);
        $data['family_members_num'] =$this->Namazeg_gamiaa_model->getFamilyNum($data['result']['mother_national_num']);
 //$this->test($data['result']);
        $this->load->view('admin/familys_views/namazeg_gamaiaa/getDetailsDiv',$data);

    }
    
    
    
    
    /*
       public function update_geha(){
        $id= $this->input->post('id');
          $this->Namazeg_gamiaa_model->update_geah($id);
          $data['table'] =$this->Namazeg_gamiaa_model->select_family_letter_setting();
          $this->message('success','تم تعديل الجهة بنجاح ');
          $this->load->view('admin/familys_views/namazeg/geha_load_page',$data);

    }*/
    
      public function update_geha(){
        $id= $this->input->post('id');
          $this->Namazeg_gamiaa_model->update_geah($id);
          $data['table'] =$this->Namazeg_gamiaa_model->select_family_letter_setting();

          $this->load->view('admin/familys_views/namazeg_gamaiaa/geha_load_page',$data);

    }
    
    
    public function getById(){
        $id= $this->input->post('id');
        $geha =$this->Namazeg_gamiaa_model->get_geha_by_id($id);
        echo json_encode($geha);
    }
  /*  public function delete_geha($id){
        $this->Namazeg_gamiaa_model->delete_geha($id);
          $this->message('success','تم حذف الجهة بنجاح ');
        redirect('family_controllers/namazegs_gamiaa/Namazeg_gamiaa','refresh');
    }*/
       public function delete_geha(){
         $id = $this->input->post('id');
          $this->Namazeg_gamiaa_model->delete_geha($id);
          $data['table'] =$this->Namazeg_gamiaa_model->select_family_letter_setting();
          $this->load->view('admin/familys_views/namazeg_gamaiaa/geha_load_page',$data);
       
    }
    
    
    
    
    
    	    public function add_morfaq()
    {
        $id=$this->input->post('hidden_id');
        $rkm=$this->input->post('hidden_rkm');
        $images=$this->upload_muli_file("file");

       $this->Namazeg_gamiaa_model->insert_attach($id,$rkm,$images);
         // $this->messages('success','تمت إضافة المرفقات');
      // messages('success', 'تم اضافة المرفقات ');
        redirect('family_controllers/namazegs_gamiaa/Namazeg_gamiaa', 'refresh');
    }

    public function get_attaches()
    {
        $rkm=$this->input->post('rkm');
      $data['one_data'] = $this->Namazeg_gamiaa_model->get_attach($rkm);

        $this->load->view('admin/familys_views/namazeg_gamaiaa/get_table_attaches',$data);
    }
    public function Delete_attach($id)
    {
        $this->Namazeg_gamiaa_model->delete_attach($id);

        redirect('family_controllers/namazegs_gamiaa/Namazeg_gamiaa', 'refresh');
    }
    
    
    
    
       public function add_link($title, $arr)
    {
        return '<a  id="radio' . $arr['file_num'] . '" data-father="' . $arr['father'] . '"  
            data-father-card="' . $arr['father_card'] . '"
             data-mother="' . $arr['mother'] . '"  
             ondblclick="getFile_num(' . $arr['file_num'] . ')">' . $title . '</a>';
    }
    
    
    
    
        public function getNamazegTable()
    {
        $records = $this->Namazeg_gamiaa_model->select_all();
        $arr = array();
        $arr['data'] = array();
        if (!empty($records)) {
            $x = 0;
            foreach ($records as $row) {
                $x++;

                if (isset($row['mawdo3']) and $row['mawdo3'] != null) {
                    $mawdo3 = $row['mawdo3'];
                } else {
                    $mawdo3 = 'غير محدد';
                }
                $edit_link = '' . base_url() . 'family_controllers/namazegs_gamiaa/Namazeg_gamiaa/edit/' . $row['letter_rkm'] . '';
                $print_link = '' . base_url() . 'family_controllers/namazegs_gamiaa/Namazeg_gamiaa/printNamazeg/' . $row['letter_rkm'] . '';


                $arr['data'][] = array(
                    $x,
                    $row['letter_rkm_full'],
                    $row['letter_date_ar'],
                    $row['geha_name'],
                    $row['file_num'],
                    $row['father_name'],
                    $mawdo3,
                    '<span style="font-size: 12px; color: white !important; font-weight: normal;"
                   class="badge badge-add">' . $row['publisher_name'] . '</span>',
                    '
                             <a type="button"
                                   class="btn btn-sm btn-info" data-toggle="modal"
                                   data-target="#detailsModal" onclick="details(' . $row['letter_rkm'] . ')"
                                   style="padding: 3px 5px;line-height: 1;">
                                    <i class="glyphicon glyphicon-list"></i> التفاصيل
                                </a>
                     
                          <a href="' . $edit_link . '"
                                   title="تعديل"><i class="fa fa-pencil"></i></a>
                                    <a onclick="Delete_namozeg(' . $row['letter_rkm'] . ')" title="حذف"><i
                                            class="fa fa-trash"></i></a>
                              <a href="' . $print_link . '"
                                   title="طباعه"><i class="fa fa-print"></i></a> 
                                   <button type="button" class="btn btm-sm btn-labeled btn-inverse " id="attach_button" onclick="put_value(' . $row['id'] . ',' . $row['letter_rkm'] . ')" data-toggle="modal" data-target="#myModal_attach">
                                    <span class="btn-label"><i class="glyphicon glyphicon-cloud-upload"></i></span>
                                    اضافة مرفق
                                </button>',


                );
            }
        }
        $json = json_encode($arr);
        echo $json;

    }
    
    
    
    
      public function add_mosa3da()
    {  
    
    
         $data['geha_table'] =$this->Namazeg_gamiaa_model->select_family_letter_setting();
        $data['letter_number'] =$this->Namazeg_gamiaa_model->select_last_id();
        $data['records'] =$this->Namazeg_gamiaa_model->select_all();
        $data['titles'] = $this->AllPills_model->GetFromFr_settings(8);
        $data['greetings'] = $this->AllPills_model->GetFromFr_settings(9);
        $data['letters_type_arr']=$this->Difined_model->select_all("family_nmazg_letter_setting","","","","");
        $data['title']='النماذج';
        $data['subview'] = 'admin/familys_views/namazeg_gamaiaa/mos3dat/mosa3da';
        $this->load->view('admin_index', $data);
        
        }
    
} // END CLASS