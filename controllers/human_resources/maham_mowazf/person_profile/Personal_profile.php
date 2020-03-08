<?php
/**
 * Created by PhpStorm.
 * User: nnnnn
 * Date: 02/06/2019
 * Time: 11:01 ص
 */

class Personal_profile extends MY_Controller
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

        $this->load->model('maham_mowazf_model/person_profile_m/Person_profile_model');

    }

    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }

    private function thumb($data, $folder = '')
    {
        $config['image_library'] = 'gd2';

        $config['source_image'] = $data['full_path'];

        if (!empty($folder)) {
            $config['new_image'] = 'uploads/images/' . $folder . '/thumbs/' . $data['file_name'];
        } else {
            $config['new_image'] = 'uploads/thumbs/' . $data['file_name'];
        }
        $config['create_thumb'] = TRUE;

        $config['maintain_ratio'] = TRUE;

        $config['thumb_marker'] = '';

        $config['width'] = 275;

        $config['height'] = 250;

        $this->load->library('image_lib', $config);

        $this->image_lib->resize();
    }

    private function upload_image($file_name, $folder = '')
    {
        if (!empty($folder)) {
            $config['upload_path'] = 'uploads/images/' . $folder;
        } else {
            $config['upload_path'] = 'uploads/images';
        }
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf';
        $config['max_size'] = '1024*8';
        $config['encrypt_name'] = true;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($file_name)) {
            return false;
        } else {
            $datafile = $this->upload->data();
            $this->thumb($datafile, $folder);
            return $datafile['file_name'];
        }
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

    public function index()
    {//maham_mowazf/person_profile/Personal_profile

        $data['person_data'] = $this->Person_profile_model->get_person_data();
//        $this->test($data['person_data']);
        $data['title'] = 'بروفايلى';
        $data['subview'] = 'admin/maham_mowazf_view/person_profile_v/personal_profile.php';
        $this->load->view('admin_index', $data);
    }

    public function update_users($id)
    {
        if ($this->input->post('ADD') == 'ADD') {
            $file = $this->upload_image("user_photo", 'profie');
            $this->Person_profile_model->update_users($id, $file);
            $this->messages('success', 'تم التعديل بنجاح');
            redirect('maham_mowazf/person_profile/Personal_profile', 'refresh');
        }

    }

    public function upload_img()
    {
        $id = $this->input->post('id');
        $file = $this->upload_image("files", 'profie');
        $this->Person_profile_model->upload_img($id, $file);
    }
}