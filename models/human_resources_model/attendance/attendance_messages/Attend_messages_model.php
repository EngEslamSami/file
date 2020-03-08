<?php
class Attend_messages_model extends CI_Model
{
    public function __construct() {
        parent::__construct();
    }

   

    public function get_id($table,$where,$id,$select){
        $h = $this->db->get_where($table, array($where=>$id));
        $arr= $h->row_array();
        return $arr[$select];
    }
    

    
    
    public function get_table($table,$arr){
        if (!empty($arr)){
            $this->db->where($arr);
        }
        $q = $this->db->get($table)->result();
        // if ($query->num_rows()>0){
        //     return $query->result();
        // } else{
        //     return false;
        // }

        if (!empty($q)) {
            foreach ($q as $key => $row) {
                if($row->role_id_fk ==3)
                {
                    $q[$key]->emp = $this->get_all_emp($row->emp_code);
                }
                elseif($row->role_id_fk ==2)
                {
                    $q[$key]->emp = $this->get_all($row->emp_code,'md_all_magls_edara_members');
                }
                elseif($row->role_id_fk ==4)
                {
                    $q[$key]->emp = $this->get_all($row->emp_code,'md_all_gam3ia_omomia_members');
                }
                elseif($row->role_id_fk ==5)
                {
                    $q[$key]->emp = $this->get_all($row->emp_code,'volunteers');
                }
              //  $q[$key]->job_title = $this->get_job_title($row->degree_id);
            }
            return $q;
        }
    }
    public function get_all($id,$tabel)
    {
        $this->db->where('id',$id);
        $q = $this->db->get($tabel)->result();
        if (!empty($q)) {
           
            return $q;
        }
    }
    public function get_all_emp($id)
          {
              $this->db->where_not_in('id',$id);
              $q = $this->db->get('employees')->result();
              if (!empty($q)) {
                  foreach ($q as $key => $row) {
                      $q[$key]->edara = $this->get_edara_name_or_qsm($row->administration);
                      $q[$key]->qsm = $this->get_edara_name_or_qsm($row->department);
                      $q[$key]->job_title = $this->get_job_title($row->degree_id);
                  }
                  return $q;
              }
          }
          public function get_edara_name_or_qsm($id)
{
    $this->db->where('id', $id);
    $query = $this->db->get('department_jobs');
    if ($query->num_rows() > 0) {
        return $query->row()->name;
    } else {
        return false;
    }
}
public function get_job_title($id)
{

    $this->db->where('defined_id', $id);
    $query = $this->db->get('all_defined_setting');
    if ($query->num_rows() > 0) {
        return $query->row()->defined_title;
    } else {
        return false;
    }
}

    public function get_departments(){
        $this->db->where('from_id_fk !=',0);
        $query = $this->db->get('department_jobs');
        if ($query->num_rows()>0){
            $i =0;
            foreach ($query->result() as $row){
                $data[$i]= $row;
                $data[$i]->edara = $this->get_edara($row->from_id_fk);
                $data[$i]->emp = $this->get_emp($row->id);
                $i++;

            }
            return $data;
        }
    }

    public function get_edara($from_id){
        $this->db->where('id',$from_id);
        return $this->db->get('department_jobs')->row()->name;

    }
    public function get_emp($from_id){
        $this->db->where('department',$from_id);
        return $this->db->get('employees')->row();

    }
    

    public function select_last_email()
        {
            
                $this->db->select('id');
                $this->db->order_by('id','desc');
                $query=$this->db->get('hr_attend_msg');
                if($query->num_rows()>0)
                {
                    return $query->row()->id + 1;
                }else{
                    return 1;
                }
            
              
        }
        public function select_employees($edara,$qsm)
        {
            $this->db->where('administration',$edara);
            $this->db->where('department',$qsm);
            $q = $this->db->get('employees')->result();
            if (!empty($q)) {
               
                return $q;
            }
        }

    public function insert()
    {
      
        if($_SESSION['role_id_fk']==1){

            $data['from_user_id']=$_SESSION['user_id'];
           // $data['	from_user_name']=$_SESSION['user_name'];;
        }
        else if ($_SESSION['role_id_fk']==2){
            $data['from_user_id'] = $this->get_id("magls_members_table",'id',$_SESSION['emp_code'],"id");
          //  $data['	from_user_name'] = $this->get_id("magls_members_table",'id',$_SESSION['emp_code'],"member_name");
    
        }
        else if ($_SESSION['role_id_fk']==3){
            $data['from_user_id'] = $this->get_id("employees",'id',$_SESSION['emp_code'],"id");
          //  $data['	from_user_name'] = $this->get_id("employees",'id',$_SESSION['emp_code'],"employee");
        }
        else if ($_SESSION['role_id_fk']==4){
            $data['from_user_id'] = $this->get_id("general_assembley_members",'id',$_SESSION['emp_code'],"id");
         //   $data['	from_user_name'] = $this->get_id("general_assembley_members",'id',$_SESSION['emp_code'],"name");
        }
  
  $data['msg_rkm']=$this->select_last_email();
 
  $data['msg_type']=$this->input->post('msg_type');
  $data['to_edara_id']=$this->input->post('to_edara_id');
  //$data['to_edara_name']=$this->input->post('to_edara_name');
  $data['to_qsm_id']=$this->input->post('to_qsm_id');
  //$data['to_qsm_name']=$this->input->post('to_qsm_name');
  $data['start_time']=$this->input->post('start_time');
  $data['moda']=$this->input->post('moda');
  $x=$this->input->post('start_time');
  $minutes_to_add = $this->input->post('moda');
  $time = new DateTime($x);
  $time->add(new DateInterval('PT' . $minutes_to_add . 'M'));
  $stamp = $time->format('Y-m-d H:i');          
  $data['end_time']=$stamp;
  
             $data['content']=$this->input->post('content');
  
  
     $data['date']= strtotime(date("Y-m-d"));
     $data['date_ar'] = date('Y-m-d H:i:s');
     //////////////////////////////

  $users=$this->select_employees($this->input->post('to_edara_id'),$this->input->post('to_qsm_id'));



     

   if(   $users!=null)
   {
    foreach ($users as $key => $row) {
        $data['to_user_id'] = $row->id;
       // $data['to_user_name'] = $row->employee;
        $data['to_user_emp_code'] = $row->emp_code;
       
$this->db->insert('hr_attend_msg',$data);
    }
    
}


        
        
      
    }
    public function update($id)
    {
      
        if($_SESSION['role_id_fk']==1){

            $data['from_user_id']=$_SESSION['user_id'];
           // $data['	from_user_name']=$_SESSION['user_name'];;
        }
        else if ($_SESSION['role_id_fk']==2){
            $data['from_user_id'] = $this->get_id("magls_members_table",'id',$_SESSION['emp_code'],"id");
          //  $data['	from_user_name'] = $this->get_id("magls_members_table",'id',$_SESSION['emp_code'],"member_name");
    
        }
        else if ($_SESSION['role_id_fk']==3){
            $data['from_user_id'] = $this->get_id("employees",'id',$_SESSION['emp_code'],"id");
          //  $data['	from_user_name'] = $this->get_id("employees",'id',$_SESSION['emp_code'],"employee");
        }
        else if ($_SESSION['role_id_fk']==4){
            $data['from_user_id'] = $this->get_id("general_assembley_members",'id',$_SESSION['emp_code'],"id");
           // $data['	from_user_name'] = $this->get_id("general_assembley_members",'id',$_SESSION['emp_code'],"name");
        }
  
 
 

$data['start_time']=$this->input->post('start_time');
$data['moda']=$this->input->post('moda');
$x=$this->input->post('start_time');
               $minutes_to_add = $this->input->post('moda');
               $time = new DateTime($x);
               $time->add(new DateInterval('PT' . $minutes_to_add . 'M'));
               $stamp = $time->format('Y-m-d H:i');          
               $data['end_time']=$stamp;

           $data['content']=$this->input->post('content');


  

   

$this->db->where('id',$id)->update('hr_attend_msg',$data);

        
        
      
    }
    public function insert_emp()
        {
          
            if($_SESSION['role_id_fk']==1){

                $data['from_user_id']=$_SESSION['user_id'];
                //$data['	from_user_name']=$_SESSION['user_name'];;
            }
            else if ($_SESSION['role_id_fk']==2){
                $data['from_user_id'] = $this->get_id("magls_members_table",'id',$_SESSION['emp_code'],"id");
              //  $data['	from_user_name'] = $this->get_id("magls_members_table",'id',$_SESSION['emp_code'],"member_name");
        
            }
            else if ($_SESSION['role_id_fk']==3){
                $data['from_user_id'] = $this->get_id("employees",'id',$_SESSION['emp_code'],"id");
             //   $data['	from_user_name'] = $this->get_id("employees",'id',$_SESSION['emp_code'],"employee");
            }
            else if ($_SESSION['role_id_fk']==4){
                $data['from_user_id'] = $this->get_id("general_assembley_members",'id',$_SESSION['emp_code'],"id");
               // $data['	from_user_name'] = $this->get_id("general_assembley_members",'id',$_SESSION['emp_code'],"name");
            }
            $data['msg_rkm']=$this->select_last_email();
 
            $data['msg_type']=$this->input->post('msg_type');
               $data['content']=$this->input->post('content');
               $data['start_time']=$this->input->post('start_time');
               $data['moda']=$this->input->post('moda');
               $x=$this->input->post('start_time');
               $minutes_to_add = $this->input->post('moda');
               $time = new DateTime($x);
               $time->add(new DateInterval('PT' . $minutes_to_add . 'M'));
               $stamp = $time->format('Y-m-d H:i');          
               $data['end_time']=$stamp;

       $data['date']= strtotime(date("Y-m-d"));
       $data['date_ar'] = date('Y-m-d H:i:s');
    




       $x= $this->input->post('to_user_id');
      // $y=$this->input->post('to_user_name');
       $c=$this->input->post('emp_code');
       $a= $this->input->post('to_edara_id');
      // $b=$this->input->post('to_edara_name');
       $aa= $this->input->post('to_qsm_id');
       //$bb=$this->input->post('to_qsm_name');
      
       if(   $x!=null)
       {
        
       for($i=0;$i<sizeof($x);$i++)
{
   
    
   $data['to_user_id'] = $x[$i];
  // $data['to_user_name'] = $y[$i];
   $data['to_user_emp_code'] = $c[$i];
   $data['to_edara_id'] = $a[$i];
  // $data['to_edara_name'] = $b[$i];

   $data['to_qsm_id'] = $aa[$i];
  // $data['to_qsm_name'] = $bb[$i];

   $this->db->insert('hr_attend_msg',$data);
}}
        }

public function update_emp($id)
        {
          
            if($_SESSION['role_id_fk']==1){

                $data['from_user_id']=$_SESSION['user_id'];
               // $data['	from_user_name']=$_SESSION['user_name'];;
            }
            else if ($_SESSION['role_id_fk']==2){
                $data['from_user_id'] = $this->get_id("magls_members_table",'id',$_SESSION['emp_code'],"id");
               // $data['	from_user_name'] = $this->get_id("magls_members_table",'id',$_SESSION['emp_code'],"member_name");
        
            }
            else if ($_SESSION['role_id_fk']==3){
                $data['from_user_id'] = $this->get_id("employees",'id',$_SESSION['emp_code'],"id");
               // $data['	from_user_name'] = $this->get_id("employees",'id',$_SESSION['emp_code'],"employee");
            }
            else if ($_SESSION['role_id_fk']==4){
                $data['from_user_id'] = $this->get_id("general_assembley_members",'id',$_SESSION['emp_code'],"id");
                //$data['	from_user_name'] = $this->get_id("general_assembley_members",'id',$_SESSION['emp_code'],"name");
            }
     
 
           
               $data['content']=$this->input->post('content');
               $data['start_time']=$this->input->post('start_time');
               $data['moda']=$this->input->post('moda');
               $x=$this->input->post('start_time');
               $minutes_to_add = $this->input->post('moda');
               $time = new DateTime($x);
               $time->add(new DateInterval('PT' . $minutes_to_add . 'M'));
               $stamp = $time->format('Y-m-d H:i');          
               $data['end_time']=$stamp;

     
    


   $this->db->where('id',$id)->update('hr_attend_msg',$data);

            
            
          
        }
        public function select_all_my_mseeage($type)
        {
            $this->db->select('*');
            $this->db->from('hr_attend_msg');
            $query = $this->db->where('deleted',0)->where('msg_type',$type)->get()->result();
            return $query;

        }
        public function make_deleted($id)
        {

            $data['deleted'] = 1;
            $this->db->where('id',$id)->update('hr_attend_msg',$data);
        }
        public function get_message_by_id($id)
        {
            $this->db->select('*');
            $this->db->from('hr_attend_msg');
            $query = $this->db->where('id',$id)->get()->row();
            return $query;


        }
//yara

public function get_all_edara(){
    $this->db->where('from_id_fk',0);
    $query = $this->db->get('department_jobs')->result();
   
       
        return $query;
    
}

public function get_all_edara_by_id()
{
    $x = $this->input->post('edara');
    $y = $this->input->post('qsm');
    $z=$this->input->post('emp');
    if (!empty($x) ) {
    $this->db->where_in('administration', $x);
    }
    if (!empty($y) ) {
    $this->db->where_in('department', $y);
    }
    if (!empty($z) ) {
        $this->db->where_in('id', $z);
    }

    $q = $this->db->get('employees')->result();
    if (!empty($q)) {
        foreach ($q as $key => $row) {
            $q[$key]->edara = $this->get_edara_name_or_qsm($row->administration);
            $q[$key]->qsm = $this->get_edara_name_or_qsm($row->department);
         
        }
        return $q;
    }
}

public function get_all_qsm(){
    $edara_id =  $this->input->post('edara_id');
    $this->db->where_in('from_id_fk',$edara_id);
    $query = $this->db->get('department_jobs')->result();
   
       
        return $query;
    
}

public function get_all_emp_edara_qsm(){
    $edara_id =  $this->input->post('edara_id');
    $qsm_id =  $this->input->post('qsm_id');


    $this->db->where_in('administration',$edara_id);

    $this->db->where_in('department',$qsm_id);

    $query = $this->db->get('employees')->result();
   
       
        return $query;
    
}
//notification

public function total_rows($q=NULL){

   
$this->db->where('to_user_id',$_SESSION['emp_code']);
$this->db->where('seen',0);  
    
     $this->db->from('hr_attend_msg');
    return $this->db->count_all_results();


}
public function get_new_messages($q=NULL)
{
    $this->db->where('to_user_id',$_SESSION['emp_code']);
  $this->db->where('is_read',0);

     $this->db->from('hr_attend_msg');
    return $this->db->get()->result();
    
}
public function update_seen_messages()
{
   
   $data['seen']=1;
     
 $this->db->where('to_user_id',$_SESSION['emp_code'])->update('hr_attend_msg',$data);


}

public function update_read_messages($id)
{
   
   $data['is_read']=1;
     
 $this->db->where('id',$id)->update('hr_attend_msg',$data);


}



}