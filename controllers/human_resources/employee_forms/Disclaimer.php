<?php
class Disclaimer extends MY_Controller
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


    public function addDisclaimer() // human_resources/employee_forms/Disclaimer/addDisclaimer
    {
        $this->load->model('Difined_model');
        $this->load->model('human_resources_model/Employee_model');
        if($this->input->post('add')){
            $this->Employee_model->insertDisclaimer();

           // redirect('human_resources/employee_forms/Disclaimer/addDisclaimer');
           
             if ($this->input->post('from_profile')) {
                redirect('maham_mowazf/person_profile/Personal_profile', 'refresh');
            } else {
                redirect('human_resources/employee_forms/Disclaimer/addDisclaimer');
            }
        }
        $data['all_emps'] = $this->Difined_model->select_all('employees', '', '', 'id', 'ASC');
        $data['departments'] = $this->Employee_model->get_employee_data();
        $data['allDisclaimers'] = $this->Employee_model->allDisclaimer();
        //$this->test($data['allDisclaimers']);
        $data["personal_data"]=$this->Employee_model->get_one_employee($_SESSION['emp_code']);
        $data['title'] = 'إخلاء طرف';
       // $data['subview'] = 'admin/Human_resources/employee_forms/disclaimer/add_disclaimer';
       // $this->load->view('admin_index',$data);
          if ($this->input->post('from_profile')) {
            $this->load->view('admin/Human_resources/employee_forms/disclaimer/add_disclaimer', $data);
        } else {
            $data['subview'] = 'admin/Human_resources/employee_forms/disclaimer/add_disclaimer';
            $this->load->view('admin_index', $data);
        }
       
    }

    public function updateDisclaimer($id= false) // human_resources/employee_forms/Disclaimer/updateDisclaimer
    {


        $this->load->model('Difined_model');
        $this->load->model('human_resources_model/Employee_model');
        if($this->input->post('add')){
            $this->Employee_model->updateDisclaimer($id);

           // redirect('human_resources/employee_forms/Disclaimer/addDisclaimer');
              if ($this->input->post('from_profile')) {
                redirect('maham_mowazf/person_profile/Personal_profile', 'refresh');
            } else {
                redirect('human_resources/employee_forms/Disclaimer/addDisclaimer');
            }
           
           
        }
         if ($this->input->post('id')) {
            $id = $this->input->post('id');
        }
        $data['all_emps'] = $this->Difined_model->select_all('employees', '', '', 'id', 'ASC');
        $data['departments'] = $this->Employee_model->get_employee_data();
        $data['disclaimer'] = $this->Employee_model->findDisclaimer($id);
      //  $this->test($data['disclaimer']);
        $data["personal_data"]=$this->Employee_model->get_one_employee($data['disclaimer']['emp_id']);
        $data['title'] = 'إخلاء طرف';
       // $data['subview'] = 'admin/Human_resources/employee_forms/disclaimer/add_disclaimer';
       // $this->load->view('admin_index',$data);
       
         if ($this->input->post('from_profile')) {
            $this->load->view('admin/Human_resources/employee_forms/disclaimer/add_disclaimer', $data);
        } else {
            $data['subview'] = 'admin/Human_resources/employee_forms/disclaimer/add_disclaimer';
            $this->load->view('admin_index', $data);
        }
       
    }

    public function getEmployeeDetails(){ // human_resources/Disclaimer/getEmployeeDetails
        $this->load->model('human_resources_model/Employee_model');
        $id = $this->input->post('employee_id');
        $employee_info =$this->Employee_model->get_one_employee($id)[0];
        echo json_encode($employee_info);
    }

    public function DeleteDisclaimer($id, $from = false){
        $this->load->model('human_resources_model/Employee_model');
        $this->Employee_model->deleteDisclaimer($id);
        $this->message('success','حذف ');
        //redirect('human_resources/employee_forms/Disclaimer/addDisclaimer' ,'refresh');
         if (!empty($from) && ($from == 1)) {
            redirect('maham_mowazf/person_profile/Personal_profile', 'refresh');
        } else {
            redirect('human_resources/employee_forms/Disclaimer/addDisclaimer', 'refresh');
        }
        
    }




    public function get_load_page()
    {
        $this->load->model('human_resources_model/Employee_model');
        $data_load["personal_data"]=$this->Employee_model->get_one_employee($this->input->post('valu'));
        $this->load->view('admin/Human_resources/sidebar_person_data_vacation',$data_load);
    }

    public function printDisclaimer($id)
    {
        $this->load->model('Difined_model');
        $this->load->model('human_resources_model/Employee_model');
        $data['all_emps'] = $this->Difined_model->select_all('employees', '', '', 'id', 'ASC');
        $data['departments'] = $this->Employee_model->get_employee_data();
        $data['disclaimer'] = $this->Employee_model->findDisclaimer($id);
        
        $data["personal_data"]=$this->Employee_model->get_one_employee($data['disclaimer']['emp_id']);

        $this->load->view('admin/Human_resources/employee_forms/disclaimer/print_disclaimer',$data);
        
    }






}