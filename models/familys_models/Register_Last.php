<?php
class Register extends CI_Model
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
  public function inserted_reg(){
        $data['user_name']=$this->input->post('user_name');
        $password=$this->input->post('user_password',true);
        $password=sha1(md5($password));  
        $data['user_password'] = $password;
         $data['mother_mob']= $this->chek_Null($this->input->post('mother_mob'));  
        $data['n_name'] = $this->input->post('user_password',true);
        $data['mother_national_num'] = $this->chek_Null($this->input->post('mother_national_num'));
        $data['register_place']=$this->chek_Null($this->input->post('register_place'));
        $data['date_registration'] =strtotime(date("Y-m-d",time()));
        $data['date'] =strtotime(date("Y-m-d",time()));
        $data['date_s']= time();
        
        
        $data['bank_ramz']=$this->chek_Null($this->input->post('bank_ramz'));
        $explode=explode("-",$this->input->post('bank_account_id'));
        $data['bank_account_id'] =$explode[0];
        
        
        $data['bank_account_num'] =$this->chek_Null($this->input->post('wakeel_bank_num'));
        $data['person_account']=$this->input->post('person_account');
        $data['person_response']=0; // ���� 
        $data['publisher']=$_SESSION['user_name'];  
          
      $this->db->insert('basic',$data);
  }
  
    public function inserted_reg_wakel(){
        $data['user_name']= $this->input->post('mother_national_num');
        $password=$this->input->post('user_password',true);
        $password=sha1(md5($password));  
        $data['user_password'] = $password;
        $data['mother_mob']=$this->input->post('mother_mob');  
        $data['n_name'] = $this->input->post('user_password',true);
        $data['mother_national_num'] = $this->input->post('mother_national_num');
        $data['register_place']=$this->input->post('register_place');
        $data['date_registration'] =strtotime(date("Y-m-d",time()));
        $data['date'] =strtotime(date("Y-m-d",time()));
        $data['date_s']= time();
        
        
        $data['bank_ramz']=$this->input->post('bank_ramz');
        $explode=explode("-",$this->input->post('bank_account_id'));
        $data['bank_account_id'] =$explode[0];
        
        
        $data['bank_account_num'] =$this->chek_Null($this->input->post('wakeel_bank_num'));
        $data['person_account']=$this->input->post('agent_bank_account');
        $data['person_response']=1; // ���� 
        $data['publisher']=$_SESSION['user_name'];  
          
          $data['agent_name']=$this->input->post('agent_name');
            $data['agent_mob']=$this->input->post('agent_mob');
$data['agent_card']=$this->input->post('agent_card');
$data['agent_card_source']=$this->input->post('agent_card_source');
$data['agent_relationship']=$this->chek_Null($this->input->post('agent_relationship'));
$data['agent_bank_account']=$this->chek_Null($this->input->post('agent_bank_account'));
          
          
          
      $this->db->insert('basic',$data);
  }
  
  





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
         $data['date_suspend']=$this->input->post('date_suspend');
        $data['file_num']=$this->input->post('file_num');
        $data['file_update_date']=$this->input->post('update_date');

 $data['bank_ramz']=$this->input->post('bank_ramz');



        $explode=explode("-",$this->input->post('bank_account_id'));
         $data['bank_account_id'] =$explode[0];
	 
	 
        $data['bank_account_num'] =$this->chek_Null($this->input->post('wakeel_bank_num'));

         
         
/****************ahmed*/

$data['peroid_update']=$this->input->post('peroid_update');
$data['person_response']=$this->input->post('person_response');
$data['person_account']=$this->input->post('person_account');
$data['agent_name']=$this->input->post('agent_name');
$data['agent_card']=$this->input->post('agent_card');
$data['agent_card_source']=$this->input->post('agent_card_source');
$data['agent_relationship']=$this->chek_Null($this->input->post('agent_relationship'));
$data['agent_bank_account']=$this->chek_Null($this->input->post('agent_bank_account'));
//$data['bank_account_id'] =$this->chek_Null($this->input->post('bank_account_id'));


/****************ahmed*/
         
         
         
       $this->db->insert('basic',$data);
    }
    
    
    
    	
/*	 public function update_status()
    {
        $mother_num=$this->input->post('mother_national');
        $data['peroid_update']=$this->input->post('peroid_update');
        $data['date_suspend']=$this->input->post('date_suspend');
        $data['file_num']=$this->input->post('file_num');
        $data['file_update_date']=$this->input->post('update_date');
        $this->db->where('id', $mother_num);
        $this->db->update('basic',$data);

    }*/
    
        public function update_status() //old
    {
       
        $mother_num=$this->input->post('mother_national');
        $data['mother_national_num_fk']=$mother_num;
        $data['from_date']=strtotime($this->input->post('last_update_date'));
        $data['peroid']=$this->input->post('peroid_update');
        $data['to_date']=strtotime($this->input->post('update_date'));

        $this->db->insert('update_family_files_details',$data);
        $data2['file_update_date']=$this->input->post('update_date');
        $this->db->where('mother_national_num', $mother_num);
        $this->db->update('basic',$data2);


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
    public function get_from_files_option_updates()
{
    return $this->db->get('files_option_updates')->result();
}

    
public function get_by_id($id)
{
$this->db->where('id',$id);
return $this->db->get('basic')->row();	
}


    public function get_by_mother_national_num($id)
    {
        $this->db->where('mother_national_num',$id);
        return $this->db->get('basic')->row_array();
    }



    public function get_file_num()
{
  /*  $this->db->select_max('file_num');
    $this->db->where('suspend',4);
   $query=$this->db->get('basic');


    return $query->row()->file_num;
*/

$this->db->select_max('file_num');
 $this->db->where('suspend',4); 
$result = $this->db->get('basic')->row(); 
   
return $result->file_num;


}
/*	public function get_file_num()
{
    $this->db->select('file_num');
    $this->db->where('suspend',4);
    $this->db->order_by('id','DESC');

    return $this->db->get('basic')->row()->file_num;
     
}*/
/*
    public function get_file_num()
{
    $this->db->select('file_num');
    $this->db->where('suspend', 4);
    $this->db->order_by('id','DESC');

    $query= $this->db->get('basic');
    if($query->num_rows()>0){
        return $query->row()->file_num;
    }else{
        return -1;
  }
}
*/

//---------------------------------------------
  public function updated($id){
    
    if($this->input->post('user_password')){
    $password=$this->input->post('user_password',true);
    $password=sha1(md5($password));
    $data['user_password'] = $password;  
    }else{
        
    }
    
 $data['peroid_update']=$this->input->post('peroid_update');   
/****************ahmed*/
$data['person_response']=$this->input->post('person_response');
$data['person_account']=$this->input->post('person_account');
$data['agent_name']=$this->input->post('agent_name');
$data['agent_card']=$this->input->post('agent_card');
$data['agent_card_source']=$this->input->post('agent_card_source');
$data['agent_relationship']=$this->input->post('agent_relationship');
$data['agent_bank_account']=$this->input->post('agent_bank_account');
//$data['bank_account_id']=$this->input->post('bank_account_id');
      $data['date_suspend']=$this->input->post('date_suspend');
      $data['file_num']=$this->input->post('file_num');
      $data['file_update_date']=$this->input->post('update_date');

/****************ahmed*/
$data['bank_ramz']=$this->input->post('bank_ramz');

        $explode=explode("-",$this->input->post('bank_account_id'));
         $data['bank_account_id'] =$explode[0];
	 
	 
        $data['bank_account_num'] =$this->chek_Null($this->input->post('wakeel_bank_num'));

         


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
      /*
        //===== basic table ======
        $this->db->where('mother_national_num',$id);
        $this->db->delete('basic');
        //===== mother table ======
        $this->db->where('mother_national_num_fk',$id);
        $this->db->delete('mother');
        //===== father table ======
        $this->db->where('mother_national_num_fk',$id);
        $this->db->delete('father');        
        //===== houses table ======
        $this->db->where('mother_national_num_fk',$id);
        $this->db->delete('houses'); 
        //=====  f_members table ======
        $this->db->where('mother_national_num_fk',$id);
        $this->db->delete('f_members');
        //=====  financial table ======
        $this->db->where('mother_national_num_fk',$id);
        $this->db->delete('financial');
        //=====  devices table ======
        $this->db->where('mother_national_num_fk',$id);
        $this->db->delete('devices');  
        //=====  family_attach_files table ======
        $this->db->where('mother_national_num_fk',$id);
        $this->db->delete('family_attach_files');
        
        //======== researcher_opinion =========
        $this->db->where('mother_national_num_fk',$id);
        $this->db->delete('researcher_opinion');
        
        
        
        
        //====== ����� ������ =====
        //=====  electrical_device_order table ======
        $this->db->where('mother_national_id_fk',$id);
        $this->db->delete('electrical_device_order');  
              
        //=====  electrical_device_order table ======
        $this->db->where('mother_national_id_fk',$id);
        $this->db->delete('electrical_fatora_order');  
                      
        //=====  maintenance_electrical_device_order table ======
        $this->db->where('mother_national_id_fk',$id);
        $this->db->delete('maintenance_electrical_device_order');  
           
        //=====  furniture_order table ======
        $this->db->where('mother_national_id_fk',$id);
        $this->db->delete('furniture_order');  
          
        //=====  furniture_order table ======
        $this->db->where('mother_national_id_fk',$id);
        $this->db->delete('water_fatora_order');  
          
        //=====  cars_repairs_order table ======
        $this->db->where('mother_national_id_fk',$id);
        $this->db->delete('cars_repairs_order'); 
         
        //=====  home_repairs_order table ======
        $this->db->where('mother_national_id_fk',$id);
        $this->db->delete('home_repairs_order');  
          
        //=====  restore_repairs_order table ======
        $this->db->where('mother_national_id_fk',$id);
        $this->db->delete('restore_repairs_order');  
        
        //=====  haj_omra_order table ======
        $this->db->where('mother_national_id_fk',$id);
        $this->db->delete('haj_omra_order'); 
         
        //=====  health_care_orders table ======
        $this->db->where('mother_national_id_fk',$id);
        $this->db->delete('health_care_orders'); 
                 
        //=====  insurance_medical_device_orders table ======
        $this->db->where('mother_national_id_fk',$id);
        $this->db->delete('insurance_medical_device_orders'); 
          
        //=====  school_supplies_order table ======
        $this->db->where('mother_national_id_fk',$id);
        $this->db->delete('school_supplies_order');
        
        //=====  marriage_help table ======
        $this->db->where('mother_national_id_fk',$id);
        $this->db->delete('marriage_help');
        
        //=====  medical_center table ======
        $this->db->where('mother_national_id_fk',$id);
        $this->db->delete('medical_center');
        
        //=====  electronic_card table ======
        $this->db->where('mother_national_id_fk',$id);
        $this->db->delete('electronic_card');    
         */
         
   $update['deleted'] = 1;
     $this->db->where('mother_national_num', $id);
   $this->db->update('basic',$update);
  
  
   $dataa['mother_national_id_fk']  = $id;
  $dataa['deleted_date']         = strtotime(date("Y-m-d"));
 $dataa['deleted_date_s']       = time();  ;
 $dataa['deleted_date_ar']      = date("Y-m-d"); 
 $dataa['publisher']    = $_SESSION['user_id'];; 

$this->db->insert('family_deleted',$dataa); 
   
   /********************************************/
 
    }

   public function uppdate_delet_basic($id){
    
       $update['deleted'] = 0;
     $this->db->where('mother_national_num', $id);
   $this->db->update('basic',$update);
    
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
 /* public function select_data_basic(){
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
    } */
    
          public function select_data_basic_order(){
        $this->db->select('*');
        $this->db->from('basic');
        $this->db->where('deleted',0);
        $this->db->where('suspend',0);
        $this->db->order_by('id',"desc");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query->result() as $row) {
                  $data[$i] = $row;
                  $data[$i]->mother_name = $this->get_mother_name($row->mother_national_num);
                   $data[$i]->mother_new_card = $this->get_mother_n_card($row->mother_national_num);
                  $data[$i]->father_name = $this->get_father_name($row->mother_national_num);
                   $data[$i]->father_national = $this->get_father_national($row->mother_national_num);
                  
                  
                $i++;
            }
            return $data;
        }
        return false;
    } 
 
            public function select_data_new_family(){
        $this->db->select('*');
        $this->db->from('basic');
        $this->db->where('deleted',0);
        $this->db->where('suspend !=',0);
        $this->db->where('suspend !=',4);
        $this->db->order_by('id',"desc");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query->result() as $row) {
                  $data[$i] = $row;
                  $data[$i]->mother_name = $this->get_mother_name($row->mother_national_num);
                   $data[$i]->mother_new_card = $this->get_mother_n_card($row->mother_national_num);
                   $data[$i]->father_name = $this->get_father_name($row->mother_national_num);
                      $data[$i]->father_national = $this->get_father_national($row->mother_national_num);
                $i++;
            }
            return $data;
        }
        return false;
    }   
    
    
    
    
      public function select_data_basic(){
        $this->db->select('*');
        $this->db->from('basic');
        $this->db->where('deleted',0);
        $this->db->order_by('id',"desc");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query->result() as $row) {
                  $data[$i] = $row;
                  $data[$i]->mother_name = $this->get_mother_name($row->mother_national_num);
                  $data[$i]->mother_new_card = $this->get_mother_n_card($row->mother_national_num);
                  
                   $data[$i]->father_name = $this->get_father_name($row->mother_national_num);
                   $data[$i]->father_national = $this->get_father_national($row->mother_national_num);
                   $data[$i]->file_opration = $this->select_operation($row->mother_national_num);
                   $data[$i]->transformation_lagna = $this->select_transformation_lagna($row->mother_national_num);

                $i++;
            }
            return $data;
        }
        return false;
    } 
 
        public  function get_mother_name($mother_national_num_fk){
    
        $h = $this->db->get_where("mother", array('mother_national_num_fk'=>$mother_national_num_fk));
        $arr= $h->row_array();
        return $arr['full_name'];

    }
 
 
 
         public  function get_mother_n_card($mother_national_num_fk){
    
        $h = $this->db->get_where("mother", array('mother_national_num_fk'=>$mother_national_num_fk));
        $arr= $h->row_array();
        return $arr['mother_national_card_new'];

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
    
    /***************************************/
    
        public function select_data_basic_deleted(){
        $this->db->select('*');
        $this->db->from('basic');
     //   $this->db->where('suspend',4);
        $this->db->where('deleted',1);
        $this->db->order_by('id',"ASC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                 $data[$i]->mother_name = $this->get_mother_name($row->mother_national_num);
                  $data[$i]->mother_new_card = $this->get_mother_n_card($row->mother_national_num);
                  $data[$i]->father_name = $this->get_father_name($row->mother_national_num);
                  $data[$i]->father_national = $this->get_father_national($row->mother_national_num);
                 $i++;
            }
            return $data;
        }
        return false;
    } 
    
    
       public function select_data_basic_accepted(){
        $this->db->select('*');
        $this->db->from('basic');
        $this->db->where('suspend',4);
        $this->db->where('deleted',0);
        $this->db->order_by('id',"ASC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                 $data[$i]->mother_name = $this->get_mother_name($row->mother_national_num);
                  $data[$i]->mother_new_card = $this->get_mother_n_card($row->mother_national_num);
                  $data[$i]->father_name = $this->get_father_name($row->mother_national_num);
                     $data[$i]->father_national = $this->get_father_national($row->mother_national_num);
                     $data[$i]->files_status_color = $this->get_files_status_setting($row->file_status);
                      $data[$i]->file_opration = $this->select_operation($row->mother_national_num);
                   $data[$i]->transformation_lagna = $this->select_transformation_lagna($row->mother_national_num);
 $data[$i]->reason=$this->get_reason($row->mother_national_num);
                     
                 $i++;
            }
            return $data;
        }
        return false;
    } 
    
      //==========================================
    public function select_where_cashing($Conditions_arr,$condition_year){
        $this->db->select('basic.file_num ,basic.mother_national_num  , mother.mother_national_num_fk ,mother.full_name');
        $this->db->from("basic");
        $this->db->join('mother', 'mother.mother_national_num_fk = basic.mother_national_num',"left");
       // $this->db->where("basic.suspend",4);
        $this->db->where($Conditions_arr);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->result();$i=0;
            foreach ( $query->result() as $row){
                /*
                $data[$i]->up_child=$this->get_up_child($row->mother_national_num_fk,$condition_year);
                $data[$i]->down_child=$this->get_down_child($row->mother_national_num_fk,$condition_year);
                $data[$i]->mother_num_in=$this->get_mother_num($row->mother_national_num_fk);*/
                /****************************************************************************************************/  
                /*** جميع المستفيدين ***************/
                // $data[$i]->all_mostafed_mother = $this->get_pure_all_sum_mostafed_mother($row->mother_national_num);
               //  $data[$i]->all_mostafed_member = $this->get_pure_all_sum_mostafed_members($row->mother_national_num);
                 /*** جميع المستفيدين ماليا النشط كليا  ***************/
               //  $data[$i]->all_mostafed_mother_finance = $this->get_pure_all_sum_mostafed_finance_mother($row->mother_national_num);
               //  $data[$i]->all_mostafed_member_finance = $this->get_pure_all_sum_mostafed_finance_members($row->mother_national_num);
                 /*** جميع الغير مستفييدين ***************/
               //   $data[$i]->all_not_mostafed_mother = $this->get_pure_all_sum_not_mostafed_mother($row->mother_national_num);
               //  $data[$i]->all_not_mostafed_member = $this->get_pure_all_sum_not_mostafed_members($row->mother_national_num);
                   /***************************/
                 /********* الارامل ***********/ 
                 $data[$i]->mother_num_in = $this->get_armal_sum_armal_full_active_mother($row->mother_national_num_fk);      
               //  $data[$i]->armal_sub_active = $this->get_armal_sum_armal_sub_active_mother($row->mother_national_num);      
                     /********* الايتام ***********/ 
                   $data[$i]->down_child = $this->get_yatem_full_active($row->mother_national_num_fk); 
                //   $data[$i]->yatem_sub_active = $this->get_yatem_sub_active($row->mother_national_num); 
                   /********* البالغين ***********/  
                   $data[$i]->up_child = $this->get_bale3_full_active($row->mother_national_num_fk);
                 ///  $data[$i]->bale3_sub_active = $this->get_bale3_sub_active($row->mother_national_num);
                /****************************************************************************************************/  
  
                $i++;
            }
            return $data;
        }
        return false;
    }
    
    
    
    
    
    
    
             public function select_data_basic_accepted_where_details_member_details($whrer){
        $this->db->select('*');
        $this->db->from('basic');
      //  $this->db->where('suspend',4);
        $this->db->where('deleted',0);
        $this->db->where($whrer);
        $this->db->order_by('id',"ASC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                 $data[$i]->mother_name = $this->get_mother_name($row->mother_national_num);
                  $data[$i]->mother_new_card = $this->get_mother_n_card($row->mother_national_num);
                  $data[$i]->father_name = $this->get_father_name($row->mother_national_num);
                  $data[$i]->father_national = $this->get_father_national($row->mother_national_num);
                  $data[$i]->files_status_color = $this->get_files_status_setting($row->file_status);
                   $data[$i]->files_status_title = $this->get_files_status_setting_title($row->file_status); 
                  
                /*  
                  $data[$i]->armal_num_in_mother = $this->get_armal_num_mother($row->mother_national_num);
                  $data[$i]->armal_num_in_f_member = $this->get_armal_num_member($row->mother_national_num);
                  $data[$i]->yteem_num = $this->get_yatem_num($row->mother_national_num);
                  $data[$i]->mostafeed_num = $this->get_mostafeed_num($row->mother_national_num);
                  
                  
                  $data[$i]->not_mostafeed_num_mother = $this->get_not_mostafeed_num_mother($row->mother_national_num);  
                  $data[$i]->not_mostafeed_num_f_member = $this->get_not_mostafeed_num_f_member($row->mother_national_num);  
                 */
                 
/****************************************************************************************************/  
/*** جميع المستفيدين ***************/
 $data[$i]->all_mostafed_mother = $this->get_pure_all_sum_mostafed_mother($row->mother_national_num);
 $data[$i]->all_mostafed_member = $this->get_pure_all_sum_mostafed_members($row->mother_national_num);
 /*** جميع المستفيدين ماليا النشط كليا  ***************/
 $data[$i]->all_mostafed_mother_finance = $this->get_pure_all_sum_mostafed_finance_mother($row->mother_national_num);
 $data[$i]->all_mostafed_member_finance = $this->get_pure_all_sum_mostafed_finance_members($row->mother_national_num);
 /*** جميع الغير مستفييدين ***************/
  $data[$i]->all_not_mostafed_mother = $this->get_pure_all_sum_not_mostafed_mother($row->mother_national_num);
 $data[$i]->all_not_mostafed_member = $this->get_pure_all_sum_not_mostafed_members($row->mother_national_num);
   /***************************/
 /********* الارامل ***********/ 
 $data[$i]->armal_full_active = $this->get_armal_sum_armal_full_active_mother($row->mother_national_num);      
 $data[$i]->armal_sub_active = $this->get_armal_sum_armal_sub_active_mother($row->mother_national_num);      
     /********* الايتام ***********/ 
   $data[$i]->yatem_full_active = $this->get_yatem_full_active($row->mother_national_num); 
   $data[$i]->yatem_sub_active = $this->get_yatem_sub_active($row->mother_national_num); 
   /********* البالغين ***********/  
   $data[$i]->bale3_full_active = $this->get_bale3_full_active($row->mother_national_num);
   $data[$i]->bale3_sub_active = $this->get_bale3_sub_active($row->mother_national_num);
/****************************************************************************************************/  
  
                 
                 
                 
                 
                 
                 
                 
                 
                   $data[$i]->file_opration = $this->select_operation($row->mother_national_num);
                   $data[$i]->transformation_lagna = $this->select_transformation_lagna($row->mother_national_num);

                  
                 $i++;
            }
            return $data;
        }
        return false;
    }
    
    
    
         public function select_data_basic_accepted_where_details($whrer){
        $this->db->select('*');
        $this->db->from('basic');
        $this->db->where('suspend',4);
        $this->db->where('deleted',0);
        $this->db->where($whrer);
        $this->db->order_by('id',"ASC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                 $data[$i]->mother_name = $this->get_mother_name($row->mother_national_num);
                  $data[$i]->mother_new_card = $this->get_mother_n_card($row->mother_national_num);
                  $data[$i]->father_name = $this->get_father_name($row->mother_national_num);
                  $data[$i]->father_national = $this->get_father_national($row->mother_national_num);
                  $data[$i]->files_status_color = $this->get_files_status_setting($row->file_status);
                   $data[$i]->files_status_title = $this->get_files_status_setting_title($row->file_status); 
                  
                  
                  $data[$i]->armal_num_in_mother = $this->get_armal_num_mother($row->mother_national_num);
                  
                  $data[$i]->armal_num_in_f_member = $this->get_armal_num_member($row->mother_national_num);
                  $data[$i]->yteem_num = $this->get_yatem_num($row->mother_national_num);
                  $data[$i]->mostafeed_num = $this->get_mostafeed_num($row->mother_national_num);
                  
                  
                  $data[$i]->not_mostafeed_num_mother = $this->get_not_mostafeed_num_mother($row->mother_national_num);  
                  $data[$i]->not_mostafeed_num_f_member = $this->get_not_mostafeed_num_f_member($row->mother_national_num);  
                 
                 
                 
                  $data[$i]->file_opration = $this->select_operation($row->mother_national_num);
                   $data[$i]->transformation_lagna = $this->select_transformation_lagna($row->mother_national_num);

                  
                 $i++;
            }
            return $data;
        }
        return false;
    }
    
    
    
    public function  get_armal_num_member($mother_national_num_fk){   
        $this->db->select("*");
        $this->db->from("f_members");
        $this->db->where("mother_national_num_fk",$mother_national_num_fk);
        $this->db->where("categoriey_member",1);
        $query = $this->db->get();
        return $rowcount = $query->num_rows();
    
    } 
    
      public function  get_yatem_num($mother_national_num_fk){   
        $this->db->select("*");
        $this->db->from("f_members");
        $this->db->where("mother_national_num_fk",$mother_national_num_fk);
        $this->db->where("categoriey_member",2);
        $query = $this->db->get();
        return $rowcount = $query->num_rows();
    
    }
       public function  get_mostafeed_num($mother_national_num_fk){   
        $this->db->select("*");
        $this->db->from("f_members");
        $this->db->where("mother_national_num_fk",$mother_national_num_fk);
        $this->db->where("categoriey_member",3);
        $query = $this->db->get();
        return $rowcount = $query->num_rows();
    
    }
    
    
    
    
     
    
          public function  get_armal_num_mother($mother_national_num_fk){   
        $this->db->select("*");
        $this->db->from("mother");
        $this->db->where("mother_national_num_fk",$mother_national_num_fk);
        $this->db->where("categoriey_m",1);
        $query = $this->db->get();
        return $rowcount = $query->num_rows();
    
    }
    
    
    
          public function  get_not_mostafeed_num_mother($mother_national_num_fk){   
        $this->db->select("*");
        $this->db->from("mother");
        $this->db->where("mother_national_num_fk",$mother_national_num_fk);
        $this->db->where("person_type",63);
        $query = $this->db->get();
        return $rowcount = $query->num_rows();
    
    }  
    
    
            public function  get_not_mostafeed_num_f_member($mother_national_num_fk){   
        $this->db->select("*");
        $this->db->from("f_members");
        $this->db->where("mother_national_num_fk",$mother_national_num_fk);
          $this->db->where("member_person_type",63);
        $query = $this->db->get();
        return $rowcount = $query->num_rows();
    
    } 
    
    
    
     public function select_data_basic_accepted_where($whrer){
        $this->db->select('*');
        $this->db->from('basic');
        $this->db->where('suspend',4);
        $this->db->where('deleted',0);
        $this->db->where($whrer);
        $this->db->order_by('id',"ASC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                 $data[$i]->mother_name = $this->get_mother_name($row->mother_national_num);
                  $data[$i]->mother_new_card = $this->get_mother_n_card($row->mother_national_num);
                  $data[$i]->father_name = $this->get_father_name($row->mother_national_num);
                  $data[$i]->father_national = $this->get_father_national($row->mother_national_num);
                  $data[$i]->files_status_color = $this->get_files_status_setting($row->file_status);
                  
                  
                  
                   $data[$i]->file_opration = $this->select_operation($row->mother_national_num);
                   $data[$i]->transformation_lagna = $this->select_transformation_lagna($row->mother_national_num);

                  
                 $i++;
            }
            return $data;
        }
        return false;
    } 
    
        public function select_data_basic_notaccepted(){
        $this->db->select('*');
        $this->db->from('basic');
        $this->db->where(array('suspend !=' => 4));
        $this->db->where('deleted',0);
        $this->db->order_by('id',"ASC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
             $i=0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                 $data[$i]->mother_name = $this->get_mother_name($row->mother_national_num);
                  $data[$i]->mother_new_card = $this->get_mother_n_card($row->mother_national_num);
                  $data[$i]->father_name = $this->get_father_name($row->mother_national_num);
                     $data[$i]->father_national = $this->get_father_national($row->mother_national_num);
                     
                     
                     
                  $data[$i]->file_opration = $this->select_operation($row->mother_national_num);
                   $data[$i]->transformation_lagna = $this->select_transformation_lagna($row->mother_national_num);

                 $i++;
            }
            return $data;
        }
        return false;
    } 
    
/****************************************************/

/******** ZIDAN *********************/    
   public function get_all_files_status()
    {
        return $this->db->get('files_status_setting')->result();
    }
    public function change_file_setting()
    {
        $mother_id = $this->input->post('mom');
        $title = $this->input->post('title');
        $process = $this->input->post('process_id');
        $reason=$this->input->post('reason');
        /************************************/
        $data['file_status'] = $process;
        $data['process_title'] = $title;
        /********************************/
        $data_2['mother_national_num_fk']=$mother_id;
        $data_2['process_id']=$process;
        $data_2['title']=$title;
        $data_2['reason']=$reason;
        $data_2['date']=strtotime(date("Y-m-d"));
        $data_2['date_es']=strtotime(date("Y-m-d"));
        $data_2['publisher']=$_SESSION['user_name'];
        /*********************************/
        $this->db->where('mother_national_num', $mother_id);
        $this->db->update('basic', $data);
        
        $this->db->insert('files_status_operation', $data_2);
        
   


            }
            
            
            
/*public function save_files_options($mother_id,$title,$process,$reason)
{
$data['mother_national_num_fk']=$mother_id;
$data['process_id']=$process;
$data['title']=$title;
$data['reason']=$reason;
$data['date']=strtotime(date("Y-m-d"));
$data['date_es']=strtotime(date("Y-m-d"));
$data['publisher']=$_SESSION['user_name'];
    if($this->get_num_rows($mother_id)==0){
        $this->db->insert('files_status_operation', $data);
    }else{
       // $this->db->where('mother_national_num_fk',$mother_id);
       // $this->db->update('files_status_operation', $data);
            
    }


        
    }
    public function get_num_rows($mother_id)
{
    $this->db->where('mother_national_num_fk',$mother_id);
    $query=$this->db->get('files_status_operation');
    return $query->num_rows();

}  */
    
/************************************/  

public function insertedAddRelations($national_id)
    {
        $data = $this->input->post('data');
        $this->db->insert('researcher_relations_family',$data);
        $this->db->where('mother_national_num', $national_id);
        return $this->db->update('basic',array('researcher_id'=>$data['emp_id_fk']));

    }
  // ============================================
  
  
    public function select_data_basic_by_id_order($id){
        $this->db->select('*');
        $this->db->from('basic');
        $this->db->where('deleted',0);
        $this->db->where('suspend',0);
        $this->db->where('researcher_id',$id);
        $this->db->order_by('id',"desc");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->mother_name = $this->get_mother_name($row->mother_national_num);
                 $data[$i]->mother_new_card = $this->get_mother_n_card($row->mother_national_num);
                 $data[$i]->father_name = $this->get_father_name($row->mother_national_num);
                    $data[$i]->father_national = $this->get_father_national($row->mother_national_num);


                   $data[$i]->file_opration = $this->select_operation($row->mother_national_num);
                   $data[$i]->transformation_lagna = $this->select_transformation_lagna($row->mother_national_num);


                $i++;
            }
            return $data;
        }
        return false;
    }
    
        public function select_data_basic_by_id_new_family($id){
        $this->db->select('*');
        $this->db->from('basic');
        $this->db->where('deleted',0);
        $this->db->where('suspend !=',0);
         $this->db->where('suspend !=',4);
        $this->db->where('researcher_id',$id);
        $this->db->order_by('id',"desc");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->mother_name = $this->get_mother_name($row->mother_national_num);
                 $data[$i]->mother_new_card = $this->get_mother_n_card($row->mother_national_num);

                $i++;
            }
            return $data;
        }
        return false;
    }
    
    
  public function select_data_basic_by_id($id){
        $this->db->select('*');
        $this->db->from('basic');
        $this->db->where('deleted',0);
        $this->db->where('researcher_id',$id);
        $this->db->order_by('id',"desc");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->mother_name = $this->get_mother_name($row->mother_national_num);
                 $data[$i]->mother_new_card = $this->get_mother_n_card($row->mother_national_num);
                 $data[$i]->father_name = $this->get_father_name($row->mother_national_num);
                    $data[$i]->father_national = $this->get_father_national($row->mother_national_num);

                $i++;
            }
            return $data;
        }
        return false;
    }

/*******************************/

public function get_all_persons_status()
{
    return $this->db->get('persons_status_setting')->result();
}

public function change_family_members_setting(){

    $member_id = $this->input->post('member_id');
    $title = $this->input->post('title');
    $process = $this->input->post('process_id');
    $reason=$this->input->post('reason');
    /************************************/
    $data['persons_status'] = $process;
    $data['persons_process_title'] = $title;
    $data['persons_process_reason'] = $reason;
    $data['halt_elmostafid_member'] = $process;
    /********************************/
    $data_2['family_member_id_fk']=$member_id;
    $data_2['process_id']=$process;
    $data_2['title']=$title;
    $data_2['reason']=$reason;
    $data_2['date']=strtotime(date("Y-m-d"));
    $data_2['date_es']=strtotime(date("Y-m-d"));
    $data_2['publisher']=$_SESSION['user_name'];
    /*********************************/
    $this->db->where('id', $member_id);
    $this->db->update('f_members', $data);

    $this->db->insert('family_members_status_operation', $data_2);

}
 //--------------------------------------------------------------------------------------

public function change_mother_state(){

    $mother_num = $this->input->post('mother_num');
    $title = $this->input->post('title');
    $process = $this->input->post('process_id');
    $reason=$this->input->post('reason');
    /************************************/
        $Udata['halt_elmostafid_m'] = $process;
        $Udata['persons_process_reason'] = $reason;
    $this->db->where('mother_national_num_fk', $mother_num);
    $this->db->update('mother', $Udata);
    /********************************/
    $Idata['mother_national_num_fk']=$mother_num;
    $Idata['process_id']=$process;
    $Idata['title']=$title;
    $Idata['reason']=$reason;
    $Idata['date']=strtotime(date("Y-m-d"));
    $Idata['date_s']=strtotime(date("Y-m-d"));
    $Idata['publisher']=$_SESSION['user_name'];
    /*********************************/
    

    $this->db->insert('mother_status_operation', $Idata);

}
 //--------------------------------------------------------------------------------------



public function get_by_mother_num($mother_num)
    {
        $this->db->where('mother_national_num', $mother_num);
        $query=$this->db->get('basic');
        if($query->num_rows()>0)
        {
          return $query->row();
        }else{
            return false;
        }
    }
    public function get_mom_name($mother_num)
    {
        $this->db->where('mother_national_num_fk', $mother_num);
        $query=$this->db->get('mother');
        if($query->num_rows()>0)
        {
            return $query->row()->full_name;
        }else{
            return "لم يضاف الاسم";
        }
    }
    
   public function get_father_name($mother_num)
    {
        $this->db->where('mother_national_num_fk', $mother_num);
        $query=$this->db->get('father');
        if($query->num_rows()>0)
        {
            return $query->row()->full_name;
        }else{
            return "لم يضاف الاسم";
        }
    } 
    
     public function get_files_status_setting($file_status_id)
    {
        $this->db->where('id', $file_status_id);
        $query=$this->db->get('files_status_setting');
        if($query->num_rows()>0)
        {
            return $query->row()->color;
        }else{
            return "لم يضاف الاسم";
        }
    }   
    
    
    
    
         public function get_files_status_setting_title($file_status_id)
    {
        $this->db->where('id', $file_status_id);
        $query=$this->db->get('files_status_setting');
        if($query->num_rows()>0)
        {
            return $query->row()->title;
        }else{
            return "لم يضاف الاسم";
        }
    }   
    
       
       public function get_father_national($mother_num)
    {
        $this->db->where('mother_national_num_fk', $mother_num);
        $query=$this->db->get('father');
        if($query->num_rows()>0)
        {
            return $query->row()->f_national_id;
        }else{
            return '<button type="button" class="btn btn-warning w-md m-b-5"> إستكمل البيانات </button>
            
            ';
        }
    } 
/*********************************************************************/
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
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }
    //==========================================
    public function select_transformation_lagna($id){
        $this->db->select('transformation_lagna.* ,
                           lagna_main.lagna_name     as  main_lagna_name    ,
                           lagna_approved.lagna_name as  approved_lagna_name    ,
                           users.user_name  ,
                           procedures_option_lagna.title  as procedures_option_lagna_title');
        $this->db->from('transformation_lagna');
        $this->db->join('lagna as lagna_main', 'lagna_main.id_lagna = transformation_lagna.add_to_lagna_id_fk',"left");
        $this->db->join('lagna as lagna_approved', 'lagna_approved.id_lagna = transformation_lagna.approved_lagna',"left");
        $this->db->join('procedures_option_lagna', 'procedures_option_lagna.id = transformation_lagna.procedure_id_fk',"left");
        $this->db->join('users', 'users.user_id = transformation_lagna.person_transfer',"left");
        $this->db->where('transformation_lagna.mother_national_num',$id);
        $this->db->order_by("id","DESC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }
    //==========================================
    public  function check_national_num($mother_national_num){
        $this->db->select('mother_national_num');
        $this->db->from("basic");
        $this->db->where("mother_national_num",$mother_national_num);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return 1;
        }
        return 0;
    }
    //==========================================
  /*  public  function insert_new_register(){

        $data['user_name']=$this->input->post('user_name');
           $password=$this->input->post('user_password',true);
           $password=sha1(md5($password));
        $data['user_password'] = $password;

        $data['full_name']=$this->input->post('full_name');
        $data['full_name_order']=$this->input->post('full_name_order');
        $data['person_national_card']=$this->input->post('person_national_card');
        $data['person_relationship']=$this->input->post('person_relationship');
        $data['contact_mob']=$this->input->post('contact_mob');
        $data['contact_email']=$this->input->post('contact_email');
        $data['father_national_num']=$this->input->post('father_national_num');
        $data['mother_national_num']=$this->input->post('mother_national_num');
        $data['register_place']=$this->input->post('register_place');
        
        $data['date_registration'] =strtotime(date("Y-m-d",time()));
        $data['date'] =strtotime(date("Y-m-d",time()));
        $data['date_s']= time();
        $data['person_response']=0; 
        $data['publisher']=$_SESSION['user_name'];
        $this->db->insert('basic',$data);
    }
  
       public  function update_new_register($id){

        $data['user_name']=$this->input->post('user_name');
           $password=$this->input->post('user_password',true);
           if(!empty($password)){
           $password=sha1(md5($password));
            $data['user_password'] = $password;
           }
        $data['full_name']=$this->input->post('full_name');
        $data['full_name_order']=$this->input->post('full_name_order');
        $data['person_national_card']=$this->input->post('person_national_card');
        $data['person_relationship']=$this->input->post('person_relationship');
        $data['contact_mob']=$this->input->post('contact_mob');
        $data['contact_email']=$this->input->post('contact_email');
        $data['father_national_num']=$this->input->post('father_national_num');
        $data['mother_national_num']=$this->input->post('mother_national_num');
        $data['register_place']=$this->input->post('register_place');

        $data['date_registration'] =strtotime(date("Y-m-d",time()));
        $data['date'] =strtotime(date("Y-m-d",time()));
        $data['date_s']= time();
        $data['person_response']=0;
        $data['publisher']=$_SESSION['user_name'];
           $this->db->where('id',$id);
           $this->db->update('basic',$data);
    }
    */
     public  function insert_new_register(){

        $data['user_name']=$this->input->post('user_name');
           $password=$this->input->post('user_password',true);
           $password=sha1(md5($password));
        $data['user_password'] = $password;

        $data['father_name']=$this->input->post('full_name');
        $data['full_name_order']=$this->input->post('full_name_order');
        $data['person_national_card']=$this->input->post('person_national_card');
        $data['person_relationship']=$this->input->post('person_relationship');
        $data['contact_mob']=$this->input->post('contact_mob');
      //  $data['contact_mob_relationship']=$this->input->post('contact_mob_relationship');
        
       $data['retirement']=$this->chek_Null($this->input->post('retirement'));
        $data['insurance']=$this->chek_Null($this->input->post('insurance'));
        $data['guarantee']=$this->chek_Null($this->input->post('guarantee'));
        
        $data['center_id_fk']=$this->input->post('center_id_fk');
        $data['district_id_fk']=$this->input->post('district_id_fk');

       // $data['contact_email']=$this->input->post('contact_email');
        $data['father_national_num']=$this->input->post('father_national_num');
        $data['mother_national_num']=$this->input->post('mother_national_num');
      
        $data['register_place']=$this->input->post('register_place');
        
        $data['date_registration'] =strtotime(date("Y-m-d",time()));
        $data['date'] =strtotime(date("Y-m-d",time()));
        $data['date_s']= time();
        $data['person_response']=0; 
        $data['publisher']=$_SESSION['user_name'];
     
        
         $data['male_number']=$this->input->post('male_number');
         $data['female_number']=$this->input->post('female_number');
         $data['family_members_number']=$this->input->post('family_members_number');
       //  $data['sources_income']=$this->input->post('sources_income');
         $data['h_house_owner_id_fk']=$this->input->post('h_house_owner_id_fk');
         $data['h_rent_amount']=$this->chek_Null($this->input->post('h_rent_amount'));

        
        
        
        
        
         $data_f['full_name']=$this->input->post('full_name'); 
         $data_f['mother_national_num_fk']=$this->input->post('mother_national_num');
         $data_f['f_national_id']=$this->input->post('father_national_num'); 
      
      
      
      
          
         $this->db->insert('basic',$data);
         $this->db->insert('father',$data_f);
        
    }
    //==========================================
       public  function update_new_register($id,$mother_national_num){



        $data['user_name']=$this->input->post('user_name');
           $password=$this->input->post('user_password',true);
           if(!empty($password)){
           $password=sha1(md5($password));
            $data['user_password'] = $password;
           }
        $data['father_name']=$this->input->post('full_name');
        $data['full_name_order']=$this->input->post('full_name_order');
        $data['person_national_card']=$this->input->post('person_national_card');
        $data['person_relationship']=$this->input->post('person_relationship');
        $data['contact_mob']=$this->input->post('contact_mob');
                $data['contact_mob_relationship']=$this->input->post('contact_mob_relationship');
        $data['contact_email']=$this->input->post('contact_email');
        $data['register_place']=$this->input->post('register_place');
        
        $data['retirement']=$this->chek_Null($this->input->post('retirement'));
        $data['insurance']=$this->chek_Null($this->input->post('insurance'));
        $data['guarantee']=$this->chek_Null($this->input->post('guarantee'));

          $data['center_id_fk']=$this->input->post('center_id_fk');
          $data['district_id_fk']=$this->input->post('district_id_fk');
          $data['father_national_num']=$this->input->post('father_national_num');



        $data['date_registration'] =strtotime(date("Y-m-d",time()));
        $data['date'] =strtotime(date("Y-m-d",time()));
        $data['date_s']= time();
        $data['person_response']=0;
        $data['publisher']=$_SESSION['user_name'];
        
         
         $data['male_number']=$this->input->post('male_number');
         $data['female_number']=$this->input->post('female_number');
         $data['family_members_number']=$this->input->post('family_members_number');
         $data['sources_income']=$this->input->post('sources_income');
         $data['h_house_owner_id_fk']=$this->input->post('h_house_owner_id_fk');
         $data['h_rent_amount']=$this->chek_Null($this->input->post('h_rent_amount'));

        
        
        
        
           $this->db->where('id',$id);
           $this->db->update('basic',$data);
           
         $data_f['full_name']=$this->input->post('full_name'); 
      
         $data_f['f_national_id']=$this->input->post('father_national_num'); 

             
           
              $this->db->where('mother_national_num_fk',$mother_national_num);
                 $this->db->update('father',$data_f);     
           
           
    }
    
    
    //==========================================
    public  function insert_new_register_files($all_img,$mother_national_num){
        $ids=$this->input->post('attach_files_ids');
        foreach ($all_img as $key=>$value){
            if(!empty($value)){
            $data["mother_national_num"]=$mother_national_num;
            $data["attach_file"]=$value;
            $data["attach_file_id_setting"]=$ids[$key];
            $this->db->insert("family_order_attach_file",$data); 
            }else{
                continue;
            }
        }
    }
    //=========================================
    public function get_by_id_regester($id){
        $this->db->where('id',$id);
        return $this->db->get('basic')->row_array();
    }
    //=========================================
    public  function get_files_mother($mother_nation_id){
        $this->db->select('id_setting , title_setting');
        $this->db->from("family_setting");
        $this->db->where("type",47);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data= $query->result(); $i=0;
            foreach ( $query->result() as $row){
                $data[$i]->files_name = $this->get_attach_file($row->id_setting,$mother_nation_id);
                $i++;
            }
            return $data;
        }
        return false;
    }
    //========================================
    public function get_attach_file($id_setting,$mother_nation_id){
        $this->db->from("family_order_attach_file");
        $this->db->where("mother_national_num",$mother_nation_id);
        $this->db->where("attach_file_id_setting",$id_setting);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row_array();
        }
        return 0;
    }
    //=====================================
    public function delete_file($id){
        $this->db->where("id",$id);
        $this->db->delete("family_order_attach_file");
    }
    //==============================================
      public function get_basic_mother_num($mother_num){
      //  $h = $this->db->get_where("basic",array("mother_national_num"=>$mother_num));
        $where = array("basic.mother_national_num"=>$mother_num);
       $h = $this->db->select('*')->from('basic')->join('family_setting', 'family_setting.id_setting=basic.contact_mob_relationship',"left")->where($where)->get();

        
        return $h->row_array();
    }
    
      public function get_reason($mother_national_num)
    {
        $this->db->select('*');
        $this->db->from('files_status_operation');
        $this->db->where('mother_national_num_fk',$mother_national_num);


        $this->db->order_by('id',"desc");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
       return $query->row()->reason;

        }else{
            return 0;
        }


    }

 /************************************************************************************************************************/
 

public function  get_pure_all_sum_mostafed_mother($mother_national_num_fk){
    $this->db->select("*");
    $this->db->from("mother");
    $this->db->where("mother_national_num_fk",$mother_national_num_fk);
    $this->db->where("person_type",62);
  //   $this->db->where('halt_elmostafid_m',1);
    $query = $this->db->get();
    return $rowcount = $query->num_rows();

}



/**** كل المستقيدين النشيطين*******************************/
public function  get_pure_all_sum_mostafed_members($mother_national_num_fk){
    $this->db->select("*");
    $this->db->from("f_members");
    $this->db->where("mother_national_num_fk",$mother_national_num_fk);
    $this->db->where("member_person_type",62);
    // $this->db->where('halt_elmostafid_member',1);
    $query = $this->db->get();
    return $rowcount = $query->num_rows();

}



public function  get_pure_all_sum_mostafed_finance_mother($mother_national_num_fk){
    $this->db->select("*");
    $this->db->from("mother");
    $this->db->where("mother_national_num_fk",$mother_national_num_fk);
    $this->db->where("person_type",62);
     $this->db->where('halt_elmostafid_m',1);
    $query = $this->db->get();
    return $rowcount = $query->num_rows();

}

public function  get_pure_all_sum_mostafed_finance_members($mother_national_num_fk){
    $this->db->select("*");
    $this->db->from("f_members");
    $this->db->where("mother_national_num_fk",$mother_national_num_fk);
    $this->db->where("member_person_type",62);
     $this->db->where('halt_elmostafid_member',1);
    $query = $this->db->get();
    return $rowcount = $query->num_rows();

}




public function  get_pure_all_sum_not_mostafed_mother($mother_national_num_fk){
    $this->db->select("*");
    $this->db->from("mother");
    $this->db->where("mother_national_num_fk",$mother_national_num_fk);
    $this->db->where("person_type",63);
    //   $this->db->where('halt_elmostafid_m',2);
    $query = $this->db->get();
    return $rowcount = $query->num_rows();

}
/*****************************************************/
/**** كل الغير مستفيدين النشط جزئي*******************************/
public function  get_pure_all_sum_not_mostafed_members($mother_national_num_fk){
    $this->db->select("*");
    $this->db->from("f_members");
    $this->db->where("mother_national_num_fk",$mother_national_num_fk);
    $this->db->where("member_person_type",63);
    //  $this->db->where('halt_elmostafid_member',2);
    $query = $this->db->get();
    return $rowcount = $query->num_rows();

}

// أرملة ونشط كلي 
public function  get_armal_sum_armal_full_active_mother($mother_national_num_fk){
    $this->db->select("*");
    $this->db->from("mother");
    $this->db->where("mother_national_num_fk",$mother_national_num_fk);
  // $this->db->where("person_type",62);
    $this->db->where("categoriey_m",1);
    
     $this->db->where('halt_elmostafid_m',1);
    $query = $this->db->get();
    return $rowcount = $query->num_rows();

}

// أرملة ونشط جزئي 
public function  get_armal_sum_armal_sub_active_mother($mother_national_num_fk){
    $this->db->select("*");
    $this->db->from("mother");
    $this->db->where("mother_national_num_fk",$mother_national_num_fk);
  // $this->db->where("person_type",62);
    $this->db->where("categoriey_m",1);
    
     $this->db->where('halt_elmostafid_m',2);
    $query = $this->db->get();
    return $rowcount = $query->num_rows();

}


public function  get_yatem_full_active($mother_national_num_fk){
    $this->db->select("*");
    $this->db->from("f_members");
    $this->db->where("mother_national_num_fk",$mother_national_num_fk);
   // $this->db->where("member_person_type",62);
     $this->db->where('halt_elmostafid_member',1);
    $query = $this->db->get();
    return $rowcount = $query->num_rows();

}


public function  get_yatem_sub_active($mother_national_num_fk){
    $this->db->select("*");
    $this->db->from("f_members");
    $this->db->where("mother_national_num_fk",$mother_national_num_fk);
   // $this->db->where("member_person_type",62);
     $this->db->where('halt_elmostafid_member',2);
    $query = $this->db->get();
    return $rowcount = $query->num_rows();

}


public function  get_bale3_full_active($mother_national_num_fk){
    $this->db->select("*");
    $this->db->from("f_members");
    $this->db->where("mother_national_num_fk",$mother_national_num_fk);
    $this->db->where("categoriey_member",3);
    
     $this->db->where('halt_elmostafid_member',1);
    $query = $this->db->get();
    return $rowcount = $query->num_rows();

}
public function  get_bale3_sub_active($mother_national_num_fk){
    $this->db->select("*");
    $this->db->from("f_members");
    $this->db->where("mother_national_num_fk",$mother_national_num_fk);
    $this->db->where("categoriey_member",3);
    
     $this->db->where('halt_elmostafid_member',2);
    $query = $this->db->get();
    return $rowcount = $query->num_rows();

}
 /************************************************************************************************************************/   
    public function select_relashion($Conditions_arr){
        $this->db->select('*');
        $this->db->from("family_setting");
        $this->db->where($Conditions_arr);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }
 //======================================================================
  public function getFamilyOperationsPermissions(){
        $emp_id =$_SESSION['emp_code'];
        $this->db->select('*');
        $this->db->from('family_operations_permission');
        $this->db->where('emp_id_fk',$emp_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }else{
            return false;
        }

    }



}// END CLASS 