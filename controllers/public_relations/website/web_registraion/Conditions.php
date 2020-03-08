<?php
class Conditions extends MY_Controller{


    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->helper(array('url','text','permission','form'));
        $this->load->helper('pagination');
        error_reporting(E_ALL & ~E_NOTICE);
        $this->load->model('Public_relations/website/web_registration/NewRegister');

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

    public function condition_register(){ // public_relations/website/web_registraion/Conditions/condition_register
        error_reporting(E_ALL & ~E_NOTICE);



        if ($this->input->post('ADD')){
            $this->NewRegister->insert_conditions();
         //   return;
            $this->message('success','تم الاضافة بنجاح');
            redirect('public_relations/website/web_registraion/Conditions/condition_register','refresh');


        }
        $data['condtions'] =$this->NewRegister->display_cond();
//        echo "<pre>";
//        print_r( $data['condtions']);
//        echo "</pre>";

        $data['subview'] = 'admin/public_relations/website/web_registraion/conditions_register';
        $this->load->view('admin_index',$data);
    }

    public function get_details(){ // public_relations/website/web_registraion/Conditions/get_details
        $data['lenght']= $_POST['length'];

        $this->load->view('admin/public_relations/website/web_registraion/load_conditions');
    }
    public function Delete($id){ // public_relations/website/web_registraion/Conditions/Delete

        $this->NewRegister->delete($id);
        $this->message('success','تم الحذف بنجاح');
        redirect('public_relations/website/web_registraion/Conditions/condition_register','refresh');

    }
}