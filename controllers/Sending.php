<?php
class Sending extends MY_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->library('pagination');
   if($this->session->userdata('is_logged_in')==0){
           redirect('login');
      }
             /**********************************************************/ 
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in  = $this->Counting->get_basic_in_num();
        $this->files_basic_in  = $this->Counting->get_files_basic_in();  
      /*************************************************************/
        $this->load->helper(array('url','text','permission','form'));
        
        $this->load->model('system_management/Groups');
        
        $this->groups=$this->Groups->get_group($_SESSION["group_number"]);
         $this->groups_title=$this->Groups->get_group_title($_SESSION["group_number"]);
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
 //-----------------------------------------   
 private function message($type,$text){
          if($type =='success') {
              return $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible shadow" ><button type="button" class="close pull-left" data-dismiss="alert">×</button><h4 class="text-lg"><i class="fa fa-check icn-xs"></i> تم بنجاح ...</h4><p>'.$text.'!</p></div>');
          }elseif($type=='wiring'){
              return $this->session->set_flashdata('message','<div class="alert alert-warning alert-dismissible" ><button type="button" class="close pull-left" data-dismiss="alert">×</button><h4 class="text-lg"><i class="fa fa-exclamation-triangle icn-xs"></i> تحذير هام ...</h4><p>'.$text.'</p></div>');
          }elseif($type=='error'){
              return  $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" ><button type="button" class="close pull-left" data-dismiss="alert">×</button><h4 class="text-lg"><i class="fa fa-exclamation-circle icn-xs"></i> خطآ ...</h4><p>'.$text.'</p></div>');
          }
        }
/**
 *  ================================================================================================================
 *
 *  ================================================================================================================
 *
 *  ================================================================================================================
 */

    public function  index(){



            $data['subview'] = 'admin/messages/add_message';

            $this->load->view('admin_index', $data);
       

    }
    
    
    
      public function  send_aytam(){

            $data['subview'] = 'admin/messages/add_message_aytam';
            $this->load->view('admin_index', $data);
    }
    
    
    
        public function  add_message_aytam()
    {
       $this->load->model('Message');
        $this->load->model('Difined_model');
        
         $this->load->model("family_models/Register");
          $data['fetch_users'] = $this->Register->family(1);
        
        $data['records'] = $this->db->select('*')->from('messages')->where('type',3)->get()->result();
        $data['descrption'] = $this->Message->get_data2();
        /*$data['count'] = $this->Difined_model->select_all('employees','','1','id','desc');
        $data['employees'] = $this->Difined_model->select_all('employees','','','','');
         $data['records'] = $this->Difined_model->select_all('messages','','','','');
         $data['descrption'] = $this->Message->get_data();*/
         if($this->input->post('save')){
            $this->Message->insert2(3,'');
            redirect('Sending/add_message_aytam', 'refresh');
        }/*else {*/
            $data['subview'] = 'admin/messages/add_message_aytam';
            $this->load->view('admin_index', $data);
        //}

    }


        public function  add_message(){
       $this->load->model('Message');
        $this->load->model('Difined_model');
        if ($this->input->post("save")){
            sms($this->input->post("content"),$this->input->post("phone_num"));
            $this->Message->insert(1,'');
            redirect('Sending/add_message', 'refresh');
        }
        $data['count'] = $this->Difined_model->select_all('employees','','1','id','desc');
        $data['employees'] = $this->Difined_model->select_all('employees','','','','');
        $data['records'] = $this->db->select('*')->from('messages')->where('type',1)->get()->result();
        $data['descrption'] = $this->Message->get_data();
        $data['title'] ='إضافة رسالة لموظف';
        $data['subview'] = 'admin/messages/add_message';
        $this->load->view('admin_index', $data);


    }

        public function  add_message_dep(){
            
       $this->load->model('Message');
        $this->load->model('Difined_model');
        $data['department'] = $this->Difined_model->select_search_key('department_jobs','from_id_fk',0);
         $data['records'] = $this->db->select('*')->from('messages')->where('type',2)->get()->result();
         $data['descrption'] = $this->Message->get_data();
         if($this->input->post('save')){
            $this->Message->insert_dep();
           redirect('Sending/add_message_dep', 'refresh');
        }else {
             $data['title'] ='إضافة رسالة لقسم';
            $data['subview'] = 'admin/messages/add_message_dep';
            $this->load->view('admin_index', $data);
        }

    }

        public function delete_message($id){
        $this->load->model("Difined_model");
        $Conditions_arr=array("id"=>$id);
        $this->Difined_model->delete("messages",$Conditions_arr);
        redirect('sending/add_message');
    }
    /****************************************************/
    
    
    public function  add_messageToDoners(){   // Sending/add_messageToDoners
        $this->load->model('Message');
        $this->load->model('Difined_model');
        if ($this->input->post("save")){
            sms($this->input->post("content"),$this->input->post("phone_num"));
            $this->Message->insert3(4,'');
            redirect('Sending/add_messageToDoners', 'refresh');
        }
        $data['count'] = $this->Difined_model->select_all('donors','','1','id','desc');
        $data['donors'] = $this->Difined_model->select_all('donors','','','','');
        $data['records'] = $this->Message->getDonorsMessage();
        $data['title'] ='إضافة رسالة لمتبرع';
        $data['subview'] = 'admin/messages/add_message_to_donor';
        $this->load->view('admin_index', $data);


    }

    public function delete_messageFromDonors($id){
        $this->load->model("Difined_model");
        $Conditions_arr=array("id"=>$id);
        $this->Difined_model->delete("donors_messages",$Conditions_arr);
        redirect('Sending/add_messageToDoners');
    }

    public function  add_messageToSponsor(){   // Sending/add_messageToSponsor
        $this->load->model('Message');
        $this->load->model('Difined_model');
        if ($this->input->post("save")){
            sms($this->input->post("content"),$this->input->post("phone_num"));
            $this->Message->insert4(5,'');
            redirect('Sending/add_messageToSponsor', 'refresh');
        }
        $data['count'] = $this->Difined_model->select_all('sponsors','','1','id','desc');
        $data['sponsers'] = $this->Difined_model->select_all('sponsors','','','','');
        $data['records'] = $this->Message->getSponsorsMessage();
       
        
        $data['title'] ='إضافة رسالة لكفيل';
        $data['subview'] = 'admin/messages/add_message_to_sponser';
        $this->load->view('admin_index', $data);


    }

    public function delete_messageFromDonor($id){
        $this->load->model("Difined_model");
        $Conditions_arr=array("id"=>$id);
        $this->Difined_model->delete("donors_messages",$Conditions_arr);
        redirect('Sending/add_messageToDoners');
    }


    public function delete_messageFromSponser($id){
        $this->load->model("Difined_model");
        $Conditions_arr=array("id"=>$id);
        $this->Difined_model->delete("sponsors_messages",$Conditions_arr);
        redirect('Sending/add_messageToSponsor');
    }

/******************************************************************************************/



    ////______________________osama _____________

    public function  add_messageTo_magls_members(){   // Sending/add_messageTo_magls_members
        $this->load->model('Message');
        $this->load->model('Difined_model');
        if ($this->input->post("save")){
            sms($this->input->post("content"),$this->input->post("phone_num"));
            $this->Message->insert_Members_Message(5,'');
            redirect('Sending/add_messageTo_magls_members', 'refresh');
        }
        $data['count'] = $this->Difined_model->select_all('magls_members_table','','1','id','desc');
        $data['members'] = $this->Difined_model->select_all('magls_members_table','','','','');
        $data['records'] = $this->Message->get_Magls_Members_Message();
        $data['title'] ='إضافة رسالة عضو مجلس';
        $data['subview'] = 'admin/messages/add_message_to_magls_member';
        $this->load->view('admin_index', $data);


    }



    public function delete_FromMagls_members_Messages($id){
        $this->load->model("Difined_model");
        $Conditions_arr=array("id"=>$id);
        $this->Difined_model->delete("magls_members_messages",$Conditions_arr);
        redirect('Sending/add_messageTo_magls_members');
    }

    public function  add_messageTo_general_members(){   // Sending/add_messageTo_general_members
        $this->load->model('Message');
        $this->load->model('Difined_model');
        if ($this->input->post("save")){
            sms($this->input->post("content"),$this->input->post("phone_num"));
            $this->Message->insert_general_Members_Message();
            redirect('Sending/add_messageTo_general_members', 'refresh');
        }
        $data['count'] = $this->Difined_model->select_all('general_assembley_members','','1','id','desc');
        $data['members'] = $this->Difined_model->select_all('general_assembley_members','','','','');
        $data['records'] = $this->Message->get_general_Members_Message();
        $data['title'] ='إضافة رسالة عضو جمعيه عمومية';
        $data['subview'] = 'admin/messages/add_message_to_general_member';
        $this->load->view('admin_index', $data);


    }



    public function delete_From_general_members_Messages($id){
        $this->load->model("Difined_model");
        $Conditions_arr=array("id"=>$id);
        $this->Difined_model->delete("general_members_messages",$Conditions_arr);
        redirect('Sending/add_messageTo_general_members');
    }
 //_________________________ osama_______________________

    
    

    }// END CLASS