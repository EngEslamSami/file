<?php
class BeneficiaryAffairs extends MY_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->library('pagination');
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }
        $this->load->helper(array('url', 'text', 'permission', 'form'));

        
        
        
               /**********************************************************/ 
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in  = $this->Counting->get_basic_in_num();
        $this->files_basic_in  = $this->Counting->get_files_basic_in();  
      /*************************************************************/
    }
    //-----------------------------------------
    private function test($data = array()){
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }
    //-----------------------------------------
    private function thumb($data)
    {
        $config['image_library'] = 'gd2';
        $config['source_image'] = $data['full_path'];
        $config['new_image'] = 'uploads/thumbs/' . $data['file_name'];
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['thumb_marker'] = '';
        $config['width'] = 275;
        $config['height'] = 250;
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
    }
    //-----------------------------------------
    private function upload_image($file_name)
    {
        $config['upload_path'] = 'uploads/images';
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf';
        $config['max_size'] = '1024*8';
        $config['encrypt_name'] = true;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($file_name)) {
            return false;
        } else {
            $datafile = $this->upload->data();
            $this->thumb($datafile);
            return $datafile['file_name'];
        }
    }
    //-----------------------------------------
    private function upload_file($file_name)
    {
        $config['upload_path'] = 'uploads/files';
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
        $config['max_size'] = '1024*8';
        $config['overwrite'] = true;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($file_name)) {
            return false;
        } else {
            $datafile = $this->upload->data();
            return $datafile['file_name'];
        }
    }
    //-----------------------------------------
    private function url()
    {
        unset($_SESSION['url']);
        $this->session->set_flashdata('url', 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
    }
    //-----------------------------------------
    private function message($type, $text)
    {
        if ($type == 'success') {
            return $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <strong> تم بنجاح!</strong> ' . $text . '.
                                                </div>');
        } elseif ($type == 'wiring') {
            return $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissable">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <strong> تحذير  !</strong> ' . $text . '.
                                                </div>');
        } elseif ($type == 'error') {
            return $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <strong>خطأ!</strong> ' . $text . '.
                                                </div>');
        }
    }
    //-----------------------------------------
    /**
     *  ================================================================================================================
     *
     *  ----------------------------------------------------------------------------------------------------------------
     *
     * -----------------------------------------------------------------------------------------------------------------
     */
     public function index(){}
    /**
     *  ================================================================================================================
     *
     *                                            صلاحيات  موظفى إدارة المستفيدين
     *
     *
     */
     public  function EmployeeRoles(){   //BeneficiaryAffairs/EmployeeRoles
         $this->load->model('beneficiary_affairs_models/Model_beneficiary_affairs');
          
         $data["all_employees"]=$this->Model_beneficiary_affairs->select_employee();
         $data['title'] = 'صلاحيات الموظفين ';
         $data['metakeyword'] = 'صلاحيات الموظفين ';
         $data['metadiscription'] = 'صلاحيات الموظفين ';
         $data['subview'] = 'admin/beneficiary_affairs/add_employee_roles';
         $this->load->view('admin_index', $data);
     }
     //=================================================================================
    public function AddEmployeeRoles($emp_code){
        $this->load->model('beneficiary_affairs_models/Model_beneficiary_affairs');
        if($this->input->post("operation")  =="UPDATE"){
            $this->Model_beneficiary_affairs->delete_emp_role($emp_code);
            if(sizeof($this->input->post("roles")) > 0){
                $this->Model_beneficiary_affairs->insert_emp_role($emp_code);
            }
            redirect('BeneficiaryAffairs/EmployeeRoles', 'refresh');
        }
        if($this->input->post("operation")  =="INSERT"){
            if(sizeof($this->input->post("roles")) > 0){
                $this->Model_beneficiary_affairs->insert_emp_role($emp_code);
            }
            redirect('BeneficiaryAffairs/EmployeeRoles', 'refresh');
        }
    }
    /**
     *  ----------------------------------------------------------------------------------------------
     *
     *
     */
    public function FileDetails($id){  // BeneficiaryAffairs/FileDetails/
        $this->load->model('beneficiary_affairs_models/Model_beneficiary_affairs');
        $this->load->model('beneficiary_affairs_models/Nationality_model');
        $this->load->model('beneficiary_affairs_models/Area');
        $this->load->model('beneficiary_affairs_models/Person');
        $this->load->model('beneficiary_affairs_models/Researcher_opinion');

         
        $result = $this->Person->getById($id);
        $data['result'] = $result[0];
        $data['result_kids'] = $result[1];
        
        $result_researcher_opinion=$this->Researcher_opinion->getById($id);
                 if(is_array($result_researcher_opinion)){
                 $data['result_researcher_opinion']=$result_researcher_opinion;    
                 }
        
        $data['area'] = $this->Area->select();
        $data['nationality'] = $this->Nationality_model->select();
        $data["file_id"]=$id;
        $data["buttun_roles"]=$this->Model_beneficiary_affairs->get_sesstion_roles($_SESSION['role_id_fk'],$_SESSION["emp_code"]);
        $data["convent"]=$this->Model_beneficiary_affairs->all_convent(1);
        $data['all_operation']=$this->Model_beneficiary_affairs->select_operation($id);
        $data['jobs_name']=$this->Model_beneficiary_affairs->jobs_id();
        $data['title'] = ' تفاصيل  طالب المساعدة';
        $data['metakeyword'] = ' تفاصيل  طالب المساعدة';
        $data['metadiscription'] = ' تفاصيل  طالب المساعدة';
        $data['subview'] = 'admin/beneficiary_affairs/file_details';
        $this->load->view('admin_index', $data);
    }
    public  function AllFilesDetails(){   // BeneficiaryAffairs/AllFilesDetails
    $this->load->model('beneficiary_affairs_models/Person');
    $data['records'] = $this->Person->select_data();
    $data['title'] = '   طالبات المساعدة';
    $data['metakeyword'] = '   طالبات المساعدة';
    $data['metadiscription'] = '   طالبات المساعدة';
    $data['subview'] = 'admin/beneficiary_affairs/all_file_details';
    $this->load->view('admin_index', $data);
}
    public function OperationInFile($process,$file_id){  //  BeneficiaryAffairs/OperationInFile
        $this->load->model('beneficiary_affairs_models/Model_beneficiary_affairs');
        $this->Model_beneficiary_affairs->insert_operation($process,$file_id);
        $this->Model_beneficiary_affairs->update_file_state($file_id,$process);
        redirect("BeneficiaryAffairs/FileDetails/".$file_id, 'refresh');
    }
    /**
     *  ================================================================================================================
     *
     *                                            dina reda
     *
     *
     */
    public function area_settings(){ // BeneficiaryAffairs/area_settings
        $this->load->model('beneficiary_affairs_models/Area');
        if ($this->input->post('add')) {
            $this->Area->insert();
            $this->message('success', 'إضافة منطقة');
            redirect('BeneficiaryAffairs/area_settings', 'refresh');
        }
        $data['records'] = $this->Area->select();
        $data['title'] = 'إضافة منطقة';
        $data['metakeyword'] = 'إعدادات المناطق';
        $data['metadiscription'] = '';
        $data['subview']= 'admin/beneficiary_affairs/area_settings/area_settings';
        $this->load->view('admin_index',$data);
    }
    public function delete_area_settings($id)
    {
        $this->load->model('beneficiary_affairs_models/Area');
        $this->Area->delete($id);
        $this->message('success', 'حذف المناطق');
        redirect('BeneficiaryAffairs/area_settings', 'refresh');
    }
    public function update_area_settings($id)
    {
        $this->load->model('beneficiary_affairs_models/Area');
        if ($this->input->post('update')) {
            $this->Area->update($id);
            $this->message('success', 'تعديل المنطقة');
            redirect('BeneficiaryAffairs/area_settings', 'refresh');
        }
        $data['result'] = $this->Area->getById($id);
        $data["links"] = $this->pagination->create_links();
        $data['title'] = 'تعديل المنطقة .';
        $data['metakeyword'] = 'إعدادات المناطق';
        $data['metadiscription'] = '';
        $data['subview'] = 'admin/beneficiary_affairs/area_settings/area_settings';
        $this->load->view('admin_index', $data);
    }
    ////////////////////////////////////////////////
    public function nationality_settings(){ // BeneficiaryAffairs/nationality_settings
        $this->load->model('beneficiary_affairs_models/Nationality_model');
        
        if ($this->input->post('add')) {
            $this->Nationality_model->insert();
            $this->message('success', 'إضافة الجنسيات');
            redirect('BeneficiaryAffairs/nationality_settings', 'refresh');
        }
        $data['records'] = $this->Nationality_model->select();
        $data['title'] = 'إضافة جنسية';
        $data['metakeyword'] = 'إعدادات الجنسيات';
        $data['metadiscription'] = '';
        $data['subview']= 'admin/beneficiary_affairs/nationality_settings/nationality_settings';
        $this->load->view('admin_index',$data);
    }
    public function delete_nationality_settings($id)
    {
        $this->load->model('beneficiary_affairs_models/Nationality_model');
        $this->Nationality_model->delete($id);
        $this->message('success', 'حذف الجنسيات');
        redirect('BeneficiaryAffairs/nationality_settings', 'refresh');
    }
    public function update_nationality_settings($id)
    {
        $this->load->model('beneficiary_affairs_models/Nationality_model');
        if ($this->input->post('update')) {
            $this->Nationality_model->update($id);
            $this->message('success', 'تعديل الجنسيات');
            redirect('BeneficiaryAffairs/nationality_settings', 'refresh');
        }
        $data['result'] = $this->Nationality_model->getById($id);
        $data["links"] = $this->pagination->create_links();
        $data['title'] = 'تعديل الجنسيات .';
        $data['metakeyword'] = 'إعدادات الجنسيات';
        $data['metadiscription'] = '';
        $data['subview'] = 'admin/beneficiary_affairs/nationality_settings/nationality_settings';
        $this->load->view('admin_index', $data);
    }
///////////////////////////////
  /*  public function add_person(){
        $this->load->model('beneficiary_affairs_models/Nationality_model');
        $this->load->model('beneficiary_affairs_models/Area');
        $this->load->model('beneficiary_affairs_models/Person');
        
        if($this->input->post('add')){
            $this->Person->insert();
            $this->message('success','تم الحفظ');
            redirect('BeneficiaryAffairs/add_person','refresh');
        }
        if($this->input->post('num'))
        {
            $data = '';
            if($this->input->post('num') != 0)
                $this->load->view('admin/beneficiary_affairs/add_person/table',$data);
        }
        else
        {
            $data['records'] = $this->Person->select_data();
            $data['area'] = $this->Area->select();
            $data['nationality'] = $this->Nationality_model->select();
            $data['title'] = 'إستمارة طلب مساعدة  .';
            $data['metakeyword'] = 'إستمارة طلب مساعدة ';
            $data['metadiscription'] = '';
            $data['subview'] = 'admin/beneficiary_affairs/add_person/add_person';
            $data['subview'] = 'admin/beneficiary_affairs/add_person/add_person';
            $this->load->view('admin_index', $data);
        }

    } */


  /*  public function update_person($id)
    {
        $this->load->model('beneficiary_affairs_models/Nationality_model');
        $this->load->model('beneficiary_affairs_models/Area');
        $this->load->model('beneficiary_affairs_models/Person');
        if($this->input->post('update_person')){
            $this->Person->update($id);
            $this->message('success','تم التعديل');
            redirect('BeneficiaryAffairs/add_person','refresh');
        }
        if($this->input->post('num'))
        {
            $data = '';
            if($this->input->post('num') != 0)
                $this->load->view('admin/beneficiary_affairs/add_person/table',$data);
        }
        else
        {
            $data['result'] = $this->Person->getById($id);

            $data['result1'] = $data['result'][0];
            $data['result2'] = $data['result'][1];
            $data['area'] = $this->Area->select();
            $data['nationality'] = $this->Nationality_model->select();
            $data['title'] = 'تعديل تعريف عن طالب المساعدة';
            $data['metakeyword'] = 'تعديل بيانات';
            $data['metadiscription'] = '';
            $data['subview'] = 'admin/beneficiary_affairs/add_person/add_person';
            $this->load->view('admin_index', $data);
        }
    } */

  /*  public function delete_person($id){
        $this->load->model('beneficiary_affairs_models/Person');
        $this->Person->delete($id);
        redirect('BeneficiaryAffairs/add_person');
    } */
 public function add_person(){ //  BeneficiaryAffairs/add_person
        $this->load->model('beneficiary_affairs_models/Nationality_model');
        $this->load->model('beneficiary_affairs_models/Area');
        $this->load->model('beneficiary_affairs_models/Person');
         $this->load->model('Public_settings_models/Living');
        
        if($this->input->post('add')){
            $this->Person->insert();
            $this->message('success','تم الحفظ');
            redirect('BeneficiaryAffairs/add_person','refresh');
        }
        if($this->input->post('num'))
        {
            $data = '';
            if($this->input->post('num') != 0)
                $this->load->view('admin/beneficiary_affairs/add_person/table',$data);
        }
        else
        {
            $data['records_living'] = $this->Living->select();
            $data['records'] = $this->Person->select_data();
            $data['area'] = $this->Area->select();
            $data['nationality'] = $this->Nationality_model->select();
            $data['title'] = 'إستمارة طلب مساعدة  .';
            $data['metakeyword'] = 'إستمارة طلب مساعدة ';
            $data['metadiscription'] = '';
            $data['subview'] = 'admin/beneficiary_affairs/add_person/add_person';
            $data['subview'] = 'admin/beneficiary_affairs/add_person/add_person';
            $this->load->view('admin_index', $data);
        }

    }


    public function update_person($id){ // BeneficiaryAffairs/update_person
        $this->load->model('beneficiary_affairs_models/Nationality_model');
        $this->load->model('beneficiary_affairs_models/Area');
        $this->load->model('beneficiary_affairs_models/Person');
        $this->load->model('Public_settings_models/Living');
        if($this->input->post('update')){
            $this->Person->update_person($id);
            $this->message('success','تم التعديل');
            redirect('BeneficiaryAffairs/add_person','refresh');
        }
        if($this->input->post('num'))
        {
            $data = '';
            if($this->input->post('num') != 0)
            $this->load->view('admin/beneficiary_affairs/add_person/table',$data);
        }
        else
        {
            $data['records_living'] = $this->Living->select();
            $data['result'] = $this->Person->getById($id);
            $data['result1'] = $data['result'][0];
            $data['result2'] = $data['result'][1];
            $data['area'] = $this->Area->select();
            $data['nationality'] = $this->Nationality_model->select();
            $data['title'] = 'تعديل تعريف عن طالب المساعدة';
            $data['metakeyword'] = 'تعديل بيانات';
            $data['metadiscription'] = '';
            $data['subview'] = 'admin/beneficiary_affairs/add_person/add_person';
            $this->load->view('admin_index', $data);
        }
    }

    public function delete_person($id){
        $this->load->model('beneficiary_affairs_models/Person');
        $this->Person->delete($id);
        redirect('BeneficiaryAffairs/add_person');
    }
/**
 *  =========================================================================================
 * 
 * 
 *  */
     public function researcher_opinion($id){ //  BeneficiaryAffairs/researcher_opinion/
    $this->load->model("Difined_model");
  
      $this->load->model("beneficiary_affairs_models/Researcher_opinion");
    $data['mother_national_num']=$id;
         $result=$this->Researcher_opinion->getById($id);
         if(is_array($result)){
         $data['result']=$result;    
         }
    if($this->input->post('add')){
        
        $researcher_name='';$family_leader_name='';
          if($_SESSION['status']==0 && $_SESSION['dep_job_id_fk']==3 ){
            $researcher_name=$_SESSION['user_username'];
          }elseif($_SESSION['status']==1 && $_SESSION['dep_job_id_fk']==3){
            $family_leader_name=$_SESSION['user_username'];
          }
        $this->Researcher_opinion->inserted($id,$researcher_name,$family_leader_name);
        redirect('BeneficiaryAffairs/researcher_opinion/'.$id);
        }
    if($this->input->post('update')){
    
          $researcher_name='';$family_leader_name='';
          if($_SESSION['status']==0 && $_SESSION['dep_job_id_fk']==3 ){
            $researcher_name=$_SESSION['user_username'];
          }elseif($_SESSION['status']==1 && $_SESSION['dep_job_id_fk']==3){
            $family_leader_name=$_SESSION['user_username'];
          }
        $this->Researcher_opinion->updated($id,$researcher_name,$family_leader_name);
           redirect('BeneficiaryAffairs/researcher_opinion/'.$id);
       } 
      $data['title'] = 'رأى الباحث'; 
   $data['subview'] = 'admin/beneficiary_affairs/researcher_opinion';
   $this->load->view('admin_index', $data);  
   }
 


}// END CLASS