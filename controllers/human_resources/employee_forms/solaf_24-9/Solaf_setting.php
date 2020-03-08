<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Solaf_setting extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }

        $this->load->helper(array('url', 'text', 'permission', 'form'));
        $this->load->model('system_management/Groups');
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in = $this->Counting->get_basic_in_num();
        $this->files_basic_in = $this->Counting->get_files_basic_in();
        $this->load->model('human_resources_model/employee_forms/solaf/Solaf_setting_model');

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

    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }


    public function add_setting()
    {
        //human_resources/employee_forms/solaf/Solaf_setting/add_setting

        if ($this->input->post('add')) {
//            $this->test($_POST);

            if ($this->input->post('form_type') != 0) {
                $this->Solaf_setting_model->update_setting();
                $this->messages('success', 'تم التعديل بنجاح');
            } else {
                $this->Solaf_setting_model->insert_setting();
                $this->messages('success', 'تم الحفظ بنجاح');
            }
            redirect('human_resources/employee_forms/solaf/Solaf_setting/add_setting', 'refresh');
        }


        $data['badlat'] = $this->Solaf_setting_model->get_by('emp_badlat_discount_settings', array('type' => 1));
        $data['solaf_main_setting'] = $this->Solaf_setting_model->get_by('hr_solaf_main_setting', '', 1);

        $data['title'] = "  إعدادات السلف والقرض ";
        $data['subview'] = 'admin/Human_resources/employee_forms/solaf/solaf_setting/solaf_setting';
        $this->load->view('admin_index', $data);

    }

    public function add_dwabt_setting()
    {
        //human_resources/employee_forms/solaf/Solaf_setting/add_setting

        if ($this->input->post('add')) {
//            $this->test($_POST);

            if ($this->input->post('id') != 0) {
                $this->Solaf_setting_model->update_dwabt__setting();
                $this->messages('success', 'تم التعديل بنجاح');
            } else {
                $this->Solaf_setting_model->insert_dwabt_setting();
                $this->messages('success', 'تم الحفظ بنجاح');
            }
            redirect('human_resources/employee_forms/solaf/Solaf_setting/add_setting/' . $_POST['type'], 'refresh');
        }


//        $data['title'] = "  إعدادات السلف والقرض ";
//        $data['subview'] = 'admin/Human_resources/employee_forms/solaf/solaf_setting/solaf_setting';
//        $this->load->view('admin_index', $data);

    }

    public function update_dwabt($id)
    {
        //human_resources/employee_forms/solaf/Solaf_setting/add_setting
        $id = base64_decode($id);
        $data['one_solaf_dawabt'] = $this->Solaf_setting_model->get_by('hr_solaf_dawabt', array('id' => $id), 1);

//        $this->test($data['one_solaf_dawabt']);
        $data['title'] = "  إعدادات السلف والقرض ";
        $data['tab'] = $data['one_solaf_dawabt']->type;
        $data['subview'] = 'admin/Human_resources/employee_forms/solaf/solaf_setting/solaf_setting';
        $this->load->view('admin_index', $data);

    }

    public function get_solaf_dawabt()
    {
        $data['type'] = $this->input->post('type');
        $data['solaf_dawabt'] = $this->Solaf_setting_model->get_by('hr_solaf_dawabt', array('type' => $data['type']));
        $this->load->view('admin/Human_resources/employee_forms/solaf/solaf_setting/laod_solaf_dawabt_view', $data);

    }

    public function delete_solaf_dawabt()
    {
        $data['id'] = $this->input->post('id');
        $data['type'] = $this->input->post('type');

        $this->Solaf_setting_model->delete_solaf_dawabt($data['id']);

        $data['solaf_dawabt'] = $this->Solaf_setting_model->get_by('hr_solaf_dawabt', array('type' => $data['type']));
        $this->load->view('admin/Human_resources/employee_forms/solaf/solaf_setting/laod_solaf_dawabt_view', $data);

    }

}
