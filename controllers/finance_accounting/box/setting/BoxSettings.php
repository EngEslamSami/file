<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BoxSettings extends MY_Controller {

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
        $this->load->model('finance_accounting_model/box/setting/BoxSetting');
        $this->load->model('Difined_model');
    }

    private function test($data = array()){
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }

    public function boxSetting($type = 'qabd',$typeSend = 1) // finance_accounting/box/setting/BoxSettings/boxSetting
    {
        if(isset($_POST['save'])){
            messages('success','تم إضافة إعدادات حساب الصندوق');
            $this->BoxSetting->delete_datails($typeSend);
            $this->BoxSetting->insert_update_datails($typeSend);

            redirect('finance_accounting/box/setting/BoxSettings/boxSetting/'.$type.'/'.$typeSend,'refresh');
        }
        $records = $this->BoxSetting->getAllAccounts(array('id!='=>0));
        $data['qadbRecords'] = $this->Difined_model->select_search_key('finance_box_setting','type',1);
        $data['sarfRecords'] = $this->Difined_model->select_search_key('finance_box_setting','type',2);
        $data['general_members'] = $this->Difined_model->select_all('general_assembley_members','','','id','asc');
        $data['box_date'] = $this->Difined_model->getById('dalel',24);
        $data['edart'] = $this->Difined_model->select_search_key('department_jobs','from_id_fk',0);//department_jobs
        $data['typee'] = $type;

//        $this->test($data['box_date']);

        $data['last_id'] = $this->BoxSetting->select_last_id();

        $data['tree'] = $this->buildTree($records);



        $data['title'] = 'إعدادات حساب الصندوق';
        $data['subview'] = 'admin/finance_accounting/box/setting/box_settings';
        $this->load->view('admin_index', $data);
    }


    public function get_emps()
    {
        if($this->input->post('edara_id')) {
            $id = $this->input->post('edara_id');
            $data['records'] = $this->Difined_model->select_search_key('employees', 'administration', $id);
            $this->load->view('admin/finance_accounting/box/setting/get_option_select', $data);
        } if($this->input->post('gamya')) {
         $data['records'] = $this->Difined_model->select_all('general_assembley_members','','','id','asc');
         $this->load->view('admin/finance_accounting/box/setting/get_option_select_general', $data);
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

    public function getValueArabic()
    {
        echo convertNumber($this->input->post('number'));
    }

    public function getAccountName()
    {
        echo $this->BoxSetting->getAccount(array('code'=>$this->input->post('code'), 'hesab_no3'=>2))['name'];
    }


   public function deleteSetting($id,$type)
    {
        $this->BoxSetting->deleteSetting($id);
        messages('success','تم حذف إعداد حساب الصندوق');
        redirect('finance_accounting/box/setting/BoxSettings/boxSetting/'.$type,'refresh');
    }
}

/* End of file Vouch_qbd.php */
/* Location: ./application/controllers/finance_accounting/box/vouch_qbd/Vouch_qbd.php */