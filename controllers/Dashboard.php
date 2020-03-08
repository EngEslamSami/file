<?php
class Dashboard extends MY_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->library('pagination');
   if($this->session->userdata('is_logged_in')==0){
           redirect('login');
      }
        $this->load->helper(array('url','text','permission','form'));

        
   
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

private function upload_muli_image($input_name){
    $filesCount = count($_FILES[$input_name]['name']);
    for($i = 0; $i < $filesCount; $i++){
        $_FILES['userFile']['name'] = $_FILES[$input_name]['name'][$i];
        $_FILES['userFile']['type'] = $_FILES[$input_name]['type'][$i];
        $_FILES['userFile']['tmp_name'] = $_FILES[$input_name]['tmp_name'][$i];
        $_FILES['userFile']['error'] = $_FILES[$input_name]['error'][$i];
        $_FILES['userFile']['size'] = $_FILES[$input_name]['size'][$i];
        $all_img[]=$this->upload_image("userFile");
    }
    return $all_img;
}


    private function thumb($data){
        $config['image_library'] = 'gd2';
        $config['source_image'] =$data['full_path'];
        $config['new_image'] = 'uploads/thumbs/'.$data['file_name'];
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['thumb_marker']='';
        $config['width'] = 275;
        $config['height'] = 250;
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
    }
    private  function upload_image($file_name){
    $config['upload_path'] = 'uploads/images';
    $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf';
    $config['max_size']    = '1024*8';
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
    private  function upload_file($file_name){
        $config['upload_path'] = 'uploads/files';
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
        $config['max_size']    = '1024*8';
        $config['overwrite'] = true;
        $this->load->library('upload',$config);
        if(! $this->upload->do_upload($file_name)){
            return  false;
        }else {
            $datafile = $this->upload->data();
            return $datafile['file_name'];
        }
    }
    private function url (){
     unset($_SESSION['url']);
        $this->session->set_flashdata('url','http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
    }
 //-----------------------------------------   
 private function message($type,$text){
if($type =='success') {
return $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissable">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <strong> تم بنجاح!</strong> '.$text.'.
                                                </div>');
}elseif($type=='wiring'){
return $this->session->set_flashdata('message','<div class="alert alert-warning alert-dismissable">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <strong> تحذير  !</strong> '.$text.'.
                                                </div>');
}elseif($type=='error'){
return  $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <strong>خطأ!</strong> '.$text.'.
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

    public function  index(){

        $this->load->model('Difined_model');
        $this->load->model('n/Users');
        $data['all_empolyee']=$this->Difined_model->select_all("employees","id","","id","DESC");
        $data['all_members']=$this->Difined_model->select_all("magls_members_table","id","","id","DESC");
        $data['general_assembley_members']=$this->Difined_model->select_all("general_assembley_members","","","id","DESC");
        $data["employes"]=$this->Users->employes_in();
        $data["members"]=$this->Users->members_in();

        if ($this->input->post('add_user') == 'add_user') {

            $file=$this->upload_image("user_photo");
            $this->Users->insert($file);
            $this->message('success','تم إضافة مستخدم بنجاح');
            redirect('Dashboard/add_user', 'refresh');
        }
        $data["users"] = $this->Users->fetch_users("","");
        $data['title'] = 'إضافة مستخدم جديد';
        $data['subview'] = 'admin/users/n/users';
        $this->load->view('admin_index', $data);
    }
 /**
 * ===============================================================================================================
 * 
 * ========================             ADD USER            ======================================================
 * 
 * ===============================================================================================================
 */    
 /*
        public function add_user(){
        
        $this->load->model('Difined_model');
        $this->load->model('n/Users');
        
        $data['all_empolyee']=$this->Difined_model->select_all("employees","id","","id","DESC");
        $data['all_members']=$this->Difined_model->select_all("magls_members_table","id","","id","DESC");
        $data["memb_in"]=$this->Users->memb_in();
        $data["emp_in"]=$this->Users->emp_in();
        if ($this->input->post('add_user') == 'add_user') {
            /////////////////////
            $file_name='user_photo';
            $file= $this->upload_image($file_name);
            
            if ($this->Users->insert($file)) {
                $this->message('success','تم إضافة مستخدم بنجاح');
                 redirect('dashboard/add_user', 'refresh');
            } else {
                $this->message('error','لم تتم العملية بشكل سليم تأكد من البيانات ');
                 redirect('dashboard/add_user', 'refresh');
            }
        }
            $data["users"] = $this->Users->fetch_users("","");
            $data['title'] = 'إضافة مستخدم جديد';
            $data['metakeyword'] = 'اعدادات المستخدمين';
            $data['metadiscription'] = '';
            $data['subview'] = 'admin/users/n/users';
            $this->load->view('admin_index', $data);
    }
    */
 /***************************************************/
 public function add_user($type="tab1"){
    $this->load->model('Difined_model');
    $this->load->model('n/Users');
    $data['all_empolyee']=$this->Difined_model->select_all("employees","id","","id","DESC");
  //  $data['all_members']=$this->Difined_model->select_all("md_all_magls_edara_members","id","","id","DESC");
   
    $data['all_members']=$this->Difined_model->select_all("md_all_magls_edara_members","","","","");
    $data['general_assembley_members']=$this->Difined_model->select_all("general_assembley_members","","","id","DESC");
    $data["employes"]=$this->Users->employes_in();
    $data["members"]=$this->Users->members_in();
    $data["general_members"]=$this->Users->general_members_in();
    if ($this->input->post('add_user') == 'add_user') {
        
         $file=$this->upload_image("user_photo");
         $this->Users->insert($file);
        $this->message('success','تم إضافة مستخدم بنجاح');
      //  redirect('Dashboard/add_user', 'refresh');
       redirect("Dashboard/add_user/$type", 'refresh');
    }
    
     $data['typee']= $type;
    $data["users"] = $this->Users->fetch_users("","");
    $data['title'] = 'إضافة مستخدم جديد';
    $data['subview'] = 'admin/users/n/users';
    $this->load->view('admin_index', $data);
}
      public function approved_user($id,$value){
              $this->load->model('n/Users');
             $this->Users->update_approved_user($id,'users',$value);
             redirect('Dashboard/add_user','refresh');
      
    } 




public function getMemberDetails(){
    $this->load->model('Difined_model');
   // $member_info =$this->Difined_model->select_search_key('magls_members_table','id',$_POST['member_id'])[0];
    	$member_info =$this->Difined_model->select_search_key('md_all_gam3ia_omomia_members','id',$_POST['member_id'])[0];
    echo json_encode($member_info);
}
public function getEmployeeDetails(){
    $this->load->model('Difined_model');
    $employee_info =$this->Difined_model->select_search_key('employees','id',$_POST['employee_id'])[0];
    echo json_encode($employee_info);
}
public function update_users($type,$id){
    $this->load->model('n/Users');
    $this->load->model("Difined_model");
    $data['all_empolyee']=$this->Difined_model->select_all("employees","id","","id","DESC");
  //  $data['all_members']=$this->Difined_model->select_all("magls_members_table","id","","id","DESC");
     $data['all_members']=$this->Difined_model->select_all("md_all_magls_edara_members","","","","");
    $data['general_assembley_members']=$this->Difined_model->select_all("general_assembley_members","","","id","DESC");
    if ($this->input->post('add_user') == 'add_user') {
         $file=$this->upload_image("user_photo");
        $this->Users->update($id,$file);
        $this->message('success','تم التعديل بنجاح');
       // redirect('Dashboard/add_user', 'refresh');
         redirect("Dashboard/add_user/$type", 'refresh');
    }
      $data['typee']= $type;  
    $data['result']=$this->Users->getById($id);
    $data['title'] = 'تعديل مستخدم';
    $data['subview'] = 'admin/users/n/users';
    $this->load->view('admin_index', $data);
}
 
 /****************************************************/
   public function add_users(){
      $this->load->model("Users");
      $this->load->model("Difined_model");
        $data['job_title']=$this->Difined_model->select_search_key('department_jobs','from_id_fk !=',0);
        $data['in_users']=$this->Users->select_by_rol_id();
        $data['jobs_name']=$this->Users->jobs_id();
    if($this->input->post('ADD')){
         $this->Users->insert();
         redirect('Dashboard/add_users','refresh');
    }
       $data["record"]=$this->Difined_model->select_all("users","","","user_id","DESC");   
       $data['subview'] = 'admin/users/add_user';
        $this->load->view('admin_index', $data);
   }
   /*************************************************/
   public function getGeneral_assembley_member_Details(){
    $this->load->model('Difined_model');
    $employee_info =$this->Difined_model->select_search_key('general_assembley_members','id',$_POST['employee_id'])[0];
    echo json_encode($employee_info);
}
   //----------------------------
  /* public function update_users($id){
      $this->load->model("Users");
      $this->load->model("Difined_model"); 
        $data['job_title']=$this->Difined_model->select_search_key('department_jobs','from_id_fk !=',0);
        $data['in_users']=$this->Users->select_by_rol_id();
        $data['jobs_name']=$this->Users->jobs_id();
       if($this->input->post('UPDATE')){
        $this->Users->update($id);
      
         redirect('Dashboard/add_users','refresh');
    }    
      $data['result']=$this->Users->getById($id);
      $data['subview'] = 'admin/users/add_user';
        $this->load->view('admin_index', $data);
   }*/
   //--------------------------
   public function delete($type,$id){
     $this->load->model("Difined_model");
    $Conditions_arr=array("user_id"=>$id); 
    $this->Difined_model->delete("users",$Conditions_arr);
    $this->Difined_model->delete("permissions",$Conditions_arr);
    // redirect('Dashboard/add_user','refresh');
      redirect("Dashboard/add_user/$type", 'refresh');
   }
   
 /**
 * ===============================================================================================================
 * 
 * ===============================================================================================================
 * 
 * ===============================================================================================================
 */ 
 //==========================================================================
public function add_city(){
    $this->load->model('Departs');
    $this->load->model('Difined_model');
    if ($this->input->post('add')){
        $this->Departs->insert();
        $this->message('success','إضافة مدينة');
        redirect('dashboard/add_city','refresh');
    }
    $data['records'] = $this->Difined_model->select_search_key('departments','type',0);
    $data['subview'] = 'admin/cities/add_city';
    $this->load->view('admin_index', $data);
}

public function delete_main_depart($id){
    $this->load->model('Departs');
    $this->Departs->delete($id);
    redirect('dashboard/add_city','refresh');
}
public function update_city($id){
    $this->load->model('Departs');
    if($this->input->post('update')){
        $file_name='img';
        $file= $this->upload_image($file_name);
        $this->Departs->update($id,$file);
        $this->message('success','تعديل مدينة');
        redirect('dashboard/add_city','refresh');
    }
    $data['results']=$this->Departs->getById($id);
    $data['subview'] = 'admin/cities/add_city';
    $this->load->view('admin_index',$data);
}




//==========================================================================
public function add_neighborhood(){
    $this->load->model('Departs');
    $this->load->model('Subdepart');
    if($this->input->post('add')){
        $this->Subdepart->insert();
        $this->message('success','إضافة حي');
        redirect('dashboard/add_neighborhood','refresh');
    }

    $data['records']=$this->Subdepart->select(0);

    $data['main_depart']=$this->Departs->select_all();
    $data['subview'] = 'admin/cities/add_neighborhood';
    $this->load->view('admin_index',$data);
}
public function delete_neighborhood($id){
    $this->load->model('Subdepart');
    $this->Subdepart->delete($id);
    redirect('dashboard/add_neighborhood','refresh');
}

public function update_neighborhood($id){
    $this->load->model('Subdepart');
    $this->load->model('Departs');
    if($this->input->post('update')){
        $this->Subdepart->update($id);
        $this->message('success','تعديل حي');
        redirect('dashboard/add_neighborhood','refresh');
    }
    $data['main_depart']=$this->Departs->select_all();
    $data['result']=$this->Subdepart->getById($id);
    $data['subview'] = 'admin/cities/add_neighborhood';
    $this->load->view('admin_index',$data);
}

   
 /**
 * ===============================================================================================================
 * 
 * ===============================================================================================================
 * 
 * ===============================================================================================================
 */    
    public function definitions_devides(){
        
         $this->load->model('family_models/Devices');
          $this->load->model('Difined_model');
          $data['records']=$this->Difined_model->select_all('electrical_equipment','','','','');
    if($this->input->post('add')){
        $this->Devices->insert_device();
        redirect('dashboard/definitions_devides','refresh');
    }
         $data['subview'] = 'admin/definitions/definitions';
    $this->load->view('admin_index',$data); 
    }  
  //--------------------------------------------
  public function update_definitions_devides($id){
     $this->load->model('family_models/Devices');
      $this->load->model('Difined_model');
     $data['results']=$this->Difined_model->getById('electrical_equipment',$id);
      if($this->input->post('update')){
        $this->Devices->update_device($id);
        redirect('dashboard/definitions_devides','refresh');
    }
      $data['subview'] = 'admin/definitions/definitions';
    $this->load->view('admin_index',$data); 
  }
 //=================================================
 public function delete_definitions_devides($id){
    $this->load->model('family_models/Devices');
    $this->Devices->delete('electrical_equipment',$id);
 }    
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
    public function add_storage(){
        $this->load->model('storage/Storage');
        if ($this->input->post('add')){
            $this->Storage->insert();
            $this->message('success','إضافة مخزن');
            redirect('dashboard/add_storage','refresh');
        }
        $data['records']=$this->Storage->select();


           $data['last'] = $this->Storage->select_last();


               /* $this->test($data['last']);*/

        $data['title'] = 'إضافة مخزن';
        $data['metakeyword'] = 'إعدادات مخزن';
        $data['metadiscription'] = '';
        $data['subview'] = 'admin/Storage/storage';
        $this->load->view('admin_index', $data);
    }
    public function delete_storage($id){
        $this->load->model('storage/Storage');
        $this->Storage->delete($id);
        redirect('dashboard/add_storage');
    }
    public function update_storage($id){
        $this->load->model('storage/Storage');
        if($this->input->post('update')){
            $this->Storage->update($id);
            $this->message('success','تعديل مخزن بنجاح');
            redirect('dashboard/add_storage','refresh');
        }
        $data['results']=$this->Storage->getById($id);
        $data["links"] = $this->pagination->create_links();
        $data['title'] = 'تعديل مخزن';
        $data['metakeyword'] = 'إعدادات المخازن';
        $data['metadiscription'] = '';
        $data['subview'] = 'admin/Storage/storage';
        $this->load->view('admin_index', $data);
    }


    public function add_unit(){
        $this->load->model('storage/Unit');
        if ($this->input->post('add')){
            $this->Unit->insert();
            $this->message('success','إضافة وحدات الاصناف');
            redirect('dashboard/add_unit','refresh');
        }
        $data['records']=$this->Unit->select();
        /* $this->test($data['last']);*/


        $data['title'] = 'إضافة وحدات الاصناف';

        $data['metakeyword'] = 'إعدادات وحدات الاصناف';
        $data['metadiscription'] = '';
        $data['subview'] = 'admin/Storage/unit';
        $this->load->view('admin_index', $data);
    }
    public function delete_unit($id){
        $this->load->model('storage/Unit');
        $this->Unit->delete($id);
        redirect('dashboard/add_unit');
    }
    public function update_unit($id){
        $this->load->model('storage/Unit');
        if($this->input->post('update')){
            $this->Unit->update($id);
            $this->message('success','تعديل وحدات الاصناف بنجاح');
            redirect('dashboard/add_unit','refresh');
        }
        $data['results']=$this->Unit->getById($id);
        $data["links"] = $this->pagination->create_links();
        $data['title'] = 'تعديل وحدات الاصناف';
        $data['metakeyword'] = 'إعدادات وحدات الاصناف';
        $data['metadiscription'] = '';
        $data['subview'] = 'admin/Storage/unit';
        $this->load->view('admin_index', $data);
    }

    public function add_main_product(){
        $this->load->model('storage/Main_product');
        if ($this->input->post('add')){
            $this->Main_product->insert();
            $this->message('success','إضافة فئة الاصناف الرئيسية');
            redirect('dashboard/add_main_product','refresh');
        }
        $data['records']=$this->Main_product->select();
        /* $this->test($data['last']);*/


        $data['title'] = 'إضافة فئة الاصناف الرئيسية';

        $data['metakeyword'] = 'إعدادات فئة الاصناف الرئيسية';
        $data['metadiscription'] = '';
        $data['subview'] = 'admin/Storage/main_product';
        $this->load->view('admin_index', $data);
    }
    public function delete_main_product($id){
        $this->load->model('storage/Main_product');
        $this->Main_product->delete($id);
        redirect('dashboard/add_main_product');
    }
    public function update_main_product($id){
        $this->load->model('storage/Main_product');
        if($this->input->post('update')){
            $this->Main_product->update($id);
            $this->message('success','تعديل فئة الاصناف الرئيسية بنجاح');
            redirect('dashboard/add_main_product','refresh');
        }
        $data['results']=$this->Main_product->getById($id);
        $data["links"] = $this->pagination->create_links();
        $data['title'] = 'تعديل فئة الاصناف الرئيسية';
        $data['metakeyword'] = 'إعدادات فئة الاصناف الرئيسية';
        $data['metadiscription'] = '';
        $data['subview'] = 'admin/Storage/main_product';
        $this->load->view('admin_index', $data);
    }
  
  /**
 * ===============================================================================================================
 * 
 * ===============================================================================================================
 * 
 * ===============================================================================================================
 */    
   
   /**
 * ===============================================================================================================
 * 
 * ===============================================================================================================
 * 
 * ===============================================================================================================
 */    
/**
 * ===============================================================================================================
 * 
 * ===============================================================================================================
 *  
 * ===============================================================================================================
 */    
    

    public function add_sub_product(){
        $this->load->model('storage/Sub_product');
        $data['count']=$this->Sub_product->select_count($this->input->post('p_storage_code_fk'));

if(isset($data['count'])&&$data['count']!=null){
    if ($this->input->post('add')){
        $this->Sub_product->insert($data['count'][0]->total);
        $this->message('success','إضافة فئة الاصناف الفرعية');
        redirect('dashboard/add_sub_product','refresh');
    }

}else{

    if ($this->input->post('add')){
        $this->Sub_product->insert1();
        $this->message('success','إضافة فئة الاصناف الفرعية');
        redirect('dashboard/add_sub_product','refresh');
    }
}
        
        $data['records']=$this->Sub_product->select();
        $data['stores']=$this->Sub_product->select_stores();
        $data['main']=$this->Sub_product->select_main_product();
        $data['units']=$this->Sub_product->select_units();

        $data['title'] = 'إضافة فئة الاصناف الفرعية';
        $data['metakeyword'] = 'إعدادات فئة الاصناف الفرعية';
        $data['metadiscription'] = '';
        $data['subview'] = 'admin/storagee/sub_product';
        $this->load->view('admin_index', $data);
    }
    public function delete_sub_product($id){
        $this->load->model('storage/Sub_product');
        $this->Sub_product->delete($id);
        redirect('dashboard/add_sub_product');
    }
    public function update_sub_product($id){
        $this->load->model('storage/Sub_product');

        if($this->input->post('update')){
            $this->Sub_product->update($id);
            $this->message('success','تعديل فئة الاصناف الفرعية بنجاح');
            redirect('dashboard/add_sub_product','refresh');
        }
        $data['results']=$this->Sub_product->getById($id);
        $data['stores']=$this->Sub_product->select_stores();
        $data['main']=$this->Sub_product->select_main_product();
        $data['units']=$this->Sub_product->select_units();

        $data["links"] = $this->pagination->create_links();
        $data['title'] = 'تعديل فئة الاصناف الفرعية';
        $data['metakeyword'] = 'إعدادات فئة الاصناف الفرعية';
        $data['metadiscription'] = '';
        $data['subview'] = 'admin/storagee/sub_product';
        $this->load->view('admin_index', $data);
    }
    
        /**
     * 
     * cars 29-08-2017
     * 
     **/
 public function add_insurance(){
        $this->load->model('cars/Insurance');
        if ($this->input->post('add')){
            $this->Insurance->insert();
            $this->message('success','إضافة شركات تأمين');
            redirect('dashboard/add_insurance','refresh');
        }
        $data['records']=$this->Insurance->select();
        /* $this->test($data['last']);*/


        $data['title'] = 'إضافة شركات تأمين';

        $data['metakeyword'] = 'إعدادات شركات التأمين';
        $data['metadiscription'] = '';
        $data['subview'] = 'admin/cars/insurance';
        $this->load->view('admin_index', $data);
    }
    public function delete_insurance($id){
        $this->load->model('cars/Insurance');
        $this->Insurance->delete($id);
        redirect('dashboard/add_insurance');
    }
    public function update_insurance($id){
        $this->load->model('cars/Insurance');
        if($this->input->post('update')){
            $this->Insurance->update($id);
            $this->message('success','تعديل شركات تأمين بنجاح');
            redirect('dashboard/add_insurance','refresh');
        }
        $data['results']=$this->Insurance->getById($id);
        $data["links"] = $this->pagination->create_links();
        $data['title'] = 'تعديل شركات تأمين';
        $data['metakeyword'] = 'إعدادات شركات تأمين';
        $data['metadiscription'] = '';
        $data['subview'] = 'admin/cars/insurance';
        $this->load->view('admin_index', $data);
    }


    public function add_car(){
        $this->load->model('cars/Car');
        if ($this->input->post('add')){
            $this->Car->insert();
            $this->message('success','إضافة انواع السيارات');
            redirect('dashboard/add_car','refresh');
        }
        $data['records']=$this->Car->select();
        /* $this->test($data['last']);*/


        $data['title'] = 'إضافة انواع السيارات';

        $data['metakeyword'] = 'إعدادات انواع السيارات';
        $data['metadiscription'] = '';
        $data['subview'] = 'admin/cars/car';
        $this->load->view('admin_index', $data);
    }
    public function delete_car($id){
        $this->load->model('cars/Car');
        $this->Car->delete($id);
        redirect('dashboard/add_car');
    }
    public function update_car($id){
        $this->load->model('cars/Car');
        if($this->input->post('update')){
            $this->Car->update($id);
            $this->message('success','تعديل انواع السيارات بنجاح');
            redirect('dashboard/add_car','refresh');
        }
        $data['results']=$this->Car->getById($id);
        $data["links"] = $this->pagination->create_links();
        $data['title'] = 'تعديل انواع السيارات';
        $data['metakeyword'] = 'إعدادات انواع السيارات';
        $data['metadiscription'] = '';
        $data['subview'] = 'admin/cars/car';
        $this->load->view('admin_index', $data);
    }

    public function add_car_details(){
        $this->load->model('cars/Details');
        if ($this->input->post('add')){
            $this->Details->insert();
            $this->message('success','إضافة بيانات السيارات');
            redirect('dashboard/add_car_details','refresh');
        }
        $data['records']=$this->Details->select();
        $data['company']=$this->Details->select_company();
        $data['cars']=$this->Details->select_car_type();
        if($this->input->post('engine_num_chik')){
            $arr["in"]=$this->Details->select_search_key('cars','engine_code',$this->input->post('engine_num_chik'));
            $this->load->view('admin/cars/load', $arr);

        }else {
            $data['title'] = 'إضافة بيانات السيارات';
            $data['metakeyword'] = 'إعدادات بيانات السيارات';
            $data['metadiscription'] = '';
            $data['subview'] = 'admin/cars/details';
            $this->load->view('admin_index', $data);
        }
    }
    public function delete_car_details($id){
        $this->load->model('cars/Details');
        $this->Details->delete($id);
        redirect('dashboard/add_car_details');
    }
    public function update_car_details($id){
        $this->load->model('cars/Details');
        if($this->input->post('update')){
            $this->Details->update($id);
            $this->message('success','تعديل بيانات السيارات بنجاح');
            redirect('dashboard/add_car_details','refresh');
        }
        $data['results']=$this->Details->getById($id);
        $data['company']=$this->Details->select_company();
        $data['cars']=$this->Details->select_car_type();

        $data["links"] = $this->pagination->create_links();
        $data['title'] = 'تعديل بيانات السيارات';
        $data['metakeyword'] = 'إعدادات بيانات السيارات';
        $data['metadiscription'] = '';
        $data['subview'] = 'admin/cars/details';
        $this->load->view('admin_index', $data);
    }

    public function add_driver(){
        $this->load->model('cars/Driver');
        $data['last']=$this->Driver->select_last();
        if ($this->input->post('add')){
/*            $this->test($_POST);*/
            $this->Driver->insert();
            $this->message('success','إضافة سائق');
            redirect('dashboard/add_driver','refresh');
        }
        $data['records']=$this->Driver->select();
        /* $this->test($data['last']);*/


        $data['metadiscription'] = '';
        $data['subview'] = 'admin/cars/driver';
        $this->load->view('admin_index', $data);
    }
    public function delete_driver($id){
        $this->load->model('cars/Driver');
        $this->Driver->delete($id);
        redirect('dashboard/add_driver');
    }
    public function update_driver($id){
        $this->load->model('cars/Driver');
        if($this->input->post('update')){
            $this->Driver->update($id);
            $this->message('success','تعديل سائق بنجاح');
            redirect('dashboard/add_driver','refresh');
        }
        $data['results']=$this->Driver->getById($id);
        $data["links"] = $this->pagination->create_links();
        $data['title'] = 'تعديل انواع السيارات';
        $data['metakeyword'] = 'إعدادات انواع السيارات';
        $data['metadiscription'] = '';
        $data['subview'] = 'admin/cars/driver';
        $this->load->view('admin_index', $data);
    }


public function add_orders_car(){
    $this->load->model('cars/Orders');
    $data['last']=$this->Orders->select_last();
    if ($this->input->post('add')){
        $this->Orders->insert();
        $this->message('success','إضافة امر تشغيل');
        redirect('dashboard/add_orders_car','refresh');
    }elseif($this->input->post('type')){
        $data['type']=$this->input->post('type');
        $data['result_type']=$this->Orders->get_car_type($this->input->post('type'));
        $this->load->view('admin/cars/get_car_type',$data);
    }else{
        $data['records']=$this->Orders->select();
        $data['cars']=$this->Orders->select_car_type();
        $data['all']=$this->Orders->select_all();
        $data['ddd']=$this->Orders->select_driverss();
     //   $this->load->model('Difined_model');
   //     $Conditions_arr=array('employ_drive_condition'=>1);
      //  $data['drivers'] = $this->Difined_model->slect_where('employees',$Conditions_arr,'','','','');
        //$data['drivers']=$this->Orders->select_drivers();
        
        $this->load->model('Difined_model');
        $Conditions_arr=array('department'=>20);
        $data['drivers'] = $this->Difined_model->slect_where('employees',$Conditions_arr,'','','','');
        
        
        $data['metadiscription'] = '';
        $data['subview'] = 'admin/cars/orders';
        $this->load->view('admin_index', $data);
    }
}
   /* public function add_orders_car(){
        $this->load->model('cars/Orders');
        $data['last']=$this->Orders->select_last();
        if ($this->input->post('add')){
            $this->Orders->insert();
            $this->message('success','إضافة امر تشغيل');
            redirect('dashboard/add_orders_car','refresh');
        }
        $data['records']=$this->Orders->select();
        $data['cars']=$this->Orders->select_car_type();
        $data['all']=$this->Orders->select_all();
        $data['ddd']=$this->Orders->select_driverss();

        $data['drivers']=$this->Orders->select_drivers();
        $data['metadiscription'] = '';
        $data['subview'] = 'admin/cars/orders';
        $this->load->view('admin_index', $data);
    }
    */
    public function delete_orders_car($id){
        $this->load->model('cars/Orders');
        $this->Orders->delete($id);
        redirect('dashboard/add_orders_car');
    }
    
    public function update_orders_car($id){
    $this->load->model('cars/Orders');
    if($this->input->post('update')){
        $this->Orders->update($id);
        $this->message('success','تعديل امر تشغيل بنجاح');
        redirect('dashboard/add_orders_car','refresh');
    }elseif($this->input->post('type')){
        $data['type']=$this->input->post('type');
        $data['result_type']=$this->Orders->get_car_type($this->input->post('type'));
        $this->load->view('admin/cars/get_car_type',$data);
    }else {
        $data['results'] = $this->Orders->getById($id);

        $data['result_type']=$this->Orders->get_car_type( $data['results']['car_id_fk']);
        // $this->test( $data['result_type'][0]['type_name']);
        $data["links"] = $this->pagination->create_links();
        $data['cars'] = $this->Orders->select_car_type();
       /* $this->load->model('Difined_model');
        $Conditions_arr = array('employ_drive_condition' => 1);
        $data['drivers'] = $this->Difined_model->slect_where('employees', $Conditions_arr, '', '', '', '');*/
          $this->load->model('Difined_model');
        $Conditions_arr = array('department' => 20);
        $data['drivers'] = $this->Difined_model->slect_where('employees', $Conditions_arr, '', '', '', '');

        

        $data['metadiscription'] = '';
        $data['subview'] = 'admin/cars/orders';
        $this->load->view('admin_index', $data);
    }
}
  /*  public function update_orders_car($id){
        $this->load->model('cars/Orders');
        if($this->input->post('update')){
            $this->Orders->update($id);
            $this->message('success','تعديل امر تشغيل بنجاح');
            redirect('dashboard/add_orders_car','refresh');
        }
        $data['results']=$this->Orders->getById($id);
        $data["links"] = $this->pagination->create_links();
        $data['cars']=$this->Orders->select_car_type();
        $data['drivers']=$this->Orders->select_drivers();

        $data['metadiscription'] = '';
        $data['subview'] = 'admin/cars/orders';
        $this->load->view('admin_index', $data);
    }*/
    public function update_orders_car_return($id){
        $this->load->model('cars/Orders');
        if($this->input->post('add_return')){
            $this->Orders->update_return($id);
            $this->message('success',' امر تشغيل بنجاح');
            redirect('dashboard/add_orders_car','refresh');
        }
        $data['metadiscription'] = '';
        $data['subview'] = 'admin/cars/orders';
        $this->load->view('admin_index', $data);
    }

    /**
     * 
     * cars 30-08-2017
     * 
     **/
     
     
    
    public function add_car_violation(){
        $this->load->model('cars/Violation');
        $data['last']=$this->Violation->select_last();
        if ($this->input->post('add')){
            $this->Violation->insert();
            $this->message('success','إضافة مخالفة');
            redirect('dashboard/add_car_violation','refresh');
        }
        $data['records']=$this->Violation->select();
        $data['cars']=$this->Violation->select_car_type();
        //$data['drivers']=$this->Violation->select_drivers();
    $this->load->model('Difined_model');
    $Conditions_arr=array('department'=>20);
    $data['drivers'] = $this->Difined_model->slect_where('employees',$Conditions_arr,'','','','');
        $data['metadiscription'] = '';
        $data['subview'] = 'admin/cars/violation';
        $this->load->view('admin_index', $data);
    }
    public function delete_car_violation($id){
        $this->load->model('cars/Violation');
        $this->Violation->delete($id);
        redirect('dashboard/add_car_violation');
    }
    public function update_car_violation($id){
        $this->load->model('cars/Violation');
        if($this->input->post('update')){
            $this->Violation->update($id);
            $this->message('success','تعديل مخالفة بنجاح');
            redirect('dashboard/add_car_violation','refresh');
        }
        $data['results']=$this->Violation->getById($id);
        $data['cars']=$this->Violation->select_car_type();
       // $data['drivers']=$this->Violation->select_drivers();
        $this->load->model('Difined_model');
    $Conditions_arr=array('department'=>20);
    $data['drivers'] = $this->Difined_model->slect_where('employees',$Conditions_arr,'','','','');
       
       
        $data["links"] = $this->pagination->create_links();
        $data['title'] = 'تعديل انواع السيارات';
        $data['metakeyword'] = 'إعدادات انواع السيارات';
        $data['metadiscription'] = '';
        $data['subview'] = 'admin/cars/violation';
        $this->load->view('admin_index', $data);
    }
    
    /**
     * 
     *  Car_crash
     * 
     **/
     public function car_crash($id){
    $this->load->model('Difined_model');
    $this->load->model('cars/Car_crashes');  $this->load->model('cars/Orders');

    if($this->input->post('add') && $id == 0){
        $this->Car_crashes->insert();
        $this->message('success','إضافة الأعطال');
        redirect('dashboard/car_crash/0');
    }
    if($this->input->post('add') && $id != 0){
        $this->Car_crashes->update($id);
        $this->message('success','تعديل العطل');
        redirect('dashboard/car_crash/0');
    }
    if($id != 0){
        $data['cars'] = $this->Car_crashes->select_cars();
        $data['result'] = $this->Car_crashes->getById($id);
        $data['result_type']=$this->Orders->get_car_type( $data['result']['car_id_fk']);
        $data['reform_official'] = $this->Difined_model->select_all('employees','','','','');

    }
    if($this->input->post('count') || $this->input->post('code')){
        if($this->input->post('count') != ''){
            $data['reform_official'] = $this->Difined_model->select_all('employees','','','','');
            $this->load->view('admin/cars/load_crashes', $data);
        }
        if($this->input->post('code') != ''){
            $this->Car_crashes->delete($this->input->post('code'));
        }

    }elseif($this->input->post('type')){
        $data['type']=$this->input->post('type');
        $data['result_type']=$this->Orders->get_car_type($this->input->post('type'));

        $this->load->view('admin/cars/get_car_type',$data);
    }else{

        $data['cars'] = $this->Car_crashes->select_cars();
        $data['last'] = $this->Car_crashes->select();
        $data['table'] = $this->Car_crashes->select_all();
        $data['subview'] = 'admin/cars/car_crashes';
        $this->load->view('admin_index', $data);
    }
}
    /* public function car_crash($id){
        $this->load->model('cars/Car_crashes');
        
        if($this->input->post('add') && $id == 0){
            $this->Car_crashes->insert();
            $this->message('success','إضافة الأعطال');
            redirect('dashboard/car_crash/0');
        }
        if($this->input->post('add') && $id != 0){
            $this->Car_crashes->update($id);
            $this->message('success','تعديل العطل');
            redirect('dashboard/car_crash/0');
        }
        if($id != 0){
            $data['cars'] = $this->Car_crashes->select_cars();
            $data['result'] = $this->Car_crashes->getById($id);
        } 
        if($this->input->post('count') || $this->input->post('code')){
            if($this->input->post('count') != '')
                $this->load->view('admin/cars/load_crashes');
            if($this->input->post('code') != '')
                $this->Car_crashes->delete($this->input->post('code'));
        }
        
        else{    
            $data['cars'] = $this->Car_crashes->select_cars();
            $data['last'] = $this->Car_crashes->select();
            $data['table'] = $this->Car_crashes->select_all();               
            $data['subview'] = 'admin/cars/car_crashes';
            $this->load->view('admin_index', $data);
        }
    }
    */
    public function crashes_index(){
      $this->load->model('cars/Car_crashes');
      $data['cars'] = $this->Car_crashes->select_cars();
      $data['table']=$this->Car_crashes->select_all_where(0);
      $data['table1']=$this->Car_crashes->select_all_where(1);
      $data['table2']=$this->Car_crashes->select_all_where(2);
      $data['subview'] = 'admin/cars/crashes_index';
      $this->load->view('admin_index', $data);
    
  }
  
  
  public function crash_status($status,$id){
    $this->load->model('cars/Car_crashes');
    $file ='repair_file';
    $file_upload =$this->upload_file($file);
    $update = array(
        'crashe_status'=>$status,
        'cost_of_repair'=>$_POST['cost_of_repair'],
        'repair_file'=>$file_upload
    );
    $this->Car_crashes->update_status($update,$id);
    redirect('dashboard/crashes_index');

}
  
 /* public function crash_status($status,$id){
      $this->load->model('cars/Car_crashes');
      $this->Car_crashes->update_status($status,$id);
      redirect('dashboard/crashes_index');
    
  }
  */
  
  public function R_drivers(){
      $this->load->model('cars/Driver');
      $data['table']=$this->Driver->select();
      $data['subview'] = 'admin/cars/R_drivers';
      $this->load->view('admin_index', $data);
    
  }
  
  public function R_driver_status(){
      $this->load->model('cars/Car_crashes');
      $data['cars'] = $this->Car_crashes->select_cars();
      $data['records']=$this->Car_crashes->select_drivers();
      $data['table']=$data['records'][0];
      $data['order'] = $this->Car_crashes->unordered_cars();
      $data['subview'] = 'admin/cars/R_driver_status';
      $this->load->view('admin_index', $data);
    
  }
  
  public function R_violation(){
      $this->load->model('cars/Car_crashes');
      $data['cars'] = $this->Car_crashes->select_cars();
      if($this->input->post('date_from') && $this->input->post('date_to') && $this->input->post('car')){
        $data['records']=$this->Car_crashes->select_drivers();
        $data['drivers']=$data['records'][1];
        $data['table'] = $this->Car_crashes->select_violation(strtotime($this->input->post('date_from')),strtotime($this->input->post('date_to')),$this->input->post('car'));
        $this->load->view('admin/cars/load_violation',$data);
      }
      else{
          $data['subview'] = 'admin/cars/R_violation';
          $this->load->view('admin_index', $data);
      }
    
  }
  
  public function R_cars(){
      $this->load->model('cars/Car_crashes');
      $data['table']=$this->Car_crashes->R_cars();
      $data['subview'] = 'admin/cars/R_cars';
      $this->load->view('admin_index', $data);
    
  }
  
  public function home_cars(){
      $data['subview'] = 'admin/cars/home_cars';
      $this->load->view('admin_index', $data);
    
  }





/*********************/
 public function finance(){
     $data['subview'] = 'admin/finance_home';
        $this->load->view('admin_index', $data);
 }

public function trasol(){
     $data['subview'] = 'admin/trasol/home';
        $this->load->view('admin_index', $data);
 }
 
  public function sub_trasol(){
     $data['subview'] = 'admin/trasol/trasol_empolyee';
        $this->load->view('admin_index', $data);
 }
 
 
   public function sub_aytam_trasol(){
     $data['subview'] = 'admin/trasol/trasol_aytam';
        $this->load->view('admin_index', $data);
 }
 
 
 
 
 /**************************************************/

 
 
 public function all_crashes_period()
{   $this->load->model('cars/Car_crashes');
    $this->load->model('Difined_model');
    $data['cars'] = $this->Car_crashes->select_cars();

    if ($this->input->post('form_date') && $this->input->post('to_date') && $this->input->post('type')) {
        $data['views'] =  $this->Car_crashes->get_details_beetween_dates(strtotime($this->input->post('form_date')),strtotime($this->input->post('to_date')),$this->input->post('type'));
        $this->load->view('admin/reports/get_crashes_data',$data);
    }else {
        $data['subview'] = 'admin/reports/all_crashes_period';
        $this->load->view('admin_index', $data);
    }
}


/***********************************************************************************************/

            public function view_chating(){ //dashboard/view_chating
                
                
            $data['title'] = 'غرفة الدردشة';    
            $data['subview'] = 'admin/messages/chating';
            $this->load->view('admin_index', $data);  
            }
    

    /**
     *
     * Journalist
     *
     * Journalist model
     *
     * journalist (DB)
     * **/


    public function add_journalist(){
        $this->load->model('Journalist');

        if ($this->input->post('add_news')){

            for($x = 1 ; $x <= $this->input->post('photo_num') ; $x++)
            {
                $file_name='img'.$x;
                $file[]= $this->upload_image($file_name);
            }
            $file_name='logo';
            $file2= $this->upload_image($file_name);

            $this->Journalist->insert($file,$file2);
            $this->message('success','إضافة خبر صحفي');
            redirect('dashboard/add_journalist','refresh');
        }
        $data['records']=$this->Journalist->select("");
        if($data['records']){
            for($r = 0 ; $r < count($data['records']) ; $r++)
                $data['user'][$r]=$this->Journalist->display($data['records'][$r]->publisher);}


        if($this->input->post('num'))
        {
            if($this->input->post('num') != 0)
            {
                $data['result'] = $this->input->post('num');
                $this->load->view('admin/journalist/photos', $data);
            }
        }else{
        $data["links"] = $this->pagination->create_links();
        $data['title'] = 'إضافة أخبار الملف الصحفي';
        $data['metakeyword'] = 'إعدادات الأخبار الصحفية';
        $data['metadiscription'] = '';
        $data['subview'] = 'admin/journalist/journalist';
        $this->load->view('admin_index', $data);
        }
    }

    public function delete_journalist($id){
        $this->load->model('Journalist');
        $this->Journalist->delete($id);
        redirect('dashboard/add_journalist','refresh');
    }

    public function suspend_journalist($id,$clas){
        $this->load->model('Journalist');

        $this->Journalist->suspend($id,$clas);
        if($clas == 'danger')
            $this->message('success','الخبر نشط');
        else
            $this->message('success','الخبر غير نشط');
        redirect('dashboard/add_journalist');
    }

    public function update_journalist($id){
        $this->load->model('Journalist');

        if($this->input->post('update')){

            if($this->input->post('photo_num'))
            {
                if($this->input->post('photo_num') != 0)
                {
                    for($x = 1 ; $x <= $this->input->post('photo_num') ; $x++)
                    {
                        $file_name='img'.$x;
                        $file[]= $this->upload_image($file_name);
                    }
                }
            }else{
                $file = '';
            }

            $file_name='logo';
            $file2= $this->upload_image($file_name);

            $this->Journalist->update($id,$file2,$file);
            $this->message('success','تعديل الخبر الصحفي');
            redirect('dashboard/add_journalist','refresh');
        }
        $data['result']=$this->Journalist->getById($id);
        $data["links"] = $this->pagination->create_links();
        $data['title'] = 'تعديل خبر صحفي';
        $data['metakeyword'] = 'إعدادات الأخبار الصحفية';
        $data['metadiscription'] = '';
        $data['subview'] = 'admin/journalist/journalist';
        $this->load->view('admin_index', $data);

    }

    public function delete_photo_($id,$index){
        $this->load->model('Journalist');
        $this->Journalist->delete_photo($id,$index);
        redirect('dashboard/update_journalist/'.$id.'');
    }



/*
 *
 * البوم الصور
 * album model
 * album_associations (DB)
 */

    public function add_album(){
        $this->load->model('Album');

        if ($this->input->post('add_album')){

            for($x = 1 ; $x <= $this->input->post('photo_num') ; $x++)
            {
                $file_name='img'.$x;
                $file[]= $this->upload_image($file_name);
            }

            $this->Album->insert($file);
            $this->message('success','إضافة صور');
            redirect('dashboard/add_album','refresh');
        }
       // $config=$this->pagnate('add_album',$this->Album->record_count(),50);
        $data['records']=$this->Album->select();
        if($this->input->post('num'))
        {
            if($this->input->post('num') != 0)
            {
                $data['result'] = $this->input->post('num');
                $this->load->view('admin/album/photos', $data);
            }
        }
        else{
            $data["links"] = $this->pagination->create_links();
            $data['title'] = 'إضافة صور';
            $data['metakeyword'] = 'إعدادات مكتبة الصور';
            $data['metadiscription'] = '';
            $data['subview'] = 'admin/album/album';
            $this->load->view('admin_index', $data);
        }
    }

    public function delete_album($id){
        $this->load->model('Album');
        $this->Album->delete($id);
        redirect('dashboard/add_album','refresh');
    }
    public function update_album($id){
        $this->load->model('Album');

        if($this->input->post('update_album')){

            if($this->input->post('photo_num'))
            {
                if($this->input->post('photo_num') != 0)
                {
                    for($x = 1 ; $x <= $this->input->post('photo_num') ; $x++)
                    {
                        $file_name='img'.$x;
                        $file[]= $this->upload_image($file_name);
                    }
                }
            }
            else
                $file = '';

            $this->Album->update($id,$file);
            $this->message('success','تعديل الصور');
            redirect('dashboard/add_album','refresh');
        }
        $data['result']=$this->Album->getById($id);
        $data["links"] = $this->pagination->create_links();
        $data['title'] = 'تعديل الصور';
        $data['metakeyword'] = 'إعدادات مكتبة الصور';
        $data['metadiscription'] = '';
        $data['subview'] = 'admin/album/album';
        $this->load->view('admin_index', $data);

    }

    public function delete_photo_album($id,$index){
        $this->load->model('Album');
        $this->Album->delete_photo($id,$index);
        redirect('dashboard/update_album/'.$id.'');
    }



    public function video(){

        $this->load->model('Video');
        if ($this->input->post('add')) {
            $this->Video->insert();
            $this->message('success', 'إضافة فيديو');
            redirect('dashboard/video', 'refresh');
        }
        $data['records'] = $this->Video->select();
        $data['title'] = 'إضافة فيديو';
        $data['metakeyword'] = 'إعدادات الفيديو';
        $data['metadiscription'] = '';
        $data['subview']= 'admin/video/video';
        $this->load->view('admin_index',$data);

    }

    public function delete_video($id)
    {
        $this->load->model('Video');
        $this->Video->delete($id);
        $this->message('success', 'حذف الفيديو');
        redirect('dashboard/video', 'refresh');
    }

    public function update_video($id)
    {
        $this->load->model('Video');

        if ($this->input->post('update')) {
            $this->Video->update($id);
            $this->message('success', 'تعديل الفيديو');
            redirect('dashboard/video', 'refresh');
        }
        $data['result'] = $this->Video->getById($id);
        $data["links"] = $this->pagination->create_links();
        $data['title'] = 'تعديل الفيديو .';
        $data['metakeyword'] = 'اعدادات الفيديو ';
        $data['metadiscription'] = '';
        $data['subview'] = 'admin/video/video';
        $this->load->view('admin_index', $data);
    }

   /**
    *  ----------------------------------------------------------------------------------------------
    * 
    * 
    */
    
    public  function ahmed(){
       // $this->load->view('add_person');

        $data['subview'] = 'add_person';
        $this->load->view('admin_index', $data);
    }
/**
    *  ----------------------------------------------------------------------------------------------
    * 
    * 
    */
    
     public function contact(){ // Dashboard/contact
       $this->load->model('Difined_model');
       $data["records"]=$this->Difined_model->select_all("contact","id","","id","DESC");
        $data['title'] = 'إدارة التراسل';
        $data['metakeyword'] = 'الرسائل الواردة';
        $data['metadiscription'] = '';
        $data['subview'] = 'admin/contact/contact';
        $this->load->view('admin_index', $data); 
      }


       public function delete_message($id){ // Dashboard/delete_message
        $this->load->model('Contact');
        $this->Contact->delete($id);
        redirect('dashboard/contact');
    }
 
 
 /***************************************/
 
      public function tog (){ // Dashboard/tog


       // $data['subview'] = 'admin/tog/tog';
        $this->load->view('admin/tog/tog'); 
      }
 
 /***************************/
 
  public function profile (){ // Dashboard/profile

  $this->load->model('familys_models/activites_orders/Prog_profiles');

        $data['records'] = $this->Prog_profiles->select_start_activity_profile();
         $data['title'] = 'البرامج والأنشطة';
       $data['subview'] = 'admin/all_tests/profiles';
        $this->load->view('admin_index',$data); 
      }
      
      
      
      
  public function person_profile (){ // Dashboard/profile


  $this->load->model('n/Users');

 $data["users"] = $this->Users->fetch_users_profile("","",$_SESSION['user_id']);
       $data['subview'] = 'admin/profile/profile';
        $this->load->view('admin_index',$data); 
      }
             
/*****************************************************************************/
/****************************************************************************/

    public function userSignatures (){ // Dashboard/userSignatures

        $this->load->model('n/Users');
        $this->load->model('Difined_model');
        $data['users'] =$this->Users->fetch_users_groups() ;
        $data['users_in'] =$this->Users->users_in() ;
        if ($this->input->post('add_signature')) {

if(isset($_FILES['img'])){
            $images =  $this->upload_muli_image('img');

}
if(isset($_FILES['img_old'])){
   $old_images =  $this->upload_muli_image('img_old');
            if(isset($old_images) && !empty($old_images)){
                
                $this->Users->update_image_Signature($old_images);
            }   
}

           

            
            $this->Users->insertSignature($images);
            $this->message('success', ' اضافة');
            redirect('Dashboard/userSignatures', 'refresh');
        }

        $data['allUsers'] =  $this->Users->all_users_signatures();
 
        $data['title'] = 'توقيعات الموظفين';
        $data['subview'] = 'admin/users/users_signatures/add_signature';
        $this->load->view('admin_index',$data);
    }


    public function add_record() {
        $this->load->model('n/Users');
        $ids=$this->input->post('valu');

        $data['len']=$this->input->post('len');
        //$data['users'] =$this->Users->fetch_users_groups() ;
      $data['users'] =$this->Users->fetch_users_in($ids);
       // print_r($data['users']);

         $this->load->view('admin/users/users_signatures/add_row',$data);
    }

    public function add_option_select(){
        $this->load->model('n/Users');
        $ids=$this->input->post('valu');

        $data['users'] =$this->Users->fetch_users_in($ids);
        $this->load->view('admin/users/users_signatures/get_option_select',$data);
    }


    public function get_role()
    {
        $this->load->model('n/Users');
        $role =$this->input->post('value');

        $role_id = $this->Users->fetch_users_role_id($role);
        echo $role_id;
    }


    public function deleteUserSignatures($id)
    {
        $this->load->model("Difined_model");
        $Conditions_arr=array("id"=>$id);
        $this->Difined_model->delete("users_signatures",$Conditions_arr);

        redirect("Dashboard/userSignatures", 'refresh');
    }
/********************************************************************************/
/********************************************************************************/

 
    public function add_ppermit() { //Dashboard/add_ppermit
           $data['title'] = 'صلاحيات';
       
                $data['subview'] = 'admin/users/add_ppermit';
        $this->load->view('admin_index',$data); 
         
    }
 
 public function personal_profile() { //Dashboard/personal_profile

    $data['title'] = 'بروفايلى';
    $data['subview'] = 'admin/design/personal_profile';
    $this->load->view('admin_index',$data); 

}


 public function pprofile() { //Dashboard/pprofile

    $data['title'] = 'بروفايلى';
    $data['subview'] = 'admin/design/pprofile_view';
    $this->load->view('admin_index',$data); 
  // $this->load->view('admin/design/pprofile_view');

}




}// END CLASS 