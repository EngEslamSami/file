<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Drivers_model extends CI_Model {

	public function insert()
	{
		$data['driver_name'] 	 	 = $this->input->post('driver_name');		
		$data['driver_card'] 	 	 = $this->input->post('driver_card');
		$data['driver_address'] 	 = $this->input->post('driver_address');
		$data['driver_license_code'] = $this->input->post('driver_license_code');
		$this->db->insert('drivers',$data);
	}

	public function update($id)
	{
		$data['driver_name'] 	 	 = $this->input->post('driver_name');		
		$data['driver_card'] 	 	 = $this->input->post('driver_card');
		$data['driver_address'] 	 = $this->input->post('driver_address');
		$data['driver_license_code'] = $this->input->post('driver_license_code');
		$this->db->where('id', $id);
		$this->db->update('drivers',$data);
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('drivers');
	}

	public function select()
	{
		return $this->db->select('*')
			     		->order_by('id', 'DESC')
			     		->get('drivers')
			     		->result();
	}

	public function selectByID($id)
	{
		return $this->db->select('*')
			     		->where('id', $id)
			     		->get('drivers')
			     		->row_array();
	}

}

/* End of file Drivers_model.php */
/* Location: ./application/models/Cars/Drivers_model.php */