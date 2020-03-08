<?php
class System_model extends CI_Model
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
  $data['file_decrypt'] = $decrypt_name; 
        $data['file'] = $file;
        $this->db->insert('pr_system',$data);
    }

    public function delete($id){
        $this->db->where('id',$id);
        $this->db->delete('pr_system');
    }

    public function update($id,$file){
        $data['title'] = $this->input->post('title');
        $data['icon'] = $this->input->post('icon');
        

        if (isset($file)){
            $data['file'] = $file;
             $data['file_decrypt'] = $decrypt_name;
        }

        $this->db->where('id',$id);
        $this->db->update('pr_system',$data);

    }

    public function get_by_id($id){

        $this->db->select('*');
        $this->db->from('pr_system');
        $this->db->where('id',$id);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        }
        return false;

    }
    
    
        public function update_views($id,$field,$value){
      
        $data[$field] = $value;
        $this->db->where('id',$id);
        $this->db->update('pr_system',$data);
    
    }
    public function get_view_num($field,$id){
        $this->db->select($field);
        $this->db->from('pr_system');
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
        $query = $this->db->get('pr_system');
        if ($query->num_rows()>0){
            return $query->row()->file_decrypt ;
        } else{
            return false;
        }
    }
}