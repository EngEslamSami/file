<?php
class Meetings_gam3ia_omomia extends MY_Controller
{
   
    
    public function __construct(){
        parent::__construct();
        $this->load->library('pagination');
        if($this->session->userdata('is_logged_in')==0){
            redirect('login');
        }
        $this->load->helper(array('url','text','permission','form'));

     
        $this->load->model('md/web/Meetings');
     //   $this->email_count = $this->Email->email_count();
               /**********************************************************/ 
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in  = $this->Counting->get_basic_in_num();
        $this->files_basic_in  = $this->Counting->get_files_basic_in();  
      /*************************************************************/
    }
   /* public function read_file($file_name,$id)
    {
        $this->Meetings->update_read($id);
        $this->load->helper('file');
        // $file_name=$this->uri->segment(3);
        $file_path = 'uploads/md/web/files'.$file_name;
        header('Content-Type: application/pdf');
        header('Content-Discription:inline; filename="'.$file_name.'"');
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges:bytes');
        header('Content-Length: ' . filesize($file_path));
        readfile($file_path);
    }*/
    
  /*  public function download_file($file,$d_name='') 
    {
     
        $this->load->helper('download');
    
            $name = $file;
      
        $data = file_get_contents('./uploads/md/web/files/'.$file);
        force_download($name, $data);

    }  */
    public function download_file($id)
{
    $mymeeting=$this->Meetings->select_meeting_by_id($id);
        
    $file_name=$mymeeting->file;
    $file_name_ar=$mymeeting->file_name;
   
    $this->load->helper('download');
    $name = $file_name_ar;
    $data = file_get_contents('uploads/md/web/files/' . $file_name);
    force_download($name, $data);
}
   /* public function download_file($file,$id){
        $this->Meetings->update_download($id);
        $this->load->helper('download');
        $name = $file;
        $data = file_get_contents('uploads/md/web/files'.$name);
        force_download($name, $data);
    }*/
    public function download_image($file){
        $this->load->helper('download');
        $name = $file;
        $data = file_get_contents('uploads/md/web/images'.$name);
        force_download($name, $data);
    }

/*
    	    public function read_file($file_name,$id) 
    {
        $this->load->helper('file');
        
   
        $file_path = 'uploads/md/web/files/'.$file_name;
        header('Content-Type: application/pdf');
        header('Content-Discription:inline; filename="'.$file_name.'"');
        header('Content-Disposition: filename="'.$file_name.'"');
        //header('Content-Discription:inline; filename="'.$name.'"');
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges:bytes');
        header('Content-Length: ' . filesize($file_path));
        readfile($file_path);
    }
*/
public function read_file($id)
{
        $mymeeting=$this->Meetings->select_meeting_by_id($id);
        
        $file_name=$mymeeting->file;
        $file_name_ar=$mymeeting->file_name;
       
        $type = pathinfo($file_name)['extension'];
        $arry_images = array('gif', 'Gif', 'ico', 'ICO', 'jpg', 'JPG', 'jpeg', 'JPEG', 'BNG', 'png', 'PNG', 'bmp', 'BMP', 'WMV', 'wmv');
        $arr_doc = array('DOC', 'DOCX', 'HTML', 'HTM', 'ODT', 'PDF', 'XLS', 'XLSX', 'ODS', 'PPT', 'PPTX', 'TXT');
        if (in_array($type, $arry_images)) {
        $type_doc=1;
        } elseif (in_array(strtoupper($type), $arr_doc)) {
        $type_doc=2;

        } 
    $this->load->helper('file');
    $file_path = 'uploads/md/web/files/' . $file_name;

    switch ($type_doc) {
        case 1:
            {
                header('Content-Type: image/' . $doc_exe);
                break;
            }
        case 2:
            {
                header('Content-Type: application/pdf');
                break;
            }
    }

    header('Content-Discription:inline; filename="' . $file_name_ar . '"');
    header('Content-Disposition: filename="'.$file_name_ar.'"');

    header('Content-Transfer-Encoding: binary');
    header('Accept-Ranges:bytes');
    header('Content-Length: ' . filesize($file_path));
    readfile($file_path);
}






    private  function upload_image($file_name){
        $config['upload_path'] = 'uploads/md/web/files';
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
        $config['max_size']    = '888888888888888888000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000';
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
            $config['max_size'] = '8000000000000088000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000';
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
   
    public function meeting(){//md/web/Meetings_gam3ia_omomia/meeting

     
       
 $data['my_meeting']=$this->Meetings->select_all_my_meeting();
 $data['title'] ='اجتماعات  الجمعيه العموميه';
        $data['subview'] = 'admin/md/web/add_meeting';
        $this->load->view('admin_index', $data);
    }
public function upload_image_files($countfiles,$id)
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
          $config['upload_path'] = 'uploads/md/web/images'; 
          $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
          $config['max_size'] = '800000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000'; // max_size in kb
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
        
            $this->Meetings->insert_attached($filename,$id);
          }
        }
 
      }

}    

public function add_metting(){
/*
$img ='img';
$img_file = $this->upload_image($img);
$this->Meetings->insert($img_file);
*/
$img ='img';
$file_name=$_FILES[$img]['name'];
$img_file = $this->upload_image($img);

$this->Meetings->insert($img_file,$file_name);
    $this->messages('success', ' تمت الاضافه  بنجاح');
    redirect('md/web/Meetings_gam3ia_omomia/meeting');
}
public function load_tahwel(){

    $type = $this->input->post('type');
   if ($type==1){
        $data['all'] = $this->Meetings->get_table('md_all_gam3ia_omomia_members','');
        $data['type']= $type;
    }

    $this->load->view('admin/md/web/load_tahwel', $data);
}
public function update_metting($id)
{
   $data['mymeeting']=$this->Meetings->select_meeting_by_id($id);
   $data['galsa_member'] = $this->Meetings->get_all_details($id);
 // $this->test( $_SESSION);
 

 $data['title'] ='اجتماعات  الجمعيه العموميه';
 $data['subview'] = 'admin/md/web/add_meeting';
    $this->load->view('admin_index', $data);
}
public function update($id)
{

  /*  $img ='img';
$img_file = $this->upload_image($img);
    $this->Meetings->update($img_file,$id);*/
       $img ='img';
    $file_name=$_FILES[$img]['name'];

$img_file = $this->upload_image($img,$file_name);

    $this->Meetings->update($img_file,$id);


$this->messages('success', ' تمت التعديل  بنجاح');
redirect('md/web/Meetings_gam3ia_omomia/meeting');
}
public function delete($id)
{

$this->Meetings->delete_metting($id);
$this->Meetings->delete_memebers($id);
$this->messages('success', ' تمت الحذف  بنجاح');
redirect('md/web/Meetings_gam3ia_omomia/meeting');
}
public function add_images($id)
{
    if($this->input->post('add')=='add')
    {
        $countfiles = count($_FILES['img']['name']);
// $this->test($countfiles);
 
$img_file = $this->upload_image_files($countfiles,$id);
//redirect('md/web/Meetings_gam3ia_omomia/meeting');
redirect('md/web/Meetings_gam3ia_omomia/add_images/'.$id);
    }
    $data['my_images']=$this->Meetings->select_all_my_images($id);
    $data['title'] ='البوم اجتماعات  الجمعيه العموميه';
    $data['mymeeting']=$this->Meetings->select_meeting_by_id($id);
    $data['subview'] = 'admin/md/web/add_meeting_images';
    $this->load->view('admin_index', $data);
}
/*
public function delete_images($id)
{

$this->Meetings->delete_images($id);

$this->messages('success', ' تمت الحذف  بنجاح');
redirect('md/web/Meetings_gam3ia_omomia/meeting');
}*/
 
public function det_datiles()
{

    $galsa_rkm = $this->input->post('glsa_rkm');
    $data['galsa_member'] = $this->Meetings->get_all_details($galsa_rkm);
//        $this->test($data);
    $this->load->view('admin/md/web/load_datiles_member', $data);
}

public function add_mahwer($id)
{
    $data['mymeeting']=$this->Meetings->select_meeting_by_id($id);
  
    $data['title'] ='محاور اجتماعات  الجمعيه العموميه';
    $data['my_mehwar']=$this->Meetings->select_all_my_mehwar($id);
    $data['subview'] = 'admin/md/web/add_mahwer';
    $this->load->view('admin_index', $data);
}
public function add_mehwar($id)
{
    if($this->input->post('add')=='add')
    {
    
 
 $this->Meetings->add_mehwar($id);
//redirect('md/web/Meetings_gam3ia_omomia/meeting');
redirect('md/web/Meetings_gam3ia_omomia/add_mahwer/'.$id);
    }
  
}
public function update_mehwar($id)
{
    $data['mehwar']=$this->Meetings->select_mehwar_by_id($id);
    if($this->input->post('add')=='add')
    {
    
 
        $this->Meetings->update_mehwar($id);
//redirect('md/web/Meetings_gam3ia_omomia/meeting');
redirect('md/web/Meetings_gam3ia_omomia/add_mahwer/'.$id);
    }
    $data['title'] ='محاور اجتماعات  الجمعيه العموميه';
    $data['subview'] = 'admin/md/web/add_mahwer';
    $this->load->view('admin_index', $data);
   
}
/*
public function delete_mehwar($id)
{
    $this->Meetings->delete_mehwar($id);
   
    redirect('md/web/Meetings_gam3ia_omomia/meeting');
    $this->messages('success', ' تمت الحذف  بنجاح');

}*/



public function delete_images($id,$glsa_id)
{

$this->Meetings->delete_images($id);

$this->messages('success', ' تمت الحذف  بنجاح');
redirect('md/web/Meetings_gam3ia_omomia/add_images/'.$glsa_id);
}
 





public function delete_mehwar($id,$glsa_id)
{
    $this->Meetings->delete_mehwar($id);
    $this->messages('success', ' تمت الحذف  بنجاح');

    redirect('md/web/Meetings_gam3ia_omomia/add_mahwer/'.$glsa_id);
 
}




   
   
   
    
   

}