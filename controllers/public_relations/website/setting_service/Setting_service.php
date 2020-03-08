<?php
/**
 * Created by PhpStorm.
 * User: nnnnn
 * Date: 16/02/2019
 * Time: 02:44 م
 */

class Setting_service extends MY_Controller
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
        $this->load->model('Public_relations/website/services_setting_model/Family_web_profile','family_web_profile');

    }
    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }
//C:\laragon\www\lastAbnaa_30\application\views\admin\public_relations\website\service_setting_view\add_category_ser_view.php

    public function service_setting()//public_relations/website/setting_service/Setting_service/service_setting
    {
        $data['categores'] = $this->family_web_profile->get_cat();
        $data['services'] = $this->family_web_profile->details_service();
//        $this->test($data['services']);
        if ($this->input->post('save')) {
//            echo '<pre>';print_r($this->input->post('docm_asked'));die;
            $this->family_web_profile->insert_service();
            redirect('public_relations/website/setting_service/Setting_service/service_setting', 'refresh');
        }
        $data['title'] = " اعدادات الخدمات ";
        $data['subview'] = 'admin/public_relations/website/service_setting_view/service_seting_view';
        $this->load->view('admin_index', $data);
    }

    public function service_setting_update($id)//family_controllers/Setting/service_setting
    {

        $data['categores'] = $this->family_web_profile->get_cat();
        $data['service_details'] = $this->family_web_profile->details_service_by(base64_decode($id));
//        $this->test($data['service_details']);
        if ($this->input->post('save')) {
//            echo '<pre>';print_r($this->input->post('docm_asked'));die;
            $this->family_web_profile->update_service(base64_decode($id));
            redirect('public_relations/website/setting_service/Setting_service/service_setting', 'refresh');
        }
        $data['title'] = " اعدادات الخدمات ";
        $data['subview'] = 'admin/public_relations/website/service_setting_view/service_seting_view';
        $this->load->view('admin_index', $data);
    }

    public function desc_service_setting()//family_controllers/Setting/desc_service_setting
    {
        $data['service'] = $this->family_web_profile->get_services();
        $data['desc_service'] = $this->family_web_profile->get_all_desc__services();
//        $this->test($data['desc_service']);

        if ($this->input->post('save')) {
//            echo '<pre>';print_r($this->input->post('docm_asked'));die;
            $this->family_web_profile->insert_service_desc();
            redirect('public_relations/website/setting_service/Setting_service/desc_service_setting', 'refresh');
        }
        $data['title'] = " اعدادات وصف الخدمات ";
        $data['subview'] = 'admin/public_relations/website/service_setting_view/add_description_serviec_view';
        $this->load->view('admin_index', $data);
    }

    public function cat_service_setting()//family_controllers/Setting/cat_service_setting
    {
        $data['service'] = $this->family_web_profile->get_services();
        $data['cat_service'] = $this->family_web_profile->get_allf2at_services();
//        $this->test($data['cat_service']);
        if ($this->input->post('save')) {
//            echo '<pre>';print_r($this->input->post('docm_asked'));die;
            $this->family_web_profile->insert_cats();
            redirect('public_relations/website/setting_service/Setting_service/cat_service_setting', 'refresh');
        }
        $data['title'] = " اعدادات وصف الخدمات ";
        $data['title2'] = "  وصف الخدمات ";
        $data['subview'] = 'admin/public_relations/website/service_setting_view/add_category_ser_view';
        $this->load->view('admin_index', $data);
    }

    public function getf2at_service()
    {
        $id = $this->input->post('service_id');
        $data['f2at'] = $this->family_web_profile->getf2at_service($id);
        echo json_encode($data['f2at']);
    }

    public function details_service_by()
    {
        $id = base64_decode($this->input->post('service_id'));
        $data['ser'] = $this->family_web_profile->details_service_by($id);
//        echo json_encode($data['ser']);
        $this->load->view('admin/public_relations/website/service_setting_view/services_details_pop_view', $data);

    }

    public function cat_service_setting_delete($id)
    {
        $this->family_web_profile->cat_service_setting_delete(base64_decode($id));
        redirect('public_relations/website/setting_service/Setting_service/cat_service_setting', 'refresh');
    }

    public function service_setting_delete($id)
    {
        $this->family_web_profile->service_setting_delete(base64_decode($id));
        redirect('public_relations/website/setting_service/Setting_service/service_setting', 'refresh');
    }

    public function cat_service_setting_uptate($id)
    {
        $data['service'] = $this->family_web_profile->get_services();
        $data['f2at'] = $this->family_web_profile->getf2at_ser(base64_decode($id));
//        $this->test($data['f2at']);
        if ($this->input->post('save')) {
            $this->family_web_profile->cat_service_setting_uptate(base64_decode($id));
            redirect('public_relations/website/setting_service/Setting_service/cat_service_setting', 'refresh');
        }
        $data['title'] = " اعدادات وصف الخدمات ";
        $data['title2'] = "  وصف الخدمات ";
        $data['subview'] = 'admin/public_relations/website/service_setting_view/add_category_ser_view';
        $this->load->view('admin_index', $data);

    }

    public function desc_cat_service_setting_delete($id)
    {
        $this->family_web_profile->desc_cat_service_setting_delete(base64_decode($id));
        redirect('public_relations/website/setting_service/Setting_service/desc_service_setting', 'refresh');
    }

    public function desc_cat_service_setting_uptate($id)
    {
        $data['service'] = $this->family_web_profile->get_services();
        $data['desc'] = $this->family_web_profile->get_by_desc__services(base64_decode($id));
//        $this->test($data['desc']);
        if ($this->input->post('save')) {
            $this->family_web_profile->desc_cat_service_setting_uptate(base64_decode($id));
            redirect('public_relations/website/setting_service/Setting_service/desc_service_setting', 'refresh');
        }
        $data['title'] = " اعدادات وصف الخدمات ";
        $data['title2'] = "  وصف الخدمات ";
        $data['subview'] = 'admin/public_relations/website/service_setting_view/add_description_serviec_view';
        $this->load->view('admin_index', $data);

    }

    }