<?php
/**
 * Created by PhpStorm.
 * User: mini
 * Date: 30/01/2019
 * Time: 08:29 م
 */

class Slide   extends MY_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->library('pagination');
        if($this->session->userdata('is_logged_in')==0){
            redirect('login');
        }
        $this->load->helper(array('url','text','permission','form'));

        /**********************************************************/
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in  = $this->Counting->get_basic_in_num();
        $this->files_basic_in  = $this->Counting->get_files_basic_in();
        /*************************************************************/
        $this->load->model('system_management/Groups');

        $this->load->model('Public_relations/Report_model');

        $this->groups=$this->Groups->get_group($_SESSION["group_number"]);
        $this->groups_title=$this->Groups->get_group_title($_SESSION["group_number"]);
        $this->load->model('Public_relations/website/main_data/Model_slide');
    }
    private function test($data=array()){
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }
    private  function upload_image($file_name){
        $config['upload_path'] = 'uploads/images';
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf';
        $config['max_size']    = '100000000';
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
    public function index()
    {//main_data/Slide
        $data['all_img'] = $this->Model_slide->selet_all();
        $data['title'] = "اضافة صور الأسليدر ";
        $data['subview'] = 'admin/public_relations/website/main_data/slide_view';
        $this->load->view('admin_index', $data);
    }

        public function insert(){
            $img = $this->upload_image('img');
            $this->Model_slide->insert_img($img);
            redirect('main_data/Slide', 'refresh');

        }
    public function update($id)
    {
        $data['id'] = base64_decode($id);
        if ($this->input->post('btn')) {
            $img = $this->upload_image('img');
            $this->Model_slide->update_img($img,$data['id']);
            redirect('public_relations/website/main_data/Slide', 'refresh');
        }
        $data['img_data'] = $this->Model_slide->selet_img($data['id']);
        $data['title'] = "تعديل صورة الاسليدر ";
        $data['subview'] = 'admin/public_relations/website/main_data/slide_view';
        $this->load->view('admin_index', $data);
    }
    public function select_data(){
        $id=$this->input->post('id');
        $img_data = $this->Model_slide->selet_img($id);
        echo json_encode($img_data);

    }
    public function delete($id)
    {
        $id = base64_decode($id);
        $this->Model_slide->delete_img($id);
        redirect('public_relations/website/main_data/Slide', 'refresh');


    }
}