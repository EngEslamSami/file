<?php

class AccessRoles extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }
        $this->load->helper(array('url', 'text', 'permission', 'form'));

        $this->load->model('Public_relations/Gam3iaVisitor');

        $this->load->model('system_management/Groups');
        $this->main_groups = $this->Groups->main_fetch_group();
        $this->groups = $this->Groups->get_group($_SESSION["group_number"]);
        $this->groups_title = $this->Groups->get_group_title($_SESSION["group_number"]);

        /**********************************************************/
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in = $this->Counting->get_basic_in_num();
        $this->files_basic_in = $this->Counting->get_files_basic_in();
        /*************************************************************/
    }

    //-----------------------------------------
    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }

    public function EmployeeRoles()
    {   //  public_relations/gam3ia_visitor/AccessRoles/EmployeeRoles

        $data["all_employees"] = $this->Gam3iaVisitor->select_employee();
//        $this->test($data["all_employees"]);
//        $this->test($_SESSION);

        $data['title'] = '  صلاحيات الموظفين على الزائرين ';
        $data['metakeyword'] = 'صلاحيات الموظفين على الزائرين  ';
        $data['metadiscription'] = 'صلاحيات الموظفين على الزائرين  ';
        $data['subview'] = 'admin/public_relations/gam3ia_visitors/access_roles/add_employee_roles';
        $this->load->view('admin_index', $data);
    }

    //=================================================================================
    public function AddEmployeeRoles($emp_code)
    {  // public_relations/gam3ia_visitor/AccessRoles/AddEmployeeRoles/

        if ($this->input->post("operation") == "UPDATE") {
            $this->Gam3iaVisitor->update_permits_gam3ia_visitor($emp_code);
            redirect('public_relations/gam3ia_visitor/AccessRoles/EmployeeRoles', 'refresh');
        }
        if ($this->input->post("operation") == "INSERT") {
            $this->Gam3iaVisitor->insert_permits_gam3ia_visitor($emp_code);
            redirect('public_relations/gam3ia_visitor/AccessRoles/EmployeeRoles', 'refresh');
        }
    }


} // END CLASS
?>