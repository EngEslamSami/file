<?php
class Definition extends CI_Model{
    public function __construct(){
        parent:: __construct();
    }
    //==========================================
    public function get_sesstion_roles($user_role_id,$emp_code){
        if($user_role_id ==1){
            return array(1,2,3,4);
        }elseif ($user_role_id !=1){
           return  $this->get_employee_role($emp_code);
        }

    }
    //==========================================
    public function select_employee(){
        $this->db->select('*');
        $this->db->from("employees");
       // $this->db->where("administration",1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
           $data=$query->result();$i=0;
            foreach ($query->result() as $row){
                $data[$i]->per=$this->get_employee_role($row->emp_code);
                $i++;
            }
            return $data;
        }
        return false;
    }
    //==========================================
    public function get_employee_role($emp_cod){
        $this->db->select('*');
        $this->db->from("permission_persons_files");
        $this->db->where("emp_code",$emp_cod);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row){
                $data[]=$row->process;
            }
            return $data;
        }
        return false;
    }
    
    
     public function getById_employees($id){
        $h = $this->db->get_where('employees', array('id'=>$id));
        return $h->row_array();
    }

       public function insert_member(){
       
        $data['employees_id_fk']=$this->input->post('employees_id_fk');
        $data['national_num']=$this->input->post('national_num');
        $data['salary']=$this->input->post('salary');
        $data['manager']=$this->input->post('manager');
        $data['work_date']=$this->input->post('work_date');
        
        $data['date'] = strtotime(date("m/d/Y"));
        $data['date_ar'] = date("m/d/Y");
        $data['date_s'] = time();
        $data['publisher'] = $_SESSION['user_username'];
        $this->db->insert('employees_defined',$data);

    }
    
        public function select_define(){
        $this->db->select('*');
        $this->db->from("employees_defined");
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
    
        public function all_emp(){
        $this->db->select('*');
        $this->db->from("employees");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row){
                $data[$row->id]=$row->employee;
            }
            return $data;
        }
        return false;
    }
    
   public function department_jobs(){
        $this->db->select('*');
        $this->db->from("department_jobs");
        $this->db->where("from_id_fk != ",0);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row){
                $data[$row->id]=$row->name;
            }
            return $data;
        }
        return false;
    }
    
     public function update($id){
        $data['employees_id_fk']=$this->input->post('employees_id_fk');
        $data['national_num']=$this->input->post('national_num');
        $data['salary']=$this->input->post('salary');
        $data['manager']=$this->input->post('manager');
        $data['work_date']=$this->input->post('work_date');
       $this->db->where('id', $id);

        if($this->db->update('employees_defined',$data)) {
            return true;
        }else{
            return false;
        }


    }   
    
     public function delete($id){
        $this->db->where('id',$id);
        $this->db->delete('employees_defined');

    }
    
    
        public function insert_release(){
       
        $data['employees_id_fk']=$this->input->post('employees_id_fk');
        $data['national_num']=$this->input->post('national_num');
        $data['job_name']=$this->input->post('job_name');
        $data['release_date']=$this->input->post('release_date');
        $data['adminstrative_status']=$this->input->post('adminstrative_status');
        
        $data['adminstrative_type'] =$this->input->post('adminstrative_type'); 
        $data['adminstrative_manage'] = $this->input->post('adminstrative_manage'); 
        $data['finance_status'] = $this->input->post('finance_status'); 
        $data['finance_type'] = $this->input->post('finance_type');
        $data['finance_manage'] = $this->input->post('finance_manage'); 
        $data['manage'] = $this->input->post('manage');  
        $this->db->insert('release_form',$data);

    }
    
    
    
    
            public function select_release(){
        $this->db->select('*');
        $this->db->from("release_form");
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
    
    
         public function delete_release($id){
        $this->db->where('id',$id);
        $this->db->delete('release_form');

    }
    
    
    public function update_release($id){
        $data['employees_id_fk']=$this->input->post('employees_id_fk');
        $data['national_num']=$this->input->post('national_num');
        $data['job_name']=$this->input->post('job_name');
        $data['release_date']=$this->input->post('release_date');
        $data['adminstrative_status']=$this->input->post('adminstrative_status');
        
        $data['adminstrative_type'] =$this->input->post('adminstrative_type'); 
        $data['adminstrative_manage'] = $this->input->post('adminstrative_manage'); 
        $data['finance_status'] = $this->input->post('finance_status'); 
        $data['finance_type'] = $this->input->post('finance_type');
        $data['finance_manage'] = $this->input->post('finance_manage'); 
        $data['manage'] = $this->input->post('manage'); 
       $this->db->where('id', $id);

        if($this->db->update('release_form',$data)) {
            return true;
        }else{
            return false;
        }


    }
    
    
    
       public function printemp($id)
    {
        return  $this->db->select('employees_defined.*')
	                      ->from('employees_defined')
	                      ->where('employees_defined.id', $id)
	                      ->get()
	                      ->row_array();
    }
    
    
   public function printer_release($id)
    {
        return  $this->db->select('release_form.*')
	                      ->from('release_form')
	                      ->where('release_form.id', $id)
	                      ->get()
	                      ->row_array();
    }
    }