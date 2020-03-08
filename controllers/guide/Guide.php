<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guide extends CI_Controller {

/*	public function __construct()
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
        $this->load->model('guide/Guide_model'); 
    }*/
    
        public function __construct(){
        parent::__construct();
        $this->load->library('pagination');
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }
        $this->load->model('Difined_model');
        $this->load->model('Nationality');
        $this->load->model('Department');
        $this->load->model('human_resources_model/Employee_model');
        $this->load->helper(array('url', 'text', 'permission', 'form'));
        $this->load->model('familys_models/Model_access_rule');
        $this->load->model('system_management/Groups');

        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in  = $this->Counting->get_basic_in_num();
        $this->files_basic_in  = $this->Counting->get_files_basic_in();
        $this->load->model('human_resources_model/employee_setting/Employee_setting');
        $this->load->model('human_resources_model/Finance_employee_model');
        $this->load->model('all_Finance_resource_models/sponsors/Sponsors_model');
        $this->load->model('Difined_model');
       $this->load->model('guide/Guide_model'); 

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
    
    public function accountGuide()
	{
        $data['accounts'] = $this->Guide_model->buildTree(array('hesab_no3'=>1));
		$records = $this->Guide_model->buildTree(array('id!='=>0));
		$data['tree'] = $this->buildTree($records);
		$data['title'] = 'إضافة دليل حسابي';
        $data['subview'] = 'admin/guide/accountGuide';
        $this->load->view('admin_index', $data);
	}

	public function addAccount()
	{
		$this->Guide_model->insert();
        messages('success','تم إضافة الحساب');
        redirect('guide/Guide/accountGuide','refresh'); 
	}
    
    public function getLastSubCode()
    {
        echo $this->Guide_model->lastSubCode(array('parent'=>$this->input->post('id')));
    }

    public function checkValidate()
    {
    	echo json_encode($this->Guide_model->buildTree(array('code'=>$this->input->post('code'))));
    }
    
    public function deleteAccount($id)
    {
        $this->Guide_model->deleteAccount($id);
        messages('success','حذف الحساب');
        redirect('guide/Guide/accountGuide','refresh'); 
    }
    
    public function editAccount($id)
    {
        $data['accounts'] = $this->Guide_model->buildTree(array('hesab_no3'=>1));
		$records = $this->Guide_model->buildTree(array('id!='=>0));
		$data['tree'] = $this->buildTree($records);
        $data['details'] = $this->Guide_model->getAccount($id);
		$data['title'] = 'تعديل دليل حسابي';
        $data['subview'] = 'admin/guide/accountGuide';
        $this->load->view('admin_index', $data);
    }

    public function update($id)
    {
        $this->Guide_model->update($id);
        messages('success','تم تعديل الحساب');
        redirect('guide/Guide/accountGuide','refresh'); 
    }

}

/* End of file Guide.php */
/* Location: ./application/controllers/guide/Guide.php */