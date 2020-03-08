<?php

class Temporary_employment_qrars_model extends CI_Model
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

    public function get_emp($id)
    {
        $this->db->where_not_in('id', $id);
        $query = $this->db->get('employees');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        } else {
            return 0;
        }
    }


    public function insert()
    {

        $data['emp_name'] = $this->chek_Null($this->input->post('emp_name'));
        $data['qsm_id_fk'] = $this->chek_Null($this->input->post('qsm_id_fk'));
        $data['qsm_n'] = $this->get_id('department_jobs', 'id',  $data['qsm_id_fk'], 'name');
        $data['edara_id_fk'] = $this->chek_Null($this->input->post('edara_id_fk'));
        $data['edara_n'] = $this->get_id('department_jobs', 'id',   $data['edara_id_fk'], 'name');
        if (!empty($_POST['direct_manager_id_fk'])) {
            $manager = explode('-', $_POST['direct_manager_id_fk']);
            $data['direct_manager_id_fk'] = $this->chek_Null($manager[0]);
            $data['direct_manager_n'] = $this->chek_Null($manager[1]);
        }
        $data['job_title_id_fk'] = $this->chek_Null($this->input->post('job_title_id_fk'));
        $data['job_title_n'] = $this->get_id('all_defined_setting', 'defined_id', $data['job_title_id_fk'], 'defined_title');;
        $data['salary'] = $this->chek_Null($this->input->post('salary'));
        $data['bdal_skan'] = $this->chek_Null($this->input->post('bdal_skan'));
        $data['bdal_mowaslat'] = $this->chek_Null($this->input->post('bdal_mowaslat'));
        $data['bdal_other'] = $this->chek_Null($this->input->post('bdal_other'));
        $data['total_salary'] = $this->chek_Null($this->input->post('total_salary'));
        $data['work_date_h'] = $this->chek_Null($this->input->post('work_date_h'));
        $data['work_date_m'] = $this->chek_Null($this->input->post('work_date_m'));
        $data['date_from_m'] = $this->chek_Null($this->input->post('date_from_m'));
        $data['date_from_h'] = $this->chek_Null($this->input->post('date_from_h'));
        $data['date_to_m'] = $this->chek_Null($this->input->post('date_to_m'));
        $data['date_to_h'] = $this->chek_Null($this->input->post('date_to_h'));
        $data['num_days'] = $this->chek_Null($this->input->post('num_days'));

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
        $this->db->insert('hr_ta3en_moaqt', $data);

    }

    public function update($id)
    {

        $data['emp_name'] = $this->chek_Null($this->input->post('emp_name'));
        $data['qsm_id_fk'] = $this->chek_Null($this->input->post('qsm_id_fk'));
        $data['qsm_n'] = $this->get_id('department_jobs', 'id',  $data['qsm_id_fk'], 'name');
        $data['edara_id_fk'] = $this->chek_Null($this->input->post('edara_id_fk'));
        $data['edara_n'] = $this->get_id('department_jobs', 'id',   $data['edara_id_fk'], 'name');
        if (!empty($_POST['direct_manager_id_fk'])) {
            $manager = explode('-', $_POST['direct_manager_id_fk']);
            $data['direct_manager_id_fk'] = $this->chek_Null($manager[0]);
            $data['direct_manager_n'] = $this->chek_Null($manager[1]);
        }
        $data['job_title_id_fk'] = $this->chek_Null($this->input->post('job_title_id_fk'));
        $data['job_title_n'] = $this->get_id('all_defined_setting', 'defined_id', $data['job_title_id_fk'], 'defined_title');;
        $data['salary'] = $this->chek_Null($this->input->post('salary'));
        $data['bdal_skan'] = $this->chek_Null($this->input->post('bdal_skan'));
        $data['bdal_mowaslat'] = $this->chek_Null($this->input->post('bdal_mowaslat'));
        $data['bdal_other'] = $this->chek_Null($this->input->post('bdal_other'));
        $data['total_salary'] = $this->chek_Null($this->input->post('total_salary'));
        $data['work_date_h'] = $this->chek_Null($this->input->post('work_date_h'));
        $data['work_date_m'] = $this->chek_Null($this->input->post('work_date_m'));
        $data['date_from_m'] = $this->chek_Null($this->input->post('date_from_m'));
        $data['date_from_h'] = $this->chek_Null($this->input->post('date_from_h'));
        $data['date_to_m'] = $this->chek_Null($this->input->post('date_to_m'));
        $data['date_to_h'] = $this->chek_Null($this->input->post('date_to_h'));
        $data['num_days'] = $this->chek_Null($this->input->post('num_days'));

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
        $this->db->update('hr_ta3en_moaqt', $data);
    }

    public function getById($id)
    {
        $h = $this->db->get_where("hr_ta3en_moaqt", array('id' => $id));
        if ($h->num_rows() > 0) {
            return $h->row_array();
        } else {
            return 0;
        }
    }


    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete("hr_ta3en_moaqt");
    }

    public function get_department()
    {
        $this->db->where('from_id_fk !=', 0);
        $query = $this->db->get('department_jobs');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        } else {
            return 0;
        }
    }


    public function get_department_by($id)
    {
        $this->db->where('from_id_fk ', $id);
        $query = $this->db->get('department_jobs');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        } else {
            return 0;
        }
    }

    public function get_last()
    {
        $this->db->order_by('id_setting', 'desc');
        $this->db->select('id_setting');
        $this->db->where('type', 9);
        $this->db->from('hr_forms_settings');
        $query = $this->db->get();
        return $query->row()->id_setting;
    }


    public function insert_record($valu)
    {
        $data['title_setting'] = $valu;
        $data['type'] = 9;
        $data['have_branch'] = 0;
        $this->db->insert('hr_forms_settings', $data);
    }


    public function select_all($id)
    {

        if (!empty($id)) {
            $this->db->where("id", $id);
        }
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

    public function select_all_defined($type)
    {
        $this->db->select('*');
        $this->db->from('all_defined_setting');
        $this->db->where("defined_type", $type);
        $this->db->order_by('in_order', 'asc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }

    public function get_id($table, $where, $id, $select)
    {
        $h = $this->db->get_where($table, array($where => $id));
        $arr = $h->row_array();
        return $arr[$select];
    }


}