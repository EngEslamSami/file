<?php
class Holiday_setting extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }
        $this->load->helper(array('url', 'text', 'permission', 'form'));
        $this->load->model('Difined_model');
        /*  $this->load->model('Nationality');
          $this->load->model('Department');
          $this->load->model('finance_resource_models/Guaranty');
          $this->load->model('finance_resource_models/Endowments');
          $this->load->model('finance_resource_models/Operation_guaranty');
          $this->load->model('finance_resource_models/Donors');
          $this->load->model('finance_resource_models/Donors_gurantee'); */

        $this->load->model('system_management/Groups');
        $this->main_groups = $this->Groups->main_fetch_group();
        $this->groups = $this->Groups->get_group($_SESSION["group_number"]);
        $this->groups_title = $this->Groups->get_group_title($_SESSION["group_number"]);

        /**********************************************************/
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in = $this->Counting->get_basic_in_num();
        $this->files_basic_in = $this->Counting->get_files_basic_in();
        /*************************************************************/
        $this->load->model('human_resources_model/Holiday_model');



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


  public function messages($type,$text,$method=false)
    {
        $CI =& get_instance();
        $CI->load->library("session");
        if($type =='success') {
            return $CI->session->set_flashdata('message','<script> swal({
                    title:"'.$text.'" ,
                    confirmButtonText: "تم"
                })</script>');
        }

        elseif($type=='warning'){
            return $CI->session->set_flashdata('message','<div class="alert alert-warning alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>   !</strong> '.$text.'.</div>');
        }elseif($type=='error'){
            return $CI->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> !</strong> '.$text.'.</div>');
        }

    }


    public function holidays_setting() // human_resources/Holiday_setting/holidays_setting
    {
        if($this->input->post('add')){
            $this->Holiday_model->insert_holiday();
          //   $this->messages('success','برجاء ادخال اعدادت الاجازات الرسميه');
            redirect('human_resources/Holiday_setting/holidays_setting');
        }
        $data['title'] = "إعدادات الاجازات";
        $data['records'] =  $this->Holiday_model->all_holidays();
        $data['subview'] = 'admin/Human_resources/holidays/holidays_settings';
        $this->load->view('admin_index', $data);
    }

    public function update_holidays($id) // human_resources/Holiday_setting/update_holidays
    {
        if($this->input->post('add')){
            $this->Holiday_model->update_holiday($id);
            redirect('human_resources/Holiday_setting/holidays_setting');
        }
        $data['title'] = "تعديل الاجازات";
        $data['record'] =  $this->Holiday_model->getById_holiday($id);
        $data['subview'] = 'admin/Human_resources/holidays/holidays_settings';
        $this->load->view('admin_index', $data);
    }
    public function delete_holidays($id){  // human_resources/Holiday_setting/delete_holidays
        $this->Holiday_model->delete_holiday($id);
        $this->message('success','حذف ');
        redirect('human_resources/Holiday_setting/holidays_setting','refresh');
    }
    
    
        public function add_date() // human_resources/Holiday_setting/add_date
    {
        
        if($this->input->post('add')){
            $this->Holiday_model->insert_date();
           
            $this->messages('success','تمت الاضافة بنجاح');
            redirect('human_resources/Holiday_setting/holidays_setting');
         
        }
       
    }
}