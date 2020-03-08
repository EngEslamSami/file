<?php
class Contracts extends MY_Controller{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }

        $this->load->model('familys_models/for_dash/Counting');
        $this->load->model('system_management/Groups');
        $this->count_basic_in = $this->Counting->get_basic_in_num();
        $this->files_basic_in = $this->Counting->get_files_basic_in();
        $this->load->helper(array('url', 'text', 'permission', 'form'));
        $this->main_groups = $this->Groups->main_fetch_group();
        $this->groups = $this->Groups->get_group($_SESSION["group_number"]);
        $this->groups_title = $this->Groups->get_group_title($_SESSION["group_number"]);
        $this->load->model('aqr_model/contracts/Contracts_model');
        $this->load->model('Difined_model');
        $this->load->model('all_Finance_resource_models/all_pills/AllPills_model');
    }


    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }

    public function messages($type,$text,$method=false)
    {
        $CI =& get_instance();
        $CI->load->library("session");
        if($type =='success') {
            return $CI->session->set_flashdata('message','<script> swal({
                    title:"'.$text.'" ,
                    confirmButtonText: "تم"
                })</script>');
        }

        elseif($type=='warning'){
            return $CI->session->set_flashdata('message','<di v class="alert alert-warning alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>   !</strong> '.$text.'.</div>');
        }elseif($type=='error'){
            return $CI->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> !</strong> '.$text.'.</div>');
        }

    }
    public function add_contract(){ // aqr/contracts/Contracts/add_contract

      $data['rkm']= $this->Contracts_model->get_rkm();
       $data['aqrat'] = $this->Contracts_model->get_table('aqr_akarat');
       $data['mostager'] = $this->Contracts_model->get_table('aqr_mostager');
       $data['contracts'] = $this->Contracts_model->get_all();

        if ($this->input->post('add')){

            $this->Contracts_model->insert_contract();
            $this->messages('success', 'تم الاضافة بنجاح ' );
            redirect('aqr/contracts/Contracts/add_contract', 'refresh');
        }
        $data['title'] = "  العقود ";
        $data['subview'] = 'admin/aqr_view/contracts/contracts_view';
        $this->load->view('admin_index', $data);
    }
    public function update_contract($id){

        $data['rkm']= $this->Contracts_model->get_rkm();
        $data['aqrat'] = $this->Contracts_model->get_table('aqr_akarat');
        $data['mostager'] = $this->Contracts_model->get_table('aqr_mostager');
        $data['get_contract'] = $this->Contracts_model->getById($id);

        if ($this->input->post('add')){

            $this->Contracts_model->update_contract($id);
            $this->messages('success', 'تم التعديل بنجاح ' );
            redirect('aqr/contracts/Contracts/add_contract', 'refresh');
        }
        $data['title'] = "  العقود ";
        $data['subview'] = 'admin/aqr_view/contracts/contracts_view';
        $this->load->view('admin_index', $data);
    }
    public function delete_contract($contract_rkm){
        $this->Contracts_model->delete_contract($contract_rkm);
        $this->Contracts_model->delete_contract_details($contract_rkm);
        $this->messages('success', 'تم الحذف بنجاح ' );
        redirect('aqr/contracts/Contracts/add_contract', 'refresh');
    }
    public function load_details(){

        $row_id = $this->input->post('row_id');
        $data['get_all']=$this->Contracts_model->getById($row_id);
        $this->load->view('admin/aqr_view/contracts/load_details',$data);

    }
    public function print_contract(){

        $row_id = $this->input->post('row_id');
        $data['get_all']=$this->Contracts_model->getById($row_id);
        $this->load->view('admin/aqr_view/contracts/print_contract', $data);

    }
    public function print_all_contract(){

        $row_id = $this->input->post('row_id');
        $data['main_data'] = $this->Contracts_model->get_main_data();
        $data['get_all']=$this->Contracts_model->get_qst_data($row_id);
        $data['contract']=$this->Contracts_model->get_contract_setting();
        $this->load->view('admin/aqr_view/contracts/print_contract_view', $data);

    }

    public function load_qst_details(){

         $row_id = $this->input->post('row_id');
         $data['get_all']=$this->Contracts_model->get_qst_data($row_id);
         $this->load->view('admin/aqr_view/contracts/load_qst_details',$data);

    }
    public function add_qst(){

         $c_rkm = $this->input->post('contract_rkm');
         $q_rkm = $this->input->post('qst_rkm');
         $this->Contracts_model->update_qst($c_rkm,$q_rkm);
         $this->Contracts_model->update_contract_paid($c_rkm);

    }
    public function add_aqr_Pills($rkm){
        $data['get_all']= $this->Contracts_model->get_qst_data($rkm);
        $data['projects'] = $this->AllPills_model->get_projects();

        if($this->input->post('save') !=''){

            $all_img= $this->upload_muli_image("file","images/fr/all_pills");

            if(!empty($all_img)){
                $all_img =$all_img;
            }else{
                $all_img='';
            }

            $id = $this->uri->segment(5);

            $last_id_print = $this->AllPills_model->insert($id,$all_img);
            $this->message('success','إضافة  بيانات الإيصال');

            $IIID =$this->input->post('pill_num');


            if($this->input->post('save') === 'save') {
                redirect('all_Finance_resource/all_pills/AllPills/addPills', 'refresh');
            }elseif ($this->input->post('save') === 'print_pill'){
                redirect('all_Finance_resource/all_pills/AllPills/Print_Pill2/'.$IIID, 'refresh');
            }elseif ($this->input->post('save') ==='print_kafel'){
                redirect('all_Finance_resource/all_pills/AllPills/Print_Pill2/'.$IIID.'?type=kafel', 'refresh');
            }

        }else{


            $data['bank_brach'] = $this->AllPills_model->GetFromFr_settings(16);

            $data['username'] = $this->AllPills_model->getUserName($_SESSION['user_id']);
            $data['all_banks'] = $this->AllPills_model->select_all_by_condition(array("society_main_banks_account.type"=>2),"society_main_banks_account.bank_id_fk");
            $data['markz'] = $this->Difined_model->select_search_key('employees_settings', 'type', 17);
            $data['banks'] = $this->Difined_model->select_all('banks_settings','','',"id","asc");
            $data['gathering_place'] =  $this->AllPills_model->GetFromFr_settings(14);
            $data['fe2a_types'] = $this->Difined_model->select_all('fr_sponser_donors_setting','','',"","");
            $data['society_main_banks_account_arr'] = $this->Difined_model->select_search_key('society_main_banks_account', 'type', 1);
            $data['all_society_main_banks_account'] = $this->Difined_model->select_search_key('society_main_banks_account', 'type', 2);
            $data['titles'] = $this->AllPills_model->GetFromFr_settings(8);
            $data['people_arr'] = $this->AllPills_model->select_all_by_fr_all_pills(array('person_type'=>0));
            $data['last_id'] = $this->AllPills_model->select_last_id();
            $data['greetings'] = $this->AllPills_model->GetFromFr_settings(9);
            //   $data['devices_points'] = $this->Difined_model->select_all('fr_devices_points','','',"","");

            $data['devices_points'] =$this->AllPills_model->select_all_devices_points();
            $data['esal_type'] = $this->AllPills_model->select_fr_bnod_pills_setting_by_condition(array('esal'=>0));


            if($_SESSION['role_id_fk']== 3){
                $data['gathering_emp_id'] = $this->AllPills_model->slect_where('fr_gathering_place',array('emp_id_fk'=>$_SESSION['emp_code']))['gathering_place_id_fk'];
                $data['raqm_deveice_emp'] = $this->AllPills_model->slect_where('fr_devices_points_emp',array('emp_id'=>$_SESSION['emp_code']));

                if(!empty($data['raqm_deveice_emp']['device_id_fk'])){

                    $data['shabka_banks_data'] =$this->AllPills_model->select_all_by_DeviceData(
                        array('fr_devices_points.device_id_fk'=>$data['raqm_deveice_emp']['device_id_fk']),'bank_id_fk')[0];

                }

            }
            $data['bank_account_code_shabka_arr'] =$this->AllPills_model->select_all_by_condition(
                array('type'=>2,'society_main_banks_account.bank_id_fk'=>19,
                    'society_main_banks_account.account_id_fk'=>2),'');
            //   bank_account_code_shabka_arr bank_account_code
            $data['title'] = 'إضافة إيصال إستلام ';
            $data['subview'] = 'admin/aqr_view/contracts/addPills_data';
            $this->load->view('admin_index', $data);
        }
    }


}