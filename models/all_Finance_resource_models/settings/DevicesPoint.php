<?php
class DevicesPoint extends CI_Model
{
    public function __construct() {
        parent::__construct();
        $this->table = "fr_devices_points";
        $this->table2 = "fr_devices_points_emp";
    }

    //=================================================================================




    public function getbanks()
    {
        $count = 0;
        $this->db->select('*');
      //  $this->db->where('device_id_fk',$device_id_fk);
        $this->db->group_by('bank_id_fk');
        $this->db->from($this->table);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = array(); $i=0;
            foreach ($query->result() as $row){
                $data[$i]= $row;
                $data[$i]->bank_name = $this->getBank($row->bank_id_fk)['title'];
                $data[$i]->account_name = $this->getAccountName($row->account_id_fk)['title'];
                $data[$i]->accounts = $this->getAccounts($row->bank_id_fk,$row->device_id_fk);
                $data[$i]->count = $this->getcount($row->bank_id_fk);
                $i++;}

            return $data;
        }
        return false;
    }

    public function getcount($device_id_fk)
    {
        $count = 0;
        $this->db->select('*');
        $this->db->where('bank_id_fk',$device_id_fk);
        $this->db->group_by('account_id_fk');
        $this->db->from($this->table);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->result(); $i=0;
            foreach ($query->result() as $row){
                $data[$i]->accounts = $this->getAccountsNums($row->bank_id_fk,$row->account_id_fk);
                if(isset($data[$i]->accounts) and !empty($data[$i]->accounts)){
                    $count += count($data[$i]->accounts);
                }
                $i++;}

            return $count;
        }
        return 0;
    }


    public function getAccounts($bank_id_fk)
    {
        $this->db->select('*');
        $this->db->where('bank_id_fk',$bank_id_fk);
        $this->db->group_by('account_id_fk');
       // $this->db->where('device_id_fk',$device_id_fk);
        $this->db->from($this->table);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->result(); $i=0;
            foreach ($query->result() as $row){
                $data[$i]= $row;
                $data[$i]->account_name = $this->getAccountName($row->account_id_fk)['title'];
                $data[$i]->account_num = $this->getAccountName($row->account_num_id_fk)['account_num'];
                $data[$i]->account_num = $this->getAccountsNums($bank_id_fk,$row->account_id_fk);
                $i++;}
            return $data;
        }
        return false;
    }

    public function getAccountsNums($bank_id_fk,$account_id_fk)
    {
        $this->db->select('*');
        $this->db->where('bank_id_fk',$bank_id_fk);
        $this->db->where('account_id_fk',$account_id_fk);
        $this->db->from($this->table);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->result(); $i=0;
            foreach ($query->result() as $row){
                $data[$i]= $row;
                $data[$i]->account_name = $this->getAccountName($row->account_id_fk)['title'];
                $data[$i]->account_num = $this->getAccountName($row->account_num_id_fk)['account_num'];
                $i++;}
            return $data;
        }
        return false;
    }

    public function insert_maindata()
    {

        $ids =  $this->input->post('device_id_fk');
        for ($i =0;$i<count($ids); $i++){
            $data['device_id_fk']= $this->input->post('device_id_fk')[$i];
            $data['bank_id_fk']= $this->input->post('bank_id_fk')[$i];
            $data['account_id_fk']= $this->input->post('account_id_fk')[$i];
            $data['account_num_id_fk']= $this->input->post('account_num_id_fk')[$i];
             $data['device_status']= $this->input->post('device_status')[$i];
		
            $this->db->insert($this->table,$data);
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



    public function getValidAccount($id,$device_id)
    {
        return $this->db->get_where($this->table, array('account_id_fk'=>$id,'device_id_fk'=>$device_id))->row_array();
    }

    public function getDeviceName($id)
    {
        return $this->db->get_where('fr_settings', array('id_setting'=>$id))->row_array();
    }


    public function deleteDevicesPoints($id,$table)
    {
        $this->db->where('id', $id)->delete($table);
    }


    public function fetch_banks()
    {
        $this->db->select('*');
        $this->db->where('type', 2);
        $this->db->group_by('bank_id_fk');
        $this->db->from('society_main_banks_account');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query->result() as $row) {
//                if($this->getValidBank($row->bank_id_fk,$device_id)){
//                   continue;
//                }else{
                    $data[$i] = $row;
                    $data[$i]->bank_name = $this->getBank($row->bank_id_fk)['title'];
//                }
                $i++;
            }
            return $data;
        }
        return false;
    }





    public function fetch_bank_accounts($bank_id,$device_id)
    {
        $this->db->select('*');
        $this->db->where('bank_id_fk',$bank_id);
        $this->db->group_by('account_id_fk');
        $this->db->from('society_main_banks_account');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i=0;
            $data = array();
            foreach ($query->result() as $row) {
                    $data[$i] = $row;
                    $data[$i]->account_name = $this->getAccountName($row->account_id_fk)['title'];
                    $i++;
            }
            return $data;
        }
        return false;
    }


    public function get_accounts_nums($bank_id,$device_id,$account_id)
    {
        $this->db->select('*');
        $this->db->where('bank_id_fk',$bank_id);
        $this->db->where('account_id_fk',$account_id);
        $this->db->from('society_main_banks_account');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i=0;
            $data = array();
            foreach ($query->result() as $row) {
//                if($this->getValidAccount($account_id,$device_id)){
//                    continue;
//                }else{
                    $data[$i] = $row;
                    $data[$i]->account_name = $this->getAccountName($row->account_id_fk)['title'];
                    $i++;
//                }

            }
            return $data;
        }
        return false;
    }


    public function checkUniqueNum($value)
    {
        $this->db->select('*');
        $this->db->where('device_id_fk',$value);
        $this->db->from($this->table);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {

            return 1;
        }
        return 0;
    }


    public function all_data_emps()
    {

        $this->db->select('*');
        $this->db->group_by('edara_id_fk');
        $this->db->from($this->table2);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->result(); $i=0;
            foreach ($query->result() as $row){
                $data[$i]= $row;
                $data[$i]->edara_name= $this->emp_data($row->edara_id_fk,'department_jobs');
                $data[$i]->aqsm = $this->getAqsms($row->qsm_id_fk);
                $data[$i]->count = $this->getcount_emps($row->qsm_id_fk);
                $i++;}
            return $data;
        }
        return false;
    }



    public function all_data_devices(){
        $this->db->select('*');
        $this->db->group_by('device_id_fk');
        $this->db->from($this->table);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->result();
            return $data;
        }
        return false;
    }


    public function emp_data($id,$table)
    {
        $row = $this->db->get_where($table, array('id'=>$id))->row_array();
        if($row){
            if($table == 'employees'){
                return $row['employee'];
            }
            else{
                return $row['name'];
            }
        }
    }
    public function insert_empdata()
    {

        $ids =  $this->input->post('device_id_fk');
        for ($i =0;$i<count($ids); $i++){
            $data['device_id_fk']= $this->input->post('device_id_fk')[$i];
            $data['edara_id_fk']= $this->input->post('edara_id_fk')[$i];
            $data['qsm_id_fk']= $this->input->post('qsm_id_fk')[$i];
            $data['emp_id']= $this->input->post('emp_id')[$i];
            $this->db->insert($this->table2,$data);
        }
    }




    //=========================================================================================


    // update

    public function update_empdata($id)
    {


        $data['device_id_fk'] = $this->input->post('device_id_fk');
        $data['edara_id_fk'] = $this->input->post('edara_id_fk');
        $data['qsm_id_fk'] = $this->input->post('qsm_id_fk');
        $data['emp_id'] = $this->input->post('emp_id');
        $this->db->where('id', $id);
        $this->db->update($this->table2, $data);
    }



    public function getcount_emps($qsm_id_fk)
    {
        $count = 0;
        $this->db->select('*');
        $this->db->where('qsm_id_fk',$qsm_id_fk);
        $this->db->group_by('emp_id');
        $this->db->from($this->table2);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->result(); $i=0;
            foreach ($query->result() as $row){
                $data[$i]->employees = $this->getEmployees($qsm_id_fk ,$row->emp_id);
                if(isset($data[$i]->employees) and !empty($data[$i]->employees)){
                    $count += count($data[$i]->employees);
                }
                $i++;}

            return $count;
        }
        return 0;
    }




    public function getAqsms($qsm_id_fk)
    {
        $this->db->select('*');
        $this->db->where('qsm_id_fk',$qsm_id_fk);
        $this->db->group_by('emp_id');
        // $this->db->where('device_id_fk',$device_id_fk);
        $this->db->from($this->table2);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->result(); $i=0;
            foreach ($query->result() as $row){
                $data[$i]= $row;
                $data[$i]->qsm_name = $this->emp_data($row->qsm_id_fk,'department_jobs');
                $data[$i]->employees = $this->getEmployees($qsm_id_fk,$row->emp_id);
                $i++;}
            return $data;
        }
        return false;
    }


    public function all_data()
    {

        $this->db->select('*');
        $this->db->from($this->table2);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->result(); $i=0;
            foreach ($query->result() as $row){
                $data[$i]= $row;
                $data[$i]->edara_name= $this->emp_data($row->edara_id_fk,'department_jobs');
                $data[$i]->qsm_name = $this->emp_data($row->qsm_id_fk,'department_jobs');
                $data[$i]->emp_name = $this->emp_data($row->emp_id,'employees');
                $i++;}
            return $data;
        }
        return false;
    }



    public function getEmployees($qsm_id_fk,$emp_id)
    {
        $this->db->select('*');
        $this->db->where('qsm_id_fk',$qsm_id_fk);
        $this->db->where('emp_id',$emp_id);
        $this->db->from($this->table2);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->result(); $i=0;
            foreach ($query->result() as $row){
                $data[$i]= $row;
                $data[$i]->emp_name = $this->emp_data($row->emp_id,'employees');
                $i++;}
            return $data;
        }
        return false;
    }







    //=======================================================================================


    public function data_up()
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $query = $this->db->get()->result();
        $i = 0;
        foreach ($query as $row) {
            $query[$i] = $row;
            $query[$i]->device_name = $this->getDeviceName($row->device_id_fk)['title_setting'];
            $query[$i]->bank_name = $this->getBank($row->bank_id_fk)['title'];
            $query[$i]->account_name = $this->getAccountName($row->account_id_fk)['title'];
            $query[$i]->account_num = $this->getAccountName($row->account_num_id_fk)['account_num'];


            $i++;
        }
        return $query;


    }

    public function get_data()
    {
        $this->db->select('id,device_id_fk,bank_id_fk');
        $this->db->group_by('bank_id_fk')->order_by("id", "desc");
        $this->db->from($this->table);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->result();
            $i = 0;
            foreach ($query->result() as $row) {

                $data[$i]->bank_name = $this->getBank($row->bank_id_fk)['title'];
                $data[$i]->accounts = $this->get_accounts($row->bank_id_fk);
                $data[$i]->count = $this->count_numm_bank($data[$i]->accounts);
                $i++;
            }
            return $data;
        }
        return false;


    }

    public function get_accounts($bank_id)
    {
        $this->db->select('account_id_fk');
        $this->db->group_by('account_id_fk')->order_by("id", "desc");
        $this->db->from($this->table)->where('bank_id_fk', $bank_id);

        $query = $this->db->get()->result();

        $i = 0;
        foreach ($query as $row) {

            $query[$i]->account_name = $this->getAccountName($row->account_id_fk)['title'];
            $query[$i]->nums = $this->get_acco_num($row->account_id_fk, $bank_id);
            $query[$i]->count = count($query[$i]->nums);

            $i++;
        }
        return $query;
    }


    public function get_acco_num($account_id, $bank_id)
    {

        $this->db->select('id,device_id_fk,account_num_id_fk');
        $this->db->group_by('device_id_fk')->order_by("id", "desc");
        $this->db->from($this->table)->where('account_id_fk', $account_id)->where('bank_id_fk', $bank_id);

        $query = $this->db->get()->result();
        $i = 0;
        foreach ($query as $row) {
            $query[$i]->account_num = $this->getAccountName($row->account_num_id_fk)['account_num'];
            $i++;
        }
        return $query;

    }


    public function count_numm_bank($a)
    {
        $count = 0;
        foreach ($a as $row) {

            $count += $row->count;

        }


        return $count;
    }

    public function updataDevicesPoints($id)
    {

        $data['device_id_fk'] = $this->input->post('device_id_fk')[0];
        $data['bank_id_fk'] = $this->input->post('bank_id_fk')[0];
        $data['account_id_fk'] = $this->input->post('account_id_fk')[0];
        $data['account_num_id_fk'] = $this->input->post('account_num_id_fk')[0];
         $data['device_status'] = $this->input->post('device_status')[0];
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);

    }

    //=======================================================================================


    public function hesabt()
    {
        $this->db->select('*');
        $this->db->where('type',2);
        $this->db->from('society_main_banks_account');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->result();   $i = 0;
            foreach ($data as $row) {
                $data[$i] = $row;
                $data[$i]->account_name = $this->getAccountName($row->account_id_fk)['title'];
                $i++;
            }
            return $data;
        }
        return false;


    }





}
