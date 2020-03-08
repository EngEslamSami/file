<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Mandate_orders extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }
        $this->load->model('Difined_model');
        $this->load->model('Nationality');
        $this->load->model('Department');
        $this->load->model('human_resources_model/Employee_model');
        $this->load->helper(array('url', 'text', 'permission', 'form'));
        $this->load->model('familys_models/Model_access_rule');
        $this->load->model('system_management/Groups');

        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in = $this->Counting->get_basic_in_num();
        $this->files_basic_in = $this->Counting->get_files_basic_in();
        $this->load->model('human_resources_model/Finance_employee_model');
        $this->load->model('human_resources_model/employee_forms/Mandate_order_model');
        $this->load->model('human_resources_model/employee_forms/Job_requests_model');
    }

    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
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

    private function test_r($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";

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

    private function upload_image_2($file_name, $folder = "images")
    {
        $config['upload_path'] = 'uploads/' . $folder;
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
    public function index()
    {
        $this->load->model('human_resources_model/Employee_print');


        if($this->input->post('add'))
        {

          $this->Mandate_order_model->insert_order();
          //  redirect('human_resources/employee_forms/Mandate_orders','refresh');
          
              $this->messages('success','إضافة  انتداب بنجاح');
                if ($this->input->post('from_profile')) {
                redirect('maham_mowazf/person_profile/Personal_profile', 'refresh');
            } else {
                redirect('human_resources/employee_forms/Mandate_orders', 'refresh');
            }

        }
        $data['title']="اضافه انتداب";
        $data['all_emps'] = $this->Job_requests_model->get_emp(0);

        $data['admin'] = $this->Employee_model->select_by();
        $data['departs'] = $this->Mandate_order_model->select_depart();
        $data["personal_data"]=$this->Employee_model->get_one_employee($_SESSION['emp_code']);
        $data['last_id'] = $this->Mandate_order_model->get_last();
        $data['last'] = $this->Mandate_order_model->get_last_id();
        $data['records']=$this->Mandate_order_model->get_from_hr_mandate_orders();


        $data['job_role'] = $this->Difined_model->select_search_key('all_defined_setting', 'defined_type', '4');
        $data['dest'] = $this->Difined_model->select_search_key('hr_forms_settings', '	type', '9');
       // $data['subview'] = 'admin/Human_resources/employee_forms/mandate_order/mandate_order';
       // $this->load->view('admin_index', $data);
         if ($this->input->post('from_profile')) {
            $this->load->view('admin/Human_resources/employee_forms/mandate_order/mandate_order', $data);
        } else {
            $data['subview'] = 'admin/Human_resources/employee_forms/mandate_order/mandate_order';
            $this->load->view('admin_index', $data);
        }
       
       
    }
    public function add_option()
    {

        $this->Mandate_order_model->insert_record($this->input->post('valu'));
    }
public function edit_Mandate_order($id = false)
{
     if ($this->input->post('id')) {
            $id = $this->input->post('id');
        }
    $data['all_emps'] = $this->Job_requests_model->get_emp(0);

    $data['admin'] = $this->Employee_model->select_by();
    $data['departs'] = $this->Mandate_order_model->select_depart();
    $data['row']= $this->Mandate_order_model->get_by_id($id);
    $data['emp_data'] = $this->Job_requests_model->select_depart_with_out_session($data['row']->emp_id_fk);

    $data["personal_data"]=$this->Employee_model->get_one_employee($data['row']->emp_id_fk);
  


    $data['last_id'] = $this->Mandate_order_model->get_last();
    if($this->input->post('add'))
    {

        $this->Mandate_order_model->edit_order($id);
      //  redirect('human_resources/employee_forms/Mandate_orders','refresh');
   if ($this->input->post('from_profile')) {
                redirect('maham_mowazf/person_profile/Personal_profile', 'refresh');
            } else {
                redirect('human_resources/employee_forms/Mandate_orders', 'refresh');
            }
    }

    $data['job_role'] = $this->Difined_model->select_search_key('all_defined_setting', 'defined_type', '4');
    $data['dest'] = $this->Difined_model->select_search_key('hr_forms_settings', '	type', '9');
    $data['title']="تعديل انتداب";

   // $data['subview'] = 'admin/Human_resources/employee_forms/mandate_order/mandate_order';
    //$this->load->view('admin_index', $data);
    
       if ($this->input->post('from_profile')) {
            $this->load->view('admin/Human_resources/employee_forms/mandate_order/mandate_order', $data);
        } else {
            $data['subview'] = 'admin/Human_resources/employee_forms/mandate_order/mandate_order';
            $this->load->view('admin_index', $data);
        }
}

    public function delete_mandate_order($id, $from = false)
    {
        $this->Mandate_order_model->delete_mandate_order($id);
      //  redirect('human_resources/employee_forms/Mandate_orders','refresh');
   $this->message('success', 'تم حذف ');
   if (!empty($from) && ($from == 1)) {
            redirect('maham_mowazf/person_profile/Personal_profile', 'refresh');
        } else {
            redirect('human_resources/employee_forms/Mandate_orders', 'refresh');
        }
    }
    
    
      public function getConnection_emp()
    {
        $all_Emps = $this->Mandate_order_model->get_all_emp();
//        $this->test($all_Emps);
        $arr_emp = array();
        $arr_emp['data'] = array();

        if (!empty($all_Emps)) {
            foreach ($all_Emps as $row_emp) {

                $arr_emp['data'][] = array(
                    '<input type="radio" name="choosed" value="' . $row_emp->id . '"
                       ondblclick="Get_emp_Name(this)" 
                        id="member' . $row_emp->id . '" 
                        data-emp_code="' . $row_emp->emp_code . '" 
                        data-edara_n="' . $row_emp->edara . '"
                        data-edara_id="' . $row_emp->administration . '"
                        data-name="' . $row_emp->employee . '"
                        data-job_title="' . $row_emp->job_title . '" 
                        data-qsm_n="' . $row_emp->qsm . '" 
                        data-qsm_id="' . $row_emp->department . '" 
                        
                        data-times="' . $row_emp->times . '" />',
                        

                    $row_emp->employee,
                    $row_emp->edara,
                    $row_emp->qsm,

                    ''
                );
            }
        }
        echo json_encode($arr_emp);


    }
    
    
     public function load_details(){

        $row_id = $this->input->post('row_id');
        $data['result']= $this->Mandate_order_model->get_by_id($row_id);
        $this->load->view('admin/Human_resources/employee_forms/mandate_order/load_details',$data);

    }

    public function Print_order(){
        $row_id = $this->input->post('row_id');
        $data['result']= $this->Mandate_order_model->get_by_id($row_id);
        $this->load->view('admin/Human_resources/employee_forms/mandate_order/print_order',$data);

    }

}