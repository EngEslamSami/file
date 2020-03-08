<?php

class Family_members_web extends CI_Model
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

//---------------------------------------------------

    public  function  insert($file,$mother_national_num_fk){
        $data['mother_national_num_fk']=$mother_national_num_fk;       
        $data['member_full_name']=$this->chek_Null($this->input->post('member_full_name').$this->input->post('father_name'));
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
        $data['member_disease_id_fk']=$this->chek_Null( $this->input->post('member_disease_id_fk'));
$data['member_disability_id_fk']=$this->chek_Null( $this->input->post('member_disability_id_fk'));
$data['member_dis_date_ar']=$this->chek_Null( $this->input->post('member_dis_date_ar'));
$data['member_dis_reason']=$this->chek_Null( $this->input->post('member_dis_reason'));
$data['member_dis_response_status']=$this->chek_Null( $this->input->post('member_dis_response_status'));
$data['member_dis_status']=$this->chek_Null( $this->input->post('member_dis_status'));


        
        
        

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
    $data['member_account']=$this->chek_Null( $this->input->post('member_account'));
    $data['member_account_id']=$this->chek_Null( $this->input->post('member_account_id'));
    $data['member_house_check']=$this->chek_Null( $this->input->post('member_house_check'));
    $data['member_house_id_fk']=$this->chek_Null( $this->input->post('member_house_id_fk'));
    /******************************ahmed**********************/
  
      	  $explode=explode("-",$this->input->post('member_account_id'));
        $data['member_account_id'] =$explode[0];

    //$data['member_account_id']=$this->chek_Null( $this->input->post('member_account_id'));
	  $data['bank_account_num']=$this->chek_Null($this->input->post('bank_num'));
	   
        
        
        
        
    $this->db->insert('f_members',$data);
    }
//----------------------------------------------------------------------
public  function  update_member($id,$file){

    $data['member_full_name']=$this->chek_Null($this->input->post('member_full_name').$this->input->post('father_name'));
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
    $data['member_disease_id_fk']=$this->chek_Null( $this->input->post('member_disease_id_fk'));
    $data['member_disability_id_fk']=$this->chek_Null( $this->input->post('member_disability_id_fk'));
    $data['member_dis_date_ar']=$this->chek_Null( $this->input->post('member_dis_date_ar'));
    $data['member_dis_reason']=$this->chek_Null( $this->input->post('member_dis_reason'));
    $data['member_dis_response_status']=$this->chek_Null( $this->input->post('member_dis_response_status'));
    $data['member_dis_status']=$this->chek_Null( $this->input->post('member_dis_status'));


      if($this->chek_Null($file['member_sechool_img']) !="" ){
        $data['member_sechool_img']=$file['member_sechool_img'];  
      }
      if($this->chek_Null($file['member_birth_card_img']) !='' ){
        $data['member_birth_card_img']=$file['member_birth_card_img'];
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
    $data['member_account']=$this->chek_Null( $this->input->post('member_account'));
    $data['member_account_id']=$this->chek_Null( $this->input->post('member_account_id'));
    $data['member_house_check']=$this->chek_Null( $this->input->post('member_house_check'));
    $data['member_house_id_fk']=$this->chek_Null( $this->input->post('member_house_id_fk'));
    /******************************ahmed**********************/
	   $explode=explode("-",$this->input->post('member_account_id'));
        $data['member_account_id'] =$explode[0];
	  $data['bank_account_num']=$this->chek_Null($this->input->post('bank_num'));
	    
      
      
        $this->db->where('id', $id);
        $this->db->update('f_members',$data);
    }

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
        $all_resultes = $myquery->result()[0]->name;
        return $all_resultes;
    }


}// END CLASS 