<?php
class Mobdra extends MY_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->helper(array('url','text','permission','form'));
        $this->load->helper('pagination');
        $this->load->model('mobadra/Mobdra_model');
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


    //______________________news_____________________________________

    public function thumb_news($data)
    {

        $config['image_library'] = 'gd2';
        $config['source_image'] = $data['full_path'];
        $config['new_image'] = 'uploads/thumbs/public_relations/news/' . $data['file_name'];
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['thumb_marker'] = '';
        $config['width'] = 75;
        $config['height'] = 50;
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();

    }
    private  function upload_image_news($file_name,$folder = "images"){
        $config['upload_path'] = 'uploads/images/public_relations/news';
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf';
        $config['max_size']    = '1024*8';
        $config['max_size']    = '80000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000';

        $config['encrypt_name']=true;
        $this->load->library('upload',$config);
        if(! $this->upload->do_upload($file_name)){
            return  false;
        }else{



            $datafile = $this->upload->data();
            $this->thumb_news($datafile);



            return  $datafile['file_name'];
        }
    }

    private function upload_muli_image($input_name,$folder = "images"){
        $filesCount = count($_FILES[$input_name]['name']);
        for($i = 0; $i < $filesCount; $i++){
            $_FILES['userFile']['name'] = $_FILES[$input_name]['name'][$i];
            $_FILES['userFile']['type'] = $_FILES[$input_name]['type'][$i];
            $_FILES['userFile']['tmp_name'] = $_FILES[$input_name]['tmp_name'][$i];
            $_FILES['userFile']['error'] = $_FILES[$input_name]['error'][$i];
            $_FILES['userFile']['size'] = $_FILES[$input_name]['size'][$i];
            $all_img[]=$this->upload_image_news("userFile",$folder);
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

    public function news(){ // mobadra/Mobdra/news

        if($_SESSION['role_id_fk']==1){
            $data['publisher']=$_SESSION['user_name'];
            $data['photo_view']= $this->Mobdra_model->get_user_photo($_SESSION['emp_code']);
        }
        else if ($_SESSION['role_id_fk']==2){

            $data['publisher'] = $this->Mobdra_model->get_member_name($_SESSION['emp_code']);
        }
        else if ($_SESSION['role_id_fk']==3){

            $data['publisher']= $this->Mobdra_model->get_emp_name($_SESSION['emp_code']);
            $data['photo_view']= $this->Mobdra_model->get_emp_photo($_SESSION['emp_code']);

        }
        else if ($_SESSION['role_id_fk']==4){
            $data['publisher']=   $this->Mobdra_model->get_member_general_name($_SESSION['emp_code']);
            $data['photo_view']= $this->Mobdra_model->get_member_general_photo($_SESSION['emp_code']);
        }
        if($this->input->post('ADD')){
            $id =  $this->Mobdra_model->insert_mobdra();


            if($this->input->post('img_name')){
                $all_img= $this->upload_muli_image("img","images");
                $this->Mobdra_model->insert_photo($all_img,$id);
            }
            if($this->input->post('video_link')){
                $this->Mobdra_model->insert_video($id);
            }


            $this->message('success','تم الاضافة بنجاح');
            redirect('mobadra/Mobdra/news','refresh');
        }


        $data['subview'] = 'admin/mobdra/mobdra_view';
        $this->load->view('admin_index', $data);

    }
    public function display_news(){ // mobadra/Mobdra/display_news
        $data['display_publisher_data'] = $this->Mobdra_model->display_publisher_data();
        // $this->test( $data['display_publisher_data']);
        $data['photos'] = $this->Mobdra_model->display_photos();
        if($_SESSION['role_id_fk']==1){
            $data['publisher']=$_SESSION['user_name'];
            $data['photo_view']= $this->Mobdra_model->get_user_photo($_SESSION['emp_code']);
        }
        else if ($_SESSION['role_id_fk']==2){

            $data['publisher'] = $this->Mobdra_model->get_member_name($_SESSION['emp_code']);
        }
        else if ($_SESSION['role_id_fk']==3){

            $data['publisher']= $this->Mobdra_model->get_emp_name($_SESSION['emp_code']);
            $data['photo_view']= $this->Mobdra_model->get_emp_photo($_SESSION['emp_code']);

        }
        else if ($_SESSION['role_id_fk']==4){
            $data['publisher']=   $this->Mobdra_model->get_member_general_name($_SESSION['emp_code']);
            $data['photo_view']= $this->Mobdra_model->get_member_general_photo($_SESSION['emp_code']);
        }

        $data['subview'] = 'admin/mobdra/display_mobdra';
        $this->load->view('admin_index', $data);

    }
    public function UpdateNews($id){ // mobadra/Mobdra/UpdateNews

        if($_SESSION['role_id_fk']==1){
            $data['publisher']=$_SESSION['user_name'];
        }
        else if ($_SESSION['role_id_fk']==2){

            $data['publisher'] = $this->Mobdra_model->get_member_name($_SESSION['emp_code']);
        }
        else if ($_SESSION['role_id_fk']==3){

            $data['publisher']= $this->Mobdra_model->get_emp_name($_SESSION['emp_code']);
        }
        else if ($_SESSION['role_id_fk']==4){
            $data['publisher']=   $this->Mobdra_model->get_member_general_name($_SESSION['emp_code']);
        }

        if($this->input->post('ADD')){
            $this->Mobdra_model->update_publisher($id);

            if($this->input->post('img_name')){
                $all_img= $this->upload_muli_image("img","images");
                $this->Mobdra_model->insert_photo($all_img,$id);

            }
            if($this->input->post('video_link')){
                $this->Mobdra_model->insert_video($id);
            }


            $this->message('success','تم التعديل بنجاح');
            redirect('mobadra/Mobdra/display_news','refresh');
        }
        $data['get_publisher'] = $this->Mobdra_model->get_by_id($id);

        $data['result'] = $this->Mobdra_model->get_photos($id);
        //  $this->test($data['result']);
        $data['video'] = $this->Mobdra_model->get_videos($id);

        $data['subview'] = 'admin/mobdra/mobdra_view';
        $this->load->view('admin_index', $data);


    }
    // __________DeletePublisher___________

    public function DeletePublisher($id){ // mobadra/Mobdra/DeletePublisher

        $this->Mobdra_model->delete($id);
        $this->Mobdra_model->delete_publisher_img($id);
        $this->Mobdra_model->delete_publisher_video($id);
        $this->message('success','تم الحذف بنجاح');
        redirect('mobadra/Mobdra/display_news','refresh');
    }
    // __________DeletePhoto___________
    public function DeletePhoto($id,$publish_num){ // mobadra/Mobdra/DeletePhoto

        $this->Mobdra_model->delete_img($id);
        redirect('mobadra/Mobdra/UpdateNews/'.$publish_num,'refresh');

    }
    // __________DeletePhoto___________
    public function DeleteVideo($id,$publish_num){ // mobadra/Mobdra/DeleteVideo

        $this->Mobdra_model->delete_video($id);
        redirect('mobadra/Mobdra/UpdateNews/'.$publish_num,'refresh');

    }

    public function get_publisher_photo(){ // mobadra/Mobdra/get_publisher_photo
        $data['lenght']= $_POST['length'];

        $this->load->view('admin/familys_views/get_publisher_photos');
    }


    public function  get_publisher_video(){ // mobadra/Mobdra/get_publisher_video
        $data['lenght']= $_POST['length'];

        $this->load->view('admin/familys_views/get_videos');
    }

    //___________________Update img_stauts__________

    public function Updateimage(){  // mobadra/Mobdra/Updateimage

        $id= $this->input->post('id');
        $this->Mobdra_model->update_img_status($id);
    }
}