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
        $this->load->model('maham_mowazf_model/talabat_model/agazat_model/Agazat_model');
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
        $all_Emps = $this->Job_requests_model->get_all_emp();
//        $this->test($all_Emps);
        $arr_emp = array();
        $arr_emp['data'] = array();

        if (!empty($all_Emps)) {
            foreach ($all_Emps as $row_emp) {

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


    public function add_vacation()
    {

        if ($this->input->post('add')) {
            $this->Job_requests_model->insert_vacation();
            $current_to=$this->Agazat_model->get_user_id($this->input->post('emp_id_fk'));
            $name= $this->input->post('emp_name');
            $this->send_notify($current_to,$name);
            
            redirect('human_resources/employee_forms/all_agazat/all_orders/Vacation/add_vacation', 'refresh');
        }
        $data['emp_data'] = $this->Job_requests_model->select_depart();
//        $this->test($data['emp_data']);

        $data['jobtitles'] = $this->Job_requests_model->select_all_defined(4);
        $data['employies'] = $this->Job_requests_model->get_emp($_SESSION['emp_code']);
        $data['all_emps'] = $this->Job_requests_model->get_emp2();

        $data["personal_data"] = $this->Employee_model->get_one_employee($_SESSION['emp_code']);
        $data['admin'] = $this->Employee_model->select_by();
        $data['departs'] = $this->Employee_model->select_depart();
        $data['items'] = $this->Job_requests_model->get_all_from_vacation_emp();
        $data['vacations'] = $this->Job_requests_model->get_holiday();
        $data['title'] = "طلب اجازه";
        $data['subview'] = 'admin/Human_resources/employee_forms/all_agazat/all_orders/add_vacation';
        $this->load->view('admin_index', $data);
    }

    public function GetReplacementEmployee($emp_id)
    {
        $all_emp = $this->Job_requests_model->GetReplacementEmployee($emp_id);
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
       public function edit_vacation($id)
    {
        if ($this->input->post('add')) {

            $this->Job_requests_model->update_by_id($id);
            redirect('human_resources/employee_forms/all_agazat/all_orders/Vacation/add_vacation', 'refresh');
        }
        $data['title'] = "تعديل طلب اجازه";
        $data['emp_data'] = $this->Job_requests_model->select_depart();
        $data['jobtitles'] = $this->Job_requests_model->select_all_defined(4);
        $data['employies'] = $this->Job_requests_model->get_emp($_SESSION['emp_code']);
        $data['all_emps'] = $this->Job_requests_model->get_emp2();
        $data['vacations'] = $this->Job_requests_model->get_holiday();

        $data["personal_data"] = $this->Employee_model->get_one_employee($_SESSION['emp_code']);
        $data['admin'] = $this->Employee_model->select_by();
        $data['departs'] = $this->Employee_model->select_depart();
        $data['item'] = $this->Job_requests_model->get_vacation_by_id($id);
//        $this->test($data['item']);
        $data['subview'] = 'admin/Human_resources/employee_forms/all_agazat/all_orders/add_vacation';
        $this->load->view('admin_index', $data);
    } 
    
/*
    public function edit_vacation($id)
    {
        if ($this->input->post('add')) {

            $this->Job_requests_model->update_by_id($id);
            redirect('human_resources/employee_forms/all_agazat/all_orders/Vacation/add_vacation', 'refresh');
        }
        $data['title'] = "تعديل طلب اجازه";
        $data['emp_data'] = $this->Job_requests_model->select_depart();
        $data['jobtitles'] = $this->Job_requests_model->select_all_defined(4);
        $data['employies'] = $this->Job_requests_model->get_emp($_SESSION['emp_code']);
        $data['all_emps'] = $this->Job_requests_model->get_emp2();
        $data['vacations'] = $this->Job_requests_model->get_holiday();

        $data["personal_data"] = $this->Employee_model->get_one_employee($_SESSION['emp_code']);
        $data['admin'] = $this->Employee_model->select_by();
        $data['departs'] = $this->Employee_model->select_depart();
        $data['item'] = $this->Job_requests_model->get_vacation_by_id($id);
//        $this->test($data['item']);
        $data['subview'] = 'admin/Human_resources/employee_forms/all_agazat/all_orders/add_vacation';
        $this->load->view('admin_index', $data);
    }

*/
  /*  public function delete_vacation($id)
    {
        $this->Job_requests_model->delete_from_table($id, 'hr_all_agzat_orders');
        redirect('human_resources/employee_forms/all_agazat/all_orders/Vacation/add_vacation', 'refresh');

    }

*/
  public function delete_vacation($id)
    {
        $this->Job_requests_model->delete_from_table($id,'hr_all_agzat_orders');
        redirect('human_resources/employee_forms/all_agazat/all_orders/Vacation/add_vacation', 'refresh');

    }




    public function get_avalibal_days()
    {
        $emp_code = $this->input->post('emp_id');
        $vac_id = $this->input->post('vac_id');
        if ($vac_id == 2) {
            $result = $this->Job_requests_model->get_days_vacation_year($emp_code, $vac_id);
        } elseif ($vac_id == 1) {
            $result = $this->Job_requests_model->get_days_vacation_cousal_by_vid($emp_code, $vac_id);

        } else {
            $result = $this->Job_requests_model->get_days_vacation_by_vid($emp_code, $vac_id);
        }
        echo json_encode($result);
    }

/***********************************************/

    public function start_work()//human_resources/employee_forms/all_agazat/all_orders/Vacation/start_work
{
    $data['items'] = $this->Job_requests_model->get_all_vacation();
    $data['title']='اشعار مباشره عمل';
    $data['subview'] = 'admin/Human_resources/employee_forms/all_agazat/all_orders/start_work';
    $this->load->view('admin_index', $data);
}

   
      public function get_emp_data()
    {

        $emp_id = $this->input->post('emp_id');
        $data['personal_data'] = $this->Job_requests_model->select_depart($emp_id);
        $this->load->view('admin/Human_resources/employee_forms/side_bar_data_emp_view', $data);

    }
  
   public function send_notify($current_to,$name)//  http://localhost/abnaa/maham_mowazf/talabat/all_ozonat/Ezn_order/send_notify
    {

        $this->load->model('Notification');

        define( 'API_ACCESS_KEY', 'AIzaSyDPQ5964xL01kr3rsVlzXveeAn-7HhPqBo' );
        //$this->load->model('api/Web_service');

        $token=$this->Notification->get_token_by_id($current_to);
        $text="تم تحويل طلب اجازه لك ";
        $this->Notification->insert_notify($current_to,$text,2);
        $logged= $this->Notification->get_user_logged($current_to);
        if($logged==1) {
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


}

?>
	
	
	
	
