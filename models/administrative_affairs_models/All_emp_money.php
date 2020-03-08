<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class All_emp_money extends CI_Model {

	public function select()
	{
		$query = $this->db->select('id, employee, salary, b_sakn, b_mosalat, b_amal, b_maesha, k_tamen')
				 		  ->get('employees');
		if ($query->num_rows() > 0) {
			$i = 0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->discount_salary_operations = $this->discount_salary_operations($row->id);
                $i++;
            }
            return $data;
        }
        return false;
	}

	public function discount_salary_operations($id)
	{
		$where = array('mon'=>date('m'),'year'=>date('Y'),'emp_id'=>$id);
		return $this->db->select('SUM(value) AS absence, MAX(discount_id_fk) AS maxDiscount')
						->group_by('emp_id')
						->where($where)
						->get('discount_salary_operations')
						->row_array();
	}

}

/* End of file All_emp_money.php */
/* Location: ./application/models/All_emp_money.php */