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
    private function upload_all_file($file_name,$folder="uploads/images")
    {


        $config['upload_path'] = $folder;
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
        $config['max_size'] = '800000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000';
        $config['encrypt_name'] = true;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($file_name)) {
            return false;
        } else {
            $datafile = $this->upload->data();
            //  $this->thumb($datafile);
            return $datafile['file_name'];
        }
    }
    public function read_file($file_name)
    {
        $this->load->helper('file');
        $file_path = 'uploads/images/finance_accounting/taswia/'.$file_name;
        header('Content-Type: application/pdf');
        header('Content-Discription:inline; filename="'.$file_name.'"');
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges:bytes');
        header('Content-Length: ' . filesize($file_path));
        readfile($file_path);
    }
    //

    public function bank_taswia(){ // finance_accounting/taswia/Taswia/bank_taswia

        $data['banks'] = $this->Taswia_model->getBanks();
        $data['get_all'] = $this->Taswia_model->get_all();
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
     
        $data['bank_date']= $bank_date;
       
        $data['type']   = $this->Taswia_model->get_hesab_tabe3a($data['rkm_hesab']);

        $data['records'] = $this->Taswia_model->get_hesab_movement(
            array('finance_quods_details.date >='=>strtotime($from),'finance_quods_details.date <='=>strtotime($bank_date),'finance_quods_details.rkm_hesab'=>$data['rkm_hesab'])
        );
        $data['totla_sabeq']=$this->Taswia_model->select_Rased_sabeq(strtotime($from),$data['rkm_hesab']);
   
        $data['sheek_sarf'] = $this->Taswia_model->get_sheek_sarf($bank_id,$data['rkm_hesab'],strtotime($from),strtotime($bank_date));


        $this->load->view('admin/finance_accounting/taswia/search_result', $data);

    }


    public function get_rased(){
        $bank_id = $this->input->post('bank_id');
        $account_id = $this->input->post('account_id');
        $bank_date = $this->input->post('bank_date');

        $from ='2019-01-01' ;
        $data['rkm_hesab'] = $this->Taswia_model->get_rkm_hesab($bank_id,$account_id);
        $type   = $this->Taswia_model->get_hesab_tabe3a($data['rkm_hesab']);

        $records = $this->Taswia_model->get_hesab_movement(
            array('finance_quods_details.date >='=>strtotime($from),'finance_quods_details.date <='=>strtotime($bank_date),'finance_quods_details.rkm_hesab'=>$data['rkm_hesab'])
        );
        $totla_sabeq=$this->Taswia_model->select_Rased_sabeq(strtotime($from),$data['rkm_hesab']);

        $value =0;
        if ( !empty($records) && !empty($totla_sabeq)){



            for ($z = 0; $z < sizeof($records); $z++) {

                if ($z == 0) {
                    $sabeq =0;
                    if ($type == 2) {
                        $sabeq = $totla_sabeq[1] - $totla_sabeq[0];
                        $value = ($sabeq + $records[0]->dayen - $records[0]->maden);
                    } elseif ($type == 1) {
                        $sabeq = $totla_sabeq[0] - $totla_sabeq[1];
                        $value = ($sabeq + $records[0]->maden - $records[0]->dayen);

                    }
                } elseif ($z > 0) {
                    if ($type == 2) {
                        $value = $value + ($records[$z]->dayen - $records[$z]->maden);
                    } elseif ($type == 1) {
                        $value = $value + ($records[$z]->maden - $records[$z]->dayen);
                    }
                }
            }
        }
        echo $value ;

    }
    public function add_taswia(){
        if ($this->input->post('add')){
            $this->Taswia_model->add_taswia();
            $this->messages('success', 'تم الاضافة بنجاح ' );
            redirect('finance_accounting/taswia/Taswia/bank_taswia', 'refresh');

        }

    }
    public function update_taswia($id){
        $data['banks'] = $this->Taswia_model->getBanks();
        $data['get_taswia']=$this->Taswia_model->get_by_id($id);
        if ($this->input->post('add')){
            $this->Taswia_model->add_taswia($id);
            $this->messages('success', 'تم التعديل بنجاح ' );
            redirect('finance_accounting/taswia/Taswia/bank_taswia', 'refresh');

        }
        $data['title'] = " مذكرة التسوية ";
        $data['subview'] = 'admin/finance_accounting/taswia/update_taswia';
        $this->load->view('admin_index', $data);
    }

    public function delete_taswia($id){

        $this->Taswia_model->delete_taswia($id);
        $this->messages('success', 'تم الحذف بنجاح ' );
        redirect('finance_accounting/taswia/Taswia/bank_taswia', 'refresh');

    }
    public function load_details(){

        $row_id = $this->input->post('row_id');
        $data['get_all']=$this->Taswia_model->get_by_id($row_id);
        $this->load->view('admin/finance_accounting/taswia/load_details',$data);

    }
    public function print_taswia(){

        $row_id = $this->input->post('row_id');
        $data['get_all']=$this->Taswia_model->get_by_id($row_id);
        $this->load->view('admin/finance_accounting/taswia/print_taswia', $data);

    }
    public function get_bank_name(){
        $bank_id = $this->input->post('bank_id');
        $account_id = $this->input->post('account_id');
        $data['bank_name'] = $this->Taswia_model->get_name($bank_id,'banks_settings','title');
        $data['account_name'] = $this->Taswia_model->get_name($account_id,'society_main_banks_account');
       echo json_encode($data);

    }
    public function load_morfaq(){
        $id= $this->input->post('id');
        $data['get_all']=$this->Taswia_model->get_by_id($id);
        $this->load->view('admin/finance_accounting/taswia/load_morfaq', $data);
    }

    public function upload_morfaq()
    {
        $id = $this->input->post('id');


        $files = $this->upload_all_file("files",'uploads/images/finance_accounting/taswia');
        $this->Taswia_model->add_attach($id,$files);

        $data['get_all']=$this->Taswia_model->get_by_id($id);

        $this->load->view('admin/finance_accounting/taswia/load_morfaq', $data);
    }
    public function delete_attach(){
        $id = $this->input->post('id');
        $this->Taswia_model->delete_attach($id);
        $data['get_all']=$this->Taswia_model->get_by_id($id);
        $this->load->view('admin/finance_accounting/taswia/load_morfaq', $data);
    }

}