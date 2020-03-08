<?php

class  Report extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }
        $this->load->model('Difined_model');
        $this->load->model("all_Finance_resource_models/all_pills/AllPills_model");

        $this->load->helper(array('url', 'text', 'permission', 'form'));
        $this->load->model('familys_models/Model_access_rule');
        $this->load->model('system_management/Groups');

        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in = $this->Counting->get_basic_in_num();
        $this->files_basic_in = $this->Counting->get_files_basic_in();
        $this->load->model('human_resources_model/employee_setting/Employee_setting');
        $this->load->model('human_resources_model/Finance_employee_model');
        $this->load->model('finance_accounting_model/box/vouch_qbd/Vouch_qbd_model');
        $this->load->model('Difined_model');
        $this->load->model("familys_models/Connection_model");

    }

    public function index()//finance_accounting/box/reports/Report
    {

        //  $this->load->view('admin/finance_accounting/box/pills/load_qued_page', $data);
        $data['title'] = 'تقرير حركه السندات';
        $data['subview'] = 'admin/finance_accounting/box/reports/sand_sarf_qabd_report';
        $this->load->view('admin_index', $data);
    }

    public function make_select()
    {
      $id= $this->input->post('valu');
        $data['type']=$id;
        $this->load->view('admin/finance_accounting/box/reports/load_page',$data);
    }

 public function get_result()
    {
        $data['records']=$this->Vouch_qbd_model->getAllVouchQbdReports();
        $this->load->view('admin/finance_accounting/box/reports/load_report_sand',$data);
    }
    
 /****************************************************************************/
 
 // قائمة 
 
 
   public function all_q_details()//finance_accounting/box/reports/Report/reportStatus
    {
$this->load->model('finance_accounting_model/box/reports/Reports_model');
      $data['all_details'] = $this->Reports_model->select_data_basic_order();
        $data['subview'] = 'admin/finance_accounting/box/reports/q_anshta/test';
        $this->load->view('admin_index', $data);

}
 
 
 /*
  public function reportStatus()//finance_accounting/box/reports/Report/reportStatus
    {



        $data['title'] = 'قائمة الأنشطة  ';
        $data['subview'] = 'admin/finance_accounting/box/reports/q_anshta/reportStatus';
        $this->load->view('admin_index', $data);
    }*/
 
 
 
 
 
 
 /*
    public function get_reportStatus() //finance_accounting/box/reports/Report/get_reportStatus
    {
            $this->load->model('finance_accounting_model/box/reports/Reports_model');

        $data['records']=$this->Reports_model->getAlldalel($_POST['from'],$_POST['to']);

        $this->load->view('admin/finance_accounting/box/reports/q_anshta/get_reportStatus',$data);
    }*/
 
 /**********************************************************************************/
     public function reportStatus()//finance_accounting/box/reports/Report/reportStatus
    {


        $data['title'] = 'قائمة الأنشطة  ';
        $data['subview'] = 'admin/finance_accounting/box/reports/q_anshta/reportStatus';
        $this->load->view('admin_index', $data);
    }

  /*  public function get_reportStatus() //finance_accounting/box/reports/Report/get_reportStatus
    {

        $this->load->model('finance_accounting_model/box/reports/Reports_model');
        if ($this->input->post('status') == 1) {
            $data['records'] = $this->Reports_model->getAlldalel($_POST['from'], $_POST['to']);
            $this->load->view('admin/finance_accounting/box/reports/q_anshta/get_reportStatus', $data);


        }elseif($this->input->post('status') == 2) {

           $date_arr = array('date >=' => strtotime($_POST['from']), 'date <=' => strtotime($_POST['to']));

          $data['records'] = $this->Reports_model->tree_anshta($date_arr);
            $this->load->view('admin/finance_accounting/box/reports/q_anshta/get_reportStatus_total', $data);

        }
    }
 */
 
    public function get_reportStatus() //finance_accounting/box/reports/Report/get_reportStatus
    {

        $this->load->model('finance_accounting_model/box/reports/Reports_model');
        $date_arr = array('date >=' => strtotime($_POST['from']), 'date <=' => strtotime($_POST['to']));

        $data['records'] = $this->Reports_model->tree_anshta($date_arr);

        if ($this->input->post('status') == 1) {
         $this->load->view('admin/finance_accounting/box/reports/q_anshta/get_reportStatus', $data);
        } elseif ($this->input->post('status') == 2) {

        $this->load->view('admin/finance_accounting/box/reports/q_anshta/get_reportStatus_total', $data);

        }
    }

 
   public function buildTree($elements, $parent = 0)
    {
        $branch = array();
        foreach ($elements as $element) {
            if ($element->parent == $parent) {
                $children = $this->buildTree($elements, $element->id);
                if ($children) {
                    $element->subs = $children;
                }
                $branch[$element->id] = $element;
            }
        }
        return $branch;
    }

    public function hesab_movement_report()
    {//finance_accounting/box/reports/Report/hesab_movement_report
        $data['title'] = 'تقرير بحركة حساب';
        $data['subview'] = 'admin/finance_accounting/box/reports/hesab_movement_report/hesab_movement_report';
        $this->load->view('admin_index', $data);
    }


    public function GetbuildTreeTable(){

     $this->load->model('finance_accounting_model/box/quods/Quods_model');
     $records = $this->Quods_model->getAllAccounts(array('id!='=>0));
     $data['tree'] = $this->buildTree($records);
     $this->load->view('admin/finance_accounting/box/reports/hesab_movement_report/GetbuildTreeTable', $data);
    }

/*
    public function get_hesab_movement_report(){
        $this->load->model('finance_accounting_model/box/reports/Reports_model');
         $data['type']     = $this->Reports_model->get_hesab_tabe3a($_POST['rkm_hesab']);
         if($_POST['status'] ==1 ){
             $data['records'] = $this->Reports_model->get_hesab_movement(
                 array('finance_quods_details.date >='=>strtotime($_POST['from']),'finance_quods_details.date <='=>strtotime($_POST['to']),'finance_quods_details.rkm_hesab'=>$_POST['rkm_hesab']));
 $data['totla_sabeq']   =$this->Reports_model->select_Rased_sabeq(strtotime($_POST['from']) , $_POST['rkm_hesab']);

         }

        $this->load->view('admin/finance_accounting/box/reports/hesab_movement_report/get_hesab_movement_report', $data);
    }
*/

 /*********************************************************/
 
 
 
 
  public function TreeTableReport(){
//finance_accounting/box/reports/Report/TreeTableReport
        $this->load->model('finance_accounting_model/box/reports/TreeTableReportModel');

        $data['records'] = $this->TreeTableReportModel->tree();
         $data['array'] = $this->TreeTableReportModel->tree();
        $data['title'] = 'تقرير بحركة حساب';
        $data['subview'] = 'admin/finance_accounting/box/reports/TreeTableReport/TreeTableReport';
        $this->load->view('admin_index', $data);


    }
    
    
      /*  public function get_hesab_movement_report(){
        $this->load->model('finance_accounting_model/box/reports/Reports_model');
         $data['hesab_name'] = $this->Reports_model->Get_hesab_name($_POST['rkm_hesab']);
         $data['type']     = $this->Reports_model->get_hesab_tabe3a($_POST['rkm_hesab']);
         if($_POST['status'] ==1 ){
             $data['records'] = $this->Reports_model->get_hesab_movement(
                 array('finance_quods_details.date >='=>strtotime($_POST['from']),'finance_quods_details.date <='=>strtotime($_POST['to']),'finance_quods_details.rkm_hesab'=>$_POST['rkm_hesab']));
           $data['totla_sabeq']   =$this->Reports_model->select_Rased_sabeq(strtotime($_POST['from']) , $_POST['rkm_hesab']);
             $this->load->view('admin/finance_accounting/box/reports/hesab_movement_report/get_hesab_movement_report', $data);

         }elseif ($_POST['status'] ==2){
             $arr ='';
             if(!empty($_POST['rkm_hesab'])){
                $arr =array('code'=>$_POST['rkm_hesab']);
             }
             $data['records'] = $this->Reports_model->tree($arr);
             $this->load->view('admin/finance_accounting/box/reports/hesab_movement_report/get_hesab_movement_report2', $data);


         }

    }*/
    
    
    /*        public function get_hesab_movement_report(){
        $this->load->model('finance_accounting_model/box/reports/Reports_model');
         $data['hesab_name'] = $this->Reports_model->Get_hesab_name($_POST['rkm_hesab']);
         $data['type']     = $this->Reports_model->get_hesab_tabe3a($_POST['rkm_hesab']);
         if($_POST['status'] ==1 ){
             $data['records'] = $this->Reports_model->get_hesab_movement(
                 array('finance_quods_details.date >='=>strtotime($_POST['from']),'finance_quods_details.date <='=>strtotime($_POST['to']),'finance_quods_details.rkm_hesab'=>$_POST['rkm_hesab']));
           $data['totla_sabeq']   =$this->Reports_model->select_Rased_sabeq(strtotime($_POST['from']) , $_POST['rkm_hesab']);
             $this->load->view('admin/finance_accounting/box/reports/hesab_movement_report/get_hesab_movement_report', $data);

         }elseif ($_POST['status'] ==2){
             $arr ='';
             if(!empty($_POST['rkm_hesab'])){
                $arr =array('code'=>$_POST['rkm_hesab']);
             }
             $date_arr = array('date >=' => strtotime($_POST['from']), 'date <=' => strtotime($_POST['to']));

             $data['records'] = $this->Reports_model->tree($arr,$date_arr);
     
             $this->load->view('admin/finance_accounting/box/reports/hesab_movement_report/get_hesab_movement_report2', $data);


         }

    }*/
/******************************************************************/    
    
    
   /*   public function get_hesab_movement_report(){
        $this->load->model('finance_accounting_model/box/reports/Reports_model');
         $data['hesab_name'] = $this->Reports_model->Get_hesab_name($_POST['rkm_hesab']);
         $data['type']     = $this->Reports_model->get_hesab_tabe3a($_POST['rkm_hesab']);
         if($_POST['status'] ==1 ){
             $data['records'] = $this->Reports_model->get_hesab_movement(
                 array('finance_quods_details.date >='=>strtotime($_POST['from']),'finance_quods_details.date <='=>strtotime($_POST['to']),'finance_quods_details.rkm_hesab'=>$_POST['rkm_hesab']));
           $data['totla_sabeq']   =$this->Reports_model->select_Rased_sabeq(strtotime($_POST['from']) , $_POST['rkm_hesab']);
             $this->load->view('admin/finance_accounting/box/reports/hesab_movement_report/get_hesab_movement_report', $data);

         }elseif ($_POST['status'] ==2){
             $arr ='';
             if(!empty($_POST['rkm_hesab'])){
                $arr =array('parent_code'=>$_POST['rkm_hesab']);
             }
             $date_arr = array('date >=' => strtotime($_POST['from']), 'date <=' => strtotime($_POST['to']));
             $data['records'] = $this->Reports_model->tree($arr,$date_arr);
             $this->load->view('admin/finance_accounting/box/reports/hesab_movement_report/get_hesab_movement_report2', $data);
         }
	  }*/
      
          public function get_hesab_movement_report()
    {
        $this->load->model('finance_accounting_model/box/reports/Reports_model');
        $data['hesab_name'] = $this->Reports_model->Get_hesab_name($_POST['rkm_hesab']);
        $data['type']     = $this->Reports_model->get_hesab_tabe3a($_POST['rkm_hesab']);
        if ($_POST['status'] ==1) {
            $data['records'] = $this->Reports_model->get_hesab_movement(
                 array('finance_quods_details.date >='=>strtotime($_POST['from']),'finance_quods_details.date <='=>strtotime($_POST['to']),'finance_quods_details.rkm_hesab'=>$_POST['rkm_hesab'])
             );
             $data['totla_sabeq']   =$this->Reports_model->select_Rased_sabeq(strtotime($_POST['from']) , $_POST['rkm_hesab']);
            $this->load->view('admin/finance_accounting/box/reports/hesab_movement_report/get_hesab_movement_report', $data);
        } elseif ($_POST['status'] ==2) {
            $arr ='';
            if (!empty($_POST['rkm_hesab'])) {
                $arr =array('parent_code'=>$_POST['rkm_hesab']);
                $check_data =$this->Reports_model->check_rkm_hesab_dalel($arr);
                if (empty($check_data)) {
                    $arr =array('code'=>$_POST['rkm_hesab']);
                }
            }
            $date_arr = array('date >=' => strtotime($_POST['from']), 'date <=' => strtotime($_POST['to']));

            $data['records'] = $this->Reports_model->tree($arr, $date_arr);

            $this->load->view('admin/finance_accounting/box/reports/hesab_movement_report/get_hesab_movement_report2', $data);
        }
    }

    

}