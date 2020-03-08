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

    public function select_last_letter_rkm()
    {
        $this->db->select('*');
        $this->db->from("family_namazeg_letters");
        $this->db->order_by("id", "DESC");
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data = $row->letter_rkm + 1;
            }
            return $data;
        } else {
            return 1;
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
         $this->db->order_by("id", "DESC");
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
        $this->db->where('basic.file_status', 1);

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
      //  $this->db->where_in("persons_status",array(1,2));
      $this->db->where("persons_status",1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows() ;
        } else {
            return 0;
        }


    }
    
        public function get_mother_status($mother_num){

        $this->db->select('*');
        $this->db->from("mother");
        $this->db->where("mother_national_num_fk", $mother_num);

      $this->db->where("halt_elmostafid_m",1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows() ;
        } else {
            return 0;
        }


    }
    
    
    
    
    
    


    public function insert(){

$var = time() + 5;
        if ($var == true) {
            $last_last_letter_rkm = $this->select_last_letter_rkm();
        }


        $data['letter_rkm'] = $last_last_letter_rkm;



        //   $data['letter_rkm'] =$this->input->post('letter_rkm');
           $data['header_name'] =$this->input->post('header_name');
           $data['file_num'] =$this->input->post('file_num');
           $data['letter_rkm_full'] =$this->input->post('file_num').'/'.$this->input->post('letter_rkm');
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
            $data['responsable_name'] =$this->input->post('responsable_name');
           $data['date'] = strtotime(date('Y-m-d'));
           $data['date_ar'] = date('Y-m-d');
           $data['publisher'] =$_SESSION['user_id'];
           $data['publisher_name'] =$this->getUserName($_SESSION['user_id']);;
           $this->db->insert("family_namazeg_letters", $data);


    }


    public function update(){


           $var = time() + 5;
        if ($var == true) {
            $last_last_letter_rkm = $this->select_last_letter_rkm();
        }


        $data['letter_rkm'] = $last_last_letter_rkm;




      //  $data['letter_rkm'] =$this->input->post('letter_rkm');
        $data['header_name'] =$this->input->post('header_name');
     //   $data['file_num'] =$this->input->post('file_num');
      //  $data['letter_rkm_full'] =$this->input->post('letter_rkm').'/'.$this->input->post('file_num');
      //  $data['letter_date'] =strtotime($this->input->post('letter_date'));
      //  $data['letter_date_ar'] =$this->input->post('letter_date');
      //  $data['mother_national_num'] =$this->input->post('mother_national_num');
      //  $data['father_national_num'] =$this->input->post('father_card');
      //  $data['father_name'] =$this->input->post('father_name');
      //  $data['no_afrad'] =$this->input->post('no_afrad');
        $data['namozeg_type_fk'] =$this->input->post('namozeg_type_fk');
        $data['start_laqb'] =$this->input->post('start_laqb');
        $data['end_laqb'] =$this->input->post('end_laqb');
        $data['geha_name'] =$this->input->post('geha_name');
        $data['namozg_head'] =$this->input->post('namozg_head');
        $data['namozg_footer'] =$this->input->post('namozg_footer');
        $data['mawdo3'] =$this->input->post('mawdo3');
           $data['responsable_name'] =$this->input->post('responsable_name');
        $this->db->where("letter_rkm", $_POST['letter_rkm']);
        $this->db->update("family_namazeg_letters", $data);


    }

    /*public function insert_setting(){

        $data['letter_name'] =$this->input->post('mawdo3');
        $data['namozg_head'] =$this->input->post('namozg_head');
        $data['namozg_footer'] =$this->input->post('namozg_footer');
        $this->db->insert("family_nmazg_letter_setting", $data);

    }*/
    
     public function insert_setting(){
        $data['letter_name'] =$this->input->post('letter_name');
        $data['namozg_head'] =$this->input->post('namozg_head');
        $data['namozg_footer'] =$this->input->post('namozg_footer');
        $this->db->insert("family_nmazg_letter_setting", $data);

    }


    public function Delete($rkm){
        $this->db->where("letter_rkm",$rkm);
        $this->db->delete("family_namazeg_letters");
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




    public function insert_geha(){
        $data['title'] = $this->input->post('title');
        $data['mob'] = $this->input->post('mob');
        $data['address'] = $this->input->post('address');
        $this->db->insert('family_letter_setting', $data);
    }



    public function select_family_letter_setting(){

        $query = $this->db->get('family_letter_setting');
        if ($query->num_rows() > 0) {
            return $query->result() ;
        }
        return false;
    }


        public function getAllDetails($arr){

            $this->db->select('family_namazeg_letters.*,family_nmazg_letter_setting.id,family_nmazg_letter_setting.letter_name');
            $this->db->from("family_namazeg_letters");
            $this->db->where($arr);
            $this->db->join('family_nmazg_letter_setting','family_namazeg_letters.namozeg_type_fk =family_nmazg_letter_setting.id','left');
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                return $query->row_array();
            } else {
                return false;
            }


        }

    public function GetFromFr_settings($type){
        $this->db->select('*');
        $this->db->from('fr_settings');
        $this->db->where('type',$type);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data[$row['id_setting']] = $row;
            }
            return $data;
        }
        return false;
    }
    
    
        public function get_geha_by_id($id){
        $this->db->where('id',$id);
        $query = $this->db->get('family_letter_setting');
        if ($query->num_rows() >0){
            return $query->row();
        }
        return false;
    }
    public function delete_geha($id){

        $this->db->where('id',$id);
        $this->db->delete('family_letter_setting');
    }
    public function update_geah($id){


        $data['title']= $this->input->post('geha_title');
        $data['mob']= $this->input->post('mob');
        $data['address']= $this->input->post('address');
        $this->db->where('id',$id);
        $this->db->update('family_letter_setting',$data);
    }
    
    
    
    
    

    public function insert_attach($id,$rkm,$all_img){


        if(!empty($all_img)){
            $img_count = count($all_img);
            $title =$this->input->post('title');

            for ($a=0 ;$a < $img_count; $a++){
                $files['letter_id_fk'] = $id;
                $files['letter_rkm'] = $rkm;
                $files['file'] = $all_img[$a];
                $files['title'] = $title[$a];
                $files['date'] = date("Y-m-d");
                $this->db->insert('family_nmazg_letter_attaches',$files);
            }

        }


    }
    public function get_attach($id){
        $this->db->where('letter_rkm',$id);
        $query= $this->db->get('family_nmazg_letter_attaches');
        if ($query->num_rows()>0){
            return $query->result();
        }

    }

    public function delete_attach($id){

        $this->db->where('id',$id);
        $this->db->delete('family_nmazg_letter_attaches');
    }


/*********************************************************/


   public function family_member($file_num)
    {
        $q = $this->db->select('mother.mother_national_num_fk,mother.full_name')->where('basic.file_num', $file_num)
            ->join('basic', 'basic.mother_national_num = mother.mother_national_num_fk')->get('mother')->row();

        if (!empty($q)) {
            $q->sons = $this->db->select('member_full_name')->where('mother_national_num_fk', $q->mother_national_num_fk)
                ->get('f_members')->result();
            return $q;
        }
        return false;

    }







}

