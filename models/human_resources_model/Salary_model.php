<?php
class Salary_model extends CI_Model
{
    public function __construct()
    {
        parent:: __construct();
    }

    public function all_salaries()
    {
        $this->db->select('*');
        $this->db->from('salary_doors');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }


    public function insert_salary()
    {
            $data = $this->input->post('data');
            $this->db->insert('salary_doors', $data);


    }

    public function update_salary($id)
    {
        $data = $this->input->post('data');
        $this->db->where('id',$id);
        $this->db->update('salary_doors',$data);
    }


    public function getById_salary($id)
    {
        $this->db->where('id',$id);
       $query =  $this->db->get('salary_doors');
        if ($query->num_rows() > 0) {

            return $query->row();
        }
        return false;


    }


    public function delete_salary($id)
    {
        $this->db->where('id',$id);
        return $this->db->delete('salary_doors');
    }
}