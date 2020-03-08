<?php

class Wakel_model extends CI_Model
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

 public function insert($national_mother,$file)
    {


//gender

        $data['mother_national_num_fk'] = $national_mother;
        $data['relationship_id_fk'] = $this->chek_Null($this->input->post('relationship_id_fk'));
        $data['w_name'] = $this->chek_Null($this->input->post('w_name'));
        $data['w_mob'] = $this->chek_Null($this->input->post('w_mob'));
        $data['w_national_id_type'] = $this->chek_Null($this->input->post('w_national_id_type'));
        $data['w_card_source'] = $this->chek_Null($this->input->post('w_card_source'));
        $data['w_national_id'] = $this->chek_Null($this->input->post('w_national_id'));
        $data['w_birth_date'] = $this->chek_Null($this->input->post('w_birth_date'));
        $data['w_birth_date_hijri'] = $this->chek_Null($this->input->post('w_birth_date_hijri'));
        $data['w_birth_date_hijri_year'] = $this->chek_Null($this->input->post('w_birth_date_hijri_year'));
        $data['w_birth_date_year'] = $this->chek_Null($this->input->post('w_birth_date_year'));
        $data['w_job_id_fk'] = $this->chek_Null($this->input->post('w_job_id_fk'));
        $data['w_want_work'] = $this->input->post('w_want_work');
        $data['w_marital_status_id_fk'] = $this->chek_Null($this->input->post('w_marital_status_id_fk'));
        $data['employer'] = $this->chek_Null($this->input->post('employer'));
        $data['job_place'] = $this->chek_Null($this->input->post('job_place'));
        $data['job_mob'] = $this->chek_Null($this->input->post('job_mob'));
        $data['salary'] = $this->chek_Null($this->input->post('salary'));
        $data['guaranted'] = $this->chek_Null($this->input->post('guaranted'));
        $data['persons_num'] = $this->chek_Null($this->input->post('persons_num'));

        $gregorian_date_arr = array($this->input->post('CDay'), $this->input->post('CMonth'), $this->input->post('CYear'));
        $gregorian_date = implode('/', $gregorian_date_arr);

        $hijri_date_arr = array($this->input->post('HDay'), $this->input->post('HMonth'), $this->input->post('HYear'));
        $hijri_date = implode('/', $hijri_date_arr);

        $data['w_birth_date'] = $this->chek_Null($gregorian_date);

        $data['w_birth_date_hijri'] = $this->chek_Null($hijri_date);
        $data['w_birth_date_year'] = $this->chek_Null($this->input->post('CYear'));
        $data['w_birth_date_hijri_year'] = $this->chek_Null($this->input->post('HYear'));

        if(!empty($file)){
            $data['w_national_img'] = $file;
        }

        if ($this->get_wakel_national($national_mother) > 0) {
            $this->db->where('mother_national_num_fk', $national_mother);
            $this->db->update('wakels', $data);

        } else {


            $this->db->insert('wakels', $data);

        }
    }


/*
    public function insert($national_mother,$file)
    {


//gender

        $data['mother_national_num_fk'] = $national_mother;
        $data['relationship_id_fk'] = $this->chek_Null($this->input->post('relationship_id_fk'));
        $data['w_name'] = $this->chek_Null($this->input->post('w_name'));
        $data['w_mob'] = $this->chek_Null($this->input->post('w_mob'));
        $data['w_national_id_type'] = $this->chek_Null($this->input->post('w_national_id_type'));
        $data['w_card_source'] = $this->chek_Null($this->input->post('w_card_source'));
        $data['w_national_id'] = $this->chek_Null($this->input->post('w_national_id'));
        $data['w_birth_date'] = $this->chek_Null($this->input->post('w_birth_date'));
        $data['w_birth_date_hijri'] = $this->chek_Null($this->input->post('w_birth_date_hijri'));
        $data['w_birth_date_hijri_year'] = $this->chek_Null($this->input->post('w_birth_date_hijri_year'));
        $data['w_birth_date_year'] = $this->chek_Null($this->input->post('w_birth_date_year'));
        $data['job'] = $this->chek_Null($this->input->post('job'));
        $data['w_want_work'] = $this->chek_Null($this->input->post('w_want_work'));
        $data['w_marital_status_id_fk'] = $this->chek_Null($this->input->post('w_marital_status_id_fk'));
        $data['employer'] = $this->chek_Null($this->input->post('employer'));
        $data['job_place'] = $this->chek_Null($this->input->post('job_place'));
        $data['job_mob'] = $this->chek_Null($this->input->post('job_mob'));
        $data['salary'] = $this->chek_Null($this->input->post('salary'));
        $data['guaranted'] = $this->chek_Null($this->input->post('guaranted'));
        $data['persons_num'] = $this->chek_Null($this->input->post('persons_num'));

        $gregorian_date_arr = array($this->input->post('CDay'), $this->input->post('CMonth'), $this->input->post('CYear'));
        $gregorian_date = implode('/', $gregorian_date_arr);

        $hijri_date_arr = array($this->input->post('HDay'), $this->input->post('HMonth'), $this->input->post('HYear'));
        $hijri_date = implode('/', $hijri_date_arr);

        $data['w_birth_date'] = $this->chek_Null($gregorian_date);

        $data['w_birth_date_hijri'] = $this->chek_Null($hijri_date);
        $data['w_birth_date_year'] = $this->chek_Null($this->input->post('CYear'));
        $data['w_birth_date_hijri_year'] = $this->chek_Null($this->input->post('HYear'));
        if(!empty($file)){
            $data['w_national_img'] = $file;
        }

        if ($this->get_wakel_national($national_mother) > 0) {
            $this->db->where('mother_national_num_fk', $national_mother);
            $this->db->update('wakels', $data);

        } else {


            $this->db->insert('wakels', $data);

        }
    }*/

    //=======================================================================
    public function get_from_family_setting($type)
    {
        $this->db->where('type', $type);
        return $this->db->get('family_setting')->result();

    }

    public function get_wakel_national($national_mother)
    {
        $this->db->where('mother_national_num_fk', $national_mother);
        $query = $this->db->get('wakels');
        return $query->num_rows();
    }

    public function get_data($national_mother)
    {
        $this->db->where('mother_national_num_fk', $national_mother);
        $query = $this->db->get('wakels');
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return 0;
        }

    }


public function get_father_data($national_mother)
{
    $this->db->where('mother_national_num_fk', $national_mother);
    $query = $this->db->get('father');
    if($query->num_rows() > 0){
        return $query->result();
    }else{
        return 0;
    }
}


public  function DeleteImage($id){
    $this->db->where('id', $id);
    $data['w_national_img'] ='';
    $this->db->update('wakels', $data);

}

}// END CLASS

