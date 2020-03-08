<?php
class DisabilityArchive extends MY_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->library('pagination');
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }
        $this->load->helper(array('url', 'text', 'permission', 'form'));

        $this->load->model('disability_managers_models/Model_disability_archive');
        $this->load->model('Difined_model');
        
        
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
     public function index(){   //  disability_managers/DisabilityArchive
        
         $data["records"]=$this->Model_disability_archive->all_peson();    
         $data['title'] = 'أرشيف المستفيدين ';
         $data['metakeyword'] = 'أرشيف المستفيدين ';
         $data['metadiscription'] = 'أرشيف المستفيدين ';
         $data['subview'] = 'admin/disability_managers_views/disability_archive/archive';
       $this->load->view('admin_index', $data);    
     }
     //=================================================================================
     public function Details($person_id){   //  disability_managers/DisabilityArchive/Details
        
      
         $this->load->model('disability_managers_models/Researcher_model');
        
         $data["buttun_roles"]=$this->Model_disability_archive->get_sesstion_roles($_SESSION['role_id_fk'],$_SESSION["emp_code"]);
         $data["file_id"]=$person_id;
         $data["convent"]=$this->Model_disability_archive->all_convent(1);
         $data['jobs_name']=$this->Model_disability_archive->jobs_id();
         $data['all_operation']=$this->Model_disability_archive->select_operation($person_id);
        //----------------------------------------------
         $data["nationality_settings"]=$this->Difined_model->select_all('nationality_settings',"","","id","ASC");
         $data["types"]=$this->Difined_model->select_all('disabilities_type_settings',"","","id","ASC");
         $data["files"]=$this->Model_disability_archive->one_peson_file($person_id);
         $data['peson_data'] =$this->Model_disability_archive->get_one_peson($person_id);
         $data["order_table"]=$this->Model_disability_archive->get_person_device($person_id);
         //----------------------------------------------
        $data["person_data"] = $this->Researcher_model->getPersonData($person_id);
        $data["table"] = $this->Researcher_model->getResearcherData($person_id);
        $data["family_relationship"] = $this->Researcher_model->getFamilyDataShow($person_id);
        
       // $data["relative_relation"] = $this->Difined_model->select_all("relative_relation","","","","");
        $data["scientific_qualification"] = $this->Difined_model->select_all("scientific_qualification","","","","");
        $data["nationality"] = $this->Difined_model->select_all("nationality_settings","","","","");
         //----------------------------------------------
         $data['title'] = 'أرشيف المستفيدين ';
         $data['metakeyword'] = 'أرشيف المستفيدين ';
         $data['metadiscription'] = 'أرشيف المستفيدين ';
         $data['subview'] = 'admin/disability_managers_views/disability_archive/archive_details';
         $this->load->view('admin_index', $data);
     }
     //================================================================================================
      public function OperationInFile($process,$file_id){  //  disability_managers/DisabilityArchive/OperationInFile
      
        $this->Model_disability_archive->insert_operation($process,$file_id);
        $this->Model_disability_archive->update_file_state($file_id,$process);
        redirect("disability_managers/DisabilityArchive/Details/".$file_id, 'refresh');
    }
     
     
     
     
     
     
     
} // END CLASS 
?>