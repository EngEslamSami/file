<?php
class Finance_resource_settings extends MY_Controller
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
        /*  $this->load->model('Nationality');
          $this->load->model('Department');
          $this->load->model('finance_resource_models/Guaranty');
          $this->load->model('finance_resource_models/Endowments');
          $this->load->model('finance_resource_models/Operation_guaranty');
          $this->load->model('finance_resource_models/Donors');
          $this->load->model('finance_resource_models/Donors_gurantee'); */

        $this->load->model('system_management/Groups');
        $this->main_groups = $this->Groups->main_fetch_group();
        $this->groups = $this->Groups->get_group($_SESSION["group_number"]);
        $this->groups_title = $this->Groups->get_group_title($_SESSION["group_number"]);

        /**********************************************************/
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in = $this->Counting->get_basic_in_num();
        $this->files_basic_in = $this->Counting->get_files_basic_in();
        /*************************************************************/

        $this->load->model('all_Finance_resource_models/settings/Finance_resource_setting');
        $this->myarray = $this->Finance_resource_setting->all_settings();
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




    public function settings($type=0){    // all_Finance_resource/settings/Finance_resource_settings/settings

        $data['typee']= $type;
        $data['all']= $this->Finance_resource_setting->get_all_data_fr_settings($this->myarray);
      
        
        $data['subview'] = 'admin/all_Finance_resource_views/settings/allFrSettings';
        $this->load->view('admin_index', $data);
    }




    public function AddSitting($type){  // all_Finance_resource/settings/Finance_resource_settings/AddSitting

        if($this->input->post('add')){
            $this->Finance_resource_setting->add_fr_settings($type);
            $this->message('success','إضافة '.$this->myarray[$type]['title']);
            redirect('all_Finance_resource/settings/Finance_resource_settings/settings/'.$type ,'refresh');
        }

    }
    public function UpdateSitting($id,$type){
        $data['record'] = $this->Finance_resource_setting->getById_fr_settings($id);
        $data['typee'] = $type ;
        $data['disabled'] = 'disabled' ;
        $data["id"]=$id;
        $data["type_name"]=$this->myarray[$type];
        if($this->input->post('add')){
            $this->Finance_resource_setting->update_fr_settings($id);
            $this->message('success',' تحديث البيانات');
            redirect('all_Finance_resource/settings/Finance_resource_settings/settings/'.$type,'refresh');
        }

        $data['title'] = 'تعديل ';
        $data['subview'] = 'admin/all_Finance_resource_views/settings/allFrSettings';
        $this->load->view('admin_index', $data);
    }


    public function DeleteSitting($id,$type){
        $this->Finance_resource_setting->delete_fr_settings($id);
        $this->message('success','حذف ');
        redirect('all_Finance_resource/settings/Finance_resource_settings/settings/'.$type,'refresh');
    }
    
    
    
     

  

}
