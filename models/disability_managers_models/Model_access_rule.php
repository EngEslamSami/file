<?php
class Model_access_rule extends CI_Model{
    public function __construct()
    {
        parent:: __construct();
       
    }
      //==========================================
    public function select_employee(){
        $this->db->select('*');
        $this->db->from("employees");
        $this->db->where("administration",3);
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
        public function delete_emp_role($emp_code){
        $this->db->where("emp_code",$emp_code);
        $this->db->delete("permission_persons_files");
    }
   //==========================================
       public function insert_emp_role($emp_code){
       foreach ($this->input->post("roles") as $key=>$value){
           $data["emp_code"]=$emp_code;
           $data["process"]=$value;
           $this->db->insert("permission_persons_files",$data);
       }
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
   //==========================================
    
    
    
    
    }// END CLASS
    ?>