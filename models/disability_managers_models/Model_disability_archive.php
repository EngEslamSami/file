<?php 
   class Model_disability_archive extends CI_Model{
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
    public  function all_peson(){
        $this->db->select('disabilities_persons.*,disabilities_type_settings.title as disability_title');
        $this->db->from("disabilities_persons");
        $this->db->join("disabilities_type_settings","disabilities_type_settings.id=disabilities_persons.disability_type_id_fk","left");
       
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result() ;
        }
        return false;
    }
       //==========================================
       public  function get_one_peson($id){
           $this->db->select('disabilities_persons.*,disabilities_type_settings.title as disability_title');
           $this->db->from("disabilities_persons");
           $this->db->join("disabilities_type_settings","disabilities_type_settings.id=disabilities_persons.disability_type_id_fk","left");
           $this->db->where("disabilities_persons.id",$id);
           $query = $this->db->get();
           if ($query->num_rows() > 0) {
               return $query->result() ;
           }
           return false;
       }
       //==========================================
       public function one_peson_file($id){
        $this->db->select('*');
        $this->db->from("disabilities_persons_files");
        $this->db->where("person_id_fk",$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }
       //==========================================
    public function get_person_device($id){
        $this->db->select('disabilities_device_order.* ,
                           medical_devices.title ,
                           medical_company.title as company_name ');
        $this->db->from("disabilities_device_order");
        $this->db->join("medical_devices","medical_devices.id=disabilities_device_order.device_id_fk","left");
        $this->db->join("medical_company","medical_company.id=disabilities_device_order.medical_company_id_fk","left");
        $this->db->where("disabilities_device_order.person_id_fk",$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result() ;
        }
        return false;
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
        $this->db->update("disabilities_persons",$data);
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
   
    
    
    
  } // END CLASS 
?>