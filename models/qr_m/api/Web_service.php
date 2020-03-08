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
    
    
    public function get_lat_long($table,$field)
    {
       return $this->db->get($table)->row()->$field;
    }
    
    public function get_dawam($tim,$dwam)
    {
        if(isset($dwam)&& !empty($dwam))
        {
           $this->db->where_in('id',$dwam);  
        }
       $this->db->where('attend_time <=',$tim); 
        $this->db->where('leave_time >=',$tim); 
       $query=$this->db->get('always_setting');
        if($query->num_rows()>0)
        {
             return $query->row()->id;
            
        }else{
            return false;
        }
    }
    
    
    public function check_dwam($hdoor_date,$day_hdoor,$emp_id)
{
    $days_en =array("","monday","tuesday","wednesday","thursday","friday","saturday","sunday");
    $this->db->select('always_id_fk');
    $q=$this->db->where('from_date <=',$hdoor_date)->where('to_date >=',$hdoor_date)
        ->where('emp_id',$emp_id)->where($days_en[$day_hdoor],1)->get('emp_always_times');
    if ($q->num_rows() > 0) {
       $data=array();
       $x=0;
       foreach($q->result() as $row)
       {
        $data[]=$row;
        $x++;
       }
       return $data;
    }
    else{
        return false;
    }

}

//================================

   public function get_code_site($code)
   {
     $this->db->where('code',$code); 
     $query=$this->db->get('qrcode_alatheer_projects');
     if($query->num_rows()>0)
     {
        return $query->row();
     }else{
        return false;
     }
   }
   
   public function get_all($table)
   
   {
    return $this->db->get($table)->result();
   }
   
   public function get_by_id($table,$id)
   {
    $this->db->where('id',$id);
    $query=$this->db->get($table);
    if($query->num_rows()>0)
    {
        return $query->row();
    }else{
        return false;
    }
    
   }
   
   
public function update_data($table,$data_insert,$id)
{
     $this->db->where('id',$id);
     $this->db->update($table,$data_insert);
}

public function delete_record($id,$table)
{
      $this->db->where('id',$id);
     $this->db->delete($table);
}
//======================================

public function get_rows($arr,$table)
{
    $this->db->where($arr);
    $query=$this->db->get($table);
    return $query->num_rows();
}



  public function get_emp_dawam($id)
  {
    $this->db->where('emp_id',$id);
    $query=$this->db->get('emp_always_times');
    if($query->num_rows()>0)
    {
        return $query->row()->id;
    }else{
        return false;
    }
    
    }
    
    public function update_data_arr($table,$data_insert,$arr)
{
     $this->db->where($arr);
     $this->db->update($table,$data_insert);
}
    
   
   
    



}