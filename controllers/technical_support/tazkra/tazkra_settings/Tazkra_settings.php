<?php
class Tazkra_settings extends MY_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->library('pagination');
        if($this->session->userdata('is_logged_in')==0){
            redirect('login');
        }
        /**********************************************************/
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in  = $this->Counting->get_basic_in_num();
        $this->files_basic_in  = $this->Counting->get_files_basic_in();
        /*************************************************************/
        $this->load->helper(array('url','text','permission','form'));

        $this->load->model('system_management/Groups');


        $this->groups=$this->Groups->get_group($_SESSION["group_number"]);
        $this->groups_title=$this->Groups->get_group_title($_SESSION["group_number"]);
        $this->load->model('technical_support/tazkra/tazkra_settings/Tazkra_settings_model');
        $this->load->library('google_maps');
        $this->myarray = array(
            1 => ' أنواع التذاكر',
            2 => 'الأولوية '

        );
    }
    private  function test($data=array()){
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
    public function add_setting($type=0){ // technical_support/tazkra/tazkra_settings/Tazkra_settings/add_setting

        $data['typee'] = $type;
        $data['all'] = $this->Tazkra_settings_model->get_all_setting($this->myarray);
        if ($this->input->post('add')) {
            $this->Tazkra_settings_model->insert_setting($type);
            $this->messages('success', 'تم اضافة ' . $this->myarray[$type]);
            redirect('technical_support/tazkra/tazkra_settings/Tazkra_settings/add_setting/'.$type, 'refresh');
        }
        $data['title']=' الإعدادات';
        $data['subview']= 'admin/technical_support/tazkra/tazkra_settings/tazkra_settings_view';
        $this->load->view('admin_index',$data);

    }

    public function update_setting($id, $type){
        $data['typee'] = $type;
        $data['get_setting'] = $this->Tazkra_settings_model->get_by_id($id);
        $data['typee'] = $type;
        $data["id"] = $id;
        //$data["type_name"] = $this->myarray[$type];
        if ($this->input->post('add')) {
            $this->Tazkra_settings_model->update_setting($id);
            $this->messages('success', '  تم التعديل بنجاح');
            redirect('technical_support/tazkra/tazkra_settings/Tazkra_settings/add_setting/'.$type, 'refresh');
        }
        $data['title']=' الإعدادات';
        $data['subview']= 'admin/technical_support/tazkra/tazkra_settings/tazkra_settings_view';
        $this->load->view('admin_index',$data);

    }
    public function delete_settings($id,$type){
        $this->Tazkra_settings_model->delete_setting($id);
        $this->messages('success',' تم الحذف بنجاح');
        redirect('technical_support/tazkra/tazkra_settings/Tazkra_settings/add_setting/'.$type, 'refresh');

    }
}