<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Violation_model extends CI_Model {

	public function insert()
	{
		$data['car_id_fk'] 	  = $this->input->post('car_id_fk');		
		$data['driver_id_fk'] = $this->input->post('driver_id_fk');
		$data['receipt_code'] = $this->input->post('receipt_code');
		$data['note'] 	 	  = $this->input->post('note');
		$data['date'] 		  = strtotime($this->input->post('date'));
		$data['date_s'] 	  = time();
		$data['added_by'] 	  = $_SESSION['user_id'];
		$this->db->insert('car_violation',$data);
	}

	public function update($id)
	{
		$data['car_id_fk'] 	  = $this->input->post('car_id_fk');		
		$data['driver_id_fk'] = $this->input->post('driver_id_fk');
		$data['receipt_code'] = $this->input->post('receipt_code');
		$data['note'] 	 	  = $this->input->post('note');
		$data['date'] 		  = strtotime($this->input->post('date'));
		$data['date_s'] 	  = time();
		$data['added_by'] 	  = $_SESSION['user_id'];
		$this->db->where('id', $id);
		$this->db->update('car_violation',$data);
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('car_violation');
	}

	public function select($where=false)
	{
		$this->db->select('car_violation.*, drivers.driver_name, cars.car_code')
				 ->join("drivers",'drivers.id=car_violation.driver_id_fk')
				 ->join("cars",'cars.id=car_violation.car_id_fk');
		if($where != false) {
			$this->db->where($where);
		}
		return $this->db->order_by('id', 'DESC')
			     		->get('car_violation')
			     		->result();
	}

	public function select_cars()
	{
		return $this->db->select('*')
			     		->order_by('id', 'DESC')
			     		->get('cars')
			     		->result();
	}

	public function select_drivers()
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
			     		->get('car_violation')
			     		->row_array();
	}

}

/* End of file Violation_model.php */
/* Location: ./application/models/Cars/Violation_model.php */