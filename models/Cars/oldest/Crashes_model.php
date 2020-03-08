<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crashes_model extends CI_Model {

	public function insert()
	{
		$data['car_id_fk'] 	  = $this->input->post('car_id_fk');		
		$data['crash_name']   = $this->input->post('crash_name');
		$data['crash_status'] = $this->input->post('crash_status');
		$data['crash_type']   = $this->input->post('crash_type');
		$data['driver_id_fk'] = $this->input->post('driver_id_fk');
		$data['notes'] 		  = $this->input->post('notes');
		$data['date'] 		  = strtotime($this->input->post('date'));
		$data['date_s'] 	  = time();
		$data['publisher'] 	  = $_SESSION['user_id'];
		$this->db->insert('car_crashes',$data);
	}

	public function update($id)
	{
		$data['car_id_fk'] 	  = $this->input->post('car_id_fk');		
		$data['crash_name']   = $this->input->post('crash_name');
		$data['crash_status'] = $this->input->post('crash_status');
		$data['crash_type']   = $this->input->post('crash_type');
		$data['driver_id_fk'] = $this->input->post('driver_id_fk');
		$data['notes'] 		  = $this->input->post('notes');
		$data['date'] 		  = strtotime($this->input->post('date'));
		$data['date_s'] 	  = time();
		$data['publisher'] 	  = $_SESSION['user_id'];
		$this->db->where('id', $id);
		$this->db->update('car_crashes',$data);
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('car_crashes');
	}

	public function select($where=false)
	{
		$this->db->select('car_crashes.*, drivers.driver_name, cars.car_code')
				 ->join("drivers",'drivers.id=car_crashes.driver_id_fk')
				 ->join("cars",'cars.id=car_crashes.car_id_fk');
		if($where != false) {
			$this->db->where($where);
		}
		return $this->db->order_by('id', 'DESC')
			     		->get('car_crashes')
			     		->result();
	}

	public function select_cars()
	{
		return $this->db->select('cars.*, companies_and_cars_types.name')
						->join('companies_and_cars_types','companies_and_cars_types.id=cars.car_type_id_fk')
			     		->order_by('cars.id', 'DESC')
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
		return $this->db->select('car_crashes.*, cars.car_type_id_fk, companies_and_cars_types.name AS type_name')
						->join('cars','cars.id=car_crashes.car_id_fk')
						->join('companies_and_cars_types','companies_and_cars_types.id=cars.car_type_id_fk')
			     		->where('car_crashes.id', $id)
			     		->get('car_crashes')
			     		->row_array();
	}

	public function statusUpdate($id,$status)
	{
		$data['crash_status'] = $status;
		$this->db->where('id', $id);
		$this->db->update('car_crashes',$data);
	}

}

/* End of file Crashes_model.php */
/* Location: ./application/models/Cars/Crashes_model.php */