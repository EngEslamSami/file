<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_items_model extends CI_Model {

	public function insert()
	{
		$data['name'] = $this->input->post('name');		
		$this->db->insert('items',$data);
	}

	public function update($id)
	{
		$data['name'] = $this->input->post('name');	
		$this->db->where('id', $id);
		$this->db->update('items',$data);
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('items');

		$this->db->where('id_from', $id);
		$this->db->delete('items');
	}

	public function select()
	{
		return $this->db->select('*')
						->where('id_from',0)
			     		->order_by('id', 'DESC')
			     		->get('items')
			     		->result();
	}

	public function selectByID($id)
	{
		return $this->db->select('*')
			     		->where('id', $id)
			     		->get('items')
			     		->row_array();
	}

}

/* End of file Main_items_model.php */
/* Location: ./application/models/Storage/Main_items_model.php */