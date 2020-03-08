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
    public function mother_letter()
    {

        if($this->input->post('submit'))

        {


            $this->family_letter_model->insert_mother_letter(1);
            redirect('family_controllers/Family_letter/mother_letter/'.$this->uri->segment(4),'refresh');
        }


        $data['mother']=$this->family_letter_model->get_mother_data()[0];
        $data['option_letter']=$this->family_letter_model->get_all_option_letter(2);
        $data['letters']=$this->family_letter_model->get_letters_by_type(1);

        

        $data['title']="خطاب تأمينات الام";
        $data['subview'] = 'admin/familys_views/family_letters_views/mother_letter';
        $this->load->view('admin_index', $data);
    }




    public function father_letter()
    {

        if($this->input->post('submit'))

        {


            $this->family_letter_model->insert_mother_letter(2);
            redirect('family_controllers/Family_letter/father_letter/'.$this->uri->segment(4),'refresh');
        }


        $data['father']=$this->family_letter_model->get_father_data()[0];
        $data['option_letter']=$this->family_letter_model->get_all_option_letter(2);
        $data['letters']=$this->family_letter_model->get_letters_by_type(2);



        $data['title']="خطاب تأمينات الاب";
        $data['subview'] = 'admin/familys_views/family_letters_views/father_letter';
        $this->load->view('admin_index', $data);
    }


    public function f_member_letter()
    {
        $data['title']="خطاب لأم او لأحد ابنائها";
        $data['mother']=$this->family_letter_model->get_mother_data()[0];
        $data['option_letter']=$this->family_letter_model->get_all_option_letter(4);
        $data['f_members']=$this->family_letter_model->get_f_member();
        $data['letters']=$this->family_letter_model->get_letters_by_mother_num();
        if($this->input->post('submit'))

        {


            $this->family_letter_model->insert_dman_family_letter();

          redirect('family_controllers/Family_letter/f_member_letter/'.$this->uri->segment(4),'refresh');

        }

        $data['subview'] = 'admin/familys_views/family_letters_views/f_member_letter';
        $this->load->view('admin_index', $data);
    }




   /* public function print_letter($mother_num,$id,$type,$option){

  if($type==2) {
    $data['father'] = $this->family_letter_model->get_father_data()[0];
    $data['option_letter'] = $this->family_letter_model->get_all_option_letter(2);

}elseif ($type==1)
{

    $data['father'] = $this->family_letter_model->get_mother_data()[0];
    $data['option_letter'] = $this->family_letter_model->get_all_option_letter(2);
}


        $this->load->view('admin/familys_views/family_letters_views/print_daman_father',$data);

    }*/
    public function print_letter($mother_num,$id,$type,$option){

        if($type==2) {
            $data['father'] = $this->family_letter_model->get_father_data()[0];
            $data['option_letter'] = $this->family_letter_model->get_all_option_letter(2);
            $data['family_info'] = $this->family_letter_model->get_letters_by_type_id($mother_num,$type,$id);
        }elseif ($type==1)
        {
            $data['father'] = $this->family_letter_model->get_mother_data()[0];
            $data['option_letter'] = $this->family_letter_model->get_all_option_letter(2);
            $data['family_info'] = $this->family_letter_model->get_letters_by_type_id($mother_num,$type,$id);
        }

        //  $this->test($data['family_info']);

        $this->load->view('admin/familys_views/family_letters_views/print_daman_father',$data);

    }
    //=====================================

    public function fatherRetirement($mother_national_id)
    {

        if($this->input->post('submit'))

        {


            $this->family_letter_model->insert_fatherRetirement(3);
            redirect('family_controllers/Family_letter/fatherRetirement/'.$mother_national_id,'refresh');
        }


        $data['father']=$this->family_letter_model->get_father_data()[0];
        $data['option_letter']=$this->family_letter_model->get_all_option_letter(5);
        $data['letters']=$this->family_letter_model->get_letters_by_type(3);



        $data['title']="خطاب تفاعد الاب";
        $data['subview'] = 'admin/familys_views/family_letters_views/fatherRetirement';
        $this->load->view('admin_index', $data);
    }



    public function civillStatus($mother_national_id) //family_controllers/Family_letter/civillStatus/987654321000
    {

        $data['father']=$this->family_letter_model->get_father_data()[0];
        $data['mother']=$this->family_letter_model->get_mother_data()[0];

        $data['title']="خطاب الاحوال المدنية";
        $data['subview'] = 'admin/familys_views/family_letters_views/civillStatus';
        $this->load->view('admin_index', $data);
    }



    public function printRetirementSystem($mother_national_num,$type,$id) //family_controllers/Family_letter/printRetirementSystem/987654321000
    {
        $this->load->model('familys_models/Family_print');
        $this->load->model('Difined_model');

        $data['place'] ='';
        $data['father']=$this->family_letter_model->get_father_data()[0];
        $data['option_letter']=$this->family_letter_model->get_all_option_letter(5);
        $data['family_info'] = $this->family_letter_model->get_letters_by_type_id($mother_national_num,$type,$id);
        //$this->test($data['family_info']);

        $this->load->view('admin/familys_views/family_letters_views/letters_prints/print_retirement_system', $data);
    }



    public function printCivillStatus($mother_national_num) //family_controllers/Family_letter/printCivillStatus
    {

        $data['father']=$this->family_letter_model->get_father_data()[0];
        $data['mother']=$this->family_letter_model->get_mother_data()[0];


        $this->load->view('admin/familys_views/family_letters_views/letters_prints/printCivillStatus', $data);
    }

public function print_f_member_letter($mother_national_num,$type,$person_national_card)
{
    $data['f_members']=$this->family_letter_model->get_f_member();

    $data['letters']=$this->family_letter_model->get_by_person_national_card($mother_national_num,$type,$person_national_card);

    $this->load->view('admin/familys_views/family_letters_views/print_f_member_letter', $data);
}


}
