<?php
class Conditions extends MY_Controller{
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

    public function condition_register(){ // admin/web_registraion/Conditions/condition_register
        error_reporting(E_ALL & ~E_NOTICE);


        $this->load->model("web_registration/NewRegister");
        if ($this->input->post('ADD')){
            $this->NewRegister->insert_conditions();
            $this->message('success','تم الاضافة بنجاح');
            redirect('admin/web_registraion/Conditions/condition_register','refresh');


        }
        $data['condtions'] =$this->NewRegister->display_cond();

        $data['subview'] = 'admin/web_registraion/conditions_register';
        $this->load->view('admin_index',$data);
    }

    public function get_details(){ // admin/web_registraion/Conditions/get_details
        $data['lenght']= $_POST['length'];

        $this->load->view('admin/web_registraion/load_conditions');
    }
    public function Delete($id){ // admin/web_registraion/Conditions/Delete
        $this->load->model("web_registration/NewRegister");
        $this->NewRegister->delete($id);
        $this->message('success','تم الحذف بنجاح');
        redirect('admin/web_registraion/Conditions/condition_register','refresh');

    }
}