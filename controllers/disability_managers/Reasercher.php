
<?php
class Reasercher extends MY_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->library('pagination');
        $this->load->helper(array('url','text','permission','form'));
         if($this->session->userdata('is_logged_in')==0){
             redirect('login');
      }
          $this->load->model('disability_managers_models/Researcher_model');
          $this->load->model('Difined_model');

        $this->relative_relation = $this->Difined_model->select_all("relative_relation","","","","");
        $this->scientific_qualification = $this->Difined_model->select_all("scientific_qualification","","","","");
         
         
         
         
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

    public function  index(){
  
       
    }

    /**
     * ===============================================================================================================
     *
     * ===============================================================================================================
     *                                    ahmed 27-5-2018
     * ===============================================================================================================
     */

    public function Add_researcher_opinion($id){ //disability_managers/Reasercher/Add_researcher_opinion/1
    if ($this->input->post('add') == 'add') {
        $this->Researcher_model->update($id);
        $this->message('success','إضافة راي الباحث بنجاح');
        redirect('disability_managers/Reasercher/Add_researcher_opinion/'.$id,'refresh');
    }elseif($this->input->post('add') == 'add_family_relationship'){
        $this->Researcher_model->insert_family_relationship();
        $this->message('success','إضافة راي الباحث بنجاح');
        redirect('disability_managers/Reasercher/Add_researcher_opinion/'.$id,'refresh');
    }else{
    $data["person_data"] = $this->Researcher_model->getPersonData($id);
    
   
    
    $data["table"] = $this->Researcher_model->getResearcherData($id);
    $data["family_relationship"] = $this->Researcher_model->getFamilyData($id);
   
  //  $this->test($data["family_relationship"]);
    $data["relative_relation"] = $this->Difined_model->select_all("relative_relation","","","","");
    $data["scientific_qualification"] = $this->Difined_model->select_all("scientific_qualification","","","","");
    $data["nationality"] = $this->Difined_model->select_all("nationality_settings","","","","");
    $data['title'] = 'إضافة راي الباحث';
    $data['subview'] = 'admin/disability_managers_views/researchers/researcher_opinion';
    $this->load->view('admin_index', $data);
    }
}
    public function delete_family_row($id,$person_id){
        $this->Researcher_model->delete($id);
        $this->message('success','تم الحذف بنجاح');
        redirect('disability_managers/Reasercher/Add_researcher_opinion/'.$person_id,'refresh');
    }
    public function update_family_relationship($id,$person_id){
       if ($this->input->post('update') == 'update') {
            $this->Researcher_model->update_family_relationship($id);
            $this->message('success','تم التعديل بنجاح');
            redirect('disability_managers/Reasercher/Add_researcher_opinion/'.$person_id,'refresh');
        }
    }
    public function print_me($id){
        $data["person_data"] = $this->Researcher_model->getPersonData($id);
        $data["records"] = $this->Researcher_model->getResearcherData($id);
        $data["family_relationship"] = $this->Researcher_model->getFamilyData($id);
        $data["relative_relation"] = $this->Difined_model->select_all("relative_relation","","","","");
        $data["scientific_qualification"] = $this->Difined_model->select_all("scientific_qualification","","","","");
        $data["nationality"] = $this->Difined_model->select_all("nationality_settings","","","","");
        $data['subview'] = 'admin/disability_managers_views/researchers/print_me';
        $this->load->view('admin_index', $data);
    }
    public function researcher_view($id){
        $data["person_data"] = $this->Researcher_model->getPersonData($id);
        $data["table"] = $this->Researcher_model->getResearcherData($id);
        $data["family_relationship"] = $this->Researcher_model->getFamilyData($id);
        $data["relative_relation"] = $this->Difined_model->select_all("relative_relation","","","","");
        $data["scientific_qualification"] = $this->Difined_model->select_all("scientific_qualification","","","","");
        $data["nationality"] = $this->Difined_model->select_all("nationality_settings","","","","");
        $data['title'] = 'إضافة راي الباحث';
        $data['subview'] = 'admin/disability_managers_views/researchers/researcher_view';
        $this->load->view('admin_index', $data);
    }
    /**
     * ===============================================================================================================
     *
     * ===============================================================================================================
     *                                    ahmed 27-5-2018
     * ===============================================================================================================
     */
}// END CLASS 