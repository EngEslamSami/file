<?php
class Responsible_account extends CI_Model
{
    public function get_mother_data($mother_num)
    {
        $this->db->select('id,full_name');
        $this->db->where('mother_national_num_fk', $mother_num);
        $query=$this->db->get('mother');
        if($query->num_rows()>0)
        {
            return $query->row();
        }else{
            return false;
        }
    }
    public function get_mother_f_members($mother_num)
    {
        $this->db->select('id,member_full_name,member_gender');
        $this->db->where('mother_national_num_fk', $mother_num);
        $query=$this->db->get('f_members');
        if($query->num_rows()>0)
        {
            return $query->result();
        }else{
            return false;
        }

    }
    
    
    
    public function insert($mother_num,$img)
    {

         
        $data['bank_image']=$img;
        $data['family_national_num_fk']=$mother_num;
        $data['type']=explode('-',$this->input->post('person_id_fk'))[1];
        $data['person_id_fk']=explode('-',$this->input->post('person_id_fk'))[0];
        $data['person_name']=$this->input->post('person_name');
        $data['person_relationship']=$this->input->post('person_relationship');
        $data['person_national_card']=$this->input->post('person_national_card');
        $data['bank_id_fk']=explode('-',$this->input->post('bank_id_fk'))[0];;
        $data['bank_account_num']=$this->input->post('bank_account_num');
        $data['bank_code']=$this->input->post('bank_code');
        $data['person_mob']=$this->input->post('person_mob');


        $this->db->insert('family_bank_responsible',$data);


        
    }

    public function get_all()
    {
        $this->db->where('family_national_num_fk',$this->uri->segment(4));
         $this->db->order_by('id','desc');
        $query= $this->db->get('family_bank_responsible')->result();
        $x=0;
        $data=array();

        foreach ($query as $row)
        {
            $data[$x]=$row;
            $data[$x]->bank_name=$this->get_bank_name($row->bank_id_fk);
            $data[$x]->person=$this->get_person($row->type,$row->person_id_fk,$row->person_name);
$x++;
        }
        return $data;

    }

    public function get_bank_name($id)
    {
        $this->db->where('id', $id);
        $query=$this->db->get('banks_settings');
        if($query->num_rows()>0)
        {
            return $query->row()->ar_name;
        }else{
            return "لم يضاف الاسم";
        }
    }

    public function get_person($type,$person_id_fk,$person_name)
    {

        if($type==0){

           return $person_name;

        }elseif ($type==1){


            $this->db->where('id', $person_id_fk);
            $query=$this->db->get('mother');
            if($query->num_rows()>0)
            {
                return $query->row()->full_name;
            }else{
                return "لم يضاف الاسم";
            }


        }elseif ($type==2){




            $this->db->where('id', $person_id_fk);
            $query=$this->db->get('f_members');
            if($query->num_rows()>0)
            {
                return $query->row()->member_full_name;
            }else{
                return "لم يضاف الاسم";
            }
        }

    }

   /* public function update_account()
    {

        $data['bank_id_fk']=explode('-',$this->input->post('edit_bank_id_fk'))[0];
        $data['bank_account_num']=$this->input->post('edit_bank_account_num');
        $data['bank_code']=$this->input->post('edit_bank_code');
        $person=$this->input->post('person_id');
         $this->db->where('id',$person);
        $this->db->update('family_bank_responsible',$data);

    }*/
    public function update_account($img)
    {
       
        if($img!=''){
            $data['bank_image']=$img;
        }
        $data['person_id_fk']=explode('-',$this->input->post('edit_person_id_fk'))[0];
        $data['type']=explode('-',$this->input->post('edit_person_id_fk'))[1];
        $data['person_name']=$this->input->post('edit_person_name');
        $data['person_relationship']=$this->input->post('edit_person_relationship');
        $data['person_national_card']=$this->input->post('edit_person_national_card');

        $data['person_mob']=$this->input->post('edit_person_mob');


        $data['bank_id_fk']=explode('-',$this->input->post('edit_bank_id_fk'))[0];
        $data['bank_account_num']=$this->input->post('edit_bank_account_num');
        $data['bank_code']=$this->input->post('edit_bank_code');

        $person=$this->input->post('person_id');
         $this->db->where('id',$person);
        $this->db->update('family_bank_responsible',$data);

    }

    public function delete_record_db($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('family_bank_responsible');
    }

    public function get_data_person()
    {
        $type = explode('-', $this->input->post('valu'))[1];
        $id = explode('-', $this->input->post('valu'))[0];
      if ($type == 1) {
          $this->db->select('mother_national_num_fk,m_mob,m_relationship');
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
        $valu=$this->input->post('valu');



           if($valu==1) {
               $data['active']=$this->input->post('valu');
               $bank_id_fk= $this->input->post('bank_id_fk');
               $bank_account_num=$this->input->post('bank_account_num');
               $mother_num=$this->input->post('mother_num');

               $data['delete_status']=1;
               $data['edit_status']=1;

               $this->not_active($this->input->post('mother_num'));
               $this->update_table_basic($mother_num,$bank_id_fk,$bank_account_num);

            $person = $this->input->post('id');
            
            $this->db->where('id', $person);
            $this->db->update('family_bank_responsible', $data);

          }else{
               $data['active']=$this->input->post('valu');
            $person = $this->input->post('id');
            $this->db->where('id', $person);
            $this->db->update('family_bank_responsible', $data);
        }
    }

  /* public function not_active($mother_num)
   {
       $data['active']=0;
       $this->db->where('family_national_num_fk', $mother_num);
       $this->db->update('family_bank_responsible', $data);
   }*/
   
   public function not_active($mother_num)
{
    $data['active']=0;
    $data['edit_status']=0;
    $data['edit_status']=0;
    $this->db->where('family_national_num_fk', $mother_num);
    $this->db->update('family_bank_responsible', $data);
}

    public function update_table_basic($mother_num,$bank_id_fk,$bank_account_num)
    {
        $data['bank_family_id_fk']=strip_tags($bank_id_fk);
        $data['bank_family_account_num']=strip_tags($bank_account_num);
        $this->db->where('mother_national_num',$mother_num);
        $this->db->update('basic', $data);

    }

}