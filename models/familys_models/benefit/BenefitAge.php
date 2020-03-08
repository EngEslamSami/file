<?php

class BenefitAge extends CI_Model
{
    public function __construct()
    {

        parent::__construct();
        $this->table ='family_ages_setting';
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



    public function get_tasnefat(){
        $this->db->select('*');
        $this->db->from($this->table);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }
    
    public function get_categories(){
        $this->db->select('*');
        $this->db->from('family_category');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }





    public function getByType($type){
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('tasnef',$type);
        $query = $this->db->get();
        $data = array();
        if ($query->num_rows() > 0) {
            $data = $query->result();$x =0;

            foreach ($query->result() as $row){
                  $data[$x]->info = $row;
                  $data[$x]->count = $query->num_rows();
           $x++; }
            return $data;
        }
        return false;
    }
public function getByTypeGender($type,$gender){
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('tasnef',$type);
        $this->db->where('gender_fk',$gender);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->result();
            return $data;
        }
        return false;
    }





    public function insert_benefit()
    {
       $tasnef = $this->input->post('tasnef');

        for($i = 0; $i < count($tasnef); $i++){
            $j = $i+1;
            $data['tasnef']=$tasnef[$i];

            $data['gender_fk']=$this->input->post('gender_fk')[$i];
            $data['from_age']=$this->input->post('from_age')[$i];
            $data['to_age']=$this->input->post('to_age')[$i];
            $data['cat_details']=json_encode($this->input->post("cat_details$j"));
            $this->db->insert($this->table,$data);
        }
    }


    public function update_benefit($id )
    {
        $data['tasnef']=$this->input->post('tasnef');
        $data['gender_fk']=$this->input->post('gender_fk');
        $data['from_age']=$this->input->post('from_age');
        $data['to_age']=$this->input->post('to_age');
        $data['cat_details']=json_encode($this->input->post("cat_details"));


        $this->db->where('id',$id);
        $this->db->update($this->table,$data);


    }

    public function delete_benefitById($id)
    {
        $this->db->where('id',$id);
        $this->db->delete($this->table);
    }

    public function delete_benefit()
    {
        $this->db->empty_table($this->table);
    }




}

?>