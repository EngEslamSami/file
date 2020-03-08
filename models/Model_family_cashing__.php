<?php
class Model_family_cashing extends CI_Model{
    public function __construct()
    {
        parent:: __construct();
        $this->main_table="";
    }
    //==========================================
    public function select_last_value_fild($fild){
        $this->db->select('*');
        $this->db->from($this->main_table);
        $this->db->order_by($fild,"DESC");
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data = $row->$fild;
            }
            return $data;
        }
        return 0;
    }

    public function select_where($Conditions_arr,$condition_year){
        $this->db->select('mother.mother_national_num_fk ,mother.full_name');
        $this->db->from("basic");
        $this->db->join('mother', 'mother.mother_national_num_fk = basic.mother_national_num',"left");
       // $this->db->where("basic.suspend",4);
        $this->db->where($Conditions_arr);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->result();$i=0;
            foreach ( $query->result() as $row){
               // $data[$i]->total_child=$this->total_child(array("mother_national_num_fk"=>$row->mother_national_num_fk));
                $data[$i]->up_child=$this->total_child(array("mother_national_num_fk"=>$row->mother_national_num_fk,
                                                             "member_birth_date_hijri_year <="=>$condition_year));
                $data[$i]->down_child=$this->total_child(array("mother_national_num_fk"=>$row->mother_national_num_fk,
                                                             "member_birth_date_hijri_year >"=>$condition_year));
                $i++;
            }
            return $data;
        }
        return false;
    }
    //-----------------------------------
    public function total_child($Conditions_arr){
        $this->db->select('id, member_full_name');
        $this->db->from("f_members");
        $this->db->where($Conditions_arr);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        }
        return 0;
    }
    //-----------------------------------


}//END CLASS


