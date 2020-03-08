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

/*	public function index()
	{
        $this->load->model('finance_accounting_model/dalel/Dalel_model');
        $this->load->model('finance_accounting_model/box/vouch_qbd/Vouch_qbd_model');
        $data['banks_setting'] = $this->Dalel_model->getBanks();
        $data['banks'] = $this->Difined_model->select_all('banks_settings','','','id','asc');
        $data['box_date'] = $this->Vouch_qbd_model->get_hesab_data(1,2);
        $records = $this->Vouch_sarf_model->getAllAccounts(array('id!='=>0));
        $data['tree'] = $this->buildTree($records);
		$data['title'] = 'إضافة سند صرف';
        $data['all_qabd_naqdi'] = $this->Vouch_qbd_model->get_all_qabds_naqdi();
        $data['all_qabd_sheek'] = $this->Vouch_qbd_model->get_all_qabds_sheek();
        $data['all_sarf_naqdi'] = $this->Vouch_qbd_model->get_all_sarf_naqdi();
        $data['all_sarf_sheek'] = $this->Vouch_qbd_model->get_all_sarf_sheek();
        $data['subview'] = 'admin/finance_accounting/box/vouch_sarf/vouch_sarf';
        $data['box'] = $this->Vouch_sarf_model->getBox(array('type'=>2));
        $data['last_id'] = $this->Vouch_sarf_model->getLastId(array('id!='=>0))+1;
        $data['records'] = $this->Vouch_sarf_model->getAllVouchSarf();
        
           $data['sheeks'] = $this->Difined_model->select_all('finance_sanad_qabd_sheek','','','id','asc');
        $this->load->view('admin_index', $data);
	}*/

	public function add()
	{
	   /*
	  echo '<pre>';
       print_r($_POST);
       die;*/
       
        $inserted_id = $this->Vouch_sarf_model->insert_update();
        $files = $this->upload_muli_image('sarf_files', "images/finance_accounting/box/vouch_sarf");
        $this->Vouch_sarf_model->insert_update_datails($inserted_id);
        $this->Vouch_sarf_model->insert_update_files($files, $inserted_id);
        
        $method = $this->input->post('pay_method_sarf');
		messages('printSanad',$inserted_id,$method);
        
	//	messages('success','إضافة سند صرف');
    
       $rkm= $_POST['rqm_sanad'];
        $this->PrintMessage('print',$rkm); 
    
        redirect('finance_accounting/box/vouch_sarf/Vouch_sarf','refresh');
	}

    /*public function updateView($id)
    {
        $this->load->model('finance_accounting_model/box/vouch_qbd/Vouch_qbd_model');
        $this->load->model('finance_accounting_model/dalel/Dalel_model');
        $data['banks_setting'] = $this->Dalel_model->getBanks();
        $data['banks'] = $this->Difined_model->select_all('banks_settings','','','id','asc');
        $data['box'] = $this->Vouch_sarf_model->getBox(array('type'=>2));
        $records = $this->Vouch_sarf_model->getAllAccounts(array('id!='=>0));
        $data['result'] = $this->Vouch_sarf_model->findById($id);
        $data['arabicNum'] = convertNumber($data['result']->total_value);
        $data['tree'] = $this->buildTree($records);
        $data['all_qabd_naqdi'] = $this->Vouch_qbd_model->get_all_qabds_naqdi();
        $data['all_qabd_sheek'] = $this->Vouch_qbd_model->get_all_qabds_sheek(); 
        $data['all_sarf_naqdi'] = $this->Vouch_qbd_model->get_all_sarf_naqdi();
        $data['all_sarf_sheek'] = $this->Vouch_qbd_model->get_all_sarf_sheek();
        $data['attached_files'] = $this->Difined_model->select_search_key('finance_sanad_sarf_attaches', 'rqm_sanad_fk', $id);
        $data['title'] = 'إضافة سند صرف';
        $data['subview'] = 'admin/finance_accounting/box/vouch_sarf/vouch_sarf';
        $this->load->view('admin_index', $data);
    }
*/



/*	public function index()
	{
        $this->load->model('finance_accounting_model/dalel/Dalel_model');
        $this->load->model('finance_accounting_model/box/vouch_qbd/Vouch_qbd_model');
        $data['banks_setting'] = $this->Dalel_model->getBanks();
        $data['banks'] = $this->Difined_model->select_all('banks_settings','','','id','asc');
        $data['box_date'] = $this->Vouch_qbd_model->get_hesab_data(1,2);
        $records = $this->Vouch_sarf_model->getAllAccounts(array('id!='=>0));
        $data['tree'] = $this->buildTree($records);
		$data['title'] = 'إضافة سند صرف';
        
        
        $data['all_qabd_naqdi'] = $this->Vouch_qbd_model->get_all_qabds_naqdi();
        $data['all_qabd_sheek'] = $this->Vouch_qbd_model->get_all_qabds_sheek();
        
        
        
        $data['all_sarf_naqdi'] = $this->Vouch_qbd_model->get_all_sarf_naqdi();
        $data['all_sarf_sheek'] = $this->Vouch_qbd_model->get_all_sarf_sheek();


        $data['subview'] = 'admin/finance_accounting/box/vouch_sarf/vouch_sarf';
        $data['box'] = $this->Vouch_sarf_model->getBox(array('type'=>2));
        $data['last_id'] = $this->Vouch_sarf_model->getLastId(array('id!='=>0))+1;
        $data['records'] = $this->Vouch_sarf_model->getAllVouchSarf();
        
          $cond=array('from_esalat'=> 1);
        $data['sheeks'] = $this->Vouch_sarf_model->select_all('finance_sanad_qabd_sheek','','','id','asc',$cond);//32-3-om
        
       //    $data['sheeks'] = $this->Difined_model->select_all('finance_sanad_qabd_sheek','','','id','asc');
//        $this->test($data['records']);
        $this->load->view('admin_index', $data);
	}
*/



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

        $data['all_qabd_naqdi'] = $this->Vouch_qbd_model->get_all_qabds_naqdi();
        $data['all_qabd_sheek'] = $this->Vouch_qbd_model->get_all_qabds_sheek();

        $data['all_sarf_naqdi'] = $this->Vouch_qbd_model->get_all_sarf_naqdi();
        $data['all_sarf_sheek'] = $this->Vouch_qbd_model->get_all_sarf_sheek();

        $data['subview'] = 'admin/finance_accounting/box/vouch_sarf/vouch_sarf';
        $data['box'] = $this->Vouch_sarf_model->getBox(array('type'=>2));
        $data['last_id'] = $this->Vouch_sarf_model->getLastId(array('id!='=>0))+1;
        $data['records'] = $this->Vouch_sarf_model->getAllVouchSarf();
        $data['geha_table'] =$this->Vouch_sarf_model->select_gehat();
        $this->load->view('admin_index', $data);
	}


    public function updateView($id)
    {
        $this->load->model('finance_accounting_model/box/vouch_qbd/Vouch_qbd_model');
        $this->load->model('finance_accounting_model/dalel/Dalel_model');
        $data['banks_setting'] = $this->Dalel_model->getBanks();
        $data['banks'] = $this->Difined_model->select_all('banks_settings','','','id','asc');
        $data['box'] = $this->Vouch_sarf_model->getBox(array('type'=>2));
        $records = $this->Vouch_sarf_model->getAllAccounts(array('id!='=>0));
        $data['result'] = $this->Vouch_sarf_model->findById($id);
        $data['arabicNum'] = convertNumber($data['result']->total_value);
        $data['tree'] = $this->buildTree($records);
        $data['geha_table'] =$this->Vouch_sarf_model->select_gehat();
        $data['all_qabd_naqdi'] = $this->Vouch_qbd_model->get_all_qabds_naqdi();
        $data['all_qabd_sheek'] = $this->Vouch_qbd_model->get_all_qabds_sheek();
          if(!empty( $data['result'])){

            $data['all_banks'] = $this->Vouch_sarf_model->select_all_by_condition(array("society_main_banks_account.type"=>2),"society_main_banks_account.bank_id_fk");
            $data['bank_accounts_arr'] =$this->Vouch_sarf_model->select_all_by_condition(
                array('society_main_banks_account.bank_id_fk'=>$data['result']->sheek_bank_id),'');

            $data['hesab_data'] =$this->Vouch_sarf_model->select_all_by_condition(
                array('type'=>2,'society_main_banks_account.bank_id_fk'=>$data['result']->sheek_bank_id,'society_main_banks_account.account_id_fk'=>$data['result']->bank_account_id_fk),'');
        }
        $data['all_sarf_naqdi'] = $this->Vouch_qbd_model->get_all_sarf_naqdi();
        $data['all_sarf_sheek'] = $this->Vouch_qbd_model->get_all_sarf_sheek();
        $data['attached_files'] = $this->Difined_model->select_search_key('finance_sanad_sarf_attaches', 'rqm_sanad_fk', $id);
        $data['title'] = 'إضافة سند صرف';
        $data['subview'] = 'admin/finance_accounting/box/vouch_sarf/vouch_sarf';
        $this->load->view('admin_index', $data);
    }

  /*  public function updateView($id)
    {
        $this->load->model('finance_accounting_model/box/vouch_qbd/Vouch_qbd_model');
        $this->load->model('finance_accounting_model/dalel/Dalel_model');
        $data['banks_setting'] = $this->Dalel_model->getBanks();
        $data['banks'] = $this->Difined_model->select_all('banks_settings','','','id','asc');
        $data['box'] = $this->Vouch_sarf_model->getBox(array('type'=>2));
        $records = $this->Vouch_sarf_model->getAllAccounts(array('id!='=>0));
        $data['result'] = $this->Vouch_sarf_model->findById($id);
        $data['arabicNum'] = convertNumber($data['result']->total_value);
        $data['tree'] = $this->buildTree($records);
        
        
        $data['all_qabd_naqdi'] = $this->Vouch_qbd_model->get_all_qabds_naqdi();
        $data['all_qabd_sheek'] = $this->Vouch_qbd_model->get_all_qabds_sheek();
        
        
        
        $data['all_sarf_naqdi'] = $this->Vouch_qbd_model->get_all_sarf_naqdi();
        $data['all_sarf_sheek'] = $this->Vouch_qbd_model->get_all_sarf_sheek();

       // $data['all_sarf_sheek_data'] = $this->Vouch_sarf_model->getfinance_sanad_sarf_sheek_data($data['result']->rqm_sanad);
       // $this->test( $data['result']->rqm_sanad);
       // $this->test($data['result']);

      //  $data['sheeks'] = $this->Difined_model->select_all('finance_sanad_qabd_sheek','','','id','asc');

         $cond=array('from_esalat'=> 1);
        $data['sheeks'] = $this->Vouch_sarf_model->select_all('finance_sanad_qabd_sheek','','','id','asc',$cond);//32-3-om

        $data['attached_files'] = $this->Difined_model->select_search_key('finance_sanad_sarf_attaches', 'rqm_sanad_fk', $id);
        $data['title'] = 'إضافة سند صرف';
        $data['subview'] = 'admin/finance_accounting/box/vouch_sarf/vouch_sarf';
        $this->load->view('admin_index', $data);
    }
*/


    public function update($id,$rkm,$rqm_saned)
    {
//        dd($_POST);
        messages('success','تعديل سند صرف');
        $this->Vouch_sarf_model->delete_datails($id);
        $inserted_id = $this->Vouch_sarf_model->insert_update($id,$rkm,$rqm_saned);
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
    
    /*	public function printSanedSarf($id){ // finance_accounting/box/vouch_sarf/Vouch_sarf/printSanedSarf

        $data['result'] = $this->Vouch_sarf_model->findById($id);
        $this->load->view('admin/finance_accounting/box/vouch_sarf/print_saned_sarf', $data);
    }*/
    
     	public function printSanedSarf(){ // finance_accounting/box/vouch_sarf/Vouch_sarf/printSanedSarf
            $id=$this->input->post('row_id');
        $data['result'] = $this->Vouch_sarf_model->findById($id);
        
         $data["mohaseb"]=$this->Vouch_sarf_model->get_emp_assigns(502); 
         $data["modeer_mali"]=$this->Vouch_sarf_model->get_emp_assigns(501);
        $this->load->view('admin/finance_accounting/box/vouch_sarf/print_saned_sarf', $data);
    }
    
    
    public function printSheek($id,$bankId)
    {
        $data['recordSheek'] = $this->Vouch_sarf_model->getSettingById($bankId);
        $data['dataSheek'] = $this->Vouch_sarf_model->getDataSheek($id);
        $data['arabicNumber'] = convertNumber($data['dataSheek']['total_value']);
        $this->load->view('admin/finance_accounting/box/vouch_sarf/printSheek',$data);
    }
    
   /* function get_pay_method_page(){
        $data['banks'] = $this->Difined_model->select_all('banks_settings','','','id','asc');
        $this->load->view('admin/finance_accounting/box/vouch_sarf/pay_method_load_page', $data);
    }*/
    
    function get_pay_method_page(){
  //  $data['sheeks'] = $this->Difined_model->select_all('finance_sanad_qabd_sheek','','','id','asc');//32-3-om
    $data['banks'] = $this->Difined_model->select_all('banks_settings','','','id','asc');
    $this->load->view('admin/finance_accounting/box/vouch_sarf/pay_method_load_page', $data);
}
    
/*************************************/
public function get_sheeks(){
    $values_sheeks=$this->input->post('values_sheeks');
    $data['id']=$this->input->post('id');
    $data['sheeks'] = $this->Vouch_sarf_model->get_sheeks($values_sheeks);
    $this->load->view('admin/finance_accounting/box/vouch_sarf/get_sheeks', $data);
}




  public function get_search_pills(){




        $field=$this->input->post('array_search_id');
        if($field=='pay_method')
        {
            $valu=$this->input->post('select_search_id');

        }else{
            $valu=$this->input->post('input_search_id');

        }

        if($field !='' &&  $valu !=''){
            if($_POST['array_search_id'] =='byan' ||  $_POST['array_search_id'] =='name_hesab'){

                $data['details']= $this->Vouch_sarf_model->getdetailsByarr($field,$valu);


            }elseif($_POST['array_search_id'] =='sheek_num'){

                $data['details']= $this->Vouch_sarf_model->getsheekDetails($field,$valu);
            }else{

                $data['details']= $this->Vouch_sarf_model->get_all_pill_search($field,$valu);
            }



            $this->load->view('admin/finance_accounting/box/vouch_sarf/load_search_details',$data );

        }
    }





		    function PrintMessage($type ,$valu){
        $CI =& get_instance();
        $CI->load->library("session");
        if ($type=='print') {
            return $CI->session->set_flashdata('message',
                '
<script src="https://cdn.jsdelivr.net/npm/sweetalert2"></script>
<script>
		   Swal.fire({
            title: " هل تريد طباعة سند الصرف ؟",
            text: "",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            cancelButtonText: "لا, إلغاء الأمر!",
            confirmButtonText: "نعم, قم بالطباعة!"
        }).then((result) => {
            if (result.value) {
           
                window.location.href = "'.base_url().'finance_accounting/box/vouch_sarf/Vouch_sarf/printSanedSarfByRkm/'.$valu.'"   ;
            }
        })

            </script>');
        }
    }

   public function printSanedSarfByRkm($rkm){
        $data['result'] = $this->Vouch_sarf_model->findByRqm_sanad($rkm);
        $this->load->view('admin/finance_accounting/box/vouch_sarf/print_saned_sarf', $data);
    }


 public function insert_geha_ajax(){  //finance_accounting/box/vouch_sarf/Vouch_sarf
        $this->Vouch_sarf_model->insert_geha();
        $data['table'] =$this->Vouch_sarf_model->select_gehat();
     //  print_r(  $data['table'] );
         $this->load->view('admin/finance_accounting/box/all_gehat/finance_geha_load_page',$data);
    }
    public function getById(){
        $id= $this->input->post('id');
        $geha =$this->Vouch_sarf_model->get_geha_by_id($id);
        echo json_encode($geha);
    }
    public function update_geha(){
        $id= $this->input->post('id');
        $this->Vouch_sarf_model->update_geah($id);
        $data['table'] =$this->Vouch_sarf_model->select_gehat();

        $this->load->view('admin/finance_accounting/box/all_gehat/finance_geha_load_page',$data);

    }
    public function delete_geha(){
        $id = $this->input->post('id');

        $x= $this->Vouch_sarf_model->delete_geha($id);

        $data['table'] =$this->Vouch_sarf_model->select_gehat();
        $this->load->view('admin/finance_accounting/box/all_gehat/finance_geha_load_page',$data);

    }
    
    
    
        public function change_condition_text(){
         

    $this->Vouch_sarf_model->change_condition_text();
 echo json_encode($_POST);
    }
    
    
    
      public function Get_tahweel_banky(){

        $data_load['all_banks'] = $this->Vouch_sarf_model->select_all_by_condition(array("society_main_banks_account.type"=>2),"society_main_banks_account.bank_id_fk");

        $this->load->view('admin/finance_accounting/box/vouch_sarf/tahweel_banky_load_page', $data_load);
    }



    public function GetByArray(){

        if($_POST['type'] === 'getAccount'){
            $data =$this->Vouch_sarf_model->select_all_by_condition(array('society_main_banks_account.bank_id_fk'=>$_POST['id']),'');
        }elseif ($_POST['type'] === 'getAccountNum'){
            $data =$this->Vouch_sarf_model->select_all_by_condition(
                array('type'=>2,'society_main_banks_account.bank_id_fk'=>$_POST['bank_id'],'society_main_banks_account.account_id_fk'=>$_POST['id']),'');
        }
        echo json_encode($data);

    }  
 /**********************************/
     public function add_sarf_family(){
        /*
        echo '<pre>';
        print_r($_POST);
        die;*/
        $inserted_id = $this->Vouch_sarf_model->insert_update_sarf_family();
        $files = $this->upload_muli_image('sarf_files', "images/finance_accounting/box/vouch_sarf");
        $this->Vouch_sarf_model->insert_update_datails($inserted_id);
        $this->Vouch_sarf_model->insert_update_files($files, $inserted_id);

        $method = $this->input->post('pay_method_sarf');
        messages('printSanad',$inserted_id,$method);
        $rkm= $_POST['rqm_sanad'];
        $this->PrintMessage('print',$rkm);
        redirect('finance_accounting/box/vouch_sarf/Vouch_sarf','refresh');
    }
  /* public function sarf_family()
    {
        $this->load->model('finance_accounting_model/dalel/Dalel_model');
        $this->load->model('finance_accounting_model/box/vouch_qbd/Vouch_qbd_model');
        $this->load->model('Model_family_cashing');

        $this->load->model('finance_accounting_model/box/quods/Quods_model');
        $data['alert'] = $this->Model_family_cashing->getLastRecord();
        $data['all_banks'] = $this->Vouch_sarf_model->select_all_by_condition(array("society_main_banks_account.type"=>2),"society_main_banks_account.bank_id_fk");
        $data['arabicNum'] = convertNumber($data['alert']['total_value']);
        $data['all_data']=$this->Model_family_cashing->select_finance_sarf_order( array('finance_sarf_order.cashing_date ='=>strtotime(date("Y-m-d")),'finance_sarf_order.approved'=>1));
        $data['main'] = $this->Quods_model->main_data();

        $data['banks_setting'] = $this->Dalel_model->getBanks();
        $data['banks'] = $this->Difined_model->select_all('banks_settings','','','id','asc');
        $data['box_date'] = $this->Vouch_qbd_model->get_hesab_data(1,2);
        $records = $this->Vouch_sarf_model->getAllAccounts(array('id!='=>0));
        $data['tree'] = $this->buildTree($records);


        $data['all_qabd_naqdi'] = $this->Vouch_qbd_model->get_all_qabds_naqdi();
        $data['all_qabd_sheek'] = $this->Vouch_qbd_model->get_all_qabds_sheek();

        $data['all_sarf_naqdi'] = $this->Vouch_qbd_model->get_all_sarf_naqdi();
        $data['all_sarf_sheek'] = $this->Vouch_qbd_model->get_all_sarf_sheek();

        $data['box'] = $this->Vouch_sarf_model->getBox(array('type'=>2));
        $data['last_id'] = $this->Vouch_sarf_model->getLastId(array('id!='=>0))+1;
        $data['records'] = $this->Vouch_sarf_model->getAllVouchSarf();
        $data['geha_table'] =$this->Vouch_sarf_model->select_gehat();

        $data['title'] = 'إضافة سند صرف';
        $data['subview'] = 'admin/finance_accounting/box/vouch_sarf/sarf_family';
        $this->load->view('admin_index', $data);
    }  */
    
        public function sarf_family()
    {
        $this->load->model('finance_accounting_model/dalel/Dalel_model');
        $this->load->model('finance_accounting_model/box/vouch_qbd/Vouch_qbd_model');
        $this->load->model('Model_family_cashing');

        $this->load->model('finance_accounting_model/box/quods/Quods_model');
        $data['alert'] = $this->Model_family_cashing->getLastRecord();
        $data['all_banks'] = $this->Vouch_sarf_model->select_all_by_condition(array("society_main_banks_account.type"=>2),"society_main_banks_account.bank_id_fk");
        $data['arabicNum'] = convertNumber($data['alert']['total_value']);
      //  $data['all_data']=$this->Model_family_cashing->select_finance_sarf_order( array('finance_sarf_order.approved'=>1));
        $data['all_data']=$this->Model_family_cashing->select_finance_sarf_order( array('finance_sarf_order.cashing_date ='=>strtotime(date("Y-m-d")),'finance_sarf_order.approved'=>1));

        $data['main'] = $this->Quods_model->main_data();

  /*      echo "<pre>";
        print_r($data['alert']);
        echo "</pre>";
        die;*/
        $data['banks_setting'] = $this->Dalel_model->getBanks();
        $data['banks'] = $this->Difined_model->select_all('banks_settings','','','id','asc');
        $data['box_date'] = $this->Vouch_qbd_model->get_hesab_data(1,2);
        $records = $this->Vouch_sarf_model->getAllAccounts(array('id!='=>0));
        $data['tree'] = $this->buildTree($records);


        $data['all_qabd_naqdi'] = $this->Vouch_qbd_model->get_all_qabds_naqdi();
        $data['all_qabd_sheek'] = $this->Vouch_qbd_model->get_all_qabds_sheek();

        $data['all_sarf_naqdi'] = $this->Vouch_qbd_model->get_all_sarf_naqdi();
        $data['all_sarf_sheek'] = $this->Vouch_qbd_model->get_all_sarf_sheek();

        $data['box'] = $this->Vouch_sarf_model->getBox(array('type'=>2));
        $data['last_id'] = $this->Vouch_sarf_model->getLastId(array('id!='=>0))+1;
        $data['records'] = $this->Vouch_sarf_model->getAllVouchSarf();
        $data['geha_table'] =$this->Vouch_sarf_model->select_gehat();
//check_value
        $data['title'] = 'إضافة سند صرف';
        $data['subview'] = 'admin/finance_accounting/box/vouch_sarf/sarf_family';
        $this->load->view('admin_index', $data);
    } 
}

/* End of file Vouch_sarf.php */
/* Location: ./application/controllers/finance_accounting/box/vouch_sarf/Vouch_sarf.php */