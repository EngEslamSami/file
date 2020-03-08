<?php


class Notifications extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
       // $this->load->library('pagination');
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }
       // $this->load->model('Notification_model');

    }


   /* function get_all_notification()
    {

        $table_arr = array('hr_all_agzat_orders', 'hr_all_ozonat_orders', 'hr_solaf', 'arch_notes', 'arch_sader_history', 'arch_wared_history', 'email_inbox', 'arch_sader_comments', 'arch_wared_twgehat', 'replay_email');
        $notifiy_filde = array('seen', 'seen', 'seen', 'seen', 'seen', 'seen', 'seen', 'seen', 'seen', 'seen');
        $where_filde = array('current_to_user_id', 'current_to_id', 'current_to_user_id', 'to_user_id', 'to_user_id', 'to_user_id', 'email_to_id', 'to_user_id', 'to_user_id', 'receiver_id');
        if ($_SESSION['role_id_fk'] == 3) {
            $email_replay_conn = $_SESSION['emp_code'];
        } else {
            $email_replay_conn = $_SESSION['user_id'];
        }
        $where_filde_value = array($_SESSION['user_id'], $_SESSION['user_id'], $_SESSION['user_id'], $_SESSION['emp_code'], $_SESSION['emp_code'], $_SESSION['emp_code'], $_SESSION['emp_code'], $_SESSION['emp_code'], $_SESSION['emp_code'], $email_replay_conn);

        $return_arr = array();

        $count = sizeof($table_arr);

        for ($i = 0; $i < $count; $i++) {

            $count_q = $this->db->select('COUNT(id) as count')->where($notifiy_filde[$i], 0)->where($where_filde[$i], $where_filde_value[$i])
                ->get($table_arr[$i])->row()->count;
            array_push($return_arr, $count_q);
        }

        $data['notification'] = $return_arr;
        echo json_encode($data);

    }*/


function get_all_notification()
{

    $table_arr = array('hr_all_agzat_orders', 'hr_all_ozonat_orders', 'hr_solaf', 'arch_notes_history', 'arch_sader_history', 'arch_wared_history', 'email_inbox', 'arch_sader_comments', 'arch_wared_twgehat', 'replay_email','chat');
    $notifiy_filde = array('seen', 'seen', 'seen', 'seen', 'seen', 'seen', 'seen', 'seen', 'seen', 'seen', 'seen');
    $where_filde = array('current_to_user_id', 'current_to_id', 'current_to_user_id', 'to_user_id', 'to_user_id', 'to_user_id', 'email_to_id', 'to_user_id', 'to_user_id', 'receiver_id','receiver_id');
    if ($_SESSION['role_id_fk'] == 3) {
        $email_replay_conn = $_SESSION['emp_code'];
    } else {
        $email_replay_conn = $_SESSION['user_id'];
    }
    $where_filde_value = array($_SESSION['user_id'], $_SESSION['user_id'], $_SESSION['user_id'], $_SESSION['emp_code'], $_SESSION['emp_code'], $_SESSION['emp_code'], $_SESSION['emp_code'], $_SESSION['emp_code'], $_SESSION['emp_code'], $email_replay_conn,$_SESSION['user_id']);

    $return_arr = array();

    $count = sizeof($table_arr);

    for ($i = 0; $i < $count; $i++) {

        $count_q = $this->db->select('COUNT(id) as count')->where($notifiy_filde[$i], 0)->where($where_filde[$i], $where_filde_value[$i])
            ->get($table_arr[$i])->row()->count;
        array_push($return_arr, $count_q);
    }

    $data['notification'] = $return_arr;
    echo json_encode($data);

}

}