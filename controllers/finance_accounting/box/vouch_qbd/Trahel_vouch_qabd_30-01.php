<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Trahel_vouch_qabd extends MY_Controller {

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
        $this->load->model('finance_accounting_model/box/trahel_vouch_qabd/Vouch_qbd_model');
        $this->load->model('Difined_model');
    }

    private function test($data = array()){
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }

  /*  public function index($id=false) // finance_accounting/box/vouch_qbd/Trahel_vouch_qabd
    {

        $records = $this->Vouch_qbd_model->getAllAccounts(array('id!='=>0));
        $data['records'] = $this->Vouch_qbd_model->getAllVouchQbd();
        $data['banks'] = $this->Difined_model->select_all('banks_settings','','','id','asc');
        $data['last_id'] = $this->Vouch_qbd_model->select_last_id();

        if($id != 0 && $this->uri->segment(5)!='index'){
            $data['result'] = $this->Vouch_qbd_model->findById($id);

        }else{
            $data['details'] = $this->Vouch_qbd_model->get_all();

        }
        $data['tree'] = $this->buildTree($records);
        //=====================
        $data['rkm_elqud'] = $this->Vouch_qbd_model->select_last_id2();


        //=======================
        $data['title'] = 'إضافة سند قبض';

            $data['subview'] = 'admin/finance_accounting/box/trahel_vouch_qabd/vouch_qbd';

        $this->load->view('admin_index', $data);
    }
*/
/*
public function index($id=false) // finance_accounting/box/vouch_qbd/Trahel_vouch_qabd
{

    $records = $this->Vouch_qbd_model->getAllAccounts(array('id!='=>0));
    $data['records'] = $this->Vouch_qbd_model->getAllVouchQbd();
    $data['banks'] = $this->Difined_model->select_all('banks_settings','','','id','asc');
    $data['last_id'] = $this->Vouch_qbd_model->select_last_id();

    if($id != 0 && $this->uri->segment(5)!='index'){
        $data['result'] = $this->Vouch_qbd_model->findById($id);

    }else{
        $data['details'] = $this->Vouch_qbd_model->get_all();
       

    }
    $data['tree'] = $this->buildTree($records);
    //=====================
    $data['rkm_elqud'] = $this->Vouch_qbd_model->select_last_id2();
    $data['code_c'] = $this->Vouch_qbd_model->get_code_hesab(1,2);
    $data['code_n'] = $this->Vouch_qbd_model->get_code_hesab(1,1);


    //=======================
    $data['title'] = 'إضافة سند قبض';

        $data['subview'] = 'admin/finance_accounting/box/trahel_vouch_qabd/vouch_qbd';

    $this->load->view('admin_index', $data);
}*/
public function index($id=false) // finance_accounting/box/vouch_qbd/Trahel_vouch_qabd
{

    $records = $this->Vouch_qbd_model->getAllAccounts(array('id!='=>0));
    $data['records'] = $this->Vouch_qbd_model->getAllVouchQbd();
    $data['banks'] = $this->Difined_model->select_all('banks_settings','','','id','asc');
    $data['last_id'] = $this->Vouch_qbd_model->select_last_id();

    if($id != 0 && $this->uri->segment(5)!='index'){
        $data['result'] = $this->Vouch_qbd_model->findById($id);

    }else{
        $data['details'] = $this->Vouch_qbd_model->get_all();
         $data['pill_details'] = $this->Vouch_qbd_model->get_pills();

       

    }
    $data['tree'] = $this->buildTree($records);
    //=====================
    $data['rkm_elqud'] = $this->Vouch_qbd_model->select_last_id2();
    $data['code_c'] = $this->Vouch_qbd_model->get_code_hesab(1,2);
    $data['code_n'] = $this->Vouch_qbd_model->get_code_hesab(1,1);
    $data['arkam_esalat'] = $this->Vouch_qbd_model->rkm_esal_array();



    //=======================
    $data['title'] = 'إضافة سند قبض';

        $data['subview'] = 'admin/finance_accounting/box/trahel_vouch_qabd/vouch_qbd';

    $this->load->view('admin_index', $data);
}



    public function updateView($id) // finance_accounting/box/vouch_qbd/Vouch_qbd/updateView
    {

        $records = $this->Vouch_qbd_model->getAllAccounts(array('id!='=>0));

        $data['banks'] = $this->Difined_model->select_all('banks_settings','','','id','asc');
        $data['last_id'] = $this->Vouch_qbd_model->select_last_id();
        $data['result'] = $this->Vouch_qbd_model->findById($id);
        $data['attachments'] = $this->Vouch_qbd_model->get_attachment($id);
//$this->test($data['result']);
        $data['tree'] = $this->buildTree($records);
        $data['title'] = 'إضافة سند قبض';
        $data['subview'] = 'admin/finance_accounting/box/trahel_vouch_qabd/vouch_qbd';
        $this->load->view('admin_index', $data);
    }

    public function add($id=0)
    {
        messages('success','تم إضافة سند قبض');
        $last_rqm_sanad = $this->Vouch_qbd_model->select_last_rkm();
        $inserted_id = $this->Vouch_qbd_model->insert_update($id,$last_rqm_sanad);
        $this->Vouch_qbd_model->insert_update_datails($inserted_id,$last_rqm_sanad);
        redirect('finance_accounting/box/vouch_qbd/Vouch_qbd','refresh');
    }
    public function update($id)
    {
        messages('success','تم تعديل سند قبض');
        $this->Vouch_qbd_model->delete_datails($id);
        $inserted_id = $this->Vouch_qbd_model->insert_update($id);
        $this->Vouch_qbd_model->insert_update_datails($inserted_id);
        redirect('finance_accounting/box/vouch_qbd/Trahel_vouch_qabd','refresh');
    }


    public function deleteVouchQbd($id,$sanadId)
    {
        messages('success','تم تعديل سند قبض');
        $this->Vouch_qbd_model->delete_datails($sanadId);
        $this->Vouch_qbd_model->delete_by_sand($sanadId);
        $inserted_id = $this->Vouch_qbd_model->delete($id);

        redirect('finance_accounting/box/vouch_qbd/Trahel_vouch_qabd','refresh');
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

    private function upload_muli_image($input_name,$folder){
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

    public function insert_images()      //finance_accounting/box/vouch_qbd/Vouch_qbd/insert_images
    {
        $images=$this->upload_muli_image('file',"images/finance_accounting/box/sand_qabd");

        $this->Vouch_qbd_model->insert_img($images);
        redirect('finance_accounting/box/vouch_qbd/Trahel_vouch_qabd','refresh');
    }

    public function deleteVouch_file($id,$sand)
    {
        $this->Vouch_qbd_model->delete_img($id);
        redirect('finance_accounting/box/vouch_qbd/Trahel_vouch_qabd/updateView/'.$sand,'refresh');
    }

}

/* End of file Vouch_qbd.php */
/* Location: ./application/controllers/finance_accounting/box/vouch_qbd/Vouch_qbd.php */