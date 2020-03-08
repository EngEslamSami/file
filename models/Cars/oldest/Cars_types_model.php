<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cars_types_model extends CI_Model {

	public function insert()
	{
		$data['name'] = $this->input->post('name');		
		$data['type'] = 1;
		$this->db->insert('companies_and_cars_types',$data);
	}

	public function update($id)
	{
		$data['name'] = $this->input->post('name');	
		$this->db->where('id', $id);
		$this->db->update('companies_and_cars_types',$data);
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('companies_and_cars_types');

		$this->db->where('car_type_id_fk', $id);
		$this->db->delete('cars');
	}

	public function select()
	{
		return $this->db->select('*')
						->where('type',1)
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

/* End of file Cars_types_model.php */
/* Location: ./application/models/Cars/Cars_types_model.php */