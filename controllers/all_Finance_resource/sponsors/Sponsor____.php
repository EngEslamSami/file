<?php

class  Sponsor extends MY_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->library('pagination');
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }
        $this->load->model('Difined_model');
        $this->load->model('Nationality');
        $this->load->model('Department');
        $this->load->model('human_resources_model/Employee_model');
        $this->load->helper(array('url', 'text', 'permission', 'form'));
        $this->load->model('familys_models/Model_access_rule');
        $this->load->model('system_management/Groups');

        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in  = $this->Counting->get_basic_in_num();
        $this->files_basic_in  = $this->Counting->get_files_basic_in();
        $this->load->model('human_resources_model/employee_setting/Employee_setting');
        $this->load->model('human_resources_model/Finance_employee_model');
        $this->load->model('all_Finance_resource_models/sponsors/Sponsors_model');
        $this->load->model('Difined_model');

    }

    private function test($data = array())
    {

        echo "<pre>";

        print_r($data);

        echo "</pre>";

        die;

    }


    private function ara_date()
    {

        $nameday = date("l");

        $day = date("d");

        $namemonth = date("m");


        $year = date("Y");

        switch ($nameday) {

            case "Saturday":

                $nameday = "السبت";

                break;

            case "Sunday":

                $nameday = "الأحد";

                break;

            case "Monday":

                $nameday = "الاثنين";

                break;

            case "Tuesday":

                $nameday = "الثلاثاء";

                break;

            case "Wednesday":

                $nameday = "الأربعاء";

                break;

            case "Thursday":

                $nameday = "الخميس";

                break;

            case "Friday":

                $nameday = "الجمعة";

                break;

        }

        switch ($namemonth) {

            case 1:

                $namemonth = "يناير";

                break;

            case 2:

                $namemonth = "فبراير";

                break;

            case 3:

                $namemonth = "مارس";

                break;

            case 4:

                $namemonth = "إبريل";

                break;

            case 5:

                $namemonth = "مايو";

                break;

            case 6:

                $namemonth = "يونيو";

                break;

            case 7:

                $namemonth = "يوليو";

                break;

            case 8:

                $namemonth = "اغسطس";

                break;

            case 9:

                $namemonth = "سبتمبر";

                break;

            case 10:

                $namemonth = "اكتوبر";

                break;

            case 11:

                $namemonth = "نوفمبر";

                break;

            case 12:

                $namemonth = "ديسمبر";

                break;

        }

        return "$nameday $day $namemonth $year";


    }

    /**
     * @param $type     success
     * @param $type     wiring
     * @param $type     error
     */
    private function message($type, $text)
    {

        if ($type == 'success') {

            return $this->session->set_flashdata('message', '<div class="hidden-print alert alert-success alert-dismissible shadow" data-sr="wait 0s, then enter bottom and hustle 100%"><button type="button" class="close pull-left" data-dismiss="alert">×</button><h4 class="text-lg"><i class="fa fa-check icn-xs"></i> تم بنجاح ...</h4><p>' . $text . '!</p></div>');

        } elseif ($type == 'wiring') {

            return $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible" data-sr="wait 0.6s, then enter bottom and hustle 100%"><button type="button" class="close pull-left" data-dismiss="alert">×</button><h4 class="text-lg"><i class="fa fa-exclamation-triangle icn-xs"></i> تحذير هام ...</h4><p>' . $text . '</p></div>');

        } elseif ($type == 'error') {

            return $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" data-sr="wait 0.3s, then enter bottom and hustle 100%"><button type="button" class="close pull-left" data-dismiss="alert">×</button><h4 class="text-lg"><i class="fa fa-exclamation-circle icn-xs"></i> خطآ ...</h4><p>' . $text . '</p></div>');

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

    //////////////////////////////////
    private function upload_file($file_name)
    {

        $config['upload_path'] = 'uploads/files';

        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';

        $config['max_size'] = '1024*8';
        $config['overwrite'] = true;
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload($file_name)) {

            return false;

        } else {

            $datafile = $this->upload->data();

            return $datafile['file_name'];

        }

    }

    ////////////////////end of excel library option
    private function url()
    {
        unset($_SESSION['url']);
        $this->session->set_flashdata('url', 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
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
    ///////////////////////////////

    public function index(){}

    /************************************************************/
    public function addSponsor()	// all_Finance_resource/sponsors/Sponsor/addSponsor
    {
        if($this->input->post('add')){

            $this->Sponsors_model->insert('');
            $this->message('success','إضافة كافل');
            redirect('all_Finance_resource/sponsors/Sponsor/addSponsor','refresh');
        }
        $data['last_id'] = $this->Sponsors_model->select_last_id();
        $data['gender_data'] =$this->Sponsors_model->GetFromEmployees_settings(1);
        $data['nationality'] =$this->Sponsors_model->GetFromEmployees_settings(2);
        $data['dest_card'] =$this->Sponsors_model->GetFromFr_settings(4);
        $data['cities']= $this->Sponsors_model->GetFromFr_settings(6);
        $data['job_role'] = $this->Sponsors_model->GetFromFr_settings(2);
        $data['banks'] = $this->Difined_model->select_all('banks_settings','','',"id","asc");
        $data["current_hijry_year"] = $this->current_hjri_year();
        $data['type_card'] =$this->Sponsors_model->GetFromFr_settings(3);
        $data['employer'] = $this->Sponsors_model->GetFromGeneral_assembly_settings(1);
        $data['activity']= $this->Sponsors_model->GetFromFr_settings(5);
        $data['specialize']= $this->Sponsors_model->GetFromFr_settings(7);
        $data['records']= $this->Sponsors_model->select_all();
        $data['title'] = 'إضافة كافل';
        $data['subview'] = 'admin/all_Finance_resource_views/sponsors/addSponsor';
        $this->load->view('admin_index', $data);
    }


    public function updateSponsor($id)
    {
        if($this->input->post('add')){
            $this->Sponsors_model->insert($id);
            $this->message('success','تعديل كافل');
            redirect('all_Finance_resource/sponsors/Sponsor/addSponsor','refresh');
        }
        $data['gender_data'] =$this->Sponsors_model->GetFromEmployees_settings(1);
        $data['nationality'] =$this->Sponsors_model->GetFromEmployees_settings(2);
        $data['dest_card'] =$this->Sponsors_model->GetFromFr_settings(4);
        $data['cities']= $this->Sponsors_model->GetFromFr_settings(6);
        $data['job_role'] = $this->Sponsors_model->GetFromFr_settings(2);
        $data['banks'] = $this->Difined_model->select_all('banks_settings','','',"id","asc");
        $data["current_hijry_year"] = $this->current_hjri_year();
        $data['type_card'] =$this->Sponsors_model->GetFromFr_settings(3);
        $data['employer'] = $this->Sponsors_model->GetFromGeneral_assembly_settings(1);

        $data['activity']= $this->Sponsors_model->GetFromFr_settings(5);
        $data['specialize']= $this->Sponsors_model->GetFromFr_settings(7);
        $data['result']= $this->Sponsors_model->getById($id)[0];

        $data['title'] = 'تعديل كافل';
        $data['subview'] = 'admin/all_Finance_resource_views/sponsors/addSponsor';
        $this->load->view('admin_index', $data);
    }

    
    public function delete_sponsor($id)
    {
        $this->Sponsors_model->delete($id);
        $this->message('success',' تم حذف  كافل بنجاح');
        redirect('all_Finance_resource/sponsors/Sponsor/addSponsor','refresh');
    }
    /************************************************************/
}//END CLASS
