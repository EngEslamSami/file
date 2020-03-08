<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ohad_masrofat_model extends CI_Model {

	public function getLastId($where)
	{
		return $this->db->select('COALESCE(MAX(CAST(process_num AS UNSIGNED)),0) AS process_num')->where($where)->get('finance_ohda_masrofat')->row_array()['process_num'];
	}

	public function getAllAccounts($where)
	{
		return $this->db->where($where)->order_by('parent','ASC')->get('dalel')->result();
	}
	public function getEmpId($emp_code)
	{
		return $this->db->where('emp_code',$emp_code)->get('employees')->row_array()['id'];
	}

	public function insert_update($id=false)
	{
		$data['process_num']    	 = $this->input->post('process_num');
		$data['process_date'] 		 = strtotime($this->input->post('process_date'));
		$data['process_date_ar'] 	 = $this->input->post('process_date');
		$data['emp_code']			 = $_SESSION['emp_code'];
		$data['emp_id_fk']			 = $this->getEmpId($_SESSION['emp_code']);
		$data['geha_name']  		 = $this->input->post('geha_name');
		$data['geha_id_fk'] 		 = $this->input->post('geha_id_fk');
		$data['fatora_value']   	 = $this->input->post('fatora_value');
		$data['fatora_num']   	     = $this->input->post('fatora_num');
		$data['type']   	    	 = $this->input->post('type');
		$data['mother_national_num'] = $this->input->post('mother_national_num');
		$data['person_mob'] 		 = $this->input->post('person_mob');

		if($id == false) {
			$data['process_date_s']  = time();
			$this->db->insert('finance_ohda_masrofat',$data);
            $last_id = $this->db->insert_id();
            $this->insertDetails($last_id);
        }
		else {
			$this->db->where('id', $id);
			$this->db->update('finance_ohda_masrofat',$data);
			$this->delete($id);
            $this->insertDetails($id);
			return $id;
		}
	}

	public function insertDetails($id)
	{
		$data['finance_ohda_id_fk'] = $id;
		$data['process_num']    	= $this->input->post('process_num');
		$data['emp_code']			= $_SESSION['emp_code'];
		$data['emp_id_fk']			= $this->getEmpId($_SESSION['emp_code']);
		foreach ($this->input->post('value') as $key => $value) {
			$data['value'] 		= $value;
			$data['rqm_hesab']  = $this->input->post('rqm_hesab')[$key];
			$data['name_hesab'] = $this->input->post('name_hesab')[$key];
			$data['byan']		= $this->input->post('byan')[$key];
			$this->db->insert('finance_ohda_masrofat_details',$data);
		}
	}

	public function delete($id)
	{
		$this->db->where('finance_ohda_id_fk',$id)->delete('finance_ohda_masrofat_details');
	}

	public function deleteMain($id)
	{
		$this->db->where('id',$id)->delete('finance_ohda_masrofat');
		$this->delete($id);
	}

	public function getAllRecords($where)
	{
		$this->db->order_by("id", "desc")->where($where);
      	$sql = $this->db->get('finance_ohda_masrofat');
		if ($sql->num_rows() > 0) {
			$i = 0;
			foreach ($sql->result() as $row){
				$data[$i] = $row;
				$data[$i]->delails = $this->getdetailsById($row->id);
                $i++;
            }
			return $data;
		}
		return false;
	}

	public function getdetailsById($id)
	{
		return $this->db->order_by("id", "ACS")->where("finance_ohda_id_fk",$id)->get('finance_ohda_masrofat_details')->result();
	}

}

/* End of file Ohad_masrofat_model.php */
/* Location: ./application/models/finance_accounting_model/box/ohad/ohad_masrofat/Ohad_masrofat_model.php */