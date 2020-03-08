<?php
/**
 * Created by PhpStorm.
 * User: nnnnn
 * Date: 26/01/2019
 * Time: 11:45 ص
 */

class About_us extends MY_Controller
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



        $this->load->model('about_us/About_us_model', 'model');

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


    public function index()
    {//about_us/About_us
        $data['pages'] = $this->model->select_pages();

        $data['title'] = 'اسماء الصفحات الرسمية ';
        $data['subview'] = 'admin/about_us/about_us';
        $this->load->view('admin_index', $data);
    }

    public function insert_pages()
    {
        $this->model->insert_page();
        redirect('about_us/About_us', 'refresh');
    }

    public function delete_pages($id)
    {
        $id = base64_decode($id);
        $this->model->delete_page($id);
        redirect('about_us/About_us', 'refresh');


    }

    public function delete_pages_data($id)
    {
        $id = base64_decode($id);
        $this->model->delete_page_data($id);
        redirect('about_us/About_us/page_data', 'refresh');


    }

    public function update_page($id)
    {//about_us/About_us/update_page

        $data['id'] = base64_decode($id);
        if ($this->input->post('btn')) {
            $this->model->update_page($data['id']);
            redirect('about_us/About_us', 'refresh');
        }
        $data['page'] = $this->model->select_page($data['id']);
        $data['title'] = 'اسماء الصفحات الرسمية ';
        $data['subview'] = 'admin/about_us/about_us';
        $this->load->view('admin_index', $data);
    }

    public function page_data()//about_us/About_us/page_data
    {
        $data['pages'] = $this->model->return_pages();
        $data['pages_data'] = $this->model->select_data_pages();
//        $this->test( $data['pages_data'] );
        $data['title'] = 'اسماء الصفحات الرسمية ';
        $data['subview'] = 'admin/about_us/page_data_view';
        $this->load->view('admin_index', $data);

    }

    public function insert_page_data()
    {
        $img = $this->upload_image('img');
        $this->model->insert_page_data($img);
        redirect('about_us/About_us/page_data', 'refresh');
    }

    public function update_page_data($id)
    {//about_us/About_us/update_page

        $data['id'] = base64_decode($id);
        if ($this->input->post('btn')) {
            $img = $this->upload_image('img');
            $this->model->update_page_data($data['id'], $img);
            redirect('about_us/About_us/page_data', 'refresh');
        }
        $data['page_data'] = $this->model->select_page_data($data['id']);
//        $this->test( $data['page_data'] );
        $data['title'] = 'اسماء الصفحات الرسمية ';
        $data['subview'] = 'admin/about_us/page_data_view';
        $this->load->view('admin_index', $data);
    }

}