<?php
class Employee_salaries_model extends CI_Model{

public function Employee_date(){
    $this->db->select('employees.* , 
                           all_defined_setting.defined_title as degree_name ,
                           ');
    $this->db->from("employees");
    $this->db->join('all_defined_setting', 'all_defined_setting.defined_id = employees.degree_id',"left");
   // $this->db->join('emp_badlat_discount_details', 'emp_badlat_discount_details.emp_code = employees.id',"left");
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        $data = $query->result();
        $i = 0;
        foreach ($query->result() as $row) {
           $data[$i]= $row;
           $data[$i]->main_salary= $this->get_main_salary($row->id);
           $data[$i]->badlat= $this->check_badl($row->id);
           
            $data[$i]->hour_value = $this->get_id('contract_employe','emp_code',$row->emp_code,'hour_value');
           $data[$i]->overtime_hours = $this->get_overtime($row->emp_code);
           if(!empty($data[$i]->hour_value) && !empty($data[$i]->overtime_hours)){
               $data[$i]->overtime_total =  $data[$i]->hour_value * $data[$i]->overtime_hours;
           } else{
               $data[$i]->overtime_total =0;
           }
            $data[$i]->emp_id = $this->get_id('employees','emp_code',$row->emp_code,'id');
            $data[$i]->ta2men = $this->get_id('finance_employes','emp_code',$row->emp_id,'discut_all_value');

           
           
          // $data[$i]->sum = array_sum()
          // foreach ( $data[$i]->badlat as   )
            $i++;

        }
        return $data;

    }
    return false;
}

public function get_emp_badlat($emp_code){
    $this->db->select('badl_discount_id_fk,value');
    $this->db->where('badl_discount_id_fk !=',9);
    $this->db->where('emp_code',$emp_code);
  //  $this->db->order_by('badl_discount_id_fk','DESC');
    return $this->db->get('emp_badlat_discount_details')->result();
}
public function get_all_badlat(){
    $this->db->where('type',1);
    $this->db->where('id !=',9);
   // $this->db->order_by('id','DESC');
    return $this->db->get('emp_badlat_discount_settings')->result();

}
public function get_main_salary ($id){
    $this->db->where('badl_discount_id_fk',9);
    $this->db->where('emp_code',$id);
    return $this->db->get('emp_badlat_discount_details')->row();
}

public function check_badl($emp_code){
    $this->db->where('type',1);
    $this->db->where('id !=',9);
   // $this->db->order_by('id','DESC');
   $query = $this->db->get('emp_badlat_discount_settings');
   if ($query->num_rows()>0){
       $i=0;
       $value =0;
       $total = 0;
       foreach ($query->result() as $row){
           $data[$i]= $row;
           $data[$i]->value= $value;
           $data[$i]->emp_badl= $this->get_emp_badlat($emp_code);
           foreach ($data[$i]->emp_badl as $badl){
               if ($row->id == $badl->badl_discount_id_fk){
                   $data[$i]->value = $badl->value;
               }

           }
           $total +=  $data[$i]->value;
           $i++;
       }
       $data[0]->total= $total;
      return $data;
      // return $i;
   }
}



 public function get_id($table, $where, $id, $select)
    {
        $h = $this->db->get_where($table, array($where => $id));
        $arr = $h->row_array();
        return $arr[$select];
    }
    public function get_overtime($emp_code){
    $this->db->select('hr_overtime_hours_orders.total_hours');
    $this->db->from('hr_overtime_hours_orders');
    $this->db->join('hr_overtime_hours_details','hr_overtime_hours_details.order_num_fk =hr_overtime_hours_orders.order_num');
    $this->db->where('hr_overtime_hours_orders.emp_code_fk',$emp_code);
    $this->db->where('hr_overtime_hours_orders.suspend',4);
    $this->db->where('hr_overtime_hours_details.bdal_type_fk',0);
    $query = $this->db->get();
    if ($query->num_rows() >0){
        return $query->row()->total_hours;
    } else{
        return 0;
    }

    }


}