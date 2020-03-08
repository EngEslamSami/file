<?php
class Job_request extends MY_Controller{

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

        $this->load->model('human_resources_model/employee_forms/job_requests/Job_request_model');
        $this->load->library('google_maps');
    }
    private  function test($data=array()){
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }
    private function thumb($data){
        $config['image_library'] = 'gd2';
        $config['source_image'] =$data['full_path'];
        $config['new_image'] = 'uploads/human_resources/job_request/thumbs/'.$data['file_name'];
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['thumb_marker']='';
        $config['width'] = 275;
        $config['height'] = 250;
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
    }
    private  function upload_image($file_name){
        $config['upload_path'] = 'uploads/human_resources/job_request';
        // $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf';
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
        $config['max_size']    = '100000000000000000000000000000000000000';
        $config['encrypt_name']=true;
        $this->load->library('upload',$config);
        if(! $this->upload->do_upload($file_name)){
            return  false;
        }else{
            $datafile = $this->upload->data();
            $this->thumb($datafile);
            return  $datafile['file_name'];
        }
    }
    // ___________Nagwa 8-6 ________________
    function upload_muli_image($input_name)
    {
        $filesCount = count($_FILES[$input_name]['name']);

        for($i = 0; $i < $filesCount; $i++){
            $_FILES['userFile']['name'] = $_FILES[$input_name]['name'][$i];
            $_FILES['userFile']['type'] = $_FILES[$input_name]['type'][$i];
            $_FILES['userFile']['tmp_name'] = $_FILES[$input_name]['tmp_name'][$i];
            $_FILES['userFile']['error'] = $_FILES[$input_name]['error'][$i];
            $_FILES['userFile']['size'] = $_FILES[$input_name]['size'][$i];
            $all_img[]= $this->upload_image("userFile");
        }
        return $all_img;
    }
    private function url (){
        unset($_SESSION['url']);
        $this->session->set_flashdata('url','http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
    }
    private function current_hjri_year()
    {
        $time = mktime(0, 0, 0, Date('m'), Date('j'), Date('Y'));
        $TDays=round($time/(60*60*24));
        $HYear=round($TDays/354.37419);
        $Remain=$TDays-($HYear*354.37419);
        $HMonths=round($Remain/29.531182);
        $HDays=$Remain-($HMonths*29.531182);
        $HYear=$HYear+1389;
        $HMonths=$HMonths+10;$HDays=$HDays+23;
        if ($HDays>29.531188 and round($HDays)!=30){
            $HMonths=$HMonths+1;$HDays=Round($HDays-29.531182);
        }else{
            $HDays=Round($HDays);
        }
        if ($HMonths>12) {
            $HMonths=$HMonths-12;
            $HYear = $HYear+1;
        }
        $NowDay=$HDays;
        $NowMonth=$HMonths;
        $NowYear=$HYear;
        $MDay_Num = date("w");
        if ($MDay_Num=="0"){
            $MDay_Name = "الأحد";
        }elseif ($MDay_Num=="1"){
            $MDay_Name = "الإثنين";
        }elseif ($MDay_Num=="2"){
            $MDay_Name = "الثلاثاء";
        }elseif ($MDay_Num=="3"){
            $MDay_Name = "الأربعاء";
        }elseif ($MDay_Num=="4"){
            $MDay_Name = "الخميس";
        }elseif ($MDay_Num=="5"){
            $MDay_Name = "الجمعة";
        }elseif ($MDay_Num=="6"){
            $MDay_Name = "السبت";
        }
        $NowDayName = $MDay_Name;
        $NowDate = $MDay_Name."، ".$HDays."/".$HMonths."/".$HYear." هـ";
        /*
        $NowDate; لطباعة التاريخ الهجري كامل لهذا اليوم مثلاً (الخميس 1/3/1430 هـ).
        $MDay_Name; طباعة اليوم فقط مثلاً (الخميس).
        $HDays; تاريخ اليوم (1).
        $HMonths; الشهر (3).
        $HYear; السنة الهجرية (1430).
        */
        return $HYear;
    }

    //-----------------------------------------
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

    public function index(){ // human_resources/employee_forms/job_requests/Job_request
        $data['title']= 'طلب احتياج وظيفة' ;
        $data['deparments']= $this->Job_request_model->get_departments();
        //yara
        $data['jobtitles']= $this->Job_request_model->get_all_jobs();
        //$this->test($data['jobtitles']);
        //$data['jobtitles']= $this->Job_request_model->select_all_defined(4);
        $data['job_type'] = $this->Job_request_model->select_forms_settings(1);
        $data['work_nature'] = $this->Job_request_model->select_forms_settings(2);
        $data['all_requsts']= $this->Job_request_model->dispaly_requests();

        if ($this->input->post('add')){
           $id = $this->Job_request_model->insert_request();
           $this->Job_request_model->add_request_details($id);
           $this->messages('success','تم الاضافة بنجاح ');
        //   redirect('human_resources/employee_forms/job_requests/Job_request','refresh');
         if ($this->input->post('from_profile')) {
                redirect('maham_mowazf/person_profile/Personal_profile', 'refresh');
            } else {
                redirect('human_resources/employee_forms/job_requests/Job_request', 'refresh');
            }
        }
        $data['requets_js'] = $this->load->view('admin/Human_resources/employee_forms/job_requests/add_request_js', '', TRUE);
        $this->load->view('admin/Human_resources/employee_forms/job_requests/add_request', $data);

    }

    public function display_data(){

        $records = $this->Job_request_model->dispaly_requests();
        $arr = array();
        $arr['data'] = array();
        if(!empty($records)) {
            $x = 0;
            foreach ($records as $row) {
                $x++;
                  if (isset($_POST['from_profile']) && (!empty($_POST['from_profile']))) {
                    $link_update = 'edite_Job_request(' . $row->id . ')';
                    $link_delete = 1;
                } else {
                    $link_update = 'window.location="' . base_url() . 'human_resources/employee_forms/job_requests/Job_request/Update_requset/' . $row->id . '";';
                    $link_delete = 0;

                }
                
                $arr['data'][] = array(
                    $x,
                    $row->id,
                    $row->date_ar,
                    $row->job_title,
                    '<button data-toggle="modal" data-target="#detailsModal" class="btn btn-sm btn-info" style="padding:1px 6px"  onclick="load_page('.$row->id.');">
                           <i class="fa fa-list "></i>
                            
                             
                            
                    
                    </button>

                           <a href="#" onclick=\'swal({
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
                                            closeOnConfirm: true
                                            },
                                            function(){
                                            swal("تم الحذف!", "", "success");
                                            window.location="' . base_url() . 'human_resources/employee_forms/job_requests/Job_request/delete_request/' . $row->id . '/' . $link_delete . '";
                                            });\'>
                                            <i class="fa fa-trash"> </i></a>


                                            <a
                                            onclick="print_request('.$row->id .')"
                                            >
                                            <i class="fa fa-print"> </i></a>
                                   
                               
                                            '

                );
            }
        }
        $json = json_encode($arr);
        echo $json;
    }

    public function load_details(){
        $row_id = $this->input->post('row_id');
        $data['get_requset']= $this->Job_request_model->get_by_id($row_id)[0];
        $this->load->view('admin/Human_resources/employee_forms/job_requests/load_details',$data);
    }

    public function Update_requset($id = false){

if ($this->input->post('id')) {
            $id = $this->input->post('id');
//            $data['get_requset'] = $this->Job_request_model->get_by_id($id)[0];
        }
        $data['title']= 'طلب احتياج وظيفة' ;
        $data['get_requset']= $this->Job_request_model->get_by_id($id)[0];
        $data['deparments']= $this->Job_request_model->get_departments();
       // $data['jobtitles']= $this->Job_request_model->select_all_defined(4);
        $data['jobtitles']= $this->Job_request_model->get_all_jobs();
        $data['job_type'] = $this->Job_request_model->select_forms_settings(1);
        $data['work_nature'] = $this->Job_request_model->select_forms_settings(2);
        $data['all_requsts']= $this->Job_request_model->dispaly_requests();

        if ($this->input->post('add')){
             $this->Job_request_model->update_request($id);
            $this->Job_request_model->add_request_details($id);
            $this->messages('success','تم التعديل بنجاح ');
           // redirect('human_resources/employee_forms/job_requests/Job_request','refresh');
             if ($this->input->post('from_profile')) {
                redirect('maham_mowazf/person_profile/Personal_profile', 'refresh');
            } else {
                redirect('human_resources/employee_forms/job_requests/Job_request', 'refresh');
            }
           
        }
        //$data['requets_js'] = $this->load->view('admin/Human_resources/employee_forms/job_requests/add_request_js', '', TRUE);
        $this->load->view('admin/Human_resources/employee_forms/job_requests/add_request', $data);


    }

    public function delete_request ($id, $from = false){
        $this->Job_request_model->delete_request($id);
        $this->Job_request_model->delete_all_items($id);
        $this->messages('success','تم الحذف بنجاح ');
       // redirect('human_resources/employee_forms/job_requests/Job_request','refresh');
       
         if (!empty($from) && ($from == 1)) {
            redirect('maham_mowazf/person_profile/Personal_profile', 'refresh');
        } else {
            redirect('human_resources/employee_forms/job_requests/Job_request', 'refresh');
        }
    }
    public function print_request(){

        $row_id = $this->input->post('row_id');
        $data['get_requset']= $this->Job_request_model->get_by_id($row_id)[0];
        $this->load->view('admin/Human_resources/employee_forms/job_requests/print_request', $data);


    }

// ******************************************************************************** //

    public function add_application(){// human_resources/employee_forms/job_requests/Job_request/add_application
        if($this->input->post('add')=== 'save_main_data'){
            $file=$this->upload_image("national_num_img");
            $personal_photo=$this->upload_image("personal_photo");
            //  $this->Job_request_model->insert_main_data($file);
            $this->Job_request_model->insert_main_data($file,$personal_photo);
            $this->messages('success', 'تم الإضافة بنجاح ');
            redirect('human_resources/employee_forms/job_requests/Job_request/add_application','refresh');
        }else{
            $data['gender'] = $this->Job_request_model->select_employees_settings(1);
            $data['nationalities'] = $this->Job_request_model->select_employees_settings(2);
            $data['social_status'] = $this->Job_request_model->select_employees_settings(4);
            //$data['jobs'] = $this->Job_request_model->select_forms_settings(3);
         
            $data['jobs'] = $this->Job_request_model->select_jobs_settings();
           // $this->test( $data['jobs']);
            $data['reach_us'] = $this->Job_request_model->select_forms_settings(4);
            $data['records'] = $this->Job_request_model->select_all('job_request_orders');
            $data['title'] = 'طلبات التوظيف';
            $data['subview'] = 'admin/Human_resources/employee_forms/job_requests/add_application';
            $this->load->view('admin_index', $data);
        }
    }

    public function update_application(){
        $id = $this->uri->segment(6);
        if($this->input->post('add')=== 'save_main_data'){
            $file=$this->upload_image("national_num_img");
            $personal_photo=$this->upload_image("personal_photo");
            $this->Job_request_model->update_main_data($file,$id,$personal_photo);
            $this->messages('success', ' تم التعديل');
            redirect('human_resources/employee_forms/job_requests/Job_request/add_application','refresh');
        }else{
            $data['gender'] = $this->Job_request_model->select_employees_settings(1);
            $data['nationalities'] = $this->Job_request_model->select_employees_settings(2);
            $data['social_status'] = $this->Job_request_model->select_employees_settings(4);
          //  $data['jobs'] = $this->Job_request_model->select_forms_settings(3);
            $data['jobs'] = $this->Job_request_model->select_jobs_settings();
            $data['reach_us'] = $this->Job_request_model->select_forms_settings(4);
            $data['result'] = $this->Job_request_model->getMaindataById($id);
            $data['personal_data'] = $this->Job_request_model->getMaindataById($this->uri->segment(6));

            //  $this->test($data['result']);
            $data['title'] = 'طلبات التوظيف';
            $data['subview'] = 'admin/Human_resources/employee_forms/job_requests/add_application';
            $this->load->view('admin_index', $data);
        }
    }


    public function Delete_application($id){
        $this->Job_request_model->Delete_application($id);
        $this->messages('success','تم الحذف بنجاح ');
        redirect('human_resources/employee_forms/job_requests/Job_request/add_application','refresh');
    }
    /// ___________NAgwa 8-6 ________________
    public function put_date()
    {
        $interview_date= $this->input->post('valu');
        $id= $this->input->post('id');
        $this->Job_request_model->update_date($id,$interview_date);

    }

    public function make_application($id)
    {

        $data['record']=$this->Job_request_model->get_ById($id)[0];
        //$this->test($data['record']);
        $data['items'] = $this->Job_request_model->select_forms_settings(8);
        if($this->input->post('add'))
        {


            $this->Job_request_model->insert_file($id);

            $this->messages('success','تم الاضافه بنجاح ');
            redirect('human_resources/employee_forms/job_requests/Job_request/make_application/'.$id,'refresh');
        }
        $data['personal_data'] = $this->Job_request_model->getMaindataById($this->uri->segment(6));
        //==============================
        $data['degrees'] = $this->Job_request_model->get_degrees_from_tables($id);
        $data['positive'] = $this->Job_request_model-> get_points($id,1);
        $data['negative'] = $this->Job_request_model-> get_points($id,2);
        //==================================================


        $data['subview'] = 'admin/Human_resources/employee_forms/job_requests/interview';
        $this->load->view('admin_index', $data);
    }

    public function delete_point($id,$url)
    {
        $this->Job_request_model->delete_rec($id);
        redirect('human_resources/employee_forms/job_requests/Job_request/make_application/'.$url,'refresh');
    }

    public function offer_work($id)
    {

        if($this->input->post('add'))
        {


            $this->Job_request_model->insert_offer_work($id);

            $this->messages('success','تم الاضافه بنجاح ');
            redirect('human_resources/employee_forms/job_requests/Job_request/offer_work/'.$id,'refresh');
        }
        $data['personal_data'] = $this->Job_request_model->getMaindataById($this->uri->segment(6));
        $data['record']=$this->Job_request_model->get_from_table($id);


        $data['title']="عرض عمل";
        $data['subview'] = 'admin/Human_resources/employee_forms/job_requests/offerwork';
        $this->load->view('admin_index', $data);
    }

    public function add_previous_work()
    {
        if($this->input->post('add')){
            $id = $this->uri->segment(6);
            $this->Job_request_model->insert_previous_work();
            $this->messages('success','تمت الاضافه بنجاح ');
            redirect('human_resources/employee_forms/job_requests/Job_request/add_previous_work/'.$id,'refresh');
        }else{
            $data['personal_data'] = $this->Job_request_model->getMaindataById($this->uri->segment(6));
            $data['record']=$this->Job_request_model->get_job_request_by_id('hr_previous_work_job_orders');
            $data['jobtitles'] = $this->Job_request_model->select_all_defined(4);
            $data['degree_qual'] =$this->Job_request_model->select_search_key('employees_settings', 'type', '14');
            $data['qualification'] =$this->Job_request_model->select_search_key('employees_settings', 'type', '15');
            $data['title'] = 'الأعمال التي سبق العمل بها';
            $data['subview'] = 'admin/Human_resources/employee_forms/job_requests/previous_work';
            $this->load->view('admin_index', $data);
        }
    }

    public function add_record()
    {
        $data['jobtitles'] = $this->Job_request_model->select_all_defined(4);
        $data['degree_qual'] =$this->Job_request_model->select_search_key('employees_settings', 'type', '14');
        $data['qualification'] =$this->Job_request_model->select_search_key('employees_settings', 'type', '15');

        $type= $this->input->post('type');
        if($type==1) {
            $this->load->view('admin/Human_resources/employee_forms/job_requests/work_load_page', $data);
        }
        if($type==2) {
            $this->load->view('admin/Human_resources/employee_forms/job_requests/science_load_page', $data);
        }
        if($type==3) {
            $this->load->view('admin/Human_resources/employee_forms/job_requests/training_load_page', $data);
        }
        if($type==4) {
            $data['efficiency'] = $this->Job_request_model->select_forms_settings(5);
            $this->load->view('admin/Human_resources/employee_forms/job_requests/skills_load_page', $data);
        }
        if($type==5) {
            $data['len']= $this->input->post('len');
            $this->load->view('admin/Human_resources/employee_forms/job_requests/recognize_load_page', $data);
        }
    }

    public function delete_record()
    {
        $redir=$this->uri->segment(6);
        $id=$this->uri->segment(7);
        $table=$this->uri->segment(8);
        $method=$this->uri->segment(9);
        $this->Job_request_model->delete_from_table($id,$table);
        $this->messages('success','تم الحذف بنجاح ');
        redirect('human_resources/employee_forms/job_requests/Job_request/'.$method.'/'.$redir,'refresh');

    }

    public function add_science_qualification()
    {
        if($this->input->post('add')){
            $id = $this->uri->segment(6);
            $files = $this->upload_muli_image('userfile');
            $this->Job_request_model->insert_science_data($files);
            $this->messages('success','تمت الاضافه بنجاح ');
            redirect('human_resources/employee_forms/job_requests/Job_request/add_science_qualification/'.$id,'refresh');
        }else{
            $data['personal_data'] = $this->Job_request_model->getMaindataById($this->uri->segment(6));
            $data['record']=$this->Job_request_model->get_job_request_by_id('hr_qualification_job_orders');
            $data['jobtitles'] = $this->Job_request_model->select_all_defined(4);
            $data['degree_qual'] =$this->Job_request_model->select_search_key('employees_settings', 'type', '14');
            $data['qualification'] =$this->Job_request_model->select_search_key('employees_settings', 'type', '15');
            $data['title'] = 'المؤهلات العلمية';
            $data['subview'] = 'admin/Human_resources/employee_forms/job_requests/science_qualification';
            $this->load->view('admin_index', $data);
        }
    }

    public function add_dawrat()
    {
        if($this->input->post('add')){
            $id = $this->uri->segment(6);
            $files = $this->upload_muli_image('userfile');
            $this->Job_request_model->insert_dawrat_data($files);
            $this->messages('success','تمت الاضافه بنجاح ');
            redirect('human_resources/employee_forms/job_requests/Job_request/add_dawrat/'.$id,'refresh');
        }else{
            $data['personal_data'] = $this->Job_request_model->getMaindataById($this->uri->segment(6));
            $data['record']=$this->Job_request_model->get_job_request_by_id('hr_dwrat_job_orders');
            $data['jobtitles'] = $this->Job_request_model->select_all_defined(4);
            $data['degree_qual'] =$this->Job_request_model->select_search_key('employees_settings', 'type', '14');
            $data['qualification'] =$this->Job_request_model->select_search_key('employees_settings', 'type', '15');
            $data['title'] = 'الدورات التدريبية';
            $data['subview'] = 'admin/Human_resources/employee_forms/job_requests/dawrat';
            $this->load->view('admin_index', $data);
        }
    }

    public function add_skills()
    {
        if($this->input->post('add')){
            $id = $this->uri->segment(6);
            $this->Job_request_model->insert_hopies_skills();

            $this->messages('success','تمت الاضافه بنجاح ');
            redirect('human_resources/employee_forms/job_requests/Job_request/add_skills/'.$id,'refresh');
        }else{
            $data['personal_data'] = $this->Job_request_model->getMaindataById($this->uri->segment(6));
            $data['record']=$this->Job_request_model->get_job_request_by_id('hr_skills_job_orders');
            $data['jobtitles'] = $this->Job_request_model->select_all_defined(4);
            $data['efficiency'] = $this->Job_request_model->select_forms_settings(5);
            $data['degree_qual'] =$this->Job_request_model->select_search_key('employees_settings', 'type', '14');
            $data['qualification'] =$this->Job_request_model->select_search_key('employees_settings', 'type', '15');
            $data['title'] = 'الهوايات ومهارات';
            $data['subview'] = 'admin/Human_resources/employee_forms/job_requests/skills';
            $this->load->view('admin_index', $data);
        }
    }

    public function add_persons()
    {
        if($this->input->post('add')){
            $id = $this->uri->segment(6);
            $this->Job_request_model->insert_persons_job();
            $this->messages('success','تمت الاضافه بنجاح ');
            redirect('human_resources/employee_forms/job_requests/Job_request/add_persons/'.$id,'refresh');
        }else{
            $data['personal_data'] = $this->Job_request_model->getMaindataById($this->uri->segment(6));
            $data['record']=$this->Job_request_model->get_job_request_by_id('hr_persons_job_orders');
            $data['jobtitles'] = $this->Job_request_model->select_all_defined(4);
            $data['degree_qual'] =$this->Job_request_model->select_search_key('employees_settings', 'type', '14');
            $data['qualification'] =$this->Job_request_model->select_search_key('employees_settings', 'type', '15');
            $data['title'] = 'المعرفون';
            $data['subview'] = 'admin/Human_resources/employee_forms/job_requests/persons';
            $this->load->view('admin_index', $data);
        }
    }
    public function read_file($file_name)
    {
        $this->load->helper('file');

        $file_path = 'uploads/human_resource/job_request/'.$file_name;
        header('Content-Type: application/pdf');
        header('Content-Discription:inline; filename="'.$file_name.'"');
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges:bytes');
        header('Content-Length: ' . filesize($file_path));
        readfile($file_path);
    }
    
    
    
        public function print()
    {
        $data['title'] = "طلب توظيف ";
        $row_id = $this->input->post('row_id');
        $data['publisher_name'] = $this->Job_request_model->getUserName($_SESSION['user_id']);
        $data['personal_data'] = $this->Job_request_model->getMaindataById($this->uri->segment(6));
        //$this->test($data['personal_data']);
        $data['get_all'] = $this->Job_request_model->get_by_id_print($row_id)[0];
      //  $this->test($data['get_all']);
        
        $data['gender_id_fk'] =$this->Job_request_model->select_search_key('employees_settings', 'id_setting', $data['get_all']->gender_id_fk );
        
        $data['nationality_id_fk'] =$this->Job_request_model->select_search_key('employees_settings', 'id_setting', $data['get_all']->nationality_id_fk );
        
        $data['social_status'] =$this->Job_request_model->select_search_key('employees_settings', 'id_setting', $data['get_all']->social_status );
        
        $data['job_request_id_fk'] =$this->Job_request_model->select_search_key('hr_forms_settings', 'id_setting', $data['get_all']->job_request_id_fk );
        
        $data['method_reached'] =$this->Job_request_model->select_search_key('hr_forms_settings', 'id_setting', $data['get_all']->method_reached );
          $data['get_prv'] = $this->Job_request_model->get_by_id_prv($row_id)[0];
          if(!empty( $data['get_prv']))
          {
         $data['job_id_title_fk'] =$this->Job_request_model->select_search_key('all_defined_setting', 'defined_id', $data['get_prv']->job_id_title_fk );
          }
         
         $data['get_qua'] = $this->Job_request_model->get_by_id_qua($row_id)[0];
         if(!empty( $data['get_qua']))
          {
         $data['degree_id_fk'] =$this->Job_request_model->select_search_key('employees_settings', 'id_setting', $data['get_qua']->degree_id_fk );
         
         $data['qualification_id_fk'] =$this->Job_request_model->select_search_key('employees_settings', 'id_setting', $data['get_qua']->qualification_id_fk );
          }
          
         $data['get_dwrat'] = $this->Job_request_model->get_by_id_dwrat($row_id)[0];
        
         $data['get_skills'] = $this->Job_request_model->get_by_id_skills($row_id)[0];
      
         if(!empty( $data['get_skills']))
         {
         $data['efficiency_id_fk'] =$this->Job_request_model->select_search_key('hr_forms_settings', 'id_setting', $data['get_skills']->efficiency_id_fk );
         }
         $data['get_person'] = $this->Job_request_model->get_by_id_person($row_id)[0];
         //$this->test($data);

         $this->load->view('admin/Human_resources/employee_forms/job_requests/print_view', $data);

    }
    public function applicationsDetails(){//human_resources/employee_forms/Job_requests/Job_request/applicationsDetails
      //  $data['jobs'] = $this->Job_request_model->select_forms_settings_titles(3);
      $data['jobs'] = $this->Job_request_model->select_jobs_settings();
       $data['records'] = $this->Job_request_model->all_before_interview();
      // $this->test($data['records']);
       $data['title'] = 'المقابلات الشخصية';
       $data['subview'] = 'admin/Human_resources/employee_forms/job_requests/applicationsDetails';
       $this->load->view('admin_index', $data);
 
}  
public function work_offers(){//human_resources/employee_forms/Job_requests/Job_request/work_offers
  //  $data['jobs'] = $this->Job_request_model->select_forms_settings_titles(3);
  $data['jobs'] = $this->Job_request_model->select_jobs_settings();
   $data['records'] = $this->Job_request_model->all_after_interview();
  // $this->test($data['records']);
   $data['title'] = ' اضافه عرض العمل';
   $data['subview'] = 'admin/Human_resources/employee_forms/job_requests/work_offers';
   $this->load->view('admin_index', $data);

}

}