<?php
class Project_controller extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->helper(array('url','text','permission','form'));
        $this->load->helper('pagination');
        error_reporting(E_ALL & ~E_NOTICE);
        $this->load->model('Public_relations/website/projects/Project_model');

    }
    private  function test($data=array()){
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
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
    //_________________________________________________

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
    {
        $this->load->helper('download');
        $name = $file;
        $data = file_get_contents('./uploads/images/'.$file);
        force_download($name, $data);
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

    private function url (){
        unset($_SESSION['url']);
        $this->session->set_flashdata('url','http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
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
                                                <strong> '.$text.' !</strong> .
                                                </div>');
        }elseif($type=='error'){
            return  $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <strong>'.$text.'!</strong> .
                                                </div>');
        }
    }

    public function add_project(){ // public_relations/website/projects/Project/add_project
        $data['projects'] = $this->Project_model->display_projects();

        if ($this->input->post('ADD')){
            if ($_FILES["img"]["name"] && !empty($_FILES["img"]["name"])){
                $img='img';
                $file['img']= $this->upload_image($img);
            }

            $id = $this->Project_model->insert_projects($file);
            if($this->input->post('title')){
                $this->Project_model->insert_items($id);
                $this->Project_model->insert_mostafed($id);
            }
            if($_FILES["image"]["name"] && !empty($_FILES["image"]["name"])){
                $all_img= $this->upload_muli_image("image","images");
                $this->Project_model->insert_project_imgs($all_img,$id);
            }
            if($this->input->post('video_link')){
                $this->Project_model->insert_video($id);
            }


            $this->message('success','تم الاضافة بنجاح');
            redirect('public_relations/website/projects/Project_controller/add_project','refresh');
        }


        $data['subview'] = 'admin/public_relations/website/projects/project_view';
        $this->load->view('admin_index', $data);

    }
    public function get_project_details(){ // public_relations/website/projects/Project/get_project_details
        $data['lenght']= $_POST['length'];

        $this->load->view('admin/public_relations/website/projects/load_items');
    }

    public function get_mostafed(){ // public_relations/website/projects/Project/get_mostafed
        $data['lenght']= $_POST['length'];

        $this->load->view('admin/public_relations/website/projects/load_mostafed');
    }
    public function Update($id){ // public_relations/website/projects/Project/Update
        $data['get_project'] = $this->Project_model->get_by_id($id);
        $data['get_items'] = $this->Project_model->get_details_by_id('pr_projects_items',$id);
        $data['get_mostafed'] = $this->Project_model->get_details_by_id('pr_projects_mostafed',$id);
        $data['get_photos'] = $this->Project_model->display_project_imgs($id);
        $data['get_videos'] = $this->Project_model->display_project_videos($id);

        if ($this->input->post('ADD')){
            if ($_FILES["img"]["name"] && !empty($_FILES["img"]["name"])){
                $img='img';
                $file['img']= $this->upload_image($img);
            }
             $this->Project_model->update_project($id,$file);
            if($this->input->post('title')){
                $this->Project_model->insert_items($id);
                $this->Project_model->insert_mostafed($id);
            }
            if($_FILES["image"]["name"] && !empty($_FILES["image"]["name"])){
                $all_img= $this->upload_muli_image("image","images");
                $this->Project_model->insert_project_imgs($all_img,$id);
            }
            if($this->input->post('video_link')){
                $this->Project_model->insert_video($id);
            }



            $this->message('success','تم التعديل بنجاح');
            redirect('public_relations/website/projects/Project_controller/add_project','refresh');
        }



        $data['subview'] = 'admin/public_relations/website/projects/project_view';
        $this->load->view('admin_index', $data);


    }

    public function Delete($id){ // public_relations/website/projects/Project/Delete
        $this->Project_model->delete($id);
        $this->Project_model->delete_all_details($id);
        $this->Project_model->delete_all_mostafed($id);
        $this->Project_model->delete_all_photos($id);
        $this->Project_model->delete_all_videos($id);


        $this->message('success','تم الحذف بنجاح');
        redirect('public_relations/website/projects/Project_controller/add_project','refresh');
    }

    public function DeleteDetails($id,$project_num){ // public_relations/website/projects/Project/DeleteDetails

        $this->Project_model->delete_details($id);
        redirect('public_relations/website/projects/Project_controller/Update/'.$project_num,'refresh');
    }

    public function DeleteMostafed($id,$project_num){ // public_relations/website/projects/Project/DeleteMostafed
        $this->Project_model->delete_mostafed($id);
        redirect('public_relations/website/projects/Project_controller/Update/'.$project_num,'refresh');


    }

    public function get_photos(){ // public_relations/website/projects/Project/get_photos
        $data['lenght']= $_POST['length'];

        $this->load->view('admin/public_relations/website/projects/load_photos');
    }

    public function get_videos(){ // public_relations/website/projects/Project/get_videos
        $data['lenght']= $_POST['length'];

        $this->load->view('admin/public_relations/website/projects/load_videos');
    }

    public function DeletePhoto($id,$project_num){ // public_relations/website/projects/Project/DeletePhoto

        $this->Project_model->delete_photos($id);
        redirect('public_relations/website/projects/Project_controller/Update/'.$project_num,'refresh');

    }

    public function DeleteVideo($id,$project_num){ // public_relations/website/projects/Project/DeleteVideo

        $this->Project_model->delete_video($id);
        redirect('public_relations/website/projects/Project_controller/Update/'.$project_num,'refresh');

    }
    
    
       public function update_web_display(){
        $id = $this->input->post('id');
        $value = $this->input->post('value');
        $this->Project_model->update_web_display($id,$value);
    }
}