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

    //"images/finance_accounting/box/quods"
    private function upload_muli_image($input_name,$folder){
        if(!empty($_FILES[$input_name]['name'])){
        $filesCount = count($_FILES[$input_name]['name']);
        for($i = 0; $i < $filesCount; $i++){
            $_FILES['userFile']['name'] = $_FILES[$input_name]['name'][$i];
            $_FILES['userFile']['type'] = $_FILES[$input_name]['type'][$i];
            $_FILES['userFile']['tmp_name'] = $_FILES[$input_name]['tmp_name'][$i];
            $_FILES['userFile']['error'] = $_FILES[$input_name]['error'][$i];
            $_FILES['userFile']['size'] = $_FILES[$input_name]['size'][$i];
            $all_img[]=$this->upload_image("userFile",$folder);
        }
        return $all_img;
        }
    }

    private  function upload_image($file_name ,$folder){
        $config['upload_path'] = 'uploads/'.$folder;
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf';
        // $config['max_size']    = '1024*8';
        $config['max_size']    = '80000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000';

        $config['encrypt_name']=true;
        $this->load->library('upload',$config);
        if(! $this->upload->do_upload($file_name)){
            return  false;
        }else{
            $datafile = $this->upload->data();
            //$this->thumb($datafile);
            return  $datafile['file_name'];
        }
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
         $all_img= $this->upload_muli_image("file","images/finance_accounting/box/quods");

         if(!empty($all_img)){
             $all_img =$all_img;
         }else{
             $all_img='';
         }
         messages('success','تم إضافة قيد');
         $this->Quods_model->insert($id,$all_img);
         redirect('finance_accounting/box/quods/Quods/add_quods','refresh');

     }else{
         $records = $this->Quods_model->getAllAccounts(array('id!='=>0));
         $data['QuodsTransfered'] = $this->Quods_model->getAllquod(array('halet_qued'=>1));
         $data['QuodsNotTransfered'] = $this->Quods_model->getAllquod(array('halet_qued'=>2));

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

public function getDetails(){
    $id= $_POST['id'];
    $data['result'] = $this->Quods_model->getAllquod(array('id'=>$id))[0];
    $this->load->view('admin/finance_accounting/box/quods/GetDetails',$data);
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



    public function deleteQuodImg($id,$link)
    {
        messages('success','تم حذف الصورة بنجاح');
        $this->Quods_model->delete_attaches($id);
        redirect('finance_accounting/box/quods/Quods/add_quods/'.$link,'refresh');
    }



}


