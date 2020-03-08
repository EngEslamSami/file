<?php
class Family_categories extends MY_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->library('pagination');
        if($this->session->userdata('is_logged_in')==0){
            redirect('login');
        }
        $this->load->helper(array('url','text','permission','form'));

        $this->load->model('system_management/Groups');

        $this->load->model('familys_models/Family_category');
        
        $this->groups=$this->Groups->get_group($_SESSION["group_number"]);
        $this->groups_title=$this->Groups->get_group_title($_SESSION["group_number"]);
       /**********************************************************/ 
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in  = $this->Counting->get_basic_in_num();
        $this->files_basic_in  = $this->Counting->get_files_basic_in();  
      /*************************************************************/
    
    }


    //-----------------------------------------
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
    
    
    
    public function add_family_category()
    {
        if($this->input->post('add_family')){
    
             $this->Family_category->add_family_categories();
             $this->message('success','اضافة فئة ');
             redirect('family_controllers/Family_categories/add_family_category');

            
        }else{
            $data['all'] = $this->Family_category->select_Family_categories();
            $data['title'] = "اعدادات فئات الاسر";
            $data['subview'] = 'admin/familys_views/family_categories/add_family_category';
            $this->load->view('admin_index', $data);  
        }
        
    }
    
    
    public function edit_family_category($id){
     
        $data['title'] = 'تعديل اعدادات فئات الاسر';
        $data['family'] =  $this->Family_category->Family_categoryById($id);
        
      //  $data['subview'] = 'admin/family/family_categories/add_family_category';
        $data['subview'] = 'admin/familys_views/family_categories/add_family_category';
        $this->load->view('admin_index', $data);
    }
    
    public function update_family_category($id)
    {
     /*      echo '<pre>';
        print_r($_POST);
          echo '<pre>';
        die;*/
      $this->Family_category->update_family_category($id);
        $this->message('success','تحديث الفئة');
      redirect('family_controllers/Family_categories/add_family_category');
    }
    
    
   public function delete_family_category($id)
    {
      $this->Family_category->delete_family_category($id);
        $this->message('success',' حذف الفئة');
      redirect('family_controllers/Family_categories/add_family_category');
    }



    //-------------------------------------------------------------------
    //-------------------------------------------------------------------
    //-------------------------------------------------------------------

    public function report_familys_category(){ //family_controllers/Family_categories/report_familys_category

        $data['title'] = 'تقرير فئات الاسر المعتمدة';
        $data['reports'] =  $this->Family_category->report_familys_category();
        
        
        $data['all_cat'] =  $this->Family_category->select_Family_categories();

      //  $data['subview'] = 'admin/familys_views/family_categories/add_family_category';
        $data['subview'] = 'admin/familys_views/family_categories/report_familys_category';
        $this->load->view('admin_index', $data);
    }
    
    
   /*****************************/
   
       public function eslam(){ //family_controllers/Family_categories/eslam




     //   $data['subview'] = 'admin/family/family_categories/eslam';
      //  $this->load->view('admin_index', $data);
      
      
      $this->load->view('admin/familys_views/family_categories/eslam');
     
    }
    
       
       public function eslam_2(){ //family_controllers/Family_categories/eslam




     //   $data['subview'] = 'admin/family/family_categories/eslam';
      //  $this->load->view('admin_index', $data);
        $data['all_cat'] =  $this->Family_category->select_Family_categories();
      
      $this->load->view('admin/familys_views/family_categories/eslam_2',$data);
     
    }
    
    
}
        