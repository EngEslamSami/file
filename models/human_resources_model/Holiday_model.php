<?php
class Holiday_model extends CI_Model
{
    public function __construct()
    {
        parent:: __construct();
    }

    public function all_holidays()
    {
        $this->db->select('*');
        $this->db->from('holiday_setting');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }
 public function insert_date()
    {
            $data = $this->input->post('data');
            $id=$this->input->post('set');
            $this->db->where('id',$id);
            $this->db->update('holiday_setting',$data);


    }


    public function insert_holiday()
    {
            $data = $this->input->post('data');
            $this->db->insert('holiday_setting', $data);


    }

    public function update_holiday($id)
    {
        $data = $this->input->post('data');
        $this->db->where('id',$id);
        $this->db->update('holiday_setting',$data);
    }


    public function getById_holiday($id)
    {
        $this->db->where('id',$id);
       $query =  $this->db->get('holiday_setting');
        if ($query->num_rows() > 0) {

            return $query->row();
        }
        return false;


    }


    public function delete_holiday($id)
    {
        $this->db->where('id',$id);
        return $this->db->delete('holiday_setting');
    }
}