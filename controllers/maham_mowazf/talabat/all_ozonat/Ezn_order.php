<?php

class Ezn_order extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }
        /**********************************************************/
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in = $this->Counting->get_basic_in_num();
        $this->files_basic_in = $this->Counting->get_files_basic_in();
        /*************************************************************/
        $this->load->helper(array('url', 'text', 'permission', 'form'));

        $this->load->model('system_management/Groups');

        $this->groups = $this->Groups->get_group($_SESSION["group_number"]);
        $this->groups_title = $this->Groups->get_group_title($_SESSION["group_number"]);
        $this->load->model('maham_mowazf_model/talabat_model/all_ozonat/Ezn_order_model');
        $this->load->model('human_resources_model/Public_employee_main_data');
        $this->load->library('google_maps');
    }

    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }

    private function url()
    {
        unset($_SESSION['url']);
        $this->session->set_flashdata('url', 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
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
    { // maham_mowazf/talabat/all_ozonat/Ezn_order

        if ($_SESSION['role_id_fk'] == 3) {
            $data['emp'] = $this->Ezn_order_model->get_emp($_SESSION['emp_code']);
        }
        $data['all_emp'] = $this->Ezn_order_model->get_all_emp(0);

        if ($_SESSION['role_id_fk'] == 3) {
            $data['emp_name'] = $this->Ezn_order_model->get_emp_name($_SESSION['emp_code']);
        }


       /* if ($_SESSION['role_id_fk'] == 3) {
            $data['records'] = $this->Ezn_order_model->get_ozonat($_SESSION['emp_code']);
        } elseif ($_SESSION['role_id_fk'] == 1) {
            $data['records'] = $this->Ezn_order_model->display_data();
        }*/
          if ($_SESSION['role_id_fk'] == 3) {
            $data['records'] = $this->Ezn_order_model->get_ozonat($_SESSION['emp_code']);
            $current_to= $this->Public_employee_main_data->get_direct_manager_id_by_emp_id($_SESSION['emp_code']);
            $current_to_id=$this->Ezn_order_model->get_user_emp_id($current_to,3);
            $name=$this->Ezn_order_model->get_emp_name($_SESSION['emp_code']);
        } elseif ($_SESSION['role_id_fk'] == 1) {
            $data['records'] = $this->Ezn_order_model->display_data();
            $current_to= $this->Public_employee_main_data->get_direct_manager_id_by_emp_id($this->input->post('emp_id_fk'));
            $current_to_id=$this->Ezn_order_model->get_user_emp_id($current_to,3);
            $name=$this->Ezn_order_model->get_emp_name($this->input->post('emp_id_fk'));
        }
        
        
        
        if ($this->input->post('add_ezn')) {
            $this->Ezn_order_model->add_ezn();
         $this->send_notify($current_to_id,$name);
            $this->messages('success', 'تم الإضافة بنجاح');
          //  return;
          //  redirect('maham_mowazf/person_profile/Personal_profile?my_tab=ezn_order', 'refresh');
            redirect('maham_mowazf/person_profile/Personal_profile', 'refresh');
        }
        $data['title'] = "طلب اذن";


        $this->load->view('admin/maham_mowazf_view/talabat_view/all_ozonat/ezn_order_view', $data);

    }
    

    public function send_notify($current_to,$name)//  http://localhost/abnaa/maham_mowazf/talabat/all_ozonat/Ezn_order/send_notify
    {

        $this->load->model('Notification');

          define( 'API_ACCESS_KEY', 'AIzaSyDPQ5964xL01kr3rsVlzXveeAn-7HhPqBo' );
          //$this->load->model('api/Web_service');

          $token=$this->Notification->get_token_by_id($current_to);
        $text="تم تحويل طلب اذن لك من الموظف'.$name.'  ";
           $this->Notification->insert_notify($current_to,$text);
        $logged= $this->Notification->get_user_logged($current_to);
        if($logged==1) {
       for ($x = 0; $x < count($token); $x++) {
        $data = array("to" => $token[$x],

            "notification" => array("title" => "اشعار جديد", "body" => $text, "sound" => 'https://www.computerhope.com/jargon/m/example.mp3', "icon" => "https://abnaa-sa.org/uploads/images/05c833d02d69a88b8b3322dd22fb9e22.png", "click_action" => "http://shareurcodes.com"));
        $data_string = json_encode($data);

        echo "The Json Data : " . $data_string;

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

       // echo "<p>&nbsp;</p>";
       // echo "The Result : " . $result;
    }
}
    }
    
    
    

    public function get_emp_data()
    {
        $data["personal_data"] = $this->Ezn_order_model->get_employee_data($this->input->post('valu'));
        print_r(json_encode($data["personal_data"][0]));


    }


    public function Upadte_ezn($id = false)
    {

        $data['all_emp'] = $this->Ezn_order_model->get_all_emp(0);
        if ($this->input->post('id')) {
            $id = $this->input->post('id');

            $data['get_ezn'] = $this->Ezn_order_model->get_by_id($id);
        }
        if ($_SESSION['role_id_fk'] == 3) {
            $data['emp_name'] = $this->Ezn_order_model->get_emp_name($_SESSION['emp_code']);
        }
        if ($this->input->post('add_ezn')) {
            $this->Ezn_order_model->update_ezn($id);
            $this->messages('success', 'تم التعديل بنجاح');
            //redirect('maham_mowazf/person_profile/Personal_profile?my_tab=ezn_order', 'refresh');
              redirect('maham_mowazf/person_profile/Personal_profile', 'refresh');
        }
        $data['title'] = "طلب اذن";
        $this->load->view('admin/maham_mowazf_view/talabat_view/all_ozonat/ezn_order_view', $data);

    }

    public function delete_ezn($id)
    {
        $this->Ezn_order_model->delete_ezn($id);
        $this->messages('success', 'تم الحذف بنجاح ');
          redirect('maham_mowazf/person_profile/Personal_profile', 'refresh');
      //  redirect('maham_mowazf/person_profile/Personal_profile?my_tab=ezn_order', 'refresh');
    }

    // _________Nagwa 1-6 ___________________

    public function load_details()
    {

        $row_id = $this->input->post('row_id');
        $data['get_ezn'] = $this->Ezn_order_model->get_by_id($row_id);
        $this->load->view('admin/maham_mowazf_view/talabat_view/all_ozonat/load_details', $data);
    }

    public function load_ozonat_details()
    {

        $emp_id = $this->input->post('emp_id');
        $data['all_ozonat'] = $this->Ezn_order_model->get_ozonat($emp_id);
        $this->load->view('admin/maham_mowazf_view/talabat_view/all_ozonat/load_ozonat_details', $data);

    }

    public function print_ezn()
    {

        $data['title'] = "طباعة طلب الإذن";
        $row_id = $this->input->post('row_id');
        $data['get_ezn'] = $this->Ezn_order_model->get_by_id($row_id);
        $this->load->view('admin/maham_mowazf_view/talabat_view/all_ozonat/print_ezn', $data);


    }

    public function print_ozonat()
    {

        $data['title'] = "طباعة طلب الإذن";
        $emp_id = $this->input->post('emp_id');
        $data['all_ozonat'] = $this->Ezn_order_model->get_ozonat($emp_id);
        $this->load->view('admin/maham_mowazf_view/talabat_view/all_ozonat/print_ozonat', $data);


    }

}