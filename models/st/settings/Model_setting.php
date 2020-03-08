<?php
/**
 * Created by PhpStorm.
 * User: nnnnn
 * Date: 31/03/2019
 * Time: 02:53 م
 */

class Model_setting extends CI_Model{
    public function __construct()
    {
        parent:: __construct();
        $this->main_table="st_setting";
    }
    public function add($type)
    {
        $data['title_setting']= $this->input->post('title_setting');
        $data['type']= $type;
        $data['type_name']= $this->input->post('type_name');
        //$data['have_branch']= $this->input->post('have_branch');
        //$data['form_id']= $this->input->post('form_id');

        $this->db->insert($this->main_table,$data);
    }
    public function get_all_data($arr_all){
        foreach ($arr_all as $key=>$value) {
            $data[$key] = $this->get_type($key);
        }
        return $data;
    }
    public function  get_type($type)
    {
        $this->db->select('*');
        $this->db->from($this->main_table);
        $this->db->where("type", $type);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }

    public function update($id)
    {
        $data['title_setting']= $this->input->post('title_setting');
        $this->db->where('id_setting',$id);
        $this->db->update($this->main_table,$data);
    }
    public function getById($id)
    {
        return $this->db->get_where($this->main_table, array('id_setting'=>$id))->row_array();
    }
    public function delete($id)
    {
        $this->db->where('id_setting', $id)->delete($this->main_table);
    }

//2-4-om
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

    public function delete_product($id){
        $this->db->where('id',$id);
        $this->db->delete("products");
    }


    public function getAllAccounts()
    {
        $this->db->where('id!=',0);
        $this->db->order_by('parent','ASC');
        return $this->db->get('dalel')->result();
    }
  /*  public function update_rakm_hesab($id,$rkm_hesab){
        $this->db->where('id',$id);
        $data['rkm_hesab']= $rkm_hesab;
        $this->db->update('products',$data);
    }
    */
    
     public function update_rakm_hesab($id,$rkm_hesab,$rkm_hesab_type){
        $this->db->where('id',$id);
        $data[$rkm_hesab_type]= $rkm_hesab;
        $this->db->update('products',$data);
    }
    
 public function getAllproducts()
    {
        $this->db->order_by('id','ASC');
        return $this->db->get('products')->result();
    }


}