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
        $this->load->helper(array('url', 'text', 'permission', 'form'));
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in = $this->Counting->get_basic_in_num();
        $this->files_basic_in = $this->Counting->get_files_basic_in();

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
        $all_Emps = $this->Agazat_model->get_all_emp();
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


    public function add_vacation()
    {//maham_mowazf/talabat/agazat/Vacation/add_vacation

        if ($this->input->post('add')) {
          //  $this->Agazat_model->insert_vacation();
            
            $this->Agazat_model->insert_vacation();
            $current_to=$this->Agazat_model->get_user_id($this->input->post('emp_badel_id_fk'));
            $name= $this->input->post('emp_name');
            $this->send_notify($current_to,$name);
            
         redirect('maham_mowazf/person_profile/Personal_profile', 'refresh');
          //  redirect('maham_mowazf/person_profile/Personal_profile?my_tab=agaza_order', 'refresh');
        }
        $data['emp_data'] = $this->Agazat_model->select_depart();
//        $this->test($data['emp_data']);

        $data['items'] = $this->Agazat_model->get_all_from_vacation();
        $data['vacations'] = $this->Agazat_model->get_holiday();
        $data['title'] = "طلب اجازه";

        if ($this->input->post('from_profile')) {
            $this->load->view('admin/maham_mowazf_view/talabat_view/agazat_view/add_vacation', $data);
        } else {
            $data['side_data'] = "طلب اجازه";

            $data['subview'] = 'admin/maham_mowazf_view/talabat_view/agazat_view/add_vacation';
            $this->load->view('admin_index', $data);
        }
    }

    public function GetReplacementEmployee($emp_id)
    {
        $all_emp = $this->Agazat_model->GetReplacementEmployee($emp_id);
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

    public function edit_vacation($id = false)
    {
        if ($this->input->post('add')) {

            $this->Agazat_model->update_by_id($id);
             redirect('maham_mowazf/person_profile/Personal_profile', 'refresh');
          //  redirect('maham_mowazf/person_profile/Personal_profile?my_tab=agaza_order', 'refresh');
        }
        $data['vacations'] = $this->Agazat_model->get_holiday();
        if ($this->input->post('id')) {
            $id = $this->input->post('id');
            $data['title'] = "تعديل طلب اجازه";
            $data['emp_data'] = $this->Agazat_model->select_depart($id);
            $data['item'] = $this->Agazat_model->get_vacation_by_id($id);

            $this->load->view('admin/maham_mowazf_view/talabat_view/agazat_view/add_vacation', $data);
        } else {
            $data['item'] = $this->Agazat_model->get_vacation_by_id($id);
            $data['emp_data'] = $this->Agazat_model->select_depart($id);
            $data['title'] = "تعديل طلب اجازه";

            $data['subview'] = 'admin/maham_mowazf_view/talabat_view/agazat_view/add_vacation';
            $this->load->view('admin_index', $data);
        }

    }


    public function delete_vacation($id)
    {
        $this->Agazat_model->delete_from_table($id, 'hr_all_agzat_orders');
      //  redirect('maham_mowazf/person_profile/Personal_profile?my_tab=agaza_order', 'refresh');
redirect('maham_mowazf/person_profile/Personal_profile', 'refresh');
    }


    public function get_avalibal_days()
    {
        $emp_code = $this->input->post('emp_id');
        $vac_id = $this->input->post('vac_id');
        if ($vac_id == 2) {
            $result = $this->Agazat_model->get_days_vacation_year($emp_code, $vac_id);
        } elseif ($vac_id == 1) {
            $result = $this->Agazat_model->get_days_vacation_cousal_by_vid($emp_code, $vac_id);

        } else {
            $result = $this->Agazat_model->get_days_vacation_by_vid($emp_code, $vac_id);
        }
        echo json_encode($result);
    }


    public function get_details_agaza()
    {
        $vac_id = $this->input->post('id');
        $data['item'] = $this->Agazat_model->get_all_from_vacation($vac_id)[0];

        $this->load->view('admin/maham_mowazf_view/talabat_view/agazat_view/load_details_agaza_view', $data);
    }
    
    
    
    
    
    
    
      public function send_notify($current_to,$name)//  http://localhost/abnaa/maham_mowazf/talabat/all_ozonat/Ezn_order/send_notify
    {

        $this->load->model('Notification');

        define( 'API_ACCESS_KEY', 'AIzaSyDPQ5964xL01kr3rsVlzXveeAn-7HhPqBo' );
        //$this->load->model('api/Web_service');

        $token=$this->Notification->get_token_by_id($current_to);
        $text="تم تحويل طلب اجازه لك'  ";
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

           //     echo "<p>&nbsp;</p>";
             //   echo "The Result : " . $result;
            }
        }
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}

?>
	
	
	
	
