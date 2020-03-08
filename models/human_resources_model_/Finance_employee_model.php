<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Finance_employee_model extends CI_Model {

	public function getEmpData($empCode)
	{
		return $this->db->where('id',$empCode)->get('employees')->row_array();
	}

	public function getBadalat($type)
	{
		return $this->db->where('type',$type)->get('emp_badlat_discount_settings')->result();
	}

	public function getBanks()
	{
		return $this->db->get('banks_settings')->result();
	}

	public function financeEmployee($emp_code)
	{
		$data['emp_code']    = $emp_code;
		$data['salary_type'] = $this->input->post('salary_type');
		$data['salary']      = $this->input->post('salary');
		$this->db->insert('finance_employes',$data);
		$this->emp_badlat_discount_details($emp_code);
	}

	public function emp_badlat_discount_details($emp_code)
	{
		foreach ($this->input->post('value') as $key => $value) {
			$data = array();
			$data['emp_code'] = $emp_code;
			if(isset($this->input->post('insurance_affect')[$key]) && $this->input->post('insurance_affect')[$key] == 'on') {
				$data['insurance_affect'] = 1;
			}
			$data['value'] = $value;
			$data['badl_discount_id_fk'] = $key;
			if (isset($this->input->post('date_from')[$key])) {
				$data['date_from'] = strtotime($this->input->post('date_from')[$key]);
				$data['date_to'] = strtotime($this->input->post('date_to')[$key]);
			}
			
			$this->db->insert('emp_badlat_discount_details',$data);
		}
		$this->bank_employes_details($emp_code);
	}

	public function bank_employes_details($emp_code)
	{
		$data['emp_code']    = $emp_code;
		for ($i=0; $i < $this->input->post('number')+$this->input->post('count') ; $i++) { 
			$data['approved_for_sarf'] = 0;
			$data['bank_id_fk'] = $this->input->post('bank_id_fk')[$i];
			$data['bank_account_num'] = $this->input->post('bank_account_num')[$i];
			if($this->input->post('approved_for_sarf') == $i) {
				$data['approved_for_sarf'] = 1;
			}
			$this->db->insert('bank_employes_details',$data);
		}
	}

	public function getAllData($emp_code)
	{
		$query = $this->db->where('emp_code',$emp_code)->get('finance_employes');
		if ($query->num_rows() > 0) {
	 		$i = 0;
            foreach ($query->result() as $row) {
            	$data[$i] = $row;
            	$data[$i]->badlat = $this->getEmpBadalat($emp_code);
            	$data[$i]->Banks = $this->getEmpBank($emp_code);
            	$i++;
            }
            return $data;
        }
        return false;
	}

	public function getEmpBadalat($emp_code)
	{
		$query = $this->db->where('emp_code',$emp_code)->get('emp_badlat_discount_details');
		if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
            	$data[$row->badl_discount_id_fk] = $row;
            }
            return $data;
        }
        return false;
	}

	public function getEmpBank($emp_code)
	{
		return $this->db->select('bank_employes_details.*, banks_settings.bank_code')
						->join('banks_settings','banks_settings.id=bank_employes_details.bank_id_fk')
						->where('emp_code',$emp_code)
						->get('bank_employes_details')
						->result();
	}

	public function deleteFinanceEmp($id)
	{
		$this->db->where('id',$id)->delete('bank_employes_details');
	}

	public function deleteAllFinanceEmployee($empCode)
	{
		$this->db->where('emp_code',$empCode)->delete('finance_employes');
		$this->db->where('emp_code',$empCode)->delete('emp_badlat_discount_details');
		$this->db->where('emp_code',$empCode)->delete('bank_employes_details');
		$this->financeEmployee($empCode);
	}

}

/* End of file Finance_employee_model.php */
/* Location: ./application/models/human_resources_model/Finance_employee_model.php */