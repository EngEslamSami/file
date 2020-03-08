<?php
class Taswia extends MY_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        if($this->session->userdata('is_logged_in')==0){
            redirect('login');
        }
        /**********************************************************/
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in  = $this->Counting->get_basic_in_num();
        $this->files_basic_in  = $this->Counting->get_files_basic_in();
        /*************************************************************/
        $this->load->helper(array('url','text','permission','form'));

        $this->load->model('system_management/Groups');

        $this->groups=$this->Groups->get_group($_SESSION["group_number"]);
        $this->groups_title=$this->Groups->get_group_title($_SESSION["group_number"]);
        $this->load->library('google_maps');

        $this->load->model('finance_accounting_model/taswia/Taswia_model');

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

        }elseif($type=='warning'){
            return $CI->session->set_flashdata('message','<div class="alert alert-warning alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>   !</strong> '.$text.'.</div>');
        }elseif($type=='error'){
            return $CI->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> !</strong> '.$text.'.</div>');
        }

    }
    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }

    public function bank_taswia(){ // finance_accounting/taswia/Taswia/bank_taswia

        $data['banks'] = $this->Taswia_model->getBanks();

        $data['title'] = " مذكرة التسوية ";
        $data['subview'] = 'admin/finance_accounting/taswia/taswia_view';
        $this->load->view('admin_index', $data);
    }
    public function search_result(){
        $bank_id = $this->input->post('bank_id');
        $account_id = $this->input->post('account_id');
        $bank_date = $this->input->post('bank_date');
     //   $rkm_hesab = $this->input->post('rkm_hesab');
        $from ='2019-01-01' ;

        $data['bank_name'] = $this->Taswia_model->get_name($bank_id,'banks_settings','title');
        $data['account_name'] = $this->Taswia_model->get_name($account_id,'society_main_banks_account');
        $data['rkm_hesab'] = $this->Taswia_model->get_rkm_hesab($bank_id,$account_id);
      //  $this->test( $data['rkm_hesab']);
       // die;
        $data['bank_date']= $bank_date;
        
        $data['type']   = $this->Taswia_model->get_hesab_tabe3a($data['rkm_hesab']);

        $data['records'] = $this->Taswia_model->get_hesab_movement(
            array('finance_quods_details.date >='=>strtotime($from),'finance_quods_details.date <='=>strtotime($bank_date),'finance_quods_details.rkm_hesab'=>$data['rkm_hesab'])
        );
        $data['totla_sabeq']=$this->Taswia_model->select_Rased_sabeq(strtotime($from),$data['rkm_hesab']);

        $this->load->view('admin/finance_accounting/taswia/search_result', $data);

    }
}