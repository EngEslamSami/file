<?php

class Donor extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }
        $this->load->helper(array('url', 'text', 'permission', 'form'));
        $this->load->model('Difined_model');
        $this->load->model('Nationality');
        $this->load->model('Department');
        $this->load->model('all_Finance_resource_models/donors/Donor_model');

        $this->load->model('system_management/Groups');

        $this->groups = $this->Groups->get_group($_SESSION["group_number"]);
        $this->groups_title = $this->Groups->get_group_title($_SESSION["group_number"]);


        /**********************************************************/
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in = $this->Counting->get_basic_in_num();
        $this->files_basic_in = $this->Counting->get_files_basic_in();
        /*************************************************************/
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

    private function upload_file($file_name)
    {
        $config['upload_path'] = 'uploads/files';
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
        $config['max_size'] = '1024*8';
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

    /**
     *  ================================================================================================================
     *
     *  ================================================================================================================
     *
     *  ================================================================================================================
     */

    public function index()//all_Finance_resource/donors/Donor/
    {

        $data['title']="اضافه متبرع";
      if($this->input->post('add'))
      {
          $this->Donor_model->insert_donor();
          redirect("all_Finance_resource/donors/Donor",'refresh');

      }
         $data['types_card']=$this->Donor_model->get_by_types(3); //انواع الهويه
        $data['source_card']=$this->Donor_model->get_by_types(4); //مصدر الهويه
        $data['city']=$this->Donor_model->get_by_types(6); //المدن
        $data['functions']=$this->Donor_model->get_by_types(2); //المهن
        $data['specialize']=$this->Donor_model->get_by_types(7); //التخصصات
        $data['activities']=$this->Donor_model->get_by_types(5); //انشطه المؤسسات
        $data['banks']=$this->Donor_model->get_all_banks();
        $data['records']=$this->Donor_model->get_from_fr_donors();
        $data['num']=$this->Donor_model->get_order_num();

        $data['subview'] = 'admin/all_Finance_resource_views/donors/donor.php';
        $this->load->view('admin_index', $data);
    }
    public function edit_donor($id)
    {
        if($this->input->post('add'))
        {
            $this->Donor_model->update_donor($id);
            redirect("all_Finance_resource/donors/Donor",'refresh');

        }
        $data['title']="تعديل المتبرع";
        $data['types_card']=$this->Donor_model->get_by_types(3); //انواع الهويه
        $data['source_card']=$this->Donor_model->get_by_types(4); //مصدر الهويه
        $data['city']=$this->Donor_model->get_by_types(6); //المدن
        $data['functions']=$this->Donor_model->get_by_types(2); //المهن
        $data['specialize']=$this->Donor_model->get_by_types(7); //التخصصات
        $data['activities']=$this->Donor_model->get_by_types(5); //انشطه المؤسسات
        $data['banks']=$this->Donor_model->get_all_banks();
        $data['records']=$this->Donor_model->get_from_fr_donors();
        $data['num']=$this->Donor_model->get_order_num();
        $data['item']=$this->Donor_model->get_by_id($id);
        $data['subview'] = 'admin/all_Finance_resource_views/donors/donor.php';
        $this->load->view('admin_index', $data);

    }

    public function delete_record($id)
    {
        $this->Donor_model->delete_data($id);
        redirect("all_Finance_resource/donors/Donor",'refresh');



    }
}