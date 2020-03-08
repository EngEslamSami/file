<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guide_model extends CI_Model {

	public function buildTree($where)
	{
		return $this->db->where($where)->order_by('parent','ASC')->get('dalel')->result();
	}

	public function lastSubCode($where)
	{
		return $this->db->select('COALESCE(MAX(CAST(code AS UNSIGNED)),0) AS maxSubCode')->where($where)->get('dalel')->row_array()['maxSubCode'];
	}

	public function deleteAccount($id)
	{
		$this->db->where('id',$id)->delete('dalel');
		$this->db->where('parent',$id)->delete('dalel');
	}

	public function getAccount($id)
	{
		return $this->db->where('id',$id)->get('dalel')->row_array();
	}

	public function insert()
	{
		$data['name']	 	  = $this->input->post('name');
		$data['ttype']	 	  = $this->input->post('name');
		$data['code']	 	  = $this->input->post('code');
		$data['parent'] 	  = $this->input->post('parent');
		$data['level']	 	  = $this->input->post('level');
		$data['hesab_no3'] 	  = $this->input->post('hesab_no3');
		$data['hesab_tabe3a'] = $this->input->post('hesab_tabe3a');
		$data['hesab_report'] = $this->input->post('hesab_report');
		$this->db->insert('dalel',$data);
	}

	public function update($id)
	{
		$data['name']	 	  = $this->input->post('name');
		$data['ttype']	 	  = $this->input->post('name');
		$data['code']	 	  = $this->input->post('code');
		$data['parent'] 	  = $this->input->post('parent');
		$data['level']	 	  = $this->input->post('level');
		$data['hesab_no3'] 	  = $this->input->post('hesab_no3');
		$data['hesab_tabe3a'] = $this->input->post('hesab_tabe3a');
		$data['hesab_report'] = $this->input->post('hesab_report');
		$this->db->where('id',$id)->update('dalel',$data);
	}

}

/* End of file Guide_model.php */
/* Location: ./application/models/guide/Guide_model.php */