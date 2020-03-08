<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dalel extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
        $this->load->library('pagination');
        $this->CI = & get_instance();
        if($this->session->userdata('is_logged_in')==0){
            redirect('login');
        }
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in  = $this->Counting->get_basic_in_num();
        $this->files_basic_in  = $this->Counting->get_files_basic_in(); 
        $this->load->model('finance_accounting_model/Dalel_model'); 
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
    
    public function accountDalel()
	{
        $data['accounts'] = $this->Dalel_model->buildTree(array('hesab_no3'=>1));
		$records = $this->Dalel_model->buildTree(array('id!='=>0));
		$data['tree'] = $this->buildTree($records);
		$data['title'] = 'إضافة دليل حسابي';
        $data['subview'] = 'admin/finance_accounting/dalel/accountDalel';
        $this->load->view('admin_index', $data);
	}

	public function addAccount()
	{
		$this->Dalel_model->insert();
        messages('success','تم إضافة الحساب');
        redirect('finance_accounting/dalel/Dalel/accountDalel','refresh'); 
	}
    
    public function getLastSubCode()
    {
        echo $this->Dalel_model->lastSubCode(array('parent'=>$this->input->post('id')));
    }

    public function checkValidate()
    {
    	$where = array('code'=>$this->input->post('code'),'id!='=>$this->input->post('id'));
    	echo json_encode($this->Dalel_model->checkValidate($where));
    }
    
    public function deleteAccount($id)
    {
        $this->Dalel_model->deleteAccount($id);
        messages('success','حذف الحساب');
        redirect('finance_accounting/dalel/Dalel/accountDalel','refresh'); 
    }
    
    public function editAccount($id)
    {
        $data['accounts'] = $this->Dalel_model->buildTree(array('hesab_no3'=>1));
		$records = $this->Dalel_model->buildTree(array('id!='=>0));
		$data['tree'] = $this->buildTree($records);
        $data['details'] = $this->Dalel_model->getAccount($id);
		$data['title'] = 'تعديل دليل حسابي';
        $data['subview'] = 'admin/finance_accounting/dalel/accountDalel';
        $this->load->view('admin_index', $data);
    }

    public function update($id)
    {
        $this->Dalel_model->update($id);
        messages('success','تم تعديل الحساب');
        redirect('finance_accounting/dalel/Dalel/accountDalel','refresh'); 
    }

}

/* End of file Dalel.php */
/* Location: ./application/controllers/finance_accounting/dalel/Dalel.php */