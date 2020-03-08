<?php
 class Notes_model extends CI_Model{
          public function add_notes($id){
               $data['type']= $this->input->post('type');
               $data['date']= $this->input->post('date');
               $data['qsm']= $this->input->post('qsm');
               $data['tasnef']= $this->input->post('tasnef');
               $data['details']= $this->input->post('details');
               $data['date_ar']= date('Y-m-d');
               $data['date_s']=  strtotime(date('Y-m-d'));
               $data['publisher_name'] = $this->getUserName($_SESSION['user_id']);
               $data['publisher'] = $_SESSION['user_id'];
               if (!empty($id)){
                   $this->db->where('id',$this->input->post('id'));
                   $this->db->update('arch_notes',$data);
               } else{
                   $this->db->insert('arch_notes',$data);
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

     public function getUserNameByRoll($id,$table,$field)
     {
         return $this->db->where('id',$id)->get($table)->row_array()[$field];
     }

     /*public function get_events(){
         return $this->db->get('arch_notes')->result();
     }*/
      public function get_events($id){
              $this->db->where('publisher',$id);
              $query = $this->db->get('arch_notes');
              if ($query->num_rows()>0){
                  return $query->result();
              } else{
                  return false;
              }
      
     }
     
     public function update_event(){
         $data['type']= $this->input->post('type');
         $data['date']= $this->input->post('date');
         $data['qsm']= $this->input->post('qsm');
         $data['tasnef']= $this->input->post('tasnef');
         $data['details']= $this->input->post('details');
         $data['date_ar']= date('Y-m-d');
         $data['date_s']=  strtotime(date('Y-m-d'));
         $data['publisher_name'] = $this->getUserName($_SESSION['user_id']);
         $data['publisher'] = $_SESSION['user_id'];
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
 }