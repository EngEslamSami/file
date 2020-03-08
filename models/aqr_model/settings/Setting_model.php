<?php
class Setting_model  extends CI_Model{

    public function insert_setting($type)
    {
        $data['title_setting']= $this->input->post('title_setting');
        $data['color']= $this->input->post('color');
        $data['type']= $type;
        $data['type_name']= $this->input->post('type_name');

        $this->db->insert('aqr_settings',$data);
    }
    public function get_all_data($arr_all){
        foreach ($arr_all as $key=>$value) {
            $data[$key] = $this->get_type($key);
        }
        return $data;
    }
    public function  get_type($type)
    {
        $this->db->where("type", $type);
        $query = $this->db->get('aqr_settings');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }
    public function update_setting($id)
    {
        $data['title_setting']= $this->input->post('title_setting');
        $data['color']= $this->input->post('color');
        $this->db->where('id_setting',$id);
        $this->db->update('aqr_settings',$data);
    }
    public function getById($id)
    {
        return $this->db->get_where('aqr_settings', array('id_setting'=>$id))->row();
    }
    public function delete_setting($id)
    {
        $this->db->where('id_setting', $id)->delete('aqr_settings');
    }


    public function add_contract_setting(){

        $data['contract_name']= $this->input->post('contract_name');
        $data['contract_type_fk']= $this->input->post('contract_type_fk');
        $data['contract_type_n']= $this->input->post('contract_type_n');
        $data['content']= $this->input->post('content');
        $this->db->insert('aqr_contract_setting',$data);

    }
    public function get_contracts()
    {

        $query = $this->db->get('aqr_contract_setting');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }
    public function get_contract_by_id($id)
    {
        $this->db->where('id',$id);
        $query = $this->db->get('aqr_contract_setting');
        if ($query->num_rows() > 0) {
            return $query->row();
        }
        return false;
    }
    public function update_contract($id){
        $data['contract_name']= $this->input->post('contract_name');
        $data['contract_type_fk']= $this->input->post('contract_type_fk');
        $data['contract_type_n']= $this->input->post('contract_type_n');
        $data['content']= $this->input->post('content');

        $this->db->where('id',$id);
        $this->db->update('aqr_contract_setting',$data);
    }

    public function delete_contract($id){
    $this->db->where('id',$id);
    $this->db->delete('aqr_contract_setting');
}

}
