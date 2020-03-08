<?php

class Files_employee_model extends CI_Model
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
    
        public function insert($emp_code,$files){
      $total =$this->input->post('number');
   
       for($x=0;$x<$total;$x++){
           $data['emp_code']=$emp_code;
           $data['title']=$this->chek_Null( $this->input->post('title['.$x.']'));
           $data['emp_file']=$files[$x];
           $data['have_date']=$this->chek_Null($this->input->post('commited['.$x.']'));
           $data['from_date']=$this->chek_Null( $this->input->post('date_from['.$x.']'));
           $data['to_date']=$this->chek_Null($this->input->post('date_to['.$x.']'));
           $this->db->insert('emp_files',$data);
        }
      
    
       }
    	public function getAllData($emp_code)
	{
		$query = $this->db->where('emp_code',$emp_code)->get('emp_files');
		if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
            	$data[] = $row;	
            }
            return $data;
        }
        return false;
	}
    
  
    
    	public function deletefileEmp($id)
	{
		$this->db->where('id',$id)->delete('emp_files');
	}



	public function deleteEmployee($empCode)
	{
     $this->db->where('emp_code',$empCode)->delete('emp_files');
	
	}

}// END CLASS

