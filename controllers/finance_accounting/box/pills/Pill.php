<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pill extends MY_Controller
{


    public function __construct(){
        parent::__construct();
        $this->load->library('pagination');
        $this->load->helper(array('url','text','permission','form'));
        if($this->session->userdata('is_logged_in')==0){
            redirect('login');
        }

        $this->load->model('finance_accounting_model/box/Pill_model');
        $this->load->model('all_Finance_resource_models/all_pills/AllPills_model');

        $this->load->model('system_management/Groups');

        $this->groups=$this->Groups->get_group($_SESSION["group_number"]);
        $this->groups_title=$this->Groups->get_group_title($_SESSION["group_number"]);


        /**********************************************************/
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in  = $this->Counting->get_basic_in_num();
        $this->files_basic_in  = $this->Counting->get_files_basic_in();
        /*************************************************************/


    }

    public function index() //finance_accounting/box/pills/Pill/
    {
       $this->load->model('finance_accounting_model/box/vouch_qbd/Vouch_qbd_model');
      
        $arr=array('value1>'=>0);
        $arr2=array('value2>'=>0);
      
      //  $data['all_pills_inbox'] = $this->Pill_model->select_all_by_fr_all_pills($arr,1);
    //   $data['all_pills_inbox2'] = $this->Pill_model->select_all_by_fr_all_pills($arr2,2);


        $data['all_pills_inbox'] = $this->Pill_model->select_all_by_fr_all_pills();

        $data['publishers'] = $this->Pill_model-> get_all_publisher();
        
        $data['all_sandoq'] = $this->Pill_model->select_total_by_pay_method();

        $data['all_qabd'] = $this->Vouch_qbd_model->get_all_qabds();
        $data['all_sarf'] = $this->Vouch_qbd_model->get_all_sarf();
        
        $data['all_qabd_naqdi'] = $this->Vouch_qbd_model->get_all_qabds_naqdi();
        $data['all_qabd_sheek'] = $this->Vouch_qbd_model->get_all_qabds_sheek();
        
        
        
        $data['all_sarf_naqdi'] = $this->Vouch_qbd_model->get_all_sarf_naqdi();
        $data['all_sarf_sheek'] = $this->Vouch_qbd_model->get_all_sarf_sheek();
        
        
        


        $data['title']="إيصالات الإستلام ";
        $data['subview'] = 'admin/finance_accounting/box/pills/box_pill';
        $this->load->view('admin_index', $data);
    }
    /*************************************************/
  /*  public function add_pill()
    {
          $arr=array('value1>'=>0);
          $arr2=array('value2>'=>0);
          $data['all_pills_inbox'] = $this->Pill_model->get_all_record($arr,1);
          $data['all_pills_inbox2'] = $this->Pill_model->get_all_record($arr2,2);

 if(!empty($this->input->post('qued_num'))) {
            $data['rkm_quod'] = $this->input->post('qued_num');
        }else{
            $data['rkm_quod'] =0;
        }


        $data['pay_method']=$this->input->post('pay_method');
       $data['publisher_text']=$this->input->post('publisher_text');

     $this->load->view('admin/finance_accounting/box/pills/load_page', $data);
    }*/
    
     public function add_pill()
    {
          $arr=array('value1>'=>0);
          $arr2=array('value2>'=>0);
          $data['all_pills_inbox'] = $this->Pill_model->get_all_record($arr,1);
          $data['all_pills_inbox2'] = $this->Pill_model->get_all_record($arr2,2);
          $data['pay_method']=$this->input->post('pay_method');
          $data['publisher_text']=$this->input->post('publisher_text');

        if(!empty($this->input->post('qued_num'))) {
            $data['rkm_quod'] = $this->input->post('qued_num');
        }else{
            $data['rkm_quod'] =0;
        }
       // $data['last_quod'] = $this->Pill_model->select_last_id();
        $data['last_quod'] = $this->Pill_model->select_last_rkm_new();
        


     $this->load->view('admin/finance_accounting/box/pills/load_page', $data);
    }   
    
    

/*public function convert_esal($id)
{
    $data['record'] = $this->Pill_model->insert_test_esal();
    redirect('finance_accounting/box/vouch_qbd/Trahel_vouch_qabd/index/'.$id,'refresh');
}*/
/*
   public function convert_esal($id)
    {


        if($id ==3){
            $data['record'] = $this->Pill_model->insert_test_qued();

            redirect('finance_accounting/box/quods/Quods/Bank_transactions_transfer','refresh');

        }else{
            $data['record'] = $this->Pill_model->insert_test_esal();
            redirect('finance_accounting/box/vouch_qbd/Trahel_vouch_qabd/index/'.$id,'refresh');


        }

    }*/
    
   /* public function convert_esal($id)
    {
        if($id ==3){
            $data['record'] = $this->Pill_model->insert_test_qued();
            $last= $this->Pill_model->select_last_id()-1;
            redirect('finance_accounting/box/pills/Pill','refresh');
        }else{
            $data['record'] = $this->Pill_model->insert_test_esal();
            redirect('finance_accounting/box/vouch_qbd/Trahel_vouch_qabd/index/'.$id,'refresh');
        }
    }*/
    public function convert_esal($id)
    {
//var_dump($id);die;
        if($id ==3){
            /*ECHO '<PRE>';
            print_r($_POST);
            DIE;*/
         /*   $data['record'] = $this->Pill_model->insert_test_qued();
            $last= $this->Pill_model->select_last_id()-1;*/
            $rkm_quod=$this->input->post('rkm_quod');
            $data['record'] = $this->Pill_model->insert_test_qued($rkm_quod);
            $last= $this->Pill_model->select_last_id()-1;

            redirect('finance_accounting/box/pills/Pill','refresh');
        }else{
            $data['record'] = $this->Pill_model->insert_test_esal();
            redirect('finance_accounting/box/vouch_qbd/Trahel_vouch_qabd/index/'.$id,'refresh');

        }
    }


    public function get_all_qued()
    {
        $data['records'] = $this->Pill_model->get_all_qued();
        $this->load->view('admin/finance_accounting/box/pills/load_qued_page', $data);
    }
    /******************/

  public function filter_table()
    {
        $arr = array('value1>' => 0);
        $data['all_pills_inbox'] = $this->Pill_model->get_all_record($arr, 1);
        $this->load->view('admin/finance_accounting/box/pills/load_filter_page', $data);
    }



}