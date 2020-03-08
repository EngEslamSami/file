<?php
class Reports extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->helper(array('url', 'text', 'permission', 'form'));
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }

        $this->load->model('all_Finance_resource_models/reports/Reports_Model');
        $this->load->model('all_Finance_resource_models/reports/Report_family_model');
        $this->load->model('all_Finance_resource_models/sponsors/Sponsors_model');
        $this->load->model('Difined_model');


        /**********************************************************/
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in = $this->Counting->get_basic_in_num();
        $this->files_basic_in = $this->Counting->get_files_basic_in();
        /*************************************************************/


    }

    private function test($data = array())
    {
        // $this->load->model('all_Finance_resource_models/reports/Reports_Model');
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


    public function sponsor_report()
    { //all_Finance_resource/reports/Reports/sponsor_report
        $data['title'] = "تقرير الكفلاء";
        $this->load->model('all_Finance_resource_models/settings/Finance_resource_setting');
        $data['gender_data'] = $this->Sponsors_model->GetFromEmployees_settings(1);
        $data['kfalat_types'] = $this->Difined_model->select_all('fr_kafalat_types_setting', '', '', "id", "asc");

        $data['kafala_status'] = $this->Difined_model->select_search_key("fr_kafalat_kafel_status", 'type', 1);
        $data['halat_kafel'] = $this->Finance_resource_setting->all_frhk_settings('fr_kafalat_kafel_status', 2);
        $data['f2a'] = $this->Difined_model->select_search_key('fr_sponser_donors_setting', 'type', 1);

        $data['subview'] = 'admin/all_Finance_resource_views/reports/sponsor_report_view';

        $this->load->view('admin_index', $data);
    }

    public function check_knum()
    {
        $k_num = $this->input->post('k_num');
        $data = $this->Reports_Model->get_kafel($k_num);
        echo $data;
        return;
    }

    public function report_result()
    {
        $data['records'] = $this->Reports_Model->get_all();
        //$data['aytam']=$this->Reports_Model->get_num_rows_aytam();
        //  $data['arml']=$this->Reports_Model->get_num_rows_araml();

        $data['current_year'] = $this->current_hjri_year();
        $data['valu'] = $this->input->post('valu');


        $this->load->view('admin/all_Finance_resource_views/reports/load_page', $data);
    }

    public function member_reports()
    {
        $data['title'] = "تقرير";
        $data['subview'] = 'admin/all_Finance_resource_views/reports/member_report_view';

        $this->load->view('admin_index', $data);
    }


    public function get_report_member()
    {
        $type_member = $this->input->post('type_member');
        $fe2a = $this->input->post('fe2a');

        $data_all['current_year'] = $this->current_hjri_year();
        $data_all['fe2a'] = $fe2a;
        //================المكفولين=========================
        // $data['f_member']=$this->Reports_Model->get_member_fr_khfalat();
        // $data['mother']=$this->Reports_Model->get_mother_fr_khfalat();

        //===================================================الغير مكفةلين===================================
        // $data['f_member_non']=$this->Reports_Model->get_f_member();
        // $data['f_mother_non']=$this->Reports_Model->get_f_mother();

        //================================================= الارامل المكفولين وغير المكفولين===========================================
        //  $data['all_armls']=$this->Reports_Model->get_all_arml();
        //================================================= الايتام المكفولين وغير المكفولين===========================================

        // $data['all_aytam']=$this->Reports_Model->get_all_aytam();
        //echo $type_member . $fe2a;

        if ($type_member == 0 && $fe2a == 0) {
          $data_all['all_armls'] = $this->Report_family_model->get_all_arml();

            $data_all['all_aytam'] = $this->Report_family_model->get_all_aytam();
         $this->load->view('admin/all_Finance_resource_views/reports/load_all_page', $data_all);

        } elseif ($type_member == 1 && $fe2a == 0) {
            $data_all['all_aytam'] = $this->Report_family_model->get_f_member();
            $data_all['all_armls'] = $this->Report_family_model->get_f_mother();
            $this->load->view('admin/all_Finance_resource_views/reports/load_all_page', $data_all);
        } elseif ($fe2a == 1 && $type_member == 1) {
            $data_all['all_aytam'] = $this->Report_family_model->get_f_member();

            $this->load->view('admin/all_Finance_resource_views/reports/load_all_page', $data_all);
        } elseif ($fe2a == 1 && $type_member == 0) {
            $data_all['all_aytam'] = $this->Report_family_model->get_all_aytam();

            $this->load->view('admin/all_Finance_resource_views/reports/load_all_page', $data_all);
        } elseif ($fe2a == 2 && $type_member == 1) {
            $data_all['all_armls'] = $this->Report_family_model->get_f_mother();

            $this->load->view('admin/all_Finance_resource_views/reports/load_all_page', $data_all);
        } elseif ($fe2a == 2 && $type_member == 0) {
            $data_all['all_armls'] = $this->Report_family_model->get_all_arml();

            $this->load->view('admin/all_Finance_resource_views/reports/load_all_page', $data_all);
        } elseif ($fe2a == 0 && $type_member == 2) {
           $data_all['all_aytam'] = $this->Report_family_model->get_member_fr_khfalat();
           $data_all['all_armls'] = $this->Report_family_model->get_mother_fr_khfalat();

            $this->load->view('admin/all_Finance_resource_views/reports/get_all_mothers', $data_all);
        } elseif ($fe2a == 1 && $type_member == 2) {

            $data_all['all_aytam'] = $this->Report_family_model->get_member_fr_khfalat();

            $this->load->view('admin/all_Finance_resource_views/reports/get_all_mothers', $data_all);
        } elseif ($fe2a == 2 && $type_member == 2) {

            $data_all['all_armls'] = $this->Report_family_model->get_mother_fr_khfalat();

            $this->load->view('admin/all_Finance_resource_views/reports/get_all_mothers', $data_all);
        }elseif ($fe2a == 3){
            $data_all['all_aytam'] = $this->Report_family_model->getMembersMostafed();
           // $this->test($data_all['all_aytam']);
            $this->load->view('admin/all_Finance_resource_views/reports/load_all_page', $data_all);
        }

    }



  /*  public function get_report_member()
    {
        $type_member = $this->input->post('type_member');
        $fe2a = $this->input->post('fe2a');
        $data_all['current_year'] = $this->current_hjri_year();
        $data_all['fe2a'] = $fe2a;
        //================المكفولين=========================
        // $data['f_member']=$this->Reports_Model->get_member_fr_khfalat();
        // $data['mother']=$this->Reports_Model->get_mother_fr_khfalat();

        //===================================================الغير مكفةلين===================================
        // $data['f_member_non']=$this->Reports_Model->get_f_member();
        // $data['f_mother_non']=$this->Reports_Model->get_f_mother();

        //================================================= الارامل المكفولين وغير المكفولين===========================================
        //  $data['all_armls']=$this->Reports_Model->get_all_arml();
        //================================================= الايتام المكفولين وغير المكفولين===========================================

        // $data['all_aytam']=$this->Reports_Model->get_all_aytam();
        //echo $type_member . $fe2a;

        if ($type_member == 0 && $fe2a == 0) {
          $data_all['all_armls'] = $this->Report_family_model->get_all_arml();

            $data_all['all_aytam'] = $this->Report_family_model->get_all_aytam();
         $this->load->view('admin/all_Finance_resource_views/reports/load_all_page', $data_all);

        } elseif ($type_member == 1 && $fe2a == 0) {
            $data_all['all_aytam'] = $this->Report_family_model->get_f_member();
            $data_all['all_armls'] = $this->Report_family_model->get_f_mother();
            $this->load->view('admin/all_Finance_resource_views/reports/load_all_page', $data_all);
        } elseif ($fe2a == 1 && $type_member == 1) {
            $data_all['all_aytam'] = $this->Report_family_model->get_f_member();

            $this->load->view('admin/all_Finance_resource_views/reports/load_all_page', $data_all);
        } elseif ($fe2a == 1 && $type_member == 0) {
            $data_all['all_aytam'] = $this->Report_family_model->get_all_aytam();

            $this->load->view('admin/all_Finance_resource_views/reports/load_all_page', $data_all);
        } elseif ($fe2a == 2 && $type_member == 1) {
            $data_all['all_armls'] = $this->Report_family_model->get_f_mother();

            $this->load->view('admin/all_Finance_resource_views/reports/load_all_page', $data_all);
        } elseif ($fe2a == 2 && $type_member == 0) {
            $data_all['all_armls'] = $this->Report_family_model->get_all_arml();

            $this->load->view('admin/all_Finance_resource_views/reports/load_all_page', $data_all);
        } elseif ($fe2a == 0 && $type_member == 2) {
           $data_all['all_aytam'] = $this->Report_family_model->get_member_fr_khfalat();
           $data_all['all_armls'] = $this->Report_family_model->get_mother_fr_khfalat();

            $this->load->view('admin/all_Finance_resource_views/reports/get_all_mothers', $data_all);
        } elseif ($fe2a == 1 && $type_member == 2) {
            $data_all['all_aytam'] = $this->Report_family_model->get_member_fr_khfalat();

            $this->load->view('admin/all_Finance_resource_views/reports/get_all_mothers', $data_all);
        } elseif ($fe2a == 2 && $type_member == 2) {

            $data_all['all_armls'] = $this->Report_family_model->get_mother_fr_khfalat();

            $this->load->view('admin/all_Finance_resource_views/reports/get_all_mothers', $data_all);
        }
    }
*/
    public function get_khafel_code()
    {
        $this->load->model('all_Finance_resource_models/all_pills/AllPills_model');
        /********* خاص بالكفلاء *********************************************/
        $Fe2aType = 1;
        if ($Fe2aType == 1) {
            $all_Sponsors = $this->AllPills_model->getMembersSponsors();
            $arr_sponsors = array();
            $arr_sponsors['data'] = array();
            if (!empty($all_Sponsors)) {
                foreach ($all_Sponsors as $row_sponsor) {

                    $arr_sponsors['data'][] = array(
                        '<input type="radio" name="choosed"   id="member' . $row_sponsor['id'] . '" data-name="' . $row_sponsor['k_name'] . '" data-id="' . $row_sponsor['id'] . '"
                   data-mob="' . $row_sponsor['k_mob'] . '"     value="' . $row_sponsor['id'] . '"  ondblclick="GetMemberName(' . $row_sponsor['id'] . ')"
                        onclick="getMotherData($(this).val(),' . $Fe2aType . ')" />',
                        $row_sponsor['k_num'],
                        $row_sponsor['k_name'],

                        $row_sponsor['k_mob'],

                    );
                }
            }
            echo json_encode($arr_sponsors);

        }

    }

    public function get_mother_data()
    {

        /********* خاص بالكفلاء *********************************************/
        $Fe2aType = 1;
        if ($Fe2aType == 1) {
            $all_Sponsors = $this->Report_family_model->get_mother_suspend();
            $arr_sponsors = array();
            $arr_sponsors['data'] = array();
            if (!empty($all_Sponsors)) {
                $x = 0;
                foreach ($all_Sponsors as $row_sponsor) {

                    $arr_sponsors['data'][] = array(
                        '<input type="radio" name="choosed"   id="member' . $row_sponsor->id . '" 
                        value="' . $row_sponsor->mother_national_num . '"  ondblclick="GetMemberName(' . $row_sponsor->mother_national_num . ')"
                        onclick="getMotherData($(this).val(),' . $Fe2aType . ')" />',
                        $row_sponsor->mother_national_num,
                        $row_sponsor->file_num,

                        $row_sponsor->father_name

                    );
                    $x++;
                }
            }
            echo json_encode($arr_sponsors);

        }

    }

    public function family_reports()
    {
        $data['kfalat_types'] = $this->Difined_model->select_all('fr_kafalat_types_setting', '', '', "id", "asc");
      $data['title']="تقرير الاسر";
        $data['subview'] = 'admin/all_Finance_resource_views/reports/family_report_view';

        $this->load->view('admin_index', $data);
    }

    public function report_mother()  //all_Finance_resource/reports/Reports/report_mother
    {
        $data_all['current_year'] = $this->current_hjri_year();
        $data_all['valu'] = 0;
        $type_member = $this->input->post('type_member');
        $fe2a = $this->input->post('fe2a_type');
        $data_all['fe2a'] = $fe2a;
     if ( $this->input->post('searchOf')==0&& $type_member == 0 && $fe2a == 0) {

            $data_all['all_armls'] = $this->Report_family_model->get_all_arml();
           $data_all['all_aytam'] = $this->Report_family_model->get_all_aytam();
           $this->load->view('admin/all_Finance_resource_views/reports/load_all_page', $data_all);


        }elseif ($this->input->post('searchOf')==1) {

        $data_all['all_armls'] = $this->Report_family_model->get_all_arml();
         $data_all['all_aytam'] = $this->Report_family_model->get_all_aytam();

         $this->load->view('admin/all_Finance_resource_views/reports/get_all_mothers', $data_all);
     }
     elseif ($fe2a == 1 && $type_member == 2) {

            $data_all['all_armls'] = $this->Report_family_model->get_mother_fr_khfalat();


            $this->load->view('admin/all_Finance_resource_views/reports/get_all_mothers', $data_all);
        } elseif ($fe2a == 1 && $type_member == 1) {

            $data_all['all_armls'] = $this->Report_family_model->get_f_mother();

           $this->load->view('admin/all_Finance_resource_views/reports/load_all_page', $data_all);
        } elseif ($fe2a == 1 && $type_member == 0) {
            $data_all['all_armls'] = $this->Report_family_model->get_all_arml();

            $this->load->view('admin/all_Finance_resource_views/reports/load_all_page', $data_all);
        } elseif ($fe2a == 2 && $type_member == 1) {
            $data_all['all_aytam'] = $this->Report_family_model->get_f_member();


            $this->load->view('admin/all_Finance_resource_views/reports/load_all_page', $data_all);
        } elseif ($fe2a == 3 && $type_member == 1) {
        $data_all['all_aytam'] = $this->Report_family_model->get_f_member();


       $this->load->view('admin/all_Finance_resource_views/reports/load_all_page', $data_all);
     }
     elseif ($fe2a == 0 && $type_member == 1) {
         $data_all['all_aytam'] = $this->Report_family_model->get_f_member();
         $data_all['all_armls'] = $this->Report_family_model->get_f_mother();



         $this->load->view('admin/all_Finance_resource_views/reports/load_all_page', $data_all);
     }elseif ($fe2a == 2 && $type_member == 0) {
            $data_all['all_aytam'] = $this->Report_family_model->get_all_aytam();

            $this->load->view('admin/all_Finance_resource_views/reports/load_all_page', $data_all);
        }elseif ($fe2a == 3 && $type_member == 0) {
       $data_all['all_aytam'] = $this->Report_family_model->get_all_aytam();

       $this->load->view('admin/all_Finance_resource_views/reports/load_all_page', $data_all);
   }elseif ($fe2a == 0 && $type_member == 2) {

         $data_all['all_aytam'] = $this->Report_family_model->get_member_fr_khfalat();
         $data_all['all_armls'] = $this->Report_family_model->get_mother_fr_khfalat();

        $this->load->view('admin/all_Finance_resource_views/reports/get_all_mothers', $data_all);
     }
              elseif ($fe2a == 2 && $type_member == 2) {
            $data_all['all_aytam'] = $this->Report_family_model->get_member_fr_khfalat();
            $this->load->view('admin/all_Finance_resource_views/reports/get_all_mothers', $data_all);
        } elseif ($fe2a == 3 && $type_member == 2) {
         $data_all['all_aytam'] = $this->Report_family_model->get_member_fr_khfalat();
         $this->load->view('admin/all_Finance_resource_views/reports/get_all_mothers', $data_all);
     }


    }
    
    
    
  /******************/  
    
        public function kafalat_general_report(){
        //all_Finance_resource/reports/Reports/kafalat_general_report
//        $this->load->model('all_Finance_resource_models/reports/Reports_Model');

    $data['records'] = $this->Reports_Model->getmain_kafalat_details_data();

    /*echo "<pre>";
    print_r($data['records']);
    echo "</pre>";
    die;*/
        $data['title'] = 'تقرير كفالات عام';
        $data['subview'] = 'admin/all_Finance_resource_views/reports/kafalat_general_report';
        $this->load->view('admin_index', $data);
    }
    
    
    
}