<?php
class Member_model extends CI_Model
{
    public function insert()
    {
        $data['title']=$this->input->post('type');
        $this->db->insert('members_type',$data);
        
    }
    public function get_all_data()
    {
        return $this->db->get('members_type')->result();
    }
    public function delete($id,$table)
    {
       $this->db->where('id',$id); 
       $this->db->delete($table);
    }
    
    public function get_by_id($id,$table)
    {
        $this->db->where('id',$id); 
        return $this->db->get($table)->row();
    }
    public function update($id)
    {
        $data['title']=$this->input->post('title');
        $this->db->where('id',$id); 
        
        $this->db->update('members_type',$data);
    }
     public function insert_table()
    {
        $data['type']=$this->input->post('main_type');
        $data['content']=$this->input->post('content');
        
        
        $this->db->insert('member_type_conten',$data);
        
    }
    public function update_content($id)
    {
        $data['title']=$this->input->post('title');
        $this->db->where('id',$id); 
        
        $this->db->update('member_type_conten',$data);
    }
    public function get_all_from_content()
    {
       $query=$this->db->get('member_type_conten')->result();  
       $data=array();
       $x=0;
       foreach($query as $row){
        $data[$x]=$row;
        $data[$x]->name=$this->get_name($row->type);
        $x++;
       }
       return $data ;
    }
      public function get_name($id)
    {
    $this->db->where('id',$id); 
    $query=$this->db->get('members_type');
        if($query->num_rows()>0)
        {
            return  $query->row()->title;
        }else{
            return 0;
        }
    }
    public function get_all()
    {
      $query=$this->db->get('members_type')->result(); 
      $data=array();
       $x=0;
       foreach($query as $row){
        $data[$x]=$row;
        $data[$x]->content=$this->get_content($row->id);
        $x++;
       }
       return $data ;   
    }
    public function get_content($id)
    {
    $this->db->where('type',$id); 
   $query= $this->db->get('member_type_conten');
    if($query->num_rows()>0)
    {
     return  $query->row()->content;  
    }else{
        return 0;
    }
    }
    //================================================
     public function check_data()
    {
        $id=$this->input->post('member');
        $this->db->where('type',$id);
        $query= $this->db->get('member_type_conten');
       return $query->num_rows();
    }

    
    
    
    
    }// END CLASS 


?>