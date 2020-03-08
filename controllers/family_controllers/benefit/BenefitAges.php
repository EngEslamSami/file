<?php
class BenefitAges extends MY_Controller
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

        $this->load->model('familys_models/benefit/BenefitAge');

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

    public function add_benefit() //family_controllers/benefit/BenefitAges/add_benefit
    {
        $data['allData'] = $this->BenefitAge->get_tasnefat();
        $data['categories']=$this->BenefitAge->get_categories();

        if($this->input->post('add')) {
           //$this->test($_POST);
            $this->BenefitAge->delete_benefit();
            $this->BenefitAge->insert_benefit();
            messages('success','اضافة وتحديث البيانات');

            redirect('family_controllers/benefit/BenefitAges/add_benefit','refresh');
        }
        $data['title'] = ' اعمار المستفيدين';
        $data['subview'] = 'admin/familys_views/benefit/benefit_ages';
        $this->load->view('admin_index', $data);
    }



    public function update_benefit($id)
    {
        $this->BenefitAge->update_benefit($id);
        redirect('family_controllers/benefit/BenefitAges/add_benefit','refresh');
    }
    

    public function add_record() { // family_controllers/benefit/BenefitAges/add_record
        $ids=$this->input->post('valu');
        $data['len']=$this->input->post('len');
        $data['categories']=$this->BenefitAge->get_categories();
        $data['yatem']=$this->BenefitAge->getByType(1);
        $data['mostfed']=$this->BenefitAge->getByType(2);
        $data['armal']=$this->BenefitAge->getByType(1);
        $this->load->view('admin/familys_views/benefit/add_row',$data);
    }
    
    
    
    public function check_type_select() { 
        $type=$this->input->post('value');
        $data['male']=$this->BenefitAge->getByTypeGender($type,1);
        $data['female']=$this->BenefitAge->getByTypeGender($type,2);
        
        $this->load->view('admin/familys_views/benefit/get_gender',$data);
    }


    public function delete_benefit($id) { //family_controllers/benefit/BenefitAges/delete_benefit
        $this->BenefitAge->delete_benefitById($id);
        messages('success','حذف');

        redirect('family_controllers/benefit/BenefitAges/add_benefit','refresh');
    }


    public function deleteAllBenefit() { //family_controllers/benefit/BenefitAges/deleteAllBenefit
        $this->BenefitAge->delete_benefit();
        messages('success','حذف');

        redirect('family_controllers/benefit/BenefitAges/add_benefit','refresh');
    }


}