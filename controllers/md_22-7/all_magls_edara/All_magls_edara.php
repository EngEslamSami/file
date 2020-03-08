<?php
/**
 * Created by PhpStorm.
 * User: nnnnn
 * Date: 05/03/2019
 * Time: 12:00 م
 */

class All_magls_edara extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->helper(array('url', 'text', 'permission', 'form'));
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }


        $this->load->model('Difined_model');
        /**********************************************************/
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in = $this->Counting->get_basic_in_num();
        $this->files_basic_in = $this->Counting->get_files_basic_in();
        /*************************************************************/

        $this->load->model('system_management/Groups');

        $this->groups = $this->Groups->get_group($_SESSION["group_number"]);
        $this->groups_title = $this->Groups->get_group_title($_SESSION["group_number"]);
//        application/models/md/all_magls_edara/All_magls_edara_modelphp
        $this->load->model('md/all_magls_edara/All_magls_edara_model');
    }

    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
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

    private function upload_image($file_name)
    {
        $config['upload_path'] = 'uploads/images';
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf';
        $config['max_size'] = '1024*8';
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
    private function upload_file($file_name, $filepath = false)
    {
        if ($filepath == false) {
            $config['upload_path'] = 'uploads/files';
        } else {
            $config['upload_path'] = $filepath;
        }
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
        $config['max_size'] = '1024*8';
        $config['overwrite'] = true;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (!$this->upload->do_upload($file_name)) {
            return false;
        } else {
            $datafile = $this->upload->data();
            return $datafile['file_name'];
        }
    }

    public function index()
    {//md/all_magls_edara/All_magls_edara

//       $this->test( $this->All_magls_edara_model->get_one_data(4));
        $data['all_data'] = $this->All_magls_edara_model->get_all_data();

        if ($this->input->post('btn')) {
            $file_name = 'qrar_mgls_morfaq';
            $file = $this->upload_file($file_name,'uploads/md/magls_edara');

            $this->All_magls_edara_model->insert_magls($file);
            messages('success', 'تم إضافة بنجاح ');
            redirect('md/all_magls_edara/All_magls_edara', 'refresh');
        }
        $data['title'] = 'إضافة مجلس';
        $data['metakeyword'] = 'إعدادات المجلس';
        $data['metadiscription'] = '';
        $data['subview'] = 'admin/md/all_magls_edara/all_magls_edara_view';
        $this->load->view('admin_index', $data);
    }

    public function update($id)
    {
        $data['id'] = base64_decode($id);
        if ($this->input->post('btn')) {
            $file_name = 'qrar_mgls_morfaq';
            $file = $this->upload_file($file_name,'uploads/md/magls_edara');
            $this->All_magls_edara_model->update_magles($data['id'], $file);
            messages('success', 'تم تعديل بنجاح ');
            redirect('md/all_magls_edara/All_magls_edara', 'refresh');
        }
        $data['one_data'] = $this->All_magls_edara_model->get_one_data($data['id']);
//     $this->test($data['one_data']);
        $data['title'] = 'تعديل  مجلس   ';
        $data['metakeyword'] = 'إعدادات المجلس';
        $data['metadiscription'] = '';
        $data['subview'] = 'admin/md/all_magls_edara/all_magls_edara_view';
        $this->load->view('admin_index', $data);
    }

    public function delete($id)
    {
        $id = base64_decode($id);
        $this->All_magls_edara_model->delete_data($id);
        redirect('md/all_magls_edara/All_magls_edara', 'refresh');

    }


    public function read_file($file_name)
    {
        $this->load->helper('file');
//        $file_name=$this->uri->segment(5);
        $file_path = 'uploads/md/magls_edara/'.$file_name;
        header('Content-Type: application/pdf');
        header('Content-Discription:inline; filename="'.$file_name.'"');
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges:bytes');
        header('Content-Length: ' . filesize($file_path));
        readfile($file_path);
    }
}