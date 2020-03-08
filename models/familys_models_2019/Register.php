<?php
class Register extends CI_Model
{
    public function __construct() {
        parent::__construct();
    }
//---------------------------------------------
    public function inserted(){
         $data['user_name']=$this->input->post('user_name');
         $password=$this->input->post('user_password',true);
         $password=sha1(md5($password));
         $data['user_password'] = $password;
         $data['mother_mob']=$this->input->post('mother_mob');   
         $data['mother_national_num'] = $this->input->post('mother_national_num');
         $data['register_place']=$this->input->post('register_place');
         $data['date_registration'] =strtotime(date("Y-m-d",time()));
         $data['date'] =strtotime(date("Y-m-d",time()));
         $data['date_s']= time();
       $this->db->insert('basic',$data);
    }
    
    
    public function select_last_mother(){

        $this->db->select('*');
        $this->db->from('basic');
        $this->db->order_by('id','DESC');
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data[0]->mother_national_num;
        }
        return false;
    }
    
    
       public function select_last_id(){

        $this->db->select('*');
        $this->db->from('basic');
        $this->db->order_by('id','DESC');
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data[0]->id;
        }
        return false;
    }
    
public function get_by_id($id)
{
$this->db->where('id',$id);
return $this->db->get('basic')->row();	
}

//---------------------------------------------
  public function updated($id){
    
    if($this->input->post('user_password')){
    $password=$this->input->post('user_password',true);
    $password=sha1(md5($password));
    $data['user_password'] = $password;  
    }else{
        
    }
     $data['mother_national_num']=$this->input->post('mother_national_num');
     $data['user_name']=$this->input->post('user_name');
     $data['mother_mob']=$this->input->post('mother_mob'); 
     $data['date'] =strtotime(date("Y-m-d",time()));
     $data['date_s']= time();
     $data['publisher']=$_SESSION['user_name'];  
        $this->db->where('id', $id);
        $this->db->update('basic',$data);
  }
 //--------------------------------------------
 public function update_pass($id){
            $password=$this->input->post('user_password',true);
            $password=sha1(md5($password));
            $data['user_password'] = $password;
        $this->db->where('mother_national_num', $id);
        $this->db->update('basic',$data);
 } 
 
 //=========================================================
    public function delete($id){

        $this->db->where('id',$id);
        $this->db->delete('basic');

    }
 
/**
 * ===============================================================================================================
 * 
 * 
 *  */
 public function select_data(){
        $this->db->select('*');
        $this->db->from('mother');
        $this->db->order_by('id',"ASC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->mother_national_num_fk] = $row;
            }
            return $data;
        }
        return false;
    }
 //----------------------------------------
  public function select_data_basic(){
        $this->db->select('*');
        $this->db->from('basic');
        $this->db->order_by('id',"ASC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    } 
 
 //-----------------------------------------
 public function select_data_father(){
        $this->db->select('*');
        $this->db->from('father');
        $this->db->order_by('id',"ASC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->mother_national_num_fk] = $row;
            }
            return $data;
        }
        return false;
    } 
 //---------------------------------------
 public function check_regester_data(){
        $this->db->select('*');
        $this->db->from('basic');
        $this->db->where('mother_national_num',$this->input->post('user_name'));
        $this->db->where('user_password',sha1(md5($this->input->post('user_pass'))));
        $query=$this->db->get();
        if($query->num_rows()>0){
            return $query->row_array();
        }else{
            return false;
        }
 }  
 //----------------------------------------
  public function family($case){
 $this->db->select('basic.* ,
                  devices.mother_national_num_fk as dev_id,
                  father.mother_national_num_fk as fat_id,father.f_first_name,
                  financial.mother_national_num_fk as mon_id ,
                  houses.mother_national_num_fk as hos_id,
                  mother.mother_national_num_fk as mother_id,mother.m_first_name,
                  mother.m_father_name,mother.m_grandfather_name,mother.m_family_name');
      $this->db->from('basic'); 
      $this->db->join('devices', ' devices.mother_national_num_fk = basic.mother_national_num');
      $this->db->join('father', ' father.mother_national_num_fk = basic.mother_national_num');
      $this->db->join('houses', ' houses.mother_national_num_fk = basic.mother_national_num');
      $this->db->join('financial', ' financial.mother_national_num_fk = basic.mother_national_num');
      $this->db->join('mother', ' mother.mother_national_num_fk = basic.mother_national_num', 'left');
      $this->db->where("basic.suspend",$case);
      $this->db->group_by('basic.mother_national_num');
      $query = $this->db->get(); 
            if($query->num_rows() != 0)
            {   foreach ($query->result() as $row) {
                 $data[] = $row;
                 }
            return $data;
            }
            else
            {
                return false;
            }
  }
  
   
  //------------------------------------------------------------------------------
  public function all_archive(){
 $this->db->select('basic.* ,
                  devices.mother_national_num_fk as dev_id,
                  father.mother_national_num_fk as fat_id,father.f_first_name,
                  financial.mother_national_num_fk as mon_id ,
                  houses.mother_national_num_fk as hos_id,
                  mother.mother_national_num_fk as mother_id,mother.m_first_name,
                  mother.m_father_name,mother.m_grandfather_name,mother.m_family_name');
      $this->db->from('basic'); 
      $this->db->join('devices', ' devices.mother_national_num_fk = basic.mother_national_num');
      $this->db->join('father', ' father.mother_national_num_fk = basic.mother_national_num');
      $this->db->join('houses', ' houses.mother_national_num_fk = basic.mother_national_num');
      $this->db->join('financial', ' financial.mother_national_num_fk = basic.mother_national_num');
      $this->db->join('mother', ' mother.mother_national_num_fk = basic.mother_national_num', 'left');
      $this->db->group_by('basic.mother_national_num');
      $query = $this->db->get(); 
            if($query->num_rows() != 0)
            {   foreach ($query->result() as $row) {
                 $data[] = $row;
                 }
            return $data;
            }
            else
            {
                return false;
            } 
  }
  //------------------------  8-11  ---------------
    public function check_donor_regester(){
        $this->db->select('*');
        $this->db->from('donors_t');
        $this->db->where('user_name',$this->input->post('user_name'));
        $this->db->where('password',sha1(md5($this->input->post('user_pass'))));
        $this->db->where('approve',1);
     //   $this->db->where('type',$type);
        $query=$this->db->get();
        if($query->num_rows()>0){
            return $query->row_array();
        }else{
            return false;
        }
    }  
  //-------------------------------------------------
    public function update_publisher($mother_national_num ,$publisher){
           $data['publisher'] = $publisher;
        $this->db->where('mother_national_num', $mother_national_num);
        $this->db->update('basic',$data);    
    }
}// END CLASS 