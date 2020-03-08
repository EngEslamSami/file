<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absence_report extends CI_Model {

	public function add()
	{
		$data['emp_id'] 		  = $this->input->post('emp_id');
		$data['absence_days_num'] = $this->input->post('absence_days_num');
		$data['date_from'] 		  = strtotime($this->input->post('date_from'));
		$data['date_from_day'] 	  = $this->input->post('date_from_day');
		$data['date_to'] 		  = strtotime($this->input->post('date_to'));
		$data['date_to_day'] 	  = $this->input->post('date_to_day');
		$data['direct_boss'] 	  = $this->input->post('direct_boss');
		$data['statement1_date']  = strtotime($this->input->post('statement1_date'));
		$data['status']			  = 0;
		$this->db->insert('absence_report',$data);
	}

	public function update($id,$data)
	{
		$this->db->where('id',$id);
		$this->db->update('absence_report',$data);
	}

	public function delete($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('absence_report');
	}

	public function select($where=false)
	{
		$this->db->select('absence_report.*, employees.employee')
				 ->join('employees','absence_report.emp_id=employees.id','LEFT');
		if($where != false) {
			$this->db->where($where);
		}
		return $this->db->get('absence_report')
						->result();
	}

	public function GetEmpData($emp_name)
	{
		return $this->db->select('employees.*, administration.name AS adminName, department.name AS depName, all_defined_setting.defined_title')
						->join('department_jobs administration','administration.id=employees.administration','LEFT')
						->join('department_jobs department','
							department.id=employees.department','LEFT')
						->join('all_defined_setting','all_defined_setting.defined_id=employees.degree_id','LEFT')
						->like('employees.employee', $emp_name, 'after')
						->get('employees')
						->row_array(); 
	}

	public function selectById($id)
	{
		return $this->db->select('absence_report.*, employees.*, all_defined_setting.defined_title, administration.name AS adminName, department.name AS depName')
						->join('employees','absence_report.emp_id=employees.id','LEFT')
						->join('department_jobs administration','administration.id=employees.administration','LEFT')
						->join('department_jobs department','
							department.id=employees.department','LEFT')
						->join('all_defined_setting','all_defined_setting.defined_id=employees.degree_id','LEFT')
						->where('absence_report.id', $id)
						->get('absence_report')
						->row_array(); 
	}

}

/* End of file Absence_report.php */
/* Location: ./application/models/administrative_affairs_models/Absence_report.php */