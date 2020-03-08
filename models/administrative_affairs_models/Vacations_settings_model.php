<?php
class Vacations_settings_model extends CI_Model
{
    public function chek_Null($post_value)
    {
        if ($post_value == '' || $post_value == null || (!isset($post_value))) {
            $val = '';
            return $val;
        } else {
            return $post_value;
        }
    }


    public function select()
    {
        $this->db->select('*');
        $this->db->from('penalty');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }


    public function insert()
    {
        $data['title'] = $this->chek_Null($this->input->post('title'));
        $data['days_num'] = $this->chek_Null($this->input->post('days_num'));
        $this->db->insert('vacations_settings', $data);
    }

    public function update($id)
    {
        $data['title'] = $this->chek_Null($this->input->post('title'));
        $data['days_num'] = $this->chek_Null($this->input->post('days_num'));
        $this->db->where('id', $id);
        $this->db->update('vacations_settings', $data);
    }

    public function getById($id)
    {
        $h = $this->db->get_where('vacations_settings', array('id' => $id));
        return $h->row_array();
    }

    public function delete($id){
       $this->db->where(array('id' => $id));
        $this->db->delete('vacations_settings');
    }
    /***************************************************************/


}

