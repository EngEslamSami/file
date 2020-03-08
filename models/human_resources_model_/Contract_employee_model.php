<?php

class Contract_employee_model extends CI_Model
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
        $this->db->select('employees.id,employees.employee,finance_employes.salary')
            ->from('employees')
            ->join('finance_employes',"employees.id=finance_employes.emp_code")
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
    
        public function insert(){

       
           $data['emp_code']=$this->chek_Null( $this->input->post('emp_code'));
           $data['num_days_in_month']=$this->chek_Null( $this->input->post('num_days_in_month'));
           $data['hours_work']=$this->chek_Null( $this->input->post('hours_work'));
           $data['hour_value']=$this->chek_Null($this->input->post('hour_value'));
           $data['work_period_id_fk']=$this->chek_Null( $this->input->post('work_period_id_fk'));
           
           $data['pay_method_id_fk']=$this->chek_Null( $this->input->post('pay_method_id_fk'));
           if($this->input->post('bank_id_fk') !=''){
           $bank=explode('-',$this->input->post('bank_id_fk'));
           $data['bank_id_fk']=$bank[0];
           $data['bank_code']=$bank[1]; 
           }else{
            $data['bank_id_fk']=0; 
            $data['bank_code']=0; 
           }
           $data['bank_account_num']=$this->chek_Null( $this->input->post('bank_account_num'));
           $data['year_vacation_num']=$this->chek_Null( $this->input->post('year_vacation_num'));
           
           $data['year_vacation_period']=$this->chek_Null( $this->input->post('year_vacation_period'));
           $data['casual_vacation_num']=$this->chek_Null( $this->input->post('casual_vacation_num'));
           
           $data['travel_ticket']=$this->chek_Null( $this->input->post('travel_ticket'));
           
           $data['travel_type_fk']=$this->chek_Null( $this->input->post('travel_type_fk'));
           $data['travel_period']=$this->chek_Null( $this->input->post('travel_period'));
           $data['reward_end_work']=$this->chek_Null( $this->input->post('reward_end_work'));

         
       
           if($this->get_employee($this->input->post('emp_code'))>0){
               $this->db->where('emp_code',$this->input->post('emp_code'));
               $this->db->update('contract_employe',$data);


           }else {


               $this->db->insert('contract_employe',$data);

           }
       }
    
    
     public function get_employee($emp_code)
    {
        $this->db->where('emp_code',$emp_code);
        $query=$this->db->get('contract_employe');
        return $query->num_rows();
}   
    
    
}// END CLASS

