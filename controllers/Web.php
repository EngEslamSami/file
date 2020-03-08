<?php
class Web extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->helper(array('url','text','permission','form'));
        $this->load->helper('pagination'); 
        
        
        // omnia
        $this->load->model('Public_relations/website/about_us/About_us_model', 'about_us');
        $this->load->model('Public_relations/website/shoraka_models/Shoraka_model', 'Shoraka');
        $this->load->model('main_data/Model_main_data');
        $this->load->model('main_data/Model_slide');
        $this->load->model('main_data/Model_data_web');
        
        $this->load->model('familys_models/web_model/Family_members_web');
       // $this->load->model('familys_models/web_model/Family_web_profile','family_web_profile');
       $this->load->model('Public_relations/website/services_setting_model/Family_web_profile','family_web_profile');
        
         


        $this->pages_data = $this->about_us->pages_web();
        $this->web_shoraka = $this->Shoraka->selet_webshoraka();
        $this->soeials=$this->Model_main_data->select_all_soeial();
        $this->main_data=$this->Model_main_data->select_main_data();
        $this->main_data_slide= $this->Model_slide->selet_all();
        $this->web_display = $this->Model_data_web->select(); 
        
        //nagwa
        
  
        
        
        
        $this->load->model('Public_relations/website/pr/Report_model');
        $this->load->model('Public_relations/website/pr/Plans_model');
        $this->load->model('Public_relations/website/pr/System_model');
        
        $this->load->model('Public_relations/website/library/Photos_model');
        $this->load->model('Public_relations/website/library/Videos_model');
        
        $this->load->model('Public_relations/News_model');
        $this->load->model('Public_relations/website/mobadra/Mobdra_model');
        
        
        $this->load->model("Public_relations/website/web_registration/NewRegister");
        $this->load->model("Public_relations/website/web_registration/Kafala_model");
        $this->load->model('Public_relations/website/projects/Project_model');
      //  $this->load->model('Public_relations/website/programs/Program_model');
        $this->load->model('Public_relations/website/pr_membering/Membering_model');
        $this->load->model('Public_relations/website/nabza/Nabza_model');
        $this->load->model('Public_relations/website/directors/Magles_model');
         $this->load->model('Public_relations/website/about_us/Structure_model', 'model');
         
         // ahmed abd elghfar
         $this->load->model('Public_relations/website/edara_tanfezia/Edara_tanfezia_model');
        
        
        
    }
 
    public function about_us($id)
    {
        $id = base64_decode($id);
        $page_data = $this->about_us->page_web($id);
        $data['page_data'] = $page_data;
        $data['id_page'] = $id;
        if ($page_data->have_sub == 0) {
            $data['subview'] = 'web/about/king_word';
            $this->load->view('web_home_index', $data);
        } else {
            $data['subview'] = 'web/about/vision';
            $this->load->view('web_home_index', $data);
        }
    } 
    
    public function  index(){
        
        $this->load->model('all_Finance_resource_models/sponsors/Sponsors_model_load');
$data["all_aytam"]= $this->Sponsors_model_load->all_aytam('f_members.categoriey_member=2   AND f_members.persons_status =1');
$data["all_mostafed"]= $this->Sponsors_model_load->all_aytam('f_members.categoriey_member=3   AND f_members.persons_status =1');
$data["all_mostafed_mkfol"]= $this->Sponsors_model_load->all_aytam('f_members.categoriey_member=3   AND f_members.persons_status =1 And
    f_members.first_kafala_type =3 AND f_members.first_halet_kafala =1 ');
$data["all_aytam_nos"]= $this->Sponsors_model_load->all_aytam_mkfol_nos();
$data["all_aytam_shamla"]= $this->Sponsors_model_load->all_aytam_mkfol_shamla();
$data["all_armal"]= $this->Sponsors_model_load->all_armal('mother.categoriey_m =1 And mother.halt_elmostafid_m =1 And mother.person_type =62');
$data["all_armal_mkfol"]= $this->Sponsors_model_load->all_armal('mother.categoriey_m =1 And mother.halt_elmostafid_m =1 And mother.person_type =62 And 
    mother.first_kafala_type =4 AND mother.first_halet_kafala =1 ');
/*************************************************/

        
        
        
         $data["result"] = $this->News_model->display_publisher_data(10);
         $data['mobdra_result']= $this->Mobdra_model->display_publisher_data(6);
        $data['projects'] = $this->Project_model->display_projects();
        $data['count']= $this->Family_members_web->get_count();
         $data['nabza']=$this->Nabza_model->display_nabza();
          $data['main_video']=$this->Videos_model->select_Main_video();
         $data['subview'] = 'web/home';
         $this->load->view('web_home_index',$data);
    }
    
    
     public function  store(){
         $data['subview'] = 'web/store';
         $this->load->view('web_home_index',$data);
    }
    
    
    
        public function king_word()
    {
        $data['subview'] = 'web/about/king_word';
        $this->load->view('web_home_index',$data);
    }


    public function president_word()
    {
        $data['subview'] = 'web/about/president_word';
        $this->load->view('web_home_index',$data);
    }
    
    public function vision()
    {
        $data['subview'] = 'web/about/vision';
        $this->load->view('web_home_index',$data);
    }
    public function managment_members()
    {
          $this->load->model('md/all_magls_edara_members/All_magls_edara_members_model');
        
         //   $data['all_data'] = $this->All_magls_edara_members_model->get_all_data();
         $data['all_members'] = $this->All_magls_edara_members_model->select_all_magls_edara_members();
      //  $data['magls'] = $this->Magles_model->all_councils(1);
       $data['magls_data'] = $this->All_magls_edara_members_model->get_all_magls_data();
      
      
        $data['id_page'] = 'managment_members';
//        $this->test($data['magls']);


        $data['subview'] = 'web/about/managment_members';
        $this->load->view('web_home_index', $data);
    }
    
    public function omamia_members()
    {
          
     $this->load->model('md/all_gam3ia_omomia_members/Gam3ia_omomia_members_model');
    // $data['all_gam3ia_omomia'] = $this->Model_web->select_all_gam3ia_omomia();
    $data['all_gam3ia_omomia'] = $this->Gam3ia_omomia_members_model->select_all();
       $data['id_page'] = 'omamia_members';
        $data['subview'] = 'web/about/omamia_members';
        $this->load->view('web_home_index', $data);
    }
    
/*    public function managment_general()
    {
$this->load->model('Public_relations/website/about_us/Executive_Management_model');
        $data['members'] = $this->Executive_Management_model->select_Executive_Management();
        $data['id_page'] = 'managment_general';
        $data['subview'] = 'web/about/managment_general';
        $this->load->view('web_home_index', $data);
    }*/
     public function managment_general()
    {
      //   $this->load->model('human_resources_model/egraat_settings/Egraat_settings_model');  
       // $data['all']= $this->Egraat_settings_model->display_web_emps();
        
        
        $data['all']= $this->Edara_tanfezia_model->get_all_emp();

        $data['id_page'] = 'managment_general';
        $data['subview'] = 'web/about/managment_general';
        $this->load->view('web_home_index', $data);
    }



    public function structure()
    {
        $data['imgs'] = $this->model->slect_all();
        
        $data['id_page'] = 'StructureModel';
        $data['subview'] = 'web/about/structure';
        $this->load->view('web_home_index', $data);
    }



    public function projects()
    {
         //$data['projects'] = $this->Project_model->display_projects();
          $data['projects'] = $this->Project_model->display_projects(array('web_display'=>1));
        $data['subview'] = 'web/projects';
        $this->load->view('web_home_index',$data);
    }
    public function market()
    {
        $data['subview'] = 'web/market';
        $this->load->view('web_home_index',$data);
    }
    
    
    
    
    
    
    public function nabza_details($id){

        $data['nabza']=$this->Nabza_model->get_by_id($id);
        $data['subview'] = 'web/nabza_details';
        $this->load->view('web_home_index',$data);
    }
    public function membering()
    {
        $data['membring']=$this->Membering_model->display_membring();
        $data['subview'] = 'web/membering';
        $this->load->view('web_home_index',$data);
    }
    
    
    


   public function news()
    {
		$data["result"] = $this->News_model->display_publisher_data('',array('news_type'=>1));
        $data['title'] ='ÃÎÑ ÃÎÈÇÑ ÇáÌãÚíÉ';
        $data['subview'] = 'web/media_center/news';
        $this->load->view('web_home_index',$data);
    }
     public function newspapers_news()
    {
        $data["result"] = $this->News_model->display_publisher_data('',array('news_type'=>2));
        $data['title'] ='ÃÎÑ ÃÎÈÇÑ ÇáÌãÚíÉ  Ýì ÇáÕÍÇÝÉ';
        $data['subview'] = 'web/media_center/news';
        $this->load->view('web_home_index',$data);
    }
    
    
    public function news_details($id){ // Web/news_details

    $currentURL = current_url();

    $params   = $_SERVER['QUERY_STRING'];
    $fullURL = $currentURL . '?' . $params;

    if($currentURL==base_url()."Web/news_details/".$id){

        $this->News_model->insert_views_new($id);

    }

    $data['details']= $this->News_model->news_details($id)[0];
    $data['result']= $this->News_model->display_publisher_data();


    $data['subview'] = 'web/single_news';
    $this->load->view('web_home_index',$data);
}



    //________________News_____________

    public function mobdra(){ // Web/mobdra

        $data['count']= $this->Mobdra_model->count_all();

        $config = array();

        $config["base_url"] = base_url()."Web/mobdra";

        $config["total_rows"] = $this->Mobdra_model->count_all();

        $config["per_page"] = 3;

        $config["uri_segment"] = 3;

        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tagl_close'] = '</a></li>';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tagl_close'] = '</li>';
        $config['first_tag_open'] = '<li class="page-item disabled">';
        $config['first_tagl_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tagl_close'] = '</a></li>';
        $config['attributes'] = array('class' => 'page-link');

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data["result"] = $this->Mobdra_model->

        feach_records($config["per_page"], $page);


        $data["links"] = $this->pagination->create_links();

        $data['subview'] = 'web/media_center/mobdara';
        $this->load->view('web_home_index',$data);
    }

    public function mobdra_details($id){ // Web/mobdra_details

        $currentURL = current_url();

        $params   = $_SERVER['QUERY_STRING'];
        $fullURL = $currentURL . '?' . $params;

        if($currentURL==base_url()."Web/mobdra_details/".$id){

            $this->Mobdra_model->insert_views_new($id);

        }

        $data['details']= $this->Mobdra_model->news_details($id)[0];
        $data['result']= $this->Mobdra_model->display_publisher_data();


        $data['subview'] = 'web/mobdra_details';
        $this->load->view('web_home_index',$data);
    }
    
    
     public function album($id){
        $data['album'] = $this->Photos_model->display_album($id);
        $data['subview'] = 'web/media_center/gallery';
        $this->load->view('web_home_index',$data);
    }
    
    public function gallery()
    {
        $data['library'] = $this->Photos_model->display_imgs();

        $data['subview'] = 'web/media_center/albums';
        $this->load->view('web_home_index',$data);
    }
    public function videos()
    {
        $data['videos'] = $this->Videos_model->display_videos();


        $data['subview'] = 'web/media_center/videos';
        $this->load->view('web_home_index',$data);
    }
    public function reports()
    {
        $data['reports'] = $this->Report_model->get_main_reports();
        //$data['reports'] = $this->Report_model->display('pr_reports');
        $data['subview'] = 'web/media_center/reports';
        $this->load->view('web_home_index',$data);
    }
    public function system()
    {
        $data['system'] = $this->System_model->display('pr_system');
        $data['subview'] = 'web/media_center/system';
        $this->load->view('web_home_index',$data);
    }

    public function plans()
    {
       
         $data['plans'] = $this->Plans_model->get_main_plans();
       // $data['plans'] = $this->Plans_model->display('pr_plans');
        $data['subview'] = 'web/media_center/plans';
        $this->load->view('web_home_index',$data);
    }

    public function contact()
    {
        // Web/contact
        $this->load->model('contact/Contact_model');
        if ($this->input->post('ADD')){
            $this->Contact_model->insert_contact();

            messages('success','Êã ÇÖÇÝÉ ÈíÇäÇÊß ÈäÌÇÍ');
            redirect('Web/contact','refresh');

        }
        $data['subview'] = 'web/contact';
        $this->load->view('web_home_index',$data);
    }
    
    
      public function single_project($id)
    {

        $data['records'] = $this->Project_model->get_project_details($id);
        $data['subview'] = 'web/single_project';
        $this->load->view('web_home_index',$data);
    }
    public function shopping_cart()
    {
        $data['subview'] = 'web/shopping_cart';
        $this->load->view('web_home_index',$data);
    }


 public function family_register()
    {
        $data['all_attach_file']=$this->NewRegister->select_search_key('family_setting','type',47);
        $data['national_id_array']=  $this->NewRegister->select_search_key('family_setting','type',1);
        $data['marital_status_array']=  $this->NewRegister->select_search_key('family_setting','type',4);
        $data['socity_branch'] = $this->NewRegister->select_all('socity_branch','','',"id","asc");
        $data["relationships"]=$this->NewRegister->selectByType('family_setting','type',34,41);
        $data['all_city'] = $this->NewRegister->select_type(3);
        $data['house_own']=  $this->NewRegister->selectByType('family_setting','type',13,104);

        if($this->input->post("add_row") == "1"){
            $ids = $this->input->post("valu");
            $arr =  explode(",",$ids);
            $data_attach['type_attach_file']=$this->NewRegister->fetch_attach_files_in($arr);
           //print_r($data_attach['type_attach_file']);

            $this->load->view('admin/familys_views/get_main_attach_files',$data_attach);
            return;
           // $this->load->view('admin/familys_views/getFamilyMembers',$data_attach);

        }
        elseif($this->input->post('mother_national_num_chik')) {
            $arr["in"] = $this->NewRegister->select_search_key('basic', 'mother_national_num', $this->input->post('mother_national_num_chik'));
           $this->load->view('admin/familys_views/load', $arr);
        }
        if($this->input->post('ADD') == 'ADD' ){
            $this->NewRegister->insert_new_register($this->input->post('mother_national_num'));
            $all_img= $this->upload_muli_image("attach_files","family_attached");
            $mother_national_num =$this->input->post('mother_national_num');
            $this->NewRegister->insert_new_register_files($all_img,$mother_national_num);

        }


            //________________________________________


     /*   $data['cond']= $this->NewRegister->display_files(1);
       $data['file']= $this->NewRegister->display_files(2);
       $data['accept']= $this->NewRegister->display_files(3); */
       // $data['accept']= $this->NewRegister->display_cond();

//        echo "<pre>";
//        print_r($data['cond']);
//        echo "</pre>";

        $data['subview'] = 'web/family_register';
        $this->load->view('web_home_index',$data);
    }
 
 
 


    
  
    
     //--------------------------------------------------
    public  function upload_image($file_name ,$folder = "images"){
        $config['upload_path'] = 'uploads/'.$folder;
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf';
        // $config['max_size']    = '1024*8';
        $config['max_size']    = '80000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000';

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
    public function thumb($data){
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
//-----------------------------------------------
    public  function upload_file($file_name){
        $config['upload_path'] = 'uploads/files';
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
        // $config['max_size']    = '1024*8';
        $config['max_size']    = '80000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000';

        $config['encrypt_name']=true;
        $config['overwrite'] = true;
        $this->load->library('upload',$config);
        if(! $this->upload->do_upload($file_name)){
            return  false;
        }else {
            $datafile = $this->upload->data();
            return $datafile['file_name'];
        }
    }


    public  function upload_all_files($file_name ,$folder = "images"){
        $config['upload_path'] = 'uploads/'.$folder;
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
        $config['max_size']    = '80000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000';
        $config['encrypt_name']=true;
        $this->load->library('upload',$config);
        if(! $this->upload->do_upload($file_name)){
            return  false;
        }else{
            $datafile = $this->upload->data();
            return  $datafile['file_name'];
        }
    }

    private function upload_muli_image($input_name,$folder = "images"){
        $filesCount = count($_FILES[$input_name]['name']);
        for($i = 0; $i < $filesCount; $i++){
            $_FILES['userFile']['name'] = $_FILES[$input_name]['name'][$i];
            $_FILES['userFile']['type'] = $_FILES[$input_name]['type'][$i];
            $_FILES['userFile']['tmp_name'] = $_FILES[$input_name]['tmp_name'][$i];
            $_FILES['userFile']['error'] = $_FILES[$input_name]['error'][$i];
            $_FILES['userFile']['size'] = $_FILES[$input_name]['size'][$i];
            // $all_img[]=$this->upload_image("userFile",$folder);
            $all_img[]=$this->upload_all_files("userFile",$folder);
        }
        return $all_img;
    }
	
    
    
    /* public function download($file,$d_name='') {
    
        $this->load->helper('download');
        if (!empty($d_name)){
              $name = $this->System_model->get_decrypt_name($d_name);
        } else{
            $name = $file;
        }
        $data = file_get_contents('./uploads/files/'.$file);
        force_download($name, $data);

    }
    
    */
    
  
public function download($file,$d_name='',$type) 
    {
     
        $this->load->helper('download');
        if (!empty($d_name)){
          
            if ($type==1){
                $name = $this->System_model->get_decrypt_name($d_name);
            } elseif ($type==2){
                $name = $this->Report_model->get_decrypt_name($d_name);
            }

        } else{
            $name = $file;
        }
        $data = file_get_contents('./uploads/files/'.$file);
        force_download($name, $data);

    }  
    
    /*
		 public function download($file) // Web/download
    {

        $this->load->helper('download');
        $name = $file;
        $data = file_get_contents('./uploads/files/'.$file);
        force_download($name, $data);

    }*/
   /* public function read_file($file_name) // Web/read_file
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
    }*/
    
    
    	    public function read_file($file_name,$id,$type) 
    {
        $this->load->helper('file');
        
        if (!empty($id) && $type==1  ){
            $name = $this->System_model->get_decrypt_name($id);
        } elseif (!empty($id) && $type==2){
            $name = $this->Report_model->get_decrypt_name($id);
        }
        $file_path = 'uploads/files/'.$file_name;
        header('Content-Type: application/pdf');
        header('Content-Discription:inline; filename="'.$file_name.'"');
        header('Content-Disposition: filename="'.$name.'"');
        //header('Content-Discription:inline; filename="'.$name.'"');
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges:bytes');
        header('Content-Length: ' . filesize($file_path));
        readfile($file_path);
    }
    
    //nagwa
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
            $MDay_Name = "ÇáÃÍÏ";
        }elseif ($MDay_Num=="1"){
            $MDay_Name = "ÇáÅËäíä";
        }elseif ($MDay_Num=="2"){
            $MDay_Name = "ÇáËáÇËÇÁ";
        }elseif ($MDay_Num=="3"){
            $MDay_Name = "ÇáÃÑÈÚÇÁ";
        }elseif ($MDay_Num=="4"){
            $MDay_Name = "ÇáÎãíÓ";
        }elseif ($MDay_Num=="5"){
            $MDay_Name = "ÇáÌãÚÉ";
        }elseif ($MDay_Num=="6"){
            $MDay_Name = "ÇáÓÈÊ";
        }
        $NowDayName = $MDay_Name;
        $NowDate = $MDay_Name."¡ ".$HDays."/".$HMonths."/".$HYear." åÜ";



        return $HYear;


    }
    public function GetDepart()
    {
        if ($this->input->post("get_depart")) {
            $admin_id = $this->input->post("get_depart");
          //  $this->load->model('Difined_model');
            $data_load["admin_id"] = $admin_id;
            $data_load["departments"] = $this->NewRegister->select_search_key("department_jobs", "from_id_fk", $admin_id);
            $this->load->view('admin/familys_views/get_department', $data_load);
        } elseif ($this->input->post("get_emp")) {
            $this->load->model('Model_transformation_process');
            $depart_id = $this->input->post("get_emp");
            $data_load["depart_id"] = $depart_id;
            $Conditions_arr = array("employees.administration" => $depart_id);
            $data_load["select_user"] = $this->NewRegister->select_user_where($Conditions_arr);
            $this->load->view('admin/familys_views/get_department', $data_load);
        }
    }
    public function getFamilyMembers(){
      //  $this->load->model("Difined_model");
        $data_load["relationships"]=$this->NewRegister->select_search_key('family_setting','type',34);
        $data_load["id_source"]=$this->NewRegister->select_search_key('family_setting','type',12);
        $data_load['current_year'] =   $this->current_hjri_year();
        $this->load->view('admin/familys_views/getFamilyMembers',$data_load);

    }
    public function GetClassification(){
       // $this->load->model('Difined_model');
        $condition =array('gender_fk'=>$_POST['gender'],'from_age <='=>$_POST['age'],'to_age >='=>$_POST['age']);
        $data  =$this->NewRegister->getByArray('family_ages_setting',$condition);
        $Classification =array(1=>'ÃÑãá', 2=>'íÊíã',3=>' ãÓÊÝíÏ ÈÇáÛ');

        if(!empty($data)){
            $title =$Classification[$data['tasnef']];
        } else {
            $title ='ÛíÑ ãÍÏÏ';
        }
        $arr['title']= $title;
        $arr['tasnef']= $data['tasnef'];
        echo json_encode($arr);
    }

    public  function CheckNationalNum(){
      //  $this->load->model("familys_models/Register");
        $mother_national_num =$this->input->post('chek_mother_national_num');
        echo $this->NewRegister->check_national_num($mother_national_num);

    }
    public function GetArea(){
        if($this->input->post('get_sub_id') ){
           // $this->load->model('familys_models/Model_area_sitting');
            $id =$this->input->post('get_sub_id');
            $data["records_row"]=$this->NewRegister->select_places($id);
            $this->load->view('admin/familys_views/area_sitting/load_places',$data);
            //  json_encode($data["records_row"]);
        }
    }
    
    
public function kafala_login()
{
    if ($this->input->post('login') == 1) {
        $login = $this->Kafala_model->check_login();

        if ((!empty($login))) {
            $this->session->set_userdata($login);

            redirect('Web/profile', 'refresh');
        } else {
            $data['massege'] = 'ÇáÑÌÇÁ ÇáÊÃßÏ ãä ÈíÇäÇÊß ';

        }
    }


    $data['subview'] = 'web/kafala_login';
    $this->load->view('web_home_index',$data);
}
public function profile()
{
if (isset($_SESSION['k_num'])){
$k_num = $_SESSION['k_num'];
$data['kafel_details']= $this->Kafala_model->select_all_orders($k_num);
    $data['subview'] = 'web/kafel_details';
    $this->load->view('web_home_index',$data);

}
else{
    redirect('Web/kafala_login','refresh');
}

}
	
	
	
    public function add_kafel($id=false){ // Web/add_kafel


        if($this->input->post('add') ){
            $person_img = 'person_img';
            $file= $this->upload_image($person_img);
            $this->Kafala_model->insert_maindata_order($id,$file);


        }

        $data["relationships"]=$this->Kafala_model->select_relashion(array('type'=>34));

        $data['halat_kafel'] = $this->Kafala_model->all_frhk_settings('fr_kafalat_kafel_status',2);
        $data['social_status'] = $this->Kafala_model->select_search_key('fr_settings','type',11);
        $data['reasons_stop'] = $this->Kafala_model->select_search_key('fr_settings','type',12);


        $data['cities']= $this->Kafala_model->select_areas();//Osama
        $data['ahais']= $this->Kafala_model->select_residentials();




        $data['last_id'] = $this->Kafala_model->select_last_id();
        $data['gender_data'] =$this->Kafala_model->GetFromEmployees_settings(1);
        $data['nationality'] =$this->Kafala_model->GetFromEmployees_settings(2);
        $data['dest_card'] =$this->Kafala_model->GetFromFr_settings(4);
        //    $data['cities']= $this->Sponsors_model->GetFromFr_settings(6);
        $data['job_role'] = $this->Kafala_model->GetFromFr_settings(2);
        $data['banks'] = $this->Kafala_model->select_all('banks_settings','','',"id","asc");
        $data["current_hijry_year"] = $this->current_hjri_year();
        $data['type_card'] =$this->Kafala_model->GetFromFr_settings(3);
        $data['employer'] = $this->Kafala_model->GetFromGeneral_assembly_settings(1);
        $data['activity']= $this->Kafala_model->GetFromFr_settings(5);
        $data['specialize']= $this->Kafala_model->GetFromFr_settings(7);
        $data['attach_arr']= json_encode($this->Kafala_model->GetFromFr_settings2(10));
      //  $data['records']= $this->Kafala_model->select_all_orders();
        $data['kfalat_types'] = $this->Kafala_model->select_all('fr_kafalat_types_setting','','',"id","asc");
//        $this->test($data['records']);

        $data['f2a'] = $this->Kafala_model->select_search_key('fr_sponser_donors_setting','type',1);
        if(!empty($id)){
            $data['records']= '';
            $data['result']= $this->Kafala_model->getOrderById($id)[0];
//            $this->test($data['result']);
            $data['k_status_data'] = $this->Kafala_model->select_search_key('fr_kafalat_kafel_status','id',$data['result']->halat_kafel_id);

        }

        $data['descriptions']=$this->Kafala_model->GetFromFr_settings(15);



        // $data['subview'] = 'web/add_kafel';
       $data['subview'] = 'web/add_kafel';
        $this->load->view('web_home_index',$data);

    }
    
    // nagwa 13-2
    
    
  public function kafel_details_edit($k_num)
    {
        if (isset($_SESSION['k_num'])) {

            if ($this->input->post('add')) {

              $this->Kafala_model->update_kafel($k_num);
                $this->session->set_flashdata('success',"Êã ÇáÊÚÏíá ÈäÌÇÍ");
                redirect("Web/kafel_details_edit/$k_num",'refresh');

            }

            $data['kafel_details'] = $this->Kafala_model->select_all_orders($k_num);
            $data['gender_data'] = $this->Kafala_model->GetFromEmployees_settings(1);
            $data['nationality'] = $this->Kafala_model->GetFromEmployees_settings(2);
            $data['social_status'] = $this->Kafala_model->select_search_key('fr_settings', 'type', 11);
            $data['cities'] = $this->Kafala_model->select_areas();//Osama
            $data['ahais'] = $this->Kafala_model->select_residentials();
            $data['specialize'] = $this->Kafala_model->GetFromFr_settings(7);
            $data['job_role'] = $this->Kafala_model->GetFromFr_settings(2);
            $data['subview'] = 'web/kafel_details_edit';
            $this->load->view('web_home_index', $data);
        }
        else{
            redirect('Web/kafala_login','refresh');
        }
    }

    public function kafalt_data($k_num)
    {

        if (isset($_SESSION['k_num'])) {
            $id = $this->Kafala_model->check_sponsors($k_num);

            if ($id != 0) {

              $data['kafal_details'] = $this->Kafala_model->select_sponsors_kafalat($id);
            }


            $data['subview'] = 'web/kaflat_data';
            $this->load->view('web_home_index', $data);

        }
        else{
            redirect('Web/kafala_login','refresh');
        }

    }
    
    
    public function add_kaflat($k_num){
    if (isset($_SESSION['k_num'])) {

        $id = $_SESSION['id'];

            if ($this->input->post('add')){

              $this->Kafala_model->insert_kafalt($id);

                $this->session->set_flashdata('success',"Êã ÇáÇÖÇÝÉ ÈäÌÇÍ");
                redirect("Web/add_kaflat/$k_num",'refresh');

                 }
        $data['subview'] = 'web/add_kaflat';
        $this->load->view('web_home_index', $data);

    }
    else{
        redirect('Web/kafala_login','refresh');
    }
}

public function sponsors_pill($k_num){


    if (isset($_SESSION['k_num'])) {
        $id = $this->Kafala_model->check_sponsors('id',$k_num);

        if ($id != 0) {

            $data['pills'] = $this->Kafala_model->get_all_pill($id);
        }


        $data['subview'] = 'web/pill_report';
        $this->load->view('web_home_index', $data);

    }
    else{
        redirect('Web/kafala_login','refresh');
    }

}




public function logout(){
    $this->session->sess_destroy();
    redirect('Web/', 'refresh');
}


    public function updateSponsorOrdersDetails($id) // Web/updateSponsorOrdersDetails
    {
        if($this->input->post('update_detail')){
            $this->Kafala_model->updateOrderDetails($id);


        }
    }

    public function addSponsorOrdersTransform($id)	// Web/addSponsorOrdersTransform
    {
        $this->Kafala_model->insertSponsorOrdersTransform($id);

    }

    public function delete_sponsor_orders($id)
    {
        $this->Kafala_model->delete_order($id);


    }

    public function deleteOrdersDetails($id)
    {
        $this->Kafala_model->delete_order_details($id);

    }

    public function getkafalaRow(){ // Web/getkafalaRow
        $data['kfalat_types'] = $this->Kafala_model->select_all('fr_kafalat_types_setting','','',"id","asc");


        $this->load->view('web/getKafalat',$data);

    }

    public function getAhai()
    {
        $city_id = $this->input->post('city_id');
        $data['ahai'] = $this->Kafala_model->getAhai($city_id);
        $this->load->view('web/getAhai',$data);
    }


    public function fill_select()
    {

        if($this->input->post('f2a')==2){
            $data['relationships']=$this->Kafala_model->GetFromFr_settings(15);
        }else{
            $data["relationships"]=$this->Kafala_model->select_relashion(array('type'=>34));

        }

        $this->load->view('web/load_select_page', $data);
    }


    public function delete_attach()
    {
        $this->Kafala_model->delete_attach($_POST['id']);
        echo json_encode($_POST);

    }





///////////////////// omnia //////////////////////
  public function family_login()
    {
        if ($this->input->post('login') == 1) {
            $login = $this->family_web_profile->check_login();
            if ((!empty($login))) {
                $_SESSION = $login;
                redirect('web/profile_family/', 'refresh');
            } else {
                $data['subview'] = 'web/family_login';
                $this->load->view('web_home_index', $data);
            }
        } else {
            $data['subview'] = 'web/family_login';
            $this->load->view('web_home_index', $data);
        }

    }

//1042645620
    public function service_order()
    {

        if ((isset($_SESSION['id'])) && (!empty($_SESSION['id']))) {
            $data['data'] = $this->family_web_profile->get_family_details($_SESSION['mother_national_num']);
            $data['service'] = $this->family_web_profile->get_services();
            $data['id_page']=1;
            $data['name_page']='service';
//          $this->test($data['data']);
        } else {
            redirect('Web/family_login');

        }
        $data['subview'] = 'web/family_profile/service_order';
        $this->load->view('web_home_index', $data);
    }

    public function family_log_out()
    {
        $this->session->sess_destroy();
        redirect('Web/');
    }

    public function profile_family()
    {
        if ((isset($_SESSION['id'])) && (!empty($_SESSION['id']))) {
            $data['data'] = $this->family_web_profile->get_family_details($_SESSION['mother_national_num']);
            $data['id_page']=1;
            $data['name_page']='data';
        } else {
            redirect('Web/family_login');
        }
//        echo count($data['data']);
//        $this->test($data['data']);
        $data['subview'] = 'web/family_profile/profile_family_view';
        $this->load->view('web_home_index', $data);
    }

    public function getf2at_service()
    {
        $id = $this->input->post('id');
        $data['f2at'] = $this->family_web_profile->getf2at_service($id);
        echo json_encode($data['f2at']);
    }
    
    public function get_desc_f2at_service()
    {
        $id = $this->input->post('id');
        $data['f2at'] = $this->family_web_profile->get_desc_f2at_service($id);
        echo json_encode($data['f2at']);
    }

    public function get_services()
    {
        $id = $this->input->post('id');
        $data['service'] = $this->family_web_profile->get_services_by($id);
        echo json_encode($data['service']);

    }

    public function get_dtailes()
    {
        $sarf_num = $this->input->post('sarf_num');
        $mother_national_num = $this->input->post('mother_national_num');
        $data['details_array'] = $this->family_web_profile->get_dtailes($_SESSION['mother_national_num'], $sarf_num);
        $this->load->view('web/family_profile/table_details_sarf_view', $data);
//        echo json_encode($data['details_array']);

    }

    public function add_family_order_web()
    {
        $this->family_web_profile->add_family_order_web();
        redirect('Web/service_order', 'refresh');
    }

    public function report_sarf()
    {
        $data['id_page']=1;
        $data['name_page']='report';

        if ((isset($_SESSION['id'])) && (!empty($_SESSION['id']))) {
        } else {
            redirect('Web/family_login');
        }
        $data['subview'] = 'web/family_profile/report_sarf_view';
        $this->load->view('web_home_index', $data);
    }
    
     public function get_data_sarf_report()
    {
        $from = strtotime($this->input->post('from'));
        $to = strtotime($this->input->post('to'));
        $moter_num = $this->input->post('mother_national_num');
        $data['sarf'] = $this->family_web_profile->select_all_sarf($moter_num, $from, $to);
        $this->load->view('web/family_profile/table_sarf_view', $data);
    }

 public function details_service_by()
    {
        $id = $this->input->post('service_id_web');
        $data['ser'] = $this->family_web_profile->details_service_by($id);
//        echo json_encode($data['ser']);
        $this->load->view('web/family_profile/services_details_pop_view', $data);

    }


       public function live_videos()
    {
        $this->load->model('Public_relations/website/library/Live_videos_model');
        $data['videos'] = $this->Live_videos_model->display_videos();

        $data['subview'] = 'web/media_center/live_videos';
        $this->load->view('web_home_index',$data);
    }
 public function update_system_views(){

         $id= $this->input->post('row_id');
         $field= $this->input->post('field');
         $views =  $this->System_model->get_view_num($field,$id);
         $this->System_model->update_views($id,$field,$views);
         echo $views;
    }
    
    
    /*  public function mhader_magles() 
    {
        $data['title'] =' ÅÌÊãÇÚÇÊ æãÍÇÖÑ ãÌáÓ ÇáÅÏÇÑÉ ';

        $data['subview'] = 'web/media_center/mhader_magles';
        $this->load->view('web_home_index',$data);
    }
    
      public function mhader_magles_page() 
    {
        $data['title'] =' ÅÌÊãÇÚÇÊ æãÍÇÖÑ ãÌáÓ ÇáÅÏÇÑÉ ';

        $data['subview'] = 'web/media_center/mhader_magles_page';
        $this->load->view('web_home_index',$data);
    }
    */
    
    
    public function mhader_magles() 
    {
        $data['title'] =' ÅÌÊãÇÚÇÊ æãÍÇÖÑ ãÌáÓ ÇáÅÏÇÑÉ ';

        $data['subview'] = 'web/media_center/mhader_magles';
        $this->load->view('web_home_index',$data);
    }
    public function meeting_gamia_omomia()
    {
        $this->load->model('md/web/Meetings');
        $data['my_meeting']=$this->Meetings->select_all_my_meeting();
        $data['subview'] = 'web/md_web/mhader_magles';
        $this->load->view('web_home_index',$data);

    }
   /* public function mhader_magles_page($id)
    {
        $this->load->model('md/web/Meetings');
        $data['my_images']=$this->Meetings->select_all_my_images($id);
        $data['mymeeting']=$this->Meetings->select_meeting_by_id($id);
        $data['galsa_member'] = $this->Meetings->get_all_details($id);
        $data['galsa_mahwer']=$this->Meetings->select_all_my_mehwar($id);
        $data['subview'] = 'web/md_web/mhader_magles_page';
        $this->load->view('web_home_index',$data);
    }*/

    public function update_report_views(){

        $id= $this->input->post('row_id');
        $field= $this->input->post('field');
        $views =  $this->Report_model->get_view_num($field,$id);
        $this->Report_model->update_views($id,$field,$views);
        echo $views;
    }
    /**********************/
    // mahader
    public function read_file_Meetings($id)
{        $this->load->model('md/web/Meetings');

        $mymeeting=$this->Meetings->select_meeting_by_id($id);
        
        $file_name=$mymeeting->file;
        $file_name_ar=$mymeeting->file_name;
       
        $type = pathinfo($file_name)['extension'];
        $arry_images = array('gif', 'Gif', 'ico', 'ICO', 'jpg', 'JPG', 'jpeg', 'JPEG', 'BNG', 'png', 'PNG', 'bmp', 'BMP', 'WMV', 'wmv');
        $arr_doc = array('DOC', 'DOCX', 'HTML', 'HTM', 'ODT', 'PDF', 'XLS', 'XLSX', 'ODS', 'PPT', 'PPTX', 'TXT');
        if (in_array($type, $arry_images)) {
        $type_doc=1;
        } elseif (in_array(strtoupper($type), $arr_doc)) {
        $type_doc=2;

        } 
    $this->load->helper('file');
    $file_path = 'uploads/md/web/files/' . $file_name;

    switch ($type_doc) {
        case 1:
            {
                header('Content-Type: image/' . $doc_exe);
                break;
            }
        case 2:
            {
                header('Content-Type: application/pdf');
                break;
            }
    }

    header('Content-Discription:inline; filename="' . $file_name_ar . '"');
    header('Content-Disposition: filename="'.$file_name_ar.'"');

    header('Content-Transfer-Encoding: binary');
    header('Accept-Ranges:bytes');
    header('Content-Length: ' . filesize($file_path));
    readfile($file_path);
}

public function download_file_Meetings($id)
{        $this->load->model('md/web/Meetings');

    $mymeeting=$this->Meetings->select_meeting_by_id($id);
        
    $file_name=$mymeeting->file;
    $file_name_ar=$mymeeting->file_name;
   
    $this->load->helper('download');
    $name = $file_name_ar;
    $data = file_get_contents('uploads/md/web/files/' . $file_name);
    force_download($name, $data);
}
    // 2-12-om
    public function mhader_magles_page($id)
    {
        $this->load->model('md/web/Meetings');
        $data['my_images']=$this->Meetings->select_all_my_images($id);
      //  $this->test($data['my_images']);
        $data['mymeeting']=$this->Meetings->select_meeting_by_id($id);
        $data['galsa_member'] = $this->Meetings->get_all_details($id);
        $data['galsa_mahwer']=$this->Meetings->select_all_my_mehwar($id);
        $data['subview'] = 'web/md_web/mhader_magles_page';
        $this->load->view('web_home_index',$data);
    }

    
    
}