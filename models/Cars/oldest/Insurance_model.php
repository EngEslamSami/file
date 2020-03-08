<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Insurance_model extends CI_Model {

	public function insert()
	{
		$data['name']    = $this->input->post('name');	
		$data['address'] = $this->input->post('address');	
		$data['tele']    = $this->input->post('tele');
		$data['type']    = 0;
		$this->db->insert('companies_and_cars_types',$data);
	}

	public function update($id)
	{
		$data['name']    = $this->input->post('name');	
		$data['address'] = $this->input->post('address');	
		$data['tele']    = $this->input->post('tele');
		$this->db->where('id', $id);
		$this->db->update('companies_and_cars_types',$data);
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('companies_and_cars_types');
	}

	public function select()
	{
		return $this->db->select('*')
						->where('type',0)
			     		->order_by('id', 'DESC')
			     		->get('companies_and_cars_types')
			     		->result();
	}

	public function selectByID($id)
	{
		return $this->db->select('*')
			     		->where('id', $id)
			     		->get('companies_and_cars_types')
			     		->row_array();
	}

}

/* End of file Insurance_model.php */
/* Location: ./application/models/Cars/Insurance_model.php */