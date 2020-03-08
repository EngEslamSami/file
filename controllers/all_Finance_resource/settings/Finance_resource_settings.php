<?php
class Finance_resource_settings extends MY_Controller
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
        /*  $this->load->model('Nationality');
          $this->load->model('Department');
          $this->load->model('finance_resource_models/Guaranty');
          $this->load->model('finance_resource_models/Endowments');
          $this->load->model('finance_resource_models/Operation_guaranty');
          $this->load->model('finance_resource_models/Donors');
          $this->load->model('finance_resource_models/Donors_gurantee'); */

        $this->load->model('system_management/Groups');
        $this->main_groups = $this->Groups->main_fetch_group();
        $this->groups = $this->Groups->get_group($_SESSION["group_number"]);
        $this->groups_title = $this->Groups->get_group_title($_SESSION["group_number"]);

        /**********************************************************/
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in = $this->Counting->get_basic_in_num();
        $this->files_basic_in = $this->Counting->get_files_basic_in();
        /*************************************************************/

        $this->load->model('all_Finance_resource_models/settings/Finance_resource_setting');
        $this->myarray = $this->Finance_resource_setting->all_settings();



        $this->typesDatabase = array(
            'kafalat_type'=>'fr_kafalat_types_setting',
            'kafel_status_1'=>'fr_kafalat_kafel_status',
            'kafel_status_2'=>'fr_kafalat_kafel_status',


        );
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
            return $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> تم بنجاح!</strong> ' . $text . '.</div>');
        } elseif ($type == 'wiring') {
            return $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> تحذير  !</strong> ' . $text . '.</div>');
        } elseif ($type == 'error') {
            return $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>خطأ!</strong> ' . $text . '.</div>');
        }
        
            }




    public function settings($type=0){    // all_Finance_resource/settings/Finance_resource_settings/settings

        $data['typee']= $type;
        $data['all']= $this->Finance_resource_setting->get_all_data_fr_settings($this->myarray);
        $data['kafalat_types'] = $this->Finance_resource_setting->all_frk_settings('fr_kafalat_types_setting');
        $data['halatkafala'] = $this->Finance_resource_setting->all_frhk_settings('fr_kafalat_kafel_status',1);
        $data['halatkafalel'] = $this->Finance_resource_setting->all_frhk_settings('fr_kafalat_kafel_status',2);

        $data['kafala_type'] =   $this->Finance_resource_setting->get_kafala_types();
        $data['halet_kafalaat_reasons_settings'] =   $this->Finance_resource_setting->get_halet_kafalaat_reasons_settings();
        $data['subview'] = 'admin/all_Finance_resource_views/settings/fr_settings/allFrSettings';
        $this->load->view('admin_index', $data);
    }





    public function AddSitting($type){  // all_Finance_resource/settings/Finance_resource_settings/AddSitting

        if($this->input->post('add')){
            $this->Finance_resource_setting->add_fr_settings($type);
            $this->message('success','إضافة '.$this->myarray[$type]['title']);
            redirect('all_Finance_resource/settings/Finance_resource_settings/settings/'.$type ,'refresh');
        }
        elseif($this->input->post($type)=='kafalat_type'){

            $this->Finance_resource_setting->add_kfr_settings($this->typesDatabase[$type]);
            $this->message('success','إضافة ');
            redirect('all_Finance_resource/settings/Finance_resource_settings/settings/'.$type ,'refresh');
        }

        elseif($this->input->post($type)=='kafel_status_1'){

            $this->Finance_resource_setting->add_kfr_settings($this->typesDatabase[$type]);
            $this->message('success','إضافة ');
            redirect('all_Finance_resource/settings/Finance_resource_settings/settings/'.$type ,'refresh');
        }
        elseif($this->input->post($type)=='kafel_status_2'){

            $this->Finance_resource_setting->add_kfr_settings($this->typesDatabase[$type]);
            $this->message('success','إضافة ');
            redirect('all_Finance_resource/settings/Finance_resource_settings/settings/'.$type ,'refresh');
        }
        
         elseif ($this->input->post($type)=='fr_sponser_donor'){
            $this->Finance_resource_setting->add_kafala_types();
            $this->message('success','إضافة ');
            redirect('all_Finance_resource/settings/Finance_resource_settings/settings/'.$type ,'refresh');

        }

        elseif ($this->input->post($type)=='halet_kafalaat_reasons'){
            $this->Finance_resource_setting->add_halet_kafalaat_reasons();
            $this->message('success','إضافة ');
            redirect('all_Finance_resource/settings/Finance_resource_settings/settings/'.$type ,'refresh');

        }
        
        
        

    }
    public function UpdateSitting($id,$type){
        $data['record'] = $this->Finance_resource_setting->getById_fr_settings($id);
        $data['halet_kafalaat_reasons_settings_result'] = $this->Finance_resource_setting->getById_halet_kafalaat_reasons_settings($id);
        $data['kafala'] = $this->Finance_resource_setting->getById_frk_settings($id,'fr_kafalat_types_setting');
        $data['hakafala'] = $this->Finance_resource_setting->getById_frk_settings($id,'fr_kafalat_kafel_status');
        $data['hakafalel'] = $this->Finance_resource_setting->getById_frk_settings($id,'fr_kafalat_kafel_status');
        $data['hakafalel'] = $this->Finance_resource_setting->getById_frk_settings($id,'fr_kafalat_kafel_status');
        $data['typee'] = $type ;
        $data['disabled'] = 'disabled' ;
        $data["id"]=$id;
        if(isset($this->myarray[$type])){
            $data["type_name"]=$this->myarray[$type];
        }

        if($this->input->post('add')){
            $this->Finance_resource_setting->update_fr_settings($id);
            $this->message('success',' تحديث البيانات');
            redirect('all_Finance_resource/settings/Finance_resource_settings/settings/'.$type,'refresh');
        }elseif($this->input->post($type)=='kafalat_type'){

    $this->Finance_resource_setting->update_frk_settings($this->typesDatabase[$type],$id);
    $this->message('success','تحديث البيانات ');
    redirect('all_Finance_resource/settings/Finance_resource_settings/settings/'.$type ,'refresh');
}elseif($this->input->post($type)=='kafel_status_1'){
            $this->Finance_resource_setting->update_frk_settings($this->typesDatabase[$type],$id);
            $this->message('success',' تحديث البيانات');
            redirect('all_Finance_resource/settings/Finance_resource_settings/settings/'.$type,'refresh');
        }elseif($this->input->post($type)=='kafel_status_2'){
            $this->Finance_resource_setting->update_frk_settings($this->typesDatabase[$type],$id);
            $this->message('success',' تحديث البيانات');
            redirect('all_Finance_resource/settings/Finance_resource_settings/settings/'.$type,'refresh');
        }
        
  elseif($this->input->post($type)=='fr_sponser_donor'){
            $this->Finance_resource_setting->update_kafala_types($id);
            $this->message('success',' تحديث البيانات');
            redirect('all_Finance_resource/settings/Finance_resource_settings/settings/'.$type,'refresh');
        }elseif($this->input->post($type)=='halet_kafalaat_reasons'){
            $this->Finance_resource_setting->update_halet_kafalaat_reasons($id);
            $this->message('success',' تحديث البيانات');
            redirect('all_Finance_resource/settings/Finance_resource_settings/settings/'.$type,'refresh');
        }




        $data['kafala_types'] = $this->Finance_resource_setting->getById_kafala_types($id);

        $data['title'] = 'تعديل ';
        $data['subview'] = 'admin/all_Finance_resource_views/settings/fr_settings/allFrSettings';
        $this->load->view('admin_index', $data);
    }


    public function Deletehalet_kafalaat_reasons($id){
        $type="halet_kafalaat_reasons";
        $this->Finance_resource_setting->delete_halet_kafalaat_reasons($id);
        $this->message('success','حذف ');
        redirect('all_Finance_resource/settings/Finance_resource_settings/settings/'.$type,'refresh');
    }

/*
    public function AddSitting($type){  // all_Finance_resource/settings/Finance_resource_settings/AddSitting

        if($this->input->post('add')){
            $this->Finance_resource_setting->add_fr_settings($type);
            $this->message('success','إضافة '.$this->myarray[$type]['title']);
            redirect('all_Finance_resource/settings/Finance_resource_settings/settings/'.$type ,'refresh');
        }
        elseif($this->input->post($type)=='kafalat_type'){

            $this->Finance_resource_setting->add_kfr_settings($this->typesDatabase[$type]);
            $this->message('success','إضافة ');
            redirect('all_Finance_resource/settings/Finance_resource_settings/settings/'.$type ,'refresh');
        }

        elseif($this->input->post($type)=='kafel_status_1'){

            $this->Finance_resource_setting->add_kfr_settings($this->typesDatabase[$type]);
            $this->message('success','إضافة ');
            redirect('all_Finance_resource/settings/Finance_resource_settings/settings/'.$type ,'refresh');
        }
        elseif($this->input->post($type)=='kafel_status_2'){

            $this->Finance_resource_setting->add_kfr_settings($this->typesDatabase[$type]);
            $this->message('success','إضافة ');
            redirect('all_Finance_resource/settings/Finance_resource_settings/settings/'.$type ,'refresh');
        }
        
         elseif ($this->input->post($type)=='fr_sponser_donor'){
            $this->Finance_resource_setting->add_kafala_types();
            $this->message('success','إضافة ');
            redirect('all_Finance_resource/settings/Finance_resource_settings/settings/'.$type ,'refresh');

        }
        
        
        

    }
    public function UpdateSitting($id,$type){
        $data['record'] = $this->Finance_resource_setting->getById_fr_settings($id);
        $data['kafala'] = $this->Finance_resource_setting->getById_frk_settings($id,'fr_kafalat_types_setting');
        $data['hakafala'] = $this->Finance_resource_setting->getById_frk_settings($id,'fr_kafalat_kafel_status');
        $data['hakafalel'] = $this->Finance_resource_setting->getById_frk_settings($id,'fr_kafalat_kafel_status');
        $data['typee'] = $type ;
        $data['disabled'] = 'disabled' ;
        $data["id"]=$id;
        if(isset($this->myarray[$type])){
            $data["type_name"]=$this->myarray[$type];
        }

        if($this->input->post('add')){
            $this->Finance_resource_setting->update_fr_settings($id);
            $this->message('success',' تحديث البيانات');
            redirect('all_Finance_resource/settings/Finance_resource_settings/settings/'.$type,'refresh');
        }elseif($this->input->post($type)=='kafalat_type'){

    $this->Finance_resource_setting->update_frk_settings($this->typesDatabase[$type],$id);
    $this->message('success','تحديث البيانات ');
    redirect('all_Finance_resource/settings/Finance_resource_settings/settings/'.$type ,'refresh');
}elseif($this->input->post($type)=='kafel_status_1'){
            $this->Finance_resource_setting->update_frk_settings($this->typesDatabase[$type],$id);
            $this->message('success',' تحديث البيانات');
            redirect('all_Finance_resource/settings/Finance_resource_settings/settings/'.$type,'refresh');
        }elseif($this->input->post($type)=='kafel_status_2'){
            $this->Finance_resource_setting->update_frk_settings($this->typesDatabase[$type],$id);
            $this->message('success',' تحديث البيانات');
            redirect('all_Finance_resource/settings/Finance_resource_settings/settings/'.$type,'refresh');
        }
        
  elseif($this->input->post($type)=='fr_sponser_donor'){
            $this->Finance_resource_setting->update_kafala_types($id);
            $this->message('success',' تحديث البيانات');
            redirect('all_Finance_resource/settings/Finance_resource_settings/settings/'.$type,'refresh');
        }
        
        
        
          $data['kafala_types'] = $this->Finance_resource_setting->getById_kafala_types($id);

        $data['title'] = 'تعديل ';
        $data['subview'] = 'admin/all_Finance_resource_views/settings/fr_settings/allFrSettings';
        $this->load->view('admin_index', $data);
    }
*/

    public function DeleteSitting($id,$type){
        $this->Finance_resource_setting->delete_fr_settings($id);
        $this->message('success','حذف ');
        redirect('all_Finance_resource/settings/Finance_resource_settings/settings/'.$type,'refresh');
    }

    public function DeleteSittingKafala($type,$id){
        $this->Finance_resource_setting->delete_fr_settingsKa($id,$this->typesDatabase[$type]);
        $this->message('success','حذف ');
        redirect('all_Finance_resource/settings/Finance_resource_settings/settings/'.$type,'refresh');
    }
    
    
    	
	  public function DeleteKafalaTypes($id){
        $type="fr_sponser_donor";
        $this->Finance_resource_setting->delete_kafala_types($id);
        $this->message('success','حذف ');
        redirect('all_Finance_resource/settings/Finance_resource_settings/settings/'.$type,'refresh');
    }
   /**************************************************************/
   
     /*  public function add_gathering_place(){

        // all_Finance_resource/settings/Finance_resource_settings/add_gathering_place
        $this->load->model('all_Finance_resource_models/settings/Gathering_place_model');
        if($this->input->post('add')){
           //$this->test($_POST);
            $this->Gathering_place_model->insert();
            $this->message('success','إضافة جهات التحصيل');
            redirect('all_Finance_resource/settings/Finance_resource_settings/add_gathering_place' ,'refresh');
        }else{
            $data['mainDepartments'] = $this->Gathering_place_model->select_all_departments();
            $data['records'] =$this->Gathering_place_model->select_all();

            //$this->test($data['records']);
            $data['title'] = 'جهات التحصيل';
            $data['subview'] = 'admin/all_Finance_resource_views/settings/add_gathering_place';
            $this->load->view('admin_index', $data);
        }

    }*/
    
 /*   public function add_gathering_place(){

    // all_Finance_resource/settings/Finance_resource_settings/add_gathering_place
    $this->load->model('all_Finance_resource_models/settings/Gathering_place_model');
    if($this->input->post('add')){
        $this->Gathering_place_model->insert();
        $this->message('success','إضافة جهات التحصيل');
        redirect('all_Finance_resource/settings/Finance_resource_settings/add_gathering_place' ,'refresh');
    }else{
        $data['mainDepartments'] = $this->Gathering_place_model->select_all_departments();
        $data['records'] =$this->Gathering_place_model->select_all();
        $data['title'] = 'جهات التحصيل';
        $data['subview'] = 'admin/all_Finance_resource_views/settings/add_gathering_place';
        $this->load->view('admin_index', $data);
    }

}*/


public function add_gathering_place(){

    // all_Finance_resource/settings/Finance_resource_settings/add_gathering_place
    $this->load->model('all_Finance_resource_models/settings/Gathering_place_model');
    if($this->input->post('add')){
    
        $this->Gathering_place_model->insert();
        $this->message('success','إضافة جهات التحصيل');
        redirect('all_Finance_resource/settings/Finance_resource_settings/add_gathering_place' ,'refresh');
    }
    else{
        $data['mainDepartments'] = $this->Gathering_place_model->select_all_departments();
        $data['records'] =$this->Gathering_place_model->select_all();
   //yara
        $data['mqr_thseel_setting'] = $this->Difined_model->select_search_key("fr_settings","type","17");
        //

        $data['mainDepartments'] = $this->Gathering_place_model->select_all_departments();
        $data['employees'] = $this->Difined_model->select_all("employees","","","","");
        $data['gathering_place_arr']= $this->Finance_resource_setting->get_type_fr_settings(14);//*/**/*/*/*/*/'
        $data['emps']= $this->Gathering_place_model->get_emps();
    
        $data['title'] = 'جهات التحصيل';
        $data['subview'] = 'admin/all_Finance_resource_views/settings/add_gathering_place';
        $this->load->view('admin_index', $data);
    }

}
 public function update_status(){
        $this->load->model('all_Finance_resource_models/settings/Gathering_place_model');
        $id = $this->input->post('id');
        $value = $this->input->post('value');
        $this->Gathering_place_model->update_status($id,$value);
    }
    public function get_data(){
        $this->load->model('all_Finance_resource_models/settings/Gathering_place_model');
        $data['mainDepartments'] = $this->Gathering_place_model->select_all_departments();
       $data['employees'] = $this->Difined_model->select_all("employees","","","","");
       // $data['employees'] = $this->Difined_model->select_search_key("department_jobs","from_id_fk",$_POST['']);
         $data['gathering_place_arr']= $this->Finance_resource_setting->get_type_fr_settings(14);//*/**/*/*/*/*/


        $this->load->view('admin/all_Finance_resource_views/settings/get_data',$data);
    }


    public function getSubDepartment(){
        $this->load->model('Difined_model');
        $data = $this->Difined_model->select_search_key("department_jobs","from_id_fk",$_POST['id']);

        echo json_encode($data);
    }



    public function Delete_gathering_place($id){
        $this->load->model('all_Finance_resource_models/settings/Gathering_place_model');
        $this->Gathering_place_model->delete($id);
        $this->message('success','حذف ');
        redirect('all_Finance_resource/settings/Finance_resource_settings/add_gathering_place' ,'refresh');
    }
  

  
public function getEmp(){
    $this->load->model('Difined_model');
    $data = $this->Difined_model->select_search_key("employees","department",$_POST['id']);
    echo json_encode($data);
}


public function update_gathering_place($id){
        $this->load->model('all_Finance_resource_models/settings/Gathering_place_model');
        if($this->input->post('add')){
        $this->Gathering_place_model->update_gathering_place($id);
        $this->message('success','إضافة جهات التحصيل');
        redirect('all_Finance_resource/settings/Finance_resource_settings/add_gathering_place' ,'refresh');
        }
    else{
        $data['mainDepartments'] = $this->Gathering_place_model->select_all_departments();
        $data['record'] =$this->Gathering_place_model->select_by_id($id);
        $data['gathering_place_arr']= $this->Finance_resource_setting->get_type_fr_settings(14);
        if(!empty($data['record']->emp_id_fk))
        {
        $data['employee_name']=$this->Gathering_place_model->get_empolyee($data['record']->emp_id_fk);
        }
        else
        {
            $data['employee_name']='';
        }
        $data['employees'] = $this->Difined_model->select_all("employees","","","","");
        $data['mqr_thseel_setting'] = $this->Difined_model->select_search_key("fr_settings","type","17");
        $data['emps']= $this->Gathering_place_model->get_emps();
        $data['title'] = 'جهات التحصيل';
        $data['subview'] = 'admin/all_Finance_resource_views/settings/add_gathering_place';
        $this->load->view('admin_index', $data);
    }

}
}
