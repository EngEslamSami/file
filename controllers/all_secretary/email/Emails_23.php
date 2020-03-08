<?php
class Emails extends MY_Controller
{
    public $email_count;
    public function __construct(){
        parent::__construct();
        $this->load->library('pagination');
        if($this->session->userdata('is_logged_in')==0){
            redirect('login');
        }
        $this->load->helper(array('url','text','permission','form'));

        
        $this->load->model('all_secretary_models/email/Email');
     //   $this->email_count = $this->Email->email_count();
               /**********************************************************/ 
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in  = $this->Counting->get_basic_in_num();
        $this->files_basic_in  = $this->Counting->get_files_basic_in();  
      /*************************************************************/
    }
    public function read_file($file_name)
    {
        $this->load->helper('file');
        // $file_name=$this->uri->segment(3);
        $file_path = 'uploads/images/'.$file_name;
        header('Content-Type: application/pdf');
        header('Content-Discription:inline; filename="'.$file_name.'"');
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges:bytes');
        header('Content-Length: ' . filesize($file_path));
        readfile($file_path);
    }
    public function download_file($file){
        $this->load->helper('download');
        $name = $file;
        $data = file_get_contents('uploads/images/'.$file);
        force_download($name, $data);
    }


    private  function upload_image($file_name){
        $config['upload_path'] = 'uploads/images';
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
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
    
        
            private function upload_image_2($file_name, $folder = '')
        {
            if (!empty($folder)) {
                $config['upload_path'] = 'uploads/' . $folder;
            } else {
                $config['upload_path'] = 'uploads/files';
            }
            $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf';
            $config['max_size'] = '1024*8888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888';
            $config['encrypt_name'] = true;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload($file_name)) {
                return false;
            } else {
                $datafile = $this->upload->data();
                $this->thumb($datafile, $folder);
                return $datafile['file_name'];
            }
        }
            private function thumb($data,$folder='')
        {
            $config['image_library'] = 'gd2';
            $config['source_image'] = $data['full_path'];
            if (!empty($folder)) {
                $config['new_image'] = 'uploads/' . $folder . '/thumbs/' . $data['file_name'];
            } else {
                $config['new_image'] = 'uploads/thumbs/' . $data['file_name'];
            }
            $config['create_thumb'] = TRUE;
            $config['maintain_ratio'] = TRUE;
            $config['thumb_marker'] = '';
            $config['width'] = 275;
            $config['height'] = 250;
            $this->load->library('image_lib', $config);
            $this->image_lib->initialize($config);
    
            $this->image_lib->resize();
        }
        private function upload_file($file_name, $folder = '')
        {
            if (!empty($folder)) {
                $config['upload_path'] = 'uploads/' . $folder;
            } else {
                $config['upload_path'] = 'uploads/files';
            }
            $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
            $config['max_size'] = '1024*8';
            $config['overwrite'] = true;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
    
            if (!$this->upload->do_upload($file_name)) {
                return false;
            } else {
                $datafile = $this->upload->data();
                $this->thumb($datafile, $folder);
                return $datafile['file_name'];
            }
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

    public function inbox(){//all_secretary/email/Emails/inbox
 // $this->test($_SESSION);
     
       

      //  $data['type'] = $type;
        // $data['users'] = $this->Email->select_users();
        // $data['fetch_users'] = $this->Email->fetch_users();
        // $data['allDep'] = $this->Email->select_allDep();
        // $data['emails_sent'] = $this->Email->select_emails('','','from',1);
        // $data['emails_to_me'] = $this->Email->select_emails('','','to','');
        // $data['starred'] = $this->Email->select_emails(1,'','to','');
        // $data['deleted'] = $this->Email->select_emails('',1,'to','');
        $data['title'] ='تراسل عبر النظام (الموظفين)';
        $data['subview'] = 'admin/all_secretary_view/email/email';
        $this->load->view('admin_index', $data);
    }
public function upload_image_files($countfiles)
{
    for($i=0;$i<$countfiles;$i++){
 
        if(!empty($_FILES['img']['name'][$i])){
 
          // Define new $_FILES array - $_FILES['file']
          $_FILES['file']['name'] = $_FILES['img']['name'][$i];
          $_FILES['file']['type'] = $_FILES['img']['type'][$i];
          $_FILES['file']['tmp_name'] = $_FILES['img']['tmp_name'][$i];
          $_FILES['file']['error'] = $_FILES['img']['error'][$i];
          $_FILES['file']['size'] = $_FILES['img']['size'][$i];

          // Set preference
          $config['upload_path'] = 'uploads/images'; 
          $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
          $config['max_size'] = '5000'; // max_size in kb
          $config['file_name'] = $_FILES['img']['name'][$i];
 
          //Load upload library
          $this->load->library('upload',$config); 
 
          // File upload
          if($this->upload->do_upload('file')){
            // Get data about the file
            $uploadData = $this->upload->data();
            $filename = $uploadData['file_name'];

            // Initialize array
            $data['filenames'][] = $filename;
        
            $this->Email->insert_attached($filename);
          }
        }
 
      }

}    

public function add_email(){
 //$this->test($_FILES);
 



 $countfiles = count($_FILES['img']['name']);
// $this->test($countfiles);
 
 $img_file = $this->upload_image_files($countfiles);
//$this->test($img_file);

$this->Email->insert();
    $this->messages('success', ' تمت الاضافه  بنجاح');
    redirect('all_secretary/email/Emails/inbox');
}
public function my_emails()
{
   $data['my_email']=$this->Email->select_all_my_email();
 // $this->test( $_SESSION);
 //$this->test( $data['my_email']);
    $data['title'] ='تراسل عبر النظام (الموظفين)';
    $data['subview'] = 'admin/all_secretary_view/email/message';
    $this->load->view('admin_index', $data);
}
public function my_sent_emails()
{
    $data['my_email']=$this->Email->select_all_my_email();
  //  $this->test( $data['my_email']);
       $data['title'] ='تراسل عبر النظام (الموظفين)';
       $data['subview'] = 'admin/all_secretary_view/email/my_message';
       $this->load->view('admin_index', $data);
}
public function my_deleted_emails()
{
    $data['my_email']=$this->Email->select_all_deleted_email();
    $data['title'] ='تراسل عبر النظام (الموظفين)';
    $data['subview'] = 'admin/all_secretary_view/email/my_message_deleted';
    $this->load->view('admin_index', $data);
}
public function message_details($id)
{
    //$this->Email->make_read($id);
    $this->update_read_email($id);
    $data['message']=$this->Email->get_email_by_id($id);
    $data['files']=$this->Email->get_files_by_id( $data['message']->email_rkm);
  //  $this->test($data['files']);
    $data['subview'] = 'admin/all_secretary_view/email/message_details';
    $this->load->view('admin_index', $data);
}
public function reply_message($id)
{
    $data['message']=$this->Email->get_email_by_id($id);
    $data['subview'] = 'admin/all_secretary_view/email/reply_email';
    $this->load->view('admin_index', $data);

}
public function add_reply($id)
{
    $this->Email->make_reply($id);
    $countfiles = count($_FILES['img']['name']);
  //  $this->test($_POST);
     
     $img_file = $this->upload_image_files($countfiles);
    //$this->test($img_file);
    
    $this->Email->insert_reply();
    
    $this->messages('success', ' تمت الاضافه   الرد بنجاح');
    redirect('all_secretary/email/Emails/my_emails');
}
public function forward_message($id)
{
    $data['message']=$this->Email->get_email_by_id($id);
    $data['files']=$this->Email->get_files_by_id( $data['message']->email_rkm);
    $data['subview'] = 'admin/all_secretary_view/email/forward_email';
    $this->load->view('admin_index', $data);

}
public function add_forward($id)
{
    $this->Email->make_forward($id);
    $countfiles = count($_FILES['img']['name']);
    // $this->test($countfiles);
     
     $img_file = $this->upload_image_files($countfiles);
    //$this->test($img_file);
    
    $this->Email->insert();
    
    $this->messages('success', ' تمت الاضافه   بنجاح');
    redirect('all_secretary/email/Emails/my_emails');
}
public function delete_message()
{
$id=$this->input->post('id');
$this->Email->make_deleted($id);
  //  $this->Email->delete($id);
}
public function get_details()
{

    $data['my_email']=$this->Email->select_all_my_email();
   // $data['subview'] = 'admin/all_secretary_view/email/email_details';
    $this->load->view('admin/all_secretary_view/email/email_details', $data);

   

}
public function get_details_message()
{

    $data['my_email']=$this->Email->select_all_my_email();
   // $data['subview'] = 'admin/all_secretary_view/email/email_details';
    $this->load->view('admin/all_secretary_view/email/email_details_message', $data);

   

}

   
    public function load_tahwel(){

        $type = $this->input->post('type');
        if ($type==2){
            $data['all'] = $this->Email->get_table('department_jobs',array('from_id_fk !='=>0));
            $data['type']= $type;
        } elseif ($type==1){
            $data['all'] = $this->Email->get_table('employees','');
            $data['type']= $type;
        }

        $this->load->view('admin/all_secretary_view/email/load_tahwel', $data);
    }
    public function load_motbaa(){

        $type = $this->input->post('type');
        if ($type==2){
            $data['all'] = $this->Email->get_table('department_jobs',array('from_id_fk !='=>0));
            $data['type']= $type;
        } elseif ($type==1){
            $data['all'] = $this->Email->get_table('employees','');
            $data['type']= $type;
        }

        $this->load->view('admin/all_secretary_view/email/load_motbaa', $data);
    }
    
    public function load_etlaa(){

        $type = $this->input->post('type');
        if ($type==2){
            $data['all'] = $this->Email->get_table('department_jobs',array('from_id_fk !='=>0));
            $data['type']= $type;
        } elseif ($type==1){
            $data['all'] = $this->Email->get_table('employees','');
            $data['type']= $type;
        }

        $this->load->view('admin/all_secretary_view/email/load_etlaa', $data);
    }


     ///notification 

     public function get_tot_email()
     {
         $tot=$this->Email->total_rows();
         $result['tot_email']=$tot;
         $msg=$this->Email->get_new_messages();
         $result['msg_email']=$msg;
         echo json_encode($result);
 
 
     }
 
     
     public function get_msg_email()
     {
         $msg=$this->Email->get_new_messages();
         $result['msg_email']=$msg;
         echo json_encode($result);
 
 
     }
     public function update_seen_email()
     {
     $this->Email->update_seen_messages();
     }
 
 
 public function update_read_email($id)
 {
    // $id=$this->input->post("id");
     $this->Email->update_read_messages($id);
 }
 

}