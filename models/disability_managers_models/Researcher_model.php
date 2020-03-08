<?php

class Researcher_model extends CI_Model
{
    public function chek_Null($post_value){
        if($post_value == '' || $post_value==null || (!isset($post_value))){
            $val='';
            return $val;
        }else{
            return $post_value;
        }
    }
//-----------------------------------------------------
    public function getPersonData($id){
        $h = $this->db->get_where("disabilities_persons", array('id'=>$id));
        return $h->row_array();
    }
    public function getResearcherData($id){
        $h = $this->db->get_where("reasercher_table", array('person_id_fk'=>$id));
        return $h->row_array();
    }
    
     public function getFamilyData($id){
        $this->db->select('*');
        $this->db->from('family_relationship');
        $this->db->where('person_id_fk',$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }else{
            return 0;
        }
    }
    //-------------------------------------------
    public function getFamilyDataShow($id){
        $this->db->select('family_relationship.* ,
                          relative_relation.title as relative_relation_title  ,
                          scientific_qualification.title as educational_status_title');
        $this->db->from('family_relationship');
       
        $this->db->join("relative_relation","relative_relation.id=family_relationship.relative_relation","left");
        $this->db->join("scientific_qualification","scientific_qualification.id=family_relationship.educational_status","left");
        
        $this->db->where('family_relationship.person_id_fk',$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }else{
            return 0;
        }
    }
    //-----------------------------------------------------
    public function update($id){
    

        foreach ($_POST as $k=>$value){
            if($k !='add'){
            $data[$k] = $this->chek_Null($value);
            }
        }
        $this->db->where('person_id_fk',$id);
        $this->db->update('reasercher_table',$data);
    }
//-----------------------------------------------------//
    public function insert_family_relationship()
    {
        $max = $_POST['max'];
        for ($a = 1; $a <= $max; $a++) {
            $data['person_id_fk'] = $this->chek_Null($this->input->post('person_id_fk'));
            $data['name'] = $this->chek_Null($this->input->post('name' . $a));
            $data['relative_relation'] = $this->chek_Null($this->input->post('relative_relation' . $a));
            $data['date_of_birth'] = $this->chek_Null($this->input->post('date_of_birth' . $a));
            $data['job'] = $this->chek_Null($this->input->post('job' . $a));
            $data['educational_status'] = $this->chek_Null($this->input->post('educational_status' . $a));
            $data['social_status'] = $this->chek_Null($this->input->post('social_status' . $a));
            $data['details'] = $this->chek_Null($this->input->post('details' . $a));
            $this->db->insert('family_relationship', $data);
        }
    }
//-----------------------------------------------------//
    public function delete($id){
        $this->db->where("id",$id);
        $this->db->delete("family_relationship");
    }
    //-----------------------------------------------------//
    public function update_family_relationship($id){
        foreach ($_POST as $k=>$value){
            if($k !='update'){
                $data[$k] = $this->chek_Null($value);
            }
        }

        $this->db->where('id',$id);
        $this->db->update('family_relationship',$data);
    }
    //------------------------------------------------------//
}//END CLASS