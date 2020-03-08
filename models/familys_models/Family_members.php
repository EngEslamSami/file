<?php

class Family_members extends CI_Model
{
    
    public function __construct() {

        parent::__construct();

    }
//---------------------------------------------------
  public function chek_Null($post_value){
        if($post_value == '' || $post_value==null || (!isset($post_value))){
            $out='';
            return $out;
        }else{
            return $post_value;
        }
    }
//----------------------------------------------------
 public   function HijriToJD10($date_in)
           {
             $ex =(explode('/',$date_in));  
            $d   = $ex[0];
            $m =$ex[1];
            $y  =$ex[2];
              return (int)((11 * $y + 3) / 30) + (int)(354 * $y) + (int)(30 * $m)
            - (int)(($m - 1) / 2) + $d + 1948440 - 385;
           }
//---------------------------------------------------
//member_relationship
    public  function  insert($file,$mother_national_num_fk){
        $data['mother_national_num_fk']=$mother_national_num_fk;       
        $data['member_full_name']=$this->chek_Null($this->input->post('member_full_name'));
        $data['member_card_type']=$this->chek_Null($this->input->post('member_card_type'));
        $data['member_card_num']=$this->chek_Null($this->input->post('member_card_num'));
        $data['member_nationality']=$this->chek_Null($this->input->post('member_nationality'));
        $data['nationality_other']=$this->chek_Null($this->input->post('nationality_other'));
        $data['school_id_fk']=$this->chek_Null($this->input->post('school_id_fk'));
        $data['education_type']=$this->chek_Null($this->input->post('education_type'));
        $data['school_cost']=$this->chek_Null($this->input->post('school_cost'));
        $data['member_photo']=$file['member_photo'];
        $data['member_gender']=$this->chek_Null($this->input->post('member_gender'));
        $data['member_job']=$this->chek_Null($this->input->post('member_job'));
        $data['member_job_place']=$this->chek_Null($this->input->post('member_job_place'));
        $data['member_skill']=$this->chek_Null($this->input->post('member_skill'));
        $data['member_email']=$this->chek_Null($this->input->post('member_email'));
        $data['member_status']=$this->chek_Null($this->input->post('member_status'));
        $data['member_distracted_mother']=$this->chek_Null($this->input->post('member_distracted_mother'));
        $data['member_activity_type']=$this->chek_Null($this->input->post('member_activity_type'));   
        $data['member_activity_type_other']=$this->chek_Null($this->input->post('member_activity_type_other'));
        $data['member_mob']=$this->chek_Null($this->input->post('member_mob'));
        $data['member_smoken']=$this->chek_Null($this->input->post('member_smoken'));
        $data['member_health_type']=$this->chek_Null($this->input->post('member_health_type'));
      //  $data['member_health_type_other']=$this->chek_Null($this->input->post('member_health_type_other'));
        $data['member_month_money']=$this->chek_Null($this->input->post('member_month_money'));
        $data['member_child_num']=$this->chek_Null($this->input->post('member_child_num'));
        $data['member_home_type']=$this->chek_Null($this->input->post('member_home_type'));
        $data['member_home_other']=$this->chek_Null($this->input->post('member_home_other'));
        $data['member_hij']=$this->chek_Null($this->input->post('member_hij'));
        $data['stage_id_fk']=$this->chek_Null($this->input->post('stage_id_fk'));
        $data['class_id_fk']=$this->chek_Null($this->input->post('class_id_fk'));
        $data['member_omra']=$this->chek_Null($this->input->post('member_omra'));
        $data['member_note']=$this->chek_Null($this->input->post('member_note'));
        $data['member_birth_card_img']=$file['member_birth_card_img'];   
        $data['member_sechool_img']=$file['member_sechool_img'];
        $data['member_disease_id_fk']=$this->chek_Null( $this->input->post('member_disease_id_fk'));
$data['member_disability_id_fk']=$this->chek_Null( $this->input->post('member_disability_id_fk'));
$data['member_dis_date_ar']=$this->chek_Null( $this->input->post('member_dis_date_ar'));
$data['member_dis_reason']=$this->chek_Null( $this->input->post('member_dis_reason'));
$data['member_dis_response_status']=$this->chek_Null( $this->input->post('member_dis_response_status'));
$data['member_dis_status']=$this->chek_Null( $this->input->post('member_dis_status'));
   $data['personal_character_id_fk']=$this->chek_Null( $this->input->post('personal_character_id_fk'));
        $data['relation_with_family']=$this->chek_Null( $this->input->post('relation_with_family'));
        $data['education_problems']=$this->chek_Null( $this->input->post('education_problems'));
        $data['courses_details']=$this->chek_Null( $this->input->post('courses_details'));
        $data['member_specialization']=$this->chek_Null( $this->input->post('member_specialization'));



  	   $data['categoriey_member']=$this->chek_Null( $this->input->post('categoriey_member'));
        $data['guaranteed_member']=$this->chek_Null( $this->input->post('guaranteed_member'));
        $data['member_dar_markz_id_fk']=$this->chek_Null( $this->input->post('member_dar_markz_id_fk'));
        $data['member_dar_markz_check']=$this->chek_Null( $this->input->post('member_dar_markz_check'));      
        
//     $data['halt_elmostafid_member']=$this->chek_Null( $this->input->post('halt_elmostafid_member'));     
  $data['persons_status']=$this->chek_Null( $this->input->post('persons_status'));

   $data['halt_elmostafid_member']=$this->chek_Null( $this->input->post('persons_status'));
  
  
  
    /******************************ahmed**********************/
  $data['guaranteed']=$this->chek_Null($this->input->post('guaranteed'));
    $gregorian_date_arr=array($this->input->post('CDay'),$this->input->post('CMonth'),$this->input->post('CYear'));
    $gregorian_date=implode('/',$gregorian_date_arr);

    $hijri_date_arr=array($this->input->post('HDay'),$this->input->post('HMonth'),$this->input->post('HYear'));
    $hijri_date=implode('/',$hijri_date_arr);

    $data['member_birth_date']=$this->chek_Null( $gregorian_date);
    $data['member_birth_date_hijri']=$this->chek_Null($hijri_date);
    $data['member_birth_date_year']=$this->chek_Null($this->input->post('CYear'));
    $data['member_birth_date_hijri_year']=$this->chek_Null($this->input->post('HYear'));
    $data['member_relationship']=$this->chek_Null($this->input->post('member_relationship'));
    $data['member_card_source']=$this->chek_Null($this->input->post('member_card_source'));
    $data['member_study_case']=$this->chek_Null($this->input->post('member_study_case'));
    $data['member_academic_achievement_level']=$this->chek_Null($this->input->post('member_academic_achievement_level'));
    $data['member_person_type']=$this->chek_Null( $this->input->post('member_person_type'));
    $data['member_education_level']=$this->chek_Null( $this->input->post('member_education_level'));
    //$data['member_account']=$this->chek_Null( $this->input->post('member_account'));
    //$data['member_account_id']=$this->chek_Null( $this->input->post('member_account_id'));
    $data['member_house_check']=$this->chek_Null( $this->input->post('member_house_check'));
    $data['member_house_id_fk']=$this->chek_Null( $this->input->post('member_house_id_fk'));
    /******************************ahmed**********************/
  
      	//  $explode=explode("-",$this->input->post('member_account_id'));
      //  $data['member_account_id'] =$explode[0];

    //$data['member_account_id']=$this->chek_Null( $this->input->post('member_account_id'));
	  //$data['bank_account_num']=$this->chek_Null($this->input->post('bank_num'));


        /**********************************ahmed_start******************************/
        $data['member_hij']=$this->chek_Null( $this->input->post('member_hij'));
        $data['member_haj_geha']=$this->chek_Null( $this->input->post('member_haj_geha'));
        $data['member_last_hij_date']=$this->chek_Null( $this->input->post('member_last_hij_date'));
        $data['member_omra']=$this->chek_Null( $this->input->post('member_omra'));
        $data['member_omra_geha']=$this->chek_Null( $this->input->post('member_omra_geha'));
        $data['member_last_omra_date']=$this->chek_Null( $this->input->post('member_last_omra_date'));
        $data['member_comprehensive_rehabilitation']=$this->chek_Null( $this->input->post('member_comprehensive_rehabilitation'));
        $data['member_rehabilitation_value']=$this->chek_Null( $this->input->post('member_rehabilitation_value'));

        $data['member_other_skill']=$this->chek_Null( $this->input->post('member_other_skill'));



        /***********************************ahmed_start*****************************/



        $this->db->insert('f_members',$data);




        if(!empty($_POST['courses'])){



            foreach ($_POST['courses'] as $key=>$value){

                $courses['type']=1;
                $courses['family_member_id_fk']=$this->select_last_id();
                $courses['course_skill_id_fk']=$value;
                $this->db->insert('f_members_courses_and_skills',$courses);

            }


        }


        if(!empty($_POST['skills'])){



            foreach ($_POST['skills'] as $key=>$value){

                $courses['type']=2;
                $courses['family_member_id_fk']=$this->select_last_id();
                $courses['course_skill_id_fk']=$value;
                $this->db->insert('f_members_courses_and_skills',$courses);

            }


        }




    /************************************ahmed_start**********************************/

        if(!empty($this->input->post('problem_id_fk'))){

                      $problem_id_fk =$this->input->post('problem_id_fk');
            for ($z=0;$z<sizeof($problem_id_fk);$z++){
                $courses['family_member_id_fk']=$this->select_last_id();
                $courses['problem_id_fk']=$problem_id_fk[$z];
                $courses['approved']=0;
                $this->db->insert('f_members_education_problems',$courses);
            }
        }

       // select_last_id
    /************************************ahmed_start**********************************/


    }
//----------------------------------------------------------------------
public  function  update_member($id,$file){
    $data['member_full_name']=$this->chek_Null($this->input->post('member_full_name'));
    $data['member_card_type']=$this->chek_Null($this->input->post('member_card_type'));
    $data['member_card_num']=$this->chek_Null($this->input->post('member_card_num'));
    $data['member_nationality']=$this->chek_Null($this->input->post('member_nationality'));
    $data['nationality_other']=$this->chek_Null($this->input->post('nationality_other'));
    $data['school_id_fk']=$this->chek_Null($this->input->post('school_id_fk'));
    $data['education_type']=$this->chek_Null($this->input->post('education_type'));
    $data['school_cost']=$this->chek_Null($this->input->post('school_cost'));
   
    $data['member_gender']=$this->chek_Null($this->input->post('member_gender'));
    $data['member_job']=$this->chek_Null($this->input->post('member_job'));
    $data['member_job_place']=$this->chek_Null($this->input->post('member_job_place'));
    $data['member_skill']=$this->chek_Null($this->input->post('member_skill'));
    $data['member_email']=$this->chek_Null($this->input->post('member_email'));
    $data['member_status']=$this->chek_Null($this->input->post('member_status'));
    $data['member_distracted_mother']=$this->chek_Null($this->input->post('member_distracted_mother'));
    $data['member_activity_type']=$this->chek_Null($this->input->post('member_activity_type'));
    $data['member_activity_type_other']=$this->chek_Null($this->input->post('member_activity_type_other'));
    $data['member_mob']=$this->chek_Null($this->input->post('member_mob'));
    $data['member_smoken']=$this->chek_Null($this->input->post('member_smoken'));
    $data['member_health_type']=$this->chek_Null($this->input->post('member_health_type'));
    $data['member_health_type_other']=$this->chek_Null($this->input->post('member_health_type_other'));
    $data['member_month_money']=$this->chek_Null($this->input->post('member_month_money'));
    $data['member_child_num']=$this->chek_Null($this->input->post('member_child_num'));
    $data['member_home_type']=$this->chek_Null($this->input->post('member_home_type'));
    $data['member_home_other']=$this->chek_Null($this->input->post('member_home_other'));
    $data['member_hij']=$this->chek_Null($this->input->post('member_hij'));
    $data['stage_id_fk']=$this->chek_Null($this->input->post('stage_id_fk'));
    $data['class_id_fk']=$this->chek_Null($this->input->post('class_id_fk'));
    $data['member_omra']=$this->chek_Null($this->input->post('member_omra'));
    $data['member_note']=$this->chek_Null($this->input->post('member_note'));
   // $data['member_birth_card_img']=$file['member_birth_card_img'];
   // $data['member_sechool_img']=$file['member_sechool_img'];
    $data['member_disease_id_fk']=$this->chek_Null( $this->input->post('member_disease_id_fk'));
    $data['member_disability_id_fk']=$this->chek_Null( $this->input->post('member_disability_id_fk'));
    $data['member_dis_date_ar']=$this->chek_Null( $this->input->post('member_dis_date_ar'));
    $data['member_dis_reason']=$this->chek_Null( $this->input->post('member_dis_reason'));
    $data['member_dis_response_status']=$this->chek_Null( $this->input->post('member_dis_response_status'));
    $data['member_dis_status']=$this->chek_Null( $this->input->post('member_dis_status'));

	  $data['categoriey_member']=$this->chek_Null( $this->input->post('categoriey_member'));
        $data['guaranteed_member']=$this->chek_Null( $this->input->post('guaranteed_member'));
        $data['member_dar_markz_id_fk']=$this->chek_Null( $this->input->post('member_dar_markz_id_fk'));
        $data['member_dar_markz_check']=$this->chek_Null( $this->input->post('member_dar_markz_check'));
        $data['member_specialization']=$this->chek_Null( $this->input->post('member_specialization'));

  //$data['halt_elmostafid_member']=$this->chek_Null( $this->input->post('halt_elmostafid_member'));
     $data['persons_status']=$this->chek_Null( $this->input->post('persons_status'));
     $data['halt_elmostafid_member']=$this->chek_Null( $this->input->post('persons_status'));
  
      if($this->chek_Null($file['member_sechool_img']) !="" ){
        $data['member_sechool_img']=$file['member_sechool_img'];  
      }
      if($this->chek_Null($file['member_birth_card_img']) !='' ){
        $data['member_birth_card_img']=$file['member_birth_card_img'];
      }
        if($this->chek_Null($file['member_photo']) !='' ){
           $data['member_photo']=$file['member_photo'];
       }
          /******************************ahmed**********************/
    $data['guaranteed']=$this->chek_Null($this->input->post('guaranteed'));

    $gregorian_date_arr=array($this->input->post('CDay'),$this->input->post('CMonth'),$this->input->post('CYear'));
    $gregorian_date=implode('/',$gregorian_date_arr);

    $hijri_date_arr=array($this->input->post('HDay'),$this->input->post('HMonth'),$this->input->post('HYear'));
    $hijri_date=implode('/',$hijri_date_arr);

    $data['member_birth_date']=$this->chek_Null( $gregorian_date);
    $data['member_birth_date_hijri']=$this->chek_Null($hijri_date);
    $data['member_birth_date_year']=$this->chek_Null($this->input->post('CYear'));
    $data['member_birth_date_hijri_year']=$this->chek_Null($this->input->post('HYear'));
    $data['member_relationship']=$this->chek_Null($this->input->post('member_relationship'));
    $data['member_card_source']=$this->chek_Null($this->input->post('member_card_source'));
    $data['member_study_case']=$this->chek_Null($this->input->post('member_study_case'));
    $data['member_academic_achievement_level']=$this->chek_Null($this->input->post('member_academic_achievement_level'));
    $data['member_person_type']=$this->chek_Null( $this->input->post('member_person_type'));
    $data['member_education_level']=$this->chek_Null( $this->input->post('member_education_level'));
    //$data['member_account']=$this->chek_Null( $this->input->post('member_account'));
    //$data['member_account_id']=$this->chek_Null( $this->input->post('member_account_id'));
    $data['member_house_check']=$this->chek_Null( $this->input->post('member_house_check'));
    $data['member_house_id_fk']=$this->chek_Null( $this->input->post('member_house_id_fk'));
    /******************************ahmed**********************/
    	  
	  // $explode=explode("-",$this->input->post('member_account_id'));
        //$data['member_account_id'] =$explode[0];

    //$data['member_account_id']=$this->chek_Null( $this->input->post('member_account_id'));
	 // $data['bank_account_num']=$this->chek_Null($this->input->post('bank_num'));
	    
        
        $data['personal_character_id_fk']=$this->chek_Null( $this->input->post('personal_character_id_fk'));
        $data['relation_with_family']=$this->chek_Null( $this->input->post('relation_with_family'));
        $data['education_problems']=$this->chek_Null( $this->input->post('education_problems'));
        $data['courses_details']=$this->chek_Null( $this->input->post('courses_details'));



    /**********************************ahmed_start******************************/
    $data['member_hij']=$this->chek_Null( $this->input->post('member_hij'));
    $data['member_haj_geha']=$this->chek_Null( $this->input->post('member_haj_geha'));
    $data['member_last_hij_date']=$this->chek_Null( $this->input->post('member_last_hij_date'));
    $data['member_omra']=$this->chek_Null( $this->input->post('member_omra'));
    $data['member_omra_geha']=$this->chek_Null( $this->input->post('member_omra_geha'));
    $data['member_last_omra_date']=$this->chek_Null( $this->input->post('member_last_omra_date'));
    $data['member_comprehensive_rehabilitation']=$this->chek_Null( $this->input->post('member_comprehensive_rehabilitation'));
    $data['member_rehabilitation_value']=$this->chek_Null( $this->input->post('member_rehabilitation_value'));
    $data['member_other_skill']=$this->chek_Null( $this->input->post('member_other_skill'));




    /***********************************ahmed_start*****************************/
      
        $this->db->where('id', $id);
        $this->db->update('f_members',$data);



    /************************************ahmed_start**********************************/

    $this->db->where("family_member_id_fk",$id);
    $this->db->delete("f_members_education_problems");


    if(!empty($this->input->post('problem_id_fk'))){

        $problem_id_fk =$this->input->post('problem_id_fk');
        for ($z=0;$z<sizeof($problem_id_fk);$z++){
            $f_members_education_problems['family_member_id_fk']=$id;
            $f_members_education_problems['problem_id_fk']=$problem_id_fk[$z];
            $f_members_education_problems['approved']=0;
            $this->db->insert('f_members_education_problems',$f_members_education_problems);
        }
    }











    $this->db->where("family_member_id_fk",$id);
    $this->db->delete("f_members_courses_and_skills");

    if(!empty($_POST['courses'])){



        foreach ($_POST['courses'] as $key=>$value){

            $courses['type']=1;
            $courses['family_member_id_fk']=$id;
            $courses['course_skill_id_fk']=$value;
            $this->db->insert('f_members_courses_and_skills',$courses);

        }


    }


    if(!empty($_POST['skills'])){



        foreach ($_POST['skills'] as $key=>$value){

            $courses['type']=2;
            $courses['family_member_id_fk']=$id;
            $courses['course_skill_id_fk']=$value;
            $this->db->insert('f_members_courses_and_skills',$courses);

        }


    }


    // select_last_id
    /************************************ahmed_start**********************************/


    }
//---------------------------------------------------
//member_relationship
    /*public  function  insert($file,$mother_national_num_fk){
        $data['mother_national_num_fk']=$mother_national_num_fk;       
        $data['member_full_name']=$this->chek_Null($this->input->post('member_full_name'));
        $data['member_card_type']=$this->chek_Null($this->input->post('member_card_type'));
        $data['member_card_num']=$this->chek_Null($this->input->post('member_card_num'));
        $data['member_nationality']=$this->chek_Null($this->input->post('member_nationality'));
        $data['nationality_other']=$this->chek_Null($this->input->post('nationality_other'));
        $data['school_id_fk']=$this->chek_Null($this->input->post('school_id_fk'));
        $data['education_type']=$this->chek_Null($this->input->post('education_type'));
        $data['school_cost']=$this->chek_Null($this->input->post('school_cost'));
        $data['member_photo']=$file['member_photo'];
        $data['member_gender']=$this->chek_Null($this->input->post('member_gender'));
        $data['member_job']=$this->chek_Null($this->input->post('member_job'));
        $data['member_job_place']=$this->chek_Null($this->input->post('member_job_place'));
        $data['member_skill']=$this->chek_Null($this->input->post('member_skill'));
        $data['member_email']=$this->chek_Null($this->input->post('member_email'));
        $data['member_status']=$this->chek_Null($this->input->post('member_status'));
        $data['member_distracted_mother']=$this->chek_Null($this->input->post('member_distracted_mother'));
        $data['member_activity_type']=$this->chek_Null($this->input->post('member_activity_type'));   
        $data['member_activity_type_other']=$this->chek_Null($this->input->post('member_activity_type_other'));
        $data['member_mob']=$this->chek_Null($this->input->post('member_mob'));
        $data['member_smoken']=$this->chek_Null($this->input->post('member_smoken'));
        $data['member_health_type']=$this->chek_Null($this->input->post('member_health_type'));
        $data['member_health_type_other']=$this->chek_Null($this->input->post('member_health_type_other'));
        $data['member_month_money']=$this->chek_Null($this->input->post('member_month_money'));
        $data['member_child_num']=$this->chek_Null($this->input->post('member_child_num'));
        $data['member_home_type']=$this->chek_Null($this->input->post('member_home_type'));
        $data['member_home_other']=$this->chek_Null($this->input->post('member_home_other'));
        $data['member_hij']=$this->chek_Null($this->input->post('member_hij'));
        $data['stage_id_fk']=$this->chek_Null($this->input->post('stage_id_fk'));
        $data['class_id_fk']=$this->chek_Null($this->input->post('class_id_fk'));
        $data['member_omra']=$this->chek_Null($this->input->post('member_omra'));
        $data['member_note']=$this->chek_Null($this->input->post('member_note'));
        $data['member_birth_card_img']=$file['member_birth_card_img'];   
        $data['member_sechool_img']=$file['member_sechool_img'];
        $data['member_disease_id_fk']=$this->chek_Null( $this->input->post('member_disease_id_fk'));
$data['member_disability_id_fk']=$this->chek_Null( $this->input->post('member_disability_id_fk'));
$data['member_dis_date_ar']=$this->chek_Null( $this->input->post('member_dis_date_ar'));
$data['member_dis_reason']=$this->chek_Null( $this->input->post('member_dis_reason'));
$data['member_dis_response_status']=$this->chek_Null( $this->input->post('member_dis_response_status'));
$data['member_dis_status']=$this->chek_Null( $this->input->post('member_dis_status'));
   $data['personal_character_id_fk']=$this->chek_Null( $this->input->post('personal_character_id_fk'));
        $data['relation_with_family']=$this->chek_Null( $this->input->post('relation_with_family'));
        $data['education_problems']=$this->chek_Null( $this->input->post('education_problems'));
        $data['courses_details']=$this->chek_Null( $this->input->post('courses_details'));
        $data['member_specialization']=$this->chek_Null( $this->input->post('member_specialization'));



  	   $data['categoriey_member']=$this->chek_Null( $this->input->post('categoriey_member'));
        $data['guaranteed_member']=$this->chek_Null( $this->input->post('guaranteed_member'));
        $data['member_dar_markz_id_fk']=$this->chek_Null( $this->input->post('member_dar_markz_id_fk'));
        $data['member_dar_markz_check']=$this->chek_Null( $this->input->post('member_dar_markz_check'));      
        
//     $data['halt_elmostafid_member']=$this->chek_Null( $this->input->post('halt_elmostafid_member'));     
  $data['persons_status']=$this->chek_Null( $this->input->post('persons_status'));

   $data['halt_elmostafid_member']=$this->chek_Null( $this->input->post('persons_status'));
  
  
  
  $data['guaranteed']=$this->chek_Null($this->input->post('guaranteed'));
    $gregorian_date_arr=array($this->input->post('CDay'),$this->input->post('CMonth'),$this->input->post('CYear'));
    $gregorian_date=implode('/',$gregorian_date_arr);

    $hijri_date_arr=array($this->input->post('HDay'),$this->input->post('HMonth'),$this->input->post('HYear'));
    $hijri_date=implode('/',$hijri_date_arr);

    $data['member_birth_date']=$this->chek_Null( $gregorian_date);
    $data['member_birth_date_hijri']=$this->chek_Null($hijri_date);
    $data['member_birth_date_year']=$this->chek_Null($this->input->post('CYear'));
    $data['member_birth_date_hijri_year']=$this->chek_Null($this->input->post('HYear'));
    $data['member_relationship']=$this->chek_Null($this->input->post('member_relationship'));
    $data['member_card_source']=$this->chek_Null($this->input->post('member_card_source'));
    $data['member_study_case']=$this->chek_Null($this->input->post('member_study_case'));
    $data['member_academic_achievement_level']=$this->chek_Null($this->input->post('member_academic_achievement_level'));
    $data['member_person_type']=$this->chek_Null( $this->input->post('member_person_type'));
    $data['member_education_level']=$this->chek_Null( $this->input->post('member_education_level'));
    $data['member_account']=$this->chek_Null( $this->input->post('member_account'));
    $data['member_account_id']=$this->chek_Null( $this->input->post('member_account_id'));
    $data['member_house_check']=$this->chek_Null( $this->input->post('member_house_check'));
    $data['member_house_id_fk']=$this->chek_Null( $this->input->post('member_house_id_fk'));
   
  
      	  $explode=explode("-",$this->input->post('member_account_id'));
        $data['member_account_id'] =$explode[0];

    //$data['member_account_id']=$this->chek_Null( $this->input->post('member_account_id'));
	  $data['bank_account_num']=$this->chek_Null($this->input->post('bank_num'));
	   
        
        
        
        
    $this->db->insert('f_members',$data);
    }*/
    
    
    
//----------------------------------------------------------------------


/*public  function  update_member($id,$file){
    $data['member_full_name']=$this->chek_Null($this->input->post('member_full_name'));
    $data['member_card_type']=$this->chek_Null($this->input->post('member_card_type'));
    $data['member_card_num']=$this->chek_Null($this->input->post('member_card_num'));
    $data['member_nationality']=$this->chek_Null($this->input->post('member_nationality'));
    $data['nationality_other']=$this->chek_Null($this->input->post('nationality_other'));
    $data['school_id_fk']=$this->chek_Null($this->input->post('school_id_fk'));
    $data['education_type']=$this->chek_Null($this->input->post('education_type'));
    $data['school_cost']=$this->chek_Null($this->input->post('school_cost'));
   
    $data['member_gender']=$this->chek_Null($this->input->post('member_gender'));
    $data['member_job']=$this->chek_Null($this->input->post('member_job'));
    $data['member_job_place']=$this->chek_Null($this->input->post('member_job_place'));
    $data['member_skill']=$this->chek_Null($this->input->post('member_skill'));
    $data['member_email']=$this->chek_Null($this->input->post('member_email'));
    $data['member_status']=$this->chek_Null($this->input->post('member_status'));
    $data['member_distracted_mother']=$this->chek_Null($this->input->post('member_distracted_mother'));
    $data['member_activity_type']=$this->chek_Null($this->input->post('member_activity_type'));
    $data['member_activity_type_other']=$this->chek_Null($this->input->post('member_activity_type_other'));
    $data['member_mob']=$this->chek_Null($this->input->post('member_mob'));
    $data['member_smoken']=$this->chek_Null($this->input->post('member_smoken'));
    $data['member_health_type']=$this->chek_Null($this->input->post('member_health_type'));
    $data['member_health_type_other']=$this->chek_Null($this->input->post('member_health_type_other'));
    $data['member_month_money']=$this->chek_Null($this->input->post('member_month_money'));
    $data['member_child_num']=$this->chek_Null($this->input->post('member_child_num'));
    $data['member_home_type']=$this->chek_Null($this->input->post('member_home_type'));
    $data['member_home_other']=$this->chek_Null($this->input->post('member_home_other'));
    $data['member_hij']=$this->chek_Null($this->input->post('member_hij'));
    $data['stage_id_fk']=$this->chek_Null($this->input->post('stage_id_fk'));
    $data['class_id_fk']=$this->chek_Null($this->input->post('class_id_fk'));
    $data['member_omra']=$this->chek_Null($this->input->post('member_omra'));
    $data['member_note']=$this->chek_Null($this->input->post('member_note'));
   // $data['member_birth_card_img']=$file['member_birth_card_img'];
   // $data['member_sechool_img']=$file['member_sechool_img'];
    $data['member_disease_id_fk']=$this->chek_Null( $this->input->post('member_disease_id_fk'));
    $data['member_disability_id_fk']=$this->chek_Null( $this->input->post('member_disability_id_fk'));
    $data['member_dis_date_ar']=$this->chek_Null( $this->input->post('member_dis_date_ar'));
    $data['member_dis_reason']=$this->chek_Null( $this->input->post('member_dis_reason'));
    $data['member_dis_response_status']=$this->chek_Null( $this->input->post('member_dis_response_status'));
    $data['member_dis_status']=$this->chek_Null( $this->input->post('member_dis_status'));

	  $data['categoriey_member']=$this->chek_Null( $this->input->post('categoriey_member'));
        $data['guaranteed_member']=$this->chek_Null( $this->input->post('guaranteed_member'));
        $data['member_dar_markz_id_fk']=$this->chek_Null( $this->input->post('member_dar_markz_id_fk'));
        $data['member_dar_markz_check']=$this->chek_Null( $this->input->post('member_dar_markz_check'));
        $data['member_specialization']=$this->chek_Null( $this->input->post('member_specialization'));

  //$data['halt_elmostafid_member']=$this->chek_Null( $this->input->post('halt_elmostafid_member'));
     $data['persons_status']=$this->chek_Null( $this->input->post('persons_status'));
     $data['halt_elmostafid_member']=$this->chek_Null( $this->input->post('persons_status'));
  
      if($this->chek_Null($file['member_sechool_img']) !="" ){
        $data['member_sechool_img']=$file['member_sechool_img'];  
      }
      if($this->chek_Null($file['member_birth_card_img']) !='' ){
        $data['member_birth_card_img']=$file['member_birth_card_img'];
      }
        if($this->chek_Null($file['member_photo']) !='' ){
           $data['member_photo']=$file['member_photo'];
       }
        
    $data['guaranteed']=$this->chek_Null($this->input->post('guaranteed'));

    $gregorian_date_arr=array($this->input->post('CDay'),$this->input->post('CMonth'),$this->input->post('CYear'));
    $gregorian_date=implode('/',$gregorian_date_arr);

    $hijri_date_arr=array($this->input->post('HDay'),$this->input->post('HMonth'),$this->input->post('HYear'));
    $hijri_date=implode('/',$hijri_date_arr);

    $data['member_birth_date']=$this->chek_Null( $gregorian_date);
    $data['member_birth_date_hijri']=$this->chek_Null($hijri_date);
    $data['member_birth_date_year']=$this->chek_Null($this->input->post('CYear'));
    $data['member_birth_date_hijri_year']=$this->chek_Null($this->input->post('HYear'));
    $data['member_relationship']=$this->chek_Null($this->input->post('member_relationship'));
    $data['member_card_source']=$this->chek_Null($this->input->post('member_card_source'));
    $data['member_study_case']=$this->chek_Null($this->input->post('member_study_case'));
    $data['member_academic_achievement_level']=$this->chek_Null($this->input->post('member_academic_achievement_level'));
    $data['member_person_type']=$this->chek_Null( $this->input->post('member_person_type'));
    $data['member_education_level']=$this->chek_Null( $this->input->post('member_education_level'));
    $data['member_account']=$this->chek_Null( $this->input->post('member_account'));
    $data['member_account_id']=$this->chek_Null( $this->input->post('member_account_id'));
    $data['member_house_check']=$this->chek_Null( $this->input->post('member_house_check'));
    $data['member_house_id_fk']=$this->chek_Null( $this->input->post('member_house_id_fk'));
  
    	  
	   $explode=explode("-",$this->input->post('member_account_id'));
        $data['member_account_id'] =$explode[0];

    //$data['member_account_id']=$this->chek_Null( $this->input->post('member_account_id'));
	  $data['bank_account_num']=$this->chek_Null($this->input->post('bank_num'));
	    
        
        $data['personal_character_id_fk']=$this->chek_Null( $this->input->post('personal_character_id_fk'));
        $data['relation_with_family']=$this->chek_Null( $this->input->post('relation_with_family'));
        $data['education_problems']=$this->chek_Null( $this->input->post('education_problems'));
        $data['courses_details']=$this->chek_Null( $this->input->post('courses_details'));

        
      
      
        $this->db->where('id', $id);
        $this->db->update('f_members',$data);
    }*/
  /*  public  function  insert($file,$mother_national_num_fk){
        $data['mother_national_num_fk']=$mother_national_num_fk;       
        $data['member_full_name']=$this->chek_Null($this->input->post('member_full_name'));
        $data['member_card_type']=$this->chek_Null($this->input->post('member_card_type'));
        $data['member_card_num']=$this->chek_Null($this->input->post('member_card_num'));
        $data['member_nationality']=$this->chek_Null($this->input->post('member_nationality'));
        $data['nationality_other']=$this->chek_Null($this->input->post('nationality_other'));
        $data['school_id_fk']=$this->chek_Null($this->input->post('school_id_fk'));
        $data['education_type']=$this->chek_Null($this->input->post('education_type'));
        $data['school_cost']=$this->chek_Null($this->input->post('school_cost'));

        $data['member_gender']=$this->chek_Null($this->input->post('member_gender'));
        $data['member_job']=$this->chek_Null($this->input->post('member_job'));
        $data['member_job_place']=$this->chek_Null($this->input->post('member_job_place'));
        $data['member_skill']=$this->chek_Null($this->input->post('member_skill'));
        $data['member_email']=$this->chek_Null($this->input->post('member_email'));
        $data['member_status']=$this->chek_Null($this->input->post('member_status'));
        $data['member_distracted_mother']=$this->chek_Null($this->input->post('member_distracted_mother'));
        $data['member_activity_type']=$this->chek_Null($this->input->post('member_activity_type'));   
        $data['member_activity_type_other']=$this->chek_Null($this->input->post('member_activity_type_other'));
        $data['member_mob']=$this->chek_Null($this->input->post('member_mob'));
        $data['member_smoken']=$this->chek_Null($this->input->post('member_smoken'));
        $data['member_health_type']=$this->chek_Null($this->input->post('member_health_type'));
        $data['member_health_type_other']=$this->chek_Null($this->input->post('member_health_type_other'));
        $data['member_month_money']=$this->chek_Null($this->input->post('member_month_money'));
        $data['member_child_num']=$this->chek_Null($this->input->post('member_child_num'));
        $data['member_home_type']=$this->chek_Null($this->input->post('member_home_type'));
        $data['member_home_other']=$this->chek_Null($this->input->post('member_home_other'));
        $data['member_hij']=$this->chek_Null($this->input->post('member_hij'));
        $data['stage_id_fk']=$this->chek_Null($this->input->post('stage_id_fk'));
        $data['class_id_fk']=$this->chek_Null($this->input->post('class_id_fk'));
        $data['member_omra']=$this->chek_Null($this->input->post('member_omra'));
        $data['member_note']=$this->chek_Null($this->input->post('member_note'));
        $data['member_birth_card_img']=$file['member_birth_card_img'];   
        $data['member_sechool_img']=$file['member_sechool_img'];
        
        
        
        

  $data['guaranteed']=$this->chek_Null($this->input->post('guaranteed'));
    $gregorian_date_arr=array($this->input->post('CDay'),$this->input->post('CMonth'),$this->input->post('CYear'));
    $gregorian_date=implode('/',$gregorian_date_arr);

    $hijri_date_arr=array($this->input->post('HDay'),$this->input->post('HMonth'),$this->input->post('HYear'));
    $hijri_date=implode('/',$hijri_date_arr);

    $data['member_birth_date']=$this->chek_Null( $gregorian_date);
    $data['member_birth_date_hijri']=$this->chek_Null($hijri_date);
    $data['member_birth_date_year']=$this->chek_Null($this->input->post('CYear'));
    $data['member_birth_date_hijri_year']=$this->chek_Null($this->input->post('HYear'));
    $data['member_relationship']=$this->chek_Null($this->input->post('member_relationship'));
    $data['member_card_source']=$this->chek_Null($this->input->post('member_card_source'));
    $data['member_study_case']=$this->chek_Null($this->input->post('member_study_case'));
    $data['member_academic_achievement_level']=$this->chek_Null($this->input->post('member_academic_achievement_level'));
    $data['member_person_type']=$this->chek_Null( $this->input->post('member_person_type'));
    $data['member_education_level']=$this->chek_Null( $this->input->post('member_education_level'));
    $data['member_account']=$this->chek_Null( $this->input->post('member_account'));
    $data['member_account_id']=$this->chek_Null( $this->input->post('member_account_id'));
     $data['member_house_check']=$this->chek_Null( $this->input->post('member_house_check'));
    $data['member_house_id_fk']=$this->chek_Null( $this->input->post('member_house_id_fk'));    
    $this->db->insert('f_members',$data);
    }
//----------------------------------------------------------------------
public  function  update_member($id,$file){
    $data['member_full_name']=$this->chek_Null($this->input->post('member_full_name'));
    $data['member_card_type']=$this->chek_Null($this->input->post('member_card_type'));
    $data['member_card_num']=$this->chek_Null($this->input->post('member_card_num'));
    $data['member_nationality']=$this->chek_Null($this->input->post('member_nationality'));
    $data['nationality_other']=$this->chek_Null($this->input->post('nationality_other'));
    $data['school_id_fk']=$this->chek_Null($this->input->post('school_id_fk'));
    $data['education_type']=$this->chek_Null($this->input->post('education_type'));
    $data['school_cost']=$this->chek_Null($this->input->post('school_cost'));
    $data['member_gender']=$this->chek_Null($this->input->post('member_gender'));
    $data['member_job']=$this->chek_Null($this->input->post('member_job'));
    $data['member_job_place']=$this->chek_Null($this->input->post('member_job_place'));
    $data['member_skill']=$this->chek_Null($this->input->post('member_skill'));
    $data['member_email']=$this->chek_Null($this->input->post('member_email'));
    $data['member_status']=$this->chek_Null($this->input->post('member_status'));
    $data['member_distracted_mother']=$this->chek_Null($this->input->post('member_distracted_mother'));
    $data['member_activity_type']=$this->chek_Null($this->input->post('member_activity_type'));
    $data['member_activity_type_other']=$this->chek_Null($this->input->post('member_activity_type_other'));
    $data['member_mob']=$this->chek_Null($this->input->post('member_mob'));
    $data['member_smoken']=$this->chek_Null($this->input->post('member_smoken'));
    $data['member_health_type']=$this->chek_Null($this->input->post('member_health_type'));
    $data['member_health_type_other']=$this->chek_Null($this->input->post('member_health_type_other'));
    $data['member_month_money']=$this->chek_Null($this->input->post('member_month_money'));
    $data['member_child_num']=$this->chek_Null($this->input->post('member_child_num'));
    $data['member_home_type']=$this->chek_Null($this->input->post('member_home_type'));
    $data['member_home_other']=$this->chek_Null($this->input->post('member_home_other'));
    $data['member_hij']=$this->chek_Null($this->input->post('member_hij'));
    $data['stage_id_fk']=$this->chek_Null($this->input->post('stage_id_fk'));
    $data['class_id_fk']=$this->chek_Null($this->input->post('class_id_fk'));
    $data['member_omra']=$this->chek_Null($this->input->post('member_omra'));
    $data['member_note']=$this->chek_Null($this->input->post('member_note'));
    $data['member_birth_card_img']=$file['member_birth_card_img'];
    $data['member_sechool_img']=$file['member_sechool_img'];

      if($this->chek_Null($file['member_birth_card_img']) !="" ){
        $data['member_birth_card_img']=$file['member_birth_card_img'];  
      }
      if($this->chek_Null($file['member_sechool_img']) !='' ){
        $data['member_sechool_img']=$file['member_sechool_img'];
      }
      

 $data['guaranteed']=$this->chek_Null($this->input->post('guaranteed'));

    $gregorian_date_arr=array($this->input->post('CDay'),$this->input->post('CMonth'),$this->input->post('CYear'));
    $gregorian_date=implode('/',$gregorian_date_arr);

    $hijri_date_arr=array($this->input->post('HDay'),$this->input->post('HMonth'),$this->input->post('HYear'));
    $hijri_date=implode('/',$hijri_date_arr);

    $data['member_birth_date']=$this->chek_Null( $gregorian_date);
    $data['member_birth_date_hijri']=$this->chek_Null($hijri_date);
    $data['member_birth_date_year']=$this->chek_Null($this->input->post('CYear'));
    $data['member_birth_date_hijri_year']=$this->chek_Null($this->input->post('HYear'));
    $data['member_relationship']=$this->chek_Null($this->input->post('member_relationship'));
    $data['member_card_source']=$this->chek_Null($this->input->post('member_card_source'));
    $data['member_study_case']=$this->chek_Null($this->input->post('member_study_case'));
    $data['member_academic_achievement_level']=$this->chek_Null($this->input->post('member_academic_achievement_level'));
    $data['member_person_type']=$this->chek_Null( $this->input->post('member_person_type'));
    $data['member_education_level']=$this->chek_Null( $this->input->post('member_education_level'));
    $data['member_account']=$this->chek_Null( $this->input->post('member_account'));
    $data['member_account_id']=$this->chek_Null( $this->input->post('member_account_id'));
      $data['member_house_check']=$this->chek_Null( $this->input->post('member_house_check'));
    $data['member_house_id_fk']=$this->chek_Null( $this->input->post('member_house_id_fk'));
   
      
      
      
        $this->db->where('id', $id);
        $this->db->update('f_members',$data);
    }
    */
//----------------------------------------------------------
 public function get_family_members(){
        $this->db->select('*');
        $this->db->from('f_members');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $query2 =$this->db->query('SELECT * FROM `f_members` WHERE `mother_national_num_fk`='.$row->mother_national_num_fk);
                $arr=array();
                foreach ($query2->result() as  $row2) {
                    $arr[] =$row2;
                }
                $data[$row->mother_national_num_fk]=$arr;
            }
            return $data;
        }
        return false;
    }
//=============================================================================================
   public function get_classroom($from_id_fk){
      $this->db->select('*');
      $this->db->from('classrooms');
      $this->db->where("from_id_fk",$from_id_fk);
      $myquery = $this->db->get();
        $all_resultes = $myquery->result();
    return $all_resultes;
   }




    public function select_all($mother_national_num){
        $this->db->select('*');
        $this->db->from('f_members');
        $this->db->where('mother_national_num_fk',$mother_national_num);
        $query = $this->db->get();
        $a=0;
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$a] = $row;
                if($row->stage_id_fk !=0 && $row->stage_id_fk!=''){
                    $data[$a]->stage_name = $this->get_classroom_name($row->stage_id_fk);
                }
                if($row->class_id_fk !=0 && $row->class_id_fk!=''){
                    $data[$a]->class_name = $this->get_classroom_name($row->class_id_fk);

                }
                
                 $data[$a]->member_person_type_name = $this->get_setting_name($row->member_person_type);  
                $data[$a]->relation_name = $this->get_setting_name($row->member_relationship);  
                $data[$a]->halet_member_name = $this->get_files_status_setting_name($row->persons_status);
                
                 $data[$a]->color=$this->get_color($row->persons_status);
                $data[$a]->reason=$this->get_reason($row->persons_process_reason);
                
                $a++;}
            return $data;
        }else{
            return 0;
        }
    }
    public function get_classroom_name($id){
        $this->db->select('*');
        $this->db->from('classrooms');
        $this->db->where("id",$id);
        $myquery = $this->db->get();
        if ($myquery->num_rows() > 0) {
            $all_resultes = $myquery->result()[0]->name;
            return $all_resultes;
        }
        return false;
    }
    
    
        public function GetAllperson_type($mother_national_num)
    {
        $this->db->select('*');
        $this->db->from('family_setting');
        $this->db->where('type',32);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {

            $i=0;
            foreach ($query->result() as $row) {
             //   $data[$row->id_setting] =$this->GetNum($row->id_setting,$mother_national_num);
             $data[$row->id_setting] =$this->GetNum($row->id_setting,$mother_national_num) + $this->GetNumBymother($row->id_setting,$mother_national_num);

                $i++; }
            return $data;
        }else{
            return 0;
        }
    }
    public function GetNum($id,$mother_national_num){
        $this->db->select('*');
        $this->db->from('f_members');
        $this->db->where_in('member_person_type',$id);
        $this->db->where('mother_national_num_fk',$mother_national_num);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        }else{
            return 0;
        }
    }
    
    public function GetNumBymother($id,$mother_national_num){
    $this->db->select('*');
    $this->db->from('mother');
    $this->db->where_in('person_type',$id);
    $this->db->where('mother_national_num_fk',$mother_national_num);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        return $query->num_rows();
    }else{
        return 0;
    }
}

/*******************************************************/

  public function select_search_key($table,$search_key,$search_key_value){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($search_key,$search_key_value);    
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
           $a=0;
            foreach ($query->result() as $row) {
                 $data[$a] = $row;
               $data[$a]->relation_name = $this->get_setting_name($row->m_relationship);  
          //    $data[$a]->file_status_name = $this->get_files_status_setting_name($row->file_status);
               $data[$a]->father_national_card = $this->get_father_national_card($row->mother_national_num_fk); 
               $data[$a]->person_type_name = $this->get_setting_name($row->person_type); 
               
            $a++;   
            }
            return $data;
        }
        return false;
    }
     public function select_mother_search_key($table,$search_key,$search_key_value){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($search_key,$search_key_value);    
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
           $a=0;
            foreach ($query->result() as $row) {
                 $data[$a] = $row;
               $data[$a]->relation_name = $this->get_setting_name($row->m_relationship);  
          //    $data[$a]->file_status_name = $this->get_files_status_setting_name($row->file_status);
               $data[$a]->father_national_card = $this->get_father_national_card($row->mother_national_num_fk); 
               $data[$a]->person_type_name = $this->get_setting_name($row->person_type); 
                  $data[$a]->reason=$this->get_reason($row->persons_process_reason);
            $a++;   
            }
            return $data;
        }
        return false;
    }




       public  function get_father_national_card($mother_national_num_fk){
    
        $h = $this->db->get_where("father", array('mother_national_num_fk'=>$mother_national_num_fk));
        $arr= $h->row_array();
        return $arr['f_national_id'];

    }
       public  function get_father_name($mother_national_num_fk){
    
        $h = $this->db->get_where("father", array('mother_national_num_fk'=>$mother_national_num_fk));
        $arr= $h->row_array();
        return $arr['full_name'];

    }




        public  function get_setting_name($id_setting){
    
        $h = $this->db->get_where("family_setting", array('id_setting'=>$id_setting));
        $arr= $h->row_array();
        return $arr['title_setting'];

    }
      public  function get_files_status_setting_name($halt_elmostafid_member){
    
        $h = $this->db->get_where("files_status_setting", array('id'=>$halt_elmostafid_member));
        $arr= $h->row_array();
        return $arr['title'];

    }
    
    //------------------------------------
     public function get_member_data($id){
        $this->db->select('f_members.* , family_setting.title_setting as school_title');
        $this->db->from("f_members");
        $this->db->join('family_setting', 'family_setting.id_setting = f_members.school_id_fk',"left");
        $this->db->where("id",$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }

	 public function get_color($id)
    {
        $this->db->select('color');
        $this->db->from('persons_status_setting');
        $this->db->where('id',$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row()->color;

        }else{
            return 0;
        }
    }
public function get_reason($id)
{
    $this->db->select('title');
    $this->db->from('family_reasons_settings');
    $this->db->where('id',$id);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        return $query->row()->title;

    }else{
        return 0;
    }
}    
    
    public function select_last_id(){
        $this->db->select('*');
        $this->db->from("f_members");
        $this->db->order_by("id","DESC");
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row()->id+1;
        }else{
            return 1;
        }

    }
    
    
    
    public function Get_Education_problems($arr){
        $this->db->select('*');
        $this->db->from("f_members_education_problems");
        $this->db->where($arr);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }


    public function change_course_approved(){

        if($_POST['approved'] ==0){

            $data['approved'] =1;

        }elseif($_POST['approved'] ==1){

            $data['approved'] =0;
        }
        $this->db->where('family_member_id_fk',$_POST['mother_num']);
        $this->db->where('course_skill_id_fk',$_POST['id']);
        $this->db->update('f_members_courses_and_skills',$data);

    }

    /****************************ahmed_start**************************/

    public function GetCourses_skills($arr){
        $this->db->select('*');
        $this->db->from("f_members_courses_and_skills");
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
        $this->db->from("f_members_courses_and_skills");
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
/**********************************************/



    public function Getkafalat($id)
    {
        $this->db->select('*');
        $this->db->from('fr_main_kafalat_details');
        $this->db->where('person_id_fk', $id);
        $this->db->order_by('id', 'desc');
        //$this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
      $pay_method_arr =array('إختر',1=>'نقدي',2=>'شيك',3=>'شبكة',4=>'إيداع نقدي'
            ,5=>'إيداع شيك',6=>'تحويل',7=>'أمر مستديم');

            $data = array();
            $i = 0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->kafel_name = $this->get_kafel_name($row->first_kafel_id);
               // $data[$i]->halet_kafel_title = $this->get_halet_kafela($row->first_status)['title'];
              //  $data[$i]->halet_kafel_color = $this->get_halet_kafela($row->first_status)['color'];

                $data[$i]->kafala_name = $this->get_kafela_name($row->kafala_type_fk)['title'];
                $data[$i]->tawred_type = $pay_method_arr[$row->pay_method];
                
      $data[$i]->halat_kafel = $this->get_kafel_name($row->first_kafel_id);
        $data[$i]->halet_kafel_title = $this->get_halet_kafela( $data[$i]->halat_kafel->halat_kafel_id)['title'];
        $data[$i]->halet_kafel_color = $this->get_halet_kafela( $data[$i]->halat_kafel->halat_kafel_id)['color'];

                
                
            }

            return $data;
        } else {
            return false;
        }

    }

    public function get_kafel_name($kafel_id)
    {
       // $this->db->select('k_num,id,k_name');
        $this->db->select('k_num,id,k_name,halat_kafel_id');
        $this->db->where('id', $kafel_id);
        $query = $this->db->get('fr_sponsor');
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return "ط؛ظٹط± ظ…ط­ط¯ط¯ ";
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
    
    /*
        public function Getkafalat_second($id)
    {
        $this->db->select('*');
        $this->db->from('fr_main_kafalat_details');
        $this->db->where('person_id_fk', $id);
        $this->db->where('second_kafel_id!=', 0);
        $this->db->order_by('id', 'desc');
        //$this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $pay_method_arr =array('إختر',1=>'نقدي',2=>'شيك',3=>'شبكة',4=>'إيداع نقدي'
            ,5=>'إيداع شيك',6=>'تحويل',7=>'أمر مستديم');

            $data = array();
            $i = 0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->kafel_name = $this->get_kafel_name($row->second_kafel_id);
                $data[$i]->halet_kafel_title = $this->get_halet_kafela($row->second_status)['title'];
                $data[$i]->halet_kafel_color = $this->get_halet_kafela($row->second_status)['color'];
                $data[$i]->kafala_name = $this->get_kafela_name($row->kafala_type_fk)['title'];
                $data[$i]->tawred_type = $pay_method_arr[$row->pay_method];
            }

            return $data;
        } else {
            return false;
        }

    }*/

    	 public function Getkafalat_second($id)
    {
        $this->db->select('*');
        $this->db->from('fr_main_kafalat_details');
        $this->db->where('person_id_fk', $id);
        $this->db->order_by('id', 'desc');
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $pay_method_arr =array('إختر',1=>'نقدي',2=>'شيك',3=>'شبكة',4=>'إيداع نقدي'
            ,5=>'إيداع شيك',6=>'تحويل',7=>'أمر مستديم');

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

}// END CLASS 