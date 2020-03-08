<?php

class Printer_machin_employee_model extends CI_Model
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
    
        public function get_emp_data($emp_id)
    {
        $this->db->select('employees.id,employees.employee')
            ->from('employees')
            ->where('employees.id',$emp_id);
        $query = $this->db->get();
        return $query->row_array();
    }
    
    

        public function insert(){

      
           $data['emp_code']=$this->chek_Null( $this->input->post('emp_code'));
           $data['device_id_fk']=$this->chek_Null( $this->input->post('device_id_fk'));
           $data['num_in_device']=$this->chek_Null( $this->input->post('num_in_device'));
           $data['period_id_fk']=$this->chek_Null($this->input->post('period_id_fk'));
           $data['from_day']=$this->chek_Null( $this->input->post('from_day'));
           $data['to_day']=$this->chek_Null( $this->input->post('to_day'));
           
           if($this->get_employee($this->input->post('emp_code'))>0){
               $this->db->where('emp_code',$this->input->post('emp_code'));
               $this->db->update('period_emp_details',$data);
           }else{
               $this->db->insert('period_emp_details',$data);
           }
       }
    
    
     public function get_employee($emp_code)
    {
        $this->db->where('emp_code',$emp_code);
        $query=$this->db->get('period_emp_details');
        return $query->num_rows();
}   


  public function get_always_setting(){
        $this->db->select('*');
        $this->db->from('always_setting');  
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    

  public function select_search_key($table,$search_key,$search_key_value){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($search_key,$search_key_value);    
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    
  public function get_field($table){
    $query = $this->db->query("select * from ".$table);
      $field_array = $query->list_fields();
    return $field_array;
  } 
        public function getByArray($table,$arr){
        $h = $this->db->get_where($table,$arr);
        return $h->row_array();
    }
    
}// END CLASS

?>