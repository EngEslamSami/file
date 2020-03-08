<?php
class Family_details extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->CI = &get_instance();
        $this->load->library('pagination');
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }
        $this->load->helper(array('url', 'text', 'permission', 'form'));
        /**********************************************************/
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in = $this->Counting->get_basic_in_num();
        $this->files_basic_in = $this->Counting->get_files_basic_in();
        /*************************************************************/
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
        $config['max_size'] = '1024*8';
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
        $config['max_size'] = '1024*8';
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
    /**
     *  ================================================================================================================
     *
     *  ================================================================================================================
     *
     *  ================================================================================================================
     */
    public function details($mother_national_num){    // family_controllers/Family_details/details/
        $this->load->model('familys_models/Father');
        $this->load->model('Nationality');
        $this->load->model("familys_models/Register");
        $this->load->model('Difined_model');
        $this->load->model('familys_models/Devices');
        $this->load->model('familys_models/House');
        $this->load->model('familys_models/Mother');
        $this->load->model('familys_models/Money');
        $this->load->model("familys_models/Family_members");
        $this->load->model('familys_models/Home_needs_model');
        $this->load->model('familys_models/Family_category');
        $this->load->model('familys_models/Attach_files');
        $this->load->model('Model_transformation_process');
        
         $data['egraat']= $this->Model_transformation_process->get_from_egraat_setting();
           $data['family_sarf']= $this->Model_transformation_process->get_sarf_details($this->uri->segment(4));

        
        $data['accept_reasons'] = $this->Difined_model->select_search_key('family_setting', 'type', 56);
        $data['refuse_reasons'] = $this->Difined_model->select_search_key('family_setting', 'type', 57);
        $data['Activate_reasons'] = $this->Difined_model->select_search_key('family_setting', 'type', 58);
        
        
        
        $data['mother_num'] = $mother_national_num;
        /****************************************************/
        $data['member_status'] = $this->Register->get_all_files_status();
        $data['arr_ed_state'] = $this->Mother->get_from_family_setting(40);
        /**************************************************/
        $data['all_lagna_to'] = $this->Difined_model->select_all("lagna", "", "", "", "");
        $data['home_needs'] = $this->Home_needs_model->select_where($mother_national_num);
        $data['adminastration'] = $this->Difined_model->select_search_key("department_jobs", "from_id_fk", "0");
        $data['attach_files'] = $this->Attach_files->select_data_table($mother_national_num);
        $data['all_field'] = $this->Difined_model->get_field('houses');
        $data["mother_data"] = $this->Difined_model->getByArray("mother", array("mother_national_num_fk" => $mother_national_num));
        $data['father'] = $this->Father->get_by_mother($mother_national_num, 'father');
        $data['result'] = $this->Father->get_by_mother2($mother_national_num, 'mother');
        $data['check_data'] = $this->House->getById($mother_national_num);
        $data['nationality'] = $this->Mother->get_from_family_setting(2);
        $data['national_id_array'] = $this->Mother->get_from_family_setting(1);
        $data['job_titles'] = $this->Mother->get_from_family_setting(3);
        $data['nationality'] = $this->Mother->get_from_family_setting(2);
        $data['living_place_array'] = $this->Mother->get_from_family_setting(5);
        $data['national_id_array'] = $this->Mother->get_from_family_setting(1);
        $data['health_status_array'] = $this->Mother->get_from_family_setting(6);
        $data['education_level_array'] = $this->Mother->get_from_family_setting(8);
        $data['job_titles'] = $this->Mother->get_from_family_setting(3);
        $data['arr_deth'] = $this->Mother->get_from_family_setting(25);
        $data['marital_status_array'] = $this->Mother->get_from_family_setting(4);
        $data_in = $data["check_data"];
        $data['area'] = $this->House->select_places(0);
        if (isset($data_in) && !empty($data_in) && $data_in != null) {
            $data['city'] = $this->House->select_places($data_in["h_area_id_fk"]);
            $data['centers'] = $this->House->select_places($data_in["h_city_id_fk"]);
            $data['village'] = $this->House->select_places($data_in["h_center_id_fk"]);
        }
        $data['mothers_data'] = $this->Difined_model->select_search_key('mother', "mother_national_num_fk ", $mother_national_num);
        $data["cuttent_higry_year"] = $this->current_hjri_year();
        $data['member_data'] = $this->Family_members->select_all($mother_national_num);
        $data['devices'] = $this->Devices->select_where($mother_national_num);
        $data['mother_national_num'] = $mother_national_num;
        $data['main_depart'] = $this->Mother->get_from_family_setting(12);
        $data['arr_type_house'] = $this->Mother->get_from_family_setting(14);
        $data['arr_direct'] = $this->Mother->get_from_family_setting(23);
        $data['house_state'] = $this->Mother->get_from_family_setting(22);
        $data['house_own'] = $this->Mother->get_from_family_setting(13);
        $data['money'] = $this->Money->getArray($this->uri->segment(4));
        $data["person_type"] = $this->Difined_model->select_search_key('family_setting', 'type', 32);
        $data["relationships"] = $this->Difined_model->select_search_key('family_setting', 'type', 34);
        $data["id_source"] = $this->Difined_model->select_search_key('family_setting', 'type', 12);
        $data["diseases"] = $this->Difined_model->select_search_key('family_setting', 'type', 35);
        $data["responses"] = $this->Difined_model->select_search_key('family_setting', 'type', 36);
        $data["diseases_status"] = $this->Difined_model->select_search_key('family_setting', 'type', 37);
        $data['women_houses'] = $this->Difined_model->select_search_key('family_setting', 'type', 44);
        $data["person_type"] = $this->Difined_model->select_search_key('family_setting', 'type', 32);
        $data['banks'] = $this->Difined_model->select_all('banks', '', '', "id", "asc");
        $data['mother_last_account'] = $this->Mother->getMotherAccount($this->uri->segment(4));
        $data['last_account'] = $this->Mother->getFamilyAccount($this->uri->segment(4));
        $data['person_account'] = $this->Mother->getBasicAccount($this->uri->segment(4));
        $data['agent_bank_account'] = $this->Mother->getBasicAccount_agent($this->uri->segment(4));
        $data["income_sources"] = $this->Difined_model->select_search_key('family_setting', 'type', 42);
        $data["monthly_duties"] = $this->Difined_model->select_search_key('family_setting', 'type', 43);
        $this->load->model('familys_models/Home_needs_model');
        $data['home_needs'] = $this->Home_needs_model->select_where($mother_national_num);
        $data['personal_characters'] = $this->Mother->get_from_family_setting(48);
        $data['relations_with_family'] = $this->Mother->get_from_family_setting(49);
        $data['works_type'] = $this->Mother->get_from_family_setting(50);
        //----------------------------------------------
        $this->load->model('familys_models/Model_access_rule');
        $data["buttun_roles"] = $this->Model_access_rule->get_sesstion_roles($_SESSION['role_id_fk'], $_SESSION["emp_code"]);
        $data["file_id"] = $mother_national_num;
        $data['jobs_name'] = $this->Model_access_rule->jobs_id();
        $data['all_operation'] = $this->Model_access_rule->select_operation($mother_national_num);
        //----------------------------------------------
        //-------------------  transformation_process  --------------
        $this->load->model('Model_transformation_process');
        $data["select_process_procedures"] = $this->Model_transformation_process->select_process_procedures();
        $data["select_user"] = $this->Model_transformation_process->select_user();
        $data['all_actions_in_family'] = $this->Model_transformation_process->select_all_actions_in_family_files($mother_national_num);
        //-------------------  transformation_process  --------------
        $data['all_banks'] = $this->Money->select_bank();
        $data['mother_full_name'] = $this->Money->select_mother_name($this->uri->segment(4));
        $data['all_cat'] = $this->Family_category->select_Family_categories();
        $data['wakeel'] = $this->Difined_model->select_search_key("wakels", "mother_national_num_fk", $mother_national_num);
        $data['current_year'] = $this->current_hjri_year();
        $data['button_roles'] = $this->Difined_model->select_all("file_procedure_setting", "", "", "order_operation", "asc");
        $data["basic"] = $this->Difined_model->select_search_key('basic', 'mother_national_num', $mother_national_num);
        $data['file_status'] = $this->Register->get_all_files_status();
        $data['myfile_num'] = $this->Register->select_last_file_num();
        //--------------------774--------------------------
        $this->load->model("familys_models/Model_researcher_opinion");
        $result = $this->Model_researcher_opinion->getById($mother_national_num);
        if (is_array($result)) {
            $data['result_opinion'] = $result;
        }
        $data['arr_op'] = $this->Mother->get_from_family_setting(28);
        $data['arr_in'] = $this->Mother->get_from_family_setting(27);
        $data['arr_type'] = $this->Mother->get_from_family_setting(29);
        //--------------------774--------------------------
        $data['procedures_option_lagna'] = $this->Difined_model->select_all("procedures_option_lagna", "", "", "", "");
        /***********************************************************/
        $data['procedures_visit'] = $this->Difined_model->select_search_key('family_setting', 'type', 52);
        $data['family_new_cat'] = $this->Family_category->specific_familys_category($mother_national_num);
        /***************************mymap**********/
        $this->load->library('google_maps');
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
        if (!empty($data["check_data"]['house_google_lat']) && !empty ($data["check_data"]['house_google_lng'])) {
            $center = implode(',', array(
                $data["check_data"]['house_google_lat'],
                $data["check_data"]['house_google_lng']
            ));
        } else {
            $center = '27.517571447136426,41.71273613027347';
        }
        $config['center'] = $center;
        $this->google_maps->initialize($config);
        $this->google_maps->add_marker($marker);
        $data['maps'] = $this->google_maps->create_map();
        /***************************mymap**********/
        $where_cond = array('mother_national_num' => $mother_national_num);
        $data['main_family_data'] = $this->Register->select_data_basic_accepted_where_details($where_cond);
        $data["currnt_higry_year"] = $this->current_hjri_year();
        /*************************************************************/
        $data["family_lagna_desision"] = $this->Register->select_family_lagna($mother_national_num);
        /******** get edara     *****************************************************/
          $data_edara=$this->Difined_model->getById("department_job_relations",2);
        $data["edara_id"]=$data_edara["edara_id_fk"];
             $Conditions_arr_edara = array("employees.administration" => $data["edara_id"]);
        $data["select_user_edara"] = $this->Model_transformation_process->select_user_where($Conditions_arr_edara);
       // $this->test($data["select_user_edara"]);
       $data['notes'] = $this->Difined_model->select_search_key("all_actions_in_family_files", "mother_national_num_fk", $mother_national_num);
        /******** get edara     *****************************************************/
        $this->load->model('familys_models/Family_visitors');
        $data['visitData'] = $this->Family_visitors->getVisits($this->uri->segment(4));
        
       $data["last_lagna_desision"] =$this->Model_transformation_process->get_transformation_lagna_last(array('mother_national_num'=>$mother_national_num))[0];
      
      if(!empty($data["last_lagna_desision"])){
          $data["all_procedures"] =$this->Difined_model->select_search_key('procedures_option_lagna','type',$data["last_lagna_desision"]->transfer_type_id_fk);

       
      }
      
       
        
        $data['last_session'] =    $this->Model_transformation_process->get_last_session();
        
        $data['title'] = '';
        $data['subview'] = 'admin/familys_views/family_details';
        $this->load->view('admin_index', $data);
    }
    
    
     public function get_emp_setting(){
          $this->load->model('Model_transformation_process');

          $id = $this->input->post('id');
          $data['emps']= $this->Model_transformation_process->get_emp_setting($id);

          $this->load->view('admin/familys_views/get_emp_setting',$data);

      }
    /**********************************************************************************************/
    public function getVisits()
    {
        $data['number'] = $this->input->post('numbers') + $this->input->post('count');
        $this->load->view('admin/familys_views/getVisits', $data);
    }
    public function deleteVisits($id, $mother_num)
    {
        $this->load->model('familys_models/Family_visitors');
        $this->Family_visitors->deleteVisits($id);
        redirect('family_controllers/Family_details/details/' . $mother_num, 'refresh');
    }
    /********************************************/
    
    /*******************************************/

    public function print_family($mother_national_num)
    {
        $this->load->model('familys_models/Family_print');
        $this->load->model('familys_models/Mother');
        $this->load->model('familys_models/Home_needs_model');
        $this->load->model('familys_models/House');
        $this->load->model('Difined_model');
        $this->load->model("familys_models/Responsible_account");
        $this->load->model("familys_models/Model_researcher_opinion");
        $this->load->model('familys_models/Family_category');
        $this->load->model('familys_models/Attach_files');
        $result = $this->Model_researcher_opinion->getById($mother_national_num);
        if (is_array($result)) {
            $data['result_opinion'] = $result;
        }
        $data['attach_files'] = $this->Attach_files->select_data_table($mother_national_num);
        $data['all_cat'] = $this->Family_category->select_Family_categories();
        $data['mother_national_num'] = $mother_national_num;
        $data['responsible_account'] = $this->Responsible_account->get_all();
        $data["mother_data"] = $this->Difined_model->getByArray("mother", array("mother_national_num_fk" => $mother_national_num));
        $data['family_new_cat'] = $this->Family_category->specific_familys_category($mother_national_num);
        $data["cuttent_higry_year"] = $this->current_hjri_year();
        $data['job_titles'] = $this->Family_print->get_from_family_setting(3);
        $data['nationality'] = $this->Family_print->get_from_family_setting(2);
        $data['national_num_type'] = $this->Family_print->get_from_family_setting(1);
        $data['arr_type_house'] = $this->Family_print->get_from_family_setting(14);
        $data['arr_direct'] = $this->Family_print->get_from_family_setting(23);
        $data['house_state'] = $this->Family_print->get_from_family_setting(22);
        $data['house_own'] = $this->Family_print->get_from_family_setting(13);
        $data['devices'] = $this->Family_print->get_from_family_setting(18);
        $data["banks"] = $this->Family_print->select_banks();
        $data['check_data'] = $this->House->getById($mother_national_num);
        $data_in = $data["check_data"];
        $data['area'] = $this->Family_print->select_places(0);
        if (isset($data_in) && !empty($data_in) && $data_in != null) {
            $data['city'] = $this->Family_print->select_places($data_in["h_area_id_fk"]);
            $data['centers'] = $this->Family_print->select_places($data_in["h_city_id_fk"]);
            $data['village'] = $this->Family_print->select_places($data_in["h_center_id_fk"]);
        }
        $data['current_year'] = $this->current_hjri_year();
        $data['research_opnion'] = $this->Family_print->get_research($mother_national_num);
        $data['arr_op'] = $this->Family_print->get_from_family_setting(28);
        $data['arr_in'] = $this->Family_print->get_from_family_setting(27);
        $data['arr_type'] = $this->Family_print->get_from_family_setting(29);
        $data["person_type"] = $this->Family_print->get_from_family_setting(32);
        $data['all'] = $this->Home_needs_model->select_all();
        /****************************************************************************/
        $data["id_source"] = $this->Family_print->get_from_family_setting(12);
        $data["relationships"] = $this->Family_print->get_from_family_setting(34);
        $data['health_status_array'] = $this->Family_print->get_from_family_setting(6);
        $data['diseases'] = $this->Family_print->get_from_family_setting(35);
        $data['responses'] = $this->Family_print->get_from_family_setting(36);
        $data['diseases_status'] = $this->Family_print->get_from_family_setting(37);
        $data['women_houses'] = $this->Family_print->get_from_family_setting(44);
        $data["income_sources"] = $this->Difined_model->select_search_key('family_setting', 'type', 42);
        $data["monthly_duties"] = $this->Difined_model->select_search_key('family_setting', 'type', 43);
        /****************************************************************************/
        /*******************************new********************/
        $data['member_status'] = $this->Family_print->get_files_status_setting();
        $data['marital_status_array'] = $this->Family_print->get_from_family_setting(4);
        $data['living_place_array'] = $this->Family_print->get_from_family_setting(5);
        $data['arr_ed_state'] = $this->Family_print->get_from_family_setting(40);
        $data['education_level_array'] = $this->Family_print->get_from_family_setting(8);
        $data['specialties'] = $this->Family_print->get_from_family_setting(45);
        $data['women_houses'] = $this->Difined_model->select_search_key('family_setting', 'type', 44);
        $data['arr_deth'] = $this->Family_print->get_from_family_setting(25);
        /*******************************new********************/
        $data['personal_characters'] = $this->Family_print->get_from_family_setting(48);
        $data['relations_with_family'] = $this->Family_print->get_from_family_setting(49);
        $data['works_type'] = $this->Family_print->get_from_family_setting(50);
        $data['member_status'] = $this->Family_print->get_all_files_status();
        $data['family_bank'] = $this->Family_print->family_bank_responsible($mother_national_num);
        $data['f_members'] = $this->Family_print->get_mother_f_members($mother_national_num);
        $data['tables'] = $this->Family_print->select_all($mother_national_num);
        $this->load->view('admin/familys_views/print_family', $data);
    }
    public function print_card($mother_num)
    {
        $this->load->model("familys_models/Register");
        $data['card_data'] = $this->Register->get_by_mother_num($mother_num);
        $data['mother_name'] = $this->Register->get_mom_name($mother_num);
        $this->load->view('admin/familys_views/print_card', $data);
    }
    public function printEqrar($mother_national_num)
    {
        $this->load->model('familys_models/Family_print');
        $data['family'] = $this->Family_print->printEqrar($mother_national_num);
        $this->load->view('admin/familys_views/printEqrar', $data);
    }
      public function printEqrar_khdma($mother_national_num)
    {
        $this->load->model('familys_models/Family_print');
        $data['family'] = $this->Family_print->printEqrar_khdma($mother_national_num);
        $this->load->view('admin/familys_views/printEqrar_khdma', $data);
    }  
    
    
    
    public function GetDepart()
    {
        if ($this->input->post("get_depart")) {
            $admin_id = $this->input->post("get_depart");
            $this->load->model('Difined_model');
            $data_load["admin_id"] = $admin_id;
            $data_load["departments"] = $this->Difined_model->select_search_key("department_jobs", "from_id_fk", $admin_id);
            $this->load->view('admin/familys_views/get_department', $data_load);
        } elseif ($this->input->post("get_emp")) {
            $this->load->model('Model_transformation_process');
            $depart_id = $this->input->post("get_emp");
            $data_load["depart_id"] = $depart_id;
            $Conditions_arr = array("employees.administration" => $depart_id);
            $data_load["select_user"] = $this->Model_transformation_process->select_user_where($Conditions_arr);
            $this->load->view('admin/familys_views/get_department', $data_load);
        }
    }
    /**********************************/
    public function add_record()
    {
        $this->load->model('Difined_model');
        $data['count'] = $this->input->post('count');
        $data['procedures_visit'] = $this->Difined_model->select_search_key('employees_settings', 'type', 20);
        $this->load->view('admin/familys_views/get_record', $data);
    }
    /***********************************************************************************/
    public function details_family_files($mother_national_num)
    {
        $this->load->model('familys_models/Father');
        $this->load->model('Nationality');
        $this->load->model("familys_models/Register");
        $this->load->model('Difined_model');
        $this->load->model('familys_models/Devices');
        $this->load->model('familys_models/House');
        $this->load->model('familys_models/Mother');
        $this->load->model('familys_models/Money');
        $this->load->model("familys_models/Family_members");
        $this->load->model('familys_models/Home_needs_model');
        $this->load->model('familys_models/Family_category');
        $this->load->model('familys_models/Attach_files');
        //------------------oosama ----------
        $this->load->model('familys_models/Family_print');
        $this->load->model("familys_models/Responsible_account");
        
        
          $data['files']=$this->Attach_files->get_all_files($mother_national_num);
        
        $data['tables'] = $this->Family_print->select_all($mother_national_num);
        $data["id_source"] = $this->Family_print->get_from_family_setting(12); //hash
        $data['nationality'] = $this->Family_print->get_from_family_setting(2); //hash
        $data['member_status'] = $this->Family_print->get_files_status_setting();//hash
        $data['responsible_account'] = $this->Responsible_account->get_all();
        //------------------oosama ----------
        /****************************************************/
        //  $data["relationships"]=$this->Difined_model->select_search_key('family_setting','type',34);
        //$data['member_status']=$this->Register->get_all_files_status();
        $data['arr_ed_state'] = $this->Mother->get_from_family_setting(40);
        /**************************************************/
        $data['all_lagna_to'] = $this->Difined_model->select_all("lagna", "", "", "", "");
        $data['home_needs'] = $this->Home_needs_model->select_where($mother_national_num);
        //$data['attach_files']=$this->Difined_model->select_search_key('family_attach_files','mother_national_num_fk',$mother_national_num);
        $data['adminastration'] = $this->Difined_model->select_search_key("department_jobs", "from_id_fk", "0");
        $data['attach_files'] = $this->Attach_files->select_data_table($mother_national_num);
        $data['all_field'] = $this->Difined_model->get_field('houses');
        $data["mother_data"] = $this->Difined_model->getByArray("mother", array("mother_national_num_fk" => $mother_national_num));
        //$this->test($data["mother_data"]);
        $data['father'] = $this->Father->get_by_mother($mother_national_num, 'father');
        $data['result'] = $this->Father->get_by_mother2($mother_national_num, 'mother');
        $data['check_data'] = $this->House->getById($mother_national_num);
        //// arrays with select//////
        // $data['nationality']=  $this->Mother->get_from_family_setting(2);
        $data['national_id_array'] = $this->Mother->get_from_family_setting(1);
        $data['job_titles'] = $this->Mother->get_from_family_setting(3);
        //$data['nationality']=  $this->Mother->get_from_family_setting(2);
        $data['living_place_array'] = $this->Mother->get_from_family_setting(5);
        $data['national_id_array'] = $this->Mother->get_from_family_setting(1);
        $data['health_status_array'] = $this->Mother->get_from_family_setting(6);
        $data['education_level_array'] = $this->Mother->get_from_family_setting(8);
        $data['job_titles'] = $this->Mother->get_from_family_setting(3);
        //$data['arr_ed_state']=  $this->Mother->get_from_family_setting(9);
        $data['arr_deth'] = $this->Mother->get_from_family_setting(25);
        $data['marital_status_array'] = $this->Mother->get_from_family_setting(4);
        $data_in = $data["check_data"];
        $data['area'] = $this->House->select_places(0);
        if (isset($data_in) && !empty($data_in) && $data_in != null) {
            $data['city'] = $this->House->select_places($data_in["h_area_id_fk"]);
            $data['centers'] = $this->House->select_places($data_in["h_city_id_fk"]);
            $data['village'] = $this->House->select_places($data_in["h_center_id_fk"]);
        }
        $data['mothers_data'] = $this->Difined_model->select_search_key('mother', "mother_national_num_fk ", $mother_national_num);
        $data["cuttent_higry_year"] = $this->current_hjri_year();
        $data['member_data'] = $this->Family_members->select_all($mother_national_num);
        $data['devices'] = $this->Devices->select_where($mother_national_num);
        $data['mother_national_num'] = $mother_national_num;
        $data['main_depart'] = $this->Mother->get_from_family_setting(12);
        $data['arr_type_house'] = $this->Mother->get_from_family_setting(14);
        $data['arr_direct'] = $this->Mother->get_from_family_setting(23);
        $data['house_state'] = $this->Mother->get_from_family_setting(22);
        $data['house_own'] = $this->Mother->get_from_family_setting(13);
        $data['money'] = $this->Money->getArray($this->uri->segment(4));
        $data["person_type"] = $this->Difined_model->select_search_key('family_setting', 'type', 32);
        $data["relationships"] = $this->Difined_model->select_search_key('family_setting', 'type', 34);
        $data["diseases"] = $this->Difined_model->select_search_key('family_setting', 'type', 35);
        $data["responses"] = $this->Difined_model->select_search_key('family_setting', 'type', 36);
        $data["diseases_status"] = $this->Difined_model->select_search_key('family_setting', 'type', 37);
        $data['women_houses'] = $this->Difined_model->select_search_key('family_setting', 'type', 44);
        $data["person_type"] = $this->Difined_model->select_search_key('family_setting', 'type', 32);
        $data['banks'] = $this->Difined_model->select_all('banks', '', '', "id", "asc");
        $data['mother_last_account'] = $this->Mother->getMotherAccount($this->uri->segment(4));
        $data['last_account'] = $this->Mother->getFamilyAccount($this->uri->segment(4));
        $data['person_account'] = $this->Mother->getBasicAccount($this->uri->segment(4));
        $data['agent_bank_account'] = $this->Mother->getBasicAccount_agent($this->uri->segment(4));
        $data["income_sources"] = $this->Difined_model->select_search_key('family_setting', 'type', 42);
        $data["monthly_duties"] = $this->Difined_model->select_search_key('family_setting', 'type', 43);
        $this->load->model('familys_models/Home_needs_model');
        $data['home_needs'] = $this->Home_needs_model->select_where($mother_national_num);
        $data['personal_characters'] = $this->Mother->get_from_family_setting(48);
        $data['relations_with_family'] = $this->Mother->get_from_family_setting(49);
        $data['works_type'] = $this->Mother->get_from_family_setting(50);
        //----------------------------------------------
        $this->load->model('familys_models/Model_access_rule');
        $data["buttun_roles"] = $this->Model_access_rule->get_sesstion_roles($_SESSION['role_id_fk'], $_SESSION["emp_code"]);
        $data["file_id"] = $mother_national_num;
        //  $data["convent"]=$this->Model_access_rule->all_convent(1);
        $data['jobs_name'] = $this->Model_access_rule->jobs_id();
        $data['all_operation'] = $this->Model_access_rule->select_operation($mother_national_num);
        //----------------------------------------------
        //-------------------  transformation_process  --------------
        $this->load->model('Model_transformation_process');
        $data["select_process_procedures"] = $this->Model_transformation_process->select_process_procedures();
        $data["select_user"] = $this->Model_transformation_process->select_user();
        //-------------------  transformation_process  --------------
        $data['all_banks'] = $this->Money->select_bank();
        $data['mother_full_name'] = $this->Money->select_mother_name($this->uri->segment(4));
        //   $data['money']=$this->Money->getById($this->uri->segment(4));
        $data['all_cat'] = $this->Family_category->select_Family_categories();
        $data['wakeel'] = $this->Difined_model->select_search_key("wakels", "mother_national_num_fk", $mother_national_num);
        $data['current_year'] = $this->current_hjri_year();
        $data['button_roles'] = $this->Difined_model->select_all("file_procedure_setting", "", "", "order_operation", "asc");
        $data["basic"] = $this->Difined_model->select_search_key('basic', 'mother_national_num', $mother_national_num);
        $data['file_status'] = $this->Register->get_all_files_status();
        $data['myfile_num'] = $this->Register->select_last_file_num();
        //--------------------774--------------------------
        $this->load->model("familys_models/Model_researcher_opinion");
        $result = $this->Model_researcher_opinion->getById($mother_national_num);
        if (is_array($result)) {
            $data['result_opinion'] = $result;
        }
        $data['arr_op'] = $this->Mother->get_from_family_setting(28);
        $data['arr_in'] = $this->Mother->get_from_family_setting(27);
        $data['arr_type'] = $this->Mother->get_from_family_setting(29);
        //--------------------774--------------------------
        /***************ahmed******/
        $data['procedures_option_lagna'] = $this->Difined_model->select_all("procedures_option_lagna", "", "", "", "");
        /***************ahmed******/
        /***********************************************************/
        $data['procedures_visit'] = $this->Difined_model->select_search_key('family_setting', 'type', 52);
        $data['family_new_cat'] = $this->Family_category->specific_familys_category($mother_national_num);
        /***************************mymap**********/
        $this->load->library('google_maps');
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
        if (!empty($data["check_data"]['house_google_lat']) && !empty ($data["check_data"]['house_google_lng'])) {
            $center = implode(',', array(
                $data["check_data"]['house_google_lat'],
                $data["check_data"]['house_google_lng']
            ));
        } else {
            $center = '27.517571447136426,41.71273613027347';
        }
        $config['center'] = $center;
        $this->google_maps->initialize($config);
        $this->google_maps->add_marker($marker);
        $data['maps'] = $this->google_maps->create_map();
        /***************************mymap**********/
        $where_cond = array('mother_national_num' => $mother_national_num);
        $data['main_family_data'] = $this->Register->select_data_basic_accepted_where_details_member_details($where_cond);
        $data["currnt_higry_year"] = $this->current_hjri_year();
        /*************************************************************/
        $this->load->model('familys_models/Family_visitors');
        $data['visitData'] = $this->Family_visitors->getVisits($this->uri->segment(4));
        $data['title'] = '';
        // $data['subview'] = 'admin/familys_views/detail_page/load_page';
        //$data['subview'] = 'admin/familys_views/family_details';
        $this->load->view('admin/familys_views/detail_page/load_page', $data);
    }
    /*************************************/
    
    
    public function GetTransferType(){
    $this->load->model("familys_models/Family_members");
    $this->load->model("familys_models/Register");
      $data["current_year"] = $this->current_hjri_year();
    $data['persons_status']=$this->Register->get_all_persons_status();
    $data['mothers_data']=$this->Family_members->select_mother_search_key('mother',"mother_national_num_fk ",$_POST['mother_num']);
    $data['member_data']=$this->Family_members->select_all($_POST['mother_num']);
    $this->load->view('admin/familys_views/GetTransferType', $data);
}
public function GetProcedure(){
    $this->load->model('Difined_model');
    $data =$this->Difined_model->select_search_key('procedures_option_lagna','type',$_POST['type']);
    echo json_encode($data);
}
    
    
      
      
      
public function details_test($mother_national_num){    // family_controllers/Family_details/details/

        $this->load->model('Model_transformation_process');
        
         $data['egraat']= $this->Model_transformation_process->get_from_egraat_setting();
           $data['family_sarf']= $this->Model_transformation_process->get_sarf_details($this->uri->segment(4));

        $data['title'] = 'asdasds';
        $data['subview'] = 'admin/familys_views/family_details_test';
        $this->load->view('admin_index', $data);
    }
     
    
}// END CLASS