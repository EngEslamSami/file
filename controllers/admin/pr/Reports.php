<?php
class Reports extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->helper(array('url','text','permission','form'));
        $this->load->helper('pagination');
        $this->load->model('pr/Report_model');
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
    private  function upload_file($file_name){
        $config['upload_path'] = 'uploads/files';
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
        $config['max_size']    = '1000000000';
        $config['overwrite'] = true;
        $this->load->library('upload',$config);
        if(! $this->upload->do_upload($file_name)){
            return  false;
        }else {
            $datafile = $this->upload->data();
            return $datafile['file_name'];
        }
    }
    public function read_file($file_name) // admin/pr/Reports/read_file
    {
        $this->load->helper('file');
        // $file_name=$this->uri->segment(3);
        $file_path = 'uploads/files/'.$file_name;
        header('Content-Type: application/pdf');
        header('Content-Discription:inline; filename="'.$file_name.'"');
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges:bytes');
        header('Content-Length: ' . filesize($file_path));
        readfile($file_path);
    }
    public function download($file) // Web/download
    {

        $this->load->helper('download');
        $name = $file;
        $data = file_get_contents('./uploads/files/'.$file);
        force_download($name, $data);

    }

    public function add_reports(){ // admin/pr/Reports/add_reports
        $data['icons'] = $this->Report_model->display('font_icons');
        $data['years'] = $this->Report_model->display('pr_years');
        $data['reports'] = $this->Report_model->display('pr_reports');
        if ($this->input->post('ADD')){
            $file_name='file';
            $file= $this->upload_file($file_name);
            $this->Report_model->insert_report($file);
            $this->message('success','تم الاضافة بنجاح');
            redirect('admin/pr/Reports/add_reports','refresh');

        }
        $data['subview'] = 'admin/pr/reports_view';
        $this->load->view('admin_index', $data);


    }


    public function Delete($id){ // admin/pr/Reports/Delete

        $this->Report_model->delete($id);
        redirect('admin/pr/Reports/add_reports','refresh');

    }
    public function Update($id){ // admin/pr/Reports/Update
     $data['get_report'] = $this->Report_model->get_by_id($id);
        $data['icons'] = $this->Report_model->display('font_icons');
        $data['years'] = $this->Report_model->display('pr_years');
        if ($this->input->post('ADD')){
            if (isset($_FILES['file']['name']) && !empty($_FILES['file']['name'])){
                $file_name='file';
                $file= $this->upload_file($file_name);
            }

            $this->Report_model->update($id,$file);
            $this->message('success','تم التعديل بنجاح');
            redirect('admin/pr/Reports/add_reports','refresh');

        }

        $data['subview'] = 'admin/pr/reports_view';
        $this->load->view('admin_index', $data);

    }
}