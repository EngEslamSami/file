<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vouch_sarf extends MY_Controller {

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
        $this->load->model('finance_accounting_model/box/vouch_sarf/Vouch_sarf_model'); 
        $this->load->model('Difined_model'); 
    }

    private function upload_muli_image($input_name, $folder)
    {
        if(!empty($_FILES[$input_name])){
        $filesCount = count($_FILES[$input_name]['name']);
        for ($i = 0; $i < $filesCount; $i++) {
            $_FILES['userFile']['name'] = $_FILES[$input_name]['name'][$i];
            $_FILES['userFile']['type'] = $_FILES[$input_name]['type'][$i];
            $_FILES['userFile']['tmp_name'] = $_FILES[$input_name]['tmp_name'][$i];
            $_FILES['userFile']['error'] = $_FILES[$input_name]['error'][$i];
            $_FILES['userFile']['size'] = $_FILES[$input_name]['size'][$i];
            $all_img[] = $this->upload_image("userFile", $folder);
        }
        return $all_img;
        }
    }

    private function upload_image($file_name, $folder)
    {
        $config['upload_path'] = 'uploads/' . $folder;
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf';
        $config['encrypt_name'] = true;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($file_name)) {
            return false;
        } else {
            $datafile = $this->upload->data();
            return $datafile['file_name'];
        }
    }
    private function test($data = array()){
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }

	public function index()
	{
        $this->load->model('finance_accounting_model/dalel/Dalel_model');
        $this->load->model('finance_accounting_model/box/vouch_qbd/Vouch_qbd_model');
        $data['banks_setting'] = $this->Dalel_model->getBanks();
        $data['banks'] = $this->Difined_model->select_all('banks_settings','','','id','asc');
        $data['box_date'] = $this->Vouch_qbd_model->get_hesab_data(1,2);
        $records = $this->Vouch_sarf_model->getAllAccounts(array('id!='=>0));
        $data['tree'] = $this->buildTree($records);
		$data['title'] = 'إضافة سند صرف';

//        $this->test($data['banks_setting']);
        $data['subview'] = 'admin/finance_accounting/box/vouch_sarf/vouch_sarf';
        $data['box'] = $this->Vouch_sarf_model->getBox(array('type'=>2));
        $data['last_id'] = $this->Vouch_sarf_model->getLastId(array('id!='=>0))+1;
        $data['records'] = $this->Vouch_sarf_model->getAllVouchSarf();
//        $this->test($data['records']);
        $this->load->view('admin_index', $data);
	}

	public function add()
	{
        $inserted_id = $this->Vouch_sarf_model->insert_update();
        $files = $this->upload_muli_image('sarf_files', "images/finance_accounting/box/vouch_sarf");
        $this->Vouch_sarf_model->insert_update_datails($inserted_id);
        $this->Vouch_sarf_model->insert_update_files($files, $inserted_id);
		messages('success','إضافة سند صرف');
        redirect('finance_accounting/box/vouch_sarf/Vouch_sarf','refresh');
	}

    public function updateView($id) 
    {
        $this->load->model('finance_accounting_model/dalel/Dalel_model');
        $data['banks_setting'] = $this->Dalel_model->getBanks();
        $data['banks'] = $this->Difined_model->select_all('banks_settings','','','id','asc');
        $data['box'] = $this->Vouch_sarf_model->getBox(array('type'=>2));
        $records = $this->Vouch_sarf_model->getAllAccounts(array('id!='=>0));
        $data['result'] = $this->Vouch_sarf_model->findById($id);
        $data['arabicNum'] = convertNumber($data['result']->total_value);
        $data['tree'] = $this->buildTree($records);
        $data['attached_files'] = $this->Difined_model->select_search_key('finance_sanad_sarf_attaches', 'rqm_sanad_fk', $id);
        $data['title'] = 'إضافة سند صرف';
        $data['subview'] = 'admin/finance_accounting/box/vouch_sarf/vouch_sarf';
        $this->load->view('admin_index', $data);
    }

    public function update($id)
    {
        messages('success','تعديل سند صرف');
        $this->Vouch_sarf_model->delete_datails($id);
        $inserted_id = $this->Vouch_sarf_model->insert_update($id);
        $this->Vouch_sarf_model->insert_update_datails($inserted_id);
        $files = $this->upload_muli_image('sarf_files', "images/finance_accounting/box/vouch_sarf");
        $this->Vouch_sarf_model->insert_update_files($files, $id);
        redirect('finance_accounting/box/vouch_sarf/Vouch_sarf','refresh');
    }

    public function deleteVouchSarf($id)
    {
        messages('success','حذف سند صرف');
        $this->Vouch_sarf_model->delete($id);
        $this->Vouch_sarf_model->deleteFiles($id, 'sarf_num_fk', 'finance_sanad_sarf_attaches');
        redirect('finance_accounting/box/vouch_sarf/Vouch_sarf','refresh');
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
        echo $this->Vouch_sarf_model->getAccount(array('code'=>$this->input->post('code'), 'hesab_no3'=>2))['name'];
    }

    public function deleteVouchSarfFiles($id, $sanadId)
    {
        messages('success', 'حذف مرفق صرف');
        $this->Vouch_sarf_model->deleteFiles($id, 'id', 'finance_sanad_sarf_attaches');
        redirect('finance_accounting/box/vouch_sarf/Vouch_sarf/updateView/'.$sanadId, 'refresh');
    }
    public function getBankSetting(){


        if($_POST['bank_id'] and $_POST['code']){
            $data['hesab_name'] = $this->Vouch_sarf_model->getBankData($_POST['bank_id'],$_POST['code']);
            $data['cheek_num'] = $this->Vouch_sarf_model->getBanCheekNum($_POST['bank_id']);
        }
        echo json_encode($data);

    }

    public function get_hesab_data()
    {
        $this->load->model('finance_accounting_model/box/vouch_qbd/Vouch_qbd_model');
        if($_POST['hesab']){
            $data = $this->Vouch_qbd_model->get_hesab_data($_POST['hesab'],2);
            echo json_encode($data);

        }
    }
    
    /*******************************************/
    
    	public function printSanedSarf($id){ // finance_accounting/box/vouch_sarf/Vouch_sarf/printSanedSarf

        $data['result'] = $this->Vouch_sarf_model->findById($id);
        $this->load->view('admin/finance_accounting/box/vouch_sarf/print_saned_sarf', $data);
    }

}

/* End of file Vouch_sarf.php */
/* Location: ./application/controllers/finance_accounting/box/vouch_sarf/Vouch_sarf.php */