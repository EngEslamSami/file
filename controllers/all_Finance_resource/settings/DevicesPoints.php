<?php

class DevicesPoints extends MY_Controller
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

        $this->load->model('all_Finance_resource_models/settings/DevicesPoint');
        //$this->myarray = $this->Finance_resource_setting->all_settings();
        
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

            return $this->session->set_flashdata('message', '<div class="hidden-print alert alert-success alert-dismissible shadow" data-sr="wait 0s, then enter bottom and hustle 100%"><button type="button" class="close pull-left" data-dismiss="alert">×</button><h4 class="text-lg"><i class="fa fa-check icn-xs"></i> تم بنجاح ...</h4><p>' . $text . '!</p></div>');

        } elseif ($type == 'wiring') {

            return $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible" data-sr="wait 0.6s, then enter bottom and hustle 100%"><button type="button" class="close pull-left" data-dismiss="alert">×</button><h4 class="text-lg"><i class="fa fa-exclamation-triangle icn-xs"></i> تحذير هام ...</h4><p>' . $text . '</p></div>');

        } elseif ($type == 'error') {

            return $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" data-sr="wait 0.3s, then enter bottom and hustle 100%"><button type="button" class="close pull-left" data-dismiss="alert">×</button><h4 class="text-lg"><i class="fa fa-exclamation-circle icn-xs"></i> خطآ ...</h4><p>' . $text . '</p></div>');

        }

    }

    
    public function addDevicesPoints($type ='devices'){ //  all_Finance_resource/settings/DevicesPoints/addDevicesPoints
    $data['typee'] = $type ;
        if($this->input->post('add')){

            $this->DevicesPoint->insert_maindata();
            $this->message('success','اضافة');
            redirect('all_Finance_resource/settings/DevicesPoints/addDevicesPoints/'.$type,'refresh');
        }else  if($this->input->post('add_emp')){

            $this->DevicesPoint->insert_empdata();
            $this->message('success','اضافة');
            redirect('all_Finance_resource/settings/DevicesPoints/addDevicesPoints'.$type,'refresh');
        }
        $data['allData'] = $this->DevicesPoint->getbanks();
        $data['allDataEmps'] = $this->DevicesPoint->all_data_emps();
//       $this->test( $data['allDataEmps']);
        // update
        $data['devices'] = $this->DevicesPoint->all_data_devices();
        $data['adminstations'] = $this->Difined_model->select_search_key('department_jobs','from_id_fk',0);

        //=================================================

        $data['dataDevicse'] = $this->DevicesPoint->data_up();
        $data['dataEmps'] = $this->DevicesPoint->all_data();
        $data['hesabt'] = $this->DevicesPoint->hesabt();
//               $this->test( $data['hesabt']);
        $data['banks'] =$this->DevicesPoint->fetch_banks();
        //=================================================

        $data['title'] = 'إعدادات اجهزة نقاط البيع';
        $data['subview'] = 'admin/all_Finance_resource_views/settings/devices_points/add_devices_points';
        $this->load->view('admin_index', $data);
    }


    public function add_device_record() { //  all_Finance_resource/settings/DevicesPoints/add_device_record
        $data['devices'] = $this->Difined_model->select_search_key('fr_settings','type',13);
        $data['banks'] =$this->DevicesPoint->fetch_banks();
//        $this->test($data['banks']);
        $this->load->view('admin/all_Finance_resource_views/settings/devices_points/add_device_row',$data);
    }

    
    
    public function add_bank_accounts() {   //  all_Finance_resource/settings/DevicesPoints/add_bank_accounts
        $bank_id=$this->input->post('bank_id');
        $device_id=$this->input->post('device_id');
        $data['accounts'] =$this->DevicesPoint->fetch_bank_accounts($bank_id,$device_id);
        $this->load->view('admin/all_Finance_resource_views/settings/devices_points/get_bank_accounts',$data);
    }

    public function get_accounts_nums() {   //  all_Finance_resource/settings/DevicesPoints/get_accounts_nums
        $bank_id=$this->input->post('bank_id');
        $device_id=$this->input->post('device_id');
        $account_id=$this->input->post('account_id');
        $data['accounts'] =$this->DevicesPoint->get_accounts_nums($bank_id,$device_id,$account_id);
        $this->load->view('admin/all_Finance_resource_views/settings/devices_points/get_accounts_nums',$data);
    }

    public function deleteDevicesPoints($id,$type)
    {
        $this->DevicesPoint->deleteDevicesPoints($id,'fr_devices_points');
        $this->message('success','اضافة');
        redirect('all_Finance_resource/settings/DevicesPoints/addDevicesPoints'.$type,'refresh');
    }



//==================================================================

    public function checkUniqueNum() {   //  all_Finance_resource/settings/DevicesPoints/add_bank_accounts
        $valuee=$this->input->post('valuee');
        $result =$this->DevicesPoint->checkUniqueNum($valuee);
       echo $result;
    }


 //===============================================================================================





    public function add_emp_record() { //  all_Finance_resource/settings/DevicesPoints/add_emp_record
        $data['adminstations'] = $this->Difined_model->select_search_key('department_jobs','from_id_fk',0);
        $data['devices'] = $this->DevicesPoint->all_data_devices();
        
        $this->load->view('admin/all_Finance_resource_views/settings/devices_points/add_emp_row',$data);
    }


    public function GetDepart() //  all_Finance_resource/settings/DevicesPoints/GetDepart
    {
        if ($this->input->post("id_depart")) {
            $admin_id = $this->input->post("id_depart");
            $this->load->model('Difined_model');
            $data_load["admin_id"] = $admin_id;
            $data_load["departments"] = $this->Difined_model->select_search_key("department_jobs", "from_id_fk", $admin_id);
            $this->load->view('admin/all_Finance_resource_views/settings/devices_points/get_department', $data_load);
        }elseif ($this->input->post("id_qsm")) {
            $this->load->model('Difined_model');
            $depart_id = $this->input->post("id_qsm");
            $Conditions_arr = array("employees.department" => $depart_id);
            $data_load["employees"] = $this->Difined_model->slect_where('employees',$Conditions_arr,'','','id','asc');
            $this->load->view('admin/all_Finance_resource_views/settings/devices_points/get_employees', $data_load);
        }

    }

    public function deleteEmpDevicesPoints($id,$type)
    {
        $this->DevicesPoint->deleteDevicesPoints($id,'fr_devices_points_emp');
        $this->message('success','اضافة');
        redirect('all_Finance_resource/settings/DevicesPoints/addDevicesPoints/'.$type,'refresh');
    }



    //============================================================================================


    public function updateEmpDevicesPoints($id,$type){  // all_Finance_resource/settings/DevicesPoints/updateEmpDevicesPoints

        if($this->input->post('add_new')){
            $this->DevicesPoint->update_empdata($id);
            $this->message('success',' تحديث البيانات');
            redirect('all_Finance_resource/settings/DevicesPoints/addDevicesPoints/'.$type,'refresh');
        }

    }



    public function updataDevicesPoints($id,$type)
    {

        $this->DevicesPoint->updataDevicesPoints($id,'fr_devices_points');
        $this->message('success','تعديل');
        redirect('all_Finance_resource/settings/DevicesPoints/addDevicesPoints/'.$type,'refresh');
    }





}