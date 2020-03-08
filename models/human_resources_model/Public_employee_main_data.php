<?php

class Public_employee_main_data extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }


    /*
     *
     *  Direct manager      المدير المباشر
     *
     * */


    public function get_direct_manager_id_by_emp_id($id)
    {
        $this->db->select('id,manger');
        $this->db->from('employees');
        $this->db->where('id', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row()->manger;

        } else {
            return false;
        }

    }

    public function get_direct_manager_id_by_emp_code($emp_code)
    {
        $this->db->select('emp_code,manger');
        $this->db->from('employees');
        $this->db->where('emp_code', $emp_code);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row()->manger;

        } else {
            return false;
        }

    }


    public function get_direct_manager_code_by_emp_id($id)
    {
        $this->db->select('employees.id,employees.manger,manager_table.id,manager_table.emp_code as manager_code');
        $this->db->from('employees');
        $this->db->where('employees.id', $id);
        $this->db->join('employees as manager_table', 'manager_table.id=employees.manger', 'left');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row()->manager_code;

        } else {
            return false;
        }
    }


    public function get_direct_manager_code_by_emp_code($emp_code)
    {
        $this->db->select('employees.emp_code,employees.manger,manager_table.id,manager_table.emp_code as manager_code');
        $this->db->from('employees');
        $this->db->where('employees.emp_code', $emp_code);
        $this->db->join('employees as manager_table', 'manager_table.id=employees.manger', 'left');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row()->manager_code;
        } else {
            return false;
        }
    }

    public function get_direct_manager_name_by_emp_id($id)
    {
        $this->db->select('employees.id,employees.manger,manager_table.id,manager_table.employee as manager_name');
        $this->db->from('employees');
        $this->db->where('employees.id', $id);
        $this->db->join('employees as manager_table', 'manager_table.id=employees.manger', 'left');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row()->manager_name;
        } else {
            return false;
        }
    }


    public function get_direct_manager_name_by_emp_code($emp_code)
    {
        $this->db->select('employees.emp_code,employees.manger,manager_table.id,manager_table.employee as manager_name');
        $this->db->from('employees');
        $this->db->where('employees.emp_code', $emp_code);
        $this->db->join('employees as manager_table', 'manager_table.id=employees.manger', 'left');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row()->manager_name;
        } else {
            return false;
        }
    }

    //=============================================================================================================

    /*
     *
     * Main Department   الإدارة
     *
     * */

    public function get_edara_id_by_emp_id($id)
    {
        $this->db->select('id,administration');
        $this->db->from('employees');
        $this->db->where('id', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row()->administration;
        } else {
            return false;
        }

    }


    public function get_edara_id_by_emp_code($emp_code)
    {
        $this->db->select('emp_code,administration');
        $this->db->from('employees');
        $this->db->where('emp_code', $emp_code);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row()->administration;
        } else {
            return false;
        }

    }


    public function get_edara_name_by_emp_id($id)
    {
        $this->db->select('employees.id,employees.administration,department_table.id,department_table.name as department_name');
        $this->db->from('employees');
        $this->db->where('employees.id', $id);
        $this->db->join('department_jobs as department_table', 'department_table.id=employees.administration', 'left');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row()->department_name;
        } else {
            return false;
        }
    }


    public function get_edara_name_by_emp_code($emp_code)
    {
        $this->db->select('employees.emp_code,employees.administration,department_table.id,department_table.name as department_name');
        $this->db->from('employees');
        $this->db->where('employees.emp_code', $emp_code);
        $this->db->join('department_jobs as department_table', 'department_table.id=employees.administration', 'left');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row()->department_name;
        } else {
            return false;
        }
    }
    //=============================================================================================================

    /*
      *
      * Sub Department    القسم
      *
      * */


    public function get_qsm_id_by_emp_id($id)
    {
        $this->db->select('id,department');
        $this->db->from('employees');
        $this->db->where('id', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row()->department;
        } else {
            return false;
        }

    }


    public function get_qsm_id_by_emp_code($emp_code)
    {
        $this->db->select('emp_code,department');
        $this->db->from('employees');
        $this->db->where('emp_code', $emp_code);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row()->department;
        } else {
            return false;
        }

    }


    public function get_qsm_name_by_emp_id($id)
    {
        $this->db->select('employees.id,employees.department,department_table.id,department_table.name as department_name');
        $this->db->from('employees');
        $this->db->where('employees.id', $id);
        $this->db->join('department_jobs as department_table', 'department_table.id=employees.department', 'left');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row()->department_name;
        } else {
            return false;
        }
    }


    public function get_qsm_name_by_emp_code($emp_code)
    {
        $this->db->select('employees.emp_code,employees.department,department_table.id,department_table.name as department_name');
        $this->db->from('employees');
        $this->db->where('employees.emp_code', $emp_code);
        $this->db->join('department_jobs as department_table', 'department_table.id=employees.department', 'left');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row()->department_name;
        } else {
            return false;
        }
    }

    //=============================================================================================================


}// END MODEL