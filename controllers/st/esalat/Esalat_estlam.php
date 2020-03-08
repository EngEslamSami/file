<?php

class  Esalat_estlam extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }
        $this->load->model('Difined_model');
        $this->load->model("st/esalat/Esalat_estlam_model");
        $this->load->model('st/ezn_edafa_model/Ezn_edafa_model');


        $this->load->helper(array('url', 'text', 'permission', 'form'));
        $this->load->model('familys_models/Model_access_rule');
        $this->load->model('system_management/Groups');

        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in = $this->Counting->get_basic_in_num();
        $this->files_basic_in = $this->Counting->get_files_basic_in();

    }
    
    
        private function upload_all_file($file_name)
    {
        $config['upload_path'] = 'uploads/st/esalat_estlam';
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
        $config['max_size'] = '100000000';
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

    private function test($data = array())
    {

        echo "<pre>";

        print_r($data);

        echo "</pre>";

        die;

    }

    public function convert_number($number)
    {

        if (($number < 0) || ($number > 999999999999)) {
            throw new Exception("العدد خارج النطاق");
        }
        $return = "";
        //convert number into array of (string) number each case
        // -------number: 121210002876-----------//
        // 	0		1		2		3  //
        //'121'	  '210'	  '002'	  '876'
        $english_format_number = number_format($number);
        $array_number = explode(',', $english_format_number);
        //convert each number(hundred) to arabic
        for ($i = 0; $i < count($array_number); $i++) {
            $place = count($array_number) - $i;
            $return .= $this->convert($array_number[$i], $place);
            if (isset($array_number[($i + 1)]) && $array_number[($i + 1)] > 0) $return .= ' و';
        }
        return $return;
    }

    private function convert($number, $place)
    {
        // take in charge the sex of NUMBERED
        $sex = 'female';
        //the number word in arabic for masculine and feminine
        $words = array(
            'male' => array(
                '0' => '', '1' => 'واحد', '2' => 'اثنان', '3' => 'ثلاثة', '4' => 'أربعة', '5' => 'خمسة',
                '6' => 'ستة', '7' => 'سبعة', '8' => 'ثمانية', '9' => 'تسعة', '10' => 'عشرة',
                '11' => 'أحد عشر', '12' => 'إثني عشر', '13' => 'ثلاثة عشر', '14' => 'أربعة عشر', '15' => 'خمس عشر',
                '16' => 'ستة عشر', '17' => 'سبعة عشر', '18' => 'ثمانية عشر', '19' => 'تسعة عشر', '20' => 'عشرون',
                '30' => 'ثلاثون', '40' => 'أربعون', '50' => 'خمسون', '60' => 'ستون', '70' => 'سبعون',
                '80' => 'ثمانون', '90' => 'تسعون', '100' => 'مائة', '200' => 'مائتان', '300' => 'ثلاثمائة', '400' => 'أربعمائة',
                '500' => 'خمسمائة',
                '600' => 'ستمائة', '700' => 'سبعمائة', '800' => 'ثمانمائة', '900' => 'تسعمائة'
            ),
            'female' => array(
                '0' => '', '1' => 'واحد', '2' => 'اثنتان', '3' => 'ثلاثة', '4' => 'أربعة', '5' => 'خمسة',
                '6' => 'ستة', '7' => 'سبعة', '8' => 'ثمانية', '9' => 'تسعة', '10' => 'عشرة',
                '11' => 'إحدى عشرة', '12' => 'إثني عشر', '13' => 'ثلاث عشرة', '14' => 'أربع عشرة', '15' => 'خمسة عشرة',
                '16' => 'ستة عشرة', '17' => 'سبعة عشرة', '18' => 'ثمانية عشرة', '19' => 'تسعة عشرة', '20' => 'عشرون',
                '30' => 'ثلاثون', '40' => 'أربعون', '50' => 'خمسون', '60' => 'ستون', '70' => 'سبعون',
                '80' => 'ثمانون', '90' => 'تسعون', '100' => 'مائة', '200' => 'مائتان', '300' => 'ثلاثمائة', '400' => 'أربعمائة',
                '500' => 'خمسمائة',
                '600' => 'ستمائة', '700' => 'سبعمائة', '800' => 'ثمانمائة', '900' => 'تسعمائة'
            )
        );
        //take in charge the different way of writing the thousands and millions ...
        $mil = array(
            '2' => array('1' => 'ألف', '2' => 'ألفان', '3' => 'آلاف'),
            '3' => array('1' => 'مليون', '2' => 'مليونان', '3' => 'ملايين'),
            '4' => array('1' => 'مليار', '2' => 'ملياران', '3' => 'مليارات')
        );

        $mf = array('1' => $sex, '2' => 'male', '3' => 'male', '4' => 'male');
        $number_length = strlen((string)$number);
        if ($number == 0) return '';
        /*else if ($number[0] == 0) {
            if ($number[1] == 0) $number = (int)substr($number, -1);
            else $number = (int)substr($number, -2);
        }*/
        
           else if ($number[0] == 0) {
            if ($number[1] == 0) {
                $number = (int)substr($number, -1);
                $number = (string)$number;
                $number_length = strlen((string)$number);

            } else {
                $number = (int)substr($number, -2);
                $number = (string)$number;
                $number_length = strlen((string)$number);
            }
        }
        switch ($number_length) {
            case '1':
                {
                    switch ($place) {
                        case '1':
                            {
                                $return = $words[$mf[$place]][$number];
                            }
                            break;
                        case '2':
                            {

                                if ($number == 1) $return = 'ألف';
                                else if ($number == 2) $return = 'ألفان';
                                else {
                                    $return = $words[$mf[$place]][$number] . ' آلاف';
                                }
                            }
                            break;
                        case '3':
                            {
                                if ($number == 1) $return = 'مليون';
                                else if ($number == 2) $return = 'مليونان';
                                else $return = $words[$mf[$place]][$number] . ' ملايين';
                            }
                            break;
                        case '4':
                            {
                                if ($number == 1) $return = 'مليار';
                                else if ($number == 2) $return = 'ملياران';
                                else $return = $words[$mf[$place]][$number] . ' مليارات';
                            }
                            break;
                    }
                }
                break;
            case '2':
                {
                    if (isset($words[$mf[$place]][$number])) $return = $words[$mf[$place]][$number];
                    else {
                        $twoy = $number[0] * 10;
                        $ony = $number[1];
                        $return = $words[$mf[$place]][$ony] . ' و' . $words[$mf[$place]][$twoy];
                    }
                    switch ($place) {
                        case '2':
                            {
                                $return .= ' ألف';
                            }
                            break;
                        case '3':
                            {
                                $return .= ' مليون';
                            }
                            break;
                        case '4':
                            {
                                $return .= ' مليار';
                            }
                            break;
                    }
                }
                break;
            case '3':
                {
                    if (isset($words[$mf[$place]][$number])) {
                        $return = $words[$mf[$place]][$number];
                        if ($number == 200) $return = 'مائتان';
                        switch ($place) {
                            case '2':
                                {
                                    $return .= ' ألف';
                                }
                                break;
                            case '3':
                                {
                                    $return .= ' مليون';
                                }
                                break;
                            case '4':
                                {
                                    $return .= ' مليار';
                                }
                                break;
                        }
                        return $return;
                    } else {
                        $threey = $number[0] * 100;
                        if (isset($words[$mf[$place]][$threey])) {
                            $return = $words[$mf[$place]][$threey];
                        }
                        $twoyony = $number[1] * 10 + $number[2];
                        if ($twoyony == 2) {
                            switch ($place) {
                                case '1':
                                    $twoyony = $words[$mf[$place]]['2'];
                                    break;
                                case '2':
                                    $twoyony = 'ألفان';
                                    break;
                                case '3':
                                    $twoyony = 'مليونان';
                                    break;
                                case '4':
                                    $twoyony = 'ملياران';
                                    break;
                            }
                            if ($threey != 0) {
                                $twoyony = 'و' . $twoyony;
                            }
                            $return = $return . ' ' . $twoyony;
                        } else if ($twoyony == 1) {
                            switch ($place) {
                                case '1':
                                    $twoyony = $words[$mf[$place]]['1'];
                                    break;
                                case '2':
                                    $twoyony = 'ألف';
                                    break;
                                case '3':
                                    $twoyony = 'مليون';
                                    break;
                                case '4':
                                    $twoyony = 'مليار';
                                    break;
                            }
                            if ($threey != 0) {
                                $twoyony = 'و' . $twoyony;
                            }
                            $return = $return . ' ' . $twoyony;
                        } else {
                            if (isset($words[$mf[$place]][$twoyony])) $twoyony = $words[$mf[$place]][$twoyony];
                            else {
                                $twoy = $number[1] * 10;
                                $ony = $number[2];
                                $twoyony = $words[$mf[$place]][$ony] . ' و' . $words[$mf[$place]][$twoy];
                            }
                            if ($twoyony != '' && $threey != 0) $return = $return . ' و' . $twoyony;
                            switch ($place) {
                                case '2':
                                    {
                                        $return .= ' ألف';
                                    }
                                    break;
                                case '3':
                                    {
                                        $return .= ' مليون';
                                    }
                                    break;
                                case '4':
                                    {
                                        $return .= ' مليار';
                                    }
                                    break;
                            }
                        }
                    }
                }
                break;
        }
        return $return;
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

            return $this->session->set_flashdata('message', '<script> swal({
                    title:"' . $text . '" ,
                    confirmButtonText: "تم"
                })</script>');

        } elseif ($type == 'wiring') {

            return $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible" data-sr="wait 0.6s, then enter bottom and hustle 100%"><button type="button" class="close pull-left" data-dismiss="alert">×</button><h4 class="text-lg"><i class="fa fa-exclamation-triangle icn-xs"></i> تحذير هام ...</h4><p>' . $text . '</p></div>');

        } elseif ($type == 'error') {

            return $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" data-sr="wait 0.3s, then enter bottom and hustle 100%"><button type="button" class="close pull-left" data-dismiss="alert">×</button><h4 class="text-lg"><i class="fa fa-exclamation-circle icn-xs"></i> خطآ ...</h4><p>' . $text . '</p></div>');

        }

    }



    private function thumb($data)

    {
        $this->load->library('image_lib');

        $config['image_library'] = 'gd2';

        $config['source_image'] = $data['full_path'];

        //$config['new_image'] = 'uploads/thumbs/' . $data['file_name'];
        $config['new_image'] = 'uploads/st/esalat_estlam/thumbs/' . $data['file_name'];
        $config['create_thumb'] = TRUE;

        $config['maintain_ratio'] = TRUE;

        $config['thumb_marker'] = '';

        $config['width'] = 275;

        $config['height'] = 250;

        $this->image_lib->initialize($config);
        $this->image_lib->resize();
        $this->image_lib->resize();

    }


    private function upload_muli_image($input_name, $folder)
    {
        if (!empty($_FILES[$input_name]['name'])) {
            $filesCount = count($_FILES[$input_name]['name']);
            for ($i = 0; $i < $filesCount; $i++) {
                $_FILES['userFile']['name'] = $_FILES[$input_name]['name'][$i];
                $_FILES['userFile']['type'] = $_FILES[$input_name]['type'][$i];
                $_FILES['userFile']['tmp_name'] = $_FILES[$input_name]['tmp_name'][$i];
                $_FILES['userFile']['error'] = $_FILES[$input_name]['error'][$i];
                $_FILES['userFile']['size'] = $_FILES[$input_name]['size'][$i];
                $all_img[] = $this->upload_image("userFile", $folder);
            }
            return $all_img;
        }
    }

    private function upload_image($file_name, $folder)
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
            //$this->thumb($datafile);
            return $datafile['file_name'];
        }
    }


//    9-4-om
 /*   private function upload_file($file_name, $folder)
    {
        $config['upload_path'] = 'uploads/' . $folder;
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
*/
	 private function upload_file($file_name, $folder)
    {
        $config['upload_path'] = 'uploads/' . $folder;
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
        $config['encrypt_name'] = true;
        $config['max_size'] = '100000000000000000000000000000000000000000000';
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload($file_name)) {

            return false;

        } else {
            $datafile = $this->upload->data();
            $this->thumb($datafile);
            return $datafile['file_name'];

        }

    }

    private function url()
    {
        unset($_SESSION['url']);
        $this->session->set_flashdata('url', 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
    }

    private function current_hjri_date()
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
        $NowDate = "" . $HDays . "/" . $HMonths . "/" . $HYear . " ";

        return $NowDate;
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

    ///////////////////////////////


    public function addesal()
    {    // st/esalat/Esalat_estlam/addesal


        $data['projects'] = $this->Esalat_estlam_model->get_projects();

//devices_points
        if ($this->input->post('save') != '') {


            $id = $this->uri->segment(5);
          //  $file = $this->upload_file("morfaq", "st/esalat_estlam");
  /*           $file = $this->upload_muli_file("morfaq");
            if (!empty($file)) {
                $file = $file;
            } else {
                $file = '';
            }
*/
          // $this->test($_POST);
            $last_id_print = $this->Esalat_estlam_model->insert($id);
            $this->message('success', 'تم بنجاح إضافة  بيانات الإيصال');

            $IIID = $this->input->post('esal_num');

            if ($this->input->post('save') === 'save') {
                redirect('st/esalat/Esalat_estlam/addesal', 'refresh');
            } elseif ($this->input->post('save') === 'print_esal') {
                redirect('st/esalat/Esalat_estlam/Print_esal2/' . $IIID, 'refresh');
            } elseif ($this->input->post('save') === 'print_kafel') {
                redirect('st/esalat/Esalat_estlam/Print_esal2/' . $IIID . '?type=kafel', 'refresh');
            }

        } else {
            $id = $this->uri->segment(5);
            if (!empty($id)) {

                $data['result'] = $this->Esalat_estlam_model->select_all_by_st_esalat_estlam(array('id' => $id))[0];

//$this->test($data['result']);
                if (!empty($data['result'])) {
                    $number = number_format((float)$data['result']->value, 2, '.', '');


                    if (strpos($number, '.') !== false) {
                        $val = explode('.', $number);
                        $integer = $this->convert_number($val[0]);
                        $float = $this->convert_number(round($val[1]));
                        if (!empty(round($val[1]))) {
                            $data['ArabicNum'] = $integer . " " . "ريال و" . $float . " " . "هللة فقط لا غير";
                            $data['value'] = $number;
                        } else {
                            $data['ArabicNum'] = $integer . " " . "ريال " . " فقط لا غير";
                            $data['value'] = $val[0];

                        }
                    } else {
                        $title = $this->convert_number($number);
                        $data['title'] = $title . " " . "ريال فقط لا غير";
                        $data['value'] = $number;
                    }


                    $data['erad_tbro3_arr'] = $this->Esalat_estlam_model->select_st_bnod_setting_by_condition(
                        array('fe2a' => 0, 'band' => 0, 'erad_tabro3' => 0, 'esal' => $data['result']->esal_type));

                    $data['fe2a_type_arr'] = $this->Esalat_estlam_model->select_st_bnod_setting_by_condition(
                        array('fe2a' => 0, 'band' => 0, 'erad_tabro3' => $data['result']->erad_type));

                    $data['bnd_type_arr'] = $this->Esalat_estlam_model->select_st_bnod_setting_by_condition(
                        array('type' => 4, 'fe2a' => $data['result']->fe2a_type1));


                    $data['fe2a_type_arr2'] = $this->Esalat_estlam_model->select_st_bnod_setting_by_condition(
                        array('fe2a' => 0, 'band' => 0, 'erad_tabro3' => $data['result']->erad_type));

                    $data['bnd_type_arr2'] = $this->Esalat_estlam_model->select_st_bnod_setting_by_condition(
                        array('fe2a' => $data['result']->fe2a_type2));
                    $data['bnd_type_arr3'] = $this->Esalat_estlam_model->select_st_bnod_setting_by_condition(
                        array('fe2a' => $data['result']->fe2a_type3));
                    $data['bnd_type_arr4'] = $this->Esalat_estlam_model->select_st_bnod_setting_by_condition(
                        array('fe2a' => $data['result']->fe2a_type4));


                    $data['bank_accounts_arr'] = $this->Esalat_estlam_model->select_all_by_condition(
                        array('society_main_banks_account.bank_id_fk' => $data['result']->bank_id_fk), '');

                    $data['eda3_data'] = $this->Esalat_estlam_model->select_all_by_condition(
                        array('type' => 2, 'society_main_banks_account.bank_id_fk' => $data['result']->bank_id_fk, 'society_main_banks_account.account_id_fk' => $data['result']->bank_account_id_fk), '');

                    // $this->test($data['eda3_data']);
                    $data['all_data'] = $this->Esalat_estlam_model->select_all_by_DeviceData(array('fr_devices_points.device_id_fk' => $data['result']->device_num), 'bank_id_fk');
                    $data['bank_account_code_shabka_arr'] = $this->Esalat_estlam_model->select_all_by_condition(
                        array('type' => 2, 'society_main_banks_account.bank_id_fk' => $data['result']->bank_id_fk,
                            'society_main_banks_account.account_id_fk' => $data['result']->bank_account_id_fk), '');

//                    $this->test($data);
                }

                if ($_SESSION['role_id_fk'] == 3) {
                    $data['gathering_emp_id'] = $this->Esalat_estlam_model->slect_where('fr_gathering_place', array('emp_id_fk' => $_SESSION['emp_code']))['gathering_place_id_fk'];
                    $data['raqm_deveice_emp'] = $this->Esalat_estlam_model->slect_where('fr_devices_points_emp', array('emp_id' => $_SESSION['emp_code']));
                    if (!empty($data['raqm_deveice_emp']['device_id_fk'])) {

                        $data['shabka_banks_data'] = $this->Esalat_estlam_model->select_all_by_DeviceData(
                            array('fr_devices_points.device_id_fk' => $data['raqm_deveice_emp']['device_id_fk']), 'bank_id_fk')[0];

                    }

                }

            }


            $data['bank_brach'] = $this->Esalat_estlam_model->GetFrom_fr_settings(16);

            $data['username'] = $this->Esalat_estlam_model->getUserName($_SESSION['user_id']);
            $data['all_banks'] = $this->Esalat_estlam_model->select_all_by_condition(array("society_main_banks_account.type" => 2), "society_main_banks_account.bank_id_fk");
            $data['markz'] = $this->Difined_model->select_search_key('employees_settings', 'type', 17);
            $data['banks'] = $this->Difined_model->select_all('banks_settings', '', '', "id", "asc");
            $data['gathering_place'] = $this->Esalat_estlam_model->GetFrom_fr_settings(14);
            $data['fe2a_types'] = $this->Difined_model->select_all('fr_sponser_donors_setting', '', '', "", "");
            $data['society_main_banks_account_arr'] = $this->Difined_model->select_search_key('society_main_banks_account', 'type', 1);
            $data['all_society_main_banks_account'] = $this->Difined_model->select_search_key('society_main_banks_account', 'type', 2);
            $data['titles'] = $this->Esalat_estlam_model->GetFrom_fr_settings(8);
            $data['people_arr'] = $this->Esalat_estlam_model->select_all_by_st_esalat_estlam(array('person_type' => 0));
            $data['last_id'] = $this->Esalat_estlam_model->select_last_id();
            $data['greetings'] = $this->Esalat_estlam_model->GetFrom_fr_settings(9);
            //   $data['devices_points'] = $this->Difined_model->select_all('fr_devices_points','','',"","");

            $data['devices_points'] = $this->Esalat_estlam_model->select_all_devices_points();
            $data['esal_typeee'] = $this->Esalat_estlam_model->select_st_bnod_setting_by_condition(array('type' => 1));
            $data['all_esals_today'] = $this->Esalat_estlam_model->select_all_by_st_esalat_estlam_all();
            $data['all_esals_inbox'] = $this->Esalat_estlam_model->select_all_by_st_esalat_estlam_all_deported();

            $data['all_money_today'] = $this->Esalat_estlam_model->select_total_by_pay_method();
            $data['gehat'] =$this->Esalat_estlam_model->select_gehat();

//            $this->test($data);
            $data['title'] = 'إضافة إيصال إستلام ';
            $data['subview'] = 'admin/st/esalat/esal_estlam_view';
            $this->load->view('admin_index', $data);
        }
    }

    public function Print_esal($esal_num)
    {
        if (!empty($esal_num)) {
            $data['username'] = $this->Esalat_estlam_model->getUserName($_SESSION['user_id']);
            $data['result'] = $this->Esalat_estlam_model->select_all_by_st_esalat_estlam(array('esal_num' => $esal_num))[0];
            $number = number_format((float)$data['result']->value, 2, '.', '');
            if (strpos($number, '.') !== false) {
                $val = explode('.', $number);
                $integer = $this->convert_number($val[0]);
                $float = $this->convert_number(round($val[1]));
                if (!empty(round($val[1]))) {
                    $data['ArabicNum'] = $integer . " " . "ريال و" . $float . " " . "هللة فقط لا غير";
                    $data['value'] = $number;
                } else {
                    $data['ArabicNum'] = $integer . " " . "ريال " . " فقط لا غير";
                    $data['value'] = $val[0];

                }
            } else {
                $title = $this->convert_number($number);
                $data['title'] = $title . " " . "ريال فقط لا غير";
                $data['value'] = $number;
            }


            $data['result'] = $this->Esalat_estlam_model->select_all_by_st_esalat_estlam(array('esal_num' => $esal_num))[0];
            $data['gathering_place'] = $this->Esalat_estlam_model->GetFrom_fr_settings(14);
            $data['titles'] = $this->Esalat_estlam_model->GetFrom_fr_settings(8);
            $data['greetings'] = $this->Esalat_estlam_model->GetFrom_fr_settings(9);

            //  $this->load->view('admin/st/esalat/Printesal', $data);

            $type_esal = $this->Esalat_estlam_model->get_type_print($_SESSION['emp_code']);


            $this->load->view('admin/st/esalat/Printesal_n', $data);


        }
    }

    public function getConnection($Fe2aType)
    {

        /********* خاص بالكفلاء *********************************************/
        if ($Fe2aType == 1) {
            $all_Sponsors = $this->Esalat_estlam_model->getMembersSponsors();
            $arr_sponsors = array();
            $arr_sponsors['data'] = array();
            if (!empty($all_Sponsors)) {
                foreach ($all_Sponsors as $row_sponsor) {

                    $arr_sponsors['data'][] = array(
                        '<input type="radio" name="choosed"   id="member' . $row_sponsor['id'] . '" data-name="' . $row_sponsor['k_name'] . '" data-id="' . $row_sponsor['id'] . '"
                   data-mob="' . $row_sponsor['k_mob'] . '"     value="' . $row_sponsor['id'] . '"  ondblclick="GetMemberName(' . $row_sponsor['id'] . ')" />',
                        $row_sponsor['k_num'],
                        $row_sponsor['k_name'],

                        $row_sponsor['k_mob'],

                    );
                }
            }
            echo json_encode($arr_sponsors);

        } elseif ($Fe2aType == 2) {
            /********* خاص المتبرعين  *********************************************/

            $all_Donors = $this->Esalat_estlam_model->getMembersDonors();
            $arr_donors = array();
            $arr_donors['data'] = array();

            if (!empty($all_Donors)) {
                foreach ($all_Donors as $row_donors) {


                    $arr_donors['data'][] = array(
                        '<input type="radio" name="choosed" value="' . $row_donors['id'] . '"
                         ondblclick="GetMemberName(' . $row_donors['id'] . ')"   id="member' . $row_donors['id'] . '" data-name="' . $row_donors['d_name'] . '" data-id="' . $row_donors['id'] . '"
                      data-mob="' . $row_donors['d_mob'] . '"
                        onclick="getMemberData($(this).val(),' . $Fe2aType . ')" />',
                        $row_donors['d_name'],
                        $row_donors['d_national_num'],
                        $row_donors['d_mob'],

                        ''
                    );
                }
            }
            echo json_encode($arr_donors);
        } elseif ($Fe2aType == 3) {
            /********* خاص المشتركين - الجمعية العمومية  *********************************************/

            $all_general_assembly = $this->Esalat_estlam_model->getMembersGeneral_assembly();
            $arr_general_assembly = array();
            $arr_general_assembly['data'] = array();

            if (!empty($all_general_assembly)) {
                foreach ($all_general_assembly as $row_general_assembly) {


                    $arr_general_assembly['data'][] = array(
                        '<input type="radio" name="choosed" value="' . $row_general_assembly['id'] . '"
                          ondblclick="GetMemberName(' . $row_general_assembly['id'] . ')"   id="member' . $row_general_assembly['id'] . '" data-name="' . $row_general_assembly['name'] . '" data-id="' . $row_general_assembly['id'] . '"
                                data-mob="' . $row_general_assembly['jwal'] . '"    onclick="getMemberData($(this).val(),' . $Fe2aType . ')" />',
                        $row_general_assembly['id'],
                        $row_general_assembly['name'],

                        $row_general_assembly['jwal'],

                        ''
                    );
                }
            }
            echo json_encode($arr_general_assembly);
        }


    }


    public function GetArabicNum()
    {

        $number = number_format((float)$_POST['number'], 2, '.', '');
        if (strpos($number, '.') !== false) {
            $val = explode('.', $number);
            $integer = $this->convert_number($val[0]);
            $float = $this->convert_number(round($val[1]));
            if (!empty(round($val[1]))) {
                $data['title'] = $integer . " " . "ريال و" . $float . " " . "هللة فقط لا غير";
                $data['value'] = $number;
            } else {
                $data['title'] = $integer . " " . "ريال " . " فقط لا غير";
                $data['value'] = $val[0];

            }
        } else {
            $title = $this->convert_number($number);
            $data['title'] = $title . " " . "ريال فقط لا غير";
            $data['value'] = $number;
        }
        echo json_encode($data);
    }


    public function GetByArray()
    {

        if ($_POST['type'] === 'getAccount') {
            $data = $this->Esalat_estlam_model->select_all_by_condition(array('society_main_banks_account.bank_id_fk' => $_POST['id']), '');
        } elseif ($_POST['type'] === 'getAccountNum') {
            $data = $this->Esalat_estlam_model->select_all_by_condition(
                array('type' => 2, 'society_main_banks_account.bank_id_fk' => $_POST['bank_id'], 'society_main_banks_account.account_id_fk' => $_POST['id']), '');
        }
        echo json_encode($data);

    }


    public function GetData()
    {

        if ($_POST['type'] === 'tabro3') {
            $data = $this->Esalat_estlam_model->select_st_bnod_setting_by_condition(
                array('fe2a' => 0, 'band' => 0, 'erad_tabro3' => 0, 'esal' => $_POST['id']));


        } elseif ($_POST['type'] === 'fe2a') {
            $data = $this->Esalat_estlam_model->select_st_bnod_setting_by_condition(
                array('fe2a' => 0, 'band' => 0, 'erad_tabro3' => $_POST['id']));

        } elseif ($_POST['type'] === 'band') {
            $data = $this->Esalat_estlam_model->select_st_bnod_setting_by_condition(
                array('type' => 4, 'fe2a' => $_POST['id']));

        }
        echo json_encode($data);

    }


    /************************************************************/


    public function GetDeviceData()
    {
        if ($_POST['type'] === 'all') {

            $data['all_data'] = $this->Esalat_estlam_model->select_all_by_DeviceData(array('fr_devices_points.device_id_fk' => $_POST['id']), 'bank_id_fk');

            $data['account_code'] = $this->Esalat_estlam_model->select_all_by_condition(
                array('type' => 2, 'society_main_banks_account.bank_id_fk' => $data['all_data'][0]->bank_id_fk,
                    'society_main_banks_account.account_id_fk' => $data['all_data'][0]->account_id_fk), '');

        }
        echo json_encode($data);

    }


    public function GetTable()
    {

        $id = $_POST['id'];

        $data['username'] = $this->Esalat_estlam_model->getUserName($_SESSION['user_id']);
        $data['result'] = $this->Esalat_estlam_model->select_all_by_st_esalat_estlam(array('id' => $id))[0];
        $number = number_format((float)$data['result']->value, 2, '.', '');
        if (strpos($number, '.') !== false) {
            $val = explode('.', $number);
            $integer = $this->convert_number($val[0]);
            $float = $this->convert_number($val[1]);
            $data['ArabicNum'] = $integer . " " . "ريال و" . $float . " " . "هللة فقط لا غير";

        } else {
            $title = $this->convert_number($number);
            $data['ArabicNum'] = $title . " " . "ريال فقط لا غير";

        }
        $data['gathering_place'] = $this->Esalat_estlam_model->GetFrom_fr_settings(14);
        $data['titles'] = $this->Esalat_estlam_model->GetFrom_fr_settings(8);
        $data['greetings'] = $this->Esalat_estlam_model->GetFrom_fr_settings(9);
        $this->load->view('admin/st/esalat/GetTable', $data);

    }


    public function GetData2()
    {

        $data['fe2a_type2_arr'] = $this->Esalat_estlam_model->select_st_bnod_setting_by_condition(
            array('fe2a' => 0, 'band' => 0, 'erad_tabro3' => $_POST['erad_tbro3'], ''));
        echo json_encode($data);
        //'id !='=>$_POST['fe2a']
    }


    public function GetBandType2()
    {
        $arr = json_decode(stripslashes($_POST['FirstBandValue']));
//        $this->test($arr);

        $data = $this->Esalat_estlam_model->select_st_bnod_setting_by_condition(
            array('type' => 4, 'fe2a' => $_POST['id']), $arr);
        echo json_encode($data);
    }


    public function Deleteesal($id)
    {
        $this->Esalat_estlam_model->Deleteesal($id);
        $this->message('success', ' تم حذف  الإيصال بنجاح');
        redirect('st/esalat/Esalat_estlam/addesal', 'refresh');
    }


  /*  public function Printesal($id)
    {
        if (!empty($id)) {
            $data['username'] = $this->Esalat_estlam_model->getUserName($_SESSION['user_id']);
            $data['result'] = $this->Esalat_estlam_model->select_all_by_st_esalat_estlam(array('id' => $id))[0];
            $number = number_format((float)$data['result']->value, 2, '.', '');
            if (strpos($number, '.') !== false) {
                $val = explode('.', $number);
                $integer = $this->convert_number($val[0]);
                $float = $this->convert_number(round($val[1]));
                if (!empty(round($val[1]))) {
                    $data['ArabicNum'] = $integer . " " . "ريال و" . $float . " " . "هللة فقط لا غير";
                    $data['value'] = $number;
                } else {
                    $data['ArabicNum'] = $integer . " " . "ريال " . " فقط لا غير";
                    $data['value'] = $val[0];

                }
            } else {
                $title = $this->convert_number($number);
                $data['title'] = $title . " " . "ريال فقط لا غير";
                $data['value'] = $number;
            }


            $data['result'] = $this->Esalat_estlam_model->select_all_by_st_esalat_estlam(array('id' => $id))[0];
            $data['gathering_place'] = $this->Esalat_estlam_model->GetFrom_fr_settings(14);
            $data['titles'] = $this->Esalat_estlam_model->GetFrom_fr_settings(8);
            $data['greetings'] = $this->Esalat_estlam_model->GetFrom_fr_settings(9);

            //  $this->load->view('admin/st/esalat/Printesal', $data);
            $this->load->view('admin/st/esalat/Printesal_n', $data);

        }
    }

*/
public function Printesal()
    {
       
    $id = $this->input->post('id');
        if (!empty($id)) {
            $data['username'] = $this->Esalat_estlam_model->getUserName($_SESSION['user_id']);
            $data['result'] = $this->Esalat_estlam_model->select_all_by_st_esalat_estlam(array('id' => $id))[0];
            $number = number_format((float)$data['result']->value, 2, '.', '');
            if (strpos($number, '.') !== false) {
                $val = explode('.', $number);
                $integer = $this->convert_number($val[0]);
                $float = $this->convert_number(round($val[1]));
                if (!empty(round($val[1]))) {
                    $data['ArabicNum'] = $integer . " " . "ريال و" . $float . " " . "هللة فقط لا غير";
                    $data['value'] = $number;
                } else {
                    $data['ArabicNum'] = $integer . " " . "ريال " . " فقط لا غير";
                    $data['value'] = $val[0];

                }
            } else {
                $title = $this->convert_number($number);
                $data['title'] = $title . " " . "ريال فقط لا غير";
                $data['value'] = $number;
            }


            $data['result'] = $this->Esalat_estlam_model->select_all_by_st_esalat_estlam(array('id' => $id))[0];
            $data['gathering_place'] = $this->Esalat_estlam_model->GetFrom_fr_settings(14);
            $data['titles'] = $this->Esalat_estlam_model->GetFrom_fr_settings(8);
            $data['greetings'] = $this->Esalat_estlam_model->GetFrom_fr_settings(9);

            //  $this->load->view('admin/st/esalat/Printesal', $data);
            $this->load->view('admin/st/esalat/Printesal_n', $data);

        }
    }




    public function GetDetails()
    {

        $id = $_POST['id'];

        $data['username'] = $this->Esalat_estlam_model->getUserName($_SESSION['user_id']);
        $data['result'] = $this->Esalat_estlam_model->select_all_by_st_esalat_estlam(array('id' => $id))[0];

        $number = number_format((float)$data['result']->value, 2, '.', '');
        if (strpos($number, '.') !== false) {
            $val = explode('.', $number);
            $integer = $this->convert_number($val[0]);
            $float = $this->convert_number(round($val[1]));
            if (!empty(round($val[1]))) {
                $data['ArabicNum'] = $integer . " " . "ريال و" . $float . " " . "هللة فقط لا غير";
                $data['value'] = $number;
            } else {
                $data['ArabicNum'] = $integer . " " . "ريال " . " فقط لا غير";
                $data['value'] = $val[0];

            }
        } else {
            $title = $this->convert_number($number);
            $data['title'] = $title . " " . "ريال فقط لا غير";
            $data['value'] = $number;
        }


        $data['all_banks'] = $this->Esalat_estlam_model->select_all_by_condition(array("society_main_banks_account.type" => 2)
            , "society_main_banks_account.bank_id_fk");

        $data['erad_tbro3_arr'] = $this->Esalat_estlam_model->select_st_bnod_setting_by_condition(
            array('fe2a' => 0, 'band' => 0, 'erad_tabro3' => 0, 'esal' => $data['result']->esal_type));

        $data['fe2a_type_arr'] = $this->Esalat_estlam_model->select_st_bnod_setting_by_condition(
            array('fe2a' => 0, 'band' => 0, 'erad_tabro3' => $data['result']->erad_type));

        $data['bnd_type_arr'] = $this->Esalat_estlam_model->select_st_bnod_setting_by_condition(
            array('band' => 0, 'fe2a' => $data['result']->fe2a_type1));


        $data['fe2a_type_arr2'] = $this->Esalat_estlam_model->select_st_bnod_setting_by_condition(
            array('fe2a' => 0, 'band' => 0, 'erad_tabro3' => $data['result']->erad_type));

        $data['bnd_type_arr2'] = $this->Esalat_estlam_model->select_st_bnod_setting_by_condition(
            array('band' => 0, 'fe2a' => $data['result']->fe2a_type2));

        $data['fe2a_types'] = $this->Difined_model->select_all('fr_sponser_donors_setting', '', '', "", "");
        $data['bank_accounts_arr'] = $this->Esalat_estlam_model->select_all_by_condition(
            array('society_main_banks_account.bank_id_fk' => $data['result']->bank_id_fk), '');

        /*$data['bank_account_num_arr'] =$this->Esalat_estlam_model->select_all_by_condition(
                   array('type'=>2,'society_main_banks_account.bank_id_fk'=>$data['result']->bank_id_fk
                   ,'society_main_banks_account.account_id_fk'=>$data['result']->bank_account_id_fk),'');*/


        $data['eda3_data'] = $this->Esalat_estlam_model->select_all_by_condition(
            array('type' => 2, 'society_main_banks_account.bank_id_fk' => $data['result']->bank_id_fk, 'society_main_banks_account.account_id_fk' => $data['result']->bank_account_id_fk), '');


        $data['all_data'] = $this->Esalat_estlam_model->select_all_by_DeviceData(array('fr_devices_points.device_id_fk' => $data['result']->device_num), 'bank_id_fk');
        $data['bank_account_code_shabka_arr'] = $this->Esalat_estlam_model->select_all_by_condition(
            array('type' => 2, 'society_main_banks_account.bank_id_fk' => $data['result']->bank_id_fk,
                'society_main_banks_account.account_id_fk' => $data['result']->bank_account_id_fk), '');

        $data['esal_type'] = $this->Esalat_estlam_model->select_st_bnod_setting_by_condition(array('esal' => 0));
        $data['gathering_place'] = $this->Esalat_estlam_model->GetFrom_fr_settings(14);
        $data['titles'] = $this->Esalat_estlam_model->GetFrom_fr_settings(8);
        $data['greetings'] = $this->Esalat_estlam_model->GetFrom_fr_settings(9);

        $data['project_data'] = $this->Esalat_estlam_model->project_data(array('id' => $data['result']->moshro3_fk));


        $this->load->view('admin/st/esalat/GetDetails', $data);

    }


    /****************************************************************************************/

    public function getSearchResults()
    {
        $array_search_colum = $this->input->post('array_search_id');
        $input_search_value = $this->input->post('input_search_id');
        $data['records'] = $this->Esalat_estlam_model->getSearchResults($array_search_colum, $input_search_value);
//        $this->test( count($data['records']));
        $this->load->view('admin/st/esalat/getSearchResults', $data);

    }

    /****************************************************************/

    public function get_kafel()
    { //st/esalat/Esalat_estlam/get_kafel
        $data['sponsers'] = $this->Esalat_estlam_model->get_all_sponsers();


        $data['subview'] = 'admin/st/esalat/reports/sponsers_esals';
        $this->load->view('admin_index', $data);
    }

    public function get_esal_details()
    { // st/esalat/Esalat_estlam/get_esal_details
        $id = $this->input->post('id');
        $data['details'] = $this->Esalat_estlam_model->get_all_esal($id);
        //  print_r( $data['details']);
        $this->load->view('admin/st/esalat/reports/load_details', $data);
    }


    public function get_search_esals()
    {
        $field = $this->input->post('array_search_id');
        if ($field == 'pay_method') {
            $valu = $this->input->post('select_search_id');

        } elseif ($field == 'bnd_type1') {
            $valu = $this->input->post('select_search_id3');

        } else {
            $valu = $this->input->post('input_search_id');
        }


        $data['details'] = $this->Esalat_estlam_model->get_all_esal_search($field, $valu);

        //print_r( $data['details']);
        $this->load->view('admin/st/esalat/reports/load_details', $data);
    }

    public function get_bands()
    {
        $bands = $this->Esalat_estlam_model->select_st_bnod_setting_by_condition(array('band' => 0, 'type' => 4));
        echo json_encode($bands);
    }


    public function Print_esal2($id)
    {
        if (!empty($id)) {
            $data['username'] = $this->Esalat_estlam_model->getUserName($_SESSION['user_id']);
            $data['result'] = $this->Esalat_estlam_model->select_all_by_st_esalat_estlam(array('id' => $id))[0];
            $number = number_format((float)$data['result']->value, 2, '.', '');
            if (strpos($number, '.') !== false) {
                $val = explode('.', $number);
                $integer = $this->convert_number($val[0]);
                $float = $this->convert_number(round($val[1]));
                if (!empty(round($val[1]))) {
                    $data['ArabicNum'] = $integer . " " . "ريال و" . $float . " " . "هللة فقط لا غير";
                    $data['value'] = $number;
                } else {
                    $data['ArabicNum'] = $integer . " " . "ريال " . " فقط لا غير";
                    $data['value'] = $val[0];

                }
            } else {
                $title = $this->convert_number($number);
                $data['title'] = $title . " " . "ريال فقط لا غير";
                $data['value'] = $number;
            }


            $data['result'] = $this->Esalat_estlam_model->select_all_by_st_esalat_estlam(array('id' => $id))[0];
            $data['gathering_place'] = $this->Esalat_estlam_model->GetFrom_fr_settings(14);
            $data['titles'] = $this->Esalat_estlam_model->GetFrom_fr_settings(8);
            $data['greetings'] = $this->Esalat_estlam_model->GetFrom_fr_settings(9);

            // $this->load->view('admin/st/esalat/Printesal', $data);

            /*  $type_esal = $this->Esalat_estlam_model->get_type_print($_SESSION['emp_code']);
              if (!empty($type_esal)) {
                  if ($type_esal == 1) {
  //                $this->test($_SESSION);
                      $this->load->view('admin/st/esalat/Printesal', $data);
                  } else if ($type_esal == 2) {
                      $this->load->view('admin/st/esalat/Printesal_n', $data);
                  }
              } else {
                  $this->load->view('admin/st/esalat/Printesal', $data);

              }*/
            $this->load->view('admin/st/esalat/Printesal_n', $data);


        }
    }
    public function Print_esal3($id)
    {
        if (!empty($id)) {
            $data['username'] = $this->Esalat_estlam_model->getUserName($_SESSION['user_id']);
            $data['result'] = $this->Esalat_estlam_model->select_all_by_st_esalat_estlam(array('id' => $id))[0];
            $number = number_format((float)$data['result']->value, 2, '.', '');
            if (strpos($number, '.') !== false) {
                $val = explode('.', $number);
                $integer = $this->convert_number($val[0]);
                $float = $this->convert_number(round($val[1]));
                if (!empty(round($val[1]))) {
                    $data['ArabicNum'] = $integer . " " . "ريال و" . $float . " " . "هللة فقط لا غير";
                    $data['value'] = $number;
                } else {
                    $data['ArabicNum'] = $integer . " " . "ريال " . " فقط لا غير";
                    $data['value'] = $val[0];

                }
            } else {
                $title = $this->convert_number($number);
                $data['title'] = $title . " " . "ريال فقط لا غير";
                $data['value'] = $number;
            }


            $data['result'] = $this->Esalat_estlam_model->select_all_by_st_esalat_estlam(array('id' => $id))[0];
            $data['gathering_place'] = $this->Esalat_estlam_model->GetFrom_fr_settings(14);
            $data['titles'] = $this->Esalat_estlam_model->GetFrom_fr_settings(8);
            $data['greetings'] = $this->Esalat_estlam_model->GetFrom_fr_settings(9);

            $this->load->view('admin/st/esalat/print_esal_n_estlam', $data);


        }
    }
// 9-4-om

    public function read_file($file_name)
    {
        $this->load->helper('file');
//        $file_name=$this->uri->segment(5);
        $file_path = 'uploads/st/esalat_estlam/' . $file_name;
        header('Content-Type: application/pdf');
        header('Content-Discription:inline; filename="' . $file_name . '"');
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges:bytes');
        header('Content-Length: ' . filesize($file_path));
        readfile($file_path);
    }

//20-5-om
    public function display_data()
    {
        $all_esals = $this->Esalat_estlam_model->select_all_by_st_esalat_estlam_all();
        $arr = array();
        $arr['data'] = array();
        if (!empty($all_esals)) {
            $x = 0;
           // $pay_mthod = '';
              $pay_method_arr = array(1 => ' عيني ');//26-5-om
            foreach ($all_esals as $row) {
                $x++;
                if (!empty($pay_method_arr[$row->pay_method])) {
                    $pay_mthod = $pay_method_arr[$row->pay_method];
                }
                $arr['data'][] = array(
                    $x,
                    $row->esal_num,
                    $row->esal_date,
                    $row->esal_type_title,
                    $pay_mthod,
                    $row->value,
                    $row->person_name,
                    $row->band_title,
                    '
  <a   data-toggle="modal" style="padding: 6px 12px;" onclick="GetTable(' . $row->id . ')"
                                                                data-target="#myModal">
                                                                <i class="fa fa-list"></i></a>
  ',
                    '
                    <a href="' . base_url() . 'st/esalat/Esalat_estlam/Printesal/' . $row->id . '"
                                                           target=\'_blank\'><i class=\'fa fa-print\' aria-hidden=\'true\'></i></a>


                                                            <a href="' . base_url() . 'st/esalat/Esalat_estlam/addesal/' . $row->id . '">
                                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                            </a>

                                                            <a onclick="$(\'#adele\').attr(\'href\', ' . base_url() . "st/esalat/Esalat_estlam/Deleteesal/" . $row->esal_num . ');"
                                                               data-toggle="modal" data-target="#modal-delete"
                                                               title="حذف"> <i class="fa fa-trash"
                                                                               aria-hidden="true"></i> </a>',
                    '<input type="checkbox" value="' . $row->id . '" class="checkbox_esal"  >'
                );
            }


        }
        $json = json_encode($arr);
        echo $json;

    }

    public function display_data_store_deport()
    {
        $all_esals = $this->Esalat_estlam_model->select_all_by_st_esalat_estlam_store_deport();
        $arr = array();
        $arr['data'] = array();
        if (!empty($all_esals)) {
            $x = 0;
             $pay_method_arr = array(1 => ' عيني ');//26-5-om
            foreach ($all_esals as $row) {
                $x++;
                if (!empty($pay_method_arr[$row->pay_method])) {
                    $pay_mthod = $pay_method_arr[$row->pay_method];
                }
                $arr['data'][] = array(
                    $x,
                    $row->esal_num,
                    $row->esal_date,
                    $row->esal_type_title,
                    $pay_mthod,
                    $row->value,
                    $row->person_name,
                    $row->band_title,
                    '
  <a   data-toggle="modal" style="padding: 6px 12px;" onclick="GetTable(' . $row->id . ')"
                                                                data-target="#myModal">
                                                                <i class="fa fa-list"></i></a>
  ', ' <button type="button" class="btn btn-warning" onclick="GetTable_tbar3(' . $row->id . ')" data-toggle="modal" data-target="#myModal_tbar3" >
  إذن اضافة للمستودع
                </button>'

                );
            }


        }
        $json = json_encode($arr);
        echo $json;

    }

    public function esalat_tbar3_estlam()
    {//st/esalat/Esalat_estlam/esalat_tbar3_estlam
        $data['title'] = ' إيصال إستلام ';
        $data['subview'] = 'admin/st/esalat/esalat_estlam_tbar3_view';
        $this->load->view('admin_index', $data);
    }

    public function esalat_estlam_store()
    {//st/esalat/Esalat_estlam/esalat_estlam_store
        $data['title'] = 'الإيصالات الواردة إلى المستودع  ';
        $data['subview'] = 'admin/st/esalat/esalat_estlam_store_view';
        $this->load->view('admin_index', $data);
    }

    /*public function update_store_deport()
    {
        $esal_id = $this->input->post('checkbox_esal_id');
        echo $this->Esalat_estlam_model->update_store_deport($esal_id);

    }*/
      public function update_store_deport()
    {
        $esal_id = $this->input->post('checkbox_esal_id');
        $store_id = $this->input->post('store_id');
        echo $this->Esalat_estlam_model->update_store_deport($esal_id,$store_id);

    }

    public function GetTable_tbar3()
    {
        $this->load->model('st/ezn_edafa_model/Ezn_edafa_model');

        $id = $_POST['id'];

        $data['suppliers'] = $this->Ezn_edafa_model->get_suppliers();
        $data['storage'] = $this->Ezn_edafa_model->get_storage(1);
        $data['rkm_ezen'] = $this->Ezn_edafa_model->get_rkm_ezen();
        $data['erad_tabro3'] = $this->Ezn_edafa_model->select_st_bnod_setting_by_condition(
            array('fe2a' => 0, 'band' => 0, 'erad_tabro3' => 0, 'type' => 2));

        $data['result'] = $this->Esalat_estlam_model->select_all_by_st_esalat_estlam(array('id' => $id))[0];

        $this->load->view('admin/st/esalat/GetTable_tbar3', $data);

    }

    public function get_code()
    {
        $this->load->model('st/moshtriat_ayni/Moshtriat_ayni_model');

        $id = $this->input->post('id');
        $code = $this->Moshtriat_ayni_model->get_code($id);
        $json = json_encode($code);
        echo $json;
    }

    public function getConnection3()
    {
        $all_Donors = $this->Ezn_edafa_model->getMembersDonors();
        $arr_donors = array();
        $arr_donors['data'] = array();

        if (!empty($all_Donors)) {
            foreach ($all_Donors as $row_donors) {

                $arr_donors['data'][] = array(
                    '<input type="radio" name="choosed" value="' . $row_donors['id'] . '"
                         ondblclick="GetMemberName(this)"   id="member' . $row_donors['id'] . '" data-name="' . $row_donors['d_name'] . '" data-id="' . $row_donors['id'] . '"
                      data-mob="' . $row_donors['d_mob'] . '"/>',
                    $row_donors['d_name'],
                    $row_donors['d_national_num'],
                    $row_donors['d_mob'],
                    ''
                );
            }
        }
        echo json_encode($arr_donors);


    }

    public function getConnection2($row_id,$store_id)
    {
        $all_Asnafs = $this->Ezn_edafa_model->get_asnaf($store_id);
//        $this->test($all_asnafs);
        $arr_asnaf = array();
        $arr_asnaf['data'] = array();

        if (!empty($all_Asnafs)) {
            foreach ($all_Asnafs as $row_asnafs) {

                $arr_asnaf['data'][] = array(
                    '<input type="radio" name="choosed" value="' . $row_asnafs['id'] . '"
                       ondblclick="Get_sanfe_Name(this,' . $row_id . ')" 
                        id="member' . $row_asnafs['id'] . '" data-code="' . $row_asnafs['code'] . '" 
                        data-code_br="' . $row_asnafs['code_br'] . '"
                        data-name="' . $row_asnafs['name'] . '"
                        data-whda="' . $row_asnafs['title_setting'] . '" 
                        data-price="' . $row_asnafs['price'] . '" 
                        data-all_rased="' . $row_asnafs['all_rased'] . '" 
                        data-slahia="' . $row_asnafs['slahia'] . '" />',
                    $row_asnafs['code'],
                    $row_asnafs['name'],
                    $row_asnafs['title_setting'],

                    ''
                );
            }
        }
        echo json_encode($arr_asnaf);


    }

    public function add_ezn_edafa()
    {//st/esalat/Esalat_estlam/esalat_estlam_store

        $return_data = $this->Esalat_estlam_model->insert_esalat_estlam_store();
        if ($return_data == 1) {
            $this->message('success', '  تم اضافة  الإيصال بنجاح ');
            redirect('st/esalat/Esalat_estlam/esalat_estlam_store', 'refresh');
        } else {
            $this->message('success', ' لم يتم اضافة ايصال ');
        }
    }
    
/**********************************************************/
   public function add_gehat(){
        $this->Esalat_estlam_model->insert_geha();
        $data['gehat'] =$this->Esalat_estlam_model->select_gehat();
        $this->load->view('admin/st/esalat/geha_load_page',$data);
    }
    public function get_geha(){
        $id= $this->input->post('id');
        $geha =$this->Esalat_estlam_model->get_geha_by_id($id);
        echo json_encode($geha);
    }

    public function update_geha(){

        $id= $this->input->post('id');
        $this->Esalat_estlam_model->update_geah($id);
        $data['gehat'] =$this->Esalat_estlam_model->select_gehat();

        $this->load->view('admin/st/esalat/geha_load_page',$data);

    }
    public function delete_geha(){

        $id = $this->input->post('id');
        $this->Esalat_estlam_model->delete_geha($id);
        $data['gehat'] =$this->Esalat_estlam_model->select_gehat();
        $this->load->view('admin/st/esalat/geha_load_page',$data);

    }
    
    /*
  public function all_eslate_estlam()
{//st/esalat/Esalat_estlam/all_eslate_estlam
    $data['eslat_estlam'] = $this->Esalat_estlam_model->select_all_by_st_esalat_estlam_all();
    $data['eslat_estlam_deport'] = $this->Esalat_estlam_model->select_all_by_st_esalat_estlam_store_deport();

    $data['title'] = ' إيصال إستلام ';
    $data['subview'] = 'admin/st/esalat/all_eslate_estlam_view';
    $this->load->view('admin_index', $data);
}  */
    
       public function all_eslate_estlam()
    {//st/esalat/Esalat_estlam/all_eslate_estlam
        $data['eslat_estlam'] = $this->Esalat_estlam_model->select_all_by_st_esalat_estlam_all();
        $data['eslat_estlam_deport'] = $this->Esalat_estlam_model->select_all_by_st_esalat_estlam_store_deport();
    $data['storage']=$this->Esalat_estlam_model->get_storage();
        $data['title'] = ' إيصال إستلام ';
        $data['subview'] = 'admin/st/esalat/all_eslate_estlam_view';
        $this->load->view('admin_index', $data);
    }
    
     /* public function delete_attach ($id,$esal_id){
           $this->Esalat_estlam_model->delete_attach($id);
        redirect('st/esalat/Esalat_estlam/addesal/'.$esal_id, 'refresh');

    }*/
    
      public function delete_attach()
    {
        $id = $this->input->post('attach');
        $this->Esalat_estlam_model->delete_attach($id);
//        redirect('st/esalat/Esalat_estlam/addesal/', 'refresh');

    }
    
    
    
      public function add_attach()
    {

        if ($this->input->post('save')) {
            $file = $this->upload_muli_file("morfaq");

            $this->Esalat_estlam_model->add_attach($file);
            redirect('st/esalat/Esalat_estlam/addesal', 'refresh');
        }
        $id = $this->input->post('esal_num');
        $data['result'] = $this->Esalat_estlam_model->select_all_by_st_esalat_estlam(array('id' => $id))[0];
        $this->load->view('admin/st/esalat/esal_morfaq_load', $data);

    }
    
    
       public function show_attach_esal()
    {

        $id = $this->input->post('esal_num');
        $data['result'] = $this->Esalat_estlam_model->select_all_by_st_esalat_estlam(array('id' => $id))[0];
        $this->load->view('admin/st/esalat/show_esal_morfaq_load', $data);

    }  
    
    
    
    
        public function add_kfel(){
        $this->Esalat_estlam_model->insert_kfel();
     
        $this->load->view('admin/st/esalat/esal_estlam_view');
    }
    public function add_motbr3(){
        $this->Esalat_estlam_model->insert_motabr3();
    
        $this->load->view('admin/st/esalat/esal_estlam_view');
    }
     
}//END CLASS
