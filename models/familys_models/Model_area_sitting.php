<?php
class Model_area_sitting extends CI_Model{
    public function __construct()
    {
        parent:: __construct();
        $this->main_table="area_settings";
    }
    //==========================================
    public function select_type($type){
        $this->db->select('*');
        $this->db->from($this->main_table);
        $this->db->where("type",$type);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }
    //==========================================
    public function select_places($form){
        $this->db->select('*');
        $this->db->from($this->main_table);
        $this->db->where("from_id",$form);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }
    //==========================================
    public  function insert(){
        $data['title']=$this->input->post("title");
        $data['type']=$this->input->post("type");
        $data['from_id']=$this->input->post("from_id");
      $this->db->insert($this->main_table,$data);
    }
    //==========================================
    public  function update($id){
        $data['title']=$this->input->post("title");
        $data['type']=$this->input->post("type");
        $data['from_id']=$this->input->post("from_id");
         $this->db->where("id",$id);
         $this->db->update($this->main_table,$data);
    }
    //==========================================
    public function select_all(){
        $this->db->select('*');
        $this->db->from($this->main_table);
        $this->db->order_by("id","ASC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result() ;
        }
        return false;
    }
    //==========================================
    public function delete($Conditions_arr){
        $this->db->where($Conditions_arr);
        $this->db->delete($this->main_table);
    }
    //==========================================
    public function getByArray($arr){
        $h = $this->db->get_where($this->main_table,$arr);
        $date=$h->row_array();
        $date["main_from"]=$this->get_form($date["from_id"]);
        return $date;
    }
    //==========================================
    public  function get_form($id){
        $this->db->select('*');
        $this->db->from($this->main_table);
        $this->db->where("id",$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row_array()["from_id"];
        }
        return 0;
    }
    //==========================================
}//END CLASS


