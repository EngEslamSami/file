<?php
class Managers_and_authorities_settings extends MY_Controller
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

        $this->load->model('human_resources_model/Managers_and_authorities_settings_model');
        //  $this->myarray = $this->Employee_setting->all_settings();
    }


    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }

    function upload_muli_image($input_name)
    {
        $filesCount = count($_FILES[$input_name]['name']);

        for($i = 0; $i < $filesCount; $i++){
            $_FILES['userFile']['name'] = $_FILES[$input_name]['name'][$i];
            $_FILES['userFile']['type'] = $_FILES[$input_name]['type'][$i];
            $_FILES['userFile']['tmp_name'] = $_FILES[$input_name]['tmp_name'][$i];
            $_FILES['userFile']['error'] = $_FILES[$input_name]['error'][$i];
            $_FILES['userFile']['size'] = $_FILES[$input_name]['size'][$i];
            $all_img[]= $this->upload_image("userFile");
        }
        return $all_img;
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


    private  function upload_image($file_name){
        $config['upload_path'] = 'uploads/images';
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf';
        $config['max_size']    = '1024*8';
        $config['encrypt_name']=true;
        $this->load->library('upload',$config);
        if(! $this->upload->do_upload($file_name)){
            return  false;
        }else{
            $datafile = $this->upload->data();
           // $this->thumb($datafile);
            return  $datafile['file_name'];
        }
    }



    public function add_departments_managers(){  // human_resources/Managers_and_authorities_settings/add_departments_managers
        if($this->input->post('add')){
            $files = $this->upload_muli_image('sign_img');
            $this->Managers_and_authorities_settings_model->insert($files);
            $this->message('success','إضافة مدراء الإدارات');
            redirect('human_resources/Managers_and_authorities_settings/add_departments_managers' ,'refresh');
        }else{
            $data['mainDepartments'] = $this->Managers_and_authorities_settings_model->select_all_departments();
            $data['records'] =$this->Managers_and_authorities_settings_model->select_all();
            $data['title'] = 'مدراء الإدارات';
            $data['subview'] = 'admin/Human_resources/managers_and_authorities_settings/add_departments_managers';
            $this->load->view('admin_index', $data);
        }

    }
   /* public function get_manager(){
        $data['mainDepartments'] = $this->Managers_and_authorities_settings_model->select_all_departments();

        $data['employees'] = $this->Difined_model->select_all("employees","","","","");
        $this->load->view('admin/Human_resources/managers_and_authorities_settings/get_manager',$data);
    }*/


    public function get_manager()
    {
        $data['mainDepartments'] = $this->Managers_and_authorities_settings_model->select_all_departments();

        $data['employees'] = $this->Difined_model->select_all("employees", "", "", "", "");
        $data['magles_edara'] = $this->Managers_and_authorities_settings_model->select_all_by("md_all_magls_edara_members", array('mansp_fk' => 1));
        $this->load->view('admin/Human_resources/managers_and_authorities_settings/get_manager', $data);
    }
   /* public function Update_departments_managers(){
        if($this->input->post("update_id")){
            $id=$this->input->post("update_id");
            $data_load["result"]=$this->Managers_and_authorities_settings_model->getById($id);
            $data_load['mainDepartments'] = $this->Managers_and_authorities_settings_model->select_all_departments();
            $data_load['employees'] = $this->Difined_model->select_all("employees","","","","");
            $this->load->view('admin/Human_resources/managers_and_authorities_settings/get_update' , $data_load);
        }elseif($this->input->post("id_update") && $this->input->post('update') ){
            $id= $this->input->post("id_update") ;
            $file ='sign_img';
            $file_upload =$this->upload_image($file);
            $this->Managers_and_authorities_settings_model->update($id,$file_upload);
            redirect('human_resources/Managers_and_authorities_settings/add_departments_managers' ,'refresh');
        }
    }*/

    public function Update_departments_managers()
    {
        if ($this->input->post("update_id")) {
            $id = $this->input->post("update_id");
            $data_load["result"] = $this->Managers_and_authorities_settings_model->getById($id);
            $data_load['mainDepartments'] = $this->Managers_and_authorities_settings_model->select_all_departments();
            $data_load['employees'] = $this->Difined_model->select_all("employees", "", "", "", "");
            $data_load['magles_edara'] = $this->Managers_and_authorities_settings_model->select_all_by("md_all_magls_edara_members", array('mansp_fk' => 1));
            $this->load->view('admin/Human_resources/managers_and_authorities_settings/get_update', $data_load);
        } elseif ($this->input->post("id_update") && $this->input->post('update')) {
            $id = $this->input->post("id_update");
            $file = 'sign_img';
            $file_upload = $this->upload_image($file);
            $this->Managers_and_authorities_settings_model->update($id, $file_upload);
            redirect('human_resources/Managers_and_authorities_settings/add_departments_managers', 'refresh');
        }
    }


    public function Delete_departments_managers($id){
        $this->Managers_and_authorities_settings_model->delete($id);
        $this->message('success','حذف ');
        redirect('human_resources/Managers_and_authorities_settings/add_departments_managers','refresh');
    }





    public function add_authorities_managers(){  // human_resources/Managers_and_authorities_settings/add_authorities_managers
        if($this->input->post('add')){
            $files = $this->upload_muli_image('sign_img');
            $this->Managers_and_authorities_settings_model->insert_authorities_managers($files);
            $this->message('success','إضافة مسئولي الإجراءات');
            redirect('human_resources/Managers_and_authorities_settings/add_authorities_managers' ,'refresh');
        }else{
            $data['records'] =$this->Managers_and_authorities_settings_model->select_all_jobtitles();
            $data['title'] = 'مسئولي الإجراءات';
            $data['subview'] = 'admin/Human_resources/managers_and_authorities_settings/add_authorities_managers';
            $this->load->view('admin_index', $data);
        }

    }

    public function get_jobtitle(){
        $data['jobtitles'] = $this->Managers_and_authorities_settings_model->select_all_defined(4);
        $data['employees'] = $this->Difined_model->select_all("employees","","","","");
        $this->load->view('admin/Human_resources/managers_and_authorities_settings/get_jobtitle',$data);
    }


    public function Update_authorities_managers(){
        if($this->input->post("update_id")){
            $id=$this->input->post("update_id");
            $data_load["result"]=$this->Managers_and_authorities_settings_model->getById_authorities($id);
            $data_load['jobtitles'] = $this->Managers_and_authorities_settings_model->select_all_defined(4);
            $data_load['employees'] = $this->Difined_model->select_all("employees","","","","");
            $this->load->view('admin/Human_resources/managers_and_authorities_settings/get_authorities_update' , $data_load);
        }elseif($this->input->post("id_update") && $this->input->post('update') ){
            $id= $this->input->post("id_update") ;
            $file ='sign_img';
            $file_upload =$this->upload_image($file);
            $this->Managers_and_authorities_settings_model->update_authorities_managers($id,$file_upload);
            redirect('human_resources/Managers_and_authorities_settings/add_authorities_managers' ,'refresh');
        }
    }

    public function Delete_authorities_managers($id){
        $this->Managers_and_authorities_settings_model->delete_authorities($id);
        $this->message('success','حذف ');
        redirect('human_resources/Managers_and_authorities_settings/add_authorities_managers' ,'refresh');
    }
    public function fill_select()
    {
      $data['records']= $this->Managers_and_authorities_settings_model->get_by_ids();
      $this->load->view('admin/Human_resources/managers_and_authorities_settings/get_options',$data);
    }

}
