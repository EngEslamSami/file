<?php
class Geha_model extends CI_Model
{
 public function insert()
 {

  $data['tasnef_id_fk']=$this->input->post('tasnef_id_fk');
  $data['tasnef_n']=$this->input->post('tasnef_n');
     $data['name']=$this->input->post('name');
     $data['phone']=$this->input->post('phone');
     $data['gwal']=$this->input->post('gwal');
     $data['email']=$this->input->post('email');
     $data['code']=$this->input->post('code');
     $data['status']=$this->input->post('status');
     $data['fax']=$this->input->post('fax');


     $this->db->insert('arch_gehat',$data);
     
     
   
 }
 public function select_all_gehat()
 {
  return $this->db->get('arch_gehat')->result();
 }
 public function get_by_id($id)
{
    $this->db->where('id',$id);
   return $this->db->get('arch_gehat')->row();

}
public function update($id)
{
  $data['tasnef_id_fk']=$this->input->post('tasnef_id_fk');
  $data['tasnef_n']=$this->input->post('tasnef_n');
     $data['name']=$this->input->post('name');
     $data['phone']=$this->input->post('phone');
     $data['gwal']=$this->input->post('gwal');
     $data['email']=$this->input->post('email');
     $data['code']=$this->input->post('code');
     $data['status']=$this->input->post('status');
     $data['fax']=$this->input->post('fax');
    
  
   $this->db->where('id',$id);
    $this->db->update('arch_gehat',$data);

}
public function delete($id)
{
    
   $this->db->where('id',$id);
   $this->db->delete('arch_gehat');

}


public function add_ms2ol($id)
{

  $data['geha_id_fk']=$id;
         $data['safms2ol_name']=$this->input->post('safms2ol_name');
        $data['safms2ol_fk']=$this->input->post('safms2ol_fk');
     $data['name']=$this->input->post('name');
     $data['phone']=$this->input->post('phone');
     $data['gwal']=$this->input->post('gwal');
     $data['email']=$this->input->post('email');
     $data['fax']=$this->input->post('fax');
     $data['notes']=$this->input->post('notes');
     $data['address']=$this->input->post('address');


     $this->db->insert(' arch_gehat_ms2olen',$data);
     

}
public function get_by_id_ms2olen($id)
{
  $this->db->where('geha_id_fk',$id);
   return $this->db->get('arch_gehat_ms2olen')->result();

}
public function delete_ms2ol($id)
{
    
   $this->db->where('id',$id);
   $this->db->delete('arch_gehat_ms2olen');

}
public function get_ms2ol($id)
{
  $this->db->where('id',$id);
  return $this->db->get('arch_gehat_ms2olen')->row();


}

public function update_ms2ol($id)
{

 
  $data['name']=$this->input->post('name');
  $data['phone']=$this->input->post('phone');
  $data['gwal']=$this->input->post('gwal');
  $data['email']=$this->input->post('email');
  $data['fax']=$this->input->post('fax');
  $data['notes']=$this->input->post('notes');
  $data['address']=$this->input->post('address');

        $data['safms2ol_name']=$this->input->post('safms2ol_name');
        $data['safms2ol_fk']=$this->input->post('safms2ol_fk');
        
  $this->db->where('id',$id)->update(' arch_gehat_ms2olen',$data);

}
 
 public function get_all_main_dest($id) {
     
   $this->db->where('type_id_fk',$id);
   return $this->db->get('office_setting')->result();
     
 }



public function add() {
    $data['name']=$this->input->post('main_trait');
     $data['mob']=0;
     $data['email']=0;
   
     $data['fax']=0;
     $data['type_id_fk']=2;
     $data['address']=0;
     $this->db->insert('office_setting',$data);
}
public function get_all_main_trait() {
   $this->db->where('form_id',0);
   //$this->db->where('type_id_fk',2);
   return $this->db->get('office_setting')->result();
     
 }
 public function add_branch() {
     $data['form_id']=$this->input->post('main_trait');
     $data['name']=$this->input->post('branch_trait');
     $data['mob']=0;
     $data['email']=0;
   
     $data['fax']=0;
     $data['type_id_fk']=2;
     $data['address']=0;
      $this->db->insert('office_setting',$data);
     
     
 }
 public function get_all_branch() {
     $this->db->where('form_id',0);
     $this->db->where('type_id_fk',2);
   $query=$this->db->get('office_setting')->result();
    
    
     $data=array();
     $x=0;
     //S$this->db->where('from_id',0)
   foreach($query as $row){
     $data[$x]=$row;  
     $data[$x]->branch=$this->get_by_from_id($row->id);
     $x++;
     
   }
   return $data;
  
   
   
     
 }
 public function get_by_from_id($id) {
     
    $this->db->where('form_id',$id);
   
   return $this->db->get('office_setting')->result();
 }

 public function select_geha()
 {
  $this->db->where('from_code',301);
   return $this->db->get('arch_setting')->result();

 }
 public function add_geha_type()
    {
        $data['title'] =$this->input->post('geha_type');
     
        $data['from_code'] = 301;
        $this->db->insert('arch_setting', $data);
    }
    public function update_geha_type($id)
    {
      $data['title'] =$this->input->post('geha_type');
     
      $data['from_code'] = 301;
        $this->db->where('id',$id)->update('arch_setting', $data);
    }
/*public function GetFromGeneral_settings($id)
{
    $this->db->select('*');
    $this->db->from('arch_setting');
    $this->db->where('from_code', 301);
    $this->db->where('id', $id);
    $query = $this->db->get()->row();
   
    return $query;
}*/
  public function GetFromGeneral_settings($id,$from_code=301)
    {
        $this->db->select('*');
        $this->db->from('arch_setting');
        $this->db->where('from_code', $from_code);
        $this->db->where('id', $id);
        $query = $this->db->get()->row();

        return $query;
    }
 public function delete_setting($id)
    {

        $this->db->where("id", $id);
        $this->db->delete("arch_setting");
    }
    
    
    
    
    public function select_search_key($table, $search_key, $search_key_value)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($search_key, $search_key_value);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {

            foreach ($query->result() as $row) {

                $data[] = $row;

            }
            return $data;
        }
        return false;
    }

    public function add_safms2ol()
    {
        $data['title'] = $this->input->post('safms2ol');
        $data['from_code'] = 1001;
        $this->db->insert('arch_setting', $data);
    }


    public function update_safms2ol($id)
    {
        $data['title'] = $this->input->post('safms2ol');
        $data['from_code'] = 1001;
        $this->db->where('id', $id)->update('arch_setting', $data);
    }

    public function add_gehat_ektsas($id)
    {
        $data['geha_id_fk']=$id;
        $data['name']=$this->input->post('name');

        $data['date']    =  strtotime(date("Y/m/d"));
        $data['publisher']=$_SESSION['user_id'];
        $data['publisher_name']= $this->getUserName($_SESSION['user_id']);

        $this->db->insert('arch_gehat_ektsas',$data);
    }

    public function get_by_id_ektsas($table,$idname,$idvalue)
    {
        $this->db->where($idname,$idvalue);
        return $this->db->get($table)->row();
    }


    public function getbyid_ektsas($id)
    {
        $this->db->where('geha_id_fk',$id);
        return $this->db->get('arch_gehat_ektsas')->result();

    }

    public function update_gehat_ektsas($id)
    {
        $data['name']=$this->input->post('name');

        $data['date']    =  strtotime(date("Y/m/d"));
        $data['publisher']=$_SESSION['user_id'];
        $data['publisher_name']= $this->getUserName($_SESSION['user_id']);
        $this->db->where('id',$id)->update('arch_gehat_ektsas',$data);
    }

    public function delete_gehat_ektsas($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('arch_gehat_ektsas');
    }

    public function getUserName($user_id)
    {
        $sql = $this->db->where("user_id", $user_id)->get('users');
        if ($sql->num_rows() > 0) {
            $data = $sql->row();
            if ($data->role_id_fk == 1 ) {
                return $data->user_username;
            }  elseif ($data->role_id_fk == 3) {
                $id = $data->emp_code;
                $table = 'employees';
                $field = 'employee';
            }
            return $this->getUserNameByRoll($id, $table, $field);
        }
        return false;

    }

    public function getUserNameByRoll($id, $table, $field)
    {
        return $this->db->where('id', $id)->get($table)->row_array()[$field];
    }
}
