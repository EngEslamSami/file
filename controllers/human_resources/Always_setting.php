<?php

class Always_setting extends MY_Controller
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
        /*  $this->load->model('Nationality');
          $this->load->model('Department');
          $this->load->model('finance_resource_models/Guaranty');
          $this->load->model('finance_resource_models/Endowments');
          $this->load->model('finance_resource_models/Operation_guaranty');
          $this->load->model('finance_resource_models/Donors');
          $this->load->model('finance_resource_models/Donors_gurantee'); */

        $this->load->model('system_management/Groups');
        $this->main_groups = $this->Groups->main_fetch_group();
        $this->groups = $this->Groups->get_group($_SESSION["group_number"]);
        $this->groups_title = $this->Groups->get_group_title($_SESSION["group_number"]);

        /**********************************************************/
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in = $this->Counting->get_basic_in_num();
        $this->files_basic_in = $this->Counting->get_files_basic_in();
        /*************************************************************/
        $this->load->model('human_resources_model/Always_model');
        $this->load->model('human_resources_model/Season_time_model');


    }

    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }

    private function message($type, $text)
    {
        if ($type == 'success') {
            return $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> تم بنجاح!</strong> ' . $text . '.</div>');
        } elseif ($type == 'wiring') {
            return $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> تحذير  !</strong> ' . $text . '.</div>');
        } elseif ($type == 'error') {
            return $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>خطأ!</strong> ' . $text . '.</div>');
        }
    }


    public function always_setting() // human_resources/Always_setting/always_setting
    {
        if ($this->input->post('add')) {
            $this->Always_model->insert_always();

            redirect('human_resources/Always_setting/always_setting');
        }
        $data['title'] = "إعدادات الدوام";
        $data['records'] = $this->Always_model->all_always();
        $data['times'] = $this->Season_time_model->select();

        $data['subview'] = 'admin/Human_resources/always/always_settings';
        $this->load->view('admin_index', $data);
    }

    public function update_always($id) // human_resources/Always_setting/update_always
    {
        if ($this->input->post('add')) {
            $this->Always_model->update_always($id);
            redirect('human_resources/Always_setting/always_setting');
        }
        $data['title'] = "تعديل الدوام";
        $data['record'] = $this->Always_model->getById_always($id);
        $data['times'] = $this->Season_time_model->select();

        $data['subview'] = 'admin/Human_resources/always/always_settings';
        $this->load->view('admin_index', $data);
    }

    public function delete_always($id)
    {  // human_resources/Always_setting/delete_always
        $this->Always_model->delete_always($id);
        $this->message('success', 'حذف ');
        redirect('human_resources/Always_setting/always_setting', 'refresh');
    }


    public function season_time() // human_resources/Always_setting/season_time
    {
        if ($this->input->post('add')) {
            $this->Season_time_model->insert();

            redirect('human_resources/Always_setting/season_time');
        }
        $data['title'] = "إعدادات التوقيت";
        $data['records'] = $this->Season_time_model->select();
        $data['times'] = $this->Season_time_model->select_avilable_time();
//        $this->test($data['times']);
        $data['subview'] = 'admin/Human_resources/always/season_time_view';
        $this->load->view('admin_index', $data);
    }

    public function update_season_time($id)
    {
        $id = base64_decode($id);
        if ($this->input->post('add')) {
            $this->Season_time_model->update($id);
            redirect('human_resources/Always_setting/season_time');
        }
        $data['title'] = "تعديل التوقيت";
        $data['record'] = $this->Season_time_model->select_row($id);
        $data['subview'] = 'admin/Human_resources/always/season_time_view';
        $this->load->view('admin_index', $data);
    }

    public function delete_season_time($id)
    {
        $id = base64_decode($id);

        $this->Season_time_model->delete($id);
        $this->message('success', 'حذف ');
        redirect('human_resources/Always_setting/season_time');
    }

    public function update_status_season()
    {

        $new_statue = $this->input->post('status');
        $id = $this->input->post('id');
        $this->Season_time_model->update_status_season($new_statue, $id);
        $data['records'] = $this->Season_time_model->select();
        echo json_encode($data['records']);
    }
}