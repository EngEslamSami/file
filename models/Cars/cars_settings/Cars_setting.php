<?php
class Cars_setting extends CI_Model
{
    public function __construct() {
        parent::__construct();
        $this->table = "cars_settings";
    }

    //=================================================================================


    public function all_settings()
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where("type", 0);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row){
                $data[$row->id_setting]["title"]= $row->title_setting;

            }
            return $data;
        }
        return false;
    }

    public function add_settings($type)
    {
        $data['title_setting']= $this->input->post('title_setting');
        $data['type']= $type;
        $data['tele']= $this->input->post('tele');
        $data['address']= $this->input->post('address');
        
        $data['type_name']= $this->input->post('type_name');
        if($this->input->post('marka_id')){
            $data['marka_id']= $this->input->post('marka_id');
        }

        $this->db->insert($this->table,$data);
    }
    public function get_all_data_settings($arr_all){
        if(isset($arr_all) && !empty($arr_all)) {
            foreach ($arr_all as $key => $value) {

                $data[$key] = $this->get_type_settings($key);

            }

            return $data;
        }
        return false;
    }
    public function  get_type_settings($type)
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where("type", $type);
        $this->db->order_by("in_order", "asc");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i =0;
   $data = $query->result();
            foreach ($query->result() as  $row) {
                $data[$i] = $row;
                $data[$i]->marka_name = $this->marka_name($row->marka_id);
           $i++; }
            return $data;

        }
        return false;
    }

    public function update_settings($id)
    {
        $data['title_setting']= $this->input->post('title_setting');
        $data['tele']= $this->input->post('tele');
        $data['address']= $this->input->post('address');
        
        if($this->input->post('marka_id')){
            $data['marka_id']= $this->input->post('marka_id');
        }
        $this->db->where('id_setting',$id);
        $this->db->update($this->table,$data);
    }
    
    
    
    public function getById_settings($id)
    {
        return $this->db->get_where($this->table, array('id_setting'=>$id))->row_array();
    }
     public function marka_name($id)
    {
        return $this->db->get_where($this->table, array('id_setting'=>$id))->row_array();
    }
    
    
    public function delete_settings($id)
    {
        $this->db->where('id_setting', $id)->delete($this->table);
    }


    public function all_marka()
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where("type", 3);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {

            return $query->result();
        }
        return false;
    }

    //===================================================================================
}
