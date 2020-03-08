<?php

class Main_data extends MY_Controller
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

        $this->load->model('Public_relations/website/main_data/Model_main_data');
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

    private function url()
    {
        unset($_SESSION['url']);
        $this->session->set_flashdata('url', 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
    }

    //-----------------------------------------
    private function message($type, $text)
    {
        if ($type == 'success') {
            return $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <strong> تم بنجاح!</strong> ' . $text . '.
                                                </div>');
        } elseif ($type == 'wiring') {
            return $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissable">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <strong> تحذير  !</strong> ' . $text . '.
                                                </div>');
        } elseif ($type == 'error') {
            return $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <strong>خطأ!</strong> ' . $text . '.
                                                </div>');
        }
    }
    /**
     * ==============================================================================================================
     *                                ALL FUnction
     *
     * ===============================================================================================================
     */


    //////////////////////////////// Omnia/////////////////////////

    public function add_main_data()
    {   //public_relations/website/main_data/Main_data/add_main_data
        if ($this->input->post('add')) {
            $file_name = 'logo';
            $file_name2 = 'f_logo';

            $this->input->post('banks');
            $file_name3 = 'd_img';
            $file3 = $this->upload_image($file_name3);
            $file = $this->upload_image($file_name);
            $file2 = $this->upload_image($file_name2);
            $row = $this->Model_main_data->insert($file, $file2, $file3);
            $this->Model_main_data->insert_phone($row);
            $this->Model_main_data->insert_fax($row);
            $this->Model_main_data->insert_email($row);
            $this->Model_main_data->insert_banks($row);

            $this->message('success', 'إضافة البيانات الأساسية');
            redirect('public_relations/website/main_data/Main_data/add_main_data');
        }
        $data['table'] = $this->Model_main_data->select('');
        $data['result'] = $this->Model_main_data->getById(0);
        if ($this->input->post('num_m')) {
            if ($this->input->post('num_m') != 0) {
                $page = $this->input->post('page');
                $data['result'] = $this->input->post('num_m');
                $this->load->view('admin/public_relations/website/main_data/main_data', $data);
            }
        } else {
            $data['banks'] = $this->Model_main_data->select_bank();
            $data['title'] = "البيانات الاساسيه";
            $data['subview'] = 'admin/public_relations/website/main_data/main_data';
            $this->load->view('admin_index', $data);
        }
    }

    public function update_main_data($id)
    {  // public_relations/website/main_data/Main_data/update_main_data

        if ($this->input->post('add')) {
            //$this->test($_POST);
            $this->Model_main_data->delete($id);

            $file_name = 'logo';
            $file = $this->upload_image($file_name);

            $file_name2 = 'f_logo';
            $file2 = $this->upload_image($file_name2);

            $file_name3 = 'd_img';
            $file3 = $this->upload_image($file_name3);

            $this->Model_main_data->update($id, $file, $file2, $file3);

            $this->Model_main_data->insert_phone($id);
            $this->Model_main_data->insert_fax($id);
            $this->Model_main_data->insert_email($id);
            $this->Model_main_data->insert_banks($id);
            $this->message('success', 'تعديل البيانات الأساسية');
            redirect('public_relations/website/main_data/Main_data/add_main_data', 'refresh');
        }
        $data['table'] = '';
        $data['title'] = 'تعديل البيانات الأساسية';
        $data['banks'] = $this->Model_main_data->select_bank();
        $data['bank'] = $this->Model_main_data->getBankById($id);
        $data['result'] = $this->Model_main_data->getById($id);
        $data['soeials'] = $this->Model_main_data->select_all_soeial();
        $data['phones'] = $this->Model_main_data->getPhonesById($id);
        $data['emails'] = $this->Model_main_data->getEmailsById($id);
        $data['faxs'] = $this->Model_main_data->getFaxById($id);
//         $this->test($data['result']);
        $data['subview'] = 'admin/public_relations/website/main_data/main_data';
        $this->load->view('admin_index', $data);

    }


    public function get_banks()
    {
        $data['banks'] = $this->Model_main_data->select_bank();
        $this->load->view('admin/public_relations/website/main_data/get_banks', $data);
    }

    public function update_bank_status($id, $bank_account, $gmaya_id)
    {
        $this->Model_main_data->update_bank_status($id, $bank_account, $gmaya_id);
        redirect("public_relations/website/main_data/Main_data/update_main_data/$gmaya_id", 'refresh');
    }


} // END CLASS 


