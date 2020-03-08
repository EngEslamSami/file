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
        $this->load->model('md/all_magls_edara/All_magls_edara_model');
        $this->load->model('md/md_settings/Settings_model');

    }

    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }

    private function upload_file($file_name, $folder = '')
    {
        if (!empty($folder)) {
            $config['upload_path'] = 'uploads/' . $folder;
        } else {
            $config['upload_path'] = 'uploads/files';
        }
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
        $config['max_size'] = '1024*88888888888888888888';
        $config['overwrite'] = true;
        $config['encrypt_name'] = true;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (!$this->upload->do_upload($file_name)) {
            return false;
        } else {
            $datafile = $this->upload->data();
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
    {//md/all_magls_edara/All_magls_edara

        $data['all_data'] = $this->All_magls_edara_model->get_all_data();
        $data['reasons_settings'] =   $this->Settings_model->mgls_get_reasons_settings();

//        $this->test($data['all_data']);
        if ($this->input->post('btn')) {
            $file_name = 'qrar_mgls_morfaq';
            $file = $this->upload_file($file_name, 'md/magls_edara');

            $this->All_magls_edara_model->insert_magls($file);
            $this->messages('success', 'تم إضافة بنجاح ');
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
            $file = $this->upload_file($file_name, 'md/magls_edara');
            $this->All_magls_edara_model->update_magles($data['id'], $file);
            $this->messages('success', 'تم تعديل بنجاح ');
            redirect('md/all_magls_edara/All_magls_edara', 'refresh');
        }
        $data['reasons_settings'] = $this->Settings_model->mgls_get_reasons_settings();

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

    public function load_details()
    {
        $row_id = $this->input->post('row_id');
        $data['one_data'] = $this->All_magls_edara_model->get_one_data($row_id);
        $this->load->view('admin/md/all_magls_edara/load_details', $data);

    }


    public function read_file($file_name)
    {
        $this->load->helper('file');
//        $file_name=$this->uri->segment(5);
        $file_path = 'md/magls_edara/' . $file_name;
        header('Content-Type: application/pdf');
        header('Content-Discription:inline; filename="' . $file_name . '"');
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges:bytes');
        header('Content-Length: ' . filesize($file_path));
        readfile($file_path);
    }


    //yara_start
    public function add_reason()

    {


        $this->load->model('md/md_settings/Settings_model');
        $this->Settings_model->add_reasons_2();
        $this->messages('success', 'إضافة ');
        // redirect('md/all_gam3ia_omomia_odwiat/Gam3ia_omomia_odwiat/add_odwiat_data/'.$id, 'refresh');

    }

    public function getById()
    {

        $this->load->model('md/md_settings/Settings_model');
        $id = $this->input->post('id');
        $reason = $this->Settings_model->mgls_getById_reasons_settings($id);
        echo json_encode($reason);

    }

    public function update_reason()
    {
        $id = $this->input->post('id');
        $this->load->model('md/md_settings/Settings_model');
        $this->Settings_model->mgls_update_reasons($id);

    }

    public function delete_reason()
    {
        $id = $this->input->post('id');
        $this->load->model('md/md_settings/Settings_model');
        $this->Settings_model->mgls_delete_reasons($id);

    }
    
       public function load_image()
    {
        $row_id = $this->input->post('row_id');
        $data['one_data'] = $this->All_magls_edara_model->get_one_data($row_id);
        
        $this->load->view('admin/md/all_magls_edara/load_image', $data);

    }
    
}