<?php
class Rasid_ayni extends MY_Controller{

    public function __construct(){
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
        $this->load->model('st/rasid_ayni/Rasid_ayni_model');
        $this->load->library('google_maps');
    }
    private  function test($data=array()){
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }

    private function url (){
        unset($_SESSION['url']);
        $this->session->set_flashdata('url','http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
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
            return $CI->session->set_flashdata('message','<div class="alert alert-warning alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>   !</strong> '.$text.'.</div>');
        }elseif($type=='error'){
            return $CI->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> !</strong> '.$text.'.</div>');
        }

    }

    public function add_rasid(){ // st/rasid_ayni/Rasid_ayni/add_rasid

        $data['storage']= $this->Rasid_ayni_model->get_storage(1);
        $data['asnaf']= $this->Rasid_ayni_model->get_asnaf();
        $data['proc_rkm']= $this->Rasid_ayni_model->get_proc_rkm();
        $data['all_rasid']= $this->Rasid_ayni_model->display_rasid();

        if ($this->input->post('save')){
            $id = $this->Rasid_ayni_model->insert_rasid();

            if($this->input->post('sanf_code')){
                $this->Rasid_ayni_model->insert_asnaf_details($id);
            }
        //  die;
            $this->messages('success','تمت الاضافة بنجاح');
          //  redirect('st/rasid_ayni/Rasid_ayni/add_rasid','refresh');
            redirect('st/rasid_ayni/Rasid_ayni/Update/'.$id, 'refresh');
        }
        $data['title']=' أرصدة أول المدة';
        $data['subview']= 'admin/st/rasid_ayni/rasid_ayni_view';
        $this->load->view('admin_index',$data);
    }

    public function get_asnaf(){
        $data['lenght']= $_POST['length'];
        $this->load->view('admin/st/rasid_ayni/get_asnaf');
    }

    public function load_details(){
        $row_id = $this->input->post('row_id');
        $data['get_all']=$this->Rasid_ayni_model->get_by_id($row_id)[0];
        $this->load->view('admin/st/rasid_ayni/load_details',$data);

    }

    public function Update($id){
        $data['get_rasid']=$this->Rasid_ayni_model->get_by_id($id)[0];
      //  $this->test($data['get_rasid']);
       // die;
        $data['storage']= $this->Rasid_ayni_model->get_storage(1);
        $data['asnaf']= $this->Rasid_ayni_model->get_asnaf();
        if ($this->input->post('edit')){
            $this->Rasid_ayni_model->update_rasid($id);
            $this->Rasid_ayni_model->insert_asnaf_details($id);
          //  $this->test($_POST);
       //     die;
            $this->messages('success','تم التعديل بنجاح ');
            redirect('st/rasid_ayni/Rasid_ayni/Update/'.$id, 'refresh');
        }
        $data['title']=' أرصدة أول المدة';
        $data['subview']= 'admin/st/rasid_ayni/rasid_ayni_view';
        $this->load->view('admin_index',$data);
    }
    public function Delete($id){
        $this->Rasid_ayni_model->delete_rasid($id);
        $this->Rasid_ayni_model->delete_all_asnaf($id);
        $this->messages('success','تم الحذف بنجاح ');
        redirect('st/rasid_ayni/Rasid_ayni/add_rasid','refresh');
    }
    public function Delete_details($id,$proc_rkm_fk){

        $this->Rasid_ayni_model->delete_sanf($id);
        $this->messages('success','تم الحذف بنجاح ');
        redirect('st/rasid_ayni/Rasid_ayni/Update/'.$proc_rkm_fk,'refresh');
    }

    public function Print_rasid(){ // st/rasid_ayni/Rasid_ayni/Print_rasid
        $data['title']="طباعة الموردين" ;
        $row_id = $this->input->post('row_id');
        $data['get_all']=$this->Rasid_ayni_model->get_by_id($row_id)[0];

        $this->load->view('admin/st/rasid_ayni/print_rasid', $data);

    }

    public function getConnection2($row_id)
    {
        $all_Asnafs = $this->Rasid_ayni_model->get_asnafe();
//        $this->test($all_asnafs);
        $arr_asnaf = array();
        $arr_asnaf['data'] = array();

        if (!empty($all_Asnafs)) {
            foreach ($all_Asnafs as $row_asnafs) {

                $arr_asnaf['data'][] = array(
                    '<input type="radio" name="choosed" value="' . $row_asnafs['id'] . '"
                       ondblclick="Get_sanfe_Name(this,' . $row_id . ')" 
                        id="member' . $row_asnafs['id'] . '" data-code="' . $row_asnafs['code'] . '" 
                        data-code_br="' . $row_asnafs['code_br'] . '"
                        data-name="' . $row_asnafs['name'] . '"
                        data-whda="' . $row_asnafs['title_setting'] . '" 
                        data-price="' . $row_asnafs['price'] . '" 
                        data-all_rased="' . $row_asnafs['all_rased'] . '" 
                        data-slahia="' . $row_asnafs['slahia'] . '" />',
                    $row_asnafs['code'],
                    $row_asnafs['name'],
                    $row_asnafs['title_setting'],

                    ''
                );
            }
        }
        echo json_encode($arr_asnaf);


    }

    public function get_search_result()
    { // st/rasid_ayni/Rasid_ayni/get_search_result

        $field=$this->input->post('array_search_id');
        if($field=='proc_rkm' || $field=='proc_date_ar' )
        {
            $valu=$this->input->post('input_search_id');

        }  elseif ($field=='proc_type'){
            $valu=$this->input->post('select_search_id3');
        }  elseif ($field=='storage_fk'){
            $valu=$this->input->post('select_search_id2');
        }

        if($field !='' &&  $valu !=''){
            if( $_POST['array_search_id'] =='proc_rkm' || $_POST['array_search_id'] =='proc_type' || $_POST['array_search_id'] =='proc_date_ar' || $_POST['array_search_id'] =='storage_fk'

            ){

                $data['details']= $this->Rasid_ayni_model->getByarr($field,$valu);

            }
         //   $this->test($_POST);
         //   die;
            $this->load->view('admin/st/rasid_ayni/load_search_details',$data );

        }
        //  $this->test($_POST);
    }
    public function get_storage(){
        $data['storage']= $this->Rasid_ayni_model->get_storage(1);
        echo json_encode($data['storage']);
    }

}