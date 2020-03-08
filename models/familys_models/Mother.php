<?php

class Mother extends CI_Model
{
    
public function __construct() {

        parent::__construct();

    }
//---------------------------------------------------
  public function chek_Null($post_value){
        if($post_value == '' || $post_value==null || (!isset($post_value))){
            $val="";
            return $val;
        }else{
            return $post_value;
        }
    }
    public function HijriToJD10($date_in){
    $ex =(explode('/',$date_in));  
    $y  = (int) $ex[0];
    $m  = (int) $ex[1];
    $d  = (int) $ex[2];

    return (int)((11 * $y + 3) / 30) + (int)(354 * $y) + (int)(30 * $m) - (int)(($m - 1) / 2) + $d + 1948440 - 385;
     }
         public function HijriToJD10year($date_in){
    $ex =(explode('/',$date_in));  
    $y  = (int) $ex[0];
  

    return $y ;
    }
    
             public function HijriToJD10year_2($date_in){
    $ex =(explode('/',$date_in));  
    $y  = (int) $ex[2];
  

    return $y ;
    }
//---------------------------------------------------



    public  function  insert($national_mother){


 $data['m_death_date']=$this->chek_Null($this->input->post('m_death_date'));
 $data['m_death_reason']=$this->chek_Null($this->input->post('m_death_reason'));
$data['last_haj_year']=$this->chek_Null($this->input->post('last_haj_year'));

//gender

        $this->db->where("mother_national_num_fk",$national_mother);
    $this->db->delete("mother_courses_and_skills");
		 if(!empty($_POST['courses'])){



			 foreach ($_POST['courses'] as $key=>$value){

				 $courses['type']=1;
				 $courses['mother_national_num_fk']=$national_mother;
				 $courses['course_skill_id_fk']=$value;
				 $this->db->insert('mother_courses_and_skills',$courses);

			 }


		 }


        if(!empty($_POST['skills'])){



            foreach ($_POST['skills'] as $key=>$value){

                $courses['type']=2;
                $courses['mother_national_num_fk']=$national_mother;
                $courses['course_skill_id_fk']=$value;
                $this->db->insert('mother_courses_and_skills',$courses);

            }


        }
		
		
		
		
		
		/*****************************ahmed_start********************/

        $data['m_comprehensive_rehabilitation']=$this->chek_Null($this->input->post('m_comprehensive_rehabilitation'));
        $data['m_rehabilitation_value']=$this->chek_Null($this->input->post('m_rehabilitation_value'));
        $data['m_relative_mob']=$this->chek_Null($this->input->post('m_relative_mob'));
        $data['m_relative_relation']=$this->chek_Null($this->input->post('m_relative_relation'));
        $data['m_work_in_commercial_project']=$this->chek_Null($this->input->post('m_work_in_commercial_project'));
        $data['m_project_name']=$this->chek_Null($this->input->post('m_project_name'));
        $data['m_project_status']=$this->chek_Null($this->input->post('m_project_status'));
        $data['m_haj_geha']=$this->chek_Null($this->input->post('m_haj_geha'));
       // $data['m_last_hij_date']=$this->chek_Null($this->input->post('m_last_hij_date'));
        $data['m_omra_geha']=$this->chek_Null($this->input->post('m_omra_geha'));
        $data['m_last_omra_date']=$this->chek_Null($this->input->post('m_last_omra_date'));
        $data['m_other_skill']=$this->chek_Null($this->input->post('m_other_skill'));


/*****************************ahmed_start********************/




           $data['mother_national_num_fk']=$national_mother;
           $data['full_name']=$this->chek_Null( $this->input->post('fullname'));


        $gregorian_date_arr=array($this->input->post('CDay'),$this->input->post('CMonth'),$this->input->post('CYear'));
        $gregorian_date=implode('/',$gregorian_date_arr);

        $hijri_date_arr=array($this->input->post('HDay'),$this->input->post('HMonth'),$this->input->post('HYear'));
        $hijri_date=implode('/',$hijri_date_arr);

           $data['m_birth_date']=$this->chek_Null( $gregorian_date);

           $data['m_birth_date_hijri']=$this->chek_Null($hijri_date);
           $data['m_birth_date_year']=$this->chek_Null($this->input->post('CYear'));
           $data['m_birth_date_hijri_year']=$this->chek_Null($this->input->post('HYear'));



$data['categoriey_m']=$this->chek_Null( $this->input->post('categoriey_m'));
$data['guaranteed_m']=$this->chek_Null( $this->input->post('guaranteed_m'));



$data['m_gender']=$this->chek_Null( $this->input->post('gender'));
$data['m_nationality']=$this->chek_Null( $this->input->post('m_nationality'));
$data['nationality_other']=$this->chek_Null( $this->input->post('nationality_other'));



           $data['representative_name']=$this->chek_Null( $this->input->post('representative_name'));
           $data['representative_age']=$this->chek_Null( $this->input->post('representative_age'));
           $data['representative_relative']=$this->chek_Null( $this->input->post('representative_relative'));
           $data['representative_phone']=$this->chek_Null( $this->input->post('representative_phone'));


           $data['m_marital_status_id_fk']=$this->chek_Null( $this->input->post('m_marital_status_id_fk'));
           $data['m_living_place_id_fk']=$this->chek_Null( $this->input->post('m_living_place_id_fk'));
           $data['m_living_place']=$this->chek_Null( $this->input->post('m_living_place'));
           $data['m_national_id']=$this->chek_Null( $this->input->post('m_national_id'));
           $data['m_national_id_type']=$this->chek_Null( $this->input->post('m_national_id_type'));
           $data['m_education_status_id_fk']=$this->chek_Null( $this->input->post('m_education_status_id_fk'));
           $data['m_specialization']=$this->chek_Null( $this->input->post('m_specialization'));
           $data['m_health_status_id_fk']=$this->chek_Null( $this->input->post('m_health_status_id_fk'));

           $data['m_skill_name']=$this->chek_Null( $this->input->post('m_skill_name'));
           $data['m_job_id_fk']=$this->chek_Null( $this->input->post('m_job_id_fk'));
           $data['m_job_other']=$this->chek_Null( $this->input->post('m_job_other'));
           $data['m_monthly_income']=$this->chek_Null( $this->input->post('m_monthly_income'));
           $data['m_education_level_id_fk']=$this->chek_Null( $this->input->post('m_education_level_id_fk'));
           $data['m_education_level_id_fk']=$this->chek_Null( $this->input->post('m_education_level_id_fk'));
           $data['m_female_house_check']=$this->chek_Null( $this->input->post('m_female_house_check'));
           $data['m_female_house_id_fk']=$this->chek_Null( $this->input->post('m_female_house_id_fk'));
           $data['m_hijri']=$this->chek_Null( $this->input->post('m_hijri'));
           $data['m_ommra']=$this->chek_Null( $this->input->post('m_ommra'));
           $data['m_mob']=$this->chek_Null( $this->input->post('m_mob'));
           $data['m_another_mob']=$this->chek_Null( $this->input->post('m_another_mob'));
           $data['m_email']=$this->chek_Null( $this->input->post('m_email'));
           $data['m_want_work']=$this->chek_Null( $this->input->post('m_want_work'));

        /**************ahmed*/
        $data['person_type']=$this->chek_Null( $this->input->post('person_type'));
        $data['m_relationship']=$this->chek_Null( $this->input->post('m_relationship'));
        $data['m_card_source']=$this->chek_Null( $this->input->post('m_card_source'));
        $data['disease_id_fk']=$this->chek_Null( $this->input->post('disease_id_fk'));
        $data['disability_id_fk']=$this->chek_Null( $this->input->post('disability_id_fk'));
        $data['dis_date_ar']=$this->chek_Null( $this->input->post('dis_date_ar'));
        $data['dis_reason']=$this->chek_Null( $this->input->post('dis_reason'));
        $data['dis_response_status']=$this->chek_Null( $this->input->post('dis_response_status'));
        $data['dis_status']=$this->chek_Null( $this->input->post('dis_status'));
        $data['m_place_work']=$this->chek_Null( $this->input->post('m_place_work'));
        $data['m_place_mob']=$this->chek_Null( $this->input->post('m_place_mob'));


        $data['m_account']=$this->chek_Null( $this->input->post('m_account'));
        $data['m_account_id']=$this->chek_Null( $this->input->post('m_account_id'));


         $data['bank_account_num']=$this->chek_Null( $this->input->post('bank_account'));
        $data['date_death_disease']=$this->chek_Null( $this->input->post('date_death_disease'));
 $data['halt_elmostafid_m']=$this->chek_Null($this->input->post('halt_elmostafid_m'));
        /**************ahmed*/
  $data['personal_character_id_fk']=$this->chek_Null($this->input->post('personal_character_id_fk'));
  $data['relation_with_family']=$this->chek_Null($this->input->post('relation_with_family'));
        
  $data['ability_work']=$this->chek_Null($this->input->post('ability_work'));
  $data['work_type_id_fk']=$this->chek_Null($this->input->post('work_type_id_fk'));
 

 $data['mother_national_card_new']=$this->chek_Null($this->input->post('mother_national_card_new'));
 





           if($this->get_mother_national($national_mother)>0){
               $this->db->where('mother_national_num_fk',$national_mother);
               $this->db->update('mother',$data);


           }else {


               $this->db->insert('mother',$data);

           }
       }

    //=======================================================================
    public function get_from_family_setting($type)
    {
        $this->db->where('type',$type);
       // $this->db->limit(1);
        return $this->db->get('family_setting')->result();

    }

    public function get_mother_national($national_mother)
    {
        $this->db->where('mother_national_num_fk',$national_mother);
        $query=$this->db->get('mother');
        return $query->num_rows();
}



 public function get_mother_name(){
        $this->db->select('*');
        $this->db->from('mother');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->mother_national_num_fk] = $row;
            }
            return $data;
        }
        return false;
    }

/*********************************************************************/
    public function getMotherAccount($mother_num){
        $this->db->select('*');
        $this->db->from("mother");
        $this->db->where("mother_national_num_fk",$mother_num);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
                $data = $query->result()[0]->m_account;
            return $data;
        }else{
            return 0;
        }

    }


    public function getFamilyAccount($mother_num){
    $this->db->select('*');
    $this->db->from("f_members");
    $this->db->where("mother_national_num_fk",$mother_num);
    $this->db->where("member_account",1);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        return 1;
    }else{
        return 0;
    }

}
    /*****************************************************************************************/
/*
    public function getFamilyAccount($mother_num){
    $this->db->select('*');
    $this->db->from("f_members");
    $this->db->where("mother_national_num_fk",$mother_num);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        $data= $query->result()[0]->member_account ;
        return $data;
    }else{
        return 0;
    }

}*/

    public function getBasicAccount($mother_num){
        $this->db->select('*');
        $this->db->from("basic");
        $this->db->where("mother_national_num",$mother_num);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data= $query->result()[0]->person_account ;
            return $data;
        }else{
            return 0;
        }

    }

    public function getBasicAccount_agent($mother_num){
        $this->db->select('*');
        $this->db->from("basic");
        $this->db->where("mother_national_num",$mother_num);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data= $query->result()[0]->agent_bank_account ;
            return $data;
        }else{
            return 0;
        }

    }
    
    
    public function change_course_approved(){

    if($_POST['approved'] ==0){

        $data['approved'] =1;

    }elseif($_POST['approved'] ==1){

        $data['approved'] =0;
    }
    $this->db->where('mother_national_num_fk',$_POST['mother_num']);
    $this->db->where('course_skill_id_fk',$_POST['id']);
    $this->db->update('mother_courses_and_skills',$data);

}





    public function GetCourses_skills($arr){
        $this->db->select('*');
        $this->db->from("mother_courses_and_skills");
        $this->db->where($arr);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row->course_skill_id_fk;
            }
            return $data;
        }
        return false;
    }

    public function GetCourses_skills_data($arr){
        $this->db->select('*');
        $this->db->from("mother_courses_and_skills");
        $this->db->where($arr);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->course_skill_id_fk] = $row;
            }
            return $data;
        }
        return false;
    }
/***************************************************/

    public function Getkafalat($id)
    {
        $this->db->select('*');
        $this->db->from('fr_main_kafalat_details');
        $this->db->where('person_id_fk', $id);
        $this->db->order_by('id', 'desc');
        //$this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $pay_method_arr =array('ÅÎÊÑ',1=>'äÞÏí',2=>'Ôíß',3=>'ÔÈßÉ',4=>'ÅíÏÇÚ äÞÏí'
            ,5=>'ÅíÏÇÚ Ôíß',6=>'ÊÍæíá',7=>'ÃãÑ ãÓÊÏíã');

            $data = array();
            $i = 0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->kafel_name = $this->get_kafel_name($row->first_kafel_id);
                $data[$i]->halet_kafel_title = $this->get_halet_kafela($row->first_status)['title'];
                $data[$i]->halet_kafel_color = $this->get_halet_kafela($row->first_status)['color'];

                $data[$i]->kafala_name = $this->get_kafela_name($row->kafala_type_fk)['title'];
                $data[$i]->tawred_type = $pay_method_arr[$row->pay_method];
            }

            return $data;
        } else {
            return false;
        }

    }

    public function get_kafel_name($kafel_id)
    {
        $this->db->select('k_num,id,k_name');
        $this->db->where('id', $kafel_id);
        $query = $this->db->get('fr_sponsor');
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return "ÛíÑ ãÍÏÏ ";
        }
    }

    public function get_halet_kafela($halet_kafala)
    {
        $h = $this->db->get_where("fr_kafalat_kafel_status", array('id' => $halet_kafala));
        return $arr = $h->row_array();

    }

    public function get_kafela_name($kafala_type_fk)
    {
        $h = $this->db->get_where("fr_kafalat_types_setting", array('id' => $kafala_type_fk));
        return $arr = $h->row_array();

    }
    
    

}// END CLASS

