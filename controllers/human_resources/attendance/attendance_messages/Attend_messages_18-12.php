<?php

class Attend_messages extends MY_Controller
{
    public $email_count;
    public function __construct(){
        parent::__construct();
        $this->load->library('pagination');
        if($this->session->userdata('is_logged_in')==0){
            redirect('login');
        }
        $this->load->helper(array('url','text','permission','form'));
       
        
        $this->load->model('human_resources_model/attendance/attendance_messages/Attend_messages_model');
     //   $this->email_count = $this->Email->email_count();
               /**********************************************************/ 
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in  = $this->Counting->get_basic_in_num();
        $this->files_basic_in  = $this->Counting->get_files_basic_in();  
      /*************************************************************/
    }
  


   
    
        
     
      
    private function url(){
        unset($_SESSION['url']);
        $this->session->set_flashdata('url','http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
    }
    private function messages($type,$text){
        if($type =='success') {
            return $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissable">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <strong> �� �����!</strong> '.$text.'.
                                                </div>');
        }elseif($type=='wiring'){
            return $this->session->set_flashdata('message','<div class="alert alert-warning alert-dismissable">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <strong> �����  !</strong> '.$text.'.
                                                </div>');
        }elseif($type=='error'){
            return  $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <strong>���!</strong> '.$text.'.
                                                </div>');
        }
    }
    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }
   
    public function add_public_message(){//human_resources/attendance/attendance_messages/Attend_messages/add_public_message
      
        $data['title'] ='الرسائل العامه';
        $data['subview'] = 'admin/Human_resources/attendance/attendance_messages/add_public_message_v';
        $this->load->view('admin_index', $data);
    }
    
public function send_public_message(){

   $this->Attend_messages_model->insert();
       $this->messages('success', ' تمت الاضافه  بنجاح');
       redirect('human_resources/attendance/attendance_messages/Attend_messages/add_public_message');
   }
   public function update_public_message($id)
   {
    $this->Attend_messages_model->update($id);
    $this->messages('success', ' تمت التعديل  بنجاح');
    redirect('human_resources/attendance/attendance_messages/Attend_messages/my_sent_messages');
   }
   public function send_privte_message(){

    $this->Attend_messages_model->insert_emp();
        $this->messages('success', ' تمت الاضافه  بنجاح');
        redirect('human_resources/attendance/attendance_messages/Attend_messages/add_private_message');
    }
    public function update_private_message($id){

        $this->Attend_messages_model->update_emp($id);
            $this->messages('success', ' تمت التعديل  بنجاح');
            redirect('human_resources/attendance/attendance_messages/Attend_messages/my_sent_messages_private');
        }
    
    public function add_private_message()
    {
         
        $data['title'] ='الرسائل الخاصه';
        $data['subview'] = 'admin/Human_resources/attendance/attendance_messages/add_private_v';
        $this->load->view('admin_index', $data);
    }
  
        public function load_tahwel(){

            $type = $this->input->post('type');
            if ($type==1){
                $data['all'] = $this->Attend_messages_model->get_departments();
               //$this->test( $data['all']);
                $data['type']= $type;
                $this->load->view('admin/Human_resources/attendance/attendance_messages/load_tahwel', $data);
            } elseif ($type==2){
                $data['all'] = $this->Attend_messages_model->get_all_emp(0);
                
              //$this->test( $data['all']);
                $data['type']= $type;
                $this->load->view('admin/Human_resources/attendance/attendance_messages/load_tahwel_emp', $data);
            }
            
    
    
            
        }

        public function my_sent_messages()
{
    $data['my_messages']=$this->Attend_messages_model->select_all_my_mseeage(1);
 //$this->test($data['my_messages']);
       $data['title'] ='البريد المرسل عام';
       $data['subview'] = 'admin/Human_resources/attendance/attendance_messages/my_message';
       $this->load->view('admin_index', $data);
}

public function my_sent_messages_private()
{
    $data['my_messages']=$this->Attend_messages_model->select_all_my_mseeage(2);
 //$this->test($data['my_messages']);
       $data['title'] ='البريد المرسل خاص';
       $data['subview'] = 'admin/Human_resources/attendance/attendance_messages/my_message';
       $this->load->view('admin_index', $data);
}
public function delete_message()
{
$id=$this->input->post('id');
$this->Attend_messages_model->make_deleted($id);
redirect('human_resources/attendance/attendance_messages/Attend_messages/my_sent_messages');
  //  $this->Email->delete($id);
}


public function edite_message($id,$type)
{
    $data['message']=$this->Attend_messages_model->get_message_by_id($id);
    if($type==1)
    {
  // $this->test($data['message']);
        $data['title'] ='الرسائل العامه';
        $data['subview'] = 'admin/Human_resources/attendance/attendance_messages/add_public_message_v';
        $this->load->view('admin_index', $data);
}
    else  if($type==2)
    {
        $data['title'] ='الرسائل الخاصه';
        $data['subview'] = 'admin/Human_resources/attendance/attendance_messages/add_private_v';
        $this->load->view('admin_index', $data);


    }


}
public function message_details($id)
{
    
    $data['message']=$this->Attend_messages_model->get_message_by_id($id);
   
    $data['subview'] = 'admin/Human_resources/attendance/attendance_messages/message_details';
    $this->load->view('admin_index', $data);
}


}