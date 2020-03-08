<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quods extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        if($this->session->userdata('is_logged_in') == 0){
            redirect('login');
        }
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in  = $this->Counting->get_basic_in_num();
        $this->files_basic_in  = $this->Counting->get_files_basic_in();
        $this->load->model('finance_accounting_model/box/quods/Quods_model');
        $this->load->model('Difined_model');
    }

    private function test($data = array()){
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }

	public function add_quods($id=false) // finance_accounting/box/quods/Quods/add_quods
	{
     if($this->input->post('action') ===  'action'){

         messages('success','تم إضافة قيد');
         $this->Quods_model->insert($id);
         redirect('finance_accounting/box/quods/Quods/add_quods','refresh');

     }else{
         $records = $this->Quods_model->getAllAccounts(array('id!='=>0));
         $data['records'] = $this->Quods_model->getAllquod('');

         if($id != 0){
             $data['result'] = $this->Quods_model->getAllquod(array('id'=>$id))[0];
             //$this->test($data['result'] );
         }
         $data['tree'] = $this->buildTree($records);
         $data['last_id'] = $this->Quods_model->select_last_id();
         $data['title'] = 'إضافة قيد';
         $data['subview'] = 'admin/finance_accounting/box/quods/add_quods';
         $this->load->view('admin_index', $data);
     }

	}





    public function deleteQuod($id)
    {
        messages('success','تم حذف قيد');

       $this->Quods_model->delete($id);
        redirect('finance_accounting/box/quods/Quods/add_quods','refresh');
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

    public function getValueArabic()
    {
        echo convertNumber($this->input->post('number'));
    }

    public function getAccountName()
    {
        echo $this->Quods_model->getAccount(array('code'=>$this->input->post('code'), 'hesab_no3'=>2))['name'];
    }

}


