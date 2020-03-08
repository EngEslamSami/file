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
        $this->load->model('about/About');
        $this->load->model('about/News');
        $this->load->model('about/Main_data');
        $this->load->model('Difined_model');
        $this->load->helper(array('url', 'text', 'permission', 'form'));
          $this->load->model('human_resources_model/employee_setting/Employee_setting');
        $this->load->model('system_management/Groups');
      //  $this->load->model('administrative_affairs_models/employee_setting/Employee_setting');
        $this->main_groups = $this->Groups->main_fetch_group();
        $this->groups = $this->Groups->get_group($_SESSION["group_number"]);
        $this->groups_title = $this->Groups->get_group_title($_SESSION["group_number"]);
        
                 
                /**********************************************************/ 
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in  = $this->Counting->get_basic_in_num();
        $this->files_basic_in  = $this->Counting->get_files_basic_in();  
      /*************************************************************/
        $this->myarray = $this->Employee_setting->all_settings();
    }

 



    public function settings($type=0){    // human_resources/Employee_settings/settings

        $data['typee']= $type;
        $data['all']= $this->Employee_setting->get_all_data_emp_settings($this->myarray);
        $data['subview'] = 'admin/Human_resources/employee_setting/emlpoyees_settings/allEmployeesSittings';
        $this->load->view('admin_index', $data);
    }




    public function AddSitting($type){  // human_resources/human_resources_setting/Employee_settings/AddSitting

        if($this->input->post('add')){
            $this->Employee_setting->add_emp_settings($type);
            $this->message('success','إضافة '.$this->myarray[$type]);
            redirect('human_resources/human_resources_setting/Employee_settings/settings/'.$type ,'refresh');
        }

    }
    public function UpdateSitting($id,$type){
        $data['record'] = $this->Employee_setting->getById_emp_settings($id);
        $data['typee'] = $type ;

        $data["id"]=$id;
        $data["type_name"]=$this->myarray[$type];
        if($this->input->post('add')){
            $this->Employee_setting->update_emp_settings($id);
            $this->message('success',' تحديث البيانات');
            redirect('human_resources/human_resources_setting/Employee_settings/settings/'.$type,'refresh');
        }

        $data['title'] = 'تعديل ';
        $data['subview'] = 'admin/Human_resources/employee_setting/emlpoyees_settings/allEmployeesSittings';
        $this->load->view('admin_index', $data);
    }


    public function DeleteSitting($id,$type){
        $this->Employee_setting->delete_emp_settings($id);
        $this->message('success','حذف ');
        redirect('human_resources/human_resources_setting/Employee_settings/settings/'.$type,'refresh');
    }


}
