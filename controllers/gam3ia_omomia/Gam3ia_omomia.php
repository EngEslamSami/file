<?php

/**
 * Created by PhpStorm.
 * User: nnnnn
 * Date: 29/07/2019
 * Time: 01:07 م
 */

class Gam3ia_omomia extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
//        if ($this->session->userdata('is_logged_in') == 0) {
//        redirect('gam3ia_omomia/Gam3ia_omomia/login');
//    }
        $this->load->model('gam3ia_omomia/Gam3ia_omomia_model');
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

    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }

   /* private function upload_image($file_name, $folder = '')
    {
        if (!empty($folder)) {
            $config['upload_path'] = 'uploads/' . $folder;
        } else {
            $config['upload_path'] = 'uploads/md/gam3ia_omomia_members';
        }
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf';
        $config['max_size'] = '1024*8';
        $config['encrypt_name'] = true;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($file_name)) {
            return false;
        } else {
            $datafile = $this->upload->data();
            return $datafile['file_name'];
        }
    }*/
    private function upload_image($file_name, $folder = '')
    {
        if (!empty($folder)) {
            $config['upload_path'] = 'uploads/' . $folder;
        } else {
            $config['upload_path'] = 'uploads/md/gam3ia_omomia_members';
        }
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
        $config['max_size'] = '1024*8';
        $config['encrypt_name'] = true;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($file_name)) {
            return false;
        } else {
            $datafile = $this->upload->data();
            return $datafile['file_name'];
        }
    }

    public function messages($type, $text, $method = false)
    {
        $CI =& get_instance();
        $CI->load->library("session");
        if ($type == 'success') {
            return $CI->session->set_flashdata('message', '<script> swal({
                    title:"' . $text . '" ,
                    confirmButtonText: "تم"
                })</script>');
        } elseif ($type == 'warning') {
            return $CI->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>   !</strong> ' . $text . '.</div>');
        } elseif ($type == 'error') {
            return $CI->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> !</strong> ' . $text . '.</div>');
        }

    }

    public function index()
    {
//gam3ia_omomia/Gam3ia_omomia
        $id = $_SESSION['memb_id_fk'];
        $data['records'] = $this->Gam3ia_omomia_model->select_all();

        $data['result'] = $this->Gam3ia_omomia_model->getById($id)[0];

        $data["current_hijry_year"] = $this->current_hjri_year();
        $data['gender_data'] = $this->Gam3ia_omomia_model->GetFromEmployees_settings(1);
        $data['nationality'] = $this->Gam3ia_omomia_model->GetFromEmployees_settings(2);

        $data['social_status'] = $this->Gam3ia_omomia_model->GetFromEmployees_settings(4);
        $data['dest_card'] = $this->Gam3ia_omomia_model->GetFromEmployees_settings(6);
        $data['cities'] = $this->Gam3ia_omomia_model->select_areas();
        $data['ahais'] = $this->Gam3ia_omomia_model->select_residentials();
        $data['membership_arr'] = $this->Gam3ia_omomia_model->GetFromGeneral_assembly_settings(2);
        $data['Degree'] = $this->Gam3ia_omomia_model->GetFromEmployees_settings(14);
        $data['science_qualification'] = $this->Gam3ia_omomia_model->GetFromEmployees_settings(15);
        $data['employer'] = $this->Gam3ia_omomia_model->GetFromGeneral_assembly_settings(1);
        $data['job_role'] = $this->Gam3ia_omomia_model->GetFromGeneral_assembly_settings(3);
        $data['surname_arr'] = $this->Gam3ia_omomia_model->GetFromGeneral_assembly_settings(4);

        /********************** counts    *******************************/
        $data['gam3ia_omomia'] = $this->Gam3ia_omomia_model->get_count('md_all_gam3ia_omomia_members', array());
        $data['gam3ia_omomia_active'] = $this->Gam3ia_omomia_model->get_count('md_all_gam3ia_omomia_odwiat', array('odwia_status_fk' => 1));
        $data['gam3ia_omomia_not_active'] = $this->Gam3ia_omomia_model->get_count('md_all_gam3ia_omomia_odwiat', array('odwia_status_fk' => 0));
        $data['gam3ia_omomia_1'] = $this->Gam3ia_omomia_model->get_count('md_all_gam3ia_omomia_odwiat', array('no3_odwia_fk' => 102));
        $data['gam3ia_omomia_2'] = $this->Gam3ia_omomia_model->get_count('md_all_gam3ia_omomia_odwiat', array('no3_odwia_fk' => 103));
        $data['gam3ia_omomia_3'] = $this->Gam3ia_omomia_model->get_count('md_all_gam3ia_omomia_odwiat', array('no3_odwia_fk' => 106));


        $data['emp_count'] = $this->Gam3ia_omomia_model->get_count('employees', array('employee_type' => 1));
        $data['edara_count'] = $this->Gam3ia_omomia_model->get_count('department_jobs', array('from_id_fk' => 0));
        $data['qsm_count'] = $this->Gam3ia_omomia_model->get_count('department_jobs', array('from_id_fk !=' => 0));
        $data['sponsor_count'] = $this->Gam3ia_omomia_model->get_count('fr_sponsor', array('halat_kafel_id' => 7));
        $data['donor_count'] = $this->Gam3ia_omomia_model->get_count('fr_donor', array('halat_donor_id' => 7));
        $data['all_emp'] = $this->Gam3ia_omomia_model->get_all_emp();
        $data['GetAll'] = $this->Gam3ia_omomia_model->GetAll();


        $data['orders'] = $this->Gam3ia_omomia_model->get_arf_orders();
        $data['person_data'] = $this->Gam3ia_omomia_model->get_by_member_id($_SESSION['memb_id_fk'], 'id', 'md_all_gam3ia_omomia_members');
        $data['odwia_data'] = $this->Gam3ia_omomia_model->get_by_member_id($_SESSION['memb_id_fk'], 'member_id_fk', 'md_all_gam3ia_omomia_odwiat');

/************************************************************/

 $data['all_files'] = $this->Gam3ia_omomia_model->get_all_files();
 $data['all_files_active'] = $this->Gam3ia_omomia_model->get_all_files_active();
 $data['all_files_non_active'] = $this->Gam3ia_omomia_model->get_all_files_non_active();
 $data['all_talabat'] = $this->Gam3ia_omomia_model->get_all_talabat();
 $data['all_mostafed'] = $this->Gam3ia_omomia_model->get_mostafed();
 $data['all_yatem'] = $this->Gam3ia_omomia_model->get_yatem();
 $data['all_mother_num'] = $this->Gam3ia_omomia_model->get_mother_num();
 
 /*************************************************************/

        $data['subview'] = 'gam3ia_omomia/gam3ia_omomia_profile';
        $this->load->view('gam3ia_index', $data);
//        $this->load->view('', $data);
    }

    public function login() //gam3ia_omomia/Gam3ia_omomia/login
    {
        $data['title'] = "تسجيل الدخول";

        $this->load->view('gam3ia_omomia/login_page');

    }

    public function do_login() //Gam3ia_omomia/do_login
    {

        $login = $this->Gam3ia_omomia_model->check_login();

        if ((!empty($login))) {


            $sess = $this->session->set_userdata($login);


            redirect('gam3ia_omomia/Gam3ia_omomia', 'refresh');
        } else {
            $sess = $this->session->set_userdata($login);

            //  $data['message'] = 'البيانات غير صحيحه ';
            $this->session->set_flashdata('message2', 'البيانات غير صحيحه');
            //$data['subview'] = 'admin/public_relations/website/assembley_members/login_page';
            //$this->load->view('web_home_index', $data);
            redirect('gam3ia_omomia/Gam3ia_omomia/login', 'refresh');

        }
    }

   /* public function update_gam3ia_member($id)
    {

        if ($this->input->post('save')) {
            $member_img = 'mem_img';
            $card_img = 'card_img';
            $file['mem_img'] = $this->upload_image($member_img);
            $file['card_img'] = $this->upload_image($card_img);
            $this->Gam3ia_omomia_model->update($file, $id);
            $this->messages('success', ' تمت تعديل البيانات بنجاح');
            redirect('gam3ia_omomia/Gam3ia_omomia', 'refresh');
        }
    }*/
    
       public function update_gam3ia_member($id)
    {

        if ($this->input->post('save')) {
            $member_img = 'mem_img';
            $card_img = 'card_img';
            $file['mem_img'] = $this->upload_image($member_img);
            $file['card_img'] = $this->upload_image($card_img);
            $this->Gam3ia_omomia_model->update($file, $id);
            $this->messages('success', ' تمت تعديل البيانات بنجاح');
            redirect('gam3ia_omomia/Gam3ia_omomia', 'refresh');
        }elseif ($this->input->post('note_save')){
            $this->Gam3ia_omomia_model->update_note($id);
            $this->messages('success', ' تمت ارسال ملاحظات  بنجاح');
            redirect('gam3ia_omomia/Gam3ia_omomia', 'refresh');
        }
    }


    public function get_gam3ia_omomia_member()
    {
        $records = $this->Gam3ia_omomia_model->select_all();
//        $this->test($records);
        $arr_records = array();
        $arr_records['data'] = array();

        if (!empty($records)) {
            $x = 1;
            foreach ($records as $row_records) {

                $arr_records['data'][] = array(
                    $x++,
                    $row_records->odwiat->rkm_odwia_full,
                    $row_records->laqb_title . '/' . $row_records->name,
                    $row_records->card_num,
                    $row_records->jwal,
                    $row_records->odwiat->no3_odwia_title,
                    $row_records->odwiat->odwia_status_title,
                    ''


                );
            }
        }
        echo json_encode($arr_records);


    }


        public function logout(){

          $this->session->sess_destroy();
            redirect('gam3ia_omomia/Gam3ia_omomia/login', 'refresh');
    }
/************************************************/


  public function get_all_da3wat()
    {

        if ($_SESSION['memb_id_fk']) {
            $data['all_da3wat'] = $this->Gam3ia_omomia_model->get_all_da3wat();
        }
        $this->load->view('gam3ia_omomia/da3wat_gam3ia_omomia_view', $data);

    }


    public function dawa_reply()
    {

//        $this->test($_POST);
        if($_POST['svae_dawa']){
            $file = $this->upload_image('mofawad_moefaq','md/da3wat_gam3ia_omomia');
            $this->Gam3ia_omomia_model->dawa_reply($file);
            $this->messages('success', ' تمت  ارسال الرد  بنجاح');
            redirect('gam3ia_omomia/Gam3ia_omomia', 'refresh');
        }
    }
    
    
  public function downloads($file)  //gam3ia_omomia/Gam3ia_omomia/downloads/
{
    $this->load->helper('download');
    $name = $file;
    $data = file_get_contents('./uploads/files/' . $file);
    force_download($name, $data);
}  
    
    public function show_mahdr()
{

    $this->load->model('md/da3wat_gam3ia_omomia/Da3wat_gam3ia_omomia_model');
    if (isset($_SESSION['memb_id_fk'])) {
        $id = $_SESSION['memb_id_fk'];
    } else {
        $id = 0;
    }
    $data['result'] = $this->Da3wat_gam3ia_omomia_model->getAllDetails(array('mem_id_fk' => $id));

    if (!empty($data['result'])) {
        $data['mhawer'] = $this->Da3wat_gam3ia_omomia_model->get_mhawer($data['result']->galsa_rkm);
    }
    if ($_SESSION['memb_id_fk']) {
            $data['all_da3wat'] = $this->Gam3ia_omomia_model->get_all_da3wat();
        }
    // $this->load->view('admin/md/da3wat_gam3ia_omomia/getDetailsDiv', $data);
    $this->load->view('gam3ia_omomia/getDetailsDiv', $data);

}
}