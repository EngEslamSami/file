<?php
class Model_school_supplies extends CI_Model{
    public function __construct()
    {
        parent:: __construct();
        $this->main_table = "school_supplies_order";
    }
    //==========================================
    public function select_last_value_fild(){
        $this->db->select('order_num');
        $this->db->from($this->main_table);
        $this->db->order_by("order_num","DESC");
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data = $row->order_num;
            }
            return $data;
        }
        return 0;
    }
    //==========================================
    public function getByArray($id){
        $h = $this->db->get_where($this->main_table,array("id"=>$id));
        return $h->row_array();
    }
    //==========================================
    public  function insert($last){
            $data["order_num"]=$last;
            $data["mother_national_id_fk"]=$this->input->post('mother_national_id_fk');
            $data["school_supplies_id_fk"]=$this->input->post('school_supplies_id_fk');
            $data["date"]=time();
            $data["date_s"]=time();
            $data["date_ar"]=date("Y-m-d",time());
            $data["person_id"]=$this->input->post('person_id_fk') ;
        $this->db->insert($this->main_table ,$data);
    }
    //==========================================
    public  function get_setiing(){
        $this->db->select(' id_setting ,title_setting');
        $this->db->from("family_setting");
        $this->db->where("type",20);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }
    //==========================================
    public  function update($id){
        $data["school_supplies_id_fk"]=$this->input->post('school_supplies_id_fk');
        $data["person_id"]=$this->input->post('person_id_fk') ;
        $data["date"]=time();
        $data["date_s"]=time();
        $data["date_ar"]=date("Y-m-d",time());
        $this->db->where("id" ,$id);
        $this->db->update($this->main_table ,$data);
    }
    //==========================================
    public function select_all($mother_national_id_fk){
        $this->db->select('*');
        $this->db->from($this->main_table);
        $this->db->where("mother_national_id_fk",$mother_national_id_fk);
        $this->db->order_by("id","DESC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data=$query->result();$i=0;
            foreach ($query->result() as $row ){
                $data[$i]->member_name=$this->get_member($row->person_id);
                $data[$i]->support_name=$this->get_support($row->school_supplies_id_fk);
                $i++;
            }
            return $data;
        }
        return false;
    }
    //==========================================
    public  function  get_member($person_id){
        $this->db->select('member_full_name');
        $this->db->from("f_members");
        $this->db->where("id",$person_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data =$query->row_array() ;
            return $data["member_full_name"];
        }
        return false;
    }
    //==========================================
    public  function  get_support($school_supplies_id_fk){
        $this->db->select('title_setting');
        $this->db->from("family_setting");
        $this->db->where("id_setting",$school_supplies_id_fk);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data =$query->row_array() ;
            return $data["title_setting"];
        }
        return false;
    }

    //==========================================
    public function delete($id){
        $this->db->where(array("id"=>$id));
        $this->db->delete($this->main_table);
    }

    //==========================================

} // END CLASS
?>