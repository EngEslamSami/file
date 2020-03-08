<?php
class Nbza extends MY_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination', 'session');
        $this->load->helper(array('url', 'text', 'permission', 'form'));
        $this->load->helper('pagination');
        $this->load->model('Public_relations/website/nabza/Nabza_model');
        error_reporting(E_ALL & ~E_NOTICE);
    }

    private  function test($data=array()){
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }
    private function thumb($data)
    {
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

    private function upload_image($file_name)
    {
        $config['upload_path'] = 'uploads/images';
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf';
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
    private function url()
    {
        unset($_SESSION['url']);
        $this->session->set_flashdata('url','http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
    }

    private function message($type,$text)
    {
        if($type =='success') {
            return $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> تم بنجاح!</strong> '.$text.'.</div>');
        }elseif($type=='wiring'){
            return $this->session->set_flashdata('message','<div class="alert alert-warning alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> تحذير  !</strong> '.$text.'.</div>');
        }elseif($type=='error'){
            return  $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>خطأ!</strong> '.$text.'.</div>');
        }
    }



    public function add_nabza(){ // public_relations/website/nbza/Nbza/add_nabza
        if ($this->input->post('ADD')){
            $this->Nabza_model->insert();
            $this->message('success','تم الاضافة بنجاح');
            redirect('public_relations/website/nbza/Nbza/add_nabza','refresh');
        }
       $data['nabza']=$this->Nabza_model->display_nabza();

        $data['title']= 'اضافة نبذه مختضرة للجمعية';
        $data['subview'] = 'admin/public_relations/website/nabza/nabza_view';
        $this->load->view('admin_index', $data);
    }

    public function Update($id){
        $data['get_nabza']= $this->Nabza_model->get_by_id($id);

        if ($this->input->post('ADD')){
            $this->Nabza_model->update($id);
            $this->message('success','تم التعديل بنجاح');
            redirect('public_relations/website/nbza/Nbza/add_nabza','refresh');
        }

        $data['subview'] = 'admin/public_relations/website/nabza/nabza_view';
        $this->load->view('admin_index', $data);
    }



    public function Delete($id){

        $this->Nabza_model->delete($id);
        $this->message('success','تم الحذف بنجاح');
        redirect('public_relations/website/nbza/Nbza/add_nabza','refresh');
    }
}