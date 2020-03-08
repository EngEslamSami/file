<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dalel_model extends CI_Model {

	public function buildTree($where)
	{
		return $this->db->where($where)->order_by('parent','ASC')->get('dalel')->result();
	}

	public function checkValidate($where)
	{
		return $this->db->where($where)->get('dalel')->row_array();
	}

	public function lastSubCode($where)
	{
		return $this->db->select('COALESCE(MAX(CAST(code AS UNSIGNED)),0) AS maxSubCode')->where($where)->get('dalel')->row_array()['maxSubCode'];
	}

	public function deleteTreeNodes($id)
	{
		$accounts = $this->buildTree(array('parent'=>$id));
		if ($accounts != null) {
            foreach ($accounts as $row) {
                $this->deleteTreeNodes($row->id); 
        		$this->deleteAccount($row->id);
            }
        }
        $this->deleteAccount($id);
	}

	public function deleteAccount($id)
	{
		$this->db->where('id',$id)->delete('dalel');
	}

	public function getAccount($id)
	{
		return $this->db->select('dalel.*, branch.id AS branch')
						->join('dalel branch','branch.parent=dalel.id','LEFT')
						->where('dalel.id',$id)
						->get('dalel')
						->row_array();
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
		($this->input->post('code'))?$data['code']=$this->input->post('code'):'';
		($this->input->post('parent'))?$data['parent']=$this->input->post('parent'):'';
		($this->input->post('level'))?$data['level']=$this->input->post('level'):'';
		($this->input->post('hesab_no3'))?$data['hesab_no3']=$this->input->post('hesab_no3'):'';
		($this->input->post('hesab_tabe3a'))?$data['hesab_tabe3a']=$this->input->post('hesab_tabe3a'):'';
		($this->input->post('hesab_report'))?$data['hesab_report']=$this->input->post('hesab_report'):'';
		$this->db->where('id',$id)->update('dalel',$data);
	}

}

/* End of file Dalel_model.php */
/* Location: ./application/models/finance_accounting_model/Dalel_model.php */