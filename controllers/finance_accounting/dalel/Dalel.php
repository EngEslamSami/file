<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dalel extends MY_Controller {

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
        $this->load->model('finance_accounting_model/dalel/Dalel_model'); 
         $this->dalel_accounts = array();
    }

/*	public function buildTree($elements, $parent = 0) 
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
    */
  /*  public function accountDalel()
	{
        $data['accounts'] = $this->Dalel_model->buildTree(array('hesab_no3'=>1));
		$records = $this->Dalel_model->buildTree(array('id!='=>0));
		$data['tree'] = $this->buildTree($records);
		$data['title'] = 'إضافة دليل حسابي';
        $data['subview'] = 'admin/finance_accounting/dalel/accountDalel';
        $this->load->view('admin_index', $data);
	}
*/
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
        $this->Dalel_model->deleteTreeNodes($id);
        messages('success','حذف الحساب');
        redirect('finance_accounting/dalel/Dalel/accountDalel','refresh'); 
    }
    
   /* public function editAccount($id)
    {
        $data['accounts'] = $this->Dalel_model->buildTree(array('hesab_no3'=>1));
		$records = $this->Dalel_model->buildTree(array('id!='=>0));
		$data['tree'] = $this->buildTree($records);
        $data['details'] = $this->Dalel_model->getAccount($id);
		$data['title'] = 'تعديل دليل حسابي';
        $data['subview'] = 'admin/finance_accounting/dalel/accountDalel';
        $this->load->view('admin_index', $data);
    }*/

   /* public function update($id)
    {
        $this->Dalel_model->update($id);
        messages('success','تم تعديل الحساب');
        redirect('finance_accounting/dalel/Dalel/accountDalel','refresh'); 
    }
    */
    
    public function getParentData()
    {
        echo json_encode($this->Dalel_model->getAccount($this->input->post('id')));
    }
    
    
    
  /*     public function R_finance(){
       // $this->load->model('finance_accounting_model/Reports');
        $data['records'] = $this->Dalel_model->tree();
        $data['title'] = ' تقرير كل الحسابات تفصيلي';
        $data['subview'] = 'admin/finance_accounting/dalel/R_accounts_group_details';
        $this->load->view('admin_index', $data);

    }
    */
    
       public function R_finance()
    {
        $this->load->model('finance_accounting_model/box/reports/TreeTableReportModel');
        $data['records'] = $this->TreeTableReportModel->tree();
        $data['title'] = ' تقرير كل الحسابات تفصيلي';
        $data['subview'] = 'admin/finance_accounting/dalel/R_accounts_group_details';
        $this->load->view('admin_index', $data);

    }
    
    
    
  /****************************************************************/
  
  public function belad()
	{
        
        
        $data['subview'] = 'admin/finance_accounting/sheeks/blad';
        $this->load->view('admin_index', $data);
	}  
  
   public function enmaa()
	{
        
        
        $data['subview'] = 'admin/finance_accounting/sheeks/enma';
        $this->load->view('admin_index', $data);
	}   
    
       public function rajhi()
	{
        
        
        $data['subview'] = 'admin/finance_accounting/sheeks/rajhi';
        $this->load->view('admin_index', $data);
	}   
    
         public function auto_sheek()
	{
        
        
        $data['subview'] = 'admin/finance_accounting/sheeks/auto_sheek';
       // $data['subview'] = 'admin/finance_accounting/sheeks/auto_sheek_2';
        $this->load->view('admin_index', $data);
	}   
    
    
    
    
    
        public function R_finance_period(){
        // $this->load->model('finance_accounting_model/Reports');
        $data['records'] = $this->Dalel_model->tree();
        $data['title'] = ' ميزان المراجعة';
        $data['subview'] = 'admin/finance_accounting/dalel/R_finance_period';
        $this->load->view('admin_index', $data);

    }
   /* public function get_finance_period_data(){


        $this->load->model('finance_accounting_model/dalel/Dalel_model');
        $date_arr = array('date >=' =>$this->input->post('from'), 'date <=' =>$this->input->post('to'));
        $data['records'] = $this->Dalel_model->tree_dates(strtotime($this->input->post('from')),strtotime($this->input->post('to')));


        $this->load->view('admin/finance_accounting/dalel/get_finance_period_data', $data);
    }*/
    

    /*
    public function get_finance_period_data()
    {
        $this->load->model('finance_accounting_model/box/reports/TreeTableReportModel');
        $this->load->model('finance_accounting_model/dalel/Dalel_model');
        $date_arr = array('date >=' => strtotime($this->input->post('from')), 'date <=' => strtotime($this->input->post('to')));
        $data['records'] = $this->TreeTableReportModel->tree_date($date_arr);
        $this->load->view('admin/finance_accounting/dalel/get_finance_period_data', $data);
    }
    
    */
      /*  public function get_finance_period_data()
    {
        $this->load->model('finance_accounting_model/box/reports/TreeTableReportModel');
        $this->load->model('finance_accounting_model/dalel/Dalel_model');
        $date_arr = array('date >=' => strtotime($this->input->post('from')), 'date <=' => strtotime($this->input->post('to')));

       if($_POST['status'] ==1){
           $data['records'] = $this->TreeTableReportModel->tree_date2($date_arr);
       }elseif($_POST['status'] ==2){
           $data['records'] = $this->TreeTableReportModel->tree_date($date_arr);

       }


        $this->load->view('admin/finance_accounting/dalel/get_finance_period_data', $data);
    }
    */
    
    
    

    public function get_finance_period_data()
    {
        $this->load->model('finance_accounting_model/box/reports/TreeTableReportModel');
        $date_arr = array('date >=' => strtotime($this->input->post('from')), 'date <=' => strtotime($this->input->post('to')));
       $data['records'] = $this->TreeTableReportModel->tree_date($date_arr);

        if($_POST['status'] ==1){

              $this->load->view('admin/finance_accounting/dalel/get_finance_period_data_sub', $data);

          }elseif ($_POST['status'] ==2){

              $this->load->view('admin/finance_accounting/dalel/get_finance_period_data_total', $data);

          }

    
    }
    
    
    
    
     /*public function treeDalel()
	{
        $data['accounts'] = $this->Dalel_model->buildTree(array('hesab_no3'=>1));
		$records = $this->Dalel_model->buildTree(array('id!='=>0));
		$data['tree'] = $this->buildTree($records);
		$data['title'] = 'شجرة الدليل المحاسبي';
        $data['subview'] = 'admin/finance_accounting/dalel/treedalel';
        $this->load->view('admin_index', $data);
	}*/
    
    
       /* public function dalel_rased()
	{
       // $data['accounts'] = $this->Dalel_model->buildTree(array('hesab_no3'=>1));
		$records = $this->Dalel_model->buildTree(array('id!='=>0));
		$data['tree'] = $this->buildTree($records);
		$data['title'] = 'أرصدة الحسابات';
        $data['subview'] = 'admin/finance_accounting/dalel/dalel_rased';
        $this->load->view('admin_index', $data);
	}*/


    public function accountDalel()
    {
        $data['from_id'] = 0;

        $data["marakez"] = $this->Dalel_model->select_markez();

        $data['title'] = 'إضافة دليل حسابي';
        $data['subview'] = 'admin/finance_accounting/dalel/accountDalel';
        $this->load->view('admin_index', $data);
    }

  /*  public function add_editAccounDalel()
    {
        $id = $this->input->post('id');
        $method = $this->input->post('method');
        $data["marakez"] = $this->Dalel_model->select_markez();
        $data['id']=$id;
        $data['method']=$method;
        if ($method == 2) {
            $data['details'] = $this->Dalel_model->getAccount($id);
            $data['title'] = 'تعديل دليل حسابي';
        }elseif ($method == 1){
            $data['title'] = 'اضافة دليل حسابي';
        }
        $this->load->view('admin/finance_accounting/dalel/load_edit_account', $data);
    }
*/

public function add_editAccounDalel()
{
    $id = $this->input->post('id');
    $method = $this->input->post('method');
    $code = $this->input->post('code');
    $data['parent'] = $this->Dalel_model->get_parent($code);

    $data["marakez"] = $this->Dalel_model->select_markez();
    $data['id']=$id;
    $data['method']=$method;
    if ($method == 2) {
        $data['details'] = $this->Dalel_model->getAccount($id);
        $data['title'] = 'تعديل دليل حسابي';
    }elseif ($method == 1){
        $data['title'] = 'اضافة دليل حسابي';
    }
    $this->load->view('admin/finance_accounting/dalel/load_edit_account', $data);
}

    public function buildTree_dalel_accounts($records, $count)
    {

        $types = array(1 => 'رئيسي', 2 => 'فرعي');
        $nature = array('', 'مدين', 'دائن');
        $follow = array(1 => 'ميزانية', 2 => 'قائمة الأنشطة');
        //$color = array(1=>'#ec9732', 2=>'#c07852', 3=>'#75bf67', 4=>'#b6ab2d', 5=>'#145b5d', 6=>'#3088d8', 7=>'#4d92a7', 8=>'#ef6c02', 9=>'#a69fb9', 10=>'#67351b', 11=>'#b6ea47', 12=>'#e18091', 13=>'#f5f44d', 14=>'#a63daa', 15=>'#fb1f73', 16=>'#9b9a92', 17=>'#8f0e0b', 18=>'#397631', 19=>'#074183', 20=>'#cab11e');
        $color = array(1 => '#ec9732', 2 => '#c07852', 3 => '#75bf67', 4 => '#b6ab2d', 5 => '#09b6bb', 6 => '#3088d8', 7 => '#4d92a7', 8 => '#ef6c02', 9 => '#a69fb9', 10 => '#67351b', 11 => '#b6ea47', 12 => '#e18091', 13 => '#f5f44d', 14 => '#a63daa', 15 => '#fb1f73', 16 => '#9b9a92', 17 => '#8f0e0b', 18 => '#397631', 19 => '#074183', 20 => '#cab11e');

        foreach ($records as $record) {
            $record->types = $types[$record->hesab_no3];
            $record->nature = $nature[$record->hesab_tabe3a];
            $record->follow = $follow[$record->hesab_report];
            array_push($this->dalel_accounts, $record);
            if (isset($record->subs)) {
                $count = $this->buildTree_dalel_accounts($record->subs, $count++);
            }
        }
        return $count;


    }

    public function dalel_accounts()
    {
        $records = $this->Dalel_model->buildTree(array('id!=' => 0));
        $this->buildTree_dalel_accounts($records, 0);
        $data['tree'] = $this->dalel_accounts;
        $data['title'] = 'إضافة دليل حسابي';
        $data['subview'] = 'admin/finance_accounting/dalel/dalel_accounts';
        $this->load->view('admin_index', $data);
    }



    public function editAccount($id)
    {
        $data["marakez"] = $this->Dalel_model->select_markez();

        if ($this->input->post('id')) {
            $data['from_id'] = $this->input->post('id');
            $data['details'] = $this->Dalel_model->getAccount($id);
            $data['title'] = 'تعديل دليل حسابي';
            $this->load->view('admin/finance_accounting/dalel/accountDalel', $data);
        } else {
            $data['from_id'] = 0;

            $data['details'] = $this->Dalel_model->getAccount($id);
            $data['title'] = 'تعديل دليل حسابي';
            $data['subview'] = 'admin/finance_accounting/dalel/accountDalel';
            $this->load->view('admin_index', $data);
        }


    }

    public function update($id)
    {
        if ($this->input->post('from_ajex')) {
            $method = $this->input->post('method');
            switch ($method) {
                case 1:
                    $this->Dalel_model->update($id);
                    break;
                case 2:
                    $this->Dalel_model->update_mrakez_taklefa($id);

                    break;
                case 0:
                    $this->Dalel_model->update_ajex($id);
                    break;
            }
        } else {
            $this->Dalel_model->update($id);
            messages('success', 'تم تعديل الحساب');
            redirect('finance_accounting/dalel/Dalel/accountDalel', 'refresh');

        }
    }





    public function treeDalel()
    {
        $data['accounts'] = $this->Dalel_model->buildTree(array('hesab_no3' => 1));
        $records = $this->Dalel_model->buildTree(array('id!=' => 0));
        $data['tree'] = $this->buildTree($records);
        $data['title'] = 'شجرة الدليل المحاسبي';
        $data['subview'] = 'admin/finance_accounting/dalel/treedalel';
        $this->load->view('admin_index', $data);
    }


    public function dalel_rased()
    {
        ////$data['accounts'] = $this->Dalel_model->buildTree(array('hesab_no3'=>1));
        //$records = $this->Dalel_model->buildTree(array('id!='=>0));
        //$data['tree'] = $this->buildTree($records);
        $from = strtotime(date('01-01-2019'));
        $to = strtotime(date('d-m-Y'));

        $this->load->model('finance_accounting_model/box/reports/TreeTableReportModel');
        $date_arr = array('date >=' => $from,'date <=' => $to);
        $data['records'] = $this->TreeTableReportModel->tree_date($date_arr);

        $data['title'] = 'أرصدة الحسابات';
        $data['subview'] = 'admin/finance_accounting/dalel/dalel_rased';
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

//	14-1-om
    public function buildTreeTable($tree, $count = 1)

    {
        foreach ($tree as $record) {
            $branch[] = $record;
            if (isset($record->subs)) {
                $count = $this->buildTreeTable($record->subs, $count++);
            }
        }
        return $branch;
    }


    public function getConnection_account()
    {
        $accounts = $this->Dalel_model->buildTree(array('hesab_no3' => 1));
        $data['tree'] = $this->buildTree($accounts);
        $this->load->view('admin/finance_accounting/dalel/load_accounts_pop', $data);
    }

    public function load_dalel_details()
    {
        $code = $this->input->post('code');
        $data['result'] = $this->Dalel_model->GetById($code);
        $this->load->view('admin/finance_accounting/dalel/load_dalel_details', $data);
    }

    public function GetDiv_tree()
    {
        $data['from_id'] = 0;
        $records = $this->Dalel_model->buildTree(array('id!=' => 0));
        $data['tree'] = $this->buildTree($records);
        $this->load->view('admin/finance_accounting/dalel/load_dalel_tree', $data);
    }

}

/* End of file Dalel.php */
/* Location: ./application/controllers/finance_accounting/dalel/Dalel.php */