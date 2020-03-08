<?php

class Areas extends CI_Model
{
        public function __construct()
        {
            parent:: __construct();
        }

    
    public function insert(){
       
        $data['title']=$this->input->post('title');
        $data['date'] = strtotime(date("m/d/Y"));;
        $data['date_s'] = time();
        $this->db->insert('area_settings',$data);

    }

    public function select(){

        $q = $this->db->get('area_settings');
        return $q->result();
    }
    public function select1(){
        $this->db->limit('3');
        $this->db->order_by('id','DESC');
        $q = $this->db->get('area_settings');
        return $q->result();
    }

    /////////////////
    /////delete/////
    public function delete($id){
        $this->db->where('id',$id);
        $this->db->delete('area_settings');

    }
    ////////////////////
///////update/////////
    public function getById($id){
        $h = $this->db->get_where('area_settings', array('id'=>$id));
        return $h->row_array();
    }


    public function update($id){
        $data['title']=$this->input->post('title');
        $data['date_s']=time();
       $this->db->where('id', $id);

        if($this->db->update('area_settings',$data)) {
            return true;
        }else{
            return false;
        }


    }
    public function user_name(){

        $this->db->select('*');
        $this->db->from('users');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->user_id] = $row->user_name;
            }
            return $data;
        }
        return false;

    }

}