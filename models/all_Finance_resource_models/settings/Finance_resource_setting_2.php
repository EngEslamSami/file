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

    public function add_kfr_settings($table)
    {
        if($this->input->post('tasnef')){
            $tasnef = $this->input->post('tasnef');
            foreach ($tasnef as $row){
                $data[$row] = 1;
            }
        }
        if($this->input->post('type_k')){
           $k =  $this->input->post('type_k');
           if($k == 1){
               $data['type'] = 1;
               $data['type_name'] = 'حالات الكفالات ';
           } elseif($k == 2){
               $data['type'] = 2;
               $data['type_name'] = 'حالات الكافل ';
           }
        }

        $data['title']= $this->input->post('title');
        $data['color']= $this->input->post('color');

        $this->db->insert($table,$data);
    }

    public function all_frk_settings($table)
    {
        $this->db->select('*');
        $this->db->from($table);
        //$this->db->where("type", 0);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->result();

            return $data;
        }
        return false;
    }

    public function all_frhk_settings($table,$typee_k)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where("type", $typee_k);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->result();

            return $data;
        }
        return false;
    }


    public function all_frhke_settings($table)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where("type", 1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->result();

            return $data;
        }
        return false;
    }

    public function update_frk_settings($table,$id)
    {
        if($this->input->post('tasnef')){
            $tasnef = $this->input->post('tasnef');
            foreach ($tasnef as $row){
                $data[$row] = 1;
            }
        }
        if($this->input->post('type_k')){
            $k =  $this->input->post('type_k');
            if($k == 1){
                $data['type'] = 1;
                $data['type_name'] = 'حالات الكفالات ';
            } elseif($k == 2){
                $data['type'] = 2;
                $data['type_name'] = 'حالات الكافل ';
            }
        }
        $data['title']= $this->input->post('title');
        $data['color']= $this->input->post('color');
        $this->db->where('id',$id);
        $this->db->update($table,$data);
    }

    public function getById_frk_settings($id,$table)
    {
        return $this->db->get_where($table, array('id'=>$id))->row_array();
    }

    public function delete_fr_settingsKa($id,$table)
    {
        $this->db->where('id', $id)->delete($table);
    }


}
