<?php

class Exchange_model extends CI_Model
{
    public function __construct()
    {

        parent::__construct();

    }

//---------------------------------------------------
    public function chek_Null($post_value)
    {
        if ($post_value == '' || $post_value == null || (!isset($post_value))) {
            $val = "";
            return $val;
        } else {
            return $post_value;
        }
    }
   //---------------------------------------------------
    public function select_all_family_category()
    {
        $this->db->where('type', 29);
        $query =  $this->db->get('family_setting');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }


   /* public function insertExchange ()
    {
        $data['file_num']=$this->chek_Null( $this->input->post('file_num'));
        $data['name']=$this->chek_Null( $this->input->post('name'));
        $data['gender']=$this->chek_Null( $this->input->post('gender'));
        $data['national_card_id']=$this->chek_Null( $this->input->post('national_card_id'));

        $data['family_member_num']=$this->chek_Null( $this->input->post('family_member_num'));
        $data['armal']=$this->chek_Null( $this->input->post('armal'));
        $data['yatem']=$this->chek_Null( $this->input->post('yatem'));
        $data['mostafed']=$this->chek_Null( $this->input->post('mostafed'));
      //  $data['family_category']=$this->chek_Null( $this->input->post('family_category'));
        $data['bank_id_fk']=$this->chek_Null( $this->input->post('bank_id_fk'));
        $data['bank_account_num']=$this->chek_Null( $this->input->post('bank_account_num'));
        $data['bank_account_name']=$this->chek_Null( $this->input->post('bank_account_name'));
        $data['bank_account_card_id']=$this->chek_Null( $this->input->post('bank_account_card_id'));
        $data['value']=$this->chek_Null( $this->input->post('value'));

        return $this->db->insert('family_data',$data);
    }

    public function updateExchange ($id)
    {
        $data['file_num']=$this->chek_Null( $this->input->post('file_num'));
        $data['name']=$this->chek_Null( $this->input->post('name'));
        $data['gender']=$this->chek_Null( $this->input->post('gender'));
        $data['national_card_id']=$this->chek_Null( $this->input->post('national_card_id'));

        $data['family_member_num']=$this->chek_Null( $this->input->post('family_member_num'));
        $data['armal']=$this->chek_Null( $this->input->post('armal'));
        $data['yatem']=$this->chek_Null( $this->input->post('yatem'));
        $data['mostafed']=$this->chek_Null( $this->input->post('mostafed'));
     //   $data['family_category']=$this->chek_Null( $this->input->post('family_category'));
        $data['bank_id_fk']=$this->chek_Null( $this->input->post('bank_id_fk'));
        $data['bank_account_num']=$this->chek_Null( $this->input->post('bank_account_num'));
        $data['bank_account_name']=$this->chek_Null( $this->input->post('bank_account_name'));
        $data['bank_account_card_id']=$this->chek_Null( $this->input->post('bank_account_card_id'));
        $data['value']=$this->chek_Null( $this->input->post('value'));

        $this->db->where('id',$id);
        return $this->db->update('family_data',$data);
    }*/



    public function insertExchange ()
    {

        $data['file_num']=$this->chek_Null( $this->input->post('file_num'));
        $data['name']=$this->chek_Null( $this->input->post('name'));
       // $data['type']=$this->chek_Null( $this->input->post('type'));
        $data['national_card_id']=$this->chek_Null( $this->input->post('national_card_id'));
        $data['family_member_num']=$this->chek_Null( $this->input->post('family_member_num'));
        $data['armal']=$this->chek_Null( $this->input->post('armal'));
        $data['yatem']=$this->chek_Null( $this->input->post('yatem'));
        $data['mostafed']=$this->chek_Null( $this->input->post('mostafed'));
        $data['bank_id_fk']=$this->chek_Null( $this->input->post('bank_id_fk'));
        $data['bank_account_num']=$this->chek_Null( $this->input->post('bank_account_num'));
        $data['bank_account_name']=$this->chek_Null( $this->input->post('bank_account_name'));
        $data['bank_account_card_id']=$this->chek_Null( $this->input->post('bank_account_card_id'));
        $data['value']=$this->chek_Null( $this->input->post('value'));
        return $this->db->insert('family_data',$data);
    }

    public function updateExchange ($id)
    {
        $data['file_num']=$this->chek_Null( $this->input->post('file_num'));
        $data['name']=$this->chek_Null( $this->input->post('name'));
      //  $data['type']=$this->chek_Null( $this->input->post('type'));
        $data['national_card_id']=$this->chek_Null( $this->input->post('national_card_id'));
        $data['family_member_num']=$this->chek_Null( $this->input->post('family_member_num'));
        $data['armal']=$this->chek_Null( $this->input->post('armal'));
        $data['yatem']=$this->chek_Null( $this->input->post('yatem'));
        $data['mostafed']=$this->chek_Null( $this->input->post('mostafed'));
        $data['bank_id_fk']=$this->chek_Null( $this->input->post('bank_id_fk'));
        $data['bank_account_num']=$this->chek_Null( $this->input->post('bank_account_num'));
        $data['bank_account_name']=$this->chek_Null( $this->input->post('bank_account_name'));
        $data['bank_account_card_id']=$this->chek_Null( $this->input->post('bank_account_card_id'));
        $data['value']=$this->chek_Null( $this->input->post('value'));
        $this->db->where('id',$id);
        return $this->db->update('family_data',$data);
    }
    
    
    
    public function select_exchangeById($id)
    {
        $this->db->where('id', $id);
        $query =  $this->db->get('family_data');
        if ($query->num_rows() > 0) {
            return $query->row();
        }
        return false;
    }
    public  function  getAllstaffSalares($id){
        return   $this->db->select("*")->from("sarf_orders")
            ->where("id",$id)->get()->row_array();
    }
    //====================================================
    public function approved_person($id,$value){
         $data['approved']=$value;
         $this->db->where('id',$id);
         $this->db->update('family_data',$data);
    }
    
    
        public function CheckFile($id)
    {
        $this->db->select('*');
        $this->db->from("family_data");
        $this->db->where("file_num",$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        }else{
            return 0;
        }

    }

/*******************/

    public function select_all()
    {
        $this->db->select('*');
        $this->db->from("family_data");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $a=0;
            foreach ($query->result() as $row) {
                $data[$a] = $row;
                $data[$a]->bank_name = $this->getBank_name($row->bank_id_fk);
                $a++;}
            return $data;
        }else{
            return 0;
        }

    }

    public function getBank_name($id){
        $h = $this->db->get_where("banks_settings", array('id'=>$id));
        return $h->row_array()['ar_name'];

    }
    
    /**********************/



    public function select_all_family_data()
    {
        $this->db->select('*');
        $this->db->from("family_data");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $a=0;
            foreach ($query->result() as $row) {
                $data[$a] = $row;
                $data[$a]->bank_name = $this->getBank_name($row->bank_id_fk);
                $data[$a]->sarf_details = $this->select_Sarf_order_details($row->file_num);
                $a++;}
            return $data;
        }else{
            return 0;
        }

    }


    public function get_Bank_details()
    {
        $this->db->select('*');
        $this->db->from('banks_settings');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->id] = $row->ar_name;
            }
            return $data;
        }else{
            return 0;
        }
    }


    /**********************/


    public function select_Sarf_order_details($id)
    {
        $this->db->select('*');
        $this->db->from('sarf_order_details');
        $this->db->where('mother_national_if_fk',$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $a=0;
            foreach ($query->result() as $row) {
                $data[$a] = $row;
                $data[$a]->details = $this->getSarfDetails($row->sarf_num_fk);
                $a++;}
            return $data;
        }else{
            return 0;
        }
    }


    public function getBeneficiaryDetails($id)
    {
        $h = $this->db->get_where("family_data", array('file_num'=>$id));
        return $h->row_array();
    }


    public function getSarfDetails($id)
    {
        $this->db->select('*');
        $this->db->from('sarf_orders');
        $this->db->where('sarf_num',$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $x=0;
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $data[$x]->band_name = $this->getBandName($row->bnod_help_id_fk);
            $x++; }
            return $data[0];
        }else{
            return 0;
        }
    }


    public function getBandName($id){
        $h = $this->db->get_where("bnod_help", array('id'=>$id));
        return $h->row_array()['title'];

    }
    
     public function select_all_data(){
        $this->db->select('family_data.*  ,banks_settings.ar_name as bank_name');
        $this->db->from('family_data');
         $this->db->join('banks_settings', 'banks_settings.id = family_data.bank_id_fk',"left");
        $this->db->order_by("file_num","DESC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result() ;
        }
        return false;
    }
    
    
    
    
    
    
}