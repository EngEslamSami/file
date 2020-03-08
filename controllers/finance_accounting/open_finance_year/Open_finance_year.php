<?php

class Open_finance_year  extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }
        $this->load->helper(array('url', 'text', 'permission', 'form'));

        /**********************************************************/
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in = $this->Counting->get_basic_in_num();
        $this->files_basic_in = $this->Counting->get_files_basic_in();
        /*************************************************************/
        $this->load->model('system_management/Groups');

        $this->load->model('Public_relations/Report_model');


        $this->groups = $this->Groups->get_group($_SESSION["group_number"]);
        $this->groups_title = $this->Groups->get_group_title($_SESSION["group_number"]);
//        C:\Program Files\Ampps\www\L_abnaa\application\models\finance_accounting_model\open_finance_year\open_finance_year_model.php

        $this->load->model('finance_accounting_model/open_finance_year/Open_finance_year_model');
    }
    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }
    public function index(){ //finance_accounting\open_finance_year\Open_finance_year

//$this->test($_SESSION);
      $data['all'] =$this->Open_finance_year_model->select_all();
      $data['last'] =$this->Open_finance_year_model->select_last_row();
//        $this->test( $data['last']);
        $data['title'] = 'فتح سنة المالية  ';
        $data['title2'] = ' قائمة السنوات المالية  ';
        $data['metakeyword'] = ' السنوات المالية  ';
        $data['subview'] = 'admin/finance_accounting/open_finance_year/open_finance_year_view';
        $this->load->view('admin_index',$data);

    }

    public function add_year(){

        $this->Open_finance_year_model->insert();
        redirect("finance_accounting/open_finance_year/Open_finance_year","refresh");

    }
    public function update_year(){
        $this->Open_finance_year_model->update();
        redirect("finance_accounting/open_finance_year/Open_finance_year","refresh");



    } public function delet_year($id){

    $this->Open_finance_year_model->delete($id);
    redirect("finance_accounting/open_finance_year/Open_finance_year","refresh");



    }
}