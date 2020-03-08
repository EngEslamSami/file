<?php
class Report_model extends CI_Model
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

    public function insert_report($file,$decrypt_name){
        $data['title'] = $this->input->post('title');
        $data['icon'] = $this->input->post('icon');
        $data['year'] = $this->input->post('year');
        $data['file'] = $file;
        $data['file_decrypt'] = $decrypt_name;  
        $this->db->insert('pr_reports',$data);
    }

    public function delete($id){
        $this->db->where('id',$id);
        $this->db->delete('pr_reports');
    }

    public function update($id,$file,$decrypt_name){
        $data['title'] = $this->input->post('title');
        $data['icon'] = $this->input->post('icon');
        $data['year'] = $this->input->post('year');
    if (isset($file)){
        $data['file'] = $file;
        $data['file_decrypt'] = $decrypt_name;
    }

        $this->db->where('id',$id);
        $this->db->update('pr_reports',$data);

    }

    public function get_by_id($id){

        $this->db->select('*');
        $this->db->from('pr_reports');
        $this->db->where('id',$id);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        }
        return false;

    }
    
     public function get_main_reports()
    {
        $this->db->select('*');
        $this->db->from("pr_reports");
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
        $this->db->from('pr_reports');
        $this->db->where('year',$year);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;


    }
    
     public function update_views($id,$field,$value){

        $data[$field] = $value;
        $this->db->where('id',$id);
        $this->db->update('pr_reports',$data);

    }
    public function get_view_num($field,$id){
        $this->db->select($field);
        $this->db->from('pr_reports');
        $this->db->where('id',$id);
        $query = $this->db->get();
        if ($query->num_rows()>0){
            return $query->row()->$field +1 ;
        } else{
            return 1;
        }


    }

    public function get_decrypt_name($id){

        $this->db->where('id',$id);
        $query = $this->db->get('pr_reports');
        if ($query->num_rows()>0){
            return $query->row()->file_decrypt ;
        } else{
            return false;
        }
    }
    
    
    
}