<?php
class Setting extends MY_Controller{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }

        $this->load->model('familys_models/for_dash/Counting');
        $this->load->model('system_management/Groups');
        $this->count_basic_in = $this->Counting->get_basic_in_num();
        $this->files_basic_in = $this->Counting->get_files_basic_in();
        $this->load->helper(array('url', 'text', 'permission', 'form'));
        $this->main_groups = $this->Groups->main_fetch_group();
        $this->groups = $this->Groups->get_group($_SESSION["group_number"]);
        $this->groups_title = $this->Groups->get_group_title($_SESSION["group_number"]);
        $this->load->model('human_resources_model/cost_center_setting/Setting_model');


    }


    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }

    public function messages($type,$text,$method=false)
    {
        $CI =& get_instance();
        $CI->load->library("session");
        if($type =='success') {
            return $CI->session->set_flashdata('message','<script> swal({
                    title:"'.$text.'" ,
                    confirmButtonText: "تم"
                })</script>');
        }

        elseif($type=='warning'){
            return $CI->session->set_flashdata('message','<div class="alert alert-warning alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>   !</strong> '.$text.'.</div>');
        }elseif($type=='error'){
            return $CI->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> !</strong> '.$text.'.</div>');
        }

    }
    public function buildTree($elements, $parent = 0)
    {
        $branch = array();
        foreach ($elements as $element) {
            if ($element->parent == $parent) {
                $children = $this->buildTree($elements, $element->id);
                if ($children) {
                    $element->subs = $children;
                }
                $branch[$element->id] = $element;
            }
        }
        return $branch;
    }

    public function index(){ // human_resources/cost_center_setting/Setting
        if ($this->input->post('add')){
            $this->Setting_model->add_settings(17);
            $this->messages('success','تم الاضافة بنجاح ');
            redirect('human_resources/cost_center_setting/Setting' ,'refresh');
        }
        if ($this->input->post('save')){
            $this->Setting_model->insert_markz_taklfa();
            $this->messages('success','تم الاضافة بنجاح ');
            redirect('human_resources/cost_center_setting/Setting' ,'refresh');
        }
         $data['active'] = 'active';
        $data['records'] = $this->Setting_model->get_all();
        $data['bdlat'] = $this->Setting_model->get_bdlat();
        $records = $this->Setting_model->getAllAccounts();
        $data['tree'] = $this->buildTree($records);
        $data['all_mrakz']= $this->Setting_model->display_markz_taklfa();
       // $this->test( $data['records']);
        $data['title'] = "اعدادات مراكز التكلفة  ";
        $data['subview'] = 'admin/Human_resources/cost_center_setting/cost_setting_view';
        $this->load->view('admin_index', $data);
    }
    public function UpdateSetting($id){

        if ($this->input->post('add')){
            $this->Setting_model->update_settings($id);
            $this->messages('success','تم التعديل بنجاح ');
            redirect('human_resources/cost_center_setting/Setting' ,'refresh');
        }
            $data['bdlat'] = $this->Setting_model->get_bdlat();

           $data['get_cost'] = $this->Setting_model->get_by_id($id);
        // $this->test( $data['records']);
        $data['title'] = "اعدادات مراكز التكلفة  ";
        $data['subview'] = 'admin/Human_resources/cost_center_setting/cost_setting_view';
        $this->load->view('admin_index', $data);

    }

    public function Update_markz($id){


        if ($this->input->post('save')){
            $this->Setting_model->update_markz_taklfa($id);
            $this->messages('success','تم التعديل بنجاح ');
            redirect('human_resources/cost_center_setting/Setting' ,'refresh');
        }
        $records = $this->Setting_model->getAllAccounts();
        $data['tree'] = $this->buildTree($records);
        $data['records'] = $this->Setting_model->get_all();
        $data['get_markz'] = $this->Setting_model->get_markz_tklfa($id);
        $data['bdlat'] = $this->Setting_model->get_bdlat();

        // $this->test( $data['records']);
        $data['title'] = "اعدادات مراكز التكلفة  ";
        $data['subview'] = 'admin/Human_resources/cost_center_setting/cost_setting_view';
        $this->load->view('admin_index', $data);

    }
    public function DeleteSetting($id){
        $this->Setting_model->delete_setting($id);
        $this->messages('success','تم الحذف بنجاح ');
        redirect('human_resources/cost_center_setting/Setting' ,'refresh');
    }
    public function DeleteMarkzSetting($id){
        $this->Setting_model->delete_markz_setting($id);
        $this->messages('success','تم الحذف بنجاح ');
        redirect('human_resources/cost_center_setting/Setting' ,'refresh');
    }

}