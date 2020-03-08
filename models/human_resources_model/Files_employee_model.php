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
    
      /*  public function insert($emp_code,$files){
      $total = count($this->input->post('title'));
   
       for($x=0;$x<$total;$x++){
           $data['emp_code']=$emp_code;
           $data['title']=$this->chek_Null( $this->input->post('title['.$x.']'));
           $data['emp_file']=$files[$x];
           $data['have_date']=$this->chek_Null($this->input->post('commited['.$x.']'));
           $data['from_date']=$this->chek_Null( $this->input->post('date_from['.$x.']'));
           $data['to_date']=$this->chek_Null($this->input->post('date_to['.$x.']'));
           $this->db->insert('emp_files',$data);
        }
      
    
       }*/
       
         public function insert($emp_code,$files){
            $data['emp_code']=$emp_code;
            $data['title']=$this->chek_Null( $this->input->post('title'));
            $data['emp_file']=$files;
            $data['have_date']=$this->chek_Null($this->input->post('commited'));
            $data['from_date']=$this->chek_Null( $this->input->post('date_from'));
            $data['from_date_h']=$this->chek_Null( $this->input->post('from_date_h'));
            $data['to_date']=$this->chek_Null($this->input->post('date_to'));
            $data['to_date_h']=$this->chek_Null($this->input->post('to_date_h'));

            $data['tanbih_fk']=$this->chek_Null($this->input->post('tanbih_fk'));
            $data['period']=$this->chek_Null($this->input->post('period'));
           $this->db->insert('emp_files',$data);
      
    
       }
       
         public function add_morfqat(){

    	    $data['type']= 16;
            $data['title_setting']= ($this->input->post('title'));
        $this->db->insert('employees_settings',$data);
    }
    
    public function delete_files($id)
    {
        $this->db->where('id',$id)->delete('emp_files');

    }
    /*	public function getAllData($emp_code)
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
    
  */
    	public function getAllData($emp_code)
	{
		$query = $this->db->where('emp_code',$emp_code)->get('emp_files');
		if ($query->num_rows() > 0) {
		    $i =0;
            foreach ($query->result() as $row) {
            	$data[$i] = $row;
            	$data[$i]->title_name = $this->get_id("employees_settings",'id_setting',$row->title,"title_setting");;
            
            	$i++;

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
    
    
      public function get_id($table,$where,$id,$select){
        $h = $this->db->get_where($table, array($where=>$id));
        $arr= $h->row_array();
        return $arr[$select];
    }

}// END CLASS

