<?php
class Ezn_order extends MY_Controller{
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
        $this->load->model('human_resources_model/employee_forms/all_ozonat/Ezn_order_model');
        $this->load->model('human_resources_model/Public_employee_main_data');
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

    public function index(){ // human_resources/employee_forms/all_ozonat/Ezn_order

        // ___________Nagwa 1-6 _________
if ($_SESSION['role_id_fk']==3){
    $data['emp']= $this->Ezn_order_model->get_emp($_SESSION['emp_code']);

}
        // ___________Nagwa 1-6 _________

        $data['all_emp']= $this->Ezn_order_model->get_all_emp(0);

        if ($_SESSION['role_id_fk'] ==3){
        $data['emp_name'] = $this->Ezn_order_model->get_emp_name($_SESSION['emp_code']);
       }
       if ($this->input->post('add_ezn')){
           $this->Ezn_order_model->add_ezn();
           $this->messages('success','تم الإضافة بنجاح');
           redirect('human_resources/employee_forms/all_ozonat/Ezn_order','refresh');
       }
        $data['title']="طلب اذن";

       $data['ezn_js'] = $this->load->view('admin/Human_resources/employee_forms/all_ozonat/ezn_order_js', '', TRUE);
       $this->load->view('admin/Human_resources/employee_forms/all_ozonat/ezn_order_view', $data);

    }
    public function get_emp_data()
    {
        $data["personal_data"]=$this->Ezn_order_model->get_employee_data($this->input->post('valu'));
        print_r( json_encode($data["personal_data"][0]));


    }

    public function display_data(){

        if ($_SESSION['role_id_fk']==3){
            $records = $this->Ezn_order_model->get_ozonat($_SESSION['emp_code']);
        } elseif ($_SESSION['role_id_fk']==1){
            $records = $this->Ezn_order_model->display_data();
        }
        $arr = array();
        $arr['data'] = array();
        if(!empty($records)) {
            $x = 0;
            foreach ($records as $row) {
                $x++;
                if ($row->no3_ezn==1){
                    $no3_ezn = 'استئذان شخصي';
                } elseif ($row->no3_ezn==2){
                    $no3_ezn ='استئذان للعمل' ;
                }
                $arr['data'][] = array(
                    $x,
                    $no3_ezn,
                    $row->emp_name,
                    $row->from_hour,
                    $row->to_hour,
                    $row->total_hours,
                 
                    '<button data-toggle="modal" data-target="#Ozonat_detailsModal" class="btn btn-sm btn-info"  onclick="load_person_data('.$row->emp_id_fk.');">
       <i class="fa fa-list "></i>
        
         
      افاده شئون الموظفين  

</button>',

   '<a data-toggle="modal" data-target="#detailsModal" title="تفاصيل" class="btn btn-sm btn-info" style="padding:1px 6px"  onclick="load_page('.$row->id.');">
       <i class="fa fa-list "></i>
        
         
        

<!-- Nagwa 6-1 --> 
</a>
<a href="#" onclick=\'swal({
                                            title: "هل انت متأكد من التعديل ؟",
                                            text: "",
                                            type: "warning",
                                            showCancelButton: true,
                                            confirmButtonClass: "btn-warning",
                                            confirmButtonText: "تعديل",
                                            cancelButtonText: "إلغاء",
                                            closeOnConfirm: false
                                            },
                                            function(){

                                            window.location="'.base_url().'human_resources/employee_forms/all_ozonat/Ezn_order/Upadte_ezn/'.$row->id.'";
                                            });\'>
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                   

                     
                      <a href="#" onclick=\'swal({
                                            title: "هل انت متأكد من الحذف ؟",
                                            text: "",
                                            type: "warning",
                                            showCancelButton: true,
                                            confirmButtonClass: "btn-danger",
                                            confirmButtonText: "حذف",
                                            cancelButtonText: "إلغاء",
                                            closeOnConfirm: false
                                            },
                                            function(){
                                            swal("تم الحذف!", "", "success");
                                            window.location="'.base_url().'human_resources/employee_forms/all_ozonat/Ezn_order/delete_ezn/'.$row->id.'";
                                            });\'>
                                            <i class="fa fa-trash"> </i></a>
                                            <!-- Nagwa 1-6 -->
                                            <a onclick="print_ezn('.$row->id.');"><i class="fa fa-print"></i></a>
                                            '

                );
            }
        }
        $json = json_encode($arr);
        echo $json;
    }
    public function Upadte_ezn($id){

        $data['all_emp']= $this->Ezn_order_model->get_all_emp(0);
        $data['get_ezn']= $this->Ezn_order_model->get_by_id($id);

        if ($_SESSION['role_id_fk'] ==3){
            $data['emp_name'] = $this->Ezn_order_model->get_emp_name($_SESSION['emp_code']);
        }
        if ($this->input->post('add_ezn')){
            $this->Ezn_order_model->update_ezn($id);
            $this->messages('success','تم التعديل بنجاح');
            redirect('human_resources/employee_forms/all_ozonat/Ezn_order','refresh');
        }
        $data['title']="طلب اذن";

        $data['ezn_js'] = $this->load->view('admin/Human_resources/employee_forms/all_ozonat/ezn_order_js', '', TRUE);
        $this->load->view('admin/Human_resources/employee_forms/all_ozonat/ezn_order_view', $data);

    }
    public function delete_ezn ($id){
        $this->Ezn_order_model->delete_ezn($id);
        $this->messages('success','تم الحذف بنجاح ');
        redirect('human_resources/employee_forms/all_ozonat/Ezn_order','refresh');
    }

    // _________Nagwa 1-6 ___________________

      public function load_details(){

            $row_id = $this->input->post('row_id');
            $data['get_ezn']= $this->Ezn_order_model->get_by_id($row_id);
            $this->load->view('admin/Human_resources/employee_forms/all_ozonat/load_details',$data);
        }

    public function load_ozonat_details(){

        $emp_id = $this->input->post('emp_id');
        $data['all_ozonat']= $this->Ezn_order_model->get_ozonat($emp_id);
        $this->load->view('admin/Human_resources/employee_forms/all_ozonat/load_ozonat_details',$data);

    }
    public function print_ezn(){

        $data['title']="طباعة طلب الإذن" ;
        $row_id = $this->input->post('row_id');
        $data['get_ezn']= $this->Ezn_order_model->get_by_id($row_id);
        $this->load->view('admin/Human_resources/employee_forms/all_ozonat/print_ezn', $data);


    }
    public function print_ozonat(){

        $data['title']="طباعة طلب الإذن" ;
        $emp_id = $this->input->post('emp_id');
        $data['all_ozonat']= $this->Ezn_order_model->get_ozonat($emp_id);
        $this->load->view('admin/Human_resources/employee_forms/all_ozonat/print_ozonat', $data);


    }

}