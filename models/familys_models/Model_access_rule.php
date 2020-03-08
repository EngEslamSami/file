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
     //   $this->db->where("administration",3);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
           $data=$query->result();$i=0;
            foreach ($query->result() as $row){
                $data[$i]->per=$this->get_employee_role($row->id);
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
    /*public function get_sesstion_roles($user_role_id,$emp_code){
        if($user_role_id ==1){
            return array(1,2,3,4,5,6);
        }elseif ($user_role_id != 1){
            return  $this->get_employee_role($emp_code);
        }
    }*/
        public function get_sesstion_roles($user_role_id,$emp_code){
        if($user_role_id ==1){
            return array(1,2,3,4,5);
        }elseif ($user_role_id != 1){
            return  $this->get_employee_role($emp_code);
        }
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
        $this->db->select('transformation_process.* ,
                          e_to.employee  as to_employee  , 
                          e_from.employee  as from_employee,
                          user_to_t.user_name  as to_user_name, 
                          user_from_t.user_name as from_user_name');
        $this->db->from('transformation_process');
        $this->db->join('users as user_to_t', 'user_to_t.user_id = transformation_process.to_id',"left");
        $this->db->join('users as user_from_t', 'user_from_t.user_id = transformation_process.from_id',"left");
        $this->db->join('employees as e_to', 'e_to.id = user_to_t.emp_code',"left");
        $this->db->join('employees as e_from', 'e_from.id = user_from_t.emp_code',"left");
        $this->db->where('family_file',$id);
        $this->db->order_by("id","DESC");
        $query = $this->db->get();
       /* if ($query->num_rows() > 0) {
            return $query->result();
        }*/
        if ($query->num_rows() > 0) {
          //  return $query->result();
            $i=0;
            foreach ($query->result() as $row){
                $data[$i]= $row;
                if ($row->role_id_fk_to == 3){
                    $data[$i]->user_name_to = $this->get_user_name('employees',array('id'=>$row->to_id),'employee');
                } elseif ($row->role_id_fk_to == 1){
                    $data[$i]->user_name_to = $this->get_user_name('users',array('user_id'=>$row->to_id),'user_name');
                }
                if ($row->role_id_fk_from == 3){
                    $data[$i]->user_name_from = $this->get_user_name('employees',array('id'=>$row->from_id),'employee');
                } elseif ($row->role_id_fk_from == 1){
                    $data[$i]->user_name_from = $this->get_user_name('users',array('user_id'=>$row->from_id),'user_name');
                }

        
                $i++;
            }
            return $data;
        }
        return false;
    }
    
    
     public function get_user_name($table,$arr,$return){
            $this->db->where($arr);
            $query = $this->db->get($table);
            if ($query->num_rows()>0){
                return $query->row()->$return;
            } else{
                return false;
            }
    }
    
             public function select_operation_2($mother_national_num){

        $this->db->select('*');
        $this->db->from('transformation_process');
        //$this->db->where('suspend',4);
         $this->db->where('family_file',$mother_national_num);
        $this->db->order_by('id','DESC');
        $query = $this->db->get();
        $query_result=$query->result();
        if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query_result as $row) {

                 $query_result[$i]->user_name_from = $this->get_user($row->from_id); 
                 $query_result[$i]->user_name_to = $this->get_user($row->to_id); 
          
                
                $i++;
            }
            return $query_result;
        }
        return false;
    }
    
        public  function get_user($user_id){
      
        $h = $this->db->get_where("users", array('user_id'=>$user_id));
        $arr= $h->row_array();
        return $arr['user_name'];

    }
    
    
    //==========================================
    //==========================================
    public function update_file_state($file_id,$value){
        $data["suspend"]=$value;
        $this->db->where("mother_national_num",$file_id);
        $this->db->update("basic",$data);
    }
    //==========================================
    public function insert_operation($process,$file_id){  // 

        $data['mother_national_num_fk']=$file_id;
        $data['family_file_from']=$_SESSION['role_id_fk'];
        $data['family_file_to']=$this->input->post('family_file_to');
        $data['from_user']=$_SESSION['user_id'];
        if($process ==4){
            $data['to_user']=$_SESSION['user_id'];
            $data['family_file_to']=$_SESSION['role_id_fk'];
        }
        $data['process']=$process;
        $data['reason']=$this->input->post('reason');
        $data['date']=strtotime(date("Y-m-d",time()));
        $data['date_s']=time();
        $data['publisher']=$_SESSION['user_name'];
        $this->db->insert('operation_table',$data);
    }
    /**
     *  ===============================================================================================
     * 
     * 
     * 
     *  */
         //==========================================
    public function insert_emp_operations($emp_id){
        $data['emp_id_fk'] = $emp_id;
        $data['f_add_data']=($this->input->post('roles[2]'))? 1 : 0;
        $data['f_letters']=($this->input->post('roles[3]'))? 1 : 0;
        $data['f_file_status']=($this->input->post('roles[4]'))? 1 : 0;
        $data['f_file_updating']=($this->input->post('roles[5]'))? 1 : 0;
        $data['f_file_follow']=($this->input->post('roles[6]'))? 1 : 0;
        $data['f_file_print']=($this->input->post('roles[7]'))? 1 : 0;
        $data['f_researcher']=($this->input->post('roles[8]'))? 1 : 0;
        $data['f_calender']=($this->input->post('roles[9]'))? 1 : 0;

            $this->db->insert("family_operations_permission",$data);

    }



    public function select_employee_operations(){
        $this->db->select('*');
        $this->db->from("employees");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data=$query->result();$i=0;
            foreach ($query->result() as $row){
                $data[$i]->operations=$this->get_employee_operations($row->id);
                $i++;
            }
            return $data;
        }
        return false;
    }

    //==========================================
    public function get_employee_operations($emp_id){
        $this->db->select('*');
        $this->db->from("family_operations_permission");
        $this->db->where("emp_id_fk",$emp_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->row() as $row){
                $data[]=$row;
            }
            return $data;
        }
        return false;
    }
    //==========================================
    public function delete_emp_operations($emp_id){
        $this->db->where("emp_id_fk",$emp_id);
        $this->db->delete("family_operations_permission");
    }
    //==========================================
  
     
     
    }// END CLASS
    ?>