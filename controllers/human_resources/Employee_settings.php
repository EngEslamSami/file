<?php
class Employee_settings extends MY_Controller
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
        $this->load->model('human_resources_model/employee_setting/Employee_setting');
        $this->myarray = $this->Employee_setting->all_settings();
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




    public function settings($type=0){    // human_resources/Employee_settings/settings

        $data['typee']= $type;
        $data['all']= $this->Employee_setting->get_all_data_emp_settings($this->myarray);
        $data['areas']= $this->Employee_setting->select_areas();
       $data['residentials']= $this->Employee_setting->select_residentials();
        //osama 9-9
        $this->load->model('Public_settings_models/Model_deduction');
        $this->load->model('Public_settings_models/Model_allowances');
        $this->load->model('Public_settings_models/Model_job_role');
        $this->load->model('administrative_affairs_models/Department_jobs');
        $data['allowances']=$this->Model_allowances->select_all();
        $data['deductions']=$this->Model_deduction->select_all();
        $data['jobRoles']=$this->Model_job_role->select_all();
        $data['mainDepartments'] = $this->Department_jobs->select_all();
   
        $data['subDepartments'] = $this->Department_jobs->select_main();
     
        //osama 9-9
     
      $data['categories'] = $this->Employee_setting->select_allCategories();
        
        $data['subview'] = 'admin/Human_resources/employee_setting/emlpoyees_settings/allEmployeesSittings';
        $this->load->view('admin_index', $data);
    }




    public function AddSitting($type){  // human_resources/Employee_settings/AddSitting

        if($this->input->post('add')){
            $this->Employee_setting->add_emp_settings($type);
            $this->message('success','إضافة '.$this->myarray[$type]['title']);
            redirect('human_resources/Employee_settings/settings/'.$type ,'refresh');
        }

    }
    public function UpdateSitting($id,$type){
        $data['record'] = $this->Employee_setting->getById_emp_settings($id);
        $data['typee'] = $type ;
        $data['disabled'] = 'disabled' ;
        $data["id"]=$id;
        $data["type_name"]=$this->myarray[$type];
        if($this->input->post('add')){
            $this->Employee_setting->update_emp_settings($id);
            $this->message('success',' تحديث البيانات');
            redirect('human_resources/Employee_settings/settings/'.$type,'refresh');
        }

        $data['title'] = 'تعديل ';
        $data['subview'] = 'admin/Human_resources/employee_setting/emlpoyees_settings/allEmployeesSittings';
        $this->load->view('admin_index', $data);
    }


    public function DeleteSitting($id,$type){
        $this->Employee_setting->delete_emp_settings($id);
        $this->message('success','حذف ');
        redirect('human_resources/Employee_settings/settings/'.$type,'refresh');
    }
    
    
    
        public function AddSittingAreas($type){  // human_resources/Employee_settings/AddSittingLevels


        if($this->input->post('add_area')){
            $this->Employee_setting->add_area($type);
            $this->message('success','إضافة ');
            redirect('human_resources/Employee_settings/settings/'.$type,'refresh');
        }

    }

    public function UpdateSittingAreas($id,$type){
        $data['areas']= $this->Employee_setting->select_areas();
        //$data['classes']= $this->Employee_setting->select_classes();
        $data['area'] = $this->Employee_setting->getAreas($id);
        $data['typee'] = $type ;
        $data["id"]=$id;
        $data['disabled'] = 'disabled' ;
        $data["type_name"]='';
        if($this->input->post('add_area')){
            $this->Employee_setting->update_area($id,$type);
            $this->message('success',' تحديث البيانات');
            redirect('human_resources/Employee_settings/settings/'.$type,'refresh');
        }
        // $data['title'] = 'تعديل ';
        $data['title'] = "التعريفات ";
        $data['subview'] = 'admin/Human_resources/employee_setting/emlpoyees_settings/allEmployeesSittings';
        $this->load->view('admin_index', $data);
    }



    public function DeleteSittingAreas($type,$id){
        $this->Employee_setting->deleteAreas($id);
        $this->message('success','حذف ');
        redirect('human_resources/Employee_settings/settings/'.$type ,'refresh');
    }


    //Osama 9-9

    /********************************/
    public function AddSittingAllowances($type){  // human_resources/Employee_settings/AddSittingLevels
        $this->load->model('Public_settings_models/Model_allowances');
        if ($this->input->post('add_allowances')) {
            $this->Model_allowances->insert();
            $this->message('success', 'تم الاضافة بنجاح');
            redirect('human_resources/Employee_settings/settings/'.$type ,'refresh');
        }
    }

    public function UpdateSittingAllowances($id,$type){
        $this->load->model('Public_settings_models/Model_allowances');
        $data['allowance']=$this->Model_allowances->getById($id);
        $data['typee'] = $type ;
        $data['disabled'] = 'disabled' ;
        $data["id"]=$id;
        $data["type_name"]='';
        if($this->input->post('add_allowances')){
            $this->Model_allowances->update($id);
            $this->message('success',' تحديث البيانات');
            redirect('human_resources/Employee_settings/settings/'.$type,'refresh');
        }
        $data['title'] = "التعريفات ";
        $data['subview'] = 'admin/Human_resources/employee_setting/emlpoyees_settings/allEmployeesSittings';
        $this->load->view('admin_index', $data);

    }



    public function DeleteSittingAllowances($type,$id){
        $this->load->model('Public_settings_models/Model_allowances');
        $this->Model_allowances->delete(array("id"=>$id));
        $this->message('success','حذف ');
        redirect('human_resources/Employee_settings/settings/'.$type ,'refresh');
    }



    public function AddDeductionSitting($type){  // human_resources/Employee_settings/AddSittingLevels
        $this->load->model('Public_settings_models/Model_deduction');
        if ($this->input->post('add_deduction')) {
            $this->Model_deduction->insert();
            $this->message('success', 'تم الاضافة بنجاح');
            redirect('human_resources/Employee_settings/settings/'.$type ,'refresh');
        }
    }

    public function UpdateDeductionSitting($id,$type){
        $this->load->model('Public_settings_models/Model_deduction');
        $data['deduction']=$this->Model_deduction->getById($id);
        $data['typee'] = $type ;
        $data['disabled'] = 'disabled' ;
        $data["id"]=$id;
        $data["type_name"]='';

        if ($this->input->post('add_deduction')) {
            $this->Model_deduction->update($id);
            $this->message('success', 'تم الاضافة بنجاح');
            redirect('human_resources/Employee_settings/settings/'.$type ,'refresh');
        }

        $data['title'] = "التعريفات ";
        $data['subview'] = 'admin/Human_resources/employee_setting/emlpoyees_settings/allEmployeesSittings';
        $this->load->view('admin_index', $data);

    }



    public function DeleteDeductionSitting($type,$id){
        $this->load->model('Public_settings_models/Model_deduction');
        $this->Model_deduction->delete(array("id"=>$id));
        $this->message('success','حذف ');
        redirect('human_resources/Employee_settings/settings/'.$type ,'refresh');
    }



    public function AddJobRoleSitting($type){  // human_resources/Employee_settings/AddSittingLevels
        $this->load->model('Public_settings_models/Model_job_role');
        if ($this->input->post('add_jobRole')) {
            $this->Model_job_role->insert();
            $this->message('success', 'تم الاضافة بنجاح');
            redirect('human_resources/Employee_settings/settings/'.$type ,'refresh');
        }
    }

    public function UpdateJobRoleSitting($id,$type){
        $this->load->model('Public_settings_models/Model_job_role');
        $data['jobRole']=$this->Model_job_role->getById($id);
        $data['typee'] = $type ;
        $data['disabled'] = 'disabled' ;
        $data["id"]=$id;
        $data["type_name"]='';

        if ($this->input->post('add_jobRole')) {
            $this->Model_job_role->update($id);
            $this->message('success', 'تم الاضافة بنجاح');
            redirect('human_resources/Employee_settings/settings/'.$type ,'refresh');
        }

        $data['title'] = "التعريفات ";
        $data['subview'] = 'admin/Human_resources/employee_setting/emlpoyees_settings/allEmployeesSittings';
        $this->load->view('admin_index', $data);

    }



    public function DeleteJobRoleSitting($type,$id){
        $this->load->model('Public_settings_models/Model_job_role');
        $this->Model_job_role->delete(array("defined_id"=>$id));
        $this->message('success','حذف ');
        redirect('human_resources/Employee_settings/settings/'.$type ,'refresh');
    }






    public function AddMainDepartmentSitting($type){
        $this->load->model('administrative_affairs_models/Department_jobs');
        if ($this->input->post('add_main_department')) {
            $this->Department_jobs->insert();
            $this->message('success', 'تم الاضافة بنجاح');
            redirect('human_resources/Employee_settings/settings/'.$type ,'refresh');
        }
    }

    public function UpdateMainDepartmentSitting($id,$type){
        $this->load->model('administrative_affairs_models/Department_jobs');
        $data['mainDepartment']=$this->Department_jobs->getById($id);
        $data['typee'] = $type ;
        $data['disabled'] = 'disabled' ;
        $data["id"]=$id;
        $data["type_name"]='';

        if ($this->input->post('add_main_department')) {
            $this->Department_jobs->update($id);
            $this->message('success', 'تم الاضافة بنجاح');
            redirect('human_resources/Employee_settings/settings/'.$type ,'refresh');
        }

        $data['title'] = "التعريفات ";
        $data['subview'] = 'admin/Human_resources/employee_setting/emlpoyees_settings/allEmployeesSittings';
        $this->load->view('admin_index', $data);

    }



    public function DeleteMainDepartmenSitting($type,$id){
        $this->load->model('administrative_affairs_models/Difined_model');
        $Conditions_arr=array("id"=>$id);
        $this->Difined_model->delete("department_jobs",$Conditions_arr);
        $this->message('success','حذف ');
        redirect('human_resources/Employee_settings/settings/'.$type ,'refresh');
    }





    public function AddSubDepartmentSitting($type){
        $this->load->model('administrative_affairs_models/Department_jobs');
        if ($this->input->post('add_main_department')) {
            $this->Department_jobs->insert_sub();
            $this->message('success', 'تم الاضافة بنجاح');
            redirect('human_resources/Employee_settings/settings/'.$type ,'refresh');
        }
    }

    public function UpdateSubDepartmentSitting($id,$type){
        $this->load->model('administrative_affairs_models/Department_jobs');
        $data['subDepartment']=$this->Department_jobs->getById($id);
        $data['typee'] = $type ;
        $data['disabled'] = 'disabled' ;
        $data["id"]=$id;
        $data["type_name"]='';

        if ($this->input->post('add_main_department')) {
            $this->Department_jobs->update_sub($id);
            $this->message('success', 'تم الاضافة بنجاح');
            redirect('human_resources/Employee_settings/settings/'.$type ,'refresh');
        }
        $data['mainDepartments'] = $this->Department_jobs->select_all();
        $data['title'] = "التعريفات ";
        $data['subview'] = 'admin/Human_resources/employee_setting/emlpoyees_settings/allEmployeesSittings';
        $this->load->view('admin_index', $data);

    }

/*********************************************************************************/

 public function AddCategoriesSitting($type){

        if ($this->input->post('add_category')) {
            $this->Employee_setting->insertCategories();
            $this->message('success', 'تم الاضافة بنجاح');
            redirect('human_resources/Employee_settings/settings/'.$type ,'refresh');
        }
    }

    public function UpdateCategoriesSitting($id,$type){

        $data['category']=$this->Employee_setting->getByIdCategories($id);
        $data['typee'] = $type ;
        $data['disabled'] = 'disabled' ;
        $data["id"]=$id;
        $data["type_name"]='';

        if ($this->input->post('add_category')) {
            $this->Employee_setting->updateCategories($id);
            $this->message('success', 'تم الاضافة بنجاح');
            redirect('human_resources/Employee_settings/settings/'.$type ,'refresh');
        }

        $data['title'] = "التعريفات ";
        $data['subview'] = 'admin/Human_resources/employee_setting/emlpoyees_settings/allEmployeesSittings';
        $this->load->view('admin_index', $data);

    }

    public function DeleteCategoriesSitting($type,$id){
        $this->load->model('administrative_affairs_models/Difined_model');
        $Conditions_arr=array("id"=>$id);
        $this->Difined_model->delete("hr_main_cat",$Conditions_arr);
        $this->message('success','حذف ');
        redirect('human_resources/Employee_settings/settings/'.$type ,'refresh');
    }
/*********************************************************************************/

   public function DeleteSubDepartmentSitting($type,$id){
        $this->load->model('administrative_affairs_models/Difined_model');
        $Conditions_arr=array("id"=>$id);
        $this->Difined_model->delete("department_jobs",$Conditions_arr);
        $this->message('success','حذف ');
        redirect('human_resources/Employee_settings/settings/'.$type ,'refresh');
    }



}
