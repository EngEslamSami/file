<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ohad_masrofat extends MY_Controller {

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
        $this->load->model('finance_accounting_model/box/ohad/ohad_masrofat/Ohad_masrofat_model'); 
    }

	public function index()
	{
		$data['subview'] = 'admin/finance_accounting/box/ohad/ohad_masrofat/ohad_masrofat';
		$data['title'] = 'تسجيل المصروفات';
		$data['last_id'] = $this->Ohad_masrofat_model->getLastId(array('emp_code'=>$_SESSION['emp_code']))+1;
		$records = $this->Ohad_masrofat_model->getAllAccounts(array('id!='=>0));
        $data['tree'] = $this->buildTree($records);
        $data['records'] = $this->Ohad_masrofat_model->getAllRecords(array('id!='=>0));
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

    public function add()
    {
    	$this->Ohad_masrofat_model->insert_update();
		messages('success','إضافة البيانات');
        redirect('finance_accounting/box/ohad/ohad_masrofat/Ohad_masrofat','refresh');
    }

    public function update($id)
    {
    	$this->Ohad_masrofat_model->insert_update($id);
		messages('success','تعديل البيانات');
        redirect('finance_accounting/box/ohad/ohad_masrofat/Ohad_masrofat','refresh');
    }

    public function delete($id)
    {
    	$this->Ohad_masrofat_model->deleteMain($id);
    	messages('success','حذف البيانات');
        redirect('finance_accounting/box/ohad/ohad_masrofat/Ohad_masrofat','refresh');
    }

    public function updateView($id)
    {
    	$data['subview'] = 'admin/finance_accounting/box/ohad/ohad_masrofat/ohad_masrofat';
		$data['title'] = 'تسجيل المصروفات';
		$records = $this->Ohad_masrofat_model->getAllAccounts(array('id!='=>0));
        $data['tree'] = $this->buildTree($records);
        $data['result'] = $this->Ohad_masrofat_model->getAllRecords(array('id'=>$id))[0];
        $data['arabicValue'] = convertNumber($data['result']->fatora_value).' ريال فقط لا غير';
        $this->load->view('admin_index', $data);
    }

}

/* End of file Ohad_masrofat.php */
/* Location: ./application/controllers/finance_accounting/box/ohad/ohad_masrofat/Ohad_masrofat.php */