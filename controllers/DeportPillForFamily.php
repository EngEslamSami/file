<?php
class DeportPillForFamily extends MY_Controller  {
    public   function __construct(){

        parent::__construct();
        $this->load->library('pagination');
        $this->CI = & get_instance();
        if($this->session->userdata('is_logged_in')==0){
            redirect('login');
        }
        $this->load->helper(array('url','text','permission','form','download'));
        $this->load->library('zip');
        $this->load->model('system_management/Groups');
        $this->load->model('Difined_model');
        
        $this->groups=$this->Groups->get_group($_SESSION["group_number"]);
        $this->groups_title=$this->Groups->get_group_title($_SESSION["group_number"]);
        /**********************************************************/
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in  = $this->Counting->get_basic_in_num();
        $this->files_basic_in  = $this->Counting->get_files_basic_in();
        /*************************************************************/
    }
    private  function test($data=array()){
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }
    private  function message($type,$text){
        if($type =='success') {
            return $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible masegae_delete" id="" role="alert">
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            <span aria-hidden="true">×</span></button>
                                                            <strong>'.$text.' !</strong>  ...</div>');
        }elseif($type=='wiring'){
            return $this->session->set_flashdata('message','<div class="alert alert-warning alert-dismissible masegae_delete" id="" role="alert">
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            <span aria-hidden="true">×</span></button>
                                                            <strong>'.$text.' !</strong>  ...</div>');
        }elseif($type=='error'){
            return  $this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible masegae_delete" id="" role="alert">
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            <span aria-hidden="true">×</span></button>
                                                            <strong>'.$text.' !</strong>  ...</div>');
        }
    }
    /**
     * ===============================================================================================================
     *
     * ========================             ALL FUNCTIONS            =================================================
     *
     * ===============================================================================================================
     */      // DeportSchoolSarf
     public function index(){

     }
     public function DeportTodayDonations(){ // DeportPillForFamily/DeportTodayDonations
         $this->load->model('Model_deport_family');
         if($this->input->post("ADD") == 1 ) {
             $total = 0;
             if (($this->input->post("pill")) && sizeof($this->input->post("pill")) > 0) {
                 foreach ($this->input->post("pill") as $key => $value) {
                     $add = explode("-", $value);
                     $total += $add[1];
                     $arr_id[]=$add[0];
                 }
                 $data_load["pill_id"] =$arr_id;
             }
             $data_load["paid_type"] =$this->input->post("paid_type");
             $data_load["qued_num"] = (1+ $this->Model_deport_family->select_last_value_fild(4));
             $data_load["total_value"] = $total;
          //  $this->test($_POST);
             $this->load->view('admin/deport_pill_family/today_donations/load_total', $data_load);
         }elseif($this->input->post('dayen_num') && $this->input->post('madeen_num')  ){
             $this->load->model('finance_accounting_model/Add_level');
             $load_data['qued_value']=$this->input->post('value');
             $load_data['all_accounts']=$this->Model_deport_family->select_all();
             $load_data['disabls'] = $this->Model_deport_family->select_all2();
             $load_data['dayen_num']=$this->input->post('dayen_num');
             $load_data['madeen_num']=$this->input->post('madeen_num');
             $load_data['total_row']=$load_data['madeen_num']+$load_data['dayen_num'];
             $this->load->view('admin/deport_pill_family/today_donations/load',$load_data);
         }else{
             $data["pay_1"]=$this->Model_deport_family->get_today_donations(array("deport"=>0,"paid_type"=>1));
             $data["pay_2"]=$this->Model_deport_family->get_today_donations(array("deport"=>0,"paid_type"=>2));
             $data["pay_3"]=$this->Model_deport_family->get_today_donations(array("deport"=>0,"paid_type"=>3));
             $data["pay_4"]=$this->Model_deport_family->get_today_donations(array("deport"=>0,"paid_type"=>4));
             $data["pay_5"]=$this->Model_deport_family->get_today_donations(array("deport"=>0,"paid_type"=>5));
             $data["pay_5"]=$this->Model_deport_family->get_today_donations(array("deport"=>0,"paid_type"=>6));
             $data['title'] = 'ترحيل التبرعات الاضافية ';
             $data['metakeyword'] = 'ترحيل التبرعات الاضافية ';
             $data['metadiscription'] = 'ترحيل التبرعات الاضافية ';
             $data['subview'] = 'admin/deport_pill_family/today_donations/deport_today_donations';
             $this->load->view('admin_index', $data);
         }

     }
     //=================================================
     public function DeportQuedTodayDonations(){   //
        if($this->input->post('DEPORT') =="DEPORT" ){
            $this->load->model('Model_deport_family');
            $this->Model_deport_family->deport_today_onations();
            if(($this->input->post("pill_ids"))){
                $this->Model_deport_family->update_deport_today_onations($this->input->post("pill_ids"));
            }
               redirect('DeportPillForFamily/DeportTodayDonations', 'refresh');
        }
    }
    //=================================================
     public  function DeportParticipationMoney(){ // DeportPillForFamily/DeportParticipationMoney
        $this->load->model('Model_deport_family');
        if($this->input->post("ADD") == 1 ) {
            $total = 0;
            if (($this->input->post("pill")) && sizeof($this->input->post("pill")) > 0) {
                foreach ($this->input->post("pill") as $key => $value) {
                    $add = explode("-", $value);
                    $total += $add[1];
                    $arr_id[]=$add[0];
                }
                $data_load["pill_id"] =$arr_id;
            }
            $data_load["paid_type"] =$this->input->post("paid_type");
            $data_load["qued_num"] = (1+ $this->Model_deport_family->select_last_value_fild(5));
            $data_load["total_value"] = $total;
            //  $this->test($_POST);
            $this->load->view('admin/deport_pill_family/participation_money/load_total', $data_load);
        }elseif($this->input->post('dayen_num') && $this->input->post('madeen_num')  ){
            $this->load->model('finance_accounting_model/Add_level');
            $load_data['qued_value']=$this->input->post('value');
            $load_data['all_accounts']=$this->Model_deport_family->select_all();
            $load_data['disabls'] = $this->Model_deport_family->select_all2();
            $load_data['dayen_num']=$this->input->post('dayen_num');
            $load_data['madeen_num']=$this->input->post('madeen_num');
            $load_data['total_row']=$load_data['madeen_num']+$load_data['dayen_num'];
            $this->load->view('admin/deport_pill_family/participation_money/load',$load_data);
        }else{
            $data["pay_1"]=$this->Model_deport_family->get_participation_money(array("deport"=>0,"pay_method_id_fk"=>1));
            $data["pay_2"]=$this->Model_deport_family->get_participation_money(array("deport"=>0,"pay_method_id_fk"=>2));
            $data["pay_3"]=$this->Model_deport_family->get_participation_money(array("deport"=>0,"pay_method_id_fk"=>3));
            $data["pay_4"]=$this->Model_deport_family->get_participation_money(array("deport"=>0,"pay_method_id_fk"=>4));
            $data["pay_5"]=$this->Model_deport_family->get_participation_money(array("deport"=>0,"pay_method_id_fk"=>5));
            $data["pay_5"]=$this->Model_deport_family->get_participation_money(array("deport"=>0,"pay_method_id_fk"=>6));
            $data['title'] = 'ترحيل سداد الكفلاء ';
            $data['metakeyword'] = 'ترحيل سداد الكفلاء ';
            $data['metadiscription'] = 'ترحيل سداد الكفلاء ';
            $data['subview'] = 'admin/deport_pill_family/participation_money/deport_participation_money';
            $this->load->view('admin_index', $data);
        }
    }
    //=================================================
    public function DeportQuedParticipationMoney(){   //
        if($this->input->post('DEPORT') =="DEPORT" ){
            $this->load->model('Model_deport_family');
            $this->Model_deport_family->deport_participation_money();
            if(($this->input->post("pill_ids"))){
                $this->Model_deport_family->update_participation_money($this->input->post("pill_ids"));
            }
            redirect('DeportPillForFamily/DeportParticipationMoney', 'refresh');
        }
    }
    //=================================================
    public  function DeportPayment(){
        $this->load->model('Model_deport_family');
        if($this->input->post("ADD") == 1 ) {
            $total = 0;
            if (($this->input->post("pill")) && sizeof($this->input->post("pill")) > 0) {
                foreach ($this->input->post("pill") as $key => $value) {
                    $add = explode("-", $value);
                    $total += $add[1];
                    $arr_id[]=$add[0];
                }
                $data_load["pill_id"] =$arr_id;
            }
            $data_load["paid_type"] =$this->input->post("paid_type");
            $data_load["qued_num"] = (1+ $this->Model_deport_family->select_last_value_fild(6));
            $data_load["total_value"] = $total;
            $this->load->view('admin/deport_pill_family/payment/load_total', $data_load);
        }elseif($this->input->post('dayen_num') && $this->input->post('madeen_num')  ){
            $this->load->model('finance_accounting_model/Add_level');
            $load_data['qued_value']=$this->input->post('value');
            $load_data['all_accounts']=$this->Model_deport_family->select_all();
            $load_data['disabls'] = $this->Model_deport_family->select_all2();
            $load_data['dayen_num']=$this->input->post('dayen_num');
            $load_data['madeen_num']=$this->input->post('madeen_num');
            $load_data['total_row']=$load_data['madeen_num']+$load_data['dayen_num'];
            $this->load->view('admin/deport_pill_family/payment/load',$load_data);
        }else{
            $data["pay_1"]=$this->Model_deport_family->undeport_payment(array("deport"=>0,"paid_type"=>1));
            $data['title'] = 'ترحيل ما تم تسديده للأيتام ';
            $data['metakeyword'] = 'ترحيل ما تم تسديده للأيتام ';
            $data['metadiscription'] = 'ترحيل ما تم تسديده للأيتام ';
            $data['subview'] = 'admin/deport_pill_family/payment/deport_pament';
            $this->load->view('admin_index', $data);
        }

    }
    //=================================================
     public  function DeportQuedPayment(){
         if($this->input->post('DEPORT') =="DEPORT" ){
             $this->load->model('Model_deport_family');
             $this->Model_deport_family->deport_payment();
             if(($this->input->post("pill_ids"))){
                 $this->Model_deport_family->update_payment($this->input->post("pill_ids"));
             }
             redirect('DeportPillForFamily/DeportPayment', 'refresh');
         }
     }
    //=================================================
}// END CLASS