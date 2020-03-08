<?php
class Report extends  MY_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        if($this->session->userdata('is_logged_in')==0){
            redirect('login');
        }
        /**********************************************************/
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in  = $this->Counting->get_basic_in_num();
        $this->files_basic_in  = $this->Counting->get_files_basic_in();
        /*************************************************************/
        $this->load->helper(array('url','text','permission','form'));

        $this->load->model('system_management/Groups');

        $this->groups=$this->Groups->get_group($_SESSION["group_number"]);
        $this->groups_title=$this->Groups->get_group_title($_SESSION["group_number"]);
        $this->load->library('google_maps');

        $this->load->model('human_resources_model/attendance/reports/Report_model');

    }
    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }
    public function report(){ // human_resources/attendance/reports/Report/report

      // $text='image.jpge';
      // $text=str_replace($text,'.jpge','.jpg');
      // echo $text;
      // die;
       $data['all_emps']= $this->Report_model->get_all_emp();

        $data['title'] = " تقرير الحضور والانصراف ";
        $data['subview'] = 'admin/Human_resources/attendance/reports/report_view';
        $this->load->view('admin_index', $data);
    }
    public function search_result(){
        $type_report=$this->input->post('type_report');
        // echo 'date :: '. strtotime('2030-12-30');
        // die;
        
        if ($type_report == 1) {
        //   $data['result']= $this->Report_model->search_result();
          $data['result']= $this->Report_model->get_all_data_hdoor();
        //   $this->test($data['result']);
          $this->load->view('admin/Human_resources/attendance/reports/search_result', $data);

        }elseif ($type_report == 2) {
          $data['result']= $this->Report_model->get_total_report();
          $this->load->view('admin/Human_resources/attendance/reports/search_result_total', $data);
        }

    }
}
