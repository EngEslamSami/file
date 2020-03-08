<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Finance_ohda_setting extends MY_Controller
{


    public function __construct(){
        parent::__construct();
        $this->load->library('pagination');
        $this->load->helper(array('url','text','permission','form'));
        if($this->session->userdata('is_logged_in')==0){
            redirect('login');
        }


        $this->load->model('system_management/Groups');
        $this->load->model('finance_accounting_model/box/vouch_qbd/Vouch_qbd_model');
        $this->load->model('finance_accounting_model/box/ohad/ohda_settings/Finance_ohda_settings');



        $this->groups=$this->Groups->get_group($_SESSION["group_number"]);
        $this->groups_title=$this->Groups->get_group_title($_SESSION["group_number"]);


        /**********************************************************/
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in  = $this->Counting->get_basic_in_num();
        $this->files_basic_in  = $this->Counting->get_files_basic_in();
        /*************************************************************/


    }

    public function index()// finance_accounting/box/ohad/finance_ohda_setting/Finance_ohda_setting
    {
       $data['title']="اعدادات العهده";
        $records = $this->Vouch_qbd_model->getAllAccounts(array('id!='=>0));

        $data['tree'] = $this->buildTree($records);

        if($this->input->post('add'))
        {
         $this->Finance_ohda_settings->insert_data();
          //  return;
       // $this->messages('success','تمت الاضافه بنجاح');

            redirect('finance_accounting/box/ohad/Finance_ohda_setting/Finance_ohda_setting','refresh');

        }
         $data['records']=$this->Finance_ohda_settings->get_all_records();
        $data['subview'] = 'admin/finance_accounting/box/ohad/ohad_settings/ohad_settings';
         $this->load->view('admin_index', $data);
}
    

    public function update_view($id)
    {
        $data['row']=$this->Finance_ohda_settings->get_by_id($id);
       // print_r($data['row']);
        $data['title']="تعديل العهده";
        $records = $this->Vouch_qbd_model->getAllAccounts(array('id!='=>0));

        $data['tree'] = $this->buildTree($records);

        if($this->input->post('add'))
        {
            $this->Finance_ohda_settings->update_data($id);
            //  return;
            //$this->messages('success','تم التعديل بنجاح');

            redirect('finance_accounting/box/ohad/Finance_ohda_setting/Finance_ohda_setting','refresh');

        }
        $data['subview'] = 'admin/finance_accounting/box/ohad/ohad_settings/ohad_settings';
        $this->load->view('admin_index', $data);
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


    public function delete_rec($id)
    {
        $this->Finance_ohda_settings->delete_record($id);
        redirect('finance_accounting/box/ohad/Finance_ohda_setting/Finance_ohda_setting','refresh');

    }

    public function check_db()
    {
        $id=$this->input->post('valu');
        echo $this->Finance_ohda_settings->get_by_id_type($id);

    }

}