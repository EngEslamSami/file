<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vouch_qbd extends MY_Controller {

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
        $this->load->model('finance_accounting_model/box/vouch_qbd/Vouch_qbd_model'); 
    }

	public function index()
	{
        $records = $this->Vouch_qbd_model->getAllAccounts(array('id!='=>0));
        $data['tree'] = $this->buildTree($records);
		$data['title'] = 'إضافة سند قبض';
        $data['subview'] = 'admin/finance_accounting/box/vouch_qbd/vouch_qbd';
        $this->load->view('admin_index', $data);
	}

	public function add()
	{
		messages('success','تم إضافة سند قبض');
        redirect('finance_accounting/box/vouch_qbd/Vouch_qbd','refresh'); 
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
        echo $this->Vouch_qbd_model->getAccount(array('code'=>$this->input->post('code'), 'hesab_no3'=>2))['name'];
    }

}

/* End of file Vouch_qbd.php */
/* Location: ./application/controllers/finance_accounting/box/vouch_qbd/Vouch_qbd.php */