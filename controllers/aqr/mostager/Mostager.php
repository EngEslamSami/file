<?php
class Mostager extends MY_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        if($this->session->userdata('is_logged_in')==0){
            redirect('login');
        }
        /**********************************************************/
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in  = $this->Counting->get_basic_in_num();
        $this->files_basic_in  = $this->Counting->get_files_basic_in();
        /*************************************************************/
        $this->load->helper(array('url','text','permission','form'));

        $this->load->model('system_management/Groups');

        $this->groups=$this->Groups->get_group($_SESSION["group_number"]);
        $this->groups_title=$this->Groups->get_group_title($_SESSION["group_number"]);
        $this->load->library('google_maps');

        $this->load->model('aqr_model/mostager/Mostager_model');

    }
    public function messages($type,$text,$method=false)
    {
        $CI =& get_instance();
        $CI->load->library("session");
        if($type =='success') {
            return $CI->session->set_flashdata('message','<script> swal({
                    title:"'.$text.'" ,
                    confirmButtonText: "تم"
                })</script>');

        }elseif($type=='warning'){
            return $CI->session->set_flashdata('message','<div class="alert alert-warning alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>   !</strong> '.$text.'.</div>');
        }elseif($type=='error'){
            return $CI->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> !</strong> '.$text.'.</div>');
        }

    }
    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }
    private function thumb($data){
        $config['image_library'] = 'gd2';
        $config['source_image'] =$data['full_path'];
        $config['new_image'] = 'uploads/aqr/thumbs/'.$data['file_name'];
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['thumb_marker']='';
        $config['width'] = 275;
        $config['height'] = 250;
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
    }
    private  function upload_image($file_name ,$folder = "images"){
        $config['upload_path'] = 'uploads/'.$folder;
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf';
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

    public function add_mostager(){ // aqr/mostager/Mostager/add_mostager

          $data['national_source']= $this->Mostager_model->get_national_source(12);
          $data['rkm_m']= $this->Mostager_model->get_rkm();
          $data['get_all'] = $this->Mostager_model->get_all();

        if ($this->input->post('add')){
            $file = $this->upload_image('img','aqr');
            $this->Mostager_model->insert_mostager($file);
            $this->messages('success', 'تم الاضافة بنجاح ' );
            redirect('aqr/mostager/Mostager/add_mostager', 'refresh');
        }
        $data['title'] = "  المستأجرين ";
        $data['subview'] = 'admin/aqr_view/mostager/mostager_view';
        $this->load->view('admin_index', $data);
    }
    public function update_mostager($id){
        $data['national_source']= $this->Mostager_model->get_national_source(12);
        $data['get_mostager']= $this->Mostager_model->getById($id);
        if ($this->input->post('add')){
            $file = $this->upload_image('img','aqr');
            $this->Mostager_model->update_mostager($id,$file);
            $this->messages('success', 'تم التعديل بنجاح ' );
            redirect('aqr/mostager/Mostager/add_mostager', 'refresh');
        }
        $data['title'] = "  المستأجرين ";
        $data['subview'] = 'admin/aqr_view/mostager/mostager_view';
        $this->load->view('admin_index', $data);

    }
    public function delete_mostager($id){
        $this->Mostager_model->delete_mostager($id);
        $this->messages('success', 'تم الحذف بنجاح ' );
        redirect('aqr/mostager/Mostager/add_mostager', 'refresh');
    }
    public function check_national_card(){
        $value = $this->input->post('value');
      $national_card =  $this->Mostager_model->check_national_card($value);
     // echo json_encode($national_card);
        echo $national_card;

    }
    public function load_details(){

        $row_id = $this->input->post('row_id');
        $data['get_all']=$this->Mostager_model->getById($row_id);
      //  $this->test($data['get_all']);
       // die;
        $data['masdar_national_card_n']=$this->Mostager_model->get_from_family_setting($data['get_all']->masdar_national_card);
        $this->load->view('admin/aqr_view/mostager/load_details',$data);

    }
    public function print_mostager(){

        $row_id = $this->input->post('row_id');
        $data['get_all']=$this->Mostager_model->getById($row_id);
        $data['masdar_national_card_n']=$this->Mostager_model->get_from_family_setting($data['get_all']->masdar_national_card);
        $this->load->view('admin/aqr_view/mostager/print_mostager', $data);

    }

}