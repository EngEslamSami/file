<?php
class Settings_model extends CI_Model
{


    //=================================================================================


    public function all_settings()
    {
        $this->db->select('*');
        $this->db->from('md_settings');
        $this->db->where("type", 0);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row){
                $data[$row->id_setting]["title"]= $row->title_setting;
//                $data[$row->id_setting]['in_order'] =  $row->in_order;
            }
            return $data;
        }
        return false;
    }

    public function add_member_settings($type)
    {
        $data['title_setting']= $this->input->post('title_setting');
        $data['type']= $type;
        $data['type_name']= $this->input->post('type_name');
//        $data['in_order']= $this->input->post('in_order');
        //$data['have_branch']= $this->input->post('have_branch');
        //$data['form_id']= $this->input->post('form_id');

        $this->db->insert('md_settings',$data);
    }
    public function get_all_data_member_settings($arr_all){
        if(isset($arr_all) && !empty($arr_all)){
            foreach ($arr_all as $key=>$value) {

                $data[$key] = $this->get_type_member_settings($key);

            }

            return $data;
        }
        return false;
    }
    public function  get_type_member_settings($type)
    {
        $this->db->select('*');
        $this->db->from('md_settings');
        $this->db->where("type", $type);
//        $this->db->order_by("in_order", "asc");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }

    public function update_member_settings($id)
    {
//        $data['in_order']= $this->input->post('in_order');
        $data['title_setting']= $this->input->post('title_setting');
        $this->db->where('id_setting',$id);
        $this->db->update('md_settings',$data);
    }
    public function getById_member_settings($id)
    {
        return $this->db->get_where('md_settings', array('id_setting'=>$id))->row_array();
    }
    public function delete_member_settings($id)
    {
        $this->db->where('id_setting', $id)->delete('md_settings');
    }



    /*************************************************************/
}
