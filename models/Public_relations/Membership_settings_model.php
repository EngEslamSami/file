<?php

class Membership_settings_model extends CI_Model
{
    public function __construct()
    {
        parent:: __construct();
    }


    public function insert(){

        $data['title']=$this->input->post('title');
        $data['content']=$this->input->post('content');
        $data['date'] = strtotime(date("m/d/Y"));
        $data['date_s'] = time();
        $this->db->insert('membership_settings',$data);

    }

    public function select(){
        $q = $this->db->get('membership_settings');
        return $q->result();
    }

    /////delete/////
    public function delete($id){
        $this->db->where('id',$id);
        $this->db->delete('membership_settings');

    }
///////update/////////
    public function getById($id){
        $h = $this->db->get_where('membership_settings', array('id'=>$id));
        return $h->row_array();
    }


    public function update($id){
        $data['title']=$this->input->post('title');
        $data['content']=$this->input->post('content');
        $data['date_s']=time();
        $this->db->where('id', $id);
        if($this->db->update('membership_settings',$data)) {
            return true;
        }else{
            return false;
        }


    }


}