<?php

class general_assembly_model extends CI_Model
{

    public function chek_Null($post_value){
        if($post_value == '' || $post_value==null || (!isset($post_value))){
            $val='';
            return $val;
        }else{
            return $post_value;
        }
    }
//-----------------------------------------------------    
    public function insert($files){

        if(!empty($files)){
            foreach ($files as  $name =>$file){
                if(!empty($file)){
                    $data[$name] = $this->chek_Null($file);
                }
            }

        }

        $data['name'] = $this->chek_Null($this->input->post('name'));
        $data['gender'] = $this->chek_Null($this->input->post('gender'));
        $data['nationality'] = $this->chek_Null($this->input->post('nationality'));
        $data['marital_status'] = $this->chek_Null($this->input->post('marital_status'));
        $data['card_num'] = $this->chek_Null($this->input->post('card_num'));
        $data['esdar_geha'] = $this->chek_Null($this->input->post('esdar_geha'));
        $data['esdar_date'] = $this->chek_Null($this->input->post('esdar_date'));
        $data['birth_date'] = $this->chek_Null($this->input->post('birth_date'));
        //$data['age'] = $this->chek_Null($this->input->post('age'));
        $data['mob'] = $this->chek_Null($this->input->post('mob'));
        $data['another_mob'] = $this->chek_Null($this->input->post('another_mob'));
        $data['city_id_fk'] = $this->chek_Null($this->input->post('city_id_fk'));
        $data['hai_id_fk'] = $this->chek_Null($this->input->post('hai_id_fk'));
        $data['street_name'] = $this->chek_Null($this->input->post('street_name'));
        $data['adress'] = $this->chek_Null($this->input->post('adress'));
        $data['email'] = $this->chek_Null($this->input->post('email'));
        $data['degree'] = $this->chek_Null($this->input->post('degree'));
        $data['scientific_qualification_id_fk'] = $this->chek_Null($this->input->post('science_qualification'));
        $data['working_life'] = $this->chek_Null($this->input->post('working_life'));
        $data['job'] = $this->chek_Null($this->input->post('job'));
        $data['employer'] = $this->chek_Null($this->input->post('employer'));
        $data['work_adress'] = $this->chek_Null($this->input->post('work_adress'));
        $data['work_mobile'] = $this->chek_Null($this->input->post('work_mobile'));
        $data['location_google_lng'] = $this->chek_Null($this->input->post('location_google_lng'));
        $data['location_google_lat'] = $this->chek_Null($this->input->post('location_google_lat'));

        $this->db->insert('general_assembley_members', $data);

    }

        public function update($files, $id ){


            if(!empty($files)){
                foreach ($files as  $name =>$file){
                    if(!empty($file)){
                        $data[$name] = $this->chek_Null($file);
                    }

                }

            }

            $data['name'] = $this->chek_Null($this->input->post('name'));
            $data['gender'] = $this->chek_Null($this->input->post('gender'));
            $data['nationality'] = $this->chek_Null($this->input->post('nationality'));
            $data['marital_status'] = $this->chek_Null($this->input->post('marital_status'));
            $data['card_num'] = $this->chek_Null($this->input->post('card_num'));
            $data['esdar_geha'] = $this->chek_Null($this->input->post('esdar_geha'));
            $data['esdar_date'] = $this->chek_Null($this->input->post('esdar_date'));
            $data['birth_date'] = $this->chek_Null($this->input->post('birth_date'));
            //$data['age'] = $this->chek_Null($this->input->post('age'));
            $data['mob'] = $this->chek_Null($this->input->post('mob'));
            $data['another_mob'] = $this->chek_Null($this->input->post('another_mob'));
            $data['city_id_fk'] = $this->chek_Null($this->input->post('city_id_fk'));
            $data['hai_id_fk'] = $this->chek_Null($this->input->post('hai_id_fk'));
            $data['street_name'] = $this->chek_Null($this->input->post('street_name'));
            $data['adress'] = $this->chek_Null($this->input->post('adress'));
            $data['email'] = $this->chek_Null($this->input->post('email'));
            $data['degree'] = $this->chek_Null($this->input->post('degree'));
            $data['scientific_qualification_id_fk'] = $this->chek_Null($this->input->post('science_qualification'));
            $data['working_life'] = $this->chek_Null($this->input->post('working_life'));
            $data['job'] = $this->chek_Null($this->input->post('job'));
            $data['employer'] = $this->chek_Null($this->input->post('employer'));
            $data['work_adress'] = $this->chek_Null($this->input->post('work_adress'));
            $data['work_mobile'] = $this->chek_Null($this->input->post('work_mobile'));
            $data['location_google_lng'] = $this->chek_Null($this->input->post('location_google_lng'));
            $data['location_google_lat'] = $this->chek_Null($this->input->post('location_google_lat'));
            $this->db->where('id',$id);
            $this->db->update('general_assembley_members', $data);


        }




    public function ChangeType($id,$value){

   $last_membership =$this->last_num();
      if($value ==0){
          $val=1;
      }else{
          $val=0;
      }
        $data['suspend'] = $val;
        $data['membership_num'] = $last_membership;
        $this->db->where('id',$id);
        $this->db->update('general_assembley_members', $data);
    }


    public function last_num(){
        $this->db->select('*');
        $this->db->from('general_assembley_members');
        $this->db->order_by("membership_num","DESC");
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result()[0]->membership_num + 1;
        }else{
            return 1;
        }

    }

    //------------------------------------------------------------------
    public  function delete($id){

    $this->db->where("id",$id);
    $this->db->delete("general_assembley_members");
    }
    //-----------------------------------------------------    


/*=========================================================================*/


    public function GetFromEmployees_settings($type){
        $this->db->select('*');
        $this->db->from('employees_settings');
        $this->db->where('type',$type);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->id_setting] = $row;
            }
            return $data;
        }
        return false;
    }




    public function GetFromGeneral_assembly_settings($type){
        $this->db->select('*');
        $this->db->from('general_assembly_settings');
        $this->db->where('type',$type);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->id_setting] = $row;
            }
            return $data;
        }
        return false;
    }



    public function getById($id){

        $this->db->select('*');
        $this->db->from('general_assembley_members');
        $this->db->where('id',$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }else{
            return false;
        }

    }


}//END CLASS