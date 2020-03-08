<?php
class Setting  extends MY_Controller {
    public function __construct()
    {
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
        $this->load->library('google_maps');

        $this->load->model('aqr_model/settings/Setting_model');

        $this->myarray = array (
            1=>'أنوع الوحدات(العقارات) ',
            2=>' حالات الوحدات (العقارات)'

        );
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

        }elseif($type=='warning'){
            return $CI->session->set_flashdata('message','<div class="alert alert-warning alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>   !</strong> '.$text.'.</div>');
        }elseif($type=='error'){
            return $CI->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> !</strong> '.$text.'.</div>');
        }

    }
    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }
    public function index($type=0){ // aqr/settings/Setting
        $data['typee']= $type;
        $data['all'] = $this->Setting_model->get_all_data($this->myarray);
        // __________________Nagwa 22-8 ______________

        $data['contracts']= $this->Setting_model->get_contracts();

        // __________________Nagwa 22-8 ______________

        $data['title'] = "الاعدادات ";
        $data['subview'] = 'admin/aqr_view/settings/setting_view';
        $this->load->view('admin_index', $data);
    }
    public function AddSitting($type=0)
    { // aqr/settings/Setting/AddSitting
        if ($this->input->post('add')) {
            $this->Setting_model->insert_setting($type);
            $this->messages('success', 'تم الاضافة بنجاح ' );
            redirect('aqr/settings/Setting/index/' . $type, 'refresh');
        }
        // _______Nagwa 22-8 _______________

        elseif ($this->input->post('add_contract')){

            $this->Setting_model->add_contract_setting();
            $this->messages('success', 'تم الاضافة بنجاح ' );
            redirect('aqr/settings/Setting/index/' . $type, 'refresh');
        }

        // _______Nagwa 22-8 _______________

    }

    public function UpdateSitting($id, $type)
    {
        $data['typee'] = $type;


            $data['get_setting'] = $this->Setting_model->getById($id);
            $data['typee'] = $type;
            $data["id"] = $id;
            $data["type_name"] = $this->myarray[$type];
            if ($this->input->post('add')) {
                $this->Setting_model->update_setting($id);
                $this->messages('success', '  تم التعديل بنجاح');
                redirect('aqr/settings/Setting/index/' . $type, 'refresh');
            }

        $data['title'] = "الاعدادات ";
        $data['subview'] = 'admin/aqr_view/settings/setting_view';
        $this->load->view('admin_index', $data);

    }

    public function DeleteSitting($id, $type)
    {
        $this->Setting_model->delete_setting($id);
        $this->messages('success', 'تم الحذف بنجاح ' );
        redirect('aqr/settings/Setting/index/' . $type, 'refresh');

    }
    // _________Nagwa 22-8 _______________

    public function Update_contract($id,$type){ // reservation/settings/Settings/Update_contract

        $data['get_contract']= $this->Setting_model->get_contract_by_id($id);
        $data['typee'] = $type ;
        $data["id"]=$id;
        if($this->input->post('add_contract')){
            $this->Setting_model->update_contract($id);
            $this->messages('success','  تم التعديل بنجاح');
            redirect('aqr/settings/Setting/index/' . $type, 'refresh');
        }

        $data['title'] = "الاعدادات ";
        $data['subview'] = 'admin/aqr_view/settings/setting_view';
        $this->load->view('admin_index', $data);
    }

    public function Delete_contract($type,$id){
        $this->Setting_model->delete_contract($id);
        $this->messages('success', 'تم الحذف بنجاح ' );
        redirect('aqr/settings/Setting/index/' . $type, 'refresh');

    }
}