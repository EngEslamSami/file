<?php
class Photos_library extends MY_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->helper(array('url','text','permission','form'));
        $this->load->helper('pagination');
        $this->load->model('library/Photos_model');
        error_reporting(E_ALL & ~E_NOTICE);
    }

    private function test($data=array()){
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }

    private function message($type,$text){
        if($type =='success') {
            return $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissable">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <strong> تم بنجاح!</strong> '.$text.'.
                                                </div>');
        }elseif($type=='wiring'){
            return $this->session->set_flashdata('message','<div class="alert alert-warning alert-dismissable">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <strong> تحذير  !</strong> '.$text.'.
                                                </div>');
        }elseif($type=='error'){
            return  $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <strong>خطأ!</strong> '.$text.'.
                                                </div>');
        }
    }

    private  function upload_image($file_name ,$folder = "images"){
        $config['upload_path'] = 'uploads/'.$folder;
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf';
        // $config['max_size']    = '1024*8';
        $config['max_size']    = '80000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000';

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

    private function upload_muli_image($input_name,$folder = "images"){
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



    public function downloads_new($file)
    { // mobadra/Mobdra/downloads_new
        $this->load->helper('download');
        $name = $file;
        $data = file_get_contents('./uploads/images/'.$file);
        force_download($name, $data);
    }

    public function photos(){ // admin/library/Photos_library/photos
        $data['images']= $this->Photos_model->display_imgs();

      if ($this->input->post('ADD')){
          $img='image';
          $file['img']= $this->upload_image($img);

          $id = $this->Photos_model->insert_photos($file);
         
  if($_FILES["img"]["name"] && !empty($_FILES["img"]["name"])){
                $all_img= $this->upload_muli_image("img","images");
                $this->Photos_model->insert_library_imgs($all_img,$id);
            }

         // $this->test($_POST);
        //  $this->test($_FILES);
        //  die();
          $this->message('success','تم الاضافة بنجاح');
          redirect('admin/library/Photos_library/photos','refresh');


      }



        $data['subview'] = 'admin/library/photos_library_view';
        $this->load->view('admin_index', $data);
    }

    public function get_library_photo(){ // admin/library/Photos_library/get_library_photo
        $data['lenght']= $_POST['length'];

        $this->load->view('admin/library/get_library_photos');
    }

    public function Update($id){ // admin/library/Photos_library/Update
        $data['get_images']= $this->Photos_model->get_by_id($id);
        $data['result'] = $this->Photos_model->display_album($id);

        if ($this->input->post('ADD')){
            if ($this->input->post('img')){
                $img='img';
                $file['img']= $this->upload_image($img);
            }

            $this->Photos_model->update_library($id,$file) ;
           
  if($_FILES["img"]["name"] && !empty($_FILES["img"]["name"])){
                $all_img= $this->upload_muli_image("img","images");
                $this->Photos_model->insert_library_imgs($all_img,$id);
            }


            $this->message('success','تم التعديل بنجاح');
            redirect('admin/library/Photos_library/photos','refresh');


        }

        $data['subview'] = 'admin/library/photos_library_view';
        $this->load->view('admin_index', $data);
    }

    public function Delete($id){ // admin/library/Photos_library/Delete

        $this->Photos_model->delete($id);
        $this->Photos_model->delete_img($id);

        $this->message('success','تم الحذف بنجاح');
        redirect('admin/library/Photos_library/photos','refresh');
    }
    public function DeletePhoto($id,$publish_num){ // admin/library/Photos_library/DeletePhoto

        $this->Photos_model->delete_photos($id);
        redirect('admin/library/Photos_library/Update/'.$publish_num,'refresh');

    }



}