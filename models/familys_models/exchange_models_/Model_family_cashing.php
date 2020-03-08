<?php
class Model_family_cashing extends CI_Model{
    public function __construct()
    {
        parent:: __construct();
       // $this->main_table="";
    }
    //==========================================
    public function select_family_where($Conditions_arr){
        $this->db->select('*');
        $this->db->from("family_data");
        $this->db->where($Conditions_arr);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }
    //==========================================
     public function check_family($file_num){
        $this->db->select('approved');
        $this->db->from("family_data");
        $this->db->where("file_num",$file_num);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data= $query->row_array();
            return $data["approved"];
        }
        return 2;
    }
    //==========================================
     public function select_last_id(){
        $this->db->select('*');
        $this->db->from("sarf_orders");
        $this->db->order_by("id","DESC");
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data = $row->id+1;
            }
            return $data;
        }
        return 1;
    }
    //==========================================
    public function insert(){
            $data['sarf_num'] = $this->input->post('sarf_num');
            $data['mon_melady'] = $this->input->post('mon_melady');
            $data['bnod_help_id_fk'] = $this->input->post('bnod_help_id_fk');
               $data['total'] = $this->input->post('total');
            $data['date'] =  time();
            $data['date_ar'] = date("Y-m-d");
            $data['date_s'] = time();
            
            
            
       $this->db->insert("sarf_orders",$data);

    }
     //==========================================
    public function insert_detals($sarf_num_fk){
        $file_num = $this->input->post('file_num');
        $one_value = $this->input->post('one_value');
        foreach($file_num as $key=>$value){
            $data['sarf_num_fk'] = $sarf_num_fk;
            $data['mother_national_if_fk'] =$value;
            $data['value'] = $one_value[$key];
           $this->db->insert("sarf_order_details",$data);
        }
    }
    //==========================================
  
  public function select_all_bnod(){
        $this->db->select('*');
        $this->db->from("bnod_help");
        $this->db->order_by("id","DESC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result() ;
        }
        return false;
    }
    //==========================================


}//END CLASS


