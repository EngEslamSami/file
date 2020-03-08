<?php
class Family_letter_new extends MY_Controller
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

  private  function test($data=array()){
              echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
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
    public function print_letter($mother_national_num,$type_letter,$letter_num,$func)
    {
        $type=$this->uri->segment(5);
        $data['records']= $this->family_letter_model-> get_by_person_national_card($mother_national_num,$type_letter,$letter_num);
        $data['option_letter']=$this->family_letter_model->get_letters_by_type2($type);
        $data['func']=$func;
        $this->load->view('admin/familys_views/family_letters_views_new/print_letter', $data);
    }
    public function Letter_file_upload($num){
        if($_POST['add'] =='add'){
            $img ='file';
            $img_file = $this->upload_image($img);
            $this->family_letter_model->Letter_upload($img_file,$num);
            redirect('family_controllers/Family_letter/'.$_POST['link'].'/'.$_POST['mother_num'],'refresh');

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
         //  $this->test($data); 
            $this->load->view('admin/familys_views/family_letters_views_new/load', $data);
        }
    }


    public function Civil_Status(){ //family_controllers/Family_letter/Civil_Status/1042645620

        $data['mother']=$this->family_letter_model->get_mother_data()[0];
        $data['last_id']=$this->family_letter_model->select_last_id();
        $data['father']=$this->family_letter_model->get_father_data()[0];
        $data['f_members']=$this->family_letter_model->get_f_member();

        $data['letters']=$this->family_letter_model->get_letters_by_type(1);
        if($this->input->post('submit'))
        {

            $this->family_letter_model->insert_letter($this->uri->segment(5));

            redirect('family_controllers/Family_letter/Civil_Status/'.$this->uri->segment(4),'refresh');

        }
        $data['title']="خطاب الأحوال المدنية";
        $data['subview'] = 'admin/familys_views/family_letters_views_new/civilstatus';
        $this->load->view('admin_index', $data);


    }
    public function update_Civil_Status(){
        $this->load->model('familys_models/family_letters_models/family_letter_model');
        $data['mother']=$this->family_letter_model->get_mother_data()[0];
        $data['last_id']=$this->family_letter_model->select_last_id();
        $data['father']=$this->family_letter_model->get_father_data()[0];
        $data['f_members']=$this->family_letter_model->get_f_member();
       // $data['letters']=$this->family_letter_model->get_letters_by_type(1);
        $data['result']=$this->family_letter_model->getByLetter_num($this->uri->segment(5));


        if($this->input->post('submit'))
        {

            $this->family_letter_model->update_letter($this->uri->segment(5),$this->uri->segment(6));
            redirect('family_controllers/Family_letter/Civil_Status/'.$this->uri->segment(4),'refresh');

        }
        $data['title']="خطاب الأحوال المدنية";
        $data['subview'] = 'admin/familys_views/family_letters_views_new/civilstatus';
        $this->load->view('admin_index', $data);
    }



    public function delete_Civil_Status($id){
        $this->family_letter_model->delete_letter($id);
        // $this->message('success','تم حذف البيانات بنجاح');
        redirect('family_controllers/Family_letter/Civil_Status/'.$this->uri->segment(5),'refresh');

    }

//============================================================
    public function Insurance_letter(){   //family_controllers/Family_letter/Insurance_letter/1042645620

        $data['mother']=$this->family_letter_model->get_mother_data()[0];
        $data['last_id']=$this->family_letter_model->select_last_id();
        $data['father']=$this->family_letter_model->get_father_data()[0];
        $data['f_members']=$this->family_letter_model->get_f_member();


        $data['letters']=$this->family_letter_model->get_letters_by_type(2);
        if($this->input->post('submit'))
        {

            $this->family_letter_model->insert_letter($this->uri->segment(5));

            redirect('family_controllers/Family_letter/Insurance_letter/'.$this->uri->segment(4),'refresh');

        }
        $data['title']="خطاب التأمينات";
        $data['subview'] = 'admin/familys_views/family_letters_views_new/Insurance_letter';
        $this->load->view('admin_index', $data);


    }
    public function update_Insurance_letter(){
        $this->load->model('familys_models/family_letters_models/family_letter_model');
        $data['mother']=$this->family_letter_model->get_mother_data()[0];
        $data['last_id']=$this->family_letter_model->select_last_id();
        $data['father']=$this->family_letter_model->get_father_data()[0];
        $data['f_members']=$this->family_letter_model->get_f_member();
        //$data['letters']=$this->family_letter_model->get_letters_by_type(2);
        $data['result']=$this->family_letter_model->getByLetter_num($this->uri->segment(5));

        if($this->input->post('submit'))
        {

            $this->family_letter_model->update_letter($this->uri->segment(5),$this->uri->segment(6));
            redirect('family_controllers/Family_letter/Insurance_letter/'.$this->uri->segment(4),'refresh');

        }
        $data['title']="خطاب الأحوال المدنية";
        $data['subview'] = 'admin/familys_views/family_letters_views_new/Insurance_letter';
        $this->load->view('admin_index', $data);
    }



    public function delete_Insurance_letter($id){
        $this->family_letter_model->delete_letter($id);
        // $this->message('success','تم حذف البيانات بنجاح');
        redirect('family_controllers/Family_letter/Insurance_letter/'.$this->uri->segment(5),'refresh');

    }

//===================================================================
    public function Retirement_letter(){     //family_controllers/Family_letter/Retirement_letter/1042645620

        $data['mother']=$this->family_letter_model->get_mother_data()[0];
        $data['last_id']=$this->family_letter_model->select_last_id();
        $data['father']=$this->family_letter_model->get_father_data()[0];
        $data['f_members']=$this->family_letter_model->get_f_member();


        $data['letters']=$this->family_letter_model->get_letters_by_type(3);
        if($this->input->post('submit'))
        {

            $this->family_letter_model->insert_letter($this->uri->segment(5));

            redirect('family_controllers/Family_letter/Retirement_letter/'.$this->uri->segment(4),'refresh');

        }
        $data['title']="خطاب التقاعد";
        $data['subview'] = 'admin/familys_views/family_letters_views_new/retirement_letter';
        $this->load->view('admin_index', $data);


    }
    public function update_Retirement_letter(){
        $this->load->model('familys_models/family_letters_models/family_letter_model');
        $data['mother']=$this->family_letter_model->get_mother_data()[0];
        $data['last_id']=$this->family_letter_model->select_last_id();
        $data['father']=$this->family_letter_model->get_father_data()[0];
        $data['f_members']=$this->family_letter_model->get_f_member();
       // $data['letters']=$this->family_letter_model->get_letters_by_type(3);
        $data['result']=$this->family_letter_model->getByLetter_num($this->uri->segment(5));

        if($this->input->post('submit'))
        {

            $this->family_letter_model->update_letter($this->uri->segment(5),$this->uri->segment(6));
            redirect('family_controllers/Family_letter/Retirement_letter/'.$this->uri->segment(4),'refresh');

        }
        $data['title']="خطاب  التقاعد";
        $data['subview'] = 'admin/familys_views/family_letters_views_new/retirement_letter';
        $this->load->view('admin_index', $data);
    }



    public function delete_Retirement_letter($id){
        $this->family_letter_model->delete_letter($id);
        // $this->message('success','تم حذف البيانات بنجاح');
        redirect('family_controllers/Family_letter/Retirement_letter/'.$this->uri->segment(5),'refresh');

    }
//================================================================
    public function daman_letter(){      //family_controllers/Family_letter/daman_letter/1042645620

        $data['mother']=$this->family_letter_model->get_mother_data()[0];
        $data['last_id']=$this->family_letter_model->select_last_id();
        $data['father']=$this->family_letter_model->get_father_data()[0];
        $data['f_members']=$this->family_letter_model->get_f_member();


        $data['letters']=$this->family_letter_model->get_letters_by_type(4);
        if($this->input->post('submit'))
        {

            $this->family_letter_model->insert_letter($this->uri->segment(5));

            redirect('family_controllers/Family_letter/daman_letter/'.$this->uri->segment(4),'refresh');

        }
        $data['title']="خطاب الضمان";
        $data['subview'] = 'admin/familys_views/family_letters_views_new/daman_letter';
        $this->load->view('admin_index', $data);


    }
    public function update_daman_letter(){
        $this->load->model('familys_models/family_letters_models/family_letter_model');
        $data['mother']=$this->family_letter_model->get_mother_data()[0];
        $data['last_id']=$this->family_letter_model->select_last_id();
        $data['father']=$this->family_letter_model->get_father_data()[0];
        $data['f_members']=$this->family_letter_model->get_f_member();
      //  $data['letters']=$this->family_letter_model->get_letters_by_type(4);
        $data['result']=$this->family_letter_model->getByLetter_num($this->uri->segment(5));

        if($this->input->post('submit'))
        {

            $this->family_letter_model->update_letter($this->uri->segment(5),$this->uri->segment(6));
            redirect('family_controllers/Family_letter/daman_letter/'.$this->uri->segment(4),'refresh');

        }
        $data['title']="خطاب الضمان";
        $data['subview'] = 'admin/familys_views/family_letters_views_new/daman_letter';
        $this->load->view('admin_index', $data);
    }



    public function delete_daman_letter($id){
        $this->family_letter_model->delete_letter($id);
        redirect('family_controllers/Family_letter/daman_letter/'.$this->uri->segment(5),'refresh');

    }

}
