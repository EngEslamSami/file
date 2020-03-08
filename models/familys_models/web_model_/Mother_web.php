<?php

class Mother_web extends CI_Model
{

    public function __construct()
    {

        parent::__construct();

    }

//---------------------------------------------------
    public function chek_Null($post_value)
    {
        if ($post_value == '' || $post_value == null || (!isset($post_value))) {
            $val = "";
            return $val;
        } else {
            return $post_value;
        }
    }

    public function HijriToJD10($date_in)
    {
        $ex = (explode('/', $date_in));
        $y = (int)$ex[0];
        $m = (int)$ex[1];
        $d = (int)$ex[2];

        return (int)((11 * $y + 3) / 30) + (int)(354 * $y) + (int)(30 * $m) - (int)(($m - 1) / 2) + $d + 1948440 - 385;
    }

    public function HijriToJD10year($date_in)
    {
        $ex = (explode('/', $date_in));
        $y = (int)$ex[0];


        return $y;
    }

    public function HijriToJD10year_2($date_in)
    {
        $ex = (explode('/', $date_in));
        $y = (int)$ex[2];


        return $y;
    }

//---------------------------------------------------


    public function insert($national_mother)
    {

        $data['mother_national_num_fk'] = $national_mother;
        $data['full_name'] = $this->chek_Null($this->input->post('fullname'));


        $gregorian_date_arr = array($this->input->post('CDay'), $this->input->post('CMonth'), $this->input->post('CYear'));
        $gregorian_date = implode('/', $gregorian_date_arr);

        $hijri_date_arr = array($this->input->post('HDay'), $this->input->post('HMonth'), $this->input->post('HYear'));
        $hijri_date = implode('/', $hijri_date_arr);

        $data['m_birth_date'] = $this->chek_Null($gregorian_date);

        $data['m_birth_date_hijri'] = $this->chek_Null($hijri_date);
        $data['m_birth_date_year'] = $this->chek_Null($this->input->post('CYear'));
        $data['m_birth_date_hijri_year'] = $this->chek_Null($this->input->post('HYear'));


        $data['m_nationality'] = $this->chek_Null($this->input->post('m_nationality'));
        $data['nationality_other'] = $this->chek_Null($this->input->post('nationality_other'));


        $data['representative_name'] = $this->chek_Null($this->input->post('representative_name'));
        $data['representative_age'] = $this->chek_Null($this->input->post('representative_age'));
        $data['representative_relative'] = $this->chek_Null($this->input->post('representative_relative'));
        $data['representative_phone'] = $this->chek_Null($this->input->post('representative_phone'));


        $data['m_marital_status_id_fk'] = $this->chek_Null($this->input->post('m_marital_status_id_fk'));
        $data['m_living_place_id_fk'] = $this->chek_Null($this->input->post('m_living_place_id_fk'));
        $data['m_living_place'] = $this->chek_Null($this->input->post('m_living_place'));
        $data['m_national_id'] = $this->chek_Null($this->input->post('m_national_id'));
        $data['m_national_id_type'] = $this->chek_Null($this->input->post('m_national_id_type'));
        $data['m_education_status_id_fk'] = $this->chek_Null($this->input->post('m_education_status_id_fk'));
        $data['m_specialization'] = $this->chek_Null($this->input->post('m_specialization'));
        $data['m_health_status_id_fk'] = $this->chek_Null($this->input->post('m_health_status_id_fk'));

        $data['m_skill_name'] = $this->chek_Null($this->input->post('m_skill_name'));
        $data['m_job_id_fk'] = $this->chek_Null($this->input->post('m_job_id_fk'));
        $data['m_job_other'] = $this->chek_Null($this->input->post('m_job_other'));
        $data['m_monthly_income'] = $this->chek_Null($this->input->post('m_monthly_income'));
        $data['m_education_level_id_fk'] = $this->chek_Null($this->input->post('m_education_level_id_fk'));
        $data['m_education_level_id_fk'] = $this->chek_Null($this->input->post('m_education_level_id_fk'));
        $data['m_female_house_check'] = $this->chek_Null($this->input->post('m_female_house_check'));
        $data['m_female_house_id_fk'] = $this->chek_Null($this->input->post('m_female_house_id_fk'));
        $data['m_hijri'] = $this->chek_Null($this->input->post('m_hijri'));
        $data['m_ommra'] = $this->chek_Null($this->input->post('m_ommra'));
        $data['m_mob'] = $this->chek_Null($this->input->post('m_mob'));
        $data['m_another_mob'] = $this->chek_Null($this->input->post('m_another_mob'));
        $data['m_email'] = $this->chek_Null($this->input->post('m_email'));
        $data['m_want_work'] = $this->chek_Null($this->input->post('m_want_work'));

        /**************ahmed*/
        $data['person_type'] = $this->chek_Null($this->input->post('person_type'));
        $data['m_relationship'] = $this->chek_Null($this->input->post('m_relationship'));
        $data['m_card_source'] = $this->chek_Null($this->input->post('m_card_source'));
        $data['disease_id_fk'] = $this->chek_Null($this->input->post('disease_id_fk'));
        $data['disability_id_fk'] = $this->chek_Null($this->input->post('disability_id_fk'));
        $data['dis_date_ar'] = $this->chek_Null($this->input->post('dis_date_ar'));
        $data['dis_reason'] = $this->chek_Null($this->input->post('dis_reason'));
        $data['dis_response_status'] = $this->chek_Null($this->input->post('dis_response_status'));
        $data['dis_status'] = $this->chek_Null($this->input->post('dis_status'));
        $data['m_place_work'] = $this->chek_Null($this->input->post('m_place_work'));
        $data['m_place_mob'] = $this->chek_Null($this->input->post('m_place_mob'));


        $data['m_account'] = $this->chek_Null($this->input->post('m_account'));
        $data['m_account_id'] = $this->chek_Null($this->input->post('m_account_id'));


        /**************ahmed*/


        if ($this->get_mother_national($national_mother) > 0) {
            $this->db->where('mother_national_num_fk', $national_mother);
            $this->db->update('mother', $data);


        } else {


            $this->db->insert('mother', $data);

        }
    }

    public function get_from_family_setting($type)
    {
        $this->db->where('type', $type);
        return $this->db->get('family_setting')->result();

    }

    public function get_mother_national($national_mother)
    {
        $this->db->where('mother_national_num_fk', $national_mother);
        $query = $this->db->get('mother');
        return $query->num_rows();
    }


    public function get_mother_name()
    {
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
    public function getMotherAccount($mother_num)
    {
        $this->db->select('*');
        $this->db->from("mother");
        $this->db->where("mother_national_num_fk", $mother_num);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->result()[0]->m_account;
            return $data;
        } else {
            return 0;
        }

    }


    public function getFamilyAccount($mother_num)
    {
        $this->db->select('*');
        $this->db->from("f_members");
        $this->db->where("mother_national_num_fk", $mother_num);
        $this->db->where("member_account", 1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return 1;
        } else {
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

    public function getBasicAccount($mother_num)
    {
        $this->db->select('*');
        $this->db->from("basic");
        $this->db->where("mother_national_num", $mother_num);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->result()[0]->person_account;
            return $data;
        } else {
            return 0;
        }

    }

    public function getBasicAccount_agent($mother_num)
    {
        $this->db->select('*');
        $this->db->from("basic");
        $this->db->where("mother_national_num", $mother_num);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->result()[0]->agent_bank_account;
            return $data;
        } else {
            return 0;
        }

    }


    public function get_by_mother_national($mother_num)
    {
        $this->db->where('mother_national_num_fk', $mother_num);
        $query = $this->db->get('mother');
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function get_by_num($num, $type)
    {
        if ($type==0) {
            $this->db->where('mother_national_num', $num);
            $query = $this->db->get('basic');
           echo  $query->num_rows();



        }
        if ($type==1) {
            $this->db->where('mother_mob', $num);
            $query = $this->db->get('basic');
            echo $query->num_rows();



        }
    }
}// END CLASS

