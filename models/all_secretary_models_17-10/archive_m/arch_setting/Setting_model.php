<?php
class Setting_model extends CI_Model{

    function add_leading_zero($value, $threshold = 3)
    {
        return sprintf('%0' . $threshold . 's', $value);
    }
    public function get_code($from_code)
    {
        $this->db->where('from_code', $from_code);
        $this->db->select_max('code ');
        $query = $this->db->get('arch_setting');
        if ($query->num_rows() > 0) {
            return $query->row()->code;
        } else {
            return false;
        }


    }


    public function insert_setting($type)
    {
        $data['title'] = $this->input->post('title');
        $data['color'] = $this->input->post('color');
        $data['from_code'] = $type;
        $code = $this->get_code($type);
        $n = $this->add_leading_zero(1);
        if (!empty($code)) {
            $data['code'] = $code + 1;
        } else {
            $data['code'] = $type . $n;
        }
        $data['date_ar'] = date("Y-m-d");
        $data['date'] =  strtotime(date("Y-m-d"));
        if ($_SESSION['role_id_fk'] == 1) {

            $data['publisher'] = $_SESSION['user_id'];
            $data['publisher_name'] = $_SESSION['user_name'];;
        } else if ($_SESSION['role_id_fk'] == 2) {
            $data['publisher'] = $this->get_id("magls_members_table", 'id', $_SESSION['emp_code'], "id");
            $data['publisher_name'] = $this->get_id("magls_members_table", 'id', $_SESSION['emp_code'], "member_name");

        } else if ($_SESSION['role_id_fk'] == 3) {
            $data['publisher'] = $this->get_id("employees", 'id', $_SESSION['emp_code'], "id");
            $data['publisher_name'] = $this->get_id("employees", 'id', $_SESSION['emp_code'], "employee");
        } else if ($_SESSION['role_id_fk'] == 4) {
            $data['publisher'] = $this->get_id("general_assembley_members", 'id', $_SESSION['emp_code'], "id");
            $data['publisher_name'] = $this->get_id("general_assembley_members", 'id', $_SESSION['emp_code'], "name");
        }
        $this->db->insert('arch_setting', $data);
    }

    public function get_all_data($arr_all)
    {
        foreach ($arr_all as $key => $value) {
            $data[$key] = $this->get_type($key);
        }
        return $data;
    }

    public function get_type($type)
    {
        $this->db->where("from_code", $type);
        $query = $this->db->get('arch_setting');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }

    public function update_setting($id)
    {
        $data['title'] = $this->input->post('title');
        $data['color'] = $this->input->post('color');
        $this->db->where('id', $id);
        $this->db->update('arch_setting', $data);
    }

    public function getById($id)
    {
        return $this->db->get_where('arch_setting', array('id' => $id))->row();
    }

    public function delete_setting($id)
    {
        $this->db->where('id', $id)->delete('arch_setting');
    }

    public function get_by_id($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('arch_setting')->row();
    }

    public function get_id($table, $where, $id, $select)
    {
        $h = $this->db->get_where($table, array($where => $id));
        $arr = $h->row_array();
        return $arr[$select];
    }
}