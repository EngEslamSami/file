<?php
class Tazkra_orders extends MY_Controller {
    public function __construct(){
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
        $this->load->model('technical_support/tazkra/tazkra_orders/Tazkra_orders_model');
        $this->load->library('google_maps');
    }
    private  function test($data=array()){
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }
    private function thumb($data){
        $config['image_library'] = 'gd2';
        $config['source_image'] =$data['full_path'];
        // $config['new_image'] = 'uploads/thumbs/'.$data['file_name'];
        $config['new_image'] = 'uploads/technical_support/tazkra_orders/thumbs/'.$data['file_name'];
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['thumb_marker']='';
        $config['width'] = 275;
        $config['height'] = 250;
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
    }

    private function upload_all_file($file_name)
    {
        $config['upload_path'] = 'uploads/technical_support/tazkra_orders';
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
        $config['max_size'] = '100000000';
        $config['encrypt_name'] = true;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($file_name)) {
            return false;
        } else {
            $datafile = $this->upload->data();
            $this->thumb($datafile);
            return $datafile['file_name'];
        }
    }
    public function read_file($file_name)
    {
        $this->load->helper('file');
        $file_path = 'uploads/technical_support/tazkra_orders/'.$file_name;
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
        $data = file_get_contents('uploads/technical_support/tazkra_orders/'.$file);
        force_download($name, $data);
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
        }

        elseif($type=='warning'){
            return $CI->session->set_flashdata('message','<div class="alert alert-warning alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>   !</strong> '.$text.'.</div>');
        }elseif($type=='error'){
            return $CI->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> !</strong> '.$text.'.</div>');
        }

    }
    public function add_order(){ // technical_support/tazkra/tazkra_orders/Tazkra_orders/add_order

        $data['tazkra_type']= $this->Tazkra_orders_model->get_tazkra_settings(1);
        $data['importance']= $this->Tazkra_orders_model->get_tazkra_settings(2);
        $data['deparments']= $this->Tazkra_orders_model->get_deparments();
        $data['all_tzaker']= $this->Tazkra_orders_model->get_all_tazaker();


        if ($this->input->post('add')){
           $id = $this->Tazkra_orders_model->add_order();
           $data['tzkra'] = $this->Tazkra_orders_model->get_tzkra_byId($id);
           $tazkra_num = $data['tzkra']->tazkra_num;
           $tazkra_date = $data['tzkra']->date_ar;
           $full_date = explode(' ',$tazkra_date);
           $date = $full_date[0];
           $new_date = date('d-m-Y',strtotime($date));
           $time = $full_date[1];
           $a = $full_date[2];

            $this->messages('success',' تم انشاء التذكرة رقم ' .' '.$tazkra_num.' '. 'بتاريخ  '.' '.$new_date.' \r\n' .$time.' '.$a);
            redirect('technical_support/tazkra/tazkra_orders/Tazkra_orders/add_attach/'.$id,'refresh');
        }
        $data['title']='   اضافة تذكرة جديدة';
        $data['subview']= 'admin/technical_support/tazkra/tazkra_orders/tazkra_orders_view';
        $this->load->view('admin_index',$data);
    }
    public function update_order($id){

        $data['tazkra_type']= $this->Tazkra_orders_model->get_tazkra_settings(1);
        $data['importance']= $this->Tazkra_orders_model->get_tazkra_settings(2);
        $data['deparments']= $this->Tazkra_orders_model->get_deparments();
        $data['get_tazkra']= $this->Tazkra_orders_model->get_tzkra_byId($id);

        if ($this->input->post('add')){
            $this->Tazkra_orders_model->update_order($id);
            $this->messages('success',' تم التعديل بنجاح');
            redirect('technical_support/tazkra/tazkra_orders/Tazkra_orders/add_order','refresh');
        }
        $data['title']='   اضافة تذكرة جديدة';
        $data['subview']= 'admin/technical_support/tazkra/tazkra_orders/tazkra_orders_view';
        $this->load->view('admin_index',$data);
    }
    public function  delete_order($id){
        $this->Tazkra_orders_model->delete_tazkra($id);
        $this->Tazkra_orders_model->delete_all_attach($id);
        $this->messages('success',' تم الحذف بنجاح');
        redirect('technical_support/tazkra/tazkra_orders/Tazkra_orders/add_order','refresh');
    }
    public function add_attach($id){

        $data['get_tazkra']= $this->Tazkra_orders_model->get_tzkra_byId($id);
        $data['all_attach']= $this->Tazkra_orders_model->get_all_attach($id);
        if ($this->input->post('add')){
            $file = $this->upload_all_file('morfaq');
            $size= $_FILES['morfaq']['size'];
            $this->Tazkra_orders_model->add_attach($id,$file,$size);
            $this->messages('success',' تم اضافة المرفق بنجاح');
            redirect('technical_support/tazkra/tazkra_orders/Tazkra_orders/add_attach/'.$id,'refresh');
        }


        $data['title']='   اضافة تذكرة جديدة   ';
        $data['subview']= 'admin/technical_support/tazkra/tazkra_orders/add_attach';
        $this->load->view('admin_index',$data);
    }
    public function load_details(){

        $row_id = $this->input->post('row_id');
        $data['get_all']=$this->Tazkra_orders_model->get_tzkra_byId($row_id);
        $this->load->view('admin/technical_support/tazkra/tazkra_orders/load_details',$data);

    }

    public function  delete_attach($id,$tzkra_id){
        $this->Tazkra_orders_model->delete_attach($id);
        $this->messages('success',' تم الحذف بنجاح');
        redirect('technical_support/tazkra/tazkra_orders/Tazkra_orders/add_attach/'.$tzkra_id,'refresh');

    }
    public function Print_order(){

        $row_id = $this->input->post('row_id');
        $data['get_all']=$this->Tazkra_orders_model->get_tzkra_byId($row_id);
        $this->load->view('admin/technical_support/tazkra/tazkra_orders/print_order', $data);

    }


}