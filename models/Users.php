<?php

class Users extends CI_Model

{

    public function __construct() {

        parent::__construct();

    }
  public function chek_Null($post_value){
        if($post_value == '' || $post_value==null || (!isset($post_value))){
            $val='';
            return $val;
        }else{
            return $post_value;
        }
    }

//---------------------------------------------
  /*  public function check_user_data(){

        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('users.user_username',$this->input->post('user_name'));
        $this->db->where('users.user_pass',sha1(md5($this->input->post('user_pass'))));
        $this->db->join('department_jobs', 'users.role_id_fk = department_jobs.id');
        $query=$this->db->get();
        if($query->num_rows()>0){
            return $query->row_array();
        }else{
            return false;
        }
    }*/
      public function check_user_data(){

        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('users.user_username',$this->input->post('user_name'));
        $this->db->where('users.user_pass',sha1(md5($this->input->post('user_pass'))));
        $this->db->join('department_jobs', 'users.role_id_fk = department_jobs.id');
        $query=$this->db->get();
        if($query->num_rows()>0){
            $data = $query->row_array();
            if($data['role_id_fk'] == 1 or $data['role_id_fk'] == 5)
            {
                $name = $data['user_username'];
                $image= '';
            }
            elseif($data['role_id_fk'] == 2)
            {
                $name = $this->get_user_name_member($data['user_name']);
                $image= '';
            }
            elseif($data['role_id_fk'] == 3)
            {
                $name = $this->get_emp_name($data['emp_code']);
                $image = $this->get_emp_name_image($data['emp_code']);

            }
            elseif($data['role_id_fk'] == 4)
            {
                $name = $this->name_general_assembley($data['user_name']);
                $image = $this->name_general_assembley_image($data['user_name']);

            }
            $data['user_login_name']= $name;
            $data['user_login_image']= $image;
            return $data;
        }else{
            return false;
        }
    }
    
//----------------------------------------------
   public function insert(){
  
     $user_rol=explode("-",$this->chek_Null($this->input->post('role_id_fk')));
     
         $data['user_name']=$this->chek_Null($this->input->post('user_name')) ;
         $data['user_username']=$this->chek_Null($this->input->post('user_name'));
   
            $password=$this->input->post('user_pass',true);
            $password=sha1(md5($password));
         $data['emp_code']=$this->input->post('emp_code');   
         $data['user_pass'] = $password;
         $data['role_id_fk'] =$user_rol[0]; 
         $data['dep_job_id_fk'] =$user_rol[1];
         
      /*   $data['user_email'] = $this->input->post('mother_national_num');
         $data['user_phone'] =strtotime(date("Y-m-d",time()));
         $data['user_photo']= time();
        */ 
       $this->db->insert('users',$data);

    }
//-----------------------------------------------
   public function update($id){
  
       $user_rol=explode("-",$this->chek_Null($this->input->post('role_id_fk')));
       
         $data['user_name']=$this->chek_Null($this->input->post('user_name'));
         $data['user_username']=$this->chek_Null($this->input->post('user_name'));
   
         if($this->input->post('user_pass')!=''){
               $password=$this->input->post('user_pass',true);
            $password=sha1(md5($password));
         $data['emp_code']=$this->input->post('emp_code');   
         $data['user_pass'] = $password;
         }
         $data['role_id_fk'] =$user_rol[0]; 
         $data['dep_job_id_fk'] =$user_rol[1];
      /* $data['user_email'] = $this->input->post('mother_national_num');
         $data['user_phone'] =strtotime(date("Y-m-d",time()));
         $data['user_photo']= time();
        */ 
       $this->db->where('user_id',$id); 
       $this->db->update('users',$data);

    }
//-----------------------------------------------
    public function getById($id){
        $h = $this->db->get_where('users', array('user_id'=>$id));
        return $h->row_array();
    }  
//-------------------------------------------
  public function select_by_rol_id(){
    
    $this->db->select("*");
    $this->db->from("users");
    $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row->role_id_fk;
            }
            return $data;
        }
        return false;
  }
//------------------------------------------ 
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
//----------------------------------------
  public function getBy($id){
        $h = $this->db->get_where('department_jobs', array('id'=>$id));
        return $h->row_array();
    }  
//---------------------------------    
public function update_last_login($id){
     
     $data['last_login']=time();
       $this->db->where('user_id',$id); 
       $this->db->update('users',$data);
    
}


public function insert_action_log($user_id,$status){
    
    
    $main_data['status_op']  = $status;
    $main_data['user_id']    = $user_id;
    $main_data['user_name']  = $this->getUserName($user_id);
    $main_data['date'] 	  	 = time();
    $main_data['date_ar'] 	 = date('Y-m-d');
    $main_data['time'] 	  	 = date("h:i:sa");

   $this->db->insert('all_actions_users_log', $main_data);
}


/*******************************/

    public function name_general_assembley($user_id)
    {
        $this->db->select('*');
        $this->db->where("id",$user_id);
        $query=$this->db->get('general_assembley_members');
        if ($query->num_rows() > 0) {
            $data = $query->row();
            return  $data->name;
        }
        return false;

    }

 public function name_general_assembley_image($user_id)
    {
        $this->db->select('*');
        $this->db->where("id",$user_id);
        $query=$this->db->get('general_assembley_members');
        if ($query->num_rows() > 0) {
            $data = $query->row();
            return  $data->member_img;
        }
        return false;

    }

    public  function get_emp_name($id){

        $h = $this->db->get_where("employees", array('id'=>$id));
        $arr= $h->row_array();
        return $arr['employee'];

    }
    public  function get_emp_name_image($id){

        $h = $this->db->get_where("employees", array('id'=>$id));
        $arr= $h->row_array();
        return $arr['personal_photo'];

    }




    public function get_user_name_member($user_id)
    {
        $this->db->select('*');
        $this->db->where("id",$user_id);
        $query=$this->db->get('magls_members_table');
        if ($query->num_rows() > 0) {
            $data = $query->row();
            return  $data->member_name;
        }
        return false;

    }
/*************************************************************/

	public function CheckUser()
	{
		$role =$_SESSION['role_id_fk'] ;
		$role_arr =array(1=>"users",2=>"magls_members_table",3=>"employees",4=>"general_assembley_members",5=>"users");
		$this->db->select('*');
		$this->db->from($role_arr[$role]);
		if($role ==1){
		$this->db->where("user_id",$_SESSION['user_id']);
		}else{
			$this->db->where("id",$_SESSION['emp_code']);
		}
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
				if($role ==1){
					$data =$_SESSION['user_name'];
				}elseif($role ==2){

					$data =$query->result()[0]->member_name;
				}elseif ($role ==3){
					$data =$query->result()[0]->employee;
				}elseif ($role ==4) {
					$data = $query->result()[0]->general_assembley_members_name;
				}
			return$data;

		}else{
			return 0;
		}
	}


    public function getUserName($user_id)
    {
        $sql = $this->db->where("user_id",$user_id)->get('users');
        if ($sql->num_rows() > 0) {
            $data = $sql->row();
            if($data->role_id_fk == 1 or $data->role_id_fk == 5)
            {
                return  $data->user_username;
            }
            elseif($data->role_id_fk == 2)
            {
                $id    = $data->user_name;
                $table = 'magls_members_table';
                $field = 'member_name';
            }
            elseif($data->role_id_fk == 3)
            {
                $id    = $data->emp_code;
                $table = 'employees';
                $field = 'employee';
            }
            elseif($data->role_id_fk == 4)
            {
                $id    = $data->user_name;
                $table = 'general_assembley_members';
                $field = 'name';
            }
            return $this->getUserNameByRoll($id,$table,$field);
        }
        return false;

    }

    public function getUserNameByRoll($id,$table,$field)
    {
        return $this->db->where('id',$id)->get($table)->row_array()[$field];
    }

  public function update_log()
    {
        $data2['is_logged']=0;
        $this->db->where('user_id',$_SESSION['user_id']);
        $this->db->update('users',$data2);
    }

}// END CLASS 