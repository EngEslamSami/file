<?php
class Tazkra_settings_model extends CI_Model {

    public function insert_setting($type){
        $data['title']= $this->input->post('title');
        $data['color']= $this->input->post('color');
        $data['type']= $type;
        $data['type_title']= $this->input->post('type_title');

        $this->db->insert('tech_tazkra_settings',$data);

    }

    public function get_all_setting($arr_all){
        foreach ($arr_all as $key=>$value) {
            $data[$key] = $this->get_type($key);
        }
        return $data;
    }
    public function  get_type($type)
    {
        $this->db->where("type", $type);
        $query = $this->db->get('tech_tazkra_settings');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }
    public function get_by_id($id){
        $this->db->where('id',$id);
        $query = $this->db->get('tech_tazkra_settings');
        if ($query->num_rows()>0){
            return $query->row();
        }
        else{
            return false;
        }
}

public function update_setting($id){

    $data['title']= $this->input->post('title');
    $data['color']= $this->input->post('color');
    $this->db->where('id',$id);
    $this->db->update('tech_tazkra_settings',$data);
}

public function delete_setting($id){
        $this->db->where('id',$id);
        $this->db->delete('tech_tazkra_settings');
}

}