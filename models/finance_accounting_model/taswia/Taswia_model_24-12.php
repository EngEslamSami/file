<?php
class Taswia_model extends  CI_Model{

    public function getBanks()
    {
        $sql = $this->db->select('banks_settings.*, society_main_banks_account.rqm_hesab')
            ->join('society_main_banks_account','society_main_banks_account.bank_id_fk=banks_settings.id')
            ->group_by('society_main_banks_account.bank_id_fk')
            ->get('banks_settings');
        if ($sql->num_rows() > 0) {
            $i = 0;
            foreach ($sql->result() as $row){
                $data[$i] = $row;
                $data[$i]->accounts = $this->getAccounts($row->id);
                $i++;
            }
            return $data;
        }
    }
    public function getAccounts($bankId)
    {
        return $this->db->select('society_main_banks_account.*, accountName.title')
            ->join('society_main_banks_account accountName','accountName.id=society_main_banks_account.account_id_fk')
            ->where('society_main_banks_account.bank_id_fk',$bankId)
            ->get('society_main_banks_account')
            ->result();
    }

    public function get_name($id,$table){
        $this->db->where('id',$id);
        $query = $this->db->get($table);
        if ($query->num_rows()>0){
            return $query->row()->title;
        }else{
            return false;
        }
    }

    public function get_hesab_movement($arr)
    {
        $this->db->select('finance_quods_details.*,finance_quods.rkm,finance_quods.no3_qued_name');
        $this->db->from('finance_quods_details');
        $this->db->join('finance_quods','finance_quods.rkm = finance_quods_details.qued_rkm_fk','left');
        $this->db->where($arr);
        $this->db->order_by('finance_quods.rkm','asc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $x=0;
            foreach ($query->result() as $row){
                $data[$x] =  $row;

                $x++;}
            return$data;
        }else{
            return 0;
        }

    }
    public function get_rkm_hesab($bank_id,$account_id){
        $this->db->where('bank_id_fk',$bank_id);
        $this->db->where('account_id_fk',$account_id);
        $query = $this->db->get('society_main_banks_account');
        if ($query->num_rows()>0){
            return $query->row()->rqm_hesab;
        }else{
            return false;
        }
    }

    public function select_Rased_sabeq($date_from , $rkm_hesab)
    {


        $this->db->select('*');
        $this->db->where('rkm_hesab',$rkm_hesab);
        $this->db->where('date < ',$date_from);
        $query = $this->db->get('finance_quods_details');
        $query_result=$query->result();
        if ($query->num_rows() > 0) {
            $data1 =0;
            $data2=0;
            foreach ($query->result() as $row) {
                $data1 += $row->maden;
                $data2 += $row->dayen;
            }
            return array($data1,$data2);
        }
        return array(0,0);
    }

    public function get_hesab_tabe3a($code)
    {
        $this->db->select('*');
        $this->db->from('dalel');
        $this->db->where('code',$code);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return$query->row()->hesab_tabe3a;
        }else{
            return 0;
        }

    }
}