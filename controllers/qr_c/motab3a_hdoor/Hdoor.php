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
        $this->load->model('qr_m/motab3a_hdoor_m/Hdoor_model');
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in  = $this->Counting->get_basic_in_num();
        $this->files_basic_in  = $this->Counting->get_files_basic_in(); 

    }
    
     
    public function hdoor_emps()  //qr_c/motab3a_hdoor/Hdoor/hdoor_emps
    {
        

        $data['title']="متابعه الحضور والانصراف اليومي";
        $day_now= strtotime(date("Y-m-d"));
       
        $arr=array('date'=>$day_now);

        $data['emps']=$this->Hdoor_model->get_hdoor_day($arr);



        $data['subview'] = 'admin/qr_v/motab3a_hdoor_v/hdoor_emps';
        $this->load->view('admin_index', $data);
    }


    public function get_hdoor_emps()
    {
        $day_now= strtotime(date("Y-m-d"));
        $arr=array('date'=>$day_now);

        $data['emps']=$this->Hdoor_model->get_hdoor_day($arr);
       
    
        

        $this->load->view('admin/qr_v/motab3a_hdoor_v/load_hdoor_emps', $data);
    }
    
    
    }