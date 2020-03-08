<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Add_fatora extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in  = $this->Counting->get_basic_in_num();
        $this->files_basic_in  = $this->Counting->get_files_basic_in();
        $this->load->model('finance_accounting_model/khdamat_mosanda/add_fatora_models/Add_fatora_model');
        $this->load->model('Difined_model');
    }


    public function messages($type, $text, $method = false)
    {
        $CI =& get_instance();
        $CI->load->library("session");
        if ($type == 'success') {
            return $CI->session->set_flashdata('message', '<script> swal({
                    type:"success",
                    title:"' . $text . '" ,
                    confirmButtonText: "تم"
                })</script>');
        } elseif ($type == 'warning') {
            return $CI->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>   !</strong> ' . $text . '.</div>');
        } elseif ($type == 'error') {
            return $CI->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> !</strong> ' . $text . '.</div>');
        }

    }






    private function upload_muli_file($input_name)
    {
        $filesCount = count($_FILES[$input_name]['name']);
        for ($i = 0; $i < $filesCount; $i++) {
            $_FILES['userFile']['name'] = $_FILES[$input_name]['name'][$i];
            $_FILES['userFile']['type'] = $_FILES[$input_name]['type'][$i];
            $_FILES['userFile']['tmp_name'] = $_FILES[$input_name]['tmp_name'][$i];
            $_FILES['userFile']['error'] = $_FILES[$input_name]['error'][$i];
            $_FILES['userFile']['size'] = $_FILES[$input_name]['size'][$i];
            $all_img[] = $this->upload_all_file("userFile");
        }
        return $all_img;
    }
    private function upload_all_file($file_name)
    {
        $config['upload_path'] = 'uploads/images/finance_accounting/khdamat_mosanda';
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
        $config['max_size'] = '100000000';
        $config['encrypt_name'] = true;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($file_name)) {
            return false;
        } else {
            $datafile = $this->upload->data();
            //  $this->thumb($datafile);
            return $datafile['file_name'];
        }
    }
    private function upload_muli_image($input_name, $folder)
    {
        if (!empty($_FILES[$input_name]['name'])) {
            $filesCount = count($_FILES[$input_name]['name']);
            for ($i = 0; $i < $filesCount; $i++) {
                $_FILES['userFile']['name'] = $_FILES[$input_name]['name'][$i];
                $_FILES['userFile']['type'] = $_FILES[$input_name]['type'][$i];
                $_FILES['userFile']['tmp_name'] = $_FILES[$input_name]['tmp_name'][$i];
                $_FILES['userFile']['error'] = $_FILES[$input_name]['error'][$i];
                $_FILES['userFile']['size'] = $_FILES[$input_name]['size'][$i];
                $all_img[]=$this->upload_image("userFile", $folder);
            }
            return $all_img;
        }
    }
    private function upload_image($file_name)
    {

        $config['upload_path'] = 'uploads/images/finance_accounting/khdamat_mosanda';

        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf';

        $config['max_size'] = '1024*8';

        $config['encrypt_name'] = true;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload($file_name)) {

            return false;

        } else {

            $datafile = $this->upload->data();

           // $this->thumb($datafile);

            return $datafile['file_name'];

        }

    }
    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }

    public function add_fatora(){
    // finance_accounting/khdamat_mosanda/add_fatora/Add_fatora/add_fatora

        $data['geha_table'] =$this->Add_fatora_model->select_geha();
        $data['finance_moshtrken'] =$this->Add_fatora_model->select_finance_moshtrken();
        $data['mrakz_tklfa_arr'] =$this->Add_fatora_model->diaplay_mrakz_tklfa();
        $records = $this->Add_fatora_model->getAllAccounts(array('id!='=>0));
        $data['tree'] = $this->buildTree($records);
        $data['records'] =  $this->Add_fatora_model->getTable();


        $data['title'] = 'الخدمات المساندة';
        $data['subview'] = 'admin/finance_accounting/khdamat_mosanda/add_fatora_views/add_fatora';
        $this->load->view('admin_index', $data);
    }



    public function update_fatora($id){

        $data['geha_table'] =$this->Add_fatora_model->select_geha();
        $data['finance_moshtrken'] =$this->Add_fatora_model->select_finance_moshtrken();
        $data['mrakz_tklfa_arr'] =$this->Add_fatora_model->diaplay_mrakz_tklfa();
        $records = $this->Add_fatora_model->getAllAccounts(array('id!='=>0));
        $data['tree'] = $this->buildTree($records);
        $data['result'] =  $this->Add_fatora_model->getTableByID($id);


        $data['title'] = 'الخدمات المساندة';
        $data['subview'] = 'admin/finance_accounting/khdamat_mosanda/add_fatora_views/add_fatora';
        $this->load->view('admin_index', $data);
    }



    public  function  insert(){
        $this->GetAlert();
        $this->Add_fatora_model->insert();
        redirect('finance_accounting/khdamat_mosanda/add_fatora/Add_fatora/add_fatora', 'refresh');

    }

    public  function  update($id){

        messages('success', 'تمت الإضافة بنجاح !!');
        $this->Add_fatora_model->update($id);
        redirect('finance_accounting/khdamat_mosanda/add_fatora/Add_fatora/add_fatora', 'refresh');

    }


    public function Delete($id)
    {
        $this->Add_fatora_model->Delete($id);
        redirect('finance_accounting/khdamat_mosanda/add_fatora/Add_fatora/add_fatora', 'refresh');
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
    public function insert_geha_ajax(){
        $this->Add_fatora_model->insert_geha();
        $data['table'] =$this->Add_fatora_model->select_finance_gehat();
        $this->load->view('admin/finance_accounting/khdamat_mosanda/add_fatora_views/geha_load_page',$data);
    }

    public function delete_geha(){
        $id = $this->input->post('id');
        $this->Add_fatora_model->delete_geha($id);
        $data['table'] =$this->Add_fatora_model->select_finance_gehat();
        $this->load->view('admin/finance_accounting/khdamat_mosanda/add_fatora_views/geha_load_page',$data);

    }

    public function getById(){
        $id= $this->input->post('id');
        $geha =$this->Add_fatora_model->get_geha_by_id($id);
        echo json_encode($geha);
    }

    public function update_geha(){
        $id= $this->input->post('id');
        $this->Add_fatora_model->update_geah($id);
        $data['table'] =$this->Add_fatora_model->select_finance_gehat();

        $this->load->view('admin/finance_accounting/khdamat_mosanda/add_fatora_views/geha_load_page',$data);

    }

    /***********************/


    public function insert_finance_moshtrken_ajax(){
        $this->Add_fatora_model->insert_finance_moshtrken();
        $data['table'] =$this->Add_fatora_model->select_finance_moshtrken();
        $this->load->view('admin/finance_accounting/khdamat_mosanda/add_fatora_views/finance_moshtrken_load_page',$data);
    }

    public function delete_finance_moshtrken(){
        $id = $this->input->post('id');
        $this->Add_fatora_model->delete_finance_moshtrken($id);
        $data['table'] =$this->Add_fatora_model->select_finance_moshtrken();
        $this->load->view('admin/finance_accounting/khdamat_mosanda/add_fatora_views/finance_moshtrken_load_page',$data);

    }

    public function getById_finance_moshtrken(){
        $id= $this->input->post('id');
        $geha =$this->Add_fatora_model->get_finance_moshtrken_by_id($id);
        echo json_encode($geha);
    }

    public function update_finance_moshtrken(){
        $id= $this->input->post('id');
        $this->Add_fatora_model->update_finance_moshtrken($id);
        $data['table'] =$this->Add_fatora_model->select_finance_moshtrken();

        $this->load->view('admin/finance_accounting/khdamat_mosanda/add_fatora_views/finance_moshtrken_load_page',$data);

    }
    /***********************/



    public function saveFile(){

        $images=$this->upload_all_file("file");
        $this->Add_fatora_model->saveFile($images);
        echo json_encode($_POST);
    }




    public function loadFiles(){
        $id =$_POST['id'];
        $data_load['all_files'] =  $this->Add_fatora_model->get_attach($id);

        $this->load->view('admin/finance_accounting/khdamat_mosanda/add_fatora_views/loadFiles', $data_load);
    }

    public function Delete_attach()
    {
        $id =$_POST['id'];
        $this->Add_fatora_model->delete_attach($id);
        echo json_encode($_POST);
        // redirect('finance_accounting/box/forms/transformation_accounts/Transformation_accounts/add_transformation_accounts', 'refresh');
    }


    function GetAlert()
    {
        $CI =& get_instance();
        $CI->load->library("session");
        return $CI->session->set_flashdata('message',
            '
<script src="https://cdn.jsdelivr.net/npm/sweetalert2"></script>
<script>
		   Swal.fire({
            title: "هل تريد تحويل الفاتورة  إلي الفواتير الصادرة ",
            text: "",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            cancelButtonText: "لا",
            confirmButtonText: "نعم"
        }).then((result) => {
            if (result.value) {
          
             window.location.href = "'.base_url().'finance_accounting/khdamat_mosanda/add_fatora/Add_fatora/fatora_sadra"   ;

            }            
        });
        

            </script>');

    }


    public function read_file($file_name)
    {
        $this->load->helper('file');
        $file_path = 'uploads/images/finance_accounting/khdamat_mosanda/'.$file_name;
        header('Content-Type: application/pdf');
        header('Content-Discription:inline; filename="'.$file_name.'"');
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges:bytes');
        header('Content-Length: ' . filesize($file_path));
        readfile($file_path);
    }




    public function fatora_sadra(){
// finance_accounting/khdamat_mosanda/add_fatora/Add_fatora/fatora_sadra


        $data['records'] =  $this->Add_fatora_model->getTable();

        $data['title'] = 'الفواتير الصادرة';
        $data['subview'] = 'admin/finance_accounting/khdamat_mosanda/add_fatora_views/fatora_sadra';
        $this->load->view('admin_index', $data);

    }


    public function GetFatoraData(){

        $data_load['mrakz_tklfa_arr'] =$this->Add_fatora_model->diaplay_mrakz_tklfa();

        $data_load['result']  =  $this->Add_fatora_model->getTableByID($_POST['id']);
        $this->load->view('admin/finance_accounting/khdamat_mosanda/add_fatora_views/fatora_estkmal', $data_load);
    }

    public function fatora_estkmal_update(){
        $this->Add_fatora_model->complete_fatora();
        redirect('finance_accounting/khdamat_mosanda/add_fatora/Add_fatora/fatora_sadra', 'refresh');

    }


    public function pay_fatora(){
// finance_accounting/add_fatora/Add_fatora/pay_fatora


        $data['records'] =  $this->Add_fatora_model->getLastInserted();

        $data['title'] = 'شاشة السداد';
        $data['subview'] = 'admin/finance_accounting/khdamat_mosanda/add_fatora_views/pay_fatora';
        $this->load->view('admin_index', $data);

    }



    public function loadFiles2(){
        $id =$_POST['id'];
        $data_load['all_files'] =  $this->Add_fatora_model->get_attach($id);

        $this->load->view('admin/finance_accounting/khdamat_mosanda/add_fatora_views/loadFiles2', $data_load);
    }
/***************************************************************************************************/

    public  function convert_fatora(){

        $this->load->model('finance_accounting_model/khdamat_mosanda/sdad_fatora/Sdad_fatora_model');
        $this->load->model('all_Finance_resource_models/all_pills/AllPills_model');

        $data['gehat'] =$this->Sdad_fatora_model->get_gehat();
        $data['geha_table'] =$this->Add_fatora_model->select_geha();
        $data['records']=$this->Sdad_fatora_model->get_records();
        $data['last_rkm']=$this->Sdad_fatora_model->get_last_rkm();
        $data['markz'] =$this->Add_fatora_model->diaplay_mrakz_tklfa();
        $data['greetings'] = $this->AllPills_model->GetFromFr_settings(9);
        $data['titles'] = $this->AllPills_model->GetFromFr_settings(8);



        $data['all_fatora'] =  $this->Add_fatora_model->getTableByWhere_in();
       /* echo "<pre>";
        print_r($data['all_fatora']);
        echo "</pre>";
        die;*/
        $data['title'] = 'تسديد الفواتير';
        $data['subview'] = 'admin/finance_accounting/khdamat_mosanda/add_fatora_views/sdad_fatora_view';
        $this->load->view('admin_index', $data);

    }


    public function show_fatora()
    {
        /*echo "<pre>";
        print_r($_POST);
        echo "</pre>";
        die;*/
        $this->load->view('admin/finance_accounting/khdamat_mosanda/add_fatora_views/load_page',$_POST);
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
            title: " هل تريد طباعة  الفاتوره ؟",
            text: "",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            cancelButtonText: "لا, إلغاء الأمر!",
            confirmButtonText: "نعم, قم بالطباعة!"
        }).then((result) => {
            if (result.value) {
           
                window.location.href = "'.base_url().'finance_accounting/khdamat_mosanda/sdad_fatora/Sdad_fatora/print_fatora/'.$valu.'"   ;
            }
        })

            </script>');
        }
    }
    public function add_fatora_db()
    {

        $id=$this->Add_fatora_model->insert_fatora_sdad();
        $rkm=$this->input->post('t_rkm');
        $this->Add_fatora_model->insert_fatora_details_sdad($id,$rkm);
        $this->messages('success', 'تم الحفظ بنجاح');
        $rkm=$this->input->post('t_rkm');
        $this->PrintMessage('print',$rkm);
        redirect('finance_accounting/khdamat_mosanda/add_fatora/Add_fatora/add_fatora','refresh');

    }



}
