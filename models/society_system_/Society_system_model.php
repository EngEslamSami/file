<?php

class Society_system_model extends CI_Model
{
    
    public function __construct()
    {
        parent:: __construct();
    }
    public function chek_Null($post_value){
        if($post_value == '' || $post_value==null || (!isset($post_value))){
            $val='';
            return $val;
        }else{
            return $post_value;
        }
    }
//=============================================================================================================//


    public function selectAllByType($type)
    {
        $this->db->select('*');
        $this->db->from('society_main_banks_account');
        $this->db->where("type", $type);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data =$query->result();
            return $data;
        }
    }


    public function selectAllById($id)
    {
        $this->db->select('*');
        $this->db->from('society_main_banks_account');
        $this->db->where("id", $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data =$query->row();
            return $data;
        }
    }

    public function insertSocietySystem($id)
    {

        $data['type']=$this->chek_Null($this->input->post('type'));
        if($this->input->post('type') == 1){
            $data['type_name']='أسماء حسابات الجمعية';
            $data['title']=$this->chek_Null($this->input->post('title'));
        }
       if($id == 0){
           $this->db->insert('society_main_banks_account',$data);
       }else{
           $this->db->where("id",$id);
           $this->db->update('society_main_banks_account',$data);
       }

    }

    public function insertSocietySystemRecords(){
        $bank_id_fk = $this->input->post('bank_id_fk');

        for($i = 0; $i < count($bank_id_fk); $i++){

            $data['bank_id_fk']=$bank_id_fk[$i];
            $data['type']=$this->input->post('type')[$i];
            $data['type_name']='ارقام حسابات الجمعية';
            $data['account_id_fk']=$this->input->post('account_id_fk')[$i];
            $data['account_num']=$this->input->post('account_num')[$i];
            $data['status']=$this->input->post('status')[$i];

            $this->db->insert('society_main_banks_account',$data);
        }
    }



    public function updateSocietySystem($id)
    {
        $data['bank_id_fk']=$this->input->post('bank_id_fk');
        $data['account_id_fk']=$this->input->post('account_id_fk');
        $data['account_num']=$this->input->post('account_num');
        $data['status']=$this->input->post('status');
        $this->db->where('id',$id);
        $this->db->update('society_main_banks_account',$data);


    }





    public function deleteSocietySystem()
    {
        $this->db->where('type',2);
        $this->db->delete('society_main_banks_account');
    }

    public function delete_benefitById($id)
    {
        $this->db->where('id',$id);
        $this->db->delete($this->table);
    }

} 
?>