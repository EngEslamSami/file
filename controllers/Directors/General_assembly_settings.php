<?php
class General_assembly_settings extends MY_Controller
{
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


        $this->load->model('directors/General_assembly_setting');
        $this->load->model('human_resources_model/employee_setting/Employee_setting');
        $this->myarray = $this->General_assembly_setting->all_settings();


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
 *  ================================================================================================================
 *
 *  ================================================================================================================
 */

    public function settings($type=0){    // Directors/General_assembly_settings/settings


        $data['areas']= $this->Employee_setting->select_areas();
        $data['residentials']= $this->Employee_setting->select_residentials();
        

        $data['typee']= $type;
        $data['all']= $this->General_assembly_setting->get_all_data_member_settings($this->myarray);

        $data['subview'] = 'admin/directors/general_assembly/general_assembly_settings';
        $this->load->view('admin_index', $data);
    }




    public function AddSitting($type){  // Directors/General_assembly_settings/AddSitting

        if($this->input->post('add')){
            $this->General_assembly_setting->add_member_settings($type);
            $this->message('success','إضافة '.$this->myarray[$type]['title']);
            redirect('Directors/General_assembly_settings/settings/'.$type ,'refresh');
        }

    }
    public function UpdateSitting($id,$type){
        $data['record'] = $this->General_assembly_setting->getById_member_settings($id);
        $data['typee'] = $type ;
        $data['disabled'] = 'disabled' ;
        $data["id"]=$id;
        $data["type_name"]=$this->myarray[$type];
        if($this->input->post('add')){
            $this->General_assembly_setting->update_member_settings($id);
            $this->message('success',' تحديث البيانات');
            redirect('Directors/General_assembly_settings/settings/'.$type,'refresh');
        }

        $data['title'] = 'تعديل ';
        $data['subview'] = 'admin/directors/general_assembly/general_assembly_settings';
        $this->load->view('admin_index', $data);
    }


    public function DeleteSitting($id,$type){
        $this->General_assembly_setting->delete_member_settings($id);
        $this->message('success','حذف ');
        redirect('Directors/General_assembly_settings/settings/'.$type,'refresh');
    }


/*****************************************/


    public function AddSittingAreas($type){  // Directors/General_assembly_settings/AddSittingAreas


        if($this->input->post('add_area')){
            $this->Employee_setting->add_area($type);
            $this->message('success','إضافة ');
            redirect('Directors/General_assembly_settings/settings/'.$type,'refresh');
        }

    }

    public function UpdateSittingAreas($id,$type){
        $data['areas']= $this->Employee_setting->select_areas();
        //$data['classes']= $this->Employee_setting->select_classes();
        $data['area'] = $this->Employee_setting->getAreas($id);
        $data['typee'] = $type ;
        $data["id"]=$id;
        $data['disabled'] = 'disabled' ;
        $data["type_name"]='';
        if($this->input->post('add_area')){
            $this->Employee_setting->update_area($id,$type);
            $this->message('success',' تحديث البيانات');
            redirect('Directors/General_assembly_settings/settings/'.$type,'refresh');
        }
        // $data['title'] = 'تعديل ';
        $data['title'] = "التعريفات ";
        $data['subview'] = 'admin/directors/general_assembly/general_assembly_settings';
        $this->load->view('admin_index', $data);
    }



    public function DeleteSittingAreas($type,$id){
        $this->Employee_setting->deleteAreas($id);
        $this->message('success','حذف ');
        redirect('Directors/General_assembly_settings/settings/'.$type ,'refresh');
    }




}// END CLASS