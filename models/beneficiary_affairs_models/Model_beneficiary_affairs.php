<?php
class Model_beneficiary_affairs extends CI_Model{
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
    public function insert_emp_role($emp_code){
       foreach ($this->input->post("roles") as $key=>$value){
           $data["emp_code"]=$emp_code;
           $data["process"]=$value;
           $this->db->insert("permission_persons_files",$data);
       }
    }
   //==========================================
   /* public function update_emp_role(){

    }*/
   //==========================================
    public function delete_emp_role($emp_code){
        $this->db->where("emp_code",$emp_code);
        $this->db->delete("permission_persons_files");
    }
   //==========================================
    public function all_convent($form_id){
        $this->db->select('*');
        $this->db->from("department_jobs");
        $this->db->where("from_id_fk",$form_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }
   //==========================================
    public function insert_operation($process,$file_id){  // 

        $data['mother_national_num_fk']=$file_id;
        $data['family_file_from']=$_SESSION['role_id_fk'];
        $data['family_file_to']=$this->input->post('family_file_to');
        $data['from_user']=$_SESSION['user_id'];
       // $data['to_user']=$this->input->post('to_user');
        if($process ==4){
            $data['to_user']=$_SESSION['user_id'];
        }
        $data['process']=$process;
        $data['reason']=$this->input->post('reason');
        $data['date']=strtotime(date("Y-m-d",time()));
        $data['date_s']=time();
        $data['publisher']=$_SESSION['user_name'];

        $this->db->insert('operation_table',$data);
    }
   //==========================================
    public function update_file_state($file_id,$value){
        $data["person_file_state"]=$value;
        $this->db->where("id",$file_id);
        $this->db->update("persons_files",$data);
    }
   //==========================================
    public function select_operation($id){
        $this->db->select('*');
        $this->db->from('operation_table');
        $this->db->where('mother_national_num_fk',$id);
        $this->db->order_by("id","DESC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }
   //==========================================
    public function jobs_id(){
        $this->db->select("*");
        $this->db->from('department_jobs');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->id] = $row;
            }
            return $data;
        }
        return false;
    }
   //==========================================













}//END CLASS


