<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lagna extends MY_Controller {

    public $CI = NULL;
    public function __construct()
	{
        parent::__construct();
        $this->load->library('pagination');
        $this->CI = & get_instance();
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
        $this->load->model('Difined_model');
        $this->load->model('familys_models/lagna_model/Committee_model');
        
        
        $this->groups=$this->Groups->get_group($_SESSION["group_number"]);
        $this->groups_title=$this->Groups->get_group_title($_SESSION["group_number"]); 
        
        
        
    }
  private  function test($data=array()){
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }
     private  function test_r($data=array()){
        echo "<pre>";
        print_r($data);
        echo "</pre>";
       
    }
    private function thumb($data)
	{
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

    private function upload_image($file_name)
	{
        $config['upload_path'] = 'uploads/images';
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf';
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

    private function upload_file($file_name)
	{
        $config['upload_path'] = 'uploads/files';
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
        $config['overwrite'] = true;
        $this->load->library('upload',$config);
        if(! $this->upload->do_upload($file_name)){
            return  false;
        }else {
            $datafile = $this->upload->data();
            return $datafile['file_name'];
        }
    }

    private function url()
	{
        unset($_SESSION['url']);
        $this->session->set_flashdata('url','http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
    }
  
    private function message($type,$text)
	{
        if($type =='success') {
            return $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> تم بنجاح!</strong> '.$text.'.</div>');
        }elseif($type=='wiring'){
            return $this->session->set_flashdata('message','<div class="alert alert-warning alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> تحذير  !</strong> '.$text.'.</div>');
        }elseif($type=='error'){
            return  $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>خطأ!</strong> '.$text.'.</div>');
        }
    }
/****************************************************************/	
/*familys_views/lagna_view */
    
public function add_lagna()
{

   $data['all_member']= $this->Committee_model->get_all_members();
    $data['records']=$this->Committee_model->get_all_lgna();
    $data['title']="اضافه لجنه";


    $data['subview'] = 'admin/familys_views/lagna_view/add_member';
    $this->load->view('admin_index', $data);
}
    public function add_lagna_member() // family_controllers/Lagna/add_lagna_member
    {
       
        $this->Committee_model->insert_lgna();
    }

    public function make_form()
    {
       
        $data['num']= $this->input->post('num');
        $this->load->view('admin/familys_views/lagna_view/load_form',$data);
    }
    public function add_member_out()
    {
       
        $this->Committee_model->save_member_out();
    }
    public function delete_member($id)
    {

        $this->Committee_model->delete_member($id,'id');
        redirect('Lagna/add_lagna');
    }
    public function delete_lgna($lagna_num)
    {
        $this->load->model('administrative_affairs_models/Committee_model');
        $this->Committee_model->delete_member($lagna_num,'lagna_num');
        redirect('Lagna/add_lagna');
    }


 public function add_lagna_session()  //family_controllers/Lagna/add_lagna_session
     {
        $this->load->model('familys_models/lagna_model/Lagna_session_model');
         $this->load->model('familys_models/Father');
         $this->load->model('Nationality');
         $this->load->model("familys_models/Register");
         $this->load->model('Difined_model');
         $this->load->model('familys_models/Devices');
         $this->load->model('familys_models/House');
         $this->load->model('familys_models/Mother');
         $this->load->model('familys_models/Money');
         $this->load->model("familys_models/Family_members");
         $data["person_type"]=$this->Difined_model->select_search_key('family_setting','type',32);
         $data["id_source"]=$this->Difined_model->select_search_key('family_setting','type',38);
         $data["relationships"]=$this->Difined_model->select_search_key('family_setting','type',34);
         $data['nationality']=  $this->Mother->get_from_family_setting(2);
         $data['national_id_array']=  $this->Mother->get_from_family_setting(1);
         $data['job_titles']=  $this->Mother->get_from_family_setting(3);
         $data['nationality']=  $this->Mother->get_from_family_setting(2);
         $data['living_place_array']=  $this->Mother->get_from_family_setting(5);
         $data['national_id_array']=  $this->Mother->get_from_family_setting(1);
         $data['health_status_array']=  $this->Mother->get_from_family_setting(6);
         $data['education_level_array']=  $this->Mother->get_from_family_setting(8);
         $data["diseases_status"]=$this->Difined_model->select_search_key('family_setting','type',37);
         $data['women_houses']=$this->Difined_model->select_search_key('family_setting','type',44);
         $data['job_titles']=  $this->Mother->get_from_family_setting(3);
         $data['arr_ed_state']=  $this->Mother->get_from_family_setting(9);
         $data['arr_deth']=  $this->Mother->get_from_family_setting(25);
         $data['marital_status_array']=  $this->Mother->get_from_family_setting(4);
         $data['main_depart']=  $this->Mother->get_from_family_setting(12);
         $data['arr_type_house']=  $this->Mother->get_from_family_setting(14);
         $data['arr_direct']=  $this->Mother->get_from_family_setting(23);
         $data['house_state']=  $this->Mother->get_from_family_setting(22);
         $data['house_own']=  $this->Mother->get_from_family_setting(13);
         $data["income_sources"]=$this->Difined_model->select_search_key('family_setting','type',42);
         $data["monthly_duties"]=$this->Difined_model->select_search_key('family_setting','type',43);
         $data['all_orders']=$this->Lagna_session_model->get_all_orders();
         $data['banks'] = $this->Difined_model->select_all('banks','','',"id","asc");
         $data['all_areas']=$this->Lagna_session_model->get_all_areas();
         $data['arr_op']=  $this->Mother->get_from_family_setting(28);
         $data['arr_in']=  $this->Mother->get_from_family_setting(27);
         $data['arr_type']=  $this->Mother->get_from_family_setting(29);
        // $data['all_areas']=$this->Lagna_session_model->get_all_areas();
         $data['last_account'] = $this->Mother->getFamilyAccount($this->uri->segment(4));
         $data['person_account'] = $this->Mother->getBasicAccount($this->uri->segment(4));
         $data['agent_bank_account'] = $this->Mother->getBasicAccount_agent($this->uri->segment(4));


  $data['session_member']=$this->Lagna_session_model->get_member_session(); 


        
         $data['subview'] = 'admin/familys_views/lagna_view/session_lagna';
         $this->load->view('admin_index', $data);
     }

/**********************************************************************************************/
 /*
     public function add_lagna_session()  //family_controllers/Lagna/add_lagna_session
     {
        $this->load->model('familys_models/lagna_model/Lagna_session_model');
         $this->load->model('familys_models/Father');
         $this->load->model('Nationality');
         $this->load->model("familys_models/Register");
         $this->load->model('Difined_model');
         $this->load->model('familys_models/Devices');
         $this->load->model('familys_models/House');
         $this->load->model('familys_models/Mother');
         $this->load->model('familys_models/Money');
         $this->load->model("familys_models/Family_members"); 
        
         $data['nationality']=  $this->Mother->get_from_family_setting(2);
         $data['national_id_array']=  $this->Mother->get_from_family_setting(1);
         $data['job_titles']=  $this->Mother->get_from_family_setting(3);
         $data['nationality']=  $this->Mother->get_from_family_setting(2);
         $data['living_place_array']=  $this->Mother->get_from_family_setting(5);
         $data['national_id_array']=  $this->Mother->get_from_family_setting(1);
         $data['health_status_array']=  $this->Mother->get_from_family_setting(6);
         $data['education_level_array']=  $this->Mother->get_from_family_setting(8);
         $data['job_titles']=  $this->Mother->get_from_family_setting(3);
         $data['arr_ed_state']=  $this->Mother->get_from_family_setting(9);
         $data['arr_deth']=  $this->Mother->get_from_family_setting(25);
         $data['marital_status_array']=  $this->Mother->get_from_family_setting(4);
         $data['main_depart']=  $this->Mother->get_from_family_setting(12);
         $data['arr_type_house']=  $this->Mother->get_from_family_setting(14);
         $data['arr_direct']=  $this->Mother->get_from_family_setting(23);
         $data['house_state']=  $this->Mother->get_from_family_setting(22);
         $data['house_own']=  $this->Mother->get_from_family_setting(13);
         $data["income_sources"]=$this->Difined_model->select_search_key('family_setting','type',42);
         $data["monthly_duties"]=$this->Difined_model->select_search_key('family_setting','type',43);
         $data['all_orders']=$this->Lagna_session_model->get_all_orders();
         $data['all_areas']=$this->Lagna_session_model->get_all_areas();
        // $data['all_areas']=$this->Lagna_session_model->get_all_areas();





        
         $data['subview'] = 'admin/familys_views/lagna_view/session_lagna';
         $this->load->view('admin_index', $data);
     }

    */
public function change_aproved()//family_controllers/Lagna/change_aproved
{
     $this->load->model('familys_models/lagna_model/Lagna_session_model');
       
 $this->Lagna_session_model->update_approved_lagna();
}


  
	 
	 public function galsa_member()   // family_controllers/Lagna/galsa_member 
{
    $data['title']="اعضاء الجلسه";

    $data['lagna_member']=$this->Committee_model->get_member_lagna();
    $data['session_num']=$this->Committee_model->get_last_session();
    $data['session_members']=$this->Committee_model->get_all_session();

    $data['subview'] = 'admin/familys_views/lagna_view/galsa_member';
    $this->load->view('admin_index', $data);
}
public function add_selected_member()
{
    
    
    $this->Committee_model->insert_selected_lagna();



}



public function delete_session_member($id)
    {

        $this->Committee_model->delete_member_galsa('id',$id);


        redirect('family_controllers/Lagna/galsa_member');
    }



 } // END CLASS 

