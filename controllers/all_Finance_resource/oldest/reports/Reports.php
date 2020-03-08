<?php
class Reports extends MY_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->library('pagination');
        if($this->session->userdata('is_logged_in')==0){
            redirect('login');
        }
        $this->load->helper(array('url','text','permission','form'));
        $this->load->model('Difined_model'); 
        $this->load->model('Nationality');
        $this->load->model('Department');
        $this->load->model('finance_resource_models/Guaranty');
        $this->load->model('finance_resource_models/Endowments');
        $this->load->model('finance_resource_models/Operation_guaranty');
        $this->load->model('finance_resource_models/Donors');
        $this->load->model('finance_resource_models/Donors_gurantee');
        
        $this->load->model('system_management/Groups');
        
        $this->groups=$this->Groups->get_group($_SESSION["group_number"]);
         $this->groups_title=$this->Groups->get_group_title($_SESSION["group_number"]);
         
                /**********************************************************/ 
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in  = $this->Counting->get_basic_in_num();
        $this->files_basic_in  = $this->Counting->get_files_basic_in();  
      /*************************************************************/
    }
    private  function test($data=array()){
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }
    private function thumb($data){
        $config['image_library'] = 'gd2';
        $config['source_image'] =$data['full_path'];
        $config['new_image'] = 'uploads/thumbs/'.$data['file_name'];
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['thumb_marker']='';
        $config['width'] = 275;
        $config['height'] = 250;
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
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
            $this->thumb($datafile);
            return  $datafile['file_name'];
        }
    }
    private  function upload_file($file_name){
        $config['upload_path'] = 'uploads/files';
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
        $config['max_size']    = '1024*8';
        $config['overwrite'] = true;
        $this->load->library('upload',$config);
        if(! $this->upload->do_upload($file_name)){
            return  false;
        }else {
            $datafile = $this->upload->data();
            return $datafile['file_name'];
        }
    }
    private function url (){
        unset($_SESSION['url']);
        $this->session->set_flashdata('url','http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
    }
    
  
  
            /********     today_donations_period                   **********/
 
 public function today_donations_period(){ // all_Finance_resource/reports/Reports/today_donations_period
  
    $this->load->model('all_Finance_resource_models/donation/Today_donation');
    $this->load->model('Difined_model');
    $data['get_name'] = $this->Today_donation->select();
    $data['get_name_sponsors'] = $this->Today_donation->select_sponsors();
    if ($this->input->post('date_from') && $this->input->post('date_to') && $this->input->post('type')) {
        $data['records'] =  $this->Today_donation->get_details_beetween_dates(strtotime($this->input->post('date_from')),strtotime($this->input->post('date_to')),$this->input->post('type'));
        $this->load->view('admin/all_Finance_resource_views/reports/get_today_donations_period',$data);
    }else{
            $data['title'] = 'تقرير التبرعات خلال فترة';
            $data['metakeyword'] = 'تقرير التبرعات خلال فترة';
            $data['subview'] = 'admin/all_Finance_resource_views/reports/today_donations_period';
            $this->load->view('admin_index', $data);
    }
}
/*************************** today_donations_period   *****************/


 public function worthy_orphan_period(){ // all_Finance_resource/reports/Reports/worthy_orphan_period
    
    $this->load->model('all_Finance_resource_models/donation/Programs_dep');
    $this->load->model('Difined_model');
    $data['members']=$this->Programs_dep->member_mothers();
   $data['programs'] = $this->Programs_dep->select();
    if ($this->input->post('date_from') && $this->input->post('date_to') && $this->input->post('id')) {
        $data['records'] =  $this->Programs_dep->get_details_beetween_dates(strtotime($this->input->post('date_from')),strtotime($this->input->post('date_to')),$this->input->post('id'));
       
        if($this->input->post('id') == 'all'){
            $this->load->view('admin/all_Finance_resource_views/reports/get_worthy_orphan_period_byall',$data);
        }else{
            $this->load->view('admin/all_Finance_resource_views/reports/get_worthy_orphan_period',$data);
        }
        
    }else{
        
        $data['title'] = 'تقرير بما تم صرف للايتام خلال فترة';
        $data['metakeyword'] = 'تقرير بما تم صرف للايتام خلال فترة';
        $data['subview'] = 'admin/all_Finance_resource_views/reports/worthy_orphan_period';
        $this->load->view('admin_index', $data);
    }
}

/*************************** donors_non_participants   *****************/
 
  public function donors_non_participants(){  // all_Finance_resource/reports/Reports/donors_non_participants
    
    $this->load->model('all_Finance_resource_models/donation/Programs_dep');
    $this->load->model('Difined_model');
    $data['members']=$this->Programs_dep->get_donors_non_participants();
 
    $data['title'] = 'تقرير الكفلاء الغير مشتركين ببرامج';
    $data['metakeyword'] = 'تقرير الكفلاء الغير مشتركين ببرامج';
    $data['subview'] = 'admin/all_Finance_resource_views/reports/donors_non_participants';
    $this->load->view('admin_index', $data);
}

  /**************************** تقرير الأيتام الغير مشتركين ببرامج   ****************************************/
   
    public function orphans_non_participants(){ // all_Finance_resource/reports/Reports/orphans_non_participants
    
    $this->load->model('all_Finance_resource_models/donation/Programs_dep');
    
    $this->load->model('Difined_model');
    $data['members']=$this->Programs_dep->get_orphans_non_participants();
    $data['mother_name']=$this->Programs_dep->select_mother();
    $data['father_name']=$this->Programs_dep->select_father();
    $data['title'] = 'تقرير الأيتام الغير مشتركين ببرامج ';
    $data['metakeyword'] = 'تقرير الأيتام الغير مشتركين ببرامج ';
    $data['subview'] = 'admin/all_Finance_resource_views/reports/orphan_non_participants';
    $this->load->view('admin_index', $data);
}
   
   
    }
?>