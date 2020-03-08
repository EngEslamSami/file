<?php
class Videos_library extends MY_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->helper(array('url','text','permission','form'));
        $this->load->helper('pagination');
        $this->load->model('Public_relations/website/library/Videos_model');
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


    public function videos(){ // public_relations/website/library/Videos_library/videos
        $data['get_videos'] = $this->Videos_model->display_videos();
        if ($this->input->post('ADD')){
            $this->Videos_model->insert_video();

            $this->message('success','تم الاضافة بنجاح');
            redirect('public_relations/website/library/Videos_library/videos','refresh');

        }
        $data['subview'] = 'admin/public_relations/website/library/videos_library_view';
        $this->load->view('admin_index', $data);
    }

    public function get_videos(){ // public_relations/website/library/Videos_library/get_videos
        $data['lenght']= $_POST['length'];

        $this->load->view('admin/public_relations/website/library/get_videos');
    }
    public function Delete($id){  // public_relations/website/library/Videos_library/Delete
        $this->Videos_model->delet_video($id);
        $this->message('success','تم الحذف بنجاح');
        redirect('public_relations/website/library/Videos_library/videos','refresh');
    }
//    public function Update($id){ // admin/library/Videos_library/Update
//        $data['get_video'] = $this->Videos_model->get_by_id($id);
//      //  $this->test( $data['get_video']);
//
//        $data['subview'] = 'admin/library/videos_library_view';
//        $this->load->view('admin_index', $data);
//    }

public function get_Main_video(){
        $this->Videos_model->get_Main_video();
        echo json_encode($_POST);
    }




}