<?php
class Live_videos_library extends MY_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->helper(array('url','text','permission','form'));
        $this->load->helper('pagination');
        $this->load->model('Public_relations/website/library/Live_videos_model');
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


    public function videos(){ // public_relations/website/library/Live_videos_library/videos
        $data['get_videos'] = $this->Live_videos_model->display_videos();
        if ($this->input->post('ADD')){
            $this->Live_videos_model->insert_video();

            $this->message('success','تم الاضافة بنجاح');
            redirect('public_relations/website/library/Live_videos_library/videos','refresh');

        }
        $data['subview'] = 'admin/public_relations/website/library/live_videos_library_view';
        $this->load->view('admin_index', $data);
    }

    public function get_videos(){ // public_relations/website/library/Live_videos_library/get_videos
        $data['lenght']= $_POST['length'];

        $this->load->view('admin/public_relations/website/library/get_live_videos');
    }
    public function Delete($id){  // public_relations/website/library/Live_videos_library/Delete
        $this->Live_videos_model->delet_video($id);
        $this->message('success','تم الحذف بنجاح');
        redirect('public_relations/website/library/Live_videos_library/videos','refresh');
    }


public function get_Main_video(){
        $this->Live_videos_model->get_Main_video();
        echo json_encode($_POST);
    }

public function load_details()
    {
        $row_id = $this->input->post('row_id');
        $data['get_vedio']= $this->Live_videos_model->get_vedio_byId($row_id);
        $this->load->view('admin/public_relations/website/library/load_details', $data);

    }
    public function update_vedio($id)
    {
      $this->Live_videos_model->update_vedio($id);
      redirect('public_relations/website/library/Live_videos_library/videos','refresh');

    }


}