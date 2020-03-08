<?php
class Family_letter extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }

        $this->load->model('familys_models/for_dash/Counting');
        $this->load->model('familys_models/family_letters_models/family_letter_model');

        $this->count_basic_in = $this->Counting->get_basic_in_num();
        $this->files_basic_in = $this->Counting->get_files_basic_in();

        $this->load->helper(array('url', 'text', 'permission', 'form'));
        /**********************************************************/
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in = $this->Counting->get_basic_in_num();
        $this->files_basic_in = $this->Counting->get_files_basic_in();
        /*************************************************************/
        $this->load->model('system_management/Groups');
        $this->main_groups = $this->Groups->main_fetch_group();
        $this->groups = $this->Groups->get_group($_SESSION["group_number"]);
        $this->groups_title = $this->Groups->get_group_title($_SESSION["group_number"]);


    }




/**********************************************************************************/

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
           // $this->thumb($datafile);
            return  $datafile['file_name'];
        }
    }
   /* public function print_letter($mother_national_num,$type_letter,$letter_num,$func)
    {
        $type=$this->uri->segment(5);
        $data['records']= $this->family_letter_model-> get_by_person_national_card($mother_national_num,$type_letter,$letter_num);
        $data['option_letter']=$this->family_letter_model->get_letters_by_type2($type);
        $data['func']=$func;
        $this->load->view('admin/familys_views/family_letters_views/print_letter', $data);
    }*/
    
  //  public function Letter_file_upload($num){
     public function Letter_file_upload($num,$mother_num){
       /* if($_POST['add'] =='add'){
            $img ='file';
            $img_file = $this->upload_image($img);
            $this->family_letter_model->Letter_upload($img_file,$num);
            redirect('family_controllers/Family_letter/'.$_POST['link'].'/'.$_POST['mother_num'],'refresh');

        }*/
        
           if($_POST['add'] =='add'){
            $img ='file1';
            $img2 ='file2';
            $img3 ='file3';
            $img_file = $this->upload_image($img);
            $img_file2 = $this->upload_image($img2);
            $img_file3 = $this->upload_image($img3);
            $this->family_letter_model->Letter_upload($img_file,$img_file2,$img_file3,$num);
            redirect('family_controllers/Family_letter/'.$_POST['link'].'/'.$_POST['mother_num'].'/'.$num,'refresh');

        }
        
        
    }

  public function Get_Persons(){
        if($this->input->post('member_type') && $this->input->post('member_num')){
            $member_num=$this->input->post('member_num');
            $data=$_POST ;
            if($this->input->post('member_type') == 1){
                    $data_table=$this->family_letter_model->get_one_mother_data($member_num);
                 $data['mother']=$data_table[0];
            }elseif($this->input->post('member_type') == 2){
                    $data_table=$this->family_letter_model->get_one_father_data($member_num);
                 $data['father']=$data_table[0];
            }elseif($this->input->post('member_type') == 3){
                    $data_table=$this->family_letter_model->get_one_f_member($member_num);
                 $data['members']=$data_table[0];
            }
            elseif($this->input->post('member_type') == 4){
                $data_table=$this->family_letter_model->get_one_w_member($member_num);
             $data['wakel']=$data_table[0];
        }
         //  $this->test($data); 
            $this->load->view('admin/familys_views/family_letters_views/load', $data);
        }
    }
    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }
    public function Civil_Status($mother_num,$fil_num){ //family_controllers/Family_letter/Civil_Status/1042645620

        $data['mother']=$this->family_letter_model->get_mother_data()[0];
        $data['last_id']=$this->family_letter_model->select_last_id();
        $data['father']=$this->family_letter_model->get_father_data()[0];
        $data['f_members']=$this->family_letter_model->get_f_member();
        $data['wakel']=$this->family_letter_model->get_wakel_data();
     //   $this->test(  $data['wakel']);
        $data["basic_family"]=$this->family_letter_model->get_basic_data($mother_num);
        $data['letters']=$this->family_letter_model->get_letters_by_type(1);
        
        if($this->input->post('submit'))
        {
         //  $this->test($_POST);
            $this->family_letter_model->insert_letter($this->input->post('letter_type_data'));
            redirect('family_controllers/Family_letter/Civil_Status/'.$mother_num."/".$fil_num,'refresh');
        }
      
        
        $data['title']="خطاب الأحوال المدنية";
        $data['subview'] = 'admin/familys_views/family_letters_views/civilstatus';
        $this->load->view('admin_index', $data);


    }
    public function update_Civil_Status($mother_num,$letter_num,$file_num){
        $this->load->model('familys_models/family_letters_models/family_letter_model');
        $data['mother']=$this->family_letter_model->get_mother_data()[0];
        $data['last_id']=$this->family_letter_model->select_last_id();
        $data['father']=$this->family_letter_model->get_father_data()[0];
        $data['f_members']=$this->family_letter_model->get_f_member();
        $data['wakel']=$this->family_letter_model->get_wakel_data();
       // $this->test($data['wakel']);
       // $data['letters']=$this->family_letter_model->get_letters_by_type(1);
       $data["path_method"]=$mother_num."/".$letter_num."/".$file_num;
        $data['result']=$this->family_letter_model->getByLetter_num($letter_num);
       // $this->test($data['result']);
        if($this->input->post('submit'))
        {
            $this->family_letter_model->update_letter($letter_num,$this->input->post('letter_type_data'));
            redirect('family_controllers/Family_letter/Civil_Status/'.$mother_num."/".$file_num,'refresh');
        }
    
        $data['title']="خطاب الأحوال المدنية";
        $data['subview'] = 'admin/familys_views/family_letters_views/civilstatus';
        $this->load->view('admin_index', $data);
    }



    public function delete_Civil_Status($id,$mother_num,$file_num){
        $this->family_letter_model->delete_letter($id);
        // $this->message('success','تم حذف البيانات بنجاح');
        redirect('family_controllers/Family_letter/Civil_Status/'.$mother_num."/".$file_num,'refresh');

    }

//============================================================
    public function Insurance_letter($mother_num,$file_num){   //family_controllers/Family_letter/Insurance_letter/1042645620

        $data['mother']=$this->family_letter_model->get_mother_data()[0];
        $data['last_id']=$this->family_letter_model->select_last_id();
        $data['father']=$this->family_letter_model->get_father_data()[0];
        $data['f_members']=$this->family_letter_model->get_f_member();
        $data["basic_family"]=$this->family_letter_model->get_basic_data($mother_num);
        $data['wakel']=$this->family_letter_model->get_wakel_data();

        $data['letters']=$this->family_letter_model->get_letters_by_type(2);
        if($this->input->post('submit'))
        {

            $this->family_letter_model->insert_letter($this->input->post('letter_type_data'));

            redirect('family_controllers/Family_letter/Insurance_letter/'.$mother_num."/".$file_num,'refresh');

        }
      
        
        $data['title']="خطاب التأمينات";
        $data['subview'] = 'admin/familys_views/family_letters_views/Insurance_letter';
        $this->load->view('admin_index', $data);


    }
    public function update_Insurance_letter($mother_num,$letter_num,$file_num){
        $this->load->model('familys_models/family_letters_models/family_letter_model');
        $data['mother']=$this->family_letter_model->get_mother_data()[0];
        $data['last_id']=$this->family_letter_model->select_last_id();
        $data['father']=$this->family_letter_model->get_father_data()[0];
        $data['f_members']=$this->family_letter_model->get_f_member();
        //$data['letters']=$this->family_letter_model->get_letters_by_type(2);
        $data['result']=$this->family_letter_model->getByLetter_num($letter_num);
        $data["path_method"]=$mother_num."/".$letter_num."/".$file_num;
        $data['wakel']=$this->family_letter_model->get_wakel_data();
        if($this->input->post('submit'))
        {

            $this->family_letter_model->update_letter($letter_num,$this->input->post('letter_type_data'));
            redirect('family_controllers/Family_letter/Insurance_letter/'.$mother_num."/".$file_num,'refresh');

        }
        $data['title']="خطاب الأحوال المدنية";
        $data['subview'] = 'admin/familys_views/family_letters_views/Insurance_letter';
        $this->load->view('admin_index', $data);
    }



    public function delete_Insurance_letter($id,$mother_num,$file_num){
        $this->family_letter_model->delete_letter($id);
        // $this->message('success','تم حذف البيانات بنجاح');
        redirect('family_controllers/Family_letter/Insurance_letter/'.$mother_num."/".$file_num,'refresh');

    }

//===================================================================
    public function Retirement_letter($mother_num,$file_num){     //family_controllers/Family_letter/Retirement_letter/1042645620

        $data['mother']=$this->family_letter_model->get_mother_data()[0];
        $data['last_id']=$this->family_letter_model->select_last_id();
        $data['father']=$this->family_letter_model->get_father_data()[0];
        $data['f_members']=$this->family_letter_model->get_f_member();
        $data["basic_family"]=$this->family_letter_model->get_basic_data($mother_num);
        $data['wakel']=$this->family_letter_model->get_wakel_data();
        $data['letters']=$this->family_letter_model->get_letters_by_type(3);
        if($this->input->post('submit'))
        {

            $this->family_letter_model->insert_letter($this->input->post('letter_type_data'));

            redirect('family_controllers/Family_letter/Retirement_letter/'.$mother_num."/".$file_num,'refresh');

        }
        $data['title']="خطاب التقاعد";
        $data['subview'] = 'admin/familys_views/family_letters_views/retirement_letter';
        $this->load->view('admin_index', $data);


    }
    public function update_Retirement_letter($mother_num,$letter_num,$file_num){
        $this->load->model('familys_models/family_letters_models/family_letter_model');
        $data['mother']=$this->family_letter_model->get_mother_data()[0];
        $data['last_id']=$this->family_letter_model->select_last_id();
        $data['father']=$this->family_letter_model->get_father_data()[0];
        $data['f_members']=$this->family_letter_model->get_f_member();
       // $data['letters']=$this->family_letter_model->get_letters_by_type(3);
        $data['result']=$this->family_letter_model->getByLetter_num($letter_num);
        $data["path_method"]=$mother_num."/".$letter_num."/".$file_num;
        $data['wakel']=$this->family_letter_model->get_wakel_data();
        if($this->input->post('submit'))
        {

            $this->family_letter_model->update_letter($letter_num,$this->input->post('letter_type_data'));
            redirect('family_controllers/Family_letter/Retirement_letter/'.$mother_num."/".$file_num,'refresh');

        }
        $data['title']="خطاب  التقاعد";
        $data['subview'] = 'admin/familys_views/family_letters_views/retirement_letter';
        $this->load->view('admin_index', $data);
    }



    public function delete_Retirement_letter($id,$mother_num,$file_num){
        $this->family_letter_model->delete_letter($id);
        // $this->message('success','تم حذف البيانات بنجاح');
        redirect('family_controllers/Family_letter/Retirement_letter/'.$mother_num."/".$file_num,'refresh');

    }
//================================================================
    public function daman_letter($mother_num,$file_num){      //family_controllers/Family_letter/daman_letter/1042645620

        $data['mother']=$this->family_letter_model->get_mother_data()[0];
        $data['last_id']=$this->family_letter_model->select_last_id();
        $data['father']=$this->family_letter_model->get_father_data()[0];
        $data['f_members']=$this->family_letter_model->get_f_member();
        $data["basic_family"]=$this->family_letter_model->get_basic_data($this->uri->segment(4));
       
        $data['wakel']=$this->family_letter_model->get_wakel_data();
        $data['letters']=$this->family_letter_model->get_letters_by_type(4);
        if($this->input->post('submit'))
        {   
            $this->family_letter_model->insert_letter($this->input->post('one_letter_type'));
            redirect('family_controllers/Family_letter/daman_letter/'.$mother_num."/".$file_num,'refresh');

        }
        $data['title']="خطاب الضمان";
        $data['subview'] = 'admin/familys_views/family_letters_views/daman_letter';
        $this->load->view('admin_index', $data);


    }
    public function update_daman_letter($mother_num,$letter_num,$file_num){
        $this->load->model('familys_models/family_letters_models/family_letter_model');
        $data['mother']=$this->family_letter_model->get_mother_data()[0];
        $data['last_id']=$this->family_letter_model->select_last_id();
        $data['father']=$this->family_letter_model->get_father_data()[0];
        $data['f_members']=$this->family_letter_model->get_f_member();
      //  $data['letters']=$this->family_letter_model->get_letters_by_type(4);
        $data['result']=$this->family_letter_model->getByLetter_num($letter_num);
        $data['wakel']=$this->family_letter_model->get_wakel_data();
        if($this->input->post('submit'))
        {
            $this->family_letter_model->update_letter($letter_num,$this->input->post('one_letter_type'));
            redirect('family_controllers/Family_letter/daman_letter/'.$mother_num."/".$file_num,'refresh');
        }
        $data['title']="خطاب الضمان";
        $data['subview'] = 'admin/familys_views/family_letters_views/daman_letter';
        $this->load->view('admin_index', $data);
    }



    public function delete_daman_letter($id,$mother_num,$file_num){
        $this->family_letter_model->delete_letter($id);
        redirect('family_controllers/Family_letter/daman_letter/'.$mother_num."/".$file_num,'refresh');

    }




public function print_letter($mother_national_num,$type_letter,$letter_num,$func)
{
    $type=$this->uri->segment(5);
    $data['records']= $this->family_letter_model-> get_by_person_national_card($mother_national_num,$type_letter,$letter_num);
//$this->test(  $data['records']);
    $data['option_letter']=$this->family_letter_model->get_letters_by_type2($type);
    $data['func']=$func;
    $data['letter_type']=$type_letter;
    $this->load->view('admin/familys_views/family_letters_views/print_letter', $data);
}
/*********************************************************************************************/
public function delet_img($leter_num,$id,$mother_num,$file_num,$cont){


        $this->family_letter_model->delet_img($leter_num,$id);
       // redirect('family_controllers/Family_letter/Civil_Status/'.$mother_num."/".$file_num,'refresh');
        redirect('family_controllers/Family_letter/'.$cont.'/'.$mother_num."/".$file_num,'refresh');

    }
	
    
        public function Insurance_letter_father($mother_num,$file_num){   //family_controllers/Family_letter/Insurance_letter/1042645620

        $data['mother']=$this->family_letter_model->get_mother_data()[0];
        $data['last_id']=$this->family_letter_model->select_last_id();
        $data['father']=$this->family_letter_model->get_father_data()[0];
        $data['f_members']=$this->family_letter_model->get_f_member();
        $data["basic_family"]=$this->family_letter_model->get_basic_data($mother_num);

        $data['wakel']=$this->family_letter_model->get_wakel_data();
        $data['letters']=$this->family_letter_model->get_letters_by_type(5);
        if($this->input->post('submit'))
        {

            $this->family_letter_model->insert_letter($this->input->post('letter_type_data'));

            redirect('family_controllers/Family_letter/Insurance_letter_father/'.$mother_num."/".$file_num,'refresh');

        }
        $data['title']="خطاب التأمينات للأب";
        $data['subview'] = 'admin/familys_views/family_letters_views/Insurance_letter_father';
        $this->load->view('admin_index', $data);


    }
    
    public function update_Insurance_letter_father($mother_num,$letter_num,$file_num){
    $this->load->model('familys_models/family_letters_models/family_letter_model');
    $data['mother']=$this->family_letter_model->get_mother_data()[0];
    $data['last_id']=$this->family_letter_model->select_last_id();
    $data['father']=$this->family_letter_model->get_father_data()[0];
    $data['f_members']=$this->family_letter_model->get_f_member();
    //$data['letters']=$this->family_letter_model->get_letters_by_type(2);
    $data['result']=$this->family_letter_model->getByLetter_num($letter_num);
    $data["path_method"]=$mother_num."/".$letter_num."/".$file_num;
    $data['wakel']=$this->family_letter_model->get_wakel_data();
    if($this->input->post('submit'))
    {

        $this->family_letter_model->update_letter($letter_num,$this->input->post('letter_type_data'));
        redirect('family_controllers/Family_letter/Insurance_letter_father/'.$mother_num."/".$file_num,'refresh');

    }
    $data['title']="خطاب الأحوال المدنية";
    $data['subview'] = 'admin/familys_views/family_letters_views/Insurance_letter_father';
    $this->load->view('admin_index', $data);
}
/****************************************************************************************/

    public function add_row(){

         $data["len"]=$this->input->post('len');
       $this->load->view('admin/familys_views/family_letters_views/add_row',$data);

    }

/**************************************************************************************/


public function Passports($mother_num,$fil_num){ //family_controllers/Family_letter/family_controllers/Family_letter/Passports/1042645620

        $data['mother']=$this->family_letter_model->get_mother_data()[0];
        $data['last_id']=$this->family_letter_model->select_last_id();
        $data['father']=$this->family_letter_model->get_father_data()[0];
        $data['f_members']=$this->family_letter_model->get_f_member();
        $data["basic_family"]=$this->family_letter_model->get_basic_data($mother_num);
        $data['letters']=$this->family_letter_model->get_letters_by_type(6);
        $data['passport'] = 6;
        $data['wakel']=$this->family_letter_model->get_wakel_data();
        if($this->input->post('submit'))
        {
            $this->family_letter_model->insert_letter($this->input->post('letter_type_data'));
            redirect('family_controllers/Family_letter/Passports/'.$mother_num."/".$fil_num,'refresh');
        }

        $data['title']="خطاب الجوازات";
        $data['subview'] = 'admin/familys_views/family_letters_views/civilstatus';
        $this->load->view('admin_index', $data);


    }
    public function updatePassports($mother_num,$letter_num,$file_num){
        $this->load->model('familys_models/family_letters_models/family_letter_model');
        $data['mother']=$this->family_letter_model->get_mother_data()[0];
        $data['last_id']=$this->family_letter_model->select_last_id();
        $data['father']=$this->family_letter_model->get_father_data()[0];
        $data['f_members']=$this->family_letter_model->get_f_member();
        $data['wakel']=$this->family_letter_model->get_wakel_data();
        // $data['letters']=$this->family_letter_model->get_letters_by_type(1);
        $data["path_method"]=$mother_num."/".$letter_num."/".$file_num;
        $data['result']=$this->family_letter_model->getByLetter_num($letter_num);
        $data['passport'] = 6;
        if($this->input->post('submit'))
        {
       //     $this->test($_POST);
            $this->family_letter_model->update_letter($letter_num,$this->input->post('letter_type_data'));
            redirect('family_controllers/Family_letter/Passports/'.$mother_num."/".$file_num,'refresh');
        }

        $data['title']="خطاب الجوازات";
        $data['subview'] = 'admin/familys_views/family_letters_views/civilstatus';
        $this->load->view('admin_index', $data);
    }



    public function deletePassports($id,$mother_num,$file_num){
        $this->family_letter_model->delete_letter($id);
        // $this->message('success','تم حذف البيانات بنجاح');
        redirect('family_controllers/Family_letter/Passports/'.$mother_num."/".$file_num,'refresh');

    }
    
    
    
    
    
}
