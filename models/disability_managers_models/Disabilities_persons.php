<?php
   class disabilities_persons extends CI_Model {
      public function __construct(){
        parent:: __construct();
        $this->table="disabilities_persons";
       }
       //---------------------------------------------------
       public function chek_Null($post_value){
           if($post_value == '' || $post_value==null || (!isset($post_value)) && !empty($post_value)){
               $val="";
               return $val;
           }else{
               return $post_value;
           }
       }
       //---------------------------------------------------
       public function select_last_id(){
           $this->db->select('id');
           $this->db->from($this->table);
           $this->db->order_by("id","DESC");
           $this->db->limit(1);
           $query = $this->db->get();
           if ($query->num_rows() > 0) {
               foreach ($query->result() as $row) {
                   $data = $row->id;
               }
               return $data;
           }
           return 0;
       }

       public function check_id($id){
           $this->db->select('id');
           $this->db->from($this->table);
           $this->db->order_by("id","DESC");
           $this->db->where("p_national_num",$id);
           $query = $this->db->get();
           if ($query->num_rows() > 0) {
              
               return true;
           }
           return false;
       }
    
       public  function  insert($file,$file2){
         
        $data['p_num']=$this->input->post('p_num');

        $data['p_name']=$this->input->post('p_name');

        $data['p_date_birth']=$this->input->post('p_date_birth');
        
         $data['p_address']=$this->input->post('p_address');
         
         $data['p_mob']=$this->input->post('p_mob');

        $data['p_national_num']=$this->input->post('p_national_num');
        
        $data['p_natonality_id_fk']=$this->input->post('p_natonality_id_fk');
        
        $data['p_scoial_status_id_fk']=$this->input->post('p_scoial_status_id_fk');

        $data['disability_type_id_fk']=$this->input->post('disability_type_id_fk');
        
         $data['disability_degree']=$this->input->post('disability_degree');
         
         $data['use_devices']=$this->input->post('use_devices');
         
         $data['use_devices_details']=$this->input->post('use_devices_details');
         
         $data['be_in_another_society']=$this->input->post('be_in_another_society');
         
        $data['society_name']=$this->input->post('society_name'); 
        
        $data['proof_status']=$this->input->post('proof_status'); 
        
        $data['referral_to_hospital']=$this->input->post('referral_to_hospital');
         
        $data['referral_to_center']=$this->input->post('referral_to_center');
        
        $data['contact_mob']=$this->input->post('contact_mob');
        
        $data['contact_phone']=$this->input->post('contact_phone');
        
        $data['contact_father_mob']=$this->input->post('contact_father_mob');
        
        $data['contact_father_name']=$this->input->post('contact_father_name');
        
        $data['contact_email']=$this->input->post('contact_email');

        $data['medical_report'] = $file2;
        
        $data['scientific_qualitication'] = 0;
        
        	   if($this->input->post('insert_type') == 'insert_web'){
            
            $data['approved_from_web']=0;
        }elseif($this->input->post('insert_type') == 'insert_admin'){
            
            $data['approved_from_web']=1;
        }else{
            
        }
        
        
              if($this->input->post('insert_type') == 'insert_web'){
            
            $data['publisher'] = '';
        }elseif($this->input->post('insert_type') == 'insert_admin'){
            
            $data['publisher'] = $_SESSION['user_id'];
        }else{
            
        }
        
        
        $data['date_s']=time();

        $data['date'] = strtotime(date("m/d/Y"));
        
        $data['date_ar'] = date("m/d/Y");
        
    //    $data['publisher'] = $_SESSION['user_id'];

        $this->db->insert('disabilities_persons',$data);
        $last_insert_id = $this->db->insert_id();
        $this->insert_photo($last_insert_id,$file);
//         $this->insert_family_relationship($last_insert_id);
         $this->insert_reasercher_table($last_insert_id); 
    }
    //----------------------------------------------------
    public  function  insert_photo($last,$file){
        $data['person_id_fk']=$last;
        foreach($file as $key=>$value){
         $data['file']=$value;  
         $this->db->insert('disabilities_persons_files',$data);
        }
        
    }
    
     public function select_all(){
        $this->db->select('*');
        $this->db->from('disabilities_persons');
        $this->db->order_by('id','ASC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query->result() as $row) {
                $data[] = $row;
                $data[$i]->photos = $this->get_photo($row->id);
                $i++;
            }
            return $data;
        }
        return false;
    }
    
    public function get_photo($f_id){
        $this->db->select('*');
        $this->db->from('disabilities_persons_files');
        $this->db->where("person_id_fk",$f_id);
         $query = $this->db->get();
    if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
}

   public function update_person_state($id,$type){
        $data['scientific_qualitication'] = $type;
        $this->db->where('id', $id);
        $this->db->update('disabilities_persons',$data);
    }
    
       public function delete($id){

        $this->db->where('id',$id);
        $this->db->delete('disabilities_persons');

    }
 public function getById($id){

        $h = $this->db->get_where('disabilities_persons', array('id'=>$id));
        return $h->row_array();

    }
     public function delete_photo($id){
        $this->db->where('id',$id);
        $this->db->delete('disabilities_persons_files');

    }
    
    
        public function update($id,$file,$file2){
       $data['p_num']=$this->input->post('p_num');

        $data['p_name']=$this->input->post('p_name');

        $data['p_date_birth']=$this->input->post('p_date_birth');
        
         $data['p_address']=$this->input->post('p_address');
         
         $data['p_mob']=$this->input->post('p_mob');

        $data['p_national_num']=$this->input->post('p_national_num');
        
        $data['p_natonality_id_fk']=$this->input->post('p_natonality_id_fk');
        
        $data['p_scoial_status_id_fk']=$this->input->post('p_scoial_status_id_fk');

        $data['disability_type_id_fk']=$this->input->post('disability_type_id_fk');
        
         $data['disability_degree']=$this->input->post('disability_degree');
         
         $data['use_devices']=$this->input->post('use_devices');
         
         $data['use_devices_details']=$this->input->post('use_devices_details');
         
         $data['be_in_another_society']=$this->input->post('be_in_another_society');
         
        $data['society_name']=$this->input->post('society_name'); 
        
        $data['proof_status']=$this->input->post('proof_status'); 
        
        $data['referral_to_hospital']=$this->input->post('referral_to_hospital');
         
        $data['referral_to_center']=$this->input->post('referral_to_center');
        
        $data['contact_mob']=$this->input->post('contact_mob');
        
        $data['contact_phone']=$this->input->post('contact_phone');
        
        $data['contact_father_mob']=$this->input->post('contact_father_mob');
        
        $data['contact_father_name']=$this->input->post('contact_father_name');
        
        $data['contact_email']=$this->input->post('contact_email');

       if($file2 !=''){
            $data['medical_report'] = $file2;
        }
      
        $this->db->where('id', $id);
        $this->db->update('disabilities_persons',$data); 
        
          if($file !=''){
         
           
        $this->insert_photo($id,$file);
        }
       
        
        


    }
    
    
    
     public function select_all_approved(){
         $this->db->select('*');
        $this->db->from('disabilities_persons');
        $this->db->where('approved_from_web', 0);
        $this->db->order_by('id','ASC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query->result() as $row) {
                $data[] = $row;
                $data[$i]->photos = $this->get_photo($row->id);
                $i++;
            }
            return $data;
        }
        return false;    
    }
    
    public function accepet_received($id){
        $data['approved_from_web'] = 1;
        $this->db->where('id', $id);
        $this->db->update('disabilities_persons',$data);
    }
    //=======================================================================
    public function insert_family_relationship($id_person){
        
        $data["person_id_fk"]=$id_person;
          $this->db->insert("family_relationship",$data);
    }
    //=======================================================================
    public function insert_reasercher_table($id_person){
        $data["person_id_fk"]=$id_person;
          $this->db->insert("reasercher_table",$data);
    }
    //=============================================
    
    public function get_num_of_amount($id)
    {
        return  $this->db->select('SUM(amount_device) as Total')
                        ->from('disabilities_device_order')
                        ->where('person_id_fk',$id)
                        ->get()
                        ->row_array()['Total'];
    }
    
    public function get_num_of_amount_accepted($id)
    {
        return  $this->db->select('SUM(amount_device) as Total')
                        ->from('disabilities_device_order')
                        ->where('person_id_fk',$id)
                        ->where('confirm_sarf',1)
                        ->get()
                        ->row_array()['Total'];
    }
    
     public function get_num_of_orders($id)
    {
                        $this->db->select('*')
                        ->from('disabilities_device_order')
                        ->where('person_id_fk',$id) ;
                        $q = $this->db->get(); 
                        return  $q->num_rows();
                      
    }
    
    public function select_all_persons(){
         $this->db->select('disabilities_persons.id,disabilities_persons.approved_from_web,disabilities_persons.p_name');
        $this->db->from('disabilities_persons');
        $this->db->where('approved_from_web',1);
        $this->db->order_by('id','ASC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query->result() as $row) {
                $data[] = $row;
                $data[$i]->num_of_orders = $this->get_num_of_orders($row->id);
                $data[$i]->num_of_amount = $this->get_num_of_amount($row->id);
                $data[$i]->num_of_amount_accepted = $this->get_num_of_amount_accepted($row->id);
                $i++;
            }
            return $data;
        }
        return false;    
    }
    public function select_all_disability($type)
    {
         $this->db->select('*');
        $this->db->from('disabilities_persons');
        $this->db->where('approved_from_web',1);
       $this->db->where('disability_type_id_fk',$type); 
        $this->db->order_by('id','ASC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query->result() as $row) {
                $data[] = $row;
                $data[$i]->photos = $this->get_photo($row->id);
                $i++;
            }
            return $data;
        }
        return false;    
    }
    //=======================================
    
    
      public function get_person_name($id)
    {
        return  $this->db->select('*')
                        ->from('disabilities_persons')
                        ->where('id',$id)
                        ->get()
                        ->row_array()['p_name'];
    }
        public function get_num_of_amount_d($id,$devices)
    {
        return  $this->db->select('SUM(amount_device) as Total')
                        ->from('disabilities_device_order')
                        ->where('device_id_fk',$devices) 
                        ->where('person_id_fk',$id)
                        ->get()
                        ->row_array()['Total'];
    }
    
    public function get_num_of_amount_accepted_d($id,$devices)
    {
        return  $this->db->select('SUM(amount_device) as Total')
                        ->from('disabilities_device_order')
                        ->where('person_id_fk',$id)
                        ->where('device_id_fk',$devices)
                        ->where('confirm_sarf',1)
                        ->get()
                        ->row_array()['Total'];
    }
    
    
    
    public function select_all_devices($devices)
    {
        $this->db->select('*');
        $this->db->from('disabilities_device_order');
        $this->db->where('device_id_fk',$devices); 
        $this->db->order_by('order_id','ASC');
        $this->db->group_by('person_id_fk');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query->result() as $row) {
                $data[]= $row;
                $data[$i]->person_name = $this->get_person_name($row->person_id_fk);
                $data[$i]->num_of_amount = $this->get_num_of_amount_d($row->person_id_fk,$devices);
                $data[$i]->num_of_amount_accepted = $this->get_num_of_amount_accepted_d($row->person_id_fk,$devices);
                $i++;
            }
            return $data;
        }
        return false;    
    }
    
    
      //========================================================================
   
       public function select_all_Incoming($stat)
    {
         $this->db->select('*');
        $this->db->from('disabilities_persons');
        $this->db->where('person_file_state',$stat); 
        $this->db->order_by('id','ASC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query->result() as $row) {
                $data[] = $row;
                $data[$i]->photos = $this->get_photo($row->id);
                $i++;
            }
            return $data;
        }
        return false;    
    }
    
}// END CLASS
?>