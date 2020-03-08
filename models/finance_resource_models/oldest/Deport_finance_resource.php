<?php

class Deport_finance_resource extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
//---------------------------------------------------------------------
    public function undeport_payment(){
        $this->db->select('*');
        $this->db->from('payment');
        $this->db->where('deport',0);
        $parent = $this->db->get();
        $categories = $parent->result();
        $i=0;
        foreach($categories as $p_cat){
            $categories[$i]->orphans_name = $this->get_orphans_name($p_cat->orphans_id_fk);
              $categories[$i]->program_name = $this->get_program_name($p_cat->program_id_fk);
            $i++;
        }
        return $categories;
    }
    
//--------------------------------------------------------
    public function get_orphans_name($id){
        $h = $this->db->get_where("f_members", array('id'=>$id));
        $data=$h->row_array();
        return $data['member_name'];
    }
//--------------------------------------------------------
    public function insert_deport($prosess){
        $data['p_cost']=$this->input->post("value");
        $data['madeen']=$this->input->post("madeen");
        $data['dayen']=$this->input->post("dayen");
        $data['paid_type']=$this->input->post("paid_type");
        $data['process']=$prosess;
        $data['date']=strtotime(date("Y-m-d",time()));
        $data['date_s']=time();//publisher
        $data['pill_num']=time();//publisher
        $data['publisher']=$_SESSION['user_username'];
        $this->db->insert("all_deports",$data);
    }
    //--------------------------------------------------------------------
    public function update_deport($table){
        foreach ($this->input->post("select-id") as $key=>$value){
            $data['deport']=1;
            $this->db->where("id",$value);
            $this->db->update($table,$data);
        }
    }
//-------------------------------------------------------- 
    public function undeport_cash_donations($array){
        $this->db->select('*');
        $this->db->from('cash_donations');
        $this->db->where('deport',0);
        $this->db->where($array);
        $parent = $this->db->get();
        $categories = $parent->result();
        $i=0;
        foreach($categories as $p_cat){
            $categories[$i]->person_name = $this->get_person_name($p_cat->person_id);
            $categories[$i]->account_name = $this->get_account_name($p_cat->account_settings_id_fk);
            $categories[$i]->program_name = $this->get_program_name($p_cat->program_id_fk);
            $categories[$i]->bank_name = $this->get_bank_name($p_cat->bank_id_fk);
            $i++;
        }
        return $categories;
    }
//--------------------------------------------------------
    public function get_person_name($id){
        $h = $this->db->get_where("donors_t", array('id'=>$id));
        $data=$h->row_array();
        return $data['user_name'];
    }
//--------------------------------------------------------
    public function get_account_name($id){
        $h = $this->db->get_where("account_settings", array('id'=>$id));
        $data=$h->row_array();
        return $data['title'];
    }
//--------------------------------------------------------
    public function get_program_name($id){
        $h = $this->db->get_where("programs_depart", array('id'=>$id));
        $data=$h->row_array();
        return $data['program_name'];
    }
    
    
     public function get_bank_name($id){
        $h = $this->db->get_where("banks", array('id'=>$id));
        $data=$h->row_array();
        return $data['bank_name'];
    }
//--------------------------------------------------------
}// END CLASS

