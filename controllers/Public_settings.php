<?php
class Public_settings extends MY_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->library('pagination');
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }
        $this->load->helper(array('url', 'text', 'permission', 'form'));

               /**********************************************************/ 
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in  = $this->Counting->get_basic_in_num();
        $this->files_basic_in  = $this->Counting->get_files_basic_in();  
      /*************************************************************/
        $this->load->model('system_management/Groups');
        $this->main_groups = $this->Groups->main_fetch_group();
        $this->groups = $this->Groups->get_group($_SESSION["group_number"]);
        $this->groups_title = $this->Groups->get_group_title($_SESSION["group_number"]);
    }
    //-----------------------------------------
    private function test($data = array()){
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }
    //-----------------------------------------
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
    //-----------------------------------------
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
    //-----------------------------------------
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
    //-----------------------------------------
    private function url()
    {
        unset($_SESSION['url']);
        $this->session->set_flashdata('url', 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
    }
    //-----------------------------------------
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
    //-----------------------------------------
    /**
     *  ================================================================================================================
     *
     *  ----------------------------------------------------------------------------------------------------------------
     *
     * -----------------------------------------------------------------------------------------------------------------
     */
     public function index(){}
    /**
     *  ================================================================================================================
     *
     *
     *
     *
     */

    public function area_settings(){ // Public_settings/area_settings
        $this->load->model('Public_settings_models/Areas');
        if ($this->input->post('add')) {
            $this->Areas->insert();
            $this->message('success', 'إضافة منطقة');
            redirect('Public_settings/area_settings', 'refresh');
        }
        $data['records'] = $this->Areas->select();
        $data['title'] = 'إضافة منطقة';
        $data['metakeyword'] = 'إعدادات المناطق';
        $data['metadiscription'] = '';
        $data['subview']= 'admin/public_settings/add_area';
        $this->load->view('admin_index',$data);
    }
    public function delete_area_settings($id)
    {
        $this->load->model('Public_settings_models/Areas');
        $this->Areas->delete($id);
        $this->message('success', 'حذف المناطق');
        redirect('Public_settings/area_settings', 'refresh');
    }
    public function update_area_settings($id)
    {
        $this->load->model('Public_settings_models/Areas');
        if ($this->input->post('update')) {
            $this->Areas->update($id);
            $this->message('success', 'تعديل المنطقة');
            redirect('Public_settings/area_settings', 'refresh');
        }
        $data['result'] = $this->Areas->getById($id);
        $data["links"] = $this->pagination->create_links();
        $data['title'] = 'تعديل المنطقة .';
        $data['metakeyword'] = 'إعدادات المناطق';
        $data['metadiscription'] = '';
        $data['subview'] = 'admin/public_settings/add_area';
        $this->load->view('admin_index', $data);
    }
    ////////////////////////////////////////////////
    public function nationality_settings(){ // Public_settings/nationality_settings
        $this->load->model('Public_settings_models/Nationalities');
        
        if ($this->input->post('add')) {
            $this->Nationalities->insert();
            $this->message('success', 'إضافة الجنسيات');
            redirect('Public_settings/nationality_settings', 'refresh');
        }
        $data['records'] = $this->Nationalities->select();
        $data['title'] = 'إضافة جنسية';
        $data['metakeyword'] = 'إعدادات الجنسيات';
        $data['metadiscription'] = '';
        $data['subview']= 'admin/public_settings/add_nationality';
        $this->load->view('admin_index',$data);
    }
    public function delete_nationality_settings($id)
    {
        $this->load->model('Public_settings_models/Nationalities');
        $this->Nationalities->delete($id);
        $this->message('success', 'حذف الجنسيات');
        redirect('Public_settings/nationality_settings', 'refresh');
    }
    public function update_nationality_settings($id)
    {
        $this->load->model('Public_settings_models/Nationalities');
        if ($this->input->post('update')) {
            $this->Nationalities->update($id);
            $this->message('success', 'تعديل الجنسيات');
            redirect('Public_settings/nationality_settings', 'refresh');
        }
        $data['result'] = $this->Nationalities->getById($id);
        $data["links"] = $this->pagination->create_links();
        $data['title'] = 'تعديل الجنسيات .';
        $data['metakeyword'] = 'إعدادات الجنسيات';
        $data['metadiscription'] = '';
        $data['subview'] = 'admin/public_settings/add_nationality';
        $this->load->view('admin_index', $data);
    }
    //--------------------------------------------------------------------
     /************************* السكن Living *************************/


    public function living_settings(){ // Public_settings/living_settings
        $this->load->model('Public_settings_models/Living');
        
        if ($this->input->post('add')) {
            $this->Living->insert();
            $this->message('success', 'إضافة نوع السكن');
            redirect('Public_settings/living_settings', 'refresh');
        }
        $data['records'] = $this->Living->select();
        $data['title'] = 'إضافة نوع السكن';
        $data['metakeyword'] = 'إعدادات السكن';
        $data['metadiscription'] = '';
        $data['subview']= 'admin/public_settings/add_living';
        $this->load->view('admin_index',$data);
    }
    public function delete_living_settings($id)
    {
        $this->load->model('Public_settings_models/Living');
        $this->Living->delete($id);
        $this->message('success', 'حذف نوع السكن');
        redirect('Public_settings/living_settings', 'refresh');
    }
    public function update_living_settings($id)
    {
        $this->load->model('Public_settings_models/Living');
        if ($this->input->post('update')) {
            $this->Living->update($id);
            $this->message('success', 'تعديل السكن');
            redirect('Public_settings/living_settings', 'refresh');
        }
        $data['result'] = $this->Living->getById($id);
        $data["links"] = $this->pagination->create_links();
        $data['title'] = 'تعديل السكن .';
        $data['metakeyword'] = 'إعدادات السكن';
        $data['metadiscription'] = '';
        $data['subview'] = 'admin/public_settings/add_living';
        $this->load->view('admin_index', $data);
    }
    /**
     *  ==========================================================================================================
     * 
     *                                                 البدالات
     * 
     *  */
    public function AddAllowancesSetting(){   //   Public_settings/AddAllowancesSetting
     $this->load->model('Public_settings_models/Model_allowances');   
       if ($this->input->post('INSERT') =="INSERT") {
            $this->Model_allowances->insert();
            $this->message('success', 'تم الاضافة بنجاح');
            redirect('Public_settings/AddAllowancesSetting', 'refresh');
        }  
        $data['tables']=$this->Model_allowances->select_all();
        $data['title'] = 'إعدادات البدلات';
        $data['metakeyword'] = 'إعدادات البدلات';
        $data['metadiscription'] = 'إعدادات البدلات';
        $data['subview'] = 'admin/public_settings/add_allowances';
        $this->load->view('admin_index', $data);  
    }
    //==========================================
        public function UpdateAllowancesSetting($id){   //
     $this->load->model('Public_settings_models/Model_allowances');   
       if ($this->input->post('UPDTATE') == "UPDTATE") {
            $this->Model_allowances->update($id);
            $this->message('success', 'تم التعديل بنجاح ');
            redirect('Public_settings/AddAllowancesSetting', 'refresh');
        }
        $data['result_id']=$this->Model_allowances->getById($id);
        $data['title'] = 'إعدادات البدلات';
        $data['metakeyword'] = 'إعدادات البدلات';
        $data['metadiscription'] = 'إعدادات البدلات';
        $data['subview'] = 'admin/public_settings/add_allowances';
        $this->load->view('admin_index', $data);  
    }
    //==========================================  Deduction
    public function DeleteAllowancesSetting($id){   
        $this->load->model('Public_settings_models/Model_allowances'); 
       $this->Model_allowances->delete(array("id"=>$id));
        $this->message('success',  'تم الحذف بنجاح');
            redirect('Public_settings/AddAllowancesSetting', 'refresh');
    }
       /**
     *  ==========================================================================================================
     *                                  
     *                                         الخصومات
     * 
     *  */
    public function AddDeductionSetting(){   //   Public_settings/AddDeductionSetting
     $this->load->model('Public_settings_models/Model_deduction');   
       if ($this->input->post('INSERT') =="INSERT") {
            $this->Model_deduction->insert();
            $this->message('success', 'تم الاضافة بنجاح');
            redirect('Public_settings/AddDeductionSetting', 'refresh');
        }
        $data['table']=$this->Model_deduction->select_all();
        $data['title'] = 'إعدادات الإستقطاعات';
        $data['metakeyword'] = 'إعدادات الإستقطاعات';
        $data['metadiscription'] = 'إعدادات الإستقطاعات';
        $data['subview'] = 'admin/public_settings/add_deduction';
        $this->load->view('admin_index', $data);  
    }
    //==========================================
        public function UpdateDeductionSetting($id){   //
     $this->load->model('Public_settings_models/Model_deduction');   
       if ($this->input->post('UPDTATE') == "UPDTATE") {
            $this->Model_deduction->update($id);
            $this->message('success', 'تم التعديل بنجاح ');
            redirect('Public_settings/AddDeductionSetting', 'refresh');
        }
        $data['result_id']=$this->Model_deduction->getById($id);
        $data['title'] = 'إعدادات الإستقطاعات';
        $data['metakeyword'] = 'إعدادات الإستقطاعات';
        $data['metadiscription'] = 'إعدادات الإستقطاعات';
        $data['subview'] = 'admin/public_settings/add_deduction';
        $this->load->view('admin_index', $data);  
    }
    //==========================================  Deduction Type of Contract
    public function DeleteDeductionSetting($id){   
        $this->load->model('Public_settings_models/Model_deduction'); 
       $this->Model_deduction->delete(array("id"=>$id));
        $this->message('success',  'تم الحذف بنجاح');
            redirect('Public_settings/AddDeductionSetting', 'refresh');
    }
        /**
     *  ==========================================================================================================
     * 
     *                             'أنواع العقود '
     * 
     *  */
      public function AddTypeContractSetting(){   //   Public_settings/AddTypeContractSetting
      $this->load->model('Public_settings_models/Model_type_contract');   
       if ($this->input->post('INSERT') =="INSERT") {
            $this->Model_type_contract->insert();
            $this->message('success', 'تم الاضافة بنجاح');
            redirect('Public_settings/AddTypeContractSetting', 'refresh');
        }
        $data['table']=$this->Model_type_contract->select_all();
        $data['title'] = 'أنواع العقود ';
        $data['metakeyword'] = 'أنواع العقود ';
        $data['metadiscription'] = 'أنواع العقود ';
        $data['subview'] = 'admin/public_settings/add_type_of_contract';
        $this->load->view('admin_index', $data);  
    }
    //==========================================
        public function UpdateTypeContractSetting($id){   //
      $this->load->model('Public_settings_models/Model_type_contract');   
       if ($this->input->post('UPDTATE') == "UPDTATE") {
            $this->Model_type_contract->update($id);
            $this->message('success', 'تم التعديل بنجاح ');
            redirect('Public_settings/AddTypeContractSetting', 'refresh');
        }
        $data['result_id']=$this->Model_type_contract->getById($id);
        $data['title'] = 'أنواع العقود ';
        $data['metakeyword'] = 'أنواع العقود ';
        $data['metadiscription'] = 'أنواع العقود ';
        $data['subview'] = 'admin/public_settings/add_type_of_contract';
        $this->load->view('admin_index', $data);  
    }
    //==========================================  Deduction Type of Contract
    public function DeleteTypeContractSetting($id){   
        $this->load->model('Public_settings_models/Model_type_contract'); 
       $this->Model_type_contract->delete(array("defined_id"=>$id));
        $this->message('success',  'تم الحذف بنجاح');
            redirect('Public_settings/AddTypeContractSetting', 'refresh');
    }
     
   /**
     *  ==========================================================================================================
     * 
     *                                     الدرجة الوظيفية
     * 
     *  */
      public function AddJobRoleSetting(){   //   Public_settings/AddJobRoleSetting
      $this->load->model('Public_settings_models/Model_job_role');   
       if ($this->input->post('INSERT') =="INSERT") {
            $this->Model_job_role->insert();
            $this->message('success', 'تم الاضافة بنجاح');
            redirect('Public_settings/AddJobRoleSetting', 'refresh');
        }
        $data['table']=$this->Model_job_role->select_all();
        $data['title'] = 'المسمي الوظيفي';
        $data['metakeyword'] = 'المسمي الوظيفي';
        $data['metadiscription'] = 'المسمي الوظيفي';
        $data['subview'] = 'admin/public_settings/add_job_role';
        $this->load->view('admin_index', $data);  
    }
    //==========================================
        public function UpdateJobRoleSetting($id){   //
      $this->load->model('Public_settings_models/Model_job_role');   
       if ($this->input->post('UPDTATE') == "UPDTATE") {
            $this->Model_job_role->update($id);
            $this->message('success', 'تم التعديل بنجاح ');
            redirect('Public_settings/AddJobRoleSetting', 'refresh');
        }
        $data['result_id']=$this->Model_job_role->getById($id);
        $data['title'] = 'المسمي الوظيفي';
        $data['metakeyword'] = 'المسمي الوظيفي';
        $data['metadiscription'] = 'المسمي الوظيفي';
        $data['subview'] = 'admin/public_settings/add_job_role';
        $this->load->view('admin_index', $data);  
    }
    //==========================================  Deduction Type of Contract
    public function DeleteJobRoleSetting($id){   
        $this->load->model('Public_settings_models/Model_job_role'); 
       $this->Model_job_role->delete(array("defined_id"=>$id));
        $this->message('success', 'تم الحذف بنجاح');
            redirect('Public_settings/AddJobRoleSetting', 'refresh');
    }
     
 /******************************************************/
 
     

}// END CLASS