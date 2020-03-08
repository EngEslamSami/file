<?php
class Employee_settings extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }
        $this->load->model('about/About');
        $this->load->model('about/News');
        $this->load->model('about/Main_data');
        $this->load->model('Difined_model');
        $this->load->helper(array('url', 'text', 'permission', 'form'));

        $this->load->model('system_management/Groups');
        $this->load->model('administrative_affairs_models/employee_setting/Employee_setting');
        $this->main_groups = $this->Groups->main_fetch_group();
        $this->groups = $this->Groups->get_group($_SESSION["group_number"]);
        $this->groups_title = $this->Groups->get_group_title($_SESSION["group_number"]);
    }

    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }


    public function employee_setting() // administrative_affairs_setting/Employee_settings/employee_setting
    {
        $data['badlat'] = $this->Employee_setting->select_all_badlat();
        $data['timeWork'] = $this->Employee_setting->select_time_work();
        $data['ozonat'] = $this->Employee_setting->select_ozonat_num();

        $data['title'] = "اعدادات الموظفين";
        $data['subview'] = 'admin/administrative_affairs/employee_setting/employee_settings';
        $this->load->view('admin_index', $data);
    }

    public function insert_badlat()
    {
        $this->Employee_setting->delete_badlat();
        $this->Employee_setting->insert_badlat();
        redirect('administrative_affairs_setting/Employee_settings/employee_setting');
    }

    public function add_time_work()
    {
        $this->Employee_setting->delete_timeWork();
        $this->Employee_setting->add_time_work();
        redirect('administrative_affairs_setting/Employee_settings/employee_setting');
    }


    public function add_ozon()
    {
        $this->Employee_setting->delete_ozon();
        $this->Employee_setting->add_ozon();
        redirect('administrative_affairs_setting/Employee_settings/employee_setting');
    }
}
