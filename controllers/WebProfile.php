<?php
class WebProfile extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->library('pagination');
        $this->load->helper(array('url','text','permission','form'));
        $this->load->helper('pagination');

        $this->load->model('Public_relations/Relation');
        $this->load->model('Public_relations/About');
        $this->load->model("Public_relations/News");
        $this->load->model("Public_relations/Main_data");

        $this->success = $this->Relation->select_success();

        //  $this->load->model("public_relations_models/News");
        $this->footer_news=$this->News->select_all_news();
        $this->mains=$this->Relation->get_main_data();
        $this->main_data=$this->Main_data->select('','');
        $this->news=$this->News->select(2);

    }
    //----------------------------
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
    //----------------------------
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
    //----------------------------
    private  function upload_image($file_name){
        $config['upload_path'] = 'uploads/images';
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf';
        $config['max_size']    = '1024*8';
        $config['encrypt_name']=true;
        $this->load->library('upload',$config);
        if(! $this->upload->do_upload($file_name)){
            //  $error = array('error' => $this->upload->display_errors());
            return  false;
        }else{
            $datafile = $this->upload->data();
            $this->thumb($datafile);
            return  $datafile['file_name'];
        }
    }
    private function upload_multi_files($file_name)
    {
        $config['upload_path'] = 'uploads/files';
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
        $config['overwrite'] = true;
        $config['encrypt_name']=true;
        $this->load->library('upload',$config);
        for ($i=0; $i < count($_FILES[$file_name]['name']); $i++) {
            $_FILES['userfile']['name'] 	= $_FILES[$file_name]['name'][$i];
            $_FILES['userfile']['type'] 	= $_FILES[$file_name]['type'][$i];
            $_FILES['userfile']['tmp_name'] = $_FILES[$file_name]['tmp_name'][$i];
            $_FILES['userfile']['error']    = $_FILES[$file_name]['error'][$i];
            $_FILES['userfile']['size']     = $_FILES[$file_name]['size'][$i];
            $this->upload->do_upload();
            $file = $this->upload->data();
            $datafile[] = $file['file_name'];
        }
        return $datafile;
    }

    //----------------------------
    private function message($type,$text){
        if($type =='success') {
            return $this->session->set_flashdata('message','
                        <div class="alert alert-success alert-dismissible">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          <strong>'.$text.'</strong>
                        </div>');
        }elseif($type=='wiring'){
            return $this->session->set_flashdata('message',' <div class="alert alert-warning alert-dismissible">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          <strong>'.$text.'</strong>
                        </div>');
        }elseif($type=='error'){
            return  $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          <strong>'.$text.'</strong>
                        </div>');
        }
    }
    //----------------------------
    private  function upload_file($file_name){
        $config['upload_path'] = 'uploads/files';
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
        $config['max_size']    = '1024*8';
        $config['overwrite'] = true;
        $this->load->library('upload',$config);
        if(! $this->upload->do_upload($file_name)){
            //  $error = array('error' => $this->upload->display_errors());
            return  false;
        }else {
            $datafile = $this->upload->data();
            return $datafile['file_name'];
        }
    }
    //----------------------------
    private function url (){
        unset($_SESSION['url']);
        $this->session->set_flashdata('url','http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
    }
    //----------------------------
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
     *  ================================================================================================================
     *
     *  ----------------------------------------------------------------------------------------------------------------
     *
     * -----------------------------------------------------------------------------------------------------------------
     */
    public function Login(){  // WebProfile/Login
      $this->load->model('Model_web_profile');
       if($this->input->post('log_my') ){
           $user_name =$this->input->post('name');
           $pass =$this->input->post('pass');

             if($this->input->post('user_type') == "1" ){
                   $table="basic";
                   $condition_arr=array("mother_national_num"=> $user_name,"mother_national_num"=>$pass);
                   $page ="MotherProfile";
             }elseif($this->input->post('user_type') == "2"  ){
                   $table="sponsors";
                   $condition_arr=array("national_id"=>$user_name ,"national_id"=>$pass);
                   $page ="ProfileSponsors";
             }elseif($this->input->post('user_type') == "3" ){
                   $table="donors";
                   $condition_arr=array("national_id"=>$user_name ,"national_id"=>$pass);
                   $page ="DonorProfile";
             }
                 $userdata=$this->Model_web_profile->check_user_data($table,$condition_arr);
                 if($userdata !=''){
                     $userdata['is_logged_web']=$page;
                     $this->session->set_userdata($userdata);
                     if($this->input->post('user_type') == "1" ){
                         redirect('WebProfile/person_data/'.$user_name,'refresh');
                     }elseif($this->input->post('user_type') == "2"  ){
                        redirect('WebProfile/ProfileSponsors','refresh');
                     }elseif($this->input->post('user_type') == "3"  ){
                         redirect('WebProfile/DonorProfile','refresh');
                     }
                 //  $this->message('error','خطا فى ادخال البيانات');
                 }else{
                     $this->message('error','خطا فى ادخال البيانات');
                     redirect('WebProfile/Login');
                 }

        }
        $data['subview'] = 'web/profile/login';
        $this->load->view('web_index',$data);
    }
//---------------------------------------------
    public  function Logout(){
        $this->session->sess_destroy();
        redirect('WebProfile/Login','refresh');
    }
//---------------------------------------------
    public function ProfileSponsors(){  //  WebProfile/ProfileSponsors
       if($_SESSION['is_logged_web'] !="ProfileSponsors"){
            redirect('WebProfile/Login');
        }
        $this->load->model('Model_web_profile');
        $this->load->model('all_Finance_resource_models/sponsors/Sponsors');
        $id=$_SESSION["id"];
        $data['nationalities'] = $this->Sponsors->select_nationality();
        $data['banks'] = $this->Sponsors->select_bank();


        $data['sponsors'] = $this->Model_web_profile->select_sponsors($id);
        $data['sponsors_prog'] = $this->Model_web_profile->select_sponsors_prog($id);
        $data['sponsors_orphan'] = $this->Model_web_profile->select_sponsors_orphan($id);
        $data['sponsors_pill'] = $this->Model_web_profile->select_sponsors_pill($id);

        $data['subview'] = 'web/profile/sponsors_profile';
        $this->load->view('web_index',$data);
    }
//-------------------------------------------------
    public function DonorProfile(){  //  WebProfile/DonorProfile
        if($_SESSION['is_logged_web']!="DonorProfile"){
            redirect('WebProfile/Login');
        }
        $id=$_SESSION["id"];
        $this->load->model('Model_web_profile');
        $this->load->model('all_Finance_resource_models/donors/Donors');

        $data['nationalities'] = $this->Donors->select_nationality();
        $data['banks'] = $this->Donors->select_bank();

        $data['donors'] = $this->Model_web_profile->select_donors($id);
        $data['donor_pill'] = $this->Model_web_profile->select_donor_pill($id);
        $data['subview'] = 'web/profile/donor_profile';
        $this->load->view('web_index',$data);
    }
//-------------------------------------------------
    public function MotherProfile(){  //  WebProfile/MotherProfile
        if($_SESSION['is_logged_web']!="MotherProfile"){
            redirect('WebProfile/Login');
        }
        $mother_national_num=$_SESSION["mother_national_num"];
        $this->load->model('Model_web_profile');

        $this->load->model('familys_models/Father');
        $this->load->model('Nationality');
        $this->load->model("familys_models/Register");
        $this->load->model('Difined_model');
        $this->load->model('familys_models/Devices');
        $this->load->model('familys_models/House');
        $this->load->model('familys_models/Mother');
        $this->load->model('familys_models/Money');
        $this->load->model("familys_models/Family_members");
        $this->load->model('familys_models/Home_needs_model');
        //=======================================================================
        $data['home_needs'] = $this->Home_needs_model->select_where($mother_national_num);
        $data['attach_files']=$this->Difined_model->select_search_key('family_attach_files','mother_national_num_fk',$mother_national_num);
        $data['all_field']=$this->Difined_model->get_field('houses');
        $data["mother_data"]=$this->Difined_model->getByArray("mother",array("mother_national_num_fk"=>$mother_national_num));
        $data['father']=$this->Father->get_by_mother($mother_national_num,'father');
        $data['result']=$this->Father->get_by_mother2($mother_national_num,'mother');
        $data['check_data']=$this->House->getById($mother_national_num);

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
        $data_in=$data["check_data"];
        $data['area'] = $this->House->select_places(0);
        if(isset($data_in) && !empty($data_in) && $data_in !=null) {
            $data['city'] = $this->House->select_places($data_in["h_area_id_fk"]);
            $data['centers'] = $this->House->select_places($data_in["h_city_id_fk"]);
            $data['village'] = $this->House->select_places($data_in["h_center_id_fk"]);
        }

        $data['mothers_data']=$this->Difined_model->select_search_key('mother',"mother_national_num_fk ",$mother_national_num);
        $data["cuttent_higry_year"]=$this->current_hjri_year();
        $data['member_data']=$this->Family_members->select_all($mother_national_num);
        $data['devices']=$this->Devices->select_where($mother_national_num);
        $data['mother_national_num']=$mother_national_num;
        $data['main_depart']=  $this->Mother->get_from_family_setting(12);
        $data['arr_type_house']=  $this->Mother->get_from_family_setting(14);
        $data['arr_direct']=  $this->Mother->get_from_family_setting(23);
        $data['house_state']=  $this->Mother->get_from_family_setting(22);
        $data['house_own']=  $this->Mother->get_from_family_setting(13);
        $data['money']=$this->Money->getArray($mother_national_num);

        $data["person_type"]=$this->Difined_model->select_search_key('family_setting','type',32);
        $data["relationships"]=$this->Difined_model->select_search_key('family_setting','type',34);
        $data["id_source"]=$this->Difined_model->select_search_key('family_setting','type',38);
        $data["diseases"]=$this->Difined_model->select_search_key('family_setting','type',35);
        $data["responses"]=$this->Difined_model->select_search_key('family_setting','type',36);
        $data["diseases_status"]=$this->Difined_model->select_search_key('family_setting','type',37);

        $data['women_houses']=$this->Difined_model->select_search_key('family_setting','type',44);
        $data["person_type"]=$this->Difined_model->select_search_key('family_setting','type',32);
        $data['banks'] = $this->Difined_model->select_all('banks','','',"id","asc");

        $data['mother_last_account'] = $this->Mother->getMotherAccount($mother_national_num);
        $data['last_account'] = $this->Mother->getFamilyAccount($mother_national_num);
        $data['person_account'] = $this->Mother->getBasicAccount($mother_national_num);
        $data['agent_bank_account'] = $this->Mother->getBasicAccount_agent($mother_national_num);


        $data["income_sources"]=$this->Difined_model->select_search_key('family_setting','type',42);
        $data["monthly_duties"]=$this->Difined_model->select_search_key('family_setting','type',43);

        $this->load->model('familys_models/Home_needs_model');
        $data['home_needs'] = $this->Home_needs_model->select_where($mother_national_num);

        $data['all_banks']=$this->Money->select_bank();
        $data['mother_full_name']=$this->Money->select_mother_name($mother_national_num);

        $this->load->model("familys_models/Model_researcher_opinion");
        $result_opinion=$this->Model_researcher_opinion->getById($mother_national_num);
        if(is_array($result_opinion)){
            $data['result_opinion']=$result_opinion;
        }

        $data['arr_op']=  $this->Mother->get_from_family_setting(28);
        $data['arr_in']=  $this->Mother->get_from_family_setting(27);
        $data['arr_type']=  $this->Mother->get_from_family_setting(29);
        $data['procedures_option_lagna']=  $this->Difined_model->select_all("procedures_option_lagna","","","","");

        //=======================================================================
        $data['subview'] = 'web/profile/mother_profile';
        $this->load->view('web_index',$data);
    }



    //=====================================================================================================


  /*  public function register()
    {

        $mother_num=$this->input->post('mother_national_num');

        $this->load->model("familys_models/web_model/Register_web");
        $this->load->model("Difined_model");
        if($this->input->post('register') == 'register' ){



              $this->Register_web->inserted_reg();
            $this->message('success','تمت الاضافه بنجاح');

           redirect('Mother_data/person_data/'.$mother_num);

        }elseif($this->input->post('register') == 'register_wakel' ){


            $this->Register_web->inserted_reg_wakel();
            $this->message('success','تمت الاضافه بنجاح');


            redirect('Mother_data/person_data/'.$mother_num);
        }

        $data['banks'] = $this->Difined_model->select_all('banks_settings','','',"id","asc");
        $data['socity_branch'] = $this->Difined_model->select_all('socity_branch','','',"id","asc");
        $data["relationships"]=$this->Difined_model->select_search_key('family_setting','type',34);
        $data["id_source"]=$this->Difined_model->select_search_key('family_setting','type',38);

        $data['subview'] = 'web/profile/register';
        $this->load->view('web_index',$data);
    }
  */


    public function person_data($user_name)
    {
        if($_SESSION['is_logged_web']!="MotherProfile"){
            redirect('WebProfile/Login');
        }
        $this->load->model("familys_models/web_model/Register_web");
        $data['mother_num']= $this->Register_web->get_mother_num($user_name);

        $data['subview'] = 'web/profile/main_data';

        $this->load->view('web_index',$data);
    }


    //===============================================================================================

    public function register()
    {

        $mother_num=$this->input->post('mother_national_num');

        $this->load->model("familys_models/web_model/Register_web");
        $this->load->model("Difined_model");
        if($this->input->post('register') == 'register' ){



            $this->Register_web->inserted_reg();
            $this->message('success','تمت الاضافه بنجاح');

            redirect('Mother_data/person_data/'.$mother_num);

        }

        $data['banks'] = $this->Difined_model->select_all('banks_settings','','',"id","asc");
        $data['socity_branch'] = $this->Difined_model->select_all('socity_branch','','',"id","asc");
        $data["relationships"]=$this->Difined_model->select_search_key('family_setting','type',34);
        $data["id_source"]=$this->Difined_model->select_search_key('family_setting','type',38);

        $data['subview'] = 'web/profile/register_mother';
        $this->load->view('web_index',$data);
    }

    public function register_wakeel()
    {

        $mother_num=$this->input->post('mother_national_num');

        $this->load->model("familys_models/web_model/Register_web");
        $this->load->model("Difined_model");
        if($this->input->post('register') == 'register_wakel' ){


            $this->Register_web->inserted_reg_wakel();
            $this->message('success','تمت الاضافه بنجاح');


            redirect('Mother_data/person_data/'.$mother_num);
        }

        $data['banks'] = $this->Difined_model->select_all('banks_settings','','',"id","asc");
        $data['socity_branch'] = $this->Difined_model->select_all('socity_branch','','',"id","asc");
        $data["relationships"]=$this->Difined_model->select_search_key('family_setting','type',34);
        $data["id_source"]=$this->Difined_model->select_search_key('family_setting','type',38);

        $data['subview'] = 'web/profile/register_wakeel';
        $this->load->view('web_index',$data);
    }




    public function check_num()
    {
        $num=$this->input->post('valu');
        $type=$this->input->post('type');

        $this->load->model('familys_models/web_model/Mother_web');


        echo $this->Mother_web->get_by_num($num,$type);


    }


}// END CLASS 