<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vacation extends MY_Controller
{
    public function __construct()
    {
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
        $this->count_basic_in = $this->Counting->get_basic_in_num();
        $this->files_basic_in = $this->Counting->get_files_basic_in();
        $this->load->model('human_resources_model/Finance_employee_model');
        $this->load->model('human_resources_model/employee_forms/all_agazat/all_orders/Job_requests_model');

        $this->load->model('human_resources_model/employee_forms/all_agazat/all_orders/Agzat_model');

        // $this->load->model('maham_mowazf_model/talabat_model/agazat_model/Agzat_model');
    }

    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }

//   8-6-om
    public function getConnection_emp()
    {
        $all_Emps = $this->Agzat_model->get_all_emp();
        //        $this->test($all_Emps);
        $arr_emp = array();
        $arr_emp['data'] = array();

        if (!empty($all_Emps)) {
            foreach ($all_Emps as $row_emp) {

                if (empty($row_emp->edara)) {
                    $row_emp->edara = 'غير محدد ';
                }
                if (empty($row_emp->qsm)) {
                    $row_emp->qsm = 'غير محدد ';
                }

                $arr_emp['data'][] = array(
                    '<input type="radio" name="choosed" value="' . $row_emp->id . '"
                       ondblclick="Get_emp_Name(this)"
                        id="member' . $row_emp->id . '"
                        data-emp_code="' . $row_emp->emp_code . '"
                        data-edara_n="' . $row_emp->edara . '"
                        data-edara_id="' . $row_emp->administration . '"
                        data-name="' . $row_emp->employee . '"
                        data-job_title="' . $row_emp->job_title . '"
                        data-qsm_n="' . $row_emp->qsm . '"
                        data-qsm_id="' . $row_emp->department . '"
                        data-adress="' . $row_emp->adress . '"
                        data-phone="' . $row_emp->phone . '" />',
                        $row_emp->emp_code,
                    $row_emp->employee,
                    $row_emp->edara,
                    $row_emp->qsm,

                    ''
                );
            }
        }
        echo json_encode($arr_emp);


    }

//   8-6-om
    public function get_date()
    {
        $start_date = $this->input->post('start_date');
        $end_date = $this->input->post('end_date');
        $datetime2 = date_create($end_date);
        $datetime1 = date_create($start_date);
        $interval = date_diff($datetime1, $datetime2);
        $data['day'] = $interval->format('%R%a') + 1;
        $day1 = 1;
        $data['back_date'] = date('Y-m-d', strtotime($end_date . +$day1 . 'days'));

        print_r(json_encode($data));

    }

    private function upload_file($file_name, $folder = '')
    {
        if (!empty($folder)) {
            $config['upload_path'] = 'uploads/' . $folder;
        } else {
            $config['upload_path'] = 'uploads/files';
        }
        // $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf';
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
        $config['max_size'] = '1024*8888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888';
        $config['encrypt_name'] = true;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($file_name)) {
            return false;
        } else {
            $datafile = $this->upload->data();
            $this->thumb($datafile, $folder);
            return $datafile['file_name'];
        }
    }

    private function thumb($data, $folder = '')
    {
        $config['image_library'] = 'gd2';
        $config['source_image'] = $data['full_path'];
        if (!empty($folder)) {
            $config['new_image'] = 'uploads/' . $folder . '/thumbs/' . $data['file_name'];
        } else {
            $config['new_image'] = 'uploads/thumbs/' . $data['file_name'];
        }
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['thumb_marker'] = '';
        $config['width'] = 275;
        $config['height'] = 250;
        $this->load->library('image_lib', $config);
        $this->image_lib->initialize($config);

        $this->image_lib->resize();
    }

    public function add_vacation()
    {
        //   $this->test($_POST);

        if ($this->input->post('add')) {
            //   $this->test($_POST);
            // $this->test($_FILES);
            $file_post = 'hospital_report';
            $file_upload = $this->upload_file($file_post, 'human_resource/emp_hospital_report');
            $this->Agzat_model->insert_vacation($file_upload);
            $current_to = $this->Agzat_model->get_user_id($this->input->post('emp_id_fk'));
            $name = $this->input->post('emp_name');
            $this->send_notify($current_to, $name);
            if ($this->input->post('from_profile')) {
                redirect('maham_mowazf/person_profile/Personal_profile', 'refresh');
            } else {
                redirect('human_resources/employee_forms/all_agazat/all_orders/Vacation/add_vacation', 'refresh');
            }
        }
        $data['emp_data'] = $this->Agzat_model->select_depart();
        //        $this->test($data['emp_data']);

        $data['jobtitles'] = $this->Agzat_model->select_all_defined(4);
        $data['employies'] = $this->Agzat_model->get_emp($_SESSION['emp_code']);
        $data['all_emps'] = $this->Agzat_model->get_emp2();

        $data["personal_data"] = $this->Employee_model->get_one_employee($_SESSION['emp_code']);
        $data['admin'] = $this->Employee_model->select_by();
        $data['departs'] = $this->Employee_model->select_depart();
        $data['items'] = $this->Agzat_model->get_all_from_vacation_emp();
        $data['vacations'] = $this->Agzat_model->get_holiday();
        $data['title'] = "طلب اجازه";
        // $data['subview'] = 'admin/Human_resources/employee_forms/all_agazat/all_orders/add_vacation';
        // $this->load->view('admin_index', $data);
        if ($this->input->post('from_profile')) {
            $this->load->view('admin/Human_resources/employee_forms/all_agazat/all_orders/add_vacation', $data);
        } else {
            $data['subview'] = 'admin/Human_resources/employee_forms/all_agazat/all_orders/add_vacation';
            $this->load->view('admin_index', $data);
        }

    }

    public function GetReplacementEmployee($emp_id)
    {
        $all_emp = $this->Agzat_model->GetReplacementEmployee($emp_id);
        $arr_emp = array();
        $arr_emp['data'] = array();
        if (!empty($all_emp)) {
            foreach ($all_emp as $row_emps) {

                $arr_emp['data'][] = array(
                    '<input type="radio" name="choosed" value="' . $row_emps->id . '"
                         ondblclick="GetMemberName(this)"   id="member' . $row_emps->id . '"
                          data-name="' . $row_emps->employee . '"
                          data-id="' . $row_emps->id . '"
                          data-code="' . $row_emps->emp_code . '"
                      data-mob="' . $row_emps->phone . '"/>',
                    $row_emps->emp_code,
                    $row_emps->employee,
                    $row_emps->phone,

                    ''
                );
            }
        }
        echo json_encode($arr_emp);


    }

    public function edit_vacation($id = false, $to_page = '')
    {
        if ($this->input->post('add')) {
            $file_post = 'hospital_report';
            $file_upload = $this->upload_file($file_post, 'human_resource/emp_hospital_report');
            $this->Agzat_model->update_by_id($id, $file_upload);
            if (!empty($to_page) && ($to_page == 1)) {
                redirect('human_resources/employee_forms/all_agazat/all_orders/Vacation/request_vacation', 'refresh');
            } elseif ($this->input->post('from_profile')) {
                redirect('maham_mowazf/person_profile/Personal_profile', 'refresh');
            } else {
                redirect('human_resources/employee_forms/all_agazat/all_orders/Vacation/add_vacation', 'refresh');
            }
            // redirect('human_resources/employee_forms/all_agazat/all_orders/Vacation/add_vacation', 'refresh');
        }
        if ($this->input->post('id')) {
            $id = $this->input->post('id');
        }
        $data['title'] = "تعديل طلب اجازه";
        $data['emp_data'] = $this->Agzat_model->select_depart();
        $data['jobtitles'] = $this->Agzat_model->select_all_defined(4);
        $data['employies'] = $this->Agzat_model->get_emp($_SESSION['emp_code']);
        $data['all_emps'] = $this->Agzat_model->get_emp2();
        $data['vacations'] = $this->Agzat_model->get_holiday();

        $data["personal_data"] = $this->Employee_model->get_one_employee($_SESSION['emp_code']);
        $data['admin'] = $this->Employee_model->select_by();
        $data['departs'] = $this->Employee_model->select_depart();
        $data['item'] = $this->Agzat_model->get_vacation_by_id($id);
        //        $this->test($data['item']);
        // $data['subview'] = 'admin/Human_resources/employee_forms/all_agazat/all_orders/add_vacation';
        // $this->load->view('admin_index', $data);
        if ($this->input->post('from_profile')) {
            $this->load->view('admin/Human_resources/employee_forms/all_agazat/all_orders/add_vacation', $data);
        } else {
            $data['subview'] = 'admin/Human_resources/employee_forms/all_agazat/all_orders/add_vacation';
            $this->load->view('admin_index', $data);
        }
    }

    public function get_details_agaza()
    {
        $vac_id = $this->input->post('id');
        $data['item'] = $this->Agzat_model->get_all_from_vacation($vac_id)[0];
        // $this->test($data);
        $this->load->view('admin/Human_resources/employee_forms/all_agazat/all_orders/load_details_agaza_view', $data);
    }

    public function check_vacation()
    {
        $emp_id = $this->input->post('emp_id');
        $result = $this->Agzat_model->check_vacation($emp_id);
        echo json_encode($result);
    }

    public function request_vacation()
    {
        if ($_SESSION['role_id_fk'] == 1) {
            $data['items'] = $this->Agzat_model->get_all_from_vacation_emp();
        }
        $data['title'] = "متابعة الاجازات";
        $data['subview'] = 'admin/Human_resources/employee_forms/all_agazat/all_orders/request_vacation';
        $this->load->view('admin_index', $data);
    }

    public function read_file($file_name, $type_doc, $doc_exe)
    {
        $this->load->helper('file');
        // $file_name=$this->uri->segment(3);
        $file_path = 'uploads/human_resource/emp_hospital_report/' . $file_name;

        switch ($type_doc) {
            case 1:
                {
                    header('Content-Type: image/' . $doc_exe);
                    break;
                }
            case 2:
                {
                    header('Content-Type: application/pdf');
                    break;
                }
        }

        header('Content-Discription:inline; filename="' . $file_name . '"');
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges:bytes');
        header('Content-Length: ' . filesize($file_path));
        readfile($file_path);
    }

    public function delete_vacation($id, $from = false)
    {
        $this->Agzat_model->delete_from_table($id, 'hr_all_agzat_orders');
        // redirect('human_resources/employee_forms/all_agazat/all_orders/Vacation/add_vacation', 'refresh');
        if (!empty($from) && ($from == 1)) {
            redirect('maham_mowazf/person_profile/Personal_profile', 'refresh');
        } else {
            redirect('human_resources/employee_forms/all_agazat/all_orders/Vacation/add_vacation', 'refresh');
        }
    }


    public function check_vacation_year()
    {
        $emp_code = $this->input->post('emp');
        // $vac_id = $this->input->post('vac_id');
        $result = $this->Agzat_model->get_days_vacation_year($emp_code, 2);
        echo json_encode($result);
    }

    public function check_agaza_without_salary()
    {
        $emp_code = $this->input->post('emp');
        $vac_id = $this->input->post('no3_agaza');
        $start_date = $this->input->post('start_date');

        $result = $this->Agzat_model->check_agaza_without_salary($emp_code, $vac_id, $start_date);
        echo json_encode($result);
    }


    public function add_attach()
    {
        if ($this->input->post('save')) {
            $agaza_rkm = $this->input->post('agaza_rkm');
            $file_post = 'hospital_report';
            $file_upload = $this->upload_file($file_post, 'human_resource/emp_hospital_report');
            $this->Agzat_model->add_attach($file_upload, $agaza_rkm);
            if ($this->input->post('from_profile')) {
                redirect('maham_mowazf/person_profile/Personal_profile', 'refresh');
            } else {
                redirect('human_resources/employee_forms/all_agazat/all_orders/Vacation/add_vacation', 'refresh');
            }
        }
        $agaza_rkm = $this->input->post('agaza_rkm');
        $data['result'] = $this->Agzat_model->get_attach(array('agaza_rkm' => $agaza_rkm));
        $this->load->view('admin/Human_resources/employee_forms/all_agazat/all_orders/morfaq_load', $data);

    }

  /*  public function get_avalibal_days()
    {
        $emp_code = $this->input->post('emp_id');
        $vac_id = $this->input->post('vac_id');
        if ($vac_id == 2) {
            $result = $this->Agzat_model->get_days_vacation_year($emp_code, $vac_id);
        } elseif ($vac_id == 1) {
            $result = $this->Agzat_model->get_days_vacation_cousal_by_vid($emp_code, $vac_id);

        } else {
            $result = $this->Agzat_model->get_days_vacation_by_vid($emp_code, $vac_id);
        }
        echo json_encode($result);
    }
*/
public function get_avalibal_days()
{
    $emp_code = $this->input->post('emp_id');
    $vac_id = $this->input->post('vac_id');
    $end_date = $this->input->post('end_date');
    if ($vac_id == 2) {
        $result = $this->Agzat_model->get_days_vacation_year($emp_code, $vac_id,$end_date);
    } elseif ($vac_id == 1) {
        $result = $this->Agzat_model->get_days_vacation_cousal_by_vid($emp_code, $vac_id);

    } else {
        $result = $this->Agzat_model->get_days_vacation_by_vid($emp_code, $vac_id);
    }
    echo json_encode($result);
}
    public function get_emp_data()
    {

        $emp_id = $this->input->post('emp_id');
        $data['personal_data'] = $this->Agzat_model->select_depart($emp_id);
        $this->load->view('admin/Human_resources/employee_forms/side_bar_data_emp_view', $data);

    }

    /***********************************************/

    public function start_work()//human_resources/employee_forms/all_agazat/all_orders/Vacation/start_work
    {
        $data['items'] = $this->Job_requests_model->get_all_vacation();
        $data['title'] = 'اشعار مباشره عمل';
        $data['subview'] = 'admin/Human_resources/employee_forms/all_agazat/all_orders/start_work';
        $this->load->view('admin_index', $data);
    }


    public function send_notify($current_to, $name)//  maham_mowazf/talabat/all_ozonat/Ezn_order/send_notify
    {

        $this->load->model('Notification');

        define('API_ACCESS_KEY', 'AIzaSyDPQ5964xL01kr3rsVlzXveeAn-7HhPqBo');
        //$this->load->model('api/Web_service');

        $token = $this->Notification->get_token_by_id($current_to);
        $text = "تم تحويل طلب اجازه لك ";
        $this->Notification->insert_notify($current_to, $text, 2);
        $logged = $this->Notification->get_user_logged($current_to);
        if ($logged == 1) {
            for ($x = 0; $x < count($token); $x++) {
                $data = array("to" => $token[$x],

                    "notification" => array("title" => "إشعار", "body" => $text, "sound" => 'https://www.computerhope.com/jargon/m/example.mp3', "icon" => "https://abnaa-sa.org/uploads/images/05c833d02d69a88b8b3322dd22fb9e22.png", "click_action" => "http://shareurcodes.com"));
                $data_string = json_encode($data);

                //  echo "The Json Data : " . $data_string;

                $headers = array
                (
                    'Authorization: key=' . API_ACCESS_KEY,
                    'Content-Type: application/json'
                );

                $ch = curl_init();

                curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);

                $result = curl_exec($ch);

                curl_close($ch);

                //   echo "<p>&nbsp;</p>";
                //    echo "The Result : " . $result;
            }
        }
    }
    public function check_agaza_notifications()
    {
        $result = $this->Agzat_model->check_agaza_notifications(array('current_to_user_id' => $_SESSION['user_id']));
        echo json_encode($result);
    }

    public function update_agaza_notification()
    {
//        $agaza_rkm = $this->input->post('agaza_rkm');
        $result = $this->Agzat_model->update_agaza_notification();


    }
    public function check_vacation_emp()
    {

        $emp_id = $this->input->post('emp_id');
        $vacations = $this->Agzat_model->check_vacation_emp($emp_id);
        echo json_encode($vacations);

    }
}

?>
