<?php
class Definitions extends MY_Controller
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
     *                                            تعريف  الموظف / الموظفة
     *
     *
     */
     
   
    public function  Definition_employee(){ ////    Definitions/Definition_employee
        
         $this->load->model('definitions_model/Definition');
                if($this->input->post('add')){
                    
                $this->Definition->insert_member();
                
                redirect('Definitions/Definition_employee', 'refresh');
                }elseif($this->input->post('admin_num')){
   
                $data['employees'] = $this->Definition->getById_employees($this->input->post('admin_num'));
                $this->load->view('admin/definitions_view/get_emp_data',$data);
                
                }else{
                    
                $data["all_employees"]=$this->Definition->select_employee();
                $data["records"]=$this->Definition->select_define();
                $data["all_emp"]=$this->Definition->all_emp(); 
                
                $data['title'] = 'تعريف  الموظف / الموظفة ';
                $data['metakeyword'] = 'تعريف  الموظف / الموظفة';
                $data['metadiscription'] = 'تعريف  الموظف / الموظفة';
                $data['subview'] = 'admin/definitions_view/definition_employee';
                $this->load->view('admin_index', $data);
         } 
     
     }
     public function  edit_definition_employee($id){   ////    Definitions/edit_definition_employee
        
                $this->load->model('definitions_model/Definition');
                $this->load->model('Difined_model'); 
                if($this->input->post('edit')){
                $this->Definition->update($id);
                redirect('Definitions/Definition_employee', 'refresh');
                
                }elseif($this->input->post('admin_num')){
                    
                $data['employees'] = $this->Definition->getById_employees($this->input->post('admin_num'));
                $this->load->view('admin/definitions_view/get_emp_data',$data);
                }else{
            
                $data["all_employees"]=$this->Definition->select_employee();
                $data["records"]=$this->Definition->select_define();
                $data["all_emp"]=$this->Definition->all_emp(); 
                $data['result'] = $this->Difined_model->select_search_key('employees_defined','id',$id);
                $data['title'] = 'تعريف  الموظف / الموظفة ';
                $data['metakeyword'] = 'تعريف  الموظف / الموظفة';
                $data['metadiscription'] = 'تعريف  الموظف / الموظفة';
                $data['subview'] = 'admin/definitions_view/definition_employee';
                $this->load->view('admin_index', $data);
         } 
     
     }
     
     public function delete_definition_employee($id){   ////    Definitions/delete_definition_employee
        $this->load->model('definitions_model/Definition');
        $this->Definition->delete($id);
        redirect('Definitions/Definition_employee');
    }   
     
    
   public function printer_employee($id) // Definitions/printer_employee
    {
        $this->load->model('definitions_model/Definition');
        $data['records'] = $this->Definition->printemp($id);
        $data["all_emp"]=$this->Definition->all_emp(); 
        
        $data['employees'] = $this->Definition->getById_employees($data["records"]['employees_id_fk']);
        $data["department_jobs"]=$this->Definition->department_jobs(); 
        
        $this->load->view('admin/definitions_view/printemployee', $data);
    }
    
   /**
     *  ================================================================================================================
     *
     *                                            نموذج إخلاء طرف
     *
     *
     */
     
    
       public function  Disclaimer(){ ////    Definitions/Disclaimer
        
         $this->load->model('definitions_model/Definition');
                if($this->input->post('add')){
                    
                $this->Definition->insert_release();
                
                redirect('Definitions/Disclaimer', 'refresh');
                }elseif($this->input->post('admin_num')){
                    
                $data['employees'] = $this->Definition->getById_employees($this->input->post('admin_num'));
                $data["department_jobs"]=$this->Definition->department_jobs(); 
                $this->load->view('admin/definitions_view/get_emp_data_Disclaimer',$data);
                
                }else{
                    
                $data["all_employees"]=$this->Definition->select_employee();
                
                $data["records"]=$this->Definition->select_release();
                $data["all_emp"]=$this->Definition->all_emp(); 
                $data["department_jobs"]=$this->Definition->department_jobs();  
                 
                $data['title'] = 'نموذج إخلاء طرف ';
                $data['metakeyword'] = 'نموذج إخلاء طرف';
                $data['metadiscription'] = 'نموذج إخلاء طرف';
                $data['subview'] = 'admin/definitions_view/Disclaimer';
                $this->load->view('admin_index', $data);
         } 
     
     } 




     public function  edit_release($id){   ////    Definitions/edit_release
        
                $this->load->model('definitions_model/Definition');
                $this->load->model('Difined_model'); 
                if($this->input->post('edit')){
                $this->Definition->update_release($id);
                redirect('Definitions/Disclaimer', 'refresh');
                
                }elseif($this->input->post('admin_num')){
                $data['employees'] = $this->Definition->getById_employees($this->input->post('admin_num'));
                $data["department_jobs"]=$this->Definition->department_jobs(); 
                $this->load->view('admin/definitions_view/get_emp_data_Disclaimer',$data);
                }else{
            
                $data["all_employees"]=$this->Definition->select_employee();
                $data["records"]= $this->Definition->select_release();
                $data["all_emp"]=$this->Definition->all_emp(); 
                $data['result'] = $this->Difined_model->select_search_key('release_form','id',$id);
                $data['title'] = 'نموذج إخلاء طرف ';
                $data['metakeyword'] = 'نموذج إخلاء طرف';
                $data['metadiscription'] = 'نموذج إخلاء طرف';
                $data['subview'] = 'admin/definitions_view/Disclaimer';
                $this->load->view('admin_index', $data);
         } 
     
     }

    
   public function delete_release($id){   ////    Definitions/edit_definition_employee
        $this->load->model('definitions_model/Definition');
        $this->Definition->delete_release($id);
        redirect('Definitions/Disclaimer');
    }   
     
       public function printer_release($id){   ////    Definitions/printer_release
       // $this->load->model('definitions_model/Definition');
        //$this->Definition->delete($id);
        
                $this->load->model('definitions_model/Definition');
        $data['records'] = $this->Definition->printer_release($id);
        $data["all_emp"]=$this->Definition->all_emp(); 
        
        $data['employees'] = $this->Definition->getById_employees($data["records"]['employees_id_fk']);
        $data["department_jobs"]=$this->Definition->department_jobs(); 
        
        $this->load->view('admin/definitions_view/printer_release', $data);
        
        
        
       // redirect('Definitions/Disclaimer');
    }
     
}
     