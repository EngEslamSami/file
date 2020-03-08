<?php
class Membering_model extends CI_Model{

    public function insert(){


                $data["title"] = $this->input->post('title');
                $data["details"] = $this->input->post('details');

                $this->db->insert("pr_membering", $data);

    }

    public function display_membring(){
        $this->db->select('*');
        $this->db->from('pr_membering');


        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }

    public function delete($id){
        $this->db->where('id',$id);
        $this->db->delete('pr_membering');
    }
    public function get_by_id($id){
        $this->db->where('id',$id);
        $query = $this->db->get('pr_membering');

        if ($query->num_rows() > 0) {
            return $query->row();
        }
        return false;

    }

    public function update($id){

        $data["title"] = $this->input->post('title');
        $data["details"] = $this->input->post('details');

        $this->db->where('id',$id);
        $this->db->update('pr_membering',$data);
    }

}