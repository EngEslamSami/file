<?php

class Account_settings extends CI_Model
{


    public function __construct()
    {
        parent:: __construct();
    }
    public  function record_count(){
        return $this->db->count_all("account_settings");
    }
    public  function  insert(){
        $data['title']=$this->input->post('title');
        $data['date'] = strtotime(date("Y/m/d"));
        $data['date_s'] = time();
        $this->db->insert('account_settings',$data);
    }

    public function select(){
        $this->db->select('*');
        $this->db->from('account_settings');
        $this->db->order_by('id','DESC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    /////////////////
    /////delete/////
    public function delete($id){
        $this->db->where('id',$id);
        $this->db->delete('account_settings');
    }

    public function getById($id){
        $h = $this->db->get_where('account_settings', array('id'=>$id));
        return $h->row_array();
    }

    /////////////////////////
    public function update($id){
        $data['title']=$this->input->post('title');
        $data['date'] = strtotime(date("Y/m/d"));
        $data['date_s'] = time();
        $this->db->where('id', $id);
        if($this->db->update('account_settings',$data)) {
            return true;
        }else{
            return false;
        }
    }
    
    
    
        public function select_program()
    {
        $this->db->select('*');
        $this->db->from('account_settings');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $query2 = $this->db->query('SELECT * FROM `programs_depart` WHERE `account_settings_id_fk`='.$row->id);
                $arr = array();
                foreach ($query2->result() as $row2) {
                    $arr[] = $row2;
                }
                $data[$row->id] = $arr;
            }
            return $data;
        }
        return false;
    }
        public function select_program_by_id($id)
    {
        $this->db->select('*');
        $this->db->from('programs_depart');
        $this->db->where('account_settings_id_fk',$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
             $data[] = $row;
            }
            return $data;
        }
        return false;
    }

}