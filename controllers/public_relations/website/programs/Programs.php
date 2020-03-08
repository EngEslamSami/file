<?php
class Programs extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->helper(array('url','text','permission','form'));
        $this->load->helper('pagination');
        error_reporting(E_ALL & ~E_NOTICE);
        $this->load->model('Public_relations/website/programs/Program_model');

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

    public function add_program(){ //  public_relations/website/programs/Programs/add_program
        $data['programs']= $this->Program_model->display_programs();
        //$this->test($data['programs']);
        if ($this->input->post('ADD')){
            if (isset($_FILES['img']['name']) && !empty($_FILES['img']['name']) ){
                $img = 'img';
                $file = $this->upload_image($img,"images");

            }
            $this->Program_model->insert_program($file);

            $this->message('success','تم الاضافة بنجاح');
            redirect('public_relations/website/programs/Programs/add_program','refresh');

        }


        $data['subview'] = 'admin/public_relations/website/programs/program_view';
        $this->load->view('admin_index', $data);

    }

    public function Update($id){
        $data['get_program']= $this->Program_model->get_by_id($id);
        //$this->test($data['get_program']);
        if ($this->input->post('ADD')){
            if (isset($_FILES['img']['name']) && !empty($_FILES['img']['name']) ){
                $img = 'img';
                $file = $this->upload_image($img,"images");

            }
            $this->Program_model->update_program($id,$file);

            $this->message('success','تم التعديل بنجاح');
            redirect('public_relations/website/programs/Programs/add_program','refresh');

        }

        $data['subview'] = 'admin/public_relations/website/programs/program_view';
        $this->load->view('admin_index', $data);
    }
    public function Delete($id){
        $this->Program_model->delete($id);
        $this->message('success','تم الحذف بنجاح');
        redirect('public_relations/website/programs/Programs/add_program','refresh');
    }





}