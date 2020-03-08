<?php
/**
 * Created by PhpStorm.
 * User: nnnnn
 * Date: 18/02/2019
 * Time: 02:58 م
 */

class Structure extends MY_Controller
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

        $this->load->model('Public_relations/website/about_us/Structure_model', 'model');

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
    public function index(){
        $data['imgs'] = $this->model->slect_all();

        $data['title'] = 'صور الهيكل التنظيمي العام ';
        $data['subview'] = 'admin/public_relations/website/about_us/structure_view';
        $this->load->view('admin_index', $data);
    }
    public function insert_imgs()
    {
        $img = $this->upload_image('img');
        $this->model->insert_img($img);
        redirect('public_relations/website/about_us/Structure', 'refresh');
    }

    public function delete_imgs($id)
    {
        $id = base64_decode($id);
        $this->model->delete_img($id);
        redirect('public_relations/website/about_us/Structure', 'refresh');


    }

    public function update_img($id)
    {//about_us/About_us/update_page

        $data['id'] = base64_decode($id);
        if ($this->input->post('btn')) {
            $img = $this->upload_image('img');
            $this->model->update_img($data['id'], $img);
            redirect('public_relations/website/about_us/Structure', 'refresh');
        }
        $data['img_data'] = $this->model->slect_by($data['id']);
        $data['title'] = 'صور الهيكل التنظيمي العام ';
        $data['subview'] = 'admin/public_relations/website/about_us/structure_view';
        $this->load->view('admin_index', $data);
    }
}