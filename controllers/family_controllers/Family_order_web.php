<?php

/**
 * Created by PhpStorm.
 * User: nnnnn
 * Date: 14/02/2019
 * Time: 12:19 م
 */
class Family_order_web extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }

        $this->load->helper(array('url', 'text', 'permission', 'form'));
        $this->load->model('system_management/Groups');
        $this->load->model('familys_models/for_dash/Counting');

        $this->load->model('familys_models/web_model/Family_web_profile','family_web_profile');
       

        $this->groups = $this->Groups->get_group($_SESSION["group_number"]);
        $this->groups_title = $this->Groups->get_group_title($_SESSION["group_number"]);
        $this->count_basic_in = $this->Counting->get_basic_in_num();
        $this->files_basic_in = $this->Counting->get_files_basic_in();
        
      

    }

    private function message($type, $text)
    {
        if ($type == 'success') {
            return $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> تم بنجاح!</strong> ' . $text . '.</div>');
        } elseif ($type == 'wiring') {
            return $this->session->set_flashdata('message', '<div class="alert alert-dwarning alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> تحذير  !</strong> ' . $text . '.</div>');
        } elseif ($type == 'error') {
            return $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>خطأ!</strong> ' . $text . '.</div>');
        }
    }

    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }

    public function index()
    {//family_controllers/Family_order_web

//        $data['orders'] = $this->family_web_profile->select_details_order_web();

        $data['orders'] = $this->family_web_profile->select_all_order_web();
//        $this->test($data['orders']);
        $data['title'] = "عرض طلبات الخدمة الواردة من البوابة ";
        $data['subview'] = 'admin/familys_views/family_order_web/family_order_web_view';
        $this->load->view('admin_index', $data);
    }

    public function get_details_order()
    {
        $orser_id = $this->input->post('order_id');
        $data['orders'] = $this->family_web_profile->select_details_order_web($orser_id);
//        echo json_encode($data['orders']);
        $this->load->view('admin/familys_views/family_order_web/details_order_view_pop', $data);

    }
}