<?php

class Sarf_order extends MY_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }
        /**********************************************************/
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in = $this->Counting->get_basic_in_num();
        $this->files_basic_in = $this->Counting->get_files_basic_in();
        /*************************************************************/
        $this->load->helper(array('url', 'text', 'permission', 'form'));

        $this->load->model('system_management/Groups');

        $this->groups = $this->Groups->get_group($_SESSION["group_number"]);
        $this->groups_title = $this->Groups->get_group_title($_SESSION["group_number"]);
        $this->load->model('st/sarf/Sarf_order_model');

        $this->load->library('google_maps');
    }

    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
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

    public function add_sarf(){ // st/sarf/Sarf_order/add_sarf
        $data['storage']=$this->Sarf_order_model->get_storage(1);
        $data['ezn_rkm']= $this->Sarf_order_model->get_ezn_rkm();
        $data['family']=$this->Sarf_order_model->get_family();
        $data['all_sarf']=$this->Sarf_order_model->display_sarf();
      //  $this->test( $data['all_sarf']);
      //  die;

        if ($this->input->post('save')){
          $id=  $this->Sarf_order_model->insert_sarf();
          $this->Sarf_order_model->insert_asnaf_details($id);
          $this->messages('success','تم اضافة اذن الصرف') ;
          redirect('st/sarf/Sarf_order/add_sarf','refresh');

        }

        $data['title']= 'أوامر الصرف ' ;
        $data['subview']= 'admin/st/sarf/sarf_order_view';
        $this->load->view('admin_index',$data);

    }

    public function get_code(){
        $id= $this->input->post('id');
        $code = $this->Sarf_order_model->get_code($id);
        $json = json_encode($code);
        echo $json;
    }

    public function load_details(){

        $row_id = $this->input->post('row_id');
        $data['get_all']=$this->Sarf_order_model->get_by_id($row_id)[0];
        $this->load->view('admin/st/sarf/load_details',$data);

    }

    public function Delete_sarf($id){

    $this->Sarf_order_model->delete_sarf($id);
    $this->Sarf_order_model->delete_all_asnaf($id);
        $this->messages('success','تم الحذف بنجاح') ;
        redirect('st/sarf/Sarf_order/add_sarf','refresh');

    }

    public function Print_sarf(){

        $row_id = $this->input->post('row_id');
        $data['get_all']=$this->Sarf_order_model->get_by_id($row_id)[0];
        $this->load->view('admin/st/sarf/print_sarf', $data);

    }


}