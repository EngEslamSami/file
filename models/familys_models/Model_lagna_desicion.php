<?php
class Model_lagna_desicion  extends CI_Model{
    public function __construct()
    {
        parent:: __construct();
        $this->main_table="";
    }
	 //     $this->db->join('users', 'users.usrID = users_profiles.usrpID',"left");
    //==========================================
     public function get_legana(){
        $this->db->select('*');
        $this->db->from("selected_lagna_members");
        $this->db->join('lagna', 'lagna.id_lagna = selected_lagna_members.lagna_id_fk',"left");
        $this->db->where("selected_lagna_members.suspend",1);
        $this->db->where("selected_lagna_members.finished",0);
        $this->db->group_by("selected_lagna_members.lagna_id_fk");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }

   /* public function get_legana(){
        $this->db->select('*');
        $this->db->from("selected_lagna_members");
        $this->db->join('lagna', 'lagna.id_lagna = selected_lagna_members.lagna_id_fk',"left");
        $this->db->where("selected_lagna_members.suspend",1);
        $this->db->group_by("selected_lagna_members.lagna_id_fk");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    } */
    //--------------------------------------
     public function select_all_creditors(){
        $this->db->select('*');
        $this->db->from("creditors");
        //$this->db->order_by($order_by,$order_by_desc_asc);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->result();$i=0;
            foreach ($query->result() as $row ){
                $data[$i]->creditors_papers = $this->get_creditors_papers($row->transaction_number);
                $data[$i]->debt_team_signatures = $this->get_debt_team_signatures($row->transaction_number);
             $i++;
            }
            return $data ;
        }
        return false;
    }
    //===================================
     public function get_creditors_papers($search_key_value){
        $this->db->select('*');
        $this->db->from("creditors_papers");
        $this->db->where("transaction_number",$search_key_value);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }
    //===================================
     public function get_debt_team_signatures($search_key_value){
        $this->db->select('*');
        $this->db->from("debt_team_signatures");
        $this->db->where("transaction_number",$search_key_value);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }
    
  

}//END CLASS


