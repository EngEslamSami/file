<?php

class Employee extends CI_Model
{
    public function __construct() {

        parent::__construct();

    }
//---------------------------------------------------
    public function chek_Null($post_value){
        if($post_value == '' || $post_value==null || (!isset($post_value))){
            $val='';
            return $val;
        }else{
            return $post_value;
        }
    }

    //====================================================================================

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

    //=======================================================
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

    //===============================================================
       public  function  insert($img_file){
        $data['emp_code']=$this->chek_Null( $this->input->post('emp_code'));
        $data['employee']=$this->chek_Null( $this->input->post('employee'));
        $data['administration']=$this->chek_Null( $this->input->post('administration'));
        $data['department']=$this->chek_Null( $this->input->post('department'));
        $data['birth_date']=$this->chek_Null( strtotime($this->input->post('birth_date')));
        $data['id_num']=$this->chek_Null( $this->input->post('id_num'));
        $data['address']=$this->chek_Null( $this->input->post('address'));
        $data['phone_num']=$this->chek_Null( $this->input->post('phone_num'));
        $data['email']=$this->chek_Null( $this->input->post('email'));
        $data['scientific_qualification']=$this->chek_Null( $this->input->post('scientific_qualification'));
        $data['all_courses']=$this->chek_Null( $this->input->post('all_courses'));
        
       $data['social_status']=$this->chek_Null( $this->input->post('social_status'));
        
        
  /*      $data['employ_drive_condition']=$this->chek_Null( $this->input->post('employ_drive_condition'));
        if($data['employ_drive_condition'] ==1){
            $data['license']=$this->chek_Null( $this->input->post('license'));
      }
*/

$data['employ_drive_condition']=$this->chek_Null( $this->input->post('employ_drive_condition'));
if($data['department'] ==20){
    $data['license']=$this->chek_Null( $this->input->post('license'));
}else{
    $data['license']=0;
}

        
        
        $data['contract']=$this->chek_Null( $this->input->post('contract'));
        $data['salary']=$this->chek_Null( $this->input->post('salary'));
        $data['img']=$img_file ;
          $data['job_attach']=$img_file ;
        $data['group_affairs_id_fk']=$this->chek_Null( $this->input->post('group_affairs_id_fk'));
        $data['past_days']=$this->chek_Null( $this->input->post('past_days'));
        
        $data['b_naql']=$this->chek_Null( $this->input->post('b_naql'));
        $data['b_eshraf']=$this->chek_Null( $this->input->post('b_eshraf'));
        $data['b_amal']=$this->chek_Null( $this->input->post('b_amal'));
        $data['b_etislat']=$this->chek_Null( $this->input->post('b_etislat'));
        $data['k_tamen']=$this->chek_Null( $this->input->post('k_tamen'));
       $data['degree_id']=$this->chek_Null( $this->input->post('degree_id')); 
        
        
        
        
                 
        $data['date'] = strtotime(date("Y/m/d"));
        $data['date_s']=time();
        $this->db->insert('employees',$data);
    }
    //===========================================================
        public  function  update($id,$img_file){
        $data['emp_code']=$this->chek_Null( $this->input->post('emp_code'));
        $data['employee']=$this->chek_Null( $this->input->post('employee'));
        $data['administration']=$this->chek_Null( $this->input->post('administration'));
        $data['department']=$this->chek_Null( $this->input->post('department'));
        $data['birth_date']=$this->chek_Null( strtotime($this->input->post('birth_date')));
        $data['id_num']=$this->chek_Null( $this->input->post('id_num'));
        $data['address']=$this->chek_Null( $this->input->post('address'));
        $data['phone_num']=$this->chek_Null( $this->input->post('phone_num'));
        $data['email']=$this->chek_Null( $this->input->post('email'));
        
        $data['scientific_qualification']=$this->chek_Null( $this->input->post('scientific_qualification'));
        $data['all_courses']=$this->chek_Null( $this->input->post('all_courses'));
        $data['social_status']=$this->chek_Null( $this->input->post('social_status'));
        
       
     /*   $data['employ_drive_condition']=$this->chek_Null( $this->input->post('employ_drive_condition'));
if($data['employ_drive_condition'] ==1){
    $data['license']=$this->chek_Null( $this->input->post('license'));
    
    
}else{
 $data['license']=0;   
}
*/

$data['employ_drive_condition']=$this->chek_Null( $this->input->post('employ_drive_condition'));
if($data['department'] ==20){
    $data['license']=$this->chek_Null( $this->input->post('license'));
}else{
    $data['license']=0;
}

        
        $data['contract']=$this->chek_Null( $this->input->post('contract'));
        $data['salary']=$this->chek_Null( $this->input->post('salary'));
        $data['img']=$img_file ;
        $data['group_affairs_id_fk']=$this->chek_Null( $this->input->post('group_affairs_id_fk'));
        $data['past_days']=$this->chek_Null( $this->input->post('past_days')); 
        $data['b_naql']=$this->chek_Null( $this->input->post('b_naql'));
        $data['b_eshraf']=$this->chek_Null( $this->input->post('b_eshraf'));
        $data['b_amal']=$this->chek_Null( $this->input->post('b_amal'));
        $data['b_etislat']=$this->chek_Null( $this->input->post('b_etislat'));
        $data['k_tamen']=$this->chek_Null( $this->input->post('k_tamen'));
        
        $data['degree_id']=$this->chek_Null( $this->input->post('degree_id')); 
        
        
        
        $this->db->where('id', $id);
        $this->db->update('employees',$data);
    }
    //====================================================================================
      public function select_employ_(){
        $this->db->select('*');
        $this->db->from('employees');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $query2 =$this->db->query('SELECT * FROM `employees` WHERE `emp_code`='.$row->emp_code);
                $arr=array();
                foreach ($query2->result() as  $row2) {
                    $arr[] =$row2;
                }
                $data[$row->emp_code]=$arr;
            }
            return $data;
        }
        return false;
    }
    //============================================================
     public function select_depart_name()
    {
        $this->db->select('*');
        $this->db->from('department_jobs');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $query2 = $this->db->query('SELECT * FROM `department_jobs` WHERE `id`=' . $row->id);
                $arr = array();
                foreach ($query2->result() as $row2) {
                    $arr[] = $row2;
                }
                $data[$row->id] = $arr;
            }
            return $data;
        }
        return false;
    }

    //================================================ start========================
    public function select_depart_sub(){
        $this->db->select('*');
        $this->db->from('employees');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $query2 =$this->db->query('SELECT * FROM `employees` WHERE `emp_code`='.$row->emp_code);
                $arr=array();
                foreach ($query2->result() as  $row2) {
                    $arr[] =$row2;
                }
                $data[$row->emp_code]=$arr;
            }
            return $data;
        }
        return false;
    }

    //======================================================start2
    public function select_employ_name(){
        $this->db->select('*');
        $this->db->from('employees');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $query2 =$this->db->query('SELECT * FROM `employees` WHERE `id`='.$row->id);
                $arr=array();
                foreach ($query2->result() as  $row2) {
                    $arr[] =$row2;
                }
                $data[$row->id]=$arr;
            }
            return $data;
        }
        return false;
    }
    //===========================================================================
    public function select_employ_by_dep(){
        $this->db->select('*');
        $this->db->from('employees');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $query2 =$this->db->query('SELECT * FROM `employees` WHERE `administration`='.$row->administration);
                $arr=array();
                foreach ($query2->result() as  $row2) {
                    $arr[] =$row2;
                }
                $data[$row->administration]=$arr;
            }
            return $data;
        }
        return false;
    }
        //=================================up

    public function select_emp_assigned($dep,$id){
       // var_dump($id);
      //  die;
        $this->db->select('*');
        $this->db->from('employees');
        $this->db->where('administration',$dep);
        $this->db->where('id !=',$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
//===========================================================================
    public function all_emp_details(){
        $this->db->select('*');
        $this->db->from('employees');
       // $this->db->where('deport',0);
        $parent = $this->db->get();
        $categories = $parent->result();
        $i=0;
        foreach($categories as $p_cat){
            $categories[$i]->employees_total_rewards = $this->get_emp_rewards_month($p_cat->id);
            $categories[$i]->employees_total_penalty = $this->get_emp_penalty_month($p_cat->id);
            $i++;
        }
        return $categories;
    }
    //===========================================================================
    public function get_emp_rewards_month($emp_id){
        $this->db->select('*');
        $this->db->from('mon_rewards');
        $this->db->where('emp_id',$emp_id);//mon
        $this->db->where('mon',date("m",time()));//
        $this->db->where('year',date("Y",time()));//
        $this->db->where('deport',0);
        $query = $this->db->get();
        $total=0;
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $total +=$row->value;
            }
            return $total;
        }
        return 0;
    }
    //===========================================================================
    public function get_emp_penalty_month($emp_id){
        $this->db->select('*');
        $this->db->from('penalty');
        $this->db->where('emp_id',$emp_id);//mon
        $this->db->where('mon',date("m",time()));//
        $this->db->where('year',date("Y",time()));//
        $this->db->where('penalty_type',1);
        $this->db->where('deport',0);
        $query = $this->db->get();
        $total=0;
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $total +=$row->value;
            }
            return $total;
        }
        return 0;
    }    
    
    //===========================================================================
    public function update_deport_employee($array_ids){
            $data['deport_month']=date("m",time());
            $data['deport_year']=date("Y",time());
            $this->db->where_in("id",$array_ids);
            $this->db->update("employees",$data);
    }
    //===========================================================================
    public function update_deport_emp_adds($table,$array_ids){
        $data['deport']=1;
        $this->db->where_in("emp_id",$array_ids);
        $this->db->update($table,$data);
    }
    //=============================================================================
    public function insert_deport_employee_salaries($process){
        $data['p_cost']=$this->input->post("value");
        $data['madeen']=$this->input->post("madeen");
        $data['dayen']=$this->input->post("dayen");
        $data['paid_type']=0;
        $data['process']=$process;
        $data['date']=strtotime(date("Y-m-d",time()));
        $data['date_s']=time();//publisher
        $data['pill_num']=time();//publisher
        $data['publisher']=$_SESSION['user_username'];
        $this->db->insert("all_deports",$data);
    }
    //==========================================================================
    public function underot_emp_salaries(){
        $this->db->select('*');
        $this->db->from('employees');
        $this->db->where('deport_month !=',date("m",time()));
        $this->db->where('deport_year !=',date("Y",time()));
        $parent = $this->db->get();
        $categories = $parent->result();
        $i=0;
        foreach($categories as $p_cat){
            $categories[$i]->employees_total_rewards = $this->get_emp_rewards_month($p_cat->id);
            $categories[$i]->employees_total_penalty = $this->get_emp_penalty_month($p_cat->id);
            $i++;
        }
        return $categories;
    }
}// END CLASS 

