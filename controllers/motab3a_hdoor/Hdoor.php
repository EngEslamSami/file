<?php

class Hdoor extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }

        $this->load->helper(array('url', 'text', 'permission', 'form'));
        $this->load->model('motab3a_hdoor_m/Hdoor_model');

    }
    
     
    public function hdoor_emps()  //motab3a_hdoor/Hdoor/hdoor_emps
    {
        

        $data['title']="متابعه الحضور اليومي";
        $day_now= strtotime(date("Y-m-d"));
       
        $arr=array('date_hdoor_absence'=>$day_now);

        $data['emps']=$this->Hdoor_model->get_hdoor_day($arr);



        $data['subview'] = 'admin/motab3a_hdoor_v/hdoor_emps';
        $this->load->view('admin_index', $data);
    }


    public function get_hdoor_emps()
    {
        $day_now= strtotime(date("Y-m-d"));
        $arr=array('date_hdoor_absence'=>$day_now);

        $data['emps']=$this->Hdoor_model->get_hdoor_day($arr);

        $this->load->view('admin/motab3a_hdoor_v/load_hdoor_emps', $data);
    }
    
    
    }