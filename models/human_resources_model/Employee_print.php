<?php
class Employee_print extends CI_Model
{
    public function __construct()
    {
        parent:: __construct();
    }
 
      public function get_nationality($id){
        if($id != null){
        $this->db->select('*');
        $this->db->from("employees_settings");
        $this->db->where("id_setting",$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data= $query->result()[0]->title_setting ;
            return $data;
        }else{
            return 0;
        }
}else{
         return 0;  
}
    } 
     
    public function get_banks_settings($id){
        $this->db->select('*');
        $this->db->from("banks_settings");
        $this->db->where("id",$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data= $query->result()[0]->title;
            return $data;
        }else{
            return 0;
        }

    } 
    
      public function select_branch_department()
    {
        $this->db->where('from_id_fk !=',0);
        return $this->db->get('department_jobs')->result();
    }

    public function select_depart()
    {
        $this->db->select('*');
        $this->db->from('department_jobs');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $query2 = $this->db->query('SELECT * FROM `department_jobs` WHERE `from_id_fk`=' . $row->from_id_fk);
                $arr = array();
                foreach ($query2->result() as $row2) {
                    $arr[] = $row2;
                }
                $data[$row->from_id_fk] = $arr;
            }
            return $data;
        }
        return false;
    }
    
 	public function select_sittings($type)
	{
		return $this->db->select('*')
						->where('type',$type)
						->get('prog_main_sitting')
						->result();
	}
 
         public function get_finance_employes($emp_id){
        $this->db->select('*');
        $this->db->from('finance_employes');
        $this->db->where('emp_code',$emp_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    
    
    	public function getEmpBadalat($emp_code)
	{
		$query = $this->db->where('emp_code',$emp_code)->get('emp_badlat_discount_details');
		if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
            	$data[$row->badl_discount_id_fk] = $row;
            }
            return $data;
        }
        return false;
	}

	public function getEmpBank($emp_code)
	{
		return $this->db->select('bank_employes_details.*, banks_settings.bank_code')
						->join('banks_settings','banks_settings.id=bank_employes_details.bank_id_fk')
						->where('emp_code',$emp_code)
						->get('bank_employes_details')
						->result();
	}
    
    
    public function get_contract_employe($emp_id){
        $this->db->select('*');
        $this->db->from('contract_employe');
        $this->db->where('emp_code',$emp_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    
    
  public function get_machine($emp_id){
        $this->db->select('*');
        $this->db->from('period_emp_details');
        $this->db->where('emp_code',$emp_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->printer_machine = $this->get_nationality($row->device_id_fk);
                $i++;
            }
            return $data;
        }
        return false;
    }
    
  public function get_custody($emp_id){
        $this->db->select('*');
        $this->db->from('emp_custody');
        $this->db->where('emp_code',$emp_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $i++;
            }
            return $data;
        }
        return false;
    }  
    
    
  public function get_files_data($emp_id){
        $this->db->select('*');
        $this->db->from('emp_files');
        $this->db->where('emp_code',$emp_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
                 $i=0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $i++;
            }
            return $data;
        }
        return false;
    }  
        
        
    public function employees_all_data($id){
        $this->db->select('*');
        $this->db->from('employees');
        $this->db->where('id',$id);
        $query = $this->db->get();
        $i=0;
        if ($query->num_rows() > 0) {
            foreach($query->result() as $row){
                 $data[$i] = $row;
                 $data[$i]->nationality_name    = $this->get_nationality($row->nationality);
                 $data[$i]->gender              = $this->get_nationality($row->gender);
                  $data[$i]->social_status      = $this->get_nationality($row->status); 
                 $data[$i]->deyana_name         = $this->get_nationality($row->deyana);
                 $data[$i]->banks_settings_name = $this->get_banks_settings($row->bank); 
                 $data[$i]->type_card_name      = $this->get_nationality($row->type_card);
                 $data[$i]->dest_card_name      = $this->get_nationality($row->dest_card); 
                  if($row->administration != null){
                  $data[$i]->has_job      = 1; 
                  }else{
                  $data[$i]->has_job      = 0;   
                  }
                  $data[$i]->degree_qual_name  = $this->get_nationality($row->employee_degree);
                  $data[$i]->qualification_name  = $this->get_nationality($row->employee_qualification);
                  $data[$i]->company_name  = $this->get_nationality($row->tamin_company); 
                  $data[$i]->cat_tamin_name  = $this->get_nationality($row->tamin_type); 
                  $data[$i]->finance_employes = $this->get_finance_employes($row->id);
                 $data[$i]->badlat = $this->getEmpBadalat($row->id);
           	     $data[$i]->Banks = $this->getEmpBank($row->id);
                 $data[$i]->contract_employe = $this->get_contract_employe($row->id);
                 
                 $data[$i]->machine_data = $this->get_machine($row->id);
                 $data[$i]->custody_data = $this->get_custody($row->id);
                 $data[$i]->files_data = $this->get_files_data($row->id); 
                 $i++;
            }
            return $data;
        }else{
            return 0;
        }    
    }
    
        public function select_by(){
        $this->db->select('*');
        $this->db->from('department_jobs');
        $this->db->where('id !=',9);
        $this->db->where('from_id_fk',0);
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
    
    /***********************************************************/
    
   /* public function select_all($emp_id){

    $arr_tables =array('employees','finance_employes','contract_employe','emp_files','emp_always_times','period_emp_details','emp_custody');
    $arr_data =array();
    foreach ($arr_tables as $record){
        $arr_data[$record] =$this->getTable($record,$emp_id);
    }
    return $arr_data;
}*/

   public function select_all($emp_id,$type){

        $arr_tables =array('employees','finance_employes','contract_employe','emp_files','emp_always_times','period_emp_details','emp_custody');
        $arr_data =array();
        foreach ($arr_tables as $record){
            $arr_data[$record] =$this->getTable($record,$emp_id,$type);
        }
        return $arr_data;
    }


/*public function getTable($table,$emp_id){
    $this->db->select('*');
    $this->db->from($table);
    if($table ==='employees'){
        $this->db->where("id",$emp_id);
    }elseif($table ==='emp_always_times'){
        $this->db->where("emp_id",$emp_id);
        $this->db->group_by("always_id_fk");
    }else{
        $this->db->where("emp_code",$emp_id);
    }
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        $a=0;
        foreach ($query->result() as $row) {
            $data[$a] = $row;
            if($table ==='emp_always_times'){
                $data[$a]->name = $this->get_always_name($row->always_id_fk);
                $data[$a]->period_num = $this->get_period_num($row->always_id_fk);
            }
            $a++;}
        if($table ==='emp_always_times' || $table ==='emp_files'){
            return $data;
        }else{
            return $data[0];
        }

    }else{
        return 0;
    }

}*/

    public function getTable($table,$emp_id,$type){
        $this->db->select('*');
        $this->db->from($table);
        if($table ==='employees'){
            $this->db->where("id",$emp_id);
            $this->db->where("emp_type",$type);
        }elseif($table ==='emp_always_times'){
            $this->db->where("emp_id",$emp_id);
            $this->db->group_by("always_id_fk");
        }else{
            $this->db->where("emp_code",$emp_id);
        }
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $a=0;
            foreach ($query->result() as $row) {
                $data[$a] = $row;
                if($table ==='emp_always_times'){
                    $data[$a]->name = $this->get_always_name($row->always_id_fk);
                    $data[$a]->period_num = $this->get_period_num($row->always_id_fk);
                }
                $a++;}
            if($table ==='emp_always_times' || $table ==='emp_files'){
                return $data;
            }else{
                return $data[0];
            }
    
        }else{
            return 0;
        }
    
    }

public function get_always_name($always_id_fk){
    $this->db->select('*');
    $this->db->from("always_setting");
    $this->db->where("id",$always_id_fk);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        return $query->result()[0]->name;
    }else{
        return 0 ;
    }

}




public function get_period_num($always_id_fk){
    $this->db->select('*');
    $this->db->from("emp_always_times");
    $this->db->where("always_id_fk",$always_id_fk);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        return $query->result();
    }
    return false ;
}



public function GetSettings($type){
    $this->db->select('*');
    $this->db->from('employees_settings');
    $this->db->where('type',$type);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[$row->id_setting] = $row->title_setting;
        }
        return $data;
    }
    return false;
}



public function Gethai(){
    $query =  $this->db->get("cities");
    if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[$row->id] = $row->name;
        }
        return $data;
    }else{
        return 0;

    }
}



public function select_emp($id){
    $this->db->where('id',$id);
    $query =  $this->db->get("employees");
    if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        return $data;
    }else{
        return 0;

    }
}
    
    
}
?>