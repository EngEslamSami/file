<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class QrController extends MY_Controller
{

    function __construct ()
    {
        parent::__construct();
                $this->load->model('familys_models/for_dash/Counting');
                 $this->load->model('qr_m/api/Web_service');
        $this->count_basic_in  = $this->Counting->get_basic_in_num();
        $this->files_basic_in  = $this->Counting->get_files_basic_in(); 
        $this->load->library('Ciqrcode');
        $this->load->helper('url');
    }
 private function message($type, $text)
    {

        if ($type == 'success') {

            return $this->session->set_flashdata('message', '<div class="hidden-print alert alert-success alert-dismissible shadow" data-sr="wait 0s, then enter bottom and hustle 100%"><button type="button" class="close pull-left" data-dismiss="alert">×</button><h4 class="text-lg"><i class="fa fa-check icn-xs"></i> تم بنجاح ...</h4><p>' . $text . '!</p></div>');

        } elseif ($type == 'wiring') {

            return $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible" data-sr="wait 0.6s, then enter bottom and hustle 100%"><button type="button" class="close pull-left" data-dismiss="alert">×</button><h4 class="text-lg"><i class="fa fa-exclamation-triangle icn-xs"></i> تحذير هام ...</h4><p>' . $text . '</p></div>');

        } elseif ($type == 'error') {

            return $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" data-sr="wait 0.3s, then enter bottom and hustle 100%"><button type="button" class="close pull-left" data-dismiss="alert">×</button><h4 class="text-lg"><i class="fa fa-exclamation-circle icn-xs"></i> خطآ ...</h4><p>' . $text . '</p></div>');

        }

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

    private function upload_muli_image($input_name,$folder){
        if(!empty($_FILES[$input_name]['name'])){
            $filesCount = count($_FILES[$input_name]['name']);
            for($i = 0; $i < $filesCount; $i++){
                $_FILES['userFile']['name'] = $_FILES[$input_name]['name'][$i];
                $_FILES['userFile']['type'] = $_FILES[$input_name]['type'][$i];
                $_FILES['userFile']['tmp_name'] = $_FILES[$input_name]['tmp_name'][$i];
                $_FILES['userFile']['error'] = $_FILES[$input_name]['error'][$i];
                $_FILES['userFile']['size'] = $_FILES[$input_name]['size'][$i];
                $all_img[]=$this->upload_image("userFile",$folder);
            }
            return $all_img;
        }
    }

    private  function upload_image($file_name ,$folder){
        $config['upload_path'] = $folder;
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf';
        // $config['max_size']    = '1024*8';
        $config['max_size']    = '80000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000';

        $config['encrypt_name']=true;
        $this->load->library('upload',$config);
        if(! $this->upload->do_upload($file_name)){
            return  false;
        }else{
            $datafile = $this->upload->data();
            //$this->thumb($datafile);
            return  $datafile['file_name'];
        }
    }

    //////////////////////////////////
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

    public function index() //qr_c/QrController/qrcodeGenerator
    {
        $this->load->view('code.php');
    }

    public function qrcodeGenerator ( )
    {
        /*
        echo '<pre>';
        
        print_r($_SESSION);
        return;*/
        
        	$this->load->model('qr_m/api/Web_service');
            $data['title']="نظام البصمة";
        
              $user_id=  $_SESSION['user_id'];
            
             
                $main_Qrcode_pc=$this->Web_service-> get_token_by_id2($user_id);
               
               
             /*   if($_SESSION['token_pc']=='d5zRw7TUr9M:APA91bESGMAITymqiZlwYgV0Uav_kbOdiZsFNI_ocZzlqc0DtUwG7i-bR77x99VeWh9HcZo_peDJhRqsnNtZ3tTjTDfqr8krrR4OP5DbLGzFepe23v4Bv1I0GDxwZZyMg4R6OTHz3zdp')
                {
                   redirect('login','refresh');
                  
               }else{*/
                  
        


        $qrtext = $this->Web_service->select_last_Qrcode('qrcodes_table','Qrcode');
      

        if(isset($qrtext))
        {

            //file path for store images

            $SERVERFILEPATH = $_SERVER['DOCUMENT_ROOT'].'/asisst/qr/images/';


            $text = $qrtext;
            $text1= substr($text, 0,9);


            $folder = $SERVERFILEPATH;
            $file_name1 = $text1."-Qrcode" . rand(2,200) . ".png";

            $file_name = $folder.$file_name1;

            QRcode::png($text,$file_name);
     
      





            //echo"<center><img src=".base_url().'images/'.$file_name1."></center";
             // $data['img']="<center><img src=".base_url().'images/'.$file_name1."></center";
             
             $data['img']=$file_name1;
           $data['subview'] = 'admin/qr_v/qrcode_v/qrcode_generate';
          $this->load->view('admin_index', $data);
        }
        else
        {
            echo 'No Text Entered';
        }
  // }
}

public function qrcodeGenerator_pertime()
{
          
        
        	$this->load->model('qr_m/api/Web_service');
        
              

        $qrtext = $this->Web_service->select_last_Qrcode('qrcodes_table','Qrcode');
      

        if(isset($qrtext))
        {

            //file path for store images


          $SERVERFILEPATH = $_SERVER['DOCUMENT_ROOT'].'/asisst/qr/images/';
            $text = $qrtext;
            $text1= substr($text, 0,9);


            $folder = $SERVERFILEPATH;
            $file_name1 = $text1."-Qrcode" . rand(2,200) . ".png";

            $file_name = $folder.$file_name1;

            QRcode::png($text,$file_name);
     
      





            //echo"<center><img src=".base_url().'images/'.$file_name1."></center";
      //  echo "<center><img src=".base_url().'images/'.$file_name1."></center";
      echo $file_name1;
       
        }
        else
        {
            echo 'No Text Entered';
        }
    
}



function distance($lat1, $lon1, $lat2, $lon2, $unit) {
  if (($lat1 == $lat2) && ($lon1 == $lon2)) {
    return 0;
  }
  else {
    $theta = $lon1 - $lon2;
    $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
    $dist = acos($dist);
    $dist = rad2deg($dist);
    $miles = $dist * 60 * 1.1515;
    $unit = strtoupper($unit);

    if ($unit == "K") {
      return ($miles * 1.609344);
    } else if ($unit == "N") {
      return ($miles * 0.8684);
    } else {
      return $miles;
    }
  }
}

function get_length()
{
    //echo $this->distance(32.9697, -96.80322, 29.46786, -98.53506, "M") . " Miles<br>";
echo  $this->distance(32.9697, -96.80322, 29.46786, -98.53506, "K") . " Kilometers<br>";
//echo distance(32.9697, -96.80322, 29.46786, -98.53506, "N") . " Nautical Miles<br>";
}
public function update_qrcode() //qr_c/QrController/update_qrcode
{
      
          $id = $this->Web_service->select_last_Qrcode('qrcodes_table','id');
           $data['Qrcode']=time();
        $this->db->where('id',$id);
        $this->db->update('qrcodes_table',$data);
        $Qrcode= $this->Web_service->select_last_Qrcode('qrcodes_table','Qrcode');
        echo $Qrcode;
     
}


public function add_project()  //qr_c/QrController/add_project
{
    
           $data['title']="اضافه مشروع";
           if($this->input->post('add'))
           {
             $logo= $this->upload_image('logo','asisst/qr/images');
             $data_insert['name']=$this->input->post('name');
             $data_insert['base_url']=$this->input->post('base_url').'/';
             $data_insert['code']=$this->input->post('code');
             $data_insert['color']=$this->input->post('color');
             $data_insert['logo']=base_url()."asisst/qr/images/".$logo;
             
              $data_insert['date']=date("Y-m-d");
              $data_insert['publisher']=$_SESSION['user_id'];
             $this->Web_service->insert_data('qrcode_alatheer_projects',$data_insert);
              $this->message('success', 'تمت الاضافه بنجاح');
            redirect('qr_c/QrController/add_project', 'refresh');
           }
           $data['records']=$this->Web_service->get_all('qrcode_alatheer_projects');
          
         $data['subview'] = 'admin/qr_v/motab3a_hdoor_v/add_project';
        $this->load->view('admin_index', $data);
}

public function update_project($id)
{
         $data['title']="تعديل مشروع";
          if($this->input->post('add'))
           {
             $logo= $this->upload_image('logo','asisst/qr/images');
             $data_insert['name']=$this->input->post('name');
              $data_insert['base_url']=$this->input->post('base_url');
             $data_insert['code']=$this->input->post('code');
             if(isset($logo)&& !empty($logo)){
             $data_insert['logo']=base_url()."asisst/qr/images/".$logo;
             }
              $data_insert['date']=date("Y-m-d");
               $data_insert['color']=$this->input->post('color');
              $data_insert['publisher']=$_SESSION['user_id'];
             $this->Web_service->update_data('qrcode_alatheer_projects',$data_insert,$id);
              $this->message('success', 'تم التعديل بنجاح');
            redirect('qr_c/QrController/add_project', 'refresh');
           }
           $data['one_row']=$this->Web_service->get_by_id('qrcode_alatheer_projects',$id);
           
           $data['subview'] = 'admin/qr_v/motab3a_hdoor_v/add_project';
           $this->load->view('admin_index', $data);
}

public function delete_project($id)
{
    $this->Web_service->delete_record($id,'qrcode_alatheer_projects');
     $this->message('success', 'تم الحذف بنجاح');
     redirect('qr_c/QrController/add_project', 'refresh');
}

public function hr_hdoor_ensraf()
{
   
    $data= $this->db->get('hr_hdoor_ensraf')->result();
     echo "<pre>";
     print_r($data);
}




   
}