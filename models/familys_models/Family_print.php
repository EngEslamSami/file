<?php

class Family_print extends CI_Model
{

    public function __construct() {

        parent::__construct();

    }
//---------------------------------------------------
    public function chek_Null($post_value){
        if($post_value == '' || $post_value==null || (!isset($post_value))){
            $out='';
            return $out;
        }else{
            return $post_value;
        }
    }
//----------------------------------------------------
    public   function HijriToJD10($date_in)
    {
        $ex =(explode('/',$date_in));
        $d   = $ex[0];
        $m =$ex[1];
        $y  =$ex[2];
        return (int)((11 * $y + 3) / 30) + (int)(354 * $y) + (int)(30 * $m)
        - (int)(($m - 1) / 2) + $d + 1948440 - 385;
    }
//---------------------------------------------------


//=============================================================================================
    public function select_all($mother_national_num_fk){

        $arr_tables =array('father','mother','f_members','houses','devices',
              'home_needs','family_attach_files','family_income_duties','wakels');
        $arr_data =array();
        foreach ($arr_tables as $record){
            $arr_data[$record] =$this->getTable($record,$mother_national_num_fk);
          }
        return $arr_data;
    }


public function getTable($table,$mother_national_num_fk){
    $this->db->select('*');
    $this->db->from($table);
    $this->db->where("mother_national_num_fk",$mother_national_num_fk);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        if($table ==='f_members' ||  $table ==='devices' ||  $table ==='home_needs' ){
              $a=0;
            foreach ($query->result() as $row) {
                $data[$a] = $row;
                if( isset($row->stage_id_fk) && $row->stage_id_fk !=0 && $row->stage_id_fk!=''){
                    $data[$a]->stage_name = $this->get_classroom_name($row->stage_id_fk);
                }
                if( isset($row->class_id_fk) &&  $row->class_id_fk !=0 && $row->class_id_fk!='') {
                    $data[$a]->class_name = $this->get_classroom_name($row->class_id_fk);
                }
                    $a++;}
        }elseif($table ==='family_income_duties'){
            $a=0;
            foreach ($query->result() as $row) {
                $data[$row->finance_income_type_id] = $row;
                $a++;}

        }else{
            $data = $query->result()[0];
        }
        return $data;
    }else{
        return 0;
    }

}



    public function get_from_family_setting($type)
    {
        $this->db->select('*');
        $this->db->from('family_setting');
        $this->db->where("type",$type);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {
                    $data[$row->id_setting] = $row->title_setting;
                }
            return $data;
        }else{
            return 0;
        }

    }



    public  function select_places($from_id){
        $this->db->select('*');
        $this->db->from("area_settings");
        $this->db->where("from_id",$from_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->id] = $row->title;
            }
            return $data;
        }else{
            return 0;
        }
    }

    public function select_banks()
    {
        $this->db->select('*');
        $this->db->from('banks');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->id] = $row->bank_name;
            }
            return $data;
        }else{
            return 0;
        }

    }
    
    
      //================================================
    public function get_research($id){
        $h = $this->db->get_where('researcher_opinion', array('mother_national_num_fk'=>$id));
        if($h->num_rows() > 0) {
            return $h->row_array();
        }
        return false;
    }
    
    /*
        public function get_classroom_name($id){
        $this->db->select('*');
        $this->db->from('classrooms');
        $this->db->where("id",$id);
        $myquery = $this->db->get();
        $all_resultes = $myquery->result()[0]->name;
        return $all_resultes;
    }*/
    
    public function get_classroom_name($id){
    $this->db->select('*');
    $this->db->from('classrooms');
    $this->db->where("id",$id);
    $myquery = $this->db->get();
    if ($myquery->num_rows() > 0) {
        $all_resultes = $myquery->result()[0]->name;
        return $all_resultes;
    }else{
        return 0;
    }
}
    
    
    
    	public function printEqrar($mother_national_num)
    {
        return $this->db->where('mother_national_num',$mother_national_num)->get('basic')->row_array();
    }
    
    
       public function printEqrar_khdma($mother_national_num)
    {
        $this->db->where('mother_national_num', $mother_national_num);
        $this->db->join('family_setting', ' family_setting.id_setting = basic.person_relationship');
        $query = $this->db->get('basic');
                        
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }
    
    

    

    
    
    
    
    
    
        public function get_files_status_setting()
    {
        $this->db->select('*');
        $this->db->from('files_status_setting');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->id] = $row->title;
            }
            return $data;
        }else{
            return 0;
        }

    }



    public function get_all_files_status()
    {
        $this->db->select('*');
        $this->db->from('files_status_setting');

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->id] = $row->title;
            }
            return $data;
        }else{
            return 0;
        }

    }


    public function family_bank_responsible($mother_num)
    {
        $this->db->select('*');
        $this->db->from('family_bank_responsible');
        $this->db->where("family_national_num_fk",$mother_num);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->row();
            return $data;
        }else{
            return 0;
        }

    }


    public function get_mother_f_members()
    {
        $this->db->select('*');
        $this->db->from('f_members');

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->id] = $row->member_full_name;
            }
            return $data;
        }else{
            return 0;
        }

    }



}// END CLAS