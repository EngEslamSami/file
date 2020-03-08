<?php
/**
 * Created by PhpStorm.
 * User: nnnnn
 * Date: 28/01/2019
 * Time: 02:48 م
 */

class Shoraka extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }
        $this->load->helper(array('url', 'text', 'permission', 'form'));

        /**********************************************************/
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in = $this->Counting->get_basic_in_num();
        $this->files_basic_in = $this->Counting->get_files_basic_in();
        /*************************************************************/
        $this->load->model('system_management/Groups');

        $this->load->model('Public_relations/Report_model');

        $this->groups = $this->Groups->get_group($_SESSION["group_number"]);
        $this->groups_title = $this->Groups->get_group_title($_SESSION["group_number"]);
        $this->load->model('Public_relations/website/shoraka_models/Shoraka_model', 'model');
    }

    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }

    private function upload_image($file_name)
    {
        $config['upload_path'] = 'uploads/images';
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf';
        $config['max_size'] = '100000000';
        $config['encrypt_name'] = true;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($file_name)) {
            return false;
        } else {
            $datafile = $this->upload->data();
            $this->thumb($datafile);
            return $datafile['file_name'];
        }
    }

    private function thumb($data)
    {
        $config['image_library'] = 'gd2';
        $config['source_image'] = $data['full_path'];
        $config['new_image'] = 'uploads/thumbs/' . $data['file_name'];
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['thumb_marker'] = '';
        $config['width'] = 275;
        $config['height'] = 250;
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
    }

    private function upload_file($file_name)
    {
        $config['upload_path'] = 'uploads/files';
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
        $config['max_size'] = '1000000000';
        $config['overwrite'] = true;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($file_name)) {
            return false;
        } else {
            $datafile = $this->upload->data();
            return $datafile['file_name'];
        }
    }
//C:\laragon\www\lastAbnaa_30\application\views\admin\public_relations\website\shoraka_views\shoraka_view.php
//C:\laragon\www\lastAbnaa_30\application\controllers\public_relations\website\shoraka\Shoraka.php
    public function index()
    {//public_relations/website/shoraka/Shoraka
//    selet_allshoraka
        $data['all_shoraka'] = $this->model->selet_allshoraka();

        $data['title'] = "اضافة شركاء النجاح ";
        $data['subview'] = 'admin/public_relations/website/shoraka_views/shoraka_view';
        $this->load->view('admin_index', $data);
    }

    public function insert_shoraka()
    {

        $img = $this->upload_image('logo');
        $this->model->insert_shoraka($img);
        redirect('public_relations/website/shoraka/Shoraka', 'refresh');
    }

    public function update_Shoraka($id)
    {
        $data['id'] = base64_decode($id);
        if ($this->input->post('btn')) {
            $img = $this->upload_image('logo');
            $this->model->update_shoraka($img,$data['id']);
            redirect('public_relations/website/shoraka/Shoraka', 'refresh');
        }
        $data['sherak_data'] = $this->model->selet_shoraka($data['id']);
        $data['title'] = "تعديل شركاء النجاح ";
        $data['subview'] = 'admin/public_relations/website/shoraka_views/shoraka_view';
        $this->load->view('admin_index', $data);
    }
    public function select_data(){
        $id=$this->input->post('id');
        $sherak_data = $this->model->selet_shoraka($id);
        echo json_encode($sherak_data);

    }
    public function delete_shoraka($id)
    {
        $id = base64_decode($id);
        $this->model->delete_shoraka($id);
        redirect('public_relations/website/shoraka/Shoraka', 'refresh');


    }
}