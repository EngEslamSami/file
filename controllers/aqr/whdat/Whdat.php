<?php
class Whdat extends MY_Controller{
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

        $this->load->model('aqr_model/whdat/Whdat_model');

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
    public function add_whda(){ // aqr/whdat/Whdat/add_whda

       $data['whdat_type']= $this->Whdat_model->get_whdat(1);
       $data['whdat_7ala']= $this->Whdat_model->get_whdat(2);
       $data['aqart']= $this->Whdat_model->get_akarat();
       $data['rkm_whda']= $this->Whdat_model->get_rkm_whda();
       $data['get_all'] = $this->Whdat_model->get_all();

        if ($this->input->post('add')){
            $this->Whdat_model->insert_whda();
            $this->messages('success', 'تم الاضافة بنجاح ' );
            redirect('aqr/whdat/Whdat/add_whda', 'refresh');
        }
        $data['title'] = " الوحدات بالعقارات ";
        $data['subview'] = 'admin/aqr_view/whdat/whdat_view';
        $this->load->view('admin_index', $data);
    }
    public function update_whda($id){

        $data['whdat_type']= $this->Whdat_model->get_whdat(1);
        $data['whdat_7ala']= $this->Whdat_model->get_whdat(2);
        $data['aqart']= $this->Whdat_model->get_akarat();
        $data['get_whda']= $this->Whdat_model->getById($id);

        if ($this->input->post('add')){
            $this->Whdat_model->update_whda($id);
            $this->messages('success', 'تم التعديل بنجاح ' );
            redirect('aqr/whdat/Whdat/add_whda', 'refresh');
        }
        $data['title'] = " الوحدات بالعقارات ";
        $data['subview'] = 'admin/aqr_view/whdat/whdat_view';
        $this->load->view('admin_index', $data);
    }
    public function delete_whda($id){
        $this->Whdat_model->delete_whda($id);
        $this->messages('success', 'تم الحذف بنجاح ' );
        redirect('aqr/whdat/Whdat/add_whda', 'refresh');
    }
    public function load_details(){

        $row_id = $this->input->post('row_id');
        $data['get_all']=$this->Whdat_model->getById($row_id);
        $this->load->view('admin/aqr_view/whdat/load_details',$data);

    }
    public function Print_whda(){

        $row_id = $this->input->post('row_id');
        $data['get_all']=$this->Whdat_model->getById($row_id);
        $this->load->view('admin/aqr_view/whdat/print_whda', $data);

    }
}
