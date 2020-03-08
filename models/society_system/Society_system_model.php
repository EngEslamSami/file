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
            $data= $query->result();
           
            return $data;
        }
    }

    public function getBank($id)
    {
        return $this->db->get_where('banks_settings', array('id'=>$id))->row_array();
    }


    public function getAccountName($id)
    {
        return $this->db->get_where('society_main_banks_account', array('id'=>$id))->row_array();
    }


    public function selectAllByType_span($type)
    {
        $this->db->select('*');
        $this->db->from('society_main_banks_account');
        $this->db->where("type", $type);
        $this->db->group_by("bank_id_fk");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data= $query->result();$i=0;
            foreach ($query->result() as $row){
                $data[$i]->bank_name = $this->getBank($row->bank_id_fk)['title'];
                $data[$i]->sub=$this->get_accounts($row->bank_id_fk);
                $data[$i]->count = $this->getcount($row->bank_id_fk);
                $i++;
            }
            return $data;
        }
    }



    //======================================
    public function get_accounts($bank_id){
        $this->db->select('*');
        $this->db->from("society_main_banks_account");
        $this->db->where("bank_id_fk",$bank_id);
        $this->db->group_by("account_id_fk");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data= $query->result();$i=0;
            foreach ($query->result() as $row){
                $data[$i]->account_name = $this->getAccountName($row->account_id_fk)['title'];
                $data[$i]->sub=$this->get_accounts_group($row->bank_id_fk,$row->account_id_fk);
                $i++;
            }
            return $data;
        }
        return false;
    }



    public function get_accounts_group($bank_id,$account_id){
        $this->db->select('*');
        $this->db->from("society_main_banks_account");
        $this->db->where("account_id_fk",$account_id);
        $this->db->where("bank_id_fk",$bank_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }

    public function getcount($bank_id)
    {
        $count = 0;
        $this->db->select('*');
        $this->db->where("bank_id_fk",$bank_id);
        $this->db->group_by("account_id_fk");
        $this->db->from('society_main_banks_account');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->result(); $i=0;
            foreach ($query->result() as $row){
                $data[$i]->acount = $this->get_accounts_group($row->bank_id_fk,$row->account_id_fk);
                if(isset($data[$i]->acount) and !empty($data[$i]->acount)){
                    $count += count($data[$i]->acount);
                }
                $i++;}

            return $count;
        }
        return 0;
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
            $data['rqm_hesab']=$this->input->post('rqm_hesab')[$i];
            $data['name_hesab']=$this->input->post('name_hesab')[$i];

            $this->db->insert('society_main_banks_account',$data);
        }
    }



    public function updateSocietySystem($id)
    {
        $data['bank_id_fk']=$this->input->post('bank_id_fk');
        $data['account_id_fk']=$this->input->post('account_id_fk');
        $data['account_num']=$this->input->post('account_num');
        $data['status']=$this->input->post('status');
        $data['rqm_hesab']=$this->input->post('rqm_hesab');
        $data['name_hesab']=$this->input->post('name_hesab');
      
        
        $this->db->where('id',$id);
        $this->db->update('society_main_banks_account',$data);


    }



    public function getAllAccounts($where)
    {
        return $this->db->where($where)->order_by('parent','ASC')->get('dalel')->result();
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