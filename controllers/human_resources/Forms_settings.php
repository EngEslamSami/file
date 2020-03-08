<?php
class Forms_settings extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }
        $this->load->helper(array('url', 'text', 'permission', 'form'));
        $this->load->model('Difined_model');
        $this->load->model('system_management/Groups');
        $this->main_groups = $this->Groups->main_fetch_group();
        $this->groups = $this->Groups->get_group($_SESSION["group_number"]);
        $this->groups_title = $this->Groups->get_group_title($_SESSION["group_number"]);

        /**********************************************************/
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in = $this->Counting->get_basic_in_num();
        $this->files_basic_in = $this->Counting->get_files_basic_in();
        /*************************************************************/
        $this->load->model('human_resources_model/Always_model');
        $this->load->model('human_resources_model/forms_setting/Forms_setting');
         $this->load->model('human_resources_model/Evaluation_model');
        $this->myarray = $this->Forms_setting->all_settings();
    }


    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }

    private function message($type, $text)
    {
        if ($type == 'success') {
            return $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> تم بنجاح!</strong> ' . $text . '.</div>');
        } elseif ($type == 'wiring') {
            return $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> تحذير  !</strong> ' . $text . '.</div>');
        } elseif ($type == 'error') {
            return $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>خطأ!</strong> ' . $text . '.</div>');
        }
    }




    public function settings($type=0){    // human_resources/Forms_settings/settings
        $data['typee']= $type;
        $data['all']= $this->Forms_setting->get_all_data_form_settings($this->myarray);
        $data['categories'] = $this->Forms_setting->select_allCategories();
      
         $data['mainEvaluations']=$this->Evaluation_model->select_all();
        $data['main_result_evaluations']=$this->Evaluation_model->select_all();
        $data['sub_evaluations']=$this->Evaluation_model->select_all();
        
        
        
        $data['subview'] = 'admin/Human_resources/forms_setting/allFormsSittings';
        $this->load->view('admin_index', $data);
    }




    public function AddSitting($type){  // human_resources/Forms_settings/AddSitting

        if($this->input->post('add')){
            $this->Forms_setting->add_form_settings($type);
            $this->message('success','إضافة '.$this->myarray[$type]['title']);
            redirect('human_resources/Forms_settings/settings/'.$type ,'refresh');
        }

    }
    public function UpdateSitting($id,$type){
        $data['record'] = $this->Forms_setting->getById_form_settings($id);
        $data['typee'] = $type ;
        $data['disabled'] = 'disabled' ;
        $data["id"]=$id;
        $data["type_name"]=$this->myarray[$type];
        if($this->input->post('add')){
            $this->Forms_setting->update_form_settings($id);
            $this->message('success',' تحديث البيانات');
            redirect('human_resources/Forms_settings/settings/'.$type,'refresh');
        }

        $data['title'] = 'تعديل ';
        $data['subview'] = 'admin/Human_resources/forms_setting/allFormsSittings';
        $this->load->view('admin_index', $data);
    }


    public function DeleteSitting($id,$type){
        $this->Forms_setting->delete_form_settings($id);
        $this->message('success','حذف ');
        redirect('human_resources/Forms_settings/settings/'.$type,'refresh');
    }
    
  /**********************************************************/
  
  
     
    //======================================================
    public function AddEvaluation($type){
        $this->load->model('human_resources_model/Evaluation_model');
        $this->load->model('Difined_model');
        if($this->input->post('add_main_evaluation')) {
            $this->Evaluation_model->insert_main_evaluation();
            $this->message('success',' اﻹﺿﺎﻓﺔ');
            redirect('human_resources/Forms_settings/settings/'.$type ,'refresh');
        }
         elseif($this->input->post('add_sub_evaluation')) {
             $this->Evaluation_model->insert_sub_evaluation();
             $this->message('success',' اﻹﺿﺎﻓﺔ ');
             redirect('human_resources/Forms_settings/settings/'.$type ,'refresh');
         }
    }

    public function UpdateEvaluation($id,$type){
        $this->load->model('human_resources_model/Evaluation_model');
        $data['main_products']=$this->Evaluation_model->select_all();
        $data['mainEvaluation']=$this->Difined_model->getById("hr_evaluation_setting",$id);
        $data['subEvaluation']=$this->Difined_model->getById("hr_evaluation_setting",$id);

        $data['typee'] = $type ;
        $data['disabled'] = 'disabled' ;
        $data["id"]=$id;
        $data["type_name"]='';

        if ($this->input->post('add_main_evaluation')) {
            $this->Evaluation_model->update_main_evaluation($id);
            $this->message('success','التعديل');
            redirect('human_resources/Forms_settings/settings/'.$type ,'refresh');
        }elseif($this->input->post('add_sub_evaluation')) {
            $this->Evaluation_model->update_sub_evaluation($id);
            $this->message('success','التعديل');
            redirect('human_resources/Forms_settings/settings/'.$type ,'refresh');
        }

        $data['title'] = 'تعديل ';
        $data['subview'] = 'admin/Human_resources/forms_setting/allFormsSittings';
        $this->load->view('admin_index', $data);
    }



    public function DeleteEvaluation($type,$id){
        $this->load->model('human_resources_model/Evaluation_model');
        $this->Evaluation_model->delete($id);
        $this->message('success', 'ﺗﻢ اﻟﺤﺬﻑ');
        redirect('human_resources/Forms_settings/settings/'.$type ,'refresh');
    }
  


}
