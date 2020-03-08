<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class New_pill_model extends CI_Model {

	public function __construct()
    {
        parent:: __construct();
    }


  public function getAll_student()
{
        $this->db->select('*');
        $this->db->from('general_assembley_members');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    
}

  public function get_student_data($student_code)
{
   return $this->db->select('*')
   ->where('student_code',$student_code)
   ->get('new_students')
   ->row_array();
        
    
}
public function Get_student_paid($code)
    {
        $this->db->select('*');
        $this->db->from("new_student_pills");
        $this->db->where("student_code",$code);
        $query = $this->db->get();
        $data=0;
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row){
                $data += $row->paid;
            }
            return $data;
        }else{
            return 0;
        }
    }
    
 
    
        public function insert()
    {
    	$data['member_id_fk'] = $this->input->post('student_code');
        
    	$data['member_fees'] 		   = $this->input->post('total');
    	$data['paid'] 		   = $this->input->post('paid');
    	$data['remain'] 	   = $this->input->post('remain');
        $data['year']          =date("Y");
        $data['month']          =date("m");
             
    	$data['date']		   = strtotime($this->input->post('date'));
    	$data['date_s']		   = time();
    	$data['publisher']	   = $_SESSION['user_id'];
    	$this->db->insert('general_assembley_members_pills',$data);
        
    }
    
   

         public function get_member_fees($id){
        
         $h = $this->db->get_where('general_assembley_members', array('id'=>$id));
         return $h->row_array()['membership_value'];
         
         }
          public function get_member_remain($id){
            $current_year= date("Y");
           
             $this->db->select_sum('paid');
           $this->db->where(array('member_id_fk'=>$id,'year'=>$current_year));
           
           $query=$this->db->get('general_assembley_members_pills');
           if($query->num_rows()>0){
           return  $this->get_member_fees($id)-$query->row()->paid;
           }
           return $this->get_member_fees($id);
            
            }
   
    
 
      
    
    
    
         public function get_student_name($id){
            $this->db->where(array('id'=>$id));
         $h = $this->db->get_where('general_assembley_members');
         return $h->row_array()['name'];
    }
    
    
      public function all_student_pills($id)
    {
      $current_year= date("Y");
        $sql = $this->db->select('general_assembley_members_pills.*')
                        ->from('general_assembley_members_pills')
                        ->where(array('member_id_fk'=>$id,'year'=>$current_year))
                       
                        ->get();
        if ($sql->num_rows() > 0) {
            $i = 0;
            foreach ($sql->result() as $row) {
                $data[$i] = $row;
                 $data[$i]->name =$this->get_student_name($id);
                 $data[$i]->fees =$this->get_member_fees($id);
                
                $i++;
            }
            return $data;
        }
        return false;
    }
     public function delete($id)
    {
    	$this->db->where('id', $id);
	    $this->db->delete('general_assembley_members_pills');
    }
    
    
    public function print_data($id)
    {
        $data=array();
        $x=0;
       $query=$this->db->select('general_assembley_members_pills.*')
	                      ->from('general_assembley_members_pills')
	                      ->where('member_id_fk',$id)
	                      ->get()
	                      ->result();
                          foreach($query as $row){
                            $data[$x]=$row; 
                            $data[$x]->name=$this->get_student_name($row->member_id_fk);
                            $x++;                           
                          }
                          return $data; 
    }
    
    public function get_member_status()
    {
       $query=$this->db->get('general_assembley_members')->result();
       $data=array();
       $x=0;
       foreach($query as $row){
        $data[$x]=$row;
         $data[$x]->debt=$this->get_debt($row->id)['remain'];
          ;
        $x++;
       }
       
       return $data;
       
       }
       
       public function get_debt($id)
       {
         $this->db->where(array('member_id_fk'=>$id));
         $this->db->order_by('id','desc');
         $h = $this->db->get('general_assembley_members_pills');
         if($h->num_rows()>0){
         return $h->row_array();
         }else{
            return 1;
         }
        
       }
       
      
      
         
    

}// end class

