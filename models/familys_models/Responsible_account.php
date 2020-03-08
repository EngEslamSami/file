<?php

class Responsible_account extends CI_Model
{
    //---------------------------------------------------
    private function chek_Null($post_value)
    {
        if ($post_value == '' || $post_value == null || (!isset($post_value)) && !empty($post_value)) {
            $val = "";
            return $val;
        } else {
            return $post_value;
        }
    }

    //---------------------------------------------------
    public function get_mother_data($mother_num)
    {
        $this->db->select('id,full_name');
        $this->db->where('mother_national_num_fk', $mother_num);
        $query = $this->db->get('mother');
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function get_mother_f_members($mother_num)
    {
        $this->db->select('id,member_full_name,member_gender');
        $this->db->where('mother_national_num_fk', $mother_num);
        $query = $this->db->get('f_members');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function insert($mother_num, $img)
    {
        $data['bank_image'] = $img;
        $data['family_national_num_fk'] = $mother_num;
        $data['type'] = explode('-', $this->input->post('person_id_fk'))[1];
        $data['person_id_fk'] = explode('-', $this->input->post('person_id_fk'))[0];
        $data['person_name'] = $this->input->post('person_name');
        $data['person_relationship'] = $this->input->post('person_relationship');
        $data['person_national_card'] = $this->input->post('person_national_card');
        $data['bank_id_fk'] = explode('-', $this->input->post('bank_id_fk'))[0];;
        $data['bank_account_num'] = $this->input->post('bank_account_num');
        $data['bank_code'] = $this->input->post('bank_code');
        $data['person_mob'] = $this->input->post('person_mob');
        $data['active'] = "1";
        $this->db->insert('family_bank_responsible', $data);
    }

    public function get_all()
    {
        $this->db->where('family_national_num_fk', $this->uri->segment(4));
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('family_bank_responsible')->result();
        $x = 0;
        $data = array();
        foreach ($query as $row) {
            $data[$x] = $row;
            $data[$x]->bank_name = $this->get_bank_name($row->bank_id_fk);
            $data[$x]->person = $this->get_person($row->type, $row->person_id_fk, $row->person_name);
            $data[$x]->responsible_operations = $this->get_responsible_operations($this->uri->segment(4));
            $x++;
        }
        return $data;
    }

    public function get_all_id($id)
    {
        $this->db->where('family_national_num_fk', $id);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('family_bank_responsible')->result();
        $x = 0;
        $data = array();
        foreach ($query as $row) {
            $data[$x] = $row;
            $data[$x]->bank_name = $this->get_bank_name($row->bank_id_fk);
            $data[$x]->person = $this->get_person($row->type, $row->person_id_fk, $row->person_name);
            $data[$x]->responsible_operations = $this->get_responsible_operations($id);
            $x++;
        }
        return $data;
    }

    public function get_responsible_operations($num)
    {
        $this->db->select('family_bank_responsible_operations.*,
                           family_bank_responsible_operations.id as bank_responsible_operations_id,
                           family_bank_responsible_operations.id as operation_id,
                           banks_settings.*, banks_settings.id as bank_id , 
                           banks_settings.ar_name as  bank_name ,
                           banks_settings.bank_code as  bank_code ,
                           family_setting.title_setting as relashtion_title
                           ');
        $this->db->from("family_bank_responsible_operations");
        $this->db->where('family_national_num_fk', $num);
        $this->db->join('banks_settings', 'banks_settings.id =family_bank_responsible_operations.past_bank_id', 'left');
        $this->db->join('family_setting', 'family_setting.id_setting=family_bank_responsible_operations.current_bank_relationship', 'left');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $a = 0;
            foreach ($query->result() as $row) {
                $data[$a] = $row;
             //   if ($row->past_bank_id_fk != 0) {
                    $data[$a]->person = $this->get_person($row->past_type, $row->past_bank_id_fk, $row->past_bank_name);
               // }
                $a++;
            }
            return $data;
        } else {
            return 0;
        }
    }

    public function get_bank_name($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('banks_settings');
        if ($query->num_rows() > 0) {
            return $query->row()->ar_name;
        } else {
            return "لم يضاف الاسم";
        }
    }

    public function get_person($type, $person_id_fk, $person_name)
    {
        if ($type == 0) {
            return $person_name;
        } elseif ($type == 1) {
            $this->db->where('id', $person_id_fk);
            $query = $this->db->get('mother');
            if ($query->num_rows() > 0) {
                return $query->row()->full_name;
            } else {
                return "لم يضاف الاسم";
            }
        } elseif ($type == 2) {
            $this->db->where('id', $person_id_fk);
            $query = $this->db->get('f_members');
            if ($query->num_rows() > 0) {
                return $query->row()->member_full_name;
            } else {
                return "لم يضاف الاسم";
            }
        }
    }

    public function update_account($img)
    {
        if ($img != '') {
            $data['bank_image'] = $img;
        }
        $data['person_id_fk'] = explode('-', $this->input->post('edit_person_id_fk'))[0];
        $data['type'] = explode('-', $this->input->post('edit_person_id_fk'))[1];
        if ($data['type'] == 0) {
            $data['person_name'] = $this->input->post('edit_person_name');
        }
        $data['person_relationship'] = $this->input->post('edit_person_relationship');
        $data['person_national_card'] = $this->input->post('edit_person_national_card');
        $data['person_mob'] = $this->input->post('edit_person_mob');
        $data['bank_id_fk'] = explode('-', $this->input->post('edit_bank_id_fk'))[0];
        $data['bank_account_num'] = $this->input->post('edit_bank_account_num');
        $data['bank_code'] = $this->input->post('edit_bank_code');
        $person = $this->input->post('person_id');
        $this->db->where('id', $person);
        $this->db->update('family_bank_responsible', $data);
        //=====================================================================================
        if ($img != '') {
            $data2['current_bank_image'] = $img;
        }
        $data2['current_bank_id_fk'] = explode('-', $this->input->post('edit_bank_id_fk'))[0];
        $data2['current_bank_name'] = $this->input->post('edit_bank_name');
        $data2['current_bank_relationship'] = $this->input->post('edit_bank_relationship');
        $data2['current_bank_national_card'] = $this->input->post('edit_bank_national_card');
        $data2['current_bank_mob'] = $this->input->post('edit_bank_mob');
        $data2['current_bank_id'] = explode('-', $this->input->post('edit_bank_id_fk'))[0];
        $data2['current_bank_code'] = $this->input->post('edit_bank_code');
        $this->db->where('family_national_num_fk', $this->input->post('mother_num'));
        $this->db->update('family_bank_responsible_operations', $data2);
    }

    public function delete_record_db($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('family_bank_responsible');
    }

    public function get_data_person()
    {
        $type = explode('-', $this->input->post('valu'))[1];
        $id = explode('-', $this->input->post('valu'))[0];
        if ($type == 1) {
            $this->db->select('mother_national_num_fk,m_mob,m_relationship , mother_national_card_new');
            $this->db->where('id', $id);
            $query = $this->db->get('mother');
            if ($query->num_rows() > 0) {
                return $query->row();
            } else {
                return "لم يضاف الاسم";
            }
        } else {
            $this->db->select('member_card_num,member_mob,member_relationship');
            $this->db->where('id', $id);
            $query = $this->db->get('f_members');
            if ($query->num_rows() > 0) {
                return $query->row();
            } else {
                return "لم يضاف الاسم";
            }
        }
    }

    public function edit_active()
    {
        $valu = $this->input->post('valu');
        if ($valu == 1) {
            $data['active'] = $this->input->post('valu');
            $bank_id_fk = $this->input->post('bank_id_fk');
            $bank_account_num = $this->input->post('bank_account_num');
            $mother_num = $this->input->post('mother_num');
            $data['delete_status'] = 1;
            $data['edit_status'] = 1;
            $this->not_active($this->input->post('mother_num'));
            $this->update_table_basic($mother_num, $bank_id_fk, $bank_account_num);
            $person = $this->input->post('id');
            $this->db->where('id', $person);
            $this->db->update('family_bank_responsible', $data);
        } else {
            $data['active'] = $this->input->post('valu');
            $person = $this->input->post('id');
            $this->db->where('id', $person);
            $this->db->update('family_bank_responsible', $data);
        }
    }

    public function not_active($mother_num)
    {
        $data['active'] = 0;
        $data['edit_status'] = 0;
        $data['edit_status'] = 0;
        $this->db->where('family_national_num_fk', $mother_num);
        $this->db->update('family_bank_responsible', $data);
    }

    public function update_table_basic($mother_num, $bank_id_fk, $bank_account_num)
    {
        $data['bank_family_id_fk'] = strip_tags($bank_id_fk);
        $data['bank_family_account_num'] = strip_tags($bank_account_num);
        $this->db->where('mother_national_num', $mother_num);
        $this->db->update('basic', $data);
    }

    public function change_responsible_account($file)
    {
        //insert_family_bank_responsible_operations
        if ($this->input->post('past_bank_id_fk') == 0) {
            $data['past_bank_id_fk'] = $this->chek_Null($this->input->post('past_bank_id_fk'));
            $data['past_bank_name'] = $this->chek_Null($this->input->post('past_bank_name'));
        } else {
            $data['past_type'] = $this->chek_Null(explode('-', $this->input->post('past_bank_id_fk'))[1]);
            $data['past_bank_id_fk'] = $this->chek_Null(explode('-', $this->input->post('past_bank_id_fk'))[0]);
        }
        $data['past_bank_image'] = $this->chek_Null($this->input->post('past_bank_image'));
        $data['past_bank_relationship'] = $this->chek_Null($this->input->post('past_bank_relationship'));
        $data['past_bank_national_card'] = $this->chek_Null($this->input->post('past_bank_national_card'));
        $data['past_bank_mob'] = $this->chek_Null($this->input->post('past_bank_mob'));
        $data['past_bank_id'] = $this->chek_Null($this->input->post('past_bank_id'));
        $data['past_bank_code'] = $this->chek_Null($this->input->post('past_bank_code'));
        $data['family_national_num_fk'] = $this->chek_Null($this->input->post('family_national_num_fk'));
        if ($this->input->post('current_bank_id_fk') == 0) {
            $data['current_bank_id_fk'] = $this->chek_Null($this->input->post('current_bank_id_fk'));
            $data['current_bank_name'] = $this->chek_Null($this->input->post('current_bank_name'));
        } else {
            $data['current_type'] = $this->chek_Null(explode('-', $this->input->post('current_bank_id_fk'))[1]);
            $data['current_bank_id_fk'] = $this->chek_Null(explode('-', $this->input->post('current_bank_id_fk'))[0]);
        }
        $data['current_bank_relationship'] = $this->chek_Null($this->input->post('current_bank_relationship'));
        $data['current_bank_national_card'] = $this->chek_Null($this->input->post('current_bank_national_card'));
        $data['current_bank_mob'] = $this->chek_Null($this->input->post('current_bank_mob'));
        $data['current_bank_id'] = $this->chek_Null(explode('-', $this->input->post('current_bank_id'))[0]);
        $data['current_bank_code'] = $this->chek_Null($this->input->post('current_bank_code'));
        if (!empty($file)) {
            $data['current_bank_image'] = $file;
        }
        $this->db->insert('family_bank_responsible_operations', $data);
        //update_family_bank_responsible
        $data2['type'] = $this->chek_Null(explode('-', $this->input->post('current_bank_id_fk'))[1]);
        $data2['person_id_fk'] = $this->chek_Null(explode('-', $this->input->post('current_bank_id_fk'))[0]);
        $data2['person_name'] = $this->chek_Null($this->input->post('current_bank_name'));
        $data2['person_national_card'] = $this->chek_Null($this->input->post('current_bank_national_card'));
        $data2['person_relationship'] = $this->chek_Null($this->input->post('current_bank_relationship'));
        $data2['bank_id_fk'] = $this->chek_Null(explode('-', $this->input->post('current_bank_id'))[0]);
        $data2['bank_account_num'] = $this->chek_Null($this->input->post('current_bank_code'));
        $data2['person_mob'] = $this->chek_Null($this->input->post('current_bank_mob'));
        if (!empty($file)) {
            $data2['bank_image'] = $file;
        }
        $data2['bank_code'] = $this->chek_Null($this->getBankCode($data2['bank_id_fk']));
        $this->db->where('family_national_num_fk', $this->input->post('family_national_num_fk'));
        $this->db->update('family_bank_responsible', $data2);
    }

    public function getBankCode($id)
    {
        $h = $this->db->get_where("banks_settings", array('id' => $id));
        return $h->row_array()['bank_code'];
    }

    public function get_operation_data($id)
    {
        $this->db->select('family_bank_responsible_operations.*,banks_settings.*,banks_settings.ar_name as  bank_name , banks_settings.bank_code as  bank_code');
        $this->db->from("family_bank_responsible_operations");
        $this->db->where('family_bank_responsible_operations.id', $id);
        $this->db->join('banks_settings', 'banks_settings.id=family_bank_responsible_operations.past_bank_id', 'left');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $a = 0;
            foreach ($query->result() as $row) {
                $data[$a] = $row;
                $data[$a]->file_num = $this->getFileNum($row->family_national_num_fk);
                $data[$a]->past_bank_name = $this->get_bank_name($row->past_bank_id);
                $data[$a]->current_bank_name = $this->get_bank_name($row->current_bank_id);
                $data[$a]->past_relationship = $this->get_from_family_setting($row->past_bank_relationship);
                $data[$a]->current_relationship = $this->get_from_family_setting($row->current_bank_relationship);
                if ($row->past_bank_id_fk != 0) {
                    $data[$a]->past_person = $this->get_person($row->past_type, $row->past_bank_id_fk, $row->past_bank_name);
                }
                if ($row->current_bank_id_fk != 0) {
                    $data[$a]->current_person = $this->get_person($row->current_type, $row->current_bank_id_fk, $row->current_bank_name);
                }
         
         
         $data[$a]->person_relationship = $this->get_person_id_fk($row->family_national_num_fk )['person_relationship'];
         
                
    if($row->current_type == 1){
    $data[$a]->current_person_name = $this->get_mother_name($row->family_national_num_fk )['full_name'];   
    $data[$a]->current_person_card = $this->get_mother_name($row->family_national_num_fk )['mother_national_card_new'];   
    $data[$a]->current_relation_name = $this->get_relation_name($data[$a]->person_relationship ); 
    
     $data[$a]->current_person_mob = $this->get_person_name( $row->family_national_num_fk )['person_mob'];
      $data[$a]->current_bank_num = $this->get_person_name( $row->family_national_num_fk )['bank_account_num'];
     
     
    
    }elseif($row->current_type == 2){
      $data[$a]->person_id_fk = $this->get_person_id_fk($row->family_national_num_fk )['person_id_fk'];
        
      $data[$a]->current_person_name = $this->get_member_name( $data[$a]->person_id_fk)['member_full_name']; 
      $data[$a]->current_person_card = $this->get_member_name( $data[$a]->person_id_fk)['member_card_num'];  
        $data[$a]->current_relation_name = $this->get_relation_name($data[$a]->person_relationship );   
         $data[$a]->current_person_mob = $this->get_person_name( $row->family_national_num_fk )['person_mob'];
          $data[$a]->current_bank_num = $this->get_person_name( $row->family_national_num_fk )['bank_account_num'];
          
    }elseif($row->current_type == 0){
        
    $data[$a]->current_person_name = $this->get_person_name( $row->family_national_num_fk )['person_name'];
    $data[$a]->current_person_card = $this->get_person_name( $row->family_national_num_fk )['person_national_card'];
    $data[$a]->current_person_mob = $this->get_person_name( $row->family_national_num_fk )['person_mob'];
     $data[$a]->current_bank_num = $this->get_person_name( $row->family_national_num_fk )['bank_account_num'];
    
    
    
      $data[$a]->current_relation_name = $this->get_relation_name($data[$a]->person_relationship ); 
        
    }
                
                
                
                $a++;
            }
            return $data;
        } else {
            return 0;
        }
    }


/*
    public function get_current_person_name($family_national_num_fk ,$current_type)
    {
            $this->db->select('*');
        $this->db->from('family_bank_responsible');
            $this->db->where("family_national_num_fk",$family_national_num_fk);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result() as $row) {
              //  $data[$i] = $row;
              if($row->type == 1){
                 $data[$i]->person_name = $this->get_mother_name(823);
              }elseif($current_type == 2){
                $data[$i]->person_name = $this->get_member_name($row->person_id_fk);
 
              }
              
              

                $i++;
            }
            return $data;
        }
        return false;
    }
    
    
    */
 
           public function get_relation_name($id)
    {
        $h = $this->db->get_where("family_setting", array('id_setting' => $id ,'type'=>34));
        $arr = $h->row_array();
       return $arr['title_setting'];
    }  
 
    
    
          public function get_person_name($family_national_num_fk)
    {
        $h = $this->db->get_where("family_bank_responsible", array('family_national_num_fk' => $family_national_num_fk));
      return  $arr = $h->row_array();
       // return $arr['person_name'];
    }  
    
        public function get_person_id_fk($family_national_num_fk)
    {
        $h = $this->db->get_where("family_bank_responsible", array('family_national_num_fk' => $family_national_num_fk));
      return  $arr = $h->row_array();
      //  return $arr['person_id_fk'];
    }

    public function get_mother_name($mother_national_num_fk)
    {
        $h = $this->db->get_where("mother", array('mother_national_num_fk' => $mother_national_num_fk));
      return  $arr = $h->row_array();
      //  return $arr['full_name'];
    }



    public function get_member_name($id)
    {
        $h = $this->db->get_where("f_members", array('id' => $id));
       return $arr = $h->row_array();
        // $arr['member_full_name'];
    }



    public function get_from_family_setting($id)
    {
        $this->db->select('*');
        $this->db->from('family_setting');
        $this->db->where("id_setting", $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result()[0]->title_setting;
        } else {
            return 0;
        }
    }

    public function getFileNum($mother_num)
    {
        $h = $this->db->get_where("basic", array('mother_national_num' => $mother_num));
        if ($h->num_rows() > 0) {
            return $h->row_array()['file_num'];
        } else {
            return 0;
        }
    }
    //=================================================
    public function add_attachment($family_national_num_fk ,$file){
        if(!empty($file)){
            $data["attachment"] = $file;
        }
        $this->db->where("family_national_num_fk", $family_national_num_fk);
        $this->db->update("family_bank_responsible",$data);

    }
    //=================================================
    public function add_attachment_operations($id ,$file){
        if(!empty($file)){
            $data["attachment"] = $file;
        }
        $this->db->where("id", $id);
        $this->db->update("family_bank_responsible_operations",$data);

    }
    
    
       public function getAllByNational($national_num_fk)
    {
        $this->db->where('family_national_num_fk',$national_num_fk);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('family_bank_responsible')->result();
        $x = 0;
        $data = array();
        foreach ($query as $row) {
            $data[$x] = $row;
            $data[$x]->bank_name = $this->get_bank_name($row->bank_id_fk);
            $data[$x]->person = $this->get_person($row->type, $row->person_id_fk, $row->person_name);
            $data[$x]->responsible_operations = $this->get_responsible_operations($national_num_fk);
            $x++;
        }
        return $data;
    }
    

}// END CLASS