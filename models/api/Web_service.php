<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web_service extends CI_Model {

	

  public function count_rows($table,$arr)
    {
         $this->db->where($arr);
         $query = $this->db->get($table);
         return  $query->num_rows();
        
    }
    
    public function insert_data($table,$data_insert)
    {
       $this->db->insert($table,$data_insert); 
    }
    
    public function select_last_Qrcode($table,$returned_field)
    {
        $this->db->order_by('id','desc');
        $query = $this->db->get($table);
        if($query->num_rows()>0)
        {
            return $query->row()->$returned_field;
        }else{
           return false; 
        }
        
    }
    
    public function update_data2($table,$data_update,$last_Qrcode)
    {
        $this->db->where('id',$last_Qrcode);
         $this->db->update($table,$data_update); 
    }
	      public function get_token_by_id2($user_id)
    {
        $this->db->select('token');
        $this->db->where('user_id',$user_id);
        $query=$this->db->get('tokens');
        if($query->num_rows()>0)
        {
             return $query->row()->token;
            
        }else{
            return false;
        }
        
    }
    



}