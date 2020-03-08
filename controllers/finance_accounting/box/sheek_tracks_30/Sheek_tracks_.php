<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sheek_tracks extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in = $this->Counting->get_basic_in_num();
        $this->files_basic_in = $this->Counting->get_files_basic_in();
        $this->load->model('finance_accounting_model/box/vouch_sarf/Vouch_sarf_model');
        $this->load->model('finance_accounting_model/box/sheek_tracks/Sheek_tracks_model');

        $this->load->model('Difined_model');
    }

    private function upload_muli_image($input_name, $folder)
    {
        if (!empty($_FILES[$input_name])) {
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

    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }

    public function index()
    {//finance_accounting/box/sheek_tracks/Sheek_tracks


        $data['sheeks_sarf'] = $this->Sheek_tracks_model->select_sheeks_sarf();
        $data['sheeks_qabd'] = $this->Sheek_tracks_model->select_sheeks_qabd();

        $data['sheeks_ones'] = $this->Sheek_tracks_model->get_by_type(1);

        $data['sheeks_two'] = $this->Sheek_tracks_model->get_by_type(2);
        $data['sheeks_three'] = $this->Sheek_tracks_model->get_by_type(3);
        $data['subview'] = 'admin/finance_accounting/box/sheek_tracks/sheek_tracks';
        $data['title'] = 'الشيكات الصادرة والواردة';
        $this->load->view('admin_index', $data);


    }

    private function message($type, $text)
    {

        if ($type == 'success') {

            return $this->session->set_flashdata('message', '<div class="hidden-print alert alert-success alert-dismissible shadow" data-sr="wait 0s, then enter bottom and hustle 100%"><button type="button" class="close pull-left" data-dismiss="alert">×</button><h4 class="text-lg"><i class="fa fa-check icn-xs"></i> تم بنجاح ...</h4><p>' . $text . '!</p></div>');

        } elseif ($type == 'wiring') {

            return $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible" data-sr="wait 0.6s, then enter bottom and hustle 100%"><button type="button" class="close pull-left" data-dismiss="alert">×</button><h4 class="text-lg"><i class="fa fa-exclamation-triangle icn-xs"></i> تحذير هام ...</h4><p>' . $text . '</p></div>');

        } elseif ($type == 'error') {

            return $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" data-sr="wait 0.3s, then enter bottom and hustle 100%"><button type="button" class="close pull-left" data-dismiss="alert">×</button><h4 class="text-lg"><i class="fa fa-exclamation-circle icn-xs"></i> خطآ ...</h4><p>' . $text . '</p></div>');

        }

    }

    public function change_taslem_sheek()
    {


        $this->Sheek_tracks_model->change_taslem_sheek();
        $this->message('success', 'تم تنفيذ الإجراء بنجاح');
        redirect('finance_accounting/box/sheek_tracks/Sheek_tracks?type=out_cheque', 'refresh');


    }


    public function change_sheek_status()
    {

        $this->Sheek_tracks_model->change_sheek_status();
        $this->message('success', 'تم تنفيذ الإجراء بنجاح');
        redirect('finance_accounting/box/sheek_tracks/Sheek_tracks?type=out_cheque', 'refresh');


    }



    public function loadhalet_taslem()
    {
    $data['taslem_settings'] = $this->Sheek_tracks_model->select_from_finance_sheeks_tracks_actions(array('type' => 4));
    $data['records'] = $this->Sheek_tracks_model->get_by_id($_POST['id']);
    $data['tracks'] = $this->Sheek_tracks_model->get_sheeks_tracks(array('sheek_num'=>$data['records']->sheek_num,'all_sheek_sarf_type_id'=>2));
    $this->load->view('admin/finance_accounting/box/sheek_tracks/halet_taslem_load', $data);
    }



    public function loadhalet_sheek()
    {
        $data['sarf_settings'] = $this->Sheek_tracks_model->select_from_finance_sheeks_tracks_actions(array('type' => 5));

        $data['records'] = $this->Sheek_tracks_model->get_by_id($_POST['id']);
        $data['tracks'] = $this->Sheek_tracks_model->get_sheeks_tracks(array('sheek_num'=>$data['records']->sheek_num,'all_sheek_sarf_type_id'=>1));

        $this->load->view('admin/finance_accounting/box/sheek_tracks/halet_sheek_load', $data);


    }
    public function load_details()
    {


        if($_POST['type'] ==='qabd' ){
            $data['records'] = $this->Sheek_tracks_model->getSand_Qabd($_POST['id']);

        }elseif ($_POST['type'] === 'sarf'){
            $data['records'] = $this->Sheek_tracks_model->getSand_Sarf($_POST['id']);
        }


        $this->load->view('admin/finance_accounting/box/sheek_tracks/load_details', $data);


    }



    /************************************ahmed zidan****************************/


    public function update_exit_cheque()
    {
        $row_id=$this->input->post('row_id');
        $rqm_sand=$this->input->post('rqm_sand');
        $option=$this->input->post('option');
        $data['records']=$this->Sheek_tracks_model->update_insert_sheek_track();
        // echo($option);


    }

}





