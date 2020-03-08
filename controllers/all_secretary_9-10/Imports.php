<?php
class Imports extends MY_Controller
{///all_secretary/Imports
    public function __construct(){
        parent::__construct();
        $this->load->library('pagination');
        $this->load->helper(array('url', 'text', 'permission', 'form'));
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }
        $this->load->model('all_secretary_models/Model_import');
          $this->load->model('all_secretary_models/Model_export');
        
        $this->load->model('system_management/Groups');
        $this->main_groups = $this->Groups->main_fetch_group();
        $this->groups = $this->Groups->get_group($_SESSION["group_number"]);
        $this->groups_title = $this->Groups->get_group_title($_SESSION["group_number"]);
               /**********************************************************/ 
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in  = $this->Counting->get_basic_in_num();
        $this->files_basic_in  = $this->Counting->get_files_basic_in();  
      /*************************************************************/
    }

    private function test($data = array()){
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }

        public function read_file()
    {
        $this->load->helper('file');
        $file_name=$this->uri->segment(3);
        $file_path = 'uploads/files/'.$file_name;
        header('Content-Type: application/pdf');
        header('Content-Discription:inline; filename="'.$file_name.'"');
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges:bytes');
        header('Content-Length: ' . filesize($file_path));
        readfile($file_path);
    } 
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

    private function upload_file($file_name)
    {
        $config['upload_path'] = 'uploads/files';
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
      //  $config['max_size'] = '1024*8';
        $config['max_size']    = '80000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000';
      
        $config['overwrite'] = true;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($file_name)) {
            return false;
        } else {
            $datafile = $this->upload->data();
            return $datafile['file_name'];
        }
    }

    private function url(){
        unset($_SESSION['url']);
        $this->session->set_flashdata('url', 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
    }

    private function message($type, $text)
    {
        if ($type == 'success') {
            return $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible shadow" ><button type="button" class="close pull-left" data-dismiss="alert">×</button><h4 class="text-lg"><i class="fa fa-check icn-xs"></i> تم بنجاح ...</h4><p>' . $text . '!</p></div>');
        } elseif ($type == 'wiring') {
            return $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible" ><button type="button" class="close pull-left" data-dismiss="alert">×</button><h4 class="text-lg"><i class="fa fa-exclamation-triangle icn-xs"></i> تحذير هام ...</h4><p>' . $text . '</p></div>');
        } elseif ($type == 'error') {
            return $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" ><button type="button" class="close pull-left" data-dismiss="alert">×</button><h4 class="text-lg"><i class="fa fa-exclamation-circle icn-xs"></i> خطآ ...</h4><p>' . $text . '</p></div>');
        }
    }
    /**
     *  ================================================================================================================
     *
     *  ----------------------------------------------------------------------------------------------------------------
     *
     * -----------------------------------------------------------------------------------------------------------------
     */
    public function index()
    {
        //   all_secretary/Imports

        if ($this->input->post('add') == "add") {
            $this->Model_import->insert();
            if ($this->input->post('attachment') != 0) {
            $last = $this->Model_import->select_last_value_fild("id");
            for($x = 1 ; $x <= $this->input->post('attachment') ; $x++)
            {
                $file_name='img'.$x;
                $file[]= $this->upload_file($file_name);
            }
            $this->Model_import->insert_attachment($file, $last, 2);
         }
             
            //  $this->Model_import->insert_signatures($last, 2);
            $this->message('success', 'إضافة ');
            redirect('all_secretary/Imports');
        }
        
        if ($this->input->post('num')) {
            if ($this->input->post('num') != 0) {
                $page = $this->input->post('page');
                $data['result'] = $this->input->post('num');
                $this->load->view('admin/all_secretary_view/all_imports/' . $page . '', $data);
            }
        } elseif ($this->input->post('main_trans')) {
            $data_load["records"] = $this->Model_import->have_branch($this->input->post('main_trans'));
            $this->load->view('admin/all_secretary_view/all_imports/get_sub_part', $data_load);
        } else {
            $data["last_id"] = $this->Model_import->select_last_value_fild("import_num");
            $data['transactions'] = $this->Model_import->select_transaction();
            $data['organizations'] = $this->Model_import->select_organization();
            $data['records'] = $this->Model_import->select();
            $data['departments'] = $this->Model_import->select_department();
            $data['employees'] = $this->Model_import->select_employees();
            $data['flelds'] = $this->Model_import->get_field();
            $data['get_img'] = '';
            $data['get_signatures'] = '';
            $data['title'] = "اضافة الوارد";
            $data['subview'] = 'admin/all_secretary_view/all_imports/add_import';
            $this->load->view('admin_index', $data);
        }

    }
    

    public function delete_import($id){
        $this->Model_import->delete($id);
        $this->message('success','تم الحذف بنجاح');
        redirect('all_secretary/Imports', 'refresh');

    }
//--------------------------------------------
    public function delete_photo_import($id,$all_id){

        $this->Model_import->delete_photo($id);
        $this->message('success','تم  حذف المرفق بنجاح');
        redirect('all_secretary/Imports/update_secretary_import/'.$all_id.'');
    }

    public function delete_signature($id,$all_id){

        $this->Model_import->delete_signature($id);
        $this->message('success','تم  حذف التوقيع بنجاح');
        redirect('all_secretary/Imports/update_secretary_import/'.$all_id.'');
    }
//--------------------------------------------
    public function update_secretary_import($id){//all_secretary/Imports/update_secretary_import/

        if($this->input->post('update')) {
            if ($this->input->post('attachment') != 0) {
                for ($x = 1; $x <= $this->input->post('attachment'); $x++) {
                    $file_name = 'img' . $x;
                    $file[] = $this->upload_file($file_name);
                }
                $this->Model_import->insert_attachment($file,$id,2);
            }else{
                $file='';
            }

            
        //   $this->Model_import-> insert_signatures($id,2);
            $this->Model_import->update($id,$file);
         $this->message('success', 'تعديل ');
           redirect('all_secretary/Imports', 'refresh');
       //  die;
         //   redirect('all_secretary/Imports', 'refresh');
        }else {
            $data['result_id'] = $this->Model_import->getById($id);
            $data["last_id"] = $this->Model_import->select_last_value_fild("import_num");
            $data['transactions'] = $this->Model_import->select_transaction();
            $data['organizations'] = $this->Model_import->select_organization();
            $data['records'] = $this->Model_import->select();
            $data['departments'] = $this->Model_import->select_department();
            $data['employees'] = $this->Model_import->select_employees();
            $data['get_img'] = $this->Model_import->getimg_2($id);
            $data['get_signatures'] = $this->Model_import->get_signatures($id);
             $data['transactions_sub'] = $this->Model_export->have_branch($data['result_id']["transaction_id_fk"]);
          
            //$data['flelds'] = $this->Model_import->get_field();
            $data['title'] = "تعديل الوارد";
            $data['subview'] = 'admin/all_secretary_view/all_imports/add_import';
            $this->load->view('admin_index', $data);
        }
    }
    
    public function download($file)
    {
        $this->load->helper('download');
        $name = $file;
        $data = file_get_contents('./uploads/files/'.$file); 
        force_download($name, $data); 
    }

    /**
     *  ================================================================================================================
     *
     *  ----------------------------------------------------------------------------------------------------------------
     *
     * -----------------------------------------------------------------------------------------------------------------
     */
}//END CLASS
?>