<?php
/**
 * Created by PhpStorm.
 * User: nnnnn
 * Date: 22/08/2019
 * Time: 11:53 ص
 */

class Aktam extends MY_Controller
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

        $this->load->model('main_data/Aktam_model');
        $this->path_img = 'images/main_data/aktam';

    }

    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }

    private function upload_img($file_name, $folder = '')
    {
        if (!empty($folder)) {
            $config['upload_path'] = 'uploads/' . $folder;
        } else {
            $config['upload_path'] = 'uploads/files';
        }
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP';
        $config['max_size'] = '1024*88888888888888888888';
        $config['overwrite'] = true;
        $config['encrypt_name'] = true;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (!$this->upload->do_upload($file_name)) {
            return false;
        } else {
            $datafile = $this->upload->data();
            $this->thumb($datafile,$folder);
            return $datafile['file_name'];
        }
    }

    function thumb($data, $folder = false)
    {
        $this->load->library('image_lib');

        if (!empty($folder)) {
            $config['new_image'] = 'uploads/' . $folder . '/thumbs/' . $data['file_name'];
        } else {
            $config['new_image'] = 'uploads/thumbs/' . $data['file_name'];
        }
        $config['image_library'] = 'gd2';
        $config['source_image'] = $data['full_path'];

        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['thumb_marker'] = '';
        $config['width'] = 275;
        $config['height'] = 250;

        $this->image_lib->initialize($config);

        $this->image_lib->resize();
    }
    public function message($type, $text, $method = false)
    {
        $this->load->library("session");
        if ($type == 'success') {
            return $this->session->set_flashdata('message', '<script> swal({
                    type:"success",
                    title:"' . $text . '" ,
                    confirmButtonText: "تم"
                })</script>');
        } elseif ($type == 'warning') {
            return $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>   !</strong> ' . $text . '.</div>');
        } elseif ($type == 'error') {
            return $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> !</strong> ' . $text . '.</div>');
        }

    }

    public function add_ktm()
    {//main_data/Aktam/add_ktm

//'images/main_data/aktam'

        if ($this->input->post('save')) {
            $img = $this->upload_img('ktm', $this->path_img);

            $this->Aktam_model->insert_ktm($img, $this->path_img);
            $this->message("success", "تم إضافة  الصورة  بنجاح");
            redirect('main_data/Aktam/add_ktm', 'refresh');

        }
        $data['all_aktam'] = $this->Aktam_model->get_by('main_data_aktam');
        $data['all_edara'] = $this->Aktam_model->get_all_edara();
        $data['title'] = " الأختام";
        $data['subview'] = 'admin/main_data/aktam_view.php';
        $this->load->view('admin_index', $data);
    }

    public function update_ktm($id)
    {

//'images/main_data/aktam'
        $id = base64_decode($id);
        if ($this->input->post('save')) {
            $img = $this->upload_img('ktm', $this->path_img);
            $this->Aktam_model->update_ktm($img, $this->path_img, $id);
            $this->message("success", "تم تعديل الصورة  بنجاح");
            redirect('main_data/Aktam/add_ktm', 'refresh');

        }
        $data['one_data'] = $this->Aktam_model->get_by('main_data_aktam', array('id' => $id), 1);
//        $data['all_aktam'] = $this->Aktam_model->get_by('main_data_aktam');

        $data['title'] = " الأختام";
        $data['subview'] = 'admin/main_data/aktam_view.php';
        $this->load->view('admin_index', $data);
    }

    public function delete_ktm($id)
    {
        $id = base64_decode($id);
        $this->Aktam_model->delete_ktm($id);
        $this->message("success", "تم حذف الصورة  بنجاح");
        redirect('main_data/Aktam/add_ktm', 'refresh');
    }

    public function download_file($file)
    {
        $this->load->helper('download');
        $name = $file;
        $data = file_get_contents('uploads/' . $this->path_img . '/' . $file);
        force_download($name, $data);
    }

}