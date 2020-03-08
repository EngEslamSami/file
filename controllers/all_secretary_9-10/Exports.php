<?php
class Exports extends MY_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->library('pagination');
        $this->load->helper(array('url', 'text', 'permission', 'form'));
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }
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
     //   $config['max_size'] = '1024*8';
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
    public function index(){  //   all_secretary/Exports   
      // Model_export
        if ($this->input->post('INSERT') =="INSERT"){

            $this->Model_export->insert();
            $last= $this->Model_export->select_last_value_fild("id");
             if ($this->input->post('attachment') != 0) {
                for ($x = 1; $x <= $this->input->post('attachment'); $x++) {
                    $file_name = 'img' . $x;
                    $file[] = $this->upload_file($file_name);
                }
                 $this->Model_export->insert_attachment($file,$last,1);
             }   
            if($this->input->post('signatures') != 0){
                 $this->Model_export->insert_signatures($last,1);
            }
            $this->message('success','إضافة ');
            redirect('all_secretary/Exports', 'refresh');
        }
        if($this->input->post('num')){
             
            if($this->input->post('num') != 0){
               
               // $page = $this->input->post('page');
               // $data['result'] = $this->input->post('num');
              //  $this->load->view('admin/all_secretary_view/all_export/'.$page.'', $data);
            }
        }elseif($this->input->post('main_trans')){
            $data_load["records"]=  $this->Model_export->have_branch($this->input->post('main_trans'));
            $this->load->view('admin/all_secretary_view/all_export/get_sub_part', $data_load);
        }else {
            $data["last_id"]= $this->Model_export->select_last_value_fild("export_num");
            $data['transactions'] = $this->Model_export->select_transaction();
            $data['organizations'] = $this->Model_export->select_organization();

            $data['departments'] = $this->Model_export->select_department();
            $data['employees'] = $this->Model_export->select_employees();
            $data['flelds'] = $this->Model_export->get_field();
            $data['records'] = $this->Model_export->select();
            $data['title'] = "اضافة الصادر";
            $data['subview'] = 'admin/all_secretary_view/all_export/add_export';
            $this->load->view('admin_index', $data);
        }

    }
    public function LoadPages(){   //    all_secretary/Exports/LoadPages
        if($this->input->post('num')){
             
            if($this->input->post('num') != 0){
               $page = $this->input->post('page');
               $data['result'] = $this->input->post('num');
                $this->load->view('admin/all_secretary_view/all_export/'.$page.'', $data);
            }
        }
        if($this->input->post('main_trans')){
            $data_load["records"]=  $this->Model_export->have_branch($this->input->post('main_trans'));
            $this->load->view('admin/all_secretary_view/all_export/get_sub_part', $data_load);
        }
       //  $this->test($_POST);
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
    
    /**
     *  ================================================================================================================
     *
     *  ----------------------------------------------------------------------------------------------------------------
     *
     * -----------------------------------------------------------------------------------------------------------------
     */
    public function PrintCode(){    //  all_secretary/Exports/PrintCode


     if($this->input->post("id") && $this->input->post("type")  && $this->input->post("date") && $this->input->post("num")){
            $count=$this->Model_export->get_attachment_count($this->input->post("id"),$this->input->post("type"));



            function arabic_w2e($str){
                $arabic_eastern = array('٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩');
                $arabic_western = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
                return str_replace($arabic_western, $arabic_eastern, $str);
            }
            //=============================================
            function arabic_e2w($str){
                $arabic_eastern = array('٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩');
                $arabic_western = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
                return str_replace($arabic_eastern, $arabic_western, $str);
            }
            //=============================================
            $data_load["arabic_num"]=arabic_w2e($this->input->post("num"));  //get_one_barcode

          /*  $arr_date=explode("/",$this->input->post("date"));
            $arr_date[0]=arabic_w2e($arr_date[0]);
            $arr_date[1]=arabic_w2e($arr_date[1]);
            $arr_date[2]=arabic_w2e($arr_date[2]);*/

            //$data_load["date"]=  $arr_date[0]."/". $arr_date[1]."/". $arr_date[2];
           $data_load["date"]= $this->input->post("date");
            $data_load["attached_num"]=arabic_w2e($count);
            $data_load["id"]=$this->input->post("num");
            $data_load["type"]=$this->input->post("type"); 
       
          $this->load->view('admin/all_secretary_view/all_export/get_one_barcode', $data_load);

        }
  // $this->test($_POST);
    }
    /**
     *  ================================================================================================================
     *
     *  ----------------------------------------------------------------------------------------------------------------
     *
     * -----------------------------------------------------------------------------------------------------------------
     */
    public function update_secretary_export($id){

        if($this->input->post('UPDTATE') =="UPDTATE") {

       // $this->test($_POST);
            if ($this->input->post('attachment') != 0) {
                for ($x = 1; $x <= $this->input->post('attachment'); $x++) {
                    $file_name = 'img' . $x;
                    $file[] = $this->upload_file($file_name);
                }
                $this->Model_export->insert_attachment($file,$id,1);
            }//signatures
            if($this->input->post('signatures') != 0){
                $this->Model_export->insert_signatures($id,1);
            }
            $this->Model_export->update($id);
            redirect('all_secretary/Exports', 'refresh');
        }else {
            $data['transactions'] = $this->Model_export->select_transaction();
            $data['organizations'] = $this->Model_export->select_organization();
            $data['departments'] = $this->Model_export->select_department();
            $data['employees'] = $this->Model_export->select_employees();
            $data['result_id'] = $this->Model_export->getById($id);
            $data['transactions_sub'] = $this->Model_export->have_branch($data['result_id']["transaction_id_fk"]);
          
          
            $data['get_img'] = $this->Model_export->getimg($id);
            $data['get_sign'] = $this->Model_export->getsign($id);
            $data['title'] = "اضافة الصادر";
            $data['subview'] = 'admin/all_secretary_view/all_export/add_export';
            $this->load->view('admin_index', $data);
        }
    }
    /**
     *  ================================================================================================================
     *
     *  ----------------------------------------------------------------------------------------------------------------
     *
     * -----------------------------------------------------------------------------------------------------------------
     */
    public function delete_export($id){

        $this->Model_export->delete($id);
         redirect('all_secretary/Exports', 'refresh');
    }
//--------------------------------------------    
    public function delete_photo($id,$all_id){

        $this->Model_export->delete_photo($id);
        redirect('all_secretary/Exports/update_secretary_export/'.$all_id.'');
    }
    public function delete_sign($id,$all_id){

        $this->Model_export->delete_signatures($id);
        redirect('all_secretary/Exports/update_secretary_export/'.$all_id.'');
    }
    
    public function download($file)
    {
        $this->load->helper('download');
        $name = $file;
        $data = file_get_contents('./uploads/files/'.$file); 
        force_download($name, $data); 
    }

    
}//END CLASS
?>