<?php
/**
 * Created by PhpStorm.
 * User: nnnnn
 * Date: 05/03/2019
 * Time: 01:34 م
 */

class All_magls_edara_model extends CI_Model
{
    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }

    public function chek_Null($post_value)
    {
        if ($post_value == '' || $post_value == null || (!isset($post_value))) {
            $val = '';
            return $val;
        } else {
            return $post_value;
        }
    }

    public function get_data($file)
    {
        $data['qrar_rkm'] = $this->input->post('qrar_rkm');
        $data['ta3en_date_m'] = $this->input->post('ta3en_date_m');
        $data['ta3en_date_h'] = $this->input->post('ta3en_date_h');
        $data['ta3en_date'] = strtotime($data['ta3en_date_m']);

        $data['end_date_h'] = $this->input->post('end_date_h');
        $data['end_date_m'] = $this->input->post('end_date_m');
        $data['end_date'] = strtotime($data['ta3en_date_m']);
        if (!empty($file)) {
            $data['qrar_mgls_morfaq'] = $file;
        }
        $data['date'] = strtotime(date('Y-m-d'));
        $data['date_ar'] = date('Y-m-d');
        $data['publisher'] = $_SESSION['user_id'];
        $data['publisher_name'] = $_SESSION['user_name'];
        if (!empty($this->input->post('suspend')) && ($this->input->post('suspend') == 1)) {
            $this->update_status_mgls();
        }
        $data['suspend'] = $this->input->post('suspend');

        return $data;
    }


    public function insert_magls($file)
    {
        $data = $this->get_data($file);
        $data['mg_code'] = ($this->db->select_max('mg_code')->get('md_all_mgales_edara')->row()->mg_code) + 1;

        $this->db->insert('md_all_mgales_edara', $data);
    }

    public function update_magles($id, $file)
    {
        $data = $this->get_data($file);
        $this->db->where('id', $id)->update('md_all_mgales_edara', $data);

    }

    public function get_one_data($id)
    {
        $q = $this->db->where('id', $id)->get('md_all_mgales_edara')->row();
        if (!empty($q)) {
            return $q;
        }
    }


    public function get_all_data()
    {
        $q = $this->db->order_by('id', 'DESC')->get('md_all_mgales_edara')->result();
        if (!empty($q)) {
            foreach ($q as $key => $row) {
                $q[$key]->count_member = $this->count_member($row->mg_code);
            }
            return $q;
        }
    }

    public function count_member($mg_code)
    {

        $q = $this->db->select('COUNT(id) as count')->where('mgls_code', $mg_code)->get('md_all_magls_edara_members')->row();
        if (!empty($q)) {
            return $q->count;
        }
    }

    public function delete_data($id)
    {
        $this->db->where('id', $id)->delete('md_all_mgales_edara');

    }

//7-3-om
    public function update_status_mgls()
    {
        $data['suspend'] = 0;
        $this->db->update('md_all_mgales_edara', $data);

    }
}