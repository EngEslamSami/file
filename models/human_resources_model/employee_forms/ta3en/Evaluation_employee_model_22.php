<?php

class Evaluation_employee_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
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


    public function get_all_emp()
    {
        $query = $this->db->get('hr_ta3en_moaqt');
        if ($query->num_rows() > 0) {
            $a = 0;
            foreach ($query->result() as $row) {
                $data[$a] = $row;
                $a++;
            }
            return $data;

        } else {

            return 0;
        }
    }

    public function get_all_setting()
    {
        $this->db->where('from_id', 0);
        $query = $this->db->get('hr_evaluation_setting');
        $data = array();
        $x = 0;
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $data[$x]->branch = $this->get_from($row->id);
                $x++;

            }
            return $data;
        } else {
            return 0;
        }
    }

    public function get_from($id)
    {
        $this->db->where('from_id', $id);
        $query = $this->db->get('hr_evaluation_setting');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return 0;
        }

    }

    public function get_by_id($id)
    {
        $this->db->where("id", $id);
        $query = $this->db->get('hr_ta3en_moaqt');
        if ($query->num_rows() > 0) {
            $a = 0;
            foreach ($query->result() as $row) {
                $data[$a] = $row;
                $data[$a]->edara_name = $this->get_id('department_jobs', 'id', $row->edara_id_fk, 'name');
                $data[$a]->qsm_name = $this->get_id('department_jobs', 'id', $row->qsm_id_fk, 'name');
                $data[$a]->job_title = $this->get_id('all_defined_setting', 'defined_id', $row->job_title_id_fk, 'defined_title');

                $a++;
            }
            return $data;

        } else {

            return 0;
        }
    }


    public function insert_data()
    {
        $data['emp_id_fk'] = $this->input->post('emp_id_fk');
        $data['edara_id_fk'] = $this->input->post('edara_id_fk');
        $data['qsm_id_fk'] = $this->input->post('qsm_id_fk');
        $data['total_degree'] = $this->input->post('total_degree');
        $data['result_tagraba'] = $this->input->post('result_tagraba');
        $data['taqdeer'] = $this->input->post('taqdeer');
        $data['date'] = strtotime(date("Y/m/d"));
        $data['date_ar'] = date("Y/m/d");
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
        $this->db->insert('hr_ta3en_moaqt_evaluation', $data);

        $evaluation_order_id = $this->db->insert_id();
        if (!empty($this->input->post('evaluate_id_fk'))) {
            $count = count($this->input->post('evaluate_id_fk'));
            for ($x = 0; $x < $count; $x++) {
                $data2['evaluation_order_id'] = $evaluation_order_id;
                $data2['emp_id_fk'] = $this->input->post('emp_id_fk');
                $data2['evaluate_id_fk'] = $this->input->post('evaluate_id_fk')[$x];
                $data2['max_degree'] = $this->input->post('max_degree')[$x];
                $data2['emp_degree'] = $this->input->post('emp_degree')[$x];
                $this->db->insert('hr_ta3en_moaqt_evaluation_details', $data2);

            }

        }
        $this->insert_points($data['emp_id_fk']);

    }

    public function insert_points($id)
    {

        if ($this->get_all_points($id) > 0) {
            $this->delete_all_points($id);
        }

        if (!empty($this->input->post('positive')[0])) {
            $positive = $this->input->post('positive');

            for ($x = 0; $x < count($positive); $x++) {
                $data["title"] = $positive[$x];
                $data['emp_id_fk'] = $id;
                $data['type'] = 1;
                $data['type_n'] = 'قوه';
                $this->db->insert("hr_ta3en_moaqt_evaluation_points", $data);
            }

        }
        if(!empty($this->input->post('negative')[0])) {
            $negative = $this->input->post('negative');
            for ($a = 0; $a < count($negative); $a++) {
                $data["title"] = $negative[$a];
                $data['emp_id_fk'] = $id;
                $data['type'] = 2;
                $data['type_n'] = 'ضعف';
                $this->db->insert("hr_ta3en_moaqt_evaluation_points", $data);
            }


        }


    }


    public function update_data($id)
    {
        $data['emp_id_fk'] = $this->input->post('emp_id_fk');
        $data['edara_id_fk'] = $this->input->post('edara_id_fk');
        $data['qsm_id_fk'] = $this->input->post('qsm_id_fk');
        $data['total_degree'] = $this->input->post('total_degree');
        $data['result_tagraba'] = $this->input->post('result_tagraba');
        $data['taqdeer'] = $this->input->post('taqdeer');
        $data['date'] = strtotime(date("Y/m/d"));
        $data['date_ar'] = date("Y/m/d");
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

        $this->db->where('id', $id);
        $this->db->update('hr_ta3en_moaqt_evaluation', $data);
        if (!empty($this->input->post('evaluate_id_fk'))) {
            $count = count($this->input->post('evaluate_id_fk'));
            for ($x = 0; $x < $count; $x++) {
                $data2['emp_degree'] = $this->input->post('emp_degree')[$x];
                $this->db->where('evaluation_order_id', $id);
                $this->db->where('emp_id_fk', $this->input->post('emp_id_fk'));
                $this->db->where('evaluate_id_fk', $this->input->post('evaluate_id_fk')[$x]);
                $this->db->update('hr_ta3en_moaqt_evaluation_details', $data2);

            }

        }
        $this->insert_points($data['emp_id_fk']);


    }

    public function get_all_evaluations()
    {
        $query = $this->db->get('hr_ta3en_moaqt_evaluation');
        $data = array();
        $x = 0;
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $data[$x]->emp_data = $this->get_emp_data($row->emp_id_fk);
                $x++;

            }
            return $data;
        }
        return false;

    }

    public function get_one_evaluations($id, $emp_id)
    {

        $this->db->where('emp_id_fk', $emp_id);
        $this->db->where('id', $id);
        $query = $this->db->get('hr_ta3en_moaqt_evaluation');

        if ($query->num_rows() > 0) {
            $data = $query->row();
            $data->emp_data = $this->get_emp_data($data->emp_id_fk);
            $data->positives = $this->get_all_points($data->emp_id_fk,1);
            $data->negatives = $this->get_all_points($data->emp_id_fk,2);
            $data->details = $this->get_one_employee_details($id, $emp_id);

            return $data;
        }
        return false;

    }

    public function get_one_employee_details($id, $emp_id)
    {
        $this->db->where('evaluation_order_id', $id);
        $this->db->where('emp_id_fk', $emp_id);
        $query = $this->db->get('hr_ta3en_moaqt_evaluation_details');

        if ($query->num_rows() > 0) {
            $data = array();

            foreach ($query->result() as $row) {
                $data[$row->evaluate_id_fk] = $row;


            }
            return $data;

        }
        return false;

    }


    public function get_emp_data($id)
    {
     $this->db->where('id',$id);
     return $this->db->get('hr_ta3en_moaqt')->row();
    }

    //-----------------------------------------------


    public function get_emp_name($id)
    {
        $h = $this->db->get_where("hr_ta3en_moaqt", array("id" => $id));
        $data = $h->row_array();
        return $data["emp_name"];
    }

    public function get_id($table, $where, $id, $select)
    {
        $h = $this->db->get_where($table, array($where => $id));
        $arr = $h->row_array();
        return $arr[$select];
    }

    public function get_all_points($id,$type = false)
    {
        $this->db->where('emp_id_fk', $id);
        if (!empty($type)){
            $this->db->where('type',$type);
        }
        $query = $this->db->get('hr_ta3en_moaqt_evaluation_points');
        return $query->result();
    }

    public function delete_all_points($id)
    {
        $this->db->where('emp_id_fk', $id);
        $this->db->delete('hr_ta3en_moaqt_evaluation_points');
    }

    public function delete_point($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('hr_ta3en_moaqt_evaluation_points');
    }

    public function delete_evaluation($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('hr_ta3en_moaqt_evaluation');
    }

    public function delete_all_details($emp_id,$id)
    {
        $this->db->where('emp_id_fk', $emp_id);
        $this->db->where('evaluation_order_id', $id);
        $this->db->delete('hr_ta3en_moaqt_evaluation_details');
    }


}