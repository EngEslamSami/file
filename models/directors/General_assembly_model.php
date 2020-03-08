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
        
          $data['esdar_date_h'] = $this->chek_Null($this->input->post('esdar_date_h'));
        $data['birth_date_h'] = $this->chek_Null($this->input->post('birth_date_h'));


        $data['name'] = $this->chek_Null($this->input->post('name'));
        $data['gender_id_fk'] = $this->chek_Null($this->input->post('gender_id_fk'));
        $data['nationality_id_fk'] = $this->chek_Null($this->input->post('nationality_id_fk'));
        $data['social_status_id_fk'] = $this->chek_Null($this->input->post('social_status_id_fk'));
        $data['card_num'] = $this->chek_Null($this->input->post('card_num'));
        $data['esdar_card_fk'] = $this->chek_Null($this->input->post('esdar_card_fk'));
        $data['esdar_date'] = $this->chek_Null($this->input->post('esdar_date'));
        $data['birth_date'] = $this->chek_Null($this->input->post('birth_date'));
        $array_date=explode("/",$data['birth_date']);
        $data['birth_year'] = $this->chek_Null($array_date[2]);
        $data['mob'] = $this->chek_Null($this->input->post('mob'));
        $data['another_mob'] = $this->chek_Null($this->input->post('another_mob'));
        $data['city_id_fk'] = $this->chek_Null($this->input->post('city_id_fk'));
        $data['hai_id_fk'] = $this->chek_Null($this->input->post('hai_id_fk'));
        $data['national_address'] = $this->chek_Null($this->input->post('national_address'));

        $data['street_name'] = $this->chek_Null($this->input->post('street_name'));
        $data['email'] = $this->chek_Null($this->input->post('email'));
        $data['qualification_fk'] = $this->chek_Null($this->input->post('qualification_fk'));
        $data['scientific_degree_fk'] = $this->chek_Null($this->input->post('scientific_degree_fk'));
        $data['working_life'] = $this->chek_Null($this->input->post('working_life'));
        $data['job_name_fk'] = $this->chek_Null($this->input->post('job_name_fk'));
        $data['job_place_name'] = $this->chek_Null($this->input->post('job_place_name'));
        $data['job_address'] = $this->chek_Null($this->input->post('job_address'));
        $data['job_mob'] = $this->chek_Null($this->input->post('job_mob'));
        $data['map_google_lng'] = $this->chek_Null($this->input->post('map_google_lng'));
        $data['map_google_lat'] = $this->chek_Null($this->input->post('map_google_lat'));
        $data['surname'] = $this->chek_Null($this->input->post('surname'));
        $data['date'] = date('Y-m-d');
        $data['date_s'] = strtotime(date('Y-m-d'));
        $data['publisher'] = $_SESSION['user_id'];

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


      	$data['esdar_date_h'] = $this->chek_Null($this->input->post('esdar_date_h'));
		$data['birth_date_h'] = $this->chek_Null($this->input->post('birth_date_h'));
	  
            $data['name'] = $this->chek_Null($this->input->post('name'));
            $data['gender_id_fk'] = $this->chek_Null($this->input->post('gender_id_fk'));
            $data['nationality_id_fk'] = $this->chek_Null($this->input->post('nationality_id_fk'));
            $data['social_status_id_fk'] = $this->chek_Null($this->input->post('social_status_id_fk'));
            $data['card_num'] = $this->chek_Null($this->input->post('card_num'));
            $data['esdar_card_fk'] = $this->chek_Null($this->input->post('esdar_card_fk'));
            $data['esdar_date'] = $this->chek_Null($this->input->post('esdar_date'));
            $data['birth_date'] = $this->chek_Null($this->input->post('birth_date'));
            $array_date=explode("/",$data['birth_date']);
            $data['birth_year'] = $this->chek_Null($array_date[2]);
            $data['mob'] = $this->chek_Null($this->input->post('mob'));
            $data['another_mob'] = $this->chek_Null($this->input->post('another_mob'));
            $data['city_id_fk'] = $this->chek_Null($this->input->post('city_id_fk'));
            $data['hai_id_fk'] = $this->chek_Null($this->input->post('hai_id_fk'));
            $data['national_address'] = $this->chek_Null($this->input->post('national_address'));

            $data['street_name'] = $this->chek_Null($this->input->post('street_name'));
            $data['email'] = $this->chek_Null($this->input->post('email'));
            $data['qualification_fk'] = $this->chek_Null($this->input->post('qualification_fk'));
            $data['scientific_degree_fk'] = $this->chek_Null($this->input->post('scientific_degree_fk'));
            $data['working_life'] = $this->chek_Null($this->input->post('working_life'));
            $data['job_name_fk'] = $this->chek_Null($this->input->post('job_name_fk'));
            $data['job_place_name'] = $this->chek_Null($this->input->post('job_place_name'));
            $data['job_address'] = $this->chek_Null($this->input->post('job_address'));
            $data['job_mob'] = $this->chek_Null($this->input->post('job_mob'));
            $data['map_google_lng'] = $this->chek_Null($this->input->post('map_google_lng'));
            $data['map_google_lat'] = $this->chek_Null($this->input->post('map_google_lat'));
            $data['surname'] = $this->chek_Null($this->input->post('surname'));
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

    public function GetHaiName(){
        $this->db->select('*');
        $this->db->from('cities');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->id] = $row->name;
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



    public function select_all(){
        $this->db->select('*');
        $this->db->from('general_assembley_members');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row){
              $data[] =  $row;
            }
            return $data;
        }else{
            return false;
        }

    }

   public  function insert_membership_data($files,$id){


       if(!empty($files)){
           foreach ($files as  $name =>$file){
               if(!empty($file)){
                   $data[$name] = $this->chek_Null($file);
               }
           }

       }
       $data['qrar_date_h'] = $this->chek_Null($this->input->post('qrar_date_h'));
       $data['subs_date_from_h'] = $this->chek_Null($this->input->post('subs_date_from_h'));
       $data['subs_date_to_h'] = $this->chek_Null($this->input->post('subs_date_to_h'));
       $data['updates_date_h'] = $this->chek_Null($this->input->post('updates_date_h'));
       

       $data['membership_type'] = $this->chek_Null($this->input->post('membership_type'));
     //  $data['membership_jobtitle'] = $this->chek_Null($this->input->post('membership_jobtitle'));
       $data['qrar_num'] = $this->chek_Null($this->input->post('qrar_num'));
       $data['qrar_date'] = $this->chek_Null($this->input->post('qrar_date'));
       $data['subs_year_value'] = $this->chek_Null($this->input->post('subs_year_value'));
       $data['subs_date_from'] = $this->chek_Null($this->input->post('subs_date_from'));
       $data['subs_date_to'] = $this->chek_Null($this->input->post('subs_date_to'));
       $data['updates_date'] = $this->chek_Null($this->input->post('updates_date'));
       $data['pay_method_id_fk'] = $this->chek_Null($this->input->post('pay_method_id_fk'));
       $data['bank_id_fk'] = $this->chek_Null($this->input->post('bank_id_fk'));
       $data['bank_account_num'] = $this->chek_Null($this->input->post('bank_account_num'));
       $data['membership_status'] = $this->chek_Null($this->input->post('membership_status'));
       $data['membership_insert_date'] = date('Y-m-d');
       $data['membership_insert_date_s'] = strtotime(date('Y-m-d'));
       $data['membership_insert_date_ar'] = date('Y-m-d');
       $data['membership_insert_publisher'] = $_SESSION['user_id'];

       $this->db->where('id',$id);
       $this->db->update('general_assembley_members', $data);

   }
}//END CLASS