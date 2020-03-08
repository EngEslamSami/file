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
        $arr=array('value1>'=>0);
        $arr2=array('value2>'=>0);
        $data['all_pills_inbox'] = $this->Pill_model->select_all_by_fr_all_pills($arr,1);

        $data['all_pills_inbox2'] = $this->Pill_model->select_all_by_fr_all_pills($arr2,2);

        $data['publishers'] = $this->Pill_model-> get_all_publisher();




        $data['title']="إيصالات الإستلام ";
        $data['subview'] = 'admin/finance_accounting/box/pills/box_pill';
        $this->load->view('admin_index', $data);
    }
    /*************************************************/
    public function add_pill()
    {
          $arr=array('value1>'=>0);
          $arr2=array('value2>'=>0);
          $data['all_pills_inbox'] = $this->Pill_model->get_all_record($arr,1);
          $data['all_pills_inbox2'] = $this->Pill_model->get_all_record($arr2,2);


        $data['pay_method']=$this->input->post('pay_method');


    

     $this->load->view('admin/finance_accounting/box/pills/load_page', $data);


    }
public function convert_esal($id)
{
    $data['record'] = $this->Pill_model->insert_test_esal();
    redirect('finance_accounting/box/vouch_qbd/Trahel_vouch_qabd/index/'.$id,'refresh');
}

    /******************/





}