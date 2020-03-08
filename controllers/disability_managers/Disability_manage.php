
<?php
class Disability_manage extends MY_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->library('pagination');
        $this->load->helper(array('url','text','permission','form'));
         if($this->session->userdata('is_logged_in')==0){
             redirect('login');
      }
      
          $this->load->model('disability_managers_models/Disabilities_persons');
          $this->load->model('directors/Magls');
          $this->load->model('directors/Time_tables');
          $this->load->model('Difined_model');
         
    $this->load->model('system_management/Groups');
    
    $this->groups=$this->Groups->get_group($_SESSION["group_number"]);
    $this->groups_title=$this->Groups->get_group_title($_SESSION["group_number"]);
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
              return $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible shadow" ><button type="button" class="close pull-left" data-dismiss="alert">×</button><h4 class="text-lg"><i class="fa fa-check icn-xs"></i> تم بنجاح ...</h4><p>'.$text.'!</p></div>');
          }elseif($type=='wiring'){
              return $this->session->set_flashdata('message','<div class="alert alert-warning alert-dismissible" ><button type="button" class="close pull-left" data-dismiss="alert">×</button><h4 class="text-lg"><i class="fa fa-exclamation-triangle icn-xs"></i> تحذير هام ...</h4><p>'.$text.'</p></div>');
          }elseif($type=='error'){
              return  $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" ><button type="button" class="close pull-left" data-dismiss="alert">×</button><h4 class="text-lg"><i class="fa fa-exclamation-circle icn-xs"></i> خطآ ...</h4><p>'.$text.'</p></div>');
          }
        }
/**
 *  ================================================================================================================
 * 
 *  ----------------------------------------------------------------------------------------------------------------
 *                                       
 * -----------------------------------------------------------------------------------------------------------------
 */
public function download($file) //disability_managers/Disability_manage/download
        {
        
        $this->load->helper('download');
        $name = $file;
        $data = file_get_contents('./uploads/files/'.$file); 
        force_download($name, $data); 
        redirect('disability_managers/Disability_manage/add_disabilities_persons','refresh');
        }
        
        public function read_file($file_name) ////disability_managers/Disability_manage/read_file
    {
        $this->load->helper('file');
       // $file_name=$this->uri->segment(3);
        $file_path = 'uploads/files/'.$file_name;
        header('Content-Type: application/pdf');
        header('Content-Discription:inline; filename="'.$file_name.'"');
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges:bytes');
        header('Content-Length: ' . filesize($file_path));
        readfile($file_path);
    } 
        
    public function  index(){
  
       
    }
 /**
 * ===============================================================================================================
 * 
 * ===============================================================================================================
 *                                          نموذج تسجيل مستفيد لدي الجمعية
 * ===============================================================================================================
 */ 
    public function add_disabilities_persons(){ // disability_managers/Disability_manage/add_disabilities_persons
      //  Directors   
        if ($this->input->post('add')){
             
           for($x = 1 ; $x <= $this->input->post('photo_num') ; $x++)
            {
                $file_name='img'.$x;
                $file[]= $this->upload_file($file_name);
            }
            $file_name='medical_report';
            $file2= $this->upload_file($file_name);
            $this->Disabilities_persons->insert($file,$file2);   
            redirect('disability_managers/Disability_manage/add_disabilities_persons','refresh');
        }
        if($this->input->post('num_photo'))
        {
            if($this->input->post('num_photo') != 0)
            {
                $data['result'] = $this->input->post('num_photo');
                $this->load->view('admin/disability_managers_views/disabilities_persons_views/photos', $data);
            }
        }elseif($this->input->post('num')){
          $data["load_data"]=$this->Disabilities_persons->check_id($this->input->post('num')); 
          $this->load->view('admin/disability_managers_views/disabilities_persons_views/load',$data);
        }else{
            
 
        $data["nationality_settings"]=$this->Difined_model->select_all('nationality_settings',"","","id","ASC");
        $data["types"]=$this->Difined_model->select_all('disabilities_type_settings',"","","id","ASC");
        $data["records"]=$this->Disabilities_persons->select_all();
        $data["student_code"]=$this->Disabilities_persons->select_last_id();
        $data['title'] = 'نموذج تسجيل مستفيد لدي الجمعية';
        $data['metakeyword'] = 'نموذج تسجيل مستفيد لدي الجمعية';
        $data['metadiscription'] = '';
        $data['subview'] = 'admin/disability_managers_views/disabilities_persons_views/disabilites_person';
        $this->load->view('admin_index', $data);
    }
    }
    public function update_person_state($id){
        if($this->input->post('add')){
            $this->Disabilities_persons->update_person_state($id,$this->input->post('sc_id'));
            redirect('disability_managers/Disability_manage/add_disabilities_persons',  'refresh');  
        }
        
    }


    public function delete_person($id){
        $this->Disabilities_persons->delete($id);
        redirect('disability_managers/Disability_manage/add_disabilities_persons');
    }

    public function update_person($id){
      

        if($this->input->post('update')){

if($this->input->post('photo_num') != ''){
 for($x = 1 ; $x <= $this->input->post('photo_num') ; $x++)
            {
                $file_name='img'.$x;
                $file[]= $this->upload_file($file_name);
            }    
}else{
 $file ='';   
}
            $file_name='medical_report';
            $file2= $this->upload_file($file_name);
            
            $this->Disabilities_persons->update($id,$file,$file2);
            redirect('disability_managers/Disability_manage/add_disabilities_persons','refresh');
        }
        $data["nationality_settings"]=$this->Difined_model->select_all('nationality_settings',"","","id","ASC");
        $data['result']=$this->Disabilities_persons->getById($id);
        $data['records_images']=$this->Disabilities_persons->get_photo($id);
        $data["types"]=$this->Difined_model->select_all('disabilities_type_settings',"","","id","ASC");
        $data['subview'] = 'admin/disability_managers_views/disabilities_persons_views/disabilites_person';
        $data['title'] = 'تعديل منوذج تسجيل مستفيد';
        $data['metakeyword'] = 'تعديل منوذج تسجيل مستفيد';
        $this->load->view('admin_index', $data);
    }

   
    public function delete_photo_($id,$index){ //disability_managers/Disability_manage/delete_photo_
    
        $this->Disabilities_persons->delete_photo($index);
        redirect('disability_managers/Disability_manage/update_person/'.$id.'');
    }

 
     public function print_person($id){
    
        $data["nationality_settings"]=$this->Difined_model->select_all('nationality_settings',"","","id","ASC");
        $data['result']=$this->Disabilities_persons->getById($id);
        $data['records_images']=$this->Disabilities_persons->get_photo($id);
        $data["types"]=$this->Difined_model->select_all('disabilities_type_settings',"","","id","ASC");
        $this->load->view('admin/disability_managers_views/disabilities_persons_views/print_disabilites_person',$data);
        //$this->load->view('admin_index', $data);
    }
    
    
         public function applications_of_beneficiaries_received(){ // disability_managers/Disability_manage/applications_of_beneficiaries_received
        
        $data["nationality_settings"]=$this->Difined_model->select_all('nationality_settings',"","","id","ASC");
        $data["types"]=$this->Difined_model->select_all('disabilities_type_settings',"","","id","ASC");
        $data["records"]=$this->Disabilities_persons->select_all_approved();
        
        $data['title'] = 'طلبات المستفدين الواردة';
        $data['metakeyword'] = 'طلبات المستفدين الواردة';
        $data['metadiscription'] = '';
        $data['subview'] = 'admin/disability_managers_views/disabilities_persons_views/beneficiaries_received';
        $this->load->view('admin_index', $data);  
     }
     public function accepet_received($id){
      $this->Disabilities_persons->accepet_received($id);
      redirect('disability_managers/Disability_manage/applications_of_beneficiaries_received',  'refresh');  
        
     }
     
      /**
 * ===============================================================================================================
 * 
 * ===============================================================================================================
 *                                          تقارير طلبات المستفيدين
 * ===============================================================================================================
 */
 public function reports_order_received(){ // disability_managers/Disability_manage/reports_order_received
    //   die;
        $data["records"]=$this->Disabilities_persons->select_all_persons();
        $data['title'] = 'تقارير طلبات المستفيدين';
        $data['metakeyword'] = 'تقارير طلبات المستفيدين';
        $data['metadiscription'] = '';
        $data['subview'] = 'admin/disability_managers_views/disabilities_persons_views/reports/reports_order_received';
        $this->load->view('admin_index', $data);  
     }
  /**
 * ===============================================================================================================
 * 
 * ===============================================================================================================
 *                                          تقارير بنوع الإعاقة
 * ===============================================================================================================
 */    
    public function reports_disability(){ // disability_managers/Disability_manage/reports_disability
    $data["types"]=$this->Difined_model->select_all('disabilities_type_settings',"","","id","ASC");
    $data["nationality_settings"]=$this->Difined_model->select_all('nationality_settings',"","","id","ASC");
         if ($this->input->post('type')){
            $type=$this->input->post('type');
            $data["records"]=$this->Disabilities_persons->select_all_disability($type);
            $this->load->view('admin/disability_managers_views/disabilities_persons_views/reports/get_data',$data);
        }else{
            $data['title'] = 'تقارير بنوع الإعاقة';
            $data['metakeyword'] = 'تقارير بنوع الإعاقة';
            $data['subview'] = 'admin/disability_managers_views/disabilities_persons_views/reports/reports_disability';
            $this->load->view('admin_index', $data);   
        }
  }   
   /**
 * ===============================================================================================================
 * 
 * ===============================================================================================================
 *                                          تقارير باسم الجهاز
 * ===============================================================================================================
 */ 
     public function reports_devices(){ // disability_managers/Disability_manage/reports_devices
            $data["medical_devices"]=$this->Difined_model->select_all('medical_devices',"","","id","ASC");
         if ($this->input->post('type')){
            $type=$this->input->post('type');
            $data["records"]=$this->Disabilities_persons->select_all_devices($type);
            $this->load->view('admin/disability_managers_views/disabilities_persons_views/reports/get_data_report',$data);
        }else{
            $data['title'] = 'تقارير باسم الجهاز';
            $data['metakeyword'] = 'تقارير باسم الجهاز';
            $data['subview'] = 'admin/disability_managers_views/disabilities_persons_views/reports/reports_devices';
            $this->load->view('admin_index', $data);   
        }
  }
 /**
 * ===============================================================================================================
 * 
 * ===============================================================================================================
 *                                          تقارير بنود البحث
 * ===============================================================================================================
 */ 
 

     public function search_terms(){ // disability_managers/Disability_manage/search_terms
           $data["types"]=$this->Difined_model->select_all('disabilities_type_settings',"","","id","ASC");
           $data["nationality_settings"]=$this->Difined_model->select_all('nationality_settings',"","","id","ASC");
           
         if($this->input->post('type')){
            if($this->input->post('type') == '1'){
            $stat = '0';
            $data["txt"]=' عدد الطلبات الواردة';
            }elseif($this->input->post('type') == '2'){
             $stat = '1';
             $data["txt"]=' عدد الطلبات الموافق عليها';
            }elseif($this->input->post('type') == '3'){
            $stat = '2';
            $data["txt"]=' عدد الطلبات المرفوضة'; 
            }elseif($this->input->post('type') == '4'){
             $stat = '4';
             $data["txt"]=' عدد الطلبات التي تم إعتمادها';   
                 
            }
           $data["records"]=$this->Disabilities_persons->select_all_Incoming($stat); 
           $this->load->view('admin/disability_managers_views/disabilities_persons_views/reports/get_search_terms',$data); 
        }else{
            $data['title'] = 'تقارير بنود البحث';
            $data['metakeyword'] = 'تقارير بنود البحث';
            $data['subview'] = 'admin/disability_managers_views/disabilities_persons_views/reports/search_terms';
            $this->load->view('admin_index', $data);   
        }
  }    
     
    
}// END CLASS 