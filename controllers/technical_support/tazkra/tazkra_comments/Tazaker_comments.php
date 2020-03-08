<?php
class Tazaker_comments extends MY_Controller{
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
       // $this->load->model('technical_support/tazkra/Tazaker_comments');
       $this->load->model('technical_support/tazkra/tazkra_orders/Tazkra_orders_model');
       $this->load->model('technical_support/tazkra/Tazaker_comments/Tazkra_comment_model');
        $this->load->library('google_maps');
    }
    private  function test($data=array()){
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
    public function add_comment($id)//technical_support/tazkra/tazkra_comments/tazaker_comments
    {

        //$data['result']= $this->Tazaker_comments->get_details();
       // $this->test($data['result']);
       // die;
     
       if ($this->input->post('add')){
         $this->Tazkra_comment_model->add_comment($id);
   

         $this->messages('success',' تم انشاء تعليق  ' );
         redirect('technical_support/tazkra/tazkra_comments/tazaker_comments/add_comment/'.$id,'refresh');
     }
       $data['result']=$this->Tazkra_comment_model->get_comments($id);
      // $this->test($data['result']);
      $data['get_tazkra']= $this->Tazkra_orders_model->get_tzkra_byId($id);
       $data['get_all']=$this->Tazkra_orders_model->get_tzkra_byId($id);
        $data['subview'] = 'admin/technical_support/tazkra/tazkra_comments/tazaker_comments';
        $this->load->view('admin_index', $data);

    }
    public function delete_comment($id,$tazkra_id_fk)
    {
        $this->Tazkra_comment_model->delete_comment($id);
        $this->messages('success',' تم الحذف  ' );
        redirect('technical_support/tazkra/tazkra_comments/tazaker_comments/add_comment/'.$tazkra_id_fk,'refresh');
    }
    public function update_comment($id,$tazkra_id_fk){

        
       // $data['get_tazkra']= $this->Tazkra_comment_model->get_comment_byId($id);
        if ($this->input->post('add')){
            $this->Tazkra_comment_model->update_comment($id);
            $this->messages('success',' تم التعديل بنجاح');
            redirect('technical_support/tazkra/tazkra_comments/tazaker_comments/add_comment/'.$tazkra_id_fk,'refresh');
        }
       
        $data['subview'] = 'admin/technical_support/tazkra/tazkra_comments/tazaker_comments';
        $this->load->view('admin_index',$data);
    }
    public function load_details()
    {
        $row_id = $this->input->post('row_id');

       
        $data['get_tazkra']= $this->Tazkra_comment_model->get_comment_byId($row_id);
     
        //$this->test( $data['get_tazkra']);
        $this->load->view('admin/technical_support/tazkra/tazkra_comments/load_details', $data);

    }

   
   
    
}