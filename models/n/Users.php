<?php
class Users extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function record_count()
    {
        return $this->db->count_all("users");
    }
//---------------------------------------------------
    public function chek_Null($post_value){
        if($post_value == '' || $post_value==null || (!isset($post_value))){
            $val=0;
            return $val;
        }else{
            return $post_value;
        }
    }
/*****************************************************************/    
   
   
      public function fetch_users_groups_2()
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('approved=', 1);
        $this->db->group_by("user_id");
        $this->db->order_by('user_id', 'DESC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->member_name = $this->get_member_name($row->emp_code);
                $data[$i]->emp_name = $this->get_emp_name($row->emp_code);
                $data[$i]->member_public_name = $this->get_member_general_name($row->emp_code);
                
                $i++;
            }
            return $data;
        }
        return false;
    } 
   public function fetch_users_groups()
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->group_by("user_id");
        $this->db->order_by('user_id', 'DESC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->member_name = $this->get_member_name($row->emp_code);
                $data[$i]->emp_name = $this->get_emp_name($row->emp_code);
                $data[$i]->member_public_name = $this->get_member_general_name($row->emp_code);
                
                $i++;
            }
            return $data;
        }
        return false;
    }


    public function get_users_name(){
        $this->db->select('*');
        $this->db->from('permissions');
          $this->db->where('permissions.user_id !=', 19);
        $this->db->join('users' , 'permissions.user_id = users.user_id','left');
        $this->db->group_by("permissions.user_id");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
               $i = 0;
            foreach ($query->result() as $row) {
               // $data = $query->result();
             
                $data[$i] = $row;
                $data[$i]->member_name = $this->get_member_name($row->emp_code);
                $data[$i]->emp_name = $this->get_emp_name($row->emp_code);
                $data[$i]->member_public_name = $this->get_member_general_name($row->emp_code);
                $i++;
            }
            return $data;
        }
        return false;
    }

	public  function get_member_general_name($id){

    $h = $this->db->get_where("general_assembley_members", array('id'=>$id));
    $arr= $h->row_array();
    return $arr['name'];

}   
    
    
    
/******************************************************************/    
//--------------------------------------------------
    public function fetch_users($limit, $start)
    {
        $this->db->select('*');
        $this->db->from('users');
          $this->db->where('user_id !=', 19);
        $this->db->order_by('user_id', 'DESC');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                 $data[$i]->member_name = $this->get_member_name($row->emp_code);
                  $data[$i]->emp_name = $this->get_emp_name($row->emp_code);
                  $data[$i]->member_public_name = $this->get_member_general_name($row->emp_code);
                 $i++;
            }
            return $data;
        }
        return false;
    }
    
    
        public function fetch_users_profile($limit, $start,$user_id)
    {
        $this->db->select('*');
        $this->db->from('users');
         $this->db->where('user_id', $user_id);
        $this->db->order_by('user_id', 'DESC');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                 $data[$i]->member_name = $this->get_member_name($row->emp_code);
                 $data[$i]->emp_name = $this->get_emp_name($row->emp_code);
                 $data[$i]->emp_data = $this->emp_reportBy_id($row->emp_code); 
                 
                 
                 
                 
                 $i++;
            }
            return $data;
        }
        return false;
    }
    
    
    
 /*public  function get_member_name($id){
    
    $h = $this->db->get_where("magls_members_table", array('id'=>$id));
    $arr= $h->row_array();
    return $arr['member_name'];

}
   
  */ 
   
   public  function get_member_name($id){

    $h = $this->db->get_where("md_all_magls_edara_members", array('mem_id_fk'=>$id));
    $arr= $h->row_array();
    return $arr['mem_name'];

}

 public  function get_emp_name($id){
    
    $h = $this->db->get_where("employees", array('id'=>$id));
    $arr= $h->row_array();
    return $arr['employee'];

}


 
public function update_approved_user($id,$table,$value){

    if($value == 1){
       $myval = 0;
    }elseif($value == 0){
        $myval = 1; 
     }    
    $update = array(
        'approved'=>$myval
    
    );
    
    $this->db->where('user_id', $id);
    if($this->db->update(''.$table.'',$update)) {
    return true;
    }else{
        return false;
    }
} 
       
    
    
    
    
     public function insert($file){

  /*     echo "<pre>";
        print_r($_POST);
        echo "</pre>";
        die;*/
        $password=$this->input->post('user_pass',true);
        $password=sha1(md5($password));
        $data['user_pass'] = $password;
        if(!empty($file)){
         $data['user_photo'] =$file ;   
        }
        $data['user_name'] = $this->chek_Null($this->input->post('user_name'));
        $data['user_username'] = $this->chek_Null($this->input->post('user_name'));
        $data['role_id_fk'] = $this->chek_Null($this->input->post('role_id_fk'));
        $data['user_phone'] = $this->chek_Null($this->input->post('user_phone'));
        $data['user_id_number'] = $this->chek_Null($this->input->post('id_number'));
        $emp_code=$this->input->post('emp_code');
        if(!empty($emp_code)){
        $data['emp_code'] = $this->chek_Null($this->input->post('emp_code'));
        }
        
            if ($data['role_id_fk'] == 3){
        $emp= $this->getempdata($data['emp_code']);
        $data['emp_name']=$emp['employee'];
        $data['emp_photo']=$emp['personal_photo'];
    }
        
        
        $this->db->insert('users',$data);



    }
    public function getempdata($id)
{
    return $this->db->selet('employee ,personal_photo ')->where('id', $id)->get('employees')->row_array();
}

    
    
    
    
    
        public function update($id,$file)
{
    $password=$this->input->post('user_pass',true);
        if(!empty($password)){
        $password=sha1(md5($password));
        $data['user_pass'] = $password;
        }
   // $password=sha1(md5($password));
        if(!empty($file)){
         $data['user_photo'] =$file ;   
        }
    
   // $data['user_pass'] = $password;
    $data['user_name'] = $this->chek_Null($this->input->post('user_name'));
    $data['user_username'] = $this->chek_Null($this->input->post('user_name'));
   // $data['role_id_fk'] = $this->chek_Null($this->input->post('role_id_fk'));
    $data['user_phone'] = $this->chek_Null($this->input->post('user_phone'));
    $data['user_id_number'] = $this->chek_Null($this->input->post('id_number'));
    $emp_code=$this->input->post('emp_code');
    if(!empty($emp_code)){
        $data['emp_code'] = $this->chek_Null($this->input->post('emp_code'));
    }
      if ($data['role_id_fk'] == 3){
        $emp= $this->getempdata($data['emp_code']);
        $data['emp_name']=$emp['employee'];
        $data['emp_photo']=$emp['personal_photo'];
    }

    
    
    
    $this->db->where('user_id', $id);
    $this->db->update('users', $data);
}


    public function getById($id){
        $h = $this->db->get_where("users", array('user_id'=>$id));
        return $h->row_array();
    }
    
    
  /*  public function insert($file)
    {
        $password = $this->input->post('user_pass', true);
        $password = sha1(md5($password));
        
        $data = array(
            "user_name"     => $this->input->post('user_name'),
            "user_username" => $this->input->post('user_username'),
            "user_pass"     => $password,
            "user_email"    => $this->input->post('user_email'),
            "role_id_fk"    => $this->input->post('role_id_fk'),
            "head_dep_id_fk"=> $this->input->post('head_dep_id_fk'),
            "user_phone"    => $this->input->post('user_phone'),
            "doctor_id"     => $this->input->post('doc_id'),
            "user_photo"    => $file
        );
        $data['emp_code'] = 0;
        $data["dep_id"] = 0;
        if($this->input->post('role_id_fk') == 1){
            $data['emp_code'] = $this->chek_Null($this->input->post('employee_id'));
            $this->db->where('id', $data['emp_code']);
            $query = $this->db->get('employees');
            $r = $query->row_array();
            $data["dep_id"] = $r['administration'];
        }
        if($this->input->post('role_id_fk') == 4){
            $data['emp_code'] = $this->chek_Null($this->input->post('employee_id2'));
        }
        if($this->input->post('role_id_fk') == 5){
            $data['emp_code'] = $this->chek_Null($this->input->post('employee_id3'));
        }
        if($file == ''){
            $data['user_photo'] = 'user.png';
        }
        $done = $this->db->insert('users', $data);
        if ($done == 1) {
            return true;
        } else {
            return false;
        }
    }
*/
    public function display($id)
    {
        $this->db->where('user_id', $id);
        $query = $this->db->get('users');
        return $query->row_array();
    }
    
    public function display_doc($id)
    {
        $this->db->where('user_id', $id);
        $query = $this->db->get('users');
        return $query->row_array();
    }

/*
    public function insert($file){
        $password=$this->input->post('user_pass',true);
        $password=sha1(md5($password));

   
       
$data['user_name'] = $this->chek_Null($this->input->post('user_name'));
$data['user_username'] = $this->chek_Null($this->input->post('user_name'));
$data['emp_code'] = $this->chek_Null($this->input->post('emp_code'));
$data['user_pass'] = $password;
$data['user_email'] = $this->chek_Null($this->input->post('user_email'));

if($this->input->post('role_id_fk') == 0){
  $var = 1;  
  $var2 = 0;
}elseif($this->input->post('role_id_fk') == 1){
     $var = 3; 
     $var2 =  $this->chek_Null($this->input->post('emp_code'));
}elseif($this->input->post('role_id_fk') == 3){
      $var = 2; 
      
      
      $var2 =  $this->chek_Null($this->input->post('member_id'));
}

$data['role_id_fk'] =$var;
$data['emp_code'] = $var2;
$data['user_phone'] = $this->chek_Null($this->input->post('user_phone'));

$data['head_dep_id_fk'] = $this->chek_Null($this->input->post('head_dep_id_fk'));        
$data['dep_job_id_fk'] = $this->chek_Null($this->input->post('dep_job_id_fk'));     
$data['administration_id'] = $this->chek_Null($this->input->post('administration_id'));
$data['user_photo'] = $file;
           
        $done=$this->db->insert('users',$data);
        if($done==1){
            return true;
        }else{
            return false;
        }
    }
    */
    

/*
public function insert($file)
{

    $password = $this->input->post('user_pass', true);
    $password = sha1(md5($password));
    $doctor_id = explode('-',$_POST['doc_id']);
    $data = array(
        "user_name"     => $this->input->post('user_name'),
        "user_username" => $this->input->post('user_username'),
        "user_pass"     => $password,
        "user_email"    => $this->input->post('user_email'),
        "role_id_fk"    => $this->input->post('role_id_fk'),
        "dep_id"=> $this->input->post('dep_id'),
        "user_phone"    => $this->input->post('user_phone'),
        "doctor_id"     => $doctor_id[0],
        "user_photo"    => $file
    );
    $data['emp_code'] = 0;
    // $data["dep_id"] = 0;
    if($this->input->post('role_id_fk') == 1){
        $data['emp_code'] = $this->chek_Null($this->input->post('employee_id'));
        $this->db->where('id', $data['emp_code']);
        $query = $this->db->get('employees');
        $r = $query->row_array();
        $data["dep_id"] = $r['administration'];
    }elseif ($this->input->post('role_id_fk') == 3){
        $data['dep_id'] = $doctor_id[1];
    }
    if($this->input->post('role_id_fk') == 4){
        $data['emp_code'] = $this->chek_Null($this->input->post('employee_id2'));
    }
    if($this->input->post('role_id_fk') == 5){
        $data['emp_code'] = $this->chek_Null($this->input->post('employee_id3'));
    }
    if($file == ''){
        $data['user_photo'] = 'user.png';
    }
    $done = $this->db->insert('users', $data);
    if ($done == 1) {
        return true;
    } else {
        return false;
    }
}
*/
/*
public function update($id, $user_photo)
{
    $data = array(
        'user_name' => $this->input->post('user_name'),
        'user_username' => $this->input->post('user_username'),
        'user_email' => $this->input->post('user_email'),
        "head_dep_id_fk"=>$this->input->post('head_dep_id_fk'),
        'user_phone' => $this->input->post('user_phone')
    );
    $data["doctor_id"] = 0;
    $data["dep_id"] = 0;
    $data['emp_code'] = 0;
    if ($this->input->post('user_pass')){
        $password = $this->input->post('user_pass', true);
        $password = sha1(md5($password));
        $data['user_pass'] = $password;
    }
    if($this->input->post('role_id_fk') == 1){
        $data['emp_code'] = $this->chek_Null($this->input->post('employee_id'));
        $this->db->where('id', $data['emp_code']);
        $query = $this->db->get('employees');
        $r = $query->row_array();
        $data["dep_id"] = $r['administration'];
    }elseif ($this->input->post('role_id_fk') == 3){
        $doctor_id = explode('-',$_POST['doc_id']);
        $data["doctor_id"] = $doctor_id[0];
        $data["dep_id"] = $doctor_id[1];
    }
    if($this->input->post('role_id_fk') == 4){
        $data['emp_code'] = $this->chek_Null($this->input->post('employee_id2'));
    }
    if($this->input->post('role_id_fk') == 5){
        $data['emp_code'] = $this->chek_Null($this->input->post('employee_id3'));
    }
    if ($this->input->post('role_id_fk')) {
        $data['role_id_fk'] = $this->input->post('role_id_fk');
    }
    if ($user_photo != '') {
        $data['user_photo'] = $user_photo;
    }

    $this->db->where('user_id', $id);
    $update = $this->db->update('users', $data);
    if ($update == 1) {
        return true;
    }
    return false;
}
*/

    /*public function update($id, $user_photo)
    {
        $data = array(
            'user_name' => $this->input->post('user_name'),
            'user_username' => $this->input->post('user_username'),
            'user_email' => $this->input->post('user_email'),
            "head_dep_id_fk"=>$this->input->post('head_dep_id_fk'),
            'user_phone' => $this->input->post('user_phone')
        );
        $data["doctor_id"] = 0;
        $data["dep_id"] = 0;
        $data['emp_code'] = 0;
        if ($this->input->post('user_pass')){
            $password = $this->input->post('user_pass', true);
            $password = sha1(md5($password));
            $data['user_pass'] = $password;
        }
        if ($this->input->post('doctor_id')) {
            $data["doctor_id"] = $this->input->post('doctor_id');
            $data["dep_id"] = $this->input->post('dep_id');
        } 
        if($this->input->post('role_id_fk') == 1){
            $data['emp_code'] = $this->chek_Null($this->input->post('employee_id'));
            $this->db->where('id', $data['emp_code']);
            $query = $this->db->get('employees');
            $r = $query->row_array();
            $data["dep_id"] = $r['administration'];
        }
        if($this->input->post('role_id_fk') == 4){
            $data['emp_code'] = $this->chek_Null($this->input->post('employee_id2'));
        }
        if($this->input->post('role_id_fk') == 5){
            $data['emp_code'] = $this->chek_Null($this->input->post('employee_id3'));
        }
        if ($this->input->post('role_id_fk')) {
            $data['role_id_fk'] = $this->input->post('role_id_fk');
        }
        if ($user_photo != '') {
            $data['user_photo'] = $user_photo;
        }
      
        $this->db->where('user_id', $id);
        $update = $this->db->update('users', $data);
        if ($update == 1) {
            return true;
        }
        return false;
    }*/
    public function delete($id)
    {
        $this->db->where('user_id', $id);
        $this->db->delete('users');
    }
    public function check_user_data()
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('user_username', $this->input->post('user_name'));
        $this->db->where('user_pass', sha1(md5($this->input->post('user_pass'))));
        $this->db->where('approved', 1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }
//---------------------------------------------------------------

public function employes_in(){
    $this->db->select('*');
    $this->db->from('users');
    $this->db->where("role_id_fk",3);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row->emp_code;
        }
        return $data;
    }else{
        return 0;
    }

} 

    public function members_in(){
    $this->db->select('*');
    $this->db->from('users');
    $this->db->where("role_id_fk",2);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row->emp_code;
        }
        return $data;
    }else{
        return 0;
    }

}





    public function emp_in()
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where("role_id_fk",3);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row->emp_code;
            }
            return $data;
        }
        return false;
    } 
    
        public function memb_in()
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where("role_id_fk",2);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row->emp_code;
            }
            return $data;
        }
        return false;
    }
    
    
//-------------------------------------------------------
public  function update_pass($id){
    $password = $this->input->post('user_pass', true);
    if ($password != '') {
        $data['user_pass'] = sha1(md5($password));
    }
    $this->db->where('user_id', $id);
    $this->db->update('users', $data);
}
//-----------------------------------------------------
      public function nur_in($role_id_fk)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where("role_id_fk",$role_id_fk);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row->emp_code;
            }
            return $data;
        }
        return false;
    }
/***********************************************************/

    public function emp_reportBy_id($emp_id)
    {
        $this->db->select('*');
        $this->db->from('employees');
        $this->db->where('id',$emp_id);
        $parent = $this->db->get();
        $data = $parent->row();

       if($parent->num_rows() > 0){

           $data->depart_name = $this->emp_depart_name($data->department)->name;

           return $data;
       }
        return false;
    }    
    
     public function emp_depart_name($id)
    {
        $this->db->select('*');
        $this->db->from('department_jobs');
        $this->db->where('id',$id);
        $parent1 = $this->db->get();
        $data1 = $parent1->row();
        if($parent1->num_rows() > 0) {
            return $data1;
        }
        return false;
    }   
  /**************************************************/
    
  public function general_members_in(){
    $this->db->select('*');
    $this->db->from('users');
    $this->db->where("role_id_fk",4);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row->emp_code;
        }
        return $data;
    }else{
        return 0;
    }

}  
 /*********************************************************/

  public function users_in(){
        $this->db->select('*');
        $this->db->from('users');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row->user_id;
            }
            return $data;
        }
        return 0;


    }

    public function fetch_users_in($ids)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where_not_in('user_id', $ids);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->member_name = $this->get_member_name($row->emp_code);
                $data[$i]->emp_name = $this->get_emp_name($row->emp_code);
                $data[$i]->member_public_name = $this->get_member_general_name($row->emp_code);
                $i++;
            }
            return $data;
        }
        return 0;
    }


    public function insertSignature($images)
    {
        $users= $this->input->post('user_id_fk') ;
        $rolr_ids= $this->input->post('role_id_fk') ;
        $actives= $this->input->post('active') ;
        for($i = 0 ; $i < count($users) ;$i++){
            $data['user_id_fk'] = $users[$i];
            $data['role_id_fk'] = $rolr_ids[$i];
            $data['img'] = $images[$i];
            $data['active'] = $actives[$i];

            $this->db->insert('users_signatures',$data);
        }

    }

    public function fetch_users_role_id($role){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('user_id', $role);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {

                $data = $query->row();

            return $data->role_id_fk;
        }
        return 0;


    }


    public function all_users_signatures(){
        $this->db->select('*');
        $this->db->from('users_signatures');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {

            foreach ($query->result() as $row) {
                $data = $query->result();
            }
            return $data;
        }
            return false;


    }

 public function update_image_Signature($img_old)
    {
        $user_ids= $this->input->post('user_id_old') ;

        for($i = 0 ; $i < count($user_ids) ;$i++){
            $data['img'] = $img_old[$i];
            $this->db->where('user_id_fk', $user_ids[$i]);
            $this->db->update('users_signatures',$data);
        }
    }

   
}// END CLASS