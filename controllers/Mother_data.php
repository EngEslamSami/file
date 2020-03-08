<?php
class Mother_data extends MY_Controller
{

    public function __construct()
    {


        parent::__construct();
        if(!$this->session->userdata('is_logged_web')){
            redirect('WebProfile/Login');
        }
        $this->load->library('pagination');
        $this->load->helper(array('url', 'text', 'permission', 'form'));
        $this->load->helper('pagination');

        $this->load->model('Public_relations/Relation');
        $this->load->model('Public_relations/About');
        $this->load->model("Public_relations/News");
        $this->load->model("Public_relations/Main_data");

        $this->success = $this->Relation->select_success();


        $this->footer_news = $this->News->select_all_news();
        $this->mains = $this->Relation->get_main_data();
        $this->main_data = $this->Main_data->select('', '');
        $this->news = $this->News->select(2);


    }

    //----------------------------
    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }

    private function test_r($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";

    }


    //----------------------------
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

    //----------------------------
    private function upload_image($file_name)
    {
        $config['upload_path'] = 'uploads/images';
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf';
        $config['max_size'] = '1024*8';
        $config['encrypt_name'] = true;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($file_name)) {
            //  $error = array('error' => $this->upload->display_errors());
            return false;
        } else {
            $datafile = $this->upload->data();
            $this->thumb($datafile);
            return $datafile['file_name'];
        }
    }

    private function upload_multi_files($file_name)
    {
        $config['upload_path'] = 'uploads/files';
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
        $config['overwrite'] = true;
        $config['encrypt_name'] = true;
        $this->load->library('upload', $config);
        for ($i = 0; $i < count($_FILES[$file_name]['name']); $i++) {
            $_FILES['userfile']['name'] = $_FILES[$file_name]['name'][$i];
            $_FILES['userfile']['type'] = $_FILES[$file_name]['type'][$i];
            $_FILES['userfile']['tmp_name'] = $_FILES[$file_name]['tmp_name'][$i];
            $_FILES['userfile']['error'] = $_FILES[$file_name]['error'][$i];
            $_FILES['userfile']['size'] = $_FILES[$file_name]['size'][$i];
            $this->upload->do_upload();
            $file = $this->upload->data();
            $datafile[] = $file['file_name'];
        }
        return $datafile;
    }

    //----------------------------
    private function message($type, $text)
    {
        if ($type == 'success') {
            return $this->session->set_flashdata('message', '
                        <div class="alert alert-success alert-dismissible">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          <strong>' . $text . '</strong>
                        </div>');
        } elseif ($type == 'wiring') {
            return $this->session->set_flashdata('message', ' <div class="alert alert-warning alert-dismissible">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          <strong>' . $text . '</strong>
                        </div>');
        } elseif ($type == 'error') {
            return $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          <strong>' . $text . '</strong>
                        </div>');
        }
    }

    //----------------------------
    private function upload_file($file_name)
    {
        $config['upload_path'] = 'uploads/files';
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
        $config['max_size'] = '1024*8';
        $config['overwrite'] = true;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($file_name)) {
            //  $error = array('error' => $this->upload->display_errors());
            return false;
        } else {
            $datafile = $this->upload->data();
            return $datafile['file_name'];
        }
    }

    //----------------------------
    private function url()
    {
        unset($_SESSION['url']);
        $this->session->set_flashdata('url', 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
    }

    //----------------------------
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



    public function person_main_data($mother_num)
    {

        $data['subview'] = 'web/profile/mother_data';

        $this->load->view('web_index', $data);
    }

    public function person_data($user_name)
    {
        $this->load->model("familys_models/web_model/Register_web");
        $data['mother_num']= $this->Register_web->get_mother_num($user_name);

        $data['subview'] = 'web/profile/main_data';

        $this->load->view('web_index',$data);
    }


    public function mother($mother_num)
    {

        $this->load->model('familys_models/Mother');
        $this->load->model('familys_models/web_model/Mother_web');
        $this->load->model('familys_models/web_model/Father_web');
        $this->load->model('Difined_model');
        $this->load->model("familys_models/Register");
        $this->load->model('Difined_model_new');

        $data['arr_deth'] = $this->Mother_web->get_from_family_setting(25);

        $data['nationality'] = $this->Mother_web->get_from_family_setting(2);
        $data['living_place_array'] = $this->Mother_web->get_from_family_setting(5);
        $data['national_id_array'] = $this->Mother_web->get_from_family_setting(1);
        $data['health_status_array'] = $this->Mother_web->get_from_family_setting(6);
        $data['education_level_array'] = $this->Mother_web->get_from_family_setting(8);
        $data['job_titles'] = $this->Mother_web->get_from_family_setting(3);
        $data['arr_ed_state'] = $this->Mother->get_from_family_setting(40);
        $data['marital_status_array'] = $this->Mother_web->get_from_family_setting(4);
        $data["person_type"] = $this->Difined_model->select_search_key('family_setting', 'type', 32);
        $data["relationships"] = $this->Difined_model->select_search_key('family_setting', 'type', 34);
        $data["id_source"] = $this->Difined_model->select_search_key('family_setting', 'type', 38);
        $data["diseases"] = $this->Difined_model->select_search_key('family_setting', 'type', 35);
        $data["responses"] = $this->Difined_model->select_search_key('family_setting', 'type', 36);
        $data["diseases_status"] = $this->Difined_model->select_search_key('family_setting', 'type', 37);

        $data['women_houses'] = $this->Difined_model->select_search_key('family_setting', 'type', 44);
        $data["person_type"] = $this->Difined_model->select_search_key('family_setting', 'type', 32);
        $data['banks'] = $this->Difined_model->select_all('banks', '', '', "id", "asc");
        $data['specialties'] = $this->Mother_web->get_from_family_setting(45);
    //    $data['person_account']= $this->Mother_web->get_person_account($mother_num);
        $data['person_account'] = $this->Mother_web->getBasicAccount($this->uri->segment(3));
        $data['agent_bank_account'] = $this->Mother_web->getBasicAccount_agent($this->uri->segment(3));
        $data['mother_last_account'] = $this->Mother_web->getMotherAccount($this->uri->segment(3));


        $data['mother'] = $this->Difined_model->select_search_key('mother', 'mother_national_num_fk', $mother_num)[0];
        $data['title']="اضافه بيانات الام";


        if ($this->input->post('register_data_mother')) {
            $this->Mother_web->insert($mother_num);
            redirect('Mother_data/mother/' . $mother_num);
        }
        $data['subview'] = 'web/profile/mother_web';

        $this->load->view('web_index', $data);
    }

    public function father($mother_num)
    {
        $this->load->model('familys_models/Mother');
        $this->load->model('familys_models/web_model/Mother_web');
        $this->load->model('familys_models/web_model/Father_web');
        $this->load->model('Difined_model');
        $this->load->model("familys_models/Register");
        $this->load->model('Difined_model_new');

        $data['arr_deth'] = $this->Mother_web->get_from_family_setting(25);

        $data['nationality'] = $this->Mother_web->get_from_family_setting(2);
        $data['living_place_array'] = $this->Mother_web->get_from_family_setting(5);
        $data['national_id_array'] = $this->Mother_web->get_from_family_setting(1);
        $data['health_status_array'] = $this->Mother_web->get_from_family_setting(6);
        $data['education_level_array'] = $this->Mother_web->get_from_family_setting(8);
        $data['job_titles'] = $this->Mother_web->get_from_family_setting(3);
        $data['arr_ed_state'] = $this->Mother_web->get_from_family_setting(9);
        $data['marital_status_array'] = $this->Mother_web->get_from_family_setting(4);
        $data["person_type"] = $this->Difined_model->select_search_key('family_setting', 'type', 32);
        $data["relationships"] = $this->Difined_model->select_search_key('family_setting', 'type', 34);
        $data["id_source"] = $this->Difined_model->select_search_key('family_setting', 'type', 38);
        $data["diseases"] = $this->Difined_model->select_search_key('family_setting', 'type', 35);
        $data["responses"] = $this->Difined_model->select_search_key('family_setting', 'type', 36);
        $data["diseases_status"] = $this->Difined_model->select_search_key('family_setting', 'type', 37);

        $data['women_houses'] = $this->Difined_model->select_search_key('family_setting', 'type', 44);
        $data["person_type"] = $this->Difined_model->select_search_key('family_setting', 'type', 32);
        $data['banks'] = $this->Difined_model->select_all('banks', '', '', "id", "asc");
        $data['specialties'] = $this->Mother_web->get_from_family_setting(45);
        if ($this->input->post('register_data_father')) {
            $this->Father_web->insert($mother_num);
            redirect('Mother_data/father/' . $mother_num);


        }

        $data['father'] = $this->Difined_model->select_search_key('father', 'mother_national_num_fk', $mother_num)[0];
        $data['title']="اضافه بيانات الاب";

        $data['subview'] = 'web/profile/father_web';


        $this->load->view('web_index', $data);
    }


    public function attach_files($mother_national_num)
    {

        $this->load->model('Difined_model');
        $this->load->model('familys_models/web_model/Attach_files_web');
        $this->load->model('familys_models/Attach_files');
        $data['result'] = $this->Difined_model->select_search_key('family_attach_files', 'mother_national_num_fk', $mother_national_num);
        $data['mothers_data'] = $this->Difined_model->select_search_key('mother', "mother_national_num_fk ", $mother_national_num);
        if ($this->input->post("add")) {
            $files['death_certificate'] = $this->upload_file('death_certificate');
            $files['family_card'] = $this->upload_file('family_card');
            $files['plowing_inheritance'] = $this->upload_file('plowing_inheritance');
            $files['instrument_agency_with_orphans'] = $this->upload_file('instrument_agency_with_orphans');
            $files['birth_certificate'] = $this->upload_file('birth_certificate');
            $files['ownership_housing'] = $this->upload_file('ownership_housing');
            $files['definition_school'] = $this->upload_file('definition_school');
            $files['social_security_card'] = $this->upload_file('social_security_card');
            $files['retirement_department'] = $this->upload_file('retirement_department');
            $files['social_insurance'] = $this->upload_file('social_insurance');
            $files['bank_statement'] = $this->upload_file('bank_statement');
            $files['collected_files'] = $this->upload_file('collected_files');

            $this->Attach_files_web->insert_files($files, $mother_national_num);
            redirect('Mother_data/attach_files/' . $mother_national_num);
            $this->message('success', 'تمت إضافة البيانات بنجاح');

        }
        $data['pdf_active'] = 1;
        $data['title']="اضافه المرفقات";
        $data['mother_national_num'] = $mother_national_num;

        $data['header_title'] = 'رفع الوثائق';

        $data['subview'] = 'web/profile/attach_files_web';
        $this->load->view('web_index', $data);
    }

    public function update_attach_files($mother_national_num)
    {
        $this->load->model('familys_models/web_model/Attach_files_web');
        $data['title']="تعديل المرفقات";
        if ($this->input->post("update")) {
            $files['death_certificate'] = $this->upload_file('death_certificate');
            $files['family_card'] = $this->upload_file('family_card');
            $files['plowing_inheritance'] = $this->upload_file('plowing_inheritance');
            $files['instrument_agency_with_orphans'] = $this->upload_file('instrument_agency_with_orphans');
            $files['birth_certificate'] = $this->upload_file('birth_certificate');
            $files['ownership_housing'] = $this->upload_file('ownership_housing');
            $files['definition_school'] = $this->upload_file('definition_school');
            $files['social_security_card'] = $this->upload_file('social_security_card');
            $files['retirement_department'] = $this->upload_file('retirement_department');
            $files['social_insurance'] = $this->upload_file('social_insurance');
            $files['bank_statement'] = $this->upload_file('bank_statement');
            $files['collected_files'] = $this->upload_file('collected_files');
            $insert_files=array();
            foreach ($files as $key=>$value){
                if(!empty($value)){
                    $insert_files[$key] =$value;
                }
            }
            if(!empty($insert_files)){
                $this->Attach_files_web->update_files($insert_files, $mother_national_num);
            }
            redirect('Mother_data/attach_files/' . $mother_national_num);
            $this->message('success', 'تم تعديل البيانات بنجاح');

        }

    }

    public function downloads($file)
    {
        $this->load->helper('download');
        $name = $file;
        $data = file_get_contents('./uploads/files/' . $file);
        force_download($name, $data);
    }

    public function read_file()
    {
        $this->load->helper('file');
        $file_name = $this->uri->segment(3);
        $file_path = 'uploads/files/' . $file_name;
        header('Content-Type: application/pdf');
        header('Content-Discription:inline; filename="' . $file_name . '"');
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges:bytes');
        header('Content-Length: ' . filesize($file_path));
        readfile($file_path);
    }

    //=============================================
    public function DeleteFile($fild, $mother_national_num)
    {
        $this->load->model('familys_models/web_model/Attach_files_web');
        $data[$fild] = "";
        $this->Attach_files_web->delete_file($mother_national_num, $data);
        //redirect('family_controllers/Family/attach_files/'.$mother_national_num,'refresh');
        redirect('Mother_data/attach_files/' . $mother_national_num);
    }

//==================================================================================================
    public function family_members($mother_national_num)
    {
        $this->load->model("familys_models/web_model/Family_members_web");
        $this->load->model('Difined_model');
        $this->load->model("familys_models/Register");
        $this->load->model('familys_models/web_model/Mother_web');
        $this->load->model('familys_models/Family_print');
        $this->load->model('Difined_model_new');
        $data['father_table'] = $this->Difined_model->select_search_key('father', "mother_national_num_fk ", $mother_national_num);
        $data['mothers_data'] = $this->Difined_model->select_search_key('mother', "mother_national_num_fk ", $mother_national_num);
        $data["cuttent_higry_year"] = $this->current_hjri_year();
        $data['job'] = $this->Mother_web->get_from_family_setting(3);
        $data['member_data'] = $this->Family_members_web->select_all($mother_national_num);
        $data['schools'] = $this->Mother_web->get_from_family_setting(26);
        if ($this->input->post('add')) {
            $member_sechool_img = 'member_sechool_img';
            $member_birth_card_img = 'member_birth_card_img';
            $member_photo = 'member_photo';
            $file['member_sechool_img'] = $this->upload_image($member_sechool_img);
            $file['member_birth_card_img'] = $this->upload_image($member_birth_card_img);
            $file['member_photo'] = $this->upload_image($member_photo);
            $this->Family_members_web->insert($file, $mother_national_num);
            $this->message('success', 'تم إضافة البيانات بنجاح');
            redirect('Mother_data/family_members/' . $mother_national_num);
        }
        if ($this->input->post('main_stage')) {
            $data_load['all_classroom'] = $this->Family_members_web->get_classroom($this->input->post('main_stage'));
            $this->load->view('web/profile/load_class', $data_load);
        } else {
            $data['all_stages'] = $this->Family_members_web->get_classroom(0);
            $data['nationalities'] = $this->Mother_web->get_from_family_setting(2);
            $data['national_num_type'] = $this->Mother_web->get_from_family_setting(1);
            $data['scocial'] = $this->Mother_web->get_from_family_setting(4);
            $data['education_type'] = $this->Mother_web->get_from_family_setting(10);
            $data['member_activity_type_arr'] = $this->Mother_web->get_from_family_setting(11);
            $data['health_status_array'] = $this->Mother_web->get_from_family_setting(6);
            $data['member_home_type_arr'] = $this->Mother_web->get_from_family_setting(5);
            $data['header_title'] = 'بيانات أفراد الاسرة';
            $data['members_active'] = 1;
            $data['mother_national_num'] = $mother_national_num;
            $data['banks'] = $this->Difined_model->select_all('banks_settings', '', '', "id", "asc");
            $data["person_type"] = $this->Difined_model->select_search_key('family_setting', 'type', 32);
            $data["id_source"] = $this->Difined_model->select_search_key('family_setting', 'type', 38);
            $data["education_level"] = $this->Difined_model->select_search_key('family_setting', 'type', 41);
            $data["stude_case"] = $this->Difined_model->select_search_key('family_setting', 'type', 40);
            $data["academic_achievement_level"] = $this->Difined_model->select_search_key('family_setting', 'type', 39);
            $data["relationships"] = $this->Difined_model->select_search_key('family_setting', 'type', 34);
            $data['women_houses'] = $this->Difined_model->select_search_key('family_setting', 'type', 44);
            $data['mother_last_account'] = $this->Mother_web->getMotherAccount($mother_national_num);
            $data['last_account'] = $this->Mother_web->getFamilyAccount($mother_national_num);
            $data['person_account_check'] = $this->Mother_web->getBasicAccount($mother_national_num);
            $data['agent_bank_account_check'] = $this->Mother_web->getBasicAccount_agent($mother_national_num);
            $data["diseases"] = $this->Difined_model->select_search_key('family_setting', 'type', 35);
            $data["responses"] = $this->Difined_model->select_search_key('family_setting', 'type', 36);

            $data["diseases_status"] = $this->Difined_model->select_search_key('family_setting', 'type', 37);
            $data['subview'] = 'web/profile/family_members';
            $this->load->view('web_index', $data);
        }
    }

    public function update_family_members($mother_national_num, $id)
    {
        $this->load->model("familys_models/web_model/Family_members_web");
        $this->load->model('Difined_model');
        $this->load->model("familys_models/Register");
        $this->load->model('familys_models/Mother');
        $this->load->model('familys_models/Family_print');
        $data['title']="اضافه افراد الاسره";
        $data['father_table'] = $this->Difined_model->select_search_key('father', "mother_national_num_fk ", $mother_national_num);
        $data['mothers_data'] = $this->Difined_model->select_search_key('mother', "mother_national_num_fk ", $mother_national_num);
        $data["cuttent_higry_year"] = $this->current_hjri_year();
        $data['job'] = $this->Mother->get_from_family_setting(3);
        $data['result'] = $this->Difined_model->select_search_key('f_members', 'id', $id);
        $data['all_classroom'] = $this->Family_members_web->get_classroom($data['result'][0]->stage_id_fk);
        $data['schools'] = $this->Mother->get_from_family_setting(26);
        if ($this->input->post('update')) {
            $member_sechool_img = 'member_sechool_img';
            $member_birth_card_img = 'member_birth_card_img';
            $member_photo = 'member_photo';
            $file['member_sechool_img'] = $this->upload_image($member_sechool_img);
            $file['member_birth_card_img'] = $this->upload_image($member_birth_card_img);
            $file['member_photo'] = $this->upload_image($member_photo);
            $this->Family_members_web->update_member($id, $file);
            $this->message('success', 'تم تعديل البيانات بنجاح');
            redirect('Mother_data/Family_members/' . $mother_national_num);
        } else {
            $data['father_table'] = $this->Difined_model->select_search_key('father', "mother_national_num_fk ", $mother_national_num);
            $data['all_stages'] = $this->Family_members_web->get_classroom(0);
            $data['nationalities'] = $this->Mother->get_from_family_setting(2);
            $data['national_num_type'] = $this->Mother->get_from_family_setting(1);
            $data['scocial'] = $this->Mother->get_from_family_setting(4);
            $data['education_type'] = $this->Mother->get_from_family_setting(10);
            $data['member_activity_type_arr'] = $this->Mother->get_from_family_setting(11);
            $data['health_status_array'] = $this->Mother->get_from_family_setting(6);
            $data['member_home_type_arr'] = $this->Mother->get_from_family_setting(5);
            $data['members_active'] = 1;
            $data['mother_national_num'] = $mother_national_num;
            $data["person_type"] = $this->Difined_model->select_search_key('family_setting', 'type', 32);
            $data["id_source"] = $this->Difined_model->select_search_key('family_setting', 'type', 38);
            $data["relationships"] = $this->Difined_model->select_search_key('family_setting', 'type', 34);
            $data["education_level"] = $this->Difined_model->select_search_key('family_setting', 'type', 41);
            $data["stude_case"] = $this->Difined_model->select_search_key('family_setting', 'type', 40);
            $data["academic_achievement_level"] = $this->Difined_model->select_search_key('family_setting', 'type', 39);
            $data["relationships_titles"] = $this->Family_print->get_from_family_setting(34);
            $data['mother_last_account'] = $this->Mother->getMotherAccount($mother_national_num);
            $data['last_account'] = $this->Mother->getFamilyAccount($mother_national_num);
            $data['person_account_check'] = $this->Mother->getBasicAccount($mother_national_num);
            $data['agent_bank_account_check'] = $this->Mother->getBasicAccount_agent($mother_national_num);
            $data['women_houses'] = $this->Difined_model->select_search_key('family_setting', 'type', 44);
            $data["diseases"] = $this->Difined_model->select_search_key('family_setting', 'type', 35);
            $data["responses"] = $this->Difined_model->select_search_key('family_setting', 'type', 36);
            $data["diseases_status"] = $this->Difined_model->select_search_key('family_setting', 'type', 37);
            $data['banks'] = $this->Difined_model->select_all('banks_settings', '', '', "id", "asc");
            $data['header_title'] = 'بيانات أفراد الاسرة';
            $data['subview'] = 'web/profile/family_members';
            $this->load->view('web_index', $data);
        }// end  if
    }

//-----------------------------//
    public function delete_member($id, $mother_national_num)
    {
        $this->load->model("Difined_model");
        $Conditions_arr = array("id" => $id);
        $this->Difined_model->delete("f_members", $Conditions_arr);
        $this->message('success', 'تم  حذف البيانات بنجاح');
        redirect('Mother_data/family_members/' . $mother_national_num);
    }

    public function money()
    {
        $this->load->model('familys_models/web_model/Money_web');
        $this->load->model('Difined_model');
        //----------------------
        if ($this->input->post('add') === 'add') {
            $this->load->model("familys_models/web_model/Money_web");
            $this->Money_web->insert($this->uri->segment(3));
            messages('success', 'إضافة مصادر الدخل والإلتزامات');
            redirect('Mother_data/money/' . $this->uri->segment(3));
        }
        //----------------------
        if ($this->input->post('update') === 'update') {
            $this->Money_web->update($this->uri->segment(3));
            messages('success', 'تعديل مصادر الدخل والإلتزامات');
            redirect('Mother_data/money/' . $this->uri->segment(3));
        }
        $data['mothers_data'] = $this->Difined_model->select_search_key('mother', "mother_national_num_fk ", $this->uri->segment(3));

        $data["all_records"] = $this->Money_web->getArray($this->uri->segment(3));
        $data["income_sources"] = $this->Difined_model->select_search_key('family_setting', 'type', 42);
        $data["monthly_duties"] = $this->Difined_model->select_search_key('family_setting', 'type', 43);
        $data['header_title'] = 'البيانات المالية';
        $data['subview'] = 'web/profile/money';
        $this->load->view('web_index', $data);
    }


    public function  house($mother_national_num){
        $this->load->model("familys_models/web_model/House_web");
        $this->load->model('familys_models/House');
        $this->load->model('Department');
        $this->load->model('Difined_model');
        $this->load->model('familys_models/web_model/Mother_web');

        $this->load->library('google_maps');

        $data['all_field']=$this->Difined_model->get_field('houses');
        $data["check_data"]= $this->House_web->getById($mother_national_num);
        $data_in=$data["check_data"];
        $data['area'] = $this->House_web->select_places(0);
        if(isset($data_in) && !empty($data_in) && $data_in !=null) {
            $data['city'] = $this->House_web->select_places($data_in["h_area_id_fk"]);
            $data['centers'] = $this->House_web->select_places($data_in["h_city_id_fk"]);
            $data['village'] = $this->House_web->select_places($data_in["h_center_id_fk"]);
        }

        $data['header_title']='بيانات السكن';
        $data['mother_national_num']=$mother_national_num;
        $data["mother_data"]=$this->Difined_model->getByArray("mother",array("mother_national_num_fk"=>$mother_national_num));
        $data['main_depart']=  $this->Mother_web->get_from_family_setting(12);
        $data['arr_type_house']=  $this->Mother_web->get_from_family_setting(14);
        $data['arr_direct']=  $this->Mother_web->get_from_family_setting(23);
        $data['house_state']=  $this->Mother_web->get_from_family_setting(22);
        $data['house_own']=  $this->Mother_web->get_from_family_setting(13);


        if ($this->input->post('value_id')){
            $id=$this->input->post('value_id');
            $data["records_row"]=$this->House_web->select_places($id);
            $this->load->view('admin/familys_views/load_places',$data);
        }elseif($this->input->post('add') ===  'add'){
            $this->House_web->insert($mother_national_num);
            redirect('Mother_data/house/'.$mother_national_num,'refresh');
        }elseif($this->input->post('update') === 'update'){
            $this->House_web->update( $mother_national_num);
            redirect('Mother_data/house/'.$mother_national_num);
        }else{
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
            if(!empty( $data["check_data"])){
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
            $data['subview'] = 'web/profile/building';
            $this->load->view('web_index', $data);
        }
    }
    //=====================================================================================================
    public function  devices($mother_national_num){ // Mother_data/home_needs
        $this->load->model('familys_models/web_model/Home_needs_web');
        $this->load->model("familys_models/web_model/Devices_web");
        $this->load->model('familys_models/web_model/Mother_web');
        $this->load->model('Difined_model');


        if ($this->input->post('num')){
            $data['id']=$this->input->post('num');
            $data['all'] =$this->Home_needs_web->select_all();
            $data['disabls'] = $this->Home_needs_web->select_disabled();
            $this->load->view('web/profile/devices/get_device',$data);
        }elseif($this->input->post('add')){
            $this->Devices_web->insert($mother_national_num);
            redirect("Mother_data/devices/$mother_national_num",'refresh');
        }else {
            $data['result'] = $this->Devices_web->select_where($mother_national_num);
            $data['mother'] = $this->Mother_web->get_by_mother_national($mother_national_num);
            $data['mothers_data'] = $this->Difined_model->select_search_key('mother', "mother_national_num_fk ", $mother_national_num);
            $data['subview'] = 'web/profile/devices_web';

            $this->load->view('web_index', $data);
        }
    }


    public function delete_device($id,$mother_national_num){ //  Mother_data/delete_device
        $this->load->model("Difined_model");
        $Conditions_arr=array("id"=>$id);
        $this->Difined_model->delete("devices",$Conditions_arr);
        $this->message('success','تم حذف البيانات بنجاح');
        redirect('Mother_data/devices/'.$mother_national_num);
    }

    //______osama_______
    public function  house_needs($mother_national_num)
    {
        $this->load->model('familys_models/web_model/Home_needs_web');
        $this->load->model('Difined_model');
        $this->load->model('familys_models/web_model/Mother_web');
        if ($this->input->post('num')){
            $data['id']=$this->input->post('num');
            $data['all'] =$this->Home_needs_web->select_all();
            $data['disabls'] = $this->Home_needs_web->select_disabled();
            $this->load->view('web/profile/get_house_needs',$data);
        }elseif($this->input->post('add')){
            $this->Home_needs_web->insert($mother_national_num);
            redirect('Mother_data/house_needs/'.$mother_national_num,'refresh');
        }else {
            $data['mother'] = $this->Mother_web->get_by_mother_national($mother_national_num);
            $data['mothers_data'] = $this->Difined_model->select_search_key('mother', "mother_national_num_fk ", $mother_national_num);
            $data['devices'] = $this->Difined_model->select_all('home_needs','','',"id","asc");
            $data['result']=$this->Home_needs_web->select_where($mother_national_num);


            $data['subview'] = 'web/profile/house_needs';

            $this->load->view('web_index',$data);
        }


    }


    public function delete_home_needs($id,$mother_national_num){ //  Mother_data/delete_home_needs
        $this->load->model("Difined_model");
        $Conditions_arr=array("id"=>$id);
        $this->Difined_model->delete("home_needs",$Conditions_arr);
        $this->message('success','تم حذف البيانات بنجاح');
        redirect('Mother_data/house_needs/'.$mother_national_num);
    }


public function check_num()
{
    $num=$this->input->post('valu');
    $type=$this->input->post('type');

    $this->load->model('familys_models/web_model/Mother_web');


    echo $this->Mother_web->get_by_num($num,$type);


}



    //====================================================================================================

}