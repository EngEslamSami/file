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
     private function GetHours($test){
     $t = date('H:i',strtotime($test));
     return $t;

     }
    
    //==========================================================
        public function get_emp_data($emp_id)
    {
        $this->db->select('employees.id,employees.employee,employees.emp_code')
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
    //==================================================================================
    public function insert_emp_always_times(){
         $days_en =array("saturday","sunday","monday","tuesday","wednesday","thursday","friday");
        $data['always_id_fk'] = $this->input->post('always_id_fk');
        $data['period_id_fk'] = $this->input->post('period_id_fk');
        $data['emp_id'] = $this->input->post('emp_id');
        
        $data['attend_time'] = $this->GetHours($this->input->post('attend_time'));
        $data['leave_time']  =$this->GetHours( $this->input->post('leave_time'));
        $data['start_enter'] = $this->GetHours($this->input->post('start_enter'));
        $data['end_enter'] = $this->GetHours($this->input->post('end_enter'));
        $data['start_out'] = $this->GetHours($this->input->post('start_out'));
        $data['end_out']   = $this->GetHours($this->input->post('end_out'));
       
        $data['from_date'] = strtotime( $this->input->post('from_date') );
        $data['from_date_ar'] = $this->input->post('from_date');
        $data['to_date'] = strtotime ($this->input->post('to_date') );
        $data['to_date_ar'] = $this->input->post('to_date');
        
        $days =explode(',',$this->input->post('days'));
           foreach ($days as $day){
                if(in_array($day,$days_en)){
                    $data[$day] = 1;
                }
           }
       $this->db->insert('emp_always_times', $data);
    }
    //------------------------------------------------
        public function update_emp_always_times($id){
         $days_en =array("saturday","sunday","monday","tuesday","wednesday","thursday","friday");
       // $data['always_id_fk'] = $this->input->post('always_id_fk');
       // $data['period_id_fk'] = $this->input->post('period_id_fk');
       // $data['emp_id'] = $this->input->post('emp_id');
        
        $data['attend_time'] = $this->GetHours($this->input->post('attend_time'));
        $data['leave_time']  =$this->GetHours( $this->input->post('leave_time'));
        $data['start_enter'] = $this->GetHours($this->input->post('start_enter'));
        $data['end_enter'] = $this->GetHours($this->input->post('end_enter'));
        $data['start_out'] = $this->GetHours($this->input->post('start_out'));
        $data['end_out']   = $this->GetHours($this->input->post('end_out'));
       
        $data['from_date'] = strtotime( $this->input->post('from_date') );
        $data['from_date_ar'] = $this->input->post('from_date');
        $data['to_date'] = strtotime ($this->input->post('to_date') );
        $data['to_date_ar'] = $this->input->post('to_date');
        
        foreach ($days_en as $name){
            $data[$name] =0;
        }
        $days =explode(',',$this->input->post('days_update'));
        foreach ($days as $day){

            if(in_array($day,$days_en)){
                $data[$day] = 1;
            }

        }
        $this->db->where("id",$id);
        $this->db->update('emp_always_times', $data);
    }
    //==================================================================================
    public function get_my_always_times($emp_id){
        $this->db->select('emp_always_times.*,
                           always_setting.id as always_setting_id ,always_setting.name');
        $this->db->from("emp_always_times");
        $this->db->join('always_setting', 'always_setting.id = emp_always_times.always_id_fk','left');
        $this->db->where("emp_id",$emp_id);
        $this->db->group_by('always_id_fk');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $x=0;$data =$query->result();
            foreach ($query->result() as $row) {
                $data[$x]->period_num = $this->get_period_num($row->always_id_fk,$emp_id);
                $x++;
                }
            return $data;
        }
        return false ;
    }
    public function get_period_num($always_id_fk,$emp_id){
        $this->db->select('*');
        $this->db->from("emp_always_times");
        $this->db->where("always_id_fk",$always_id_fk);
        $this->db->where("emp_id",$emp_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } 
        return false ;
    }
    //==================================================================================
     public function get_enp_times($id){
        $h = $this->db->get_where("emp_always_times",array("id"=>$id));
        return $h->row_array();
    }
    //==================================================================================
     public function delete_emp_times($id){
          $this->db->where(array("id"=>$id));
        $this->db->delete("emp_always_times");
    }
    //===================================================================================
    public  function get_last_period_id_fk($emp_id){
        $this->db->select('period_id_fk');
        $this->db->from("emp_always_times");
        $this->db->where("emp_id",$emp_id);
        $this->db->order_by("period_id_fk","DESC");
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data = $row->period_id_fk + 1;
            }
            return $data;
        }
        return 1;
    }



}// END CLASS

?>