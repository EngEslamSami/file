<?php
class Suspend_permits extends CI_Model
{
    public function __construct() {
        parent::__construct();
    }
    
    public function select(){
        $this->db->select('permits.*, employees.emp_code AS e_id, employees.employee, employees.department');
        $this->db->from('permits');
        $this->db->join('employees','employees.emp_code = permits.emp_code');
        if($_SESSION['role_id_fk'] == 3 && $_SESSION['head_dep_id_fk'] == 2)
            $this->db->where('permits.emp_code', $_SESSION['emp_code']);
        if($_SESSION['role_id_fk'] == 3 && $_SESSION['head_dep_id_fk'] == 1)
            $this->db->where('permits.dep_id', $_SESSION['dep_job_id_fk']);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    
}