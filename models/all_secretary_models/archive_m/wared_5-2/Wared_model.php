<?php

class Wared_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }


    public function chek_Null($post_value)
    {
        if ($post_value == '' || $post_value == null || (!isset($post_value))) {
            $val = '';
            return $val;
        } else {
            return $post_value;
        }
    }

    public function select_search($table){
        $this->db->select('*');
        $this->db->from($table);
      
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    public function get_last_rkm()
    {
        $this->db->select('rkm');
        $this->db->order_by('id','desc');
        $query=$this->db->get('arch_wared');
        if($query->num_rows()>0)
        {
            return $query->row()->rkm + 1;
        }else{
            return 1;
        }
    
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
  
    public function insert()
 {

  $data['rkm']=$this->input->post('rkm');
  $data['tsgeel_date']=$this->input->post('tsgeel_date');
  $data['tsgeel_time']=$this->input->post('tsgeel_date'); 
     $data['estlam_date']=$this->input->post('estlam_date');
     $data['estlam_time']=$this->input->post('estlam_time');
     $data['geha_ekhtsas_name']=$this->input->post('geha_ekhtsas_name');
     $data['geha_ekhtsas_id_fk']=$this->input->post('geha_ekhtsas_id_fk');
 
     $data['title']=$this->input->post('title_name');
       $data['title_id_fk']=$this->input->post('title_id_fk');
     $data['subject']=$this->input->post('subject');
     $data['tarekt_estlam_name']=$this->input->post('tarekt_estlam_name');
     $data['tarekt_estlam']=$this->input->post('tarekt_estlam');
     $data['is_secret']=$this->input->post('is_secret');
        $data['geha_morsla_name']=$this->input->post('geha_morsla_name');
        $data['geha_morsla_id_fk']=$this->input->post('geha_morsla_id_fk');
        $data['morsel_name']=$this->input->post('morsel_name');
        $data['morsel_id_fk']=$this->input->post('morsel_id_fk');
        $data['awlawya']=$this->input->post('awlawya');
        $data['esthkak_date']=$this->input->post('esthkak_date');
        $data['esthkak_time']=$this->input->post('esthkak_time');
        $data['notes']=$this->input->post('notes');
$data['reply_moamla']=$this->input->post('reply_moamla');
$data['need_follow']=$this->input->post('need_follow');
$data['folder_path']=$this->input->post('folder');
$data['no3_khtab_fk']=$this->input->post('no3_khtab_fk');
$data['no3_khtab_n']=$this->input->post('no3_khtab_n');
$data['wared_type']=$this->input->post('wared_type');
$data['morfq_num']=$this->input->post('morfq_num');

$data['date']= strtotime(date("Y-m-d"));
$data['date_ar'] = date('Y-m-d H:i:s');
if($_SESSION['role_id_fk']==1){

    $data['current_form_user_id']=$_SESSION['user_id'];
    $data['current_form_user_name']=$_SESSION['user_name'];;
}
else if ($_SESSION['role_id_fk']==2){
    $data['current_form_user_id'] = $this->get_id("magls_members_table",'id',$_SESSION['emp_code'],"id");
    $data['current_form_user_name'] = $this->get_id("magls_members_table",'id',$_SESSION['emp_code'],"member_name");

}
else if ($_SESSION['role_id_fk']==3){
    $data['current_form_user_id'] = $this->get_id("employees",'id',$_SESSION['emp_code'],"id");
    $data['current_form_user_name'] = $this->get_id("employees",'id',$_SESSION['emp_code'],"employee");
}
else if ($_SESSION['role_id_fk']==4){
    $data['current_form_user_id'] = $this->get_id("general_assembley_members",'id',$_SESSION['emp_code'],"id");
    $data['current_form_user_name'] = $this->get_id("general_assembley_members",'id',$_SESSION['emp_code'],"name");
}
     $this->db->insert('arch_wared',$data);
     
     
   
 }
 public function select_all_wared()
 {
  return $this->db->where('suspend',0)->get('arch_wared')->result();
 }
 public function get_by_id($id)
{
    $this->db->where('id',$id);
   return $this->db->get('arch_wared')->row();

}
public function update($id)
{
    $data['rkm']=$this->input->post('rkm');
    $data['tsgeel_date']=$this->input->post('tsgeel_date');
    $data['tsgeel_time']=$this->input->post('tsgeel_time');
       $data['estlam_date']=$this->input->post('estlam_date');
       $data['estlam_time']=$this->input->post('estlam_time');
       $data['geha_ekhtsas_name']=$this->input->post('geha_ekhtsas_name');
       $data['geha_ekhtsas_id_fk']=$this->input->post('geha_ekhtsas_id_fk');
       $data['title']=$this->input->post('title_name');
       $data['title_id_fk']=$this->input->post('title_id_fk');
       $data['subject']=$this->input->post('subject');
       $data['tarekt_estlam_name']=$this->input->post('tarekt_estlam_name');
       $data['tarekt_estlam']=$this->input->post('tarekt_estlam');
       $data['is_secret']=$this->input->post('is_secret');
          $data['geha_morsla_name']=$this->input->post('geha_morsla_name');
          $data['geha_morsla_id_fk']=$this->input->post('geha_morsla_id_fk');
          $data['morsel_name']=$this->input->post('morsel_name');
          $data['morsel_id_fk']=$this->input->post('morsel_id_fk');
          $data['awlawya']=$this->input->post('awlawya');
          $data['esthkak_date']=$this->input->post('esthkak_date');
          $data['esthkak_time']=$this->input->post('esthkak_time');
          $data['notes']=$this->input->post('notes');
          $data['need_follow']=$this->input->post('need_follow');
          $data['folder_path']=$this->input->post('folder');
          $data['no3_khtab_fk']=$this->input->post('no3_khtab_fk');
          $data['no3_khtab_n']=$this->input->post('no3_khtab_n');
          $data['morfq_num']=$this->input->post('morfq_num');
          $data['reply_moamla']=$this->input->post('reply_moamla');
          $data['wared_type']=$this->input->post('wared_type');
          if($_SESSION['role_id_fk']==1){

            $data['current_form_user_id']=$_SESSION['user_id'];
            $data['current_form_user_name']=$_SESSION['user_name'];;
        }
        else if ($_SESSION['role_id_fk']==2){
            $data['current_form_user_id'] = $this->get_id("magls_members_table",'id',$_SESSION['emp_code'],"id");
            $data['current_form_user_name'] = $this->get_id("magls_members_table",'id',$_SESSION['emp_code'],"member_name");
    
        }
        else if ($_SESSION['role_id_fk']==3){
            $data['current_form_user_id'] = $this->get_id("employees",'id',$_SESSION['emp_code'],"id");
            $data['current_form_user_name'] = $this->get_id("employees",'id',$_SESSION['emp_code'],"employee");
        }
        else if ($_SESSION['role_id_fk']==4){
            $data['current_form_user_id'] = $this->get_id("general_assembley_members",'id',$_SESSION['emp_code'],"id");
            $data['current_form_user_name'] = $this->get_id("general_assembley_members",'id',$_SESSION['emp_code'],"name");
        }
   $this->db->where('id',$id);
    $this->db->update('arch_wared',$data);

}
public function delete($id)
{
    
   $this->db->where('id',$id);
   $this->db->delete('arch_wared');

}
public function get_wared_by_id($id){
    $this->db->where('id',$id);
    $query = $this->db->get('arch_wared');
    if ($query->num_rows()>0){
        return $query->row();
    } else{
        return false;
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
public function insert_attach($id,$images)
{
    if(isset($images)&& !empty($images))
    {
        $count=count($images);
        for($x=0; $x<$count;$x++)
        {
            
            $data['title']=$this->input->post('title');
            $data['file']=$images[$x];
            $data['wared_id_fk']=$id;
            $data['date']= strtotime(date("Y-m-d"));
            $data['date_ar']= date("Y-m-d");
            if($_SESSION['role_id_fk']==1){

                $data['publisher']=$_SESSION['user_id'];
                $data['publisher_name']=$_SESSION['user_name'];;
            }
            else if ($_SESSION['role_id_fk']==2){
                $data['publisher'] = $this->get_id("magls_members_table",'id',$_SESSION['emp_code'],"id");
                $data['publisher_name'] = $this->get_id("magls_members_table",'id',$_SESSION['emp_code'],"member_name");
        
            }
            else if ($_SESSION['role_id_fk']==3){
                $data['publisher'] = $this->get_id("employees",'id',$_SESSION['emp_code'],"id");
                $data['publisher_name'] = $this->get_id("employees",'id',$_SESSION['emp_code'],"employee");
            }
            else if ($_SESSION['role_id_fk']==4){
                $data['publisher'] = $this->get_id("general_assembley_members",'id',$_SESSION['emp_code'],"id");
                $data['publisher_name'] = $this->get_id("general_assembley_members",'id',$_SESSION['emp_code'],"name");
            }

            $this->db->insert('arch_wared_morfq',$data);
        }
    }

}
public function delete_morfq($id)
{

$this->db->where('id',$id)->delete('arch_wared_morfq');

}

public function get_morfq_by_id($id){
    $this->db->where('wared_id_fk',$id);
    $query = $this->db->get('arch_wared_morfq');
  
        return $query->result();
   
}

public function get_images($id)
{
    $this->db->where('id',$id);
    $query=$this->db->get('arch_wared_morfq');
    if($query->num_rows()>0)
    {
        return $query->result();
    }else{
        return false;
    }
}



public function get_id($table,$where,$id,$select){
    $h = $this->db->get_where($table, array($where=>$id));
    $arr= $h->row_array();
    return $arr[$select];
}


public function add_comment($id, $comment)
{
    
  $data['wared_id_fk']=$id;
   
    $data['comment']=  $comment;
  
    $data['date']= strtotime(date("Y-m-d"));
    $data['date_ar'] = date('Y-m-d H:i:s');
    if($_SESSION['role_id_fk']==1){

        $data['publisher']=$_SESSION['user_id'];
        $data['publisher_name']=$_SESSION['user_name'];;
    }
    else if ($_SESSION['role_id_fk']==2){
        $data['publisher'] = $this->get_id("magls_members_table",'id',$_SESSION['emp_code'],"id");
        $data['publisher_name'] = $this->get_id("magls_members_table",'id',$_SESSION['emp_code'],"member_name");

    }
    else if ($_SESSION['role_id_fk']==3){
        $data['publisher'] = $this->get_id("employees",'id',$_SESSION['emp_code'],"id");
        $data['publisher_name'] = $this->get_id("employees",'id',$_SESSION['emp_code'],"employee");
    }
    else if ($_SESSION['role_id_fk']==4){
        $data['publisher'] = $this->get_id("general_assembley_members",'id',$_SESSION['emp_code'],"id");
        $data['publisher_name'] = $this->get_id("general_assembley_members",'id',$_SESSION['emp_code'],"name");
    }
    $this->db->insert('arch_wared_twgehat',$data);
    return $this->db->insert_id();

}
public function get_tazkra_num (){
    $this->db->order_by('tazkra_num','DESC');
    $query = $this->db->get('tech_all_tazaker_orders');
    if ($query->num_rows()>0){
        return $query->row()->tazkra_num;
    } else{
        return 0;
    }
}
public function get_comments($id){
    $this->db->where('wared_id_fk',$id);
    $query = $this->db->get('arch_wared_twgehat')->result();
    
      
     return $query;
   
}


public function update_comment($id,$comment){

    $data['comment']= $comment;
  
    $data['date']= strtotime(date("Y-m-d"));
    $data['date_ar'] = date('Y-m-d H:i:s');
    if($_SESSION['role_id_fk']==1){

        $data['publisher']=$_SESSION['user_id'];
        $data['publisher_name']=$_SESSION['user_name'];
    }
    else if ($_SESSION['role_id_fk']==2){
        $data['publisher'] = $this->get_id("magls_members_table",'id',$_SESSION['emp_code'],"id");
        $data['publisher_name'] = $this->get_id("magls_members_table",'id',$_SESSION['emp_code'],"member_name");

    }
    else if ($_SESSION['role_id_fk']==3){
        $data['publisher'] = $this->get_id("employees",'id',$_SESSION['emp_code'],"id");
        $data['publisher_name'] = $this->get_id("employees",'id',$_SESSION['emp_code'],"employee");
    }
    else if ($_SESSION['role_id_fk']==4){
        $data['publisher'] = $this->get_id("general_assembley_members",'id',$_SESSION['emp_code'],"id");
        $data['publisher_name'] = $this->get_id("general_assembley_members",'id',$_SESSION['emp_code'],"name");
    }
    $this->db->where('id',$id);
    $this->db->update('arch_wared_twgehat',$data);
}
public function get_comment_byId($id){
    $this->db->where('id',$id);
    $query = $this->db->get('arch_wared_twgehat');
    if ($query->num_rows()>0){
      //  return $query->row();
        $data = $query->row();
        //$data->tazkra_no3_n= $this->get_id('tech_tazkra_settings','id',$data->tazkra_no3,'title');
        //$data->importance_n= $this->get_id('tech_tazkra_settings','id',$data->importance_type,'title');

     return $data;
    } else{
        return 0;
    }
}


public function delete_comment($id){
    $this->db->where('id',$id);
    $this->db->delete('arch_wared_twgehat');

}
public function get_all_department()
{
    $this->db->where('status',1);
    $query = $this->db->get('department_jobs')->result();
    return $query;

}
public function get_all_employees()
{

    $query = $this->db->get('employees')->result();
    return $query;
}

public function add_mohma()
{
    $data['rkm']=$this->input->post('rkm');
    $data['wared_id_fk']=$this->input->post('wared_id_fk');
    $data['mohma_name']=$this->input->post('mohma_name');
    $data['tahwel_type']=$this->input->post('tahwel_type');
    //$data['to_user_id']=$this->input->post('to_user_id');
  //  $data['to_user_name']=$this->input->post('to_user_name');
    $data['awlawya']=$this->input->post('awlawya');
    $data['subject']=$this->input->post('subject');
    $data['esthkak_date']=$this->input->post('esthkak_date');
    $data['date']= strtotime(date("Y-m-d"));
    $data['date_ar'] = date('Y-m-d H:i:s');
 
    if($_SESSION['role_id_fk']==1){

        $data['from_user_id']=$_SESSION['user_id'];
        $data['from_user_name']=$_SESSION['user_name'];;
    }
    else if ($_SESSION['role_id_fk']==2){
        $data['from_user_id'] = $this->get_id("magls_members_table",'id',$_SESSION['emp_code'],"id");
        $data['from_user_name'] = $this->get_id("magls_members_table",'id',$_SESSION['emp_code'],"member_name");

    }
    else if ($_SESSION['role_id_fk']==3){
        $data['from_user_id'] = $this->get_id("employees",'id',$_SESSION['emp_code'],"id");
        $data['from_user_name'] = $this->get_id("employees",'id',$_SESSION['emp_code'],"employee");
    }
    else if ($_SESSION['role_id_fk']==4){
        $data['from_user_id'] = $this->get_id("general_assembley_members",'id',$_SESSION['emp_code'],"id");
        $data['from_user_name'] = $this->get_id("general_assembley_members",'id',$_SESSION['emp_code'],"name");
    }
    $x= $this->input->post('to_user_id');
       $y=$this->input->post('to_user_name');
       if(   $x!=null)
       {
        
       for($i=0;$i<sizeof($x);$i++)
{
   
   if($data['tahwel_type']==1)
   {
    
   $data['to_user_id'] = $x[$i];
   $data['to_user_name'] = $y[$i];
//echo "<pre>";
//print_r($data);
   $this->db->insert('arch_wared_history',$data);
   
  }elseif($data['tahwel_type']==2)
  {
    //$data['to_user_id'] = $x[$i];
    $yy=$this->get_id("department_jobs","id",$x[$i],"from_id_fk");
    $vv=$this->get_id("hr_depart_managers","depart_id_fk",$yy,"emp_id_fk");
  $data['to_user_id']=$vv;
  $final=$this->get_id("employees","id",$vv,"employee");
  $data['to_user_name'] =$final;
//  echo "<pre>";
//  print_r($data);
    $this->db->insert('arch_wared_history',$data);

  } 






}


    
    
    
    
    }


   

}


public function update_mohma($id)
{
    $data['rkm']=$this->input->post('rkm');
    $data['wared_id_fk']=$this->input->post('wared_id_fk');
    $data['mohma_name']=$this->input->post('mohma_name');
    $data['tahwel_type']=$this->input->post('tahwel_type');
   // $data['to_user_id']=$this->input->post('to_user_id');
 //   $data['to_user_name']=$this->input->post('to_user_name');
    $data['awlawya']=$this->input->post('awlawya');
    $data['subject']=$this->input->post('subject');
    $data['esthkak_date']=$this->input->post('esthkak_date');
  
 
    if($_SESSION['role_id_fk']==1){

        $data['from_user_id']=$_SESSION['user_id'];
        $data['from_user_name']=$_SESSION['user_name'];;
    }
    else if ($_SESSION['role_id_fk']==2){
        $data['from_user_id'] = $this->get_id("magls_members_table",'id',$_SESSION['emp_code'],"id");
        $data['from_user_name'] = $this->get_id("magls_members_table",'id',$_SESSION['emp_code'],"member_name");

    }
    else if ($_SESSION['role_id_fk']==3){
        $data['from_user_id'] = $this->get_id("employees",'id',$_SESSION['emp_code'],"id");
        $data['from_user_name'] = $this->get_id("employees",'id',$_SESSION['emp_code'],"employee");
    }
    else if ($_SESSION['role_id_fk']==4){
        $data['from_user_id'] = $this->get_id("general_assembley_members",'id',$_SESSION['emp_code'],"id");
        $data['from_user_name'] = $this->get_id("general_assembley_members",'id',$_SESSION['emp_code'],"name");
    }
    $x= $this->input->post('to_user_id');
       $y=$this->input->post('to_user_name');
       if(   $x!=null)
       {
        for($i=0;$i<sizeof($x);$i++)
{
   
   if($data['tahwel_type']==1)
   {
    
   $data['to_user_id'] = $x[$i];
   $data['to_user_name'] = $y[$i];
//echo "<pre>";
//print_r($data);
$this->db->where('id',$id);
$this->db->update('arch_wared_history',$data);
   
  }elseif($data['tahwel_type']==2)
  {
    //$data['to_user_id'] = $x[$i];
    $yy=$this->get_id("department_jobs","id",$x[$i],"from_id_fk");
    $vv=$this->get_id("hr_depart_managers","depart_id_fk",$yy,"emp_id_fk");
  $data['to_user_id']=$vv;
  $final=$this->get_id("employees","id",$vv,"employee");
  $data['to_user_name'] =$final;
 echo "<pre>";
 print_r($x[$i]);
$this->db->where('id',$id);
$this->db->update('arch_wared_history',$data);

  } 
       
    
    }
}
    
  

}
public function select_mohmat($id)
{

    $query = $this->db->where('wared_id_fk',$id)->get('arch_wared_history')->result();
    return $query;

}
public function select_mohmat_by_id($id)
{
    $query = $this->db->where('id',$id)->get('arch_wared_history')->row();
    return $query;

}
public function delete_mohma($id)
{
    $this->db->where('id',$id)->delete('arch_wared_history');
  
}

public function get_last_mohma()
    {
        $this->db->select('id');
        $this->db->order_by('id','desc');
        $query=$this->db->get('arch_wared_history');
        if($query->num_rows()>0)
        {
            return $query->row()->id + 1;
        }else{
            return 1;
        }
    
    }


    public function  update_wared_mohma()
    {
        $id=$this->input->post('wared_id_fk');
        $data['current_to_user_id']=$this->input->post('to_user_id');
        $data['current_to_user_name']=$this->input->post('to_user_name');
        if($_SESSION['role_id_fk']==1){

            $data['current_form_user_id']=$_SESSION['user_id'];
            $data['current_form_user_name']=$_SESSION['user_name'];;
        }
        else if ($_SESSION['role_id_fk']==2){
            $data['current_form_user_id'] = $this->get_id("magls_members_table",'id',$_SESSION['emp_code'],"id");
            $data['current_form_user_name'] = $this->get_id("magls_members_table",'id',$_SESSION['emp_code'],"member_name");
    
        }
        else if ($_SESSION['role_id_fk']==3){
            $data['current_form_user_id'] = $this->get_id("employees",'id',$_SESSION['emp_code'],"id");
            $data['current_form_user_name'] = $this->get_id("employees",'id',$_SESSION['emp_code'],"employee");
        }
        else if ($_SESSION['role_id_fk']==4){
            $data['current_form_user_id'] = $this->get_id("general_assembley_members",'id',$_SESSION['emp_code'],"id");
            $data['current_form_user_name'] = $this->get_id("general_assembley_members",'id',$_SESSION['emp_code'],"name");
        }
        $this->db->where('id',$id);
        $this->db->update('arch_wared',$data);


    }
    public function get_table($table,$arr){
        if (!empty($arr)){
            $this->db->where($arr);
        }
        $query = $this->db->get($table);
        if ($query->num_rows()>0){
            return $query->result();
        } else{
            return false;
        }
    }
    public function get_all_sader()
    {
        $query = $this->db->get('arch_sader')->result();
        return $query;
    

    }
    public function add_relation()
{

    $data['wared_id_fk']=$this->input->post('wared_id_fk');
    $data['mo3mla_rkm']=$this->input->post('mo3mla_id_fk');
    $data['type']=$this->input->post('type');
    
  
 
    $data['date']= strtotime(date("Y-m-d"));
    $data['date_ar'] = date('Y-m-d H:i:s');
    if($_SESSION['role_id_fk']==1){

        $data['publisher']=$_SESSION['user_id'];
        $data['publisher_name']=$_SESSION['user_name'];
    }
    else if ($_SESSION['role_id_fk']==2){
        $data['publisher'] = $this->get_id("magls_members_table",'id',$_SESSION['emp_code'],"id");
        $data['publisher_name'] = $this->get_id("magls_members_table",'id',$_SESSION['emp_code'],"member_name");

    }
    else if ($_SESSION['role_id_fk']==3){
        $data['publisher'] = $this->get_id("employees",'id',$_SESSION['emp_code'],"id");
        $data['publisher_name'] = $this->get_id("employees",'id',$_SESSION['emp_code'],"employee");
    }
    else if ($_SESSION['role_id_fk']==4){
        $data['publisher'] = $this->get_id("general_assembley_members",'id',$_SESSION['emp_code'],"id");
        $data['publisher_name'] = $this->get_id("general_assembley_members",'id',$_SESSION['emp_code'],"name");
    }
    $this->db->insert('arch_wared_relation',$data);
    return $this->db->insert_id();

}
public function select_relations($id)
{
    $query = $this->db->where('wared_id_fk',$id)->get('arch_wared_relation')->result();
    return $query;


}

public function select_relation_by_id($id)
{
    $query = $this->db->where('id',$id)->get('arch_wared_relation')->row();
    return $query;

}

public function  update_relation($id)
    {
        
        $data['mo3mla_rkm']=$this->input->post('mo3mla_id_fk');
        $data['type']=$this->input->post('type');
        
      
        $this->db->where('id',$id);
        $this->db->update('arch_wared_relation',$data);


    }
    public function delete_relation($id)
    {
        $this->db->where('id',$id)->delete('arch_wared_relation');
      
    }
    public function update_wared_status($id,$value,$name)
    {
        $data['reason_id']=$value;
        $data['reason_name']=$name;
        $data['suspend']=4;
        $data['suspend_date']= strtotime(date("Y-m-d"));
        $data['suspend_date_ar'] = date('Y-m-d H:i:s');
        if($_SESSION['role_id_fk']==1){

            $data['suspend_publisher']=$_SESSION['user_id'];
            $data['suspend_publisher_name']=$_SESSION['user_name'];
        }
        else if ($_SESSION['role_id_fk']==2){
            $data['suspend_publisher'] = $this->get_id("magls_members_table",'id',$_SESSION['emp_code'],"id");
            $data['suspend_publisher_name'] = $this->get_id("magls_members_table",'id',$_SESSION['emp_code'],"member_name");
    
        }
        else if ($_SESSION['role_id_fk']==3){
            $data['suspend_publisher'] = $this->get_id("employees",'id',$_SESSION['emp_code'],"id");
            $data['suspend_publisher_name'] = $this->get_id("employees",'id',$_SESSION['emp_code'],"employee");
        }
        else if ($_SESSION['role_id_fk']==4){
            $data['suspend_publisher'] = $this->get_id("general_assembley_members",'id',$_SESSION['emp_code'],"id");
            $data['suspend_publisher_name'] = $this->get_id("general_assembley_members",'id',$_SESSION['emp_code'],"name");
        }
        $this->db->where('id',$id);
        $this->db->update('arch_wared',$data);
    }
    public function add_estlam()
    {
        $data['title'] =$this->input->post('estlam');
     
        $data['from_code'] = 401;
        $this->db->insert('arch_setting', $data);
    }
    public function update_estlam($id)
    {
      $data['title'] =$this->input->post('estlam');
     
      $data['from_code'] = 401;
        $this->db->where('id',$id)->update('arch_setting', $data);
    }
public function GetFromGeneral_settings($id)
{
    $this->db->select('*');
    $this->db->from('arch_setting');
    $this->db->where('from_code', 401);
    $this->db->where('id', $id);
    $query = $this->db->get()->row();
   
    return $query;
}
 public function delete_setting($id)
    {

        $this->db->where("id", $id);
        $this->db->delete("arch_setting");
    }
    public function select_secret()
 {
  $this->db->where('from_code',801);
   return $this->db->get('arch_setting')->result();

 }
 ///////////////////
 public function add_no3_khtab()
 {
     $data['title'] =$this->input->post('no3_khtab');
  
     $data['from_code'] = 201;
     $this->db->insert('arch_setting', $data);
 }
 public function update_no3_khtab($id)
 {
   $data['title'] =$this->input->post('no3_khtab');
  
   $data['from_code'] = 201;
     $this->db->where('id',$id)->update('arch_setting', $data);
 }
public function GetFromGeneral_settings_no3_khtab($id)
{
 $this->db->select('*');
 $this->db->from('arch_setting');
 $this->db->where('from_code', 201);
 $this->db->where('id', $id);
 $query = $this->db->get()->row();

 return $query;
}
 ///////////////////
 public function add_morfq()
 {
     $data['title'] =$this->input->post('morfq');
  
     $data['from_code'] = 501;
     $this->db->insert('arch_setting', $data);
 }
 public function update_morfq($id)
 {
   $data['title'] =$this->input->post('morfq');
  
   $data['from_code'] = 501;
     $this->db->where('id',$id)->update('arch_setting', $data);
 }
public function GetFromGeneral_settings_morfq($id)
{
 $this->db->select('*');
 $this->db->from('arch_setting');
 $this->db->where('from_code', 501);
 $this->db->where('id', $id);
 $query = $this->db->get()->row();

 return $query;
}
////////////////////////////////////////
public function add_reason_setting()
{
    $data['title'] =$this->input->post('reason_setting');
 
    $data['from_code'] = 701;
    $this->db->insert('arch_setting', $data);
}
public function update_reason_setting($id)
{
  $data['title'] =$this->input->post('reason_setting');
 
  $data['from_code'] = 701;
    $this->db->where('id',$id)->update('arch_setting', $data);
}
public function GetFromGeneral_reason_setting($id)
{
$this->db->select('*');
$this->db->from('arch_setting');
$this->db->where('from_code', 701);
$this->db->where('id', $id);
$query = $this->db->get()->row();

return $query;
}

////////////////////////////////////
public function add_title()
 {
     $data['title'] =$this->input->post('title');
  
     $data['from_code'] = 601;
     $this->db->insert('arch_setting', $data);
 }
 public function update_title($id)
 {
   $data['title'] =$this->input->post('title');
  
   $data['from_code'] = 601;
     $this->db->where('id',$id)->update('arch_setting', $data);
 }
public function GetFromGeneral_settings_title($id)
{
 $this->db->select('*');
 $this->db->from('arch_setting');
 $this->db->where('from_code', 601);
 $this->db->where('id', $id);
 $query = $this->db->get()->row();

 return $query;
}

}// END CLASS