<?php
class Radwa_empolyee_settings extends MY_Controller
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
        $this->load->model('human_resources_model/Always_model');
     $this->load->model('human_resources_model/radwa_setting/Radwa_settings');
     //   $this->myarray = $this->Employee_setting->all_settings();
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




    public function settings($type=0){    // human_resources/radwa_settings/Radwa_empolyee_settings/settings

      $data['typee']= $type;

    $data['mainDepartments'] = $this->Radwa_settings->select_all();
   
       $data['subDepartments'] = $this->Radwa_settings->select_main();
     $data['jobRoles'] = $this->Radwa_settings->select_all_job_role();  
  
        
        $data['subview'] = 'admin/Human_resources/radwa_employee_setting/allEmployeesSittings';
        $this->load->view('admin_index', $data);
    }


   





//yaraaa
    public function AddMainDepartmentSitting($type){
     //   $this->load->model('administrative_affairs_models/Radwa_settings');
        if ($this->input->post('add_main_department')) {
            $this->Radwa_settings->insert();
            $this->message('success', 'تم الاضافة بنجاح');
            redirect('human_resources/radwa_settings/Radwa_empolyee_settings/settings/'.$type ,'refresh');
        }
    }

    public function UpdateMainDepartmentSitting($id,$type){
      
        $data['mainDepartment']=$this->Radwa_settings->getById($id);
        $data['typee'] = $type ;
        $data['disabled'] = 'disabled' ;
        $data["id"]=$id;
        $data["type_name"]='';

        if ($this->input->post('add_main_department')) {
            $this->Radwa_settings->update($id);
            $this->message('success', 'تم الاضافة بنجاح');
            redirect('human_resources/radwa_settings/Radwa_empolyee_settings/settings/'.$type ,'refresh');
        }

        $data['title'] = "التعريفات ";
       
        $data['subview'] = 'admin/Human_resources/radwa_employee_setting/allEmployeesSittings';
        $this->load->view('admin_index', $data);

    }



    public function DeleteMainDepartmenSitting($type,$id){
        $this->load->model('administrative_affairs_models/Difined_model');
        $Conditions_arr=array("id"=>$id);
        $this->Difined_model->delete("hr_radwa_department_jobs",$Conditions_arr);
        $this->message('success','حذف ');
        redirect('human_resources/radwa_settings/Radwa_empolyee_settings/settings/'.$type ,'refresh');
    }





    public function AddSubDepartmentSitting($type){
   
        if ($this->input->post('add_main_department')) {
            $this->Radwa_settings->insert_sub();
            $this->message('success', 'تم الاضافة بنجاح');
            redirect('human_resources/radwa_settings/Radwa_empolyee_settings/settings/'.$type ,'refresh');
        }
    }

    public function UpdateSubDepartmentSitting($id,$type){
  
        $data['subDepartment']=$this->Radwa_settings->getById($id);
        $data['typee'] = $type ;
        $data['disabled'] = 'disabled' ;
        $data["id"]=$id;
        $data["type_name"]='';

        if ($this->input->post('add_main_department')) {
            $this->Radwa_settings->update_sub($id);
            $this->message('success', 'تم الاضافة بنجاح');
            redirect('human_resources/radwa_settings/Radwa_empolyee_settings/settings/'.$type ,'refresh');
        }
        $data['mainDepartments'] = $this->Radwa_settings->select_all();
        $data['title'] = "التعريفات ";
       // $data['subview'] = 'admin/Human_resources/employee_setting/emlpoyees_settings/allEmployeesSittings';
        $data['subview'] = 'admin/Human_resources/radwa_employee_setting/allEmployeesSittings';
        $this->load->view('admin_index', $data);

    }

/*********************************************************************************/


   

    
/*********************************************************************************/

   public function DeleteSubDepartmentSitting($type,$id){
        $this->load->model('administrative_affairs_models/Difined_model');
        $Conditions_arr=array("id"=>$id);
        $this->Difined_model->delete("hr_radwa_department_jobs",$Conditions_arr);
        $this->message('success','حذف ');
        redirect('human_resources/radwa_settings/Radwa_empolyee_settings/settings/'.$type ,'refresh');
    }



 public function AddJobRoleSitting($type){  // 
     
        if ($this->input->post('add_jobRole')) {
            $this->Radwa_settings->insert_job_role();
            $this->message('success', 'تم الاضافة بنجاح');
            redirect('human_resources/radwa_settings/Radwa_empolyee_settings/settings/'.$type ,'refresh');
        }
    }
    public function UpdateJobRoleSitting($id,$type){
    
        $data['jobRole']=$this->Radwa_settings->getByIdjob_role($id);
        $data['typee'] = $type ;
        $data['disabled'] = 'disabled' ;
        $data["id"]=$id;
        $data["type_name"]='';

        if ($this->input->post('add_jobRole')) {
            $this->Radwa_settings->update_job_role($id);
            $this->message('success', 'تم الاضافة بنجاح');
            redirect('human_resources/radwa_settings/Radwa_empolyee_settings/settings/'.$type ,'refresh');
        }

        $data['title'] = "التعريفات ";
        $data['subview'] = 'admin/Human_resources/radwa_employee_setting/radwa_emlpoyees_settings/allEmployeesSittings';
        $this->load->view('admin_index', $data);

    }
    public function DeleteJobRoleSitting($type,$id){
      
        $this->Radwa_settings->delete(array("id"=>$id));
        $this->message('success','حذف ');
        redirect('human_resources/radwa_settings/Radwa_empolyee_settings/settings/'.$type ,'refresh');
    }

/**************************************************************/




}
