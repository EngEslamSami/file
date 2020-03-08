<?php
class Always_model extends CI_Model
{
    public function __construct()
    {
        parent:: __construct();
    }

    public function all_always()
    {
        $this->db->select('*');
        $this->db->from('always_setting');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }


    public function insert_always()
    {
        $data = $this->input->post('data');
        $this->db->insert('always_setting', $data);
    }

    public function update_always($id)
    {
        $data = $this->input->post('data');
        $this->db->where('id',$id);
        $this->db->update('always_setting',$data);
    }


    public function getById_always($id)
    {
        $this->db->where('id',$id);
       $query =  $this->db->get('always_setting');
        if ($query->num_rows() > 0) {
            return $query->row();
        }
        return false;


    }


    public function delete_always($id)
    {
        $this->db->where('id',$id);
        return $this->db->delete('always_setting');
    }
}