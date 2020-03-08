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
    function upload_muli_image($input_name)
    {
        $filesCount = count($_FILES[$input_name]['name']);

        for ($i = 0; $i < $filesCount; $i++) {
            $_FILES['userFile']['name'] = $_FILES[$input_name]['name'][$i];
            $_FILES['userFile']['type'] = $_FILES[$input_name]['type'][$i];
            $_FILES['userFile']['tmp_name'] = $_FILES[$input_name]['tmp_name'][$i];
            $_FILES['userFile']['error'] = $_FILES[$input_name]['error'][$i];
            $_FILES['userFile']['size'] = $_FILES[$input_name]['size'][$i];
            $all_img[] = $this->upload_image("userFile");
        }
        return $all_img;
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
          $img=$this->upload_image('img');
          $this->Donor_model->insert_donor($img);
          redirect("all_Finance_resource/donors/Donor",'refresh');

      }
         $data['types_card']=$this->Donor_model->get_by_types(3); //انواع الهويه
        $data['source_card']=$this->Donor_model->get_by_types(4); //مصدر الهويه
        $data['city']=$this->Donor_model->get_by_types(6); //المدن
        $data['functions']=$this->Donor_model->get_by_types(2); //المهن
        $data['specialize']=$this->Donor_model->get_by_types(7); //التخصصات
        $data['activities']=$this->Donor_model->get_by_types(5); //انشطه المؤسسات
        $data['files']=$this->Donor_model->get_by_types(10); // المرفقات
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
        $data['subview'] = 'admin/all_Finance_resource_views/donors/donor';
        $this->load->view('admin_index', $data);

    }

    public function delete_record($id)
    {
        $this->Donor_model->delete_data($id,'fr_donors');
        redirect("all_Finance_resource/donors/Donor",'refresh');
    }
    public function print_donor($id)
    {
          $data['item']=$this->Donor_model->get_by_id($id);
        $this->load->view('admin/all_Finance_resource_views/donors/print_donor', $data);
    }

    public function print_card($id)//all_Finance_resource/donors/Donor/print_card
    {

        $data['item']=$this->Donor_model->get_by_id($id);

        $this->load->view('admin/all_Finance_resource_views/donors/print_card', $data);
    }
    public function add_row()
    {
        $data['files']=$this->Donor_model->get_by_types(10); // المرفقات
        $this->load->view('admin/all_Finance_resource_views/donors/add_row',$data);
    }
    public function upload_files($id)
    {
      $files=$this->upload_muli_image('file');
        $this->Donor_model->insert_images($files,$id);
        redirect("all_Finance_resource/donors/Donor",'refresh');

    }
    public function delete_image($id)
    {
        $this->Donor_model->delete_data($id,'fr_all_attachments');
        redirect("all_Finance_resource/donors/Donor",'refresh');
    }

    public function get_tree()
    {

        $data['main']=$this->Donor_model->get_main();

        $data['subview'] = 'admin/all_Finance_resource_views/donors/tree';
        $this->load->view('admin_index', $data);
    }
    public function get_branch_tree()
    {
       $id=$this->input->post('valu');
       $data['branches'] =$this->Donor_model->get_all_branch($id);
        $this->load->view('admin/all_Finance_resource_views/donors/load_tree',$data);
    }
}