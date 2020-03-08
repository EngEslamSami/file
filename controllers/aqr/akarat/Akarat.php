<?php
class  Akarat extends MY_Controller{
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

        $this->load->model('aqr_model/akarat/Akarat_model');

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
    public function add_akar(){ // aqr/akarat/Akarat/add_akar
        $data['aqart']= $this->Akarat_model->get_aqr(1);
        $data['get_all'] = $this->Akarat_model->get_all();

        if ($this->input->post('add')){
            $this->Akarat_model->insert_aqar();
            $this->messages('success', 'تم الاضافة بنجاح ' );
            redirect('aqr/akarat/Akarat/add_akar', 'refresh');
        }
        $data['title'] = "اضافة عقار ";
        $data['subview'] = 'admin/aqr_view/akarat/akarat_view';
        $this->load->view('admin_index', $data);
    }
    public function update_akar($id){
        $data['aqart']= $this->Akarat_model->get_aqr(1);
        $data['get_aqar'] = $this->Akarat_model->getById($id);
        if ($this->input->post('add')){
            $this->Akarat_model->update_aqar($id);
            $this->messages('success', 'تم التعديل بنجاح ' );
            redirect('aqr/akarat/Akarat/add_akar', 'refresh');
        }
        $data['title'] = "اضافة عقار ";
        $data['subview'] = 'admin/aqr_view/akarat/akarat_view';
        $this->load->view('admin_index', $data);

    }
    public function delete_akar($id){
        $this->Akarat_model->delete_aqar($id);
        $this->messages('success', 'تم الحذف بنجاح ' );
        redirect('aqr/akarat/Akarat/add_akar', 'refresh');
    }
    public function load_details(){

        $row_id = $this->input->post('row_id');
        $data['get_all']=$this->Akarat_model->getById($row_id);
        $this->load->view('admin/aqr_view/akarat/load_details',$data);

    }
    public function Print_aqr(){

        $row_id = $this->input->post('row_id');
        $data['get_all']=$this->Akarat_model->getById($row_id);
        $this->load->view('admin/aqr_view/akarat/print_aqr', $data);

}

}
