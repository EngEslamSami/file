<?php 

class OrphanProgram extends MY_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->library('pagination');
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }
        $this->load->helper(array('url', 'text', 'permission', 'form'));

        $this->load->model('all_Finance_resource_models/orphan_program/Programs_dep'); 
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


// --------------------------------------------------
  public function ProgramsToOrphan(){
      if($this->input->post('add') ){
       //  $this->test($_POST);
          $this->Programs_dep->insert_programs_orphan();
           $this->message('success','إضافة البيانات');
          redirect('all_Finance_resource/OrphanProgram/ProgramsToOrphan', 'refresh');
        }
    $data['all_member_in']=$this->Programs_dep->all_member_in();
    $data['member']=$this->Programs_dep->member_mothers();
    $data['programs']=$this->Programs_dep->progams();
    $data['records']=$this->Programs_dep->all_member_table();
    $data["title"]="إضافة برنامج لييتيم ";
    $data['subview'] = 'admin/all_Finance_resource_views/programs_dep/programs_to_orphan';
        $this->load->view('admin_index', $data);
    
  }
//------------------------------------------------------
public function UpdateProgramsToOrphan($id){
    $this->load->model('Difined_model');

  if($this->input->post('update') ){
    //   $this->test($_POST);
       $this->Difined_model->delete("programs_to_orphan",array("member_id"=>$id));
       $this->Programs_dep->insert_programs_orphan();
       $this->message('success','تعديل البيانات');
         redirect('all_Finance_resource/OrphanProgram/ProgramsToOrphan', 'refresh');
        }
    $data['member_data']=$this->Programs_dep->get_member_prog($id);
    $data['programs']=$this->Programs_dep->progams();
    $data['member_progr_in']=$this->Programs_dep->get_member_progr_in($id);
    $data['result']=$this->Programs_dep->getByArray("programs_to_orphan",array("member_id"=>$id));
    $data['member_name']=$this->Programs_dep->get_member_name($id);
    $data['mother_name']=$this->Programs_dep->get_mother($data['result']['mother_national_num_fk']);
    $data['subview'] = 'admin/all_Finance_resource_views/programs_dep/programs_to_orphan';
      $data["title"]="إضافة برنامج لييتيم ";
    $this->load->view('admin_index', $data);

}

//-----------------------------------------------------------
public function DeleteProgramsToOrphan($id){
    $this->load->model('Difined_model');
     $this->Difined_model->delete("programs_to_orphan",array("member_id"=>$id));
      $this->message('success','حذف البيانات');
         redirect('all_Finance_resource/OrphanProgram/ProgramsToOrphan', 'refresh');
}
//----------------------------------------------------------------- ReportOrphan


 }// END CLASS  
?>




