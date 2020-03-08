<?php
class Product_model extends CI_Model
{
    public function __construct() {
        parent::__construct();
    }


    public function select_all()
    {
        $this->db->select('*');
        $this->db->from('products');
        $this->db->where('from_id',0);
        $query = $this->db->get();
        $i=0;
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->sub_devices = $this->get_sub_devices(array('from_id'=>$row->id));
                $data[$i]->count =count($this->get_sub_devices(array('from_id'=>$row->id)));
                $i++;}
            return $data;
        }else{
            return 0;
        }

    }

    public function select_all_with_from()
    {
        $this->db->select('*');
        $this->db->from('products');
        $this->db->where('from_id !=',0);
        $query = $this->db->get();
        $i=0;
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->wasf = $this->find_by_id(array('id'=>$row->from_id));
                $data[$i]->count =count($this->get_sub_devices(array('from_id'=>$row->id)));
                $i++;}
            return $data;
        }else{
            return 0;
        }

    }


    public function find_by_id($arr){
        $this->db->select('*');
        $this->db->from('products');
        $this->db->where($arr);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $h = $query->row();
            return $h->name;
        }else{
            return false;
        }

    }



    public function get_sub_devices($arr){
        $this->db->select('*');
        $this->db->from('products');
        $this->db->where($arr);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
               }
            return $data;
        }else{
            return array();
        }

    }



    public function insert_main_product(){

        $data['name'] = $this->input->post('title');
        $data['level'] = $this->input->post('level');
        $data['from_id'] =0;
        $data['code'] =0;
        $this->db->insert('products',$data);
    }



    public function insert_sub_product(){

        $data['from_id'] = $this->input->post('from_id');
        $data['level'] =  $this->input->post('level');
        $data['name'] = $this->input->post('title');
        $data['code'] =0;
        $this->db->insert('products',$data);
       
    }



    public function update_main_product($id){

        $data['name'] = $this->input->post('title');
        $this->db->update('products',$data,array('id' => $id));
    }
    public function update_sub_product($id){
        $data['from_id'] = $this->input->post('from_id');
        $data['name'] = $this->input->post('title');
        $this->db->update('products',$data,array('id' => $id));
    }

    public function delete($id){
        $this->db->where('id',$id);
        $this->db->delete("products");
    }










}// END CLASS