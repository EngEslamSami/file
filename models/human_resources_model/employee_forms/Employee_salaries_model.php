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
}