<?php
 class Notes_model extends CI_Model{

    public function select_employees($qsm)
    {
        //$this->db->where('administration',$edara);
        $this->db->where('department',$qsm);
        $q = $this->db->get('employees')->result();
        if (!empty($q)) {
           
            return $q;
        }
    }
    public function get_rkm()
    {
        $this->db->select_max('id');
        $query = $this->db->get('arch_notes');
        if ($query->num_rows() > 0) {
            return $query->row()->id;
        } else {
            return 1;
        }
    }
          public function add_notes(){
               $data['type']= $this->input->post('type');
               $data['date']= $this->input->post('date');
              
               
               $data['time']= $this->input->post('time');

              if (!empty($this->input->post('alarm_period'))){
                  $arr = explode('-',$this->input->post('alarm_period'));
                  $data['alarm_period']= $arr[0] ;
                  $data['alarm_period_n']= $arr[1] ;
              }

              $data['tasnef']= $this->input->post('tasnef');
              $data['tasnef_n']= $this->input->post('tasnef_n');
               $data['details']= $this->input->post('details');
              
               $data['date_ar']= date('Y-m-d');
               $data['date_s']=  strtotime(date('Y-m-d'));
               $data['publisher_name'] = $this->getUserName($_SESSION['user_id']);
               $data['publisher'] = $_SESSION['user_id'];
              $data['map_google_lng'] = $this->input->post('map_google_lng');
              $data['map_google_lat'] = $this->input->post('map_google_lat');

              $data['qsm_id_fk']= $this->input->post('qsm_id_fk');
            

              

             
           $id = $this->input->post('row_id');
              if (!empty($id)){
                  $this->db->where('id',$this->input->post('row_id'));
                  $this->db->update('arch_notes',$data);
              } else{
                $data['alarm_type']= $this->input->post('alarm_type');
                $data['qsm_n']= $this->input->post('qsm_n');

                  $this->db->insert('arch_notes',$data);
                  
                    if( $data['alarm_type']==1)
                {
                    $this->add_emp();
                }
                else if( $data['alarm_type']==2)
                {
                   $this->add_emp_depart(); 
                }
                  
              }



             

          }
          public function add_emp_depart()
          {
            $users=$this->select_employees($this->input->post('qsm_id_fk'));
            if(   $users!=null)
            {
             foreach ($users as $key => $row) {
                 $data['notes_id_fk'] = $this->get_rkm();
                 $data['to_user_id'] = $row->id;
                 $data['to_user_emp_code'] = $row->emp_code;
                 $data['date']= $this->input->post('date');
                 $data['seen'] = 0;

                 $this->db->insert('arch_notes_history',$data);
             
             } 
           }
          }
          public function add_emp()
          {
                 $data['notes_id_fk'] = $this->get_rkm();
                 $data['to_user_id'] = $_SESSION['user_id'];
                 $data['to_user_emp_code'] = $_SESSION['emp_code'];
                 $data['date']= $this->input->post('date');
                 $data['seen'] = 0;
                 $this->db->insert('arch_notes_history',$data);
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


     public function get_events(){
        $this->db->select('arch_notes.* , arch_notes_history.*');
        $this->db->from("arch_notes");
        $this->db->join('arch_notes_history', 'arch_notes_history.notes_id_fk = arch_notes.id',"left");
        if($_SESSION['role_id_fk']==3)
        {
            $this->db->where("to_user_id",$_SESSION['emp_code']);
            //$this->db->where("publisher",$_SESSION['emp_code']);
        }else{
            $this->db->where("to_user_id",$_SESSION['user_id']);
           // $this->db->where("publisher",$_SESSION['user_id']);
        }
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
       //  return $this->db->get('arch_notes')->result();
     }
     //yara
     public function my_events(){
        $this->db->select('arch_notes.* , arch_notes_history.*');
        $this->db->from("arch_notes");
        $this->db->join('arch_notes_history', 'arch_notes_history.notes_id_fk = arch_notes.id',"left");
        if($_SESSION['role_id_fk']==3)
        {
            $this->db->where("to_user_id",$_SESSION['emp_code']);
        }else{
            $this->db->where("to_user_id",$_SESSION['user_id']);
        }
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }
     //yaara
     public function update_event(){
         $data['type']= $this->input->post('type');
         $data['date']= $this->input->post('date');
         $data['qsm_id_fk']= $this->input->post('qsm_id_fk');
         $data['qsm_n']= $this->input->post('qsm_n');
         $data['time']= $this->input->post('time');

         if (!empty($this->input->post('alarm_period'))){
             $arr = explode('-',$this->input->post('alarm_period'));
             $data['alarm_period']= $arr[0] ;
             $data['alarm_period_n']= $arr[1] ;
         }
         $data['tasnef']= $this->input->post('tasnef');
         $data['tasnef_n']= $this->input->post('tasnef_n');
         $data['details']= $this->input->post('details');
         $data['date_ar']= date('Y-m-d');
         $data['date_s']=  strtotime(date('Y-m-d'));
         $data['publisher_name'] = $this->getUserName($_SESSION['user_id']);
         $data['publisher'] = $_SESSION['user_id'];
         $data['map_google_lng'] = $this->input->post('map_google_lng');
         $data['map_google_lat'] = $this->input->post('map_google_lat');

         $this->db->where('id',$this->input->post('id'));
         $this->db->update('arch_notes',$data);
     }

     public function get_by_id($id){

         $this->db->where('id',$id);
         $query = $this->db->get('arch_notes');
         if ($query->num_rows()>0){
             return $query->row();
         }else{
             return false;
         }

     }
     public function delete_event($id){
         $this->db->where('id',$id);
         $this->db->delete('arch_notes');
     }
     public function delete_event_emp($id){
        $this->db->where('notes_id_fk',$id);
        $this->db->delete('arch_notes_history');
    }
     
     public function get_departs(){

         $this->db->where('from_id_fk !=',0);
         $query = $this->db->get('department_jobs');
         if ($query->num_rows()>0){
             return $query->result();
         }else{
             return false;
         }
     }

     public function get_tasnef(){

         $this->db->where('from_code',901);
         $query = $this->db->get('arch_setting');
         if ($query->num_rows()>0){
             return $query->result();
         }else{
             return false;
         }
     }
     ///////////////////////////////////////notifcation////////

     
   public function total_rows($q=NULL){
   $this->db->like('id',$q);  
   $this->db->where('to_user_id',$_SESSION['emp_code']);
    $date = date('Y/m/d');
    $this->db->where('date',$date);
    $this->db->where('seen',0);     
    $this->db->from('arch_notes_history');
    return $this->db->count_all_results();
    }
    public function get_new_notes($q=NULL)
    {
       $date = date('Y/m/d');
       $this->db->where('date',$date);
       $this->db->where('seen',0);  
       $this->db->where('to_user_id',$_SESSION['emp_code']);
       $this->db->from('arch_notes_history');
        return $this->db->get()->result();
        
    }
    public function update_seen_notes()
    {
       
       $data['seen']=1;
         
     $this->db->where('to_user_id',$_SESSION['emp_code'])->update('arch_notes_history',$data);
    
    
    }
    /////////////////////////yara_started//////////////////////////
    public function add_tasnef($type)
    {
        $data['title'] =$this->input->post('tasnef');
        $data['from_code'] = $type;
        $this->db->insert('arch_setting', $data);
    }
    public function update_tasnef($type,$id)
    {
        $data['title'] = $this->input->post('tasnef');
        $data['from_code'] = $type;
        $this->db->where('id',$id)->update('arch_setting', $data);
    }
    public function GetFromGeneral_settings($id,$type)
    {
        $this->db->select('*');
        $this->db->from('arch_setting');
        $this->db->where('from_code', $type);
        $this->db->where('id', $id);
        $query = $this->db->get()->row();
        return $query;
    }
    public function delete_setting($id)
    {

        $this->db->where("id", $id);
        $this->db->delete("arch_setting");
    }
    
    

 }