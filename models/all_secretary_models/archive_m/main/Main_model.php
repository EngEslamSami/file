<?php
class Main_model extends CI_Model
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
    public function select_new_wared()
    {
        $this->db->select('*');
        $this->db->from('arch_wared_history');
       // $this->db->where('seen',1);
       if($_SESSION['role_id_fk']==3)
       {
        $this->db->where('to_user_id',$_SESSION['emp_code']);
       }
        $this->db->where('readed',0);
        $this->db->where('suspend',0);
        $query = $this->db->get()->result();
        return $query;
    }
  
    public function select_new_sader()
    {
        $this->db->select('*');
        $this->db->from('arch_sader_history');
        //$this->db->where('seen',1);
        if($_SESSION['role_id_fk']==3)
        {
         $this->db->where('to_user_id',$_SESSION['emp_code']);
        }
        $this->db->where('readed',0);
        $this->db->where('suspend',0);
        $query = $this->db->get()->result();
        return $query;
    }
    public function select_end_wared()
    {
        $this->db->select('*');
        $this->db->from('arch_wared_history');
        if($_SESSION['role_id_fk']==3)
        {
         $this->db->where('to_user_id',$_SESSION['emp_code']);
        }
        $this->db->where('suspend',4);
        $query = $this->db->get()->result();
        return $query;
    }
    public function select_end_sader()
    {
        $this->db->select('*');
        $this->db->from('arch_sader_history');
        if($_SESSION['role_id_fk']==3)
        {
         $this->db->where('to_user_id',$_SESSION['emp_code']);
        }
        $this->db->where('suspend',4);
        $query = $this->db->get()->result();
        return $query;
    }
    public function select_wared_mostalm()
    {
        $this->db->select('*');
        $this->db->from('arch_wared_history');
        if($_SESSION['role_id_fk']==3)
        {
         $this->db->where('to_user_id',$_SESSION['emp_code']);
        }
       // $this->db->where('seen',1);
        $this->db->where('readed',1);
        $this->db->where('suspend',0);
        $query = $this->db->get()->result();
        return $query;
    }
    public function select_sader_mostalm()
    {
        $this->db->select('*');
        $this->db->from('arch_sader_history');
        if($_SESSION['role_id_fk']==3)
        {
         $this->db->where('to_user_id',$_SESSION['emp_code']);
        }
        //$this->db->where('seen',1);
        $this->db->where('readed',1);
        $this->db->where('suspend',0);
        $query = $this->db->get()->result();
        return $query;
    }
    //nagwa
    public function get_table($table,$arr){
        if (!empty($arr)){
            $this->db->where($arr);
        }
        $query = $this->db->get($table);
        if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query->result() as $row){
                $data[$i]= $row;
                if($table=='arch_sader_history'){
                    $data_table = 'arch_sader';
                    $row_id = 'sader_id_fk' ;
                } elseif ($table=='arch_wared_history'){
                    $data_table = 'arch_wared';
                    $row_id = 'wared_id_fk' ;
                }
                else{
                    $data_table='';
                    $row_id ='';
                }
                $data[$i]->data = $this->get_tahwel_data($data_table,array('id'=>$row->$row_id));
                $i++;
            }
            return $data;
        }else{
            return false;
        }
    }
    public  function get_tahwel_data($table,$arr){
        $this->db->where($arr);
        $query = $this->db->get($table);
        if ($query->num_rows()>0){
            return $query->row();
        } else{
            return false;
        }
    }
    //yara
    public function get_updates($table,$arr){
        $this->db->where($arr);
        $query = $this->db->get($table);
        if ($query->num_rows()>0){
            return $query->result();
        } else{
            return false;
        }
    }
    public function get_updates_wared($table,$arr,$from_date,$to_date,$reply_moamla,$no3_khtab,$title_name,$tarekt_estlam_name,$is_secret,$awlawya,$need_follow){
        $this->db->where($arr);
        if(!empty($from_date))
        {
        $this->db->where('tsgeel_date >=',$from_date);
        }
        if(!empty($to_date))
        {
        $this->db->where('tsgeel_date <=',$to_date);
        }
        if(!empty($reply_moamla))
        {
        $this->db->where('reply_moamla',$reply_moamla);
        }
        if(!empty($no3_khtab))
        {
        $this->db->where('no3_khtab_fk',$no3_khtab);
        }
        if(!empty($title_name))
        {
        $this->db->where('title_id_fk',$title_name);
        }
        if(!empty($tarekt_estlam_name))
        {
        $this->db->where('tarekt_estlam',$tarekt_estlam_name);
        }
        if(!empty($is_secret))
        {
        $this->db->where('is_secret',$is_secret);
        }
        if(!empty($awlawya))
        {
        $this->db->where('awlawya',$awlawya);
        }
        if(!empty($need_follow))
        {
        $this->db->where('need_follow',$awlawya);
        }
        $query = $this->db->get($table);
        if ($query->num_rows()>0){
            return $query->result();
        } else{
            return false;
        }
    }
    public function get_updates_sader($table,$arr,$from_date,$to_date,$reply_moamla,$no3_khtab,$title_name,$tarekt_estlam_name,$is_secret,$awlawya,$need_follow){
        $this->db->where($arr);
        if(!empty($from_date))
        {
        $this->db->where('tasgel_date >=',$from_date);
        }
        if(!empty($to_date))
        {
        $this->db->where('tasgel_date <=',$to_date);
        }
        if(!empty($reply_moamla))
        {
        $this->db->where('mo3mla_reply',$reply_moamla);
        }
        if(!empty($no3_khtab))
        {
        $this->db->where('no3_khtab_fk',$no3_khtab);
        }
        if(!empty($title_name))
        {
        $this->db->where('title_id_fk',$title_name);
        }
        if(!empty($tarekt_estlam_name))
        {
        $this->db->where('tarekt_ersal_fk',$tarekt_estlam_name);
        }
        if(!empty($is_secret))
        {
        $this->db->where('is_secret',$is_secret);
        }
        if(!empty($awlawya))
        {
        $this->db->where('awlawia_fk',$awlawya);
        }
        if(!empty($need_follow))
        {
        $this->db->where('need_follow',$awlawya);
        }
        $query = $this->db->get($table);
        if ($query->num_rows()>0){
            return $query->result();
        } else{
            return false;
        }
    }
    //////////////////////////////6-2--2020////////////////////////////////////////
    public function get_sader_by_id($id)
{
    $this->db->where('id',$id);
   return $this->db->get('arch_sader_history')->row();
}
public function get_wared_by_id($id)
{
    $this->db->where('id',$id);
   return $this->db->get('arch_wared_history')->row();
}
public function update_mo3mla_sader($id)
{
    $data['readed'] =1;
    $data['readed_date_ar'] =date('Y-m-d H:i:s');
      $this->db->where('id',$id)->update('arch_sader_history', $data);
}
public function update_mo3mla_wared($id)
{
    $data['readed'] =1;
    $data['readed_date_ar'] =date('Y-m-d H:i:s');
    $this->db->where('id',$id)->update('arch_wared_history', $data);
}
public function end_mo3mla_sader($id)
{
    $data['suspend']=4;
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
      $this->db->where('id',$id)->update('arch_sader_history', $data);
}
public function end_mo3mla_wared($id)
{
    $data['suspend']=4;
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
    $this->db->where('id',$id)->update('arch_wared_history', $data);
}
public function get_id($table, $where, $id, $select)
{
    $h = $this->db->get_where($table, array($where => $id));
    $arr = $h->row_array();
    return $arr[$select];
}
}
?>