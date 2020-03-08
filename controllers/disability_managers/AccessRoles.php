
<?php
class AccessRoles extends MY_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->library('pagination');
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }
        $this->load->helper(array('url', 'text', 'permission', 'form'));

        $this->load->model('disability_managers_models/Model_access_rule');

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
     *                                            صلاحيات  موظفى إدارة المستفيدين
     */
   
     public  function EmployeeRoles(){   //  disability_managers/AccessRoles/EmployeeRoles
          
         $data["all_employees"]=$this->Model_access_rule->select_employee();
         $data['title'] = 'صلاحيات الموظفين ';
         $data['metakeyword'] = 'صلاحيات الموظفين ';
         $data['metadiscription'] = 'صلاحيات الموظفين ';
         $data['subview'] = 'admin/disability_managers_views/access_roles/add_employee_roles';
         $this->load->view('admin_index', $data);
     }
     //=================================================================================
    public function AddEmployeeRoles($emp_code){  //  disability_managers/AccessRoles/AddEmployeeRoles/
       
        if($this->input->post("operation")  =="UPDATE"){
            $this->Model_access_rule->delete_emp_role($emp_code);
            if(sizeof($this->input->post("roles")) > 0){
                $this->Model_access_rule->insert_emp_role($emp_code);
            }
            redirect('disability_managers/AccessRoles/EmployeeRoles', 'refresh');
        }
        if($this->input->post("operation")  =="INSERT"){
            if(sizeof($this->input->post("roles")) > 0){
                $this->Model_access_rule->insert_emp_role($emp_code);
            }
            redirect('disability_managers/AccessRoles/EmployeeRoles', 'refresh');
        }
    }
} // END CLASS 
?>