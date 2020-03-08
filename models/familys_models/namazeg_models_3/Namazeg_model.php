<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Namazeg_model extends CI_Model
{
    public function chek_Null($post_value)
    {
        if ($post_value == '' || $post_value == null || (!isset($post_value))) {
            $val = '';
            return $val;
        } else {
            return $post_value;
        }
    }


    public function select_last_id()
    {
        $this->db->select('*');
        $this->db->from("family_namazeg_letters");
        $this->db->order_by("id", "DESC");
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data = $row->id + 1;
            }
            return $data;
        } else {
            return 1;
        }
    }

    public function select_all()
    {
        $this->db->select('*');
        $this->db->from("family_namazeg_letters");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {

            return $query->result();
        } else {
            return false;
        }
    }


    public function select_family_table()
    {
        $this->db->select('basic.*,
      basic.mother_national_num  as  faher_name ,
         father.f_national_id     as  father_national,
          father.full_name as father_full_name,
           mother.full_name     as  mother_name,
           mother.mother_national_card_new     as  mother_new_card,
            files_status_setting.title as process_title ,
              files_status_setting.color as files_status_color ,
            mother.categoriey_m as categorey');
        $this->db->from('basic');
        $this->db->join('father', 'father.mother_national_num_fk = basic.mother_national_num', "left");
        $this->db->join('mother', 'mother.mother_national_num_fk = basic.mother_national_num', "left");
        $this->db->join('files_status_setting', 'files_status_setting.id = basic.file_status', "left");
        $this->db->where('basic.final_suspend', 4);
        $this->db->where('basic.deleted', 0);

        $this->db->order_by('file_num', "ASC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }else{

            return false;
        }
    }


    public function getFileNUmData($file_num){
      $this->db->select('basic.*,
      basic.mother_national_num  as  faher_name ,
         father.f_national_id     as  father_national,
          father.full_name as father_full_name,
           mother.full_name     as  mother_name,
           mother.mother_national_card_new     as  mother_new_card,
            files_status_setting.title as process_title ,
              files_status_setting.color as files_status_color ,
            mother.categoriey_m as categorey');
        $this->db->from('basic');
        $this->db->join('father', 'father.mother_national_num_fk = basic.mother_national_num', "left");
        $this->db->join('mother', 'mother.mother_national_num_fk = basic.mother_national_num', "left");
        $this->db->join('files_status_setting', 'files_status_setting.id = basic.file_status', "left");
        $this->db->where('basic.file_num',$file_num);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {

      return $query->row_array();


        }else{

            return false;
        }


    }



    public function getFamilyNum($mother_num){

        $this->db->select('*');
        $this->db->from("f_members");
        $this->db->where("mother_national_num_fk", $mother_num);
        $this->db->where_in("persons_status",array(1,2));
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows() ;
        } else {
            return 0;
        }


    }


    public function insert(){
  /*     echo "<pre>";
        print_r($_POST);
        echo "</pre>";
        die;*/

           $data['letter_rkm'] =$this->input->post('letter_rkm');
           $data['file_num'] =$this->input->post('file_num');
           $data['letter_rkm_full'] =$this->input->post('letter_rkm').'/'.$this->input->post('file_num');
           $data['letter_date'] =strtotime($this->input->post('letter_date'));
           $data['letter_date_ar'] =$this->input->post('letter_date');
           $data['mother_national_num'] =$this->input->post('mother_national_num');
           $data['father_national_num'] =$this->input->post('father_card');
           $data['father_name'] =$this->input->post('father_name');
           $data['no_afrad'] =$this->input->post('no_afrad');
           $data['namozeg_type_fk'] =$this->input->post('namozeg_type_fk');
           $data['start_laqb'] =$this->input->post('start_laqb');
           $data['end_laqb'] =$this->input->post('end_laqb');
           $data['geha_name'] =$this->input->post('geha_name');
           $data['namozg_head'] =$this->input->post('namozg_head');
           $data['namozg_footer'] =$this->input->post('namozg_footer');
           $data['mawdo3'] =$this->input->post('mawdo3');
           $data['date'] = strtotime(date('Y-m-d'));
           $data['date_ar'] = date('Y-m-d');
           $data['publisher'] =$_SESSION['user_id'];
           $data['publisher_name'] =$this->getUserName($_SESSION['user_id']);;
           $this->db->insert("family_namazeg_letters", $data);


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

}

