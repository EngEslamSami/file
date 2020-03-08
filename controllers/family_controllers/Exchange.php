<?php
class Exchange extends MY_Controller
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
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in = $this->Counting->get_basic_in_num();
        $this->files_basic_in = $this->Counting->get_files_basic_in();
        /*************************************************************/
        $this->load->model('system_management/Groups');
        $this->main_groups = $this->Groups->main_fetch_group();
        $this->groups = $this->Groups->get_group($_SESSION["group_number"]);
        $this->groups_title = $this->Groups->get_group_title($_SESSION["group_number"]);

      //  $this->load->library('google_maps');


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
    private function upload_image($file_name)
    {
        $config['upload_path'] = 'uploads/images';
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf';
       // $config['max_size'] = '1024*8';
        $config['max_size']    = '80000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000';
    
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

//-----------------------------------------------
    private function upload_file($file_name)
    {
        $config['upload_path'] = 'uploads/files';
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
        $config['max_size']    = '80000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000';
    
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
                                                <strong> تحذير  !</strong> ' . $text . '.
                                                </div>');
        } elseif ($type == 'error') {
            return $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <strong>خطأ!</strong> ' . $text . '.
                                                </div>');
        }
    }

    //-----------------------------------------
   /* public function Exchange()  //  family_controllers/Exchange/Exchange
    {
        $this->load->model('familys_models/exchange_models/Exchange_model');
        $this->load->model('Difined_model');

        if ($this->input->post('register')) {

            $this->Exchange_model->insertExchange();
            messages('success', 'إضافة تبادل ');
            redirect('family_controllers/Exchange/Exchange');

        }
        $data['banks'] = $this->Difined_model->select_all('banks_settings','','',"id","asc");
        $data['exchanges'] = $this->Difined_model->select_all('family_data','','',"file_num","desc");
        $data['family_categorys'] = $this->Exchange_model->select_all_family_category();
       // $this->test($data['exchanges']);
        $data['file_num'] = ($data['exchanges'][0])? $data['exchanges'][0]->file_num : '';

        $data['title'] = 'تبادل';
        $data['metakeyword'] = 'إعدادات البيانات للاسرة';
        $data['metadiscription'] = '';
        $data['subview'] = 'admin/familys_views/exchange_views/add_exchange';
        $this->load->view('admin_index', $data);


    }*/
    
    public function Exchange()  //  family_controllers/Exchange/Exchange
{
    $this->load->model('familys_models/exchange_models/Exchange_model');
    $this->load->model('Difined_model');
    if ($this->input->post('register')) {
        $this->Exchange_model->insertExchange();
        messages('success', 'إضافة تبادل ');
        redirect('family_controllers/Exchange/Exchange');

    }elseif($this->input->post('Num')){
     $check_num = $this->Exchange_model->CheckFile($this->input->post('Num'));
        echo json_encode($check_num);
    }else{
    $data['banks'] = $this->Difined_model->select_all('banks_settings','','',"id","asc");
    $data['exchanges'] = $this->Exchange_model->select_all_data();
    $data['family_categorys'] = $this->Exchange_model->select_all_family_category();
   // $this->test($data['exchanges']);
    $data['file_num'] = ($data['exchanges'][0])? $data['exchanges'][0]->file_num : '';




    $data['bank_details'] = $this->Exchange_model->get_Bank_details();
    $data['exchanges_pop'] = $this->Exchange_model->select_all_family_data();



    $data['title'] = 'إضافة مستفيد ';
    $data['metakeyword'] = 'إضافة مستفيد ';
    $data['metadiscription'] = '';
    $data['subview'] = 'admin/familys_views/exchange_views/add_exchange';
    $this->load->view('admin_index', $data);
    }

}
    //===============================================
    public function ApprovedExchange($id,$value){
          $this->load->model('familys_models/exchange_models/Exchange_model');
           $this->Exchange_model->approved_person($id,$value);
           if($value == 1){
             messages('success', 'التنشيط');
           }elseif($value == 2){
             messages('success', 'الغاء التنشيط ');
           }
            redirect('family_controllers/Exchange/Exchange');
    }
    
    //===============================================
    public function updateExchange($id)  //  family_controllers/Exchange/updateExchange
    {
        $this->load->model('familys_models/exchange_models/Exchange_model');
        $this->load->model('Difined_model');

        if ($this->input->post('register')) {

            $this->Exchange_model->updateExchange($id);
            messages('success', 'تعديل تبادل ');
            redirect('family_controllers/Exchange/Exchange');

        }
        $data['banks'] = $this->Difined_model->select_all('banks_settings','','',"id","asc");
        $data['result'] = $this->Exchange_model->select_exchangeById($id);
        $data['family_categorys'] = $this->Exchange_model->select_all_family_category();
        // $this->test($data['exchanges']);

        $data['title'] = 'تعديل  مستفيد ';
        $data['metakeyword'] = 'تعديل مستفيد ';
        $data['metadiscription'] = '';
        $data['subview'] = 'admin/familys_views/exchange_views/add_exchange';
        $this->load->view('admin_index', $data);


    }

    public function deleteExchange($id){
        $this->load->model("Difined_model");
        $Conditions_arr=array("id"=>$id);
        $this->Difined_model->delete("family_data",$Conditions_arr);
        redirect('family_controllers/Exchange/Exchange');
    }
    /**************************************************************/
    
        public function add_sarf(){//family_controllers/Exchange/add_sarf

      $this->load->model('familys_models/exchange_models/Sarf_model');
            $this->load->model('Difined_model');
      if($this->input->post('add')){
          $id =  $this->Sarf_model->insert();
          $this->message('success','تم إضافة البيانات بنجاح');
            redirect('family_controllers/Exchange/add_sarf');
        }else {
            $data['sarf'] = $this->Difined_model->select_search_key("family_data", "approved", 1);
            $data['table'] = $this->Sarf_model->select_all();
            $data['inserted'] = $this->Sarf_model->select_inserted();
            $data['last_id'] = $this->Sarf_model->select_last_id();
            $data['current_year'] = $this->current_hjri_year();

            $data['title'] = 'إضافة صرف ';
            $data['subview'] = 'admin/familys_views/exchange_views/add_sarf';
            $this->load->view('admin_index', $data);
        }
    }

  /******************************* إدارة الصرف*******************************/
  public function delete_sarf($num){
      $this->load->model("Difined_model");
      $this->Difined_model->delete("sarf_orders",array("sarf_num"=>$num));
      $this->Difined_model->delete("sarf_order_details",array("sarf_num_fk"=>$num));
      redirect('family_controllers/Exchange/add_sarf');
  }

    /******************************* إدارة الصرف*******************************/
    public function update_sarf($num){
        $this->load->model('familys_models/exchange_models/Sarf_model');
        $this->load->model('Difined_model');
        if($this->input->post('add')){
            $this->Sarf_model->update($num);
            $this->message('success','تم تعديل البيانات بنجاح');
            redirect('family_controllers/Exchange/add_sarf');
        }else{
        $data['sarf'] = $this->Difined_model->select_all("family_data", "", "", "", "");
        $data['result'] = $this->Sarf_model->getById($num);
        $data['details'] = $this->Sarf_model->getDetails2($num);
        $data['title'] = 'تعديل صرف ';
        $data['subview'] = 'admin/familys_views/exchange_views/add_sarf';
        $this->load->view('admin_index', $data);
        }
    }
    /******************************* إدارة الصرف*******************************/
   /* function exportBankCheat($id){
        $this->load->helper('download');

        $this->load->model('familys_models/exchange_models/Sarf_model');
        $file =BASEPATH."/../"."asisst/exports/".time().".txt";
        $bankid = $this->db->select("mainBank")->from("main_data")->get()->row();
        $staff = $this->Sarf_model->cheetDetailes($id);
        $sarf = $this->Sarf_model->getById($id);
      //  $this->test($staff);
        $dueDate = date("Ymd",$sarf["due_date"]);
        $cashdate = date("Ymd",$sarf["cashing_date"]);
        $total=str_pad(number_format((float)$sarf["total"], 2, '', ''), 15, '0',  STR_PAD_LEFT) ;
        $countofstaff = str_pad(sizeof($staff), 8, '0',  STR_PAD_LEFT) ;
        //$this->test($countofstaff);
        $bank = str_pad($bankid->mainBank, 15, '0',  STR_PAD_LEFT) ;
        $head = $dueDate.$cashdate.$total.$countofstaff.$bank;
      //  file_put_contents($file, "000000000000"."G".$head."                                                                   I"."\r\n", FILE_APPEND);
       $str="000000000000"."G".$head."                                                                   I"."\r\n";


// Change the encoding of the file using iconv
        $string_encoded = iconv( mb_detect_encoding( $str ), "WINDOWS-1252", $str );

// Write File
        $filedata = fopen($file, "w+");
        fwrite($filedata, $string_encoded);
        fclose($filedata);






        foreach ($staff as $st){
            $id = str_pad($st->file_num, 12, '0',  STR_PAD_LEFT) ;
            $bankcode = $st->bank_code;
            $bankaccount = str_pad($st->bank_account_num, 24, ' ',  STR_PAD_LEFT) ;

            // $nameLenth = mb_strlen($st->bank_account_name, "UTF-8");
           // $lenth= 50-$nameLenth;
          //echo $lenth;
            ////die;
            //$name=str_pad($st->bank_account_name, 50+$nameLenth, ' ',  STR_PAD_RIGHT) ;
            $name=mb_str_pad($st->bank_responsible_name, 50, " ");
            $salary=str_pad(number_format((float)$st->value, 2, '', ''), 15, '0',  STR_PAD_LEFT) ;
            $nationalid=str_pad($st->bank_responsible_national_num, 15, '0',  STR_PAD_LEFT) ;
            $body = $id.$bankcode.$bankaccount.$name.$salary.$nationalid."0000";
           // file_put_contents($file, $body."           ".PHP_EOL,  FILE_APPEND);
            $myfile = fopen($file, "a") or die("Unable to open file!");
            $txt = $body."           ";
            fwrite($myfile, $txt."\r\n");
            fclose($myfile);

        }
        $data = file_get_contents($file); // Read the file's contents

        $name =time().".txt";

        force_download($name,$data);
        unlink($file);
    }*/
      function exportBankCheat($id){
        $this->load->helper('download');
        $this->load->model('familys_models/exchange_models/Sarf_model');
        //$file =BASEPATH."/../"."asisst/exports/".time().".txt";
        $file =BASEPATH."/../"."asisst/exports/template.txt";
        $fileencoded =iconv("UTF-8", "cp1256//TRANSLIT", $file);
        $bankid = $this->db->select("mainBank")->from("main_data")->get()->row();
        $staff = $this->Sarf_model->cheetDetailes($id);
        $sarf = $this->Sarf_model->getById($id);
        $bnod_help = $this->Sarf_model->getBand_help_name($sarf['bnod_help_fk']);
       // echo $bnod_help['bnod_help_fk'];
      //  echo $bnod_help;
        
        
      // $this->test($sarf);
        $dueDate = date("Ymd",$sarf["due_date"]);
        $cashdate = date("Ymd",$sarf["cashing_date"]);
        $total=str_pad(number_format((float)$sarf["total_value"], 2, '', ''), 15, '0',  STR_PAD_LEFT) ;
        $countofstaff = str_pad(sizeof($staff), 8, '0',  STR_PAD_LEFT) ;
        //$this->test($countofstaff);
        $bank = str_pad($bankid->mainBank, 15, '0',  STR_PAD_LEFT) ;
        $head = $dueDate.$cashdate.$total.$countofstaff.$bank;
        //  file_put_contents($file, "000000000000"."G".$head."                                                                   I"."\r\n", FILE_APPEND);
       $str="000000000000"."G".$head."                                                                   I"."\r\n";
        $filedata = fopen($fileencoded, 'w+');
        fwrite($filedata, $str);
        fclose($filedata);
        foreach ($staff as $st){
  
            $id = str_pad($st->file_num, 12, '0',  STR_PAD_LEFT) ;
            $bankcode = $st->bank_code;
            $bankaccount = str_pad($st->bank_account_num, 24, ' ',  STR_PAD_LEFT) ;
            $name=mb_str_pad($st->bank_responsible_name, 50, " ");
            $nameencoded = iconv('UTF-8', 'WINDOWS-1256', $name);
            $salary=str_pad(number_format((float)$st->value, 2, '', ''), 15, '0',  STR_PAD_LEFT) ;
            $nationalid=str_pad($st->bank_responsible_national_num, 15, '0',  STR_PAD_LEFT) ;
            $body = $id.$bankcode.$bankaccount.$nameencoded.$salary.$nationalid."0000";
            $myfile = fopen($fileencoded, "a") or die("Unable to open file!");
            $txt = $body."           ";
            fwrite($myfile,$txt."\r\n" );
            fclose($myfile);
        }
        $data = file_get_contents($fileencoded); // Read the file's contents

       $type = 0;
       if ($sarf["bnod_help_fk"]>=1){
           $type = "Family";
       }else{
           $type = "Employee";

       }
       
      $sarf_num = $sarf["sarf_num"]; 
       

       // $name = $bnod_help.date("MY").$type.$sarf_num.".txt";
       //$name = $bnod_help.$type.date("MY").$sarf_num.".txt";
       $name = $bnod_help.$sarf_num.date("MY").".txt";
        force_download($name,$data);

      unlink($file);
    }
    
    
    
    
    //==========================================================================================
    public function DoCashingFamily(){   ///  family_controllers/Exchange/DoCashingFamily
         $this->load->model('familys_models/exchange_models/Model_family_cashing');
        if($this->input->post('ADD') == "ADD"){
            $this->test($_POST);
           
            $this->Model_family_cashing->insert();
            $this->Model_family_cashing->insert_detals( $this->input->post('sarf_num'));
            $this->message('success','تمت إضافة صرف المساعدات');
            redirect('family_controllers/Exchange/DoCashingFamily', 'refresh');
          }
            $data['last_id'] = $this->Model_family_cashing->select_last_id();
            $data['bnod_help'] = $this->Model_family_cashing->select_all_bnod();
            $data['title'] = 'صرف المساعدات   ';
            $data['metakeyword'] = 'صرف المساعدات   ';
            $data['metadiscription'] = 'صرف المساعدات   ';
            $data['subview'] = 'admin/familys_views/exchange_views/family_cash/add_family_cashing';
            $this->load->view('admin_index', $data);
           
    }  
    //-----------------------------
     public function LoadPage(){  ///  family_controllers/Exchange/LoadPage
        $this->load->model('familys_models/exchange_models/Model_family_cashing');   // 
        $condition_year= $this->current_hjri_year() - 18 ;
        
        if( $this->input->post('member_type') ){  //  1
            //-------------------------------------
            $member_type=$this->input->post('member_type');
            $data_load=$_POST;
            if($member_type == 1){
                $Conditions_arr=array("approved"=>1);
                $data_load['data_table']=$this->Model_family_cashing->select_family_where($Conditions_arr);
                $this->load->view('admin/familys_views/exchange_views/family_cash/load_data_table', $data_load);
            }elseif($member_type == 2){
                $this->load->view('admin/familys_views/exchange_views/family_cash/load_option', $data_load);
            }elseif ($member_type == 3){
                $this->load->view('admin/familys_views/exchange_views/family_cash/load_option', $data_load);
            }elseif ($member_type == 4){
                $this->load->view('admin/familys_views/exchange_views/family_cash/load_option', $data_load);
            }
        } elseif( $this->input->post('opriun_id') ){  
             //-------------------------------------
            $opriun_id=$this->input->post('opriun_id');
            $data_load=$_POST;
             if($opriun_id == 3){
               $Conditions_arr=array("approved"=>1);
                $data_load['data_table']=$this->Model_family_cashing->select_family_where($Conditions_arr);
                $this->load->view('admin/familys_views/exchange_views/family_cash/load_data_table', $data_load);
             }elseif($opriun_id == 4){ 
                $Conditions_arr=array("approved"=>1);
                $data_load['data_table']=$this->Model_family_cashing->select_family_where($Conditions_arr);
                $this->load->view('admin/familys_views/exchange_views/family_cash/load_data_table', $data_load);
             }elseif($opriun_id == 2){ 
                $Conditions_arr=array("approved"=>1,"file_num"=>$this->input->post('file_num'));
                $data_load['data_table']=$this->Model_family_cashing->select_family_where($Conditions_arr);
            // $this->test($data_load);
                $this->load->view('admin/familys_views/exchange_views/family_cash/load_some_family', $data_load);
             }
             
        }elseif( $this->input->post('file_num_check') ){
            $family_data = $this->input->post('file_num_check');
           echo $this->Model_family_cashing->check_family($family_data);
        }


    }
    //=====================================================================================
    
    /**
     *     =========================================================================================
     * 
     * 
     * 
     *   */
     //__________________osama ________________
    public function allSarf(){                                                                                                     //  family_controllers/Exchange/allSarf
        $this->load->model('familys_models/exchange_models/Allsarf_model');
        $this->load->model('Difined_model');
        $this->load->model('Model_family_cashing');
        
       // echo strtotime(date("Y-m-d"));
     //   $data['sarfs'] = $this->Allsarf_model->select_all_sarf_orders();
        $data['all_data']=$this->Model_family_cashing->select_all();
         $data['alert'] = $this->Model_family_cashing->getLastRecord();
         
       /*  if(!empty($data['alert'])){
         //  $this->PrintMessage('tranferQuod','');
         }*/
         
          if(!empty( $data['alert'])){
            $this->PrintMessage("tranferQuod",$data['alert']['band_name']."-".$data['alert']['total_value']);
        }


 $data['raes_magls_edara'] = $this->Model_family_cashing->get_magls_edara_assigns(1);
 $data['naeb_raes_magls_edara'] = $this->Model_family_cashing->get_magls_edara_assigns(2);
 $data['amin_sandok'] = $this->Model_family_cashing->get_magls_edara_assigns(3);

   $data['manager_name'] = $this->Model_family_cashing->get_magles_edara(1);
   $data['naeb_name'] = $this->Model_family_cashing->get_magles_edara(2);
   $data['amin_name'] = $this->Model_family_cashing->get_magles_edara(3);





        $data['title'] = 'أذونات صرف المساعدات';
        $data['metakeyword'] = 'أذونات صرف المساعدات';
        $data['metadiscription'] = '';
        $data['subview'] = 'admin/familys_views/exchange_views/all_sarf';
        $this->load->view('admin_index', $data);
    }
    public function updateSarfToAproved($id){
        $this->load->model('familys_models/exchange_models/Allsarf_model');
        if($_POST['make_approve']){
            
        //    $this->test($_POST);
           $this->Allsarf_model->make_approve($id);
           redirect('family_controllers/Exchange/allSarf');
        }
    }
    public function updateSarfToNunAproved($id){
        $this->load->model('familys_models/exchange_models/Allsarf_model');
            $this->Allsarf_model->make_nunApprove($id);
            redirect('family_controllers/Exchange/allSarf');
    }
    public function deleteFilsSarf($sarf_num){
        $this->load->model('Difined_model');
        $this->Difined_model->delete("sarf_orders",array("sarf_num"=>$sarf_num));
        $this->Difined_model->delete("sarf_order_details",array("sarf_num_fk"=>$sarf_num));
        redirect('family_controllers/Exchange/allSarf');
    }
        function PrintMessage($type ,$valu)
    {
        $CI =& get_instance();
        $CI->load->library("session");
        if ($type=='tranferQuod') {
            $data =explode('-',$valu);
            return $CI->session->set_flashdata('message',
                '
<script src="https://cdn.jsdelivr.net/npm/sweetalert2"></script>
<script>
		   Swal.fire({
		   title: "يوجد إذن صرف بإسم '.$data[0].'  , بمبلغ'.$data[1].'  ريال سعودي",
            text: "هل تريد الصرف",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            cancelButtonText: "لا, إلغاء الأمر!",
            confirmButtonText: "نعم, قم بالصرف!"
        }).then((result) => {
            if (result.value) {
           
               window.location.href = "'.base_url().'finance_accounting/box/vouch_sarf/Vouch_sarf/sarf_family"   ;
                         

            }
        })

            </script>');
        }
    }

    /*function PrintMessage($type ,$valu)
    {
        $CI =& get_instance();
        $CI->load->library("session");
        if ($type=='tranferQuod') {
            $data =explode('-',$valu);
            return $CI->session->set_flashdata('message',
                '
<script src="https://cdn.jsdelivr.net/npm/sweetalert2"></script>
<script>
		   Swal.fire({
		   title: "يوجد إذن صرف بإسم '.$data[0].'  , بمبلغ'.$data[1].'  ريال سعودي",
            text: "هل تريد الصرف؟",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            cancelButtonText: "لا, إلغاء الأمر!",
            confirmButtonText: "نعم, قم بالصرف!"
        }).then((result) => {
            if (result.value) {
           
                window.location.href = "'.base_url().'finance_accounting/box/quods/Quods/tarhel_bnod"   ;
            }
        })

            </script>');
        }
    } 
    */   
/*        function PrintMessage($type ,$valu)
    {
        $CI =& get_instance();
        $CI->load->library("session");
        if ($type=='tranferQuod') {
            return $CI->session->set_flashdata('message',
                '
<script src="https://cdn.jsdelivr.net/npm/sweetalert2"></script>
<script>
		   Swal.fire({
            title: " هل تريد  التحويل الى قيد ؟",
            text: "",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            cancelButtonText: "لا, إلغاء الأمر!",
            confirmButtonText: "نعم, قم بالتحويل!"
        }).then((result) => {
            if (result.value) {
           
                window.location.href = "'.base_url().'finance_accounting/box/quods/Quods/tarhel_bnod"   ;
            }
        })

            </script>');
        }
    }
*/
    
    
        public function add_bnod_help() // family_controllers/Exchange/add_bnod_help
    {
        $this->load->model('familys_models/exchange_models/Bnod_help_settings');
        $this->load->model('finance_accounting_model/dalel/Dalel_model');
        if($this->input->post('add')){
            $this->Bnod_help_settings->add_data('socity_branch');
            $this->message('success',"تمت الاضافه بنجاح");
            redirect('family_controllers/Exchange/add_bnod_help','refresh');
        }
        $data['records']=$this->Bnod_help_settings->get_data_branch('bnod_help');
        
        
        $records = $this->Dalel_model->buildTree(array('id!='=>0));
        $data['tree'] = $this->buildTree($records);
        
        
        $data['titles']="اضافه  بنود المساعدة";
        $data['subview'] = 'admin/familys_views/exchange_views/bnod_help/add_bnod';
        $this->load->view('admin_index', $data);
    }
    public function delete_from_table($id)
    {
       
        $this->load->model('familys_models/exchange_models/Bnod_help_settings');
        $this->Bnod_help_settings->delete_where_id($id);
        redirect('family_controllers/Exchange/add_bnod_help','refresh');
    }
    public function update_bnod_help($id)
    {
        $this->load->model('familys_models/exchange_models/Bnod_help_settings');

        $data['row']= $this->Bnod_help_settings->get_where_id($id);
        if($this->input->post('add')){
            $this->Bnod_help_settings->update_by_id($id);
            redirect('family_controllers/Exchange/add_bnod_help','refresh');
        }
        $data['titles']="تعديل  بنود المساعدة";
        $data['subview'] = 'admin/familys_views/exchange_views/bnod_help/add_bnod';
        $this->load->view('admin_index', $data);
    }
    
    
    
    public function Exchange_report(){ //family_controllers/Exchange/Exchange_report
    $this->load->model('familys_models/exchange_models/Exchange_model');
    $data['records'] =$this->Exchange_model->select_all();
    // $this->test($data['records']);
    $data['title']="تقريرالمستفيدين";
    $data['subview'] = 'admin/familys_views/exchange_views/Exchange_report';
    $this->load->view('admin_index', $data);

}

public function Exchange_report_print(){
    $this->load->model('familys_models/exchange_models/Exchange_model');
    $data['records'] =$this->Exchange_model->select_all();
    $data['title'] = 'تقرير المستفيدين';
    $data['subview'] = 'admin/familys_views/exchange_views/Exchange_report_print';
    $this->load->view('admin_index', $data);
}



    public function Beneficiary_sarf_orders(){
        $this->load->model('Difined_model');
        $this->load->model('familys_models/exchange_models/Exchange_model');
        if($this->input->post('beneficiary_id')){
        $data['bank_details'] = $this->Exchange_model->get_Bank_details();
        $data["records"]=$this->Exchange_model->select_Sarf_order_details($this->input->post('beneficiary_id'));
        $data["BeneficiaryDetails"]=$this->Exchange_model->getBeneficiaryDetails($this->input->post('beneficiary_id'));
        $this->load->view('admin/familys_views/exchange_views/getBeneficiarySarf',$data);
        }else{
        $data['all_beneficiary'] = $this->Difined_model->select_all('family_data','','',"","");
        $data['title']="تقرير بمصروفات كل مستفيد";
        $data['subview'] = 'admin/familys_views/exchange_views/beneficiary_sarf_orders';
        $this->load->view('admin_index', $data);
        }
    }


    public function Beneficiary_sarf_orders_print($id){
        $this->load->model('familys_models/exchange_models/Exchange_model');
        $data['bank_details'] = $this->Exchange_model->get_Bank_details();
        $data["records"]=$this->Exchange_model->select_Sarf_order_details($id);
        $data["BeneficiaryDetails"]=$this->Exchange_model->getBeneficiaryDetails($id);
        $data['title'] = 'تقرير بمصروفات كل مستفيد';
        $data['subview'] = 'admin/familys_views/exchange_views/beneficiary_sarf_orders_print';
        $this->load->view('admin_index', $data);
    }
    
        public function te($id){
        $this->load->model('familys_models/exchange_models/Sarf_model');

         $staff = $this->Sarf_model->cheetDetailes(12);
         echo '<pre>';
         print_r($staff);
         echo '<pre>';
         die;
        $data['subview'] = 'admin/familys_views/exchange_views/tt';
        $this->load->view('admin_index', $data);
    }
    
    
    
       public function all_files(){ //family_controllers/Exchange/all_files
        $this->load->model('familys_models/exchange_models/Beneficiaries_model');
        $data['records'] =$this->Beneficiaries_model->select_all();
       
       // $data['all_data']=$this->Model_family_cashing->select_all();
       
        $data['title']="تقرير المستفيدين";
       
        $data['subview'] = 'admin/familys_views/exchange_views/beneficiaries_report';
        $this->load->view('admin_index', $data);

    }
    
    /**
     *  =================================================================================
     * 
     * 
     *  */
       public function to_word($sarf_num){

        $this->load->model('Model_family_cashing');
        $this->load->model('familys_models/exchange_models/Allsarf_model');
        $data_load['all_banks']=$this->Model_family_cashing->select_all_banks();
        $data_load["sarf_data"]=$this->Model_family_cashing->getByArray($sarf_num);
        $data_load["sarf_details"]=$this->Model_family_cashing->select_sarf_detals($sarf_num);
        $this->load->view('admin/familys_views/exchange_views/word_view',$data_load);

    }
    
    
    /***************************************************/
      /* public function updateSarfStatus($id,$status)
    {
       $this->load->model('familys_models/exchange_models/Sarf_model');
        if($status){
            $this->Sarf_model->updateSarfStatus($id,$status);
        }
        redirect('family_controllers/Exchange/allSarf');
    }*/
  /*********************************/
  public function updateSarfStatus($id,$status)
    {
       $this->load->model('familys_models/exchange_models/Sarf_model');
        if($status){
            $this->Sarf_model->updateSarfStatus($id,$status);
        }
        if ($status == 1) {
            redirect('finance_accounting/box/quods/Quods/addQuods/'.$id);
        }
        else {
            redirect('family_controllers/Exchange/allSarf');
        }
    }
    /***************************************/
  
  
    public function SarfPrint($id){   //  family_controllers/Exchange/SarfPrint
        $this->load->model('Model_family_cashing');
        $data['sarf_data']=$this->Model_family_cashing->select_main_data_sarf($id);
        $data['main_data']=$this->Model_family_cashing->select_from_main_data();
   
        //$data['subview'] = '';
        $this->load->view('admin/familys_views/exchange_views/sarf_print', $data);
    }  
    
    
    
     public function update_amin_manager($id)
    {

        $this->load->model('Model_family_cashing');

        $this->Model_family_cashing->update_amin_manager($id);
        redirect('family_controllers/Exchange/allSarf', 'refresh');

    }
    
 /*****************************************************************************/
 /**
  *@author Nagwa 
  ***/
  
    public  function add_sarf_file($sarf_num){ //  family_controllers/Exchange/add_sarf_file
        $this->load->model('Model_family_cashing');
        if ($this->input->post('ADD')){
            $file =$this->upload_file('file_downloded');
            $this->Model_family_cashing->insert_file($file,$sarf_num);
            redirect('family_controllers/Exchange/allSarf');
        }

    }
    public function download($file) //  family_controllers/Exchange/download
    {

        $this->load->helper('download');
        $name = $file;
        $data = file_get_contents('./uploads/files/'.$file);
        force_download($name, $data);
        redirect('family_controllers/Exchange/allSarf','refresh');
    }


    public function read_file($file_name) // family_controllers/Exchange/read_file
    {

        $this->load->helper('file');

        $file_path = 'uploads/files/'.$file_name;
        header('Content-Type: application/pdf');
        header('Content-Discription:inline; filename="'.$file_name.'"');
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges:bytes');
        header('Content-Length: ' . filesize($file_path));
        readfile($file_path);
    }

  /**************************************************************************/
  
  public function all_files_r()
{ //family_controllers/Exchange/all_files
    $this->load->model('familys_models/exchange_models/Beneficiaries_model');

    // $data['all_data']=$this->Model_family_cashing->select_all();
    $data['category'] = $this->Beneficiaries_model->get_category();
    $data['file_status'] = $this->Beneficiaries_model->get_file_satus();
    $data['title'] = "تقرير المستفيدين";

    $data['subview'] = 'admin/familys_views/exchange_views/beneficiaries_report_22';
    $this->load->view('admin_index', $data);

}

//    ******************* 31-12-om ***************************
public function search()
{
    $this->load->model('familys_models/exchange_models/Beneficiaries_model');
    $data_sear['file_status'] = $this->input->post('file_status');
    $data_sear['category'] = $this->input->post('category');
//        $this->test($data_sear);
    $data['records'] = $this->Beneficiaries_model->select_all_22($data_sear);
     $this->test($data['records'] );
    $data['title'] = "تقرير المستفيدين";
    $this->load->view('admin/familys_views/exchange_views/table_report', $data);
} 
        
    
 public function all_fe2at_files(){ //family_controllers/Exchange/all_fe2at_files
        $this->load->model('familys_models/exchange_models/Beneficiaries_model');
        $data['records'] =$this->Beneficiaries_model->select_all_fe2at();

        $data['title']="تقرير أبناء جديد";

        $data['subview'] = 'admin/familys_views/exchange_views/fe2at_files_report';
        $this->load->view('admin_index', $data);

    }    
/***********************************************************************************/

    public function addBnodHelpHesab($id) // family_controllers/Exchange/addBnodHelpHesab
    {
        $this->load->model('familys_models/exchange_models/Bnod_help_settings');
        if($this->input->post('save')){
            $this->Bnod_help_settings->addBnodHelpHesab($id);
            $this->message('success',"تمت الاضافه بنجاح");
            redirect('family_controllers/Exchange/add_bnod_help','refresh');
        }

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


/***********************************************************************************/


    
    
}// END CLASS 