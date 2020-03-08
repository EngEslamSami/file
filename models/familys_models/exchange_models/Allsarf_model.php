<?php

class Allsarf_model extends CI_Model
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
       public function select_all_sarf_orders_2()
    {

         $this->db->select('*');
        $this->db->from("sarf_orders");
      $this->db->order_by("id","desc");
         $query = $this->db->get(); 
      //  $query =  $this->db->get('sarf_orders');
        $data = $query->result();
        $x =0;
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row){
                $data[$x]->band_name =  $this->get_band_name($row->bnod_help_id_fk);
                $data[$x]->details = $this->getDetails_2($row->sarf_num);
                $x++;
            }
            return $data;
        }
        return false;
    }
    public function select_all_sarf_orders()
    {

         $this->db->select('*');
        $this->db->from("sarf_orders");
      $this->db->order_by("id","desc");
         $query = $this->db->get(); 
      //  $query =  $this->db->get('sarf_orders');
        $data = $query->result();
        $x =0;
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row){
                $data[$x]->band_name =  $this->get_band_name($row->bnod_help_id_fk);
                $data[$x]->details = $this->getDetails($row->sarf_num);
                $x++;
            }
            return $data;
        }
        return false;
    }
   //---------------------------------------------------
   public function getDetails($num){
        $this->db->select('sarf_order_details.* ,
                           family_data.name,  family_data.national_card_id ,family_data.bank_account_card_id,
                           family_data.bank_account_num  ,family_data.bank_account_name,family_data.bank_id_fk,
                           banks_settings.bank_code, banks_settings.title');
        $this->db->from("sarf_order_details");
         $this->db->join('family_data', 'family_data.file_num = sarf_order_details.mother_national_if_fk',"left");
         $this->db->join('banks_settings', 'banks_settings.id = family_data.bank_id_fk',"left");
        $this->db->where("sarf_num_fk",$num);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            /*$x=0;
            foreach ($query->result() as $row) {
                $data[$x] = $row;
             //   $data[$x]->name = $this->getName($row->mother_national_if_fk);
                $x++; }
           // return $data; */
             return $query->result();
        }
            return false;
       
    }
    
    
       public function getDetails_2($num){
        $this->db->select('sarf_order_details.* ,
                           family_data.name,  family_data.national_card_id ,family_data.bank_account_card_id,
                           family_data.bank_account_num  ,family_data.bank_account_name,family_data.bank_id_fk');
        $this->db->from("sarf_order_details");
         $this->db->join('family_data', 'family_data.file_num = sarf_order_details.mother_national_if_fk',"left");
         $this->db->join('banks_settings', 'banks_settings.id = family_data.bank_id_fk',"left");
        $this->db->where("sarf_num_fk",$num);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            /*$x=0;
            foreach ($query->result() as $row) {
                $data[$x] = $row;
             //   $data[$x]->name = $this->getName($row->mother_national_if_fk);
                $x++; }
           // return $data; */
             return $query->result();
        }
            return false;
       
    }
   //----------------------------------------------------
    public function get_band_name($id)
    {
        $this->db->where('id',$id);
        $query =  $this->db->get('bnod_help');
        if ($query->num_rows() > 0) {
            $h= $query->row();
            return $h->title;
        }
        return false;
    }
    public function getName($id){
        $h = $this->db->get_where("family_data", array('file_num'=>$id));
        $data=$h->row_array();
        return $data['name'];

    }

    //====================================================
    public function make_approve($id){
         $data['approved']=1;
         $data['cashing_date']=strtotime($this->input->post('cashing_date'));
         $data['due_date']=strtotime($this->input->post('due_date'));
         
       //  $data['cashing_date']=($this->input->post('cashing_date'));
      //   $data['due_date']=($this->input->post('due_date'));
         
         $this->db->where('id',$id);
         $this->db->update('finance_sarf_order',$data);
    }
    public function make_nunApprove($id){
        $data['approved']=2;
        $this->db->where('id',$id);
        $this->db->update('finance_sarf_order',$data);
    }



}