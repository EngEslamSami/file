<?php

class Gam3iaVisitors extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->CI = &get_instance();
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
        $this->load->model('Difined_model');
        $this->load->model('familys_models/lagna_model/Committee_model');

        $this->main_groups = $this->Groups->main_fetch_group();
        $this->groups = $this->Groups->get_group($_SESSION["group_number"]);
        $this->groups_title = $this->Groups->get_group_title($_SESSION["group_number"]);
        $this->load->model('society_system/Gam3iaVisitor');



    }

    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }

    private function message($type, $text)
    {
        if ($type == 'success') {
            return $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> تم بنجاح!</strong> ' . $text . '.</div>');
        } elseif ($type == 'wiring') {
            return $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> تحذير  !</strong> ' . $text . '.</div>');
        } elseif ($type == 'error') {
            return $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>خطأ!</strong> ' . $text . '.</div>');
        }
    }


    public function addGam3iaVisitors($id=0)// society_system/Gam3iaVisitors/addGam3iaVisitors
    {
        //$this->test(  $id);
        if ($this->input->post('add')) {
            $this->Gam3iaVisitor->insertGam3iaVisitors($id);
            $this->message('success','تم إضافة بنجاح');
            redirect('society_system/Gam3iaVisitors/addGam3iaVisitors', 'refresh');
        }
        $this->load->model('human_resources_model/Employee_model');
        $emp_id=$_SESSION['emp_code'];
        $data['record']=$this->Employee_model->get_one_employee($emp_id);
        $data['records']=$this->Gam3iaVisitor->get_all_record();
        if($id != 0){
            $data['result']=$this->Gam3iaVisitor->get_one_vesitor($id);
            $data['records']= '';
        }
        
        $data['title'] = "بيانات الزائرين";
        $data['subview'] = 'admin/society_system/gam3ia_visitors/add_visitors';
        $this->load->view('admin_index', $data);
    }

    public function deleteGam3iaVisitors($id)// society_system/Gam3iaVisitors/deleteGam3iaVisitors
    {

        $this->Gam3iaVisitor->deleteGam3iaVisitors($id);
        $this->message('success', 'تم الحذف بنجاح');
        redirect('society_system/Gam3iaVisitors/addGam3iaVisitors', 'refresh');
    }

  


    


}
?>