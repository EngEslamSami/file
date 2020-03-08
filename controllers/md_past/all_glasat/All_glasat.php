<?php
class All_glasat extends MY_Controller
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
        $this->load->model('md/all_glasat/Glasat_model');


        $this->count_basic_in = $this->Counting->get_basic_in_num();
        $this->files_basic_in = $this->Counting->get_files_basic_in();
        /*************************************************************/
        $this->load->model('system_management/Groups');

        $this->load->model('Public_relations/Report_model');

        $this->groups = $this->Groups->get_group($_SESSION["group_number"]);
        $this->groups_title = $this->Groups->get_group_title($_SESSION["group_number"]);

        $this->load->model('main_data/Model_main_data');
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

    public function index()
    {
       
       if($this->input->post('add'))
       {
           $this->Glasat_model->insert_galsa();
           $this->Glasat_model->insert_galsa_member();
           $this->message('success','تمت الاضافه بنجاح');
           redirect('md/all_glasat/all_glasat');

       }
        $data['last_magls']=$this->Glasat_model->get_last_magls();
        $data['records']=$this->Glasat_model->select_all();

        $data['last_galsa']=$this->Glasat_model->get_last_galsa();
        $data['members']=$this->Glasat_model->get_magls_member($data['last_magls']->mg_code);

        $data['title']="فتح جلسة جديدة ";
        $data['title_t']="قائمة الجلسات";

        $data['subview'] = 'admin/md/all_glasat/all_glasat';
        $this->load->view('admin_index', $data);
    }
    public function update_galsa($rkm,$code)
    {
        $data['last_galsa']=$this->Glasat_model->get_by_rkm($rkm)->glsa_rkm;
        $data['galsa_member']=$this->Glasat_model->get_galsa_member($rkm,$code);

        $data['last_magls_update']=$this->Glasat_model->get_by_rkm($rkm);
        $data['members']=$this->Glasat_model->get_magls_member($data['last_magls_update']->mgls_code);

        if($this->input->post('add'))
        {
            $this->Glasat_model->update_galsa_member($rkm,$code);
            $this->Glasat_model->update_galsa($rkm,$code);

            $this->message('success','تمت التعديل بنجاح');
            redirect('md/all_glasat/all_glasat');


        }


        $data['subview'] = 'admin/md/all_glasat/all_glasat';
        $this->load->view('admin_index', $data);


    }


}