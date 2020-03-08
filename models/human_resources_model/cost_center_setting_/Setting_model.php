<?php
class Setting_model extends CI_Model{

    public function add_settings($type)
    {
        $data['title_setting']= $this->input->post('title_setting');
        $data['type']= $type;
        $data['type_name']= $this->input->post('type_name');
        $data['in_order']= $this->input->post('in_order');
        $this->db->insert('employees_settings',$data);
    }
    public function get_all(){
        $this->db->where('type',17);
        $this->db->order_by('in_order');
        return $this->db->get('employees_settings')->result();
    }

    public function update_settings($id){
        $data['title_setting']= $this->input->post('title_setting');
        $data['type']= 17;
        $data['type_name']= $this->input->post('type_name');
        $data['in_order']= $this->input->post('in_order');
        $this->db->where('id_setting',$id);
        $this->db->update('employees_settings',$data);

    }
    public function get_by_id($id){
        $this->db->where('id_setting',$id);
        return $this->db->get('employees_settings')->row();

    }
    public function delete_setting($id){
        $this->db->where('id_setting',$id);
        $this->db->delete('employees_settings');
    }


    public function getAllAccounts()
    {
        $this->db->where('id!=',0);
        $this->db->order_by('parent','ASC');
        return $this->db->get('dalel')->result();
    }


    public function get_all_band()
    {
        $q = $this->db->select('band_id_fk')->get('hr_markz_taklfa_settings')->result();
        if (!empty($q)) {
            $data = array();
            foreach ($q as $row) {
                array_push($data, $row->band_id_fk);
            }
            return $data;
        }
    }

    public function get_bdlat(){
        $band = $this->get_all_band();
        $this->db->where_not_in('id', $band);
        $query = $this->db->get('emp_badlat_discount_settings');
        if ($query->num_rows()>0){
            return $query->result();
        }
        return false;

    }

    public function insert_markz_taklfa(){
        $data['markz_id_fk']= $this->input->post('markz_id_fk');
        $data['band_id_fk']= $this->input->post('band_id_fk');
        $data['band_name']= $this->get_id("emp_badlat_discount_settings",'id',$data['band_id_fk'],"title");
        $data['band_type']= $this->get_id("emp_badlat_discount_settings",'id',$data['band_id_fk'],"type");
        if ($data['band_type'] ==1){
            $data['band_type_name']= "الإستحقاقات" ;
        } elseif ($data['band_type'] ==2){
            $data['band_type_name']= "الإستقطاعات " ;
        }
        $data['rkm_hesab']= $this->input->post('rkm_hesab');
        $data['hesab_name']= $this->input->post('hesab_name');
        $this->db->insert('hr_markz_taklfa_settings',$data);

    }
    public function get_id($table,$where,$id,$select){
        $h = $this->db->get_where($table, array($where=>$id));
        $arr= $h->row_array();
        return $arr[$select];
    }
    public function display_markz_taklfa(){
        //return $this->db->get('hr_markz_taklfa_settings')->result();
        $query = $this->db->get('hr_markz_taklfa_settings');
        if ($query->num_rows()>0){
            $i =0;
            foreach ($query->result() as $row){
                $data[$i]= $row;
                $data[$i]->markz_name = $this->get_id("employees_settings",'id_setting',$row->markz_id_fk,"title_setting");
                $i++;
            }
            return $data;
        }
    }

    public function update_markz_taklfa($id){
        $data['markz_id_fk']= $this->input->post('markz_id_fk');
        $data['band_id_fk']= $this->input->post('band_id_fk');
        $data['band_name']= $this->get_id("emp_badlat_discount_settings",'id',$data['band_id_fk'],"title");
        $data['band_type']= $this->get_id("emp_badlat_discount_settings",'id',$data['band_id_fk'],"type");
        if ($data['band_type'] ==1){
            $data['band_type_name']= "الإستحقاقات" ;
        } elseif ($data['band_type'] ==2){
            $data['band_type_name']= "الإستقطاعات " ;
        }
        $data['rkm_hesab']= $this->input->post('rkm_hesab');
        $data['hesab_name']= $this->input->post('hesab_name');
        $this->db->where('id',$id);
        $this->db->update('hr_markz_taklfa_settings',$data);

    }
    public function get_markz_tklfa($id){
        $this->db->where('id',$id);
        return $this->db->get('hr_markz_taklfa_settings')->row();
    }

    public function delete_markz_setting($id){
        $this->db->where('id',$id);
        $this->db->delete('hr_markz_taklfa_settings');
    }



}