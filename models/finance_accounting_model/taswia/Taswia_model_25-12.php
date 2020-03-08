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


    public function get_last_rkm(){
        $this->db->select_max('rkm');
        $this->db->from('finance_taswia_bank');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return$query->row()->rkm + 1;
        }else{
            return 1;
        }
    }

    public function add_taswia($id=''){
         if (empty($id)){
             $data['rkm'] = $this->get_last_rkm();
         }
        $data['bank_id'] = $this->input->post('bank_id') ;
        if (!empty($data['bank_id'])){
            $data['bank_name'] =$this->get_name($data['bank_id'],'banks_settings') ;

        }
        $data['hesab_id'] = $this->input->post('hesab_id') ;
        if(!empty( $data['hesab_id'])){
            $data['hesab_name'] =$this->get_name($data['hesab_id'],'society_main_banks_account') ;

        }
        $data['taswia_date_ar'] = $this->input->post('taswia_date') ;
        $data['taswia_date'] =  strtotime($this->input->post('taswia_date')) ;
        $data['prog_total_rased'] = $this->input->post('prog_total_rased') ;
        $data['rased_gam3ia'] = $this->input->post('rased_gam3ia') ;
        $data['sheek_makasa'] = $this->input->post('sheek_makasa') ;
        $data['farq_mowazna'] = $this->input->post('farq_mowazna') ;
        $data['sheek_sahb'] = $this->input->post('sheek_sahb') ;
        $data['sheek_solmat'] = $this->input->post('sheek_solmat') ;

        $data['date'] = strtotime(date('Y-m-d'));
        $data['date_ar'] = date('Y-m-d');
        $data['publisher'] = $_SESSION['user_id'];
        $data['publisher_name'] = $this->getUserName($_SESSION['user_id']);

        if (!empty($id)){
            $this->db->where('id',$id);
            $this->db->update('finance_taswia_bank',$data);
        }
        else{
            $this->db->insert('finance_taswia_bank',$data);
        }

    }

    public function get_all(){

        $query = $this->db->get('finance_taswia_bank');
        if ($query->num_rows()>0){
            return $query->result();
        }else{
            return false;
        }
    }
    public function get_by_id($id){
        $this->db->where('id',$id);
        $query = $this->db->get('finance_taswia_bank');
        if ($query->num_rows()>0){
            return $query->row();
        }else{
            return false;
        }
    }
    public function delete_taswia($id){
        $this->db->where('id',$id);
        $this->db->delete('finance_taswia_bank');
    }
    public function add_attach($id,$file){

        if (!empty($file)){
            $data['morfaq'] = $file ;
            $this->db->where('id',$id);
            $this->db->update('finance_taswia_bank',$data);
        }


    }

    public function getUserName($user_id)
    {
        $sql = $this->db->where("user_id",$user_id)->get('users');
        if ($sql->num_rows() > 0) {
            $data = $sql->row();
            if($data->role_id_fk == 1 or $data->role_id_fk == 5)
            {
                return  $data->user_username;
            }
            elseif($data->role_id_fk == 2)
            {
                $id    = $data->user_name;
                $table = 'md_all_magls_edara_members';
                $field = 'mem_name';
            }
            elseif($data->role_id_fk == 3)
            {
                $id    = $data->emp_code;
                $table = 'employees';
                $field = 'employee';
            }
            elseif($data->role_id_fk == 4)
            {
                $id    = $data->user_name;
                $table = 'md_all_gam3ia_omomia_members';
                $field = 'name';
            }
            return $this->getUserNameByRoll($id,$table,$field);
        }
        return false;

    }


    public function getUserNameByRoll($id,$table,$field)
    {
        return $this->db->where('id',$id)->get($table)->row_array()[$field];
    }
    public function delete_attach($id){
        $data['morfaq'] = null ;
        $this->db->where('id',$id);
        $this->db->update('finance_taswia_bank',$data);
    }

}