<?php

class Custody_employee_model extends CI_Model
{
    
public function __construct() {

        parent::__construct();

    }
      public function chek_Null($post_value){
        if($post_value == '' || $post_value==null || (!isset($post_value))){
            $val="";
            return $val;
        }else{
            return $post_value;
        }
    }
    
    
    
    	public function getEmpData($empCode)
	{
		return $this->db->where('id',$empCode)->get('employees')->row_array();
	}
    
        public function get_emp_data($emp_id)
    {
        $this->db->select('employees.id,employees.employee')
            ->from('employees')
            ->where('employees.id',$emp_id);
        $query = $this->db->get();
        return $query->row_array();
    }
    

    
     public function get_banks_data(){
        $this->db->select('*');
        $this->db->from("banks_settings");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
           $data=$query->result();$i=0;
            foreach ($query->result() as $row){
               $data[$row->id]= $row;
                $i++;
            }
            return $data;
        }
        return false;
    }
    
    public function getEmpData_exp($emp_id)
    {
        $this->db->select('employees.id,employees.employee');
        $this->db->from("employees");
         $this->db->where('employees.id !=',$emp_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
           $data=$query->result();$i=0;
            foreach ($query->result() as $row){
               $data[$i]= $row;
                $i++;
            }
            return $data;
        }
        return false;
    }
    
    
        public function insert($emp_code){
      $total = count($this->input->post('custody_title'));
       for($x=0;$x<$total;$x++){
           $data['emp_code']=$emp_code;
           $data['custody_id_fk']=$this->chek_Null( $this->input->post('custody_id_fk['.$x.']'));
           $data['custody_title']=$this->chek_Null( $this->input->post('custody_title['.$x.']'));
           $data['num']=$this->chek_Null($this->input->post('num['.$x.']'));
           $data['status']=$this->chek_Null($this->input->post('status['.$x.']'));
           $data['date_recived']=$this->chek_Null($this->input->post('date_recived['.$x.']'));
           $data['transfered']=0;
           $this->db->insert('emp_custody',$data);
        }
      
    
       }
    	public function getAllData($emp_code)
	{
		$query = $this->db->where('emp_code',$emp_code)->get('emp_custody');
		if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
            	$data[] = $row;	
            }
            return $data;
        }
        return false;
	}
    
    public function get_custody()
	{
		$query = $this->db->get('products');
		if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
            	$data[] = $row;	
            }
            return $data;
        }
        return false;
	}
    
    	public function deleteCustody($id)
	{
		$this->db->where('id',$id)->delete('emp_custody');
	}



	public function deleteEmployee($empCode)
	{
     $this->db->where('emp_code',$empCode)->delete('emp_custody');
	
	}
 public function transfer_operation($emp_code){
      
           
           $data['custody_id_fk']=$this->chek_Null($this->input->post('custody_id_fk'));
           $data['from_emp_code']=$this->chek_Null($this->input->post('from_emp_code'));
           $data['to_emp_code']=$this->chek_Null($this->input->post('to_emp_code'));
	       $data['date']			       = strtotime(date("m/d/Y"));
           $data['date_s']				   = time();
           $data['date_ar']			   = date("m/d/Y");
           $data['publisher'] 			   = $_SESSION['user_id'];
           $this->db->insert('emp_custody_transfer_operations',$data);
           $this->update_transfer($this->input->post('custody_id_fk'),$this->input->post('to_emp_code') );
        
      }
   	public function update_transfer($id,$emp_code)
	{  
		$data['transfered'] = 1;
        $data['emp_code']=$emp_code;
        $this->db->where('id',$id);
        $this->db->update('emp_custody',$data);
        
	}
 

}// END CLASS

