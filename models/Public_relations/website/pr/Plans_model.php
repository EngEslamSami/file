<?php
class Plans_model extends CI_Model
{

    public function display($table)
    {
        $this->db->select('*');
        $this->db->from($table);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;


    }

    public function insert_report($file){
        $data['title'] = $this->input->post('title');
        $data['icon'] = $this->input->post('icon');
        $data['year'] = $this->input->post('year');
        $data['file'] = $file;
        $this->db->insert('pr_plans',$data);
    }

    public function delete($id){
        $this->db->where('id',$id);
        $this->db->delete('pr_plans');
    }

    public function update($id,$file){
        $data['title'] = $this->input->post('title');
        $data['icon'] = $this->input->post('icon');
        $data['year'] = $this->input->post('year');
        if (isset($file)){
            $data['file'] = $file;
        }

        $this->db->where('id',$id);
        $this->db->update('pr_plans',$data);

    }

    public function get_by_id($id){

        $this->db->select('*');
        $this->db->from('pr_plans');
        $this->db->where('id',$id);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        }
        return false;

    }
     public function get_main_plans()
    {
        $this->db->select('*');
        $this->db->from("pr_plans");
        $this->db->order_by('year','desc');
        $this->db->group_by('year');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
           $x=0;
            foreach ($query->result() as $row){
                $data[$x] =$row;
                $data[$x]->details =$this->get_details($row->year);

            $x++;}
            return $data;
        }
        return false;


    }

    public function get_details($year)
    {
        $this->db->select('*');
        $this->db->from('pr_plans');
        $this->db->where('year',$year);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;


    }
    
}