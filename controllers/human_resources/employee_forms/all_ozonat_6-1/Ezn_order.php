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

       /* if ($_SESSION['role_id_fk'] ==3){
        $data['emp_name'] = $this->Ezn_order_model->get_emp_name($_SESSION['emp_code']);
       }*/
       $data['emp_data'] = $this->Ezn_order_model->select_depart();

           if ($_SESSION['role_id_fk'] ==3){
            $data['emp_name'] = $this->Ezn_order_model->get_emp_name($_SESSION['emp_code']);
            $current_to= $this->Public_employee_main_data->get_direct_manager_id_by_emp_id($_SESSION['emp_code']);
            $current_to_id=$this->Ezn_order_model->get_user_emp_id($current_to,3);
            $name=$this->Ezn_order_model->get_emp_name($_SESSION['emp_code']);
       }elseif($_SESSION['role_id_fk'] ==1)
        {
            $current_to= $this->Public_employee_main_data->get_direct_manager_id_by_emp_id($this->input->post('emp_id_fk'));
            $current_to_id=$this->Ezn_order_model->get_user_emp_id($current_to,3);
            $name=$this->Ezn_order_model->get_emp_name($this->input->post('emp_id_fk'));
        }



       if ($this->input->post('add_ezn')){
         // $this->test($_POST);
           $this->Ezn_order_model->add_ezn();
           $this->send_notify($current_to_id,$name);
           $this->messages('success','تم الإضافة بنجاح');
         //  $this->test($this->input->post('from_profile'));
         if ($this->input->post('from_profile')) {
            redirect('maham_mowazf/person_profile/Personal_profile', 'refresh');
        } else {
            redirect('human_resources/employee_forms/all_ozonat/Ezn_order','refresh');
        }
           
       }
        $data['title']="طلب اذن";

       $data['ezn_js'] = $this->load->view('admin/Human_resources/employee_forms/all_ozonat/ezn_order_js', '', TRUE);
       $this->load->view('admin/Human_resources/employee_forms/all_ozonat/ezn_order_view', $data);

    }

    public function getConnection_emp()
    {
        $all_Emps = $this->Ezn_order_model->get_all_emp(0);
            //        $this->test($all_Emps);
        $arr_emp = array();
        $arr_emp['data'] = array();

        if (!empty($all_Emps)) {
            foreach ($all_Emps as $row_emp) {

              if(empty($row_emp->edara)){
                $row_emp->edara='غير محدد ';
              }
              if(empty($row_emp->qsm)){
                $row_emp->qsm='غير محدد ';
              }

                $arr_emp['data'][] = array(
                    '<input type="radio" name="choosed" value="' . $row_emp->id . '"
                       ondblclick="Get_emp_Name(this)"
                        id="member' . $row_emp->id . '"
                        data-emp_code="' . $row_emp->emp_code . '"
                        data-edara_n="' . $row_emp->edara . '"
                        data-edara_id="' . $row_emp->administration . '"
                        data-name="' . $row_emp->employee . '"
                        data-job_title="' . $row_emp->job_title . '"
                        data-qsm_n="' . $row_emp->qsm . '"
                        data-qsm_id="' . $row_emp->department . '"
                        data-adress="' . $row_emp->adress . '"
                        data-phone="' . $row_emp->phone . '" />',
                    $row_emp->employee,
                    $row_emp->edara,
                    $row_emp->qsm,

                    ''
                );
            }
        }
        echo json_encode($arr_emp);


    }

    public function get_emp_data()
    {
        $data["personal_data"]=$this->Ezn_order_model->get_employee_data($this->input->post('valu'));
        print_r( json_encode($data["personal_data"][0]));


    }


    public function send_notify($current_to,$name)//  http://localhost/abnaa/maham_mowazf/talabat/all_ozonat/Ezn_order/send_notify
    {

        $this->load->model('Notification');

          define( 'API_ACCESS_KEY', 'AIzaSyDPQ5964xL01kr3rsVlzXveeAn-7HhPqBo' );
          //$this->load->model('api/Web_service');

          $token=$this->Notification->get_token_by_id($current_to);
        $text="تم تحويل طلب اذن لك من الموظف'.$name.'  ";
           $this->Notification->insert_notify($current_to,$text,1);
        $logged= $this->Notification->get_user_logged($current_to);
        if($logged==1) {
       for ($x = 0; $x < count($token); $x++) {
        $data = array("to" => $token[$x],

            "notification" => array("title" => "اشعار جديد", "body" => $text, "sound" => 'https://www.computerhope.com/jargon/m/example.mp3', "icon" => "https://abnaa-sa.org/uploads/images/05c833d02d69a88b8b3322dd22fb9e22.png", "click_action" => "http://shareurcodes.com"));
        $data_string = json_encode($data);

        // echo "The Json Data : " . $data_string;

        $headers = array
        (
            'Authorization: key=' . API_ACCESS_KEY,
            'Content-Type: application/json'
        );

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);

        $result = curl_exec($ch);

        curl_close($ch);

          //        echo "<p>&nbsp;</p>";
       // echo "The Result : " . $result;
          }
          }
    }


    public function display_data(){
       

        if ($_SESSION['role_id_fk']==3){
            $records = $this->Ezn_order_model->get_ozonat($_SESSION['emp_code']);
        } elseif ($_SESSION['role_id_fk']==1){
            $records = $this->Ezn_order_model->display_data();
        }
     //   $this->test($_POST);
        $arr = array();
        $arr['data'] = array();
        if(!empty($records)) {
            $x = 0;
            foreach ($records as $row) {


                $x++;

                if (isset($_POST['from_profile']) && (!empty($_POST['from_profile']))) {
                    $link_update = 'edite_ezn(' . $row->id . ')';
                   $link_delete = 1;
                } else {
                $link_update = 'window.location="' . base_url() . 'human_resources/employee_forms/all_ozonat/Ezn_order/Upadte_ezn/' . $row->id . '";';
                  
                    $link_delete = 0;

                }
                if ($row->no3_ezn==1){
                    $no3_ezn = 'استئذان شخصي';
                } elseif ($row->no3_ezn==2){
                    $no3_ezn ='استئذان للعمل' ;
                }
                else{
                    $no3_ezn =' غير محدد' ;
                }
                if($row->suspend == 0){
                $halet_eltalab = 'جاري متابعة الطلب ';
                $halet_eltalab_class = 'warning';
                }elseif($row->suspend == 1){
                 $halet_eltalab = 'تم قبول الطلب من '.$row->talab_in_title;
                $halet_eltalab_class = 'success';
                }elseif($row->suspend == 2){
                    $halet_eltalab = 'تم رفض الطلب من '.$row->talab_in_title;
                    $halet_eltalab_class = 'danger';
                }elseif($row->suspend == 4){
                   $halet_eltalab = 'تم اعتماد الطلب بالموافقة  من '.$row->talab_in_title;
                   $halet_eltalab_class = 'success';
                }elseif($row->suspend == 5){
                   $halet_eltalab = 'تم اعتماد الطلب بالرفض من  '.$row->talab_in_title;
                   $halet_eltalab_class = 'danger';
                }else{
                     $halet_eltalab = 'غير محدد ';
                   $halet_eltalab_class = 'danger';
                }

            if($row->suspend == 0){
                       $egraaa =    '  <a href="#" onclick=\'swal({
                        title: "هل انت متأكد من التعديل ؟",
                        text: "",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonClass: "btn-warning",
                        confirmButtonText: "تعديل",
                        cancelButtonText: "إلغاء",
                        closeOnConfirm: true
                        },
                        function(){
                        ' . $link_update . '
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
                                                window.location="' . base_url() . 'human_resources/employee_forms/all_ozonat/Ezn_order/delete_ezn/' . $row->id . '/' . $link_delete . '";
                                                });
                                            \'>
                                            <i class="fa fa-trash"> </i></a>
                                            <!-- Nagwa 1-6 -->
                                            <!--<a onclick="print_ezn('.$row->id.');"><i class="fa fa-print"></i></a>-->

                                            ';
            }else{

              $egraaa = '<span class="label label-danger">عذرا لا يمكنك التعديل والحذف </span>' ;
              
            }
            $currentDateTime =$row->from_hour;
          
            $DateTime =$row->to_hour;
          
                $arr['data'][] = array(
                    $x,
                    $no3_ezn,
                    $row->emp_name,
                    $newDateTime = date('h:i A', strtotime($currentDateTime)),
                    $to_DateTime = date('h:i A', strtotime($DateTime)),
                    $row->total_hours,

                //   '<button data-toggle="modal" data-target="#Ozonat_detailsModal" class="btn btn-sm btn-info"  onclick="load_person_data('.$row->emp_id_fk.');">
                //   <i class="fa fa-list "></i>
                //   افاده شئون الموظفين
                //   </button>',
                  '<a data-toggle="modal" data-target="#detailsModal" title="تفاصيل" class="btn btn-sm btn-info" style="padding:1px 6px"  onclick="load_page('.$row->id.'); load_person_data('.$row->emp_id_fk.'); load_profile_data('.$row->emp_id_fk.');">
                  <i class="fa fa-list "></i></a>
                  <a  title="طباعة" onclick="print_new_ezn('.$row->id.');">
                  <i class="fa fa-print "></i></a>'
                  .$egraaa,
                  $row->current_to_user_name,
                  '<span class="label label-'. $halet_eltalab_class.'" style="min-width: 140px;">
                  '. $halet_eltalab.'
                   </span>',
                );
            }
        }
        $json = json_encode($arr);
        echo $json;
    }

    public function check_ezn()
    {
      $emp_id = $this->input->post('emp_id');
      $result = $this->Ezn_order_model->check_ezn($emp_id);
      echo json_encode($result);
        }
    public function Upadte_ezn($id){
        //$id=$this->input->post('id');

         
           
        $data['all_emp']= $this->Ezn_order_model->get_all_emp(0);
        $data['get_ezn']= $this->Ezn_order_model->get_by_id($id);
   //$data['emp_data'] = $this->Ezn_order_model->select_depart();
        if ($_SESSION['role_id_fk'] ==3){
            $data['emp_name'] = $this->Ezn_order_model->get_emp_name($_SESSION['emp_code']);
           // $this->test(  $data['emp_name']);
        }
        if ($this->input->post('add_ezn')){
            $this->Ezn_order_model->update_ezn($id);
            $this->messages('success','تم التعديل بنجاح');
            
              if ($this->input->post('from_profile')) {
            
                redirect('maham_mowazf/person_profile/Personal_profile', 'refresh');
               
            } else {
              
                redirect('human_resources/employee_forms/all_ozonat/Ezn_order','refresh');
              
            }


        }
       
        $data['title']="تعديل اذن";

        $data['ezn_js'] = $this->load->view('admin/Human_resources/employee_forms/all_ozonat/ezn_order_js', '', TRUE);
        $this->load->view('admin/Human_resources/employee_forms/all_ozonat/ezn_order_view', $data);

    }
    public function Upadte_eznn(){
        $id=$this->input->post('id');

         
           
        $data['all_emp']= $this->Ezn_order_model->get_all_emp(0);
        $data['get_ezn']= $this->Ezn_order_model->get_by_id($id);
   //$data['emp_data'] = $this->Ezn_order_model->select_depart();
        if ($_SESSION['role_id_fk'] ==3){
            $data['emp_name'] = $this->Ezn_order_model->get_emp_name($_SESSION['emp_code']);
           // $this->test(  $data['emp_name']);
        }
        if ($this->input->post('add_ezn')){
            $this->Ezn_order_model->update_ezn($id);
            $this->messages('success','تم التعديل بنجاح');
            
              if ($this->input->post('from_profile')) {
            
                redirect('maham_mowazf/person_profile/Personal_profile', 'refresh');
               
            } else {
              
                redirect('human_resources/employee_forms/all_ozonat/Ezn_order','refresh');
              
            }


        }
       
        $data['title']="تعديل اذن";

        $data['ezn_js'] = $this->load->view('admin/Human_resources/employee_forms/all_ozonat/ezn_order_js', '', TRUE);
        $this->load->view('admin/Human_resources/employee_forms/all_ozonat/ezn_order_view', $data);

    }
 
    public function delete_ezn ($id, $from = false){
        $this->Ezn_order_model->delete_ezn($id);
        $this->messages('success','تم الحذف بنجاح ');
       // redirect('human_resources/employee_forms/job_requests/Job_request','refresh');
       
         if (!empty($from) && ($from == 1)) {
            redirect('maham_mowazf/person_profile/Personal_profile', 'refresh');
        } else {
            redirect('human_resources/employee_forms/all_ozonat/Ezn_order','refresh');
        }
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
     
        $this->load->view('admin/Human_resources/employee_forms/all_ozonat/load_details',$data);

    }
    public function load_profile_details(){

        $emp_id = $this->input->post('emp_id');
        
        $data['emp_name'] = $this->Ezn_order_model->get_emp_profile($emp_id);
       // $this->test($data['emp_name']);
        $this->load->view('admin/Human_resources/employee_forms/all_ozonat/load_details',$data);

    }
    public function print_ezn(){

        $data['title']="طباعة طلب الإذن" ;
        $row_id = $this->input->post('row_id');
        $data['get_ezn']= $this->Ezn_order_model->get_by_id($row_id);
     //   $this->test($data['get_ezn']);
        $this->load->view('admin/Human_resources/employee_forms/all_ozonat/print_ezn', $data);


    }
    public function print_new_ezn(){

        $data['title']="طباعة طلب الإذن" ;
        $row_id = $this->input->post('ezn_id');
        $data['ezn_data']= $this->Ezn_order_model->get_by_id($row_id);
        $data['ozonat']= $this->Ezn_order_model->get_all_ozenat($data['ezn_data']->emp_id_fk);
        $data['UserName'] = $this->Ezn_order_model->getUserName($_SESSION['user_id']);

        // $this->test($data['ezn_data']);
        // application\views\admin\Human_resources\employee_forms\all_ozonat\new_print_ezn.php
        $this->load->view('admin\Human_resources\employee_forms\all_ozonat\new_print_ezn', $data);


    }
    public function print_ozonat(){

        $data['title']="طباعة طلب الإذن" ;
        $emp_id = $this->input->post('emp_id');
        $data['all_ozonat']= $this->Ezn_order_model->get_ozonat($emp_id);
        $this->load->view('admin/Human_resources/employee_forms/all_ozonat/print_ozonat', $data);


    }


    public function request_ozonat()
    { //human_resources/employee_forms/all_ozonat/Ezn_order/request_ozonat
      if (($_SESSION['role_id_fk'] == 1)|| (($_SESSION['role_id_fk'] == 3)&&(in_array($_SESSION['user_id'],array(153,151))))) {
        $data['items'] = $this->Ezn_order_model->display_data();
        // $this->test($data);
      }
        $data['title'] = "طلبات الاذونات المقدمة";
        $data['subview'] = 'admin/Human_resources/employee_forms/all_ozonat/ozonat_order_view';
        $this->load->view('admin_index', $data);
    }
//////////////////////////////////////////////////////////////////////////////





}
