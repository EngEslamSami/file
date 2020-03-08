<?php
class Nabza_model extends CI_Model{
public function insert(){

    $data["title"] = $this->input->post('title');
    $data["sub_title"] = $this->input->post('sub_title');
    $data["details"] = $this->input->post('details');

    $this->db->insert("pr_nabza", $data);
}

    public function display_nabza(){
        $this->db->select('*');
        $this->db->from('pr_nabza');

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }

    public function delete($id){
        $this->db->where('id',$id);
        $this->db->delete('pr_nabza');
    }
    public function get_by_id($id){
        $this->db->where('id',$id);
        $query = $this->db->get('pr_nabza');

        if ($query->num_rows() > 0) {
            return $query->row();
        }
        return false;

    }

    public function update($id){
        $data["title"] = $this->input->post('title');
        $data["sub_title"] = $this->input->post('sub_title');
        $data["details"] = $this->input->post('details');

        $this->db->where('id',$id);
        $this->db->update('pr_nabza',$data);
    }
}