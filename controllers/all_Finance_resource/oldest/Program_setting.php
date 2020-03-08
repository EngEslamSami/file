<?php
class Program_setting extends MY_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->library('pagination');
        if($this->session->userdata('is_logged_in')==0){
            redirect('login');
        }
        $this->load->helper(array('url','text','permission','form'));
        $this->load->model('Difined_model'); 
      /*  $this->load->model('Nationality');
        $this->load->model('Department');
        $this->load->model('finance_resource_models/Guaranty');
        $this->load->model('finance_resource_models/Endowments');
        $this->load->model('finance_resource_models/Operation_guaranty');
        $this->load->model('finance_resource_models/Donors');
        $this->load->model('finance_resource_models/Donors_gurantee'); */
        
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
     private function message($type,$text){
        if($type =='success') {
            return $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible shadow" ><button type="button" class="close pull-left" data-dismiss="alert">×</button><h4 class="text-lg"><i class="fa fa-check icn-xs"></i> تم بنجاح ...</h4><p>'.$text.'!</p></div>');
        }elseif($type=='wiring'){
            return $this->session->set_flashdata('message','<div class="alert alert-warning alert-dismissible" ><button type="button" class="close pull-left" data-dismiss="alert">×</button><h4 class="text-lg"><i class="fa fa-exclamation-triangle icn-xs"></i> تحذير هام ...</h4><p>'.$text.'</p></div>');
        }elseif($type=='error'){
            return  $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" ><button type="button" class="close pull-left" data-dismiss="alert">×</button><h4 class="text-lg"><i class="fa fa-exclamation-circle icn-xs"></i> خطآ ...</h4><p>'.$text.'</p></div>');
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
    
    
    // start setting _program////////
    public function  add_account_settings(){
       $this->load->model('all_Finance_resource_models/programs_model/Account_settings');
        if($this->input->post('save')){
            $this->Account_settings->insert();
            $this->message('success', 'اضافه حساب البرنامج');
            redirect('all_Finance_resource/Program_setting/add_account_settings', 'refresh');
        }
            $data['records'] = $this->Account_settings->select();
            $data['title'] = 'اعدادات حسابات البرامج';
            $data['metakeyword'] = 'تمت';
            $data['metadiscription'] = '';
            $data['subview'] = 'admin/all_Finance_resource_views/account_settings/add_account_settings';
            $this->load->view('admin_index', $data);

    }
    public function delete_account_settings($id){
        $this->load->model('all_Finance_resource_models/programs_model/Account_settings');
        $this->Account_settings->delete($id);
        redirect('all_Finance_resource/Program_setting/add_account_settings');
    }
    public function  update_account_settings($id)
    {
        $this->load->model('all_Finance_resource_models/programs_model/Account_settings');
        if($this->input->post('update')){
            $this->Account_settings->update($id);
            $this->message('success', 'تعديل البرنامج');
            redirect('all_Finance_resource/Program_setting/add_account_settings', 'refresh');
        }
            $data['results'] = $this->Account_settings->getById($id);
            $data['subview'] = 'admin/all_Finance_resource_views/account_settings/add_account_settings';
            $this->load->view('admin_index', $data);

    }
    public function programs($id){
         $this->load->model('all_Finance_resource_models/programs_model/Account_settings');
         $this->load->model('all_Finance_resource_models/programs_model/Programs_dep');
        $data['account_settings'] = $this->Account_settings->select();
        if($this->input->post('add') && $id == 0){
            $this->Programs_dep->insert();
            $this->message('success','إضافة برنامج');
            redirect('all_Finance_resource/Program_setting/programs/0', 'refresh');
        }
        if($this->input->post('add') && $id != 0){
            $this->Programs_dep->update($id);
            $this->message('success','تعديل برنامج');
            redirect('all_Finance_resource/Program_setting/programs/0','refresh');
        }
        if($id != 0){
            $data['result']=$this->Programs_dep->getById($id);
        }else{
             $data['table'] = $this->Programs_dep->select();
        }    
        $data['title']="اضافه برنامج";
        $data['subview'] = 'admin/all_Finance_resource_views/programs_dep/programs';
        $this->load->view('admin_index', $data);
    }
    public function delete_programs($id){
         $this->load->model('all_Finance_resource_models/programs_model/Programs_dep');
        $this->Programs_dep->delete($id);
         redirect('all_Finance_resource/Program_setting/programs/0','refresh');
    }
    
   /**
    * 
    * 
    * 
    * 
    *  */
        /// اضافه متعفف بدايه///////
    public function add_abstinent($id){   //  all_Finance_resource/Program_setting/add_abstinent/0
        
            $this->load->model('all_Finance_resource_models/programs_model/Abstinent');
        
        if($this->input->post('add') && $id == 0){
            $this->Abstinent->insert();
            //$this->message('success','إضافة بيانات المتعفف');
            redirect('all_Finance_resource/Program_setting/add_abstinent/0', 'refresh');
        }
        if($this->input->post('add') && $id != 0){
            
            $this->Abstinent->update($id);
            //$this->message('success','تعديل  بيانات المتعفف');
            redirect('all_Finance_resource/Program_setting/add_abstinent/0', 'refresh');
        }
        if($id != 0){
            $data['result']=$this->Abstinent->getById($id);
        }else{
             $data['table'] = $this->Abstinent->select();
        }    
        $data['title']="اضافه متعفف";
        $data['subview'] = 'admin/all_Finance_resource_views/abstinent/abstinent';
        $this->load->view('admin_index', $data);
    }
       public function delete_abstinent($id){
          $this->load->model('all_Finance_resource_models/programs_model/Abstinent');
        $this->Abstinent->delete($id);
        redirect('all_Finance_resource/Program_setting/add_abstinent/0','refresh');
    }
        public function approved_abstinent($id){

        $this->load->model('all_Finance_resource_models/programs_model/Abstinent');
        $this->Abstinent->approve($id);
        redirect('all_Finance_resource/Program_setting/add_abstinent/0', 'refresh');

    }
    public function refuse_abstinent($id){

        $this->load->model('all_Finance_resource_models/programs_model/Abstinent');
        $this->Abstinent->refuse($id);
        redirect('all_Finance_resource/Program_setting/add_abstinent/0', 'refresh');

    }
     /// اضافه متعفف نهايه///////
    
    
    
    public function report_abstinent(){  // all_Finance_resource/Program_setting/report_abstinent
        $data['title']="التقارير";
        $this->load->model('all_Finance_resource_models/programs_model/Abstinent');
        $data['all_records'] = $this->Abstinent->select_abstinent_approved('0');
        $data['approve'] = $this->Abstinent->select_abstinent_approved('1');
        $data['refuse'] = $this->Abstinent->select_abstinent_approved('2');
        $data['metadiscription'] = '';
        $data['subview'] = 'admin/all_Finance_resource_views/abstinent/abstinent_application';
        $this->load->view('admin_index', $data);
    }
   
   
   
 
    
    



}