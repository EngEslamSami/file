<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Units_model extends CI_Model {

	public function insert()
	{
		$data['name'] = $this->input->post('name');		
		$this->db->insert('units_settings',$data);
	}

	public function update($id)
	{
		$data['name'] = $this->input->post('name');	
		$this->db->where('id', $id);
		$this->db->update('units_settings',$data);
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('units_settings');
	}

	public function select()
	{
		return $this->db->select('*')
			     		->order_by('id', 'DESC')
			     		->get('units_settings')
			     		->result();
	}

	public function selectByID($id)
	{
		return $this->db->select('*')
			     		->where('id', $id)
			     		->get('units_settings')
			     		->row_array();
	}

}

/* End of file Units_model.php */
/* Location: ./application/models/Storage/Units_model.php */