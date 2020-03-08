<?php

class Notification_controller extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }
        $this->load->model('Notification');

    }

    public function save_token() //Notification/save_token
    {

        $user_id= $_SESSION['user_id'];
        $token =$this->input->post('token');


        $this->Notification->insert_token('tokens',$token,$user_id);
    }
/*public function save_token()
    {
        $this->load->model('system_management/Groups');
        $user_id= $_SESSION['user_id'];
        $token =$this->input->post('token');
    //    print_r($_POST);
      //  return;
        $userdata['token_pc']=$token;
         $this->session->set_userdata($userdata);
          
        $this->Groups->insert_token('tokens',$token,$user_id); 
    }
*/

 public function get_my_notification() // Notification_controller/get_my_notification
    {
        $data['notification']=$this->Notification->get_user_notification();
        $this->Notification->update_notification();
        $data['title']="วิฺวัวสํ";
        $data['subview'] = 'admin/notification/my_notifications';
        $this->load->view('admin_index', $data);
    }
}
?>