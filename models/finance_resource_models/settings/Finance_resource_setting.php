<?php
class Finance_resource_setting extends CI_Model
{
    public function __construct() {
        parent::__construct();
        $this->table = "fr_settings";
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

    public function add_fr_settings($type)
    {
        $data['title_setting']= $this->input->post('title_setting');
        $data['type']= $type;
        $data['type_name']= $this->input->post('type_name');

        $this->db->insert($this->table,$data);
    }
    public function get_all_data_fr_settings($arr_all){

        foreach ($arr_all as $key=>$value) {

            $data[$key] = $this->get_type_fr_settings($key);

        }

        return $data;
    }
    public function  get_type_fr_settings($type)
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where("type", $type);
        $this->db->order_by("in_order", "asc");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }

    public function update_fr_settings($id)
    {
        $data['title_setting']= $this->input->post('title_setting');
        $this->db->where('id_setting',$id);
        $this->db->update($this->table,$data);
    }
    
    
    
    public function getById_fr_settings($id)
    {
        return $this->db->get_where($this->table, array('id_setting'=>$id))->row_array();
    }
    
    
    public function delete_fr_settings($id)
    {
        $this->db->where('id_setting', $id)->delete($this->table);
    }

    //===================================================================================
}
